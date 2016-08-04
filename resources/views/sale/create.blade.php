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
						<table class="table table-stiped">
							<thead>
								<tr>
									<th>Sale Id</th>
									<th>Product Name</th>
									<th>Price</th>
									<th>Delete</th>
								</tr>
							</thead>
							<tbody>
							@foreach($addedList as $key=>$item)
									<tr>
										<td>{{$item->id }}</td>
										<td>{{ $item->name }}</td>
										<td>{{ $item->price }}</td>
										<td style=""><a class="btn btn-danger btn-xs" href="{!! url('sale/remove-list/'. $key) !!}">
												<i class="fa fa-trash"></i>
											</a>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>


					<div class="row">
						<hr>


						<div class="form-group col-sm-12">
							{!! Form::button('<i class="fa fa-save"></i> Save', [
                                                  'class'     => 'btn btn-success',
                                                  'type'      => 'submit',
                                              ]) !!}
							<a href="{{ url('outdoor/emergency/clear-services-list') }}" class="btn btn-danger"><i class="fa fa-times"></i> Clear</a>
						</div>
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