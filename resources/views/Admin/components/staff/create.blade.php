<div id="create-modal" class="modal fade">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content tx-size-sm">
            <div class="modal-header pd-x-20">
                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Create New Staff</h6>
                <button type="button" id="modal-close" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body pd-20" style="width: 400px;">
                <form id="save-form">

                    <div class="form-group mg-b-10-force">
                        <label class="form-control-label">Select User: <span class="tx-danger">*</span></label>
                        <select class="form-control" id="user_lists">
                        </select>

                    </div>

                    <div class="form-group mg-b-10-force">
                        <label class="form-control-label">Phone: <span class="tx-danger">*</span></label>
                        <input type="text" id="phone" class="form-control">
                    </div>

                    <div class="form-group mg-b-10-force">
                        <label class="form-control-label">Addres: <span class="tx-danger">*</span></label>
                        <input type="email" id="address" class="form-control">
                    </div>

                    <div class="form-group mg-b-10-force">
                        <label class="form-control-label">Information: <span class="tx-danger">*</span></label>
                        <textarea id="information" cols="30" rows="10" class="form-control"
                            placeholder="Write about the staff specifications"></textarea>
                    </div>

                    <div class="form-group mg-b-10-force">
                        <label class="form-control-label">Services: <span class="tx-danger">*</span></label>
                        <select id="services" class="form-control" multiple="multiple">
                        </select>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button onclick="Save()" id="save-btn" class="btn btn-info pd-x-20">Save</button>
                <button class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<script>
    load_users();
    load_services();
    async function load_users() {
        let res = await axios.get('/admin/all-users');

        if (res.status == 200 && res.data.status == 'success') {
            let users = res.data.data;

            // console.log(users)
            let row = '<option value="" selected>Select User </option>';
            res.data.data.forEach((user, index) => {
                row += `<option value="${user['id']}">${user['name']}</option>`
            });
            document.getElementById("user_lists").innerHTML = row;
        } else {
            console.log("Failed to retrive user")
        }
    }

    async function load_services(input_id = null) {
        let res = await axios.get('/admin/service/');

        if (res.status == 200 && res.data.status == 'success') {

            // console.log(users)
            let row = '';
            res.data.data.forEach((service, index) => {
                row += `<option value="${service['id']}">${service['name']}</option>`
            });

            if (input_id !== null) {
                document.getElementById(`${input_id}`).innerHTML = row;
                jQuery(`#${input_id}`).select2({
                    dropdownParent: $('#update-modal'),
                    width: '100%'
                });
            } else {
                // console.log(row)
                document.getElementById("services").innerHTML = row;
                jQuery('#services').select2({
                    dropdownParent: $('#create-modal'),
                    width: '100%'
                });
            }



        } else {
            console.log("Failed to retrive user")
        }
    }

    async function Save() {
        let user = document.getElementById('user_lists').value;
        let phone = document.getElementById('phone').value;
        let address = document.getElementById('address').value;
        let information = document.getElementById('information').value;
        let services = $("#services").val();

        if (user.length === 0) {
            errorToast("Select an user first!");
        } else if (phone.length === 0) {
            errorToast("Phone Number field is required");
        } else if (address.length === 0) {
            errorToast("Address field is required");
        } else if (information.length === 0) {
            errorToast("Information field is required");
        } else if (services === null) {
            errorToast("Services field is required");
        } else {
            showLoader();

            let res = await axios.post('/admin/staff', {
                user_id: user,
                phone,
                address,
                info: information,
                services
            });

            if (res.status === 200 && res.data['status'] === 'success') {
                successToast(res.data['message']);
                await getList();
            } else {
                errorToast(res.data['message']);
            }

            close_create_modal();

            reset_form("save-form");


            hideLoader();
        }
    }
</script>
