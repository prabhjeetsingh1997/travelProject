<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Travel CRM| Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/iCheck/square/blue.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
 <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url(); ?>assets/js/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url(); ?>assets/plugins/iCheck/icheck.min.js"></script>
    <script src="<?php echo base_url(); ?>jquery-validation/dist/jquery.validate.js"></script>
    <script src="<?php echo base_url(); ?>jquery-validation/dist/additional-methods.js"></script>
  </head>
  <body class="hold-transition login-page" style="background:url('<?php echo base_url(); ?>assets/dist/img/banner.jpg');background-repeat: no-repeat;background-size: cover;">
    
    <div class="login-box">
      <div class="login-logo">
        <a href="javascript:void(0)" style="font-size: 32px;text-align:left; color:#FFF;">
      <img src="<?php echo base_url(); ?>assets/dist/img/travellogo.png">
    </a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
          <?php
                    $this->load->helper('form');
                    $error = $this->session->flashdata('error');
                    if($error)
                    {
                    ?>
                        <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <?php echo $error; ?>                    
                        </div>
                    <?php }?>
        <p class="login-box-msg" style="color: #367fa9;font-size: 20px;font-weight: bold;">PARTNER LOGIN</p>
    <div id="status"></div>
        <form action="<?php echo base_url() ?>loginPartner" method="POST" id="partner_login" name="partner_login" >
          <div class="form-group has-feedback">
            <span class="glyphicon glyphicon-down-arrow form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
                <select class="form-control" name="login_type" required="true">
                    <option value="">Please Select</option>
                    <option value="1">Admin</option>
                    <option value="2">Employee</option>
                    <!--<option value="3">TeamLeader</option>-->
                </select>
            </div>
            <div class="form-group has-feedback">
                <input type="text" class="form-control" placeholder="Email" name="email" id="email">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Password" name="password" id="password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat" name="login_button" id="login_button">Sign In</button>
            </div><!-- /.col -->
          </div>
        </form>
      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->
  </body>
</html>