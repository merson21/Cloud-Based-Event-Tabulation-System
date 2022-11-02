<?php

namespace App\Http\Requests;

use App\Models\Title;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateTitleRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('title_edit');
    }

    public function rules()
    {
        return [
            'status_2' => [
                'required',
            ],
            'title' => [
                'string',
                'required',
            ],
            'slug' => [
                'string',
                'required',
                'unique:titles,slug,' . request()->route('title')->id,
            ],
            'location' => [
                'string',
                'nullable',
            ],
            'date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'score_min' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'score_max' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'basetype' => [
                'required',
            ],
        ];
    }
}
