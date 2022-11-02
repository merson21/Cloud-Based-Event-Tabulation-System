<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyVoterRequest;
use App\Http\Requests\StoreVoterRequest;
use App\Http\Requests\UpdateVoterRequest;
use App\Models\Organization;
use App\Models\Team;
use App\Models\Voter;
use App\Notifications\SendVotersID;
use App\Notifications\TeamMemberInvite;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;


class VotersController extends Controller
{
    use MediaUploadingTrait;
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('voter_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            //$query = Voter::with(['organization', 'team'])->select(sprintf('%s.*', (new Voter())->table));
            //$query = Voter::create($request->all());
            if(auth()->user()->id == 1){
                $query = Voter::with(['organization', 'team'])->select(sprintf('%s.*', (new Voter())->table));
            }else{
                $query = Voter::with(['organization', 'team'])
                ->where('team_id',auth()->user()->team_id)
                ->whereNotNull('team_id')
                ->select(sprintf('%s.*', (new Voter())->table));
            }

            $table = Datatables::of($query);


            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'voter_show';
                $editGate = 'voter_edit';
                $deleteGate = 'voter_delete';
                $crudRoutePart = 'voters';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });



            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('status', function ($row) {
                return $row->status ? Voter::STATUS_RADIO[$row->status] : '';
                //return $row->team_id ? $row->team_id : '';
            });
            $table->addColumn('organization_title', function ($row) {
                return $row->organization ? $row->organization->title : '';
            });

            $table->editColumn('votersid', function ($row) {
                return $row->votersid ? $row->votersid : '';
            });
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('address', function ($row) {
                return $row->address ? $row->address : '';
            });
            $table->editColumn('gender', function ($row) {
                return $row->gender ? Voter::GENDER_RADIO[$row->gender] : '';
            });
            $table->editColumn('age', function ($row) {
                return $row->age ? $row->age : '';
            });
            $table->editColumn('description', function ($row) {
                return $row->description ? $row->description : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'organization']);

            return $table->make(true);
        }

        $organizations = Organization::get();
        $teams         = Team::get();

        return view('admin.voters.index', compact('organizations', 'teams'));
    }

    public function create()
    {
        abort_if(Gate::denies('voter_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $organizations = Organization::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.voters.create', compact('organizations'));
    }

    public function store(StoreVoterRequest $request)
    {
        $voter = Voter::create($request->all());

        if ($request->input('image', false)) {
            $voter->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $voter->id]);
        }

        return redirect()->route('admin.voters.index');
    }

    public function edit(Voter $voter)
    {
        abort_if(Gate::denies('voter_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $organizations = Organization::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $voter->load('organization', 'team');

        return view('admin.voters.edit', compact('organizations', 'voter'));
    }

    public function update(UpdateVoterRequest $request, Voter $voter)
    {
        $voter->update($request->all());

        if ($request->input('image', false)) {
            if (!$voter->image || $request->input('image') !== $voter->image->file_name) {
                if ($voter->image) {
                    $voter->image->delete();
                }
                $voter->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
            }
        } elseif ($voter->image) {
            $voter->image->delete();
        }

        return redirect()->route('admin.voters.index');
    }

    public function show(Voter $voter)
    {
        abort_if(Gate::denies('voter_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $voter->load('organization', 'team');

        return view('admin.voters.show', compact('voter'));
    }

    public function destroy(Voter $voter)
    {
        abort_if(Gate::denies('voter_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $voter->delete();

        return back();
    }

    public function massDestroy(MassDestroyVoterRequest $request)
    {
        Voter::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('voter_create') && Gate::denies('voter_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Voter();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }



    public function generate(Request $request)
    {
        // $adminData=tbladmin::where(['username'=>$request->username,'password'=>$request->password])->first();

        function GenerateCode(){

            $chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
            $code = "";
            for ($i = 0; $i < 12; $i++) {
                $code .= $chars[mt_rand(0, strlen($chars)-1)];
            }
            return $code;
        }

        if($request->status != 'All'){
            $voters = Voter::where([
                'organization_id' => $request->organization_id,
                'status' => $request->status,
                ])->get();


        }else{
            $voters = Voter::where([
                'organization_id' => $request->organization_id,
                ])->get();
        }

        foreach ($voters as $key => $voter) {
            Voter::where('id', $voter->id)->update(['votersid' => GenerateCode() ]);
        }

        Session(['success' => 'Generating voters ID successfully!']);

        //return redirect()->route('admin.voters.index');


    }

    public function sendid(Request $request){

        // $message = new \App\Notifications\SendVotersID();
        // Notification::route('mail', 'zedcastaneda1@24hinbox.com')->notify($message);

        // Notification::route('mail', 'zedcastaneda1@24hinbox.com')
        //     ->route('nexmo', '5555555555')
        //     ->route('slack', 'https://hooks.slack.com/services/...')
        //     ->notify(new SendVotersID());

        // $url     = URL::signedRoute('register', auth()->user()->id);
        // Notification::route('mail', 'zedcastaneda1@24hinbox.com')->notify(new TeamMemberInvite($url));

        // $user = Voter::where('id', $voter->id)->select('email')->get();
            // $user->notify(new SendVotersID());


        // Notification::route('mail', 'zedcastaneda1@24hinbox.com')
        // ->notify(new SendVotersID());

        if($request->status != 'All'){
            $voters = Voter::where([
                'organization_id' => $request->organization_id,
                'status' => $request->status,
                ])->get();

        }else{
            $voters = Voter::where([
                'organization_id' => $request->organization_id,
                ])->get();
        }

        foreach ($voters as $key => $voter) {
            $title = $voter->organization->title;
            $code = $voter->votersid;
            $url = URL::to('/') . '/' . $voter->organization->slug . '/login';
            Notification::route('mail', $voter->email)->notify(new SendVotersID($url, $title, $code));
        }


        Session(['success' => 'Sending voters ID successfully!']);

        //echo 'Success!';


        //return redirect()->route('admin.voters.index');

    }

}

