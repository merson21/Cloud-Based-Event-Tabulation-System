<?php

namespace App\Http\Requests;

use App\Models\AuditVoter;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyAuditVoterRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('audit_voter_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:audit_voters,id',
        ];
    }
}
