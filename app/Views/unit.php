<div class="card">
  <div class="card-header">
    <h1>LK3</h1>
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
                <td>
                    <span id="spinner<?php echo $row->id?>" class="spinner-border spinner-border-sm" role="status" aria-hidden="true" style="display:none"></span>
                    <a href="javascript:view(<?php echo $row->id?>)">
                    <div id="numberrow<?php echo $row->id;?>">
                    <?php echo $row->id?>
                    </a>
                </td>
                <td><div id="departemenrow<?php echo $row->id?>"><?php echo $row->buildingid?></div></td>
                <td><?php echo $row->unit_code?></td>
                <td><?php echo $row->Keterangan?></td>
                <td><?php echo $row->detail?></td>

            </tr>
            <?php }?>
        </tbody>
    </table>
</div>
<div id='form'">
    <form method="post" action="<?php echo base_url('lk3');?>"  enctype="multipart/form-data">
        <p>LK3 INFORMATION
        <div class="form-row">
            <div class="form-group col-md-6">
                <div id="pilihkategory">
                <label for="formGroupnote">Area</label>
                <div id="eltipecategory">
                    <select class="form-control"  id="building" name="building">
                        <option value=''>Pilih Area</option>
                        <?php foreach($m_building as $row) {?>
                            <option value='<?php echo $row->id;?>'><?php echo $row->Keterangan;?></option>
                        <?php }?>
                    </select>
                </div>
                <div id='lbtipecategory'></div>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="formGroupnote">Asset</label>
                <div id="elasset">
                    <input class="form-control" type='text' id='asset' name='asset' value=''>
                </div>
                <div id='lbasset' style="display: none"></div>
            </div>
            <div class="form-group col-md-6">
                <label for="formGroupnote">Quantity</label>
                <div id="elquantity">
                    <input class="form-control" type='text' id='quantity' name='quantity' value=''>
                </div>
                <div id='lbquantity' style="display: none"></div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="formGroupnote">Location</label>
                <div id="ellocation">
                    <input class="form-control" type='text' id='location' name='location' value=''>
                </div>
                <div id='lblocation' style="display: none"></div>
            </div>
            <div class="form-group col-md-6">
                <div><label for="formGroupnote">Urgent</label></div>
                <div id="elurgent" class="form-check form-check-inline">
                    <div><input class="form-check-input" type='radio' id='urgent' name='urgent' value='urgent'>Urgent</div>
                </div>
                <div id="elnormal" class="form-check form-check-inline">
                    <div><input class="form-check-input" type='radio' id='urgent' name='urgent' value='normal'>Normal</div>
                </div>
                <div id='lburgent' style="display: none"></div>
            </div>
        </div>
        

        <div class="form-row">
            <div class="form-group col-md-12">
                <div id='approvedby' style="display:none">
                    <p><h2>Progress</h2>
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
            <input type='hidden' id='nama_lengkap' name='nama_lengkap' value='<?php echo $user['nama_lengkap'];?>'>
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
function sendcomments(){
    var comment=$('#comment').val();
    var id=$('#id').val();
    var nama_lengkap=$('#nama_lengkap').val();

    $.ajax({
            url: '<?php echo base_url('m_comment_lk3');?>',
            type: 'POST',
            data: {
                "id":id,
                "comment":comment
                },
            success: function (result) {
                var obj=jQuery.parseJSON(result);
                
                $('#commentlisttbl tr:last').after('<tr><td>'+obj.created_at+'</td><td>'+nama_lengkap+'</td><td>'+obj.Keterangan+'</td></tr>');
                $('#comment').val('');
            }
    });
}
function showelements(){
    $('#elunit').show();
    $('#lbunit').hide();

    $('#eljeniscomplainid').show();
    $('#lbjeniscomplainid').hide();

    $('#eltitle').show();
    $('#lbtitle').hide();

    $('#elnote').show();
    $('#lbnote').hide();

    $('#elasset').show();
    $('#lbasset').hide();

    $('#elquantity').show();
    $('#lbquantity').hide();

    $('#elquantity').show();
    $('#lbquantity').hide();

    $('#ellocation').show();
    $('#lblocation').hide();

    $('#elurgent').show();
    $('#lburgent').hide();

    $('#elnormal').show();
    $('#lbnormal').hide();

    $('#elimage1').show();
    $('#lbimage1').hide();

    $('#elimage2').show();
    $('#lbimage2').hide();

    $('#elimage3').show();
    $('#lbimage3').hide();

    $('#eltipecategory').show();
    $('#lbtipecategory').hide();

    

    $('#elalasan').show();
    $('#lbalasan').hide();
    

    $('#btnapprove').hide();

    // $('#pilihkategory').hide();
    $('#pilihdepartemen').hide();
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

    $('#elasset').hide();
    $('#lbasset').show();

    $('#elquantity').hide();
    $('#lbquantity').show();

    $('#elquantity').hide();
    $('#lbquantity').show();

    $('#ellocation').hide();
    $('#lblocation').show();

    $('#elurgent').hide();
    $('#lburgent').show();
    
    $('#elnormal').hide();
    $('#lbnormal').show();

    $('#elasset').show();
    $('#lbasset').hide();

    $('#elquantity').show();
    $('#lbquantity').hide();

    $('#elquantity').show();
    $('#lbquantity').hide();

    $('#ellocation').show();
    $('#lblocation').hide();

    $('#elurgent').show();
    $('#lburgent').hide();
    

    $('#elimage1').hide();
    $('#lbimage1').show();

    $('#elimage2').hide();
    $('#lbimage2').show();

    $('#elimage3').hide();
    $('#lbimage3').show();

    $('#eltipecategory').hide();
    $('#lbtipecategory').show();


    $('#elalasan').hide();
    $('#lbalasan').show();

    
}

