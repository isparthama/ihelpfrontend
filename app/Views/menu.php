
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>iHelp</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/starter-template/">

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url('assets/dist/css/bootstrap.min.css');?>" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url('assets/starter-template.css');?>" rel="stylesheet">
    
  </head>

  <body>

    <nav class="navbar navbar-expand-md navbar-dark bg-danger fixed-top">
      <a class="navbar-brand" href="#">iHelp</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <?php $masteraccess=0;
          if ($masteraccess==1){?>
          <li class="nav-item dropdown active">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Master</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="<?php echo base_url('unit');?>">Unit</a>
              <a class="dropdown-item" href="<?php echo base_url('tenant');?>">Tenant</a>
            </div>
          </li>
          <?php }?>
          <li class="nav-item active">
            <a class="nav-link" href="<?php echo base_url('Permissionrequest');?>">Surat Ijin <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="<?php echo base_url('service');?>">Tenant Complain<span class="sr-only">(current)</span></a>
          </li>
          <?php 
          $lk3access=0;
          if ($lk3access==1){?>
          <li class="nav-item active">
            <a class="nav-link" href="<?php echo base_url('lk3');?>">LK3<span class="sr-only">(current)</span></a>
          </li>
          <?php }?>
          <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url('Login');?>">Logout</a>
            </li>
        </ul>
        <ul class="navbar-nav">
                <li class="nav-item dropdown active">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <?php echo $user['nama_lengkap'];?> </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>
            </ul>
      </div>
    </nav>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="<?php echo base_url('assets/js/vendor/jquery-slim.min.js');?>"><\/script>')</script>
    <script src="<?php echo base_url('assets/js/vendor/popper.min.js');?>"></script>
    <script src="<?php echo base_url('assets/dist/js/bootstrap.min.js');?>"></script>
  </body>
</html>
