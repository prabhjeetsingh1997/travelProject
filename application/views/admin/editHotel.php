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
   <li><a href="<?php echo base_url(ADMIN_URL) ?>/dashboard">Home</a></li>
   <li><a href="#">Hotel Details</a></li>
</ol>
<div class="page-heading">
   <h1>View Hotel Details</h1>
   <?php $this->load->helper('form'); ?>
   <div class="row">
      <div class="col-md-12">
         <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
      </div>
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
   <div class="options">
   </div>
</div>
<!--home-content-top starts from here-->
<section class="home-content-top">
   <div class="container">
      <!--our-quality-shadow-->
      <div class="tabbable-panel margin-tops4 ">
         <div class="tabbable-line">
            <ul class="nav nav-tabs tabtop  tabsetting">
               <li <?php if($tab == 1){ echo 'class="active"';}else{echo 'class="disabled"';}?>> <a <?php if($tab != 1){ echo 'class="disabled"';}?> href="#tab_default_1" data-toggle="tab" title="Click next to open"> Step 1 <br>Hotel Details </a> </li>
               <li <?php if($tab == 2){ echo 'class="active"';}else{echo 'class="disabled"';}?>> <a <?php if($tab != 2){ echo 'class="disabled"';}?> href="#tab_default_2" data-toggle="tab" title="Click next to open"> Step 2 <br>Banking Details </a> </li>
               <li <?php if($tab == 3){ echo 'class="active"';}else{echo 'class="disabled"';}?>> <a <?php if($tab != 3){ echo 'class="disabled"';}?> href="#tab_default_3" data-toggle="tab" title="Click next to open"> Step 3 <br>Attached Documents </a> </li>
               <li <?php if($tab == 4){ echo 'class="active"';}else{echo 'class="disabled"';}?>> <a <?php if($tab != 4){ echo 'class="disabled"';}?> href="#tab_default_4" data-toggle="tab" title="Click next to open"> Step 4 <br>Hotel Photos </a> </li>
               <li <?php if($tab == 5){ echo 'class="active"';}else{echo 'class="disabled"';}?>> <a <?php if($tab != 5){ echo 'class="disabled"';}?> href="#tab_default_5" data-toggle="tab" title="Click next to open"> Step 5 <br>Hotel Rates </a> </li>
            </ul>
            <div class="tab-content margin-tops">
               <div class="tab-pane fade <?php if($tab == 1){ echo "active in";}?>" id="tab_default_1">
                  <div  class="col-sm-12">
                     <form id="form_registration" action="<?php echo base_url(HOTEL) ?>/updateHotel" method="POST" class="form-horizontal" enctype="multipart/form-data">
                        <fieldset>
                           <input type="hidden" name="type" value="updateHotelDetails">
                           <input type="hidden" name="hotel_id" value="<?php echo $hotel_id; ?>">
                           <div class="form-group">
                              <div class="col-md-12">
                                 <label>Hotel Name <span style="color: red;">*</span></label>
                              </div>
                              <div class="col-md-12">
                                 <input class="form-control" data-required="true" id="hotel_name"  name="hotel_name" type="text" placeholder="Hotel Name" value="<?php echo $hotel_detail->hotel_name; ?>" required/>
                              </div>
                           </div>
                           <div class="form-group">
                              <div class="col-md-12">
                                 <label>Address <span style="color: red;">*</span></label>
                              </div>
                              <div class="col-md-6">
                                 <input class="form-control" data-required="true" id="address_line_1"  name="address_line_1" type="text" placeholder="Address" value="<?php echo $hotel_detail->address_line_1; ?>" required/>
                              </div>
                              <div class="col-md-6">
                                 <input class="form-control" data-required="true" id="address_line_2"  name="address_line_2" type="text" value="<?php echo $hotel_detail->address_line_2; ?>" placeholder="Landmark / Area" required/>
                              </div>
                              <div class="col-md-3">
                                 <select class="form-control" data-required="true" name="country_id" id="country_id" required="true">
                                    <option value="">--Select--</option>
                                    <?php if (!empty($countries)) {
                                       foreach ($countries as $country) { ?>
                                    <option value="<?php echo $country->id; ?>" <?php if ($country->id == $hotel_detail->country_id) { echo "selected"; } ?>><?php echo $country->country_name; ?></option>
                                    <?php }
                                       } ?>
                                 </select>
                              </div>
                              <div class="col-md-3">
                                 <select class="form-control" data-required="true" name="state_id" id="state_id" required="true">
                                    <option value="">--Select--</option>
                                     <?php if(!empty($states)){
                                         foreach ($states as $state) { ?>
                                          <option value="<?php echo $state->id?>" <?php if ($state->id == $hotel_detail->state_id) { echo "selected"; } ?>><?php echo $state->state_name; ?></option>
                                     <?php }
                                       } ?>
                                 </select>
                              </div>
                              <div class="col-md-3">
                                 <select class="form-control" data-required="true" name="city_id" id="city_id" required="true">
                                    <option value="">--Select--</option>
                                     <?php if(!empty($cities)){
                                         foreach ($cities as $city) { ?>
                                          <option value="<?php echo $city->id?>" <?php if ($city->id == $hotel_detail->city_id) { echo "selected"; } ?>><?php echo $city->city_name; ?></option>
                                     <?php }
                                       } ?>
                                 </select>
                              </div>
                              <div class="col-md-3">
                                 <input class="form-control" data-required="true" id="zip"  name="zip" type="number" min="6" placeholder="Pin Code" value="<?php echo $hotel_detail->zip; ?>" required/>
                              </div>
                           </div>
                           <div class="form-group">
                              <div class="col-md-12">
                                 <label>Hotel Contact Nos. <span style="color: red;">*</span></label>
                              </div>
                              <div class="col-md-4">
                                 <input class="form-control" data-required="true" id="hotel_mobile_no"  name="hotel_mobile_no" type="number" value="<?php echo $hotel_detail->hotel_mobile_no; ?>" placeholder="Hotel Mobile" min="10" required/>
                              </div>
                              <div class="col-md-4">
                                 <input class="form-control" id="hotel_alternative_no"  name="hotel_alternative_no" type="number" value="<?php echo $hotel_detail->hotel_alternative_no; ?>" placeholder="Hotel Alternative Number (If Any)"/>
                              </div>
                              <div class="col-md-4">
                                 <input class="form-control" id="hotel_landline"  name="hotel_landline" type="number" value="<?php echo $hotel_detail->hotel_landline; ?>" placeholder="Hotel Landline (If Any)"/>
                              </div>
                           </div>
                           <div class="form-group">
                              <div class="col-md-12">
                                 <label>Hotel Concerned Person Details.</label>
                              </div>
                              <div class="col-md-3">
                                 <input class="form-control" data-required="true" id="person_name"  name="person_name" type="text" value="<?php echo $hotel_detail->person_name; ?>" placeholder="Full Name" min="10" />
                              </div>
                              <div class="col-md-3">
                                 <input class="form-control" id="person_email"  name="person_email" type="email" value="<?php echo $hotel_detail->person_email; ?>" placeholder="Email"/>
                              </div>
                              <div class="col-md-3">
                                 <input class="form-control" id="person_mobile_no"  name="person_mobile_no" type="number" value="<?php echo $hotel_detail->person_mobile_no; ?>" placeholder="Person Mobile No"/>
                              </div>
                              <div class="col-md-3">
                                 <input class="form-control" id="person_alternative_no"  name="person_alternative_no" type="number" value="<?php echo $hotel_detail->person_alternative_no; ?>" placeholder="Alternative No."/>
                              </div>
                           </div>
                           <div class="form-group">
                              <div class="col-md-12">
                                 <input type="hidden" name="no_room_types" id="no_room_types" value="<?php echo $hotel_detail->no_room_types; ?>">
                                 <label>Add More Rows  <span style="color: red;">*</span></label>
                                 <select class="form-control" name="add_more_rows" id="add_more_rows" required>
                                    <option value="0">--Add More Room Types--</option>
                                    <?php for ($i=1; $i <=(5-$hotel_detail->no_room_types) ; $i++) { ?>
                                       <option value="<?php echo $i; ?>"><?php echo ($hotel_detail->no_room_types + $i); ?></option>
                                    <?php } 
                                    ?>
                                 </select>
                              </div>
                           </div>
                          <div class="form-group">
                           <?php if(!empty($hotel_rooms)){
                                 $i = 1;
                                 foreach ($hotel_rooms as $rooms) { ?>
                                   <div class="col-md-12"><label>Room <?php echo $i; ?> <span style="color: red;">*</span></label>
                                   </div>
                                   <div class="col-md-12"></div>
                                   <div class="col-md-2">
                                       <input type="hidden" name="room_id_<?php echo $i; ?>" value="<?php  echo $rooms->room_id; ?>">
                                       <input class="form-control" data-required="true" id="room_name_<?php echo $i; ?>"  name="room_name_<?php echo $i; ?>" type="text" placeholder="Room Type" value="<?php echo $rooms->room_type; ?>" required/>
                                    </div>
                                    <div class="col-md-2">
                                       <input class="form-control" data-required="true" id="room_description_<?php echo $i; ?>"  name="room_description_<?php echo $i; ?>" type="text" value="<?php echo $rooms->room_description; ?>" placeholder="Room Description" required/>
                                    </div>
                                    <div class="col-md-1">
                                       <input type="button" value="Select" class="btn btn-md btn-warning" onClick="room_model(<?php echo $i; ?>);"/>
                                    </div>
                                    <div class="col-md-3">
                                    <input class="form-control" data-required="true" id="room_amenities_<?php echo $i; ?>"  name="room_amenities_<?php echo $i; ?>" type="text" placeholder="Amenities & Facilities" value="<?php echo $rooms->room_amenities; ?>" required/>
                                    </div>
                                    <div class="col-md-1">
                                       <input class="form-control" data-required="true" id="room_units_<?php echo $i; ?>"  name="room_units_<?php echo $i; ?>" type="text" placeholder="Units" value="<?php echo $rooms->units; ?>" required/>
                                    </div>
                                    <div class="col-md-2">
                                       <input class="form-control" type="file" class="custom-file-input" id="inputGroupFile01" name="room_images_<?php echo $i; ?>" aria-describedby="inputGroupFileAddon01" accept="image/*"/>
                                    </div>
                                    <div class="col-md-1">
                                       <button type="button" rel="<?php echo $rooms->room_id; ?>" class="btn btn-md btn-warning viewRoomDetail" data-toggle="tooltip" data-placement="top" title="View Hotel Photos">Room Pic</button>
                                    </div>
                                    <div class="room_images" style="display: none;" id="room_photos_<?php echo $rooms->room_id; ?>">
                                        <div class="img-wrap">
                                            <span class="close">&times;</span>
                                            <img src="<?php echo base_url(ROOM_PHOTOS).$rooms->room_pics; ?>" data-id="<?php echo $rooms->room_id; ?>" width="200px" height="200px;">
                                        </div>
                                    </div>
                              <?php $i++;
                                 }
                              } ?>
                              </div>
                            <div class="form-group" id="add_rooms"></div>
                           <div class="form-group">
                              <div class="col-md-4">
                                 <label>Hotel Type <span style="color: red;">*</span></label>
                                 <select class="form-control" name="hotel_type" id="hotel_type" required="true">
                                    <option value="">--Select Hotel Type--</option>
                                   <option <?php if($hotel_detail->hotel_type == 'Hotel'){echo "selected";}?>>Hotel</option>
                                    <option <?php if($hotel_detail->hotel_type == 'Resort'){echo "selected";}?>>Resort</option>
                                    <option <?php if($hotel_detail->hotel_type == 'Motel'){echo "selected";}?>> Motel</option>
                                    <option <?php if($hotel_detail->hotel_type == 'BnB'){echo "selected";}?>>BnB</option>
                                    <option <?php if($hotel_detail->hotel_type == 'Homestay'){echo "selected";}?>>Homestay</option>
                                    <option <?php if($hotel_detail->hotel_type == 'Tent'){echo "selected";}?>>Tent</option>
                                    <option <?php if($hotel_detail->hotel_type == 'Service Apartment'){echo "selected";}?>>Service Apartment</option>
                                    <option <?php if($hotel_detail->hotel_type == 'Bungalow'){echo "selected";}?>>Bungalow</option>
                                    <option <?php if($hotel_detail->hotel_type == 'Lodge'){echo "selected";}?>>Lodge</option>
                                    <option <?php if($hotel_detail->hotel_type == 'Guest House'){echo "selected";}?>>Guest House</option>
                                    <option <?php if($hotel_detail->hotel_type == 'Hostel'){echo "selected";}?>>Hostel</option>
                                    <option <?php if($hotel_detail->hotel_type == 'Cottage'){echo "selected";}?>>Cottage</option>
                                    <option <?php if($hotel_detail->hotel_type == 'Houseboat'){echo "selected";}?>>Houseboat</option>
                                    <option <?php if($hotel_detail->hotel_type == 'Villa'){echo "selected";}?>> Villa</option>
                                    <option <?php if($hotel_detail->hotel_type == 'Palace'){echo "selected";}?>>Palace</option>
                                    <option <?php if($hotel_detail->hotel_type == 'Beach Hut'){echo "selected";}?>>Beach Hut</option>
                                    <option <?php if($hotel_detail->hotel_type == 'Farm'){echo "selected";}?>> Farm</option>
                                 </select>
                              </div>
                              <div class="col-md-4">
                                 <label>Base Currency <span style="color: red;">*</span></label>
                                 <select class="form-control" name="hotel_currency" id="hotel_currency" required="true">
                                    <option value="">--Select Hotel Currency--</option>
                                    <option <?php if($hotel_detail->hotel_currency == 'USD'){echo "selected";}?>>USD </option>
                                    <option <?php if($hotel_detail->hotel_currency == 'INR'){echo "selected";}?>>INR </option>
                                    <option <?php if($hotel_detail->hotel_currency == 'EUR'){echo "selected";}?>>EUR </option>
                                    <option <?php if($hotel_detail->hotel_currency == 'JPY'){echo "selected";}?>>JPY </option>
                                    <option <?php if($hotel_detail->hotel_currency == 'GBP'){echo "selected";}?>>GBP</option>
                                    <option <?php if($hotel_detail->hotel_currency == 'AUD'){echo "selected";}?>>AUD</option>
                                    <option <?php if($hotel_detail->hotel_currency == 'CHF'){echo "selected";}?>>CHF</option>
                                    <option <?php if($hotel_detail->hotel_currency == 'CAD'){echo "selected";}?>>CAD</option>
                                    <option <?php if($hotel_detail->hotel_currency == 'MXN'){echo "selected";}?>>MXN</option>
                                    <option <?php if($hotel_detail->hotel_currency == 'CNY'){echo "selected";}?>>CNY</option>
                                    <option <?php if($hotel_detail->hotel_currency == 'NZD'){echo "selected";}?>>NZD</option>
                                    <option <?php if($hotel_detail->hotel_currency == 'SEK'){echo "selected";}?>>SEK</option>
                                    <option <?php if($hotel_detail->hotel_currency == 'RUB'){echo "selected";}?>>RUB</option>
                                    <option <?php if($hotel_detail->hotel_currency == 'HKD'){echo "selected";}?>>HKD</option>
                                 </select>
                              </div>
                              <div class="col-md-4">
                                 <label>Hotel Star Rating <span style="color: red;">*</span></label>
                                 <select class="form-control" name="hotel_star" id="hotel_star" required="true">
                                    <option value="">--No Star--</option>
                                   <option <?php if($hotel_detail->hotel_star == '1'){echo "selected";}?>>1</option>
                                    <option <?php if($hotel_detail->hotel_star == '2'){echo "selected";}?>>2</option>
                                    <option <?php if($hotel_detail->hotel_star == '3'){echo "selected";}?>>3</option>
                                    <option <?php if($hotel_detail->hotel_star == '4'){echo "selected";}?>>4</option>
                                    <option <?php if($hotel_detail->hotel_star == '5'){echo "selected";}?>>5</option>
                                 </select>
                              </div>
                           </div>
                           <div class="form-group">
                              <div class="col-md-6">
                                 <label>Check in Time <span style="color: red;">*</span></label>
                                 <input type="text" id="check_in" name="check_in" value="<?php if(isset($hotel_detail->check_in)){echo $hotel_detail->check_in; }else{echo '12:00 PM'; } ?>" data-format="hh:mm A" class="form-control clockface-open" required="true">
                              </div>
                              <div class="col-md-6">
                                 <label>Check out Time <span style="color: red;">*</span></label>
                                 <input type="text" id="check_out" name="check_out" value="<?php if(isset($hotel_detail->check_out)){echo $hotel_detail->check_out; }else{echo '11:00 AM'; } ?>" data-format="hh:mm A" class="form-control clockface-open" required="true">
                              </div>
                           </div>
                           <div class="form-group">
                              <data></data>
                              <div class="col-md-2" style="padding-top:15px;"><label>Amenity & Facility <span style="color: red;">*</span></label></div>
                              <div class="col-md-2" style="margin-bottom:5px;">
                                 <input type="button" value="Hotel Amenity" class="btn btn-md btn-warning" onclick="hotel_amenity_modal();"/>
                              </div>
                              <div class="col-md-8">
                                 <input class="form-control" data-required="true" id="hotel_amenity"  name="hotel_amenity" type="text" value="<?php echo $hotel_detail->hotel_amenity;?>" placeholder="Amenity & Facility" required/>
                              </div>
                           </div>
                           <div class="form-group">
                              <div class="col-md-12">
                                 <label>Description</label>
                              </div>
                              <div class="col-md-12">
                                 <input class="form-control"  data-required="true" id="hotel_description"  name="hotel_description" value="<?php echo $hotel_detail->hotel_description;?>" type="text" style="height:100px;">
                              </div>
                           </div>
                           <div class="clearfix"></div>
                           <div class="form-group">
                              <div class="col-sm-2">
                              <a href="<?php echo base_url(ADMIN_URL).'/editHotel/'.base64_encode(2).'/'.base64_encode($hotel_id); ?>" class="btn btn-info" role="button">Next</a>
                              </div>
                           </div>
                        </fieldset>
                     </form>
                  </div>
               </div>
               <div class="tab-pane fade <?php if($tab == 2){ echo "active in";}?>" id="tab_default_2">
                  <div class="col-sm-12">
                     <form id="form_registration" action="<?php echo base_url(HOTEL) ?>/updateHotel" method="POST" class="form-horizontal">
                        <input type="hidden" name="type" value="updateHotelBankingDetails">
                        <input type="hidden" name="hotel_id" value="<?php echo $hotel_id; ?>">
                        <fieldset>
                           <div class="form-group">
                              <div class="col-md-12">
                                 <label>GST NO.</label>
                              </div>
                              <div class="col-md-12">
                                 <input class="form-control" data-required="true" id="pan_no"  name="pan_no" type="text" value="<?php echo $hotel_bank_details->pan_no; ?>" placeholder="GST NO." />
                              </div>
                              </div>
                             <div class="form-group">
                              <div class="col-md-12">
                                 <label>Account Number</label>
                              </div>
                              <div class="col-md-12">
                                 <input class="form-control" data-required="true" id="acount_no"  name="acount_no" type="text" value="<?php echo $hotel_bank_details->acount_no; ?>" placeholder="Account No."/>
                              </div>
                           </div>
                           <div class="form-group">
                              <div class="col-md-12">
                                 <label>Account Name</label>
                              </div>
                              <div class="col-md-12">
                                 <input class="form-control" data-required="true" id="acount_holder_name"  name="acount_holder_name" value="<?php echo $hotel_bank_details->acount_holder_name; ?>" type="text" placeholder="Account Holder Name"/>
                              </div>
                           </div>
                           <div class="form-group">
                              <div class="col-md-12">
                                 <label>Bank</label>
                              </div>
                              <div class="col-md-12">
                                 <input class="form-control" data-required="true" id="bank"  name="bank" type="text" value="<?php echo $hotel_bank_details->bank; ?>" placeholder="Bank"/>
                              </div>
                           </div>
                           <div class="form-group">
                              <div class="col-md-12">
                                 <label>Branch</label>
                              </div>
                              <div class="col-md-12">
                                 <input class="form-control" data-required="true" id="branch"  name="branch" type="text" value="<?php echo $hotel_bank_details->branch; ?>" placeholder="Branch"/>
                              </div>
                           </div>
                           <div class="form-group">
                              <div class="col-md-12">
                                 <label>IFSC </label>
                              </div>
                              <div class="col-md-12">
                                 <input class="form-control" data-required="true" id="ifsc"  name="ifsc" type="text" value="<?php echo $hotel_bank_details->ifsc; ?>" placeholder="IFSC"/>
                              </div>
                           </div>
                           <div class="clearfix"></div>
                           <div class="form-group">
                           <div class="col-md-6">
                            <div class="col-md-3">
                                 <a href="<?php echo base_url(ADMIN_URL).'/editHotel/'.base64_encode(1).'/'.base64_encode($hotel_id); ?>" class="btn btn-info" role="button">Previous</a>
                              </div>
                              <div class="col-md-2">
                                 <a href="<?php echo base_url(ADMIN_URL).'/editHotel/'.base64_encode(3).'/'.base64_encode($hotel_id); ?>" class="btn btn-info" role="button">Next</a>
                              </div>
                              </div>
                           </div>
                        </fieldset>
                     </form>
                  </div>
               </div>
               <div class="tab-pane fade <?php if($tab == 3){ echo "active in";}?>" id="tab_default_3">
                  <div class="col-sm-12">
                     <form id="form_registration" action="<?php echo base_url(HOTEL) ?>/updateHotel" method="POST" class="form-horizontal" enctype="multipart/form-data">
                        <fieldset>
                           <input type="hidden" name="type" value="updateHotelDocuments">
                           <input type="hidden" name="hotel_id" value="<?php echo $hotel_id; ?>">
                           <div class="form-group">
                              <div class="col-md-12">
                                 <label>PAN Card</label>
                              </div>
                              <div class="col-md-6">
                                 <input class="form-control" type="file" class="custom-file-input" id="inputGroupFile01" name="pan_card" aria-describedby="inputGroupFileAddon01"/>
                              </div>
                              <div class="col-md-6">
                                   <button type="button" rel="<?php echo $hotel_documents->id; ?>" class="btn btn-md btn-warning viewPanDetail" data-toggle="tooltip" data-placement="top" title="View Hotel Documents">Pan Card Photo</button>
                              </div>
                                <div class="hotel_pan" style="display: none;" id="hotel_pan<?php echo $hotel_documents->id; ?>">
                                    <div class="img-wrap">
                                        <span class="close">&times;</span>
                                        <img src="<?php echo base_url(HOTEL_DOCUMENTS).$hotel_documents->pan_card_photo; ?>" data-id="<?php echo $hotel_documents->id; ?>" width="150px" height="150px;">
                                    </div>
                                </div>
                           </div>
                           <div class="form-group">
                              <div class="col-md-12">
                                 <label>Contract</label>
                              </div>
                              <div class="col-md-6">
                                 <input class="form-control" type="file" class="custom-file-input" id="inputGroupFile01" name="contracts[]" aria-describedby="inputGroupFileAddon01" multiple="true" />
                              </div>
                              <div class="col-md-6">
                                   <button type="button" rel="<?php echo $hotel_documents->id; ?>" class="btn btn-md btn-warning viewContactDetail" data-toggle="tooltip" data-placement="top" title="View Contact Documents">Contract Photo</button>
                              </div>
                              <div class="hotel_pan" style="display: none;" id="hotel_contact<?php echo $hotel_documents->id; ?>">
                                    <?php $contracts = json_decode($hotel_documents->contract);
                                        foreach ($contracts as $doc => $val) { ?>
                                        <div class="img-wrap">
                                            <span class="close">&times;</span>
                                            <img src="<?php echo base_url(HOTEL_DOCUMENTS).$val; ?>" data-id="<?php echo $hotel_documents->id; ?>" width="100px" height="100px;">
                                        </div>
                                     <?php }
                                    ?>
                                </div>
                           </div>
                           <div class="clearfix"></div>
                           <div class="form-group">
                             <div class="col-md-6">
                            <div class="col-md-3">
                                 <a href="<?php echo base_url(ADMIN_URL).'/editHotel/'.base64_encode(2).'/'.base64_encode($hotel_id); ?>" class="btn btn-info" role="button">Previous</a>
                              </div>
                              <div class="col-md-2">
                                 <a href="<?php echo base_url(ADMIN_URL).'/editHotel/'.base64_encode(4).'/'.base64_encode($hotel_id); ?>" class="btn btn-info" role="button">Next</a>
                              </div>
                              </div>
                           </div>
                        </fieldset>
                     </form>
                  </div>
               </div>
               <div class="tab-pane fade <?php if($tab == 4) echo "active in"; ?>" id="tab_default_4">
                  <div class="col-sm-12">
                     <form id="form_registration" action="<?php echo base_url(HOTEL) ?>/updateHotel" method="POST" class="form-horizontal" enctype="multipart/form-data">
                        <fieldset>
                           <input type="hidden" name="type" value="updateHotelPhotos">
                           <input type="hidden" name="hotel_id" value="<?php echo $hotel_id; ?>">
                           <div class="form-group">
                              <div class="col-md-12">
                                 <label>Photos</label>
                              </div>
                              <div class="col-md-6">
                                 <input class="form-control" type="file" class="custom-file-input" id="inputGroupFile01" name = "hotel_photos[]" aria-describedby="inputGroupFileAddon" multiple="true" accept="image/*" />
                              </div>
                              <div class="col-md-6">
                                   <button type="button" rel="<?php echo $hotel_photos->id; ?>" class="btn btn-md btn-warning viewHotelPhotos" data-toggle="tooltip" data-placement="top" title="View Photos Documents">Hotel Photo</button>
                              </div>
                              <div class="hotel_pan" style="display: none;" id="hotel_pic<?php echo $hotel_photos->id; ?>">
                                    <input type="hidden" name="hotel_id" value="<?php echo $hotel_id; ?>">
                                    <?php $photos = json_decode($hotel_photos->hotel_photos );
                                            $caption = json_decode($hotel_photos->captions);
                                        foreach ($photos as $pic => $val) { ?>
                                        <div class="img-wrap">
                                            <span class="close">&times;</span>
                                            <img src="<?php echo base_url(HOTEL_PHOTOS).$val; ?>" data-id="<?php echo $hotel_photos->id; ?>" width="100px" height="100px;">
                                            <input type="text" name="image_caption[]" class="form-control" style="margin-top: 10px; width:118px; height: 30px;" placeholder="image Caption" value="<?php echo $caption[$pic]; ?>" required="true">
                                        </div>
                                     <?php }
                                    ?>
                                </div>
                           </div>
                           <div class="clearfix"></div>
                           <div class="form-group">
                              <div class="col-md-6">
                            <div class="col-md-3">
                                 <a href="<?php echo base_url(ADMIN_URL).'/editHotel/'.base64_encode(3).'/'.base64_encode($hotel_id); ?>" class="btn btn-info" role="button">Previous</a>
                              </div>
                              <div class="col-md-2">
                                 <a href="<?php echo base_url(ADMIN_URL).'/editHotel/'.base64_encode(5).'/'.base64_encode($hotel_id); ?>" class="btn btn-info" role="button">Next</a>
                              </div>
                              </div>
                           </div>
                        </fieldset>
                     </form>
                  </div>
               </div>
               <?php if ($tab == 5) { ?>
               <div class="col-md-12 col-sm-12" style="padding-left:0px; padding-right:0px;     margin-top: 20px;">
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
                                             <tr>
                                                <?php
                                                   $roomCount6=1;
                                                   ?>
                                                <td>Extra Breakfast <input type="hidden" name="roomName_<?php echo $j;?>_6_<?php echo $roomCount6;?>" value="<?php echo $extBrkFastRoomId;?>"><input type="hidden" name="room_name_<?php echo $j;?>_6_<?php echo $roomCount6;?>" value="Extra Breakfast"/></td>
                                                <?php
                                                   $hotelRmRate = 0;
                                                   foreach($arrRooms as $key6=>$val6)
                                                   {
                                                      $roomCount6++;
                                                      
                                                      $hotelRmRate = $ratesArr[$dateId][$val6['room_id']]['Extra Breakfast'][0];
                                                      $hotelRmRateId = $ratesArr[$dateId][$val6['room_id']]['Extra Breakfast'][1];
                                                   ?>
                                                <td>
                                                   <input type="text" name="roomType_<?php echo $j;?>_6_<?php echo $roomCount6;?>"  value="<?php echo $hotelRmRate; ?>" >
                                                   <input type="hidden" name="roomTypeId_<?php echo $j;?>_6_<?php echo $roomCount6;?>" value="<?php echo $val6['room_id'];?>">
                                                   <input type="hidden" name="hotelRateId_<?php echo $j;?>_6_<?php echo $roomCount6;?>" value="<?php echo $hotelRmRateId; ?>"/>
                                                </td>
                                                <?php
                                                   }
                                                   ?>
                                             </tr>
                                             <tr>
                                                <?php
                                                   $roomCount7=1;
                                                   ?>
                                                <td>Lunch <input type="hidden" name="roomName_<?php echo $j;?>_7_<?php echo $roomCount7;?>" value="<?php echo $lunchRoomId;?>"><input type="hidden" name="room_name_<?php echo $j;?>_7_<?php echo $roomCount7;?>" value="Lunch"/></td>
                                                <?php
                                                   $hotelRmRate = 0;
                                                   foreach($arrRooms as $key7=>$val7)
                                                   {
                                                      $roomCount7++;
                                                      
                                                      $hotelRmRate = $ratesArr[$dateId][$val7['room_id']]['Lunch'][0];
                                                      $hotelRmRateId = $ratesArr[$dateId][$val7['room_id']]['Lunch'][1];
                                                   ?>
                                                <td>
                                                   <input type="text" name="roomType_<?php echo $j;?>_7_<?php echo $roomCount7;?>" value="<?php echo $hotelRmRate; ?>">
                                                   <input type="hidden" name="roomTypeId_<?php echo $j;?>_7_<?php echo $roomCount7;?>" value="<?php echo $val7['room_id'];?>">
                                                   <input type="hidden" name="hotelRateId_<?php echo $j;?>_7_<?php echo $roomCount7;?>" value="<?php echo $hotelRmRateId; ?>"/>
                                                </td>
                                                <?php
                                                   }
                                                   
                                                   ?>
                                             </tr>
                                             <tr>
                                                <?php
                                                   $roomCount8=1;
                                                   ?>
                                                <td class="dinnerCol">Dinner <input type="hidden" name="roomName_<?php echo $j;?>_8_<?php echo $roomCount8;?>" value="<?php echo $dinnRoomId;?>"><input type="hidden" name="room_name_<?php echo $j;?>_8_<?php echo $roomCount8;?>" id="room_name_<?php echo $j;?>_8_<?php echo $roomCount8;?>" value="Dinner"/></td>
                                                <?php
                                                   $hotelRmRate = 0;
                                                   foreach($arrRooms as $key8=>$val8)
                                                   {
                                                      $roomCount8++;
                                                      
                                                      $hotelRmRate = $ratesArr[$dateId][$val8['room_id']]['Dinner'][0];
                                                      $hotelRmRateId = $ratesArr[$dateId][$val8['room_id']]['Dinner'][1];
                                                   ?>
                                                <td>
                                                   <input type="text" class="roomType_<?php echo $j;?>_<?php echo $roomCount8;?>" name="roomType_<?php echo $j;?>_8_<?php echo $roomCount8;?>" value="<?php echo $hotelRmRate; ?>">
                                                   <input type="hidden" class="roomTypeId_<?php echo $j;?>_<?php echo $roomCount8;?>" name="roomTypeId_<?php echo $j;?>_8_<?php echo $roomCount8;?>" value="<?php echo $val8['id'];?>">
                                                   <input type="hidden" class="hotelRateId_<?php echo $j;?>_<?php echo $roomCount8;?>" name="hotelRateId_<?php echo $j;?>_8_<?php echo $roomCount8;?>" value="<?php echo $hotelRmRateId; ?>"/>
                                                </td>
                                                <?php
                                                   }
                                                   
                                                   ?>
                                             </tr>
                                             <?php
                                                if($item >= 1){
                                                ?>
                                             <tr>
                                                <td colspan="15">
                                                   <!-- <div class="col-md-12 text-right">
                                                      <div class="form-group"><label for="last">Remove Table</label>  <a class="delete" rel="<?php echo $item; ?>" href="javascript:void(0)" onclick="remove_rate(<?php echo $item; ?>,<?php echo $dateId; ?>)"><i class="fa fa-fw fa-times-circle-o" style="color:red;"></i></a></div>
                                                   </div> -->
                                                </td>
                                             </tr>
                                             <?php } ?>
                                          </tbody>
                                       </table>
                                       <div class="footer" style="padding:10px 0 17px 0;">
                                          <input type="hidden" id="item_count9" name="item_count9" value="<?php if($countDateRates>0){echo $countDateRates;}else{echo 1;}?>">
                                          <input type="hidden" name="editHotelId" id="editid" value="<?php echo $hotel_id; ?>"/>
                                        <!--   <button type="submit" class="btn btn-md btn-warning submit_rate_form1" name="hotel_rate1_<?php echo $j; ?>" id="submit" rel="<?php echo $j;?>">Update</button> -->

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
               <a href="<?php echo base_url(ADMIN_URL) ?>/viewHotel" class="btn btn-md btn-warning" name="bottom">Submit</a>
               <?php }  
                  ?>
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
<div class = "modal" id = "addRoomAmen" tabindex = "-1" role = "dialog" 
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
            <button type = "button" id="addsubmodalRoomAmen" name="submodalRoomAmen" class = "btn btn-primary">
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
<div class = "modal" id = "hotelAmen" tabindex = "-1" role = "dialog" 
   aria-labelledby = "myModalLabel" aria-hidden = "true">
   <div class = "modal-dialog">
      <div class = "modal-content">
         <div class = "modal-header">
            <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">
            &times;
            </button>
            <h4 class = "modal-title" id = "myModalLabel">
               Hotel Amenities & Facilities
            </h4>
         </div>
         <div class ="modal-body">
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
         <div class = "modal-footer">
            <button type = "button" class = "btn btn-default" data-dismiss = "modal">
            Close
            </button>
            <button type = "button" id="submodalAmen" name="submodalAmen" class = "btn btn-primary">
            Select
            </button>
         </div>
      </div>
      <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<div id="qDetail" class="modal fade" role="dialog">
  <div class="modal-dialog" style="width: 500px;">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" id="modalHead">Room Details</h4>
      </div>
      <form id="caption_form" role="form" method="POST">
      <div class="modal-body" id="mdetail">
      </div>
        </form>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div> 