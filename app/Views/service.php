<div class="card">
  <div class="card-header">
    <h1>TENANT COMPLAIN</h1>
  </div>
  <div class="card-body">

<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/DataTables/datatables.css');?>">
<script type="text/javascript" charset="utf8" src="<?php echo base_url('assets/DataTables/jquery-3.6.0.min.js');?>"></script>
<script type="text/javascript" charset="utf8" src="<?php echo base_url('assets/DataTables/datatables.js');?>"></script> 
<div id='list'>
    <p><input type="button" value="Tambah Data" onclick="tambahdata()">
    <table id="table_id" class="display">
        <thead>
            <th>No</th>
            <th>Status</th>
            <th>Building</th>
            <th>Tenant</th>
            <th>Title</th>
            <th>Header Category</th>
            <th>Category</th>
            <th>Type</th>
            <th>Open Date</th>
            <th>Actions</th>
        </thead>
        <tbody>
            <?php foreach($transaksi as $row){?>
            <tr>
                <td><a href="javascript:view(<?php echo $row->id?>)">
                    <span id="spinner<?php echo $row->id?>" class="spinner-border spinner-border-sm" role="status" aria-hidden="true" style="display:none"></span>
                    <?php echo $row->id?>
                    </a>
                </td>
                <td><div id="statusrow<?php echo $row->id?>"><?php echo $row->status?></div></td>
                <td><?php echo $row->building?></td>
                <td><?php echo $row->tenant_name?></td>
                <td><?php echo $row->title?></td>
                <td><?php echo $row->keterangan?></td>
                <td><?php echo $row->departemen?></td>
                <td><?php echo $row->category?></td>
                <td><?php echo $row->created_at?></td>
                <td><input type="button" id='action<?php echo $row->id;?>' value='View' onclick='javascript:view(<?php echo $row->id;?>)'></input>
                </td>

            </tr>
            <?php }?>
        </tbody>
    </table>
</div>
<div id='form'">
    <form method="post" action="<?php echo base_url('service');?>"  enctype="multipart/form-data">
        <p>COMPLAIN INFORMATION
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="formGroupunit">Tenant</label>
                <div id="elunit">
                    <select class="form-control" id='unit' name='unit' onchange='javascript:gettenant()'>
                        <?php if($user['role']==2){?>}
                        <option value=''>Pilih Unit</option>
                        <?php }?>
                        <?php foreach ($units as $row){?>
                            <option value='<?php echo $row->id;?>'><?php echo $row->tenant_name;?></option>
                        <?php }?>
                    </select>
                </div>
                <div id='lbunit'></div>
            </div>
            <div class="form-group col-md-3">
                <div style="display: none">Name</div>
                <div id="elname" style="display: none"><input class="form-control" type='label' id='name' name='name' value=''></div>
                <div id='lbname' style="display: none"></div>
            </div>
            <div class="form-group col-md-3">
                <div style="display: none">Detail</div>
                <div id="eldetail" style="display: none"><input class="form-control" type='label' id='detail' name='detail' value=''></div>
                <div id='lbdetail' style="display: none"></div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="formGrouptitle">Title</label>
                <div id="eltitle"><input class="form-control" type='text' id='title' name='title' value=''></div>
                <div id='lbtitle' style="display: none"></div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="formGroupcategory">Category</label>
                <div id="eljeniscomplainid">
                    <select class="form-control" id='category' name='category'>
                        <option value=''>Pilih Category</option>
                        <?php foreach ($jeniscomplain as $row){?>
                            <option value='<?php echo $row->id;?>'><?php echo $row->Keterangan;?></option>
                        <?php }?>
                    </select>
                </div>
                <div id='lbjeniscomplainid'></div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="formGroupnote">Note</label>
                <div id="elnote">
                    <input class="form-control" type='text' id='note' name='note' value=''>
                </div>
                <div id='lbnote' style="display: none"></div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="formGroupnote">Picture 1</label>
                <div id="elimage1"><input class="form-control" type='file' id='image1' name='image1' value=''></div>
                <div id='lbimage1' style="display: none"><img src="" id="img1" width='250' height='250'></div>
            </div>
            <div class="form-group col-md-4">
                <label for="formGroupnote">Picture 2</label>
                <div id="elimage2"><input class="form-control" type='file' id='image2' name='image2' value=''></div>
                <div id='lbimage2' style="display: none"><img src="" alt="" class="imgfile" data-target='att2' id="img2"  width='250' height='250'></div>
            </div>
            <div class="form-group col-md-4">
                <label for="formGroupnote">Picture 3</label>
                <div id="elimage3"><input class="form-control"  type='file' id='image3' name='image3' value=''></div>
                <div id='lbimage3' style="display: none"><img src="" alt="" class="imgfile" data-target='att3' id="img3"  width='250' height='250'></div>
            </div>
        </div>

        <div>
            <input type='hidden' id='id' name='id' value=''>
            <input type='hidden' id='status' name='status' value=''>
            <input type='hidden' id='statusket' name='statusket' value=''>
        </div>

        <div class="form-row">
            <div class="form-group col-md-12">
                <div id="pilihkategory" style="display:none">
                    <label for="formGroupnote">Kategory</label>
                    <div id="eltipecategory">
                        <select class="form-control"  id="tipecategory" name="tipecategory">
                            <option value=''>Pilih Kategory</option>
                            <?php foreach($m_category as $row) {?>
                                <option value='<?php echo $row->id;?>'><?php echo $row->Keterangan;?></option>
                            <?php }?>
                        </select>
                    </div>
                    <div id='lbtipecategory'></div>
                    <label for="formGroupnote">Departemen</label>
                    <div id="eldepartemen">
                        <select class="form-control"  id="departemen" name="departemen">
                            <option value=''>Pilih Departemen</option>
                            <?php foreach($m_departemen as $row) {?>
                                <option value='<?php echo $row->id;?>'><?php echo $row->Keterangan;?></option>
                            <?php }?>
                        </select>
                    </div>
                    <div id='lbdepartemen'></div>
                </div>
            </div>
        </div>                                                                                                  
        <div class="form-row">
            <div class="form-group col-md-12">
                <div id="pilihalasan" style="display:none">
                    <label for="formGroupnote">Alasan</label>
                    <div id="elalasan">
                        <select class="form-control" id="alasan" name="alasan">
                            <option value=''>Pilih Alasan</option>
                            <?php foreach($m_category as $row) {?>
                                <option value='<?php echo $row->id;?>'><?php echo $row->Keterangan;?></option>
                            <?php }?>
                        </select>
                    </div>
                    <div id='lbalasan'></div>
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-12">
                <div id='approvedby' style="display:none">
                    <p><h2>Approved By</h2>
                    <table class="table table-bordered" id="approvedbytbl">
                        <thead>
                            <tr>
                                <th>Action</th>
                                <th>Action Time</th>
                                <th>Staff</th>
                                <th>Position</th>
                                <th>Note</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Number</td>
                                <td>Staff</td>
                                <td>Position</td>
                                <td>Approved Date</td>
                                <td>Note</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div id="btngroup">
                <input type="Submit" value="Simpan" id="btnsimpan">
                <input type="button" value="Approve" onclick="approve()" id="btnapprove">
                <input type="button" value="Back" onclick="listdata()">
            </div>
        </div>
    </form>
