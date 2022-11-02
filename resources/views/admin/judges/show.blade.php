@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.judge.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.judges.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.judge.fields.id') }}
                        </th>
                        <td>
                            {{ $judge->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.judge.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\Judge::STATUS_RADIO[$judge->status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.judge.fields.title') }}
                        </th>
                        <td>
                            {{ $judge->title->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.judge.fields.name') }}
                        </th>
                        <td>
                            {{ $judge->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.judge.fields.address') }}
                        </th>
                        <td>
                            {{ $judge->address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.judge.fields.gender') }}
                        </th>
                        <td>
                            {{ App\Models\Judge::GENDER_RADIO[$judge->gender] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.judge.fields.age') }}
                        </th>
                        <td>
                            {{ $judge->age }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.judge.fields.email') }}
                        </th>
                        <td>
                            {{ $judge->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.judge.fields.username') }}
                        </th>
                        <td>
                            {{ $judge->username }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.judge.fields.password') }}
                        </th>
                        <td>
                            ********
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.judge.fields.description') }}
                        </th>
                        <td>
                            {{ $judge->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.judge.fields.image') }}
                        </th>
                        <td>
                            @if($judge->image)
                                <a href="{{ $judge->image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $judge->image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.judges.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection