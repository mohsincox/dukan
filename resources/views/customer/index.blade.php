@extends('layouts.app')

@section('content')
	<div class="container">
		<h2>Customer List</h2>
		<table class="table striped">
			<thead>
				<tr>
					<td>Id</td>
					<td>Name</td>
					<td>Balance</td>
					<td>Address</td>
					<td>Action</td>
				</tr>
			</thead>
			<tbody>
				@foreach($customers as $customer)
					<tr>
						<td>{{ $customer->id }}</td>
						<td>{{ $customer->name }}</td>
						<td>{{ $customer->balance }}</td>
						<td>{{ $customer->address }}</td>
						<td>{!! Html::link("customer/$customer->id/edit", 'EDIT', ['class' => 'btn btn-primary btn-xs']) !!}</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@endsection