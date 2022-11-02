<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyJudgeRequest;
use App\Http\Requests\StoreJudgeRequest;
use App\Http\Requests\UpdateJudgeRequest;
use App\Models\Judge;
use App\Models\Team;
use App\Models\Title;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class JudgesController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('judge_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Judge::with(['title', 'team'])->select(sprintf('%s.*', (new Judge())->table))->orderBY('id', 'DESC');
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'judge_show';
                $editGate = 'judge_edit';
                $deleteGate = 'judge_delete';
                $crudRoutePart = 'judges';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            // $table->editColumn('id', function ($row) {
            //     return $row->id ? $row->id : '';
            // });
            $table->editColumn('status', function ($row) {
                return $row->status ? Judge::STATUS_RADIO[$row->status] : '';
            });
            $table->addColumn('title_title', function ($row) {
                return $row->title ? $row->title->title : '';
            });

            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('email', function ($row) {
                return $row->email ? $row->email : '';
            });
            $table->editColumn('username', function ($row) {
                return $row->username ? $row->username : '';
            });
            $table->editColumn('image', function ($row) {
                if ($photo = $row->image) {
                    return sprintf(
        '<a href="%s" target="_blank"><img src="%s" width="50px" height="50px"></a>',
        $photo->url,
        $photo->thumbnail
    );
                }

                return '';
            });

            $table->rawColumns(['actions', 'placeholder', 'title', 'image']);

            return $table->make(true);
        }

        $titles = Title::get();
        $teams  = Team::get();

        return view('admin.judges.index', compact('titles', 'teams'));
    }

    public function create()
    {
        abort_if(Gate::denies('judge_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');


        $titles = Title::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.judges.create', compact('titles'));
    }

    public function store(StoreJudgeRequest $request)
    {
        $judge = Judge::create($request->all());

        if ($request->input('image', false)) {
            $judge->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $judge->id]);
        }

        return redirect()->route('admin.judges.index');
    }

    public function edit(Judge $judge)
    {
        abort_if(Gate::denies('judge_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $titles = Title::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $judge->load('title', 'team');

        return view('admin.judges.edit', compact('titles', 'judge'));
    }

    public function update(UpdateJudgeRequest $request, Judge $judge)
    {
        $judge->update($request->all());

        if ($request->input('image', false)) {
            if (!$judge->image || $request->input('image') !== $judge->image->file_name) {
                if ($judge->image) {
                    $judge->image->delete();
                }
                $judge->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
            }
        } elseif ($judge->image) {
            $judge->image->delete();
        }

        return redirect()->route('admin.judges.index');
    }

    public function show(Judge $judge)
    {
        abort_if(Gate::denies('judge_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $judge->load('title', 'team');

        return view('admin.judges.show', compact('judge'));
    }

    public function destroy(Judge $judge)
    {
        abort_if(Gate::denies('judge_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $judge->delete();

        return back();
    }

    public function massDestroy(MassDestroyJudgeRequest $request)
    {
        Judge::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('judge_create') && Gate::denies('judge_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Judge();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
