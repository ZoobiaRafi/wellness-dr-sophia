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
    <section class="banner" style="background-image:url('assets/images/gp-banner.png');">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-lg-6 pt-5">
                    <h2>Wellness by Dr.Sophia Consultation</h2>
                    <p class="banner-para-text">
                        Aesthetic consultations play a pivotal role in helping individuals achieve their desired
                        appearance while prioritizing safety and well-being.
                    </p>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6">
                    <img src="/assets/images/gp-banner-dr.png" alt="dr" class="consult-dr img-fluid w-100">
                </div>
            </div>
        </div>
    </section>

    <section class="about-gp" style="background-image:url('assets/images/luxury-bg.png');background-size: 100% 100%;">
        <div class="container">
            <h4>About Consultation</h4>
            <hr>
            <div class="row">
                <div class="col-md-5 col-sm-5 col-lg-5">
                    <img src="/assets/images/gp-about.png" alt="gp-about" class="img-fluid w-100">
                </div>
                <div class="col-md-7 col-sm-7 col-lg-7">
                    <p class="para-text para-text1">Dr. Sophia is an excellent consultant who listens carefully to
                        truly
                        understand her patients' concerns and beauty goals in detail. Her exceptional ability to
                        actively listen and comprehend her patients' concerns, as well as their individual beauty
                        aspirations, sets her apart in the field. </p>
                    <p class="para-text  d-md-block d-none">She welcomes an open discussion and describes the treatment options in
                        perfect detail.</p>
                    <p class="para-text  d-md-block d-none">Consultations are an essential clinical standard and are worth the £50
                        charge, deductible from the final cost of treatment.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="gp-form" id="gp-form" style="background-image:url('assets/images/expert-banner.png');background-size: 100% 100%;">
        <div class="container">
            <h4>Schedule Your Consultation Today!</h4>
            <hr>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-lg-6  d-md-block d-none">
                    <img src="/assets/images/gp-form.png" alt="gp-form" class="img-fluid">
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6">
                    <div class="col-form">
                        <p class="book-head">Book Online GP Consultation</p>
                        <hr class="hr-2">
                        <form id="gpform">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-12 mt-4">
                                    <label for="first_name"> First Name <span class="color-red">*</span></label>
                                    <input required="" type="text" class="form-control py-3 shadow-none" placeholder="Enter First name" id="first_name">
                                </div>
                                <div class="col-lg-6 col-md-6 col-12 mt-4">
                                    <label for="last_name"> Last Name <span class="color-red">*</span></label>
                                    <input required="" type="text" class="form-control py-3 shadow-none" placeholder="Enter Last name" id="last_name">
                                </div>
                                <div class="col-lg-12 col-md-12 col-12 mt-4">
                                    <label for="contact_no"> Contact no. <span class="color-red">*</span></label>
                                    <input required="" type="text" class="form-control py-3 shadow-none" id="contact_no" placeholder="Enter contact number" maxlength="12">
                                </div>
                                <div class="col-lg-12 col-md-12 col-12 mt-4">
                                    <label for="email"> Email <span class="color-red">*</span></label>
                                    <input required="" type="email" class="form-control py-3 shadow-none" aria-describedby="emailHelp" placeholder="Enter email" id="email">
                                </div>
                                <div class="col-lg-12 col-md-12 col-12 mt-4">
                                    <label for="email"> Date <span class="color-red">*</span></label>
                                    <input required="" type="text" class="form-control py-3 shadow-none" placeholder="Enter date" id="date" data-dtp="dtp_Avcn8">
                                </div>
                                <div style="display: none;" class="col-lg-12 col-md-12 col-12 mt-4 inputdatetime">
                                    <label for="email"> Appointment Date &amp; Time <span class="color-red">*</span></label>
                                    <input required="" type="text" class="form-control py-3 shadow-none" id="inputDateTime">
                                </div>
                                <div class="col-lg-12 col-md-12 col-12 mt-4" style="justify-content: center; display:flex !important">
                                    <button data-id="0" type="button" class="btn w-100 rounded shadow-none btn-book-order">Book Consultation</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>

@endsection

@section('javascript')
@endsection