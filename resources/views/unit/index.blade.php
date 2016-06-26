@extends('layouts.app')

@section('content')
	<div class="container">
		<h2>Units List</h2>
		<hr>
		@if (Session::has('flash_notification.message'))
			<div class="alert alert-{{ Session::get('flash_notification.level') }}">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

				{{ Session::get('flash_notification.message') }}
			</div>
		@endif
		<table class="table table-striped">
			<thead>
				<tr>
					<th>ID</th>
					<th>Unit Name</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach($units as $unit)
					<tr>
						<td>{{ $unit->id }}</td>
						<td>{{ $unit->name }}</td>
						<td>{{ Html::link("unit/$unit->id/edit", 'EDIT', ['class' => 'btn btn-primary btn-xs'] ) }}</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@endsection