<div id="update-modal" class="modal fade">
  <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content tx-size-sm">
          <div class="modal-header pd-x-20">
              <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Update Schedule</h6>
              <button type="button" id="modal-close" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body pd-20">
              <form id="update-form">
                  <input type="hidden" class="d-none" id="updateID">
                  <div class="form-layout">
                      <div class="row mg-b-25">
                          <div class="col-lg-4">
                              <div class="form-group">
                                  <label class="form-control-label">Date: <span class="tx-danger">*</span></label>
                                  <input class="form-control" type="date" id="update_date">
                              </div>
                          </div>
                          <div class="col-lg-4">
                              <div class="form-group">
                                  <label class="form-control-label">Select Staff: <span class="tx-danger">*</span></label>
                                  <select class="form-control select2" id="update_staff_name">
                                      <option value="" selected disabled>Choose one</option>
                                      
                                  </select>
                              </div>
                          </div>
                          <div class="col-lg-4">
                              <div class="form-group">
                                  <label class="form-control-label">Select Service: <span class="tx-danger">*</span></label>
                                  <select class="form-control select2" id="update_service_name">
                                      <option value="" selected disabled>Choose one</option>

                                  </select>
                              </div>
                          </div>
                          <div class="col-lg-12 mg-t-25">
                              <div class="row mg-b-25">
                                  <div class="col-lg-12">
                                      <div class="form-group">
                                          <label class="form-control-label">Choose AM Time:</label>
                                          <div id="am-time-checkboxes" class="time-checkboxes">
                                              <!-- AM times will be populated dynamically -->
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-lg-12">
                                      <div class="form-group">
                                          <label class="form-control-label">Choose PM Time:</label>
                                          <div id="pm-time-checkboxes" class="time-checkboxes">
                                              <!-- PM times will be populated dynamically -->
                                          </div>
                                      </div>
                                  </div>
                              </div>

                          </div>
                      </div><!-- row -->
                  </div><!-- Form Layout -->
              </form>
          </div><!-- modal-body -->

          <div class="modal-footer">
              <button type="button" onclick="Update()" id="update-btn" class="btn btn-info pd-x-20">Update</button>
              <button type="button" class="btn btn-secondary pd-x-20" id="update-modal-close" data-dismiss="modal">Close</button>
          </div>
      </div>
  </div>
</div>


<script>
  async function FillUpUpdateForm(id) {
      document.getElementById('updateID').value = id;

      await UpdateFillStaffDropDown();
      await UpdateFillServiceDropDown();

      try {
          let res = await axios.get("/admin/staff-schedule/" + id);
          let data = res.data.data;

          document.getElementById('update_date').value = data.date;
          document.getElementById('update_staff_name').value = data.user_id;
          document.getElementById('update_service_name').value = data.service_id;

          populateTimesCheckboxes(data.times);

          setMinDateForUpdate(data.date);
      } catch (error) {
          console.error('Error fetching staff schedule:', error);
      }
  }

  function populateTimesCheckboxes(times) {
      let amCheckboxesContainer = document.getElementById('am-time-checkboxes');
      let pmCheckboxesContainer = document.getElementById('pm-time-checkboxes');

      amCheckboxesContainer.innerHTML = '';
      pmCheckboxesContainer.innerHTML = '';

      let amTimes = ['6am', '6.20am', '6.40am', '7am', '7.20am', '7.40am', '8am', '8.20am', '9.40am', '10am', '10.20am', '10.40am', '11am', '11.20am', '11.40am', '12pm'];
      let pmTimes = ['12.20pm', '12.40pm', '1pm', '1.20pm', '1.40pm', '2pm', '2.20pm', '2.40pm', '3pm', '3.20pm', '3.40pm', '4pm', '4.20pm', '4.40pm', '5pm', '5.20pm', '5.40pm', '6pm', '6.20pm', '7.40pm', '8pm', '8.20pm', '8.40pm', '9pm', '9.20pm', '9.40pm'];

      amTimes.forEach(time => {
          createCheckbox(time, amCheckboxesContainer, times);
      });

      pmTimes.forEach(time => {
          createCheckbox(time, pmCheckboxesContainer, times);
      });
  }

  function createCheckbox(time, container, selectedTimes) {
      let checkbox = document.createElement('input');
      checkbox.type = 'checkbox';
      checkbox.name = 'time[]';
      checkbox.value = time;
      checkbox.id = `time-${time.replace('.', '-')}`;

      let isSelected = selectedTimes.some(timeObj => timeObj.time === time);
      checkbox.checked = isSelected;

      let label = document.createElement('label');
      label.htmlFor = `time-${time.replace('.', '-')}`;
      label.textContent = time;

      let div = document.createElement('div');
      div.classList.add('custom-control', 'custom-checkbox');
      div.appendChild(checkbox);
      div.appendChild(label);

      container.appendChild(div);
  }


  async function UpdateFillStaffDropDown() {
      let res = await axios.get("/get-staff-list");
      let select = document.getElementById('update_staff_name');
      select.innerHTML = '<option value="" selected disabled>Choose one</option>'; 
      res.data.data.forEach(item => {
          let option = `<option value="${item.id}">${item.name}</option>`;
          select.insertAdjacentHTML('beforeend', option);
      });
  }

  async function UpdateFillServiceDropDown() {
      let res = await axios.get("/admin/service");
      let select = document.getElementById('update_service_name');
      select.innerHTML = '<option value="" selected disabled>Choose one</option>'; 
      res.data.data.forEach(item => {
          let option = `<option value="${item.id}">${item.name}</option>`;
          select.insertAdjacentHTML('beforeend', option);
      });
  }

  async function Update() {
      let staff = document.getElementById('update_staff_name').value;
      let service = document.getElementById('update_service_name').value;
      let date = document.getElementById('update_date').value;
      let id = document.getElementById('updateID').value;

      let times = [];
      document.querySelectorAll('input[name="time[]"]:checked').forEach((checkbox) => {
          times.push(checkbox.value);
      });

      if (staff.length === 0) {
          errorToast("Staff field is required!");
      } else if (service.length === 0) {
          errorToast("Service field is required!");
      } else if (date.length === 0) {
          errorToast("Date field is required!");
      } else if (times.length === 0) {
          errorToast("At least one time slot must be selected!");
      } else {
          let payload = {
              user_id: staff,
              service_id: service,
              date: date,
              id: id,
              time: times
          };

          const config = {
              headers: {
                  'Content-Type': 'application/json',
              },
          };

          try {
              let res = await axios.put(`/admin/staff-schedule/${id}`, payload, config);

              if (res.status === 200) {
                  successToast(res.data.message || 'Update Success');
                  document.getElementById('update-form').reset();
                  $('#update-modal').modal('hide');
                  await getList(); 
              } else {
                  errorToast(res.data.message || "Request failed");
              }
          } catch (error) {
              if (error.response && error.response.status === 422) {
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
              } else if (error.response && error.response.status === 404) {
                  errorToast(error.response.data.message || "Resource not found");
              } else if (error.response && error.response.status === 500) {
                  errorToast(error.response.data.error);
              } else {
                  errorToast("Request failed!");
              }
              console.error(error);
          }
      }
  }


  function setMinDateForUpdate(selectedDate = null) {
      const dateInput = document.getElementById('update_date');
      const today = new Date().toISOString().split('T')[0];
      dateInput.min = today;

      if (selectedDate) {
          const selectedDateObj = new Date(selectedDate);
          const selectedDateStr = selectedDateObj.toISOString().split('T')[0];

          if (selectedDateStr < today) {
              const option = document.createElement('option');
              option.value = selectedDateStr;
              option.textContent = selectedDateStr;
              option.selected = true;
              dateInput.appendChild(option);
          }
      }
  }

  $('#update-modal').on('shown.bs.modal', function() {
      const selectedDate = document.getElementById('update_date').value;
      setMinDateForUpdate(selectedDate);
  });
</script>

