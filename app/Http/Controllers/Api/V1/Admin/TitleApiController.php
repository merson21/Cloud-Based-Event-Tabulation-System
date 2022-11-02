<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTitleRequest;
use App\Http\Requests\UpdateTitleRequest;
use App\Http\Resources\Admin\TitleResource;
use App\Models\Title;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TitleApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('title_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TitleResource(Title::with(['team'])->get());
    }

    public function store(StoreTitleRequest $request)
    {
        $title = Title::create($request->all());

        return (new TitleResource($title))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Title $title)
    {
        abort_if(Gate::denies('title_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TitleResource($title->load(['team']));
    }

    public function update(UpdateTitleRequest $request, Title $title)
    {
        $title->update($request->all());

        return (new TitleResource($title))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Title $title)
    {
        abort_if(Gate::denies('title_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $title->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
