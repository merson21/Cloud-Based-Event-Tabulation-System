@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.voter.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.voters.index') }}">
                    {{ trans('global.back_to_list') }}
                </a> 
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.voter.fields.id') }}
                        </th>
                        <td>
                            {{ $voter->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.voter.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\Voter::STATUS_RADIO[$voter->status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.voter.fields.organization') }}
                        </th>
                        <td>
                            {{ $voter->organization->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.voter.fields.votersid') }}
                        </th>
                        <td>
                            {{ $voter->votersid }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.voter.fields.name') }}
                        </th>
                        <td>
                            {{ $voter->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.voter.fields.address') }}
                        </th>
                        <td>
                            {{ $voter->address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.voter.fields.gender') }}
                        </th>
                        <td>
                            {{ App\Models\Voter::GENDER_RADIO[$voter->gender] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.voter.fields.age') }}
                        </th>
                        <td>
                            {{ $voter->age }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.voter.fields.email') }}
                        </th>
                        <td>
                            {{ $voter->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.voter.fields.contact') }}
                        </th>
                        <td>
                            {{ $voter->contact }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.voter.fields.description') }}
                        </th>
                        <td>
                            {{ $voter->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.voter.fields.image') }}
                        </th>
                        <td>
                            @if($voter->image)
                                <a href="{{ $voter->image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $voter->image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.voters.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>




@endsection
