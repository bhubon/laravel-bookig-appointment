@extends('Frontend.Layout.frontend')
@section('section')
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
                        <form id="save-form">
                            <h2>book appointment</h2>
                            <p id="response-message" class="text-muted"></p>
                            <div class="row">
                              <div class="col-lg-4">
                                <div class="form-group">
                                  <label class="form-control-label">Date: <span class="tx-danger">*</span></label>
                                  <input class="form-control" type="date" id="date">
                                </div>
                              </div>
                              <div class="col-lg-4">
                                <div class="form-group">
                                  <label class="form-control-label">Select Staff: <span class="tx-danger">*</span></label>
                                  <select class="form-control select2" data-placeholder="Choose staff" id="staff_name">
                                    <option value="" selected disabled>Choose one</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-lg-4">
                                <div class="form-group">
                                  <label class="form-control-label">Select Service: <span class="tx-danger">*</span></label>
                                  <select class="form-control select2" data-placeholder="Choose service" id="service_name">
                                    <option value="" selected="" disabled="" >Choose one</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-lg-12 mt-3">
                                <h6 id="choose-am-time" style="display: none;">Choose AM time</h6>
                                <div class="table-responsive">
                                  <table class="table table-hover table-bordered mg-b-0" id="schedule-table-am">
                                  </table>
                                </div>
                              </div>
                              <div class="col-lg-12 mg-t-25">
                                <h6 id="choose-pm-time" style="display: none;">Choose PM time</h6>
                                <div class="table-responsive">
                                  <table class="table table-hover table-bordered mg-b-0" id="schedule-table-pm">
                                  </table>
                                </div>
                              </div>
                                <div class="col-lg-12">
                                    <div class="appoinment_page_input">
                                        <button onclick="Save()" id="save-btn" class="common_btn">bookappoinment</button>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
  FillServiceDropDown();
  async function FillServiceDropDown() {
    let res = await axios.get("/admin/service")
    res.data.data.forEach(function (item, i) {
      let option = `<option value="${item['id']}">${item['name']}</option>`
      $("#service_name").append(option);
    })
  }


  $(document).ready(function() {
    $('#date').on('change', function() {
      var date = $(this).val();
      if (date) {
        $('#staff_name').val('').trigger('change.select2');

        $('#schedule-table-am').empty();
        $('#schedule-table-pm').empty();

        $.ajax({
          url: '/get-staff-by-date',
          type: 'GET',
          data: { date: date },
          success: function(response) {
            var staffSelect = $('#staff_name');
            $('#choose-am-time').hide();
            $('#choose-pm-time').hide();
            staffSelect.empty();
            staffSelect.append('<option value="" selected disabled>Choose one</option>');

            if (response.status === 'success' && response.data.length === 0) {
              errorToast(response.message);
            } else if (response.status === 'success') {
              $.each(response.data, function(key, staff) {
                staffSelect.append('<option value="'+ staff.id +'">'+ staff.name +'</option>');
              });
            } else {
              errorToast(response.message);
            }
          },
          error: function() {
            errorToast("An error occurred while fetching staff.");
          }
        });
      }
    });

    $('#staff_name').on('change', function() {
      var staffId = $(this).val();
      var date = $('#date').val();

      if (staffId && date) {
        $.ajax({
          url: '/get-schedule-time',
          type: 'GET',
          data: { staff_id: staffId, date: date },
          success: function(response) {
            var amTableBody = $('#schedule-table-am');
            var pmTableBody = $('#schedule-table-pm');
            amTableBody.empty();
            pmTableBody.empty();

            if (response.status === 'success' && response.data.length === 0) {
              errorToast("No available times found for the selected staff on this date.");
            } else if (response.status === 'success') {
              var amTimes = [];
              var pmTimes = [];

              $.each(response.data, function(index, timeObj) {
                var time = timeObj.time;
                if (time.includes("am")) {
                  amTimes.push(time);
                } else if (time.includes("pm")) {
                  pmTimes.push(time);
                }
              });


              var amRow = $('<tr>');
              $.each(amTimes, function(index, time) {
                var checked = response.data.some(t => t.time === time) ? 'checked' : '';
                amRow.append('<td><label class="rdiobox"><input type="radio" name="time" value="'+ time +'"><span>'+ time +'</span></label></td>');
              });
              amTableBody.append(amRow);

              var pmRow = $('<tr>');
              $.each(pmTimes, function(index, time) {
                var checked = response.data.some(t => t.time === time) ? 'checked' : '';
                pmRow.append('<td><label class="rdiobox"><input type="radio" name="time" value="'+ time +'"><span>'+ time +'</span></label></td>');
              });
              pmTableBody.append(pmRow);

              if (amTimes.length > 0) {
                $('#choose-am-time').show(); 
              } else {
                $('#choose-am-time').hide(); 
              }

              if (pmTimes.length > 0) {
                $('#choose-pm-time').show(); 
              } else {
                $('#choose-pm-time').hide(); 
              }
            } else {
              errorToast(response.message);
            }
          },
          error: function() {
            errorToast("An error occurred while fetching schedule times.");
          }
        });
      } else {
        $('#schedule-table-am').empty();
        $('#schedule-table-pm').empty();
        $('#choose-am-time').hide();
        $('#choose-pm-time').hide();
      }
    });
  });

  function resetCreateForm() {
    document.getElementById('save-form').reset();
    $('#staff_name').val('').trigger('change.select2');
    $('#customer_name').val('').trigger('change.select2');
    $('#schedule-table-am').empty();
    $('#schedule-table-pm').empty();
    $('#choose-am-time').hide();
    $('#choose-pm-time').hide();
  }

