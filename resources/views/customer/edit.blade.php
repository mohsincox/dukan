@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h2>Edit Customer</h2>
				<div class="col-sm-6">
					@include('customer._form')
				</div>
			</div>
		</div>
	</div>
@endsection