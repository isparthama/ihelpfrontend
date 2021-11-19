<div class="card">
  <div class="card-header">
    <h1>Role</h1>
  </div>
  <div class="card-body">

<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/DataTables/datatables.css');?>">
<script type="text/javascript" charset="utf8" src="<?php echo base_url('assets/DataTables/jquery-3.6.0.min.js');?>"></script>
<script type="text/javascript" charset="utf8" src="<?php echo base_url('assets/DataTables/datatables.js');?>"></script> 
<div id='list'>
    <p><input type="button" value="Tambah Data" onclick="tambahdata()">
    <table id="table_id" class="display">
        <thead>
            <th>id</th>
            <th>Role Name</th>
            <th>Keterangan</th>
            <!-- <th>Detail</th> -->
        </thead>
        <tbody>
            <?php foreach($data as $row){?>
            <tr>
                
                <td><div id="departemenrow<?php echo $row->id?>"><a href="javascript:view(<?php echo $row->id?>)"><?php echo $row->id?></a></div></td>
                <td><?php echo $row->role_name?></td>
                <td><?php echo $row->keterangan?></td>

            </tr>
            <?php }?>
        </tbody>
    </table>
</div>
<div id='form'">
    <form id="formId" method="post" action="<?php echo base_url('role');?>"  enctype="multipart/form-data">
        <p>ROLE INFORMATION
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="formGroupnote">Role Name</label>
                <input class="form-control" type='text' id='role_name' name='role_name' value=''>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="formGroupnote">Keterangan</label>
                <input type="hidden" id="id" name="id" value="0">
                <input type="hidden" id="todo" name="todo" value="add">
                <input class="form-control" type='text' id='keterangan' name='keterangan' value=''>
            </div>
        </div>
        <div class="form-row">
            <div id="btngroup">
                <input type="Submit" value="Simpan" id="btnsimpan">
                <input type="button" value="Back" onclick="listdata()">
            </div>
        </div>
    </form>
</div>
        </div>
    </div>
<script>



function view(id){
    $('#spinner'+id).show();
    $('#action'+id).val('Loading...');
    $('#action'+id).prop('disabled', true);
    $.getJSON(
        "<?php echo base_url('role')?>", 
        data={
            "id":id,
        },
        function(data, status){
            //validate time start
            //validate contractor
            tambahdata();
            
            $('#role_name').val(data.role_name);
            $('#keterangan').val(data.keterangan);

            $('#id').val(data.id);
            $('#todo').val("update");
        }
    );
}


function hapusdata(){
    var r = confirm("Hapus data ini?");
    if (r == true) {
        $('#todo').val("delete");
        $("#formId").submit();
    }
    else {
        alert("Data Gagal dihapus");
    }
}

function tambahdata(){
   $('#list').hide();
   $('#form').show();

   $('#role_name').val('');
    $('#keterangan').val('');

    var content='<input type="Submit" value="Simpan" id="btnsimpan">';
    content=content+'<input type="button" value="Hapus" onclick="hapusdata()">';
    content=content+'<input type="button" value="Back" onclick="listdata()">';
    $('#btngroup').html(content);
   

}
function listdata(){
   $('#list').show();
   $('#form').hide();

}
$(document).ready( function () {
    $('#table_id').DataTable({
        "order": [[ 0, "desc" ]]
    });
    listdata();
} );
</script>