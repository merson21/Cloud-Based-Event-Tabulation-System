<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePositionRequest;
use App\Http\Requests\UpdatePositionRequest;
use App\Http\Resources\Admin\PositionResource;
use App\Models\Position;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PositionApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('position_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PositionResource(Position::with(['organization', 'team'])->get());
    }

    public function store(StorePositionRequest $request)
    {
        $position = Position::create($request->all());

        return (new PositionResource($position))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Position $position)
    {
        abort_if(Gate::denies('position_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PositionResource($position->load(['organization', 'team']));
    }

    public function update(UpdatePositionRequest $request, Position $position)
    {
        $position->update($request->all());

        return (new PositionResource($position))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Position $position)
    {
        abort_if(Gate::denies('position_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $position->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
