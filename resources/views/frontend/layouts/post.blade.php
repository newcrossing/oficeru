<!DOCTYPE html>
<html lang="en" dir="">
<head>
    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="yandex-verification" content="83051dff11b82da2"/>

    <!-- Title -->
    <title>@yield('title','Главная') / Офицеру.ру</title>
    @yield('canonical')

    <!-- Favicon -->
    @include('front.moduls.favicon')

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">

    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="/assets/vendor/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/assets/vendor/hs-mega-menu/dist/hs-mega-menu.min.css">
    <link rel="stylesheet" href="/assets/vendor/swiper/swiper-bundle.min.css">


    <!-- CSS Front Template -->
    <link rel="stylesheet" href="/assets/css/theme.min.css">
</head>

<body>
<!-- ========== HEADER ========== -->
@include('frontend.moduls.header')
<!-- ========== END HEADER ========== -->

<!-- ========== MAIN CONTENT ========== -->
@include('frontend.moduls.maincontent_post')
<!-- ========== END MAIN CONTENT ========== -->

<!-- ========== FOOTER ========== -->
<footer class="bg-dark">
    <div class="container pb-1 pb-lg-5">
        <div class="row content-space-t-2">
            <div class="col-lg-3 mb-7 mb-lg-0">
                <!-- Logo -->
                <div class="mb-5">
                    <a class="navbar-brand" href="../index.html" aria-label="Space">
                        <img class="navbar-brand-logo" src="/assets/svg/logos/logo-white.svg" alt="Image Description">
                    </a>
                </div>
                <!-- End Logo -->

                <!-- List -->
                <ul class="list-unstyled list-py-1">
                    <li><a class="link-sm link-light" href="#"><i class="bi-geo-alt-fill me-1"></i> 153 Williamson
                            Plaza, Maggieberg</a></li>
                    <li><a class="link-sm link-light" href="tel:1-062-109-9222"><i
                                class="bi-telephone-inbound-fill me-1"></i> +1 (062) 109-9222</a></li>
                </ul>
                <!-- End List -->

            </div>
            <!-- End Col -->

            <div class="col-sm mb-7 mb-sm-0">
                <h5 class="text-white mb-3">Company</h5>

                <!-- List -->
                <ul class="list-unstyled list-py-1 mb-0">
                    <li><a class="link-sm link-light" href="#">About</a></li>
                    <li><a class="link-sm link-light" href="#">Careers <span
                                class="badge bg-warning text-dark rounded-pill ms-1">We're hiring</span></a></li>
                    <li><a class="link-sm link-light" href="#">Blog</a></li>
                    <li><a class="link-sm link-light" href="#">Customers <i
                                class="bi-box-arrow-up-right small ms-1"></i></a></li>
                    <li><a class="link-sm link-light" href="#">Hire us</a></li>
                </ul>
                <!-- End List -->
            </div>
            <!-- End Col -->

            <div class="col-sm mb-7 mb-sm-0">
                <h5 class="text-white mb-3">Features</h5>

                <!-- List -->
                <ul class="list-unstyled list-py-1 mb-0">
                    <li><a class="link-sm link-light" href="#">Press <i
                                class="bi-box-arrow-up-right small ms-1"></i></a></li>
                    <li><a class="link-sm link-light" href="#">Release Notes</a></li>
                    <li><a class="link-sm link-light" href="#">Integrations</a></li>
                    <li><a class="link-sm link-light" href="#">Pricing</a></li>
                </ul>
                <!-- End List -->
            </div>
            <!-- End Col -->

            <div class="col-sm">
                <h5 class="text-white mb-3">Documentation</h5>

                <!-- List -->
                <ul class="list-unstyled list-py-1 mb-0">
                    <li><a class="link-sm link-light" href="#">Support</a></li>
                    <li><a class="link-sm link-light" href="#">Docs</a></li>
                    <li><a class="link-sm link-light" href="#">Status</a></li>
                    <li><a class="link-sm link-light" href="#">API Reference</a></li>
                    <li><a class="link-sm link-light" href="#">Tech Requirements</a></li>
                </ul>
                <!-- End List -->
            </div>
            <!-- End Col -->

            <div class="col-sm">
                <h5 class="text-white mb-3">Resources</h5>

                <!-- List -->
                <ul class="list-unstyled list-py-1 mb-5">
                    <li><a class="link-sm link-light" href="#"><i class="bi-question-circle-fill me-1"></i> Help</a>
                    </li>
                    <li><a class="link-sm link-light" href="#"><i class="bi-person-circle me-1"></i> Your Account</a>
                    </li>
                </ul>
                <!-- End List -->
            </div>
            <!-- End Col -->
        </div>
        <!-- End Row -->

        <div class="border-top border-white-10 my-7"></div>

        <div class="row mb-7">
            <div class="col-sm mb-3 mb-sm-0">
                <!-- Socials -->
                <ul class="list-inline list-separator list-separator-light mb-0">
                    <li class="list-inline-item">
                        <a class="link-sm link-light" href="#">Privacy &amp; Policy</a>
                    </li>
                    <li class="list-inline-item">
                        <a class="link-sm link-light" href="#">Terms</a>
                    </li>
                    <li class="list-inline-item">
                        <a class="link-sm link-light" href="#">Site Map</a>
                    </li>
                </ul>
                <!-- End Socials -->
            </div>

            <div class="col-sm-auto">
                <!-- Socials -->
                <ul class="list-inline mb-0">
                    <li class="list-inline-item">
                        <a class="btn btn-soft-light btn-xs btn-icon" href="#">
                            <i class="bi-facebook"></i>
                        </a>
                    </li>

                    <li class="list-inline-item">
                        <a class="btn btn-soft-light btn-xs btn-icon" href="#">
                            <i class="bi-google"></i>
                        </a>
                    </li>

                    <li class="list-inline-item">
                        <a class="btn btn-soft-light btn-xs btn-icon" href="#">
                            <i class="bi-twitter"></i>
                        </a>
                    </li>

                    <li class="list-inline-item">
                        <a class="btn btn-soft-light btn-xs btn-icon" href="#">
                            <i class="bi-github"></i>
                        </a>
                    </li>

                    <li class="list-inline-item">
                        <!-- Button Group -->
                        <div class="btn-group">
                            <button type="button" class="btn btn-soft-light btn-xs dropdown-toggle"
                                    id="footerSelectLanguage" data-bs-toggle="dropdown" aria-expanded="false"
                                    data-bs-dropdown-animation>
                  <span class="d-flex align-items-center">
                    <img class="avatar avatar-xss avatar-circle me-2"
                         src="/assets/vendor/flag-icon-css/flags/1x1/us.svg" alt="Image description" width="16"/>
                    <span>English (US)</span>
                  </span>
                            </button>

                            <div class="dropdown-menu" aria-labelledby="footerSelectLanguage">
                                <a class="dropdown-item d-flex align-items-center active" href="#">
                                    <img class="avatar avatar-xss avatar-circle me-2"
                                         src="/assets/vendor/flag-icon-css/flags/1x1/us.svg" alt="Image description"
                                         width="16"/>
                                    <span>English (US)</span>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <img class="avatar avatar-xss avatar-circle me-2"
                                         src="/assets/vendor/flag-icon-css/flags/1x1/de.svg" alt="Image description"
                                         width="16"/>
                                    <span>Deutsch</span>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <img class="avatar avatar-xss avatar-circle me-2"
                                         src="/assets/vendor/flag-icon-css/flags/1x1/es.svg" alt="Image description"
                                         width="16"/>
                                    <span>Español</span>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <img class="avatar avatar-xss avatar-circle me-2"
                                         src="/assets/vendor/flag-icon-css/flags/1x1/cn.svg" alt="Image description"
                                         width="16"/>
                                    <span>中文 (繁體)</span>
                                </a>
                            </div>
                        </div>
                        <!-- End Button Group -->
                    </li>
                </ul>
                <!-- End Socials -->
            </div>
        </div>

        <!-- Copyright -->
        <div class="w-md-85 text-lg-center mx-lg-auto">
            <p class="text-white-50 small">&copy; Front. 2021 Htmlstream. All rights reserved.</p>
            <p class="text-white-50 small">When you visit or interact with our sites, services or tools, we or our
                authorised service providers may use cookies for storing information to help provide you with a better,
                faster and safer experience and for marketing purposes.</p>
        </div>
        <!-- End Copyright -->
    </div>
