<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyParticipantRequest;
use App\Http\Requests\StoreParticipantRequest;
use App\Http\Requests\UpdateParticipantRequest;
use App\Models\Participant;
use App\Models\Team;
use App\Models\Title;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ParticipantsController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('participant_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Participant::with(['title', 'team'])->select(sprintf('%s.*', (new Participant())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'participant_show';
                $editGate = 'participant_edit';
                $deleteGate = 'participant_delete';
                $crudRoutePart = 'participants';

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
            $table->editColumn('status', function ($row) {
                return $row->status ? Participant::STATUS_RADIO[$row->status] : '';
            });
            $table->addColumn('title_title', function ($row) {
                return $row->title ? $row->title->title : '';
            });

            $table->editColumn('number', function ($row) {
                return $row->number ? $row->number : '';
            });
            $table->editColumn('type', function ($row) {
                return $row->type ? Participant::TYPE_SELECT[$row->type] : '';
            });
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('description', function ($row) {
                return $row->description ? $row->description : '';
            });
            $table->editColumn('image', function ($row) {
                if (!$row->image) {
                    return '';
                }
                $links = [];
                foreach ($row->image as $media) {
                    $links[] = '<a href="' . $media->getUrl() . '" target="_blank"><img src="' . $media->getUrl('thumb') . '" width="50px" height="50px"></a>';
                }

                return implode(' ', $links);
            });

            $table->rawColumns(['actions', 'placeholder', 'title', 'image']);

            return $table->make(true);
        }

        $titles = Title::get();
        $teams  = Team::get();

        return view('admin.participants.index', compact('titles', 'teams'));
    }

    public function create()
    {
        abort_if(Gate::denies('participant_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $titles = Title::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.participants.create', compact('titles'));
    }

    public function store(StoreParticipantRequest $request)
    {
        $participant = Participant::create($request->all());

        foreach ($request->input('image', []) as $file) {
            $participant->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $participant->id]);
        }

        return redirect()->route('admin.participants.index');
    }

    public function edit(Participant $participant)
    {
        abort_if(Gate::denies('participant_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $titles = Title::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $participant->load('title', 'team');

        return view('admin.participants.edit', compact('titles', 'participant'));
    }

    public function update(UpdateParticipantRequest $request, Participant $participant)
    {
        $participant->update($request->all());

        if (count($participant->image) > 0) {
            foreach ($participant->image as $media) {
                if (!in_array($media->file_name, $request->input('image', []))) {
                    $media->delete();
                }
            }
        }
        $media = $participant->image->pluck('file_name')->toArray();
        foreach ($request->input('image', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $participant->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('image');
            }
        }

        return redirect()->route('admin.participants.index');
    }

    public function show(Participant $participant)
    {
        abort_if(Gate::denies('participant_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $participant->load('title', 'team');

        return view('admin.participants.show', compact('participant'));
    }

    public function destroy(Participant $participant)
    {
        abort_if(Gate::denies('participant_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $participant->delete();

        return back();
    }

    public function massDestroy(MassDestroyParticipantRequest $request)
    {
        Participant::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('participant_create') && Gate::denies('participant_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Participant();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
