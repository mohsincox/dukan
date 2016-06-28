@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h2>Edit Product</h2>
				<hr>
				@include('product._form')
			</div>
		</div>
	</div>
@endsection