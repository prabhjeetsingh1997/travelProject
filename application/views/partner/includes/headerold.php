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
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.20/r-2.2.3/datatables.min.css"/>
	<link type="text/css" href="<?php echo base_url(); ?>assets/plugins/progress-skylo/skylo.css" rel="stylesheet">
	<link type="text/css" href="<?php echo base_url(); ?>assets/plugins/gridforms/gridforms/gridforms.css" rel="stylesheet">
	<link type="text/css" href="<?php echo base_url(); ?>assets/plugins/form-daterangepicker/daterangepicker-bs3.css" rel="stylesheet">    <!-- DateRangePicker -->
	<link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>asset/plugins/select2/select2.min.css">
	<link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/jquery-flexdatalist-2.3.0/jquery.flexdatalist.min.css">
	
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.20/r-2.2.3/datatables.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
	
<input type="hidden" id="baseurl" name="baseurl" value="<?php echo base_url(PARTNER); ?>" />
</head>
<div class="custom-loader" id="custom-loader" style="display: none;"><img src="<?php echo base_url();?>assets/images/loader.gif" width='40%' height='40%'></div>
<body class="infobar-offcanvas">
<div id="headerbar">
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-6 col-sm-2">
				<a href="#" class="shortcut-tile tile-brown">
					<div class="tile-body">
						<div class="pull-left"><i class="fa fa-pencil"></i></div>
					</div>
					<div class="tile-footer">
						Create Post
					</div>
				</a>
			</div>
			<div class="col-xs-6 col-sm-2">
				<a href="#" class="shortcut-tile tile-grape">
					<div class="tile-body">
						<div class="pull-left"><i class="fa fa-group"></i></div>
						<div class="pull-right"><span class="badge">2</span></div>
					</div>
					<div class="tile-footer">
						Contacts
					</div>
				</a>
			</div>
			<div class="col-xs-6 col-sm-2">
				<a href="#" class="shortcut-tile tile-primary">
					<div class="tile-body">
						<div class="pull-left"><i class="fa fa-envelope-o"></i></div>
						<div class="pull-right"><span class="badge">10</span></div>
					</div>
					<div class="tile-footer">
						Messages
					</div>
				</a>
			</div>
			<div class="col-xs-6 col-sm-2">
				<a href="#" class="shortcut-tile tile-inverse">
					<div class="tile-body">
						<div class="pull-left"><i class="fa fa-camera"></i></div>
						<div class="pull-right"><span class="badge">3</span></div>
					</div>
					<div class="tile-footer">
						Gallery
					</div>
				</a>
			</div>

			<div class="col-xs-6 col-sm-2">
				<a href="#" class="shortcut-tile tile-midnightblue">
					<div class="tile-body">
						<div class="pull-left"><i class="fa fa-cog"></i></div>
					</div>
					<div class="tile-footer">
						Settings
					</div>
				</a>
			</div>
			<div class="col-xs-6 col-sm-2">
				<a href="#" class="shortcut-tile tile-orange">
					<div class="tile-body">
						<div class="pull-left"><i class="fa fa-wrench"></i></div>
					</div>
					<div class="tile-footer">
						Plugins
					</div>
				</a>
			</div>
		</div>
	</div>
