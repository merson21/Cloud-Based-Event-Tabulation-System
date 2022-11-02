@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.criterion.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.criteria.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.criterion.fields.id') }}
                        </th>
                        <td>
                            {{ $criterion->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.criterion.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\Criterion::STATUS_RADIO[$criterion->status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.criterion.fields.title') }}
                        </th>
                        <td>
                            {{ $criterion->title->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.criterion.fields.category') }}
                        </th>
                        <td>
                            {{ $criterion->category->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.criterion.fields.name') }}
                        </th>
                        <td>
                            {{ $criterion->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.criterion.fields.percentage') }}
                        </th>
                        <td>
                            {{ App\Models\Criterion::PERCENTAGE_SELECT[$criterion->percentage] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.criterion.fields.description') }}
                        </th>
                        <td>
                            {{ $criterion->description }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.criteria.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection