<div class="card pd-20 pd-sm-40">
  <h6 class="card-body-title">Appointment List</h6>
    <div><a href="" class="btn btn-info mg-b-10 float-right" data-toggle="modal" data-target="#create-modal"><i class="fa fa-plus"></i> Add New</a></div>

  <div class="table-wrapper">
    <table id="datatable1" class="table display responsive nowrap">
      <thead>
        <tr>
          <th class="wd-5p">Sl</th>
          <th class="wd-20p">Customer Name</th>
          <th class="wd-20p">Doctor Name</th>
          <th class="wd-10p">Date</th>
          <th class="wd-10p">Time</th>
          <th class="wd-10p">Service Type</th>
          <th class="wd-20p">Action</th>
        </tr>
      </thead>
      <tbody id="tableList">


      </tbody>
    </table>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        getList();
    });

async function getList() {
    try {
        let res = await axios.get("/admin/customer-appointment");
        let tableList = $("#tableList");
        let tableData = $("#datatable1");

        // Destroy existing DataTable instance before reinitializing
        if ($.fn.DataTable.isDataTable(tableData)) {
            tableData.DataTable().destroy();
        }
        tableList.empty();

        res.data.data.forEach(function (item, index) {
            let customerName = item.customer.user.name;
            let doctorName = item.user.name;
            let appointmentDate = item.appointment_date;
            let appointmentTime = item.appointment_time;
            let serviceType = item.service.name;

            let row = `<tr>
                        <td>${index + 1}</td>
                        <td>${customerName}</td>
                        <td>${doctorName}</td>
                        <td>${appointmentDate}</td>
                        <td>${appointmentTime}</td>
                        <td>${serviceType}</td>
                        <td>
                            <button data-id="${item.id}" data-date="${appointmentDate}" class="btn editBtn btn-sm btn-outline-success">Edit</button>
                            <button data-id="${item.id}" class="btn deleteBtn btn-sm btn-outline-danger">Delete</button>
                        </td>
                    </tr>`;
            tableList.append(row);
        });

        //tableData.DataTable(); // Reinitialize the DataTable after data is appended

        $('.editBtn').on('click', async function () {
            let id = $(this).data('id');
            let date = $(this).data('date'); 
            await FillUpUpdateForm(id, date);
            $("#update-modal").modal('show');
        });

        $('.deleteBtn').on('click', function () {
            let id = $(this).data('id');
            $("#delete-modal").modal('show');
            $("#deleteID").val(id);
        });
    } catch (error) {
        console.error("An error occurred while fetching the appointment list.", error);
    }
}


</script>

