@extends('layouts/master')

@section('metas')
@endsection

@section('title')
@endsection

@section('css')
<style>
    .recent-blogs .card {
        margin-top: 1rem;
        margin-bottom: 1rem;
    }
</style>
@endsection

@section('content')
<main>
    <section class="banner pt-0" style="background-image:url('assets/images/expert-banner.png');background-size: 100% 100%;">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-lg-6 pt-5">
                    <h2 class="expert-head">EXPERT ADVICE BY DR SOPHIA</h2>
                    <p class="banner-para-text">
                        In this exclusive segment, we bring you expert advice by Dr. Sophia, a renowned authority in
                        the field of dermatology and skincare.
                    </p>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6">
                    <img src="/assets/images/expert-img.png" alt="dr" class="img-fluid w-100">
                </div>
            </div>
        </div>
    </section>

    <section class="expert-blogs" style="background: #F6F7F2;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 text-center pricing_plan_content">
                    <h4 class="color-blue fw-600">Blogs</h4>
                    <hr>
                </div>
            </div>
            <div class="row d-flex align-items-center justify-content-center">
                <div class="col-md-4 col-sm-4 col-lg-4 px-1 py-1">
                    <div class="card text-start">
                        <div class="card-img-top">
                            <img src="/assets/images/blog-1.png" class="img-fluid w-100" alt="blog">
                        </div>
                        <div class="card-body d-flex flex-column justify-content-center">
                            <div>
                                <p class="para-head">Getting Glam for the Event: Your Ultimate Pre-Party
                                    Preparation Guide
                                </p>
                                <div class="d-flex">
                                    <p class="col-md-6 col-sm-6 col-lg-6 col-6 mb-0">
                                        <a href="blog-detail.html" class="read-more">
                                            Read More <span><i class="fa-solid fa-angles-right"></i></span>
                                        </a>
                                    </p>
                                    <p class="col-md-6 col-sm-6 col-lg-6 col-6 date">07 Aug 2023</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-lg-4 px-1 py-1">
                    <div class="card text-start">
                        <div class="card-img-top">
                            <img src="/assets/images/blog-2.png" class="img-fluid w-100" alt="blog">
                        </div>
                        <div class="card-body d-flex flex-column justify-content-center">
                            <div>
                                <p class="para-head">Winter Skin Care: Protecting and Nourishing Your
                                    Skin During the Cold
                                    Months</p>
                                <div class="d-flex">
                                    <p class="col-md-6 col-sm-6 col-lg-6 col-6 mb-0">
                                        <a href="blog-detail.html" class="read-more">
                                            Read More <span><i class="fa-solid fa-angles-right"></i></span>
                                        </a>
                                    </p>
                                    <p class="col-md-6 col-sm-6 col-lg-6 col-6 date">07 Aug 2023</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-lg-4 px-1 py-1">
                    <div class="card text-start">
                        <div class="card-img-top">
                            <img src="/assets/images/blog-3.png" class="img-fluid w-100" alt="blog">
                        </div>
                        <div class="card-body d-flex flex-column justify-content-center">
                            <div>
                                <p class="para-head">Unlocking the Power of Derma Fillers: An Expert
                                    Spotlight</p>
                                <div class="d-flex">
                                    <p class="col-md-6 col-sm-6 col-lg-6 col-6 mb-0">
                                        <a href="blog-detail.html" class="read-more">
                                            Read More <span><i class="fa-solid fa-angles-right"></i></span>
                                        </a>
                                    </p>
                                    <p class="col-md-6 col-sm-6 col-lg-6 col-6 date">07 Aug 2023</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-lg-4 px-1 py-1">
                    <div class="card text-start">
                        <div class="card-img-top">
                            <img src="/assets/images/blog-4.png" class="img-fluid w-100" alt="blog">
                        </div>
                        <div class="card-body d-flex flex-column justify-content-center">
                            <div>
                                <p class="para-head">Unlocking the Power of Derma Fillers: An Expert
                                    Spotlight</p>
                                <div class="d-flex">
                                    <p class="col-md-6 col-sm-6 col-lg-6 col-6 mb-0">
                                        <a href="blog-detail.html" class="read-more">
                                            Read More <span><i class="fa-solid fa-angles-right"></i></span>
                                        </a>
                                    </p>
                                    <p class="col-md-6 col-sm-6 col-lg-6 col-6 date">07 Aug 2023</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-lg-4 px-1 py-1">
                    <div class="card text-start">
                        <div class="card-img-top">
                            <img src="/assets/images/blog-5.png" class="img-fluid w-100" alt="blog">
                        </div>
                        <div class="card-body d-flex flex-column justify-content-center">
                            <div>
                                <p class="para-head">Unlocking the Power of Derma Fillers: An Expert
                                    Spotlight</p>
                                <div class="d-flex">
                                    <p class="col-md-6 col-sm-6 col-lg-6 col-6 mb-0">
                                        <a href="blog-detail.html" class="read-more">
                                            Read More <span><i class="fa-solid fa-angles-right"></i></span>
                                        </a>
                                    </p>
                                    <p class="col-md-6 col-sm-6 col-lg-6 col-6 date">07 Aug 2023</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="dr-sophia" style="background-image:url('assets/images/expert-banner.png');background-size: 100% 100%;">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-8 col-lg-8">
                    <h3>
                        Dr. Sophia
                    </h3>
                    <p class="para-text para-text1">
                        Dr Sophia is a UK General Practitioner and medical aesthetics specialist, trained by Dr Bob
                        Khana at the world-renowned Harley Street Institute in London.
                    </p>
                    <p class="para-text">
                        Her treatments are bespoke - tailor-made for the individual, and her commitment to
                        professional development ensures that her treatments follow the latest in state-of-the-art
                        aesthetics Technology and techniques.
                    </p>
                </div>
                <div class="col-md-4 col-sm-4 col-lg-4">
                    <img src="/assets/images/expert.png" alt="expert" class="img-fluid">
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

    <section id="recent-blogs" class="recent-blogs" style="background: url('assets/images/luxury-bg.png');background-size: 100% 100%;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 text-center pricing_plan_content">
                    <h4 class="color-blue fw-600">Our Top Latest Blogs</h4>
                    <hr>
                </div>
            </div>
            <div class="row d-flex align-items-center justify-content-center">
                <div class="col-md-4 col-sm-4 col-lg-4 px-3">
                    <div class="card text-start">
                        <div class="card-img-top">
                            <img src="/assets/images/blog-1.png" class="img-fluid w-100" alt="blog">
                        </div>
                        <div class="card-body d-flex flex-column justify-content-center">
                            <div>
                                <p class="para-head">Getting Glam for the Event: Your Ultimate Pre-Party
                                    Preparation Guide
                                </p>
                                <div class="d-flex">
                                    <p class="col-md-6 col-sm-6 col-lg-6 col-6 mb-0">
                                        <a href="blog-detail.html" class="read-more">
                                            Read More <span><i class="fa-solid fa-angles-right"></i></span>
                                        </a>
                                    </p>
                                    <p class="col-md-6 col-sm-6 col-lg-6 col-6 date">07 Aug 2023</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-lg-4 px-3">
                    <div class="card text-start">
                        <div class="card-img-top">
                            <img src="/assets/images/blog-2.png" class="img-fluid w-100" alt="blog">
                        </div>
                        <div class="card-body d-flex flex-column justify-content-center">
                            <div>
                                <p class="para-head">Winter Skin Care: Protecting and Nourishing Your
                                    Skin During the Cold
                                    Months</p>
                                <div class="d-flex">
                                    <p class="col-md-6 col-sm-6 col-lg-6 col-6 mb-0">
                                        <a href="blog-detail.html" class="read-more">
                                            Read More <span><i class="fa-solid fa-angles-right"></i></span>
                                        </a>
                                    </p>
                                    <p class="col-md-6 col-sm-6 col-lg-6 col-6 date">07 Aug 2023</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>
@endsection

@section('javascript')
@endsection