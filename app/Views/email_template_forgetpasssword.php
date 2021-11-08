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
<center><h2>Forget Password !</h2></center>
<hr>
<table width="100%">
    <tr>
        <td width="40%">Nama Lengkap</td>
        <td width="5">:</td>
        <td><strong><?php echo $data->nama_lengkap;?></strong></td>
    </tr>
    <tr height="20"><tr>
    <tr>
        <td width="40%">Title</td>
        <td width="5">:</td>
        <td><strong>Forget Password</strong></td>
    </tr>
    <tr height="20"><tr>
    <tr>
        <td width="40%">New Password</td>
        <td width="5">:</td>
        <td><strong><?php echo $data->password;?></strong></td>
    </tr>
    <tr height="20"><tr>
    <tr>
        <td colspan=3>Password anda telah dirubah pada <?php echo $data->updated_at;?></td>
    </tr>
    <tr height="20"><tr>
    <tr>
        <td colspan=3><a href="<?php echo base_url('login');?>" class="button" target="blank"><strong>Login<strong></a></td>
    </tr>
    <tr height="20"><tr>
    <tr>
        <td colspan=3>--iHelp</td>
    </tr>
    
</table>
