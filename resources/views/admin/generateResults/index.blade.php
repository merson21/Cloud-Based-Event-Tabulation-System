@extends('layouts.admin')
@section('styles')

    <title>{{ trans('panel.site_title') }}</title>


    <!-- Font Awesome -->
    <link href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/adminlte.min.css') }}" rel="stylesheet" />

  <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

@endsection
@section('content')


{{-- select tabulation title --}}

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-lg-12">

                <form method="GET" action="{{ route("admin.results.store") }}" enctype="multipart/form-data">
                    {{-- @csrf --}}
                    <div class="form-group">
                        <label class="required" for="title_id">{{ trans('cruds.criterion.fields.title') }}</label>
                        <select class="form-control d-block" name="title_id" id="title_id" required>
                            <option value="" selected disabled>Please select</option>
                            @foreach($titles as $id => $title)
                                <option value="{{ $title->id }}" >{{ $title->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <hr>
                    <input type="button" class="btn btn-primary px-3 mx-1" value="View result" style="float: right;">
                    <input type="button" class="btn btn-primary px-3 mx-1" value="Create new" style="float: right;" id="createNew" >
                </form>

            </div>
        </div>
    </div>
</div>

    {{-- choose to create --}}
    {{-- <div class="card d-none" id="CreateFrom">
        <div class="card-body">
            <div class="form-group">
                <label class="required">Create from</label>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="category" name="CreateFrom" value="1" checked required>
                        <label class="form-check-label" for="category">Category</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="criteria" name="CreateFrom" value="2" required>
                        <label class="form-check-label" for="criteria">Criteria</label>
                    </div>
                    <hr>
                    <input type="button" class="btn btn-primary px-3" value="Next" style="float: right;" id="nextFrom">

            </div>
        </div>
    </div> --}}
    <div class="card card-info d-none" id="CreateFrom">
        <div class="card-header">
          <h3 class="card-title">Create from</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label class="required">Create from</label>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="category" name="CreateFrom" value="1" checked required>
                        <label class="form-check-label" for="category">Category</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="criteria" name="CreateFrom" value="2" required>
                        <label class="form-check-label" for="criteria">Criteria</label>
                    </div>
                    <hr>
                    <input type="button" class="btn btn-primary px-3" value="Next" style="float: right;" id="nextFrom" data-card-widget="collapse">

            </div>
        </div>
    </div>

    {{-- selected category --}}
    <div class="card card-info d-none" id="selectCategory">
        <div class="card-header">
          <h3 class="card-title">Choose category</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body" id="selectedCategory">

        </div>
    </div>

    {{-- selected criteria --}}
    {{-- <div class="card d-none" id="selectCriteria"> --}}
    <div class="card card-info d-none" id="selectCriteria">
        <div class="card-header">
            <h3 class="card-title">Criteria from</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label class="required" for="category_id">Select Category</label>
                        <select class="form-control  d-block" name="category_id" id="category_id" required>
                            {{-- optionk --}}
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="required" for="criteria_id">Choose Criteria</label>
                        <select class="form-control  d-block" name="criteria_id" id="criteria_id" required disabled>
                            {{-- option --}}
                        </select>
                    </div>
                </div>
            </div>
            <hr>
            <input type="button" class="btn btn-primary px-3" value="Next" style="float: right;" id="nextCriteria" data-card-widget="collapse" disabled>
        </div>
    </div>

    {{-- Generated Participant --}}
    <div class="card" id="selectParticipants">
        <div class="card-header">
            Generated scores
        </div>
        <div class="card-body" id="tableParticipants">

            {{-- table from male --}}


            {{-- table from female --}}
            {{-- <table id="double2" class="table table-bordered table-hover {{ Session::get('main-body') ? "table-dark" : "" }} disabled">
                <thead>
                    <tr>
                        <th width="10" class="text-center"></th>
                        <th width="10" class="text-center">Type</th>
                        <th class="text-center text-nowrap">Participant Name</th>
                        <th class="text-center text-nowrap">Judge or Criteria</th>
                        <th class="text-center text-nowrap">Judge or Criteria</th>
                        <th width="10" class="text-center text-nowrap">Percentage</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td width="10" class="text-center">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" id="customCheckbox1" value="option1">
                                <label for="customCheckbox1" class="custom-control-label"></label>
                            </div>
                        </td>
                        <th width="10" class="text-center text-nowrap">Ms. 1</th>
                        <th>Participant Name</th>
                        <th>Judge or Criteria</th>
                        <th>Judge or Criteria</th>
                        <th width="10" class="text-center text-nowrap">100%</th>
                    </tr>
                    <tr>
                        <td width="10" class="text-center text-nowrap">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" id="customCheckbox1" value="option1">
                                <label for="customCheckbox1" class="custom-control-label"></label>
                            </div>
                        </td>
                        <th width="10" class="text-center text-nowrap">Ms. 2</th>
                        <th>Participant Name</th>
                        <th>Judge or Criteria</th>
                        <th>Judge or Criteria</th>
                        <th width="10" class="text-center text-nowrap">100%</th>
                    </tr>
                    <tr>
                        <td width="10" class="text-center text-nowrap">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" id="customCheckbox1" value="option1">
                                <label for="customCheckbox1" class="custom-control-label"></label>
                            </div>
                        </td>
                        <th width="10" class="text-center text-nowrap">Ms. 3</th>
                        <th>Participant Name</th>
                        <th>Judge or Criteria</th>
                        <th>Judge or Criteria</th>
                        <th width="10" class="text-center text-nowrap">100%</th>
                    </tr>
                </tbody>

                <tfoot>
                    <th width="10" class="text-center"></th>
                    <th width="10" class="text-center">Type</th>
                    <th class="text-center text-nowrap">Participant Name</th>
                    <th class="text-center text-nowrap">Judge or Criteria</th>
                    <th class="text-center text-nowrap">Judge or Criteria</th>
                    <th width="10" class="text-center text-nowrap">Percentage</th>
                </tfoot>

            </table>
            <hr> --}}

            {{-- <input type="button" class="btn btn-primary px-3 m-1" value="Next" style="float: right;" id="nextParticipant">
            <input type="button" class="btn btn-primary px-3 m-1" value="Move to elimination Round " style="float: right;"> --}}
        </div>

    </div>

    {{-- Input Title --}}
    <div class="card d-none" id="inputTitle">
        <div class="card-header">
            Generated Title
        </div>
        <div class="card-body">
            <div class="form-group">
                <label class="required" for="name">Name</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
            </div>

            <hr>
            <input type="button" class="btn btn-primary px-3" value="Save" style="float: right;">
        </div>
    </div>


     {{-- loading spint --}}
    <div class="d-none" id="loadingSpin">
        <h2 class="text-center">loading...<i class="fa fa-sync fa-spin"></i></h2>
    </div>




@endsection

@section('scripts')
<!-- Page specific script -->
<script>
  $(function () {


  });
</script>


<!-- AdminLTE App -->
{{-- <script src="{{ asset('assets/js/adminlte.js') }}"></script> --}}
<script src="{{ asset('js/main.js') }}"></script>


<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- DataTables  & Plugins -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

    <script>
        $(document).ready(function () {

            //create new button
            $('#createNew').click(function (e) {
                e.preventDefault();
                var titleData = $('#title_id').val();

                $('#loadingSpin').removeClass('d-none');
                if (titleData) {
                    $('#CreateFrom').removeClass('d-none');
                }else(
                    alert('Please select any tabulation title!')
                )
                $('#loadingSpin').addClass('d-none');

            });

            //hide all div
            $('#title_id').change(function (e) {
                    e.preventDefault();
                    $('#loadingSpin').removeClass('d-none');
                    $('#CreateFrom').addClass('d-none');
                    $('#selectCategory').addClass('d-none');
                    $('#selectCriteria').addClass('d-none');
                    $('#selectParticipants').addClass('d-none');
                    $('#inputTitle').addClass('d-none');
                    $('#loadingSpin').addClass('d-none');
            });

            //click create from button
            $('#nextFrom').click(function (e) {
                e.preventDefault();

                $('#selectCategory').addClass('d-none');
                $('#selectCriteria').addClass('d-none');
                $('#selectParticipants').addClass('d-none');
                $('#inputTitle').addClass('d-none');

                var CreateFrom = $('input[name="CreateFrom"]:checked').val();

               if (CreateFrom == 1) {
                    var $selectedCategory = $('#selectedCategory');

                    $('#loadingSpin').removeClass('d-none');

                    $.ajax({

                        url: "{{ url('admin/generate-results/selectedCategory')}}",
                        data: {

                            title_id: $('#title_id').val(),

                            },
                        success: function (data) {
                            //console.log(data[0].id)
                            $selectedCategory.html('');
                            $selectedCategory.append('<table id="example1" class="table table-bordered table-hover disabled">'
                                                            +'<thead><tr><th width="10" class="text-center"></th>'
                                                            +'<th>Category Name</th><th width="10" class="text-center text-nowrap">Percentage</th></tr>'
                                                            +'</thead><tbody id="AddTableSelectedCategory">');

                            $selectedCategory.append('</tbody></table><hr> <input type="button" class="btn btn-primary px-3" value="Next" style="float: right;" id="nextCategory" data-card-widget="collapse" disabled>');

                            var $AddTableSelectedCategory = $('#AddTableSelectedCategory');
                            //$AddTableSelectedCategory.html('');

                            $.each(data, function (id, value) {
                                $AddTableSelectedCategory.append('<tr><td class="text-center text-nowrap"><div class="form-group has-validation d-flex justify-content-center">'
                                                            +'<input class="text-center form-control" type="checkbox" value="'+ value.id +'" name="selectedCategory[]" data-percentage="' + value.percentage + '"></div></td>'
                                                            +'<td>'+ value.name +'</td>'
                                                            +'<td width="10" class="text-center text-nowrap">'+ value.percentage +'%</td></tr>')

                            });


                            $('#example1').DataTable({
                                "paging": false,
                                "lengthChange": false,
                                "searching": true,
                                "ordering": true,
                                "info": true,
                                "autoWidth": false,
                                "responsive": true,
                            });

                            $('#loadingSpin').addClass('d-none');
                            $('#selectCategory').removeClass('d-none');



                        },
                        errors: function (data) {
                            $('#loadingSpin').addClass('d-none');
                        }

                    });


               }else{


                var $selectedCriteria = $('#category_id');
                $('#loadingSpin').removeClass('d-none');

                $.ajax({

                    url: "{{ url('admin/generate-results/selectedCategory')}}",
                    data: {

                        title_id: $('#title_id').val(),

                        },
                    success: function (data) {
                        //console.log(data[0].id)
                        $selectedCriteria.html('<option value="" selected>Please select</option>');
                        $.each(data, function (id, value) {
                            $selectedCriteria.append('<option value="'+ value.id +'">'+ value.name +'</option>')

                        });

                        $('#loadingSpin').addClass('d-none');
                        $('#selectCriteria').removeClass('d-none');

                    },
                    errors: function (data) {
                        $('#loadingSpin').addClass('d-none');
                    }

                });


               }


            });

            //Selected confirmation if exactly 100% the selected
            $(document).on('change', 'input[name="selectedCategory[]"]', function(e) {
                e.preventDefault();
                var val = [];
                var PerTotal = parseInt(0);
                $('input[name="selectedCategory[]"]:checked').each(function(i){
                    PerTotal = parseInt(PerTotal) + parseInt($(this).data('percentage'));
                });
                console.log(PerTotal);

                if (PerTotal == '100') {
                    $('#nextCategory').attr('disabled', false);
                }else{
                    $('#nextCategory').attr('disabled', true);
                    $('#selectParticipants').addClass('d-none');
                    $('#inputTitle').addClass('d-none');
                }


            });

            //if the criteria changes
            $('#criteria_id').change(function (e) {
                e.preventDefault();

                $('#selectParticipants').addClass('d-none');
                $('#selectCategory').addClass('d-none');
                $('#inputTitle').addClass('d-none');
                if ($('#criteria_id').val()) {
                    $('#nextCriteria').attr('disabled', false);
                }else{
                    $('#nextCriteria').attr('disabled', true);
                }

            });

            $('#category_id').change(function (e) {
                e.preventDefault();

                $('#selectParticipants').addClass('d-none');
                $('#selectCategory').addClass('d-none');
                $('#inputTitle').addClass('d-none');
                $('#nextCriteria').attr('disabled', true);

                var $criteria = $('#criteria_id');
                $.ajax({
                    url: "{{ route('admin.combobox.criteria') }}",
                    data: {
                        category_id: $(this).val()
                        },
                    success: function (data) {
                        $criteria.html('<option value="" selected>Please select</option>');
                            $.each(data, function (id, value) {
                                $criteria.append('<option value="' + id + '">' + value + '</option>');
                            });


                        $('#criteria_id').attr('disabled', false);
                    }
                });


            });

            //click select category button
            //$('#nextCategory').click(function (e) {
            $(document).on('click', '#nextCategory', function(e) {
                e.preventDefault();
                var $dataTable = $('#tableParticipants');

                $('#loadingSpin').removeClass('d-none');
                $('#selectParticipants').addClass('d-none');
                $('#inputTitle').addClass('d-none');

                var myCheckboxes = new Array();
                $('input[name="selectedCategory[]"]:checked').each(function() {
                    myCheckboxes.push($(this).val());
                });
                //console.log(myCheckboxes);

                $.ajax({
                    url: "{{ route('admin.generate-results.generateParticipant') }}",
                    data: {

                        title_id: $('#title_id').val(),
                        category_id: myCheckboxes,

                        },
                    success: function (data) {
                        $dataTable.html('');
                        $dataTable.html(data);


                        $('#loadingSpin').addClass('d-none');
                        $('#selectParticipants').removeClass('d-none');


                        for (let index = 1; index <= 15; index++) {
                            $('#double' + index).DataTable({
                                "paging": false,
                                "lengthChange": false,
                                "searching": true,
                                "ordering": true,
                                "info": true,
                                "autoWidth": false,
                                "responsive": true,
                                "order": [[ (parseInt($('#lastcolumn' + index).data('lastcolumn'))+2), "desc" ]]
                            });
                        }
                    }
                });

            });

            //click select criteria button
            //$('#nextCriteria').click(function (e) {
            $(document).on('click', '#nextCriteria', function(e) {
                e.preventDefault();
                var $dataTable = $('#tableParticipants');

                $('#loadingSpin').removeClass('d-none');
                $('#selectParticipants').addClass('d-none');
                $('#inputTitle').addClass('d-none');

                var myCheckboxes = new Array();
                $('input[name="selectedCategory[]"]:checked').each(function() {
                    myCheckboxes.push($(this).val());
                });
                //console.log(myCheckboxes);

                $.ajax({
                    url: "{{ route('admin.generate-results.generateParticipantCriteria') }}",
                    data: {

                        title_id: $('#title_id').val(),
                        category_id: $('#category_id').val(),
                        criteria_id: $('#criteria_id').val()

                        },
                    success: function (data) {
                        $dataTable.html('');
                        $dataTable.html(data);

                        $('#loadingSpin').addClass('d-none');
                        $('#selectParticipants').removeClass('d-none');


                        for (let index = 1; index <= 15; index++) {
                            $('#double' + index).DataTable({
                                "paging": false,
                                "lengthChange": false,
                                "searching": true,
                                "ordering": true,
                                "info": true,
                                "autoWidth": false,
                                "responsive": true,
                                "order": [[ (parseInt($('#lastcolumn' + index).data('lastcolumn'))+2), "desc" ]]
                            });
                        }
                    }
                });


            });

            //click choose participant button
            //$('#nextParticipant').click(function (e) {
            $(document).on('click', '#nextParticipant', function(e) {

                e.preventDefault();
                $('#inputTitle').removeClass('d-none');

            });

            function nextChar(cchar) {
                    return String.fromCharCode('A'.charCodeAt() + cchar);
            }

            $(document).on('click', '.moveParticipant', function(e) {
                var rowcount = parseInt($(this).data('rows-count'));
                var colcount = $(this).data('column-count');
                var $this = $(this);
                //alert($('input[name="D1"]').data('participant-id'));
                for (let x = 1; x <= rowcount; x++) {
                    JudgeScore = 'input[name="' + nextChar(colcount) + x + '"]';

                    if ($(JudgeScore).is(':checked')) {
                        $.ajax({
                                //url: " url('tabulation/'.slug.'/' . $categories->where('id',$categorySelected)->first()->id . '/saveaverage')",
                                url: "{{ route('admin.generate-results.generateMoveElim') }}",
                                data: {
                                        title_id: $('#title_id').val(),
                                        category_id: $(this).data('category-id'),
                                        participant_id: $(JudgeScore).data('participant-id')
                                    },
                                success: function (data) {
                                    console.log(data)

                                    if (x == rowcount) {
                                        $($this).val('Move done!')
                                    }
                                },
                                errors: function (data) {
                                    console.log(data)
                                }

                        });
                    }

                }

            });

            function JudgeSaveAverage($this){
                //Save Judge Scores



        }

            //saving option
            $('#selectParticipants').addClass('d-none');

        });
    </script>

    <script>
        function ComputeTotalScore($this){
                    //$($this).addClass('border border-danger');

                    //COMPUTATION BEGIN!!!

                    var maxScore = $($this).attr('max');
                    var rowCount = $($this).data('row-count');
                    var criteriaCount = $($this).data('criteria-count')
                    var ScoreData = parseFloat(0);
                    var TotalScore = parseFloat(0);
                    var CriteriaPercentage = parseFloat(0);
                    var JudgeScore;


                    for (let i = 1; i <= criteriaCount; i++) {

                        //reset
                        ScoreData = 0
                        CriteriaPercentage = 0

                        JudgeScore = 'input[name="' + nextChar(i-1) + rowCount + '"]';

                        //get score
                        ScoreData = parseFloat($(JudgeScore).last().val());
                        CriteriaPercentage = parseFloat($(JudgeScore).last().data('percentage'))/100;


                        if (isNaN(ScoreData)) {
                            //skip not a number
                        }else{
                            $(JudgeScore).last().removeClass('is-invalid');
                            $(JudgeScore).last().addClass('is-valid');

                            //compute percentage
                            ScoreData = parseFloat(ScoreData) * parseFloat(CriteriaPercentage);
                            TotalScore = parseFloat(TotalScore) + parseFloat(ScoreData);
                        }

                        $(JudgeScore).last().removeClass('d-none');
                        $(JudgeScore).last().siblings().addClass('d-none');

                    }

                    //compute final output
                    TotalScore = (parseFloat(TotalScore) / parseFloat(maxScore)) * 100;
                    $averageTotal = '.TotalAverage' + rowCount;
                    $($averageTotal).html(TotalScore.toFixed(2) + '%');

                    JudgeSaveAverage($averageTotal);



        }
    </script>

@endsection
