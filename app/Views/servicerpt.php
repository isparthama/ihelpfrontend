<div class="card">
  <div class="card-header">
        <h1>REPORT TENANT COMPLAIN</h1><strong><div id='status'></div></strong>
  </div>
  <div class="card-body">


<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/DataTables/datatables.css');?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/DataTables/jquery-ui.css');?>">
<script type="text/javascript" charset="utf8" src="<?php echo base_url('assets/DataTables/jquery-3.6.0.min.js');?>"></script>
<script type="text/javascript" charset="utf8" src="<?php echo base_url('assets/DataTables/jquery-ui.js');?>"></script>
<script type="text/javascript" charset="utf8" src="<?php echo base_url('assets/DataTables/datatables.js');?>"></script> 

<form method="POST" action="<?php echo base_url('servicerpt/printreport');?>" target="_blank" id="myform">
<div id='list'>
    <div class="form-row">
        <div class="form-group col-md-2">
            <label for="formGroupstart_date">From</label>
            <div id='elend_date'><input class="form-control" type='text' id='from_date' name='from_date'></div>
        </div>
        <div class="form-group col-md-2">
            <label for="formGroupstart_date">Until</label>
            <div id='elend_time'><input class="form-control" type='text' id='to_date' name='to_date'></div>
        </div>
        <div class="form-group col-md-2">
            <label for="formGroupstart_date">Jenis Laporan</label>
            <div id='elend_time'>
                <select class="form-control" id='jenis_laporan' name='jenis_laporan'>
                    <option value="">Pilih Jenis Laporan</option>
                    <?php foreach ($m_business_group as $row){?>
                    <option value="<?php echo $row->id?>"><?php echo $row->Keterangan?></option>
                    <?php }?>

                </select>
            </div>
        </div>
        <div class="form-group col-md-2">
            <label for="formGroupstart_date">Status</label>
            <div id='elend_time'>
                <select class="form-control" id='status' name='status'>
                    <option value="">Pilih Status</option>
                    <?php foreach ($m_service_status as $row){?>
                    <option value="<?php echo $row->id?>"><?php echo $row->Keterangan?></option>
                    <?php }?>

                </select>
            </div>
        </div>
        <div class="form-group col-md-3">
            <div><label for="formGroupstart_date">&nbsp</label></div>
            <div><button type="button" class="btn btn-primary mb-3 addperiksa">Filter</button>
            <button type="button" class="btn btn-primary mb-3 adddownload">Print PDF</button></div>
        </div>
        
    </div>
    </form>      
    <p><table id="table_id" class="display">
        <thead>
            <tr>
                <th>id  
                <th>No.</th>
                <th>Type</th>
                <th>Category</th>
                <th>Judul Laporan</th>
                <th>Tenant</th>
                <th>Building</th>
                <th>Floor</th>
                <th>UnitID</th>
                <th>Assign Dept.</th>
                <th>Assign Date</th>
                <th>Done Date</th>
                <th>Done By</th>
                <th>Status</th>
                <th>BusinessType</th>
                <th>ProgressLaporanDetail</th>
                <th>Comment</th>

            </tr>
        </thead>
        
    </table>
</div>
<script>
function printreport(){
    $from_date=$('#from_date').val();
    $to_date=$('#to_date').val();
    $status=$('#status').val();

    alert($from_date);
}
$(document).ready( function () {
    
    const addDownload = $('.adddownload');
    $('#table_id').DataTable({
    });

    $('#from_date').datepicker({ dateFormat: 'yy-mm-dd' });
    $('#to_date').datepicker({ dateFormat: 'yy-mm-dd' });

    addDownload.click(function() {
        var from_date=$('#from_date').val();
        var to_date=$('#to_date').val();
        var status=$('#status').val();

        var data={
            "form_date":from_date,
            "to_date":to_date,
            "status":status
        }

        jQuery('#data').val(data);
        jQuery('#myform').submit();
    })
} );


</script>