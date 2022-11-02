<?php

namespace App\Http\Requests;

use App\Models\Candidate;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCandidateRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('candidate_edit');
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
            'position_id' => [
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
            'contact' => [
                'string',
                'nullable',
            ],
        ];
    }
}
