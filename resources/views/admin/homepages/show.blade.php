@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.homepage.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.homepages.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.homepage.fields.id') }}
                        </th>
                        <td>
                            {{ $homepage->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.homepage.fields.title') }}
                        </th>
                        <td>
                            {{ $homepage->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.homepage.fields.content') }}
                        </th>
                        <td>
                            {{ $homepage->content }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.homepages.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection