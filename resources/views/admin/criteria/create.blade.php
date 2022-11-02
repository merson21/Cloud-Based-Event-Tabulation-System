@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.criterion.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.criteria.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required">{{ trans('cruds.criterion.fields.lock') }}</label>
                @foreach(App\Models\Criterion::STATUS_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('status') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="status_{{ $key }}" name="status" value="{{ $key }}" {{ old('status', 'true') === (string) $key ? '' : 'checked' }} required>
                        <label class="form-check-label" for="status_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('status'))
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.criterion.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="title_id">{{ trans('cruds.criterion.fields.title') }}</label>
                <select class="form-control select2 {{ $errors->has('title') ? 'is-invalid' : '' }}" name="title_id" id="title_id" required>
                    @foreach($titles as $id => $entry)
                        <option value="{{ $id }}" {{ old('title_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('title'))
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.criterion.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="category_id">{{ trans('cruds.criterion.fields.category') }}</label>
                <select class="form-control select2 {{ $errors->has('category') ? 'is-invalid' : '' }}" name="category_id" id="category_id" required disabled>
                    {{-- @foreach($categories as $id => $entry)
                        <option value="{{ $id }}" {{ old('category_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach --}}
                </select>
                @if($errors->has('category'))
                    <span class="text-danger">{{ $errors->first('category') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.criterion.fields.category_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.criterion.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.criterion.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.criterion.fields.percentage') }}</label>
                <select class="form-control {{ $errors->has('percentage') ? 'is-invalid' : '' }}" name="percentage" id="percentage">
                    <option value disabled {{ old('percentage', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Criterion::PERCENTAGE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('percentage', '100%') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('percentage'))
                    <span class="text-danger">{{ $errors->first('percentage') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.criterion.fields.percentage_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.criterion.fields.description') }}</label>
                <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{{ old('description') }}</textarea>
                @if($errors->has('description'))
                    <span class="text-danger">{{ $errors->first('description') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.criterion.fields.description_helper') }}</span>
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
@section('scripts')
{{-- modified script --}}
<script>
    $(document).ready(function () {
        $('#title_id').change(function (e) {
            e.preventDefault();


            var $category = $('#category_id');
            $.ajax({
                url: "{{ route('admin.combobox.category') }}",
                data: {
                        title_id: $(this).val()
                    },
                success: function (data) {
                    $category.html('<option value="" selected>Please select</option>');
                        $.each(data, function (id, value) {
                            $category.append('<option value="' + id + '">' + value + '</option>');
                        });


                    $('#category_id').attr('disabled', false);
                }
            });


        });

    });
</script>
@endsection
