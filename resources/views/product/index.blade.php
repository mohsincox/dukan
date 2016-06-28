@extends('layouts.app')

@section('content')
	<div class="container">
		@if (Session::has('flash_notification.message'))
			<div class="alert alert-{{ Session::get('flash_notification.level') }}">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

				{{ Session::get('flash_notification.message') }}
			</div>
		@endif
		<h2>Product List</h2>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Id</th>
					<th>Name</th>
					<th>Category</th>
					<th>Unit</th>
					<th>Quantity</th>
					<th>Price</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach($products as $product)
					<tr>
						<td>{{ $product->id }}</td>
						<td>{{ $product->name }}</td>
						<td>{{ $product->category->name }}</td>
						<td>{{ $product->unit->name }}</td>
						<td>{{ $product->quantity }}</td>
						<td>{{ $product->price }}</td>
						<td>{!! Html::link("/product/$product->id/edit", 'Edit', ['class' => 'btn btn-primary btn-xs']) !!}</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@endsection