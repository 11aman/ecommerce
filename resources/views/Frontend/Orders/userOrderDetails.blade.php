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
							<th>Product Code</th>	
							<th>Product Name</th>
							<th>Product Weight</th>
							<th>Product Price</th>
							<th>Product Quantity</th>
							<th>Order Status</th>
						</tr>
					</thead>
					<tbody>
						@foreach($orderDetails->orders as $pro)
						<tr class="rem1">
						<td class="invert">{{$pro->product_code}}</td>
						<td class="invert">{{$pro->product_name}}</td>
						<td class="invert">{{$pro->product_size}}</td>
						<td class="invert">{{$pro->product_price}}</td>
						<td class="invert">{{$pro->product_qty}}</td>
						<td class="invert">{{$orderDetails->order_status}}</td>
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