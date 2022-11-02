<?php

namespace App\Http\Requests;

use App\Models\Judge;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;

class StoreJudgeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('judge_create');
    }

    public function rules()
    {
        //return $this->title_id;
        return [
            'status' => [
                'required',
            ],
            'title_id' => [
                'required',
                'integer',
            ],
            'name' => [
                'string',
                'required',

            ],
            //'name' => ['required', 'unique:judges,title_id,'.$this->title_id.',NULL,id,username,'.$this->input('username')],
            'address' => [
                'string',
                'nullable',
            ],
            'age' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'username' => [
                'string',
                'required',
                Rule::unique('judges')
                                    ->where('title_id', $this->title_id),
            ],
            'password' => [
                'required',
            ],
        ];
    }
}
