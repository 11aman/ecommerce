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
@if(session('message'))
<p class="alert alert-success">
{{session('message')}}
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
</button>
</p>
@endif

@if(session('delete'))
<p class="alert alert-danger">
{{session('delete')}}
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
</button>
</p>
@endif
<!-- banner -->
	<div class="banner">
<!-- about -->
		<div class="privacy about">
			<h2 align="center">Thanks For Purchasing With Us!!</h2>
			<div class="checkout-right">
				<div align="center">
					<h2>YOUR COD ORDER HAS BEEN PLACED</h2>
					<p>Your order number is {{Session::get('order_id')}} and total payable about is Rs. {{Session::get('grand_total')}}</p>
				</div>
<!-- //about -->
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
<!-- //banner -->
@endsection

<?php

Session::forget('order_id');
Session::forget('grand_total');

?>