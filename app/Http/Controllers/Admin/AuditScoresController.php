<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAuditScoreRequest;
use App\Models\AuditScore;
use App\Models\Category;
use App\Models\Criterion;
use App\Models\Judge;
use App\Models\Participant;
use App\Models\Team;
use App\Models\Title;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class AuditScoresController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('audit_score_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = AuditScore::with(['title', 'category', 'criteria', 'judge', 'participant', 'team'])->select(sprintf('%s.*', (new AuditScore())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'audit_score_show';
                $editGate = 'audit_score_edit';
                $deleteGate = 'audit_score_delete';
                $crudRoutePart = 'audit-scores';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->addColumn('title_title', function ($row) {
                return $row->title ? $row->title->title : '';
            });

            $table->addColumn('category_name', function ($row) {
                return $row->category ? $row->category->name : '';
            });

            $table->addColumn('criteria_name', function ($row) {
                return $row->criteria ? $row->criteria->name : '';
            });

            $table->addColumn('judge_name', function ($row) {
                return $row->judge ? $row->judge->name : '';
            });

            $table->addColumn('participant_name', function ($row) {
                return $row->participant ? $row->participant->name : '';
            });

            $table->editColumn('scores', function ($row) {
                return $row->scores ? $row->scores : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'title', 'category', 'criteria', 'judge', 'participant']);

            return $table->make(true);
        }

        $titles       = Title::get();
        $categories   = Category::get();
        $criteria     = Criterion::get();
        $judges       = Judge::get();
        $participants = Participant::get();
        $teams        = Team::get();

        return view('admin.auditScores.index', compact('titles', 'categories', 'criteria', 'judges', 'participants', 'teams'));
    }

    public function destroy(AuditScore $auditScore)
    {
        abort_if(Gate::denies('audit_score_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $auditScore->delete();

        return back();
    }

    public function massDestroy(MassDestroyAuditScoreRequest $request)
    {
        AuditScore::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
