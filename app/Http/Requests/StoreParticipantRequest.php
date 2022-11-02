<?php

namespace App\Http\Requests;

use App\Models\Participant;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreParticipantRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('participant_create');
    }

    public function rules()
    {
        return [
            'status' => [
                'required',
            ],
            'title_id' => [
                'required',
                'integer',
            ],
            'number' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'type' => [
                'required',
            ],
            'name' => [
                'string',
                'required',
            ],
        ];
    }
}
