<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCriterionRequest;
use App\Http\Requests\UpdateCriterionRequest;
use App\Http\Resources\Admin\CriterionResource;
use App\Models\Criterion;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CriteriaApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('criterion_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CriterionResource(Criterion::with(['title', 'category', 'team'])->get());
    }

    public function store(StoreCriterionRequest $request)
    {
        $criterion = Criterion::create($request->all());

        return (new CriterionResource($criterion))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Criterion $criterion)
    {
        abort_if(Gate::denies('criterion_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CriterionResource($criterion->load(['title', 'category', 'team']));
    }

    public function update(UpdateCriterionRequest $request, Criterion $criterion)
    {
        $criterion->update($request->all());

        return (new CriterionResource($criterion))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Criterion $criterion)
    {
        abort_if(Gate::denies('criterion_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $criterion->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
