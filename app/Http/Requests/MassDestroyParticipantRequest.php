<?php

namespace App\Http\Requests;

use App\Models\Participant;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyParticipantRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('participant_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:participants,id',
        ];
    }
}
