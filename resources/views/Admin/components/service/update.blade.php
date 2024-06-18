<!-- LARGE MODAL -->
<div id="update-modal" class="modal fade">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content tx-size-sm">
            <div class="modal-header pd-x-20">
                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Update Service</h6>
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
                                    <label class="form-control-label">Service Name: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" id="update_name">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Service Duration: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" id="update_duration">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Service Price: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" id="update_price">
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label">Service Description: <span class="tx-danger">*</span></label>
                                    <textarea class="form-control summernote" id="update_description" placeholder="Enter description"></textarea>
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
        let res = await axios.get("/admin/service/" + id);
        let data = res.data.data;
// Set the date, staff, and service fields
        document.getElementById('update_name').value = data.name;
        document.getElementById('update_duration').value = data.duration;
        document.getElementById('update_price').value = data.price;
        $('#update_description').summernote('code', data['description']);
    }


    async function Update() {
        let name = document.getElementById('update_name').value;
        let duration = document.getElementById('update_duration').value;
        let price = document.getElementById('update_price').value;
        let description= document.getElementById('update_description').value;
        let id = document.getElementById('updateID').value;

        if (name.length === 0) {
            errorToast("Name field is required!");
        } 
        else if (duration.length === 0) {
            errorToast("Duration field is required!");
        } 
        else if (price.length === 0) {
            errorToast("Price field is required!");
        } 
        else if (description.length === 0) {
            errorToast("Description Required !");
        } 
        else {
            let formData = new FormData();
            formData.append('name', name);
            formData.append('duration', duration);
            formData.append('price', price);
            formData.append('description', description);
            formData.append('id', id);

            const config = {
                headers: {
                    'Content-Type': 'multipart/form-data',
                },
            };

            try {
               //let res = await axios.put(`/admin/service/${id}`, formData, config);
                let res = await axios.post("/admin/update-service",formData,config)
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