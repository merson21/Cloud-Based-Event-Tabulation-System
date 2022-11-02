<?php

namespace App\Http\Requests;

use App\Models\Voter;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateVoterRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('voter_edit');
    }

    public function rules()
    {
        return [
            'status' => [
                'required',
            ],
            'organization_id' => [
                'required',
                'integer',
            ],
            'name' => [
                'string',
                'required',
            ],
            'address' => [
                'string',
                'nullable',
            ],
            'gender' => [
                'required',
            ],
            'age' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'contact' => [
                'string',
                'nullable',
            ],
            'votersid' => [
                'string',
                'unique:voters,votersid,' . request()->route('voter')->id,
            ],
            'email' => [
                'required',
                'unique:voters,email,' . request()->route('voter')->id,
            ],
        ];
    }
}
