@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h2>Category Registration</h2>
				@include('category._form')
			</div>
		</div>
	</div>
@endsection