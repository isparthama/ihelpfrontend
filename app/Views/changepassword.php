<div class="container-fluid">
<h2>Change Password</h2>
<p>
<?php if (session()->getFlashdata('msg')!=''){ echo session()->getFlashdata('msg');};?>
    <form id="formChangePass" method="POST" action="javascript:updatePass()">
    <div class="row">  
        <div class="col-md-5">
            <div class="form-group">
                <input type="hidden" id="password" value="<?php echo $user['password'];?>"> 
                <input type="hidden" name="menu" value="2"> 
                <label class="control-label">Current Password</label>
                <input type="password" class="form-control" name="current_pass" id="current_pass"> </div>
            <div class="form-group">
                <label class="control-label">New Password</label>
                <input type="password" class="form-control" name="new_pass" id="new_pass"> </div>
            <div class="form-group">
                <label class="control-label">Re-type New Password</label>
                <input type="password" class="form-control" name="retype_pass" id="retype_pass"> </div>
            <div class="margin-top-10">
                <button type="submit" class="btn btn-primary mb-3">Change Password </a></button
            </div>
        </div>
        <div class="col-md-7">
        </div>
    </div>
</form>
</div>
<script>
    function updatePass(){
        var $current_pass=$('#current_pass').val();
        var $new_pass=$('#new_pass').val();
        var $retype_pass=$('#retype_pass').val();

        $hasil=validatecurrentpassword($current_pass);
        $hasil=validatematchpassword($new_pass,$retype_pass);

        if ($hasil) {
            $('#formChangePass').attr('action','<?php echo base_url('changepassword');?>');
            $('#formChangePass').submit();
        }
    }
    function validatecurrentpassword($current_pass){
        var $password=$('#password').val();

        if ($password!=$current_pass){
            alert("Password Lama "+$current_pass+" Tidak Sama Dengan Yang Ada "+$password);
            return false;
        }
        return true;
    }
    function validatematchpassword($new_pass,$retype_pass){
        if ($new_pass!=$retype_pass){
            alert('Password baru tidak sesuai dengan Retype password')
            return false;
        }
        return true;
    }
</script>