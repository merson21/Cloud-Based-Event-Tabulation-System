@extends('layouts.admin')

@section('content')

<div class='row'>
    <div class='col-md-12'>
        <div class="card panel-default">
            <div class="card-header">
                @lang('global.app_csvImport')
            </div>

            <div class="card-body table-responsive">
                <form class="form-horizontal" method="POST" action="{{ route($routeName) }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="filename" value="{{ $filename }}" />
                    <input type="hidden" name="hasHeader" value="{{ $hasHeader }}" />
                    <input type="hidden" name="modelName" value="{{ $modelName }}" />
                    <input type="hidden" name="redirect" value="{{ $redirect }}" />

                    <div class="form-group">
                        <label class="required" for="organization_id">{{ trans('cruds.voter.fields.organization') }}</label>
                        <select class="form-control select2 {{ $errors->has('organization') ? 'is-invalid' : '' }}" name="fields[0]" id="organization_id" required>
                            @foreach($organizations as $id => $entry)
                                <option value="{{ $id }}" {{ old('organization_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('organization'))
                            <span class="text-danger">{{ $errors->first('organization') }}</span>
                        @endif
                        <span class="help-block">{{ trans('cruds.voter.fields.organization_helper') }}</span>
                    </div>
                    <input type="hidden" name="fields[1]" value="false" />
                    <input type="hidden" name="fields[2]" value="{{auth()->user()->team->id}}" />


                    <table class="table">
                        <tr>
                            <th>Voter name</th>
                            <th>Email</th>
                        </tr>
                        @if(isset($headers))
                            <tr>
                                @foreach($headers as $field)
                                    <td>{{ $field }}</td>
                                @endforeach
                            </tr>
                        @endif
                        @if($lines)
                            @foreach($lines as $line)
                                <tr>
                                    @foreach($line as $field)
                                        <td>{{ $field }}</td>
                                    @endforeach
                                </tr>
                            @endforeach
                        @endif
                        <tr class="d-none">
                            @foreach($headers as $key => $header)
                                <td>
                                    <select name="fields[{{ $key+3 }}]">
                                        {{-- <option value=''>Please select</option> --}}

                                        @foreach($fillables as $k => $fillable)

                                            @if ( $key+3 == 3 && $fillable == 'name')
                                                <option value="{{ $fillable }}" {{ strtolower($header) === strtolower($fillable) ? 'selected' : '' }}>{{ $fillable }}</option>
                                            @elseif ( $key+3 == 4 && $fillable == 'email')
                                                <option value="{{ $fillable }}" {{ strtolower($header) === strtolower($fillable) ? 'selected' : '' }}>{{ $fillable }}</option>
                                            @endif


                                        @endforeach

                                    </select>
                                </td>
                            @endforeach
                        </tr>
                    </table>

                    <button type="submit" class="btn btn-primary">
                        @lang('global.app_import_data')
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
