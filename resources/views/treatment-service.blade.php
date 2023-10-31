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
    <section class="treatment" style="background: url('/assets/images/luxury-bg.webp');">
        <div class="container">
            <div class="row row-main">
                <div class="col-md-6 col-sm-6 col-lg-6">
                    <div id="product-slider" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="image">
                                    <img src="{{'/storage/'.($thisTreatment->image)}}" class="d-block w-100" alt="{{$thisTreatment->slug}}">
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="image">
                                    <img src="{{'/storage/'.($thisTreatment->image)}}" class="d-block w-100" alt="{{$thisTreatment->slug}}">
                                </div>
                            </div>
                        </div>
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#product-slider" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1">
                                <img src="{{'/storage/'.($thisTreatment->image)}}" class="d-block w-100" alt="{{$thisTreatment->slug}}">
                            </button>
                            <button type="button" data-bs-target="#product-slider" data-bs-slide-to="1" aria-label="Slide 2">
                                <img src="{{'/storage/'.($thisTreatment->image)}}" class="d-block w-100" alt="{{$thisTreatment->slug}}">
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
                            <p>Starting from <br class="d-block d-md-none"><span> &pound;250.00</span></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            {!!$thisTreatment->description!!}
                            <a href="#" class="btn btn-cart">Add to Cart</a>
                        </div>
                    </div>
                </div>
            </div>
    </section>

</main>

@endsection

@section('javascript')

@endsection