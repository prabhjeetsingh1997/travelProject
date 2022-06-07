<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php echo $pageTitle; ?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <!--<meta name="description" content="Avenger Admin Theme">-->
    <!--<meta name="author" content="KaijuThemes">-->
    <link rel="shortcut icon" href="<?php echo base_url()?>hotelhomepage/images/icon.png" type="image/x-icon" style="text-transform:none;">
    <link href='https://fonts.googleapis.com/css?family=RobotoDraft:300,400,400italic,500,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,400italic,600,700' rel='stylesheet' type='text/css'>
    <link type="text/css" href="<?php echo base_url(); ?>assets/fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet">        <!-- Font Awesome -->
    <link type="text/css" href="<?php echo base_url(); ?>assets/css/styles.css" rel="stylesheet">                                     <!-- Core CSS with all styles -->
    <link type="text/css" href="<?php echo base_url(); ?>assets/plugins/jstree/dist/themes/avenger/style.min.css" rel="stylesheet">    <!-- jsTree -->
    <link type="text/css" href="<?php echo base_url(); ?>assets/plugins/codeprettifier/prettify.css" rel="stylesheet">                <!-- Code Prettifier -->
    <link type="text/css" href="<?php echo base_url(); ?>assets/plugins/iCheck/skins/minimal/blue.css" rel="stylesheet">              <!-- iCheck --> 
    <link type="text/css" href="<?php echo base_url(); ?>assets/plugins/form-daterangepicker/daterangepicker-bs3.css" rel="stylesheet"> 	<!-- DateRangePicker -->
    <link type="text/css" href="<?php echo base_url(); ?>assets/plugins/fullcalendar/fullcalendar.css" rel="stylesheet"> 					<!-- FullCalendar -->
	<link type="text/css" href="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet">
	<link type="text/css" href="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.fontAwesome.css" rel="stylesheet">
	<link type="text/css" href="<?php echo base_url(); ?>assets/plugins/progress-skylo/skylo.css" rel="stylesheet">
	<link type="text/css" href="<?php echo base_url(); ?>assets/plugins/gridforms/gridforms/gridforms.css" rel="stylesheet">
	<link type="text/css" href="<?php echo base_url(); ?>assets/plugins/form-daterangepicker/daterangepicker-bs3.css" rel="stylesheet">    <!-- DateRangePicker -->
	<link type="text/css" href="<?php echo base_url(); ?>assets/plugins/clockface/css/clockface.css" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo base_url(); ?>asset/plugins/datepicker/datepicker3.css">
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <input type="hidden" id="baseurl" name="baseurl" value="<?php echo base_url(); ?>" />
</head>
<style>
.dropdown-submenu {
  position: relative;
}

.dropdown-submenu .dropdown-menu {
  top: 0;
  left: 100%;
  /*margin-top: -1px;*/
}

/*.dropdown-menu .dropdown-submenu:hover ul.dropdown-menu {*/
/*    display:block;*/
/*} */

.navbar-nav > li > a{
    background: transparent;
    color:#174583;
}

