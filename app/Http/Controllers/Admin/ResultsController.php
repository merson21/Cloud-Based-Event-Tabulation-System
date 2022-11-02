<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyResultRequest;
use App\Http\Requests\StoreResultRequest;
use App\Http\Requests\UpdateResultRequest;
use App\Models\AuditVoter;
use App\Models\Organization;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class ResultsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('result_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $elections = Organization::where(['status' => 'true'])->get();
        // $AuditVoters = AuditVoter::where(['organization_id' => 1])->orderBy('position_id', 'ASC')
        //             ->select(['position_id','candidate_id'])->distinct('candidate_id')->get();

        // $AuditVoteCount = AuditVoter::where(['organization_id' => 1])->orderBy('position_id', 'ASC')->get();

        //$AuditVoters->select(['candidate_id'])->distinct('candidate_id')->get();

        // foreach ($AuditVoters as $key => $AuditVoter) {
        //     echo $AuditVoter->position->id . ' :: ' . $AuditVoter->position->position .'<br>';
        // }

        //echo $AuditVoters;

        // $AuditVoterData =  $AuditVoteCount->groupBy('candidate_id');

        // echo $AuditVoterData[3];

        // foreach ($AuditVoterData as $key => $AuditVoter) {
        //     echo $AuditVoter->count() . '<br>';
        // }


        return view('admin.results.index', compact(['elections']));


        // $user_info = AuditVoter::groupBy('candidate_id')->select('candidate_id', DB::raw('count(*) as total'))->pluck('id');
        // echo $user_info;
    }


    public function store(Request $request)
    {
        $electionTitle = Organization::where(['status' => 'true', 'id' => $request->organization_id])->firstOrfail();
        $elections = Organization::where(['status' => 'true'])->get();
        $AuditVoters = AuditVoter::where(['organization_id' => $request->organization_id])->orderBy('position_id', 'ASC')
                    ->select(['position_id','candidate_id'])->distinct('candidate_id')->get();

        $AuditVoteCount = AuditVoter::where(['organization_id' => 1])->orderBy('position_id', 'ASC')->get();

        return view('admin.results.index', compact(['elections', 'AuditVoters', 'AuditVoteCount', 'electionTitle']));
    }


}
