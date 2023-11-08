<footer id="footer">
    <!-- footer Desktop -->
    <div class="footer-top d-none d-lg-block">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <h3><img alt="footer logo" style="width: 200px;height: 70px;" src="/assets/images/fav-icon.webp" />
                    </h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 footer-contact">
                    <p>
                    <div class="row d-flex py-1">
                        <div class="col-1 align-items-center justify-content-middle "><i class="fa-solid fa-location-dot" style="color:#fff; margin-right: 1rem; margin-top: 0.75rem;vertical-align: middle;font-size: 1rem;"></i>
                        </div>
                        <div class="col-11">
                            <a style="color: #FFF; font-family: Poppins; font-size: 16px; font-style: normal; font-weight: 500;
                                    line-height: normal;">Oakley Surgery, Addington Way, Luton,<br> LU4 9FJS</a>
                        </div>
                    </div>
                    <div class="row d-flex py-1">
                        <div class="col-1 align-items-center justify-content-middle "><i class="fa-solid fa-phone" style="color:#fff; margin-right: 1rem;vertical-align: middle;font-size: 1rem;"></i>
                        </div>
                        <div class="col-11">
                            <a href="tel:+447960906330" style="color: #FFF; font-family: Poppins; font-size: 16px; font-style: normal; font-weight: 500;
                                    line-height: normal;">+44 (0) 7960906330</a>
                        </div>
                    </div>
                    <div class="row d-flex py-1">
                        <div class="col-1 align-items-center justify-content-middle "><i class="fa-solid fa-envelope" style="color:#fff; margin-right: 1rem;vertical-align: middle;font-size: 1rem;"></i>
                        </div>
                        <div class="col-11">
                            <a href="mailto:info@wellnessbydrsophia.com" style="color: #FFF; font-family: Poppins; font-size: 16px; font-style: normal; font-weight: 500;
                                    line-height: normal;">info@wellnessbydrsophia.com</a>
                        </div>
                    </div>

                    </p>
                </div>
                <div class="col-lg-2 col-md-6 footer-links">
                    <h4 style=" padding-left: 1rem;margin-top:-3rem; ">Quick Links</h4>
                    <p style=" padding-left: 1rem; ">
                        <a style="color: #fff!important;" href="{{route('gallery')}}">
                            Beauty Gallery
                        </a>
                        <br> <a style="color: #fff!important;" href="{{route('blogListing')}}">
                            Expert Advice
                        </a>
                        <br> <a style="color: #fff!important;" href="{{route('gp')}}">
                            Consultation
                        </a>
                        <br>
                        <a style="color: #fff!important;" href="{{route('terms')}}">
                            Terms & Condition
                        </a>
                        <br>
                    </p>
                </div>
                <div class="col-lg-3 col-md-6 footer-links">
                    <h4 style="margin-top:-3rem;padding-left: 2rem">Treatments</h4>

                    <p style=" padding-left: 2rem; ">
                        @foreach($services as $s)
                        <a style="color: #fff!important;" href="{{url('treatments/'.$s->slug)}}">
                            {{ucwords($s->title)}}
                        </a>
                        <br>
                        @endforeach
                        <!-- <a style="color: #fff!important;" href="packages.html">
                            Packages & Promotions
                        </a> -->
                        <br>
                    </p>
                </div>
                <!-- <div class="col-lg-3 col-md-6 footer-links">
                    <h4 style="margin-top:-3rem;padding-left: 0rem">Opening Hours</h4>
                    <p style=" padding-left: 0rem; ">
                        <a style="color: #fff!important;">
                            Mon - Sat : 9am to 6pm
                            <br>
                            Sun : Closed
                        </a>
                        <br>
                    </p>
                    <h4 style="margin-top:2rem;padding-left: 0rem">Subscribe To NewsLetter</h4>
                    <p style=" padding-left: 1rem; ">
                    <form action="#">
                        <div class="form-row d-flex align-items-center justify-content-center">
                            <input class="form-control" type="text" name="newsletter" id="newsletter" placeholder="Your email" style="border-radius: 2px;
                                    background: #FFF;color: #B1B1B1;height: 35px;font-family: Poppins;font-size: 12px;font-style: normal;font-weight: 500;line-height: normal;">
                            <button style="border-radius: 0px 2px 2px 0px;background: #C8EBF1;color: #1D6673;font-family: Poppins;font-size: 12px;
                                    font-style: normal;font-weight: 600;line-height: normal;height: 35px;border: 1px solid #C8EBF1;padding: 8px 18px;">Subscribe</button>
                        </div>
                    </form>
                    </p>
                </div> -->
                <div class="col-lg-3 col-md-6 footer-links">
                    <h4 style="margin-top:-3rem;padding-left: 0rem">Follow Us : </h4>
                    <div class="social-links">
                        <a href="https://www.facebook.com/wellnessbydrsophia" target="_blank" class="facebook">
                            <svg width="33" height="33" viewBox="0 0 33 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.5 33C7.4015 33 0 25.5974 0 16.5C0 7.4015 7.4015 0 16.5 0C25.5974 0 33 7.4015 33 16.5C33 25.5974 25.5974 33 16.5 33Z" fill="white" />
                                <path d="M13.994 25.9998H17.9852V16.4987H20.6474L21 13.225H17.9852L17.9895 11.586C17.9895 10.7323 18.072 10.2746 19.3174 10.2746H20.9816V6.99976H18.3182C15.119 6.99976 13.994 8.5886 13.994 11.2594V13.225H12V16.4998H13.994V25.9998Z" fill="#0E8BA1" />
                            </svg>
                        </a>
                        <a href="https://www.instagram.com/wellnessby_drsophia/" target="_blank" class="instagram">
                            <svg width="33" height="33" viewBox="0 0 33 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.5 33C25.6127 33 33 25.6127 33 16.5C33 7.3873 25.6127 0 16.5 0C7.3873 0 0 7.3873 0 16.5C0 25.6127 7.3873 33 16.5 33Z" fill="url(#paint0_linear_561_1068)" />
                                <path d="M20.0045 7.33325H13.0012C9.87718 7.33325 7.33984 9.87059 7.33984 12.9946V19.9979C7.33984 23.1219 9.87718 25.6593 13.0012 25.6593H20.0045C23.1285 25.6593 25.6658 23.1219 25.6658 19.9979V12.9946C25.6658 9.87059 23.1285 7.33325 20.0045 7.33325ZM23.6198 20.0053C23.6198 21.9999 21.9992 23.6279 19.9972 23.6279H12.9938C10.9992 23.6279 9.37118 22.0073 9.37118 20.0053V13.0019C9.37118 11.0073 10.9918 9.37925 12.9938 9.37925H19.9972C21.9918 9.37925 23.6198 10.9999 23.6198 13.0019V20.0053Z" fill="#0E8BA1" />
                                <path d="M16.4985 11.8135C13.9172 11.8135 11.8125 13.9181 11.8125 16.4995C11.8125 19.0808 13.9172 21.1855 16.4985 21.1855C19.0798 21.1855 21.1845 19.0808 21.1845 16.4995C21.1845 13.9181 19.0798 11.8135 16.4985 11.8135ZM16.4985 19.3448C14.9292 19.3448 13.6532 18.0688 13.6532 16.4995C13.6532 14.9301 14.9292 13.6541 16.4985 13.6541C18.0678 13.6541 19.3438 14.9301 19.3438 16.4995C19.3438 18.0688 18.0678 19.3448 16.4985 19.3448Z" fill="#0E8BA1" />
                                <path d="M21.5441 12.3272C21.9759 12.2569 22.2688 11.8499 22.1985 11.4182C22.1282 10.9865 21.7212 10.6935 21.2895 10.7638C20.8578 10.8341 20.5648 11.2411 20.6351 11.6728C20.7054 12.1045 21.1124 12.3975 21.5441 12.3272Z" fill="#0E8BA1" />
                                <defs>
                                    <linearGradient id="paint0_linear_561_1068" x1="3.93646" y1="29.0635" x2="27.3848" y2="5.61521" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="white" />
                                        <stop offset="0.052" stop-color="white" />
                                        <stop offset="0.138" stop-color="white" />
                                        <stop offset="0.248" stop-color="white" />
                                        <stop offset="0.376" stop-color="white" />
                                    </linearGradient>
                                </defs>
                            </svg>
                        </a>
                        <a href="https://www.youtube.com" target="_blank" class="youtube">
                            <svg width="33" height="33" viewBox="0 0 33 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M14.2109 19.1618L18.7875 16.5066L14.2109 13.8384V19.1618Z" fill="white" />
                                <path d="M16.5 0C13.2366 0 10.0465 0.967708 7.3331 2.78075C4.61969 4.59379 2.50484 7.17074 1.25599 10.1857C0.00714915 13.2007 -0.319606 16.5183 0.31705 19.719C0.953706 22.9197 2.52518 25.8597 4.83274 28.1673C7.14031 30.4748 10.0803 32.0463 13.281 32.6829C16.4817 33.3196 19.7993 32.9928 22.8143 31.744C25.8293 30.4952 28.4062 28.3803 30.2193 25.6669C32.0323 22.9535 33 19.7634 33 16.5C33 12.1239 31.2616 7.92709 28.1673 4.83274C25.0729 1.73839 20.8761 0 16.5 0ZM25.1842 19.4201C25.1845 19.8516 25.0997 20.279 24.9348 20.6778C24.7698 21.0765 24.5279 21.4389 24.2229 21.7442C23.9178 22.0494 23.5556 22.2916 23.1569 22.4568C22.7583 22.622 22.331 22.707 21.8994 22.707H11.1006C10.669 22.707 10.2417 22.622 9.84306 22.4568C9.44438 22.2916 9.08217 22.0494 8.77712 21.7442C8.47207 21.4389 8.23016 21.0765 8.06521 20.6778C7.90026 20.279 7.81551 19.8516 7.8158 19.4201V13.5799C7.81551 13.1484 7.90026 12.721 8.06521 12.3222C8.23016 11.9234 8.47207 11.5611 8.77712 11.2558C9.08217 10.9506 9.44438 10.7084 9.84306 10.5432C10.2417 10.378 10.669 10.293 11.1006 10.293H21.8994C22.331 10.293 22.7583 10.378 23.1569 10.5432C23.5556 10.7084 23.9178 10.9506 24.2229 11.2558C24.5279 11.5611 24.7698 11.9234 24.9348 12.3222C25.0997 12.721 25.1845 13.1484 25.1842 13.5799V19.4201Z" fill="white" />
                            </svg>
                        </a>
                        <a href="https://www.linkedin.com/" target="_blank" class="linkedin">
                            <svg width="33" height="33" viewBox="0 0 33 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.5 0C7.38787 0 0 7.38684 0 16.5C0 25.6121 7.38787 33 16.5 33C25.6121 33 33 25.6121 33 16.5C33 7.38684 25.6121 0 16.5 0ZM12.2141 22.9732H8.84812V12.8463H12.2141V22.9732ZM10.5311 11.4634H10.5095C9.37922 11.4634 8.64909 10.6848 8.64909 9.71334C8.64909 8.72025 9.40191 7.96434 10.5528 7.96434C11.7037 7.96434 12.4132 8.72025 12.4348 9.71334C12.4348 10.6858 11.7037 11.4634 10.5311 11.4634ZM24.3509 22.9732H20.9849V17.555C20.9849 16.1937 20.4982 15.2656 19.2792 15.2656C18.3501 15.2656 17.7963 15.8916 17.5529 16.4969C17.4642 16.7135 17.4415 17.0156 17.4415 17.3178V22.9732H14.0766C14.0766 22.9732 14.1209 13.7971 14.0766 12.8463H17.4426V14.2807C17.8891 13.5908 18.6893 12.6081 20.4765 12.6081C22.6906 12.6081 24.3509 14.0559 24.3509 17.1662V22.9732Z" fill="white" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- footer Mobile -->
    <div class="footer-top d-block d-lg-none" style="padding-left: 35px;padding-right: 35px;">
        <div class="container">
            <div class="row">
                <div class="col-md-6 d-flex align-items-center justify-content-center">
                    <img alt="footer logo" style="width: 200px; margin-left: 2rem; margin-right: 2rem;" src="/assets/images/fav-icon.webp" />
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 footer-contact mb-1">
                    <div class="content d-flex align-items-center justify-content-center" style="width: 100%;">
                        <p class="mobile_footer_text px-3 pb-0">
                            <a href="https://www.facebook.com/wellnessbydrsophia/" target="_blank" class="facebook">
                                <svg width="27" height="27" viewBox="0 0 27 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M13.5 27C6.05578 27 0 20.9434 0 13.5C0 6.05578 6.05578 0 13.5 0C20.9434 0 27 6.05578 27 13.5C27 20.9434 20.9434 27 13.5 27Z" fill="white" />
                                    <path d="M11.4496 21.2728H14.7151V13.4991H16.8933L17.1818 10.8206H14.7151L14.7187 9.47965C14.7187 8.78121 14.7861 8.40667 15.8051 8.40667H17.1667V5.72729H14.9876C12.3701 5.72729 11.4496 7.02726 11.4496 9.21249V10.8206H9.81818V13.5H11.4496V21.2728Z" fill="#0E8BA1" />
                                </svg>
                            </a>
                            <a href="https://www.instagram.com/wellnessby_drsophia/" target="_blank" class="instagram">
                                <svg width="27" height="27" viewBox="0 0 27 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M13.5 27C20.9558 27 27 20.9558 27 13.5C27 6.04416 20.9558 0 13.5 0C6.04416 0 0 6.04416 0 13.5C0 20.9558 6.04416 27 13.5 27Z" fill="url(#paint0_linear_385_331)" />
                                    <path d="M16.3683 6H10.6383C8.08235 6 6.00635 8.076 6.00635 10.632V16.362C6.00635 18.918 8.08235 20.994 10.6383 20.994H16.3683C18.9243 20.994 21.0004 18.918 21.0004 16.362V10.632C21.0004 8.076 18.9243 6 16.3683 6ZM19.3264 16.368C19.3264 18 18.0004 19.332 16.3624 19.332H10.6323C9.00035 19.332 7.66835 18.006 7.66835 16.368V10.638C7.66835 9.006 8.99435 7.674 10.6323 7.674H16.3624C17.9944 7.674 19.3264 9 19.3264 10.638V16.368Z" fill="#0E8BA1" />
                                    <path d="M13.5005 9.66577C11.3885 9.66577 9.6665 11.3878 9.6665 13.4998C9.6665 15.6118 11.3885 17.3338 13.5005 17.3338C15.6125 17.3338 17.3345 15.6118 17.3345 13.4998C17.3345 11.3878 15.6125 9.66577 13.5005 9.66577ZM13.5005 15.8278C12.2165 15.8278 11.1725 14.7838 11.1725 13.4998C11.1725 12.2158 12.2165 11.1718 13.5005 11.1718C14.7845 11.1718 15.8285 12.2158 15.8285 13.4998C15.8285 14.7838 14.7845 15.8278 13.5005 15.8278Z" fill="#0E8BA1" />
                                    <path d="M17.6263 10.0859C17.9796 10.0283 18.2193 9.69537 18.1618 9.34214C18.1042 8.98891 17.7712 8.7492 17.418 8.80673C17.0648 8.86425 16.8251 9.19723 16.8826 9.55046C16.9401 9.90369 17.2731 10.1434 17.6263 10.0859Z" fill="#0E8BA1" />
                                    <defs>
                                        <linearGradient id="paint0_linear_385_331" x1="3.22074" y1="23.7793" x2="22.4057" y2="4.59426" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="white" />
                                            <stop offset="0.052" stop-color="white" />
                                            <stop offset="0.138" stop-color="white" />
                                            <stop offset="0.248" stop-color="white" />
                                            <stop offset="0.376" stop-color="white" />
                                        </linearGradient>
                                    </defs>
                                </svg>
                            </a>
                            <a href="https://www.youtube.com/" target="_blank" class="youtube">
                                <svg width="27" height="27" viewBox="0 0 27 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11.6278 15.6778L15.3723 13.5054L11.6278 11.3223V15.6778Z" fill="white" />
                                    <path d="M13.5 0C10.83 0 8.21987 0.791761 5.99981 2.27516C3.77974 3.75856 2.04942 5.86697 1.02763 8.33377C0.0058493 10.8006 -0.261496 13.515 0.259405 16.1337C0.780305 18.7525 2.06606 21.1579 3.95406 23.0459C5.84207 24.9339 8.24754 26.2197 10.8663 26.7406C13.485 27.2615 16.1994 26.9941 18.6662 25.9724C21.133 24.9506 23.2414 23.2203 24.7248 21.0002C26.2082 18.7801 27 16.17 27 13.5C27 9.91957 25.5777 6.4858 23.0459 3.95406C20.5142 1.42232 17.0804 0 13.5 0ZM20.6053 15.8891C20.6055 16.2422 20.5362 16.5919 20.4012 16.9182C20.2662 17.2444 20.0683 17.5409 19.8187 17.7907C19.5691 18.0404 19.2728 18.2386 18.9466 18.3737C18.6204 18.5089 18.2708 18.5785 17.9177 18.5785H9.08231C8.72922 18.5785 8.3796 18.5089 8.05341 18.3737C7.72722 18.2386 7.43087 18.0404 7.18128 17.7907C6.9317 17.5409 6.73377 17.2444 6.59881 16.9182C6.46385 16.5919 6.39451 16.2422 6.39474 15.8891V11.1109C6.39451 10.7578 6.46385 10.4081 6.59881 10.0818C6.73377 9.75554 6.9317 9.45906 7.18128 9.20931C7.43087 8.95956 7.72722 8.76143 8.05341 8.62626C8.3796 8.49109 8.72922 8.42151 9.08231 8.42151H17.9177C18.2708 8.42151 18.6204 8.49109 18.9466 8.62626C19.2728 8.76143 19.5691 8.95956 19.8187 9.20931C20.0683 9.45906 20.2662 9.75554 20.4012 10.0818C20.5362 10.4081 20.6055 10.7578 20.6053 11.1109V15.8891Z" fill="white" />
                                </svg>
                            </a>
                            <a href="https://www.linkedin.com/" target="_blank" class="linkedin">
                                <svg width="27" height="27" viewBox="0 0 27 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M13.5 0C6.04462 0 0 6.04378 0 13.5C0 20.9554 6.04462 27 13.5 27C20.9554 27 27 20.9554 27 13.5C27 6.04378 20.9554 0 13.5 0ZM9.99337 18.7962H7.23938V10.5106H9.99337V18.7962ZM8.61637 9.37913H8.59866C7.67391 9.37913 7.07653 8.74209 7.07653 7.94728C7.07653 7.13475 7.69247 6.51628 8.63409 6.51628C9.57572 6.51628 10.1562 7.13475 10.1739 7.94728C10.1739 8.74294 9.57572 9.37913 8.61637 9.37913ZM19.9235 18.7962H17.1695V14.3632C17.1695 13.2494 16.7712 12.49 15.7739 12.49C15.0137 12.49 14.5606 13.0022 14.3615 13.4975C14.2889 13.6747 14.2703 13.9219 14.2703 14.1691V18.7962H11.5172C11.5172 18.7962 11.5535 11.2885 11.5172 10.5106H14.2712V11.6842C14.6365 11.1198 15.2913 10.3157 16.7535 10.3157C18.565 10.3157 19.9235 11.5003 19.9235 14.0451V18.7962Z" fill="white" />
                                </svg>
                            </a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 footer-contact mb-0">
                <div class="accordion" id="mobile_footer_menu">
                    <div id="mobile_footer_menu_1">
                        <h4 class="accordion-header">
                            <a href="#" class="accordion-button shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#mobile_footer_menu_one" aria-expanded="true" aria-controls="mobile_footer_menu_one">
                                Contact Us
                            </a>
                        </h4>
                        <div id="mobile_footer_menu_one" class="accordion-collapse collapse show" data-bs-parent="#mobile_footer_menu">
                            <div class="accordion-body">
                                <div class="container">
                                    <p class="mobile_footer_text" style="padding-bottom: 0.5rem;">
                                    <div class="row d-flex ">
                                        <div class="col-1 align-items-center justify-content-middle "><i class="fa-solid fa-location-dot" style="color:#fff; margin-right: 1rem; margin-top: 0.75rem;vertical-align: middle;font-size: 1rem;"></i>
                                        </div>
                                        <div class="col-11">
                                            <a style="padding:0;color: #FFF; font-family: Poppins; font-size: 16px; font-style: normal; font-weight: 500;
                                                        line-height: normal;">Oakley Surgery, Addington Way, Luton,LU4 9FJS</a>
                                        </div>
                                    </div>
                                    </p>
                                    <p class="mobile_footer_text" style="padding-bottom: 0.5rem;">
                                    <div class="row d-flex ">
                                        <div class="col-1 align-items-center justify-content-middle "><i class="fa-solid fa-phone" style="color:#fff; margin-right: 1rem;vertical-align: middle;font-size: 1rem;"></i>
                                        </div>
                                        <div class="col-11">
                                            <a href="tel:+4407960906330" style="color: #FFF; font-family: Poppins; font-size: 16px; font-style: normal; font-weight: 500;
                                                        line-height: normal;">+44 (0) 7960906330</a>
                                        </div>
                                    </div>
                                    </p>
                                    <p class="mobile_footer_text" style="padding-bottom: 0.5rem;">
                                    <div class="row d-flex ">
                                        <div class="col-1 align-items-center justify-content-middle "><i class="fa-solid fa-envelope" style="color:#fff; margin-right: 1rem;vertical-align: middle;font-size: 1rem;"></i>
                                        </div>
                                        <div class="col-11">
                                            <a href="mailto:info@wellnessbydrsophia.com" style="color: #FFF; font-family: Poppins; font-size: 16px; font-style: normal; font-weight: 500;
                                                        line-height: normal;">info@wellnessbydrsophia.com</a>
                                        </div>
                                    </div>
                                    </p>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="mobile_footer_menu_2">
                        <h4 class="accordion-header">
                            <a href="#" class="accordion-button collapsed shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#mobile_footer_menu_two" aria-expanded="false" aria-controls="mobile_footer_menu_two">
                                Quick Links
                            </a>
                        </h4>
                        <div id="mobile_footer_menu_two" class="accordion-collapse collapse" data-bs-parent="#mobile_footer_menu">
                            <div class="accordion-body">
                                <div class="container">
                                    <p class="mobile_footer_text" style="padding-bottom: 0.5rem;">
                                        <a style="color: #fff!important;" href="{{route('gallery')}}">
                                            Beauty Gallery
                                        </a>
                                    </p>
                                    <p class="mobile_footer_text" style="padding-bottom: 0.5rem;">
                                        <a style="color: #fff!important;" href="{{route('blogListing')}}">
                                            Expert Advice
                                        </a>
                                    </p>
                                    <p class="mobile_footer_text" style="padding-bottom: 0.5rem;">
                                        <a style="color: #fff!important;" href="{{route('gp')}}">
                                            Consultation
                                        </a>
                                    </p>
                                    <p class="mobile_footer_text" style="padding-bottom: 0.5rem;">
                                        <a style="color: #fff!important;" href="{{route('terms')}}">
                                            Terms & Condition
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="mobile_footer_menu_3">
                        <h4 class="accordion-header">
                            <a href="#" class="accordion-button collapsed shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#mobile_footer_menu_three" aria-expanded="false" aria-controls="mobile_footer_menu_one">
                                Treatments
                            </a>
                        </h4>
                        <div id="mobile_footer_menu_three" class="accordion-collapse collapse" data-bs-parent="#mobile_footer_menu">
                            <div class="accordion-body">
                                <div class="container">
                                    @foreach($services as $s)
                                    <p class="mobile_footer_text" style="padding-bottom: 0.5rem;">
                                        <a style="color: #fff!important;" href="{{url('treatments/'.$s->slug)}}">
                                            {{ucwords($s->title)}}
                                        </a>
                                    </p>
                                    @endforeach
                                    <p class="mobile_footer_text" style="padding-bottom: 0.5rem;">
                                        <a style="color: #fff!important;" href="packages.html">
                                            Packages & Promotions
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="container py-4 border-top d-none d-md-block">
        <div class="copyright"> &copy; Copyright 2023 - <b style="color: #fff;">Wellness By Dr. Sophia</b>. All
            Rights Reserved
        </div>
        <div class="credits"> Made with <i class="bx bx-heart"></i> by <a href="https://www.optimizedtechandbi.co.uk/" target="_blank" style="color: #fff;">Team Optimized</a></div>
    </div>
    <div class="container py-4 d-block d-md-none align-items-center justify-content-center">
        <div class="copyright"> &copy; Copyright 2023 - <b style="color: #fff;">Wellness By Dr. Sophia.</b>
            <br>All
            Rights Reserved
        </div>
        <div class="credits"> Made with <i class="bx bx-heart"></i> by <a href="https://www.optimizedtechandbi.co.uk/" target="_blank" style="color: #fff;">Team Optimized</a></div>
    </div>
</footer>