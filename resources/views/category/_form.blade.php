@if(isset($category))
	{!! Form::model($category, ['url' => 'category/'.$category->id, 'method' => 'put']) !!}
@endif
{!! Form::open(['url' => 'category', 'method' => 'post']) !!}

	<div class="required form-group" {{ $errors->has('name') ? 'has-error' : '' }}>
		{!! Form::label('name', 'Category Name', ['class' => 'control-label col-sm-2']) !!}
		<div class="col-sm-5">
			{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter Category Name', 'required']) !!}
			<span class="text-danger">
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