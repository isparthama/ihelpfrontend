<div class="card">
  <div class="card-header">
    <h1>Unit</h1>
  </div>
  <div class="card-body">

<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/DataTables/datatables.css');?>">
<script type="text/javascript" charset="utf8" src="<?php echo base_url('assets/DataTables/jquery-3.6.0.min.js');?>"></script>
<script type="text/javascript" charset="utf8" src="<?php echo base_url('assets/DataTables/datatables.js');?>"></script> 
<div id='list'>
    <p><input type="button" value="Tambah Data" onclick="tambahdata()">
    <table id="table_id" class="display">
        <thead>
            <th>Building Code</th>
            <th>Unit Code</th>
            <th>Unit Name</th>
            <th>Detail</th>
        </thead>
        <tbody>
            <?php foreach($unit as $row){?>
            <tr>
                
                <td><div id="departemenrow<?php echo $row->id?>"><a href="javascript:view(<?php echo $row->id?>)"><?php echo $row->building_code?></a></div></td>
                <td><?php echo $row->unit_code?></td>
                <td><?php echo $row->Keterangan?></td>
                <td><?php echo $row->detail?></td>

            </tr>
            <?php }?>
        </tbody>
    </table>
</div>
<div id='form'">
    <form id="formId" method="post" action="<?php echo base_url('unit');?>"  enctype="multipart/form-data">
        <p>UNIT INFORMATION
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="formGroupnote">Buliding</label>
                <select class="form-control"  id="building" name="building">
                    <option value=''>Pilih Area</option>
                    <?php foreach($m_building as $row) {?>
                        <option value='<?php echo $row->id;?>'><?php echo $row->Keterangan;?></option>
                    <?php }?>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="formGroupnote">Unit Code</label>
                <input class="form-control" type='text' id='unit_code' name='unit_code' value=''>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="formGroupnote">Unit Name</label>
                <input class="form-control" type='text' id='keterangan' name='keterangan' value=''>
            </div>
            <div class="form-group col-md-6">
                <label for="formGroupnote">Business Group</label>
                <select class="form-control"  id="businessgroupid" name="businessgroupid">
                    <option value=''>Pilih Business Group</option>
                    <?php foreach($m_business_group as $row) {?>
                        <option value='<?php echo $row->id;?>'><?php echo $row->Keterangan;?></option>
                    <?php }?>
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <div><label for="formGroupnote">Business Type</label></div>
                <select class="form-control"  id="buisnesstypeid" name="buisnesstypeid">
                    <option value=''>Pilih Business Type</option>
                    <?php foreach($m_business_type as $row) {?>
                        <option value='<?php echo $row->id;?>'><?php echo $row->Keterangan;?></option>
                    <?php }?>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="formGroupnote">Floor</label>
                <input class="form-control" type='text' id='floor' name='floor' value=''>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="formGroupnote">Line</label>
                <input class="form-control" type='text' id='line' name='line' value=''>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="formGroupnote">Detail</label>
                <input type="hidden" id="id" name="id" value="0">
                <input type="hidden" id="todo" name="todo" value="add">
                <input class="form-control" type='text' id='detail' name='detail' value=''>
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
        "<?php echo base_url('unit')?>", 
        data={
            "id":id,
        },
        function(data, status){
            //validate time start
            //validate contractor
            tambahdata();
            
            $('#unit_code').val(data.unit_code);
            $('#building').val(data.buildingid);
            $('#keterangan').val(data.Keterangan);
            $('#businessgroupid').val(data.businessgroupid);

            
            $('#buisnesstypeid').val(data.buisnesstypeid);
            $('#floor').val(data.floor);

            $('#line').val(data.line);
            $('#detail').val(data.detail);

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