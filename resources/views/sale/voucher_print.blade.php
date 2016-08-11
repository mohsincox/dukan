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
                {{--<p class="col-xs-6 text-right">Product Name: &nbsp; <strong>{{ $sale->product->name.' '.$sale->product->category->name }}</strong></p>--}}
            </div>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>SL</th>
                    <th>Product Name</th>
                    <th>Unit Price</th>
                    <th>Quantity</th>
                    <th>Sub Total</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    $i=0;
                    $sum=0;
                ?>
                @foreach($saleDetails as $detail)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $detail->product->name.' '.$detail->product->category->name }}</td>
                    <td>{{ $detail->product->price }}</td>
                    <td>{{ $detail->quantity. ' '.$detail->product->unit->name }}</td>
                    <td class="text-right">{{ $detail->sub_total }}</td>
                    <?php $sum = $sum + $detail->sub_total; ?>
                </tr>
                    @endforeach
                <tr>
                    <th class="text-right" colspan="4">Total</th>
                    <td class="text-right">{{ $sum }}</td>
                </tr>
                <tr>
                    <th class="text-right" colspan="4">Vat</th>
                    <td class="text-right">{{ $sale->vat }}</td>
                </tr>
                <tr>
                    <th class="text-right" colspan="4">Discount</th>
                    <td class="text-right">{{ $sale->discount }}</td>
                </tr>
                <tr>
                    <th class="text-right" colspan="4">Cash</th>
                    <td class="text-right">{{ $sale->cash }}</td>
                </tr>
                <tr>
                    <th class="text-right" colspan="4">Due</th>
                    <td class="text-right">{{ $sale->due }}</td>
                </tr>
                </tbody>
            </table>
            {{number_format( $sale->cash, 2) }}
            {{--{{ number_to_word($sale->cash) }}--}}
            Cash In Word: <i>{{ convert_number_to_words($sale->cash + 0) }} Tk. only.</i>
        </div>
    </div>
@endsection