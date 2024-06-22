@extends('Frontend.Layout.frontend')
@section('section')
    <!--============================
            BREADCRUMB START
        ==============================-->
    <section class="breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_text">
                        <h1>Appointment</h1>
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li>Appointment</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================
            BREADCRUMB END
        ==============================-->


    <!--============================
            APPOINTMENT PAGE START
        ==============================-->
    <section class="appointment_page pt_100 xs_pt_65 pb_100 xs_pb_70">
        <div class="container">
            <div class="appointment_content">
                <div class="row">
                    <div class="col-xl-5 col-lg-6 wow fadeInLeft" data-wow-duration="1s">
                        <div class="appointment_page_img">
                            <img src="{{ asset('frontend') }}/images/appoinment_page_img.png" alt="appointment" class="img-fluid w-100">
                        </div>
                    </div>
                    <div class="col-xl-7 col-lg-6 wow fadeInRight" data-wow-duration="1s">
                        <div class="appointment_page_text">
                            <form action="#">
                                <h2>book appointment</h2>
                                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cum quo itaque, officiis
                                    voluptatem provident inventore nobis voluptas impedit eligendi, officia asperiores
                                    ad
                                    autem ratione quam.</p>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="appoinment_page_input">
                                            <input type="text" placeholder="Patient Name*">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="appoinment_page_input">
                                            <input type="email" placeholder="Email*">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="appoinment_page_input">
                                            <input type="text" placeholder="Phone*">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="appoinment_page_input">
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
                                    <div class="col-md-6">
                                        <div class="appoinment_page_input">
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
                                    <div class="col-md-6">
                                        <div class="appoinment_page_input">
                                            <input type="date">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="appoinment_page_input">
                                            <select class="reservation_input select_2">
                                                <option value="">Select Time</option>
                                                <option value="">10.00 am to 11.00 am</option>
                                                <option value="">11.00 am to 12.00 pm</option>
                                                <option value="">3.00 pm to 4.00 pm</option>
                                                <option value="">4.00 pm to 5.00 pm</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="appoinment_page_input">
                                            <textarea rows="5" placeholder="Message"></textarea>
                                            <button class="common_btn">book
                                                appoinment</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================
            APPOINTMENT PAGE END
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
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                            ut labore et dolore magna aliqua. Quis ipsum susp endisse ultrices gravida tempor incididu
                            ut labore.</p>
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
                        <img src="{{ asset('frontend') }}/images/helpline_img.png" alt="help img" class="img-fluid w-100">
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
@endsection
