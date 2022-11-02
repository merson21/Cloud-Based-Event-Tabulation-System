<?php

namespace App\Http\Requests;

use App\Models\Partylist;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePartylistRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('partylist_edit');
    }

    public function rules()
    {
        return [
            'organization_id' => [
                'required',
                'integer',
            ],
            'name' => [
                'string',
                'required',
            ],
        ];
    }
}
