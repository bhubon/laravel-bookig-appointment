<!-- LARGE MODAL -->
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
          <div class="form-layout">
            <div class="row mg-b-25">

              <input type="text" class="d-none" id="updateID">
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Date: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="date" id="update_date">
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Select Staff: <span class="tx-danger">*</span></label>
                  <select class="form-control select2" data-placeholder="Choose staff" id="update_staff_name">
                    <option value="" selected="" disabled="" >Choose one</option>

                  </select>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Select Service: <span class="tx-danger">*</span></label>
                  <select class="form-control select2" data-placeholder="Choose service" id="update_service_name">
                    <option value="" selected="" disabled="" >Choose one</option>

                  </select>
                </div>
              </div>
              <div class="col-lg-12 mg-t-25">
                <h6>Choose AM time</h6>
                <div class="table-responsive">
                  <table class="table table-hover table-bordered mg-b-0">
                    <tbody>
                      <tr>
                        <th scope="row">1</th>
                        <td>
                          <label class="ckbox">
                            <input type="checkbox" name="time[]"  value="6am"><span>6am</span>
                          </label>
                        </td>
                        <td>
                          <label class="ckbox">
                            <input type="checkbox" name="time[]"  value="6.20am"><span>6.20am</span>
                          </label>
                        </td>
                        <td>
                          <label class="ckbox">
                            <input type="checkbox" name="time[]"  value="6.40am"><span>6.40am</span>
                          </label>
                        </td>
                      </tr>

                    </tbody>
                  </table>
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
    async function UpdateFillStaffDropDown() {
        let res = await axios.get("/admin/staffList");
        res.data.data.forEach(function (item, i) {
            let option = `<option value="${item['id']}">${item['name']}</option>`;
            $("#update_staff_name").append(option);
        });
    }

    async function UpdateFillServiceDropDown() {
        let res = await axios.get("/admin/service");
        res.data.data.forEach(function (item, i) {
            let option = `<option value="${item['id']}">${item['name']}</option>`;
            $("#update_service_name").append(option);
        });
    }

    async function FillUpUpdateForm(id) {
        document.getElementById('updateID').value = id;

        await UpdateFillStaffDropDown();
        await UpdateFillServiceDropDown();

        try {
            let res = await axios.get("/admin/staff-schedule/" + id);
            let data = res.data.data;

            // Set the date, staff, and service fields
            document.getElementById('update_date').value = data.date;
            document.getElementById('update_staff_name').value = data.user_id;
            document.getElementById('update_service_name').value = data.service_id;

            // Reset and populate checkboxes
            resetCheckboxes();
            checkTimes(data.times);
        } catch (error) {
            console.error('Error fetching staff schedule:', error);
        }
    }

    function resetCheckboxes() {
        document.querySelectorAll('input[name="time[]"]').forEach(checkbox => {
            checkbox.checked = false;
        });
    }

    function checkTimes(times) {
        const timesSet = new Set(times.map(time => time.time));
        document.querySelectorAll('input[name="time[]"]').forEach(checkbox => {
            if (timesSet.has(checkbox.value)) {
                checkbox.checked = true;
            }
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
        let formData = new FormData();
        formData.append('user_id', staff);
        formData.append('service_id', service);
        formData.append('date', date);
        formData.append('id', id);
        times.forEach((time, index) => {
            formData.append(`time[${index}]`, time);
        });

        const config = {
            headers: {
                'Content-Type': 'multipart/form-data',
            },
        };

        try {
            //let res = await axios.put(`/admin/staff-schedule/${id}`, formData, config);
            let res = await axios.post("/admin/update-schedule",formData,config)
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




</script>