<div id="create-modal" class="modal fade">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content tx-size-sm">
      <div class="modal-header pd-x-20">
        <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Create New</h6>
        <button type="button" id="modal-close" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body pd-20">
        <form id="save-form">
          <div class="form-layout">
            <div class="row mg-b-25">
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Service Name: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" id="name" placeholder="Enter name">
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Service Duration: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" id="duration" placeholder="Enter duration">
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Service Price: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" id="price" placeholder="Enter price">
                </div>
              </div>

            <div class="col-lg-12">
              <div class="form-group">
                <label class="form-control-label">Service Description: <span class="tx-danger">*</span></label>
                <textarea class="form-control summernote" id="description" placeholder="Enter description"></textarea>
              </div>
            </div>

            </div><!-- row -->
          </div><!-- Form Layout -->
        </form>
      </div><!-- modal-body -->

      <div class="modal-footer">
        <button onclick="Save()" id="save-btn" class="btn btn-info pd-x-20">Save changes</button>
        <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script>

function resetCreateForm() {
  document.getElementById('save-form').reset();
  $('.summernote').summernote('code', '');
}

$('#create-modal').on('show.bs.modal', function (e) {
  resetCreateForm();
});

async function Save() {
    let name = document.getElementById('name').value;
    let duration = document.getElementById('duration').value;
    let price = document.getElementById('price').value;
    let description = $('.summernote').summernote('code');

    console.log('-------',name);
    console.log('-------',duration);
    console.log('-------',price);
    console.log('-------',description);

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

        const config = {
            headers: {
                'content-type': 'multipart/form-data',
            },
        };

        try {
            let res = await axios.post("/admin/service", formData, config);
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
    }
}

</script>
