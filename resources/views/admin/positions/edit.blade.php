@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.position.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.positions.update", [$position->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="organization_id">{{ trans('cruds.position.fields.organization') }}</label>
                <select class="form-control select2 {{ $errors->has('organization') ? 'is-invalid' : '' }}" name="organization_id" id="organization_id" required>
                    @foreach($organizations as $id => $entry)
                        <option value="{{ $id }}" {{ (old('organization_id') ? old('organization_id') : $position->organization->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('organization'))
                    <span class="text-danger">{{ $errors->first('organization') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.position.fields.organization_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="vote_allow">{{ trans('cruds.position.fields.vote_allow') }}</label>
                <input class="form-control {{ $errors->has('vote_allow') ? 'is-invalid' : '' }}" type="number" name="vote_allow" id="vote_allow" value="{{ old('vote_allow', $position->vote_allow) }}" step="1" required>
                @if($errors->has('vote_allow'))
                    <span class="text-danger">{{ $errors->first('vote_allow') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.position.fields.vote_allow_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="position">{{ trans('cruds.position.fields.position') }}</label>
                <input class="form-control {{ $errors->has('position') ? 'is-invalid' : '' }}" type="text" name="position" id="position" value="{{ old('position', $position->position) }}" required>
                @if($errors->has('position'))
                    <span class="text-danger">{{ $errors->first('position') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.position.fields.position_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.position.fields.description') }}</label>
                <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{{ old('description', $position->description) }}</textarea>
                @if($errors->has('description'))
                    <span class="text-danger">{{ $errors->first('description') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.position.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection