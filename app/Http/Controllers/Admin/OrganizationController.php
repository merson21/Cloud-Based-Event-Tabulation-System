<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyOrganizationRequest;
use App\Http\Requests\StoreOrganizationRequest;
use App\Http\Requests\UpdateOrganizationRequest;
use App\Models\Organization;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class OrganizationController extends Controller
{
    // public function index(Request $request)
    public function index()
    {
        abort_if(Gate::denies('organization_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $organizations = Organization::with(['team'])->get();

        return view('admin.organizations.index', compact('organizations'));
    }

    public function create()
    {
        abort_if(Gate::denies('organization_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.organizations.create');
    }

    public function store(StoreOrganizationRequest $request)
    {
        $organization = Organization::create($request->all());

        return redirect()->route('admin.organizations.index');
    }

    public function edit(Organization $organization)
    {
        abort_if(Gate::denies('organization_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $organization->load('team');

        return view('admin.organizations.edit', compact('organization'));
    }

    public function update(UpdateOrganizationRequest $request, Organization $organization)
    {
        $organization->update($request->all());

        return redirect()->route('admin.organizations.index');
    }

    public function show(Organization $organization)
    {
        abort_if(Gate::denies('organization_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $organization->load('team');

        return view('admin.organizations.show', compact('organization'));
    }

    public function destroy(Organization $organization)
    {
        abort_if(Gate::denies('organization_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $organization->delete();

        return back();
    }

    public function massDestroy(MassDestroyOrganizationRequest $request)
    {
        Organization::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
