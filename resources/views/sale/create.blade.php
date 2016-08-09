@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
			<div class="col-sm-12">

				@if (Session::has('flash_notification.message'))
					<div class="alert alert-{{ Session::get('flash_notification.level') }}">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

						{{ Session::get('flash_notification.message') }}
					</div>
				@endif

				<h2>Product Sale</h2>
				<hr>
				<div class="col-sm-7">
					@include('sale._form')
				</div>
				<div class="col-sm-5">
					<div id="ajax-portion-customer"></div>
					<div id="ajax-portion-price"></div>
					<div>
						{!! Form::open(['url' => 'sale/save-cart', 'method' => 'post']) !!}

						<div class="form-group" {{ $errors->has('customer_id') ? 'has-error' : '' }}>
							{!! Form::label('customer_id', 'Select Customer', ['class' => 'col-sm-3']) !!}
							<div class="col-sm-9">
								{!! Form::select('customer_id', $customerId, null, ['class' => 'form-control', 'placeholder' => 'Select Customer', 'id' => 'customer-id']) !!}
								<span class="help-block text-danger">
										{{ $errors->first('customer_id') }}
									</span>
							</div>
						</div>

						<table class="table table-stiped">
							<thead>
								<tr>
									<th>Sale Id</th>
									<th>Product Name</th>
									<th>Quantity</th>
									<th>Unit Price</th>
									<th>Sub Total</th>
									<th>Delete</th>
								</tr>
							</thead>
							<tbody>
							@foreach($addedList as $key=>$item)
									<tr>
										<td>{{$item->id }}</td>
										<td>{{ $item->name }}</td>
										<td>{{ $item->qty }}</td>
										<td>{{ $item->price }}</td>
										<td>{{ $item->subtotal }}</td>
										<td style=""><a class="btn btn-danger btn-xs" href="{!! url('sale/remove-list/'. $key) !!}">
												<i class="fa fa-trash"></i>
											</a>
										</td>
									</tr>
								@endforeach
							</tbody>
							<tfoot>
							<tr>
								<th></th>
								<th class="text-right"><strong>Total =</strong></th>
								<th class="text-right">
									<strong>{!!  Cart::total() - Cart::tax()  !!}</strong>

								</th>
							</tr>
							</tfoot>
						</table>

						<div class="col-sm-3">
							<div class="form-group">
								<label for="dues">Discount</label>
								{!! Form::text('discount', 0, ['class' => 'form-control set-number', 'id' => 'discount',  'autocomplete' => 'off']) !!}
							</div>
						</div>

						<div class="col-sm-3">
							<div class="form-group">
								<label for="total_price">Grand Total</label>
								{!! Form::text('total_price', Cart::total() - Cart::tax(), ['class' => 'form-control set-number', 'id' => 'grand_total', 'readonly', 'autocomplete' => 'off']) !!}
							</div>
						</div>

						<div class="col-sm-3">
							<div class="form-group  {{$errors->first('cash')?'has-error' : ''}}">
								<label for="cash">Cash</label>
								{!! Form::text('cash', Cart::total() - Cart::tax(), ['class' => 'form-control set-number', 'id' => 'cash', 'autocomplete' => 'off']) !!}
							</div>
						</div>

						<div class="col-sm-3">
							<div class="form-group">
								<label for="dues">Dues</label>
								{!! Form::text('due', 0, ['class' => 'form-control set-number', 'id' => 'due', 'readonly', 'autocomplete' => 'off']) !!}
							</div>
						</div>


						<div class="row">
							<hr>
							<div class="form-group col-sm-12">
								{!! Form::button('<i class="fa fa-save"></i> Save', [
                                                      'class'     => 'btn btn-success',
                                                      'type'      => 'submit',
                                                  ]) !!}
								{{ Html::link('sale/clear-all-lists', 'Clear', ['class' => 'btn btn-danger fa fa-times']) }}
							</div>
						</div>
						{!! Form::close() !!}
					</div>

				</div>
			</div>
			<script>
				//show customer balance
				$(function() {
					$(document).on('change', '#customer-id', function() {
						var customerId = $('#customer-id').val();
						var value = 'id='+customerId;
						//alert(value);
						$url = "/show-customer-balance";
						$.ajax({
							type:"GET",
							url:$url,
							data:value
						}).success(function(data) {
							$('#ajax-portion-customer').html(data);
						})
								.error(function (data) {
								});

					});
				});

				//show per unit price
				$(function() {
					$(document).on('change', '#product-id', function(){
						var productId = $('#product-id').val();
						var values = 'id='+productId;
						//$('#price').hide().val();
						$url  = "/show-per-unit-price";
						$.ajax({
							type: "GET",
							url:$url,
							data:values
						}).success(function (data) {
							$('#ajax-portion-price').html(data);
						})
								.error(function (data) {
								});
					});
				});

				$(function() {
					$(document).on('click', '#price', function() {
						$('#price').hide();
					});
				});

				//calculation
				$(function() {
					$(document).on('keyup', '#quantity', function() {
						var totalPrice = $('#quantity').val() * $('#price').text(); //form ar vitor value gola TEXT akare thake
						$('#total_price').val(totalPrice);
					});
				});
			</script>
		</div>
	</div>
@endsection