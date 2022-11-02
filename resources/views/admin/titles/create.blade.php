@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.title.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.titles.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required">{{ trans('cruds.title.fields.status_2') }}</label>
                @foreach(App\Models\Title::STATUS_2_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('status_2') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="status_2_{{ $key }}" name="status_2" value="{{ $key }}" {{ old('status_2', 'true') === (string) $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="status_2_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('status_2'))
                    <span class="text-danger">{{ $errors->first('status_2') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.title.fields.status_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="title">{{ trans('cruds.title.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', '') }}" required>
                @if($errors->has('title'))
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.title.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="slug">{{ trans('cruds.title.fields.slug') }}</label>
                <input class="form-control {{ $errors->has('slug') ? 'is-invalid' : '' }}" type="text" name="slug" id="slug" value="{{ old('slug', '') }}" required>
                @if($errors->has('slug'))
                    <span class="text-danger">{{ $errors->first('slug') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.title.fields.slug_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="location">{{ trans('cruds.title.fields.location') }}</label>
                <input class="form-control {{ $errors->has('location') ? 'is-invalid' : '' }}" type="text" name="location" id="location" value="{{ old('location', '') }}">
                @if($errors->has('location'))
                    <span class="text-danger">{{ $errors->first('location') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.title.fields.location_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="date">{{ trans('cruds.title.fields.date') }}</label>
                <input class="form-control date {{ $errors->has('date') ? 'is-invalid' : '' }}" type="text" name="date" id="date" value="{{ old('date') }}">
                @if($errors->has('date'))
                    <span class="text-danger">{{ $errors->first('date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.title.fields.date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="score_min">{{ trans('cruds.title.fields.score_min') }}</label>
                <input class="form-control {{ $errors->has('score_min') ? 'is-invalid' : '' }}" type="number" name="score_min" id="score_min" value="{{ old('score_min', '') }}" step="1" required>
                @if($errors->has('score_min'))
                    <span class="text-danger">{{ $errors->first('score_min') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.title.fields.score_min_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="score_max">{{ trans('cruds.title.fields.score_max') }}</label>
                <input class="form-control {{ $errors->has('score_max') ? 'is-invalid' : '' }}" type="number" name="score_max" id="score_max" value="{{ old('score_max', '') }}" step="1" required>
                @if($errors->has('score_max'))
                    <span class="text-danger">{{ $errors->first('score_max') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.title.fields.score_max_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.title.fields.basetype') }}</label>
                <select class="form-control {{ $errors->has('basetype') ? 'is-invalid' : '' }}" name="basetype" id="basetype" required>
                    <option value disabled {{ old('basetype', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Title::BASETYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('basetype', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('basetype'))
                    <span class="text-danger">{{ $errors->first('basetype') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.title.fields.basetype_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.title.fields.description') }}</label>
                <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{{ old('description') }}</textarea>
                @if($errors->has('description'))
                    <span class="text-danger">{{ $errors->first('description') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.title.fields.description_helper') }}</span>
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