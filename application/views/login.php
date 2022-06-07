<!DOCTYPE html>
<html lang="en">

<head>
	<title>Travwhizz.com</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="shortcut icon" href="<?php echo base_url()?>hotelhomepage/images/icon.png" type="image/x-icon">
	<!--All css  are here-->
	<!--Bootstrap css here-->
	<link rel="stylesheet" href="<?php echo base_url()?>hotelhomepage/css/bootstrap.css">
	<!--Font-Awsome css here-->
	<link rel="stylesheet" href="<?php echo base_url()?>hotelhomepage/css/font-awesome.min.css">
	<!--Owl-carousel css here-->
	<link rel="stylesheet" href="<?php echo base_url()?>hotelhomepage/plugins/owl/owl.carousel.css">
	<link rel="stylesheet" href="<?php echo base_url()?>hotelhomepage/plugins/owl/owl.theme.css">
	<link rel="stylesheet" href="<?php echo base_url()?>hotelhomepage/plugins/owl/owl.transitions.css">
	<!--Custon css here-->
	<link rel="stylesheet" href="<?php echo base_url()?>hotelhomepage/css/custom.css">
	<!--Scroll Animation - aos-master css here-->
	<link rel="stylesheet" href="<?php echo base_url()?>hotelhomepage/plugins/aos-master/aos.css" />
	<!--Responsive css here-->
	<link rel="stylesheet" href="<?php echo base_url()?>hotelhomepage/css/responsive.css">
</head>

