<!-- LARGE MODAL -->
<div id="update-modal" class="modal fade">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content tx-size-sm">
            <div class="modal-header pd-x-20">
                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Create New</h6>
                <button type="button" id="modal-close" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body pd-20" style="width: 400px;">
                <form id="update-form">
                    <div class="form-layout">

                        <input type="text" class="d-none" id="updateID">

                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Name: <span class="tx-danger">*</span></label>
                            <input type="text" id="user_name" class="form-control" value="">
                        </div>

                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Email: <span class="tx-danger">*</span></label>
                            <input type="email" id="user_email" class="form-control">
                        </div>

                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Select Role: <span class="tx-danger">*</span></label>
                            <select class="form-control" id="user_role">
                                <option value="admin">Admin</option>
                                <option value="staff">Staff</option>
                                <option value="customer" selected>Customer</option>
                            </select>

                        </div>

                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Password: <span class="tx-danger">*</span></label>
                            <input type="password" id="user_password" class="form-control">
                        </div>


                    </div><!-- Form Layout -->
                </form>
            </div><!-- modal-body -->

            <div class="modal-footer">
                <button onclick="update()" id="update-btn" class="btn btn-info pd-x-20">Save changes</button>
                <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>



<script>
    async function FillUpUpdateForm(id) {
        document.getElementById('updateID').value = id;

        let res = await axios.get("/admin/user/" + id);
        // console.log(res)

        if (res.status == 200 && res.data.status == 'success') {

            let user = res.data.data;

            let email = document.getElementById('user_email');
            document.getElementById('user_name').value = user.name;
            email.value = user.email;
            document.getElementById('user_role').value = user.role;

            if (user.role == 'admin') {
                email.setAttribute('disabled', true);
            } else {
                email.removeAttribute('disabled');
            }


        } else {
            alert('Something went wrong');
        }
    }

    async function update() {

        showLoader();

        let id = document.getElementById('updateID').value;
        let name = document.getElementById('user_name').value;
        let email = document.getElementById('user_email').value;
        let role = document.getElementById('user_role').value;
        let password = document.getElementById('user_password').value;

        let res = await axios.post('/admin/user/' + id, {
            _method: 'PATCH',
            name,
            email,
            role,
            password,
        });

        // console.log(res)

        if (res.status === 200 && res.data['status'] === 'success') {
            getList();
            close_update_modal();
            reset_form("update-form");
            hideLoader();
            successToast(res.data['message']);
        } else {
            errorToast(res.data['message']);
        }
    }
</script>