</div>
        </div>
    </div>
<script>
function showelements(){
    $('#elunit').show();
    $('#lbunit').hide();

    $('#eljeniscomplainid').show();
    $('#lbjeniscomplainid').hide();

    $('#eltitle').show();
    $('#lbtitle').hide();

    $('#elnote').show();
    $('#lbnote').hide();

    
    $('#elimage1').show();
    $('#lbimage1').hide();

    $('#elimage2').show();
    $('#lbimage2').hide();

    $('#elimage3').show();
    $('#lbimage3').hide();

    $('#eltipecategory').show();
    $('#lbtipecategory').hide();

    $('#eldepartemen').show();
    $('#lbdepartemen').hide();

    $('#elalasan').show();
    $('#lbalasan').hide();
    

    $('#btnapprove').hide();

    $('#pilihkategory').hide();
}

function showlable(){
    $('#elunit').hide();
    $('#lbunit').show();

    $('#eljeniscomplainid').hide();
    $('#lbjeniscomplainid').show();

    $('#eltitle').hide();
    $('#lbtitle').show();

    $('#elnote').hide();
    $('#lbnote').show();

    $('#elimage1').hide();
    $('#lbimage1').show();

    $('#elimage2').hide();
    $('#lbimage2').show();

    $('#elimage3').hide();
    $('#lbimage3').show();

    $('#eltipecategory').hide();
    $('#lbtipecategory').show();

    $('#eldepartemen').hide();
    $('#lbdepartemen').show();

    $('#elalasan').hide();
    $('#lbalasan').show();

    
}

