<head>
    <style>
        html {
            font: 12px "Fira Sans", sans-serif;
        }
    </style>
</head>
<center><h2>Surat Ijin</h2>
<div><strong>No Surat :<?php echo $suratjalan->suratjalan;?></strong></div>
<div><?php echo $suratjalan->category;?></div>
</center>
<p>
<table width="100%">
    <tr>
        <td width="40%"><strong>PERIHAL</strong></td>
        <td width="5"><strong>:</strong></td>
        <td><strong><?php echo $suratjalan->Detail_Deskripsi;?></strong></td>
    </tr>
    <tr>
        <td colspan="3"><hr></td>
    </tr>
    <tr>
        <td colspan="3">Bersama ini kami memberikan Izin kepada</td>
    </tr>
    <tr>
        <td height="20" colspan="3"></td>
    </tr>
    <tr>
        <td width="40%">Nama Tenant</td>
        <td width="5">:</td>
        <td><?php echo $suratjalan->Pic;?></td>
    </tr>
    <tr>
        <td width="40%">Telp / HP</td>
        <td width="5">:</td>
        <td><?php echo $suratjalan->hp_pic;?></td>
    </tr>
    <tr>
        <td width="40%">Perusahaan / Toko</td>
        <td width="5">:</td>
        <td><?php echo $suratjalan->Tenant;?></td>
    </tr>
    <tr>
        <td width="40%">Alamat Perusahaan / Toko</td>
        <td width="5">:</td>
        <td><?php echo $suratjalan->unit;?></td>
    </tr>
    <tr>
        <td height="20" colspan="3"></td>
    </tr>
    <?php 
    if ($suratjalan->show_contractor==1){
        $kontraktor=json_decode($suratjalan->json_kontraktor);?>
    <tr>
        <td width="40%">Nama KONTRAKTOR</td>
        <td width="5">:</td>
        <td><?php echo $kontraktor->Nama;?></td>
    </tr>
    <tr>
        <td width="40%">Telp / HP</td>
        <td width="5">:</td>
        <td><?php echo $kontraktor->Kontak;?></td>
    </tr>
    <tr>
        <td width="40%">Perusahaan</td>
        <td width="5">:</td>
        <td><?php echo $kontraktor->Kantor;?></td>
    </tr>
    <tr>
        <td width="40%">Alamat</td>
        <td width="5">:</td>
        <td><?php echo $kontraktor->Alamat;?></td>
    </tr>
    <?php }?>
    <tr>
        <td height="20" colspan="3"></td>
    </tr>
    <tr>
        <td width="40%">Tanggal</td>
        <td width="5">:</td>
        <td><?php echo $suratjalan->formated_start_date;?> s/d <?php echo $suratjalan->formated_end_date;?></td>
    </tr>
    <tr>
        <td width="40%">Jam</td>
        <td width="5">:</td>
        <td><?php echo $suratjalan->start_time;?> s/d <?php echo $suratjalan->end_time;?></td>
    </tr>
</table>
<p><strong>Persyaratan</strong>
<br>1. Semua pekerja harus mengenakan tanda pengenal sendiri.
<br>2. Tenant/Kontraktor bertanggung jawab terhadap kerusakan gedung yang ditimbulkan.
<br>3. Tenant/Kontraktor bertanggung jawab terhadap safety pekerjaan dan kebakaran yang ditimbulkan dari pekerjaan tersebut.
<br>4. Menjaga Kebersihan dilokasi pekerjaan dan sekitarnya.
<br>5. Pemasukan dan pengeluaran barang besar harus menggunakan lift barang.
<br>6. Hal-hal yang tidak diatur dalam Surat Izin ini, tetap mengikuti ketentuan umum yang berlaku di PT. PAL.
<p>
<br>Demikian <strong>SURAT IZIN</strong> ini kami berikana untuk di pergunakan sebagaimana mestinya.
<p>Diketahui Oleh, <?php echo $suratjalan->signature_name;?> (BM)
<?php if ($suratjalan->show_item>0){?>
<p><table width=100%>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Qty</th>
        </tr>
        <?php 
        $items=json_decode($suratjalan->json_items);
        $no=1;
        foreach($items as $item){?>
        <tr bgcolor="lightgrey">
            <td width="30"><?php echo $no;?></th>
            <td><?php echo $item->itemname;?></th>
            <td><?php echo $item->quantity;?></th>
        </tr>
        <?php $no++;}?>
</table>
<?php }?>
<?php if ($suratjalan->show_facility>0){?>
<p><table width=100%>
        <tr>
            <th>No</th>
            <th>Facility</th>
            <th>Date From</th>
            <th>Time From</th>
            <th>Date To</th>
            <th>Time To</th>
        </tr>
        <?php 
        $facilities=json_decode($suratjalan->json_facility);
        $no=1;
        foreach($facilities as $facility){
            $from_time = new DateTime($facility->from_time);
            $to_time = new DateTime($facility->to_time);
            ?>
        <tr bgcolor="lightgrey">
            <td><?php echo $no;?></th>
            <td><?php echo $facility->ketfacility;?></th>
            <td style="text-align: center;"><?php echo $facility->from_date;?></th>
            <td><?php echo $from_time->format('H:i');?></th>
            <td><?php echo $facility->to_date;?></th>
            <td><?php echo $to_time->format('H:i');?></th>
        </tr>
        <?php $no++;}?>
</table>
<?php }?>
<?php if ($suratjalan->multipledate>0){?>
<p><table width=100%>
        <tr>
            <th>No</th>
            <th>Time From</th>
            <th>Time To</th>
            <th>Location</th>
        </tr>
        <?php 
        $multitimes=json_decode($suratjalan->json_multitime);
        $no=1;
        foreach($multitimes as $multitime){
            $from_time = new DateTime($multitime->from_time);
            $to_time = new DateTime($multitime->to_time);
            ?>
        <tr bgcolor="lightgrey">
            <td><?php echo $no;?></th>
            <td><?php echo $from_time->format('H:i');?></th>
            <td><?php echo $to_time->format('H:i');?></th>
            <td><?php echo $multitime->location;?></th>
        </tr>
        <?php $no++;}?>
</table>
<?php }?>
<p>Note: 
<p>
<p><strong>CC:</strong>
<br>TD, Security, BMS
<p>
<p>
<table width="100%">
    <tr>
        <td width="70%"></td>
        <td style="text-align: center">Jakarta, <?php echo $suratjalan->signature_date;?></td>
    </tr>
    <tr>
        <td width="70%"></td>
        <td style="text-align: center"><img id="logo" src="<?php echo base_url('/assets/images/'.$suratjalan->signature_image);?>" width="150" alt="Logo"></td>
    </tr>
    <tr>
        <td width="70%"></td>
        <td style="text-align: center"><?php echo $suratjalan->signature_name;?></td>
    </tr>
</table>
