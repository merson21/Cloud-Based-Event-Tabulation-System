@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.candidate.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.candidates.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.candidate.fields.id') }}
                        </th>
                        <td>
                            {{ $candidate->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.candidate.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\Candidate::STATUS_RADIO[$candidate->status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.candidate.fields.organization') }}
                        </th>
                        <td>
                            {{ $candidate->organization->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.candidate.fields.partylist') }}
                        </th>
                        <td>
                            {{ $candidate->partylist->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.candidate.fields.position') }}
                        </th>
                        <td>
                            {{ $candidate->position->position ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.candidate.fields.name') }}
                        </th>
                        <td>
                            {{ $candidate->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.candidate.fields.address') }}
                        </th>
                        <td>
                            {{ $candidate->address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.candidate.fields.gender') }}
                        </th>
                        <td>
                            {{ App\Models\Candidate::GENDER_RADIO[$candidate->gender] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.candidate.fields.email') }}
                        </th>
                        <td>
                            {{ $candidate->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.candidate.fields.contact') }}
                        </th>
                        <td>
                            {{ $candidate->contact }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.candidate.fields.description') }}
                        </th>
                        <td>
                            {{ $candidate->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.candidate.fields.image') }}
                        </th>
                        <td>
                            {{-- @foreach($candidate->image as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $media->getUrl('thumb') }}">
                                </a>
                            @endforeach --}}
                            @if($candidate->image)
                                <a href="{{ $candidate->image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $candidate->image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.candidates.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
