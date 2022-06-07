<?php
    error_reporting(0);
    $arrRoomAmen=array('Tea Kettle','Mini Bar','Wi fi','Mini Fridge','Iron & Iron Board','Locker','LED TV','Air Conditioner','Hair Dryer','Bath Tub','Mineral Water','Personal Butler','Fruit Basket','Attached Living Room','Music System','Breakfast','Lunch','Dinner','Evening Tea/Coffee','Welcome Drinks (non Alcoholic)','Cocktail Happy Hours','Flowers on Arrival','Champagne Bottle','Wine Bottle','Chocolates on arrival');
   
    $arrAmenties=array('Board Room','Confrence Room','Ball Room','Business Center','Garden','Swimming Pool','Restaurant','Bar','Discotheque','Casino','Amphitheatre','Airport Transfers/Cab Facilities','Lift/Elevator','Front Desk','Laundry Services','Power Backup','Cloak Room','Welcome Drinks','Shuttle Service to nearby Market','Rest Room for Drivers','Travel Desk','Banquet Facilities','Kids Play Zone','Lobby','Spa','Saloon','Car Parking','Bus Parking','Gym','Jacuzzi','Coffee Shop');
   
if($action == 'edit') {

}
?>
<div class="col-md-11" id="contentCol">
<div id="wrapper">
<div id="layout-static">
<div class="static-content-wrapper">
<div class="static-content">
<div class="page-content">
<ol class="breadcrumb">
   <li><a href="<?php echo base_url(PARTNER) ?>/dashboard">Home</a></li>
   <li><a href="#">Add Hotel</a></li>