async function Save() {
    let date = document.getElementById('date').value;
    let staff = document.getElementById('staff_name').value;
    let service = document.getElementById('service_name').value;
    let selectedTime = document.querySelector('input[name="time"]:checked')?.value;
    let responseMessage = document.getElementById('response-message');

    if(date.length === 0) {
        responseMessage.textContent = "Date field is required!";
        responseMessage.classList.remove('text-success');
        responseMessage.classList.add('text-danger');
    }
    else if(staff.length === 0) {
        responseMessage.textContent = "Staff field is required!";
        responseMessage.classList.remove('text-success');
        responseMessage.classList.add('text-danger');
    } 
    else if(service.length === 0) {
        responseMessage.textContent = "Service field is required!";
        responseMessage.classList.remove('text-success');
        responseMessage.classList.add('text-danger');
    }  
    else if (!selectedTime) {
        responseMessage.textContent = "A time slot must be selected!"; 
        responseMessage.classList.remove('text-success');
        responseMessage.classList.add('text-danger');
    }
    else {
        let formData = new FormData();
        formData.append('date', date);
        formData.append('user_id', staff);
        formData.append('service_id', service);
        formData.append('time', selectedTime);

        const config = {
            headers: {
                'content-type': 'multipart/form-data',
            },
        };

        try {
            let res = await axios.post("/my-appointment", formData, config);
            if (res.status === 201) {
                responseMessage.textContent = res.data.message || 'Request success';
                responseMessage.classList.remove('text-danger');
                responseMessage.classList.add('text-success');
                resetCreateForm();
                window.location.href = "/appointment"; 
            } else {
                responseMessage.textContent = res.data.message || "Request failed";
                responseMessage.classList.remove('text-success');
                responseMessage.classList.add('text-danger');
            }
        } catch (error) {
            if (error.response) {
                if (error.response.status === 422) {
                    if (error.response.data.message) {
                        responseMessage.textContent = error.response.data.message;
                        responseMessage.classList.remove('text-success');
                        responseMessage.classList.add('text-danger');
                    }
                    if (error.response.data.errors) {
                        let errorMessages = error.response.data.errors;
                        for (let field in errorMessages) {
                            if (errorMessages.hasOwnProperty(field)) {
                                errorMessages[field].forEach(msg => {
                                    responseMessage.textContent += `${msg} `;
                                    responseMessage.classList.remove('text-success');
                                    responseMessage.classList.add('text-danger');
                                });
                            }
                        }
                    }
                } else if (error.response.status === 500) {
                    responseMessage.textContent = error.response.data.error;
                    responseMessage.classList.remove('text-success');
                    responseMessage.classList.add('text-danger');
                } else {
                    responseMessage.textContent = "Request failed!";
                    responseMessage.classList.remove('text-success');
                    responseMessage.classList.add('text-danger');
                }
            } else {
                responseMessage.textContent = "Request failed!";
                responseMessage.classList.remove('text-success');
                responseMessage.classList.add('text-danger');
            }
            console.error(error);
        }
    }
}

</script>
@endsection
