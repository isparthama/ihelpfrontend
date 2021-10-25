<div class="card">
  <div class="card-header">
        <h1>SURAT IJIN</h1><strong><div id='status'></div></strong>
  </div>
  <div class="card-body">


<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/DataTables/datatables.css');?>">
<script type="text/javascript" charset="utf8" src="<?php echo base_url('assets/DataTables/jquery-3.6.0.min.js');?>"></script>
<script type="text/javascript" charset="utf8" src="<?php echo base_url('assets/DataTables/datatables.js');?>"></script> 
<div id='list'>
    <p><input type="button" value="Tambah Data" onclick="tambahdata()">
    
    <p><table id="table_id" class="display">
        <thead>
            <tr>
                <th>id</th>
                <th>Nomor</th>
                <th>Name</th>
                <th>Category</th>
                <th>Title</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Created Time</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($rows as $row){?>
            <tr>
                <td><?php echo '<a href="javascript:view('.$row->id.')">'.$row->id.'</a>';?></td>
                <td><?php echo '<a href="javascript:view('.$row->id.')">'.$row->suratjalan.'</a>';?></td>
                <td><?php echo $row->Tenant;?></td>
                <td><?php echo $row->kettipesuratjalan;?></td>
                <td><?php echo $row->Judul;?></td>
                <td><?php echo substr($row->Mulai,0,10);?></td>
                <td><?php echo substr($row->Selesai,0,10);?></td>
                <td><?php echo $row->created_at;?></td>
                <td><div id='statusrow<?php echo $row->id;?>'><?php echo $row->ketstatus;?></div></td>
            </tr>
            <?php }?>
        </tbody>
    </table>
