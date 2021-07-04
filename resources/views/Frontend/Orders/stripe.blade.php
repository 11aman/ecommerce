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
					<div class="col-md-6">
						<h2>YOUR ORDER HAS BEEN PLACED</h2>
						<p>Your order number is {{Session::get('order_id')}} and total payable about is Rs. {{Session::get('grand_total')}}</p>
						<b>Please make payment by entering your creadit or debit card.</b>
					</div>
				</div>
					<div class="col-md-6">
						<script src="https://js.stripe.com/v3/"></script>
						<form action="/stripe" method="post" id="payment-form">{{csrf_field()}}
							<div class="form-row">
								<b>Total Amount</b>
								<input type="text" name="total_amount" placeholder="Enter Total Amount" class="form-control">
								<b>Your Name</b>
								<input type="text" name="name" placeholder="Enter Your Name" class="form-control">
								<b>Card Number</b>
								<div id="card-element" class="form-control">
									
								</div>
							</div>
							<button class="btn btn-success btn-mini" style="float: right;margin-top: 10px;"><span>Make a payment </span></button>
					</form>
					<div id="card-error" role="alert"></div>
				</div>
<!-- //about -->
		</div>
	<div class="clearfix"></div>
</div>
</div>
<!-- //banner -->
<script type="text/javascript">
	// Create a Stripe client.
var stripe = Stripe('pk_test_51H58uuIif6rZmRwtiuEwRlhGPi5WJISxdseT9aQAIr4jhURih0hUK3opcRGeAFSp0tRqvM1nUXz9IUZq050fuqhV0075M9tHsO');

// Create an instance of Elements.
var elements = stripe.elements();

// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
var style = {
  base: {
    color: '#32325d',
    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
    fontSmoothing: 'antialiased',
    fontSize: '16px',
    '::placeholder': {
      color: '#aab7c4'
    }
  },
  invalid: {
    color: '#fa755a',
    iconColor: '#fa755a'
  }
};

// Create an instance of the card Element.
var card = elements.create('card', {style: style});

// Add an instance of the card Element into the `card-element` <div>.
card.mount('#card-element');

// Handle real-time validation errors from the card Element.
card.on('change', function(event) {
  var displayError = document.getElementById('card-errors');
  if (event.error) {
    displayError.textContent = event.error.message;
  } else {
    displayError.textContent = '';
  }
});

// Handle form submission.
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
  event.preventDefault();

  stripe.createToken(card).then(function(result) {
    if (result.error) {
      // Inform the user if there was an error.
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;
    } else {
      // Send the token to your server.
      stripeTokenHandler(result.token);
    }
  });
});

// Submit the form with the token ID.
function stripeTokenHandler(token) {
  // Insert the token ID into the form so it gets submitted to the server
  var form = document.getElementById('payment-form');
  var hiddenInput = document.createElement('input');
  hiddenInput.setAttribute('type', 'hidden');
  hiddenInput.setAttribute('name', 'stripeToken');
  hiddenInput.setAttribute('value', token.id);
  form.appendChild(hiddenInput);

  // Submit the form
  form.submit();
}
</script>
@endsection

<?php

Session::forget('order_id');
Session::forget('grand_total');

?>