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
                    <a class="navbar-brand" href="<?php echo base_url()?>partnerLogin"><img class="img-responsive" src="<?php echo base_url()?>hotelhomepage/images/logo-1.png"></a>
			</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right hidden-xs hidden-sm">
					<li class="gold">
						<a href="javascript:void(0);">
							<button class="btn btn-gradient outline-button" style="margin-bottom: 0px;" data-toggle="" data-target="">
								<div style="background: #1C589B;transition: all 0.3s;">Register</div>
							</button>
						</a>
					</li>
				</ul>
				<ul class="nav navbar-nav navbar-right visible-xs visible-sm">
					<li class="gold" style="border-top: 1px solid rgba(255,255,255,0.1)"><a href="javascript:void(0);" data-toggle="" data-target="">Register</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<!-- NAVIGATION -->
	<!-- HEADER -->
	<!--<section id="home-section" style="background-image:url(<?php //echo base_url()?>hotelhomepage/images/banner-bg-2.png); background-repeat:no-repeat;">-->
	<!--	<div class="sectionP60 header-pad">-->
	<!--		<div class="container">-->
	<!--			<div class="row">-->
	<!--				<div class="col-md-12 col-sm-12 col-xs-12">-->
	<!--					<div class="row">-->
	<!--						<div class="col-md-5 col-sm-5 col-xs-12 header-text sectionP60">-->
	<!--							<h1 class="rL white">List your property for free and maximize online bookings</h1>-->
	<!--							<p class="rL" style="color:#FFF;">Hotel, Villa, Resort, Lodge, Guest house, Serviced Apts, Hostel, Homestay, Cottage & BnB</p>-->
	<!--							<button class="btn btn-gradient" data-aos="zoom-in-up" data-aos-duration="800">Get Started Today for Free</button>-->
	<!--						</div>-->
	<!--					</div>-->
	<!--				</div>-->
	<!--			</div>-->
	<!--		</div>-->
	<!--	</div>-->
	<!--</section>-->
	<!-- HEADER -->
	<div class="container">
	    <div class="sectionP60 header-pad">
	        <div class="col-md-12">
	            <h3 style="color:#1C589B;">Partner Registeration</h3>
	        </div>
	        <div class="col-md-12" id="returnmsg" style="display:none; text-align:center;">
	            <h1 style="color:#1C589B;">Thank You For Register With Us As Travel Partner</h1>
	            <h3 style="color:#1C589B;">Our Team Will Reach You soon</h3>
	            <a href="<?php echo base_url()?>partnerLogin">
							<button class="btn btn-gradient outline-button" style="margin-bottom: 0px;" data-toggle="" data-target="">
								<div style="background: #1C589B;transition: all 0.3s;">Go Back</div>
							</button>
				</a>
	        </div>
	    <div class="col-md-12" id="newRegister">
	        <form method="POST" id="registerNew" name="registerNew">
				<div class="body" style="padding: 10px;">
				    <div class="col-md-4">
				       <div class="input-box">
						 <input type="text" placeholder="Full Name" name="fullname" id="fullname" required>
						 <span style="position: absolute"><i class="fa fa-user"></i></span>
					   </div>    
				    </div>
					<div class="col-md-4">
					   <div class="input-box">
						<input placeholder="Email" type="email" name="email" id="email" required>
                        <span style="position: absolute"><i class="fa fa-envelope"></i></span>
					   </div>
					</div>
					<div class="col-md-4">
					   <div class="input-box">
						<input placeholder="Contact" type="text" name="contact" id="contact" required>
                        <span style="position: absolute"><i class="fa fa-phone"></i></span>
					   </div>
					</div>
					
					<div class="col-md-4">
				       <div class="input-box">
						 <input type="text" placeholder="Company Name" name="companyname" id="companyname" required>
						 <span style="position: absolute"><i class="fa fa-user"></i></span>
					   </div>    
				    </div>
				    <div class="col-md-4">
				        <div class="input-box">
						<input placeholder="Company Contact" type="text" name="companycontact" id="companycontact" required>
                        <span style="position: absolute"><i class="fa fa-phone"></i></span>
					   </div>
				    </div>
				    <div class="col-md-4">
				         <div class="input-box">
						<input placeholder="Company Email" type="email" name="companyemail" id="companyemail" required>
                        <span style="position: absolute"><i class="fa fa-envelope"></i></span>
					   </div>
				    </div>
				    
					<div class="col-md-4">
					   <div class="input-box">
						<input placeholder="Address" type="text" name="address" id="address" required>
                        <span style="position: absolute"><i class="fa fa-envelope"></i></span>
					   </div>
					</div>
					<div class="col-md-4">
					   <div class="input-box">
						<input placeholder="Address Line 1" type="text" name="address1" id="address1" required>
                        <span style="position: absolute"><i class="fa fa-envelope"></i></span>
					   </div>
					</div>
					<div class="col-md-4">
				       <div class="input-box">
						 <input type="text" placeholder="Country" name="country" id="country" required>
						 <span style="position: absolute"><i class="fa fa-user"></i></span>
					   </div>    
				    </div>
				    
					<div class="col-md-4">
					   <div class="input-box">
						<input placeholder="State" type="text" name="state" id="state" required>
                        <span style="position: absolute"><i class="fa fa-envelope"></i></span>
					   </div>
					</div>
					<div class="col-md-4">
					   <div class="input-box">
						<input placeholder="City" type="text" name="city" id="city" required>
                        <span style="position: absolute"><i class="fa fa-phone"></i></span>
					   </div>
					</div>
					<div class="col-md-4">
					   <div class="input-box">
						<input placeholder="Pincode" type="text" name="pincode" id="pincode" required>
                        <span style="position: absolute"><i class="fa fa-phone"></i></span>
					   </div>
					</div>
					
				</div>
				<div class="foot">
					<button type="button" id="sendmail" style="margin-top:10px;" class="btn btn-gradient W100 pull-right">Register</button>
				</div>
			</form>
	    </div>
		<div class="col-sm-12">
			<img class="img-responsive" src="<?php echo base_url()?>hotelhomepage/images/midd-country-symbols.png">
		</div>
		</div>
	</div>

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
<script>
    $(document).ready(function(){
        
        $("#sendmail").click(function(){
            // var fullname = 
            // var contact = 
            // var email = 
            // var companyname = 
            // var companycontact=
            // var companyemail = $("#companyemail").val();
            // var address = $("#address").val();
            // var address1 = $("#address1").val();
            // var country = $("#country").val();
            // var state = $("#state").val();
            // var city = $("#city").val();
            // var pincode = $("#pincode").val();
            //var data = $("#registerNew").serialize();
                    $.ajax({
					    type: "POST",
					    url: "<?php echo base_url() ?>"+'newPartnerRegistermail.php',
					    data: $("#registerNew").serialize(),
					    //cache: false,
					    beforeSend:function() {
						    //$("#showLoaderEmail").show();
				    	    },
					    success: function(html)
					    {
						    //alert(html);	
						    if(html)
						    {
							    alert('Email Sent Successfully');
							    $('#newRegister').css('display','none');
							    $('#returnmsg').css('display','block');
							    //$("#showLoaderEmail").hide();
						    }
						    else
						    {
							    alert('There is some error in sending email');
						    }
					    }
				    });
        });
        
    });
</script>