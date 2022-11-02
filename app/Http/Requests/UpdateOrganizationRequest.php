<?php

namespace App\Http\Requests;

use App\Models\Organization;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateOrganizationRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('organization_edit');
    }

    public function rules()
    {
        return [
            'status' => [
                'required',
            ],
            'title' => [
                'string',
                'required',
            ],
            'slug' => [
                'string',
                'required',
                'unique:organizations,slug,' . request()->route('organization')->id,
            ],
        ];
    }

    public function messages()
    {
        return [
            'slug.unique' => 'The URL has already been taken',
        ];
    }
}
