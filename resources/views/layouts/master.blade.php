<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @yield('metas')
    <link data-n-head="ssr" data-hid="canonical" rel="canonical" href="{{ request()->url() }}">
    <link rel="icon" href="/assets/images/favicon.webp" type="image/x-icon">
    <title>@yield('title')</title>

    @php
    $date = date('d-m-Y H:i:s');
    @endphp
    <link rel="stylesheet" href="{{url('/assets/css/font-awesome-all.min.css')}}?v={{$date}}">
    <link rel="stylesheet" href="{{url('/assets/css/bootstrap-material-datetimepicker.css')}}?v={{$date}}">
    <link rel="stylesheet" href="{{url('/assets/css/bootstrap-5-3.min.css')}}?v={{$date}}">
    <link rel="stylesheet" href="{{url('/assets/css/style.css')}}?v={{$date}}">
    <link rel="stylesheet" href="{{url('/assets/css/main.css')}}?v={{$date}}">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.2/css/all.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.2/css/sharp-solid.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="https://www.optimizedbodyandmind.co.uk/assets/css/bootstrap-material-datetimepicker.css?v=1698731609" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- CSS -->
    <style>
        .dtp>.dtp-content>.dtp-date-view>header.dtp-header {
            background-color: #0e8ba1;
        }

        .dtp div.dtp-date,
        .dtp div.dtp-time {
            background-color: #1d6673;
        }

        .dtp table.dtp-picker-days tr>td>a.selected {
            background-color: #0e8ba1;
        }

        .dtp .p10>a {
            color: #0e8ba1;
        }

        .booking-engineen .modal-title {
            color: gray;
        }

        .booking-engineen .modal-body {
            max-height: 350px;
            overflow-x: auto;
        }

        .booking-engineen-btn label {
            /* width: 25%; */
            width: 100%;
        }

        .navbar-user a span.cart-num {
            position: absolute;
            top: 0px;
            background: #ed0000;
            font-size: 11px;
            color: white;
            width: 18px;
            height: 18px;
            border-radius: 50%;
            line-height: 18px;
            text-align: center;
            padding: 0;
            right: 3px;
        }

        .checkoutArea .item_quantity {
            width: 22px;
            height: 22px;
            background: #0e8ba1;
            border-radius: 360px;
            font-size: 10px;
            color: #fff;
            text-align: center;
            line-height: 22px;
            position: absolute;
            top: -10px;
            right: -10px;
            font-weight: 700;
        }

        .base-sidebar-content-body h4 {
            font-size: 18px;
        }
        .test_price{
            color: #1d6673;
        }
        @media only screen and (max-width: 600px) {
            .navbar-user a span.cart-num {
                right: 30px;
            }
        }
    </style>
    @yield('css')
</head>

<body>
    @include('inc.header')

    @yield('content')

    <div class="slideRightToLeft cart_slider">
        <div class="base-sidebar-content">
            <div class="base-sidebar-content-body">
                <!-- <button class="back-to-cart"><i class="mdi mdi-chevron-left"></i> Back</button> -->
                <button class="back-to-cart cart_slide_close"><i class="mdi mdi-chevron-left"></i> Back</button>
                <div class="cart-full checkoutArea">
                    @if(isset($cart_items))
                    <h3>Your cart</h3>
                    @foreach ($cart_items as $key => $value)
                    <div class="row @if($loop->iteration > 1) border-top pt-4 @endif">
                        <div class="col-4 col-lg-3 position-relative">
                            {{-- <a href="/{{ $value->associatedModel->category_detail->slug }}/{{ $value->associatedModel->slug }}"> --}}
                            <a href="#">
                                <div class="position-relative" style="width: 100%; max-width: 125px; margin: 0 auto; background: #ddd">
                                    <img alt="{{$value->name}}" class="img-fluid" src="https://demo.optimizedbodyandmind.co.uk/storage/{{ $value->associatedModel->image }}">
                                    <div class="item_quantity">{{ $value->quantity }}</div>
                                </div>
                            </a>
                        </div>
                        <div class="col-8 col-lg-9">
                            <div class="row g-0">
                                <div class="row g-0">
                                    <div class="col-12 col-md-9">
                                        <a href="/{{ $value->associatedModel->category_detail->slug }}/{{ $value->associatedModel->slug }}" style="color:#000">
                                            <h4 class="test_title small_title d-inline m-0">
                                                {{ $value->name }}
                                            </h4>
                                        </a>
                                        <br>
                                        @foreach($value->associatedModel->general_options as $go)
                                        <p class="mb-2" style="font-size: 13px"><i style="color: #0174cf" class='bx bxs-check-circle'></i> {{$go->general_detail->title}}</p>
                                        @endforeach
                                        @if(!empty($value->associatedModel->book_order))
                                        <p class="mb-2" style="font-size: 13px">
                                            @if(!empty($value->attributes['type']))
                                            @if($value->attributes['type'] == 1)
                                            <i style="color: #0174cf" class='bx bxs-check-circle'></i> Home Delivery
                                        </p>
                                        {{-- <p class="mb-2" style="font-size: 13px"><i style="color: #0174cf" class='bx bxs-check-circle'></i> 2-3 Days Delivery --}}
                                        @elseif($value->attributes['type'] == 2)
                                        <i style="color: #0174cf" class='bx bxs-check-circle'></i> Click & Collect
                                        <br>
                                        @if(isset($value->attributes['pharmacyname']))
                                        Pharmacy name: {{ucfirst($value->attributes['pharmacyname'])}}
                                        @endif
                                        @else
                                        <i style="color: #0174cf" class='bx bxs-check-circle'></i> In Clinic
                                        @endif
                                        @else
                                        <i style="color: #0174cf" class='bx bxs-check-circle'></i> In Clinic
                                        @endif
                                        </p>
                                        @endif
                                        @if($value->associatedModel->category == 32)
                                        <p class="mb-2" style="font-size: 12px; color:green">Session Time: {{ $value->attributes->total_sessions}}</p>
                                        @elseif($value->attributes->total_sessions)
                                        <p class="mb-2" style="font-size: 12px; color:green">Total Session: {{ $value->attributes->total_sessions}}</p>
                                        @endif
                                        @if($value->attributes->package_name)
                                        <p class="mb-2" style="font-size: 12px; color:green; text-align: left !important; display:block !important;">Package: <span id="nosession">{{ $value->attributes->package_name}}</span></p>
                                        @endif
                                        @if(isset($value->attributes->discount['old_price']))
                                        <p class="mb-2" style="font-size: 12px; color:green">Discount: <br />{{ $value->attributes->discount['discount_title'] }}</p>
                                        @endif
                                        {{-- @if($value->attributes->booking_date_time)
												<p class="mb-2" style="font-size: 12px;">Booking Date & Time: <br />{{ $value->attributes->booking_date_time }}</p>
                                        @endif --}}
                                        {{-- @if(isset($value->attributes->discount['expiry_date']))
												<p class="mb-2" style="font-size: 12px; color:green">Discount: <br />{{ $value->attributes->discount['expiry_date'] }}</p>
                                        @endif --}}
                                    </div>

                                    <div class="col-5 col-md-3">
                                        <div class="test_price">
                                            <span class="price_icon">£</span>{{ number_format($value->price*$value->quantity,2) }}
                                        </div>
                                        @if($value->attributes->old_laser_price != "")
                                        <div class="cross-price">Was <b>&pound;{{ number_format($value->attributes->old_laser_price,2) }}</b></div>
                                        @elseif(isset($value->associatedModel->old_price))
                                        <div class="cross-price">Was <b>&pound;{{ number_format($value->associatedModel->old_price,2) }}</b></div>
                                        @elseif($value->attributes->old_price != "")
                                        <div class="cross-price">Was <b>&pound;{{ number_format($value->attributes->old_price,2) }}</b></div>
                                        @endif
                                    </div>
                                    <div class="cart-full-remove">
                                        <a href="/my-cart/{{ $value->associatedModel->id }}/remove{{$utm}}" class="remove-btn">Remove &nbsp; <i class="fa fa-trash"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
                @if(!count($cart_items))
                <div class="empty-cart">
                    <div class="empty_cart_img_parent">
                        <!-- <img alt="empty cart" class="empty_cart_img" src="{{ url('/assets/images/empty-cart.png') }}" /> -->
                    </div>
                    <h4>Your cart is empty</h4>
                    <!-- <button type="button">Take quiz</button> -->
                </div>
                @endif
            </div>
            <div class="base-sidebar-content-sticky-footer">
                <div class="cart-connector-sticky-footer flex-container">
                    <div class="cart-connector-checkout-button">
                        <a href class="btn cart_slide_close">Continue Shopping</a>
                    </div>
                    @if(count($cart_items))
                    <div class="cart-connector-checkout-button d-flex align-items-end justify-content-end">
                        <a href="{{route('cart.my-cart')}}" class="btn cart_slide_close">Go to cart</a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="modal booking-engineen" id="AppTimes">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <input type="hidden" id="key">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title app-timings-heading"></h4>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <div class="row text-center mx-0 app-timings">
                            <p>Checking availability
                            <p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer btns-aptime">
                    <button type="button" id="hide-modal" class="btn waves-effect" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    @include('inc.footer')

    <script src="{{url('/assets/js/main.js')}}"></script>
    <script src="{{url('/assets/js/bootstrap-5-3.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript" src="https://www.optimizedbodyandmind.co.uk/assets/js/moment-with-locales.min.js?v=1698731609"></script>
    <script type="text/javascript" src="https://www.optimizedbodyandmind.co.uk/assets/js/bootstrap-material-datetimepicker.js"></script>
    <script>
        AOS.init();
    </script>
    <script>
        $(document).ready(function() {
            $("#contact_no").mask('99999-999999');
            $("#hide-modal").click(function() {
                $("#date").removeAttr("disabled");
                $("#AppTimes").modal("hide");
            });
            $("#date").bootstrapMaterialDatePicker({
                format: 'DD/MM/YYYY',
                minDate: new Date(),
                time: false,
                disabledDays: [7]
            }).on('change', function(e, date) {
                var date = $('#date').val();
                var data = date.split(" ");
                var appdates = data[0].split("/");
                var appdate = appdates[0] + "-" + appdates[1] + "-" + appdates[2];
                var apptime = data[1];
                var product_id = $("#p_id").val();
                $(this).attr("disabled", "disabled");
                $.ajax({
                    url: '{{route("check_avalibilty")}}',
                    method: 'POST',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "date": appdate,
                        "product_id": product_id,
                    },
                    success: function(data) {
                        if (data['status'] == 422) {
                            Swal.fire({
                                position: 'center',
                                icon: 'warning',
                                title: data['message'],
                                showConfirmButton: false,
                                timer: 3000
                            });
                            $(".btn-book-order").removeAttr("disabled", "disabled");
                            $('#date').val("");
                            $("#date").removeAttr("disabled");
                        } else {
                            var res = data;
                            var test_id = data.test_id;
                            var format_date = data.date;
                            $('#date').val("");
                            $('#AppTimes').modal('show');
                            $(".app-timings").html("Checking availability");
                            $(".app-timings-heading").html("Please select the Appointment Time for <b><u>" + res['user_date'] +
                                "</b></u>");
                            $(".btns-aptime").hide();
                            var timings_html = "";
                            if (res['timings'].length > 0) {
                                var status = "";
                                var timings_html = "";
                                for (var x = 0; x < res['timings'].length; x++) {
                                    status = true;
                                    // CHECK appointments
                                    for (var y = 0; y < res['product_appointments'].length; y++) {
                                        if (
                                            res['timings'][x]['start'] ==
                                            res['product_appointments'][y]['start'] ||
                                            res['timings'][x]['start'] >
                                            res['product_appointments'][y]['start'] &&
                                            res['timings'][x]['end'] <
                                            res['product_appointments'][y]['end'] ||
                                            res['timings'][x]['end'] ==
                                            res['product_appointments'][y]['end']
                                        ) {
                                            // console.log('status00', res['product_appointments'][y]['time'])
                                            // console.log('status11', res['timings'][x]['time'])
                                            status = false;
                                        }
                                    }
                                    if (status == true) {
                                        if (date == '15/06/2023' || date == '22/06/2023' || date == '24/06/2023' || date == '26/06/2023' || date == '06/07/2023' || date == '14/07/2023' || date == '17/07/2023' || date == '26/07/2023') {
                                            if (test_id != 111) {
                                                timings_html += '<div class="col-3"><div class="booking-engineen-btn">';
                                                timings_html += '<label style = "background-color:#1d6673;color:white;" disabled for="appointment-' + x +
                                                    '" class="btn waves-effect timing_muted" data-id="' + x + '" id="timing_muted-' + x + '">' + 'Booked' + '</label>';
                                                timings_html += '</div></div>';
                                            } else {
                                                timings_html += '<div class="col-3"><div class="booking-engineen-btn">';
                                                timings_html += '<input type="radio" class="btn-check aptime" data-date="' +
                                                    format_date + '" data-time-start="' + res['timings'][x]['start'] +
                                                    '" data-time-end="' + res['timings'][x]['end'] + '" id="appointment-' + x +
                                                    '" data-test_id="' + test_id +
                                                    '" value="' + res['timings'][x]['time'] + '" name="appointment" />';
                                                timings_html += '<label for="appointment-' + x + '" class="btn waves-effect">' +
                                                    res['timings'][x]['time'] + '</label>';
                                                timings_html += '</div></div>';
                                            }
                                        } else {
                                            timings_html += '<div class="col-3"><div class="booking-engineen-btn">';
                                            timings_html += '<input type="radio" class="btn-check aptime" data-date="' +
                                                format_date + '" data-time-start="' + res['timings'][x]['start'] +
                                                '" data-time-end="' + res['timings'][x]['end'] + '" id="appointment-' + x +
                                                '" data-test_id="' + test_id +
                                                '" value="' + res['timings'][x]['time'] + '" name="appointment" />';
                                            timings_html += '<label for="appointment-' + x + '" class="btn waves-effect">' +
                                                res['timings'][x]['time'] + '</label>';
                                            timings_html += '</div></div>';
                                        }

                                    } else {
                                        timings_html += '<div class="col-3"><div class="booking-engineen-btn">';
                                        timings_html += '<label style = "background-color:#1d6673;color:white;" disabled for="appointment-' + x +
                                            '" class="btn waves-effect timing_muted" data-id="' + x + '" id="timing_muted-' + x + '">' + 'Booked' + '</label>';
                                        timings_html += '</div></div>';
                                    }
                                }
                            } else {
                                timings_html = "Sorry! No timings found. Please try to change the date, Thanks";
                            }
                        }
                        setTimeout(function() {
                            $(".app-timings").html(timings_html);
                            $(".btns-aptime").fadeIn();
                            rebind_controle();
                        }, 100);
                    },
                    error: function(errordata) {
                        console.log(errordata)
                    }
                });
            });

            $(".btn-book-order").click(function() {
                var id = $(this).data("id");
                var firstname = $("#first_name").val();
                var lastname = $("#last_name").val();
                var contactno = $("#contact_no").val();
                var email = $("#customer_email").val();
                var inputdatetime = $("#inputDateTime").val();
                var bookingdate = $("#booking_date").val();
                var bookingtime = $("#booking_time").val();
                var bookingstarttime = $("#booking_start_time").val();
                var bookingendtime = $("#booking_end_time").val();
                // var preferences = $("#preferences").val();
                // debugger;
                if (firstname != "") {
                    if (lastname != "") {
                        if (contactno != "") {
                            if (contactno.length == 12) {
                                if (email != "") {
                                    if (inputdatetime != "") {
                                        $(this).attr("disabled", "disabled");
                                        $(this).html("Please wait <i class='fa-duotone fa-spinner-third fa-spin'></i>");
                                        $.ajax({
                                            url: "/gp-consultation/submit",
                                            type: "POST",
                                            data: {
                                                "_token": "{{ csrf_token() }}",
                                                firstname: firstname,
                                                lastname: lastname,
                                                contactno: contactno,
                                                email: email,
                                                bookingdate: bookingdate,
                                                bookingtime: bookingtime,
                                                bookingstarttime: bookingstarttime,
                                                bookingendtime: bookingendtime,
                                                id: id,
                                            },
                                            success: function(response) {
                                                if (response['status'] == "success") {
                                                    Swal.fire({
                                                        text: response['message'],
                                                        showConfirmButton: false,
                                                        allowOutsideClick: false,
                                                        didOpen: () => {
                                                            Swal.showLoading();
                                                        }
                                                    });
                                                    setTimeout(function() {
                                                        window.location.href = response['redirect'];
                                                    }, 1500)
                                                }
                                            }
                                        });
                                    } else {
                                        Swal.fire({
                                            position: 'center',
                                            icon: 'warning',
                                            title: 'Please select date & time',
                                            showConfirmButton: false,
                                            timer: 1500
                                        });
                                    }
                                } else {
                                    Swal.fire({
                                        position: 'center',
                                        icon: 'warning',
                                        title: 'Please enter your email',
                                        showConfirmButton: false,
                                        timer: 1500
                                    });
                                }
                            } else {
                                Swal.fire({
                                    position: 'center',
                                    icon: 'warning',
                                    title: 'Contact Number is Invalid',
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                            }
                        } else {
                            Swal.fire({
                                position: 'center',
                                icon: 'warning',
                                title: 'Please enter contact number',
                                showConfirmButton: false,
                                timer: 1500
                            });
                        }
                    } else {
                        Swal.fire({
                            position: 'center',
                            icon: 'warning',
                            title: 'Please enter last name',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }
                } else {
                    Swal.fire({
                        position: 'center',
                        icon: 'warning',
                        title: 'Please enter first name',
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            });
        });

        function rebind_controle() {
            $(".aptime").bind("click", function() {
                const date = new Date($(this).data("date"));
                const day = String(date.getDate()).padStart(2, '0');
                const month = String(date.getMonth() + 1).padStart(2, '0');
                const year = date.getFullYear();
                const formatteddate = day + '-' + month + '-' + year;
                const starttime = $(this).data("time-start");
                const endtime = $(this).data("time-end");
                const testid = $(this).data("test_id");
                $('#booking_date').val(formatteddate);
                $('#booking_time').val(starttime + " - " + endtime);
                $('#booking_start_time').val(starttime);
                $('#booking_end_time').val(endtime);
                $('#inputDateTime').val(formatteddate + ", " + starttime + " - " + endtime);
                $(".inputdatetime").show();
                $("#date").removeAttr("disabled");
                $("#date").val(formatteddate);
                $("#AppTimes").modal("hide");
                $('.app-datetime').show();
                if (testid != 111) {
                    if (formatteddate === '07-06-2023') {
                        if (starttime >= "14:30" || endtime >= "14:30") {
                            Swal.fire({
                                position: 'center',
                                icon: 'warning',
                                title: 'Sorry! We are fully booked',
                                showConfirmButton: false,
                                timer: 1500
                            });
                            $('#booking_date').val("");
                            $('#booking_time').val("");
                            $('#booking_start_time').val("");
                            $('#booking_end_time').val("");
                            $('#inputDateTime').val("");
                        } else {
                            $(".customer_info").slideDown();
                        }
                    } else {
                        $(".customer_info").slideDown();
                    }
                } else {
                    $(".customer_info").slideDown();
                }
            });
        }
    </script>
    <script>
        $(document).on('click', ".cart-icon", function() {
            if ($(".cart_slider").hasClass("show") === false) {
                $(".cart_slider").addClass("show");
                $("body").attr("style", "overflow: hidden;");
                $(".base-sidebar-background").css("display", "");
            } else {
                $(".cart_slider").removeClass("show");
                $("body").removeAttr("style");
            }
        });
        $(document).on('click', ".cart_slide_close, .base-sidebar-background", function() {
            $(".cart_slider").removeClass("show");
            $(".base-sidebar-background").css("overflow", "hidden");
            $("body").removeAttr("style");
            $(".base-sidebar-background").css("display", "none");
        });
        $(".mobile-nav-toggle").on("click", function() {
            if ($(".navbar-user").hasClass("navbar-active")) {
                $(".navbar-user").removeClass("navbar-active");
                $('.mobile-nav-toggle').hasClass(".toggle-on");
                $('.mobile-nav-toggle').removeClass(".toggle-on");
            } else {
                $(".navbar-user").addClass("navbar-active");
                $('.mobile-nav-toggle').addClass(".toggle-on")
            }
        });
    </script>
    @yield('javascript')

</body>

</html>