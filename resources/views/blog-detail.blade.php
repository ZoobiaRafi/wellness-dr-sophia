@extends('layouts/master')

@section('metas')
@endsection

@section('title')
@endsection

@section('css')
@endsection

@section('content')
<main>
    <section class="banner p-5" style="background:#D4EEF2;">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-lg-12">
                    <h2 class="text-center">Expert Advice Detail</h2>
                </div>
            </div>
        </div>
    </section>

    <section class="blog-detail">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-8 col-lg-8 px-3">
                    <h4>Winter Skin Care: Protecting and Nourishing Your Skin During the Cold Months</h4>
                    <img src="/assets/images/blog-detail-1.webp" alt="Nourishing" class="img-top img-fluid">
                    <p class="para-text">
                        Winter can wreak havoc with our skin. The harsh cold winds and central heating can leave the
                        skin dull, dry and therefore oily as it tries to counteract dryness with excessive oil
                        production.
                    </p>
                    <p class="para-text">
                        The icy cold weather can also cause trauma to skin, leading to premature aging and fine
                        lines - so it’s essential that we pay extra attention to our skincare routine during these
                        colder months.
                    </p>
                    <p class="para-text">
                        Dr Sophia has rounded up her best advice for maintaining winter skin – keeping it young,
                        fresh and glowing.
                    </p>
                    <h5>Hydration</h5>
                    <img src="/assets/images/blog-detail-2.webp" alt="Nourishing" class="img-top img-fluid">
                    <p class="para-text">Since we’re not as hot and we’re not as noticeably parched in the winter
                        months compared to the summer, we often don’t drink enough water. It’s essential to remember
                        to do this, and try to eat water-dense foods like grapefruit, broccoli, tomatoes, bell
                        peppers, watermelon and celery for slow releasing hydration throughout the day</p>
                    <p class="para-text">It’s also a good idea to drench the skin in hydrating moisturisers at
                        night-time before going to bed. It allows the skin to fully absorb it throughout the night
                        when it’s in repair mode.</p>
                    <h5>Peptides</h5>
                    <p class="para-text">
                        Collagen peptide supplements help boost muscle growth and repair – helping to counteract the
                        trauma that winter weather causes to the muscles in the face.
                        Foods such as eggs, milk and plant sources (soy, oat, chickpeas, beans, peas, and lentils)
                        are high in natural peptides and do wonders for muscle repair, so it’s wise to add more to
                        your diet during the winter, says Dr Sophia.
                    </p>
                    <h5>Vitamin c</h5>
                    <img src="/assets/images/blog-detail-3.webp" alt="Nourishing" class="img-top img-fluid">
                    <p class="para-text">Vitamin C is a science-backed topical solution that helps slow down the
                        signs of early skin aging. It also helps to improve the appearance of wrinkles, dark spots,
                        and acne and helps to brighten dull skin – perfect for the winter.</p>
                    <p class="para-text">Dr Sophia insists that vitamin C is a key lotion that should be a skincare
                        essential and it can be found in most beauty stores with options to match all budgets.
                    </p>
                    <h5>Sun block</h5>
                    <p class="para-text">
                        It’s a well known fact that the sun is still there, even if it isn’t shining, so it’s
                        essential to continue to use sun block and SPF in your skincare routine. It goes without
                        saying that UV rays are harmful for skin and cause premature aging, so prevention is always
                        better than cure says Dr Sophia.
                    </p>
                    <h5>Retinoids</h5>
                    <img src="/assets/images/blog-detail-4.webp" alt="Nourishing" class="img-top img-fluid">
                    <p class="para-text">The retinoids are a class of chemical compounds that regulate epithelial
                        cell growth. Essentially, they help repair the skins cells and any damage caused by the
                        winter weather.</p>
                    <p class="para-text">They should be taken before bed mentions Dr Sophia, as they will make skin
                        sensitive to sunlight (and as standard, SPF should be worn the following day.)</p>
                    <h5>Regular facial treatments</h5>
                    <p class="para-text">Despite how cold and glum it can get outside, make sure you take the time
                        out to get a professional facial at least once every one to two months says Dr Sophia.</p>
                    <p class="para-text">Medical grade facials provide endless benefits to skin cell growth and
                        repair and should be considered a winter essential. The WOW Facial is a six-stage treatment
                        that works through several layers of skin with full cleansing, peeling, WOW Fusion with
                        Intradermology Solutions, light therapy, mask, and protection – available at Wellness by Dr
                        Sophia.</p>
                </div>
                <div class="col-md-3 col-sm-3 col-lg-3 mt-3 d-none d-md-block">
                    <div class="latest-blogs">
                        <h3>trending</h3>
                        <hr class="mt-0">
                        <div class="row pt-3">
                            <div class="col-2 col-md-2 col-sm-2 col-lg-2">
                                <img src="/assets/images/blog-3.webp" alt="blog1">
                            </div>
                            <div class="col-10 col-md-10 col-sm-10 col-lg-10">
                                <p>
                                    <a href="#">Getting Glam for the Event: Your Ultimate Pre-Party Preparation
                                        Guide </a>
                                </p>
                            </div>
                        </div>
                        <div class="row pt-3">
                            <div class="col-2 col-md-2 col-sm-2 col-lg-2">
                                <img src="/assets/images/blog-5.webp" alt="blog2">
                            </div>
                            <div class="col-10 col-md-10 col-sm-10 col-lg-10">
                                <p>
                                    <a href="#">Unlocking the Power of Derma Fillers: An Expert Spotlight </a>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="latest-blogs mt-4">
                        <h3>Follow Us</h3>
                        <hr class="mt-0">
                        <div class="row d-flex justify-content-start align-items-center py-3">
                            <div class="col-2">
                                <a href="https://www.facebook.com/wellnessbydrsophia">
                                    <svg width="39" height="39" viewBox="0 0 39 39" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M19.5 39C8.74723 39 0 30.2515 0 19.5C0 8.74723 8.74723 0 19.5 0C30.2515 0 39 8.74723 39 19.5C39 30.2515 30.2515 39 19.5 39Z" fill="#0E8BA1" />
                                        <path d="M16.5596 30.726H21.2765V19.4975H24.4228L24.8395 15.6285H21.2765L21.2816 13.6915C21.2816 12.6827 21.3791 12.1417 22.8509 12.1417H24.8177V8.27148H21.6701C17.8892 8.27148 16.5596 10.1492 16.5596 13.3057V15.6285H14.2031V19.4988H16.5596V30.726Z" fill="white" />
                                    </svg>
                                </a>
                            </div>
                            <div class="col-2">
                                <a href="https://www.instagram.com/wellnessby_drsophia">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="39" height="39" viewBox="0 0 39 39" fill="none">
                                        <path d="M19.5 39C30.2696 39 39 30.2696 39 19.5C39 8.73045 30.2696 0 19.5 0C8.73045 0 0 8.73045 0 19.5C0 30.2696 8.73045 39 19.5 39Z" fill="#0E8BA1" />
                                        <path d="M23.6627 8.6665H15.386C11.694 8.6665 8.69531 11.6652 8.69531 15.3572V23.6338C8.69531 27.3258 11.694 30.3245 15.386 30.3245H23.6627C27.3547 30.3245 30.3533 27.3258 30.3533 23.6338V15.3572C30.3533 11.6652 27.3547 8.6665 23.6627 8.6665ZM27.9353 23.6425C27.9353 25.9998 26.02 27.9238 23.654 27.9238H15.3773C13.02 27.9238 11.096 26.0085 11.096 23.6425V15.3658C11.096 13.0085 13.0113 11.0845 15.3773 11.0845H23.654C26.0113 11.0845 27.9353 12.9998 27.9353 15.3658V23.6425Z" fill="white" />
                                        <path d="M19.4989 13.9614C16.4483 13.9614 13.9609 16.4488 13.9609 19.4994C13.9609 22.5501 16.4483 25.0374 19.4989 25.0374C22.5496 25.0374 25.0369 22.5501 25.0369 19.4994C25.0369 16.4488 22.5496 13.9614 19.4989 13.9614ZM19.4989 22.8621C17.6443 22.8621 16.1363 21.3541 16.1363 19.4994C16.1363 17.6448 17.6443 16.1368 19.4989 16.1368C21.3536 16.1368 22.8616 17.6448 22.8616 19.4994C22.8616 21.3541 21.3536 22.8621 19.4989 22.8621Z" fill="white" />
                                        <path d="M25.4826 14.5688C25.9928 14.4857 26.339 14.0047 26.2559 13.4945C26.1728 12.9843 25.6919 12.638 25.1816 12.7211C24.6714 12.8042 24.3252 13.2852 24.4083 13.7954C24.4914 14.3056 24.9723 14.6519 25.4826 14.5688Z" fill="white" />
                                    </svg>
                                </a>
                            </div>
                            <div class="col-2">
                                <a href="youtube.com">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="39" height="39" viewBox="0 0 39 39" fill="none">
                                        <path d="M16.7891 22.6463L22.1977 19.5083L16.7891 16.355V22.6463Z" fill="#0E8BA1" />
                                        <path d="M19.5 0C15.6433 0 11.8731 1.14365 8.66639 3.28634C5.45963 5.42903 2.96027 8.47451 1.48436 12.0377C0.00844908 15.6008 -0.377716 19.5216 0.374696 23.3043C1.12711 27.0869 2.9843 30.5614 5.71143 33.2886C8.43855 36.0157 11.9131 37.8729 15.6957 38.6253C19.4784 39.3777 23.3992 38.9915 26.9623 37.5156C30.5255 36.0397 33.571 33.5404 35.7137 30.3336C37.8563 27.1269 39 23.3567 39 19.5C39 14.3283 36.9455 9.36837 33.2886 5.71142C29.6316 2.05446 24.6717 0 19.5 0ZM29.7632 22.951C29.7635 23.461 29.6633 23.9661 29.4684 24.4374C29.2735 24.9086 28.9876 25.3369 28.627 25.6977C28.2665 26.0584 27.8385 26.3446 27.3673 26.5398C26.8961 26.7351 26.3911 26.8356 25.8811 26.8356H13.1189C12.6089 26.8356 12.1039 26.7351 11.6327 26.5398C11.1615 26.3446 10.7335 26.0584 10.373 25.6977C10.0124 25.3369 9.72655 24.9086 9.53161 24.4374C9.33667 23.9661 9.23651 23.461 9.23685 22.951V16.049C9.23651 15.539 9.33667 15.0339 9.53161 14.5626C9.72655 14.0913 10.0124 13.6631 10.373 13.3023C10.7335 12.9416 11.1615 12.6554 11.6327 12.4602C12.1039 12.2649 12.6089 12.1644 13.1189 12.1644H25.8811C26.3911 12.1644 26.8961 12.2649 27.3673 12.4602C27.8385 12.6554 28.2665 12.9416 28.627 13.3023C28.9876 13.6631 29.2735 14.0913 29.4684 14.5626C29.6633 15.0339 29.7635 15.539 29.7632 16.049V22.951Z" fill="#0E8BA1" />
                                    </svg>
                                </a>
                            </div>
                            <div class="col-2">
                                <a href="linkedin.com">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="39" height="39" viewBox="0 0 39 39" fill="none">
                                        <path d="M19.5 0C8.73112 0 0 8.72991 0 19.5C0 30.2689 8.73112 39 19.5 39C30.2689 39 39 30.2689 39 19.5C39 8.72991 30.2689 0 19.5 0ZM14.4349 27.1501H10.4569V15.182H14.4349V27.1501ZM12.4459 13.5476H12.4203C11.0845 13.5476 10.2217 12.6275 10.2217 11.4794C10.2217 10.3057 11.1113 9.41241 12.4715 9.41241C13.8316 9.41241 14.6701 10.3057 14.6957 11.4794C14.6957 12.6287 13.8316 13.5476 12.4459 13.5476ZM28.7783 27.1501H24.8003V20.7468C24.8003 19.138 24.2251 18.0412 22.7845 18.0412C21.6864 18.0412 21.032 18.7809 20.7443 19.4963C20.6395 19.7523 20.6127 20.1094 20.6127 20.4665V27.1501H16.6359C16.6359 27.1501 16.6883 16.3057 16.6359 15.182H20.6139V16.8772C21.1417 16.0619 22.0874 14.9004 24.1995 14.9004C26.8162 14.9004 28.7783 16.6116 28.7783 20.2873V27.1501Z" fill="#0E8BA1" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <section class="blog-about">
        <div class="container">
            <h4>About Dr Sophia – A master in the artistry of skincare</h4>
            <div class="row">
                <div class="col-md-4 col-lg-4 col-sm-4 p-4">
                    <img src="/assets/images/about.webp" alt="about" class="img-fluid w-100">
                </div>
                <div class="col-md-8 col-lg-8 col-sm-8">
                    <p class="para-text para-text1">
                        Dr Sophia is a UK General Practitioner and medical aesthetics specialist, trained at the
                        world-renowned Harley Street Institute in London.
                    </p>
                    <p class="para-text">
                        Her treatments are bespoke - tailor-made for the individual, and her commitment to
                        professional development ensures that her treatments follow the latest in state-of-the-art
                        aesthetics Technology and techniques.
                    </p>
                </div>
            </div>
        </div>
    </section>

</main>
@endsection

@section('javascript')
@endsection