.navbar-nav li > a:focus{
    background: transparent;
    /*color:#FDA10E;*/
    background: -webkit-linear-gradient(to top, rgba(255, 255, 255, 0) 98%, #174583 4%);
    background: linear-gradient(to bottom, rgba(255, 255, 255, 0) 98%, #174583 4%);
    background-position: -800px 0;
}

.navbar-nav li > a:hover{
    background: transparent;
    /*color:#FDA10E;*/
    /*border-color: #FDA10E !important;*/
    background: -webkit-linear-gradient(to top, rgba(255, 255, 255, 0) 98%, #174583 4%);
    background: linear-gradient(to bottom, rgba(255, 255, 255, 0) 98%, #174583 4%);
    background-position: -800px 0;
}
.nav .open > a, .nav .open > a:hover, .nav .open > a:focus {
    background-color: transparent;
}
/*.navbar-fixed-top{*/
/*    position: fixed;*/
/*    box-shadow: 0 5px 20px 0 rgb(0 0 0 / 20%), 0 13px 24px -11px rgb(8 27 73 / 60%);*/
/*    background-color: #FFF;*/
/*}*/
</style>
<div class="custom-loader" id="custom-loader" style="display: none;"><img src="<?php echo base_url();?>assets/images/loader.gif" width='50%' height='50%'></div>
	<nav class="navbar navbar-fixed-top clearfix" style="background:#fff;">
	    <div class="container-fluid">
	        <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <!--<span class="sr-only">Toggle navigation</span>-->
                <!--<span class="icon-bar"></span>-->
                <!--<span class="icon-bar"></span>-->
                <!--<span class="icon-bar"></span>-->
                <span class="icon-bg">
					<i class="fa fa-bars"></i>
				</span>
              </button>
              <a class="navbar-brand" href="<?php echo base_url(HOTEL); ?>/dashboard" ><img src="<?php echo base_url(); ?>hotelhomepage/images/logo-1.png" alt="logo" style="width:135px; padding-bottom:-10px;"/><div><?php echo $name; ?></div></a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="font-size:14px;"><i class="fa fa-home" aria-hidden="true" style="font-size:22px; padding-right:4px;"></i>Hotel Management</a>
                        <ul class="dropdown-menu" style="left:0;">
                           <li><a href="<?php echo base_url(HOTEL) ?>/addHotel">Add Hotels</a></li>
                           <li><a href="<?php echo base_url(HOTEL) ?>/viewHotel">All Hotels</a></li>
                           <li><a href="<?php echo base_url(HOTEL) ?>/viewActiveHotel">Active Hotels</a></li>
                           <li><a href="<?php echo base_url(HOTEL) ?>/viewInactiveHotel">Inactive Hotels</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="font-size:14px; margin-top: 2px;"><i class="fa fa-users" aria-hidden="true" style="font-size:18px; padding-right:5px;"></i>Bookings</a>
                        <ul class="dropdown-menu" style="left:0;">
                           <li><a href="<?php echo base_url(HOTEL) ?>/getPendingHotelBookings">New Bookings</a></li>
                           <li><a href="<?php echo base_url(HOTEL) ?>/getAllconfirmedHotelBookings">Confirmed Bookings</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle='dropdown' style="font-size:14px; margin-top: 1px;">
                            <!--<span class="icon-bg" style="width:auto;">-->
                                <i class="fa fa-fw fa-user" style="font-size:20px; padding-right:4px;"></i><?php echo $name;?>
                            <!--</span>-->
                        </a>
                        <ul class="dropdown-menu" style="right:5px;">
                          <li><a href="<?php echo base_url(HOTEL);?>/Profile">Profile<i class="pull-right fa fa-user"></i></a></li>
				          <!--<li><a href="#">Account <i class="pull-right fa fa-user"></i></a></li>-->
				          <!--<li><a href="#">Settings <i class="pull-right fa fa-cog"></i></a></li>-->
                          <li role="separator" class="divider"></li>
                          <li><a href="<?php echo base_url(HOTEL) ?>/hotelLogout">Sign Out<i class="pull-right fa fa-sign-out"></i></a></li>
                        </ul>
                    </li>
                </ul>
            </div>
	    </div>
	</nav>
	<!--<span class="badge badge-success">80%</span>-->
<!--<body class="infobar-offcanvas">-->
<!--<div id="headerbar">-->
<!--	<div class="container-fluid">-->
<!--		<div class="row">-->
<!--			<div class="col-xs-6 col-sm-2">-->
<!--				<a href="#" class="shortcut-tile tile-brown">-->
<!--					<div class="tile-body">-->
<!--						<div class="pull-left"><i class="fa fa-pencil"></i></div>-->
<!--					</div>-->
<!--					<div class="tile-footer">-->
<!--						Create Post-->
<!--					</div>-->
<!--				</a>-->
<!--			</div>-->
<!--			<div class="col-xs-6 col-sm-2">-->
<!--				<a href="#" class="shortcut-tile tile-grape">-->
<!--					<div class="tile-body">-->
<!--						<div class="pull-left"><i class="fa fa-group"></i></div>-->
<!--						<div class="pull-right"><span class="badge">2</span></div>-->
<!--					</div>-->
<!--					<div class="tile-footer">-->
<!--						Contacts-->
<!--					</div>-->
<!--				</a>-->
<!--			</div>-->
<!--			<div class="col-xs-6 col-sm-2">-->
<!--				<a href="#" class="shortcut-tile tile-primary">-->
<!--					<div class="tile-body">-->
<!--						<div class="pull-left"><i class="fa fa-envelope-o"></i></div>-->
<!--						<div class="pull-right"><span class="badge">10</span></div>-->
<!--					</div>-->
<!--					<div class="tile-footer">-->
<!--						Messages-->
<!--					</div>-->
<!--				</a>-->
<!--			</div>-->
<!--			<div class="col-xs-6 col-sm-2">-->
<!--				<a href="#" class="shortcut-tile tile-inverse">-->
<!--					<div class="tile-body">-->
<!--						<div class="pull-left"><i class="fa fa-camera"></i></div>-->
<!--						<div class="pull-right"><span class="badge">3</span></div>-->
<!--					</div>-->
<!--					<div class="tile-footer">-->
<!--						Gallery-->
<!--					</div>-->
<!--				</a>-->
<!--			</div>-->

<!--			<div class="col-xs-6 col-sm-2">-->
<!--				<a href="#" class="shortcut-tile tile-midnightblue">-->
<!--					<div class="tile-body">-->
<!--						<div class="pull-left"><i class="fa fa-cog"></i></div>-->
<!--					</div>-->
<!--					<div class="tile-footer">-->
<!--						Settings-->
<!--					</div>-->
<!--				</a>-->
<!--			</div>-->
<!--			<div class="col-xs-6 col-sm-2">-->
<!--				<a href="#" class="shortcut-tile tile-orange">-->
<!--					<div class="tile-body">-->
<!--						<div class="pull-left"><i class="fa fa-wrench"></i></div>-->
<!--					</div>-->
<!--					<div class="tile-footer">-->
<!--						Plugins-->
<!--					</div>-->
<!--				</a>-->
<!--			</div>-->
<!--		</div>-->
<!--	</div>-->
<!--</div>-->
<!--<header id="topnav" class="navbar navbar-midnightblue navbar-fixed-top clearfix" role="banner">-->

	<!--<div class="yamm navbar-left navbar-collapse collapse in">-->
	<!--	<ul class="nav navbar-nav">-->
	<!--		<li class="dropdown">-->
	<!--			<a href="#" class="dropdown-toggle" data-toggle="dropdown" >Megamenu<span class="caret"></span></a>-->
	<!--			<ul class="dropdown-menu" style="width: 500px;">-->
	<!--				<li>-->
	<!--					<div class="yamm-content container-sm-height">-->
							<!--<div class="row row-sm-height yamm-col-bordered">-->
 <!--                               <div class="col-sm-4 col-sm-height yamm-col">-->
                                    
 <!--                                   <h3 class="yamm-category">Hotel Management</h3>-->
 <!--                                   <ul class="list-unstyled mb20">-->
 <!--                                       <li><a href="<?php //echo base_url(HOTEL) ?>/addHotel">Add Hotels</a></li>-->
 <!--                                       <li><a href="<?php //echo base_url(HOTEL) ?>/viewHotel">All Hotels</a></li>-->
 <!--                                       <li><a href="<?php //echo base_url(HOTEL) ?>/viewActiveHotel">Active Hotels</a></li>-->
 <!--                                       <li><a href="<?php //echo base_url(HOTEL) ?>/viewInactiveHotel">Inactive Hotels</a></li>-->
 <!--                                   </ul>-->

                                    <!--<h3 class="yamm-category">Misc</h3>-->
                                    <!--<ul class="list-unstyled">-->
                                    <!--	<li><a href="#">Topnav Options</a></li>-->
                                    <!--    <li><a href="#">Horizontal Small</a></li>-->
                                    <!--    <li><a href="#">Horizontal Large</a></li>-->
                                    <!--    <li><a href="#">Boxed</a></li>-->
                                    <!--</ul>-->
                                    
 <!--                               </div>-->
 <!--                               <div class="col-sm-4 col-sm-height yamm-col">-->
                                    
 <!--                                   <h3 class="yamm-category">Bookings</h3>-->
 <!--                                   <ul class="list-unstyled">-->
 <!--                                      <li><a href="<?php //echo base_url(HOTEL) ?>/getPendingHotelBookings">New Bookings</a></li>-->
 <!--                                      <li><a href="<?php //echo base_url(HOTEL) ?>/getAllconfirmedHotelBookings">Confirmed Bookings</a></li>-->
                                     
 <!--                                   </ul>-->

                                    <!--<h3 class="yamm-category">Components</h3>-->
                                    <!--<ul class="list-unstyled">-->
                                    <!--    <li><a href="#">Tiles</a></li>-->
                                    <!--    <li><a href="#">jQuery Knob</a></li>-->
                                    <!--    <li><a href="#">jQuery Slider</a></li>-->
                                    <!--    <li><a href="#">Ion Range Slider</a></li>-->
                                    <!--</ul>-->
                                    
 <!--                               </div>-->
                                <!--<div class="col-sm-4 col-sm-height yamm-col">-->
                                <!--	<h3 class="yamm-category">Rem</h3>-->
                                <!--    <img src="<?php// echo base_url(); ?>assets/demo/stockphoto/communication_12_carousel.jpg" class="mb20 img-responsive" style="width: 100%;">-->
                                <!--    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium. totam rem aperiam eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>-->
                                <!--</div>-->
							<!--</div>-->
	<!--					</div>-->
	<!--				</li>-->
	<!--			</ul>-->
	<!--		</li>-->
	<!--	</ul>-->
	<!--</div>-->
	<!--------->


	<!--<ul class="nav navbar-nav toolbar pull-right" style="margin-right: 20px !important;">-->
	<!--	<li class="dropdown toolbar-icon-bg">-->
	<!--		<a href="#" id="navbar-links-toggle" data-toggle="collapse" data-target="header>.navbar-collapse">-->
	<!--			<span class="icon-bg">-->
	<!--				<i class="fa fa-fw fa-ellipsis-h"></i>-->
	<!--			</span>-->
	<!--		</a>-->
	<!--	</li>-->

		<!--<li class="toolbar-icon-bg demo-headerdrop-hidden">-->
  <!--          <a href="#" id="headerbardropdown"><span class="icon-bg"><i class="fa fa-fw fa-level-down"></i></span></i></a>-->
  <!--      </li>-->

        <!--<li class="toolbar-icon-bg hidden-xs" id="trigger-fullscreen">-->
        <!--    <a href="#" class="toggle-fullscreen"><span class="icon-bg"><i class="fa fa-fw fa-arrows-alt"></i></span></i></a>-->
        <!--</li>-->

		
		<!--<li class="dropdown toolbar-icon-bg">-->
		<!--	<a href="#" class="hasnotifications dropdown-toggle" data-toggle='dropdown'><span class="icon-bg"><i class="fa fa-fw fa-bell"></i></span><span class="badge badge-info">5</span></a>-->
		<!--	<div class="dropdown-menu dropdown-alternate notifications arrow">-->
		<!--		<div class="dd-header">-->
		<!--			<span>Notifications</span>-->
		<!--			<span><a href="#">Settings</a></span>-->
		<!--		</div>-->
		<!--		<div class="scrollthis scroll-pane">-->
		<!--			<ul class="scroll-content">-->

		<!--				<li class="">-->
		<!--					<a href="#" class="notification-info">-->
		<!--						<div class="notification-icon"><i class="fa fa-user fa-fw"></i></div>-->
		<!--						<div class="notification-content">Profile Page has been updated</div>-->
		<!--						<div class="notification-time">2m</div>-->
		<!--					</a>-->
		<!--				</li>-->
		<!--				<li class="">-->
		<!--					<a href="#" class="notification-success">-->
		<!--						<div class="notification-icon"><i class="fa fa-check fa-fw"></i></div>-->
		<!--						<div class="notification-content">Updates pushed successfully</div>-->
		<!--						<div class="notification-time">12m</div>-->
		<!--					</a>-->
		<!--				</li>-->
		<!--				<li class="">-->
		<!--					<a href="#" class="notification-primary">-->
		<!--						<div class="notification-icon"><i class="fa fa-users fa-fw"></i></div>-->
		<!--						<div class="notification-content">New users request to join</div>-->
		<!--						<div class="notification-time">35m</div>-->
		<!--					</a>-->
		<!--				</li>-->
		<!--				<li class="">-->
		<!--					<a href="#" class="notification-danger">-->
		<!--						<div class="notification-icon"><i class="fa fa-shopping-cart fa-fw"></i></div>-->
		<!--						<div class="notification-content">More orders are pending</div>-->
		<!--						<div class="notification-time">11h</div>-->
		<!--					</a>-->
		<!--				</li>-->
		<!--				<li class="">-->
		<!--					<a href="#" class="notification-primary">-->
		<!--						<div class="notification-icon"><i class="fa fa-arrow-up fa-fw"></i></div>-->
		<!--						<div class="notification-content">Pending Membership approval</div>-->
		<!--						<div class="notification-time">2d</div>-->
		<!--					</a>-->
		<!--				</li>-->
		<!--				<li class="">-->
		<!--					<a href="#" class="notification-info">-->
		<!--						<div class="notification-icon"><i class="fa fa-check fa-fw"></i></div>-->
		<!--						<div class="notification-content">Succesfully updated to version 1.0.1</div>-->
		<!--						<div class="notification-time">40m</div>-->
		<!--					</a>-->
		<!--				</li>-->
		<!--			</ul>-->
		<!--		</div>-->
		<!--		<div class="dd-footer">-->
		<!--			<a href="#">View all notifications</a>-->
		<!--		</div>-->
		<!--	</div>-->
		<!--</li>-->

		<!--<li class="dropdown toolbar-icon-bg hidden-xs">-->
		<!--	<a href="#" class="hasnotifications dropdown-toggle" data-toggle='dropdown'><span class="icon-bg"><i class="fa fa-fw fa-envelope"></i></span></a>-->
		<!--	<div class="dropdown-menu dropdown-alternate messages arrow">-->
		<!--		<div class="dd-header">-->
		<!--			<span>Messages</span>-->
		<!--			<span><a href="#">Settings</a></span>-->
		<!--		</div>-->

		<!--		<div class="scrollthis scroll-pane">-->
		<!--			<ul class="scroll-content">-->
		<!--				<li class="">-->
		<!--					<a href="#">-->
		<!--						<img class="msg-avatar" src="assets/demo/avatar/" alt="avatar" />-->
		<!--						<div class="msg-content">-->
		<!--							<span class="name">Steven Shipe</span>-->
		<!--							<span class="msg">Nonummy nibh epismod lorem ipsum</span>-->
		<!--						</div>-->
		<!--						<span class="msg-time">30s</span>-->
		<!--					</a>-->
		<!--				</li>-->
		<!--				<li>-->
		<!--					<a href="#">-->
		<!--						<img class="msg-avatar" src="assets/demo/avatar/" alt="avatar" />-->
		<!--						<div class="msg-content">-->
		<!--							<span class="name">Roxann Hollingworth <i class="fa fa-paperclip attachment"></i></span>-->
		<!--							<span class="msg">Lorem ipsum dolor sit amet consectetur adipisicing elit</span>-->
		<!--						</div>-->
		<!--						<span class="msg-time">5m</span>-->
		<!--					</a>-->
		<!--				</li>-->
		<!--				<li>-->
		<!--					<a href="#">-->
		<!--						<img class="msg-avatar" src="assets/demo/avatar/" alt="avatar" />-->
		<!--						<div class="msg-content">-->
		<!--							<span class="name">Diamond Harlands</span>-->
		<!--							<span class="msg">:)</span>-->
		<!--						</div>-->
		<!--						<span class="msg-time">3h</span>-->
		<!--					</a>-->
		<!--				</li>-->
		<!--				<li>-->
		<!--					<a href="#">-->
		<!--						<img class="msg-avatar" src="assets/demo/avatar/" alt="avatar" />-->
		<!--						<div class="msg-content">-->
		<!--							<span class="name">Michael Serio <i class="fa fa-paperclip attachment"></i></span>-->
		<!--							<span class="msg">Sed distinctio dolores fuga molestiae modi?</span>-->
		<!--						</div>-->
		<!--						<span class="msg-time">12h</span>-->
		<!--					</a>-->
		<!--				</li>-->
		<!--				<li>-->
		<!--					<a href="#">-->
		<!--						<img class="msg-avatar" src="assets/demo/avatar/" alt="avatar" />-->
		<!--						<div class="msg-content">-->
		<!--							<span class="name">Matt Jones</span>-->
		<!--							<span class="msg">Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et mole</span>-->
		<!--						</div>-->
		<!--						<span class="msg-time">2d</span>-->
		<!--					</a>-->
		<!--				</li>-->
		<!--				<li>-->
		<!--					<a href="#">-->
		<!--						<img class="msg-avatar" src="assets/demo/avatar/" alt="avatar" />-->
		<!--						<div class="msg-content">-->
		<!--							<span class="name">John Doe</span>-->
		<!--							<span class="msg">Neque porro quisquam est qui dolorem</span>-->
		<!--						</div>-->
		<!--						<span class="msg-time">7d</span>-->
		<!--					</a>-->
		<!--				</li>-->
		<!--			</ul>-->
		<!--		</div>-->

			
		<!--	</div>-->
		<!--</li>-->
		<!--<li class="dropdown toolbar-icon-bg">-->
		<!--	<a href="#" class="dropdown-toggle" data-toggle='dropdown'><span class="icon-bg" style="width:auto;"><?php //echo $name;?><i class="fa fa-fw fa-user"></i></span></a>-->
		<!--	<ul class="dropdown-menu userinfo arrow">-->
		<!--		<li><a href="#"><span class="pull-left">Profile</span> <span class="badge badge-info">80%</span></a></li>-->
		<!--		<li><a href="#"><span class="pull-left">Account</span> <i class="pull-right fa fa-user"></i></a></li>-->
		<!--		<li><a href="#"><span class="pull-left">Settings</span> <i class="pull-right fa fa-cog"></i></a></li>-->
		<!--		<li class="divider"></li>-->
		<!--		<li><a href="#"><span class="pull-left">Earnings</span> <i class="pull-right fa fa-line-chart"></i></a></li>-->
		<!--		<li><a href="#"><span class="pull-left">Statement</span> <i class="pull-right fa fa-list-alt"></i></a></li>-->
		<!--		<li><a href="#"><span class="pull-left">Withdrawals</span> <i class="pull-right fa fa-dollar"></i></a></li>-->
		<!--		<li class="divider"></li>-->
		<!--		<li><a href="<?php //echo base_url(HOTEL); ?>/hotelLogout"><span class="pull-left">Sign Out</span> <i class="pull-right fa fa-sign-out"></i></a></li>-->
		<!--	</ul>-->
		<!--</li>-->

	<!--</ul>-->

<!--</header>-->