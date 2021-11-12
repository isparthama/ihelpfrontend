<div class="card">
  <div class="card-header">
        <h1>REPORT PERMISSION REQUEST PAL</h1><strong><div id='status'></div></strong>
  </div>
  <div class="card-body">


<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/DataTables/datatables.css');?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/DataTables/jquery-ui.css');?>">
<script type="text/javascript" charset="utf8" src="<?php echo base_url('assets/DataTables/jquery-3.6.0.min.js');?>"></script>
<script type="text/javascript" charset="utf8" src="<?php echo base_url('assets/DataTables/jquery-ui.js');?>"></script>
<script type="text/javascript" charset="utf8" src="<?php echo base_url('assets/DataTables/datatables.js');?>"></script> 
<form method="POST" action="<?php echo base_url('permissionrequestrpt/printreport');?>" target="_blank" id="myform">
<div id='list'>
    <div class="form-row">
        <div class="form-group col-md-3">
            <label for="formGroupstart_date">From</label>
            <div id='elend_date'><input class="form-control" type='text' id='from_date' name='from_date'></div>
        </div>
        <div class="form-group col-md-3">
            <label for="formGroupstart_date">Until</label>
            <div id='elend_time'><input class="form-control" type='text' id='to_date' name='to_date'></div>
        </div>
        <div class="form-group col-md-3">
            <label for="formGroupstart_date">Status</label>
            <div id='elend_time'>
                <select class="form-control" id='status' name='status'>
                    <option value="">Pilih Status</option>
                    <option value="1">Open</option>
                    <option value="2">On Progress</option>
                    <option value="3">Approved</option>
                    <option value="4">Disapproved</option>

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
        "order": [[ 0, "desc" ]]
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