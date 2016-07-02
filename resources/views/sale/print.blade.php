@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="col-xs-6">
			<h3 class="text-center">Omok Dukan</h3>
			<p class="text-center">Gulshan Maramari, Gulshan, Dhaka</p>
			<div class="row">
				<p class="col-xs-6 text-left">Voucher No. : &nbsp; <strong>{{ $sale->id }}</strong></p>
				<p class="col-xs-6 text-right">Sale Date: &nbsp; <strong>{{ $sale->updated_at }}</strong></p>
			</div>
			<div class="row">
				<p class="text-center">Product Name: &nbsp; <strong>{{ $sale->product->name.' '.$sale->product->category->name }}</strong></p>
			</div>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>Quantity</th>
						<th>Price</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>{{ $sale->quantity.' '.$sale->product->unit->name }}</td>
						<td>{{ $sale->price.' Taka' }}</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
@endsection