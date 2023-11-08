@extends('layouts/master')

@section('metas')
@endsection

@section('title')
Wellness by Dr.Sophia - Treatment - {{$thisTreatment->title}}
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
    <section class="treatment" style="background: url('/assets/images/luxury-bg.webp');">
        <div class="container">
            <div class="row row-main">
                <div class="col-md-6 col-sm-6 col-lg-6">
                    <div id="product-slider" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="image">
                                    <img src="{{'https://demo.optimizedbodyandmind.co.uk/storage/'.($thisTreatment->image)}}" class="d-block w-100" alt="{{$thisTreatment->slug}}">
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="image">
                                    <img src="{{'https://demo.optimizedbodyandmind.co.uk/storage/'.($thisTreatment->image)}}" class="d-block w-100" alt="{{$thisTreatment->slug}}">
                                </div>
                            </div>
                        </div>
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#product-slider" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1">
                                <img src="{{'https://demo.optimizedbodyandmind.co.uk/storage/'.($thisTreatment->image)}}" class="d-block w-100" alt="{{$thisTreatment->slug}}">
                            </button>
                            <button type="button" data-bs-target="#product-slider" data-bs-slide-to="1" aria-label="Slide 2">
                                <img src="{{'https://demo.optimizedbodyandmind.co.uk/storage/'.($thisTreatment->image)}}" class="d-block w-100" alt="{{$thisTreatment->slug}}">
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6">
                    <h2>{{$thisTreatment->title}}</h2>
                    <div class="row rating-pricing">
                        <div class="col-6 col1">
                            <p>
                                5 Ratings<br class="d-block d-md-none"> <span>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-regular fa-star-half-stroke"></i>
                                    <i class="fa-regular fa-star"></i></span>
                            </p>
                        </div>
                        <div class="col-6 col2">
                            <p>Starting from <br class="d-block d-md-none"><span>&pound;{{number_format($thisTreatment->price,2)}}</span></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            {!!$thisTreatment->description!!}
                            <a id="add-to-cart-button" data-id="{{$thisTreatment->id}}" data-key="{{$thisTreatment->ref_key}}" class="btn btn-cart w-100">Add to cart</a>
                        </div>
                    </div>
                </div>
            </div>
    </section>

</main>

@endsection

@section('javascript')
<script>
     $(document).ready(function() {
        $("#add-to-cart-button").click(function(e) {
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
</script>
@endsection