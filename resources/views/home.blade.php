@extends('layouts.app')


@section('content')



<div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-pattern">
                <div class="card-body">
                    <div class="float-right">
                        <i class="fa fa-fw fa-user"></i>
                    </div>
                    <h5 class="font-size-20 mt-0 pt-1">{{ $countempls }}</h5>
                    <p class="text-muted mb-0"> Nombres des employés </p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-pattern">
                <div class="card-body">
                    <div class="float-right">
                        <i class="fa fa-fw fa-laptop"></i>
                    </div>
                 <h5 class="font-size-20 mt-0 pt-1">{{ $maters }}</h5>
                    <p class="text-muted mb-0"> Nombres des Materiels </p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-pattern">
                <div class="card-body">
                    <div class="float-right">
                        <i class="fa fa-fw fa-cogs"></i>
                    </div>
                   <h5 class="font-size-20 mt-0 pt-1">{{ $acces }}</h5>
                    <p class="text-muted mb-0"> Nombres des Accessoires </p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-pattern">
                <div class="card-body">
                    <div class="float-right">
                     <i class="fa fa-fw fa-file-pdf-o"></i>
                    </div>
                  <h5 class="font-size-20 mt-0 pt-1">{{ $attr }}</h5>
                    <p class="text-muted mb-0"> Nombres des attributions </p>
                </div>
            </div>
        </div>
    </div>


    <br><br>
			 <div id="main" class="text-center center-block container jumbotron">


        <div id="detail" class="span12">
            <h1><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Website Under Construction <i class="fa fa-exclamation-triangle" aria-hidden="true"></i></h1>
            <h1>Thank you for your patience while we are renovating</h3>
            <hr>
            <div class="progress">
                <div class="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                    80%
                </div>
            </div>
        </div>
    </div>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

 @endsection
