<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyCandidateRequest;
use App\Http\Requests\StoreCandidateRequest;
use App\Http\Requests\UpdateCandidateRequest;
use App\Models\Candidate;
use App\Models\Organization;
use App\Models\Partylist;
use App\Models\Position;
use App\Models\Team;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class CandidatesController extends Controller
{
    use MediaUploadingTrait;
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('candidate_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Candidate::with(['organization', 'partylist', 'position', 'team'])->select(sprintf('%s.*', (new Candidate())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'candidate_show';
                $editGate = 'candidate_edit';
                $deleteGate = 'candidate_delete';
                $crudRoutePart = 'candidates';

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
                return $row->status ? Candidate::STATUS_RADIO[$row->status] : '';
            });
            $table->addColumn('organization_title', function ($row) {
                return $row->organization ? $row->organization->title : '';
            });

            $table->addColumn('partylist_name', function ($row) {
                return $row->partylist ? $row->partylist->name : '';
            });

            $table->addColumn('position_position', function ($row) {
                return $row->position ? $row->position->position : '';
            });

            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('email', function ($row) {
                return $row->email ? $row->email : '';
            });
            $table->editColumn('description', function ($row) {
                return $row->description ? $row->description : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'organization', 'partylist', 'position']);

            return $table->make(true);
        }

        $organizations = Organization::get();
        //$organizations = Organization::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $partylists    = Partylist::get();
        $positions     = Position::get();
        $teams         = Team::get();

        return view('admin.candidates.index', compact('organizations', 'partylists', 'positions', 'teams'));
    }

    public function create()
    {
        abort_if(Gate::denies('candidate_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $organizations = Organization::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $partylists = Partylist::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $positions = Position::all()->pluck('position', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.candidates.create', compact('organizations', 'partylists', 'positions'));
    }

    public function store(StoreCandidateRequest $request)
    {
        $candidate = Candidate::create($request->all());

        if ($request->input('image', false)) {
            $candidate->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $candidate->id]);
        }

        return redirect()->route('admin.candidates.index');
    }

    public function edit(Candidate $candidate)
    {
        abort_if(Gate::denies('candidate_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $organizations = Organization::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $partylists = Partylist::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $positions = Position::all()->pluck('position', 'id')->prepend(trans('global.pleaseSelect'), '');

        $candidate->load('organization', 'partylist', 'position', 'team');

        return view('admin.candidates.edit', compact('organizations', 'partylists', 'positions', 'candidate'));
    }

    public function update(UpdateCandidateRequest $request, Candidate $candidate)
    {
        $candidate->update($request->all());

        if ($request->input('image', false)) {
            if (!$candidate->image || $request->input('image') !== $candidate->image->file_name) {
                if ($candidate->image) {
                    $candidate->image->delete();
                }
                $candidate->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
            }
        } elseif ($candidate->image) {
            $candidate->image->delete();
        }

        return redirect()->route('admin.candidates.index');
    }

    public function show(Candidate $candidate)
    {
        abort_if(Gate::denies('candidate_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $candidate->load('organization', 'partylist', 'position', 'team');

        return view('admin.candidates.show', compact('candidate'));
    }

    public function destroy(Candidate $candidate)
    {
        abort_if(Gate::denies('candidate_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $candidate->delete();

        return back();
    }

    public function massDestroy(MassDestroyCandidateRequest $request)
    {
        Candidate::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('candidate_create') && Gate::denies('candidate_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Candidate();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
