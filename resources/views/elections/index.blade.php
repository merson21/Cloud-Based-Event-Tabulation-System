@extends('layouts.election')
@section('content')


<div class="jumbotron">
    <h2 class="page-header text-center title text-black"><b>{{$elections->title}}</b></h2>
</div>
@if ($voterData->status == "true")
    <div class="jumbotron">
        <h4 class="page-header text-center title text-black"><b>You have already voted for this election</b></h4>
        {{-- SUBMIT BUTTON --}}
        <div class="text-center my-5">
            <button type="button" class="btn btn-primary btn-flat p-5" id="preview" data-toggle="modal" data-target="#viewBallow"><i
                    class="fa fa-file-text"></i>
                View ballot</button>
        </div>
    </div>

    <div class="modal fade" id="viewBallow" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Your Votes</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">

                <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">Position</th>
                        <th scope="col">Candidate</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($AuditVoters as $AuditVoter)
                            <tr>
                                <td scope="row">{{$AuditVoter->position->position}}</td>
                                <td>{{$AuditVoter->candidate->name}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
        </div>
    </div>

@else

<!-- Main content -->
<section class="content">
    <div class="row d-flex justify-content-center">
        <div class="col-sm-10 col-sm-offset-1">
            <div class="alert alert-danger alert-dismissible" id="alert" style="display:none;">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <span class="message"></span>
            </div>

            <!-- Voting Ballot -->
            <form method="POST" action="{{ url('e-voting/'.$slug.'/') }}" enctype="multipart/form-data">
                @csrf

                @foreach ($possitionData as $key => $possition)
                    {{-- LOAD POSITION --}}
                    <div class="row" id="position{{$key+1}}">
                        <div class="col-sm-12 border p-2">
                            <div class="box box-solid" id="8">
                                <div class="box-header with-border">
                                    <h3 class="box-title"><b>{{$possition->position}}</b></h3>
                                </div>
                                <div class="box-body">
                                    <p>
                                        @if ($possition->vote_allow == 1)
                                            You can select one candidate only.
                                        @elseif ($possition->vote_allow > 1)
                                            You may vote up to {{$possition->vote_allow}} candidates.
                                        @else
                                            Selecting candidate is not availble.
                                        @endif

                                        <span class="float-right">
                                            <button type="button" class="btn btn-success btn-sm btn-flat reset"
                                                data-desc="president"><i class="fa fa-refresh"></i>
                                                Reset</button>
                                        </span>
                                    </p>
                                    <div id="candidate_list">

                                        <div class="card mb-3 w-100 ">
                                            @php ($count = 0)
                                            @foreach ($CandidateData as $key => $Candidate)
                                                @if ($possition->id == $Candidate->position_id)
                                                             {{-- Candidates --}}
                                                        <div class="row no-gutters border-bottom">
                                                            <div class="col-md-4 d-flex justify-content-center p-2">
                                                                @if($Candidate->image)
                                                                    <img src="{{ $Candidate->image->getUrl('preview') }}" width="50%">
                                                                @endif
                                                            </div>
                                                            <div class="col-md-7 w-100">
                                                                <div class="d-flex justify-content-between px-5 py-2">

                                                                    @if ($possition->vote_allow == 1)
                                                                        <div class="custom-control custom-radio">
                                                                            <input class="custom-control-input" type="radio" id="vote{{$key}}" name="position{{$possition->id}}" value="{{$Candidate->id}}" required>
                                                                            <label for="vote{{$key}}" class="custom-control-label">V O T E</label>
                                                                        </div>
                                                                    @else
                                                                        <div class="custom-control custom-checkbox">
                                                                            <input class="custom-control-input" data-vote-allow="{{$possition->vote_allow}}" type="checkbox" id="vote{{$key}}" name="position{{$possition->id}}[]" value="{{$Candidate->id}}">
                                                                            <label for="vote{{$key}}" class="custom-control-label">V O T E</label>
                                                                        </div>
                                                                    @endif

                                                                    <span class="btn btn-info btn-sm btn-flat reset" data-toggle="modal" @if(!(empty($Candidate->partylist->name))) data-target="#partylist{{$Candidate->partylist->id}}" @else data-target="#partylistDefault" @endif>
                                                                    <i class="fa fa-search"></i> Platform</span>

                                                                </div>

                                                                <div class="card-body text-center">
                                                                    <h4>{{$Candidate->name}}</h4>
                                                                    <p class="card-text"><small class="text-muted">

                                                                        @if (!(empty($Candidate->partylist->name)))
                                                                            {{$Candidate->partylist->name}}
                                                                        @else

                                                                        @endif
                                                                    </small></p>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                        </div>
                                                        @php ($count =  $count + 1)
                                                @endif

                                            @endforeach


                                            @if ($count == 0)
                                                <h3 class="text-center p-5 text-secondary">No candidate available!</h3>
                                            @endif

                                            {{-- Candidates --}}
                                            {{-- <div class="row no-gutters border-bottom">
                                                <div class="col-md-4 d-flex justify-content-center p-2">
                                                    <img src="{{asset('assets')}}/img/team/team-1.jpg" width="50%">
                                                </div>
                                                <div class="col-md-7 w-100">
                                                    <div class="d-flex justify-content-between px-5 py-2">
                                                        <div class="custom-control custom-radio">
                                                            <input class="custom-control-input" type="radio" id="president2"
                                                                name="president" value="false" required>
                                                            <label for="president2" class="custom-control-label">V O T
                                                                E</label>
                                                        </div>
                                                        <span class="btn btn-info btn-sm btn-flat reset"
                                                            data-desc="president"><i class="fa fa-search"></i>
                                                            Platform</span>
                                                    </div>
                                                    <div class="card-body text-center">
                                                        <h3>Merson Labro. Taguiam Jr.</h3>
                                                        <p class="card-text"><small class="text-muted">PARTY-LIST</small></p>
                                                    </div>
                                                </div>
                                                <hr>
                                            </div> --}}


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="card mb-3 w-100 ">

                        </div>

                    </div>

                @endforeach

                {{-- SUBMIT BUTTON --}}
                <div class="text-center my-5">
                    {{-- <button type="button" class="btn btn-success btn-flat" id="preview"><i
                            class="fa fa-file-text"></i>
                        Preview</button> --}}
                    <button type="submit" class="btn btn-primary btn-flat w-100 p-3" name="vote"><i
                            class="fa fa-check-square-o"></i>
                        Submit</button>
                </div>
            </form>

            <!-- End Voting Ballot -->

        </div>
    </div>
</section>


@endif



  <div class="modal fade" id="partylistDefault" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">PARTYLIST PLATFORM</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            <h3 class="text-center p-5 text-secondary">No Platform available!</h3>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
    </div>
    </div>
</div>

  @foreach ($partylistData as $key => $partylist)
        <!-- Preview Modal Platform-->
        <div class="modal fade" id="partylist{{$partylist->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">PARTYLIST PLATFORM</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                {!! $partylist->platform !!}
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
            </div>
        </div>
  @endforeach

<!-- Preview -->
<div class="modal fade" id="preview_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Vote Preview</h4>
            </div>
            <div class="modal-body">
                <div id="preview_body"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i
                        class="fa fa-close"></i> Close</button>
            </div>
        </div>
    </div>
</div>


@endsection
@section('scripts')
<script>
    $(document).ready(function () {

        $('input[type=radio]').change(function () {
            $(this).parents().eq(3).siblings().removeClass('text-white bg-primary');
            $(this).parents().eq(3).addClass('text-white bg-primary');
            //alert(test);
        });

        $('.reset').click(function (e) {
            $(this).parent().parent().siblings().children().children().find('input[type=radio]').prop('checked', false);
            $(this).parent().parent().siblings().children().children().find('input[type=checkbox]').prop('checked', false);
            $(this).parent().parent().siblings().children().children().removeClass('text-white bg-primary');

        });

        //$(this).parents().eq(3).addClass('text-white bg-primary');

        $('input[type=checkbox]').change(function () {

            //to get value of data-* or data-vote-allow
            $(this).data('vote-allow');


            //var limit = $(this).attr("data-vote-allow")
            var limit = $(this).data('vote-allow');


            if ($(this).prop('checked')) {


                if ($('input[type=checkbox]:checked').siblings().length <= limit) {
                        $(this).parents().eq(3).addClass('text-white bg-primary');

                    }else{
                        $(this).prop('checked', false);
                        alert("You have reached the maximum vote of " + limit);
                    }

            }else{
                $(this).parents().eq(3).removeClass('text-white bg-primary');
            }

            //alert(test);
        });

        $('input.single-checkbox').on('change', function(evt) {
            if($(this).siblings(':checked').length >= limit) {
                this.checked = false;
            }
        });

    });

</script>
@endsection
