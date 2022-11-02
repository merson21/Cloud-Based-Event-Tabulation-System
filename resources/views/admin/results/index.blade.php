@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('cruds.result.title') }}
    </div>

    <div class="card-body">
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">

                <form method="POST" action="{{ route("admin.results.store") }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="required"
                            for="organization_id">{{ trans('cruds.voter.fields.organization') }}</label>
                        <select class="form-control w-100" name="organization_id" id="organization_id" required>
                            @foreach($elections as $election)
                            <option value="{{ $election->id }}"
                                {{ old('organization_id') == $election->id ? 'selected' : '' }}>{{ $election->title }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary" id="btnload" data-toggle="modal" data-target="#generateModal" >
                        Generate Result
                    </button>
                    <button class="btn btn-success" id="btnloademail" data-toggle="modal" data-target="#Send_Email" onclick="printData();" @if (empty($AuditVoters)) disabled @endif>
                        PRINT
                    </button>
                </form>



            </div>
        </div>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-result" id="printResult">

                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.user.fields.id') }}
                        </th>
                        <th>
                            Position
                        </th>
                        <th>
                            Candidate
                        </th>
                        <th width="10">
                            Votes
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @if (!empty($AuditVoters))

                        @foreach($AuditVoters as $key => $AuditVoter)

                                <tr data-entry-id="{{ $AuditVoter->id }}">
                                    <td>

                                    </td>
                                    <td>
                                        {{ $key ?? '' }}
                                    </td>
                                    <td>
                                        {{ $AuditVoter->position->position ?? '' }}
                                    </td>
                                    <td>
                                        {{ $AuditVoter->Candidate->name ?? '' }}
                                    </td>
                                    <td class="text-center">
                                        {{ $AuditVoteCount->groupBy('candidate_id')[$AuditVoter->candidate->id]->count() }}
                                    </td>
                                </tr>

                        @endforeach

                    @endif
                </tbody>


            </table>
        </div>
    </div>

</div>


@endsection
@section('scripts')
@parent

<script>
        $(function() {
        let copyButtonTrans = '{{ trans('global.datatables.copy') }}'
        let csvButtonTrans = '{{ trans('global.datatables.csv') }}'
        let excelButtonTrans = '{{ trans('global.datatables.excel') }}'
        let pdfButtonTrans = '{{ trans('global.datatables.pdf') }}'
        let printButtonTrans = '{{ trans('global.datatables.print') }}'
        let colvisButtonTrans = '{{ trans('global.datatables.colvis') }}'
        let selectAllButtonTrans = '{{ trans('global.select_all') }}'
        let selectNoneButtonTrans = '{{ trans('global.deselect_all') }}'

        let languages = {
            'en': 'https://cdn.datatables.net/plug-ins/1.10.19/i18n/English.json'
        };

    $.extend(true, $.fn.dataTable.Buttons.defaults.dom.button, { className: 'btn' })
    $.extend(true, $.fn.dataTable.defaults, {
        language: {
        url: languages['{{ app()->getLocale() }}']
        },
        columnDefs: [
            {
                orderable: false,
                visible: false,
                targets: 0

            },
            {
                orderable: false,
                visible: false,
                targets: 1

            },
            {
                orderable: true,
                visible: false,
                targets: 2

            },
            {
                orderable: false,
                targets: 3

            },
            {
                orderable: false,
                targets: 4

            },
        ],
        order: [],
        displayLength: 100,
        drawCallback: function ( settings ) {
            var api = this.api();
            var rows = api.rows( {page:'current'} ).nodes();
            var last=null;

            api.column(2, {page:'current'}).data().each(function ( group, i){
                if (last !== group) {
                    $(rows).eq(i).before(
                        '<tr class="bg-secondary text-light"><td colspan="5"><h4><b>'+group+'</b></h4></td></tr>'
                    );
                    last = group;
                }
            });

        },
        scrollX: true,
        pageLength: 100,
        dom: 'lBfrtip<"actions">',
        buttons: [
        {
            extend: 'csv',
            className: 'btn-default',
            text: csvButtonTrans,
            exportOptions: {
            columns: ':visible'
            }
        },
        {
            extend: 'excel',
            className: 'btn-default',
            text: excelButtonTrans,
            exportOptions: {
            columns: ':visible'
            }
        },
        {
            extend: 'pdf',
            className: 'btn-default',
            text: pdfButtonTrans,
            exportOptions: {
            columns: ':visible'
            }
        },
        {
            extend: 'print',
            className: 'btn-default',
            text: printButtonTrans,
            exportOptions: {
            columns: ':visible'
            }
        },
        {
            extend: 'colvis',
            className: 'btn-default',
            text: colvisButtonTrans,
            exportOptions: {
            columns: ':visible'
            }
        }
        ]
    });

    $.fn.dataTable.ext.classes.sPageButton = '';
    });

</script>

<script>
            $(function () {
        let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)


        $.extend(true, $.fn.dataTable.defaults, {
            orderCellsTop: true,
            pageLength: 100,
        });
        let table = $('.datatable-result:not(.ajaxTable)').DataTable({ buttons: dtButtons })
        $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
            $($.fn.dataTable.tables(true)).DataTable()
                .columns.adjust();
        });

        })

</script>

@if (!empty($AuditVoters))

<script>
    function printData() {

        // var divName= "#printResult";
        // var printContents = document.getElementById(divName).innerHTML;
        // var originalContents = document.body.innerHTML;

        // document.body.innerHTML = printContents;

        // window.print();
        // document.body.innerHTML = originalContents;

        var printContents = $('#printResult').html();

        // var originalContents = $('body').html();

        // $('body').html(printContents)

        // window.print();

        // $('body').html(originalContents)

        var pageTitle = 'Print Form',
            Title = '{{$electionTitle->title}}',
            stylesheet = 'https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css',
            x=window.open();

            x.document.open("","","width=900,height=700");
            x.document.write(
                '<html><head><title>' + pageTitle + '</title>' +
                '<link rel="stylesheet" href="' + stylesheet + '">' +
                '</head><body><h1>'+ Title +'</h1><table class=" table table-bordered table-striped table-hover>' + printContents + '</table></body></html>');
            x.document.close();
            x.focus();
            x.print();

    }
</script>

@endif
@endsection
