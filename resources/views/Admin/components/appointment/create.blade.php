<div id="create-modal" class="modal fade">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content tx-size-sm">
      <div class="modal-header pd-x-20">
        <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Create New Appointment</h6>
        <button type="button" id="modal-close" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body pd-20">
        <form id="save-form">
          <div class="form-layout">
            <div class="row mg-b-25">
              <div class="col-lg-3">
                <div class="form-group">
                  <label class="form-control-label">Date: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="date" id="date">
                </div>
              </div>
              <div class="col-lg-3">
                <div class="form-group">
                  <label class="form-control-label">Select Staff: <span class="tx-danger">*</span></label>
                  <select class="form-control select2" data-placeholder="Choose staff" id="staff_name">
                    <option value="" selected disabled>Choose one</option>
                  </select>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="form-group">
                  <label class="form-control-label">Select Service: <span class="tx-danger">*</span></label>
                  <select class="form-control select2" data-placeholder="Choose service" id="service_name">
                    <option value="" selected="" disabled="" >Choose one</option>
                  </select>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="form-group">
                  <label class="form-control-label">Select Customer: <span class="tx-danger">*</span></label>
                  <select class="form-control select2" data-placeholder="Choose customer" id="customer_name">
                    <option value="" selected disabled>Choose one</option>
                  </select>
                </div>
              </div>
              <div class="col-lg-12 mg-t-25">
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
            </div><!-- row -->
          </div><!-- Form Layout -->
        </form>
      </div><!-- modal-body -->

      <div class="modal-footer">
        <button onclick="Save()" id="save-btn" class="btn btn-info pd-x-20">Save Appointment</button>
        <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script>
  FillCustomerDropDown();
  FillServiceDropDown();

  async function FillCustomerDropDown() {
    try {
      let res = await axios.get("/get-customer-list");
      if (res.data.status === 'success') {
        if (res.data.data.length === 0) {
          errorToast('No customer found');
        } else {
          res.data.data.forEach(function (item, i) {
            let option = `<option value="${item['id']}">${item['name']}</option>`;
            $("#customer_name").append(option);
          });
        }
      } else {
        errorToast(res.data.message);
      }
    } catch (error) {
      if (error.response && error.response.data) {
        errorToast(error.response.data.message);
      } else {
        errorToast("An error occurred while fetching customers.");
      }
    }
  }

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
              errorToast("Staff not Found!");
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

  $('#create-modal').on('hide.bs.modal', function (e) {
    resetCreateForm();
  });

  async function Save() {
    let date = document.getElementById('date').value;
    let staff = document.getElementById('staff_name').value;
    let service = document.getElementById('service_name').value;
    let customer = document.getElementById('customer_name').value;
    let selectedTime = document.querySelector('input[name="time"]:checked')?.value;

    if(date.length === 0) {
      errorToast("Date field is required!");
    }
    else if(staff.length === 0) {
      errorToast("Staff field is required!");
    } 
    else if(service.length === 0) {
      errorToast("Service field is required!");
    } 
    else if(customer.length === 0) {
      errorToast("Customer field is required!");
    } 
    else if (!selectedTime) {
      errorToast("A time slot must be selected!"); 
    }
    else {

      showLoader();

      let formData = new FormData();
      formData.append('date', date);
      formData.append('user_id', staff);
      formData.append('service_id', service);
      formData.append('customer_id', customer);
      formData.append('time', selectedTime);

      const config = {
        headers: {
          'content-type': 'multipart/form-data',
        },
      };

      try {
        let res = await axios.post("/admin/customer-appointment", formData, config);
        if (res.status === 201) {
          successToast(res.data.message || 'Request success');
          resetCreateForm();
          $('#create-modal').modal('hide');
          await getList(); 
        } else {
          errorToast(res.data.message || "Request failed");
        }
      } catch (error) {
        if (error.response) {
          if (error.response.status === 422) {
            if (error.response.data.message) {
              errorToast(error.response.data.message);
            }
            if (error.response.data.errors) {
              let errorMessages = error.response.data.errors;
              for (let field in errorMessages) {
                if (errorMessages.hasOwnProperty(field)) {
                  errorMessages[field].forEach(msg => errorToast(msg));
                }
              }
            }
          } else if (error.response.status === 500) {
            errorToast(error.response.data.error);
          } else {
            errorToast("Request failed!");
          }
        } else {
          errorToast("Request failed!");
        }
        console.error(error);
      }

      hideLoader();
    }
  }
</script>
