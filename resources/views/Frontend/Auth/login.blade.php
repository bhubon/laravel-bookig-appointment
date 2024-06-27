@extends('Frontend.Layout.frontend')
@section('section')
    <section class="breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_text">
                        <h1>Become A Customer</h1>
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li>Become A Customer</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="become_doctor pt_100 xs_pt_70 pb_100 xs_pb_70">
        <div class="container">
            <div class="become_doctor_contant  wow fadeInUp" data-wow-duration="1s">
                <div class="row">
                    <div class="col-xl-12">
                        <h2 class="become_doctor_heading">Become A Customer</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="become_doctor_text">
                            <h3>Become A Doctor</h3>
                            <p>At Madifax, we are committed to protecting your privacy and personal information
                                This privacy policy explains Howe collect, use, and share your information when
                                you use our services. By using our services, you agree to the terms of this privacy
                                and share policy.</p>

                            <h3>Doctor Rules</h3>
                            <p>It Madifax, we are committed to protecting your privacy and personal information.
                                This privacy policy explains howwe.</p>
                            <ul>
                                <li>Form provides easy registration and the processing data.</li>
                                <li>Aport provides easy registration and the processing of data for organiz.</li>
                                <li>More provides easy registration and the.</li>
                                <li>Any provides easy registration and the processing data.</li>
                                <li>Any provides easy registration and the processing of data done.</li>
                            </ul>
                            <h3>Start With Booking</h3>
                            <p>Madifax, we are committed to protecting your privacy and personal information.
                                This privacy policy explains howwe collect, use, and share your information when
                                you use our services. By using our services, you agree to the terms of this privacy
                                and share policy.</p>
                            <ul>
                                <li>Form provides easy registration and the processing data.</li>
                                <li>Aport provides easy registration and the processing of data for organiz.</li>
                                <li>More provides easy registration and the.</li>
                            </ul>
                            <p>Anvida we are committed to protecting your privacy and personal information.
                                This privacy policy explains howwe collect.</p>
                        </div>
                    </div>
                    <div class="col-lg-6 mt-5">
                        <form class="become_doctor_form" onsubmit="SubmitLogin(event)">
                            <h2>Customer Login</h2>

                            <div class="row">
                                <div class="col-12">
                                    <div class="become_doctor_input">
                                        <label>Email</label>
                                        <input type="email" id="email" placeholder="Enter your email">
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="become_doctor_input">
                                        <label>Password</label>
                                        <input type="password" id="password" placeholder="Enter your password">
                                    </div>
                                </div>

                                <div class="col-12">
                                    <button class="common_btn">Become A Customer</button>
                                    <div class="mt-3">Not yet a member? <a href="{{ route('customer.registration') }}" class="tx-info">Sign Up</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


<script>

    async function SubmitLogin(event) {
        event.preventDefault();

        let email = document.getElementById('email').value;
        let password = document.getElementById('password').value;

        if (email.length === 0) {
            errorToast("Email is required");
        } else if (password.length === 0) {
            errorToast("Password is required");
        } else {
            try {
                let res = await axios.post("/login", {
                    email: email,
                    password: password
                });

                if (res.status === 200 && res.data['status'] === 'success') {
                    console.log('----------',res);
                    successToast(res.data['message']);
                    window.location.href = "/appointment";
                } else if (res.status === 401) {
                    errorToast('Invalid login credential!');
                } else {
                    errorToast(res.data['message']);
                }

            } catch (error) {
                if (error.response) {
                    if (error.response.status === 422) {
                        errorToast('Validation Failed: ' + Object.values(error.response.data.errors).flat().join(', '));
                    } else {
                        errorToast('Login failed: ' + error.response.data.message);
                    }
                } else {
                    errorToast('An unexpected error occurred. Please try again.');
                }
            }
        }
    }
</script>


@endsection