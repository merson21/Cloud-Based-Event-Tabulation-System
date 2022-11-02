<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPositionRequest;
use App\Http\Requests\StorePositionRequest;
use App\Http\Requests\UpdatePositionRequest;
use App\Models\Organization;
use App\Models\Position;
use App\Models\Team;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class PositionController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('position_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Position::with(['organization', 'team'])->select(sprintf('%s.*', (new Position())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'position_show';
                $editGate = 'position_edit';
                $deleteGate = 'position_delete';
                $crudRoutePart = 'positions';

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
            $table->addColumn('organization_title', function ($row) {
                return $row->organization ? $row->organization->title : '';
            });

            $table->editColumn('vote_allow', function ($row) {
                return $row->vote_allow ? $row->vote_allow : '';
            });
            $table->editColumn('position', function ($row) {
                return $row->position ? $row->position : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'organization']);

            return $table->make(true);
        }

        $organizations = Organization::get();
        $teams         = Team::get();

        return view('admin.positions.index', compact('organizations', 'teams'));
    }

    public function create()
    {
        abort_if(Gate::denies('position_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $organizations = Organization::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.positions.create', compact('organizations'));
    }

    public function store(StorePositionRequest $request)
    {
        $position = Position::create($request->all());

        return redirect()->route('admin.positions.index');
    }

    public function edit(Position $position)
    {
        abort_if(Gate::denies('position_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $organizations = Organization::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $position->load('organization', 'team');

        return view('admin.positions.edit', compact('organizations', 'position'));
    }

    public function update(UpdatePositionRequest $request, Position $position)
    {
        $position->update($request->all());

        return redirect()->route('admin.positions.index');
    }

    public function show(Position $position)
    {
        abort_if(Gate::denies('position_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $position->load('organization', 'team');

        return view('admin.positions.show', compact('position'));
    }

    public function destroy(Position $position)
    {
        abort_if(Gate::denies('position_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $position->delete();

        return back();
    }

    public function massDestroy(MassDestroyPositionRequest $request)
    {
        Position::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
