@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.organization.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.organizations.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.organization.fields.id') }}
                        </th>
                        <td>
                            {{ $organization->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.organization.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\Organization::STATUS_RADIO[$organization->status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.organization.fields.title') }}
                        </th>
                        <td>
                            {{ $organization->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.organization.fields.slug') }}
                        </th>
                        <td>
                            {{ $organization->slug }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.organization.fields.description') }}
                        </th>
                        <td>
                            {{ $organization->description }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.organizations.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection