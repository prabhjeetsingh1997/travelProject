<?php
   error_reporting(0);
   $CI =& get_instance();
   $CI->load->model('hotel_model');
   $arrRoomAmen=array('Tea Kettle','Mini Bar','Wi fi','Mini Fridge','Iron & Iron Board','Locker','LED TV','Air Conditioner','Hair Dryer','Bath Tub','Mineral Water','Personal Butler','Fruit Basket','Attached Living Room','Music System','Breakfast','Lunch','Dinner','Evening Tea/Coffee','Welcome Drinks (non Alcoholic)','Cocktail Happy Hours','Flowers on Arrival','Champagne Bottle','Wine Bottle','Chocolates on arrival');
   
   $arrAmenties=array('Board Room','Confrence Room','Ball Room','Business Center','Garden','Swimming Pool','Restaurant','Bar','Discotheque','Casino','Amphitheatre','Airport Transfers/Cab Facilities','Lift/Elevator','Front Desk','Laundry Services','Power Backup','Cloak Room','Welcome Drinks','Shuttle Service to nearby Market','Rest Room for Drivers','Travel Desk','Banquet Facilities','Kids Play Zone','Lobby','Spa','Saloon','Car Parking','Bus Parking','Gym','Jacuzzi','Coffee Shop');
   
   $singleRoomId='';
   $doubRoomId='';
   $extAdltRoomId='';
   $extChldWoBedRoomId='';
   $extChldWBedRoomId='';
   $extBrkFastRoomId='';
   $lunchRoomId='';
   $dinnRoomId='';
   //new added
   //$cppakdescr='';
   
   if ($action == 'edit') {
       $countRooms = $countRoomDetail = $countEditRooms = count($room_service_details);
       $countRoomNameId=count($getallRoom);
       $countDateRates=count($date_rates_detail);
       $singleRoomId=$getallRoom[0]->id;
       $doubRoomId=$getallRoom[1]->id;
       $extAdltRoomId=$getallRoom[2]->id;
       $extChldWoBedRoomId=$getallRoom[3]->id;
       $extChldWBedRoomId=$getallRoom[4]->id;
       $extBrkFastRoomId=$getallRoom[5]->id;
       $lunchRoomId=$getallRoom[6]->id;
       $dinnRoomId=$getallRoom[7]->id;
   }
   
   $hotelIdProcess = $hotel_id;
   $countRoomNameId=count($getallRoom);
   $singleRoomId=$getallRoom[0]->id;
   $doubRoomId=$getallRoom[1]->id;
   $extAdltRoomId=$getallRoom[2]->id;
   $extChldWoBedRoomId=$getallRoom[3]->id;
   $extChldWBedRoomId=$getallRoom[4]->id;
   $extBrkFastRoomId=$getallRoom[5]->id;
   $lunchRoomId=$getallRoom[6]->id;
   $dinnRoomId=$getallRoom[7]->id;
   
   $arrRooms = $room_service_details;
   $countRooms=count($arrRooms);
   
   ?>
<div id="wrapper">
<div id="layout-static">
<div class="static-content-wrapper">
<div class="static-content">
<div class="page-content">
<ol class="breadcrumb">
   <li><a href="<?php echo base_url(HOTEL) ?>/dashboard">Home</a></li>
   <li><a href="#">Add Hotel</a></li>
</ol>
<div class="row">
<div class="col-md-12">
   <!--<h1>Add Hotel</h1>-->
   <?php $this->load->helper('form'); ?>
   <div class="row">
      <div class="col-md-6">
         <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
      </div>
   </div>
   <?php
      $this->load->helper('form');
      $error = $this->session->flashdata('error');
      if($error)
      {
      ?>
      <div class="row">
          <div class="col-md-12">
              <div class="col-md-12">
                <div class="alert alert-danger alert-dismissable">
                 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                 <?php echo $error; ?>                    
                </div>    
              </div>
              
          </div>
      </div>
   
   <?php }
      $success = $this->session->flashdata('success');
      if($success)
      {
      ?>
      <div class="row">
          <div class="col-md-12">
              <div class="col-md-12">
                <div class="alert alert-success alert-dismissable">
                 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                 <?php echo $success; ?>                    
                </div>    
              </div>
          </div>
      </div>
   
   <?php } ?>
   <div class="options">
   </div>