</div>
<div id='form'">
    <form id="forminput" method="POST" action="<?php echo base_url('permissionrequest');?>">
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="formGroupunit">Unit</label>
            <div id="elunit">
                <select class="form-control"  id='unit' name='unit' onchange='javascript:applyrole()'>
                <?php if($user['role']==2){?>}
                    <option value=''>Pilih Unit</option>
                    <?php }?>
                    <?php foreach ($units as $row){?>
                        <option value='<?php echo $row->id;?>'><?php echo $row->tenant_name;?></option>
                    <?php }?>
                </select>
            </div>
            <div id="lbunit"></div>
        </div>
        <div class="form-group col-md-6" style="display:none" id="divcetak">
            <a id='cetak' href="<?php echo base_url('cetak/permissionrequest');?>" target="_blank"><i class="fas fa-print"></i>&nbsp Print</a>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="formGroupcategory">Category</label>
            <div id='elcategory'><select class="form-control" id='category' name='category' onchange='javascript:applyrole()'>
                <option value=''>Pilih Category</option>
                <?php foreach ($categories as $row){?>
                    <option value='<?php echo $row->id;?>'><?php echo $row->Keterangan;?></option>
                <?php }?>
            </select></div>
            <div id="lbcategory"></div>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="formGroupstart_date">Start Date</label>
            <div id='elstart_date'><input class="form-control" type='date' id='start_date' name='start_date'></div><div id='lbstart_date'></div>
        </div>
        <div class="form-group col-md-6">
            <label for="formGroupstart_time">Time Start</label>
            <div id='elstart_time'><input class="form-control" type='time' id='start_time' name='start_time'></div><div id='lbstart_time'></div>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="formGroupstart_date">End Date</label>
            <div id='elend_date'><input class="form-control" type='date' id='end_date' name='end_date'></div><div id='lbend_date'></div>
        </div>
        <div class="form-group col-md-6">
            <label for="formGroupstart_date">Time End</label>
            <div id='elend_time'><input class="form-control" type='time' id='end_time' name='end_time'></div><div id='lbend_time'></div>
        </div>
    </div>
    <div><p><h2>Permission Information</h2></div>
    <div class="form-group">
        <label for="formGrouptitle">Title</label>
        <div id='eltitle'><input class="form-control" type='text' id='title' name='title'></div><div id='lbtitle'></div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="formGrouptenant_pic">Tenant PIC</label>
            <div id='eltenant_pic'><input class="form-control" type='text' id='tenant_pic' name='tenant_pic'></div><div id='lbtenant_pic'></div>
        </div>
        <div class="form-group col-md-6">
            <label for="formGrouphp_pic">HP PIC</label>
            <div id='elhp_pic'><input class="form-control" type='number' id='hp_pic' name='hp_pic'></div><div id='lbhp_pic'></div>
        </div>
    </div>
    <div class="form-group">
        <label for="formGroupDetail_Deskripsi">Note</label>
        <div id='elDetail_Deskripsi'><input class="form-control" type='text' id='Detail_Deskripsi' name='Detail_Deskripsi'></div><div id='lbDetail_Deskripsi'></div>
    </div>
    <div id='kontraktor'>
        <div><p><h2>Kontraktor</h2></div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="formGroupNama">Kontraktor Name</label>
                <div id='elNama'><input class="form-control" type='text' id='Nama' name='Nama'></div><div id='lbNama'></div>
            </div>
            <div class="form-group col-md-6">
                <label for="formGrouptenant_pic">HP Kontraktor</label>
                <div id='elKontak'><input class="form-control" type='number' id='Kontak' name='Kontak'></div><div id='lbKontak'></div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="formGroupKantor">Company</label>
                <br><div id='elKantor'><input class="form-control" type='text' id='Kantor' name='Kantor'></div><div id='lbKantor'></div>
            </div>
            <div class="form-group col-md-6">
                <label for="formGroupAlamat">Address</label>
                <br><div id='elAlamat'><input class="form-control" type='text' id='Alamat' name='Alamat'></div><div id='lbAlamat'></div>
            </div>
        </div>
    </div>
    

    <div id='item'>
        <div><p><h2>Item</h2></div>
        <p><input type="button" value="New Data" id="btnitem" onclick="javascript:additem()">
        <div class="form-row">
                <table class="table table-bordered" id='itemtbl'>
                    <tr>
                        <th>itemcode</th>
                        <th>itemname</th>
                        <th>quantity</th>
                        <th>note</th>
                    </tr>
                    <tr>
                        <td><input class="form-control" type='text' id='itemcode' name='itemcode[]'></td>
                        <td><input class="form-control" type='text' id='itemname' name='itemname[]'></td>
                        <td><input class="form-control" type='number' id='quantity' name='quantity[]'></td>
                        <td><input class="form-control" type='text' id='note' name='note[]'></td>
                    </tr>
                </table>
        </div>
    </div>

    <div id='facility'>
    <div><p><h2>Facility</h2></div>
    <p><input type="button" value="New Data"  id="btnfacility" onclick="javascript:addfacility()">
    <div class="form-row">
            <table class="table table-bordered" id="facilitytbl">
                <tr>
                    <th>Facility</th>
                    <th>Date From</th>
                    <th>Time From </th>
                    <th>Date To</th>
                    <th>Time To </th>
                </tr>
                <tr>
                    <td><select class="form-control" type='text' id='idfacility' name='idfacility[]'>
                        <option value=''>Pilih Facility</option>
                        <?php foreach($facility as $row){?>
                            <option value='<?php echo $row->id;?>'><?php echo $row->Keterangan;?></option>
                        <?php }?>
                            </select>
                    </td>
                    <td><input class="form-control" type='date' id='from_date' name='from_date[]'></td>
                    <td><input class="form-control" type='time' id='from_time' name='from_time[]'></td>
                    <td><input class="form-control" type='date' id='to_date' name='to_date[]'></td>
                    <td><input class="form-control" type='time' id='to_time' name='to_time[]'></td>
                </tr>
            </table>
    </div>
    </div>

    <div id='multitime'>
    <div><p><h2>Multitime</h2></div>
    <p><input type="button" value="New Data"  id="btnmultitime" onclick="javascript:addmulitime()">
    <div class="form-row">
            <table class="table table-bordered" id="multitimetbl">
            <tr>
                <th>Time From</th> 
                <th>Time To</th> 
                <th>Location</th> 
            </tr>
            <tr>
                <td><input class="form-control" type='time' id='from_time' name='from_time_multitime[]'></td>
                <td><input class="form-control" type='time' id='to_time' name='to_time_multitime[]'></td>
                <td><input class="form-control" type='text' id='location' name='location_multitime[]'></td>
            </tr>
        </table>
    </div>
    </div>

    <div id='approvedby' style="display:none">
    <p>Approved By
    <table id="approvedbytbl">
        <tr>
            <th>Number</th>
            <th>Staff</th>
            <th>Position</th>
            <th>Approved Date</th>
            <th>Note</th>
        </tr>
        <?php foreach($approved as $row){?>
        <tr>
            <td>Number</td>
            <td>Staff</td>
            <td>Position</td>
            <td>Approved Date</td>
            <td>Note</td>
        </tr>
        <?php }?>
    </table>
    </div>

    <div id='elalasan' style="display:none">
        <div><p><h2>Reject Reason</h2></div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <div id='txalasan'><textarea id='alasan' name='alasan' class="form-control"></textarea></div><div id='lbalasan'></div>
            </div>
        </div>
    </div>