</footer>

<!-- ========== END FOOTER ========== -->

<!-- ========== SECONDARY CONTENTS ========== -->
<!-- Go To -->
<a class="js-go-to go-to position-fixed" href="javascript:;" style="visibility: hidden;"
   data-hs-go-to-options='{
       "offsetTop": 700,
       "position": {
         "init": {
           "right": "2rem"
         },
         "show": {
           "bottom": "2rem"
         },
         "hide": {
           "bottom": "-2rem"
         }
       }
     }'>
    <i class="bi-chevron-up"></i>
</a>

<!-- Offcanvas Signup -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbarSignup">
    <div class="offcanvas-header justify-content-end border-0 pb-0">
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>

    <div class="offcanvas-body">
        <!-- Log in -->
        <div id="loginOffcanvasFormLogin">
            <!-- Heading -->
            <div class="text-center mb-7">
                <h3 class="modal-title">Log in to Front</h3>
                <p>Login to manage your account</p>
            </div>
            <!-- End Heading -->

            <form class="js-validate needs-validation" novalidate>
                <!-- Form -->
                <div class="mb-3">
                    <label class="form-label" for="loginOffcanvasFormLoginEmail">Your email</label>
                    <input type="email" class="form-control form-control-lg" name="email"
                           id="loginOffcanvasFormLoginEmail" placeholder="email@site.com" aria-label="email@site.com"
                           required>
                    <span class="invalid-feedback">Please enter a valid email address.</span>
                </div>
                <!-- End Form -->

                <!-- Form -->
                <div class="mb-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <label class="form-label" for="loginOffcanvasFormLoginPassword">Password</label>

                        <a class="js-animation-link form-label-link" href="javascript:;"
                           data-hs-show-animation-options='{
                   "targetSelector": "#loginOffcanvasFormResetPassword",
                   "groupName": "idForm"
                 }'>Forgot Password?</a>
                    </div>

                    <input type="password" class="form-control form-control-lg" name="password"
                           id="loginOffcanvasFormLoginPassword" placeholder="8+ characters required"
                           aria-label="8+ characters required" required minlength="8">
                    <span class="invalid-feedback">Please enter a valid password.</span>
                </div>
                <!-- End Form -->

                <div class="d-grid gap-3 text-center">
                    <button type="submit" class="btn btn-primary btn-lg">Log in</button>

                    <span class="divider-center">OR</span>

                    <button type="submit" class="btn btn-ghost-secondary">
              <span class="d-flex justify-content-center align-items-center">
                <img class="avatar avatar-xss me-2" src="/assets/svg/brands/google-icon.svg" alt="Image Description">
                Log in with Google
              </span>
                    </button>

                    <p>Don't have an account yet?
                        <a class="js-animation-link link" href="javascript:;" role="button"
                           data-hs-show-animation-options='{
                   "targetSelector": "#loginOffcanvasFormSignup",
                   "groupName": "idForm"
                 }'>Sign up</a>
                    </p>
                </div>
            </form>
        </div>
        <!-- End Log in -->

        <!-- Log in -->
        <div id="loginOffcanvasFormSignup" style="display: none; opacity: 0;">
            <!-- Heading -->
            <div class="text-center mb-7">
                <h3 class="modal-title">Sign up</h3>
                <p>Fill out the form to get started</p>
            </div>
            <!-- End Heading -->

            <form class="js-validate needs-validation" novalidate>
                <!-- Form -->
                <div class="mb-3">
                    <label class="form-label" for="loginOffcanvasFormSignupEmail">Your email</label>
                    <input type="email" class="form-control form-control-lg" name="email"
                           id="loginOffcanvasFormSignupEmail" placeholder="email@site.com" aria-label="email@site.com"
                           required>
                    <span class="invalid-feedback">Please enter a valid email address.</span>
                </div>
                <!-- End Form -->

                <!-- Form -->
                <div class="mb-3">
                    <label class="form-label" for="loginOffcanvasFormSignupPassword">Password</label>
                    <input type="password" class="form-control form-control-lg" name="password"
                           id="loginOffcanvasFormSignupPassword" placeholder="8+ characters required"
                           aria-label="8+ characters required" required>
                    <span class="invalid-feedback">Your password is invalid. Please try again.</span>
                </div>
                <!-- End Form -->

                <!-- Form -->
                <div class="mb-3" data-hs-validation-validate-class>
                    <label class="form-label" for="loginOffcanvasFormSignupConfirmPassword">Confirm password</label>
                    <input type="password" class="form-control form-control-lg" name="confirmPassword"
                           id="loginOffcanvasFormSignupConfirmPassword" placeholder="8+ characters required"
                           aria-label="8+ characters required" required
                           data-hs-validation-equal-field="#loginOffcanvasFormSignupPassword">
                    <span class="invalid-feedback">Password does not match the confirm password.</span>
                </div>
                <!-- End Form -->

                <div class="text-center mb-3">
                    <p class="small mb-0">By continuing you agree to our <a href="#">Terms and Conditions</a></p>
                </div>

                <div class="d-grid gap-3 text-center">
                    <button type="submit" class="btn btn-primary btn-lg">Sign up</button>

                    <span class="divider-center">OR</span>

                    <button type="submit" class="btn btn-ghost-secondary">
              <span class="d-flex justify-content-center align-items-center">
                <img class="avatar avatar-xss me-2" src="/assets/svg/brands/google-icon.svg" alt="Image Description">
                Sign up with Google
              </span>
                    </button>

                    <p>Already have an account?
                        <a class="js-animation-link link" href="javascript:;" role="button"
                           data-hs-show-animation-options='{
                   "targetSelector": "#loginOffcanvasFormLogin",
                   "groupName": "idForm"
                 }'>Log in</a>
                    </p>
                </div>
            </form>
        </div>
        <!-- End Log in -->

        <!-- Reset Password -->
        <div id="loginOffcanvasFormResetPassword" style="display: none; opacity: 0;">
            <!-- Heading -->
            <div class="text-center mb-7">
                <h3 class="modal-title">Forgot password</h3>
                <p>Instructions will be sent to you</p>
            </div>
            <!-- End Heading -->

            <form class="js-validate needs-validation" novalidate>
                <!-- Form -->
                <div class="mb-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <label class="form-label" for="signupModalFormResetPasswordEmail" tabindex="0">Your
                            email</label>

                        <a class="js-animation-link form-label-link" href="javascript:;"
                           data-hs-show-animation-options='{
                     "targetSelector": "#loginOffcanvasFormLogin",
                     "groupName": "idForm"
                   }'>
                            <i class="bi-chevron-left small"></i> Back to Log in
                        </a>
                    </div>

                    <input type="email" class="form-control form-control-lg" name="email"
                           id="signupModalFormResetPasswordEmail" tabindex="1" placeholder="Enter your email address"
                           aria-label="Enter your email address" required>
                    <span class="invalid-feedback">Please enter a valid email address.</span>
                </div>
                <!-- End Form -->

                <div class="d-grid gap-3 text-center">
                    <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                </div>
            </form>
        </div>
        <!-- End Reset Password -->
    </div>
