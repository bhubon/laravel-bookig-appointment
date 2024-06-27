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
                        <form class="become_doctor_form" onsubmit="SubmitRegistration(event)">
                            <h2>Customer Registration</h2>

                            <div class="row">
                                <div class="col-12">
                                    <div class="become_doctor_input">
                                        <label>Name</label>
                                        <input type="text" id="name" placeholder="Enter your name">
                                    </div>
                                </div>
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
                                    <div class="become_doctor_input">
                                        <label>Confirm Password</label>
                                        <input type="password" id="confirm_password" placeholder="Enter confirm password">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="common_btn" type="submit">Become A Customer</button>
                                    <div class="mt-3">Already have an account? <a href="{{ route('customer.login') }}" class="tx-info">Sign In</a>
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

    async function SubmitRegistration(event) {
        event.preventDefault();

        let name = document.getElementById('name').value;
        let email = document.getElementById('email').value;
        let password = document.getElementById('password').value;
        let cpassword = document.getElementById('confirm_password').value;

        if(name.length === 0) {
            errorToast("Name is required");
        } 
        else if(email.length === 0) {
            errorToast("Email is required");
        } 
        else if(password.length === 0) {
            errorToast("Password is required");
        } 
        else if(cpassword.length === 0) {
            errorToast("Confirm password is required");
        } 
        else if(password !== cpassword) {
            errorToast("Confirm password does not match!");
        } 
        else {
            try {
                let res = await axios.post("/registration", {
                    name: name,
                    email: email,
                    password: password,
                    password_confirmation: cpassword
                });

                if (res.status === 201 && res.data['status'] === 'success') {
                    successToast('Customer created successfully');
                    window.location.href = "/appointment";
                } else if (res.status === 422) {
                    errorToast(res.data['message'] + ': ' + Object.values(res.data.errors).flat().join(', '));
                } else {
                    errorToast(res.data['message']);
                }
            } catch (error) {
                if (error.response) {
                    if (error.response.status === 422) {
                        errorToast('Validation Failed: ' + Object.values(error.response.data.errors).flat().join(', '));
                    } else {
                        errorToast('Customer creation failed: ' + error.response.data.message);
                    }
                } else {
                    errorToast('An unexpected error occurred. Please try again.');
                }
            }
        }
    }
</script>



@endsection