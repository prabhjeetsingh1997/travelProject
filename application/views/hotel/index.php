<!-- HEADER -->
	<section id="home-section" class="header-bg">
		<div class="sectionP60 header-pad">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="row">
							<div class="col-md-5 col-sm-5 col-xs-12 header-text sectionP60">
								<h1 class="rL white">List your property for free and maximize online bookings</h1>
								<p class="rL" style="color:#FFF;">Hotel, Villa, Resort, Lodge, Guest house, Serviced Apts, Hostel, Homestay, Cottage & BnB</p>
								<a href="javascript:void(0)">
								<button class="btn btn-gradient" data-aos="zoom-in-up" data-aos-duration="800" data-toggle="modal" data-target="#pop-register">Get Started Today for Free</button>
								</a>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12 pull-right">
								<div class="login-div centered" data-aos="fade-up" data-aos-duration="1000">
									<div class="head">
										<h3 class="purple oR m0">LOGIN</h3>
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
									<form id="user_login" method="POST" action="<?php echo base_url() ?>hotelPartner" name="user_login">
										<div class="body">
											<div class="input-box">
												<input placeholder="Your Email" id="hotel_email" name="hotel_email" type="text" required>
                                                <span style="position: absolute"><i class="fa fa-user"></i></span>
											</div>
											<div class="input-box">
												<input autocomplete="off" id="hotel_password" name="hotel_password" placeholder="Password" type="password" required>
                                                <span style="position: absolute"><i class="fa fa-key"></i></span>
											</div>
										</div>
										<div class="foot">
                                            <a class="forgot pull-left" data-toggle="modal" data-target="#popUp-forgotpass"><small>forgot your password?</small></a>
											<button type="submit" class="btn btn-gradient W100 pull-right" id="login_button">Login!</button>
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
			<img class="img-responsive" src="<?php echo base_url() ?>hotelhomepage/images/midd-country-symbols.png">
		</div>
	</div>
	<!-- About -->
	<section id="about-section" style="padding-bottom:20px; padding-top:60px;">
		<div class="container">
			<div class="heading-text text-center" data-aos="fade-up" data-aos-duration="1000"><span class="gold-gradient-color">How It Works</span>
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
									<p class="light oR">A simple hello is all it takes to get started. Signup for free today.</p>
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
									<p class="light oR">Tell us a little about you and your property and we will take care of the rest.</p>
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
									<p class="light oR">Submit documents like contract copy, any text & regulatory document and you are all set to go.</p>
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
									<p class="light oR">Thats it! soon, your property will be live and availiable to millions of travellers.</p>
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
								<p class="light2 oL" style="font-size: 16px;">Be simplify the complex travel industry to give you all the solutions you need to maximise occupency. New travel agents coming on board on daily basis.</p>
								<button class="btn btn-gradient outline-button mtb20 hidden-sm hidden-xs" data-aos="zoom-in-up" data-aos-duration="800">
									<div style="background: #091D48;transition: all 0.3s">Register Now</div>
								</button>
							</div>
						</div>
						<div id="counter" class="col-md-5 col-sm-12 col-xs-12 pull-right resPad0">
							<div class="col-md-6 col-sm-3 col-xs-6 br bb">
								<div class="numbers text-center" data-aos="zoom-in" data-aos-duration="1000">
                                    <span class="numscroller rB gold-gradient-color" data-min='0' data-max='500' data-delay='1' data-increment='4'>500+</span>
									<p class="white oR">Hotels<br>Registered</p>
								</div>
							</div>
							<div class="col-md-6 col-sm-3 col-xs-6 bb">
								<div class="numbers text-center" data-aos="zoom-in" data-aos-duration="1000">
                                    <span class="numscroller rB gold-gradient-color" data-min='0' data-max='50' data-delay='1' data-increment='2'>50+</span>
									<p class="white oR">Travel Agents<br>Registered</p>
								</div>
							</div>
							<div class="col-md-6 col-sm-3 col-xs-6 br">
								<div class="numbers text-center" data-aos="zoom-in" data-aos-duration="1000">
                                    <span class="numscroller rB gold-gradient-color" data-min='0' data-max='1000' data-delay='1' data-increment='5'>1000+</span>
									<p class="white oR">Room Nights<br>Sold</p>
								</div>
							</div>
							<div class="col-md-6 col-sm-3 col-xs-6">
								<div class="numbers text-center" data-aos="zoom-in" data-aos-duration="1000">
                                    <span class="numscroller rB gold-gradient-color" data-min='0' data-max='150' data-delay='1' data-increment='2'>150+</span>
									<p class="white oR">Cities<br>Covered</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Number Counter -->
	<!-- About -->
    <section id="about-section" style="padding-bottom:40px; padding-top:50px;">
         <div class="container">
            <div class="heading-text text-center" data-aos="fade-up" data-aos-duration="1000"><span class="gold-gradient-color">Features at a Glance</span></div>
            <br><br><br><br>
            <div class="row" style="margin-bottom:10px;">
               <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="services-div margin-minus" data-aos="fade-up" data-aos-duration="1000">
                     <div class="col-md-3 col-sm-6 col-xs-12 text-center" style="margin-bottom:10px;">
                        <div class="service" data-aos="zoom-in" data-aos-duration="1000" >
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
                        <div class="service" data-aos="zoom-in" data-aos-duration="1000" >
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
         <!--</div>-->
    </section>
	<!-- About -->