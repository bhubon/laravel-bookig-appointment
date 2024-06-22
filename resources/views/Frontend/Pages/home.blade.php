@extends('Frontend.Layout.frontend')
@section('section')
    <!--============================
            BANNER START
        ==============================-->
    <section class="banner" style="background: url(images/banner_bg.jpg);">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-xxl-5 col-md-9 col-xl-6 col-lg-6 wow fadeInLeft" data-wow-duration="1s">
                    <div class="banner_text">
                        <h5>Welcome to MadiFax</h5>
                        <h1>We Are Committed To Your Health</h1>
                        <p>It is a established fact that a reader will be distracted by the content of a page when looking
                            at this layout.</p>
                        <a href="doctor.html" class="common_btn">meet a doctor</a>
                        <ul class="banner_counter d-flex flex-wrap">
                            <li>
                                <h3><span class="counter">355</span>k+ </h3>
                                <p>Recovered Patients</p>
                            </li>
                            <li>
                                <h3><span class="counter">98</span>%</h3>
                                <p>Good Review</p>
                            </li>
                            <li>
                                <h3><span class="counter">120</span>+</h3>
                                <p>Popular Doctors</p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xxl-6 col-lg-6 col-xl-6 wow fadeInRight" data-wow-duration="1s">
                    <div class="banner_img">
                        <div class="img">
                            <img src="{{ asset('frontend') }}/images/banner_img.png" alt="img" class="img-fluid w-100">
                        </div>
                        <div class="react">
                            <img src="{{ asset('frontend') }}/images/react.png" alt="react img" class="img-fluid w-100">
                        </div>
                        <div class="video_call">
                            <img src="{{ asset('frontend') }}/images/Video-call.png" alt="video img"
                                class="img-fluid w-100">
                        </div>
                        <div class="call">
                            <img src="{{ asset('frontend') }}/images/Call.png" alt="call img" class="img-fluid w-100">
                        </div>
                        <div class="review">
                            <img src="{{ asset('frontend') }}/images/Review.png" alt="review img" class="img-fluid w-100">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================
            BANNER END
        ==============================-->


    <!--============================
            ABOUT START
        ==============================-->
    <section class="about pt_100 xs_pt_70 pb_100 xs_pb_70">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-sm-9  col-lg-5 col-md-7 wow fadeInLeft" data-wow-duration="1s">
                    <div class="about_img">
                        <div class="about_img_1">
                            <img src="{{ asset('frontend') }}/images/about-img1.jpg" alt="about img"
                                class="img-fluid w-100">
                        </div>
                        <div class="about_img_2">
                            <img src="{{ asset('frontend') }}/images/about_img2.jpg" alt="about img"
                                class="img-fluid w-100">
                            <a class="play_btn venobox" data-autoplay="true" data-vbtype="video"
                                href="https://youtu.be/nqye02H_H6I">
                                <i class="fas fa-play" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-sm-12 col-lg-7  wow fadeInRight" data-wow-duration="1s">
                    <div class="common_heading">
                        <h5>about us</h5>
                        <h2>The Great Place of Medical Hospital Center.</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Quis ipsum susp endisse ultrices gravida tempor incididu ut
                            labore et dolore magna aliqua. Quis ipsum susp
                            endisse ultrices gravida.</p>
                    </div>

                    <ul class="about_iteam d-flex flex-wrap">
                        <li>Ambulance Services</li>
                        <li>Oxizen on Wheel</li>
                        <li>Pharmacy on Clinic</li>
                        <li>On duty Doctors</li>
                        <li>24/7 Medical Emergency</li>
                    </ul>
                    <a href="about.html" class="common_btn">Discover More</a>
                </div>
            </div>
        </div>
    </section>
    <!--============================
            ABOUT END
        ==============================-->


    <!--============================
            SERVICE START
        ==============================-->
    <section class="service" style="background: url(images/service_bg.jpg);">
        <div class="service_overlay pt_100 xs_pt_70 pb_100 xs_pb_70">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="common_heading center_heading mb_15">
                            <h5>our service</h5>
                            <h2>our madical service</h2>
                        </div>
                    </div>
                </div>
                <div class="row service_slider">
                    <div class="col-xxl-4 wow fadeInUp" data-wow-duration="1s">
                        <div class="single_service">
                            <div class="service_img">
                                <span class="tf_service_icon"><i class="fas fa-eye"></i></span>
                                <img src="{{ asset('frontend') }}/images/service-1.jpg" alt="service img"
                                    class="img-fluid w-100">
                            </div>
                            <div class="service_text">
                                <a href="service_details.html" class="service_heading">Online Monitoring</a>
                                <p>Lorem ipsum dolor sit amet consectetur ipsam adipisicing elit. Rem quia officia quaerat
                                    ipsam hic sunt quaerat!</p>
                                <a href="service_details.html" class="service_link">read more <i
                                        class="far fa-long-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-4 wow fadeInUp" data-wow-duration="1s">
                        <div class="single_service">
                            <div class="service_img">
                                <span class="tf_service_icon tf_service_icon2"><i class="fas fa-heartbeat"></i></span>
                                <img src="{{ asset('frontend') }}/images/service-2.jpg" alt="service img"
                                    class="img-fluid w-100">
                            </div>
                            <div class="service_text">
                                <a href="service_details.html" class="service_heading">Holter Heart surgery</a>
                                <p>Lorem ipsum dolor sit amet consectetur ipsam adipisicing elit. Rem quia officia quaerat
                                    ipsam hic sunt quaerat!</p>
                                <a href="service_details.html" class="service_link">read more <i
                                        class="far fa-long-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-4 wow fadeInUp" data-wow-duration="1s">
                        <div class="single_service">
                            <div class="service_img">
                                <span class="tf_service_icon tf_service_icon3"><i class="fad fa-capsules"></i></span>
                                <img src="{{ asset('frontend') }}/images/service-3.jpg" alt="service img"
                                    class="img-fluid w-100">
                            </div>
                            <div class="service_text">
                                <a href="service_details.html" class="service_heading">Diagnose & Research</a>
                                <p>Lorem ipsum dolor sit amet consectetur ipsam adipisicing elit. Rem quia officia quaerat
                                    ipsam hic sunt quaerat!</p>
                                <a href="service_details.html" class="service_link">read more <i
                                        class="far fa-long-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-4 wow fadeInUp" data-wow-duration="1s">
                        <div class="single_service">
                            <div class="service_img">
                                <span class="tf_service_icon tf_service_icon4"><i class="fas fa-heartbeat"></i></span>
                                <img src="{{ asset('frontend') }}/images/service-2.jpg" alt="service img"
                                    class="img-fluid w-100">
                            </div>
                            <div class="service_text">
                                <a href="service_details.html" class="service_heading">Holter Heart surgery</a>
                                <p>Lorem ipsum dolor sit amet consectetur ipsam adipisicing elit. Rem quia officia quaerat
                                    ipsam hic sunt quaerat!</p>
                                <a href="service_details.html" class="service_link">read more <i
                                        class="far fa-long-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================
            SERVICE END
        ==============================-->


    <!--============================
            FAQ START
        ==============================-->
    <section class="faq pt_100 xs_pt_70 pb_100 xs_pb_70">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="common_heading center_heading mb_25">
                        <h5>FAQ</h5>
                        <h2>Frequently Asked Questions</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-7 col-lg-6 wow fadeInLeft" data-wow-duration="1s">
                    <div class="faq_accordion accordion accordion-flush" id="accordionFlushExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseOne" aria-expanded="true"
                                    aria-controls="flush-collapseOne">
                                    What Happens To My Sample Once I Have Provided It?</button>
                            </h2>
                            <div id="flush-collapseOne" class="accordion-collapse collapse show"
                                aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                    isus mods mpor incididunt ut labore et dolore magna aliqua. Ut en onim ad minim on
                                    adipiscing elit veniam.</div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseTwo" aria-expanded="false"
                                    aria-controls="flush-collapseTwo">
                                    Where Can I Go To Provide A Sample For Testing? </button>
                            </h2>
                            <div id="flush-collapseTwo" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                    isus mods mpor incididunt ut labore et dolore magna aliqua. Ut en onim ad minim on
                                    adipiscing elit veniam.</div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseThree" aria-expanded="false"
                                    aria-controls="flush-collapseThree">
                                    What Will Laboratory Testing Cost Me? </button>
                            </h2>
                            <div id="flush-collapseThree" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                    isus mods mpor incididunt ut labore et dolore magna aliqua. Ut en onim ad minim on
                                    adipiscing elit veniam.</div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseFour" aria-expanded="false"
                                    aria-controls="flush-collapseFour">
                                    Can I Make Appointments by Phone? </button>
                            </h2>
                            <div id="flush-collapseFour" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                    isus mods mpor incididunt ut labore et dolore magna aliqua. Ut en onim ad minim on
                                    adipiscing elit veniam.</div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingFive">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseFive" aria-expanded="false"
                                    aria-controls="flush-collapseFive">
                                    Using Innovative Technology </button>
                            </h2>
                            <div id="flush-collapseFive" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingFive" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                    isus mods mpor incididunt ut labore et dolore magna aliqua. Ut en onim ad minim on
                                    adipiscing elit veniam.</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-5 col-lg-6 wow fadeInRight" data-wow-duration="1s">
                    <div class="faq_img">
                        <img src="{{ asset('frontend') }}/images/faq-img.jpg" alt="faq" class="img-fluid w-100">
                        <a class="play_btn venobox" data-autoplay="true" data-vbtype="video"
                            href="https://www.youtube.com/watch?v=i_glB8n4KLE&list=PPSV">
                            <i class="fas fa-play" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================
            FAQ END
        ==============================-->


    <!--============================
            PROCESS START
        ==============================-->
    <section class="process pt_100 xs_pt_70 pb_95 xs_pb_65" style="background: url(images/work_bg.jpg);">
        <div class="container process_shape">
            <div class="row">
                <div class="col-xl-12">
                    <div class="common_heading center_heading mb_25">
                        <h5>How We Work</h5>
                        <h2>Our Working Process</h2>
                    </div>
                </div>
            </div>
            <div class="work_process_area">
                <div class="row">
                    <div class="col-xl-3 col-sm-6 col-lg-3 wow fadeInUp" data-wow-duration="1s">
                        <div class="single_process">
                            <span class="process_number num1">01</span>
                            <h4>fill the form</h4>
                            <p>Lorem ipsum dolor sit amet consectetur ipsam adipisicing elit. Rem quia officia quaerat
                                ipsam!
                            </p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-lg-3 wow fadeInUp" data-wow-duration="1s">
                        <div class="single_process">
                            <span class="process_number num2">02</span>
                            <h4>Book an Appointment</h4>
                            <p>Lorem ipsum dolor sit amet consectetur ipsam adipisicing elit. Rem quia officia quaerat
                                ipsam!
                            </p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-lg-3 wow fadeInUp" data-wow-duration="1s">
                        <div class="single_process">
                            <span class="process_number num3">03</span>
                            <h4>Check-Ups</h4>
                            <p>Lorem ipsum dolor sit amet consectetur ipsam adipisicing elit. Rem quia officia quaerat
                                ipsam!
                            </p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-lg-3 wow fadeInUp" data-wow-duration="1s">
                        <div class="single_process">
                            <span class="process_number num4">04</span>
                            <h4>Get Reports</h4>
                            <p>Lorem ipsum dolor sit amet consectetur ipsam adipisicing elit. Rem quia officia quaerat
                                ipsam!
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================
            PROCESS END
        ==============================-->


    <!--============================
            APPOINMENT START
        ==============================-->
    <section class="appoinment pt_185 xs_pt_70 pb_100 xs_pb_70">
        <div class="container">
            <div class="appoinment_bg" style="background: url(images/appointment_bg.jpg);">
                <div class="appoinment_overlay">
                    <div class="row">
                        <div class="col-xl-7 col-lg-7 wow fadeInLeft" data-wow-duration="1s">
                            <div class="appoinment_form">
                                <div class="common_heading mb_30">
                                    <h5>Appointment</h5>
                                    <h2>Apply For Free Now</h2>
                                </div>
                                <form action="#">
                                    <div class="row">
                                        <div class="col-lg-6 col-sm-6">
                                            <div class="appoinment_form_input">
                                                <input type="text" placeholder="Patient Name*">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-sm-6">
                                            <div class="appoinment_form_input">
                                                <input type="email" placeholder="Email*">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-sm-6">
                                            <div class="appoinment_form_input">
                                                <input type="email" placeholder="Email Address*">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-sm-6">
                                            <div class="appoinment_form_input">
                                                <select class="select_2">
                                                    <option value="">Select Department</option>
                                                    <option value="">Cardiology</option>
                                                    <option value="">Ophthalmology</option>
                                                    <option value="">Pediatric</option>
                                                    <option value="">Radiology</option>
                                                    <option value="">Urology</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-sm-6">
                                            <div class="appoinment_form_input">
                                                <select class="select_2">
                                                    <option value="">Select Doctor</option>
                                                    <option value="">Dr. Hasan Mahamud</option>
                                                    <option value="">Dr. Moinuddin</option>
                                                    <option value="">Dr. Afroja Akter</option>
                                                    <option value="">Dr. Mamunur Rasid</option>
                                                    <option value="">Dr. Abdus Salam</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-sm-6">
                                            <div class="appoinment_form_input">
                                                <input type="date">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-sm-6">
                                            <div class="appoinment_form_input">
                                                <select class="reservation_input select_2">
                                                    <option value="">Select Time</option>
                                                    <option value="">10.00 am to 11.00 am</option>
                                                    <option value="">11.00 am to 12.00 pm</option>
                                                    <option value="">3.00 pm to 4.00 pm</option>
                                                    <option value="">4.00 pm to 5.00 pm</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-sm-6">
                                            <div class="appoinment_form_input">
                                                <button class="common_btn">book
                                                    appoinment</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="appoinment_img">
                                <img src="{{ asset('frontend') }}/images/appoinment_img.png" alt="appointment"
                                    class="img-fluid w-100">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================
            APPOINMENT END
        ==============================-->


    <!--============================
            HELPLINE START
        ==============================-->
    <section class="helpline pt_100 xs_pt_70 pb_100 xs_pb_70">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-xxl-6 col-lg-6 col-xl-6 wow fadeInLeft" data-wow-duration="1s">
                    <div class="common_heading">
                        <h5>Emergency helpline</h5>
                        <h2>Need Emergency Contact</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Quis ipsum susp endisse ultrices gravida tempor incididu ut
                            labore.</p>
                    </div>
                    <ul class="helpline_iteam">
                        <li>24/7 Contact Our Hospital.</li>
                        <li>24 hours Open Our Hospital.</li>
                        <li>Emergency Contact Our Phone Number.</li>
                    </ul>

                    <ul class="d-flex flex-wrap helpline_contact">
                        <li>
                            <span><i class="fas fa-phone-alt"></i></span>
                            <div class="helpline_contact_text">
                                <p>Phone Number</p>
                                <a href="callto:123456789">+880 13 2525 065</a>
                            </div>
                        </li>
                        <li>
                            <span><i class="fas fa-comment-alt-lines"></i></span>
                            <div class="helpline_contact_text">
                                <p>Quick Your Email</p>
                                <a href="mailto:example@gmail.com">help.info@gmail.com</a>
                            </div>

                        </li>
                    </ul>

                </div>
                <div class="col-xxl-5 col-lg-6 col-xl-6 wow fadeInRight" data-wow-duration="1s">
                    <div class="helpline_img">
                        <img src="{{ asset('frontend') }}/images/helpline_img.png" alt="help img"
                            class="img-fluid w-100">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================
            HELPLINE END
        ==============================-->


    <!--============================
            TEAM START
        ==============================-->
    <section class="team pt_100 xs_pt_70 pb_100 xs_pb_70">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="common_heading center_heading mb_25">
                        <h5>our team</h5>
                        <h2>Meet Our expert doctor</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-3 col-sm-6 col-lg-4 wow fadeInUp" data-wow-duration="1s">
                    <div class="single_team">
                        <div class="team_img">
                            <img src="{{ asset('frontend') }}/images/team-1.jpg" alt="team" class="img-fluid w-100">
                            <div class="team_overlay">
                                <ul class="team_icon">
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-whatsapp"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="team_designation">
                            <h6>Dr. Jon Miller</h6>
                            <p>Neurology</p>
                            <span>MBBS, FCPS, FRCS</span>
                            <a href="doctor_details.html"><i class="fal fa-plus"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-lg-4 wow fadeInUp" data-wow-duration="1s">
                    <div class="single_team">
                        <div class="team_img">
                            <img src="{{ asset('frontend') }}/images/team-2.jpg" alt="team" class="img-fluid w-100">
                            <div class="team_overlay">
                                <ul class="team_icon">
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-whatsapp"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="team_designation">
                            <h6>Dr. Jon Miller</h6>
                            <p>Cardiology</p>
                            <span>MBBS, FCPS, FRCS</span>
                            <a href="doctor_details.html"><i class="fal fa-plus"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-lg-4 wow fadeInUp" data-wow-duration="1s">
                    <div class="single_team">
                        <div class="team_img">
                            <img src="{{ asset('frontend') }}/images/team-3.jpg" alt="team" class="img-fluid w-100">
                            <div class="team_overlay">
                                <ul class="team_icon">
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-whatsapp"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="team_designation">
                            <h6>Dr. Jon Miller</h6>
                            <p>Ophthalmology</p>
                            <span>MBBS, FCPS, FRCS</span>
                            <a href="doctor_details.html"><i class="fal fa-plus"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-lg-4 wow fadeInUp" data-wow-duration="1s">
                    <div class="single_team">
                        <div class="team_img">
                            <img src="{{ asset('frontend') }}/images/team-4.jpg" alt="team" class="img-fluid w-100">
                            <div class="team_overlay">
                                <ul class="team_icon">
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-whatsapp"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="team_designation">
                            <h6>Dr. Jon Miller</h6>
                            <p>Pediatric</p>
                            <span>MBBS, FCPS, FRCS</span>
                            <a href="doctor_details.html"><i class="fal fa-plus"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-12 text-center mt_40">
                    <a class="common_btn" href="doctor.html">view more</a>
                </div>
            </div>
        </div>
    </section>
    <!--============================
            TEAM END
        ==============================-->


    <!--============================
            REVIEW START
        ==============================-->
    <section class="review pt_100 xs_pt_70 pb_100 xs_pb_70">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="common_heading center_heading mb_45">
                        <h5>Testimonials</h5>
                        <h2>What Our Client Says</h2>
                    </div>
                </div>
            </div>
            <div class="row review_slider">
                <div class="col-xl-4 wow fadeInUp" data-wow-duration="1s">
                    <div class="single_review">
                        <p class="review_icon">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </p>
                        <p>“Lorem ipsum dolor sit amet, consectetur on pisc ing elit, sed do eiusmod tempor incidids is
                            magna aliqua established fact”</p>
                        <div class="reviewer_info">
                            <div class="img">
                                <img src="{{ asset('frontend') }}/images/review-1.png" alt="reviewer"
                                    class="img-fluid w-100">
                            </div>
                            <h3>Jenny Wilson</h3>
                            <span>Customer</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 wow fadeInUp" data-wow-duration="1s">
                    <div class="single_review">
                        <p class="review_icon">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </p>
                        <p>“Lorem ipsum dolor sit amet, consectetur on pisc ing elit, sed do eiusmod tempor incidids is
                            magna aliqua established fact”</p>
                        <div class="reviewer_info">
                            <div class="img">
                                <img src="{{ asset('frontend') }}/images/review-2.png" alt="reviewer"
                                    class="img-fluid w-100">
                            </div>
                            <h3>Vlack Marvin</h3>
                            <span>Customer</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 wow fadeInUp" data-wow-duration="1s">
                    <div class="single_review">
                        <p class="review_icon">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </p>
                        <p>“Lorem ipsum dolor sit amet, consectetur on pisc ing elit, sed do eiusmod tempor incidids is
                            magna aliqua established fact”</p>
                        <div class="reviewer_info">
                            <div class="img">
                                <img src="{{ asset('frontend') }}/images/review-3.png" alt="reviewer"
                                    class="img-fluid w-100">
                            </div>
                            <h3>Robert Floxder</h3>
                            <span>Customer</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 wow fadeInUp" data-wow-duration="1s">
                    <div class="single_review">
                        <p class="review_icon">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </p>
                        <p>“Lorem ipsum dolor sit amet, consectetur on pisc ing elit, sed do eiusmod tempor incidids is
                            magna aliqua established fact”</p>
                        <div class="reviewer_info">
                            <div class="img">
                                <img src="{{ asset('frontend') }}/images/review-2.png" alt="reviewer"
                                    class="img-fluid w-100">
                            </div>
                            <h3>Vlack Marvin</h3>
                            <span>Customer</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================
            REVIEW END
        ==============================-->


    <!--============================
            BLOG START
        ==============================-->
    <section class="blog pt_100 xs_pt_70 pb_100 xs_pb_70">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="common_heading center_heading mb_15">
                        <h5>Latest News</h5>
                        <h2>Latest Post & Articles</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-4 col-md-6 col-lg-4 wow fadeInUp" data-wow-duration="1s">
                    <div class="single_blog">
                        <div class="blog_img">
                            <a href="#" class="category">Medical</a>
                            <img src="{{ asset('frontend') }}/images/blog-1.jpg" alt="blog img"
                                class=" img-fluid w-100">
                        </div>
                        <div class="blog_text">
                            <ul class="d-flex flex-wrap blog_date">
                                <li><i class="fas fa-user"></i>Admin</li>
                                <li><i class="fas fa-calendar-alt"></i>22 june 2023</li>
                            </ul>
                            <a href="blog_details.html" class="blog_heading">Telehealth Services Are Ready To Help Your
                                Family</a>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing. Veritatis consectetur ipsum.</p>
                            <div class="blog_text_icon">
                                <a class="blog_link" href="blog_details.html">read more <i
                                        class="far fa-long-arrow-right"></i></a>
                                <ul class="d-flex flex-wrap blog_react">
                                    <li><i class="fas fa-comment-lines"></i>5</li>
                                    <li><i class="fas fa-heart"></i>20</li>
                                    <li><i class="fas fa-share-alt"></i>15</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 col-lg-4 wow fadeInUp" data-wow-duration="1s">
                    <div class="single_blog">
                        <div class="blog_img">
                            <a href="#" class="category blue">Hospital</a>
                            <img src="{{ asset('frontend') }}/images/blog-2.jpg" alt="blog img"
                                class=" img-fluid w-100">
                        </div>
                        <div class="blog_text">
                            <ul class="d-flex flex-wrap blog_date">
                                <li><i class="fas fa-user"></i>Admin</li>
                                <li><i class="fas fa-calendar-alt"></i>22 june 2023</li>
                            </ul>
                            <a href="blog_details.html" class="blog_heading">Doccure – Making your clinic painless
                                visit</a>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing. Veritatis consectetur amet.</p>
                            <div class="blog_text_icon">
                                <a class="blog_link" href="blog_details.html">read more <i
                                        class="far fa-long-arrow-right"></i></a>
                                <ul class="d-flex flex-wrap blog_react">
                                    <li><i class="fas fa-comment-lines"></i>5</li>
                                    <li><i class="fas fa-heart"></i>20</li>
                                    <li><i class="fas fa-share-alt"></i>15</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 col-lg-4 wow fadeInUp" data-wow-duration="1s">
                    <div class="single_blog">
                        <div class="blog_img">
                            <a href="#" class="category red">Doctor</a>
                            <img src="{{ asset('frontend') }}/images/blog-3.jpg" alt="blog img"
                                class=" img-fluid w-100">
                        </div>
                        <div class="blog_text">
                            <ul class="d-flex flex-wrap blog_date">
                                <li><i class="fas fa-user"></i>Admin</li>
                                <li><i class="fas fa-calendar-alt"></i>22 june 2023</li>
                            </ul>
                            <a href="blog_details.html" class="blog_heading">What are the benefits of Online Doctor
                                Booking</a>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing. Veritatis consectetur.</p>
                            <div class="blog_text_icon">
                                <a class="blog_link" href="blog_details.html">read more <i
                                        class="far fa-long-arrow-right"></i></a>
                                <ul class="d-flex flex-wrap blog_react">
                                    <li><i class="fas fa-comment-lines"></i>5</li>
                                    <li><i class="fas fa-heart"></i>20</li>
                                    <li><i class="fas fa-share-alt"></i>15</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================
            BLOG END
        ==============================-->
@endsection
