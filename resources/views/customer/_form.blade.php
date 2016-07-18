{!! Form::open(['url' => 'customer', 'method' => 'post']) !!}

	<div class="form-group" {{ $errors->has('name') ? 'has-error' : '' }}>
		{!! Form::label('name', 'Customer Name', ['class' => 'col-sm-3 control-label']) !!}
		<div class="col-sm-9">
			{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter Customer Name', 'autocomplete' => 'off']) !!}
            <span class="help-block text-danger">
				{{ $errors->first('name') }}
			</span>
		</div>
	</div>

	<div class="form-group" {{ $errors->has('mobile_no') ? 'has-error' : '' }}>
		{!! Form::label('mobile_no', 'Mobile No', ['class' => 'col-sm-3']) !!}
		<div class="col-sm-9">
			{!! Form::text('mobile_no', null, ['class' => 'form-control', 'placeholder' => 'Enter Mobile No', 'autocomplete' => 'off']) !!}
			<span class="help-block text-danger">
				{{ $errors->first('mobile_no') }}
			</span>
		</div>
	</div>

	<div class="form-group" {{ $errors->has('balance') ? 'has-error' : '' }}>
		{!! Form::label('balance', 'Balance', ['class' => 'col-sm-3']) !!}
		<div class="col-sm-9">
			{!! Form::number('balance', null, ['class' => 'form-control numeric_field', 'placeholder' => 'Enter Balance', 'autocomplete' => 'off']) !!}
			<span class="help-block text-danger">
				{{ $errors->first('balance') }}
			</span>
		</div>
	</div>

	<div class="form-group" {{ $errors->has('address') ? 'has-error' : '' }}>
		{!! Form::label('address', 'Address', ['class' => 'col-sm-3']) !!}
		<div class="col-sm-9">
			{!! Form::text('address', null, ['class' => 'form-control', 'placeholder' => 'Enter Address', 'autocomplete' => 'off']) !!}
			<span class="help-block text-danger">
				{{ $errors->first('address') }}
			</span>
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-offset-3 col-sm-9">
			{!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
		</div>
	</div>
{!! Form::close() !!}