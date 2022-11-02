<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCriterionRequest;
use App\Http\Requests\StoreCriterionRequest;
use App\Http\Requests\UpdateCriterionRequest;
use App\Models\Category;
use App\Models\Criterion;
use App\Models\Team;
use App\Models\Title;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class CriteriaController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('criterion_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Criterion::with(['title', 'category', 'team'])->select(sprintf('%s.*', (new Criterion())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'criterion_show';
                $editGate = 'criterion_edit';
                $deleteGate = 'criterion_delete';
                $crudRoutePart = 'criteria';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('status', function ($row) {
                return $row->status ? Criterion::STATUS_RADIO[$row->status] : '';
            });
            $table->addColumn('title_title', function ($row) {
                return $row->title ? $row->title->title : '';
            });

            $table->addColumn('category_name', function ($row) {
                return $row->category ? $row->category->name : '';
            });
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('percentage', function ($row) {
                return $row->percentage ? Criterion::PERCENTAGE_SELECT[$row->percentage] : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'title', 'category']);

            return $table->make(true);
        }

        $titles     = Title::get();
        $categories = Category::get();
        $teams      = Team::get();

        return view('admin.criteria.index', compact('titles', 'categories', 'teams'));
    }

    public function create()
    {
        abort_if(Gate::denies('criterion_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $titles = Title::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $categories = Category::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.criteria.create', compact('titles', 'categories'));
    }

    public function store(StoreCriterionRequest $request)
    {
        $criterion = Criterion::create($request->all());

        return redirect()->route('admin.criteria.index');
    }

    public function edit(Criterion $criterion)
    {
        abort_if(Gate::denies('criterion_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $titles = Title::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $categories = Category::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $criterion->load('title', 'category', 'team');

        return view('admin.criteria.edit', compact('titles', 'categories', 'criterion'));
    }

    public function update(UpdateCriterionRequest $request, Criterion $criterion)
    {
        $criterion->update($request->all());

        return redirect()->route('admin.criteria.index');
    }

    public function show(Criterion $criterion)
    {
        abort_if(Gate::denies('criterion_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $criterion->load('title', 'category', 'team');

        return view('admin.criteria.show', compact('criterion'));
    }

    public function destroy(Criterion $criterion)
    {
        abort_if(Gate::denies('criterion_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $criterion->delete();

        return back();
    }

    public function massDestroy(MassDestroyCriterionRequest $request)
    {
        Criterion::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
