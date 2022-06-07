<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php echo $pageTitle; ?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="description" content="Avenger Admin Theme">
    <meta name="author" content="KaijuThemes">
    <link rel="shortcut icon" href="<?php echo base_url()?>hotelhomepage/images/icon.png" type="image/x-icon">
    <link href='https://fonts.googleapis.com/css?family=RobotoDraft:300,400,400italic,500,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,400italic,600,700' rel='stylesheet' type='text/css'>
    <link type="text/css" href="<?php echo base_url(); ?>assets/fonts/glyphicons/css/glyphicons.min.css" rel="stylesheet">
    <link type="text/css" href="<?php echo base_url(); ?>assets/fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet">        <!-- Font Awesome -->
    <link type="text/css" href="<?php echo base_url(); ?>assets/css/styles.css" rel="stylesheet">                                     <!-- Core CSS with all styles -->
    <link type="text/css" href="<?php echo base_url(); ?>assets/plugins/jstree/dist/themes/avenger/style.min.css" rel="stylesheet">    <!-- jsTree -->
    <link type="text/css" href="<?php echo base_url(); ?>assets/plugins/codeprettifier/prettify.css" rel="stylesheet">                <!-- Code Prettifier -->
    <link type="text/css" href="<?php echo base_url(); ?>assets/plugins/iCheck/skins/minimal/blue.css" rel="stylesheet">              <!-- iCheck --> 
    <link type="text/css" href="<?php echo base_url(); ?>assets/plugins/form-daterangepicker/daterangepicker-bs3.css" rel="stylesheet"> 	<!-- DateRangePicker -->
    <link type="text/css" href="<?php echo base_url(); ?>assets/plugins/fullcalendar/fullcalendar.css" rel="stylesheet"> 					<!-- FullCalendar -->
	<link type="text/css" href="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet">
	<link type="text/css" href="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.fontAwesome.css" rel="stylesheet">
	<link type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.20/r-2.2.3/datatables.min.css" rel="stylesheet"/>
	<link type="text/css" href="<?php echo base_url(); ?>assets/plugins/progress-skylo/skylo.css" rel="stylesheet">
	<link type="text/css" href="<?php echo base_url(); ?>assets/plugins/gridforms/gridforms/gridforms.css" rel="stylesheet">
	<link type="text/css" href="<?php echo base_url(); ?>assets/plugins/form-daterangepicker/daterangepicker-bs3.css" rel="stylesheet">    <!-- DateRangePicker -->
	<link type="text/css" href="<?php echo base_url(); ?>asset/plugins/select2/select2.min.css" rel="stylesheet">
	<link type="text/css" href="<?php echo base_url(); ?>assets/jquery-flexdatalist-2.3.0/jquery.flexdatalist.min.css" rel="stylesheet">
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js" type="text/javascript"></script>
	<!--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>-->
	<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.20/r-2.2.3/datatables.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
	
<input type="hidden" id="baseurl" name="baseurl" value="<?php echo base_url(PARTNER); ?>" />

</head>
<style>

@media screen and (max-width: 768px) {
    #bs-example-navbar-collapse-1{
    background:white;
    overflow-y:scroll;
    }
}

.dropdown-submenu {
  position: relative;
}

.dropdown-submenu .dropdown-menu {
  top: 0;
  left: 100%;
  /*margin-top: -1px;*/
}

.dropdown-menu .dropdown-submenu:hover ul.dropdown-menu {
    display:block;
} 
.navbar-nav > li > a{
    background: transparent;
    color:#174583;
    padding-bottom: 23px;
}

