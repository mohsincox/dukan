@extends('layout.app')

@section('content')

    <h1>
        {{ Lang::get('password.remind') }}
    </h1>
    <hr/>

    {!! Form::open(['action' => 'SessionController@resetPassword', 'class' => 'form-horizontal', 'role' => 'form']) !!}

            <!-- {!! Form::hidden('token', $token) !!} -->
    {!! Form::hidden('email', auth()->user()->email) !!}

    <div class="form-group {{ $errors->has('old_password') ? ' has-error' : '' }} required">
        {!! Form::label('old_password', "Old Password", ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
            {!! Form::password('old_password', ['class' => 'form-control']) !!}
        </div>
		<span class="help-block text-danger">
            {!! $errors->first('old_password') !!}
        </span>
    </div>

    <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }} required">
        {!! Form::label('password', "New Password", ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
            {!! Form::password('password', ['class' => 'form-control']) !!}
        </div>
		<span class="help-block text-danger">
            {!! $errors->first('password') !!}
        </span>
    </div>

    <div class="form-group {{ $errors->has('password_confirmation') ? ' has-error' : '' }} required">
        {!! Form::label('password_confirmation', trans('auth.password_confirm'), ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
            {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
        </div>
		<span class="help-block text-danger">
            {!! $errors->first('password_confirmation') !!}
        </span>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::button('<i class="fa fa-refresh"></i>'.Lang::get('password.reset_submit'), ['type' => 'submit', 'class' => 'btn btn-primary']) !!}
        </div>
    </div>
    {!! Form::close() !!}

@stop