function view(id){
    $('#spinner'+id).show();
    $('#action'+id).val('Loading...');
    $('#action'+id).prop('disabled', true);
    showlable();
    $.getJSON(
        "<?php echo base_url('LK3')?>", 
        data={
            "id":id,
        },
        function(data, status){
            //validate time start
            //validate contractor
            tambahdata();
            showlable();
            
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

            $('#lbunit').html(data.facility_name);
            $('#lbtipecategory').html(data.building_name);


            $('#lbjeniscomplainid').html(data.departemen_name);
            
            $('#lbalasan').html(data.reason_name);

            $("#tipecategory").val(data.category);
            $("#departemen").val(data.departemenid);

            $("#elasset").hide();
            $("#lbasset").show();

            $("#elquantity").hide();
            $("#lbquantity").show();
            
            $("#ellocation").hide();
            $("#lblocation").show();

            $("#elurgent").hide();
            $("#elnormal").hide();
            $("#lburgent").show();

            $("#lbasset").html(data.asset);
            $("#lbquantity").html(data.quantity);
            $("#lblocation").html(data.location);
            $("#lburgent").html(data.urgent);
            
            jQuery('#img1').removeAttr('src')
            jQuery('#img1').show();
            jQuery('#img2').removeAttr('src')
            jQuery('#img2').show();
            jQuery('#img3').removeAttr('src')
            jQuery('#img3').show();


            if (data.media_1!='') $("#img1").prop('src','<?php echo base_url();?>/UploadController_lk3?id='+id+'&mediaid=1');
            if (data.media_2!='') $("#img2").prop('src','<?php echo base_url();?>/UploadController_lk3?id='+id+'&mediaid=2');
            if (data.media_3!='') $("#img3").prop('src','<?php echo base_url();?>/UploadController_lk3?id='+id+'&mediaid=3');
            
            $('#pilihkategory').show();
            $('#pilihdepartemen').show();

            if (data.status>=1){
                $('#btnapprove').show();
            } else {
                $('#btnapprove').hide();
            }

            $('#approvedby').show();   
            $('#ctcomment').show();           
            $('#pilihalasan').hide();

            var content='';
            if (data.hasaccess){
                
                if (data.json_otheropsi!=null){
                    if (data.json_otheropsi!=''){
                        var otheropsi=JSON.parse(data.json_otheropsi);
                        $.each(otheropsi, function(index,obj){
                            content=content+'<input type="button" value="'+obj.btnlabel+'" onclick="approvebyid('+obj.servicestatusid+',\''+obj.status+'\')" id="btn'+obj.btnlabel.replace(' ','')+'">';
                        });
                    }
                } else {
                    alert(2);
                    if (data.nextaction!=null){
                        content='<input type="button" value="'+data.nextaction+'" onclick="approve()" id="btnapprove">';
                    } 
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

            var comment=data.comments;
            $('#commentlisttbl').find("tr:gt(0)").remove();
            $.each(comment, function(index,obj){
                $('#commentlisttbl tr:last').after('<tr><td width="20%">'+obj.created_at+'</td><td>'+obj.nama_lengkap+'</td><td>'+obj.Keterangan+'</td></tr>');
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
    
    
    if (status==2&&category==null){
        $('#pilihkategory').show();
        $('#pilihdepartemen').show();

        alert('pilih kategori');

        $('#eltipecategory').show();
        $('#lbtipecategory').hide();

        
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
        if (status==4){
            $('#btnPickJob').attr("disabled", true);
            $('#btnDone').attr("disabled", true);
            $('#btnCancel').val('Update');
        }
        if (status==7){
            $('#btnCancel').attr("disabled", true);
            $('#btnDone').attr("disabled", true);
            $('#btnPending').val('Update');
        }

        $('#elalasan').show();
        $('#lbalasan').hide();
    } else {
        $.ajax({
            url: '<?php echo base_url('LK3_progress');?>',
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
                    alert("Tenant Complain Approved "+data.id);
                    $('#statusrow'+id).html(action);
                    $('#numberrow'+id).html('<a href="javascript:view('+id+')">'+id+'</a>');

                    if (status==2){
                        var selected_category=$('#tipecategory :selected').text();
                        
                        $('#categoryrow'+id).html(selected_category);
                        $('#departemenrow'+id).html($('#departemen :selected').text());
                    }
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
   $('#ctcomment').hide();

}
function listdata(){
   $('#list').show();
   $('#form').hide();

   showelements();

    $('#pilihalasan').hide();
   $('#approvedby').hide();
   $('#ctcomment').hide();
}
$(document).ready( function () {
    $('#table_id').DataTable({
        "order": [[ 0, "desc" ]]
    });
    listdata();
} );
</script>