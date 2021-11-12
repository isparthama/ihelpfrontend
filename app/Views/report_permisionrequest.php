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
            ."<br>Tgl:".$row->start_date." s/d ".$row->end_date
            ."<br>Waktu:".$row->waktumulai." s/d ".$row->waktuselesai
            ."<br>Judul:".$row->Judul
            ."<br>Detail:".$row->Detail_Deskripsi
            ;?>
            </td>

            <td><?php foreach($row->facility as $rowf){?>
                <?php echo $rowf->keterangan.
                "<br>Tgl: ".$rowf->from_date." s/d ".$rowf->to_date.
                "<br>Waktu: ".str_replace(':00.0000000','',$rowf->from_time)." s/d ".str_replace(':00.0000000','',$rowf->to_time)
                ;?>
                
            <?php }?></td>
            <td><?php foreach($row->item as $rowf){?>
                <?php echo $rowf->itemname.
                "<br>Qty: ".$rowf->quantity
                ;?>
                
            <?php }?></td>
            <td><?php echo $row->ketstatus?></td>
            </tr>   
        <?php }?>
    </theader>
<table>