<div class="card pd-20 pd-sm-40">
  <h6 class="card-body-title">Service Information List</h6>
    <div><a href="" class="btn btn-info mg-b-10 float-right" data-toggle="modal" data-target="#create-modal"><i class="fa fa-plus"></i> Add New</a></div>

  <div class="table-wrapper">
    <table id="datatable1" class="table display responsive nowrap">
      <thead>
        <tr>
          <th class="wd-5p">Sl</th>
          <th class="wd-10p">Name</th>
          <th class="wd-40p">Description</th>
          <th class="wd-10p">Duration</th>
          <th class="wd-10p">price</th>
          <th class="wd-20p">Action</th>
        </tr>
      </thead>
      <tbody id="tableList">


      </tbody>
    </table>
  </div>
</div>


<script>
    document.addEventListener("DOMContentLoaded", function () {
        getList();
    });

async function getList() {
    let res=await axios.get("/admin/service");

    let tableList=$("#tableList");
    let tableData=$("#datatable1");

        // Destroy existing DataTable instance before reinitializing
        if ($.fn.DataTable.isDataTable(tableData)) {
            tableData.DataTable().destroy();
        }
        tableList.empty();

    res.data.data.forEach(function (item,index) {
        let row=`<tr>
                    <td>${index + 1}</td>
                    <td>${item['name']}</td>
                    <td>${item['description']}</td>
                    <td>${item['duration']}</td>
                    <td>${item['price']}</td>
                    <td>
                        <button data-id="${item['id']}" class="btn editBtn btn-sm btn-outline-success">Edit</button>
                        <button data-id="${item['id']}" class="btn deleteBtn btn-sm btn-outline-danger">Delete</button>
                    </td>
                 </tr>`
        tableList.append(row)
    })

    $('.editBtn').on('click', async function () {
           let id= $(this).data('id');
           //console.log("Edit button clicked, ID:", id); // Debug log
           await FillUpUpdateForm(id);
           $("#update-modal").modal('show');
    });

    $('.deleteBtn').on('click',function () {
        let id= $(this).data('id');

        $("#delete-modal").modal('show');
        $("#deleteID").val(id);

    })

}


</script>