function view(id){
    $('#spinner'+id).show();
    $('#action'+id).val('Loading...');
    $('#action'+id).prop('disabled', true);
    showlable();
    $.getJSON(
        "<?php echo base_url('service')?>", 
        data={
            "id":id,
        },
        function(data, status){
            //validate time start
            //validate contractor
            tambahdata();

            $("#status").val("");
            $("#tipecategory").val("");
            $("#departemen").val("");
            $("#alasan").val("");
            $("#statusket").val("");
            

            $('#lbunit').html(data.tenant_name);
            $('#lbjeniscomplainid').html(data.keterangan);
            $('#lbtitle').html(data.title);
            $('#lbnote').html(data.desc);

            $('#id').val(data.id);
            $('#status').val(data.nextactionid);
            $('#statusket').val(data.nextaction);

            $('#lbtipecategory').html(data.kategori_name);
            $('#lbdepartemen').html(data.departemen_name);
            $('#lbalasan').html(data.reason_name);
            

            // loadImage('uploads/'+data.media_1, 800, 800, '#lbimage_1');

            if (data.media_1!='') $("#img3").prop('src','http://localhost:8080/ihelpfrontend/public/UploadController?id='+id+'&mediaid=3');
            if (data.media_2!='') $("#img2").prop('src','http://localhost:8080/ihelpfrontend/public/UploadController?id='+id+'&mediaid=2');
            if (data.media_3!='') $("#img1").prop('src','http://localhost:8080/ihelpfrontend/public/UploadController?id='+id+'&mediaid=1');
            
            // $("#image3, #image2, #image1").load(function(){
            //     //This is ourcallback. Once our images have loaded, we display an alert
            //     // alert("loaded!");
            // });
            // $("#image1").prepend($('<img>',{id:'theImg',src:'http://localhost:8080/ihelpfrontend/public/UploadController?id=55&mediaid=1'}));
            // $("#image2").attr("src", data.media_2);
                
            // loadImage('uploads/'+data.media_2, 800, 800, '#lbimage_2');
            // loadImage('uploads/'+data.media_3, 800, 800, '#lbimage_3');

            $('#pilihkategory').show();

            if (data.status>=1){
                $('#btnapprove').show();
            } else {
                $('#btnapprove').hide();
            }

            $('#approvedby').show();
            $('#pilihalasan').show();

            var content='';
            if (data.json_otheropsi!=null){
                var otheropsi=JSON.parse(data.json_otheropsi);
                $.each(otheropsi, function(index,obj){
                    content=content+'<input type="button" value="'+obj.btnlabel+'" onclick="approvebyid('+obj.servicestatusid+',\''+obj.status+'\')" id="btn'+obj.btnlabel+'">';
                });
                
            } else {
                if (data.nextaction!=null){
                    content='<input type="button" value="'+data.nextaction+'" onclick="approve()" id="btnapprove">';
                } 
            }
            content=content+'<input type="button" value="Back" onclick="listdata()">';
            $('#btngroup').html(content);

            $('#approvedby').show();
            var progress=data.progress;
            $('#approvedbytbl').find("tr:gt(0)").remove();
            $.each(progress, function(index,obj){
                $('#approvedbytbl tr:last').after('<tr><td>'+obj.keterangan+'</td><td>'+obj.created_at+'</td><td>'+obj.nama_lengkap+'</td><td>'+obj.position+'</td><td>'+obj.catatan+'</td></tr>');
            });


            $('#spinner'+id).hide();
            $('#action'+id).val('View');
            $('#action'+id).prop('disabled', false);
        }
    );
}

function approvebyid(servicestatusid,status){
    $("#status").val(servicestatusid);
    $("#statusket").val(status);
    approve();
}
function approve(){
    var id = $("#id").val();
    var status = $("#status").val();
    var category=$("#tipecategory").val();
    var departemen=$("#departemen").val();
    var alasan=$("#alasan").val();
    var action=$("#statusket").val();
    
    alert(status);
    alert(alasan);

    if (status==2&&category==''){
        $('#pilihkategory').show();

        alert('pilih kategori');

        $('#eltipecategory').show();
        $('#lbtipecategory').hide();

        $('#eldepartemen').show();
        $('#lbdepartemen').hide();
        
    } else if ((status==7||status==4)&&alasan==''){
        $.ajax({
            url: '<?php echo base_url('m_service_status_reason');?>',
            type: 'GET',
            data: {
                status: status,
                },
            success: function (result) {
                var data=jQuery.parseJSON(result);

                $('#alasan').find('option').remove();
                $('#alasan').append('<option value="">Pilih Alasan</option>');
                $.each(data, function(index,obj){
                    $('#alasan').append('<option value="'+obj.id+'">'+obj.Keterangan+'</option>');
                });
            }
        });
        $('#pilihalasan').show();

        alert('pilih alasan');

        $('#elalasan').show();
        $('#lbalasan').hide();
    } else {
        $.ajax({
            url: '<?php echo base_url('t_transaksi_progress');?>',
            type: 'POST',
            data: {
                id: id,
                status: status,
                category: category,
                departemen: departemen,
                alasan: alasan,
                },
            success: function (result) {
                var data=jQuery.parseJSON(result);

                if (data.status=='Gagal'){
                    alert(data.keterangan);
                } else {
                    alert("Approved "+data.id);
                    $('#statusrow'+id).html(action);
                    listdata();
                }
            }
        });
    }
}

function tambahdata(){
   $('#list').hide();
   $('#form').show();

    var content='<input type="Submit" value="Simpan" id="btnsimpan">';
    content=content+'<input type="button" value="Back" onclick="listdata()">';
    $('#btngroup').html(content);
   
   $('#approvedby').hide();

}
function listdata(){
   $('#list').show();
   $('#form').hide();

   showelements();

    $('#pilihalasan').hide();
   $('#approvedby').hide();
}
$(document).ready( function () {
    $('#table_id').DataTable({
        "order": [[ 0, "desc" ]]
    });
    listdata();
} );
</script>