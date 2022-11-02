<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyHomepageRequest;
use App\Http\Requests\StoreHomepageRequest;
use App\Http\Requests\UpdateHomepageRequest;
use App\Models\Homepage;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class HomepageController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('homepage_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Homepage::query()->select(sprintf('%s.*', (new Homepage())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'homepage_show';
                $editGate = 'homepage_edit';
                $deleteGate = 'homepage_delete';
                $crudRoutePart = 'homepages';

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
            $table->editColumn('title', function ($row) {
                return $row->title ? $row->title : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.homepages.index');
    }

    public function create()
    {
        abort_if(Gate::denies('homepage_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.homepages.create');
    }

    public function store(StoreHomepageRequest $request)
    {
        $homepage = Homepage::create($request->all());

        return redirect()->route('admin.homepages.index');
    }

    public function edit(Homepage $homepage)
    {
        abort_if(Gate::denies('homepage_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.homepages.edit', compact('homepage'));
    }

    public function update(UpdateHomepageRequest $request, Homepage $homepage)
    {
        $homepage->update($request->all());

        return redirect()->route('admin.homepages.index');
    }

    public function show(Homepage $homepage)
    {
        abort_if(Gate::denies('homepage_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.homepages.show', compact('homepage'));
    }

    public function destroy(Homepage $homepage)
    {
        abort_if(Gate::denies('homepage_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $homepage->delete();

        return back();
    }

    public function massDestroy(MassDestroyHomepageRequest $request)
    {
        Homepage::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
