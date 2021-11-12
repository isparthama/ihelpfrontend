<center><strong>Daftar Surat Ijin Dikeluarkan TD Untuk Tenant</strong></center>
<center>Tanggal <?php echo $from_date;?> s/d <?php echo $from_date;?></center>
<p></p>
<table width="100%">
    <theader>
        <tr>
            <th>Tenant</th>
            <th>PIC</th>
            <th>No Surat / 
            Tanggal & Jam /
            Detail </th>
            <th>Fasilitas</th>
            <th>Barang</th>
            <th>Status</th>
        </tr>
        <?php foreach($data as $row){?>
            <tr>
            <td><?php echo $row->tenant_name;?></td>
            <td><?php echo $row->Pic;?></td>
            <td><?php echo $row->suratjalan
            ."<br>Tgl:".$row->Mulai." s/d ".$row->Selesai
            ."<br>Tgl:".$row->Mulai." s/d ".$row->Selesai
            ;?>
            </td>

            <td>Fasilitas</td>
            <td>Barang</td>
            <td>Status</td>
            </tr>   
        <?php }?>
    </theader>
<table>