.navbar-nav li > a:focus{
    background: transparent;
    /*color:#FDA10E;*/
    background: -webkit-linear-gradient(to top, rgba(255, 255, 255, 0) 94%, #174583 4%);
    background: linear-gradient(to bottom, rgba(255, 255, 255, 0) 94%, #174583 4%);
    background-position: -800px 0;
}

.navbar-nav li > a:hover{
    background: transparent;
    /*color:#FDA10E;*/
    /*border-color: #FDA10E !important;*/
    background: -webkit-linear-gradient(to top, rgba(255, 255, 255, 0) 94%, #174583 4%);
    background: linear-gradient(to bottom, rgba(255, 255, 255, 0) 94%, #174583 4%);
    background-position: -800px 0;
}
.nav .open > a, .nav .open > a:hover, .nav .open > a:focus {
    background-color: transparent;
}

.navbar-nav > li > .active{
    color:#e7a51b;
} 
.navbar{
    height: 70px;
    padding: 10px;
}
</style>
<body>

<div class="container-fluid" style="padding-left: 0px;">
<div class="custom-loader" id="custom-loader" style="display: none;"><img src="<?php echo base_url();?>assets/images/loader.gif" width='40%' height='40%'></div>
<nav class="navbar navbar-fixed-top clearfix" style="background:white; height:; padding-top:;">
  <!--<div class="container-fluid">-->
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="icon-bg">
			<i class="fa fa-bars"></i>
		</span>
      </button>
      <?php //if(!empty($logo)) { ?>
      <!--<a class="navbar-brand" href="<?php //echo base_url(PARTNER); ?>/dashboard"><img src="<?php //echo base_url(); ?>uploads/partner_logo/<?php //echo $logo;?>" alt="logo" style="width:135px; padding-bottom:-10px;"/></a>-->
      <?php //}else {?>
      <a class="navbar-brand" href="<?php echo base_url(PARTNER); ?>/dashboard"><img src="<?php echo base_url(); ?>hotelhomepage/images/logo-1.png" alt="logo" style="width:135px; padding-bottom:-10px;"/></a>
      <?php //}?>
    </div>

    <?php if($roleId == ROLE_ADMIN) {?>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="">
      <ul class="nav navbar-nav">
          <!--<li>-->
          <!--  <a href="<?php //echo base_url(PARTNER)?>/dashboard" style="font-size:14px; margin-top:4px;" class="<?php //echo $this->uri->segment(2) == 'dashboard' ? 'active' : '' ?>">Dashboard</a>      -->
          <!--</li>-->
          <li>
           <a href="<?php echo base_url(PARTNER) ?>/HotelworkoutPannel" style="font-size:14px;" class="<?php echo $this->uri->segment(2) == 'HotelworkoutPannel' ? 'active' : '' ?>"><i class="fa fa-home" aria-hidden="true" style="font-size:22px; padding-right:4px;"></i>Search Hotels</a>
          </li>
          <li>
           <a href="<?php echo base_url(PARTNER) ?>/PackageworkoutPannel" style="font-size:14px; margin-top: 1px;" class="<?php echo $this->uri->segment(2) == 'PackageworkoutPannel' ? 'active' : '' ?>"><i class="fa fa-external-link-square" aria-hidden="true" style="font-size:20px; padding-right:4px;"></i>Search Packages</a>
          </li>
          <li>
           <a href="<?php echo base_url(PARTNER) ?>/PartnerPackageworkout" style="font-size:14px; margin-top: 1px;" class="<?php echo $this->uri->segment(2) == 'PartnerPackageworkout' ? 'active' : '' ?>"><i class="fa fa-external-link-square" aria-hidden="true" style="font-size:20px; padding-right:4px;"></i>Package Workout</a>
          </li>
          
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle='dropdown' style="font-size:14px; margin-top:1px;">
              <!--<span class="icon-bg" style="width:auto;">-->
                  <i class="fa fa-fw fa-user" style="font-size:20px; padding-right:4px;"></i><?php echo $name;?>
              <!--</span>-->
            </a>
          <ul class="dropdown-menu" style="margin-right:5px;">
                <li><a href="<?php echo base_url(PARTNER) ?>/partnerProfile">Profile <i class="pull-right fa fa-user"></i></a></li>
				<!--<li><a href="#">Account <i class="pull-right fa fa-user"></i></a></li>-->
				<!--<li><a href="#">Settings <i class="pull-right fa fa-cog"></i></a></li>-->
            <li role="separator" class="divider"></li>
            <li><a href="<?php echo base_url(PARTNER); ?>/partnerLogout">Sign Out <i class="pull-right fa fa-sign-out"></i></a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
    <?php }?>
    
    <?php if($roleId == ROLE_EMPLOYEE) {?>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="">
      <ul class="nav navbar-nav">
          <!--<li>-->
          <!--  <a href="<?php //echo base_url(PARTNER) ?>/dashboard" style="font-size:14px; margin-top:4px;" class="<?php //echo $this->uri->segment(2) == 'dashboard' ? 'active' : '' ?>">Dashboard</a>      -->
          <!--</li>-->
          <li>
           <a href="<?php echo base_url(PARTNER) ?>/HotelworkoutPannel" style="font-size:14px;" class="<?php echo $this->uri->segment(2) == 'HotelworkoutPannel' ? 'active' : '' ?>"><i class="fa fa-home" aria-hidden="true" style="font-size:24px; padding-right:4px;"></i>Search Hotel</a>
          </li>
          <li>
           <a href="<?php echo base_url(PARTNER) ?>/PackageworkoutPannel" style="font-size:14px; margin-top:3px;" class="<?php echo $this->uri->segment(2) == 'PackageworkoutPannel' ? 'active' : '' ?>"><i class="fa fa-external-link-square" aria-hidden="true" style="font-size:20px; padding-right:4px;"></i>Search Packages</a>
          </li>
          <li>
           <a href="<?php echo base_url(PARTNER) ?>/PartnerPackageworkout" style="font-size:14px; margin-top: 1px;" class="<?php echo $this->uri->segment(2) == 'PartnerPackageworkout' ? 'active' : '' ?>"><i class="fa fa-external-link-square" aria-hidden="true" style="font-size:20px; padding-right:4px;"></i>Package Workout</a>
          </li>
      
      </ul>
      
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle='dropdown' style="font-size:14px; margin-top: 1px;">
                <!--<span class="icon-bg" style="width:auto;">-->
                  <i class="fa fa-fw fa-user" style="font-size:20px; padding-right:4px;"></i><?php echo $name;?>
                <!--</span>-->
            </a>
          <ul class="dropdown-menu" style="margin-right:5px;">
            <!--<li><a href="#">Profile <i class="pull-right fa fa-user"></i></a></li>-->
            <!--<li role="separator" class="divider"></li>-->
            <li><a href="<?php echo base_url(PARTNER); ?>/partnerLogout">Sign Out <i class="pull-right fa fa-sign-out"></i></a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
    <?php }?>
  <!--</div>-->
  <!-- /.container-fluid -->
</nav>
<div class="container-fluid" style="padding-left:0px; margin-top:70px;">
<!-- Sidebar Holder -->

    <div class="row">