</div>
<!-- ========== END SECONDARY CONTENTS ========== -->

<!-- JS Global Compulsory  -->
<script src="/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

<!-- JS Implementing Plugins -->
<script src="/assets/vendor/hs-header/dist/hs-header.min.js"></script>
<script src="/assets/vendor/hs-mega-menu/dist/hs-mega-menu.min.js"></script>
<script src="/assets/vendor/hs-show-animation/dist/hs-show-animation.min.js"></script>
<script src="/assets/vendor/hs-go-to/dist/hs-go-to.min.js"></script>
<script src="/assets/vendor/typed.js/lib/typed.min.js"></script>
<script src="/assets/vendor/fslightbox/index.js"></script>
<script src="/assets/vendor/swiper/swiper-bundle.min.js"></script>

<!-- JS Front -->
<script src="/assets/js/theme.min.js"></script>

<!-- JS Plugins Init. -->
<script>
    (function () {
        // INITIALIZATION OF HEADER
        // =======================================================
        new HSHeader('#header').init()


        // INITIALIZATION OF MEGA MENU
        // =======================================================
        new HSMegaMenu('.js-mega-menu', {
            desktop: {
                position: 'left'
            }
        })


        // INITIALIZATION OF SHOW ANIMATIONS
        // =======================================================
        new HSShowAnimation('.js-animation-link')


        // INITIALIZATION OF BOOTSTRAP VALIDATION
        // =======================================================
        HSBsValidation.init('.js-validate', {
            onSubmit: data => {
                data.event.preventDefault()
                alert('Submited')
            }
        })


        // INITIALIZATION OF BOOTSTRAP DROPDOWN
        // =======================================================
        HSBsDropdown.init()


        // INITIALIZATION OF GO TO
        // =======================================================
        new HSGoTo('.js-go-to')


        // INITIALIZATION OF TEXT ANIMATION (TYPING)
        // =======================================================
        HSCore.components.HSTyped.init('.js-typedjs')


        // INITIALIZATION OF SWIPER
        // =======================================================
        var swiper = new Swiper('.js-swiper-course-hero', {
            preloaderClass: 'custom-swiper-lazy-preloader',
            navigation: {
                nextEl: '.js-swiper-course-hero-button-next',
                prevEl: '.js-swiper-course-hero-button-prev',
            },
            slidesPerView: 1,
            loop: 1,
            breakpoints: {
                380: {
                    slidesPerView: 2,
                    spaceBetween: 15,
                },
                580: {
                    slidesPerView: 3,
                    spaceBetween: 15,
                },
                768: {
                    slidesPerView: 4,
                    spaceBetween: 15,
                },
                1024: {
                    slidesPerView: 6,
                    spaceBetween: 15,
                },
            },
            on: {
                'imagesReady': function (swiper) {
                    const preloader = swiper.el.querySelector('.js-swiper-course-hero-preloader')
                    preloader.parentNode.removeChild(preloader)
                }
            }
        });
    })()
</script>
</body>
</html>
