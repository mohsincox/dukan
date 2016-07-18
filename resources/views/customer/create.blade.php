@extends('layouts.app')

@section('content')
	<div class="container">
		<h2>Customer Registration</h2>
		<hr>
		<div class="col-sm-6">
			@include('customer._form')
		</div>
	</div>
@endsection