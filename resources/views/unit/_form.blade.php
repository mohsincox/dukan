@if(isset($unit))
	{!! Form::model($unit, ['url' => 'unit/'. $unit->id, 'method' => 'put']) !!}
@else
	{!! Form::open(['url' => 'unit', 'method' => 'post']) !!}
@endif
	<div class="form-group" {{ $errors->has('name') ? 'has-error' : '' }}>
		{!! Form::label('name', 'Unit', ['class' => 'col-sm-2 control-label']) !!}
		<div class="col-sm-5">
			{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter Unit', 'autocomplete' => 'off']) !!}
			<span class="help-block text-danger">
				{{ $errors->first('name') }}
			</span>
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			{!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
		</div>
	</div>
{!! Form::close() !!}