@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.partylist.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.partylists.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.partylist.fields.id') }}
                        </th>
                        <td>
                            {{ $partylist->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.partylist.fields.organization') }}
                        </th>
                        <td>
                            {{ $partylist->organization->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.partylist.fields.name') }}
                        </th>
                        <td>
                            {{ $partylist->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.partylist.fields.platform') }}
                        </th>
                        <td>
                            {!! $partylist->platform !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.partylist.fields.description') }}
                        </th>
                        <td>
                            {{ $partylist->description }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.partylists.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection