@extends('layouts/master')

@section('metas')
@endsection

@section('title')
Wellness by Dr.Sophia - Checkout
@endsection

@section('css')
<style>
    .modal-content {
        position: absolute;
        top: 100px;
    }

    #btn_coupon_confirm,
    .btn_place_order {
        border-radius: 3px;
        border: 1px solid #0e8ba1;
        color: #0e8ba1;
        background-color: transparent;
        font-weight: 800;
    }

    #btn_coupon_confirm:hover,
    .btn_place_order:hover {
        border-radius: 3px;
        border: 1px solid #0e8ba1;
        background: #0e8ba1;
        color: #fff;
    }
</style>
@endsection

@section('content')
<main>
    <section class="checkout" style="background: url('assets/images/expert-banner.webp');background-size: 100% 100%;">
        <div class="container">
            <div class="row d-flex align-items-start justify-content-center">
                <div class="col-md-6 col-sm-6 col-lg-6 pb-3">
                    <h2 class="text-center">Checkout</h2>
                    <div class="inclinic">
                        <p>
                            <span><i class="fa-regular fa-circle-check"></i></span>
                            In Clinic
                        </p>
                    </div>
                    <hr class="hr-lg w-100">
                    <div id="form">
                        <div class="col-lg-12 col-md-12 col-12 mt-4">
                            <label for="appointment-date"> Select Date & time <span class="color-red">*</span></label>
                            <input type="text" class="form-control" id="date" placeholder="Please select date & time">
                        </div>
                        <div style="display: none;" class="col-lg-12 col-md-12 col-12 mt-4 inputdatetime">
                            <label for="inputDateTime"> Appointment Date &amp; Time </label>
                            <input required="" type="text" class="form-control shadow-none" id="inputDateTime">
                        </div>
                        <input type="hidden" id="p_id" value="64">
                        <input type="hidden" id="booking_date">
                        <input type="hidden" id="booking_time">
                        <input type="hidden" id="booking_start_time">
                        <input type="hidden" id="booking_end_time">
                        <div class="row address_row" hidden>
                            <form>
                                <select class="form-group form-select " name="selectAddress" id="selectAddress">
                                    <option value="0">Select Address</option>
                                    <option value="1">Dunstable</option>
                                    <option value="1">Dunstable</option>
                                </select>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="inputAddress" placeholder="Address">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <input type="text" class="form-control" id="inputCity" placeholder="City">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="text" class="form-control" id="postal_code" placeholder="Postal Code">
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="row customer_info mt-3" style="display: none;">
                            <h3 style="text-align:left !important;">Customer Information</h3>
                            <hr class="hr-lg w-100">
                            <form>
                                <div class="form-row row">
                                    <div class="form-group hide-fields col-md-6 pb-3">
                                        <label for="#inputFirstName">First Name<span style="color:red;">*</span></label>
                                        <input type="text" class="form-control shadow-none" id="inputFirstName" placeholder="First Name" value="@if(Auth::check()) {{Auth()->user()->first_name}} @endif">
                                    </div>
                                    <div class="form-group hide-fields col-md-6 pb-3">
                                        <label for="#inputLastName">Last Name <span style="color:red;">*</span></label>
                                        <input type="text" class="form-control shadow-none" id="inputLastName" placeholder="Last Name" value="@if(Auth::check()) {{Auth()->user()->last_name}} @endif">
                                    </div>
                                </div>
                                <div class="form-row row">
                                    <div class="form-group hide-fields col-md-6 pb-3">
                                        <label for="#dob">Date of Birth <span style="color:red;">*</span></label>
                                        <input type="text" class="form-control shadow-none" id="dob" placeholder="DD/MM/YYYY" value="@if(Auth::check()) {{Auth()->user()->date_of_birth}} @endif">
                                    </div>
                                    <div class="form-group hide-fields col-md-6 pb-3">
                                        <label for="#gender">Gender <span style="color:red;">*</span></label>
                                        <select id="gender" class="form-select shadow-none">
                                            <option disabled>Gender</option>
                                            <option @if(Auth::check()) @if(Auth()->user()->gender == 1) selected @endif @endif value="1">Male</option>
                                            <option @if(Auth::check()) @if(Auth()->user()->gender == 2) selected @endif @endif value="2">Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12 pb-3">
                                        <label for="#inputEmail">Email

                                            <span style="color:red;">*</span></label>
                                        <input type="email" class="form-control shadow-none" id="inputEmail" placeholder="someone@email.com" value="@if(Auth::check()) {{Auth()->user()->email}} @endif">
                                    </div>
                                    <!-- <div style="@if(Auth()->check()) display:none; @endif" class="form-group col-md-12 pb-3 forgotpassword-fields">
                                        <label for="#inputPassword">Password <span style="color:red;">*</span></label>
                                        <input type="password" class="form-control shadow-none" id="inputPassword" placeholder="Your Password">
                                        <span id="forgot_password" style="float:right; font-size:13px; display:none;">Forgot your password ?<span style="color:#0042b9; cursor:pointer;" class="forgot_password"> CLICK HERE</span></span>
                                    </div> -->
                                </div>
                                <div class="form-row">
                                    <div class="form-group hide-fields col-md-12 pb-3">
                                        <label for="#inputContact">Contact Number <span style="color:red;">*</span></label>
                                        <input type="text" class="form-control shadow-none" id="inputContact" placeholder="Contact number" value="@if(Auth::check()) {{Auth()->user()->contact_no}} @endif">
                                    </div>
                                </div>
                                <br>
                                <button style="margin-bottom: 10px;" type="button" data-isbooking="1" class="btn btn-primary btn_place_order btn_login_order">Pay In Clinic</button>
                                <button style="display: none; margin-bottom: 10px;" type="button" data-isbooking="1" class="btn btn-primary shadow-none btn_login_order btn_login_order_pay_in_clinic">Pay In Clinic</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6">
                    <div class="cart">
                        <h3 class="text-center pb-0 mb-0">Your Cart</h3>
                        <hr class="hr-sm pt-0 mt-0">
                        @php
                        $total=0;
                        @endphp
                        @foreach ($cart_items as $key => $value)
                        <div class="row product">
                            <div class="col-md-3 col-lg-3 col-sm-3 col-3">
                                <a href="{{url('/treatments/services/'.$value->associatedModel->slug)}}">
                                    <img src="https://demo.optimizedbodyandmind.co.uk/storage/{{ $value->associatedModel->image }}" alt="{{$value->associatedModel->slug}}">
                                </a>
                            </div>
                            <div class="col-md-6 col-lg-6 col-sm-6 col-6">
                                <h6><a  href="{{url('/treatments/services/'.$value->associatedModel->slug)}}">{{$value->associatedModel->title}}</a></h6>
                                <p class="sessions">Total Session : 1</p>
                            </div>
                            <div class="col-md-3 col-lg-3 col-sm-3 col-3">

                                <p class="price">&pound;{{number_format($value->price,2)}}</p>
                                <a href="/my-cart/{{ $value->associatedModel->id }}/remove" class="btn btn-del">Remove</a>
                            </div>
                        </div>
                        @php
                        $total += $value->price;
                        @endphp
                        <div class="lower">
                            <hr>
                        </div>
                        @endforeach
                        <div class="lower">
                            <!-- <hr> -->
                            <p class="para-discount">Have a discount code? <a id="open_coupon_code" href="#">Click here to enter your
                                    code.</a></p>
                            <div class="row" style="display: none;" id="coupon_code_field">
                                <div class="form-group col-md-8">
                                    <input type="text" class="form-control shadow-none" id="couponcode" placeholder="Enter discount Code">
                                </div>
                                <div class="form-group col-md-4">
                                    <button type="button" id="btn_coupon_confirm" class="btn btn-primary w-100 shadow-none">Apply</button>
                                </div>
                            </div>
                            <hr>
                            <div class="row total">
                                <div class="col-6">
                                    <p class="text-left">
                                        Sub Total
                                    </p>
                                </div>
                                <div class="col-6">
                                    <p class="text-right">
                                        &pound;{{number_format($total,2)}}
                                    </p>
                                </div>
                            </div>
                            <hr>
                            <div class="row total">
                                <div class="col-6">
                                    <p class="text-left">
                                        Total
                                    </p>
                                </div>
                                <div class="col-6">
                                    <p class="text-right">
                                        &pound;{{number_format($total,2)}}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" value="{{$total}}" id="grandtotal">
            <input type="hidden" id="booking_date">
            <input type="hidden" id="booking_time">
            <input type="hidden" id="booking_start_time">
            <input type="hidden" id="booking_end_time">
            <input type="hidden" id="coupon_entered">
    </section>
</main>

@endsection

@section('javascript')
<script>
    $(document).ready(function() {
        $("#inputContact").mask('99999-999999');
        $('#dob').mask('00/00/0000');
        let couponcode = localStorage.getItem('couponcode');
        if (couponcode) {
            setTimeout(function() {
                $("#coupon_code_field").slideDown();
                $("#couponcode").val(couponcode);
                $("#btn_coupon_confirm").click();
            }, 2000);
        }

        $("#open_coupon_code").click(function() {
            $("#coupon_code_field").slideDown();
        });


        $(".btn_login_order").click(function() {
            const urlParams = new URLSearchParams(window.location.search);
            const utm_source = urlParams.get('utm_source');
            const utm_medium = urlParams.get('utm_medium');
            const utm_campaign = urlParams.get('utm_campaign');
            const utm_term = urlParams.get('utm_term');
            var email = $("#inputEmail").val();
            var password = $("#inputPassword").val();
            var grandtotal = $("#grandtotal").val();
            var code = $("#couponcode").val();
            var bookingdate = $("#booking_date").val();
            var bookingtime = $("#booking_time").val();
            var bookingstarttime = $("#booking_start_time").val();
            var bookingendtime = $("#booking_end_time").val();
            var isbooking = $(this).data('isbooking');
            var session = $("#nosession").html();
            var couponentered = $("#coupon_entered").val();
            var package_id = $("#package_id").val();
            var refer = localStorage.getItem('Refer');
            if (email != "") {
                if (password != "") {
                    $(this).html("Please Wait");
                    $(this).attr("disabled", "disabled");

                    $.ajax({
                        url: "/in/clinic/login/submit?utm_source=" + utm_source + "&utm_medium=" + utm_medium + "&utm_campaign=" + utm_campaign + "&utm_term=" + utm_term,
                        type: "POST",
                        beforeSend: function() {
                            Swal.fire({
                                title: 'Please wait while we process your order...',
                                html: '<div class="text-center"><i class="fa fa-spinner fa-spin"></i></div>',
                                showConfirmButton: false,
                                allowOutsideClick: false,
                                onBeforeOpen: () => {
                                    Swal.showLoading();
                                }
                            });
                        },
                        data: {
                            "_token": "{{ csrf_token() }}",
                            email: email,
                            password: password,
                            grandtotal: grandtotal,
                            code: code,
                            bookingdate: bookingdate,
                            bookingtime: bookingtime,
                            bookingstarttime: bookingstarttime,
                            bookingendtime: bookingendtime,
                            isbooking: isbooking,
                            session: session,
                            couponentered: couponentered,
                            package_id: package_id,
                            refer: refer,
                        },
                        success: function(response) {
                            if (response['status'] == "success") {
                                Swal.close();
                                Swal.fire({
                                    position: 'center',
                                    icon: 'success',
                                    title: response['message'],
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                                localStorage.removeItem('couponcode');
                                localStorage.removeItem('Refer');
                                // localStorage.clear();
                                window.location.href = response['redirect'];
                            } else {
                                if (isbooking == 0) {
                                    $(".btn_login_order").html("Pay Now");
                                } else {
                                    $(".btn_login_order").html("Pay In Clinic");
                                }
                                $(".btn_login_order").removeAttr("disabled");
                                Swal.fire({
                                    position: 'center',
                                    icon: 'warning',
                                    title: response['message'],
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                            }
                        },
                        error: function(e) {
                            Swal.fire({
                                position: 'center',
                                icon: 'warning',
                                title: 'Appointment booked successfully but some error occured',
                                showConfirmButton: false,
                                timer: 1500
                            });
                        }
                    });
                }
            } else {
                Swal.fire({
                    position: 'center',
                    icon: 'warning',
                    title: 'Please enter email',
                    showConfirmButton: false,
                    timer: 1500
                });
            }
        });
    });
</script>
@endsection