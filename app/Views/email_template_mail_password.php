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
<center><h2>Informasi Akun Password</h2></center>
<hr>
<table width="100%">
    <tr>
        <td colspan="3">Dear Bapak/Ibu</td>
    </tr>
    <tr>
        <td colspan="3"><?php echo $data->nama_lengkap;?></td>
    </tr>
    <tr height="20"><tr>
    <tr>
        <td colspan="3">Berikut informasi login anda ke system iHelp</td>
    </tr>
    <tr height="20"><tr>
    <tr>
        <td width="40%">Link</td>
        <td width="5">:</td>
        <td><strong><a href="https://ihelp.plazaatrium.com">https://ihelp.plazaatrium.com</a></strong></td>
    </tr>
    <tr>
        <td width="40%">User Id</td>
        <td width="5">:</td>
        <td><strong><?php echo $data->email;?></strong></td>
    </tr>
    <tr>
        <td width="40%">New Password</td>
        <td width="5">:</td>
        <td><strong><?php echo $data->password;?></strong></td>
    </tr>
    <tr>
        <td colspan=3>*case sensitive</td>
    </tr>
    <tr height="20"><tr>
    <tr>
        <td colspan=3>User manual bisa dilihat pada link berikut <a href="https://drive.google.com/file/d/1yeDppw5hfnkvLXeIuUH_G1c2VN-dIU_l/view?usp=sharing">https://drive.google.com/file/d/1yeDppw5hfnkvLXeIuUH_G1c2VN-dIU_l/view?usp=sharing</a></td>
    </tr>
    <tr height="20"><tr>
    <tr>
        <td colspan=3>Demikian yang bisa kami sampaikan dan terima kasih atas kerjasamanya</td>
    </tr>
    <tr>
        <td>Jika ada kendala bisa menghubungi PIC tenancy masing-masing</td>
    </tr>
    <tr height="20"><tr>
    <tr>
        <td>Regards,</td>
    </tr>
    <tr>
        <td>iHelp Team</td>
    </tr>
    
</table>
