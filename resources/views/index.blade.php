@extends('layouts/master')

@section('metas')
@endsection

@section('title')
Wellness by Dr.Sophia - Home
@endsection

@section('css')
<style>
    .image-overlay {
        position: relative;
        display: inline-block;
        width: 100%;
    }

    .image-overlay::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: #1D66735C;
        /* Background color with transparency */
        z-index: 1;
        /* Position the overlay above the image */
    }

    .play-button {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 2;
        /* Position the button above the overlay */
    }

    .play-button i {
        font-size: 48px;
        color: #0E8BA1;
        /* Button color */
        animation: pulse 2s infinite;
        /* Pulse animation */
    }

    @keyframes pulse {
        0% {
            transform: scale(1);
        }

        50% {
            transform: scale(1.2);
        }

        100% {
            transform: scale(1);
        }
    }
</style>
@endsection

@section('content')
<main>
    <section class="banner" style="background: url('assets/images/luxury-bg.webp') 100% 100%;">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-lg-6">
                    <h2>Luxury Clinical Wellness Lab in Luton</h2>
                    <p class="banner-para-text">
                        Unveil the pinnacle of well-being at our Luxury Clinical Wellness Lab in Luton. Combining
                        opulence with advanced healthcare, we offer tailored solutions for your holistic wellness.
                    </p>
                    <a class="btn btn-bookAppointment  d-md-block d-none" href="{{route('gp')}}#gp-form">Book
                        an Appointment</a>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6">
                    <img src="/assets/images/luxury-clinic.webp" alt="luxury-clinic" class="img-fluid w-100">
                    <a class="btn btn-bookAppointment  d-block d-md-none" href="{{route('gp')}}#gp-form">Book
                        an Appointment</a>
                </div>
            </div>
        </div>
    </section>

    <section class="welcome" style="background: url('assets/images/expert-banner.webp') 100% 100%;">
        <div class="container">
            <div class="row">
                <h3> Welcome to Dr. Sophia's Wellness </h3>
                <hr>
                <div class="col-md-8 col-lg-8 col-sm-8">
                    <p class="para-text">Discover the secret to illuminous beauty with Dr. Sophia’s professional
                        aesthetics, medical facials, and injectable skin and beauty solutions.</p>
                    <p class="para-text d-md-block d-none">Specialising in bespoke cosmetic care, General
                        Practitioner and Harley
                        Street trained medical aesthetics specialist Dr. Sophia, provides a selection of services
                        that are tailored to you. She administers your personalised treatment from the sanctuary of
                        her Luton based GP surgery clinic.</p>
                    <p class="para-text d-block d-md-none">Specialising in bespoke cosmetic care, General
                        Practitioner and Harley
                        Street trained medical aesthetics specialist Dr. Sophia, provides a selection of services
                        that are tailored to you.</p>
                    <p class="para-text d-md-block d-none">Dr. Sophia's treatments are bespoke, tailor-made for the
                        individual, and
                        her commitment to professional development ensures that her treatments follow the latest in
                        state-of-the-art aesthetics Technology and techniques.</p>
                </div>
                <div class="col-md-4 col-sm-4 col-lg-4">
                    <img src="/assets/images/welcome.webp" alt="welcome" class="img-fluid w-100">
                </div>
            </div>
        </div>
    </section>

    <section class="services" style="background: url('assets/images/luxury-bg.webp') 100% 100%;">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-lg-12">
                    <h4>Our Services</h4>
                    <h3>A LUXURY CLINICAL WELLNESS LAB IN LUTON</h3>
                    <hr>
                    <p class="para-text">Experience opulent wellness at our state-of-the-art Clinical Wellness Lab
                        in Luton, offering a fusion of indulgence and advanced treatments for your complete
                        rejuvenation.</p>
                </div>
            </div>
            <div class="row d-flex align-items-center justify-content-center">
                @foreach($services as $s)
                <div class="col-md-3 col-sm-3 col-lg-3  d-flex align-items-center justify-content-center py-3">
                    <div class="image-container">
                        <img src="{{'/storage/'.($s->w_home_card_img)}}" alt="{{$s->slug}}">
                        <div class="overlay">
                            <h4>{{$s->title}}</h4>
                            <div class="content">
                                <p>{{$s->w_home_card_desc}}</p>
                                <a href="{{url('treatments/'.$s->slug)}}" class="btn btn-learnmore">Learn More</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="video">
        <div class="container">
            <h4>Why Choose Us</h4>
            <hr>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-lg-12">
                    <div class="image-overlay">
                        <img src="/assets/images/video2.webp" class="img-fluid w-100" alt="video">
                        <div class="play-button">
                            <a href="#"><i class="fa-solid fa-circle-play"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="about-me" style="background: url('assets/images/luxury-bg.webp') 100% 100%;">
        <div class="container">
            <h4>About me</h4>
            <hr>
            <div class="row">
                <div class="col-md-7 col-sm-7 col-lg-7 col1">
                    <h5>Dr. Sophia</h5>
                    <h6>aesthetics specialist</h6>
                    <p class="para-text">
                        Dr Sophia is a UK General Practitioner and medical aesthetics specialist, trained by Dr Bob
                        Khana at the world-renowned Harley Street Institute in London. Her treatments are bespoke -
                        tailor-made for the individual, and her commitment to professional development ensures that
                        her treatments follow the latest in state-of-the-art aesthetics Technology and techniques.
                    </p>
                </div>
                <div class="col-md-5 col-sm-5 col-lg-5 col2">
                    <img src="/assets/images/about.webp" alt="about" class="img-fluid ">
                </div>
            </div>
        </div>
    </section>

    <section class="request-consultation">
        <div class="container">
            <h4>REQUEST A CONSULTATION</h4>
            <hr>
            <div class="row">
                <div class="col-md-12 d-none d-md-block">
                    <h5>Fill Details</h5>
                </div>
            </div>
            <form action="#" class="ps-0" id="gpform">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 col-12 mb-3">
                        <div class="form-floating">
                            <input type="text" class="form-control shadow-none" id="first_name" placeholder="First Name" name="first_name" required>
                            <label for="first_name">First Name</label>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12 mb-3">
                        <div class="form-floating">
                            <input type="text" class="form-control shadow-none" id="last_name" placeholder="Last Name" name="last_name" required>
                            <label for="last_name">Last Name</label>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12 mb-3">
                        <div class="form-floating">
                            <input type="email" class="form-control shadow-none" id="customer_email" placeholder="Email Address" name="customer_email" required>
                            <label for="customer_email">Email Address</label>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12 mb-3">
                        <div class="form-floating">
                            <input type="text" class="form-control shadow-none" id="contact_no" placeholder="Contact Number" name="contact_no" required>
                            <label for="contact_no">Contact Number</label>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12 mb-3">
                        <div class="form-floating">
                            <input type="text" id="date" class="form-control shadow-none datepicker" id="date" placeholder="Date" name="date" required>
                            <label for="date">Date</label>
                        </div>
                    </div>
                    <div style="display: none;" class="col-lg-4 col-md-6 col-12 mb-3 inputdatetime">
                        <div class="form-floating">
                            <input required="" type="text" class="form-control shadow-none" id="inputDateTime">
                            <label for="inputDateTime"> Appointment Date &amp; Time </label>
                        </div>
                    </div>

                    <input type="hidden" id="p_id" value="64">
                    <input type="hidden" id="booking_date">
                    <input type="hidden" id="booking_time">
                    <input type="hidden" id="booking_start_time">
                    <input type="hidden" id="booking_end_time">

                    <div class="col-lg-4 col-md-12 col-12 mb-3" style="justify-content: center; display:flex !important">
                        <button type="button" id="btn_form_submit" class="btn btn-primary btn-book-order w-100 py-3 bg-blue">Book
                            Consultation</button>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <section class="who-trust d-md-block d-none">
        <div class="container  aos-init aos-animate" data-aos="zoom-in" style="overflow:hidden">
            <h4>WHO TRUST US</h4>
            <hr>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-lg-12">
                    <div id="TrustedCompanyCarousel" class="carousel slide">
                        <div class="carousel-inner">
                            <div class="carousel-item active ">
                                <div class="row px-3">
                                    <div class="col-md-3">
                                        <img src="https://optimizedbodyandmind.co.uk/storage/trusted-companies/September2022/Ct4aDHop8PSNMtD4vCC5.png" class="w-100 p-0" alt="Human Appeal" title="Human Appeal">
                                    </div>
                                    <div class="col-md-3">
                                        <img src="https://optimizedbodyandmind.co.uk/storage/trusted-companies/September2022/m6Niiay2AgiOGAHAGEAk.png" class="w-100 p-0" alt="Inspire FM" title="Inspire FM">
                                    </div>
                                    <div class="col-md-3">
                                        <img src="https://optimizedbodyandmind.co.uk/storage/trusted-companies/September2022/8EQutRwDXUzydz5BxGmR.png" class="w-100 p-0" alt="Coca Cola" title="Coca Cola">
                                    </div>
                                    <div class="col-md-3">
                                        <img src="https://optimizedbodyandmind.co.uk/storage/trusted-companies/September2022/kMuDywRgM2eUdARSwJC5.png" class="w-100 p-0" alt="West Inn" title="West Inn">
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item ">
                                <div class="row px-3">
                                    <div class="col-md-3">
                                        <img src="https://optimizedbodyandmind.co.uk/storage/trusted-companies/September2022/roVYxXMqkFzJMknorHn3.png" class="w-100 p-0" alt="Liverpool F.C" title="Liverpool F.C">
                                    </div>
                                    <div class="col-md-3">
                                        <img src="https://optimizedbodyandmind.co.uk/storage/trusted-companies/September2022/Ct4aDHop8PSNMtD4vCC5.png" class="w-100 p-0" alt="Odgers Berndtson" title="Odgers Berndtson">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="carousel-control-prev justify-content-start w-auto" type="button" data-bs-target="#TrustedCompanyCarousel" data-bs-slide="prev">
                            <span class="fas fa-chevron-left text-primary" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next justify-content-end w-auto" type="button" data-bs-target="#TrustedCompanyCarousel" data-bs-slide="next">
                            <span class="fas fa-chevron-right text-primary" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="who-trust  d-block d-md-none">
        <div class="container  aos-init aos-animate" data-aos="zoom-in" style="overflow:hidden">
            <h4>WHO TRUST US</h4>
            <hr>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-lg-12">
                    <div id="TrustedCompanyCarousel2" class="carousel slide">
                        <div class="carousel-inner px-3 ">
                            <!-- <div class="carousel-item active ">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <img src="https://optimizedbodyandmind.co.uk/storage/trusted-companies/September2022/5Tkja9OPunoqN1y8jmYe.png"
                                                class="w-100 p-0" alt="Human Appeal" title="Human Appeal">
                                        </div>
                                    </div>
                                </div> -->
                            <div class="carousel-item active ">
                                <div class="row">
                                    <div class="col-md-3">
                                        <img src="https://optimizedbodyandmind.co.uk/storage/trusted-companies/September2022/m6Niiay2AgiOGAHAGEAk.png" class="w-100 p-0" alt="Inspire FM" title="Inspire FM">
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="row">
                                    <div class="col-md-3">
                                        <img src="https://optimizedbodyandmind.co.uk/storage/trusted-companies/September2022/8EQutRwDXUzydz5BxGmR.png" class="w-100 p-0" alt="Coca Cola" title="Coca Cola">
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="row">
                                    <div class="col-md-3">
                                        <img src="https://optimizedbodyandmind.co.uk/storage/trusted-companies/September2022/kMuDywRgM2eUdARSwJC5.png" class="w-100 p-0" alt="West Inn" title="West Inn">
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item ">
                                <div class="row">
                                    <div class="col-md-3">
                                        <img src="https://optimizedbodyandmind.co.uk/storage/trusted-companies/September2022/jtwnH1XrFDbb3kjUvQKb.png" class="w-100 p-0" alt="Claridge" title="Claridge">
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item ">
                                <div class="row">
                                    <div class="col-md-3">
                                        <img src="https://optimizedbodyandmind.co.uk/storage/trusted-companies/September2022/6ZgDno3eTNP20nmA7lLN.png" class="w-100 p-0" alt="Bushmeads Primary School" title="Bushmeads Primary School">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="carousel-control-prev justify-content-start w-auto" type="button" data-bs-target="#TrustedCompanyCarousel2" data-bs-slide="prev">
                            <span class="fas fa-chevron-left text-primary" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next justify-content-end w-auto" type="button" data-bs-target="#TrustedCompanyCarousel2" data-bs-slide="next">
                            <span class="fas fa-chevron-right text-primary" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="reviews" style="background: url('assets/images/testimonials.png') 100% 100%;" class="reviews d-md-block d-none">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 pricing_plan_content">
                    <h4>What Our Client Says</h4>
                    <hr>
                </div>
            </div>
            <div id="ReviewsCarousel" class="carousel slide" data-aos="zoom-in">
                <div class="carousel-inner">
                    <div class="carousel-item active ">
                        <div class="row px-3">
                            <!-- review 1 -->
                            <div class="col-md-4 px-3">
                                <div class="card">
                                    <div class="card-body p-0">
                                        <p class="card-text py-2 px-3" style="color: black;">
                                            <span><i class="fa-solid fa-quote-left fa-lg"></i></span> I went to see
                                            Dr Sophia for two treatments recently. First being the WOW Facial, I’ve
                                            not had to wear any foundation and I’ve never had so many compliments on
                                            my skin.
                                            <span><i class="fa-solid fa-quote-right fa-lg"></i></span>
                                        </p>
                                        <hr>
                                        <div class="card-content d-flex flex-column align-items-center justify-content-center">
                                            <h6 class="pb-0 mb-0">James Jhonson</h6>
                                            <p class="text-start pt-0 mt-0">
                                                <span style="color: #ffc525;">
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                </span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- review 2 -->
                            <div class="col-md-4 px-3">
                                <div class="card">
                                    <div class="card-body p-0">
                                        <p class="card-text py-2 px-3" style="color: black;">
                                            <span><i class="fa-solid fa-quote-left fa-lg"></i></span> It's been some
                                            time since I had aesthetics work done and my skin has changed quite
                                            drastically. Dr. Sophia's consultation was so thorough and I felt able
                                            to ask endless questions - she made me feel very relaxed and informed.
                                            <span><i class="fa-solid fa-quote-right fa-lg"></i></span>
                                        </p>
                                        <hr>
                                        <div class="card-content d-flex flex-column align-items-center justify-content-center">
                                            <h6 class="pb-0 mb-0">James Jhonson</h6>
                                            <p class="text-start pt-0 mt-0">
                                                <span style="color: #ffc525;">
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                </span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- review 3 -->
                            <div class="col-md-4 px-3">
                                <div class="card">
                                    <div class="card-body p-0">
                                        <p class="card-text py-2 px-3" style="color: black;">
                                            <span><i class="fa-solid fa-quote-left fa-lg"></i></span> My experience
                                            with Dr. Sophia was terrific. She took her time with me, and she
                                            wouldn't rush me. The clinic was professional and warm and inviting -
                                            spotless, and the products are high quality.
                                            <span><i class="fa-solid fa-quote-right fa-lg"></i></span>
                                        </p>
                                        <hr>
                                        <div class="card-content d-flex flex-column align-items-center justify-content-center">
                                            <h6 class="pb-0 mb-0">James Jhonson</h6>
                                            <p class="text-start pt-0 mt-0">
                                                <span style="color: #ffc525;">
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                </span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row px-3">
                            <!-- review 1 -->
                            <div class="col-md-4 px-3">
                                <div class="card">
                                    <div class="card-body p-0">
                                        <p class="card-text py-2 px-3" style="color: black;">
                                            <span><i class="fa-solid fa-quote-left fa-lg"></i></span> Deval was
                                            excellent
                                            she made
                                            me feel so comfortable and relaxed she’s amazingly friendly and very
                                            nice …I would recommend her 💯
                                            <span><i class="fa-solid fa-quote-right fa-lg"></i></span>
                                        </p>
                                        <hr>
                                        <div class="card-content d-flex flex-column align-items-center justify-content-center">
                                            <h6 class="pb-0 mb-0">James Jhonson</h6>
                                            <p class="text-start pt-0 mt-0">
                                                <span style="color: #ffc525;">
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                </span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev justify-content-start w-auto" type="button" data-bs-target="#ReviewsCarousel" data-bs-slide="prev">
                    <span class="fas fa-chevron-left text-primary" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next justify-content-end w-auto" type="button" data-bs-target="#ReviewsCarousel" data-bs-slide="next">
                    <span class="fas fa-chevron-right text-primary" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </section>

    <section id="reviews" class="reviews d-block d-md-none " style="background: url('assets/images/testimonials.png') 100% 100%;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 pricing_plan_content">
                    <h4>What Our Client Says</h4>
                    <hr>
                </div>
            </div>
            <div id="ReviewsCarousel2" class="carousel slide" data-aos="zoom-in">
                <div class="carousel-inner">
                    <div class="carousel-item active ">
                        <div class="row  px-3">
                            <!-- review 1 -->
                            <div class="col-md-4 px-3">
                                <div class="card">
                                    <div class="card-body p-0">
                                        <p class="card-text py-2 px-3" style="color: black;">
                                            <span><i class="fa-solid fa-quote-left fa-lg"></i></span> I went to see
                                            Dr Sophia for two treatments recently. First being the WOW Facial, I’ve
                                            not had to wear any foundation and I’ve never had so many compliments on
                                            my skin.
                                            <span><i class="fa-solid fa-quote-right fa-lg"></i></span>
                                        </p>
                                        <hr>
                                        <div class="card-content d-flex flex-column align-items-center justify-content-center">
                                            <h6 class="pb-0 mb-0">James Jhonson</h6>
                                            <p class="text-start pt-0 mt-0">
                                                <span style="color: #ffc525;">
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                </span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row px-3">
                            <!-- review 2 -->
                            <div class="col-md-4 px-3">
                                <div class="card">
                                    <div class="card-body p-0">
                                        <p class="card-text py-2 px-3" style="color: black;">
                                            <span><i class="fa-solid fa-quote-left fa-lg"></i></span> It's been some
                                            time since I had aesthetics work done and my skin has changed quite
                                            drastically. Dr. Sophia's consultation was so thorough and I felt able
                                            to ask endless questions - she made me feel very relaxed and informed.
                                            <span><i class="fa-solid fa-quote-right fa-lg"></i></span>
                                        </p>
                                        <hr>
                                        <div class="card-content d-flex flex-column align-items-center justify-content-center">
                                            <h6 class="pb-0 mb-0">James Jhonson</h6>
                                            <p class="text-start pt-0 mt-0">
                                                <span style="color: #ffc525;">
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                </span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row px-3">
                            <!-- review 3 -->
                            <div class="col-md-4 px-3">
                                <div class="card">
                                    <div class="card-body p-0">
                                        <p class="card-text py-2 px-3" style="color: black;">
                                            <span><i class="fa-solid fa-quote-left fa-lg"></i></span> My experience
                                            with Dr. Sophia was terrific. She took her time with me, and she
                                            wouldn't rush me. The clinic was professional and warm and inviting -
                                            spotless, and the products are high quality.
                                            <span><i class="fa-solid fa-quote-right fa-lg"></i></span>
                                        </p>
                                        <hr>
                                        <div class="card-content d-flex flex-column align-items-center justify-content-center">
                                            <h6 class="pb-0 mb-0">James Jhonson</h6>
                                            <p class="text-start pt-0 mt-0">
                                                <span style="color: #ffc525;">
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                </span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev justify-content-start w-auto" type="button" data-bs-target="#ReviewsCarousel2" data-bs-slide="prev">
                    <span class="fas fa-chevron-left text-primary" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next justify-content-end w-auto" type="button" data-bs-target="#ReviewsCarousel2" data-bs-slide="next">
                    <span class="fas fa-chevron-right text-primary" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </section>

    <section id="recent-blogs" class="recent-blogs d-md-block d-none">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 text-center pricing_plan_content">
                    <h4 class="color-blue fw-600">Our Recent Blogs</h4>
                    <hr>
                </div>
            </div>
            <div id="blogsCarousel" class="new-full-image-blog carousel slide" data-aos="zoom-in">
                <div class="carousel-inner">
                    @foreach ($blogs->chunk(3) as $chunk)
                    <div class="carousel-item{{ $loop->first ? ' active' : '' }}">
                        <div class="row px-3">
                            @foreach ($chunk as $blog)
                            <div class="col-md-4 px-3">
                                <div class="card text-start">
                                    <div class="card-img-top">
                                        <img src="https://demo.optimizedbodyandmind.co.uk/storage/{{ $blog->image }}" alt="{{$blog->slug}}" class="img-fluid w-100">
                                    </div>
                                    <div class="card-body d-flex flex-column justify-content-center">
                                        <div>
                                            <p class="para-head">
                                                <a href="/blogs/{{ $blog->slug }}" class="para-head">{{ $blog->title }}</a>
                                            </p>
                                            <div class="d-flex">
                                                <p class="col-md-6 col-sm-6 col-lg-6 col-6 mb-0">
                                                    <a href="/blogs/{{ $blog->slug }}" class="read-more">
                                                        Read More <span><i class="fa-solid fa-angles-right"></i></span>
                                                    </a>
                                                </p>
                                                <p class="col-md-6 col-sm-6 col-lg-6 col-6 date">{{ date('d M Y', strtotime($blog->created_at)) }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev justify-content-start w-auto" type="button" data-bs-target="#blogsCarousel" data-bs-slide="prev">
                    <span class="fas fa-chevron-left text-primary" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next justify-content-end w-auto" type="button" data-bs-target="#blogsCarousel" data-bs-slide="next">
                    <span class="fas fa-chevron-right text-primary" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </section>

    <section id="recent-blogs" class="recent-blogs d-block d-md-none">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 text-center pricing_plan_content">
                    <h4 class="color-blue fw-600">Our Recent Blogs</h4>
                    <hr>
                </div>
            </div>
            <div id="blogsCarousel2" class="new-full-image-blog  carousel slide" data-aos="zoom-in">
                <div class="carousel-inner">
                    @foreach ($blogs as $key => $blog)
                    <div class="carousel-item @if($key === 0) active @endif">
                        <div class="row px-2">
                            <!-- blog 1 -->
                            <div class="col-md-4 px-3">
                                <div class="card text-start">
                                    <div class="card-img-top">
                                        <img src="https://demo.optimizedbodyandmind.co.uk/storage/{{ $blog->image }}" alt="{{$blog->slug}}" class="img-fluid w-100">
                                    </div>
                                    <div class="card-body d-flex flex-column justify-content-center">
                                        <div>
                                            <p class="para-head">
                                                <a href="/blogs/{{$blog->slug}}" class="para-head">{{$blog->title}}</a>
                                            </p>
                                            <div class="d-flex">
                                                <p class="col-md-6 col-sm-6 col-lg-6 col-6 mb-0">
                                                    <a href="/blogs/{{$blog->slug}}" class="read-more">
                                                        Read More <span><i class="fa-solid fa-angles-right"></i></span>
                                                    </a>
                                                </p>
                                                <p class="col-md-6 col-sm-6 col-lg-6 col-6 date">{{date('d-m-Y', strtotime($blog->created_at))}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev justify-content-start w-auto" type="button" data-bs-target="#blogsCarousel2" data-bs-slide="prev">
                    <span class="fas fa-chevron-left text-primary" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next justify-content-end w-auto" type="button" data-bs-target="#blogsCarousel2" data-bs-slide="next">
                    <span class="fas fa-chevron-right text-primary" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </section>


</main>
@endsection

@section('javascript')

@endsection