<p>
    <input type='hidden' id='id' name='id' value=''>

    <div class="form-row">
        <input type="Submit" value="Submit" id="btnsimpan">
        <input type="button" value="Reject" onclick="approve(4)" id="btnreject">
        <input type="button" value="Approve" onclick="approve(2)" id="btnapprove">
        <input type="button" value="Back" onclick="listdata()">
    <div>

</form>
</div>

    </div>
</div>

<script>
function tambahdata(){
   $('#list').hide();
   $('#form').show();
   $('#status').val('NEW DATA');

   $('#kontraktor').hide();
   $('#item').hide();
   $('#facility').hide();
   $('#multitime').hide();

   $('#btnsimpan').show();
   $('#btnapprove').hide();
   $('#btnreject').hide();

   showelements();

   $('#itemtbl').find("tr:gt(0)").remove();
    $('#facilitytbl').find("tr:gt(0)").remove();
    $('#multitimetbl').find("tr:gt(0)").remove();
    $('#approvedbytbl').find("tr:gt(0)").remove();

//    additem();
//    addfacility();
//    addmulitime();

}
function listdata(){
   $('#list').show();
   $('#form').hide();
   $('#status').val('');

   $('#btnsimpan').hide();
   $('#btnapprove').hide();
   $('#btnreject').hide();
}

function showelements(){
    $('#elunit').show();
    $('#lbunit').hide();

    $('#elcategory').show();
    $('#lbcategory').hide();
    
    $('#elstart_date').show();
    $('#lbstart_date').hide();

    $('#elstart_time').show();
    $('#lbstart_time').hide();

    $('#elend_date').show();
    $('#lbend_date').hide();

    $('#elend_time').show();
    $('#lbend_time').hide();

    $('#eltitle').show();
    $('#eltenant_pic').show();
    $('#elhp_pic').show();
    $('#elDetail_Deskripsi').show();

    $('#lbtitle').hide();
    $('#lbtenant_pic').hide();
    $('#lbhp_pic').hide();
    $('#lbDetail_Deskripsi').hide();

    $('#elNama').show();
    $('#elKontak').show();
    $('#elKantor').show();
    $('#elAlamat').show();

    $('#lbNama').hide();
    $('#lbKontak').hide();
    $('#lbKantor').hide();
    $('#lbAlamat').hide();

    $('#btnitem').show();
    $('#btnfacility').show();
    $('#btnmultitime').show();

}

function showlable(){
    $('#elunit').hide();
    $('#lbunit').show();

    $('#elcategory').hide();
    $('#lbcategory').show();

    $('#elstart_date').hide();
    $('#lbstart_date').show();

    $('#elstart_time').hide();
    $('#lbstart_time').show();

    $('#elend_date').hide();
    $('#lbend_date').show();

    $('#elend_time').hide();
    $('#lbend_time').show();

    $('#eltitle').hide();
    $('#eltenant_pic').hide();
    $('#elhp_pic').hide();
    $('#elDetail_Deskripsi').hide();

    $('#lbtitle').show();
    $('#lbtenant_pic').show();
    $('#lbhp_pic').show();
    $('#lbDetail_Deskripsi').show();

    $('#elNama').hide();
    $('#elKontak').hide();
    $('#elKantor').hide();
    $('#elAlamat').hide();

    $('#lbNama').show();
    $('#lbKontak').show();
    $('#lbKantor').show();
    $('#lbAlamat').show();

    $('#btnitem').hide();
    $('#btnfacility').hide();
    $('#btnmultitime').hide();
}
function additem(){
    $('#itemtbl tr:last').after('<tr><td><input class="form-control" type="text" id="itemcode" name="itemcode[]"></td><td><input class="form-control" type="text" id="itemname" name="itemname[]"></td><td><input class="form-control" type="number" id="quantity" name="quantity[]"></td><td><input class="form-control" type="text" id="note" name="note[]"></td></tr>');
}

