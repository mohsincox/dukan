@if(isset($product))
	{!! Form::model($product, ['url' => "/product/$product->id", 'method' => 'put']) !!}
@else
	{!! Form::open(['url' => '/product', 'method' => 'post']) !!}
@endif
	<div class="required form-group" {{ $errors->has('name') ? 'has-error' : '' }}>
		{!! Form::label('name', 'Product Name', ['class' => 'col-sm-3 control-label']) !!}
		<div class="col-sm-9">
			{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter Product Name', 'autocomplete' => 'off', 'required']) !!}
			<span class="help-block text-danger">
				{{ $errors->first('name') }}
			</span>
		</div>
	</div>

	<div class="required form-group" {{ $errors->has('category_id') ? 'has-error' : '' }}>
		{!! Form::label('category_id', 'Select Category', ['class' => 'col-sm-3 control-label']) !!}
		<div class="col-sm-9">
			{!! Form::select('category_id', $categoryId, null, ['class' => 'form-control', 'placeholder' => 'Select Category', 'required']) !!}
			<span class="help-block text-danger">
				{{ $errors->first('category_id') }}
			</span>
		</div>
	</div>

	<div class="required form-group" {{ $errors->has('unit_id') ? 'has-error' : '' }}>
		{!! Form::label('unit_id', 'Select Unit', ['class' => 'col-sm-3 control-label']) !!}
		<div class="col-sm-9">
			{!! Form::select('unit_id', $unitId, null, ['class' => 'form-control', 'placeholder' => 'Select Unit', 'required']) !!}
			<span class="help-block text-danger">
				{{ $errors->first('unit_id') }}
			</span>
		</div>
	</div>

	<div class="form-group" {{ $errors->has('quantity') ? 'has-error' : '' }}>
		{!! Form::label('quantity', 'Quantity', ['class' => 'col-sm-3']) !!}
		<div class="col-sm-9">
			{!! Form::number('quantity', null, ['class' => 'form-control numeric_field', 'placeholder' => 'Enter Quantity']) !!}
			<span class="help-block text-denger">
				{{ $errors->first('quantity') }}
			</span>
		</div>
	</div>

	<div class="form-group" {{ $errors->has('price') ? 'has-error' : '' }}>
		{!! Form::label('price', 'Price', ['class' => 'col-sm-3']) !!}
		<div class="col-sm-9">
			{!! Form::number('price', null, ['class' => 'form-control numeric_field', 'placeholder' => 'Enter price']) !!}
			<span class="help-block text-danger">
				{{ $errors->first('price') }}
			</span>
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-9 col-sm-offset-3">
			{!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
		</div>
	</div>


{!! Form::close() !!}