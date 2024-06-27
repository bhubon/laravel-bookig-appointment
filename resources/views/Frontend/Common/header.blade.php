<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, target-densityDpi=device-dpi" />
    <title>MadiFax - Online Doctor Appointment System HTML Template</title>
    <link rel="icon" type="image/png" href="{{ asset('frontend') }}/images/favicone.png">
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/venobox.min.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/custom_spacing.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/select2.min.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/slick.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/animate.css">

    <link rel="stylesheet" href="{{ asset('frontend') }}/css/style.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/responsive.css">

    <link href="{{ asset('assets/css/toastify.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('assets/js/toastify-js.js') }}"></script>
    <script src="{{ asset('assets/js/axios.min.js') }}"></script>
    <script src="{{ asset('assets/js/config.js') }}"></script>

</head>

<body>

    <!--============================
        TOPBAR START
    ==============================-->
    <section class="topbar">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 col-lg-9 d-none d-md-block">
                    <ul class="topbar_link d-flex flex-wrap">
                        <li><a href="callto:123456789"><i class="fas fa-phone-alt"></i>+1 (700) 230-0035</a></li>
                        <li><a href="mailto:example@gmail.com"><i class="fas fa-envelope"></i>support@gmail.com</a></li>
                        <li>
                            <p><i class="fas fa-map-marker-alt"></i>2767 Sunrise Street, NY 1002, USA</p>
                        </li>
                    </ul>
                </div>
                <div class="col-xl-3 col-lg-3 d-md-none d-lg-block">
                    <ul class="topbar_icon d-flex flex-wrap">
                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                        <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--============================
        TOPBAR END
    ==============================-->


    <!--============================
        MAIN MANU START
    ==============================-->
    <nav class="navbar navbar-expand-lg main_menu">
        <div class="container">
            <a class="navbar-brand" href="/"><img src="{{ asset('frontend') }}/images/Logo_1.png" alt="logo"
                    class="img-fluid w-100"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars bar_icon"></i>
                <i class="far fa-times close_icon"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.html">about</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="service.html">services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">pages <i class="far fa-plus"></i></a>
                        <ul class="dropdown">
                            <li><a href="become_doctor.html">become a doctor</a></li>
                            <li><a href="blog_details.html">Blog Details</a></li>
                            <li><a href="service_details.html">Services Details</a></li>
                            <li><a href="doctor.html">doctor</a></li>
                            <li><a href="doctor_details.html">doctor details</a></li>
                            <li><a href="gallary.html">Gallery</a></li>
                            <li><a href="pricing.html">Pricing Plan</a></li>
                            <li><a href="payment.html">Payment</a></li>
                            <li><a href="dashboard.html">dashboard</a></li>
                            <li><a href="error.html">Error/404</a></li>
                            <li><a href="faq.html">FAQ’s</a></li>
                            <li><a href="sign_in.html">Sign In</a></li>
                            <li><a href="sing_up.html">Sign Up</a></li>
                            <li><a href="forgot_password.html">Forgot Password</a></li>
                            <li><a href="privacy_policy.html">Privacy Policy</a></li>
                            <li><a href="terms_condition.html">Terms And Condition</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="blog.html">blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.html">contact</a>
                    </li>
                </ul>
                <ul class="menu_btn d-flex flex-wrap align-items-center">
                    <li><a href="#" class="menu_search_icon"><i class="fal fa-search"></i></a></li>
                    <li><a href="{{ route('frontend.appointment') }}" class="common_btn">Appointment</a></li>
                    <li class="nav-item">
                        @auth
                        <a class="nav-link" href="#">{{ auth()->user()->name }}<i class="far fa-plus"></i></a>
                        <ul class="dropdown">
                            <li><a href="become_doctor.html">Dashboard</a></li>
                            <li><a href="blog_details.html">logout</a></li>
                        </ul>
                        @else
                        <a class="nav-link" href="{{ route('customer.login') }}">Login <i class="far fa-plus"></i></a>
                        @endauth
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="menu_search">
        <form>
            <input type="text" placeholder="Search">
            <button class="common_btn" type="submit">Search</button>
            <span class="close_search"><i class="far fa-times"></i></span>
        </form>
    </div>
    <!--============================
        MAIN MANU END
    ==============================-->
