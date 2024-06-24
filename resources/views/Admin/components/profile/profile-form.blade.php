<div class="card pd-20 pd-sm-40">
  <h6 class="card-body-title">Update Profile Information</h6><br>

  <div class="form-layout">
      <div class="row mg-b-25">
        <div class="col-lg-4">
          <div class="form-group mg-b-10-force">
            <label class="form-control-label">Name: <span class="tx-danger">*</span></label>
            <input type="text" class="form-control" id="name">
          </div>
        </div>
      </div>
      <div class="form-layout-footer">
        <button onclick="onUpdate()" class="btn btn-info mg-r-5">Update</button>
      </div>
  </div>
</div>


<script>
    getProfile();
    async function getProfile(){

        let res=await axios.get("/admin/user-profile")

        if(res.status===200 && res.data['status']==='success'){
            let data=res.data['data'];
            document.getElementById('name').value=data['name'];
        }
        else{
            errorToast(res.data['message'])
        }

    }

    async function onUpdate() {
        let name = document.getElementById('name').value;

        if(name.length===0){
            errorToast('First Name is required')
        }
        else{

            let res=await axios.post("/admin/user-update",{
                name:name
            })

            if(res.status===200 && res.data['status']==='success'){
                successToast(res.data['message']);
                await getProfile();
            }
            else{
                errorToast(res.data['message'])
            }
        }
    }

</script>