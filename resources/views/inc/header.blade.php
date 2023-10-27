<header id="header" class="d-flex align-items-center justify-content-center">
        <div class="container d-flex align-items-center justify-content-end">
            <h1 class="logo w-25">
                <a class="logo p-3" href="{{route('index')}}">
                    <img class="logo-white" src="/assets/images/fav-icon.png" alt="Logo">
                </a>
            </h1>
            <nav id="navbar" class="navbar">
                <ul style="z-index: 9 !important;">
                    <!-- FOR PC  -->
                    <li class="simple-menu mx-2 d-none d-lg-block">
                        <a class="nav-link triangle-link not-mega-menu" href="{{route('index')}}">Home</a>
                    </li>

                    <li class="dropdown mx-2 d-none d-lg-block">
                        <a href="#" class="triangle-link nav-link scrollto ">
                            Treatments
                            <i class="mdi mdi-chevron-down"></i>
                        </a>
                        <ul>
                        @foreach($services as $s)
                            <li><a href="{{url('treatments/'.$s->slug)}}" class="dropdown-lsit">{{ucwords($s->title)}}</a></li>
                        @endforeach
                            <li><a href="packages.html" class="dropdown-lsit">Packages & Promotions</a></li>
                        </ul>
                    </li>

                    <li class="simple-menu mx-2 d-none d-lg-block">
                        <a class="nav-link triangle-link not-mega-menu" href="{{route('gallery')}}">Beauty Gallery</a>
                    </li>

                    <li class="simple-menu mx-2 d-none d-lg-block">
                        <a class="nav-link triangle-link not-mega-menu" href="{{route('blogListing')}}">Expert Advice</a>
                    </li>


                    <li class="simple-menu mx-2 d-none d-lg-block">
                        <a class="nav-link triangle-link  not-mega-menu" href="{{route('gp')}}">Consultation</a>
                    </li>

                    <!-- FOR MOBILE  -->
                    <div class="accordion mobile_navbar d-block d-lg-none" id="mobile_menus">
                        <!-- home  -->
                        <div>
                            <h5 class="logo pt-4 pb-4">
                                <a href="{{route('index')}}">
                                    <img src="/assets/images/favicon.png" alt="Logo" class="img-fluid w-100">
                                </a>
                            </h5>

                        </div>
                        <hr style="color:#000" class="m-0">
                        <div>
                            <div class="accordion-header">
                                <h5 style="min-height: 40px !important;" class="accordion-header">
                                    <a href="{{route('index')}}" class="collapsed shadow-none" type="button">
                                        <i class="fa-solid fa-house"></i>&nbsp;&nbsp;Home
                                    </a>
                                </h5>
                            </div>
                        </div>

                        <!-- Mobile Campaigns  -->
                        <div id="scroll_menu_1">
                            <h5 class="accordion-header">
                                <a href="#" class="accordion-button collapsed shadow-none" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#menuOne" aria-expanded="false"
                                    aria-controls="menuOne">
                                    <i class="fa-sharp fa-solid fa-bullhorn"></i>&nbsp;&nbsp;Treatments
                                </a>
                            </h5>
                            <div id="menuOne" class="accordion-collapse collapse" data-bs-parent="#mobile_menus">
                                <div class="accordion-body">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-3 col-md-3 col-12 pl-3 mega_menu_links">
                                                <div class="row">
                                                    @foreach($services as $s)
                                                    <div class="col-12 border_left" style="vertical-align: middle;">
                                                        <a href="{{url('treatments/'.$s->slug)}}">{{ucwords($s->title)}}</a>
                                                    </div>
                                                    @endforeach

                                                    <div class="col-12 border_left" style="vertical-align: middle;">
                                                        <a href="packages.html">Packages & Promotions</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Mobile Gallery  -->
                        <div class="accordion-header">
                            <h5 style="min-height: 40px !important;" class="accordion-header">
                                <a href="{{route('gallery')}}" class="collapsed shadow-none" type="button">
                                    <i class="fa-solid fa-boxes-stacked"></i>&nbsp;&nbsp;Beauty Gallery
                                </a>
                            </h5>
                        </div>
                        
                        <!-- Mobile expert  -->

                        <div class="accordion-header">
                            <h5 style="min-height: 40px !important;" class="accordion-header">
                                <a href="{{route('blogListing')}}" class="collapsed shadow-none" type="button">
                                    <i class="fa-solid fa-hand-point-up"></i>&nbsp;&nbsp;Expert Advice
                                </a>
                            </h5>
                        </div>

                        <!-- Mobile consultation  -->
                        <div>
                            <div class="accordion-header">
                                <h5 style="min-height: 40px !important;" class="accordion-header">
                                    <a href="{{route('gp')}}" class="collapsed shadow-none" type="button">
                                        <i class="fa-solid fa-at"></i>&nbsp;&nbsp;Consultation
                                    </a>
                                </h5>
                            </div>
                        </div>
                    </div>
                </ul>
            </nav>
            <div class="navbar-user">
                <ul>
                    <!-- <a href="{{ route('index') }}/#donate-now" class="btn btn-primary d-none d-lg-block btn_donate btn-small ms-2 px-4 shadow-none">
                        Donate Now
                    </a> -->

                </ul>
                <a href="javascript:;" class="nav-link scrollto support-link cart-icon" title="My Cart">
                     <i class="fa fa-shopping-cart"> </i>
                </a>

                <i class="fa fa-solid fa-bars mobile-nav-toggle d-block d-lg-none bi-list bi-x"></i>
            </div>
        </div>
    </header>
