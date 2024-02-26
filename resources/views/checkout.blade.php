@extends('layouts.app')
    @section('content')
 <!-- Start Banner Area -->
 <section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Confirmation</h1>
					<nav class="d-flex align-items-center">
						<a href="#">Home<span class="lnr lnr-arrow-right"></span></a>
						<a href="#">Checkout</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->

    <!--================Checkout Area =================-->
    <section class="checkout_area section_gap">
        <div class="container">
            <div class="billing_details">
                <div class="row">
                        <h3>Billing Details</h3>
                        <form class="row contact_form" action="/done_order" method="post" novalidate="novalidate">
							@csrf
							<div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" id="name" class="placeholder" name="receiver" placeholder="Name">
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" id="address" name="address" placeholder="Address">
                            </div>
                            <div class="col-md-6 form-group p_star">
                                <input type="text" class="form-control" id="number" name="phone_number" placeholder="Phone number">
                            </div>
                            <div class="col-md-6 form-group p_star">
                                <input type="text" class="form-control" id="email" name="email" placeholder="Email Address">
                                
                            </div>
                            <div class="col-md-12 form-group mt-5">
                                <div class="creat_account">
                                    <h3>Shipping Details</h3>
                                </div>
                                <textarea class="form-control" name="message" id="message" rows="1" placeholder="Order Notes"></textarea>
                            </div>
							<input type="hidden" name="user_id" value = "{{ Auth::user()->id }}">
							<input type="hidden" name="total_price" value = "{{Cart::gettotal()}}">
							<input type="hidden" name="status" value = "Processing">
							
							<button class="primary-btn mt-5 ml-3" type="submit">Proceed to Paypal</button>
                        </form>
                </div>
            </div>
        </div>
    </section>
	<!--================Order Details Area =================-->
	<!-- <section class="order_details section_gap">
		<div class="container">
			<h3 class="title_confirmation">Thank you. Your order has been received.</h3>
			
			<div class="order_details_table">
				<h2>Order Details</h2>
				<div class="table-responsive">
					<table class="table">
						<thead>
							<tr>
								<th scope="col">Product</th>
								<th scope="col">Price</th>
								<th scope="col">Quantity</th>
								<th scope="col">Total</th>
							</tr>
						</thead>
						<tbody>
                            @foreach($cartItems as $row)
							<tr>
								<td>
									<p>{{$row->name}}</p>
								</td>
								<td>
									<p>${{$row->price}}</p>
								</td>
								<td>
									<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;x{{$row->quantity}}</p>
								</td>
                                <td>
									<p>${{$row->price * $row->quantity}}</p>
								</td>
							</tr>
                            @endforeach
                            <tr>
								<td>
									<h4>Total</h4>
								</td>
								<td>
									<h5></h5>
								</td>
								<td>
									<h5></h5>
								</td>
								<td>
									<p>${{Cart::gettotal()}}</p>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</section> -->
	<!--================End Order Details Area ================= -->

    @endsection