function addfacility(){
    
    var start_date=$('#start_date').val();
    start_date.valueAsDate = new Date();

    var start_time=$('#start_time').val();

    var end_date=$('#end_date').val();
    end_date.valueAsDate = new Date();

    var end_time=$('#end_time').val();


    $('#facilitytbl tr:last').after('<tr><td><select class="form-control" type="text" id="idfacility" name="idfacility[]"><option value="">Pilih Facility</option><?php echo $stroptfacility;?></select></td><td><input class="form-control" type="date" id="from_date" name="from_date[]" value="'+start_date+'"></td><td><input class="form-control" type="time" id="from_time" name="from_time[]" value="'+start_time+'"></td><td><input class="form-control" type="date" id="to_date" name="to_date[]" value="'+end_date+'"></td><td><input class="form-control" type="time" id="to_time" name="to_time[]" value="'+end_time+'"></td></tr>');
}

function addmulitime(){
    $('#multitimetbl tr:last').after('<tr><td><input class="form-control" type="time" id="from_time" name="from_time_multitime[]"></td><td><input class="form-control" type="time" id="to_time" name="to_time_multitime[]"></td><td><input class="form-control" type="text" id="location" name="location_multitime[]"></td></tr>');
}

function view(id){
    showlable();
    $('#cetak').attr('href','<?php echo base_url('cetak/permissionrequest');?>/'+id);
    $.getJSON(
        "<?php echo base_url('permissionrequest')?>", 
        data={
            "id":id,
        },
        function(data, status){
            //validate time start
            //validate contractor
            $('#list').hide();
            $('#form').show();
            
            $('#kontraktor').hide();
            $('#item').hide();
            $('#facility').hide();
            $('#multitime').hide();

            $('#btnsimpan').show();
            $('#btnapprove').hide();
            $('#btnreject').hide();

            if (data.show_contractor==1) {
                $('#kontraktor').show();
            } else {
                $('#kontraktor').hide();
            }
            //validate item
            if (data.show_item>0) {
                $('#item').show();
            } else {
                $('#item').hide();
            }
            //validate facility
            
            if (data.show_facility==1) {
                $('#facility').show();
            } else {
                $('#facility').hide();
            }
            //validate multitime
            if (data.multipledate==1) {
                $('#multitime').show();
            } else {
                $('#multitime').hide();
            }

            $('#lbunit').html(data.tenant_name);
            $('#lbcategory').html(data.category);
            $('#lbstart_date').html(data.start_date);
            $('#lbstart_time').html(data.start_time);
            $('#lbend_date').html(data.end_date);
            $('#lbend_time').html(data.end_time);
            
            $('#lbtitle').html(data.Judul);
            $('#lbtenant_pic').html(data.Pic);
            $('#lbhp_pic').html(data.hp_pic);
            $('#lbDetail_Deskripsi').html(data.Detail_Deskripsi);

            $('#lbNama').html(data.Nama);
            $('#lbKontak').html(data.Kontak);
            $('#lbKantor').html(data.Kantor);
            $('#lbAlamat').html(data.Alamat);

            $('#itemtbl').find("tr:gt(0)").remove();
            var item=JSON.parse(data.json_items);
            $.each(item, function(index,obj){
                $('#itemtbl tr:last').after('<tr><td>'+obj.itemcode+'</td><td>'+obj.itemname+'</td><td>'+obj.quantity+'</td><td>'+obj.note+'</td></tr>');
            });

            $('#facilitytbl').find("tr:gt(0)").remove();
            var facility=JSON.parse(data.json_facility);
            $.each(facility, function(index,obj){
                $('#facilitytbl tr:last').after('<tr><td>'+obj.keterangan+'</td><td>'+obj.from_date+'</td><td>'+obj.from_time+'</td><td>'+obj.to_date+'</td><td>'+obj.to_time+'</td></tr>');
            });

            $('#multitimetbl').find("tr:gt(0)").remove();
            var multitime=JSON.parse(data.json_multitime);
            $.each(multitime, function(index,obj){
                $('#multitimetbl tr:last').after('<tr><td>'+obj.from_time+'</td><td>'+obj.to_time+'</td><td>'+obj.location+'</td></tr>');
            });

            $('#approvedbytbl').find("tr:gt(0)").remove();
            var approvedby=JSON.parse(data.approvedby);
            $.each(approvedby, function(index,obj){
                $('#approvedbytbl tr:last').after('<tr><td>'+obj.id+'</td><td>'+obj.nama_lengkap+'</td><td>'+obj.position+'</td><td>'+obj.created_at+'</td><td>'+obj.catatan+'</td></tr>');
            });
            
            $('#id').val(data.id);

            $('#btnsimpan').hide();
            
            if ((data.statusid==1||data.statusid==3)&&data.isapprover==1){
                $('#btnapprove').show();
                $('#btnreject').show();
            } else {
                $('#btnapprove').hide();
                $('#btnreject').hide();
            }

            if (data.statusid==2){
                $('#divcetak').show();
            } else {
                $('#divcetak').hide();
            }


            if (data.alasan_reject!=''){
                $('#elalasan').show();
                $('#lbalasan').show();
                $('#txalasan').hide();
                $('#lbalasan').html(data.alasan_reject);
            } else {
                $('#elalasan').hide();
                $('#lbalasan').hide();
            }
        }
    );
}
function validate(){
    var id = $("#id").val();
    if(id>0){
        approve();
    } else {
        simpandata();
    }
}
function approve(statusid){
    var id = $("#id").val();
    var alasan = $("#alasan").val();
    alert(alasan);
    
    if (statusid==4&alasan==''){
        alert('Mohon Input Alasan Reject');
        $('#elalasan').show();
        $('#txalasan').show();
        return false;
    } else {
        $('#elalasan').hide();
    }

    alert(id);
    $.ajax({
        url: '<?php echo base_url('m_surat_jalan_progress');?>',
        type: 'POST',
        data: {
            id: id,
            status: statusid,
            comment: alasan
            },
        success: function (result) {
            var data=jQuery.parseJSON(result);

            if (data.status=='Gagal'){
                alert(data.keterangan);
            } else {
                var status_ket='Approved';

                if (statusid==4) status_ket='Rejected';

                alert(status_ket+data.id);
                $('#statusrow'+id).html(status_ket);
                listdata();
            }
        }
    });
}
function applyrole(){
    $.getJSON(
        "<?php echo base_url('surat_jalan_detail')?>", 
        data={
            "idtenant":$('#unit').val(),
            "idcategory":$('#category').val()
        },
        function(data, status){
            //validate time start
            //validate contractor
            if (data.show_contractor==1) {
                $('#kontraktor').show();
            } else {
                $('#kontraktor').hide();
            }
            //validate item
            if (data.show_item>0) {
                $('#item').show();
            } else {
                $('#item').hide();
            }
            //validate facility
            
            if (data.show_facility==1) {
                $('#facility').show();
            } else {
                $('#facility').hide();
            }
            //validate multitime
            if (data.multipledate==1) {
                $('#multitime').show();
            } else {
                $('#multitime').hide();
            }
            
            

        }
    );
    
}

function simpandata(){
    
    $.ajax({
        url: '<?php echo base_url('permissionrequest');?>',
        type: 'POST',
        data: $(this).serialize(),
        success: function (result) {
            var data=jQuery.parseJSON(result);

            if (data.status=='Gagal'){
                alert(data.keterangan);
            } else {
                alert("Approved "+data.id);
                $('#statusrow'+id).val('Approved');
                listdata();
            }
        }
    });
}
$(document).ready( function () {
    $('#table_id').DataTable({
        "order": [[ 0, "desc" ]],
        "columnDefs": [
            {
                "targets": [ 0 ],
                "visible": false,
                "searchable": false
            }
        ]
    });
    listdata();

} );
</script>