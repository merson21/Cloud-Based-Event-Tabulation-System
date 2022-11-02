<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StorePartylistRequest;
use App\Http\Requests\UpdatePartylistRequest;
use App\Http\Resources\Admin\PartylistResource;
use App\Models\Partylist;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PartylistApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('partylist_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PartylistResource(Partylist::with(['organization', 'team'])->get());
    }

    public function store(StorePartylistRequest $request)
    {
        $partylist = Partylist::create($request->all());

        return (new PartylistResource($partylist))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Partylist $partylist)
    {
        abort_if(Gate::denies('partylist_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PartylistResource($partylist->load(['organization', 'team']));
    }

    public function update(UpdatePartylistRequest $request, Partylist $partylist)
    {
        $partylist->update($request->all());

        return (new PartylistResource($partylist))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Partylist $partylist)
    {
        abort_if(Gate::denies('partylist_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $partylist->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
