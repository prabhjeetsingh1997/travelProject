<div class="signBack" id="registration">
<div class="container">
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
   <div class="row">
      <h2 class="text-center"> Its Free. Sign up now &amp; get started!</h2>
      <div class="spacer30"></div>
      <div  class="col-sm-12">
         <div id="status-register"></div>
         <form id="hotel_register" name="hotel_register" action="<?php echo base_url(); ?>becomeHotelPartner" class="form-horizontal" method="POST">
            <fieldset>
               <div class="form-group">
                  <div class="col-md-12">
                     <label>Hotel Name / Company Name</label>
                  </div>
                  <div class="col-md-12">
                     <input class="form-control" data-required="true"  name="hotel_name" id="hotel_name" type="text" data-validation="required" data-validation-error-msg="Name cannot be blank." required/>
                  </div>
               </div>
               <div class="form-group">
                  <div class="col-md-12">
                     <label>Address</label>
                  </div>
                  <div class="col-md-6">
                     <input class="form-control" data-required="true" name="hotel_address1" id="hotel_address1" type="text" placeholder="Address" required/>
                  </div>
                  <div class="col-md-6">
                     <input class="form-control" data-required="true" name="hotel_address2" id="hotel_address2" type="text" placeholder="Landmark / Area" required/>
                  </div>
                  <div class="col-md-3">
                     <select class="form-control" name="hotel_country" id="country_id" data-placeholder="Select a Country">
                        <option value="">--Select Country--</option>
                        <?php if(!empty($countries)) {
                        	foreach($countries as $country) { ?>
                        	<option value="<?php echo $country->id ?>"><?php echo $country->country_name; ?></option>	
                        <?php }
                        } ?>							
                     </select>
                  </div>
                  <div class="col-md-3">
                     <select class="form-control select2" name="hotel_state" id="state_id" data-placeholder="Select a State">
                        <option value="">--Select State--</option>
                     </select>
                  </div>
                  <div class="col-md-3">
                     <select class="form-control select2" name="hotel_city" id="city_id" data-placeholder="Select a City">
                        <option value="">--Select City--</option>
                     </select>
                  </div>
                  <div class="col-md-3">
                     <input class="form-control" data-required="true" name="hotel_pincode" id="hotel_pincode" type="text" placeholder="Pin Code" required/>
                  </div>
               </div>
               <div class="form-group">
                  <div class="col-md-6">
                  <label>Name</label>
                     <input class="form-control" data-required="true" id="name"  name="name" type="text" placeholder="Full Name" required/>
                  </div>
                  <div class="col-md-6">
                     <label>Email ID</label>
                     <input class="form-control" data-required="true" id="email"  name="email" type="email" placeholder="Email ID" required/>
                  </div>
               </div>
               <div class="form-group">
                  <div class="col-md-6">
                     <label>Contact No.</label>
                     <input class="form-control" data-required="true" name="contact_no" id="contact_no" type="text" min="10" placeholder="Contact No." required/>
                  </div>
                  <div class="col-md-6">
                     <label>Password</label>
                     <input class="form-control" data-required="true" id="password" name="password" type="password" placeholder="Password" required/>
                  </div>
               </div>
               <div class="clearfix"></div>
               <div class="form-group">
                  <div class="col-sm-9"></div>
                  <div class="col-sm-3">
                     <button type="submit" value="Register Now" class="btn btn-warning col-md-12" title="send email" data-toggle="tooltip">Register Now</button>
                  </div>
               </div>
            </fieldset>
         </form>
      </div>
   </div>
</div>
</div>