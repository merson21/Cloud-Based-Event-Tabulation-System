<?php

namespace App\Http\Controllers\Traits;

use App\Http\Requests\StoreVoterRequest;
use App\Models\Organization;
use \SpreadsheetReader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

trait CsvImportTrait
{
    public function processCsvImport(Request $request)
    {
        try {
            $filename = $request->input('filename', false);
            $path     = storage_path('app/csv_import/' . $filename);

            $hasHeader = $request->input('hasHeader', false);

            $fields = $request->input('fields', false);
            //$organization_id = \substr($fields[0],15);
            $organization_id = $fields[0];
            $status = $fields[1];
            $team_id = $fields[2];
            $fields[0] = "organization_id";
            $fields[1] = "status";
            $fields[2] = "team_id";

            // dd($fields);
            // return;

            $fields = array_flip(array_filter($fields));

            $modelName = $request->input('modelName', false);
            $model     = 'App\\Models\\' . $modelName;

            $reader = new SpreadsheetReader($path);
            $insert = [];

            foreach ($reader as $key => $row) {
                if ($hasHeader && $key == 0) {
                    continue;
                }

                $tmp = [];

                foreach ($fields as $header => $k) {

                    if($header == 'organization_id'){
                        $tmp[$header] = $organization_id;
                    }elseif($header == 'status'){
                        $tmp[$header] = $status;
                    }elseif($header == 'team_id'){
                        $tmp[$header] = $team_id;
                    }elseif (isset($row[$k-3])) {
                        $tmp[$header] = $row[$k-3];
                    }

                }



                if (count($tmp) > 0) {
                    $insert[] = $tmp;
                }
            }


            $rules =[
                '*.email' => [
                    'required',
                    'unique:voters',
                ],
            ];
            $messages = ['*.email.unique' => 'email :input has been taken'];
            $validator = Validator::make($insert, $rules, $messages);
            //$validator = Validator::make($insert, $rules, $messages);
            //foreach ($insert as $key => $insertItem) {
                if ($validator->fails()){
                    return redirect($request->input('redirect'))->withErrors($validator);

                    //dd($validator->errors());

                }

            $for_insert = array_chunk($insert, 100);

            // dd($for_insert);
            // return;

            foreach ($for_insert as $insert_item) {
               $model::insert($insert_item);
            }
            $rows  = count($insert);
            $table = Str::plural($modelName);

            File::delete($path);

            session()->flash('message', trans('global.app_imported_rows_to_table', ['rows' => $rows, 'table' => $table]));

            return redirect($request->input('redirect'));
        } catch (\Exception $ex) {
            throw $ex;
        }
    }

    public function parseCsvImport(Request $request)
    {
        $file = $request->file('csv_file');
        $request->validate([
            'csv_file' => 'mimes:csv,txt',
        ]);

        $path      = $file->path();
        $hasHeader = $request->input('header', false) ? true : false;

        $reader  = new SpreadsheetReader($path);
        $headers = $reader->current();
        $lines   = [];

        $i = 0;
        while ($reader->next() !== false && $i < 5) {
            $lines[] = $reader->current();
            ++$i;
        }

        $organizations = Organization::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $filename = Str::random(10) . '.csv';
        $file->storeAs('csv_import', $filename);

        $modelName     = $request->input('model', false);
        $fullModelName = 'App\\Models\\' . $modelName;

        $model     = new $fullModelName();
        $fillables = $model->getFillable();

        $redirect = url()->previous();

        $routeName = 'admin.' . strtolower(Str::plural(Str::kebab($modelName))) . '.processCsvImport';


        return view('csvImport.parseInput', compact('organizations', 'headers', 'filename', 'fillables', 'hasHeader', 'modelName', 'lines', 'redirect', 'routeName'));
    }
}
