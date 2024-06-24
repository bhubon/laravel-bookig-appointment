<div class="modal animated zoomIn" id="delete-modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center">
                <h3 class="mt-3 text-warning">Delete !</h3>
                <p class="mb-3">Once delete, you can't get it back.</p>
                <input class="d-none" id="deleteID"/>
            </div>
            <div class="modal-footer justify-content-end">
                <div>
                    <button type="button" id="delete-modal-close" class="btn bg-gradient-success mx-2" data-bs-dismiss="modal">Cancel</button>
                    <button onclick="itemDelete()" type="button" id="confirmDelete" class="btn bg-gradient-danger">Delete</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
async function itemDelete() {

    showLoader();

    let id = document.getElementById('deleteID').value;

    try {
        let res = await axios.delete("/admin/service/" + id);

        if (res.status === 200) {
            successToast(res.data.message || 'Delete success');
            $('#delete-modal').modal('hide');
            await getList();
        } else {
            errorToast(res.data.message || "Request failed!");
        }
    } catch (error) {
        if (error.response) {
            if (error.response.status === 404) {
                errorToast("Service not found!");
            } else {
                errorToast(error.response.data.message || "Request failed!");
            }
        } else if (error.request) {
            errorToast("No response from server. Request failed!");
        } else {
            errorToast("Error: " + error.message);
        }
    }

    hideLoader();
}
</script>
