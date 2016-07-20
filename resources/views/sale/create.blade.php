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
					<div id="ajax-portion"></div>
				</div>
			</div>
			<script>
				//show per unit price
				$(function() {
					$(document).on('change', '#extra', function(){
						var productId = $('#extra').val();
						var values = 'id='+productId;
						$('#price').hide().val();
						$url  = "/show-per-unit-price";
						$.ajax({
							type: "GET",
							url:$url,
							data:values
						}).success(function (data) {
							$('#ajax-portion').html(data);
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