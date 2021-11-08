<div class="card">
  <div class="card-header">
    <h1>Tenant</h1>
  </div>
  <div class="card-body">

<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/DataTables/datatables.css');?>">
<script type="text/javascript" charset="utf8" src="<?php echo base_url('assets/DataTables/jquery-3.6.0.min.js');?>"></script>
<script type="text/javascript" charset="utf8" src="<?php echo base_url('assets/DataTables/datatables.js');?>"></script> 
<div id='list'>
    <p><input type="button" value="Tambah Data" onclick="tambahdata()">
    <table id="table_id" class="display">
        <thead>
            <th>Name</th>
            <th>Email</th>
            <th>Unit</th>
            <th>Cell</th>
            <th>Work</th>
            <th>Home</th>
            <!-- <th>Detail</th> -->
        </thead>
        <tbody>
            <?php foreach($tenant as $row){?>
            <tr>
                
                <td><div id="departemenrow<?php echo $row->id?>"><a href="javascript:view(<?php echo $row->id?>)"><?php echo $row->PIC_Name?></a></div></td>
                <td><?php echo $row->Email?></td>
                <td><?php echo $row->unit_code?></td>
                <td><?php echo $row->Cell_Number?></td>
                <td><?php echo $row->homephone?></td>
                <td><?php echo $row->workphone?></td>

            </tr>
            <?php }?>
        </tbody>
    </table>
</div>
<div id='form'">
    <form id="formId" method="post" action="<?php echo base_url('tenant');?>"  enctype="multipart/form-data">
        <p>PERSONAL INFORMATION
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="formGroupnote">Tenant Unit</label>
                <select class="form-control"  id="PIunit_code_id" name="PIunit_code_id">
                    <option value=''>Pilih Unit</option>
                    <?php foreach($m_unit_code as $row) {?>
                        <option value='<?php echo $row->id;?>'><?php echo $row->unit_code.'-'.$row->Keterangan;?></option>
                    <?php }?>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="formGroupnote">Email</label>
                <input class="form-control" type='text' id='PIemail' name='PIemail' value=''>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="formGroupnote">Name</label>
                <input class="form-control" type='text' id='PIname' name='PIname' value=''>
            </div>
            <div class="form-group col-md-6">
                <label for="formGroupnote">Tenant Status</label>
                <select class="form-control"  id="PITenant_Status" name="PITenant_Status">
                    <option value=''>Pilih Tenant Status</option>
                    <?php foreach($m_tenant_status as $row) {?>
                        <option value='<?php echo $row->id;?>'><?php echo $row->Keterangan;?></option>
                    <?php }?>
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <div><label for="formGroupnote">Role User</label></div>
                <select class="form-control"  id="PIrole_user" name="PIrole_user">
                    <option value=''>Pilih Role User</option>
                    <?php foreach($m_role_status as $row) {?>
                        <option value='<?php echo $row->id;?>'><?php echo $row->Keterangan;?></option>
                    <?php }?>
                </select>
            </div>
        </div>

        <p>CONTACT INFORMATION
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="formGroupnote">Cell Number</label>
                <input class="form-control" type='text' id='CICell_Number' name='CICell_Number' value=''>
            </div>
            <div class="form-group col-md-6">
                <label for="formGroupnote">Home Number</label>
                <input class="form-control" type='text' id='CIHome_Number' name='CIHome_Number' value=''>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="formGroupnote">Work Number</label>
                <input class="form-control" type='text' id='CIWork_Number' name='CIWork_Number' value=''>
            </div>
            <div class="form-group col-md-6">
                <label for="formGroupnote">PIC</label>
                <input class="form-control" type='text' id='CIPIC' name='CIPIC' value=''>
            </div>
        </div>
        <p>CONTACT EMERGENCY
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="formGroupnote">Cell Number</label>
                <input class="form-control" type='text' id='CECell_Number' name='CECell_Number' value=''>
            </div>
            <div class="form-group col-md-6">
                <label for="formGroupnote">email</label>
                <input class="form-control" type='text' id='CEHome_Number' name='CEHome_Number' value=''>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="formGroupnote">Work Number</label>
                <input type="hidden" id="id" name="id" value="0">
                <input type="hidden" id="todo" name="todo" value="add">
                <input class="form-control" type='text' id='CEWork_Number' name='CEWork_Number' value=''>
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
        "<?php echo base_url('tenant')?>", 
        data={
            "id":id,
        },
        function(data, status){
            //validate time start
            //validate contractor
            tambahdata();
            
            $('#PIunit_code_id').val(data.unitid);
            $('#PIemail').val(data.Email);
            $('#PIname').val(data.PIC_Name);
            $('#PITenant_Status').val(data.PITenant_Status);
            $('#PIrole_user').val(data.role_id);
            $('#CICell_Number').val(data.Cell_Number);
            $('#CIHome_Number').val(data.homephone);
            $('#CIWork_Number').val(data.workphone);
            $('#CIPIC').val(data.CIPIC);
            $('#CECell_Number').val(data.CECell_Number);
            $('#CEHome_Number').val(data.CEHome_Number);
            $('#CEWork_Number').val(data.CEWork_Number);

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

   $('#unit_code').val('');
    $('#building').val('');
    $('#keterangan').val('');
    $('#businessgroupid').val('');

    $('#id').val('0');
    $('#buisnesstypeid').val('');
    $('#floor').val('');

    $('#line').val('');
    $('#detail').val('');
    $('#todo').val('add');

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