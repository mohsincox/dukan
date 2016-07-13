@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="col-sm-12">
			<h2>Add {{ $product->name.' '.$product->category->name }} in stock</h2>
			<hr>
			<div class="col-sm-6">
				{!! Form::open(['url' => "/product/$id/store-in-stock", 'method' => 'post']) !!}

					<div class="form-group" {{ $errors->has('quantity') ? 'has-error' : '' }}>
						{!! Form::label('quantity', 'Quantity', ['class' => 'col-sm-3']) !!}
						<div class="col-sm-9">
							{!! Form::number('quantity', null, ['class' => 'form-control numeric_field', 'placeholder' => 'Enter Quantity']) !!}
							<span class="help-block text-denger">
							{{ $errors->first('quantity') }}
						</span>
						</div>
					</div>

					<div class="form-group">
						<div class="col-sm-9 col-sm-offset-3">
							{!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
						</div>
					</div>

				{!! Form::close() !!}
			</div>
		</div>
	</div>
@endsection