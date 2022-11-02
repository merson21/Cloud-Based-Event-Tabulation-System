<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreParticipantRequest;
use App\Http\Requests\UpdateParticipantRequest;
use App\Http\Resources\Admin\ParticipantResource;
use App\Models\Participant;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ParticipantsApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('participant_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ParticipantResource(Participant::with(['title', 'team'])->get());
    }

    public function store(StoreParticipantRequest $request)
    {
        $participant = Participant::create($request->all());

        if ($request->input('image', false)) {
            $participant->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        return (new ParticipantResource($participant))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Participant $participant)
    {
        abort_if(Gate::denies('participant_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ParticipantResource($participant->load(['title', 'team']));
    }

    public function update(UpdateParticipantRequest $request, Participant $participant)
    {
        $participant->update($request->all());

        if ($request->input('image', false)) {
            if (!$participant->image || $request->input('image') !== $participant->image->file_name) {
                if ($participant->image) {
                    $participant->image->delete();
                }
                $participant->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
            }
        } elseif ($participant->image) {
            $participant->image->delete();
        }

        return (new ParticipantResource($participant))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Participant $participant)
    {
        abort_if(Gate::denies('participant_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $participant->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
