



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
						<a href="#">Confirmation</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->

	<!--================Order Details Area =================-->
	<section class="order_details section_gap">
		<div class="container">
			<h3 class="title_confirmation">Thank you for your Order</h3>
        <div class="container">
            <div class="billing_details">
                <div class="row">
                    <div class="col-lg-8 mt-5">
                        <div class="d-flex row">
                            <h5 class="col-3">Name :</h5>
                            <p class="col-9">{{$order->Name}}</p>
                        </div>
                        <div class="d-flex row">
                            <h5 class="col-3">Address :</h5>
                            <p class="col-9">{{$order->adress}}</p>
                        </div>
                        <div class="d-flex row">
                            <h5 class="col-3">Email :</h5>
                            <p class="col-9">{{$order->email}}</p>
                        </div>
                        <div class="d-flex row">
                            <h5 class="col-3">Phone number :</h5>
                            <p class="col-9">{{$order->phone_number}}</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="order_box">
                            <h2>Your Order</h2>
                            <ul class="list">
                                <li><a href="#">Product<span>Total</span></a></li>
								@foreach($cartItems as $items)
									<li><a style="text: no-wrap">{{$items->name}}&nbsp;&nbsp;x{{ $items->quantity }}<span>${{$items->price * $items->quantity}}</span></a></li>
								@endforeach
                            </ul>
                            <ul class="list list_2 mt-2">
                                <li><a href="#">Total <span>${{Cart::gettotal()}}</span></a></li>
                            </ul>
                            
                        </div>
                    </div>
                    <form class="row contact_form m-auto mt-5" method="post" action="/status-order">
                        @csrf
                        @foreach($cartItems as $item)
                            <input type="hidden" name="order_id[]" value="{{$order->id}}">
                            <input type="hidden" name="product_id[]" value="{{$item->id}}">
                            <input type="hidden" name="quantity[]" value="{{$item->quantity}}">
                            <input type="hidden" name="price_total[]" value="{{$item->quantity*$item->price}}">
                            <input type="hidden" name="created_at[]" value="{{$item->created_at}}">
                        @endforeach 
                        <a class="primary-btn mt-5 d-block" style="color: white" href="/delete-order/{{$order->id}}">Back</a>
                        <div style="width: 20px"></div>
                        <button class="primary-btn mt-5" type="submit">Confirm</button>
                    </form>
                </div>
            </div>
        </div>
		</div>
	</section>
	<!--================End Order Details Area =================-->
    @endsection