</div>
</div>
<!--home-content-top starts from here-->
<section class="home-content-top">
   <div class="container">
      <!--our-quality-shadow-->
      <div class="tabbable-panel margin-tops4 ">
         <div class="tabbable-line">
            <ul class="nav nav-tabs tabtop  tabsetting">
               <li <?php if($tab == 1){ echo 'class="active"';}else{echo 'class="disabled"';}?>> <a <?php if($tab != 1){ echo 'class="disabled"';}?> href="#tab_default_1" data-toggle="tab" title="Click next to open"> Step 1 <br>Hotel </a> </li>
               <li <?php if($tab == 2){ echo 'class="active"';}else{echo 'class="disabled"';}?>> <a <?php if($tab != 2){ echo 'class="disabled"';}?> href="#tab_default_2" data-toggle="tab" title="Click next to open"> Step 2 <br>Hotel Details </a> </li>
               <li <?php if($tab == 3){ echo 'class="active"';}else{echo 'class="disabled"';}?>> <a <?php if($tab != 3){ echo 'class="disabled"';}?> href="#tab_default_3" data-toggle="tab" title="Click next to open"> Step 3 <br>Banking Details </a> </li>
               <li <?php if($tab == 4){ echo 'class="active"';}else{echo 'class="disabled"';}?>> <a <?php if($tab != 4){ echo 'class="disabled"';}?> href="#tab_default_4" data-toggle="tab" title="Click next to open"> Step 4 <br>Attached Documents </a> </li>
               <li <?php if($tab == 5){ echo 'class="active"';}else{echo 'class="disabled"';}?>> <a <?php if($tab != 5){ echo 'class="disabled"';}?> href="#tab_default_5" data-toggle="tab" title="Click next to open"> Step 5 <br>Hotel Photos </a> </li>
               <li <?php if($tab == 6){ echo 'class="active"';}else{echo 'class="disabled"';}?>> <a <?php if($tab != 6){ echo 'class="disabled"';}?> href="#tab_default_6" data-toggle="tab" title="Click next to open"> Step 6 <br>Hotel Rates </a> </li>
            </ul>
            <div class="tab-content margin-tops">
               <div class="tab-pane fade <?php if($tab == 1){ echo "active in";}?>" id="tab_default_1">
                  <div  class="col-sm-12" style="margin-top:20px;">
                     <form id="form_registration" action="<?php echo base_url(HOTEL) ?>/addNewHotel" method="POST" class="form-horizontal" enctype="multipart/form-data">
                        <fieldset>
                           <input type="hidden" name="type" value="AddHotelDetails">
                           
                           <div class="form-group">
                              
                              <div class="col-md-3">
                                  <label>Country <span id="countryerrormsg" style="color: red;">*</span></label>
                                 <select class="form-control" data-required="true" name="country_id" id="country_id" required="true" autocomplete="off">
                                    <option value="">Select Country</option>
                                    <?php if(!empty($countries)) {
                                       foreach($countries as $country) { ?>
                                    <option value="<?php echo $country->id; ?>"><?php echo $country->country_name; ?></option>
                                    <?php }
                                       } ?>
                                 </select>
                              </div>
                              <div class="col-md-3">
                                  <label>State <span id="stateerrormsg" style="color: red;">*</span></label>
                                 <select class="form-control" data-required="true" name="state_id" id="state_id" required="true" autocomplete="off">
                                    <option value="">Select State</option>
                                 </select>
                              </div>
                              <div class="col-md-3">
                                  <label>City <span id="cityerrormsg" style="color: red;">*</span></label>
                                 <select class="form-control" data-required="true" name="city_id" id="city_id" required="true" autocomplete="off">
                                    <option value="">Select City</option>
                                 </select>
                              </div>
                              <div class="col-md-3">
                                  <label>Zip <span id="zipcodeerrormsg" style="color:red;">*</span></label>
                                 <input class="form-control" data-required="true" id="zip" name="zip" type="number" min="6" autocomplete="off" placeholder="Pin Code" required/>
                              </div>
                              
                           </div>
                           <div class="form-group">
                              <div class="col-md-12">
                                 <label>Hotel Name <span id="hotelerrormsg" style="color: red;">*</span></label>
                              </div>
                              <div class="col-md-12">
                                 <input class="form-control" data-required="true" id="hotel_name" name="hotel_name" type="text" placeholder="Hotel Name" autocomplete="off" data-toggle="tooltip" title="Enter Hotel Name" required/>
                              </div>
                           </div>
                           <div class="form-group">
                               <div class="col-md-12">
                                   <button type="button" class="btn" id="" onclick="checkhotelexist()" style="background-color:#00bcd4; border-color:#00bcd4; color:white;">Check Availability</button>
                               </div>
                               <div class="col-md-12" id="hotelexistmessage" style="display:none;">
                                   <div class="alert alert-info alert-dismissable">
                                       <h5>Following are the similar hotels existed in database.</h5>
                                       <div id="hotelData"></div>
                                       <button type='button' id='discard' onclick='discard()' class='btn btn-sm btn-warning'>Discard</button>
                                   </div>
                               </div>
                           </div>
                           <div id="div1tohide" style="display:none;">
                               
                           <div class="form-group">
                              <!--<div class="col-md-12">-->
                              <!--   <label>Address <span style="color: red;">*</span></label>-->
                              <!--</div>-->
                              <div class="col-md-6">
                                  <label>Address <span style="color: red;">*</span></label>
                                 <input class="form-control" data-required="true" id="address_line_1" autocomplete="off" name="address_line_1" type="text" placeholder="Address" required/>
                              </div>
                              <div class="col-md-6">
                                  <label>Landmark <span style="color: red;">*</span></label>
                                 <input class="form-control" data-required="true" id="address_line_2" autocomplete="off" name="address_line_2" type="text" placeholder="Landmark / Area" required/>
                              </div>
                              <!--<div class="col-md-12">-->
                              <!--   <label>Hotel Contact Nos. <span style="color: red;">*</span></label>-->
                              <!--</div>-->
                              
                           </div>
                           <div class="form-group">
                              <div class="col-md-4">
                                  <label>Hotel Landline <span style="color: red;">*</span></label>
                                 <input class="form-control" id="hotel_landline" required name="hotel_landline" type="number" autocomplete="off" placeholder="Hotel Landline"/>
                              </div>
                              <div class="col-md-4">
                                  <label>Hotel Mobile No</label>
                                 <input class="form-control" data-required="true" id="hotel_mobile_no" name="hotel_mobile_no" type="number" autocomplete="off" placeholder="Hotel Mobile" min="10"/>
                              </div>
                              <div class="col-md-4">
                                  <label>Hotel Alternative No</label>
                                 <input class="form-control" id="hotel_alternative_no" name="hotel_alternative_no" type="number" autocomplete="off" placeholder="Hotel Alternative Number (If Any)"/>
                              </div> 
                           </div>
                           </div>
                           <div class="form-group" id="div2tohide" style="display:none;">
                              <!--<div class="col-md-12">-->
                              <!--   <label>Hotel Concerned Person Details. <span style="color: red;">*</span></label>-->
                              <!--</div>-->
                              <div class="col-md-3">
                                  <label>Concerned Person Name <span style="color: red;">*</span></label>
                                 <input class="form-control" data-required="true" id="person_name"  name="person_name" type="text" autocomplete="off" placeholder="Full Name (*mandatory)" min="10" value="<?php echo $name; ?>" required />
                              </div>
                              <div class="col-md-3">
                                  <label>Concerned Person Email <span style="color: red;">*</span></label>
                                 <input class="form-control" id="person_email"  name="person_email" type="email" autocomplete="off" placeholder="Email (*mandatory)" value="<?php echo $email; ?>" required/>
                              </div>
                              <div class="col-md-3">
                                  <label>Concerned Person Mobile <span style="color: red;">*</span></label>
                                 <input class="form-control" id="person_mobile_no" name="person_mobile_no" type="number" autocomplete="off" placeholder="Person Mobile No (*mandatory)" value="<?php echo $contact_no; ?>" required/>
                              </div>
                              <div class="col-md-3">
                                  <label>Concerned Person Aletrnative No</label>
                                 <input class="form-control" id="person_alternative_no"  name="person_alternative_no" autocomplete="off" type="number" placeholder="Alternative No.(not mandatory)"/>
                              </div>
                           </div>
                           <!--<div class="form-group" id="div3tohide" style="display:none;">-->
                           <!--   <div class="col-md-12">-->
                           <!--      <label>Total No. of Room Types  <span style="color: red;">*</span></label>-->
                           <!--      <select class="form-control" name="no_room_types" id="no_room_types" required>-->
                           <!--         <option value="0">--Select No of Room Types--</option>-->
                           <!--         <option value="1">1</option>-->
                           <!--         <option value="2">2</option>-->
                           <!--         <option value="3">3</option>-->
                           <!--         <option value="4">4</option>-->
                           <!--         <option value="5">5</option>-->
                           <!--      </select>-->
                           <!--   </div>-->
                           <!--</div>-->
                           <!--<div class="form-group" id="add_rooms">-->
                           <!--</div>-->
                           <div class="form-group" id="div3tohide" style="display:none;">
                              <div class="col-md-4">
                                 <label>Hotel Type <span style="color: red;">*</span></label>
                                 <select class="form-control" name="hotel_type" id="hotel_type" required="true">
                                    <option value="">--Select Hotel Type--</option>
                                    <option>Hotel</option>
                                    <option>Resort</option>
                                    <option>Motel</option>
                                    <option>BnB</option>
                                    <option>Homestay</option>
                                    <option>Tent</option>
                                    <option>Service Apartment</option>
                                    <option>Bungalow</option>
                                    <option>Lodge</option>
                                    <option>Guest House</option>
                                    <option>Hostel</option>
                                    <option>Cottage</option>
                                    <option>Houseboat</option>
                                    <option>Villa</option>
                                    <option>Palace</option>
                                    <option>Beach Hut</option>
                                    <option>Farm</option>
                                 </select>
                              </div>
                              <div class="col-md-4">
                                 <label>Base Currency <span style="color: red;">*</span></label>
                                 <select class="form-control" name="hotel_currency" id="hotel_currency" required="true">
                                    <option value="">--Select Hotel Currency--</option>
                                    <option>USD </option>
                                    <option>INR </option>
                                    <option>EUR </option>
                                    <option>JPY </option>
                                    <option>GBP</option>
                                    <option>AUD</option>
                                    <option>CHF</option>
                                    <option>CAD</option>
                                    <option>MXN</option>
                                    <option>CNY</option>
                                    <option>NZD</option>
                                    <option>SEK</option>
                                    <option>RUB</option>
                                    <option>HKD</option>
                                 </select>
                              </div>
                              <div class="col-md-4">
                                 <label>Hotel Star Rating <span style="color: red;">*</span></label>
                                 <select class="form-control" name="hotel_star" id="hotel_star" required="true">
                                    <option value="">--No Star--</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                 </select>
                              </div>
                           </div>
                           <div class="form-group" id="div4tohide" style="display:none;">
                              <div class="col-md-6">
                                 <label>Check in Time <span style="color: red;">*</span></label>
                                 <input type="text" id="check_in" name="check_in" value="12:00 PM" data-format="hh:mm A" class="form-control clockface-open" required="true">
                              </div>
                              <div class="col-md-6">
                                 <label>Check out Time <span style="color: red;">*</span></label>
                                 <input type="text" id="check_out" name="check_out" value="11:00 AM" data-format="hh:mm A" class="form-control clockface-open" required="true">
                              </div>
                           </div>
                           <div class="form-group" id="div5tohide" style="display:none;">
                              <data></data>
                              <div class="col-md-2" style="padding-top:15px;"><label>Amenities & Facilities <span style="color: red;">*</span></label></div>
                              <div class="col-md-2" style="margin-bottom:5px;">
                                 <input type="button" value="Select" class="btn btn-md btn-warning" onclick="hotel_amenity_modal();"/>
                              </div>
                              <div class="col-md-8">
                                 <input class="form-control" data-required="true" id="hotel_amenity" name="hotel_amenity" type="hidden" placeholder="Amenity & Facility" required readonly/>
                              </div>
                           </div>
                           <div class="form-group" id="div6tohide" style="display:none;">
                              <div class="col-md-12">
                                 <label>Description</label>
                              </div>
                              <div class="col-md-12">
                                 <textarea class="form-control" data-required="true" id="hotel_description" name="hotel_description" autocomplete="off" rows="5" placeholder="Add description about hotel."></textarea>
                              </div>
                           </div>
                           <div class="clearfix"></div>
                           <div class="form-group" id="div7tohide" style="display:none;">
                              <div class="col-md-12">
                                 <input type="submit" value="Save & Next" class="btn btn-md btn-success" onClick=""/>
                                 <a href="<?php echo base_url(HOTEL) ?>/dashboard" class="btn btn-danger pull-right" style="">Discard</a>
                              </div>
                           </div>
                        </fieldset>
                     </form>
                  </div>
               </div>
               <div class="tab-pane fade <?php if($tab == 2){ echo "active in";}?>" id="tab_default_2">
                    <div class="col-sm-12">
                       <form id="form_registration" action="<?php echo base_url(HOTEL) ?>/addNewHotel" method="POST" class="form-horizontal" enctype='multipart/form-data'>
                            <input type="hidden" name="type" value="hotelRoomdetails">
                            <input type="hidden" name="hotel_id" value="<?php if(!empty($hotel_id)) { echo $hotel_id; } ?>">
                            <div class="form-group" id="" style="">
                              <div class="col-md-12">
                                 <label>Total No. of Room Types  <span style="color: red;">*</span></label>
                                 <select class="form-control" name="no_room_types" id="no_room_types" required>
                                    <option value="0">--Select No of Room Types--</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                 </select>
                              </div>
                            </div>
                            <div class="form-group" id="add_rooms">
                            </div>
                            
                            <div class="clearfix"></div>
                            <div class="form-group" id="" style="">
                              <div class="col-sm-2">
                                 <input type="submit" value="Save & Next" class="btn btn-md btn-success" onClick=""/>
                              </div>
                            </div>
                       </form>
                    </div>
               </div>
               <div class="tab-pane fade <?php if($tab == 3){ echo "active in";}?>" id="tab_default_3">
                  <div class="col-sm-12">
                     <form id="form_registration" action="<?php echo base_url(HOTEL) ?>/addNewHotel" method="POST" class="form-horizontal">
                        <input type="hidden" name="type" value="AddHotelBankingDetails">
                        <input type="hidden" name="hotel_id" value="<?php if(!empty($hotel_id)) { echo $hotel_id; } ?>">
                        <fieldset>
                           <div class="form-group">
                              <div class="col-md-12">
                                 <label>GST No. <span style="color:red;">*</span></label>
                              </div>
                              <div class="col-md-12">
                                 <input class="form-control" data-required="true" id="pan_no"  name="pan_no" type="text" placeholder="GST No." required/>
                              </div>
                           </div>
                           <div class="form-group">
                              <div class="col-md-12">
                                 <label>Account No. <span style="color:red;">*</span></label>
                              </div>
                              <div class="col-md-12">
                                 <input class="form-control" data-required="true" id="acount_no"  name="acount_no" type="text" placeholder="Account No."  required/>
                              </div>
                           </div>
                           <div class="form-group">
                              <div class="col-md-12">
                                 <label>Account Name <span style="color:red;">*</span></label>
                              </div>
                              <div class="col-md-12">
                                 <input class="form-control" data-required="true" id="acount_holder_name"  name="acount_holder_name" type="text" placeholder="Account Holder Name" required/>
                              </div>
                           </div>
                           <div class="form-group">
                              <div class="col-md-12">
                                 <label>Bank <span style="color:red;">*</span></label>
                              </div>
                              <div class="col-md-12">
                                 <input class="form-control" data-required="true" id="bank"  name="bank" type="text" placeholder="Bank" required/>
                              </div>
                           </div>
                           <div class="form-group">
                              <div class="col-md-12">
                                 <label>Branch <span style="color:red;">*</span></label>
                              </div>
                              <div class="col-md-12">
                                 <input class="form-control" data-required="true" id="branch"  name="branch" type="text" placeholder="Branch" required/>
                              </div>
                           </div>
                           <div class="form-group">
                              <div class="col-md-12">
                                 <label>IFSC <span style="color:red;">*</span></label>
                              </div>
                              <div class="col-md-12">
                                 <input class="form-control" data-required="true" id="ifsc"  name="ifsc" type="text" placeholder="IFSC" required/>
                              </div>
                           </div>
                           <div class="clearfix"></div>
                           <div class="form-group">
                              <div class="col-sm-2">
                                 <input type="submit" value="Save & Next" class="btn btn-md btn-success" onClick=""/>
                              </div>
                           </div>
                        </fieldset>
                     </form>
                  </div>
               </div>
               <div class="tab-pane fade <?php if($tab == 4){ echo "active in";}?>" id="tab_default_4">
                  <div class="col-sm-12">
                     <form id="form_registration" action="<?php echo base_url(HOTEL) ?>/addNewHotel" method="POST" class="form-horizontal" enctype="multipart/form-data">
                        <fieldset>
                           <input type="hidden" name="type" value="AddHotelDocuments">
                           <input type="hidden" name="hotel_id" value="<?php echo $hotel_id; ?>">
                           <div class="form-group">
                              <div class="col-md-12">
                                 <label>PAN Card</label>
                              </div>
                              <div class="col-md-6">
                                 <input class="form-control" type="file" class="custom-file-input" id="inputGroupFilePan_card" name="pan_card" aria-describedby="inputGroupFileAddon01"/>
                              </div>
                              <div class="col-md-5">
                                  <span id="paNuploadDescr"><p>Image Should be in jpg/jpeg format.</p><p>Image size should not exceed 2MB.</p></span>
                                  <img id="pan_cardImg" style="width:300px;">
                              </div>
                           </div>
                           <div class="form-group">
                              <div class="col-md-12">
                                 <label>Contract</label>
                              </div>
                              <div class="col-md-6">
                                 <input class="form-control" type="file" class="custom-file-input" id="inputGroupFileContract" name="contracts[]" aria-describedby="inputGroupFileAddon01" multiple="true" />
                              </div>
                              <div class="col-md-5">
                                  <span id="ContractuploadDescr"><p>File Should be in PDf format.</p><p>File size should not exceed 2MB.</p></span>
                                  <!--<img id="Contract_Img" style="width:300px;">-->
                              </div>
                           </div>
                           <div class="clearfix"></div>
                           <div class="form-group">
                              <div class="col-sm-2">
                                 <input type="submit" value="Save & Next" class="btn btn-md btn-success" onClick=""/>
                              </div>
                           </div>
                        </fieldset>
                     </form>
                  </div>
               </div>
               <div class="tab-pane fade <?php if($tab == 5) echo "active in"; ?>" id="tab_default_5">
                  <div class="col-sm-12">
                     <form id="form_registration" action="<?php echo base_url(HOTEL) ?>/addNewHotel" method="POST" class="form-horizontal" enctype="multipart/form-data">
                        <fieldset>
                           <input type="hidden" name="type" value="AddHotelPhotos">
                           <input type="hidden" name="hotel_id" value="<?php echo $hotel_id; ?>">
                           <div class="form-group">
                              <div class="col-md-12">
                                 <label>Photos</label>
                              </div>
                              <div class="col-md-6" align="left">
                                 <!--<input class="form-control" type="file" class="custom-file-input" id="inputGroupFile01" name="hotel_photos[]" aria-describedby="inputGroupFileAddon" multiple="true" accept="image/*" />-->
                                 <input class="form-control" type="file" class="custom-file-input" id="hotel_photo_upload" name="hotel_photos[]" aria-describedby="inputGroupFileAddon" multiple="true" accept="image/*" />
                              </div>
                              <div class="col-md-6">
                                  <span>
                                      <p>You can upload upto 5 images.</p>
                                      <p>All Image Should be in jpg/jpeg format.</p>
                                      <p>Size should not exceed 2MB per image.</p>
                                  </span>
                              </div>
                           </div>
                           <div class="col-md-12">
                               <div id="uploadfilesdisplay">
                                   
                               </div>
                           </div>
                           <div class="clearfix"></div>
                           <div class="form-group">
                              <div class="col-sm-2">
                                 <input type="submit" value="Save & Next" class="btn btn-md btn-success" onClick=""/>
                              </div>
                           </div>
                        </fieldset>
                     </form>
                  </div>
               </div>
               <?php if($tab == 6) { ?>
               <div class="col-md-12 col-sm-12" style="padding-left:0px; padding-right:0px; margin-top: 20px;">
                  <?php
                     if(isset($countRoomDetail) && !empty($countRoomDetail)){ $rd = $countRoomDetail;}else{$rd = $countRooms;}
                     $hidden = '<input type="hidden" name="ttlRoomService" id="ttlRoomService" value="'.$rd.'"/>';
                     echo $hidden;
                     ?>
                  <input type="hidden" id="room_count" name="room_count" value="<?php echo $countRoomNameId;?>">
                  <input type="hidden" id="total_rates_itmes" name="total_rates_itmes" value="<?php if(isset($countEditRooms)){echo $countEditRooms;}else{echo $countRooms;}?>">
                  <input type="hidden" name="type" value="add_hotel_rates_detail" />
                  <input type="hidden" name="hotel_id" value="<?php echo $hotel_id; ?>" />
                  <div class="box-body">
                     <div class="" >
                        <div class="rate">
                           <?php
                              $item=1;
                              //echo $countDateRates;
                                  $roomNamesMaster = array('Single', 'Double', 'Extra Adult', 'Extra Child w/o Bed', 'Extra Child with Bed', 'Extra Breakfast', 'Lunch', 'Dinner');
                                  if($countDateRates>0)
                                  {
                                      for($j=1;$j<=$countDateRates;$j++)
                                      {
                                          $dateId=$date_rates_detail[$j-1]->id;
                                          $CI =& get_instance();
                                          $CI->load->model('hotel_model');
                                          $arrTotalRoom=$CI->hotel_model->getAllHotelRoom_edit($hotel_id,$dateId);
                                          //echo 'ppppppppp:'; print_r($arrTotalRoom);
                                          $countTtlRoom = count($arrTotalRoom);
                                          
                                          $rClass = '';
                                          if($j > 1)
                                          {
                                              $rClass = 'rateRow';
                                          }
                                          ?>
                           <form role="form" method="POST" name="hotel_rate" id="hotel_rate1_<?php echo $j;?>">
                              <input type="hidden" id="item_count10" name="item_count10" value="<?php if(isset($countTtlRoom)&& !empty($countTtlRoom)){echo $countTtlRoom;}else{echo 8;}?>">
                              <div class="hiddenFields">
                              </div>
                              <input type="hidden" name="hotel_id" value="<?php echo $hotel_id; ?>" />
                              <input type="hidden" name="type" value="addHotelRatesDetail" />   
                              <input type="hidden" name="update" value="1" /> 
                              <div id="rates_<?php echo $j;?>" class="<?php echo $rClass; ?>">
                                 <div class="col-md-1">
                                    <div class="form-group">
                                       <h4  class="box-title"><b style="font-size: 17px;">   Rate </b></h4>
                                    </div>
                                 </div>
                                 <div class="col-md-3" >
                                    <div class="form-group">
                                       <label for="search">Meal Plan</label>
                                       <input type="hidden" id="total_rates_itmes" name="total_rates_itmes" value="<?php if(isset($countEditRooms)){echo $countEditRooms;}else{echo $countRooms;}?>">
                                       <input type="hidden" name="editid" value="<?php echo $j; ?>" >
                                       <select class="form-control" name="mealPlan_<?php echo $j; ?>" readonly>
                                          <?php if($date_rates_detail[$j-1]->meal_plan == 1){?>
                                          <option value="1" <?php if($date_rates_detail[$j-1]->meal_plan == 1){echo 'selected';}?>>CP (Breakfast)</option>
                                          <?php } ?>
                                          <?php if($date_rates_detail[$j-1]->meal_plan == 2){?>
                                          <option value="2" <?php if($date_rates_detail[$j-1]->meal_plan == 2){echo 'selected';}?>>MAP (Breakfast+Dinner)</option>
                                          <?php } ?>
                                          <?php if($date_rates_detail[$j-1]->meal_plan == 3){?>
                                          <option value="3" <?php if($date_rates_detail[$j-1]->meal_plan == 3){echo 'selected';}?>>AP (Breakfast+Lunch+Dinner)</option>
                                          <?php } ?>
                                          <?php if($date_rates_detail[$j-1]->meal_plan == 4){?>
                                          <option value="4" <?php if($date_rates_detail[$j-1]->meal_plan == 4){echo 'selected';}?>>EP (Room Only)</option>
                                          <?php } ?>
                                          <?php if($date_rates_detail[$j-1]->meal_plan == 5){?>
                                          <option value="5" <?php if($date_rates_detail[$j-1]->meal_plan == 5){echo 'selected';}?>>CP Package</option>
                                          <?php } ?>
                                          <?php if($date_rates_detail[$j-1]->meal_plan == 6){?>
                                          <option value="6" <?php if($date_rates_detail[$j-1]->meal_plan == 6){echo 'selected';}?>>MAP Package</option>
                                          <?php } ?>
                                          <?php if($date_rates_detail[$j-1]->meal_plan == 7){?>
                                          <option value="7" <?php if($date_rates_detail[$j-1]->meal_plan == 7){echo 'selected';}?>>AP Package</option>
                                          <?php } ?>
                                          <?php if($date_rates_detail[$j-1]->meal_plan == 8){?>
                                          <option value="8" <?php if($date_rates_detail[$j-1]->meal_plan == 8){echo 'selected';}?>>EP Package</option>
                                          <?php } ?>
                                       </select>
                                    </div>
                                 </div>
                                 <div class="col-md-3">
                                    <div class="form-group">
                                       <label for="search">From:Date</label>
                                       <input type="text" class="form-control fromdate" name="fromdate_<?php echo $j;?>" id="fromdate" placeholder="Name" readonly  value="<?php echo date('j M Y',strtotime($date_rates_detail[$j-1]->from_date)); ?>"/>
                                    </div>
                                 </div>
                                 <input type="hidden" name="date_id_<?php echo $j;?>" value="<?php echo $date_rates_detail[$j-1]->id;?>"/>
                                 <div class="col-md-3">
                                    <div class="form-group">
                                       <label for="search">To:Date</label>
                                       <input readonly type="text" class="form-control todate" name="todate_<?php echo $j;?>" id="todate" placeholder="Name" value="<?php echo date('j M Y',strtotime($date_rates_detail[$j-1]->to_date)); ?>"/>
                                    </div>
                                 </div>
                                 <div class="col-md-2">
                                    <div class="form-group">
                                       <label for="search">&nbsp;</label><br/>
                                       <button type="button" class="btn btn-md btn-warning showRtable" rel="<?php echo $j;?>">Show</button>
                                    </div>
                                 </div>
                                 <div class="bs-example col-md-12" >
                                    <div class="table-responsive rateTables col-sm-12" id="tblR_<?php echo $j;?>">
                                       <table class="table">
                                          <?php
                                             $totalRows = 8;
                                             if($countEditRooms>0)
                                             {
                                             ?>
                                          <thead>
                                             <tr>
                                                 <th class="col-md-3">Rooms</th>
                                                <?php
                                                   $ratesArr = array();
                                                   $ratesArrExtra = array();
                                                   foreach($room_service_details as $key=>$val)
                                                   {
                                                      
                                                      $hotel_room_id=$val['room_id'];
                                                      $hotel_rates_detail=$CI->hotel_model->getHotelRatesByid($hotel_id,$dateId,$hotel_room_id);
                                                      $countHotelRates=count($hotel_rates_detail);
                                                      //echo '<br/><br/><br/>';
                                                      //echo 'rates:::'; print_r($hotel_rates_detail);
                                                      
                                                      foreach($hotel_rates_detail as $rates)
                                                      {
                                                         if(in_array($rates['room_name'], $roomNamesMaster))
                                                         {
                                                            $ratesArr[$rates['date_id']][$rates['room_type_id']][$rates['room_name']][] = $rates['price'];
                                                            $ratesArr[$rates['date_id']][$rates['room_type_id']][$rates['room_name']][] = $rates['id'];
                                                         }
                                                         else
                                                         {
                                                            $ratesArrExtra[$rates['date_id']][$rates['room_type_id']][$rates['room_name']][] = $rates['price'];
                                                            $ratesArrExtra[$rates['date_id']][$rates['room_type_id']][$rates['room_name']][] = $rates['id'];
                                                            
                                                            $extraRoomName[] = $rates['room_name'];
                                                         }
                                                      }
                                                   ?>
                                                <th class="col-md-2"><?php echo $val['room_type'];?></th>
                                                <?php
                                                   }
                                                   
                                                   ?>
                                             </tr>
                                          </thead>
                                          <tbody border="1px">
                                             <tr>
                                                <?php
                                                   $roomCount1=1;
                                                   ?>
                                                <td>Single <input type="hidden" name="roomName_<?php echo $j;?>_1_<?php echo $roomCount1;?>" value="<?php echo $singleRoomId;?>"><input type="hidden" name="room_name_<?php echo $j;?>_1_<?php echo $roomCount1;?>" value="Single"/></td>
                                                <?php
                                                   $hotelRmRate = '';
                                                   foreach($arrRooms as $key1=>$val1)
                                                   {
                                                      $roomCount1++;
                                                      $hotelRmRate = $ratesArr[$dateId][$val1['room_id']]['Single'][0];
                                                      $hotelRmRateId = $ratesArr[$dateId][$val1['room_id']]['Single'][1];
                                                   ?>
                                                <td>
                                                   <input type="text" name="roomType_<?php echo $j;?>_1_<?php echo $roomCount1;?>" value="<?php echo $hotelRmRate; ?>">
                                                   <input type="hidden" name="roomTypeId_<?php echo $j;?>_1_<?php echo $roomCount1;?>" value="<?php echo $val1['room_id'];?>">
                                                   <input type="hidden" name="hotelRateId_<?php echo $j;?>_1_<?php echo $roomCount1;?>" value="<?php echo $hotelRmRateId; ?>"/>
                                                </td>
                                                <?php
                                                   }
                                                   ?>
                                             </tr>
                                             <tr>
                                                <?php
                                                   $roomCount2=1;
                                                   ?>
                                                <td>Double <input type="hidden" name="roomName_<?php echo $j;?>_2_<?php echo $roomCount2;?>" value="<?php echo $doubRoomId;?>"><input type="hidden" name="room_name_<?php echo $j;?>_2_<?php echo $roomCount2;?>" value="Double"/></td>
                                                <?php
                                                   $hotelRmRate = 0;
                                                   foreach($arrRooms as $key2=>$val2)
                                                   {
                                                      $roomCount2++;
                                                      $hotelRmRate = $ratesArr[$dateId][$val2['room_id']]['Double'][0];
                                                      $hotelRmRateId = $ratesArr[$dateId][$val2['room_id']]['Double'][1];
                                                   ?>
                                                <td>
                                                   <input type="text"  name ="roomType_<?php echo $j;?>_2_<?php echo $roomCount2;?>" value="<?php echo $hotelRmRate; ?>">
                                                   <input type="hidden" name="roomTypeId_<?php echo $j;?>_2_<?php echo $roomCount2;?>" value="<?php echo $val2['room_id'];?>">
                                                   <input type="hidden" name="hotelRateId_<?php echo $j;?>_2_<?php echo $roomCount2;?>" value="<?php echo $hotelRmRateId; ?>"/>
                                                </td>
                                                <?php
                                                   }
                                                   ?>
                                             </tr>
                                             <tr>
                                                <?php
                                                   $roomCount3=1;
                                                   ?>
                                                <td>Extra Adult  <input type="hidden" name="roomName_<?php echo $j;?>_3_<?php echo $roomCount3;?>" value="<?php echo $extAdltRoomId;?>"><input type="hidden" name="room_name_<?php echo $j;?>_3_<?php echo $roomCount3;?>" value="Extra Adult"/></td>
                                                <?php
                                                   $hotelRmRate = 0;
                                                   foreach($arrRooms as $key3=>$val3)
                                                   {
                                                      $roomCount3++;
                                                      
                                                      $hotelRmRate = $ratesArr[$dateId][$val3['room_id']]['Extra Adult'][0];
                                                      $hotelRmRateId = $ratesArr[$dateId][$val3['room_id']]['Extra Adult'][1];
                                                   ?>
                                                <td>
                                                   <input type="text" name ="roomType_<?php echo $j;?>_3_<?php echo $roomCount3;?>" value="<?php echo $hotelRmRate; ?>">
                                                   <input type="hidden" name="roomTypeId_<?php echo $j;?>_3_<?php echo $roomCount3;?>" value="<?php echo $val3['room_id'];?>">
                                                   <input type="hidden" name="hotelRateId_<?php echo $j;?>_3_<?php echo $roomCount3;?>" value="<?php echo $hotelRmRateId; ?>"/>
                                                </td>
                                                <?php
                                                   }
                                                   ?>
                                             </tr>
                                             <tr>
                                                <?php
                                                   $roomCount4=1;
                                                   ?>
                                                <td>Extra Child w/o Bed  <input type="hidden" name="roomName_<?php echo $j;?>_4_<?php echo $roomCount4;?>" value="<?php echo $extChldWoBedRoomId;?>"><input type="hidden" name="room_name_<?php echo $j;?>_4_<?php echo $roomCount4;?>" value="Extra Child w/o Bed"/></td>
                                                <?php
                                                   $hotelRmRate = 0;
                                                   foreach($arrRooms as $key4=>$val4)
                                                   {
                                                      $roomCount4++;
                                                      $hotelRmRate = $ratesArr[$dateId][$val4['room_id']]['Extra Child w/o Bed'][0];
                                                      $hotelRmRateId = $ratesArr[$dateId][$val4['room_id']]['Extra Child w/o Bed'][1];
                                                   ?>
                                                <td>
                                                   <input type="text" name="roomType_<?php echo $j;?>_4_<?php echo $roomCount4;?>" value="<?php echo $hotelRmRate; ?>">
                                                   <input type="hidden" name="roomTypeId_<?php echo $j;?>_4_<?php echo $roomCount4;?>" value="<?php echo $val4['room_id'];?>">
                                                   <input type="hidden" name="hotelRateId_<?php echo $j;?>_4_<?php echo $roomCount4;?>" value="<?php echo $hotelRmRateId; ?>"/>
                                                </td>
                                                <?php
                                                   }
                                                   
                                                   
                                                   ?>
                                             </tr>
                                             <tr>
                                                <?php
                                                   $roomCount5=1;
                                                   ?>
                                                <td>Extra Child with Bed <input type="hidden" name="roomName_<?php echo $j;?>_5_<?php echo $roomCount5;?>" value="<?php echo $extChldWBedRoomId;?>"><input type="hidden" name="room_name_<?php echo $j;?>_5_<?php echo $roomCount5;?>" value="Extra Child with Bed"/></td>
                                                <?php
                                                   $hotelRmRate = 0;
                                                   foreach($arrRooms as $key5=>$val5)
                                                   {
                                                      $roomCount5++;
                                                      
                                                      $hotelRmRate = $ratesArr[$dateId][$val5['room_id']]['Extra Child with Bed'][0];
                                                      $hotelRmRateId = $ratesArr[$dateId][$val5['room_id']]['Extra Child with Bed'][1];
                                                   ?>
                                                <td>
                                                   <input type="text" name="roomType_<?php echo $j;?>_5_<?php echo $roomCount5;?>"  value="<?php echo $hotelRmRate; ?>">
                                                   <input type="hidden" name="roomTypeId_<?php echo $j;?>_5_<?php echo $roomCount5;?>" value="<?php echo $val5['room_id'];?>">
                                                   <input type="hidden" name="hotelRateId_<?php echo $j;?>_5_<?php echo $roomCount5;?>" value="<?php echo $hotelRmRateId; ?>"/>
                                                </td>
                                                <?php
                                                   }
                                                   ?>
                                             </tr>
                                             <!--<tr>-->
                                                <?php
                                                   //$roomCount6=1;
                                                   ?>
                                                <!--<td>Extra Breakfast <input type="hidden" name="roomName_<?php //echo $j;?>_6_<?php //echo $roomCount6;?>" value="<?php //echo $extBrkFastRoomId;?>"><input type="hidden" name="room_name_<?php //echo $j;?>_6_<?php //echo $roomCount6;?>" value="Extra Breakfast"/></td>-->
                                                <?php
                                                //   $hotelRmRate = 0;
                                                //   foreach($arrRooms as $key6=>$val6)
                                                //   {
                                                //       $roomCount6++;
                                                      
                                                //       $hotelRmRate = $ratesArr[$dateId][$val6['room_id']]['Extra Breakfast'][0];
                                                //       $hotelRmRateId = $ratesArr[$dateId][$val6['room_id']]['Extra Breakfast'][1];
                                                   ?>
                                                <!--<td>-->
                                                <!--   <input type="text" name="roomType_<?php //echo $j;?>_6_<?php //echo $roomCount6;?>"  value="<?php //echo $hotelRmRate; ?>" >-->
                                                <!--   <input type="hidden" name="roomTypeId_<?php //echo $j;?>_6_<?php //echo $roomCount6;?>" value="<?php //echo $val6['room_id'];?>">-->
                                                <!--   <input type="hidden" name="hotelRateId_<?php //echo $j;?>_6_<?php //echo $roomCount6;?>" value="<?php //echo $hotelRmRateId; ?>"/>-->
                                                <!--</td>-->
                                                <?php
                                                   //}
                                                   ?>
                                             <!--</tr>-->
                                             <!--<tr>-->
                                                <?php
                                                   //$roomCount7=1;
                                                   ?>
                                                <!--<td>Lunch <input type="hidden" name="roomName_<?php //echo $j;?>_7_<?php //echo $roomCount7;?>" value="<?php //echo $lunchRoomId;?>"><input type="hidden" name="room_name_<?php //echo $j;?>_7_<?php //echo $roomCount7;?>" value="Lunch"/></td>-->
                                                <?php
                                                //   $hotelRmRate = 0;
                                                //   foreach($arrRooms as $key7=>$val7)
                                                //   {
                                                //       $roomCount7++;
                                                      
                                                //       $hotelRmRate = $ratesArr[$dateId][$val7['room_id']]['Lunch'][0];
                                                //       $hotelRmRateId = $ratesArr[$dateId][$val7['room_id']]['Lunch'][1];
                                                   ?>
                                                <!--<td>-->
                                                <!--   <input type="text" name="roomType_<?php //echo $j;?>_7_<?php //echo $roomCount7;?>" value="<?php //echo $hotelRmRate; ?>">-->
                                                <!--   <input type="hidden" name="roomTypeId_<?php //echo $j;?>_7_<?php //echo $roomCount7;?>" value="<?php //echo $val7['room_id'];?>">-->
                                                <!--   <input type="hidden" name="hotelRateId_<?php //echo $j;?>_7_<?php //echo $roomCount7;?>" value="<?php //echo $hotelRmRateId; ?>"/>-->
                                                <!--</td>-->
                                                <?php
                                                   //}
                                                   
                                                   ?>
                                             <!--</tr>-->
                                             <!--<tr>-->
                                                <?php
                                                   //$roomCount8=1;
                                                   ?>
                                                <!--<td class="dinnerCol">Dinner <input type="hidden" name="roomName_<?php //echo $j;?>_8_<?php //echo $roomCount8;?>" value="<?php //echo $dinnRoomId;?>"><input type="hidden" name="room_name_<?php //echo $j;?>_8_<?php //echo $roomCount8;?>" id="room_name_<?php //echo $j;?>_8_<?php //echo $roomCount8;?>" value="Dinner"/></td>-->
                                                <?php
                                                //   $hotelRmRate = 0;
                                                //   foreach($arrRooms as $key8=>$val8)
                                                //   {
                                                //       $roomCount8++;
                                                      
                                                //       $hotelRmRate = $ratesArr[$dateId][$val8['room_id']]['Dinner'][0];
                                                //       $hotelRmRateId = $ratesArr[$dateId][$val8['room_id']]['Dinner'][1];
                                                   ?>
                                                <!--<td>-->
                                                <!--   <input type="text" class="roomType_<?php //echo $j;?>_<?php //echo $roomCount8;?>" name="roomType_<?php //echo $j;?>_8_<?php //echo $roomCount8;?>" value="<?php //echo $hotelRmRate; ?>">-->
                                                <!--   <input type="hidden" class="roomTypeId_<?php //echo $j;?>_<?php //echo $roomCount8;?>" name="roomTypeId_<?php //echo $j;?>_8_<?php //echo $roomCount8;?>" value="<?php //echo $val8['id'];?>">-->
                                                <!--   <input type="hidden" class="hotelRateId_<?php //echo $j;?>_<?php //echo $roomCount8;?>" name="hotelRateId_<?php //echo $j;?>_8_<?php //echo $roomCount8;?>" value="<?php //echo $hotelRmRateId; ?>"/>-->
                                                <!--</td>-->
                                                <?php
                                                   //}
                                                   
                                                   ?>
                                             <!--</tr>-->
                                             <?php
                                                if($item >= 1){
                                                ?>
                                             <tr>
                                                <td colspan="15">
                                                   <div class="col-md-12 text-right">
                                                      <div class="form-group"><label for="last">Remove Table</label>  <a class="delete" rel="<?php echo $item; ?>" href="javascript:void(0)" onclick="remove_rate(<?php echo $item; ?>,<?php echo $dateId; ?>)"><i class="fa fa-fw fa-times-circle-o" style="color:red;"></i></a></div>
                                                   </div>
                                                </td>
                                             </tr>
                                             <?php } ?>
                                          </tbody>
                                       </table>
                                       <div class="col-md-12">
                                           <div class="col-md-6">
                                            <h4><b>Default Inclusions:</b></h4>
							                <ul>
								                <li>Meals as above mentioned Meal Plan.</li>
								                <li>All kind of applicable hotel, transport, service &amp; govt. taxes.</li>
							                </ul>
                                           </div>
                                           <div class="col-md-6">
                                               <div class="form-group">
                                               <label>Other Inclusions (optional)</label>
                                               <textarea class="form-control" rows="5" name="cppakdescription_<?php echo $j;?>" placeholder="Ex.&#x0a;add extra inclusions line by line.&#x0a;This is test inclusion."><?php echo $date_rates_detail[$j-1]->description; ?></textarea>
                                               </div>
                                           </div>
                                       </div>
                                       <div class="footer" style="padding:10px 0 17px 0;">
                                          <input type="hidden" id="item_count9" name="item_count9" value="<?php if($countDateRates>0){echo $countDateRates;}else{echo 1;}?>">
                                          <input type="hidden" name="editHotelId" id="editid" value="<?php echo $hotel_id; ?>"/>
                                          <button type="submit" class="btn btn-md btn-warning submit_rate_form1" name="hotel_rate1_<?php echo $j; ?>" id="submit" rel="<?php echo $j;?>">Update</button>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </form>
                           <?php 
                              $item++;
                              } 
                               }
                              }
                              ?>
                        </div>
                     </div>
                  </div>
               </div>
               <?php }  
                  ?>
               <div class="tab-pane fade <?php if($tab == 6){ echo "active in";}?>" id="tab_default_6">
                  <div class="col-sm-12">
                     <input type="hidden" id="room_count" name="room_count" value="<?php echo $countRoomNameId;?>">
                     <input type="hidden" id="total_rates_itmes" name="total_rates_itmes" value="<?php echo $countRooms; ?>"> 
                     <input type="hidden" name="type" value="addHotelRatesDetail" />
                     <input type="hidden" name="hotel_id" value="<?php echo $hotel_id; ?>" />
                     <div class="box-body">
                        <div class="" >
                           <div class="rate">
                              <?php $item = 1;
                                 $roomNamesMaster = array('Single', 'Double', 'Extra Adult', 'Extra Child w/o Bed', 'Extra Child with Bed', 'Extra Breakfast', 'Lunch', 'Dinner');
                                 ?>
                              <form role="form" name="hotel_rate_1" id="hotel_rate_1">
                                 <input type="hidden" name="ttlRoomService" id="ttlRoomService" value="<?php if(isset($countRoomDetail) && !empty($countRoomDetail)){echo $countRoomDetail;}else{echo $countRooms;} ?>"/>
                                 <input type="hidden" id="item_count9" name="item_count9" value="<?php if($countDateRates>0){echo $countDateRates;}else{echo 1;}?>">
                                 <input type="hidden" id="item_count10" name="item_count10" value="8">    
                                 <input type="hidden" id="room_count" name="room_count" value="<?php echo $countRoomNameId;?>"> 
                                 <input type="hidden" id="total_rates_itmes" name="total_rates_itmes" value="<?php echo $countRooms;?>"> 
                                 <input type="hidden" name="type" value="addHotelRatesDetail" />
                                 <input type="hidden" name="hotel_id" value="<?php echo $hotel_id; ?>" />
                                 <input type="hidden" name="update" value="0" />
                                 <div id="rates_1">
                                    <input type="hidden" id="tbl_1_item_count10" name="tbl_1_item_count10" value="1">
                                    <div class="">
                                       <div class="form-group text-center">
                                          <h4  class="box-title" style="margin-bottom:30px; margin-top:20px;"><b style="font-size: 27px; text-align:center;  color:#007DFB; text-shadow:1px 1px #ccc; ">ADD NEW   RATES </b></h4>
                                       </div>
                                    </div>
                                    <div class="col-md-4">
                                       <div class="form-group">
                                          <label for="search">Meal Plan</label>
                                          <select class="form-control" name="mealPlan_1"  id="meal_plan_new" onchange="meal_plan_func('<?php echo $hotel_id; ?>')" required>
                                             <option value="">Select</option>
                                             <option value="1">CP (Breakfast)</option>
                                             <option value="2">MAP (Breakfast+Dinner)</option>
                                             <option value="3">AP (Breakfast+Lunch+Dinner)</option>
                                             <option value="4">EP (Room Only)</option>
                                             <option value="5">CP Package</option>
                                             <option value="6">MAP Package</option>
                                             <option value="7">AP Package</option>
                                             <option value="8">EP Package</option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="col-md-4">
                                       <div class="form-group">
                                          <label for="search">From:Calender</label>
                                          <input type="text" class="form-control fromdate" disabled name="fromdate_1" id="" placeholder="Name" value="<?php echo date('d F Y');?>"/>
                                       </div>
                                    </div>
                                    <div class="col-md-4">
                                       <div class="form-group">
                                          <label for="search">To:Calender</label>
                                          <input type="text" class="form-control todate" disabled name="todate_1" id="" placeholder="Name" value="<?php echo date('d F Y');?>"/>
                                       </div>
                                    </div>
                                    <div class="bs-example col-md-12" >
                                       <div class="table-responsive col-md-12">
                                          <table class="table rate_table">
                                             <thead>
                                                <tr>
                                                   <?php
                                                      if($countRooms>0)
                                                      {
                                                      ?>
                                                   <th class="col-md-3">Rooms</th>
                                                   <?php
                                                      foreach($room_service_details as $key=>$val)
                                                      {
                                                      ?>
                                                   <th class="col-md-2"><?php echo $val['room_type'];?></th>
                                                   <?php
                                                      }
                                                      
                                                      ?>
                                                </tr>
                                             </thead>
                                             <tbody border="1px">
                                                <tr>
                                                   <?php
                                                      $roomCount1=1;
                                                      ?>
                                                   <td class="col-md-3">Single <input type="hidden" name="roomName_1_1_<?php echo $roomCount1;?>" value="<?php echo $singleRoomId;?>"><input type="hidden" name="room_name_1_1_<?php echo $roomCount1;?>" value="Single"/></td>
                                                   <?php
                                                      foreach($room_service_details as $key1=>$val1)
                                                      {
                                                      $roomCount1++;  
                                                      ?>
                                                   <td class="col-md-2">
                                                      <input type="text" name="roomType_1_1_<?php echo $roomCount1;?>" value="">
                                                      <input type="hidden" name="roomTypeId_1_1_<?php echo $roomCount1;?>" value="<?php echo $val1['room_id'];?>">
                                                      <input type="hidden" name="hotelRateId_1_1_<?php echo $roomCount1;?>" value=""/>
                                                   </td>
                                                   <?php
                                                      }
                                                      ?>
                                                </tr>
                                                <tr>
                                                   <?php
                                                      $roomCount2=1;
                                                      ?>
                                                   <td>Double <input type="hidden" name="roomName_1_2_<?php echo $roomCount2;?>" value="<?php echo $doubRoomId;?>"><input type="hidden" name="room_name_1_2_<?php echo $roomCount2;?>" value="Double"/></td>
                                                   <?php
                                                      foreach($room_service_details as $key2=>$val2)
                                                      {
                                                          $roomCount2++;
                                                      ?>
                                                   <td>
                                                      <input type="text"  name ="roomType_1_2_<?php echo $roomCount2;?>" value="">
                                                      <input type="hidden" name="roomTypeId_1_2_<?php echo $roomCount2;?>" value="<?php echo $val2['room_id'];?>">
                                                      <input type="hidden" name="hotelRateId_1_2_<?php echo $roomCount2;?>" value=""/>
                                                   </td>
                                                   <?php
                                                      }
                                                      ?>
                                                </tr>
                                                <tr>
                                                   <?php
                                                      $roomCount3=1;
                                                      ?>
                                                   <td>Extra Adult  <input type="hidden" name="roomName_1_3_<?php echo $roomCount3;?>" value="<?php echo $extAdltRoomId;?>"><input type="hidden" name="room_name_1_3_<?php echo $roomCount3;?>" value="Extra Adult"/></td>
                                                   <?php
                                                      foreach($room_service_details as $key3=>$val3)
                                                      {
                                                          $roomCount3++;
                                                      ?>
                                                   <td>
                                                      <input type="text" name ="roomType_1_3_<?php echo $roomCount3;?>" value="">
                                                      <input type="hidden" name="roomTypeId_1_3_<?php echo $roomCount3;?>" value="<?php echo $val3['room_id'];?>">
                                                      <input type="hidden" name="hotelRateId_1_3_<?php echo $roomCount3;?>" value=""/>
                                                   </td>
                                                   <?php
                                                      }
                                                      ?>
                                                </tr>
                                                <tr>
                                                   <?php
                                                      $roomCount4=1;
                                                      ?>
                                                   <td>Extra Child w/o Bed  <input type="hidden" name="roomName_1_4_<?php echo $roomCount4;?>" value="<?php echo $extChldWoBedRoomId;?>"><input type="hidden" name="room_name_1_4_<?php echo $roomCount4;?>" value="Extra Child w/o Bed"/></td>
                                                   <?php
                                                      foreach($room_service_details as $key4=>$val4)
                                                      {
                                                          $roomCount4++;
                                                      ?>
                                                   <td>
                                                      <input type="text" name="roomType_1_4_<?php echo $roomCount4;?>" value="">
                                                      <input type="hidden" name="roomTypeId_1_4_<?php echo $roomCount4;?>" value="<?php echo $val4['room_id'];?>">
                                                      <input type="hidden" name="hotelRateId_1_4_<?php echo $roomCount4;?>" value=""/>
                                                   </td>
                                                   <?php
                                                      }
                                                      
                                                      
                                                      ?>
                                                </tr>
                                                <tr>
                                                   <?php
                                                      $roomCount5=1;
                                                      ?>
                                                   <td>Extra Child with Bed <input type="hidden" name="roomName_1_5_<?php echo $roomCount5;?>" value="<?php echo $extChldWBedRoomId;?>"><input type="hidden" name="room_name_1_5_<?php echo $roomCount5;?>" value="Extra Child with Bed"/></td>
                                                   <?php
                                                      foreach($room_service_details as $key5=>$val5)
                                                      {
                                                          $roomCount5++;
                                                      ?>
                                                   <td>
                                                      <input type="text" name="roomType_1_5_<?php echo $roomCount5;?>"  value="">
                                                      <input type="hidden" name="roomTypeId_1_5_<?php echo $roomCount5;?>" value="<?php echo $val5['room_id'];?>">
                                                      <input type="hidden" name="hotelRateId_1_5_<?php echo $roomCount5;?>" value=""/>
                                                   </td>
                                                   <?php
                                                      }
                                                      ?>
                                                </tr>
                                                <!--<tr>-->
                                                   <?php
                                                      //$roomCount6=1;
                                                      ?>
                                                   <!--<td>Extra Breakfast <input type="hidden" name="roomName_1_6_<?php //echo $roomCount6;?>" value="<?php //echo $extBrkFastRoomId;?>"><input type="hidden" name="room_name_1_6_<?php //echo $roomCount6;?>" value="Extra Breakfast"/></td>-->
                                                   <?php
                                                    //   foreach($room_service_details as $key6=>$val6)
                                                    //   {
                                                    //       $roomCount6++;
                                                      ?>
                                                   <!--<td>-->
                                                   <!--   <input type="text" name="roomType_1_6_<?php //echo $roomCount6;?>"  value="" >-->
                                                   <!--   <input type="hidden" name="roomTypeId_1_6_<?php //echo $roomCount6;?>" value="<?php //echo $val6['room_id'];?>">-->
                                                   <!--   <input type="hidden" name="hotelRateId_1_6_<?php //echo $roomCount6;?>" value=""/>-->
                                                   <!--</td>-->
                                                   <?php
                                                      //}
                                                      ?>
                                                <!--</tr>-->
                                                <!--<tr>-->
                                                   <?php
                                                      //$roomCount7=1;
                                                      ?>
                                                   <!--<td>Lunch <input type="hidden" name="roomName_1_7_<?php //echo $roomCount7;?>" value="<?php //echo $lunchRoomId;?>"><input type="hidden" name="room_name_1_7_<?php //echo $roomCount7;?>" value="Lunch"/></td>-->
                                                   <?php
                                                    //   foreach($room_service_details as $key7=>$val7)
                                                    //   {
                                                    //       $roomCount7++;
                                                      ?>
                                                   <!--<td>-->
                                                   <!--   <input type="text" name="roomType_1_7_<?php //echo $roomCount7;?>" value="">-->
                                                   <!--   <input type="hidden" name="roomTypeId_1_7_<?php //echo $roomCount7;?>" value="<?php //echo $val7['room_id'];?>">-->
                                                   <!--   <input type="hidden" name="hotelRateId_1_7_<?php //echo $roomCount7;?>" value=""/>-->
                                                   <!--</td>-->
                                                   <?php
                                                      //}
                                                      
                                                      ?>
                                                <!--</tr>-->
                                                <!--<tr>-->
                                                   <?php
                                                      //$roomCount8=1;
                                                      ?>
                                                   <!--<td class="dinnerCol">Dinner <input type="hidden" name="roomName_1_8_<?php //echo $roomCount8;?>" value="<?php //echo $dinnRoomId;?>"><input type="hidden" name="room_name_1_8_<?php //echo $roomCount8;?>" id="room_name_1_8_<?php //echo $roomCount8;?>" value="Dinner"/></td>-->
                                                   <?php
                                                    //   foreach($room_service_details as $key8=>$val8)
                                                    //   {
                                                    //       $roomCount8++;
                                                      ?>
                                                   <!--<td>-->
                                                   <!--   <input type="text" class="roomType_1_<?php //echo $roomCount8;?>" name="roomType_1_8_<?php //echo $roomCount8;?>" value="">-->
                                                   <!--   <input type="hidden" class="roomTypeId_1_<?php //echo $roomCount8;?>" name="roomTypeId_1_8_<?php //echo $roomCount8;?>" value="<?php echo $val8['room_id'];?>">-->
                                                   <!--   <input type="hidden" class="hotelRateId_1_<?php// echo $roomCount8;?>" name="hotelRateId_1_8_<?php //echo $roomCount8;?>" value=""/>-->
                                                   <!--</td>-->
                                                   <?php
                                                      //}
                                                      }
                                                      
                                                      ?>
                                                </tr>
                                             </tbody>
                                          </table>
                                       </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-6">
                                            <h3><b>Default Inclusions:</b></h3>
							                <ul>
								                <li>Meals as above mentioned Meal Plan.</li>
								                <li>All kind of applicable hotel, transport, service &amp; govt. taxes.</li>
							                </ul>
                                        </div>
                                        <div class="col-md-6" style="" id="pakdescrdiv">
                                           <div class="form-group">
                                               <label>Other inclusions (optional)</label>
                                               <textarea class="form-control" rows="5" name="cppakdescription_1" placeholder="Ex.&#x0a;add extra inclusions line by line.&#x0a;This is test inclusion."></textarea>
                                           </div>
                                        </div>
                                    </div>
                                    
                                 </div>
                                 <div class="clearfix"></div>
                                 <div class="box-footer">
                                    <button type="submit" class="btn btn-md btn-warning submit_rate_form" name="hotel_rate_1" rel="1" id="submit">Save</button></br></br>
                                 </div>
                              </form>
                           </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="box-footer">
                           <a href="<?php echo base_url(HOTEL) ?>/viewHotel" class="btn btn-md btn-success" name="bottom">Submit</a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
