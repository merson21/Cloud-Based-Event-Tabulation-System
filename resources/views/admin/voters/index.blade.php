@extends('layouts.admin')
@section('content')
@can('voter_create')

{{-- @if (Session::get('generate-success'))

@endif --}}
{{-- {{session('message')}} --}}


<div style="margin-bottom: 10px;" class="row">
    <div class="col-lg-12">
        <a class="btn btn-success" href="{{ route('admin.voters.create') }}">
            {{ trans('global.add') }} {{ trans('cruds.voter.title_singular') }}
        </a>
        <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
            {{ trans('global.app_csvImport') }}
        </button>
        <button class="btn btn-danger" id="btnload" data-toggle="modal" data-target="#generateModal">
            {{ trans('global.generate') }}
        </button>
        <button class="btn btn-danger d-none" id="btnloading" type="button" disabled>
            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
            {{ trans('cruds.voter.fields.voterGenerate') }}
        </button>

        <button class="btn btn-primary" id="btnloademail" data-toggle="modal" data-target="#Send_Email">
            {{ trans('cruds.voter.fields.send_ID') }}
        </button>

        <button class="btn btn-primary d-none" id="btnloadingemail" type="button" disabled>
            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
            {{ trans('cruds.voter.fields.voterSend') }}
        </button>

        @include('csvImport.modal', ['model' => 'Voter', 'route' => 'admin.voters.parseCsvImport'])
    </div>
</div>
@endcan

