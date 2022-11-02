<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrganizationRequest;
use App\Http\Requests\UpdateOrganizationRequest;
use App\Http\Resources\Admin\OrganizationResource;
use App\Models\Organization;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OrganizationApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('organization_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new OrganizationResource(Organization::with(['team'])->get());
    }

    public function store(StoreOrganizationRequest $request)
    {
        $organization = Organization::create($request->all());

        return (new OrganizationResource($organization))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Organization $organization)
    {
        abort_if(Gate::denies('organization_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new OrganizationResource($organization->load(['team']));
    }

    public function update(UpdateOrganizationRequest $request, Organization $organization)
    {
        $organization->update($request->all());

        return (new OrganizationResource($organization))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Organization $organization)
    {
        abort_if(Gate::denies('organization_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $organization->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
