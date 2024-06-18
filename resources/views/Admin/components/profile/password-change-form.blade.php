<div class="card pd-20 pd-sm-40">
  <h6 class="card-body-title">Update Password</h6><br>

  <div class="form-layout">
      <div class="row mg-b-25">

        <div class="col-lg-4">
          <div class="form-group">
            <label class="form-control-label">Old Password:</label>
            <input type="password" class="form-control" id="oldpassword">
          </div>
        </div>

        <div class="col-lg-4">
          <div class="form-group">
            <label class="form-control-label">New Password:</label>
            <input type="password" class="form-control" id="newpassword">
          </div>
        </div>

        <div class="col-lg-4">
          <div class="form-group">
            <label class="form-control-label">Confirm Password:</label>
            <input type="password" class="form-control" id="cpassword">
          </div>
        </div>

      </div>
      <div class="form-layout-footer">
        <button onclick="onUpdate()" class="btn btn-info mg-r-5">Update</button>
      </div>
  </div>
</div>


<script>
async function onUpdate() {
    let oldpassword = document.getElementById('oldpassword').value;
    let newpassword = document.getElementById('newpassword').value;
    let cpassword = document.getElementById('cpassword').value;

    if (oldpassword.length === 0) {
        errorToast('Old Password is required');
    } else if (newpassword.length === 0) {
        errorToast('New Password is required');
    } else if (cpassword.length === 0) {
        errorToast('Confirm Password is required');
    } else if (newpassword !== cpassword) {
        errorToast('New Password and Confirm Password must be the same');
    } else {
        try {
            let res = await axios.post("/admin/user-password-update", {
                oldpassword: oldpassword,
                newpassword: newpassword
            });

            if (res.status === 200 && res.data['status'] === 'success') {
                successToast(res.data['message']);
                window.location.href = "/admin/user-password";
            } else {
                errorToast(res.data['message']);
            }
        } catch (error) {
            if (error.response) {
                if (error.response.status === 422) {
                    let messages = error.response.data.message;
                    for (let key in messages) {
                        errorToast(messages[key][0]);
                    }
                } else {
                    errorToast(error.response.data.message);
                }
            } else {
                errorToast('An unexpected error occurred');
            }
        }
    }
}
</script>





