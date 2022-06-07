<!DOCTYPE html>
<html>
   <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Travwhizz.com</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.5 -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/iCheck/square/blue.css">
        <script src="<?php echo base_url(); ?>assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>

        <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/iCheck/icheck.min.js"></script>
        <script src="<?php echo base_url(); ?>jquery-validation/dist/jquery.validate.js"></script>
        <script src="<?php echo base_url(); ?>jquery-validation/dist/additional-methods.js"></script>
   </head>
   <style>
    .btn-gradient{
    color: #fff;
    font-family: robo-medium;
    font-size: 15px;
    border-radius: 30px;
    border: none;
    padding: 9px 20px;
    letter-spacing: .5px;
    margin-bottom: 15px;
    background: -moz-linear-gradient(left, #FDA10E 0%, #FF6C0D 100%);
    background: -webkit-linear-gradient(left, #FDA10E 0%, #FF6C0D 100%);
    background: -o-linear-gradient(left, #FDA10E 0%, #FF6C0D 100%);
    background: -ms-linear-gradient(left, #FDA10E 0%, #FF6C0D 100%);
    background: linear-gradient(to right, #FDA10E 0%, #FF6C0D 100%);
    transition: all 0.3s;
    }
    .btn-gradient:hover{
    color: #fff;
    box-shadow: 0 5px 20px 0 rgba(0, 0, 0, 0.3);
    transition: all 0.5s;
    }
   </style>
   <body class="hold-transition login-page" style="background:url('<?php echo base_url(); ?>assets/dist/img/banner.jpg');background-repeat: no-repeat;background-size: cover;">
        <div class="login-box">
            <div class="login-logo">
                <a href="javascript:void(0)" style="font-size: 32px;text-align:left; color:#FFF;">
                    <img src="<?php echo base_url(); ?>hotelhomepage/images/travwhizz.png">
                </a>
            </div>
            <div class="login-box-body">
                <p class="login-box-msg" style="color: #367fa9;font-size: 20px;font-weight: bold;">SUPER ADMIN LOGIN</p>
                <?php $this->load->helper('form'); ?>
                    <div class="row">
                        <div class="col-md-12">
                            <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
                        </div>
                    </div>
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
                    <?php }
                    $success = $this->session->flashdata('success');
                    if($success)
                    {
                    ?>
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <?php echo $success; ?>                    
                        </div>
                    <?php } ?>
                    <div id="status"></div>
                    <form action="<?php echo base_url(ADMIN_URL); ?>/loginMe" method="post">
                        <div class="form-group has-feedback">
                            <input type="email" class="form-control" placeholder="Email" name="email" required />
                            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <input type="password" class="form-control" placeholder="Password" name="password" required />
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        </div>
                        <div class="row">
                            <div class="col-xs-4">
                                <input type="submit" class="btn-sm btn-gradient" value="Sign In" />
                            </div>
                        </div>
                    </form>
            </div>
        </div>
   </body>
</html>