<body>
	<div class="se-pre-con"></div>
	<!-- NAVIGATION -->
	<nav class="navbar navbar-default">
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header logoo">
				<button id="tog-btn" type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
                    <a class="navbar-brand" href="#home-section"><img class="img-responsive" src="<?php echo base_url()?>hotelhomepage/images/logo-1.png"></a>
			</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right hidden-xs hidden-sm">
					<li class="gold">
						<a href="<?php echo base_url()?>partnerRegister">
							<button class="btn btn-gradient outline-button" style="margin-bottom: 0px;" data-toggle="" data-target="">
								<div style="background: #1C589B;transition: all 0.3s;">Register</div>
							</button>
						</a>
					</li>
				</ul>
				<ul class="nav navbar-nav navbar-right visible-xs visible-sm">
					<li class="gold" style="border-top: 1px solid rgba(255,255,255,0.1)"><a href="<?php echo base_url()?>partnerRegister" data-toggle="" data-target="">Register</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<!-- NAVIGATION -->
	<!-- HEADER -->
	<section id="home-section" style="background-image:url(<?php echo base_url()?>hotelhomepage/images/banner-bg-2.png); background-repeat:no-repeat;">
		<div class="sectionP60 header-pad">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="row">
							<div class="col-md-5 col-sm-5 col-xs-12 header-text sectionP60">
								<h1 class="rL white">List your property for free and maximize online bookings</h1>
								<p class="rL" style="color:#FFF;">Hotel, Villa, Resort, Lodge, Guest house, Serviced Apts, Hostel, Homestay, Cottage & BnB</p>
								<button class="btn btn-gradient" data-aos="zoom-in-up" data-aos-duration="800">Get Started Today for Free</button>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12 pull-right">
								<div class="login-div centered" data-aos="fade-up" data-aos-duration="1000">
								    
									<div class="head">
										<h3 class="purple oR m0">Travel Partner</h3>
										<p class="light oR">Enter your credentials to login.</p>
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
                                    <?php }?>
									<form action="<?php echo base_url() ?>loginPartner" method="POST" id="partner_login" name="partner_login">
										<div class="body" style="padding: 10px;">
										    <div class="input-box">
										        <select name="login_type" required="true">
										            <option value="">Select User</option>
                                                    <option value="1">Admin</option>
                                                    <option value="2">Employee</option>
										        </select>
										        <span style="position: absolute"><i class="fa fa-user"></i></span>
										    </div>
											<div class="input-box">
												<input placeholder="Email" type="text" name="email" required>
                                            <span style="position: absolute"><i class="fa fa-envelope"></i></span>
											</div>
											<div class="input-box">
												<input placeholder="Password" name="password" type="password" required>
                                            <span style="position: absolute"><i class="fa fa-key"></i></span>
											</div>
										</div>
										<div class="foot">
                                            <a href="javascript:;" class="forgot pull-left" data-toggle="modal" data-target="#popUp-forgotpass"><small>forgot your password?</small></a>
											<button type="submit" name="login_button" id="login_button" class="btn btn-gradient W100 pull-right">Login!</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- HEADER -->
	<div class="container">
		<div class="col-sm-12">
			<img class="img-responsive" src="<?php echo base_url()?>hotelhomepage/images/midd-country-symbols.png">
		</div>
	</div>
	<!-- About -->
	<section id="about-section" style="padding-bottom:20px; padding-top:60px;">
		<div class="container">
			<div class="heading-text text-center" data-aos="fade-up" data-aos-duration="1000"><span class="gold-gradient-color">How We Works</span>
			</div>
			<br>
			<br>
			<br>
			<br>
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="services-div margin-minus" data-aos="fade-up" data-aos-duration="1000">
						<div class="col-md-3 col-sm-6 col-xs-12 text-center br service-hover">
							<div class="service" data-aos="zoom-in" data-aos-duration="1000">
								<div class="service-icon">
                                    <i class="fa fa-laptop"></i>
								</div>
								<div class="service-desc">
									<h4 class="blue oB">Free Sign Up</h4>
									<p class="light oR">Lorem ipsum dolor sit amet, consectetur adipisicing elit, Aliquam amet beatae.</p>
								</div>
							</div>
						</div>
						<div class="col-md-3 col-sm-6 col-xs-12 text-center br b0 service-hover">
							<div class="service" data-aos="zoom-in" data-aos-duration="1000">
								<div class="service-icon">
                                    <i class="fa fa-home"></i>
								</div>
								<div class="service-desc">
									<h4 class="blue oB">Fill Property Details</h4>
									<p class="light oR">Lorem ipsum dolor sit amet, consectetur adipisicing elit, Aliquam amet beatae.</p>
								</div>
							</div>
						</div>
						<div class="col-md-3 col-sm-6 col-xs-12 text-center br b0 service-hover">
							<div class="service" data-aos="zoom-in" data-aos-duration="1000">
								<div class="service-icon">
                                    <i class="fa fa-file"></i>
								</div>
								<div class="service-desc">
									<h4 class="blue oB">Submit Documents</h4>
									<p class="light oR">Lorem ipsum dolor sit amet, consectetur adipisicing elit, Aliquam amet beatae.</p>
								</div>
							</div>
						</div>
						<div class="col-md-3 col-sm-6 col-xs-12 text-center br service-hover">
							<div class="service" data-aos="zoom-in" data-aos-duration="1000">
								<div class="service-icon">
                                    <i class="fa fa-get-pocket"></i>
								</div>
								<div class="service-desc">
									<h4 class="blue oB">Get Online Bookings</h4>
									<p class="light oR">Lorem ipsum dolor sit amet, consectetur adipisicing elit, Aliquam amet beatae.</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- About -->
	<!-- Number Counter -->
	<section class="counter-bg">
		<div class="sectionP40 blue-bg">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="col-md-5 col-md-offset-0 col-sm-10 col-sm-offset-1 col-xs-12">
							<div class="responsive" data-aos="fade-right" data-aos-duration="1000">
								<div class="heading-text">
                                    <span class="gold-gradient-color">Little bit of stats.</span>
								</div>
								<p class="light2 oL" style="font-size: 16px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
								<button class="btn btn-gradient outline-button mtb20 hidden-sm hidden-xs" data-aos="zoom-in-up" data-aos-duration="800">
									<div style="background: #091D48;transition: all 0.3s">Buy Now</div>
								</button>
							</div>
						</div>
						<div id="counter" class="col-md-5 col-sm-12 col-xs-12 pull-right resPad0">
							<div class="col-md-6 col-sm-3 col-xs-6 br bb">
								<div class="numbers text-center" data-aos="zoom-in" data-aos-duration="1000">
                                    <span class="numscroller rB gold-gradient-color" data-min='0000' data-max='4969' data-delay='1' data-increment='25'>00</span>
									<p class="white oR">Downloads</p>
								</div>
							</div>
							<div class="col-md-6 col-sm-3 col-xs-6 bb">
								<div class="numbers text-center" data-aos="zoom-in" data-aos-duration="1000">
                                    <span class="numscroller rB gold-gradient-color" data-min='0000' data-max='4670' data-delay='1' data-increment='25'>00</span>
									<p class="white oR">Theme Lovers</p>
								</div>
							</div>
							<div class="col-md-6 col-sm-3 col-xs-6 br">
								<div class="numbers text-center" data-aos="zoom-in" data-aos-duration="1000">
                                    <span class="numscroller rB gold-gradient-color" data-min='0000' data-max='4343' data-delay='1' data-increment='25'>00</span>
									<p class="white oR">Followers</p>
								</div>
							</div>
							<div class="col-md-6 col-sm-3 col-xs-6">
								<div class="numbers text-center" data-aos="zoom-in" data-aos-duration="1000">
                                    <span class="numscroller rB gold-gradient-color" data-min='0000' data-max='4546' data-delay='1' data-increment='25'>00</span>
									<p class="white oR">Haters</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Number Counter -->
	<section id="about-section" style="padding-bottom:40px; padding-top:50px;">
		<div class="container">
			<div class="heading-text text-center" data-aos="fade-up" data-aos-duration="1000"><span class="gold-gradient-color">Features at a Glance</span>
			</div>
			<br>
			<br>
			<br>
			<br>
			<div class="row" style="margin-bottom:10px;">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="services-div margin-minus" data-aos="fade-up" data-aos-duration="1000">
						<div class="col-md-3 col-sm-6 col-xs-12 text-center" style="margin-bottom:10px;">
							<div class="service" data-aos="zoom-in" data-aos-duration="1000">
								<img class="img-boxs" src="<?php echo base_url()?>hotelhomepage/images/middbox-img2.png">
							</div>
						</div>
						<div class="col-md-3 col-sm-6 col-xs-12 text-center" style="margin-bottom:10px;">
							<div class="service" data-aos="zoom-in" data-aos-duration="1000" style="background: #f99f24; border-radius:6px;">
								<div class="service-icon">
									<img src="<?php echo base_url()?>hotelhomepage/images/Multi-Hotel-Support.png" width="70px;">
								</div>
								<div class="service-desc">
									<h4 class="white oB">Multi Hotel Support</h4>
									<p class="white oR">VCapability to manage chain of hotels from single screen</p>
								</div>
							</div>
						</div>
						<div class="col-md-3 col-sm-6 col-xs-12 text-center" style="margin-bottom:10px;">
							<div class="service" data-aos="zoom-in" data-aos-duration="1000">
								<img class="img-boxs" src="<?php echo base_url()?>hotelhomepage/images/middbox-img2.png">
							</div>
						</div>
						<div class="col-md-3 col-sm-6 col-xs-12 text-center" style="margin-bottom:10px;">
							<div class="service" data-aos="zoom-in" data-aos-duration="1000" style="background:#1e999e; border-radius:6px;">
								<div class="service-icon">
									<img src="<?php echo base_url()?>hotelhomepage/images/Competition-Rate.png" width="70px;">
								</div>
								<div class="service-desc">
									<h4 class="white oB">Competition Rate</h4>
									<p class="white oR">VCapability to manage chain of hotels from single screen</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="services-div margin-minus" data-aos="fade-up" data-aos-duration="1000">
						<div class="col-md-3 col-sm-6 col-xs-12 text-center" style="margin-bottom:10px;">
							<div class="service" data-aos="zoom-in" data-aos-duration="1000" style="background:#7256aa; border-radius:6px;">
								<div class="service-icon">
									<img src="<?php echo base_url()?>hotelhomepage/images/Multi-Hotel-Support.png" width="70px;">
								</div>
								<div class="service-desc">
									<h4 class="white oB">Multi Hotel Support</h4>
									<p class="white oR">VCapability to manage chain of hotels from single screen</p>
								</div>
							</div>
						</div>
						<div class="col-md-3 col-sm-6 col-xs-12 text-center" style="margin-bottom:10px;">
							<div class="service" data-aos="zoom-in" data-aos-duration="1000">
								<img class="img-boxs" src="<?php echo base_url()?>hotelhomepage/images/middbox-img2.png">
							</div>
						</div>
						<div class="col-md-3 col-sm-6 col-xs-12 text-center" style="margin-bottom:10px;">
							<div class="service" data-aos="zoom-in" data-aos-duration="1000" style="background:#1C589B; border-radius:6px;">
								<div class="service-icon">
									<img src="<?php echo base_url()?>hotelhomepage/images/Competition-Rate.png" width="70px;">
								</div>
								<div class="service-desc">
									<h4 class="white oB">Competition Rate</h4>
									<p class="white oR">VCapability to manage chain of hotels from single screen</p>
								</div>
							</div>
						</div>
						<div class="col-md-3 col-sm-6 col-xs-12 text-center" style="margin-bottom:10px;">
							<div class="service" data-aos="zoom-in" data-aos-duration="1000">
								<img class="img-boxs" src="<?php echo base_url()?>hotelhomepage/images/middbox-img2.png">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		</div>
	</section>
	<!-- Footer Section -->
	<footer id="contact-section" class="sectionP60 dark-bg">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="company-desc logoo">
                        <a href=""><img class="img-responsive" src="<?php echo base_url()?>hotelhomepage/images/logo.png"/></a>
						<span class="light2 oR" style="font-size:17px; color:#FFF;">
                            <a href="<?php echo base_url()?>">Home</a>&nbsp;&nbsp;&nbsp;&nbsp;
                            <!--<a href="#">Company</a>&nbsp;&nbsp;&nbsp;&nbsp;-->
                            <a href="<?php echo base_url()?>">Contact Us</a>&nbsp;&nbsp;&nbsp;&nbsp;
                            <!--<a href="#">lidtravel.com</a>&nbsp;&nbsp;&nbsp;&nbsp;-->
                            <a href="#">24x7 Customer Support</a>&nbsp;&nbsp;&nbsp;&nbsp;
                            <a href="<?php echo base_url()?>hotelPartner">Hotel Login</a>
                        </span>
					</div>
				</div>
			</div>
		</div>
		</div>
	</footer>
	<!-- Footer Section -->
	<!-- Copyright Section -->
	<section class="sectionP20" style="background: #0b101d;">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="col-md-12">
						<p class="light oR m0" style="color:#FFF;">Copyright © 2021. Travwhizz.com. All rights reserved.</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Copyright Section -->
	<!-- Scroll Back Top Button -->
	<button onclick="topFunction()" id="myBtn" class="btn btn-gradient"><i class="visible-xs fa fa-arrow-up"></i>
		<tag class="hidden-xs">Back To Top</tag>
	</button>
	<!-- Scroll Back Top Button -->
	<!-- Register Popup -->
	<div id="pop-register" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" data-aos="zoom-in-up" data-aos-duration="800">&times;</button>
					<h3 class="modal-title  blue oR m0">REGISTER</h3>
					<span class="light oR" style="font-size: 14px">Enter your informations to register.</span>
				</div>
				<form action="#">
					<div class="modal-body">
						<div class="input-box">
							<input placeholder="Full Name" type="text" required>
                            <span style="position: absolute"><i class="fa fa-user"></i></span>
						</div>
						<div class="input-box">
							<input placeholder="Email Address" type="email" required>
                            <span style="position: absolute"><i class="fa fa-envelope-o"></i></span>
						</div>
						<div class="input-box">
							<input placeholder="Login Key" type="text" required>
                            <span style="position: absolute"><i class="fa fa-key"></i></span>
						</div>
						<div class="input-box">
							<input placeholder="Confirm Login Key" type="text" required>
                            <span style="position: absolute"><i class="fa fa-key"></i></span>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-gradient" data-dismiss="modal">Register</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Register Popup -->
	<!--Forgot Password Popup-->
