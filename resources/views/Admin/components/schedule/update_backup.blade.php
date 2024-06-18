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

                      <tr>
                        <th scope="row">2</th>
                        <td>
                          <label class="ckbox">
                            <input type="checkbox" name="time[]"  value="7am"><span>7am</span>
                          </label>
                        </td>
                        <td>
                          <label class="ckbox">
                            <input type="checkbox" name="time[]"  value="7.20am"><span>7.20am</span>
                          </label>
                        </td>
                        <td>
                          <label class="ckbox">
                            <input type="checkbox" name="time[]"  value="7.40am"><span>7.40am</span>
                          </label>
                        </td>
                      </tr>

                      <tr>
                        <th scope="row">3</th>
                        <td>
                          <label class="ckbox">
                            <input type="checkbox" name="time[]"  value="8am"><span>8am</span>
                          </label>
                        </td>
                        <td>
                          <label class="ckbox">
                            <input type="checkbox" name="time[]"  value="8.20am"><span>8.20am</span>
                          </label>
                        </td>
                        <td>
                          <label class="ckbox">
                            <input type="checkbox" name="time[]"  value="8.40am"><span>8.40am</span>
                          </label>
                        </td>
                      </tr>

                      <tr>
                        <th scope="row">4</th>
                        <td>
                          <label class="ckbox">
                            <input type="checkbox" name="time[]"  value="9am"><span>9am</span>
                          </label>
                        </td>
                        <td>
                          <label class="ckbox">
                            <input type="checkbox" name="time[]"  value="9.20am"><span>9.20am</span>
                          </label>
                        </td>
                        <td>
                          <label class="ckbox">
                            <input type="checkbox" name="time[]"  value="9.40am"><span>9.40am</span>
                          </label>
                        </td>
                      </tr>

                      <tr>
                        <th scope="row">5</th>
                        <td>
                          <label class="ckbox">
                            <input type="checkbox" name="time[]"  value="10am"><span>10am</span>
                          </label>
                        </td>
                        <td>
                          <label class="ckbox">
                            <input type="checkbox" name="time[]"  value="10.20am"><span>10.20am</span>
                          </label>
                        </td>
                        <td>
                          <label class="ckbox">
                            <input type="checkbox" name="time[]"  value="10.40am"><span>10.40am</span>
                          </label>
                        </td>
                      </tr>

                      <tr>
                        <th scope="row">6</th>
                        <td>
                          <label class="ckbox">
                            <input type="checkbox" name="time[]"  value="11am"><span>11am</span>
                          </label>
                        </td>
                        <td>
                          <label class="ckbox">
                            <input type="checkbox" name="time[]"  value="11.20am"><span>11.20am</span>
                          </label>
                        </td>
                        <td>
                          <label class="ckbox">
                            <input type="checkbox" name="time[]"  value="11.40am"><span>11.40am</span>
                          </label>
                        </td>
                      </tr>

                    </tbody>
                  </table>
                </div>
              </div>
              <div class="col-lg-12 mg-t-25">
                <h6>Choose PM time</h6>
                <div class="table-responsive">
                  <table class="table table-hover table-bordered mg-b-0">
                    <tbody>
                      <tr>
                        <th scope="row">7</th>
                        <td>
                          <label class="ckbox">
                            <input type="checkbox" name="time[]"  value="12pm"><span>12pm</span>
                          </label>
                        </td>
                        <td>
                          <label class="ckbox">
                            <input type="checkbox" name="time[]"  value="12.20pm"><span>12.20pm</span>
                          </label>
                        </td>
                        <td>
                          <label class="ckbox">
                            <input type="checkbox" name="time[]"  value="12.40pm"><span>12.40pm</span>
                          </label>
                        </td>
                      </tr>

                      <tr>
                        <th scope="row">8</th>
                        <td>
                          <label class="ckbox">
                            <input type="checkbox" name="time[]"  value="1pm"><span>1pm</span>
                          </label>
                        </td>
                        <td>
                          <label class="ckbox">
                            <input type="checkbox" name="time[]"  value="1.20pm"><span>1.20pm</span>
                          </label>
                        </td>
                        <td>
                          <label class="ckbox">
                            <input type="checkbox" name="time[]"  value="1.40pm"><span>1.40pm</span>
                          </label>
                        </td>
                      </tr>

                      <tr>
                        <th scope="row">9</th>
                        <td>
                          <label class="ckbox">
                            <input type="checkbox" name="time[]"  value="2pm"><span>2pm</span>
                          </label>
                        </td>
                        <td>
                          <label class="ckbox">
                            <input type="checkbox" name="time[]"  value="2.20pm"><span>2.20pm</span>
                          </label>
                        </td>
                        <td>
                          <label class="ckbox">
                            <input type="checkbox" name="time[]"  value="2.40pm"><span>2.40pm</span>
                          </label>
                        </td>
                      </tr>

                      <tr>
                        <th scope="row">10</th>
                        <td>
                          <label class="ckbox">
                            <input type="checkbox" name="time[]"  value="3pm"><span>3pm</span>
                          </label>
                        </td>
                        <td>
                          <label class="ckbox">
                            <input type="checkbox" name="time[]"  value="3.20pm"><span>3.20pm</span>
                          </label>
                        </td>
                        <td>
                          <label class="ckbox">
                            <input type="checkbox" name="time[]"  value="3.40pm"><span>3.40pm</span>
                          </label>
                        </td>
                      </tr>

                      <tr>
                        <th scope="row">11</th>
                        <td>
                          <label class="ckbox">
                            <input type="checkbox" name="time[]"  value="4pm"><span>4pm</span>
                          </label>
                        </td>
                        <td>
                          <label class="ckbox">
                            <input type="checkbox" name="time[]"  value="4.20pm"><span>4.20pm</span>
                          </label>
                        </td>
                        <td>
                          <label class="ckbox">
                            <input type="checkbox" name="time[]"  value="4.40pm"><span>4.40pm</span>
                          </label>
                        </td>
                      </tr>

                      <tr>
                        <th scope="row">12</th>
                        <td>
                          <label class="ckbox">
                            <input type="checkbox" name="time[]"  value="5pm"><span>5pm</span>
                          </label>
                        </td>
                        <td>
                          <label class="ckbox">
                            <input type="checkbox" name="time[]"  value="5.20pm"><span>5.20pm</span>
                          </label>
                        </td>
                        <td>
                          <label class="ckbox">
                            <input type="checkbox" name="time[]"  value="5.40pm"><span>5.40pm</span>
                          </label>
                        </td>
                      </tr>

                      <tr>
                        <th scope="row">13</th>
                        <td>
                          <label class="ckbox">
                            <input type="checkbox" name="time[]"  value="6pm"><span>6pm</span>
                          </label>
                        </td>
                        <td>
                          <label class="ckbox">
                            <input type="checkbox" name="time[]"  value="6.20pm"><span>6.20pm</span>
                          </label>
                        </td>
                        <td>
                          <label class="ckbox">
                            <input type="checkbox" name="time[]"  value="6.40pm"><span>6.40pm</span>
                          </label>
                        </td>
                      </tr>

                      <tr>
                        <th scope="row">14</th>
                        <td>
                          <label class="ckbox">
                            <input type="checkbox" name="time[]"  value="7pm"><span>7pm</span>
                          </label>
                        </td>
                        <td>
                          <label class="ckbox">
                            <input type="checkbox" name="time[]"  value="7.20pm"><span>7.20pm</span>
                          </label>
                        </td>
                        <td>
                          <label class="ckbox">
                            <input type="checkbox" name="time[]"  value="7.40pm"><span>7.40pm</span>
                          </label>
                        </td>
                      </tr>

                      <tr>
                        <th scope="row">15</th>
                        <td>
                          <label class="ckbox">
                            <input type="checkbox" name="time[]"  value="8pm"><span>8pm</span>
                          </label>
                        </td>
                        <td>
                          <label class="ckbox">
                            <input type="checkbox" name="time[]"  value="8.20pm"><span>8.20pm</span>
                          </label>
                        </td>
                        <td>
                          <label class="ckbox">
                            <input type="checkbox" name="time[]"  value="8.40pm"><span>8.40pm</span>
                          </label>
                        </td>
                      </tr>

                      <tr>
                        <th scope="row">16</th>
                        <td>
                          <label class="ckbox">
                            <input type="checkbox" name="time[]"  value="9pm"><span>9pm</span>
                          </label>
                        </td>
                        <td>
                          <label class="ckbox">
                            <input type="checkbox" name="time[]"  value="9.20pm"><span>9.20pm</span>
                          </label>
                        </td>
                        <td>
                          <label class="ckbox">
                            <input type="checkbox" name="time[]"  value="9.40pm"><span>9.40pm</span>
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

console.log('-------',staff);
console.log('-------',service);
console.log('-------',date);
console.log('-------',id);

    if (staff.length === 0) {
        errorToast("Staff field is required!");
    } else if (service.length === 0) {
        errorToast("Service field is required!");
    } else if (date.length === 0) {
        errorToast("Date field is required!");
    } else if (times.length === 0) {
        errorToast("At least one time slot must be selected!");  // Ensure this line is correctly reached
    } else {
        let formData=new FormData();
        formData.append('user_id', staff);
        formData.append('service_id', service);
        formData.append('date', date);
        times.forEach((time, index) => {
            formData.append(`time[${index}]`, time);
        });

console.log('-------',formData);
        const config = {
            headers: {
                'content-type': 'multipart/form-data',
            },
        };

        try {
            let res = await axios.put(`/admin/staff-schedule/${id}`, formData, config);
            if (res.status === 200) {
                successToast(res.data.message || 'Request completed');
                document.getElementById('update-form').reset();
                await getList();
                document.getElementById('modal-close').click();
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