</ol>
<div class="page-heading">
   <h1>Add Hotel</h1>
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
            </ul>
            <div class="tab-content margin-tops">
               <div class="tab-pane fade <?php if($tab == 1){ echo "active in";}?>" id="tab_default_1">
                  <div class="col-sm-12" style="margin-top:20px;">
                     <form id="form_registration" action="<?php echo base_url(PARTNER) ?>/addNewHotel" method="POST" class="form-horizontal" enctype="multipart/form-data">
                        <fieldset>
                           <input type="hidden" name="type" value="AddHotelDetails">
                            <div class="col-md-3">
                                <label>Country <span id="countryerrormsg" style="color: red;">*</span></label>
                                <select class="form-control" data-required="true" name="country_id" id="country_id" required="true">
                                    <option value="">--Select--</option>
                                    <?php if(!empty($countries)) {
                                       foreach($countries as $country) { ?>
                                    <option value="<?php echo $country->id; ?>"><?php echo $country->country_name; ?></option>
                                    <?php }
                                       } ?>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label>State <span id="stateerrormsg" style="color: red;">*</span></label>
                                <select class="form-control" data-required="true" name="state_id" id="state_id" required="true">
                                    <option value="">--Select--</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label>City <span id="cityerrormsg" style="color: red;">*</span></label>
                                <select class="form-control" data-required="true" name="city_id" id="city_id" required="true">
                                    <option value="">--Select--</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label>Zip <span id="zipcodeerrormsg" style="color:red;">*</span></label>
                                <input class="form-control" data-required="true" id="zip" name="zip" type="number" min="6" placeholder="Pin Code" required/>
                            </div>
                           <div class="form-group">
                              <div class="col-md-12">
                                <label>Hotel Name <span id="hotelerrormsg" style="color: red;">*</span></label>
                                <!--<label>Hotel Name <span style="color: red;">*</span></label>-->
                              </div>
                              <div class="col-md-12">
                                 <input class="form-control" data-required="true" id="hotel_name" name="hotel_name" type="text" placeholder="Hotel Name" required/>
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
                                       <h5>Still want to enter your data?</h5>
                                       <button type='button' id='proceed' onclick='proceed()' class='btn btn-sm btn-success'>Proceed</button>&nbsp;<button type='button' id='discard' onclick='discard()' class='btn btn-sm btn-warning'>Discard</button>
                                   </div>
                                </div>
                            </div>
                            <div id="div1tohide" style="display:none;">
                           <div class="form-group">
                              <div class="col-md-12">
                                 <label>Address <span style="color: red;">*</span></label>
                              </div>
                              <div class="col-md-6">
                                 <input class="form-control" data-required="true" id="address_line_1" name="address_line_1" type="text" placeholder="Address" required/>
                              </div>
                              <div class="col-md-6">
                                 <input class="form-control" data-required="true" id="address_line_2" name="address_line_2" type="text" placeholder="Landmark / Area" required/>
                              </div>
                              
                           </div>
                           <div class="form-group">
                              <div class="col-md-12">
                                 <label>Hotel Contact Nos. <span style="color: red;">*</span></label>
                              </div>
                              <div class="col-md-4">
                                 <input class="form-control" data-required="true" id="hotel_mobile_no" name="hotel_mobile_no" type="number" placeholder="Hotel Mobile" min="10" required/>
                              </div>
                              <div class="col-md-4">
                                 <input class="form-control" id="hotel_alternative_no" name="hotel_alternative_no" type="number" placeholder="Hotel Alternative Number (If Any)"/>
                              </div>
                              <div class="col-md-4">
                                 <input class="form-control" id="hotel_landline" name="hotel_landline" type="number" placeholder="Hotel Landline (If Any)"/>
                              </div>
                           </div>
                           <div class="form-group">
                              <div class="col-md-12">
                                 <label>Hotel Concerned Person Details.</label>
                              </div>
                              <div class="col-md-3">
                                 <input class="form-control" data-required="true" id="person_name"  name="person_name" type="text" placeholder="Full Name" min="10" />
                              </div>
                              <div class="col-md-3">
                                 <input class="form-control" id="person_email"  name="person_email" type="email" placeholder="Email"/>
                              </div>
                              <div class="col-md-3">
                                 <input class="form-control" id="person_mobile_no"  name="person_mobile_no" type="number" placeholder="Person Mobile No"/>
                              </div>
                              <div class="col-md-3">
                                 <input class="form-control" id="person_alternative_no"  name="person_alternative_no" type="number" placeholder="Alternative No."/>
                              </div>
                           </div>
                           <!--<div class="form-group">-->
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
                           <!--<div class="form-group">-->
                           <!--   <div class="col-md-4">-->
                           <!--      <label>Hotel Type <span style="color: red;">*</span></label>-->
                           <!--      <select class="form-control" name="hotel_type" id="hotel_type" required="true">-->
                           <!--         <option value="">--Select Hotel Type--</option>-->
                           <!--         <option>Hotel</option>-->
                           <!--         <option>Resort</option>-->
                           <!--         <option>Motel</option>-->
                           <!--         <option>BnB</option>-->
                           <!--         <option>Homestay</option>-->
                           <!--         <option>Tent</option>-->
                           <!--         <option>Service Apartment</option>-->
                           <!--         <option>Bungalow</option>-->
                           <!--         <option>Lodge</option>-->
                           <!--         <option>Guest House</option>-->
                           <!--         <option>Hostel</option>-->
                           <!--         <option>Cottage</option>-->
                           <!--         <option>Houseboat</option>-->
                           <!--         <option>Villa</option>-->
                           <!--         <option>Palace</option>-->
                           <!--         <option>Beach Hut</option>-->
                           <!--         <option>Farm</option>-->
                           <!--      </select>-->
                           <!--   </div>-->
                           <!--   <div class="col-md-4">-->
                           <!--      <label>Base Currency <span style="color: red;">*</span></label>-->
                           <!--      <select class="form-control" name="hotel_currency" id="hotel_currency" required="true">-->
                           <!--         <option value="">--Select Hotel Currency--</option>-->
                           <!--         <option>USD </option>-->
                           <!--         <option>INR </option>-->
                           <!--         <option>EUR </option>-->
                           <!--         <option>JPY </option>-->
                           <!--         <option>GBP</option>-->
                           <!--         <option>AUD</option>-->
                           <!--         <option>CHF</option>-->
                           <!--         <option>CAD</option>-->
                           <!--         <option>MXN</option>-->
                           <!--         <option>CNY</option>-->
                           <!--         <option>NZD</option>-->
                           <!--         <option>SEK</option>-->
                           <!--         <option>RUB</option>-->
                           <!--         <option>HKD</option>-->
                           <!--      </select>-->
                           <!--   </div>-->
                           <!--   <div class="col-md-4">-->
                           <!--      <label>Hotel Star Rating <span style="color: red;">*</span></label>-->
                           <!--      <select class="form-control" name="hotel_star" id="hotel_star" required="true">-->
                           <!--         <option value="">--No Star--</option>-->
                           <!--         <option>1</option>-->
                           <!--         <option>2</option>-->
                           <!--         <option>3</option>-->
                           <!--         <option>4</option>-->
                           <!--         <option>5</option>-->
                           <!--      </select>-->
                           <!--   </div>-->
                           <!--</div>-->
                           <div class="form-group">
                              <div class="col-md-6">
                                 <label>Check in Time <span style="color: red;">*</span></label>
                                 <input type="text" id="check_in" name="check_in" value="12:00 PM" data-format="hh:mm A" class="form-control clockface-open" required="true">
                              </div>
                              <div class="col-md-6">
                                 <label>Check out Time <span style="color: red;">*</span></label>
                                 <input type="text" id="check_out" name="check_out" value="11:00 AM" data-format="hh:mm A" class="form-control clockface-open" required="true">
                              </div>
                           </div>
                           <!--<div class="form-group">-->
                           <!--   <data></data>-->
                           <!--   <div class="col-md-2" style="padding-top:15px;"><label>Amenity & Facility <span style="color: red;">*</span></label></div>-->
                           <!--   <div class="col-md-2" style="margin-bottom:5px;">-->
                           <!--      <input type="button" value="Hotel Amenity" class="btn btn-md btn-warning" onclick="hotel_amenity_modal();"/>-->
                           <!--   </div>-->
                           <!--   <div class="col-md-8">-->
                           <!--      <input class="form-control" data-required="true" id="hotel_amenity"  name="hotel_amenity" type="text" placeholder="Amenity & Facility" required/>-->
                           <!--   </div>-->
                           <!--</div>-->
                           <!--<div class="form-group">-->
                           <!--   <div class="col-md-12">-->
                           <!--      <label>Description</label>-->
                           <!--   </div>-->
                           <!--   <div class="col-md-12">-->
                           <!--      <input class="form-control"  data-required="true" id="hotel_description"  name="hotel_description" type="text" style="height:100px;">-->
                           <!--   </div>-->
                           <!--</div>-->
                           <div class="clearfix"></div>
                           <div class="form-group">
                              <div class="col-sm-2">
                                 <input type="submit" value="Save & Next" class="btn btn-md btn-warning" onClick=""/>
                              </div>
                           </div>
                           </div>
                        </fieldset>
                     </form>
                  </div>
               </div>
               <div class="tab-pane fade <?php if($tab == 2){ echo "active in";}?>" id="tab_default_2">
                  <div class="col-sm-12">
                     <form id="form_registration" action="<?php echo base_url(PARTNER) ?>/addNewHotel" method="POST" class="form-horizontal">
                        <input type="hidden" name="type" value="AddHotelBankingDetails">
                        <input type="hidden" name="hotel_id" value="<?php if(!empty($hotel_id)) { echo $hotel_id; } ?>">
                        <fieldset>
                           <div class="form-group">
                              <div class="col-md-12">
                                 <label>GST No.</label>
                              </div>
                              <div class="col-md-12">
                                 <input class="form-control" data-required="true" id="pan_no"  name="pan_no" type="text" placeholder="GST No."/>
                              </div>
                           </div>
                           <div class="form-group">
                              <div class="col-md-12">
                                 <label>Account No.</label>
                              </div>
                              <div class="col-md-12">
                                 <input class="form-control" data-required="true" id="acount_no"  name="acount_no" type="text" placeholder="Account No." />
                              </div>
                           </div>
                           <div class="form-group">
                              <div class="col-md-12">
                                 <label>Account Name</label>
                              </div>
                              <div class="col-md-12">
                                 <input class="form-control" data-required="true" id="acount_holder_name" name="acount_holder_name" type="text" placeholder="Account Holder Name"/>
                              </div>
                           </div>
                           <div class="form-group">
                              <div class="col-md-12">
                                 <label>Bank</label>
                              </div>
                              <div class="col-md-12">
                                 <input class="form-control" data-required="true" id="bank"  name="bank" type="text" placeholder="Bank"/>
                              </div>
                           </div>
                           <div class="form-group">
                              <div class="col-md-12">
                                 <label>Branch</label>
                              </div>
                              <div class="col-md-12">
                                 <input class="form-control" data-required="true" id="branch"  name="branch" type="text" placeholder="Branch"/>
                              </div>
                           </div>
                           <div class="form-group">
                              <div class="col-md-12">
                                 <label>IFSC </label>
                              </div>
                              <div class="col-md-12">
                                 <input class="form-control" data-required="true" id="ifsc"  name="ifsc" type="text" placeholder="IFSC"/>
                              </div>
                           </div>
                           <div class="clearfix"></div>
                           <div class="form-group">
                              <div class="col-sm-2">
                                 <input type="submit" value="Save & Next" class="btn btn-md btn-warning" onClick=""/>
                              </div>
                           </div>
                        </fieldset>
                     </form>
                  </div>
               </div>
               <div class="tab-pane fade <?php if($tab == 3){ echo "active in";}?>" id="tab_default_3">
                  <div class="col-sm-12">
                     <form id="form_registration" action="<?php echo base_url(PARTNER) ?>/addNewHotel" method="POST" class="form-horizontal" enctype="multipart/form-data">
                        <fieldset>
                           <input type="hidden" name="type" value="AddHotelDocuments">
                           <input type="hidden" name="hotel_id" value="<?php echo $hotel_id; ?>">
                           <div class="form-group">
                              <div class="col-md-12">
                                 <label>PAN Card</label>
                              </div>
                              <div class="col-md-6">
                                 <input class="form-control" type="file" class="custom-file-input" id="inputGroupFile01" name="pan_card" aria-describedby="inputGroupFileAddon01"/>
                              </div>
                           </div>
                           <div class="form-group">
                              <div class="col-md-12">
                                 <label>Contract</label>
                              </div>
                              <div class="col-md-6">
                                 <input class="form-control" type="file" class="custom-file-input" id="inputGroupFile01" name="contracts[]" aria-describedby="inputGroupFileAddon01" multiple="true" />
                              </div>
                           </div>
                           <div class="clearfix"></div>
                           <div class="form-group">
                              <div class="col-sm-2">
                                 <input type="submit" value="Save & Next" class="btn btn-md btn-warning" onClick=""/>
                              </div>
                           </div>
                        </fieldset>
                     </form>
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
<?php
    if($this->uri->segment(2) == 'addHotel') { ?>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/demo/pagejs/partner/addHotel.js"></script>
<?php
    }
?>
<script>
    //$(document).ready(function(){
    $(document).on("click", "#discard", function(event){
      //alert('Hello World');
      location.reload();
    });
       
    $(document).on("click", "#proceed", function(event){
        $("#hotelexistmessage").html('');
        $("#div1tohide").css("display","block");
    });
    
</script>