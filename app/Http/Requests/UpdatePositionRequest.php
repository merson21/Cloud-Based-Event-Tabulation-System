<?php

namespace App\Http\Requests;

use App\Models\Position;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePositionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('position_edit');
    }

    public function rules()
    {
        return [
            'organization_id' => [
                'required',
                'integer',
            ],
            'vote_allow' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'position' => [
                'string',
                'required',
            ],
        ];
    }
}