</section>
</div>
<!-- Modal -->
<div class = "modal" id = "roomAmen" tabindex = "-1" role = "dialog" 
   aria-labelledby = "myModalLabel" aria-hidden = "true">
   <div class = "modal-dialog">
      <div class = "modal-content">
         <div class = "modal-header">
            <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">
            &times;
            </button>
            <h4 class = "modal-title" id = "myModalLabel">
               Room Amenities & Facilities
            </h4>
         </div>
         <div class ="modal-body">
            <div class="row">
               <input type="hidden" name="currentItem" id="currentItem" value="1"/>
               <?php                 
                  foreach($arrRoomAmen as $value){
                  ?>
               <div class="col-md-4">
                  <label class="checkbox-inline"><input class="modalRoomAminities" type="checkbox" id="modalRoomAminities" name="modRoomAmen[]" value="<?php echo $value;?>"><?php echo $value;?></label>
               </div>
               <?php
                  }
                  ?>
            </div>
         </div>
         <div class = "modal-footer">
            <button type = "button" class = "btn btn-default" data-dismiss = "modal">
            Close
            </button>
            <button type = "button" id="submodalRoomAmen" name="submodalRoomAmen" class = "btn btn-primary">
            Select
            </button>
         </div>
      </div>
      <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- Modal -->
