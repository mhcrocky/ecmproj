@extends('site.app')
@section('title', 'Checkout')
@section('content')
<section class="section-pagetop bg-dark">
	<div class="container clearfix">
		<h2 class="title-page">Checkout</h2>
	</div>
</section>
<section class="section-content bg-padding-y">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				@if(Session::has('error'))
				<p class="alert alert-danger">{{ Session::get('error') }}</p>
				@endif
			</div>
		</div>
		<form action="{{ route('checkout.place.order') }}" method="POST" role="form">
			@csrf

			<div class="row">
				<div class="col-md-8">
					<div class="card">
						<header class="card-header">
							<h4 class="card-title mt-2">Billing Details</h4>
						</header>
						<article class="card-body">
							<div class="form-row">
								<div class="col form-group">
									<label for="">First Name</label>
									<input type="text" class="form-control" name="first_name">
								</div>

								<div class="col form-group">
									<label for="last_name">Last Name</label>
									<input type="text" class="form-control" name="last_name">
								</div>
							</div>
							<div class="form-group">
								<label for="address">Address</label>
								<input type="text" class="form-control" name="address">
							</div>

							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="city">City</label>
									<input type="text" class="form-control" name="city">
								</div>

								<div class="form-group col-md-6">
									<label for="country">Country</label>
									<input type="text" class="form-control" name="country">
								</div>
							</div>

							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="post_code">Post Code</label>
									<input type="text" class="form-control" name="post_code">
								</div>
								<div class="lform-group col-md-6">
									<label for="phone_number">Phone Number</label>
									<input type="text" class="form-control" name="phone_number">
								</div>
							</div>

							<div class="form-group">
								<label for="email_address">Email Address</label>
								<input type="email" class="form-control" name="email">
							</div>

							<div class="form-group">
								<label for="order_note">Order Note</label>
								<textarea name="notes" id="" cols="30" rows="6" class="form-control"></textarea>
							</div>
						</article>
					</div>
				</div>

				<div class="col-md-4">
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<header class="card-header">
									<h4 class="card-title mt-2">Your Order</h4>
								</header>
								<article class="card-body">
									<dl class="dlist-align">
										<dt>Total Cost:</dt>

										<dd class="text-right h5 b"> {{ config('settings.currency_symbol')}} {{ \Cart::getSubTotal() }}</dd>

									</dl>
								</article>
							</div>
						</div>

						<div class="col-md-12 mt-4">
							<button type="submit" class="subscribe btn btn-success btn-lg btn-block">Place Order</button>
						</div>

					</div>
				</div>
			</div>
		</form>
	</div>
</section>
@stop