<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EliminationRound;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EliminationRoundController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('elimination_round_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $eliminationRounds = EliminationRound::with(['title', 'category', 'participant'])->get();

        return view('admin.eliminationRounds.index', compact('eliminationRounds'));
    }
}