<div class="card">
    <!-- Modal -->
    <div class="modal fade" id="generateModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><strong>Generate Voters ID</strong></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ route("admin.voters.generate") }}" id="GenerateForm" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="required" for="status">{{ trans('cruds.voter.fields.voterStatus') }}</label>
                            <select class="form-control select" name="status" id="status" required>

                                <option value="All" selected>All</option>
                                <option value="true">Voted</option>
                                <option value="false">Unvoted</option>

                            </select>

                            <span class="help-block">{{ trans('cruds.voter.fields.status_helper') }}</span>
                        </div>

                        <div class="form-group">
                            <label class="required"
                                for="organization_id">{{ trans('cruds.voter.fields.organization') }}</label>
                            <select class="form-control select" name="organization_id" id="organization_id" required>
                                @foreach($organizations as $id => $entry)
                                <option value="{{ $entry->id }}"
                                    {{ old('organization_id') == $entry->id ? 'selected' : '' }}>{{ $entry->title }}
                                </option>
                                @endforeach
                            </select>
                            @if($errors->has('organization'))
                            <span class="text-danger">{{ $errors->first('organization') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.voter.fields.organization_helper') }}</span>
                        </div>

                    </div>

                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" id="loadvotersid" class="btn btn-primary"
                            data-dismiss="modal">{{ trans('global.generate') }}</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <!-- Modal -->
    <div class="modal fade" id="Send_Email">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><strong>Send Voters ID</strong></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ route("admin.voters.sendid") }}" id="SendForm" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="required" for="status2">{{ trans('cruds.voter.fields.voterStatus') }}</label>
                            <select class="form-control select" name="status" id="status2" required>

                                <option value="All" selected>All</option>
                                <option value="true">Voted</option>
                                <option value="false">Unvoted</option>

                            </select>

                            <span class="help-block">{{ trans('cruds.voter.fields.status_helper') }}</span>
                        </div>

                        <div class="form-group">
                            <label class="required"
                                for="organization_id2">{{ trans('cruds.voter.fields.organization') }}</label>
                            <select class="form-control select" name="organization_id" id="organization_id2" required>
                                @foreach($organizations as $id => $entry)
                                <option value="{{ $entry->id }}"
                                    {{ old('organization_id') == $entry->id ? 'selected' : '' }}>{{ $entry->title }}
                                </option>
                                @endforeach
                            </select>
                            @if($errors->has('organization'))
                            <span class="text-danger">{{ $errors->first('organization') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.voter.fields.organization_helper') }}</span>
                        </div>

                    </div>

                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" id="loadsendid" class="btn btn-primary"
                            data-dismiss="modal">{{ trans('global.sendid') }}</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>


<div class="card">
    <div class="card-header">
        {{ trans('cruds.voter.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Voter">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.voter.fields.status') }}
                    </th>
                    <th>
                        {{ trans('cruds.voter.fields.organization') }}
                    </th>
                    <th>
                        {{ trans('cruds.voter.fields.votersid') }}
                    </th>
                    <th>
                        {{ trans('cruds.voter.fields.name') }}
                    </th>
                    <th>
                        {{ trans('cruds.voter.fields.address') }}
                    </th>
                    <th>
                        {{ trans('cruds.voter.fields.gender') }}
                    </th>
                    <th>
                        {{ trans('cruds.voter.fields.age') }}
                    </th>
                    <th>
                        {{ trans('cruds.voter.fields.email') }}
                    </th>
                    <th>
                        {{ trans('cruds.voter.fields.contact') }}
                    </th>
                    <th>
                        {{ trans('cruds.voter.fields.description') }}
                    </th>
                    <th>
                        &nbsp;
                    </th>
                </tr>
                <tr>
                    <td>
                    </td>
                    <td>
                        <select class="search" strict="true">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach(App\Models\Voter::STATUS_RADIO as $key => $item)
                            <option value="{{ $key }}">{{ $item }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <select class="search">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach($organizations as $key => $item)
                            <option value="{{ $item->title }}">{{ $item->title }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <select class="search" strict="true">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach(App\Models\Voter::GENDER_RADIO as $key => $item)
                            <option value="{{ $key }}">{{ $item }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                    </td>
                </tr>
            </thead>
        </table>
    </div>
</div>

@endsection
@section('scripts')
@parent
<script>
        $(function () {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
            @can('voter_delete')
            let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
            let deleteButton = {
                text: deleteButtonTrans,
                url: "{{ route('admin.voters.massDestroy') }}",
                className: 'btn-danger',
                action: function (e, dt, node, config) {
                var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
                    return entry.id
                });

                if (ids.length === 0) {
                    alert('{{ trans('global.datatables.zero_selected') }}')

                    return
                }

                if (confirm('{{ trans('global.areYouSure') }}')) {
                    $.ajax({
                    headers: {'x-csrf-token': _token},
                    method: 'POST',
                    url: config.url,
                    data: { ids: ids, _method: 'DELETE' }})
                    .done(function () { location.reload() })
                }
                }
            }
            dtButtons.push(deleteButton)
            @endcan

            let dtOverrideGlobals = {
                buttons: dtButtons,
                processing: true,
                serverSide: true,
                retrieve: true,
                aaSorting: [],
                ajax: "{{ route('admin.voters.index') }}",
                columns: [
                { data: 'placeholder', name: 'placeholder' },
            { data: 'status', name: 'status' },
            { data: 'organization_title', name: 'organization.title' },
            { data: 'votersid', name: 'votersid' },
            { data: 'name', name: 'name' },
            { data: 'address', name: 'address' },
            { data: 'gender', name: 'gender' },
            { data: 'age', name: 'age' },
            { data: 'email', name: 'email' },
            { data: 'contact', name: 'contact' },
            { data: 'description', name: 'description' },
            { data: 'actions', name: '{{ trans('global.actions') }}' }
                ],
                orderCellsTop: true,
                order: [[ 1, 'desc' ]],
                pageLength: 100,
            };
            let table = $('.datatable-Voter').DataTable(dtOverrideGlobals);
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

            let visibleColumnsIndexes = null;
            $('.datatable thead').on('input', '.search', function () {
                let strict = $(this).attr('strict') || false
                let value = strict && this.value ? "^" + this.value + "$" : this.value

                let index = $(this).parent().index()
                if (visibleColumnsIndexes !== null) {
                    index = visibleColumnsIndexes[index]
                }

                table
                    .column(index)
                    .search(value, strict)
                    .draw()
            });
            table.on('column-visibility.dt', function(e, settings, column, state) {
                visibleColumnsIndexes = []
                table.columns(":visible").every(function(colIdx) {
                    visibleColumnsIndexes.push(colIdx);
                });
            })
            });

</script>
<script>
    $(document).ready(function () {
        //modal generate id
        $('#loadvotersid').click(function (e) {
            e.preventDefault();
            $('#btnloading').removeClass('d-none');
            $('#btnload').addClass('d-none');

            var base_url = window.location.origin;

            $.ajax({
                type: "POST",
                url: "/admin/voters/generate",
                data: $('#GenerateForm').serialize(),
                success: function (response) {
                    console.log(response);
                    window.location.href = "{{ route('admin.voters.index') }}";


                },
                error: function (error) {
                    console.log(error);

                }
            });
        });

        //modal send form
        $('#loadsendid').click(function (e) {
            e.preventDefault();
            $('#btnloadingemail').removeClass('d-none');
            $('#btnloademail').addClass('d-none');

            var base_url = window.location.origin;
            $.ajax({
                type: "POST",
                url: "/admin/voters/sendid",
                data: $('#SendForm').serialize(),
                success: function (response) {
                    console.log(response);
                    window.location.href = "{{ route('admin.voters.index') }}";

                },
                error: function (error) {
                    console.log(error);

                }
            });

        });
    });

</script>
@endsection
