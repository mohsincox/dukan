@extends('layouts.app')

@section('content')



	<div class="container">

		@if (Session::has('flash_notification.message'))
			<div class="alert alert-{{ Session::get('flash_notification.level') }}">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

				{{ Session::get('flash_notification.message') }}
			</div>
		@endif

		<div class="row">
			<div class="col-sm-12">
				<h2>Category Registration</h2>
				@include('category._form')
			</div>
		</div>
	</div>
@endsection