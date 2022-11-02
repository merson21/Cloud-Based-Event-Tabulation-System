<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreHomepageRequest;
use App\Http\Requests\UpdateHomepageRequest;
use App\Http\Resources\Admin\HomepageResource;
use App\Models\Homepage;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HomepageApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('homepage_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new HomepageResource(Homepage::all());
    }

    public function store(StoreHomepageRequest $request)
    {
        $homepage = Homepage::create($request->all());

        return (new HomepageResource($homepage))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Homepage $homepage)
    {
        abort_if(Gate::denies('homepage_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new HomepageResource($homepage);
    }

    public function update(UpdateHomepageRequest $request, Homepage $homepage)
    {
        $homepage->update($request->all());

        return (new HomepageResource($homepage))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Homepage $homepage)
    {
        abort_if(Gate::denies('homepage_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $homepage->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
