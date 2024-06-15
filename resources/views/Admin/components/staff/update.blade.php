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
                        <input type="text" class="d-none" id="user_id">

                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Select User: <span class="tx-danger">*</span></label>
                            <input type="text" id="user_name" class="form-control">

                        </div>

                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Phone: <span class="tx-danger">*</span></label>
                            <input type="text" id="staff_phone" class="form-control">
                        </div>

                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Addres: <span class="tx-danger">*</span></label>
                            <input type="email" id="staff_address" class="form-control">
                        </div>

                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Information: <span class="tx-danger">*</span></label>
                            <textarea id="staff_information" cols="30" rows="10" class="form-control"
                                placeholder="Write about the staff specifications"></textarea>
                        </div>

                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Services: <span class="tx-danger">*</span></label>
                            <select id="staff_services" class="form-control" multiple="multiple">
                            </select>
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


@push('scripts')
    <script>
        async function FillUpUpdateForm(id) {
            document.getElementById('updateID').value = id;

            let res = await axios.get("/admin/staff/" + id);
            // console.log(res)

            if (res.status == 200 && res.data.status == 'success') {

                let staff = res.data.data;
                let user_name = document.getElementById("user_name");
                user_name.value = staff['user']['name'];
                user_name.setAttribute('disabled', true);

                document.getElementById("user_id").value = staff['user_id'];
                document.getElementById("staff_phone").value = staff['phone'];
                document.getElementById("staff_address").value = staff['address'];
                document.getElementById("staff_information").value = staff['info'];
                await load_services("staff_services");

                let selected_services = staff.services.map(service => service.id);
                $('#staff_services').val(selected_services);
                $('#staff_services').select2({
                    dropdownParent: $('#update-modal'),
                    width: '100%'
                }).trigger('change');



            } else {
                alert('Something went wrong');
            }
        }

        async function update() {

            showLoader();

            let id = document.getElementById('updateID').value;
            let phone = document.getElementById('staff_phone').value;
            let address = document.getElementById('staff_address').value;
            let info = document.getElementById('staff_information').value;
            let services = $("#staff_services").val();

            let res = await axios.post('/admin/staff/' + id, {
                _method: 'PATCH',
                phone,
                address,
                info,
                services
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
@endpush