<div id="popUp-forgotpass" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" data-aos="zoom-in-up" data-aos-duration="800">&times;</button>
				<h3 class="modal-title  blue oR m0">Forgot Password</h3>
				<span class="light oR" style="font-size: 14px">Enter your login email to get reset link.</span>
			</div>
			<form action="#">
				<div class="modal-body">
				    <div classs="row">
                        <div class="col-md-12" id="resStatus"></div>
                    </div>
					<div class="input-box">
						<input placeholder="Email Address" type="email" name="login_email" id="email" required>
                        <span style="position: absolute"><i class="fa fa-envelope-o"></i></span>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-gradient" id="">Register</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!--Forgot Password Popup-->
	<!-- All Javascripts -->
	<!-- Jquery -->
	<script src="<?php echo base_url()?>hotelhomepage/js/jquery.min.js"></script>
	<!-- Bootstrap -->
	<script type="text/javascript" src="<?php echo base_url()?>hotelhomepage/js/bootstrap.js"></script>
	<!-- Nice Scroll -->
	<script type="text/javascript" src="<?php echo base_url()?>hotelhomepage/plugins/niceScroll/niceScroll.min.js"></script>
	<!-- Number Counter -->
	<script type="text/javascript" src="<?php echo base_url()?>hotelhomepage/plugins/numScroll/numscroller-1.0.js"></script>
	<!-- Scroll Animations aos-master js -->
	<script src="<?php echo base_url()?>hotelhomepage/plugins/aos-master/aos.js"></script>
	<!-- Common -->
	<script type="text/javascript" src="<?php echo base_url()?>hotelhomepage/js/common.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>hotelhomepage/plugins/owl/owl.carousel.js"></script>
	<!-- All Javascripts -->
</body>

</html>