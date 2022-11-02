<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAuditVoterRequest;
use App\Models\AuditVoter;
use App\Models\Candidate;
use App\Models\Organization;
use App\Models\Position;
use App\Models\Voter;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuditVotersController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('audit_voter_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $auditVoters = AuditVoter::with(['organization', 'position', 'candidate', 'voter'])->get();

        $organizations = Organization::get();

        $positions = Position::get();

        $candidates = Candidate::get();

        $voters = Voter::get();

        return view('admin.auditVoters.index', compact('auditVoters', 'organizations', 'positions', 'candidates', 'voters'));
    }

    public function destroy(AuditVoter $auditVoter)
    {
        abort_if(Gate::denies('audit_voter_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $auditVoter->delete();

        return back();
    }

    public function massDestroy(MassDestroyAuditVoterRequest $request)
    {
        AuditVoter::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
