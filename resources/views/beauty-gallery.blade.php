@extends('layouts/master')

@section('metas')
@endsection

@section('title')
@endsection

@section('css')
<style>
    .modal-content {
    position: absolute;
    top: 100px;
    }
</style>
@endsection

@section('content')
<main>
    <section class="banner" style="background-image:url('assets/images/expert-banner.png'); background-size: 100% 100%;">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-lg-6">
                    <h2 class="expert-head">BEAUTY GALLERY</h2>
                    <p class="banner-para-text">
                        A beauty gallery of cosmetology treatments showcases a stunning array of transformative
                        procedures and therapies. From rejuvenating facials to luxurious hair treatments, this
                        visual journey celebrates the artistry and science of enhancing one's natural beauty.
                    </p>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 p-0">
                    <img src="/assets/images/beauty-banner-img.png" alt="dr" class="img-fluid px-3 w-100">
                </div>
            </div>
        </div>
    </section>

    <section class="our-gallery" style="background-image:url('assets/images/luxury-bg.png');background-size: 100% 100%;">
        <div class="container">
            <h3>Our Gallery</h3>
            <hr>
            <div class="row d-flex align-items-center justify-content-center">
                <div class="col-md-3 col-sm-3 col-lg-3 px-3 py-3">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#galleryModal">
                        <div class="image-container px-3">
                            <div class="box"></div>
                            <img class="img-fluid " src="/assets/images/beauty-card-1.png" alt="beauty-card-1">
                        </div>
                        <p class="para-head">Aesthetic Treatment</p>
                    </a>
                </div>
                <div class="col-md-3 col-sm-3 col-lg-3 px-3 py-3">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#galleryModal">
                        <div class="image-container px-3">
                            <div class="box"></div>
                            <img class="img-fluid " src="/assets/images/beauty-card-2.png" alt="beauty-card-2">
                        </div>

                        <p class="para-head">Injectable Treatment</p>
                    </a>
                </div>
                <div class="col-md-3 col-sm-3 col-lg-3 px-3 py-3">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#galleryModal">
                        <div class="image-container px-3">
                            <div class="box"></div>
                            <img class="img-fluid " src="/assets/images/beauty-card-3.png" alt="beauty-card-3">
                        </div>

                        <p class="para-head">Medical Facial
                            Treatment</p>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section id="reviews" style="background: url('assets/images/testimonials.png');background-size: 100% 100%;" class="reviews d-md-block d-none">
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

    <section id="reviews" class="reviews d-block d-md-none " style="background: url('assets/images/testimonials.png');background-size: 100% 100%;">
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

    <section class="request-consultation">
        <div class="container">
            <h4>REQUEST A CONSULTATION</h4>
            <hr>
            <div class="row">
                <div class="col-md-12 d-none d-md-block">
                    <h5>Fill Details</h5>
                </div>
            </div>
            <form action="#" class="ps-0" id="contact_us_form">
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
                            <input type="email" class="form-control shadow-none" id="landing_email" placeholder="Email Address" name="landing_email" required>
                            <label for="landing_email">Email Address</label>
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
                            <input type="date" class="form-control shadow-none" id="date" placeholder="Date" name="date" required>
                            <label for="date">Date</label>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-12 mb-3" style="justify-content: center; display:flex !important">
                        <button type="button" id="btn_form_submit" class="btn btn-primary w-100 py-3 bg-blue">Book
                            Consultation</button>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <div class="modal fade" id="galleryModal" tabindex="-1" aria-labelledby="galleryModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="galleryModalLabel">Gallery</h5>
                    <button type="button" class="btn-x" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
                </div>
                <div class="modal-body">
                    <div id="product-slider" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="image">
                                    <img src="/assets/images/gallery/1.png" class="d-block w-100" alt="Product">
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="image">
                                    <img src="/assets/images/gallery/2.png" class="d-block w-100" alt="Product">
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="image">
                                    <img src="/assets/images/gallery/3.png" class="d-block w-100" alt="Product">
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="image">
                                    <img src="/assets/images/gallery/4.png" class="d-block w-100" alt="Product">
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="image">
                                    <img src="/assets/images/gallery/5.png" class="d-block w-100" alt="Product">
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="image">
                                    <img src="/assets/images/gallery/6.png" class="d-block w-100" alt="Product">
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="image">
                                    <img src="/assets/images/gallery/7.png" class="d-block w-100" alt="Product">
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="image">
                                    <img src="/assets/images/gallery/8.png" class="d-block w-100" alt="Product">
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="image">
                                    <img src="/assets/images/gallery/9.png" class="d-block w-100" alt="Product">
                                </div>
                            </div>
                        </div>
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#product-slider" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1">
                                <img src="/assets/images/gallery/1.png" class="d-block w-100" alt="Product">
                            </button>
                            <button type="button" data-bs-target="#product-slider" data-bs-slide-to="1" aria-label="Slide 2">
                                <img src="/assets/images/gallery/2.png" class="d-block w-100" alt="Product">
                            </button>
                            <button type="button" data-bs-target="#product-slider" data-bs-slide-to="2" aria-label="Slide 3">
                                <img src="/assets/images/gallery/3.png" class="d-block w-100" alt="Product">
                            </button>
                            <button type="button" data-bs-target="#product-slider" data-bs-slide-to="3" aria-label="Slide 4">
                                <img src="/assets/images/gallery/4.png" class="d-block w-100" alt="Product">
                            </button>
                            <button type="button" data-bs-target="#product-slider" data-bs-slide-to="4" aria-label="Slide 5">
                                <img src="/assets/images/gallery/5.png" class="d-block w-100" alt="Product">
                            </button>
                            <button type="button" data-bs-target="#product-slider" data-bs-slide-to="5" aria-label="Slide 6">
                                <img src="/assets/images/gallery/6.png" class="d-block w-100" alt="Product">
                            </button>
                            <button type="button" data-bs-target="#product-slider" data-bs-slide-to="6" aria-label="Slide 7">
                                <img src="/assets/images/gallery/7.png" class="d-block w-100" alt="Product">
                            </button>
                            <button type="button" data-bs-target="#product-slider" data-bs-slide-to="7" aria-label="Slide 8">
                                <img src="/assets/images/gallery/8.png" class="d-block w-100" alt="Product">
                            </button>
                            <button type="button" data-bs-target="#product-slider" data-bs-slide-to="8" aria-label="Slide 9">
                                <img src="/assets/images/gallery/9.png" class="d-block w-100" alt="Product">
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>
@endsection

@section('javascript')
@endsection