<!DOCTYPE html>
<html lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="E6obDoZtuzfmb7CMtR6muVwjM225YRsf2fwXaMBP">

        <title>IHelp</title>
        <!-- Fonts -->
        
        
        
    <link href="<?php echo base_url('assets/layout/css/font-awesome.css');?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('assets/layout/css/simple-line-icons.css');?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('assets/layout/css/bootstrap.css');?>" rel="stylesheet" type="text/css">


    
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/layout/css/custom.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/layout/css/navigation.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/layout/css/footer.css');?>">


    <style type="text/css">
        .modal-view-width-jun{
            width: 1000px;
        }

        .modal-body-special-jun{
            overflow: auto;
        }
        .table-special-jun{
            width: auto;
        }

        @media  screen and (max-width:600px) {
            .page-container {
                margin-top : 50px !important;
            }
            .modal-view-width-jun{
                width: auto;
            }
            .modal-body-special-jun{
                overflow: auto;
            }
            .table-special-jun{
                width: 600px;
            }
        }

        @media  screen and (min-width:430px) and (max-width:1100px){
            .page-container {
                margin-top : 100px !important;
            }
            .modal-view-width-jun{
                width: auto;
            }
            .modal-body-special-jun{
                overflow: auto;
            }
            .table-special-jun{
                width: 800px;
            }
        }

        #toast-container {
            margin-top: 70px !important;
        }

        #toast-container .toast{
            opacity: 1;
            background: no-repeat rgb(54, 198, 211);
            color: white;
            border-radius: 10px !important;
            box-shadow: #cccccc 0 0 5px 1px !important;
            background-position: left center !important;
            background-position-x: 10px !important;
        }

        table.table-bordered.dataTable tbody th, table.table-bordered.dataTable tbody td {
            font-size: 17px;
             font-family: 'Poppins';
        }
        th, td {
            text-align: center;
            vertical-align: middle;
        }
    </style>
        <link href="<?php echo base_url('assets/layout/css/login.css');?>" rel="stylesheet">

    <style type="text/css">
        html,body {
            height: 100%;
        }
        body {
          background-image: url('<?php echo base_url('assets/layout/images/bg_atrium.jpg');?>');
        }
        footer, .page-header{
            display: none;
        }
        .container{
            position: relative;
        }
        .about {
            font-size: xx-small;
            position: absolute;
            bottom: 5px;
            right: 20px;
        }
    </style>
    </head>
    <body>



<style type="text/css">
  #account .accountInfo{
    padding: 0;
    font-family: cursive;;
  }
  #account .accountInfo ul{
      list-style-type: none;
      padding: 0;
      font-family: cursive;
  }
  #account .accountInfo li:first-child{
      text-decoration: underline;
  }
  #account .accountInfo li{
      padding-bottom: 5px;
      text-transform: capitalize;
      text-overflow : ellipsis;
      overflow      : hidden;
      white-space   : nowrap;
      width         : 130px;
    }
</style>

        

        <div class="clearfix"> </div>
        <div class="page-container">
            	<div class="main" style="margin : 0px;">
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image center_content">
                        <figure>
                            <img alt="Sign up image" src="<?php echo base_url('assets/layout/images/logo_cowellcommercial.png');?>" >
                        </figure>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Sign In</h2>
                        <?php if (session()->getFlashdata('msg')!=''){ echo session()->getFlashdata('msg');};?>
                        <form method="POST" class="register-form" id="login-form" action="<?php echo base_url('Login');?>">
                        	<input type="hidden" name="_token" value="E6obDoZtuzfmb7CMtR6muVwjM225YRsf2fwXaMBP">                            <div class="form-group">
                                <label for="user"><i class="fa fa-user" aria-hidden="true"></i></label>
                                <input type="email" name="email" id="email" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="fa fa-key" aria-hidden="true"></i></label>
                                <input type="password" name="password" id="password" placeholder="Password">
                            </div>
                            <div class="form-group">
                                
                                <a for="remember-me" class="label-agree-term" href="https://atriumtenancy.com/forgetpass"><span><span></span></span>Forgot Password?</a>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Log in">
                            </div>
                        </form>
                                            </div>
                </div>
                <div class="about">
                    <a href="https://atriumtenancy.com/about/policy">Privacy &amp; Policy</a>
                    /
                    <a href="https://atriumtenancy.com/about/term">Term &amp; Condition</a>
                </div>
            </div>
        </section>
    </div>
                    </div>

            <script type="text/javascript">
        var pusher_app_id = "061db0fe2dd997567231";
    </script>

    <script src="<?php echo base_url('assets/layout/js/jquery.js');?>" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/layout/js/bootstrap.js');?>" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/layout/js/helper.js');?>" type="text/javascript"></script>

    
    

 
</body></html>