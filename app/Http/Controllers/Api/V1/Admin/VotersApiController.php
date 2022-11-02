<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreVoterRequest;
use App\Http\Requests\UpdateVoterRequest;
use App\Http\Resources\Admin\VoterResource;
use App\Models\Voter;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VotersApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('voter_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new VoterResource(Voter::with(['organization', 'team'])->get());
    }

    public function store(StoreVoterRequest $request)
    {
        $voter = Voter::create($request->all());

        if ($request->input('image', false)) {
            $voter->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        return (new VoterResource($voter))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Voter $voter)
    {
        abort_if(Gate::denies('voter_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new VoterResource($voter->load(['organization', 'team']));
    }

    public function update(UpdateVoterRequest $request, Voter $voter)
    {
        $voter->update($request->all());

        if ($request->input('image', false)) {
            if (!$voter->image || $request->input('image') !== $voter->image->file_name) {
                if ($voter->image) {
                    $voter->image->delete();
                }
                $voter->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
            }
        } elseif ($voter->image) {
            $voter->image->delete();
        }

        return (new VoterResource($voter))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Voter $voter)
    {
        abort_if(Gate::denies('voter_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $voter->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
