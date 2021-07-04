@extends('Frontend.layouts.master')
@section('content')
<!-- //header -->
<!-- products-breadcrumb -->
	<div class="products-breadcrumb">
		<div class="container">
			<ul>
				<li><i class="fa fa-home" aria-hidden="true"></i><a href="{{URL('/')}}">Home</a><span>|</span></li>
				<li>Checkout</li>
			</ul>
		</div>
	</div>
<!-- //products-breadcrumb -->
<!-- banner -->
	<div class="banner">
<!-- about -->
		<div class="privacy about">
			<h2 align="center">User Orders</h2>
			<div class="checkout-right">
				<div align="center">
					<table class="timetable_sub">
					<thead>
						<tr>
							<th>Order ID</th>	
							<th>Ordered Product</th>
							<th>Payment Method</th>
							<th>Grand Total</th>
							<th>Order Date</th>
						</tr>
					</thead>
					<tbody>
						@foreach($orders as $order)
						<tr class="rem1">
						<td class="invert">{{$order->id}}</td>
						<td class="invert">
							@foreach($order->orders as $pro)
							<a href="{{url('/orders/'.$order->id)}}">
								{{$pro->product_code}}
								({{$pro->product_qty}})
							</a><br>
							@endforeach
						</td>
						<td class="invert">{{$order->payment_method}}</td>
						<td class="invert">{{$order->grand_total}}</td>
						<td class="invert">{{$order->created_at}}</td>
						</tr>
						@endforeach
				</tbody></table>
				</div>
<!-- //about -->
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
<!-- //banner -->
@endsection