@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.participant.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.participants.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.participant.fields.id') }}
                        </th>
                        <td>
                            {{ $participant->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.participant.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\Participant::STATUS_RADIO[$participant->status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.participant.fields.title') }}
                        </th>
                        <td>
                            {{ $participant->title->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.participant.fields.number') }}
                        </th>
                        <td>
                            {{ $participant->number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.participant.fields.type') }}
                        </th>
                        <td>
                            {{ App\Models\Participant::TYPE_SELECT[$participant->type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.participant.fields.name') }}
                        </th>
                        <td>
                            {{ $participant->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.participant.fields.description') }}
                        </th>
                        <td>
                            {{ $participant->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.participant.fields.image') }}
                        </th>
                        <td>
                            @foreach($participant->image as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $media->getUrl('thumb') }}">
                                </a>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.participants.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection