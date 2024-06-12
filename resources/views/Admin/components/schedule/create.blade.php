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
          <div class="row mg-b-25">

          <div class="col-lg-3">
            <div class="form-group mg-b-10-force">
              <label class="form-control-label">Select Service: <span class="tx-danger">*</span></label>
              <select class="form-control select2" id="staffList">
                <option value="" selected="" disabled="" >Choose one</option>
              </select>

            </div>
          </div>



            <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label">Phone1: <span class="tx-danger">*</span></label>
                <input type="text" class="form-control" id="phone1" placeholder="Enter Phone1">
              </div>
            </div>



          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button onclick="Save()" id="save-btn" class="btn btn-info pd-x-20">Save</button>
        <button class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
        <a href="" class="btn btn-success">Back</a>
      </div>
    </div>
  </div>
</div>




<script>

  FillStaffDropDown();

  async function FillStaffDropDown(){
      let res = await axios.get("/admin/staff-schedule")
      res.data.forEach(function (item,i) {
          let option=`<option value="${item['id']}">${item['user']['name']}</option>`
          $("#staffList").append(option);
      })
  }

function resetCreateForm() {
  document.getElementById('save-form').reset();
  $('#mainImage').attr('src', '');

  $('.summernote').summernote('code', '');
}

$('#create-modal').on('show.bs.modal', function (e) {
  resetCreateForm();
});



</script>

