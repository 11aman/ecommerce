@extends('Frontend.layouts.master')
@section('content')

<!-- products-breadcrumb -->
	<div class="products-breadcrumb">
		<div class="container">
			<ul>
				<li><i class="fa fa-home" aria-hidden="true"></i><a href="{{URL('/')}}">Home</a><span>|</span></li>
				<li>Sign In & Sign Up</li>
			</ul>
		</div>
	</div>
<!-- //products-breadcrumb -->
<!-- banner -->
<div class="banner">
<!-- login -->
<h2 style="text-align: center;margin-top: 3%;margin-bottom: -6%;">Order Review</h2>
<div class="col-md-6">
	<div class="w3_login">
		<div class="module form-module">
	    	<div class="toggle"></div>
		    <div class="form">
				<h2>Billing Address</h2>
      			Name : {{$userDetails->name}}<br>
				Address : {{$userDetails->address}}<br>
			    City : {{$userDetails->city}}<br>
				State : {{$userDetails->state}}<br>
				Country : {{$userDetails->country}}<br>
				Pincode : {{$userDetails->pincode}}<br>
				Mobile : {{$userDetails->mobile}}<br>
			</div>
		</div>
	</div>
</div>
<div class="col-md-6">
	<div class="w3_login">
		<div class="module form-module">
			<div class="toggle"></div>
			<div class="form">
				<h2>Shipping Details</h2>
				Name : {{$shippingDetails->name}}<br>
				Address : {{$shippingDetails->address}}<br>
				City : {{$shippingDetails->city}}<br>
				State : {{$shippingDetails->state}}<br>
				Country : {{$shippingDetails->country}}<br>
				Pincode : {{$shippingDetails->pincode}}<br>
				Mobile : {{$shippingDetails->mobile}}<br>
            </div>
		</div>
	</div>
</div>
<!-- //login -->
</div>
<!-- //banner -->
<!-- about -->
		<div class="privacy about">			
	      <div class="checkout-right">
					<h4>Your shopping cart contains:</h4>
				<table class="timetable_sub">
					<thead>
						<tr>
							<th>SL No.</th>	
							<th>Product</th>
							<th>Quality</th>
							<th>Product Name</th>
							<th>Price</th>
						</tr>
					</thead>
					<tbody>
						<?php $total_amount = 0; ?>
						@foreach($userCart as $cart)
						<tr class="rem1">
						<td class="invert">{{$cart->id}}</td>
						<td class="invert-image"><a href="single.html">
							@php if (!empty($cart->image))
                                    {
                                    @endphp
							<img src="{{url('/upload/'.$cart->image)}}" alt=" " class="img-responsive">
									@php 
                                    } else {
                                    @endphp 
                                    <p>No image found</p>
                                    @php
                                    }
                                    @endphp</a></td>
						<td class="invert">
							 <div class="quantity"> 
								<div class="quantity-select">
									<div class="entry value"><span>{{$cart->quantity}}</span></div>
								</div>
							</div>
						</td>
						<td class="invert">{{$cart->product_name}}
						<p>{{$cart->product_code}} | {{$cart->size}}</p></td>
						
						
						<td class="invert" value="{{$cart->price}}">Rs. {{$cart->price*$cart->quantity}}
							<p>Per Product : {{$cart->price}}</p></td>
					</tr>
					<?php $total_amount = $total_amount + ($cart->price*$cart->quantity); ?>
					@endforeach
				</tbody></table>
			</div>
			<div class="checkout-left">	
				<div class="col-md-6 checkout-left-basket">
					<h4>Your Total</h4>
					<ul>
						<li>Cart Sub Total <i>-</i> <span>Rs. {{$total_amount}}</span></li>
						<li>Shipping Charges(+) <i>-</i> <span>Rs. 0</span></li>
						<li>Coupon Discount(-) <i>-</i> <span>@if(!empty(Session::get('CouponAmount'))) Rs. {{Session::get('CouponAmount')}} @else
						Rs. 0 @endif </span></li>
						<li>Grand Total <i>-</i> <span>Rs. {{$grand_total = $total_amount - Session::get('CouponAmount')}}</span></li>
					</ul>
				</div>
				<div class="col-md-6 checkout-left-basket">
					<h4>Payments</h4>
					<ul>
						<form action="{{url('/place-order')}}" name="paymentForm" id="paymentForm" method="post">{{csrf_field()}}
							<input type="hidden" name="grand_total" value="{{$grand_total}}">
							<div class="form-check" style="text-align: center;">
  								<input class="form-check-input cod" type="radio" name="payment_method" id="credit" value="cod">
  								<label class="form-check-label" for="cashOnDelivery">
    							Cash On Delivery
  								</label>
							</div>
							<div class="form-check" style="text-align: center;">
  								<input class="form-check-input stripe" value="stripe" type="radio" name="payment_method" id="debit">
  								<label class="form-check-label" for="stripe">
    							Stripe
  								</label>
							</div>
							<div class="col col-md-6" style="margin-top: 8%;margin-left: 41%;">
                            	<button type="submit" class="btn btn-primary btn-sm" onclick="return selectPaymentMethod();">
                                	Place Order
                            	</button>
                        	</div>
						</form>
					</ul>
				</div>
				<div class="clearfix"> </div>	
			</div>
		</div>
<!-- //about -->

@endsection