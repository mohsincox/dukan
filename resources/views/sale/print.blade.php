@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="col-xs-6">
			<h3 class="text-center">Omok Dukan</h3>
			<p class="text-center">Gulshan Maramari, Gulshan, Dhaka</p>
			<div class="row">
				<?php
					$date = date_create($sale->updated_at)
				?>
				<p class="col-xs-6 text-left">Voucher No. : &nbsp; <strong>{{ $sale->id }}</strong></p>
				<p class="col-xs-6 text-right">Sale Date: &nbsp; <strong>{{ date_format($date, 'd/m/Y') }}</strong></p>
			</div>
			<div class="row">
				<p class="col-xs-6 text-left">Customer Name: &nbsp; <strong>{{ $sale->customer->name }}</strong></p>
				<p class="col-xs-6 text-right">Product Name: &nbsp; <strong>{{ $sale->product->name.' '.$sale->product->category->name }}</strong></p>
			</div>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>Quantity</th>
						<th>Price</th>
						<th>Cash</th>
						<th>Dues</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>{{ $sale->quantity.' '.$sale->product->unit->name }}</td>
						<td>{{ $sale->price.' Taka' }}</td>
						<td>{{ $sale->cash.' Taka' }}</td>
						<td>{{ $sale->price - $sale->cash.' Taka' }}</td>
					</tr>
				</tbody>
			</table>
			{{number_format( $sale->cash, 2) }}
			{{--{{ number_to_word($sale->cash) }}--}}
			Cash In Word: <i>{{ convert_number_to_words($sale->cash + 0) }} Tk. only.</i>
		</div>
	</div>
@endsection