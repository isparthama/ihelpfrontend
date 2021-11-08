<div class="card">
  <div class="card-header">
    <h1>Staff</h1>
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
            <th>Position</th>
            <th>Cell</th>
            <th>Work</th>
        </thead>
        <tbody>
            <?php foreach($datas as $row){?>
            <tr>
                
                <td><div id="departemenrow<?php echo $row->id?>"><a href="javascript:view(<?php echo $row->id?>)"><?php echo $row->Name?></a></div></td>
                <td><?php echo $row->Email?></td>
                <td><?php echo $row->departemen . ' '. $row->position?></td>
                <td><?php echo $row->Cell_Number?></td>
                <td><?php echo $row->workphone?></td>

            </tr>
            <?php }?>
        </tbody>
    </table>
</div>
<div id='form'">
    <form id="formId" method="post" action="<?php echo base_url('staff');?>"  enctype="multipart/form-data">
        <p>PERSONAL INFORMATION
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="formGroupnote">Email</label>
                <input class="form-control" type='email' id='email' name='email' value=''>
            </div>
            <div class="form-group col-md-6">
                <label for="formGroupnote">Name</label>
                <input class="form-control" type='text' id='name' name='name' value=''>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="formGroupnote">Superior</label>
                <select class="form-control"  id="superior" name="superior">
                    <option value=''>Pilih Superior</option>
                    <?php foreach($datas as $row) {?>
                        <option value='<?php echo $row->id;?>'><?php echo $row->Name;?></option>
                    <?php }?>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="formGroupnote">Staff Position</label>
                <select class="form-control"  id="position" name="position">
                    <option value=''>Pilih Staff Position</option>
                    <?php foreach($positions as $row) {?>
                        <option value='<?php echo $row->id;?>'><?php echo $row->Keterangan;?></option>
                    <?php }?>
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <div><label for="formGroupnote">Building</label></div>
                <select class="form-control"  id="building" name="building">
                    <option value=''>Pilih Building</option>
                    <?php foreach($building as $row) {?>
                        <option value='<?php echo $row->id;?>'><?php echo $row->Keterangan;?></option>
                    <?php }?>
                </select>
            </div>
            <div class="form-group col-md-6">
                <div><label for="formGroupnote">Role User</label></div>
                <select class="form-control"  id="roleuser" name="roleuser">
                    <option value=''>Pilih Role User</option>
                    <?php foreach($roles as $row) {?>
                        <option value='<?php echo $row->id;?>'><?php echo $row->keterangan;?></option>
                    <?php }?>
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <div><label for="formGroupnote">Notification</label></div>
                <select class="form-control"  id="notification" name="notification">
                    <option value=''>Pilih Notification</option>
                    <?php foreach($departemens as $row) {?>
                        <option value='<?php echo $row->id;?>'><?php echo $row->Keterangan;?></option>
                    <?php }?>
                </select>
            </div>
        </div>
        <p>CONTACT INFORMATION
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="formGroupnote">Cell Number</label>
                <input class="form-control" type='text' id='cellnumber' name='cellnumber' value=''>
            </div>
            <div class="form-group col-md-6">
                <label for="formGroupnote">Work Number</label>
                <input type="hidden" id="id" name="id" value="0">
                <input type="hidden" id="todo" name="todo" value="add">
                <input class="form-control" type='text' id='worknumber' name='worknumber' value=''>
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
        "<?php echo base_url('staff')?>", 
        data={
            "id":id,
        },
        function(data, status){
            //validate time start
            //validate contractor
            tambahda                                    ta();
            
            $('#name').val('');
            $('#email').val('');
            $('#cellnumber').val('');
            $('#worknumber').val('');
            $('#position').val('');
            $('#notification').val('');
            $('#roleuser').val('');
            $('#superior').val('');
            $('#building').val('');

            
            $('#name').val(data.Name);
            $('#email').val(data.Email);
            $('#cellnumber').val(data.Cell_Number);
            $('#worknumber').val(data.workphone);
            $('#position').val(data.poisitionid);
            $('#notification').val(data.notificationid);
            $('#roleuser').val(data.roleid);
            $('#superior').val(data.superiorid);
            $('#building').val(data.buildingid);


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