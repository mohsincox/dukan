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
				<h2>Categories List</h2>
				<hr>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>ID</th>
							<th>Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($categories as $category)
							<tr>
								<td>{{ $category->id }}</td>
								<td>{{ $category->name }}</td>
								<td>{!! Html::link("/category/$category->id/edit", 'Edit') !!}</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
@endsection