@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				@if (Session::has('flash_notification.message'))
					<div class="alert alert-{{ Session::get('flash_notification.level') }}">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

						{{ Session::get('flash_notification.message') }}
					</div>
				@endif
				<h2>Product Registration</h2>
				<hr>
				@include('product._form')
			</div>
		</div>
	</div>
@endsection