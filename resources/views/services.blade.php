@extends('layouts/master')

@section('metas')
@endsection

@section('title')
Wellness by Dr.Sophia - Our Services - {{$thisService->banner_title}}
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
    <section class="banner" style="background: url('/assets/images/luxury-bg.webp') 100% 100%;">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-lg-6">
                    <h2>{{$thisService->banner_title}}</h2>
                    <p class="banner-para-text">
                        {{$thisService->short_description}}
                    </p>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6">
                    <img src="{{'/storage/'.($thisService->w_listing_banner_image)}}" alt="{{$thisService->slug}}" class="img-fluid w-100">
                </div>
            </div>
        </div>
    </section>

    <section class="our-services">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-lg-12">
                    <h4>Our Services</h4>
                    <hr>
                    <p class="para-text">Comprehensive range of services designed to help you look and feel your
                        best. Our services include:</p>
                </div>
            </div>
            <div class="row d-flex align-items-center justify-content-center">
                @php
                $count=0;
                @endphp

                @foreach($treatments as $t)
                @if($count==3)
            </div>
            <div class="row more-services d-none d-md-flex align-items-center justify-content-center">
                @else
                @endif
                <div class="col-md-4 col-sm-4 col-lg-4">
                    <div class="card">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <img class="img-fluid w-100" src="{{'/storage/'.($t->image)}}" alt="{{$t->slug}}">
                        </div>
                        <div class="card-body row">
                            <div class="title-price col-7 col-md-7 col-sm-7 col-lg-7">
                                <h5><a href="{{url('/treatments/services/'.$t->slug)}}">{{$t->title}}</a></h5>
                                <div class="stars">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-regular fa-star-half-stroke"></i>
                                    <i class="fa-regular fa-star"></i><span> (3.5)</span>
                                </div>
                            </div>
                            <div class="col-5 col-md-5 col-sm-5 col-lg-5 price">
                                <p class="starting-from">Starting from</p>
                                <p class="text-right">&pound;{{number_format($t->price,2)}}</p>
                                <!-- <p class="para-was">was <span>160.00</span> -->
                            </div>

                            <div class="text-div col-12 col-md-12 col-sm-12 col-lg-12">
                                <p class="para">{{$t->short_description}}
                                </p>
                                <a href="{{url('/treatments/services/'.$t->slug)}}" class="view-more">View more</a>
                            </div>
                            <div class="col-md-12 col-sm-12 col-lg-12 col-12 buttons">
                                <a data-id="{{$t->id}}" data-key="{{$t->ref_key}}" class="btn btn-secondary add-to-cart-button btn_add_to_cart btn-add-to-cart w-100">Add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                @php
                $count++;
                @endphp
                @endforeach
            </div>

            <div class="row">
                <div class="col-lg-12 d-block d-md-none text-center div-btn">
                    <a id="btn-viewmore" class="btn btn-viewmore" onclick="toggleMoreServices();">Show More</a>
                    <a id="btn-viewless" class="btn btn-viewless" onclick="toggleLessServices();" style="display: none;">Show Less</a>
                </div>
            </div>
        </div>
    </section>

    <section id="reviews" style="background: url('/assets/images/testimonials.png') 100% 100%;" class="reviews d-md-block d-none">
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

    <section id="reviews" class="reviews d-block d-md-none " style="background: url('/assets/images/testimonials.png');">
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

    <section class="services" style="background: url('/assets/images/luxury-bg.webp') 100% 100%;">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-lg-12">
                    <h3>other Services</h3>
                    <hr>
                </div>
            </div>
            <div class="row d-flex align-items-center justify-content-center">
                @foreach($servExcludeCurrent as $s)
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

</main>
@endsection

@section('javascript')
<script>
    $(document).ready(function() {
        $(".add-to-cart-button").click(function(e) {
            e.preventDefault(); // Prevent the default click behavior of the anchor tag

            var id = $(this).data('id');
            var key = $(this).data('key');

            $.ajax({
                type: 'GET', // You can change this to 'GET' if your route accepts GET requests
                url: '/add-to-cart/' + id,
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
                    id: id,
                    key: key
                },
                success: function(response) {
                    if (response.redirect) {
                        // Redirect to the specified URL
                        window.location.href = response.redirect;
                    } else {
                        // Handle the success response here, e.g., update the UI
                    }
                }
            });
        });
    });


    function toggleMoreServices() {
        var moreServicesDiv = document.querySelector('.more-services');
        var btnViewMore = document.getElementById('btn-viewmore');
        var btnViewLess = document.getElementById('btn-viewless');

        moreServicesDiv.classList.toggle('d-none'); // Toggle visibility of more-services div
        btnViewMore.style.display = 'none'; // Hide "View More" button
        btnViewLess.style.display = 'block'; // Show "View less" button
    }

    function toggleLessServices() {
        var moreServicesDiv = document.querySelector('.more-services');
        var btnViewMore = document.getElementById('btn-viewmore');
        var btnViewLess = document.getElementById('btn-viewless');

        moreServicesDiv.classList.toggle('d-none'); // Toggle visibility of more-services div
        btnViewMore.style.display = 'block'; // Show "View More" button
        btnViewLess.style.display = 'none'; // Hide "View less" button
    }
</script>
@endsection