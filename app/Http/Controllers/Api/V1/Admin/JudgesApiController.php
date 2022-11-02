<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreJudgeRequest;
use App\Http\Requests\UpdateJudgeRequest;
use App\Http\Resources\Admin\JudgeResource;
use App\Models\Judge;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class JudgesApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('judge_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new JudgeResource(Judge::with(['title', 'team'])->get());
    }

    public function store(StoreJudgeRequest $request)
    {
        $judge = Judge::create($request->all());

        if ($request->input('image', false)) {
            $judge->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        return (new JudgeResource($judge))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Judge $judge)
    {
        abort_if(Gate::denies('judge_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new JudgeResource($judge->load(['title', 'team']));
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

        return (new JudgeResource($judge))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Judge $judge)
    {
        abort_if(Gate::denies('judge_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $judge->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