</div>
<header id="topnav" class="navbar navbar-fixed-top clearfix" role="banner" style="box-shadow: 0px 0px 0px 0px rgb(0 0 0 / 0%), 0px 0px 0px 0px rgb(0 0 0 / 0%); background-color: #eeeeee;">

	<a class="navbar-brand" href="<?php echo base_url(PARTNER); ?>/dashboard" ><img src="<?php echo base_url('uploads/partner_logo/').$logo; ?>" height="30" alt="logo" style="padding-bottom:-10px;"/></a>
	
	<div class="yamm navbar-left navbar-collapse collapse in">
		<ul class="nav navbar-nav">
			<?php if($roleId == ROLE_ADMIN){ ?>
			
			<li class="dropdown">
			    <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color:#263238;">Hotel<span class="caret"></span></a>
			    <ul class="dropdown-menu" style="">
			        <li>
			            <div class="yamm-content container-sm-height">
			                <div class="row row-sm-height yamm-col-bordered">
			                    <div class="col-sm-12 col-sm-height yamm-col">
                                    <ul class="list-unstyled mb20">
                                        <?php if($hotel_management == 1) {?>
                                        <li><a href="<?php echo base_url(PARTNER) ?>/addHotel">Add Hotel</a></li>
                                        <li><a href="<?php echo base_url(PARTNER) ?>/viewHotel">View Hotel</a></li>
                                        <?php }else{ ?>
                                        <li><a href="<?php echo base_url(PARTNER) ?>">Add Hotel<img src="<?php echo base_url() ?>/assets/images/premium-subscription-icon.png" style="width:25px; margin-left: 10px;" /></a></li>
                                        <li><a href="<?php echo base_url(PARTNER) ?>">View Hotel<img src="<?php echo base_url() ?>/assets/images/premium-subscription-icon.png" style="width:25px; margin-left: 10px;" /></a></li>    
                                        <?php }
                                        ?>
                                    </ul>
			                    </div>
			                </div>
			            </div>
			        </li>
			    </ul>
            </li>
            <li class="dropdown">
			    <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color:#263238;">Query<span class="caret"></span></a>
			    <ul class="dropdown-menu" style="">
			        <li>
			            <div class="yamm-content container-sm-height">
			                <div class="row row-sm-height yamm-col-bordered">
			                    <div class="col-sm-12 col-sm-height yamm-col">
                                    <ul class="list-unstyled mb20">
                                        <?php if($query_management == 1) {?>
                                        <li><a href="<?php echo base_url(PARTNER) ?>/addQuery">Add Query</a></li>
                                        <li><a href="<?php echo base_url(PARTNER) ?>/viewQuery">View Query</a></li>
                                        <?php } else { ?>
                                        <li><a href="<?php echo base_url(PARTNER) ?>">Add Query<img src="<?php echo base_url() ?>/assets/images/premium-subscription-icon.png" style="width:22px; margin-left: 10px;" /></a></li>
                                        <li><a href="<?php echo base_url(PARTNER) ?>">View Query<img src="<?php echo base_url() ?>/assets/images/premium-subscription-icon.png" style="width:22px; margin-left: 10px;" /></a></li>
                                        <?php 
                                        }?>
                                    </ul>
			                    </div>
			                </div>
			            </div>
			        </li>
			    </ul>
            </li>
            <li class="dropdown">
			    <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color:#263238;">Employee<span class="caret"></span></a>
			    <ul class="dropdown-menu" style="">
			        <li>
			            <div class="yamm-content container-sm-height">
			                <div class="row row-sm-height yamm-col-bordered">
			                    <div class="col-sm-12 col-sm-height yamm-col">
                                    <ul class="list-unstyled mb20">
                                        <li><a href="<?php echo base_url(PARTNER) ?>/addEmployee">Add New Employee</a></li>
                                        <li><a href="<?php echo base_url(PARTNER) ?>/viewEmployee">View Employee</a></li>
                                    </ul>
			                    </div>
			                </div>
			            </div>
			        </li>
			    </ul>
            </li>
            <li class="dropdown">
			    <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color:#263238;">Client<span class="caret"></span></a>
			    <ul class="dropdown-menu" style="">
			        <li>
			            <div class="yamm-content container-sm-height">
			                <div class="row row-sm-height yamm-col-bordered">
			                    <div class="col-sm-12 col-sm-height yamm-col">
                                    <ul class="list-unstyled mb20">
                                        <?php if($client_management == 1) {?>
                                        <li><a href="<?php echo base_url(PARTNER) ?>/addClient">Add Client</a></li>
                                        <li><a href="<?php echo base_url(PARTNER) ?>/viewClient">View Client</a></li>
                                        <?php }else {?>
                                        <li><a href="<?php echo base_url(PARTNER) ?>">Add Client<img src="<?php echo base_url() ?>/assets/images/premium-subscription-icon.png" style="width:22px; margin-left: 10px;" /></a></li>
                                        <li><a href="<?php echo base_url(PARTNER) ?>">View Client<img src="<?php echo base_url() ?>/assets/images/premium-subscription-icon.png" style="width:22px; margin-left: 10px;" /></a></li>
                                        <?php
                                        }?>
                                    </ul>
			                    </div>
			                </div>
			            </div>
			        </li>
			    </ul>
            </li>
            <li class="dropdown">
			    <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color:#263238;">Vendor<span class="caret"></span></a>
			    <ul class="dropdown-menu" style="">
			        <li>
			            <div class="yamm-content container-sm-height">
			                <div class="row row-sm-height yamm-col-bordered">
			                    <div class="col-sm-12 col-sm-height yamm-col">
                                    <ul class="list-unstyled mb20">
                                        <?php if($vendor_management == 1) {?>
                                        <li><a href="<?php echo base_url(PARTNER) ?>/addVendor">Add Vendor</a></li>
                                        <li><a href="<?php echo base_url(PARTNER) ?>/viewVendor">View Vendor</a></li>
                                        <?php }else {?>
                                        <li><a href="<?php echo base_url(PARTNER) ?>">Add Vendor<img src="<?php echo base_url() ?>/assets/images/premium-subscription-icon.png" style="width:22px; margin-left: 10px;" /></a></li>
                                        <li><a href="<?php echo base_url(PARTNER) ?>">View Vendor<img src="<?php echo base_url() ?>/assets/images/premium-subscription-icon.png" style="width:22px; margin-left: 10px;" /></a></li>
                                        <?php 
                                        }?>
                                    </ul>
			                    </div>
			                </div>
			            </div>
			        </li>
			    </ul>
            </li>
            <li class="dropdown">
			    <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color:#263238;">Workout<span class="caret"></span></a>
			    <ul class="dropdown-menu" style="">
			        <li>
			            <div class="yamm-content container-sm-height">
			                <div class="row row-sm-height yamm-col-bordered">
			                    <div class="col-sm-12 col-sm-height yamm-col">
                                    <ul class="list-unstyled mb20">
                                        <li><a href="<?php echo base_url(PARTNER) ?>/workoutPannel">Workout Panel</a></li>
                                    </ul>
			                    </div>
			                </div>
			            </div>
			        </li>
			    </ul>
            </li>
            <li class="dropdown">
			    <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color:#263238;">Tour Card<span class="caret"></span></a>
			    <ul class="dropdown-menu" style="">
			        <li>
			            <div class="yamm-content container-sm-height">
			                <div class="row row-sm-height yamm-col-bordered">
			                    <div class="col-sm-12 col-sm-height yamm-col">
                                    <ul class="list-unstyled mb20">
                                        <?php if($tourcard_management == 1) {?>
                                        <li><a href="<?php echo base_url(PARTNER) ?>/viewAllTourCard">Other Tour Cards</a></li>
                                        <?php }else {?>
                                        <li><a href="<?php echo base_url(PARTNER) ?>">Other Tour Cards<img src="<?php echo base_url() ?>/assets/images/premium-subscription-icon.png" style="width:22px; margin-left: 10px;" /></a></li>
                                        <?php }?>
                                    </ul>
			                    </div>
			                </div>
			            </div>
			        </li>
			    </ul>
            </li>
			<?php  }  
			if($roleId == ROLE_EMPLOYEE) { ?>
				 
			<li class="dropdown">
			    <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color:#263238;">Vendor<span class="caret"></span></a>
			    <ul class="dropdown-menu" style="">
			        <li>
			            <div class="yamm-content container-sm-height">
			                <div class="row row-sm-height yamm-col-bordered">
			                    <div class="col-sm-12 col-sm-height yamm-col">
                                    <ul class="list-unstyled mb20">
                                        <?php if($vendor_management == 1) { ?>
                                        <li><a href="<?php echo base_url(PARTNER) ?>/addVendor">Add Vendor</a></li>
                                        <li><a href="<?php echo base_url(PARTNER) ?>/viewVendor">View Vendor</a></li>
                                        <?php }else { ?>
                                        <li><a href="<?php echo base_url(PARTNER) ?>">Add Vendor<img src="<?php echo base_url() ?>/assets/images/premium-subscription-icon.png" style="width:22px; margin-left: 10px;" /></a></li>
                                        <li><a href="<?php echo base_url(PARTNER) ?>">View Vendor<img src="<?php echo base_url() ?>/assets/images/premium-subscription-icon.png" style="width:22px; margin-left: 10px;" /></a></li>
                                        <?php 
                                        } ?>
                                    </ul>
			                    </div>
			                </div>
			            </div>
			        </li>
			    </ul>
            </li>
            <li class="dropdown">
			    <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color:#263238;">Workout<span class="caret"></span></a>
			    <ul class="dropdown-menu" style="">
			        <li>
			            <div class="yamm-content container-sm-height">
			                <div class="row row-sm-height yamm-col-bordered">
			                    <div class="col-sm-12 col-sm-height yamm-col">
                                    <ul class="list-unstyled mb20">
                                        <li><a href="<?php echo base_url(PARTNER) ?>/workoutPannel">Workout Panel</a></li>
                                    </ul>
			                    </div>
			                </div>
			            </div>
			        </li>
			    </ul>
            </li>
            <li class="dropdown">
			    <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color:#263238;">Client<span class="caret"></span></a>
			    <ul class="dropdown-menu" style="">
			        <li>
			            <div class="yamm-content container-sm-height">
			                <div class="row row-sm-height yamm-col-bordered">
			                    <div class="col-sm-12 col-sm-height yamm-col">
			                        <ul class="list-unstyled mb20">
                                        <?php if($client_management == 1) {?>
                                        <li><a href="<?php echo base_url(PARTNER) ?>/addClient">Add Client</a></li>
                                        <li><a href="<?php echo base_url(PARTNER) ?>/viewClient">View Client</a></li>
                                        <?php }else {?>
                                        <li><a href="<?php echo base_url(PARTNER) ?>">Add Client<img src="<?php echo base_url() ?>/assets/images/premium-subscription-icon.png" style="width:22px; margin-left: 10px;" /></a></li>
                                        <li><a href="<?php echo base_url(PARTNER) ?>">View Client<img src="<?php echo base_url() ?>/assets/images/premium-subscription-icon.png" style="width:22px; margin-left: 10px;" /></a></li>
                                        <?php
                                        }?>
                                    </ul>
			                    </div>
			                </div>
			            </div>
			        </li>
			    </ul>
            </li>
            <li class="dropdown">
			    <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color:#263238;">Query<span class="caret"></span></a>
			    <ul class="dropdown-menu" style="">
			        <li>
			            <div class="yamm-content container-sm-height">
			                <div class="row row-sm-height yamm-col-bordered">
			                    <div class="col-sm-12 col-sm-height yamm-col">
                                    <ul class="list-unstyled mb20">
                                        <?php if($query_management == 1) {?>
                                        <li><a href="<?php echo base_url(PARTNER) ?>/queryInHand">Query In Hand</a></li>
                                        <li><a href="<?php echo base_url(PARTNER) ?>/confirmedQuery">Confirmed Query</a></li>
                                        <li><a href="<?php echo base_url(PARTNER) ?>/canceledQuery">Canceled Query</a></li>
                                        <?php } else { ?>
                                        <li><a href="<?php echo base_url(PARTNER) ?>">Query In Hand<img src="<?php echo base_url() ?>/assets/images/premium-subscription-icon.png" style="width:22px; margin-left: 10px;" /></a></li>
                                        <li><a href="<?php echo base_url(PARTNER) ?>">Confirmed Query<img src="<?php echo base_url() ?>/assets/images/premium-subscription-icon.png" style="width:22px; margin-left: 10px;" /></a></li>
                                        <li><a href="<?php echo base_url(PARTNER) ?>">Canceled Query<img src="<?php echo base_url() ?>/assets/images/premium-subscription-icon.png" style="width:22px; margin-left: 10px;" /></a></li>
                                        <?php 
                                        }?>
                                    </ul>
			                    </div>
			                </div>
			            </div>
			        </li>
			    </ul>
            </li>
            <li class="dropdown">
			    <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color:#263238;">Tour Card<span class="caret"></span></a>
			    <ul class="dropdown-menu" style="">
			        <li>
			            <div class="yamm-content container-sm-height">
			                <div class="row row-sm-height yamm-col-bordered">
			                    <div class="col-sm-12 col-sm-height yamm-col">
                                    <ul class="list-unstyled mb20">
                                        <?php if($tourcard_management == 1) {?>
                                        <li><a href="<?php echo base_url(PARTNER) ?>/viewOtherTourCard">Other Tour Card</a></li>
                                        <?php }else {?>
                                        <li><a href="<?php echo base_url(PARTNER) ?>">Other Tour Cards<img src="<?php echo base_url() ?>/assets/images/premium-subscription-icon.png" style="width:22px; margin-left: 10px;" /></a></li>
                                        <?php }?>
                                    </ul>
			                    </div>
			                </div>
			            </div>
			        </li>
			    </ul>
            </li>
            <li class="dropdown">
			    <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color:#263238;">Hotel<span class="caret"></span></a>
			    <ul class="dropdown-menu" style="">
			        <li>
			            <div class="yamm-content container-sm-height">
			                <div class="row row-sm-height yamm-col-bordered">
			                    <div class="col-sm-12 col-sm-height yamm-col">
                                    <ul class="list-unstyled mb20">
                                        <?php if($hotel_management == 1) {?>
                                        <li><a href="<?php echo base_url(PARTNER) ?>/addHotel">Add Hotel</a></li>
                                        <li><a href="<?php echo base_url(PARTNER) ?>/viewHotel">View Hotel</a></li>
                                        <?php }else{ ?>
                                        <li><a href="<?php echo base_url(PARTNER) ?>">Add Hotel<img src="<?php echo base_url() ?>/assets/images/premium-subscription-icon.png" style="width:22px; margin-left: 10px;" /></a></li>
                                        <li><a href="<?php echo base_url(PARTNER) ?>">View Hotel<img src="<?php echo base_url() ?>/assets/images/premium-subscription-icon.png" style="width:22px; margin-left: 10px;" /></a></li>    
                                        <?php }
                                        ?>
                                    </ul>
			                    </div>
			                </div>
			            </div>
			        </li>
			    </ul>
            </li>
			<?php } ?>
			
		</ul>
	</div>
	<!--new div for menu-->
		

	<ul class="nav navbar-nav toolbar pull-right" style="margin-right: 20px !important;">
		<li class="dropdown toolbar-icon-bg">
			<a href="#" id="navbar-links-toggle" data-toggle="collapse" data-target="header>.navbar-collapse">
				<span class="icon-bg">
					<i class="fa fa-fw fa-ellipsis-h"></i>
				</span>
			</a>
		</li>
		

		<!--<li class="toolbar-icon-bg demo-headerdrop-hidden">-->
  <!--          <a href="#" id="headerbardropdown"><span class="icon-bg"><i class="fa fa-fw fa-level-down"></i></span></i></a>-->
  <!--      </li>-->

        <li class="toolbar-icon-bg hidden-xs" id="trigger-fullscreen">
            <a href="#" class="toggle-fullscreen" style="color:#263238;"><span class="icon-bg"><i class="fa fa-fw fa-arrows-alt"></i></span></i></a>
        </li>

		
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

		<!--		<div class="dd-footer"><a href="#">View all messages</a></div>-->
		<!--	</div>-->
		<!--</li>-->
		
		<li class="dropdown toolbar-icon-bg">
			<a href="#" class="dropdown-toggle" data-toggle='dropdown' style="color:#263238;"><span class="icon-bg" style="width:auto;"><?php echo $name;?><i class="fa fa-fw fa-user"></i></span></a>
			<ul class="dropdown-menu userinfo arrow">
				<li><a href="#"><span class="pull-left">Profile</span> <span class="badge badge-info">80%</span></a></li>
				<li><a href="#"><span class="pull-left">Account</span> <i class="pull-right fa fa-user"></i></a></li>
				<li><a href="#"><span class="pull-left">Settings</span> <i class="pull-right fa fa-cog"></i></a></li>
				<li class="divider"></li>
				<!--<li><a href="#"><span class="pull-left">Earnings</span> <i class="pull-right fa fa-line-chart"></i></a></li>-->
				<!--<li><a href="#"><span class="pull-left">Statement</span> <i class="pull-right fa fa-list-alt"></i></a></li>-->
				<!--<li><a href="#"><span class="pull-left">Withdrawals</span> <i class="pull-right fa fa-dollar"></i></a></li>-->
				
				<li><a href="<?php echo base_url(PARTNER); ?>/partnerLogout"><span class="pull-left">Sign Out</span> <i class="pull-right fa fa-sign-out"></i></a></li>
			</ul>
		</li>

	</ul>
	

</header>