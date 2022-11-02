@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.position.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.positions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.position.fields.id') }}
                        </th>
                        <td>
                            {{ $position->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.position.fields.organization') }}
                        </th>
                        <td>
                            {{ $position->organization->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.position.fields.vote_allow') }}
                        </th>
                        <td>
                            {{ $position->vote_allow }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.position.fields.position') }}
                        </th>
                        <td>
                            {{ $position->position }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.position.fields.description') }}
                        </th>
                        <td>
                            {{ $position->description }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.positions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection