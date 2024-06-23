<div id="update-modal" class="modal fade">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content tx-size-sm">
            <div class="modal-header pd-x-20">
                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Update Appointment</h6>
                <button type="button" id="modal-close" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body pd-20">
                <form id="update-form">
                    <input type="hidden" class="d-none" id="updateID">
                    <div class="form-layout">
                        <div class="row mg-b-25">
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label class="form-control-label">Date: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="date" id="update_date">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label class="form-control-label">Select Staff: <span class="tx-danger">*</span></label>
                                    <select class="form-control select2" data-placeholder="Choose staff" id="update_staff_name">
                                        <option value="" selected disabled>Choose one</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label class="form-control-label">Select Service: <span class="tx-danger">*</span></label>
                                    <select class="form-control select2" data-placeholder="Choose service" id="update_service_name">
                                        <option value="" selected disabled>Choose one</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label class="form-control-label">Select Customer: <span class="tx-danger">*</span></label>
                                    <select class="form-control select2" data-placeholder="Choose customer" id="update_customer_name">
                                        <option value="" selected disabled>Choose one</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12 mg-t-25">
                                <h6 id="choose-am-time" style="display: none;">Choose AM time</h6>
                                <div id="am-time-container" class="time-container">
                                    <!-- AM Time slots with radio buttons will be dynamically added here -->
                                </div>
                            </div>
                            <div class="col-lg-12 mg-t-25">
                                <h6 id="choose-pm-time" style="display: none;">Choose PM time</h6>
                                <div id="pm-time-container" class="time-container">
                                    <!-- PM Time slots with radio buttons will be dynamically added here -->
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
    async function FillUpUpdateForm(id, date) {
        try {
            let appointment = await axios.get(`/admin/customer-appointment/${id}`);
            let formData = appointment.data.data;

            $('#updateID').val(formData.id);
            $('#update_date').val(formData.appointment_date);
            $('#update_customer_name').val(formData.customer_id).trigger('change.select2');
            $('#update_service_name').val(formData.service_id).trigger('change.select2');

            await getStaffByDateAndUpdate(date, formData.user_id);
            await UpdateFillServiceDropDown(formData.service_id);
            await UpdateFillCustomerDropDown(formData.customer_id);
            await getScheduleTimeAndUpdate(formData.user_id, date, formData.appointment_time);
            setMinDateForUpdate(formData.appointment_date);
        } catch (error) {
            console.error(error);
            errorToast("Failed to fetch appointment details.");
        }
    }

    async function getStaffByDateAndUpdate(date, selectedStaffId = null) {
        try {
            let response = await axios.get("/get-staff-by-date", { params: { date: date } });
            let staffSelect = $('#update_staff_name');
            staffSelect.empty();
            staffSelect.append('<option value="" selected disabled>Choose one</option>');
            if (response.data.status === 'success') {
                response.data.data.forEach(function (staff) {
                    let option = `<option value="${staff.id}" ${staff.id == selectedStaffId ? 'selected' : ''}>${staff.name}</option>`;
                    staffSelect.append(option);
                });
            } else {
                errorToast(response.data.message);
            }
        } catch (error) {
            console.error(error);
            errorToast("Failed to fetch staff list.");
        }
    }


    async function getScheduleTimeAndUpdate(staffId, date, selectedTime) {
        try {
            let response = await axios.get("/get-update-schedule-time", { params: { staff_id: staffId, date: date } });

            let amContainer = $('#am-time-container');
            let pmContainer = $('#pm-time-container');
            amContainer.empty(); 
            pmContainer.empty(); 

            if (response.data.status === 'success') {
                let amTimes = [];
                let pmTimes = [];

                response.data.data.forEach(function (timeObj) {
                    let time = timeObj.time;
                    if (time.includes("am")) {
                        amTimes.push(timeObj);
                    } else if (time.includes("pm")) {
                        pmTimes.push(timeObj);
                    }
                });

                if (amTimes.length > 0) {
                    $('#choose-am-time').show(); 
                    amTimes.forEach(function (timeObj) {
                        let checked = (timeObj.time === selectedTime) ? 'checked' : '';
                        let radioInput = `<label class="rdiobox">
                        <input type="radio" name="update_time" value="${timeObj.time}" ${checked}>
                        <span>${timeObj.time}</span>
                        </label>`;
                        amContainer.append(`<div class="mg-b-10">${radioInput}</div>`); 
                    });
                } else {
                    $('#choose-am-time').hide(); 
                }

                if (pmTimes.length > 0) {
                    $('#choose-pm-time').show(); 
                    pmTimes.forEach(function (timeObj, index) {
                        let checked = (timeObj.time === selectedTime) ? 'checked' : '';
                        let radioInput = `<label class="rdiobox">
                        <input type="radio" name="update_time" value="${timeObj.time}" ${checked}>
                        <span>${timeObj.time}</span>
                        </label>`;
                        pmContainer.append(`<div class="mg-b-10">${radioInput}</div>`); 


                        if (index % 4 === 0 && index !== 0) {
                            pmContainer.append('<div class="w-100"></div>'); 
                        }
                    });
                } else {
                    $('#choose-pm-time').hide(); 
                }
            } else {
                errorToast(response.data.message);
            }
        } catch (error) {
            console.error(error);
            errorToast("Failed to fetch schedule times.");
        }
    }

    async function UpdateFillCustomerDropDown(selectedCustomerId = null) {
        try {
            let res = await axios.get("/get-customer-list");
            let select = $('#update_customer_name');
            select.empty();
            select.append('<option value="" selected disabled>Choose one</option>'); 

            if (res.data.status === 'success' && res.data.data.length === 0) {
                errorToast("No customer found");
            } else if (res.data.status === 'success') {
                res.data.data.forEach(item => {
                    let option = `<option value="${item.id}" ${item.id == selectedCustomerId ? 'selected' : ''}>${item.user.name}</option>`;
                    select.append(option);
                });
            } else {
                errorToast(res.data.message);
            }
        } catch (error) {
            console.error(error);
            if (error.response && error.response.data) {
                errorToast(error.response.data.message);
            } else {
                errorToast("An error occurred while fetching customers.");
            }
        }
    }

    async function UpdateFillServiceDropDown(selectedServiceId = null) {
        try {
            let res = await axios.get("/admin/service");
            let select = $('#update_service_name');
            select.empty();
            select.append('<option value="" selected disabled>Choose one</option>'); 

            res.data.data.forEach(item => {
                let option = `<option value="${item.id}" ${item.id == selectedServiceId ? 'selected' : ''}>${item.name}</option>`;
                select.append(option);
            });
        } catch (error) {
            console.error(error);
            errorToast("An error occurred while fetching services.");
        }
    }

    async function Update() {
        let appointmentId = document.getElementById('updateID').value;
        let date = document.getElementById('update_date').value;
        let staff = document.getElementById('update_staff_name').value;
        let service = document.getElementById('update_service_name').value;
        let customer = document.getElementById('update_customer_name').value;
        let selectedTime = document.querySelector('input[name="update_time"]:checked')?.value;

        if (date.length === 0) {
            errorToast("Date field is required!");
        } else if (staff.length === 0) {
            errorToast("Staff field is required!");
        } else if (service.length === 0) {
            errorToast("Service field is required!");
        } else if (customer.length === 0) {
            errorToast("Customer field is required!");
        } else if (!selectedTime) {
            errorToast("A time slot must be selected!");
        } else {

            let payload = {
                date: date,
                user_id: staff,
                service_id: service,
                customer_id: customer,
                time: selectedTime
            };

            const config = {
                headers: {
                    'Content-Type': 'application/json',
                },
            };

            try {
                let res = await axios.put(`/admin/customer-appointment/${appointmentId}`, payload, config);
                if (res.status === 200) {
                    successToast(res.data.message || 'Update successful');
                    resetUpdateForm();
                    $('#update-modal').modal('hide');
                    await getList();
                } else {
                    errorToast(res.data.message || "Update failed");
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
                        errorToast("Update failed!");
                    }
                } else {
                    errorToast("Update failed!");
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
        resetUpdateForm();
        const selectedDate = document.getElementById('update_date').value;
        setMinDateForUpdate(selectedDate);
    });

    function resetUpdateForm() {
        document.getElementById('update-form').reset();
    }

</script>


<style type="text/css">
    .time-container {
        display: flex;
        flex-wrap: wrap;
        gap: 10px; 
    }

    .time-container > div {
        flex: 0 0 25%; 
        max-width: 25%;
        padding-right: 10px;
    }

    .rdiobox {
        display: flex;
        align-items: center;
    }

    .rdiobox input[type="radio"] {
        margin-right: 5px; 
    }


</style>




