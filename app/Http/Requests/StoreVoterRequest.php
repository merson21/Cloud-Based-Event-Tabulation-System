<?php

namespace App\Http\Requests;

use App\Models\Voter;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreVoterRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('voter_create');
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
            'age' => [
                'nullable',
                'integer',
                'min: 1',
                'max: 150',
            ],
            'contact' => [
                'string',
                'nullable',
            ],
            'votersid' => [
                'string',
                'unique:voters',
            ],
            'email' => [
                'required',
                'unique:voters',
            ],
        ];
    }
}
