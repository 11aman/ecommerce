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
<!-- login -->
<div class="col-md-6">
	<div class="w3_login">
			<div class="w3_login_module">
				<div class="module form-module">
				  <div class="toggle">
				  </div>
				  <div class="form">
					<h2>Bill To</h2>
					<form action="{{url('/checkout')}}" method="post">{{csrf_field()}}
					  <input type="text" name="billingName" id="billingName" @if(!empty($userDetails->name)) value="{{$userDetails->name}}" @endif required=" ">
					  <input type="text" name="billingAddress" id="billingAddress" @if(!empty($userDetails->address)) value="{{$userDetails->address}}" @endif required=" ">
					  <input type="text" name="billingCity" id="billingCity" @if(!empty($userDetails->city)) value="{{$userDetails->city}}" @endif required=" ">
					  <input type="text" name="billingState" id="billingState" @if(!empty($userDetails->state)) value="{{$userDetails->state}}" @endif required=" ">
					  <select name="billingCountry" id="billingCountry" style="outline: none;display: block; width: 100%; border: 1px solid #d9d9d9; margin: 0 0 20px; padding: 10px 15px; box-sizing: border-box; font-wieght: 400; -webkit-transition: 0.3s ease; transition: 0.3s ease; font-size:14px;">
  					  	<option value="1">Select Country</option>
  					  	@foreach($countries as $country)
  					  	<option value="{{$country->country_name}}" @if(!empty($userDetails->country) && $country->country_name == $userDetails->country) selected @endif>{{$country->country_name}}</option>
  					  	@endforeach
					  </select>
					  <input type="text" name="billingPincode" id="billingPincode" @if(!empty($userDetails->pincode)) value="{{$userDetails->pincode}}" @endif required=" ">
					  <input type="text" name="billingMobile" id="billingMobile" @if(!empty($userDetails->mobile)) value="{{$userDetails->mobile}}" @endif required=" ">
					  <div class="form-check">
    					<input type="checkbox" class="form-check-input" id="billtoship">
    					Shipping Address Same as Billing Address
  					  </div>
				  </div>
				</div>
			</div>
	</div>
</div>
<div class="col-md-6">
	<div class="w3_login">
			<div class="w3_login_module">
				<div class="module form-module">
				  <div class="toggle">
				  </div>
				  <div class="form">
					<h2>Ship To</h2>
					  <input type="text" name="shippingName" id="shippingName" @if(!empty($shippingDetails->name)) value="{{$shippingDetails->name}}" @endif required=" ">
					  <input type="text" name="shippingAddress" id="shippingAddress" @if(!empty($shippingDetails->address)) value="{{$shippingDetails->address}}" @endif required=" " >
					  <input type="text" name="shippingCity" id="shippingCity" @if(!empty($shippingDetails->city)) value="{{$shippingDetails->city}}" @endif required=" ">
					  <input type="text" name="shippingState" id="shippingState" @if(!empty($shippingDetails->state)) value="{{$shippingDetails->state}}" @endif required=" ">
					  <select name="shippingCountry" id="shippingCountry" style="outline: none;display: block; width: 100%; border: 1px solid #d9d9d9; margin: 0 0 20px; padding: 10px 15px; box-sizing: border-box; font-wieght: 400; -webkit-transition: 0.3s ease; transition: 0.3s ease; font-size:14px;">
  					  	<option value="">Shipping Country</option>
  					  	@foreach($countries as $country)
  					  	<option value="{{$country->country_name}}" @if(!empty($shippingDetails->country) && $country->country_name == $shippingDetails->country) selected @endif>{{$country->country_name}}</option>
  					  	@endforeach
					  </select>
					  <input type="text" name="shippingPincode" id="shippingPincode" @if(!empty($shippingDetails->pincode)) value="{{$shippingDetails->pincode}}" @endif required=" ">
					  <input type="text" name="shippingMobile" id="shippingMobile"@if(!empty($shippingDetails->mobile)) value="{{$shippingDetails->mobile}}" @endif required=" ">
					  <input type="submit" value="Checkout" id="submit">
					</form>
				  </div>
				</div>
			</div>
	</div>

</div>
<!-- //login -->
</div>
		<div class="clearfix"></div>
<!-- //banner -->

@endsection