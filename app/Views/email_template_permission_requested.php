<html>
<head>
    <style>
        html {
            font: 12px "Fira Sans", sans-serif;
        }
        .button {
            background-color: #008CBA;
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 12px;
            margin: 4px 2px;
            cursor: pointer;
        }
    </style>
</head>
<center><h2>New Permission Request !</h2></center>
<hr>
<table width="100%">
    <tr>
        <td width="40%">Unit</td>
        <td width="5">:</td>
        <td><strong><?php echo $permissionrequest->tenant_name;?></strong></td>
    </tr>
    <tr height="20"><tr>
    <tr>
        <td width="40%">Title</td>
        <td width="5">:</td>
        <td><strong><?php echo $permissionrequest->Judul;?></strong></td>
    </tr>
    <tr height="20"><tr>
    <tr>
        <td width="40%">Category</td>
        <td width="5">:</td>
        <td><strong><?php echo $permissionrequest->category;?></strong></td>
    </tr>
    <tr height="20"><tr>
    <tr>
        <td width="40%">Note</td>
        <td width="5">:</td>
        <td><strong><?php echo $permissionrequest->Detail_Deskripsi;?></strong></td>
    </tr>
    <tr height="20"><tr>
    <tr>
        <td width="40%">Requested by</td>
        <td width="5">:</td>
        <td><strong><?php echo $permissionrequest->Tenant;?></strong></td>
    </tr>
    <tr height="20"><tr>
    <tr>
        <td colspan=3>You had been assigned to validate this permission, by set this permission status to be approve or disapprove!</td>
    </tr>
    <tr height="20"><tr>
    <tr>
        <td colspan=3><a href="<?php echo base_url('permissionrequest');?>" class="button" target="blank"><strong>View Permision<strong></a></td>
    </tr>
    <tr height="20"><tr>
    <tr>
        <td colspan=3>--iHelp</td>
    </tr>
    
</table>
