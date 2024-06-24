<div id="create-modal" class="modal fade">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content tx-size-sm">
            <div class="modal-header pd-x-20">
                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Create New User</h6>
                <button type="button" id="modal-close" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body pd-20" style="width: 400px;">
                <form id="save-form">

                    <div class="form-group mg-b-10-force">
                        <label class="form-control-label">Name: <span class="tx-danger">*</span></label>
                        <input type="text" id="name" class="form-control">
                    </div>

                    <div class="form-group mg-b-10-force">
                        <label class="form-control-label">Email: <span class="tx-danger">*</span></label>
                        <input type="email" id="email" class="form-control">
                    </div>

                    <div class="form-group mg-b-10-force">
                        <label class="form-control-label">Select Role: <span class="tx-danger">*</span></label>
                        <select class="form-control" id="role">
                            <option value="admin">Admin</option>
                            <option value="staff">Staff</option>
                            <option value="customer" selected>Customer</option>
                        </select>

                    </div>

                    <div class="form-group mg-b-10-force">
                        <label class="form-control-label">Password: <span class="tx-danger">*</span></label>
                        <input type="password" id="password" class="form-control">
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
    async function Save() {

        let name = document.getElementById('name').value;
        let email = document.getElementById('email').value;
        let role = document.getElementById('role').value;
        let password = document.getElementById('password').value;

        if (name.length === 0) {
            errorToast("Name is required");
        } else if (email.length === 0) {
            errorToast("Email is required");
        } else if (role.length === 0) {
            errorToast("Role is required");
        } else if (password.length === 0) {
            errorToast("Password is required");
        } else {
            showLoader();

            let res = await axios.post('/admin/user', {
                name,
                email,
                role,
                password
            });

            if (res.status === 200 && res.data['status'] === 'success') {
                successToast(res.data['message']);
            } else {
                errorToast(res.data['message']);
            }
            
            $('#create-modal').modal('hide');

            $("#save-form").

            // await getList();

            hideLoader();
        }


    }
</script>
