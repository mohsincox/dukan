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
                            <li>{!! Html::link('unit/create', 'Unit Create') !!}</li>

                        </ul>
                    </li>

                    <li role="presentation" class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                            Lists <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">

                            <li role="presentation">{!! Html::link('category', 'Category List') !!}</li>
                            <li role="presentation">{!! Html::link('unit', 'Unit List') !!}</li>
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
