@extends('layouts.app')
@section('content')
<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
	<div class="container">
		<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
			<div class="col-first">
				<h1>Order Detail</h1>
				<nav class="d-flex align-items-center">
					<a href="#">Home<span class="lnr lnr-arrow-right"></span></a>
					<a href="#">Order Detail</a>
				</nav>
			</div>
		</div>
	</div>
</section>
<!-- End Banner Area -->
<!--================Cart Area =================-->
<section class="cart_area">
	<div class="container">

		@foreach($order_detail as $items)
		<div class="cart_inner mb-5">

			<div class="row">

				<div class="col-lg-7 ml-2 mb-5">
					<div class="d-flex row">
						<h5 class="col-3">Order ID :</h5>
						<h5 class="col-9">{{$items[0]->id}}</h5>
					</div>
					<div class="d-flex row">
						<h5 class="col-3">Name :</h5>
						<h5 class="col-9">{{$items[0]->Name}}</h5>
					</div>
					<div class="d-flex row">
						<h5 class="col-3">Address :</h5>
						<h5 class="col-9">{{$items[0]->adress}}</h5>
					</div>
					<div class="d-flex row">
						<h5 class="col-3">Email :</h5>
						<h5 class="col-9">{{$items[0]->email}}</h5>
					</div>
					<div class="d-flex row">
						<h5 class="col-3">Phone number :</h5>
						<h5 class="col-9">{{$items[0]->phone_number}}</h5>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="d-flex row">
						<h5 class="col-3">Status :</h5>
						<h5 class="col-9" style="color:red">{{$items[0]->status}}</h5>
					</div>
				</div>
			</div>
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
					<tr>
						@foreach($items as $item)
						<td>
							<div class="media">
								<div class="d-flex">
									<img width='100' src="{{$item->img}}" alt="">
								</div>
								<div class="media-body">
									<p>{{$item->name}}</p>
								</div>
							</div>
						</td>
						<td>
							<h5>${{$item->saleprice}}</h5>
						</td>
						<td>
							<h5 class="ml-3">{{$item->Quantity}}</h5>
						</td>
						<td>
							<h5>${{$item->price_total}}</h5>
						</td>
					</tr>
					@endforeach
					<tr>
						<td>

						</td>
						<td>

						</td>
						<td>
							<h5>Cost</h5>
						</td>
						<td>
							<h5>${{$item->total_price}}</h5>
						</td>
						<td>

						</td>
					</tr>
					<tr class="out_button_area">
						<td>
							@if($items[0]->status == "Delivering")
							<a class="gray_btn" href="done/{{$items[0]->id}}">Received Confirm</a>
							@endif
						</td>
						<td>

						</td>
						<td>

						</td>
						<td>

						</td>
						<td>

						</td>
					</tr>

				</tbody>

			</table>
			<p style="border: 1px solid white"></p>
			@endforeach

		</div>

	</div>

	</div>

</section>
<!--================End Cart Area =================-->
@endsection