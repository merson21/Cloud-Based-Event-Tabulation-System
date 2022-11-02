<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyPartylistRequest;
use App\Http\Requests\StorePartylistRequest;
use App\Http\Requests\UpdatePartylistRequest;
use App\Models\Organization;
use App\Models\Partylist;
use App\Models\Team;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class PartylistController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('partylist_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Partylist::with(['organization', 'team'])->select(sprintf('%s.*', (new Partylist())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'partylist_show';
                $editGate = 'partylist_edit';
                $deleteGate = 'partylist_delete';
                $crudRoutePart = 'partylists';

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

            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'organization']);

            return $table->make(true);
        }

        $organizations = Organization::get();
        $teams         = Team::get();

        return view('admin.partylists.index', compact('organizations', 'teams'));
    }

    public function create()
    {
        abort_if(Gate::denies('partylist_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $organizations = Organization::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.partylists.create', compact('organizations'));
    }

    public function store(StorePartylistRequest $request)
    {
        $partylist = Partylist::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $partylist->id]);
        }

        return redirect()->route('admin.partylists.index');
    }

    public function edit(Partylist $partylist)
    {
        abort_if(Gate::denies('partylist_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $organizations = Organization::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $partylist->load('organization', 'team');

        return view('admin.partylists.edit', compact('organizations', 'partylist'));
    }

    public function update(UpdatePartylistRequest $request, Partylist $partylist)
    {
        $partylist->update($request->all());

        return redirect()->route('admin.partylists.index');
    }

    public function show(Partylist $partylist)
    {
        abort_if(Gate::denies('partylist_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $partylist->load('organization', 'team');

        return view('admin.partylists.show', compact('partylist'));
    }

    public function destroy(Partylist $partylist)
    {
        abort_if(Gate::denies('partylist_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $partylist->delete();

        return back();
    }

    public function massDestroy(MassDestroyPartylistRequest $request)
    {
        Partylist::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('partylist_create') && Gate::denies('partylist_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Partylist();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
