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
<div class="col-md-4">
	<div class="w3_login">
		<div class="module form-module">
            <div class="toggle"></div>
			<div class="form">
				<div class="card-body"><center>
    				<a href="{{url('/change-password')}}"><i class="fa fa-lock fa-2x" aria-hidden="true"></i></a>
                    <h4>Change Password</h4>
                    <p>Change Your Password</p></center>
  				</div>
  		    </div>
		</div>
	</div>
</div>
<div class="col-md-4">
	<div class="w3_login">
		<div class="module form-module">
            <div class="toggle"></div>
			<div class="form">
				<div class="card-body"><center>
    				<a href="{{url('/orders')}}"><i class="fa fa-gift fa-2x" aria-hidden="true"></i></a>
                    <h4>Your Orders</h4>
                    <p>Track and view your orders</p></center>
  				</div>
  		    </div>
		</div>
	</div>
</div>
<div class="col-md-4">
	<div class="w3_login">
		<div class="module form-module">
            <div class="toggle"></div>
			<div class="form">
				<div class="card-body"><center>
    				<a href="{{url('/change-address')}}"><i class="fa fa-location-arrow fa-2x" aria-hidden="true"></i></a>
                    <h4>Edit Address</h4>
                    <p>Edit Your Address</p></center>
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