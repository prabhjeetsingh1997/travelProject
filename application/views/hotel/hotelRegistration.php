<!-- HEADER -->
<section id="home-section" style="background-image:url(<?php echo base_url()?>hotelhomepage/images/main-bg-2.png)">
    <div class="gradient sectionP60 header-pad">
        <div class="container">
            <div class="row">
                <div class="col-md-12 header-text sectionP30 text-center">
                    <h1 class="rL white" style="font-size:50px;">Register with us</h1>
                </div>
            </div>
        </div>
    </div>
</section>
	<!-- HEADER -->
<div class="container-fluid" id="register" style="margin-top:20px;">
     <div class="loader"><img src="images/loader.gif" width="120" height="120" style="display: none;"></div>
     <?php $error = $this->session->flashdata('error');
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
    <div class="heading-text text-center" data-aos="fade-up" data-aos-duration="1000"><span class="gold-gradient-color">Sign up</span>
	</div>
    <div class="row">
        <form id="hotel_register" name="hotel_register" action="<?php echo base_url(); ?>becomeHotelPartner" class="form-horizontal" method="POST">
            <div class="col-md-12">
                <div class="col-md-11">
                   <div class="input-box">
					 <input placeholder="Hotel Name / Company Name" type="text" name="hotel_name" id="hotel_name" autocomplete="off" data-validation="required" data-validation-error-msg="Name cannot be blank." required>
                     <span style="position: absolute"><i class="fa fa-user"></i></span>
				   </div>    
                </div>
				
			</div>
		    <div class="col-md-12">
		        <div class="col-md-6">
			        <div class="input-box">
				        <input data-required="true" name="hotel_address1" id="hotel_address1" type="text" autocomplete="off" placeholder="Address" data-validation="required" data-validation-error-msg="Name cannot be blank." required/>
				        <span style="position: absolute"><i class="fa fa-location-arrow"></i></span>
			        </div>
		        </div>
		        <div class="col-md-6">
			        <div class="input-box">
				        <input data-required="true" name="hotel_address2" id="hotel_address2" type="text" autocomplete="off" placeholder="Landmark / Area" data-validation="required" data-validation-error-msg="Name cannot be blank." required/>
				        <span style="position: absolute"><i class="fa fa-map-marker"></i></span>
			        </div>
		        </div>
		    </div>
		    <div class="col-md-12">
		        <div class="col-md-4">
		            <div class="input-box">
		                <select name="hotel_country" id="country_id" autocomplete="off" required>
                                <option value="">Select Country</option>
                                    <?php if(!empty($countries)) {
                      	                   foreach($countries as $country) { ?>
                        	               <option value="<?php echo $country->id ?>"><?php echo $country->country_name; ?></option>	
                                    <?php }
                                  } ?>						
                        </select>
                        <span style="position: absolute"><i class="fa fa-globe"></i></span>
                    </div>
		        </div>
		        <div class="col-md-4">
		            <div class="input-box">
		                <select name="hotel_state" id="state_id" data-placeholder="Select a State" autocomplete="off" required>
                           <option value="">Select State</option>
                        </select>
                        <span style="position: absolute"><i class="fa fa-globe"></i></span>
		            </div>
		        </div>
		        <div class="col-md-4">
		            <div class="input-box">
		                <select name="hotel_city" id="city_id" data-placeholder="Select a City" autocomplete="off" required>
                            <option value="">Select City</option>
                        </select>
                        <span style="position: absolute"><i class="fa fa-globe"></i></span>
		            </div>
		        </div>
		    </div>
            <div class="col-md-12">
                <div class="col-md-4">
                    <div class="input-box">
                        <input data-required="true" name="hotel_pincode" id="hotel_pincode" type="text" autocomplete="off" placeholder="Pin Code" required/>
                        <span style="position: absolute"><i class="fa fa-map-pin"></i></span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="input-box">
                        <input data-required="true" id="name" name="name" type="text" placeholder="Full Name" autocomplete="off" required/>
                        <span style="position: absolute"><i class="fa fa-user"></i></span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="input-box">
                        <input data-required="true" id="email" name="email" type="email" placeholder="Email ID" required/>
                        <span style="position: absolute"><i class="fa fa-envelope"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="col-md-4">
                    <div class="input-box">
                        <input data-required="true" name="contact_no" id="contact_no" type="text" min="10" placeholder="Contact No." autocomplete="off" required/>
                        <span style="position: absolute"><i class="fa fa-phone-square"></i></span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="input-box">
                        <input data-required="true" id="password" name="password" autocomplete="off" type="password" placeholder="Password" required/>
                        <span style="position: absolute"><i class="fa fa-key"></i></span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="input-box">
                        <input data-required="true" id="" name="" autocomplete="off" type="password" placeholder="Confirm Password" required/>
                        <span style="position: absolute"><i class="fa fa-key"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-md-12" style="margin-top: 35px;">
                <button type="submit" class="btn btn-gradient W100 pull-right">Register Now</button>
            </div>
        </form>
    </div>
</div>