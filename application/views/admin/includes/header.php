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
    <link rel="shortcut icon" href="<?php echo base_url()?>hotelhomepage/images/icon.png" type="image/x-icon">
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
	<link rel="stylesheet" href="<?php echo base_url(); ?>asset/plugins/select2/select2.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script> 	
<input type="hidden" id="baseurl" name="baseurl" value="<?php echo base_url(ADMIN_URL); ?>" />
</head>
<div class="custom-loader" id="custom-loader" style="display: none;"><img src="<?php echo base_url();?>assets/images/loader.gif" width='50%' height='50%'></div>
<body class="infobar-offcanvas" style="overflow-x: hidden;">
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
<header id="topnav" class="navbar navbar-midnightblue navbar-fixed-top clearfix" role="banner">

	<a class="navbar-brand" href="<?php echo base_url(ADMIN_URL); ?>/dashboard" ><img src="<?php echo base_url(); ?>hotelhomepage/images/logo.png" height="30" alt="logo" style="padding-bottom:-10px;"/><div><?php echo $name; ?></div></a>
	
	<div class="yamm navbar-left navbar-collapse collapse in">
		<ul class="nav navbar-nav">
		<?php if($role == ROLE_ADMIN){ ?>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">Megamenu<span class="caret"></span></a>
				<ul class="dropdown-menu" style="width: 900px;">
					<li>
						<div class="yamm-content container-sm-height">
							<div class="row row-sm-height yamm-col-bordered">
								<div class="col-sm-4 col-sm-height yamm-col">
                                            
                                    <h3 class="yamm-category">Employee Management</h3>
                                    <ul class="list-unstyled mb20">
                                        <li><a href="<?php echo base_url(ADMIN_URL) ?>/addEmployee">Add Employee</a></li>
                                        <li><a href="<?php echo base_url(ADMIN_URL)?>/viewEmployee">View Employee</a></li>  
                                    </ul>

                                    <h3 class="yamm-category">Vendor Management</h3>
                                    <ul class="list-unstyled">
                                        <li><a href="<?php echo base_url(ADMIN_URL) ?>/addVendor">Add Vendor</a></li>
                                        <li><a href="<?php echo base_url(ADMIN_URL) ?>/viewVendor">View Vendor</a></li>   
                                    </ul>
                                    <h3 class="yamm-category">Workout Management</h3>
                                    <ul class="list-unstyled">
                                        <li><a href="<?php echo base_url(ADMIN_URL) ?>/workout">Workout Panel</a></li>
                                        <li><a href="<?php echo base_url(ADMIN_URL) ?>/ViewsavedHotelPackages">Hotel Bookings</a></li>
                                    </ul>
                                </div>
                                <div class="col-sm-4 col-sm-height yamm-col">
                                    
                                    <h3 class="yamm-category">Hotel Management</h3>
                                    <ul class="list-unstyled mb20">
                                        <li><a href="<?php echo base_url(ADMIN_URL) ?>/viewHotelPartner">View Hotel Partners</a></li>
                                        <li><a href="<?php echo base_url(ADMIN_URL) ?>/viewHotel">View Active Hotels</a></li>
                                        <li><a href="<?php echo base_url(ADMIN_URL) ?>/viewInactiveHotel">View Inactive Hotels</a></li>
                                    </ul>

                                    <h3 class="yamm-category">Partner Management</h3>
                                    <ul class="list-unstyled">
                                    	<li><a href="<?php echo base_url(ADMIN_URL) ?>/addPartner">Add New Partner</a></li>
                                        <li><a href="<?php echo base_url(ADMIN_URL) ?>/viewPartner">View Partners</a></li>
                                    </ul>
                                    
                                </div>
                                <div class="col-sm-4 col-sm-height yamm-col">
                                    
                                    <h3 class="yamm-category">Itinerary Management</h3>
                                    <ul class="list-unstyled">
                                        <li><a href="<?php echo base_url(ADMIN_URL) ?>/addItinerary">Add Itinerary</a></li>
                                        <li><a href="<?php echo base_url(ADMIN_URL) ?>/viewItinerary">View Itineraries</a></li>   
                                    </ul>

                                    <h3 class="yamm-category">Activities Management</h3>
                                    <ul class="list-unstyled">
                                        <li><a href="<?php echo base_url(ADMIN_URL) ?>/addActivities">Add Activities By Per Person</a></li>
                                        <li><a href="<?php echo base_url(ADMIN_URL) ?>/addActivitiesByUnit">Add Activities By Per Unit</a></li>
                                        <li><a href="<?php echo base_url(ADMIN_URL) ?>/viewActivities">View Activities</a></li>
                                        <li><a href="<?php echo base_url(ADMIN_URL) ?>/viewPerUnitActivities">View Per Unit Activities</a></li>
                                    </ul>
                                    
                                    
                                </div>
                                <!-- <div class="col-sm-3 col-sm-height yamm-col">
                                	<h3 class="yamm-category">Rem</h3>
                                    <img src="<?php echo base_url(); ?>assets/demo/stockphoto/communication_12_carousel.jpg" class="mb20 img-responsive" style="width: 100%;">
                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium. totam rem aperiam eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                                </div> -->
							</div>
						</div>
					</li>
				</ul>
			</li>
			<?php  } ?>
			<?php if($role == ROLE_ADMIN){ ?>
				<li class="dropdown" id="widget-classicmenu">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">Master Data<span class="caret"></span></a>
				<ul class="dropdown-menu" role="menu">
				  <li><a href="<?php echo base_url(ADMIN_URL) ?>/viewCountries" id="demoskylo">View Country</a></li>
				  <li><a href="<?php echo base_url(ADMIN_URL) ?>/viewState">View State</a></li>
				  <li><a href="<?php echo base_url(ADMIN_URL) ?>/viewCity">View City</a></li>
				  <li><a href="<?php echo base_url(ADMIN_URL) ?>/viewVehicle">View Vehicle</a></li>
				</ul>
			  </li>
			<?php } ?>
			
		</ul>
	</div>

	<ul class="nav navbar-nav toolbar pull-right" style="margin-right: 20px !important;">
		<li class="dropdown toolbar-icon-bg">
			<a href="#" id="navbar-links-toggle" data-toggle="collapse" data-target="header>.navbar-collapse">
				<span class="icon-bg">
					<i class="fa fa-fw fa-ellipsis-h"></i>
				</span>
			</a>
		</li>

		<li class="toolbar-icon-bg demo-headerdrop-hidden">
            <a href="#" id="headerbardropdown"><span class="icon-bg"><i class="fa fa-fw fa-level-down"></i></span></i></a>
        </li>

        <li class="toolbar-icon-bg hidden-xs" id="trigger-fullscreen">
            <a href="#" class="toggle-fullscreen"><span class="icon-bg"><i class="fa fa-fw fa-arrows-alt"></i></span></i></a>
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
			<a href="#" class="dropdown-toggle" data-toggle='dropdown'><span class="icon-bg"><i class="fa fa-fw fa-user"></i></span></a>
			<ul class="dropdown-menu userinfo arrow">
				<li><a href="#"><span class="pull-left">Profile</span> <span class="badge badge-info">80%</span></a></li>
				<li><a href="#"><span class="pull-left">Account</span> <i class="pull-right fa fa-user"></i></a></li>
				<li><a href="#"><span class="pull-left">Settings</span> <i class="pull-right fa fa-cog"></i></a></li>
				<li class="divider"></li>
				<li><a href="#"><span class="pull-left">Earnings</span> <i class="pull-right fa fa-line-chart"></i></a></li>
				<li><a href="#"><span class="pull-left">Statement</span> <i class="pull-right fa fa-list-alt"></i></a></li>
				<li><a href="#"><span class="pull-left">Withdrawals</span> <i class="pull-right fa fa-dollar"></i></a></li>
				<li class="divider"></li>
				<li><a href="<?php echo base_url(ADMIN_URL); ?>/logout"><span class="pull-left">Sign Out</span> <i class="pull-right fa fa-sign-out"></i></a></li>
			</ul>
		</li>

	</ul>

</header>