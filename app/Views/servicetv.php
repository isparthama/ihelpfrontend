<div class="card">
  <div class="card-header">
    <h1>TENANT COMPLAIN</h1>
  </div>
  <div class="card-body">

<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/DataTables/datatables.css');?>">
<script type="text/javascript" charset="utf8" src="<?php echo base_url('assets/DataTables/jquery-3.6.0.min.js');?>"></script>
<script type="text/javascript" charset="utf8" src="<?php echo base_url('assets/DataTables/datatables.js');?>"></script> 
<div id='list'>
    <table id="table_id" class="display">
        <thead>
            <th>Tenant</th>
            <th>Judul</th>
            <th>Tanggal</th>
            <th>Status</th>
            <th>Assign To</th>
            <th>Lokasi</th>
            <th>Type</th>
            
        </thead>
        <tbody>
            <?php foreach($transaksi as $row){?>
            <tr>
                <td><?php echo $row->tenant_name?></td>
                <td><?php echo $row->title?></td>
                <td><?php echo $row->created_at?></td>
                <td><?php echo $row->status?></td>
                <td></td>
                <td><?php echo $row->building?></td>
                
                
                <td><?php echo $row->keterangan?></td>
                

            </tr>
            <?php }?>
        </tbody>
    </table>
</div>

        </div>
    </div>
<script>

$(document).ready( function () {
    $('#table_id').DataTable({
        "order": [[ 0, "desc" ]]
    });
    listdata();
} );
</script>