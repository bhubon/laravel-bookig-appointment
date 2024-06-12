<div class="card pd-20 pd-sm-40">
  <h6 class="card-body-title">Staff Schedule Information</h6>
    <div><a href="" class="btn btn-info mg-b-10 float-right" data-toggle="modal" data-target="#create-modal"><i class="fa fa-plus"></i> Add New</a></div>

  <div class="table-wrapper">
    <table id="datatable1" class="table display responsive nowrap">
      <thead>
        <tr>
          <th class="wd-5p">Sl</th>
          <th class="wd-10p">Doctor Name</th>
          <th class="wd-10p">Date</th>
          <th class="wd-20p">Action</th>
        </tr>
      </thead>
      <tbody id="tableList">


      </tbody>
    </table>
  </div>
</div>


<script>

getList();


async function getList() {



    let res=await axios.get("/admin/staff-schedule");

    let tableList=$("#tableList");
    let tableData=$("#datatable1");

    tableData.DataTable().destroy();
    tableList.empty();

    res.data.data.forEach(function (item,index) {
        let row=`<tr>
                    <td>${index + 1}</td>
                    <td>${item['user']['name']}</td>
                    <td>${item['date']}</td>
                    <td>
                        <button data-id="${item['id']}" class="btn editBtn btn-sm btn-outline-success">Edit</button>
                        <button data-id="${item['id']}" class="btn deleteBtn btn-sm btn-outline-danger">Delete</button>
                    </td>
                 </tr>`
        tableList.append(row)
    })

    $('.editBtn').on('click', async function () {
           let id= $(this).data('id');
           let filePath= $(this).data('path');
           await FillUpUpdateForm(id,filePath)
           $("#update-modal").modal('show');
    })

    $('.deleteBtn').on('click',function () {
        let id= $(this).data('id');
        let path= $(this).data('path');

        $("#delete-modal").modal('show');
        $("#deleteID").val(id);
        $("#deleteFilePath").val(path)

    })

    new DataTable('#tableData',{
        order:[[0,'desc']],
        lengthMenu:[5,10,15,20,30]
    });

}


</script>