@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                {{--<div class="panel-body">--}}
                    {{--You are logged in!--}}
                {{--</div>--}}


                <div>

                <ul class="nav nav-tabs">
                    <li role="presentation" class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                            Creation <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>{!! Html::link('category/create', 'Category Create') !!}</li>
                            <li><a href="#">Profile</a></li>
                            <li><a href="#">Messages</a></li>
                        </ul>
                    </li>
                    <li class="dropdown" id="registration-creation">
                        <a href="#"  class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-pencil-square-o"></i> Creation <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li id="schedule-create">{!! Html::link('schedule/create', 'Schedule Registration') !!}</li>
                            <li id="patient-address-create">{!! Html::link('patient-address/create', 'Patient Address Registration') !!}</li>
                        </ul>
                    </li>
                    <li role="presentation" class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                            Lists <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">

                            <li role="presentation"><a href="#">Home</a></li>
                            <li role="presentation"><a href="#">Profile</a></li>
                            <li role="presentation"><a href="#">Messages</a></li>

                        </ul>
                    </li>
                    <li role="presentation" class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                            Dropdown <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li role="presentation"><a href="#">Home</a></li>
                            <li role="presentation"><a href="#">Profile</a></li>
                            <li role="presentation"><a href="#">Messages</a></li>
                        </ul>
                    </li>
                </ul>
</div>



            </div>
        </div>
    </div>
</div>
@endsection
