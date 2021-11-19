<head>
    <style>
        html {
            font: 12px "Fira Sans", sans-serif;
        }
    </style>
</head>
<center><strong>Laporan Tenant Complain</strong></center>
<center>Tanggal <?php echo $from_date;?> s/d <?php echo $to_date;?></center>
<center>Jenis Laporan <?php echo $jenis_laporan?></center>
<p></p>
<table width="100%">
    
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
    
        <?php foreach($data as $row){?>
            <tr>
            <td><?php echo $row->No;?></td>
            <td><?php echo $row->Type;?></td>
            <td><?php echo $row->Category;?></td>
            <td><?php echo $row->Judul_Laporan;?></td>
            <td><?php echo $row->Tenant;?></td>
            <td><?php echo $row->Building;?></td>
            <td><?php echo $row->Floor;?></td>
            <td><?php echo $row->UnitID;?></td>
            <td><?php echo $row->Assign_Dept;?></td>
            <td><?php echo $row->Assign_Date;?></td>
            <td><?php echo $row->Done_Date;?></td>
            <td><?php echo $row->Done_By;?></td>
            <td><?php echo $row->Status;?></td>
            <td><?php echo $row->BusinessType;?></td>
            <td><?php echo $row->ProgressLaporanDetail;?></td>
            <td><?php echo $row->Rating;?></td>
            <td><?php echo $row->Comment;?></td>
            </tr>   
        <?php }?>
    
<table>