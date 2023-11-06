@extends('layouts/master')

@section('metas')
@endsection

@section('page_title')
    <title>
		@if(request()->input('is_booking') == 0)
			Please wait we are redirecting you to the payment page
		@else
			Order Placed Successfully
		@endif
	</title>
@endsection
@section('content')
	<main id="main">
		<section>
			<div class="container">
				<div class="row">
					@if(session('success'))
						<div class="alert alert-success" style="text-align: center; margin-top: 35px;">
							{{ session('success') }}
						</div>
					@elseif(request()->input('is_booking') == 0)
						<div class="alert alert-success" style="text-align: center; margin-top: 15px;">
							Please wait we are redirecting you to payment page
						</div>
					@else
						{{-- <div class="alert alert-success" style="text-align: center; margin-top: 15px;">
							Your order placed successfully
						</div> --}}
						@if(request()->input('no') != "")
							@php 
								$OrderDetail = App\Order::find(request()->input('no'));
							@endphp
							@if(isset($state))
								@if($state == "captured")
									<section class="recipt" style="padding-bottom: 30px; padding-top:30px;">
										<div class="container">
											<div class="row">
												<center>
													<div class="col-lg-4 col-md-4 col-sm-4 col-3"></div>
													<div class="col-lg-4 col-md-4 col-sm-4 col-3 recipt_col">
														<div class="order_details">
															<div class="logo">
																{{-- <img src="/storage/{{setting('site.logo')}}" alt="Optimized Body & Mind" style="width:50% !important; height:50% !important;"> --}}
																<i class="fa fa-solid fa-circle-check fa-6x" style="color:green;"></i>
																<hr>
																<h5>Thank you for your order</h5>
																{{-- <h3 style="color: #0042b9;text-transform: uppercase">Energy Blood test kit</h3> --}}
																{{-- <p style="text-align: left; padding-left: 5%;background-color: #ebf0fa; width: 30%;">
																	<span>
																		<i class="fa fa-solid fa-circle-check" style="color:#0042b9;"></i>
																	</span>
																	In Clinic
																</p> --}}
																<hr>
															</div>
															<div class="summary">
																<div class="row">
																	<div class="col-7">
																		<p><b>Date</b></p>
																		<p><b>Receipt no</b></p>
																	</div>
																	<div class="col-5" style="float: right;">
																		<p> {{date('d-m-Y'),strtotime($OrderDetail->created_at)}}</p>
																		<p>{{$OrderDetail->id}}</p>
																	</div>
																	<hr>
																</div>
																<div class="row">
																	<div class="col">
																		<p><b>Product Summary</b></p>
																		@foreach($OrderDetail->order_products as $op)
																			<div class="row">
																				<div class="col-8">
																					<p style="color: #0042b9;text-transform: uppercase font-size:12px !important;">{{$op->product_detail->title}} <span style="color:green; font-size:12px;">@if($op->product_detail->category == 5 || (isset($op->product_detail->category_detail->parent_category_detail) && $op->product_detail->category_detail->parent_category_detail->id == 12)) (Session: {{$op->quantity}}x) @elseif($op->product_detail->category == 10 || $op->product_detail->id == 116) (Package: {{$op->package_detail->title}})  @else (Quantity: {{$op->quantity}}x) </span>@endif</p>
																				</div>
																				<div class="col-4">
																					<p style="color: #000000;text-transform: uppercase font-size:12px !important;">
																						@php
																							$SessQty    = $op->quantity;
																							if($op->product_detail->category == 10 || $op->product_detail->id == 116){
																								$ProPrice   = $op->package_detail->new_price;
																							}
																							else{
																								$ProPrice   = $op->product_detail->price;
																							}
																						@endphp
																						&pound;{{number_format($SessQty*$ProPrice,2)}}
																					</p>
																				</div>
																			</div>
																		@endforeach
																	</div>	
																	<hr>
																</div>
																<div class="row">
																	<div class="col-8">
																		{{-- <p>Amount</p> --}}
																		<p>@if(isset($OrderDetail->coupon_code)) Discount @endif</p>
																		{{-- <p>@foreach($OrderDetail->order_products as $op) @if($op->product_detail->category == 5) Session @else Quantity @endif @endforeach</p> --}}
																		{{-- <p>Subtotal</p> --}}
																	</div>
																	<div class="col-4">
																		{{-- <p>&pound;@foreach($OrderDetail->order_products as $op) {{$op->product_detail->price}} @endforeach</p> --}}
																		<p>
																			@if(isset($OrderDetail->coupon_code))
																				@if($OrderDetail->coupon_detail->coupon_type == 1)
																					&pound;{{number_format($OrderDetail->coupon_detail->discount_value,2)}}
																				@elseif($OrderDetail->coupon_detail->coupon_type == 2)
																					{{$OrderDetail->coupon_detail->discount_value}} %Off
																				@endif
																			@endif
																		</p>
																		{{-- <p>@foreach($OrderDetail->order_products as $op) {{$op->quantity}} @endforeach</p> --}}
																		{{-- <p>&pound;{{number_format($OrderDetail->order_total,2)}}</p> --}}
																	</div>
																	{{-- <hr style="width: 90%;"> --}}
								
																</div>
																<div class="row">
																	<div class="col-8">
																		<h6> <b>Total</b></h6>
																	</div>
																	<div class="col-4">
																		<h6> <b>&pound;{{number_format($OrderDetail->order_total,2)}}</b></h6>
																	</div>
																	<hr style="margin-top: 5%;">
								
																</div>
															</div>
															<div class="customer_info">
																<div class="row">
																	<div class="col">
																		<h6><u>Customer Details</u></h6>
																		@php 
																			$customername = $OrderDetail->user_detail->name;																	
																			$customeremail = $OrderDetail->user_detail->email;																	
																		@endphp
																		<p>{{$customername}}</p>
																		<a>{{$customeremail}}</a><br>
																		<p>Payment Method: @if(request()->input('is_booking') == 1) Pay in Clinic @else {{$OrderDetail->payment_gateway}} @endif</p>
																		<small>Note: Copy of reciept has been sent to your registered email
																			address.</small>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div class="col-lg-4 col-md-4 col-sm-4 col-3"></div>
												</center>
											</div>
											
											<div class="row">
												<div class="col-12">
													<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2462.4696520671127!2d-0.4410210850017963!3d51.8888927905599!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x487649e3c9e87c25%3A0x99c4b5d131965ad7!2sOPTIMIZED%20BODY%20%26%20MIND!5e0!3m2!1sen!2s!4v1680256247343!5m2!1sen!2s" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
												</div>
											</div>
										</div>
									</section>
								@elseif($state == "declined")
									<div class="alert alert-success" style="text-align: center; margin-top: 35px;">
										We regret to inform you that your payment was not successful. If you would like to make another attempt to complete the payment, kindly click on the button below.
									</div>
									<div class="col" style="margin-bottom:30px;">
										<center>
											<a href="{{url('/')}}{{$link}}" class="gender-filter btn btn_secondary w-25 shadow-none" style="background-color: rgb(0, 66, 185); color: rgb(255, 255, 255);">Retry Payment</a>
										</center>
									</div>
								@endif
							@else 
								<section class="recipt" style="padding-bottom: 30px; padding-top:30px;">
									<div class="container">
										<div class="row">
											<center>
												<div class="col-lg-4 col-md-4 col-sm-4 col-3"></div>
												<div class="col-lg-4 col-md-4 col-sm-4 col-3 recipt_col">
													<div class="order_details">
														<div class="logo">
															{{-- <img src="/storage/{{setting('site.logo')}}" alt="Optimized Body & Mind" style="width:50% !important; height:50% !important;"> --}}
															<i class="fa fa-solid fa-circle-check fa-6x" style="color:green;"></i>
															<hr>
															<h5>Thank you for your order</h5>
															{{-- <h3 style="color: #0042b9;text-transform: uppercase">Energy Blood test kit</h3> --}}
															{{-- <p style="text-align: left; padding-left: 5%;background-color: #ebf0fa; width: 30%;">
																<span>
																	<i class="fa fa-solid fa-circle-check" style="color:#0042b9;"></i>
																</span>
																In Clinic
															</p> --}}
															<hr>
														</div>
														<div class="summary">
															<div class="row">
																<div class="col-7">
																	<p><b>Date</b></p>
																	<p><b>Receipt no</b></p>
																</div>
																<div class="col-5" style="float: right;">
																	<p> {{date('d-m-Y'),strtotime($OrderDetail->created_at)}}</p>
																	<p>{{$OrderDetail->id}}</p>
																</div>
																<hr>
															</div>
															<div class="row">
																<div class="col">
																	<p><b>Product Summary</b></p>
																	@foreach($OrderDetail->order_products as $op)
																		<div class="row">
																			<div class="col-8">
																				<p style="color: #0042b9;text-transform: uppercase font-size:12px !important;">{{$op->product_detail->title}} <span style="color:green; font-size:12px;">@if($op->product_detail->category == 5 || (isset($op->product_detail->category_detail->parent_category_detail) && $op->product_detail->category_detail->parent_category_detail->id == 12)) (Session: {{$op->quantity}}x) @elseif($op->product_detail->category == 10 || $op->product_detail->id == 116) (Package: {{$op->package_detail->title}})  @else (Quantity: {{$op->quantity}}x) </span>@endif</p>
																			</div>
																			<div class="col-4">
																				<p style="color: #000000;text-transform: uppercase font-size:12px !important;">
																					@php
																						$SessQty    = $op->quantity;
																						if($op->product_detail->category == 10 || $op->product_detail->id == 116){
																							$ProPrice   = $op->package_detail->new_price;
																						}
																						else{
																							$ProPrice   = $op->product_detail->price;
																						}
																					@endphp
																					&pound;{{number_format($SessQty*$ProPrice,2)}}
																				</p>
																			</div>
																		</div>
																	@endforeach
																</div>	
																<hr>
															</div>
															<div class="row">
																<div class="col-8">
																	{{-- <p>Amount</p> --}}
																	<p>@if(isset($OrderDetail->coupon_code)) Discount @endif</p>
																	{{-- <p>@foreach($OrderDetail->order_products as $op) @if($op->product_detail->category == 5) Session @else Quantity @endif @endforeach</p> --}}
																	{{-- <p>Subtotal</p> --}}
																</div>
																<div class="col-4">
																	{{-- <p>&pound;@foreach($OrderDetail->order_products as $op) {{$op->product_detail->price}} @endforeach</p> --}}
																	<p>
																		@if(isset($OrderDetail->coupon_code))
																			@if($OrderDetail->coupon_detail->coupon_type == 1)
																				&pound;{{number_format($OrderDetail->coupon_detail->discount_value,2)}}
																			@elseif($OrderDetail->coupon_detail->coupon_type == 2)
																				{{$OrderDetail->coupon_detail->discount_value}} %Off
																			@endif
																		@endif
																	</p>
																	{{-- <p>@foreach($OrderDetail->order_products as $op) {{$op->quantity}} @endforeach</p> --}}
																	{{-- <p>&pound;{{number_format($OrderDetail->order_total,2)}}</p> --}}
																</div>
																{{-- <hr style="width: 90%;"> --}}
							
															</div>
															<div class="row">
																<div class="col-8">
																	<h6> <b>Total</b></h6>
																</div>
																<div class="col-4">
																	<h6> <b>&pound;{{number_format($OrderDetail->order_total,2)}}</b></h6>
																</div>
																<hr style="margin-top: 5%;">
							
															</div>
														</div>
														<div class="customer_info">
															<div class="row">
																<div class="col">
																	<h6><u>Customer Details</u></h6>
																	@php 
																		$customername = $OrderDetail->user_detail->name;																	
																		$customeremail = $OrderDetail->user_detail->email;																	
																	@endphp
																	<p>{{$customername}}</p>
																	<a>{{$customeremail}}</a><br>
																	<p>Payment Method: @if(request()->input('is_booking') == 1) Pay in Clinic @else {{$OrderDetail->payment_gateway}} @endif</p>
																	<small>Note: Copy of reciept has been sent to your registered email
																		address.</small>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="col-lg-4 col-md-4 col-sm-4 col-3"></div>
											</center>
										</div>
										
										<div class="row">
											<div class="col-12">
												<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2462.4696520671127!2d-0.4410210850017963!3d51.8888927905599!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x487649e3c9e87c25%3A0x99c4b5d131965ad7!2sOPTIMIZED%20BODY%20%26%20MIND!5e0!3m2!1sen!2s!4v1680256247343!5m2!1sen!2s" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
											</div>
										</div>
									</div>
								</section>
							@endif
						@endif
					@endif

					@if($_GET['is_booking'] != "1")
						
					@endif
				</div>
			</div>
		</section>
	</main>
@endsection

@section('footer_js')

@endsection