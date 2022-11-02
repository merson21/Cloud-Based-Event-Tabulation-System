<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCategoryRequest;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use App\Models\Team;
use App\Models\Title;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Category::with(['title', 'team'])->select(sprintf('%s.*', (new Category())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'category_show';
                $editGate = 'category_edit';
                $deleteGate = 'category_delete';
                $crudRoutePart = 'categories';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('status', function ($row) {
                return $row->status ? Category::STATUS_RADIO[$row->status] : '';
            });
            $table->addColumn('title_title', function ($row) {
                return $row->title ? $row->title->title : '';
            });

            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('percentage', function ($row) {
                return $row->percentage ? Category::PERCENTAGE_SELECT[$row->percentage] : '';
            });
            $table->editColumn('partipants', function ($row) {
                return $row->partipants ? $row->partipants : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'title']);

            return $table->make(true);
        }

        $titles = Title::get();
        $teams  = Team::get();

        return view('admin.categories.index', compact('titles', 'teams'));
    }

    public function create()
    {
        abort_if(Gate::denies('category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $titles = Title::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.categories.create', compact('titles'));
    }

    public function store(StoreCategoryRequest $request)
    {
        $category = Category::create($request->all());

        return redirect()->route('admin.categories.index');
    }

    public function edit(Category $category)
    {
        abort_if(Gate::denies('category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $titles = Title::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $category->load('title', 'team');

        return view('admin.categories.edit', compact('titles', 'category'));
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->update($request->all());

        return redirect()->route('admin.categories.index');
    }

    public function show(Category $category)
    {
        abort_if(Gate::denies('category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $category->load('title', 'team');

        return view('admin.categories.show', compact('category'));
    }

    public function destroy(Category $category)
    {
        abort_if(Gate::denies('category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $category->delete();

        return back();
    }

    public function massDestroy(MassDestroyCategoryRequest $request)
    {
        Category::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
