@extends('layouts.app')

@section('content')
	<div class="container">
		<h2>Sale List</h2>
		<hr>
		<table class="table table-stiped">
			<thead>
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Quantity</th>
					<th>Price</th>
					<th>Date</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach($sales as $sale)
					<tr>
						<td>{{ $sale->id }}</td>
						<td>{{ $sale->product->name.' '.$sale->product->category->name }}</td>
						<td>{{ $sale->quantity.' '.$sale->product->unit->name }}</td>
						<td>{{ $sale->price.' Taka' }}</td>
						<td>{{ $sale->updated_at }}</td>
						<td>
							{!! Html::link("/sale/$sale->id/return", 'Return', ['class' => 'btn btn-primary btn-xs']) !!}
							{!! Html::link("/sale/$sale->id/print", 'Print', ['class' => 'btn btn-primary btn-xs']) !!}
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@endsection