function showLoader() {
    document.getElementById('loader').classList.remove('d-none')
}
function hideLoader() {
    document.getElementById('loader').classList.add('d-none')
}

function successToast(msg) {
    Toastify({
        gravity: "bottom", // `top` or `bottom`
        position: "center", // `left`, `center` or `right`
        text: msg,
        className: "mb-5",
        style: {
            background: "green",
        }
    }).showToast();
}

function errorToast(msg) {
    Toastify({
        gravity: "bottom", // `top` or `bottom`
        position: "center", // `left`, `center` or `right`
        text: msg,
        className: "mb-5",
        style: {
            background: "red",
        }
    }).showToast();
}


function close_create_modal() {
    $('#create-modal').modal('hide');
}
function close_update_modal() {
    $('#update-modal').modal('hide');
}

function close_delete_modal(){
    $("#delete-modal").modal('hide');
}


function reset_form(id) {
    $(`#${id}`).trigger("reset");
}