<div class="modal" id="hotelAmen" tabindex"-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
            &times;
            </button>
            <h4 class = "modal-title" id = "myModalLabel">
               Hotel Amenities & Facilities
            </h4>
         </div>
         <div class="modal-body">
            <div class="row">
               <?php
                  foreach($arrAmenties as $value){
                     
                  ?>
               <div class="col-md-4">
                  <label class="checkbox-inline"><input class="modalAminities" type="checkbox" id="modalAminities" name="modAmen[]" value="<?php echo $value;?>"><?php echo $value;?></label>
               </div>
               <?php
                  }
                  ?>
            </div>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">
            Close
            </button>
            <button type="button" id="submodalAmen" name="submodalAmen" class="btn btn-primary">
            Select
            </button>
         </div>
      </div>
      <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<style>
.imageThumb {
  width:150px;
  max-height: 150px;
  border: 2px solid;
  padding: 1px;
  cursor: pointer;
}
.pip1 {
  display: block;
  margin: 10px 10px 0 0;
}
.pip {
  display: inline-block;
  margin: 10px 10px 0 0;
}
.remove {
  display: block;
  background: #444;
  border: 1px solid black;
  color: white;
  text-align: center;
  cursor: pointer;
}
.remove:hover {
  background: white;
  color: black;
}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
            window.history.pushState(null, "", window.location.href);        
            window.onpopstate = function() {
                window.history.pushState(null, "", window.location.href);
            }
            
        if($("#hotel_amenity").val == ""){
            alert("please select amenities");
        }
        
    });
    $(document).on("click", "#discard", function(event){
      //alert('Hello World');
      location.reload();
    });
</script>