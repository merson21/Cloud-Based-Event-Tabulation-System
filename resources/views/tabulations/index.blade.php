@extends('layouts.tabulation')
@section('content')


{{-- <div class="jumbotron">
    <h2 class="page-header text-center title text-black"><b>{{$tabulations->title}}</b></h2>
</div> --}}


<!-- Main content -->
<section class="content">
    <div class="row d-flex justify-content-center">
        <div class="col-sm-10 col-sm-offset-1">
            <div class="alert alert-danger alert-dismissible" id="alert" style="display:none;">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <span class="message"></span>
            </div>

            {{-- BASIC INFO --}}
            <div class="card">
                <div class="card-header">
                    Basic Details
                </div>

                <div class="card-body">
                    <div class="form-group">

                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        Title
                                    </th>
                                    <td>
                                        {{$tabulations->title}}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Located at
                                    </th>
                                    <td>
                                        {{$tabulations->located_at}}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Date
                                    </th>
                                    <td>
                                        {{$tabulations->date}}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Score Min
                                    </th>
                                    <td>
                                        {{$tabulations->score_min}}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Score Max
                                    </th>
                                    <td>
                                        {{$tabulations->score_max}}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Basetype
                                    </th>
                                    <td>
                                        @if ($tabulations->basetype == 'single')
                                            Single base winner
                                        @else
                                            Double base winner
                                        @endif

                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Description
                                    </th>
                                    <td>
                                        {{$tabulations->description}}
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>

            </div>

            {{-- CATEGORY/CRITERIA INFO --}}
            <div class="card">
                <div class="card-header">
                    Criteria for Judging
                </div>

                <div class="card-body">
                    <div class="form-group">

                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        Category
                                    </th>
                                    <th>
                                        Criteria
                                    </th>
                                </tr>

                                @foreach ($categories as $category)
                                    <tr>
                                        <td class="align-middle">
                                            <div >
                                                <b>Name : </b> {{$category->name}}<br>
                                                <b>Locked : </b> {{$category->status}}<br>
                                                <b>Percentage : </b> {{$category->percentage}}%<br>
                                                @if ($category->partipants)
                                                    <b>Elimination Round : </b> Top {{$category->partipants}}<br>
                                                @endif
                                            </div>

                                        </td>
                                        <td>
                                            @foreach ($criterias->where('category_id', $category->id) as $criteria)
                                                <b>Name : </b> {{$criteria->name}}<br>
                                                <b>Locked : </b> {{$criteria->status}}<br>
                                                <b>Percentage : </b> {{$criteria->percentage}}%<br>
                                                <hr>
                                            @endforeach

                                        </td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>

                    </div>
                </div>

            </div>


        </div>
    </div>
</section>






@endsection
@section('scripts')

@endsection
