@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.title.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.titles.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.title.fields.id') }}
                        </th>
                        <td>
                            {{ $title->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.title.fields.status_2') }}
                        </th>
                        <td>
                            {{ App\Models\Title::STATUS_2_RADIO[$title->status_2] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.title.fields.title') }}
                        </th>
                        <td>
                            {{ $title->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.title.fields.slug') }}
                        </th>
                        <td>
                            {{ $title->slug }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.title.fields.location') }}
                        </th>
                        <td>
                            {{ $title->location }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.title.fields.date') }}
                        </th>
                        <td>
                            {{ $title->date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.title.fields.score_min') }}
                        </th>
                        <td>
                            {{ $title->score_min }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.title.fields.score_max') }}
                        </th>
                        <td>
                            {{ $title->score_max }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.title.fields.basetype') }}
                        </th>
                        <td>
                            {{ App\Models\Title::BASETYPE_SELECT[$title->basetype] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.title.fields.description') }}
                        </th>
                        <td>
                            {{ $title->description }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.titles.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection