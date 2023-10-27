<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @yield('metas')

    <link rel="icon" href="assets/images/favicon.png" type="image/x-icon">
    <title>@yield('title')</title>

    @php
    $date = date('d-m-Y H:i:s');
    @endphp
    <link rel="stylesheet" href="{{url('/assets/css/font-awesome-all.min.css')}}?v={{$date}}">
    <link rel="stylesheet" href="{{url('/assets/css/bootstrap-5-3.min.css')}}?v={{$date}}">
    <link rel="stylesheet" href="{{url('/assets/css/style.css')}}?v={{$date}}">
    <link rel="stylesheet" href="{{url('/assets/css/main.css')}}?v={{$date}}">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.2/css/all.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.2/css/sharp-solid.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/7.0.96/css/materialdesignicons.min.css" integrity="sha512-fXnjLwoVZ01NUqS/7G5kAnhXNXat6v7e3M9PhoMHOTARUMCaf5qNO84r5x9AFf5HDzm3rEZD8sb/n6dZ19SzFA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- CSS -->
    @yield('css')
</head>

<body>
    @include('inc.header')

    @yield('content')

    <div class="slideRightToLeft cart_slider">
        <div class="base-sidebar-content">
            <div class="base-sidebar-content-body">

                <button class="back-to-cart cart_slide_close"><i class="mdi mdi-chevron-left"></i> Back</button>
                <div class="cart-full checkoutArea">
                    <h3>Your cart</h3>
                </div>
                <div class="empty-cart">
                    <div class="empty_cart_img_parent">
                        <!-- <img alt="empty cart" class="empty_cart_img"
                                src="https://www.optimizedbodyandmind.co.uk/assets/images/empty-cart.png" /> -->
                    </div>
                    <h4>Your cart is empty</h4>

                </div>
            </div>
            <div class="base-sidebar-content-sticky-footer">
                <div class="cart-connector-sticky-footer flex-container">
                    <div class="cart-connector-checkout-button">
                        <a href class="btn cart_slide_close">Continue Shopping</a>
                    </div>
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
    <script>
        AOS.init();
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