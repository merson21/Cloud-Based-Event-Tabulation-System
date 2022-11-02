<?php

namespace App\Http\Controllers;

use App\Models\AuditVoter;
use App\Models\Candidate;
use App\Models\Organization;
use App\Models\Partylist;
use App\Models\Position;
use App\Models\Voter;
use Illuminate\Http\Request;

class ElectionController extends Controller
{
    public function index($slug){
        if(!session('voterData')){
            return redirect('e-voting/'. $slug .'/login');
        }

        session(['slug'=>$slug]);

        $elections = Organization::where(['slug' => $slug, 'status' => 'true'])->firstOrfail();
        $voterData = Voter::where(['id' => session('voterData')->id, 'organization_id' => $elections->id])->firstOrfail();
        $CandidateData = Candidate::where(['organization_id' => $elections->id, 'status' => 'true'])->get();
        $possitionData = Position::where(['organization_id' => $elections->id])->get();
        $partylistData = Partylist::where(['organization_id' => $elections->id])->get();
        $AuditVoters = AuditVoter::where(['organization_id' => $elections->id, 'voter_id' => session('voterData')->id])->get();


        return view('elections.index',compact([
                'elections',
                'slug',
                'voterData',
                'possitionData',
                'CandidateData',
                'partylistData',
                'AuditVoters',
            ]));

    }

    public function login($slug){
        session(['slug'=>$slug]);
        $elections = Organization::where(['slug' => $slug, 'status' => 'true'])->firstOrfail();

        if(session('voterData')){
            return redirect('e-voting/'. $slug);
        }

        return view('elections.login',compact(['elections', 'slug']));
    }

    function submit_login($slug, Request $request){

        session(['slug'=>$slug]);
        $elections = Organization::where(['slug' => $slug, 'status' => 'true'])->firstOrfail();

        $voterCheck = Voter::where(['votersID' => $request->input('voterID'), 'organization_id' => $elections->id])->count();
        if($voterCheck == 1){
            $voterData = Voter::where(['votersID' => $request->input('voterID'), 'organization_id' => $elections->id])->first();
            session(['voterData'=>$voterData]);
            //session()->forget('voterData');
            //echo session('voterData');
            return redirect('e-voting/'. $slug);
        }else{
            return redirect('e-voting/'. $slug. '/login')->with('message',"Invalid voter's ID!!");
        }

    	// $request->validate([
    	// 	'username'=>'required',
    	// 	'password'=>'required'
    	// ]);

    	// $userCheck=Admin::where(['username'=>$request->username,'password'=>$request->password])->count();
    	// if($userCheck>0){
        //     $adminData=Admin::where(['username'=>$request->username,'password'=>$request->password])->first();
        //     session(['adminData'=>$adminData]);
    	// 	return redirect('admin/dashboard');
    	// }else{
    	// 	return redirect('admin/login')->with('error','Invalid username/password!!');
    	// }

    }

    public function store($slug, Request $request){
        $elections = Organization::where(['slug' => $slug, 'status' => 'true'])->firstOrfail();
        $possitionData = Position::where(['organization_id' => $elections->id])->get();

        foreach ($possitionData as $key => $possition) {

            if ($possition->vote_allow == "1") {

                $cadidateData = "position" . $possition->id;
                $candidate = AuditVoter::create([
                    'organization_id' => $elections->id,
                    'position_id' => $possition->id,
                    'candidate_id' => $request->input($cadidateData),
                    'voter_id' => session('voterData')->id,
                ]);

            }else{

                $cadidateData = "position" . $possition->id;
                $cadidateDatas = $request->input($cadidateData);
                foreach ($cadidateDatas as $key => $cadidateinfo) {
                    $candidate = AuditVoter::create([
                        'organization_id' => $elections->id,
                        'position_id' => $possition->id,
                        'candidate_id' => $cadidateinfo,
                        'voter_id' => session('voterData')->id,
                    ]);
                }
            }

        }

        Voter::where('id', session('voterData')->id)->update(['status' => 'true']);

        return redirect('e-voting/'. $slug);;
    }

    public function logout($slug, Request $request){
        $elections = Organization::where(['slug' => $slug])->firstOrfail();
        session()->forget('voterData');
        return redirect('e-voting/'.$slug . '/login')->with([
            'elections' =>  $elections,
            'slug' => $slug
            ]);
    }
}
