<?php

namespace App\Http\Requests;

use App\Models\Homepage;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateHomepageRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('homepage_edit');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'required',
            ],
            'content' => [
                'required',
            ],
        ];
    }
}
