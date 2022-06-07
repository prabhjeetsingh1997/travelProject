<div class="col-md-11" id="contentCol">
<div id="wrapper">
<div id="layout-static">
<div class="static-content-wrapper">
<div class="static-content">
<div class="page-content" style="margin-top:;">
<ol class="breadcrumb">
   <li><a href="<?php echo base_url(PARTNER) ?>/dashboard">Home</a></li>
   <li><a href="#">Edit Tour Card</a></li>
</ol>
<div class="page-heading">
   <h1>Edit Tour Card</h1>
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
<div class="container-fluid">
<div class="panel panel-default">
    <div class="panel-heading">
        <h2>Edit Tour Card Forms</h2>
    </div>
  <div class="panel-body">
    <form class="grid-form" action="<?php echo base_url(PARTNER) ?>/updateTourCard" method="POST">
    <input type="hidden" name="tourcard_id" value="<?php echo $tourdetails->tcid; ?>">
      <fieldset>
        <legend>Personal Details</legend>

        <div class="row">
            
            <div class="col-md-3">
              <label>Tour Card No:</label>
              <input type="text" class="form-control" name="" id="trc_no" value="<?php echo "LiDTC".$tourdetails->tcid; ?>" readonly>
            </div>
             
            <div class="col-md-3">
              <label>Bkg Date</label>
              <input type="text" class="form-control" name="bkg_date" value="<?php echo $tourdetails->bkg_date; ?>" id="bkgdate" required="true" placeholder="Starting Date">
            </div>
             
            <div class="col-md-3">
              <label>Bkg. By</label>
              <input type="text" class="form-control" name="bkg_by" value="<?php echo $tourdetails->bkg_by; ?>" readonly>
              <input type="hidden" name="employee_id" value="<?php echo $tourdetails->employee_id; ?>">
              <input type="hidden" name="" id="prtnrAddr" value="<?php echo $this->global['state_id']; ?>">
            </div>
              
            <div class="col-md-3">
              <label>Bkg Type:</label>
              <select class="form-control" name="queryType" id="selpackage">
                <option value="select" selected>select</option>
                <option value="hotel" <?php if($tourdetails->queryType == 'hotel'){echo "selected";} ?>>hotel</option>
                <option value="package" <?php if($tourdetails->queryType == 'package'){echo "selected";} ?>>package</option>
                <option value="other" <?php if($tourdetails->queryType == 'other'){echo "selected";} ?>>other</option>
              </select>
            </div>
        </div>
            
        <div class="row">
            <div class="col-md-3">
              <label>Prefix Name:</label><br>
              <label><input type="radio" name="name_prefix[]" value="Mr." <?php if($tourdetails->name_prefix == 'Mr.'){ echo "checked";} ?>> Mr.</label> &nbsp;
              <label><input type="radio" name="name_prefix[]" value="Mrs." <?php if($tourdetails->name_prefix == 'Mrs.'){ echo "checked";} ?>> Mrs.</label> &nbsp;
              <label><input type="radio" name="name_prefix[]" value="Ms." <?php if($tourdetails->name_prefix == 'Ms.'){ echo "checked";} ?>> Ms.</label>
            </div>
             
            <div class="col-md-3">
              <label>Lead Pax Name:</label>
              <input type="text" class="form-control" name="pax_name" value="<?php echo $tourdetails->pax_name; ?>" required="true" placeholder="Enter Client Name">
            </div>
             
            <div class="col-md-2">
              <label>Arrival Date</label>
              <input type="text" class="form-control" name="arrival_date" value="<?php echo $tourdetails->arrival_date; ?>" required="true" id="startdate">
            </div>
             
            <div class="col-md-2">
              <label>Departure Date</label>
              <input type="text" class="form-control" name="departure_date" value="<?php echo $tourdetails->departure_date; ?>" required="true" id="enddate">
            </div>
             
            <div class="col-md-2">
              <label>Nights</label>
              <select class="form-control" name="nights" id="stayDuration">
				<option value="">Select</option>
				<option value="1" <?php if($tourdetails->nights == 1){echo "selected";} ?>>1</option>
				<option value="2" <?php if($tourdetails->nights == 2){echo "selected";} ?>>2</option>
				<option value="3" <?php if($tourdetails->nights == 3){echo "selected";} ?>>3</option>
				<option value="4" <?php if($tourdetails->nights == 4){echo "selected";} ?>>4</option>
				<option value="5" <?php if($tourdetails->nights == 5){echo "selected";} ?>>5</option>
				<option value="6" <?php if($tourdetails->nights == 6){echo "selected";} ?>>6</option>
				<option value="7" <?php if($tourdetails->nights == 7){echo "selected";} ?>>7</option>
				<option value="8" <?php if($tourdetails->nights == 8){echo "selected";} ?>>8</option>
				<option value="9" <?php if($tourdetails->nights == 9){echo "selected";} ?>>9</option>
				<option value="10" <?php if($tourdetails->nights == 10){echo "selected";} ?>>10</option>
				<option value="11" <?php if($tourdetails->nights == 11){echo "selected";} ?>>11</option>
				<option value="12" <?php if($tourdetails->nights == 12){echo "selected";} ?>>12</option>
				<option value="13" <?php if($tourdetails->nights == 13){echo "selected";} ?>>13</option>
				<option value="14" <?php if($tourdetails->nights == 14){echo "selected";} ?>>14</option>
				<option value="15" <?php if($tourdetails->nights == 15){echo "selected";} ?>>15</option>
				<option value="16" <?php if($tourdetails->nights == 16){echo "selected";} ?>>16</option>
				<option value="17" <?php if($tourdetails->nights == 17){echo "selected";} ?>>17</option>
			  </select>
            </div>
        </div>
         
        <div class="row" style="margin-top:10px;">
            <div class="col-md-3">
              
              <label>Nationality:</label>
              <select class="form-control" name="country" required="true">
                  <option value="">select</option>
                <?php if(!empty($countries)){
                    foreach ($countries as $country) { ?>
                     <option value="<?php echo $country->id;?>" <?php if ($country->id == $tourdetails->country) { echo "selected"; } ?>><?php echo $country->country_name;?></option>
                <?php }
                  } ?>
              </select>
            </div>
             
            <div class="col-md-3">
                <label>Party:</label>
                <input type="text"
                    placeholder="Enter Party"
                    class="form-control flexdatalist"
                    data-data='<?php echo json_encode($clientDetails);?>'
                    data-search-in='["client_name","client_number"]'
                    data-visible-properties='["client_name","client_number"]'
                    data-selection-required="true"
                    data-value-property='id'
                    data-min-length="2"
                    name='party' id="srchParty" value="<?php echo $tourdetails->party; ?>">
                    
                <?php foreach($clientDetails as $clntDetail) {?>
                <?php if($clntDetail->id == $tourdetails->party) {?>
                <input type="hidden" name="" id="clntAddr" value="<?php echo $clntDetail->state_id; ?>">
                <?php }?>
                <?php }?>
            </div>
             
            <div class="col-md-3">
              <label>File No:</label>
              <input type="text" class="form-control" name="file_no" value="<?php echo $tourdetails->file_no; ?>">
            </div>
             
            <div class="col-md-3">
		      <div data-field-span="1">
                <label>Invoice No:</label>
                <input type="text" class="form-control" name="invoice_no" value="<?php echo $tourdetails->invoice_no; ?>" readonly>
              </div>
            </div>
            <br>
            <br>
         
        <div id="ifother">
        <div class="row" style="margin-left:0px; margin-top:30px;">
            <div class="col-md-2">
              <label>No. of Adults:</label>
              <input type="text" class="form-control" name="adult" value="<?php echo $tourdetails->adult; ?>" placeholder="Enter No. Of Adults">
            </div>
             
            <div class="col-md-2">
              <label>No. of kids</label>
              <input type="text" class="form-control" name="children" value="<?php echo $tourdetails->children; ?>"  placeholder="Enter No. Of Kids">
            </div>
             
            <div class="col-md-3">
              <label>Kids Age</label>
              <input type="text" class="form-control" name="child_age" value="<?php echo $tourdetails->child_age; ?>" placeholder="Enter Kids Age">
            </div>
             
        </div>
         
         <div class="row" style="margin-top:10px;">
           <div class="col-md-12">
               <div class="table-responsive">
                   <table class="table table-bordered table-striped" id="tourcardtable" cellspacing="0">
                      <thead style="background-color: cadetblue;">
                        <tr>
                          <th class="col-lg-2">Date</th>
                          <th class="col-lg-2">From City</th>
                          <th class="col-lg-2">To City</th>
                          <th class="col-lg-1">By</th>
                          <th class="col-lg-2">No</th>
                          <th class="col-lg-2">Start Time</th>
                          <th class="col-lg-2">End Time</th>
                          <th class="col-lg-2">City</th>
                          <th class="col-lg-2">Hotel</th>
                          <th class="col-lg-2">Check In</th>
                          <th class="col-lg-2">Check Out</th>
                          <th class="col-lg-2">Vendor</th>
                          <th class="col-lg-1">Cost</th>
                          <th class="col-lg-1"></th>    
                          <!-- <th class="col-lg-1"><a id="addrow" name="addrow" style="font-size:21px; cursor:pointer color: #0d0d0d;"><i class="fa fa-plus-circle" aria-hidden="true"></i></a>
                          </th>     -->
                        </tr>
                      </thead> 
                     
                      <tbody id="tourcardtablebody">
                        <?php 
                         if(!empty($tourdaysdetails)) {

                          $k = 0;
                          $i = 1;
                         foreach($tourdaysdetails as $tourdays) { ?>
                          <tr>
                              <input type="hidden" name="tourdaysid[]" value="<?php echo $tourdays->id; ?>">
                              <input type="hidden" name="tourcard_id" value="<?php echo $tourdetails->tcid; ?>">
                              
                              <td style="display:none;">
                              </td>
                              <td>
                                  <?php if($tourdays->transport_voucher == 0 && $tourdays->hotel_voucher == 1) {?>
                                     <input type="text" style="width:150px;" class="form-control" name="start_date[]" value="<?php echo $tourdays->start_date; ?>" id="first_date_<?php echo $i ?>" onchange="start_date_check(<?php echo $i ?>)" required="true" readonly>
                                  <?php }else if($tourdays->transport_voucher == 1 && $tourdays->hotel_voucher == 0) {?>
                                     <input type="text" style="width:150px;" class="form-control" name="start_date[]" value="<?php echo $tourdays->start_date; ?>" id="first_date_<?php echo $i ?>" onchange="start_date_check(<?php echo $i ?>)" required="true" readonly>
                                  <?php }else if($tourdays->transport_voucher == 1 && $tourdays->hotel_voucher == 1) {?>
                                     <input type="text" style="width:150px;" class="form-control" name="start_date[]" value="<?php echo $tourdays->start_date; ?>" id="first_date_<?php echo $i ?>" onchange="start_date_check(<?php echo $i ?>)" required="true" readonly>
                                  <?php }else {?>
                                     <input type="text" style="width:150px;" class="form-control" name="start_date[]" value="<?php echo $tourdays->start_date; ?>" id="first_date_<?php echo $i ?>" onchange="start_date_check(<?php echo $i ?>)" required="true">
                                  <?php }?>
                                  
                              </td>
                              <td>
                                  
                                  <?php if($tourdays->transport_voucher == 0 && $tourdays->hotel_voucher == 1) {?>
                                     <?php foreach($cities as $city) {?>
                                      <?php if($tourdays->from_city == $city->id) {?>
                                      <input type="text" value="<?php echo $city->city_name;?>" class="form-control" style="width:auto;" readonly>
                                      <input type="hidden" name="from_city[]" id="fromcity_<?php echo $i;?>" value="<?php echo $tourdays->from_city;?>">
                                      <?php } }?>
                                     
                                  
                                  <?php }else if($tourdays->transport_voucher == 1 && $tourdays->hotel_voucher == 0) {?>
                                      <?php foreach($cities as $city) {?>
                                      <?php if($tourdays->from_city == $city->id) {?>
                                      <input type="text" value="<?php echo $city->city_name;?>" class="form-control" style="width:auto;" readonly>
                                      <input type="hidden" name="from_city[]" id="fromcity_<?php echo $i;?>" value="<?php echo $tourdays->from_city;?>">
                                      <?php } }?>
                                  <?php }else if($tourdays->transport_voucher == 1 && $tourdays->hotel_voucher == 1) {?>
                                      <?php foreach($cities as $city) {?>
                                      <?php if($tourdays->from_city == $city->id) {?>
                                      <input type="text" value="<?php echo $city->city_name;?>" class="form-control" style="width:auto;" readonly>
                                      <input type="hidden" name="from_city[]" id="fromcity_<?php echo $i;?>" value="<?php echo $tourdays->from_city;?>">
                                      <?php } }?>
                                  <?php }else {?>
                                      <input type="text"
                                         placeholder="enter city"
                                         class="form-control flexdatalist"
                                         data-data='<?php echo json_encode($cities);?>'
                                         data-search-in='city_name'
                                         data-visible-properties='["city_name","state_name","country_name"]'
                                         data-selection-required="true"
                                         data-value-property='id'
                                         data-min-length="2"
                                         name='from_city[]' id="fromcity_<?php echo $i; ?>" value="<?php echo $tourdays->from_city; ?>">
                                 
                                  <?php }?>
                                  
                              </td>
                              <td>
                                  
                                  <?php if($tourdays->transport_voucher == 0 && $tourdays->hotel_voucher == 1) {?>
                                      <?php foreach($cities as $city) {?>
                                      <?php if($tourdays->to_city == $city->id) {?>
                                      <input type="text" value="<?php echo $city->city_name;?>" class="form-control" style="width:auto;" readonly>
                                      <input type="hidden" name="to_city[]" id="getcity<?php echo $i;?>" onchange="setcity(<?php echo $i ?>)" value="<?php echo $tourdays->to_city;?>">
                                      <?php } }?>
                                    
                                  <?php }else if($tourdays->transport_voucher == 1 && $tourdays->hotel_voucher == 0) {?>
                                      <?php foreach($cities as $city) {?>
                                      <?php if($tourdays->to_city == $city->id) {?>
                                      <input type="text" value="<?php echo $city->city_name;?>" class="form-control" style="width:auto;" readonly>
                                      <input type="hidden" name="to_city[]" id="getcity<?php echo $i;?>" onchange="setcity(<?php echo $i ?>)" value="<?php echo $tourdays->to_city;?>">
                                      <?php } }?>
                                  <?php }else if($tourdays->transport_voucher == 1 && $tourdays->hotel_voucher == 1) {?>
                                      <?php foreach($cities as $city) {?>
                                      <?php if($tourdays->to_city == $city->id) {?>
                                      <input type="text" value="<?php echo $city->city_name;?>" class="form-control" style="width:auto;" readonly>
                                      <input type="hidden" name="to_city[]" id="getcity<?php echo $i;?>" onchange="setcity(<?php echo $i ?>)" value="<?php echo $tourdays->to_city;?>">
                                      <?php } }?>
                                  <?php }else {?>
                                    <input type="text"
                                       placeholder="enter city"
                                       class="form-control flexdatalist"
                                       data-data='<?php echo json_encode($cities);?>'
                                       data-search-in='city_name'
                                       data-visible-properties='["city_name","state_name","country_name"]'
                                       data-selection-required="true"
                                       data-value-property='id'
                                       data-min-length="2"
                                       name='to_city[]' id="getcity<?php echo $i; ?>" value="<?php echo $tourdays->to_city;?>" onchange="setcity(<?php echo $i ?>)">
                                  <?php }?>
                                  
                                  
                              </td>
                              <td>
                                  <select class="form-control" style="width:100px;" name="travel_by[]" id="travel_by">
                                  <option value="">select</option>
                                  <option value="air"<?php if($tourdays->travel_by == 'air'){echo "selected";} ?>>Air</option>
                                  <option value="train"<?php if($tourdays->travel_by == 'train'){echo "selected";} ?>>Train</option>
                                  <option value="cab"<?php if($tourdays->travel_by == 'cab'){echo "selected";} ?>>Cab</option>
                                  <option value="bus"<?php if($tourdays->travel_by == 'bus'){echo "selected";} ?>>Bus</option>
                                  <option value="cruise"<?php if($tourdays->travel_by == 'cuise'){echo "selected";} ?>>Cruise</option>
                                  </select> 

                              </td>
                              <td>
                                  <input type="text" style="width:130px;" class="form-control" name="write_box[]" id="write_box" value="<?php echo $tourdays->write_box; ?>">
                                  
                              </td>
                              <td>
                                  <!-- <div class="bootstrap-timepicker"> -->
										
                                 <div class="form-group">
                                   <div class="input-group bootstrap-timepicker">
                                   <input autocomplete="off"  type="text" name="start_time[]" id="checkInTime_1" class="form-control timepicker htimepicker checkInTime1" value="<?php echo $tourdays->start_time; ?>" style="width:80px;"/>
                                   <div class="input-group-addon">
                                   <i class="fa fa-clock-o"></i>
                                  </div>
                                  </div>
                                  </div>
                                  <!-- </div> -->
                              </td>
                              <td>
                                  <!-- <div class="bootstrap-timepicker"> -->
                                  <div class="form-group">
                                  <div class="input-group bootstrap-timepicker">
                                  <input autocomplete="off" type="text" name="end_time[]" id="checkOutTime_1" class="form-control timepicker htimepicker checkOutTime1" value="<?php echo $tourdays->end_time; ?>"  style="width:80px;"/>
                                   <div class="input-group-addon">
                                   <i class="fa fa-clock-o"></i>
                                    </div>
                                  </div>
                                  </div>
                                  <!-- </div> -->
                                  
                              </td>
                              <td>
                                  
                                  <?php if($tourdays->transport_voucher == 0 && $tourdays->hotel_voucher == 1) { ?>
                                      <?php foreach($cities as $city) {?>
                                      <?php if($tourdays->city == $city->id) {?>
                                      <input type="text" value="<?php echo $city->city_name;?>" class="form-control" style="width:auto;" readonly>
                                      <input type="hidden" name="city[]" id="to_city_<?php echo $i;?>" onchange="cityhotel(<?php echo $i ?>)" value="<?php echo $city->id;?>">
                                      <?php } }?>
                                       
                                  <?php }else if($tourdays->transport_voucher == 1 && $tourdays->hotel_voucher == 0) {?>
                                       <?php foreach($cities as $city) {?>
                                       <?php if($tourdays->city == $city->id) {?>
                                       <input type="text" value="<?php echo $city->city_name;?>" class="form-control" style="width:auto;" readonly>
                                       <input type="hidden" name="city[]" id="to_city_<?php echo $i;?>" onchange="cityhotel(<?php echo $i ?>)" value="<?php echo $city->id;?>">
                                       <?php } }?>
                                        
                                  <?php }else {?>
                                        <input type="text"
                                        placeholder="enter city"
                                        class="form-control flexdatalist"
                                        data-data='<?php echo json_encode($cities);?>'
                                        data-search-in='city_name'
                                        data-visible-properties='["city_name","state_name","country_name"]'
                                        data-selection-required="true"
                                        data-value-property='id'
                                        data-min-length='2'
                                        name='city[]' id="to_city_<?php echo $i;?>" onchange="cityhotel(<?php echo $i ?>)" value="<?php echo $tourdays->city;?>">
                                        
                                  <?php }?>
                                  
                                  <?php if($tourdays->transport_voucher == 0) { ?>
                                        <a rel="<?php echo $tourdays->id; ?>" data-toggle="tooltip" title="make Transport Voucher" class="makeTransportvoucher" style="font-size:14px;" rowno="<?php echo $i;?>">T.P Voucher</a>
                                        <?php } if($tourdays->transport_voucher == 1) { ?>
                                        <a rel="<?php echo $tourdays->id; ?>" data-toggle="tooltip" title="edit Transport Voucher" class="editTransportvoucher" style="font-size:14px; color:green;">Edit T.P.V</a>
                                        <?php if($roleId == ROLE_ADMIN) {?>
                                        <a href="<?php echo base_url(PARTNER)?>/deleteTransportVoucher/<?php echo $tourdays->id; ?>" rel="" data-toggle="tooltip" title="delete voucher" class="" style="font-size:14px; color:red;"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                        <?php }?>
                                        <a href="<?php echo base_url(PARTNER)?>/transportvoucherpdf/<?php echo $tourdays->id; ?>" target="_blank" data-toggle="tooltip" title="download voucher" style="font-size:14px; color:green;"><i class="fa fa-print" aria-hidden="true"></i></a>
                                        <?php }?>
                                    
                              </td>
                              <td>
                                  
                                        <select class="form-control" style="width:142px;" name="hotel_filter[]" id="gethotel<?php echo $i?>" class="gethotel1">
                                            <?php if($tourdays->transport_voucher == 0 && $tourdays->hotel_voucher == 1){?>
                                             <option value="" disabled>select hotel</option>
                                            <?php if(!empty($partnerhotel)){
                                                 foreach($partnerhotel as $hotels){
                                                if($tourdays->city == $hotels->city_id) {?>
                                                <option value="<?php echo $hotels->hotel_id; ?>" <?php if($hotels->hotel_id == $tourdays->hotel_filter) { echo "selected"; }else{ echo "disabled"; }?> ><?php echo $hotels->hotel_name;?></option>
                                            <?php }
                                              }?>
                                            <?php } ?>
                                            <?php }else if($tourdays->transport_voucher == 1 && $tourdays->hotel_voucher == 0) {?>
                                            <option value="" >select hotel</option>
                                            <?php if(!empty($partnerhotel)){
                                              foreach($partnerhotel as $hotels){
                                                if($tourdays->city == $hotels->city_id) {?>
                                                <option value="<?php echo $hotels->hotel_id; ?>" disabled><?php echo $hotels->hotel_name;?></option>
                                            <?php }
                                              }?>
                                            <?php } ?>
                                            <?php }else {?>
                                            <option value="">select hotel</option>
                                            <?php if(!empty($partnerhotel)){
                                              foreach($partnerhotel as $hotels){
                                                if($tourdays->city == $hotels->city_id) {?>
                                                <option value="<?php echo $hotels->hotel_id; ?>" <?php if($hotels->hotel_id == $tourdays->hotel_filter) { echo "selected"; }?> ><?php echo $hotels->hotel_name;?></option>
                                            <?php }
                                              }?>
                                            <?php } ?>
                                            <?php }?>
                                      
                                        </select>
                                  <?php //}?>
 
                                  <?php //if($tourdays->transport_voucher == 1) {?>
                                  <?php //}else {?>
                                  <?php if($tourdays->hotel_filter > 0) { ?>
                                  <?php if($tourdays->hotel_voucher == 0) { ?>
                                  <a rel="<?php echo $tourdays->id; ?>" data-toggle="tooltip" title="make voucher" class="makehotelvoucher" style="font-size:14px;">voucher</a>
                                  <?php } else { ?>
                                  <a rel="<?php echo $tourdays->id; ?>" data-toggle="tooltip" title="edit voucher" class="edithotelvoucher" style="font-size:14px; color:green;">edit voucher</a>
                                  <?php if($roleId == ROLE_ADMIN) {?>
                                  <a href="<?php echo base_url(PARTNER)?>/deleteHotelVoucher/<?php echo $tourdays->id; ?>" rel="" data-toggle="tooltip" title="delete voucher" class="" style="font-size:14px; color:red;"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                  <?php }?>
                                  <a href="<?php echo base_url(PARTNER)?>/getHotelVoucher/<?php echo $tourdays->id; ?>" target="_blank" data-toggle="tooltip" title="download voucher" style="font-size:14px; color:green;"><i class="fa fa-print" aria-hidden="true"></i></a>
                                  <?php }        
                                  } ?>
                                  <?php //}?>

                              </td>
                              <td>
                                  
                                  <?php if($tourdays->transport_voucher == 0 && $tourdays->hotel_voucher == 1) {?>
                                     <input type="text" style="width:150px;" class="form-control" name="check_in[]" id="check_in_<?php echo $i; ?>" value="<?php echo $tourdays->check_in;?>" readonly>
                                  <?php }else if($tourdays->transport_voucher == 1 && $tourdays->hotel_voucher == 0) {?>
                                     <input type="text" style="width:150px;" class="form-control" name="check_in[]" id="check_in_<?php echo $i; ?>" value="<?php echo $tourdays->check_in;?>" readonly>
                                  <?php }else if($tourdays->transport_voucher == 1 && $tourdays->hotel_voucher == 1) {?>
                                     <input type="text" style="width:150px;" class="form-control" name="check_in[]" id="check_in_<?php echo $i; ?>" value="<?php echo $tourdays->check_in;?>" readonly>
                                  <?php }else {?>
                                     <input type="text" style="width:150px;" class="form-control" name="check_in[]" id="check_in_<?php echo $i; ?>" value="<?php echo $tourdays->check_in;?>">
                                  <?php }?>
                              </td>
                              <td>
                                  <?php if($tourdays->transport_voucher == 0 && $tourdays->hotel_voucher == 1) {?>
                                      <input type="text" style="width:150px;" class="form-control" name="check_out[]" id="check_out_<?php echo $i; ?>" value="<?php echo $tourdays->check_out; ?>" onchange="dat_arr1()" readonly>
                                  <?php }else if($tourdays->transport_voucher == 1 && $tourdays->hotel_voucher == 0) {?>
                                      <input type="text" style="width:150px;" class="form-control" name="check_out[]" id="check_out_<?php echo $i; ?>" value="<?php echo $tourdays->check_out; ?>" onchange="dat_arr1()" readonly>
                                  <?php }else if($tourdays->transport_voucher == 1 && $tourdays->hotel_voucher == 1) {?>
                                      <input type="text" style="width:150px;" class="form-control" name="check_out[]" id="check_out_<?php echo $i; ?>" value="<?php echo $tourdays->check_out; ?>" onchange="dat_arr1()" readonly>
                                  <?php }else {?>
                                      <input type="text" style="width:150px;" class="form-control" name="check_out[]" id="check_out_<?php echo $i; ?>" value="<?php echo $tourdays->check_out; ?>" onchange="dat_arr1()">
                                  <?php }?>
                                  
                              </td>
                              <td>
                                  <?php if($tourdays->transport_voucher == 0 && $tourdays->hotel_voucher == 1) {?>
                                    <select id="vendorlist<?php echo $i;?>" class="form-control" style="width:150px;" name="vendor_name[]">
                                        <option value="" disabled>select</option>
                                        <?php $vendorname = preg_replace('/[0-9]+/', '', $tourdays->vendor_name); ?>
                                        <?php if(!empty($vendors)){
                                         foreach ($vendors as $vendor) { ?>
                                          <option value="<?php echo "VND".$vendor->vendorId?>" <?php if($vendorname == "VND") { if($vendor->vendorId == ltrim($tourdays->vendor_name, 'VND')) { echo "selected"; }else{ echo "disabled"; } }else{ echo "disabled"; }?>><?php echo $vendor->company_name;?></option>
                                           <?php }
                                            } ?>
                                         <?php if(!empty($partnerhotel)){
                                         foreach ($partnerhotel as $hotels) { ?>
                                          <option value="<?php echo "HTL".$hotels->hotel_id?>" <?php if($vendorname == "HTL") { if($hotels->hotel_id == ltrim($tourdays->vendor_name, 'HTL')) { echo "selected"; }else{ echo "disabled"; } }else{ echo "disabled"; }?>><?php echo $hotels->hotel_name;?></option>
                                           <?php }
                                            } ?>
                                    </select>
                                  <?php }else if($tourdays->transport_voucher == 1 && $tourdays->hotel_voucher == 0) {?>
                                    <select id="vendorlist<?php echo $i;?>" class="form-control" style="width:150px;" name="vendor_name[]">
                                        <option value="" disabled>select</option>
                                        <?php $vendorname = preg_replace('/[0-9]+/', '', $tourdays->vendor_name); ?>
                                        <?php if(!empty($vendors)){
                                         foreach ($vendors as $vendor) { ?>
                                          <option value="<?php echo "VND".$vendor->vendorId?>" <?php if($vendorname == "VND") { if($vendor->vendorId == ltrim($tourdays->vendor_name, 'VND')) { echo "selected"; }else{ echo "disabled"; } }else{ echo "disabled"; }?>><?php echo $vendor->company_name;?></option>
                                           <?php }
                                            } ?>
                                         <?php if(!empty($partnerhotel)){
                                         foreach ($partnerhotel as $hotels) { ?>
                                          <option value="<?php echo "HTL".$hotels->hotel_id?>" <?php if($vendorname == "HTL") { if($hotels->hotel_id == ltrim($tourdays->vendor_name, 'HTL')) { echo "selected"; }else{ echo "disabled"; } }else{ echo "disabled"; }?>><?php echo $hotels->hotel_name;?></option>
                                           <?php }
                                            } ?>
                                    </select>
                                  <?php }else if($tourdays->transport_voucher == 1 && $tourdays->hotel_voucher == 1) {?>
                                    <select id="vendorlist<?php echo $i;?>" class="form-control" style="width:150px;" name="vendor_name[]">
                                        <option value="" disabled>select</option>
                                        <?php $vendorname = preg_replace('/[0-9]+/', '', $tourdays->vendor_name); ?>
                                        <?php if(!empty($vendors)){
                                         foreach ($vendors as $vendor) { ?>
                                          <option value="<?php echo "VND".$vendor->vendorId?>" <?php if($vendorname == "VND") { if($vendor->vendorId == ltrim($tourdays->vendor_name, 'VND')) { echo "selected"; }else{ echo "disabled"; } }else{ echo "disabled"; }?>><?php echo $vendor->company_name;?></option>
                                           <?php }
                                            } ?>
                                         <?php if(!empty($partnerhotel)){
                                         foreach ($partnerhotel as $hotels) { ?>
                                          <option value="<?php echo "HTL".$hotels->hotel_id?>" <?php if($vendorname == "HTL") { if($hotels->hotel_id == ltrim($tourdays->vendor_name, 'HTL')) { echo "selected"; }else{ echo "disabled"; } }else{ echo "disabled"; }?>><?php echo $hotels->hotel_name;?></option>
                                           <?php }
                                            } ?>
                                    </select>
                                  <?php }else {?>
                                    <select id="vendorlist<?php echo $i;?>" class="form-control" style="width:150px;" name="vendor_name[]">
                                        <option value="">select</option>
                                        <?php $vendorname = preg_replace('/[0-9]+/', '', $tourdays->vendor_name); ?>
                                        <?php if(!empty($vendors)){
                                        foreach ($vendors as $vendor) { ?>
                                         <option value="<?php echo "VND".$vendor->vendorId?>" <?php if($vendorname == "VND") { if($vendor->vendorId == ltrim($tourdays->vendor_name, 'VND')) { echo "selected"; } }?>><?php echo $vendor->company_name;?></option>
                                          <?php }
                                        } ?>
                                        <?php if(!empty($partnerhotel)){
                                        foreach ($partnerhotel as $hotels) { ?>
                                         <option value="<?php echo "HTL".$hotels->hotel_id?>" <?php if($vendorname == "HTL") { if($hotels->hotel_id == ltrim($tourdays->vendor_name, 'HTL')) { echo "selected"; } }?>><?php echo $hotels->hotel_name;?></option>
                                          <?php }
                                        } ?>
                                    </select>
                                  <?php }?>
                              </td>
                              <td>
                                  <?php if($tourdays->transport_voucher == 0 && $tourdays->hotel_voucher == 1) {?>
                                     <input type="text" style="width:100px;" class="form-control" name="cost[]" id="oc_cost1" onkeyup="calculate_other_price()" value="<?php echo $tourdays->cost; ?>" placeholder="Enter Cost" readonly>
                                  <?php }else if($tourdays->transport_voucher == 1 && $tourdays->hotel_voucher == 0) {?>
                                     <input type="text" style="width:100px;" class="form-control" name="cost[]" id="oc_cost1" onkeyup="calculate_other_price()" value="<?php echo $tourdays->cost; ?>" placeholder="Enter Cost" readonly>
                                  <?php }else if($tourdays->transport_voucher == 1 && $tourdays->hotel_voucher == 1) {?>
                                     <input type="text" style="width:100px;" class="form-control" name="cost[]" id="oc_cost1" onkeyup="calculate_other_price()" value="<?php echo $tourdays->cost; ?>" placeholder="Enter Cost" readonly>
                                  <?php }else {?>
                                     <input type="text" style="width:100px;" class="form-control" name="cost[]" id="oc_cost1" onkeyup="calculate_other_price()" value="<?php echo $tourdays->cost; ?>" placeholder="Enter Cost">
                                  <?php }?>
                              </td>
                              <td>
                                  <?php if($tourdays->transport_voucher == 0 && $tourdays->hotel_voucher == 1) {?>
                                  <?php }else if($tourdays->transport_voucher == 1 && $tourdays->hotel_voucher == 0) {?>
                                  <?php }else if($tourdays->transport_voucher == 1 && $tourdays->hotel_voucher == 1) {?>
                                  <?php }else {?>
                                         <a class="deletedays" id="delete" style="font-size: 21px;" href="<?php echo base_url(PARTNER) ?>/deleteTourCarddays/<?php echo $tourdays->id; ?>" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                  <?php }?>
                                  
                                  <a tabindex="0" style="cursor:pointer; font-size: 21px; color:green;" class="addnewrow"><i class="fa fa-plus-circle" aria-hidden="true"></i></a>
                              </td>
                             
                          </tr>
                        <?php
                        $k++; 
                        $i++; 
                           }   
                          } ?>
                            <input type="hidden" name="totaldays" value="<?php echo $k ?>" id="count_row">
                      </tbody>
                     
                   </table>
               </div>
           </div>
         </div>
         <!----------------------------------------------------------------------->
        <div class="row" style="margin-top:10px;" id="gstprcntselection">
            <div class="col-md-12">
                <?php if($tourdetails->gstinclorexcl == 'gstincluded') {?>
                <div class="col-md-9" id="gstinclcheked" style="">
                    <label class="" style="font-size: 18px;"><input type="radio" name="gstINCL[]" id="18onSC" value="18onsc" <?php if($tourdetails->gstincldat == '18onsc'){ echo "checked"; }?>> 18% On Service Charge </label>&nbsp;
                    <label class="" style="font-size: 18px;"><input type="radio" name="gstINCL[]" id="18onPC" value="18onpc" <?php if($tourdetails->gstincldat == '18onpc'){ echo "checked"; }?>> 18% On Package Cost </label>&nbsp;
                    <label class="" style="font-size: 18px;"><input type="radio" name="gstINCL[]" id="5onPC" value="5onpc" <?php if($tourdetails->gstincldat == '5onpc'){ echo "checked"; }?>> 5% On Package Cost </label>
                </div>
                <?php }else {?>
                <div class="col-md-9" id="gstinclcheked" style="display:none;">
                    <label class="" style="font-size: 18px;"><input type="radio" name="gstINCL[]" id="18onSC" value="18onsc" checked> 18% On Service Charge </label>&nbsp;
                    <label class="" style="font-size: 18px;"><input type="radio" name="gstINCL[]" id="18onPC" value="18onpc" > 18% On Package Cost </label>&nbsp;
                    <label class="" style="font-size: 18px;"><input type="radio" name="gstINCL[]" id="5onPC" value="5onpc" > 5% On Package Cost </label>
                </div>
                <?php }?>
                <?php if($tourdetails->gstinclorexcl == 'gstexcluded') {?>
                <div class="col-md-9" id="gstexclcheked" style="">
                    <label class="" style="font-size: 18px;"><input type="radio" name="gstEXCL[]" id="excl18onSC" value="18onsc" <?php if($tourdetails->gstexcldat == '18onsc'){ echo "checked"; }?> > 18% On Service Charge </label>&nbsp;
                    <label class="" style="font-size: 18px;"><input type="radio" name="gstEXCL[]" id="excl18onPC" value="18onpc" <?php if($tourdetails->gstexcldat == '18onpc'){ echo "checked"; }?> > 18% On Package Cost </label>&nbsp;
                    <label class="" style="font-size: 18px;"><input type="radio" name="gstEXCL[]" id="excl5onPC" value="5onpc" <?php if($tourdetails->gstexcldat == '5onpc'){ echo "checked"; }?> > 5% On Package Cost </label>
                </div>
                <?php }else {?>
                <div class="col-md-9" id="gstexclcheked" style="display:none;">
                    <label class="" style="font-size: 18px;"><input type="radio" name="gstEXCL[]" id="excl18onSC" value="18onsc" disabled> 18% On Service Charge </label>&nbsp;
                    <label class="" style="font-size: 18px;"><input type="radio" name="gstEXCL[]" id="excl18onPC" value="18onpc" disabled> 18% On Package Cost </label>&nbsp;
                    <label class="" style="font-size: 18px;"><input type="radio" name="gstEXCL[]" id="excl5onPC" value="5onpc" disabled> 5% On Package Cost </label>
                </div>
                <?php }?>
            </div>
        </div>
        <div class="row" style="margin-top:10px;">
            <div class="col-md-12">
                <div class="col-md-10">
                  <label style="float:right; font-size:18px;">OC :</label>
                </div>
                <div class="col-md-2">
                  <input type="text" class="form-control" id="oc_cost2" name="totalcost" value="<?php echo $tourdetails->totalcost;?>" readonly>
                </div>
            </div>
        </div>
        <div class="row" style="margin-top:5px;">
            <div class="col-md-12">
                <div class="col-md-10">
                  <label style="float:right; font-size:18px;">PC :</label>
                </div>
                <div class="col-md-2">
                  <input type="number" class="form-control" id="pc_cost" name="packagecost" value="<?php echo $tourdetails->packagecost; ?>">
                </div>
            </div>
        </div>
        <!------------------------------------------------>
        <div class="row" style="margin-top:5px;" id="gstselDiv">
            <div class="col-md-12">
                <div class="col-md-10">
                    <label style="float:right; font-size: 18px;"><input type="radio" name="gstinclorexcl[]" id="gstinclchkbx" value="gstincluded" <?php if($tourdetails->gstinclorexcl == 'gstincluded'){ echo "checked"; }?> > GST Included</label>
                </div>
                <div class="col-md-2">
                    <label style="font-size: 18px;"><input type="radio" name="gstinclorexcl[]" id="gstexclchkbx" value="gstexcluded" <?php if($tourdetails->gstinclorexcl == 'gstexcluded'){ echo "checked"; }?>> GST Excluded</label>
                </div>
            </div>
        </div>
        <!------------------------------------------------>
        <div class="row" style="margin-top:5px;" id="">
            <div class="col-md-12" id="cgstdiv">
                <div class="col-md-10">
                    <label style="float:right; font-size: 18px;">CGST:</label>
                </div>
                <div class="col-md-2">
                    <input type="text" class="form-control" name="cgsttot" id="nwCGST" value="<?php echo $tourdetails->cgsttot?>" readonly>
                </div>
            </div>
            <div class="col-md-12" id="sgstdiv" style="margin-top:5px;">
                <div class="col-md-10">
                    <label style="float:right; font-size: 18px;">SGST:</label>
                </div>
                <div class="col-md-2">
                    <input type="text" class="form-control" name="sgsttot" id="nwSGST" value="<?php echo $tourdetails->sgsttot?>" readonly>
                </div>
            </div>
            <div class="col-md-12" style="margin-top:5px;" id="igstdiv">
                <div class="col-md-10">
                    <label style="float:right; font-size: 18px;">IGST:</label>
                </div>
                <div class="col-md-2">
                    <input type="text" class="form-control" name="igsttot" id="nwIGST" value="<?php echo $tourdetails->igsttot?>" readonly>
                </div>
            </div>
            <div class="col-md-12" style="margin-top:5px;">
                <div class="col-md-10">
                    <label style="float:right; font-size: 18px;">Profit:</label>
                </div>
                <div class="col-md-2">
                    <input type="text" class="form-control" name="profit" id="nwProfit" value="<?php echo $tourdetails->profit?>" readonly>
                </div>
            </div>
        </div>
        <div class="row" style="margin-top:5px;" id="">
            <div class="col-md-12">
                <div class="col-md-10">
                    <label style="float:right; font-size: 18px;">Total PC:</label>
                </div>
                <div class="col-md-2">
                    <input type="text" class="form-control" name="totalpakcost" id="nwtotalPcCost" value="<?php echo $tourdetails->totalpakcost?>" readonly>
                </div>
            </div>
                 
        </div>
             <!------------------------------------------------>
      </fieldset>
      <div class="clearfix pt20">
        <?php //if($roleId == ROLE_EMPLOYEE && $emp_type == 2){?>
        <!--<div class="pull-left">-->
        <?php //if($tourdetails->performa_invoice == 0){?>
        <!--  <a rel="<?php //echo $tourdetails->tcid; ?>" data-toggle="tooltip" title="performa invoice" class="btn-warning btn addparticulars" style="font-size:14px;">Makeperformainvoice</a>-->
        <?php //} ?>
        <?php //if($tourdetails->performa_invoice == 1){?>
        <!--  <a rel="" data-toggle="tooltip" title="performa invoice" class="btn-warning btn editparticulars" style="font-size:14px;">Editperformainvoice</a>-->
        <!--  <a href="<?php //echo base_url(PARTNER)?>/performinvoice/<?php //echo $tourdetails->tcid; ?>" target="_blank" data-toggle="tooltip" title="performa invoice" class="btn-warning btn " style="font-size:14px;">PrintPerformaInvoice</a>          -->
        <?php //} ?>       
        <!-- <input type="button" class="btn-success btn" value="Invoice">-->
        <!--</div>-->
        <?php //}?>
        <?php //if($roleId == ROLE_ADMIN) {?>
        <!--<div class="pull-left">-->
        <?php //if($tourdetails->performa_invoice == 0){?>
        <!--  <a rel="<?php //echo $tourdetails->tcid; ?>" data-toggle="tooltip" title="Make performa invoice" class="btn-warning btn addparticulars" style="font-size:14px;">Makeperformainvoice</a>-->
        <?php //} ?>
        <?php //if($tourdetails->performa_invoice == 1){?>
        <!--  <a rel="<?php //echo $tourdetails->tcid; ?>" data-toggle="tooltip" title="Edit performa invoice" class="btn-warning btn editparticulars" style="font-size:14px;">Editperformainvoice</a>          -->
        <?php //} ?>       
        <!-- <input type="button" class="btn-success btn" value="Invoice">-->
        <!--</div>-->
        <?php //}?>

        <div class="pull-right">
            <button class="btn-primary btn">Update</button>
        </div>
      </div>
    </form>
  </div>
</div>
</div> <!-- .container-fluid -->

<!-- #page-content -->
</div>
<!--------->

<!--- Performa Modal---->

<div class="modal" id="addparticulars" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header" id="modalHead">
        <h4 class="modal-title text-center">Performa Invoice</h4>
        
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      
      <div class="modal-body" id="">
       <form method="POST" action="<?php echo base_url(PARTNER) ?>/makePerformaInvoice">
          <input type="hidden" name="tourcard_id" value="<?php echo $tourdetails->tcid; ?>">
          <input type="hidden" name="queryno" value="<?php echo $tourdetails->query_no;?>">
          <input type="hidden" name="employee_id" value="<?php echo $tourdetails->employee_id;?>">
          <input type="hidden" name="bkg_by" value="<?php echo $tourdetails->bkg_by;?>">

       <table class="table table-bordered">
        <thead>
          <th style="background-color:grey; color:white;">
          TO
          </th>
          <th style="background-color:grey; color:white;">
          SUPPLIER
          </th>
        </thead>
        <tbody>
         <tr>
          <td>
           <?php if($tourdetails->party == $tourdetails->client_name){ ?>
           <input type="text" class="form-control" name="clientorganization" value="<?php echo $tourdetails->address_line_1; ?>,<?php echo $tourdetails->address_line_2; ?>,">
           <input type="hidden" name="state_id" value="<?php echo $tourdetails->state_id;?>">
           <input type="hidden" name="city_id" value="<?php echo $tourdetails->city_id; ?>">
           <input type="hidden" name="country_id" value="<?php echo $tourdetails->country_id;?>">
           <input type="hidden" name="zip" value="<?php echo $tourdetails->zip; ?>">
           <?php } ?>
           <?php if($tourdetails->party == $tourdetails->organization){ ?>
           <input type="text" class="form-control" name="clientorganization" value="<?php echo $tourdetails->organization; ?>">
           <input type="hidden" name="state_id" value="<?php echo $tourdetails->com_state_id;?>">
           <input type="hidden" name="city_id" value="<?php echo $tourdetails->com_city_id; ?>">
           <input type="hidden" name="country_id" value="<?php echo $tourdetails->com_country_id;?>">
           <input type="hidden" name="zip" value="<?php echo $tourdetails->com_zip; ?>">
           <?php } ?>
          </td>
          <td>
          Lights in Dark Travel & Events Pvt. Ltd.
          </td>
         </tr>
         <tr>
          
          <td style="">
           <?php if($tourdetails->party == $tourdetails->client_name){?>
           <input type="text" class="form-control" name="" value="<?php echo $tourdetails->city_id; ?>-<?php echo $tourdetails->zip; ?>,<?php echo $tourdetails->state_id;?>,<?php echo $tourdetails->country_id;?>">
           <?php } ?>
           <?php if($tourdetails->party == $tourdetails->organization){?>
           <input type="text" class="form-control" name="organizationaddress" value="<?php echo $tourdetails->companyaddress;?>">
           <?php } ?>
          </td>
          <td style="">8/A, Pocket-2, Punjabi Bagh Club Road,<br>Paschim Puri, New Delhi-110063, India</td>
        </tr>
        <tr>
          <td style="">
          <?php if($tourdetails->party == $tourdetails->client_name){?>
          PAN NO.:<input type="text" class="form-control" name="organizationgst" value="PAN:<?php echo $tourdetails->pan_no;?>">
          <?php } ?>
          <?php if($tourdetails->party == $tourdetails->organization){?>
          GSTIN:<input type="text" class="form-control" name="organizationgst" value="GST:<?php echo $tourdetails->companygstin;?>">
          <?php } ?>
          </td>
          <td style="">GSTIN: 07AACCL4198F1ZE</td>
        </tr>
        <tr>
          <td style="">Place<input type="text" class="form-control" name="place" value="" placeholder="Enter Place"></td>
          <td style="">Place Of Supply: </td>
        </tr>
        <tr>
          <td style="">Guest Name:<input type="text" class="form-control" name="clientname" value="<?php echo $tourdetails->name_prefix; ?><?php echo $tourdetails->pax_name; ?>"></td>
          <td style="">State:</td>
        </tr>     

        </tbody>

       </table>
       <table class="table table-bordered">
        <thead style="background-color:grey;">
        
         <th style="width:350px; color:white;">Particulars</th>
         <th style="color:white;">Arrival Date</th>
         <th style="color:white;">Departure Date</th>
         <th style="color:white;">Amount</th>
         <th><a id="nextrow" name="" style="font-size:21px; cursor:pointer color: #0d0d0d;"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></th>
        
        </thead>
        <tbody id="invoicebody">
         
         <tr>
          <td>
           <textarea class="form-control" name="particulars[]" placeholder="Enter Enclusions" ></textarea>
          </td>
          <td>
           <input type="date" name="arrivaldate[]" class="form-control" value="">
          </td>
          <td>
           <input type="date" name="departuredate[]" class="form-control" value="">
          </td>
          <td>
           <input type="text" name="amount[]" class="form-control" id="particularcost1" placeholder="Enter Amount" onkeyup="calculate_particular_price()" value="">
          </td>
          <td>
          </td>
          <input type="hidden" id="rowcount" value="1">
          
         </tr>
           
        </tbody>
        
       </table>
       
         <div class="row">
            <div class="col-md-12">
						<div class="col-md-10">
						 <label style="margin-left:450px; font-size: 18px;">SUB TOTAL :</label>
						</div>
						<div class="col-md-2">
							<div class="form-group" id="">
								<input type="text" class="form-control" id="subtotal" name="subtotal" value="" placeholder="Total Amount" readonly>
							</div>
						</div>
			      </div>
         </div>
         <div class="row">
            <div class="col-md-12">
						<div class="col-md-10">
						 <label style="margin-left:450px; font-size: 18px;">IGST(<?php echo $tourdetails->igstat."%"; ?>) :</label>
						</div>
						<div class="col-md-2">
							<div class="form-group" id="">
								<input type="text" class="form-control" id="igstamt" name="igst" value="<?php echo $tourdetails->gst_percent;?>" placeholder="" readonly>
                <input type="hidden" name="igstat" value="<?php echo $tourdetails->igstat; ?>">
							</div>
						</div>
			      </div>
         </div>
         <div class="row">
            <div class="col-md-12">
						<div class="col-md-10">
						 <label style="margin-left:450px; font-size: 18px;">CGST(<?php echo $tourdetails->cgstat."%"; ?>) :</label>
						</div>
						<div class="col-md-2">
							<div class="form-group" id="">
								<input type="text" class="form-control" id="cgstamt" name="cgst" value="<?php echo $tourdetails->cgst_percent; ?>" placeholder="" readonly>
                <input type="hidden" name="cgstat" value="<?php echo $tourdetails->cgstat; ?>">
							</div>
						</div>
			      </div>
         </div>
         <div class="row">
            <div class="col-md-12">
						<div class="col-md-10">
						 <label style="margin-left:450px; font-size: 18px;">SGST(<?php echo $tourdetails->sgstat."%"; ?>) :</label>
						</div>
						<div class="col-md-2">
							<div class="form-group" id="">
								<input type="text" class="form-control" id="sgstamt" name="sgst" value="<?php echo $tourdetails->sgst_percent; ?>" placeholder="" readonly>
                <input type="hidden" name="sgstat" value="<?php echo $tourdetails->sgstat; ?>">
							</div>
						</div>
			      </div>
         </div>
         <div class="row">
            <div class="col-md-12">
						<div class="col-md-10">
						 <label style="margin-left:450px; font-size: 18px;">NET PAYABLE :</label>
						</div>
						<div class="col-md-2">
							<div class="form-group" id="">
								<input type="text" class="form-control" id="netpayable" name="netpayable" value="" placeholder="" readonly>
							</div>
						</div>
			      </div>
         </div>
         <div class="row">
            <div class="col-md-12">
						<div class="col-md-6">
						 <label style="margin-left:200px; font-size: 18px;">IN WORDS :</label>
						</div>
						<div class="col-md-6">
							<div class="form-group" id="">
								<textarea class="form-control" id="inwords" name="inwords" value="" placeholder="amount in words" readonly></textarea>
							</div>
						</div>
			      </div>
         </div>
         <button class="btn-primary btn" style="margin-left:750px;">Submit</button>
      </form>
      
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">

        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
<!---end of modal-->

<!--- Edit Performa Modal---->

<div class="modal" id="editparticulars" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header" id="modalHead2">
        <h4 class="modal-title text-center">Edit Performa Invoice</h4>
        
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      
      <div class="modal-body" id="">
       <form method="POST" action="<?php echo base_url(PARTNER) ?>/">
          <input type="hidden" name="tourcard_id" value="<?php echo $tourdetails->tcid; ?>">
          <input type="hidden" name="queryno" value="<?php echo $tourdetails->query_no;?>">
          <input type="hidden" name="employee_id" value="<?php echo $tourdetails->employee_id;?>">
          <input type="hidden" name="bkg_by" value="<?php echo $tourdetails->bkg_by;?>">

       <table class="table table-bordered">
        <thead>
          <th style="background-color:grey; color:white;">
          TO
          </th>
          <th style="background-color:grey; color:white;">
          SUPPLIER
          </th>
        </thead>
        <tbody>
         <tr>
          <td>
           <input type="text" class="form-control" name="" id="clientaddress" value="" readonly>
           <input type="hidden" name="" value="">
           <input type="hidden" name="" value="">
           <input type="hidden" name="" value="">
           <input type="hidden" name="" value="">
          </td>
          <td>
          Lights in Dark Travel & Events Pvt. Ltd.
          </td>
         </tr>
         <tr>
          
          <td style="">
           
           <input type="text" class="form-control" name="" id="editaddress" value="" readonly>
           
           <input type="text" class="form-control" name="" id="editaddress2" value="" readonly>
          </td>
          <td style="">8/A, Pocket-2, Punjabi Bagh Club Road,<br>Paschim Puri, New Delhi-110063, India</td>
        </tr>
        <tr>
          <td style="">
          <input type="text" class="form-control" name="organizationgst" id="editorganizationgst" value="" readonly>
          </td>
          <td style="">GSTIN: 07AACCL4198F1ZE</td>
        </tr>
        <tr>
          <td style="">Place<input type="text" class="form-control" id="editplace" name="place" value="" placeholder="Enter Place" readonly></td>
          <td style="">Place Of Supply: </td>
        </tr>
        <tr>
          <td style="">Guest Name:<input type="text" class="form-control" id="editguestname" name="clientname" value="" readonly></td>
          <td style="">State:</td>
        </tr>     

        </tbody>

       </table>
       <table class="table table-bordered">
        <thead style="background-color:grey;">
      
         <th style="width:350px; color:white;">Particulars</th>
         <th style="color:white;">Arrival Date</th>
         <th style="color:white;">Departure Date</th>
         <th style="color:white;">Amount</th>
         <th><a id="addnextrow" name="" style="font-size:21px; cursor:pointer color: #0d0d0d;"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></th>
        
        </thead>
        <tbody id="editinvoicebody">
         
         <!-- <tr>
          <input type="hidden" id="rowcount" value="1">
         </tr> -->
           
        </tbody>
        
       </table>
       
         <div class="row">
            <div class="col-md-12">
						<div class="col-md-10">
						 <label style="margin-left:450px; font-size: 18px;">SUB TOTAL :</label>
						</div>
						<div class="col-md-2">
							<div class="form-group" id="">
								<input type="text" class="form-control" id="editsubtotal" name="subtotal" value="" placeholder="Total Amount" readonly>
							</div>
						</div>
			      </div>
         </div>
         <div class="row">
            <div class="col-md-12">
						<div class="col-md-10">
						 <label style="margin-left:450px; font-size: 18px;" id="editigst">IGST:</label>
						</div>
						<div class="col-md-2">
							<div class="form-group" id="">
								<input type="text" class="form-control" id="editigstamt" name="igst" value="" placeholder="" readonly>
                <input type="hidden" name="igstat" value="">
							</div>
						</div>
			      </div>
         </div>
         <div class="row">
            <div class="col-md-12">
						<div class="col-md-10">
						 <label style="margin-left:450px; font-size: 18px;" id="editcgst">CGST:</label>
						</div>
						<div class="col-md-2">
							<div class="form-group" id="">
								<input type="text" class="form-control" id="editcgstamt" name="cgst" value="" placeholder="" readonly>
                <input type="hidden" name="cgstat" value="">
							</div>
						</div>
			      </div>
         </div>
         <div class="row">
            <div class="col-md-12">
						<div class="col-md-10">
						 <label style="margin-left:450px; font-size: 18px;" id="editsgst">SGST:</label>
						</div>
						<div class="col-md-2">
							<div class="form-group" id="">
								<input type="text" class="form-control" id="editsgstamt" name="sgst" value="" placeholder="" readonly>
                <input type="hidden" name="sgstat" value="">
							</div>
						</div>
			      </div>
         </div>
         <div class="row">
            <div class="col-md-12">
						<div class="col-md-10">
						 <label style="margin-left:450px; font-size: 18px;">NET PAYABLE :</label>
						</div>
						<div class="col-md-2">
							<div class="form-group" id="">
								<input type="text" class="form-control" id="editnetpayable" name="netpayable" value="" placeholder="" readonly>
							</div>
						</div>
			      </div>
         </div>
         <div class="row">
            <div class="col-md-12">
						<div class="col-md-6">
						 <label style="margin-left:300px; font-size: 18px;">IN WORDS :</label>
						</div>
						<div class="col-md-6">
							<div class="form-group" id="">
								<textarea class="form-control" id="editinwords" name="inwords" value="" placeholder="amount in words" readonly></textarea>
							</div>
						</div>
			      </div>
         </div>
         <button class="btn-primary btn" style="margin-left:750px;">Update</button>
      </form>
      
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
<!---end of modal-->

<!-- Hotel voucher Modal -->

<div class="modal" id="makehotelvoucher" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header" id="modalHead" style="border-bottom:none;">
        <h4 class="modal-title text-center">Hotel Voucher</h4>
        <button type="button" class="close" data-dismiss="modal" style="font-size:36px; margin-top: -35px;">&times;</button>
      </div>

      <!-- Modal body -->
      <form id="htlvoucherform">
      <div class="modal-body" id="mdetail" style="max-height:500px; overflow-y:scroll;">

        <table class="table table-bordered">
            <tbody>
            <tr> 
                <td colspan="2" id="gethotelname">
                </td>
            </tr>
            <tr>
                <td colspan="2">
                <input type="hidden" name="hotelVendor_id" id="hotelVendor_id" value="">
                <input type="hidden" name="hotel_name" id="hotel_name" value="">
                <input type="hidden" name="address_line_1" id="address_line_1" value="">
                <input type="hidden" name="address_line_2" id="address_line_2" value="">
                <input type="hidden" name="state_id" id="stateid" value="">
                <input type="hidden" name="city_id" id="cityid" value="">
                <input type="hidden" name="country_id" id="countryid" value="">
                <input type="hidden" name="hotel_mobile_no" id="hotel_mobile_no" value="">
                <input type="hidden" name="Tcid" id="tcid" value="">
                <input type="hidden" name="tourdaysid" id="tourdaysid" value="">
                <input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(PARTNER); ?>">
                <input type="hidden" name="check_in" id="checkindate" value="">
                <input type="hidden" name="check_out" id="checkoutdate" value="">
                <input type="hidden" name="hotelCr_amount" id="hotelCr_amount" value="">
                </td>
            </tr>
            <tr>
                <td>CHECK IN DATE</td>
                <td id="getcheckindate">
                </td>
            </tr>
            <tr>
                <td>CHECK OUT DATE</td>
                <td id="getcheckoutdate">
                </td>
            </tr>
            <tr>
                <td>ROOM(S)</td>
                <td><input type="text" class="form-control" placeholder="Enter Rooms" name="rooms" id="rooms" required></td>
            </tr>
            <tr>
                <td>LEAD PAX NAME</td>
                <td><?php echo $tourdetails->pax_name; ?>
                <input type="hidden" name="pax_name" id="pax_name" value="<?php echo $tourdetails->pax_name; ?>">
                </td>
            </tr>
            <tr>
                <td>CONFIRMATION REFRENCE</td>
                <td><input type="text" name="confirmation_no" id="confirmation_no" class="form-control" placeholder="Enter Refrence Number" required></td>
            </tr>
            <tr>
                <td>NO. OF PAX</td>
                <td><input type="text" name="total_pax" id="total_pax" class="form-control" placeholder="Total Pax." value="<?php if(!empty($tourdetails->children)){ echo $tourdetails->adult." Adults + ".$tourdetails->children." Kids";}else{ echo $tourdetails->adult." Adults";} ?>" readonly></td>
            </tr>
            <tr>
                <td>PAYMENT REMARK</td>
                <td>
                    <!--<input type="text" name="payment_remark" id="payment_remark" class="form-control" placeholder="Enter Payment Remark" required>-->
                    <!--<select class="form-control htlpymtremark" name="payment_remark" id="payment_remark" multiple="multiple" data-placeholder="Select Payment Remark Or Enter Custom">-->
                    <!--    <option value="xyz">xyzasdjskfn</option>-->
                    <!--    <option value="abc">abcfkjvnbdscadf</option>-->
                    <!--</select>-->
                    <div class="checkbox">
                        <label><input type="checkbox" name="htlpayment_remarks" id="payment_remark" value="Travel Agency had paid for all above Inclusions. Any Extra will be paid by Passengers directly.">Travel Agency had paid for all above Inclusions. Any Extra,<br>will be paid by Passengers directly.</label>
                    </div>
                    <textarea class="form-control" name="htlpaymt_othremarks" id="htlpymt_remarks" placeholder="Enter Inclusions"></textarea>
                </td>
            </tr>
            <!--<tr>-->
            <!--    <td>OTHER REMARK</td>-->
            <!--    <td><input type="text" name="other_remark" id="other_remark" class="form-control" placeholder="Enter Other Remark"></td>-->
            <!--</tr>-->
            <tr>
                <td>INCLUSIONS</td>
                <td>
                    <div class="checkbox">
                        <label><input type="checkbox" name="hotel_inclusions[]" class="htl_inclChk" value="Stay in well-appointed rooms as per above details.">Stay in well-appointed rooms as per above details.</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" name="hotel_inclusions[]" class="htl_inclChk" value="Daily Breakfast (not applicable on check-in day).">Daily Breakfast. (not applicable on check-in day).</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" name="hotel_inclusions[]" class="htl_inclChk" value="Daily Lunch (not applicable on check-out day).">Daily Lunch. (not applicable on check-out day).</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" name="hotel_inclusions[]" class="htl_inclChk" value="Daily Dinner (not applicable on check-out day).">Daily Dinner. (not applicable on check-out day).</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" name="hotel_inclusions[]" class="htl_inclChk" value="1 Cake during the stay.">1 Cake during the stay.</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" name="hotel_inclusions[]" class="htl_inclChk" value="1 Dinner will be Candle Light Dinner.">1 Dinner will be Candle Light Dinner.</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" name="hotel_inclusions[]" class="htl_inclChk" value="Flower Bed Decoration once during the stay.">Flower Bed Decoration once during the stay.</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" name="hotel_inclusions[]" class="htl_inclChk" value="2 bottles of mineral water per day.">2 bottles of mineral water per day.</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" name="hotel_inclusions[]" class="htl_inclChk" value="Daily replenishment of tea bags, milk powder, coffee & sugar sachets, etc.">Daily replenishment of tea bags, milk powder, coffee & sugar sachets, etc.</label>
                    </div>
                    <textarea class="form-control" name="othrhtl_incl" id="hotel_inclusions" placeholder="Enter Inclusions" required></textarea>
                </td>
            </tr>
            <tr>
                <td>SPECIAL SERVICE REQUEST</td>
                <td>
                    <div class="checkbox">
                        <label class="checkbox-inline"><input type="checkbox" name="spcl_srvc[]" class="spclsrvc_chkbx" value="Early Check-in.">Early Check-in.</label>
                        <label class="checkbox-inline"><input type="checkbox" name="spcl_srvc[]" class="spclsrvc_chkbx" value="King Size Bed.">King Size Bed.</label>
                        <label class="checkbox-inline"><input type="checkbox" name="spcl_srvc[]" class="spclsrvc_chkbx" value="Valley View Room.">Valley View Room.</label>
                    </div>
                    <div class="checkbox">
                        <label class="checkbox-inline"><input type="checkbox" name="spcl_srvc[]" class="spclsrvc_chkbx" value="Non-Smoking Room.">Non-Smoking Room.</label>
                        <label class="checkbox-inline"><input type="checkbox" name="spcl_srvc[]" class="spclsrvc_chkbx" value="Late Check-out.">Late Check-out.</label>
                        <label class="checkbox-inline"><input type="checkbox" name="spcl_srvc[]" class="spclsrvc_chkbx" value="Twin Beds.">Twin Beds.</label>
                    </div>
                    <div class="checkbox">
                        <label class="checkbox-inline"><input type="checkbox" name="spcl_srvc[]" class="spclsrvc_chkbx" value="Non-Smoking Room.">Honeymoon Freebies.</label>
                        <label class="checkbox-inline"><input type="checkbox" name="spcl_srvc[]" class="spclsrvc_chkbx" value="Late Check-out.">Smoking Room.</label>
                        <label class="checkbox-inline"><input type="checkbox" name="spcl_srvc[]" class="spclsrvc_chkbx" value="Twin Beds.">Balcony Room.</label>
                    </div>
                    <textarea class="form-control" name="othrspcl_srvc" id="htlspecial_inclusions" placeholder="Enter Extra Inclusions"></textarea>
                </td>
            </tr>
                                    
            </tbody>
        </table>
      
      </div>

      <!-- Modal footer -->
      <div class="modal-footer" style="border-top:none;">
        <button type="button" class="btn-primary btn" id="vouchsub">Submit</button>
      </form>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

<!-- The Modal -->

<div class="modal" id="edithotelvoucher" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header" id="">
        <h4 class="modal-title text-center">Hotel Voucher</h4>
        
        <button type="button" class="close" data-dismiss="modal" style="font-size:36px; margin-top: -35px;">&times;</button>
      </div>

      <!-- Modal body -->
      <form>
      <div class="modal-body" id="" style="max-height:500px; overflow-y:scroll;">

      <table class="table table-bordered"><tbody>
  
        <tr>
            <td id="gethotelname2">                     
            </td>
        </tr>

        <tr>
            <input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(PARTNER); ?>">
            <input type="hidden" name="voucherid" id="voucherid" value="">
        </tr>

        <tr>
            <td>CHECK IN DATE</td>
            <td id="getcheckindate2">
            </td>
        </tr>

        <tr>
            <td>CHECK OUT DATE</td>
            <td id="getcheckoutdate2">
            </td>
        </tr>

        <tr>
            <td>ROOM(S)</td>
            <td><input type="text" class="form-control" placeholder="Enter Rooms" name="rooms" id="rooms2"></td>
        </tr>

        <tr>
            <td>LEAD PAX NAME</td>
            <td id="getpaxname2">
            <input type="hidden" name="pax_name" id="pax_name2" value="">
            </td>
        </tr>

        <tr>
            <td>CONFIRMATION REFRENCE</td>
            <td><input type="text" name="confirmation_no" id="confirmation_no2" class="form-control" placeholder="Enter Refrence Number"></td>
        </tr>

        <tr>
            <td>NO. OF PAX</td>
            <td><input type="text" name="total_pax" id="total_pax2" class="form-control" placeholder="Total Pax." readonly></td>
        </tr>

        <tr>
            <td>PAYMENT REMARK</td>
            <td>
                <div class="checkbox">
                    <label><input type="checkbox" name="edthtlpayment_remarks" id="edtpayment_remark" value="Travel Agency had paid for all above Inclusions. Any Extra will be paid by Passengers directly.">Travel Agency had paid for all above Inclusions. Any Extra,<br>will be paid by Passengers directly.</label>
                </div>
                <!--<input type="text" name="payment_remark" id="payment_remark2" class="form-control" placeholder="Enter Payment Remark">-->
                <textarea class="form-control" name="htlpaymt_othremarks" id="edthtlpymt_remarks" placeholder="Enter Inclusions"></textarea>
            </td>
        </tr>

        <!--<tr>-->
        <!--    <td>OTHER REMARK</td>-->
        <!--    <td><input type="text" name="other_remark" id="other_remark2" class="form-control" placeholder="Enter Other Remark"></td>-->
        <!--</tr>-->
                                    
        <tr>
            <td>INCLUSIONS</td>
            <td>
                <div class="checkbox">
                        <label><input type="checkbox" name="edthotel_inclusions[]" class="edthtl_inclChk" value="Stay in well-appointed rooms as per above details.">Stay in well-appointed rooms as per above details.</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" name="edthotel_inclusions[]" class="edthtl_inclChk" value="Daily Breakfast (not applicable on check-in day).">Daily Breakfast. (not applicable on check-in day).</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" name="edthotel_inclusions[]" class="edthtl_inclChk" value="Daily Lunch (not applicable on check-out day).">Daily Lunch. (not applicable on check-out day).</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" name="edthotel_inclusions[]" class="edthtl_inclChk" value="Daily Dinner (not applicable on check-out day).">Daily Dinner. (not applicable on check-out day).</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" name="edthotel_inclusions[]" class="edthtl_inclChk" value="1 Cake during the stay.">1 Cake during the stay.</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" name="edthotel_inclusions[]" class="edthtl_inclChk" value="1 Dinner will be Candle Light Dinner.">1 Dinner will be Candle Light Dinner.</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" name="edthotel_inclusions[]" class="edthtl_inclChk" value="Flower Bed Decoration once during the stay.">Flower Bed Decoration once during the stay.</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" name="edthotel_inclusions[]" class="edthtl_inclChk" value="2 bottles of mineral water per day.">2 bottles of mineral water per day.</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" name="edthotel_inclusions[]" class="edthtl_inclChk" value="Daily replenishment of tea bags, milk powder, coffee & sugar sachets, etc.">Daily replenishment of tea bags, milk powder, coffee & sugar sachets, etc.</label>
                    </div>
                    <textarea class="form-control" name="edtothrhtl_incl" id="edthotel_inclusions" placeholder="Enter Inclusions" required></textarea>
                <!--<textarea class="form-control" name="hotel_inclusions" id="hotel_inclusions2" placeholder="Enter Inclusions"></textarea>-->
            </td>
        </tr>
        <tr>
            <td>SPECIAL SERVICE REQUEST</td>
            <td>
                <div class="checkbox">
                    <label class="checkbox-inline"><input type="checkbox" name="edtspcl_srvc[]" class="edtspclsrvc_chkbx" value="Early Check-in.">Early Check-in.</label>
                    <label class="checkbox-inline"><input type="checkbox" name="edtspcl_srvc[]" class="edtspclsrvc_chkbx" value="King Size Bed.">King Size Bed.</label>
                    <label class="checkbox-inline"><input type="checkbox" name="edtspcl_srvc[]" class="edtspclsrvc_chkbx" value="Valley View Room.">Valley View Room.</label>
                </div>
                <div class="checkbox">
                    <label class="checkbox-inline"><input type="checkbox" name="edtspcl_srvc[]" class="edtspclsrvc_chkbx" value="Non-Smoking Room.">Non-Smoking Room.</label>
                    <label class="checkbox-inline"><input type="checkbox" name="edtspcl_srvc[]" class="edtspclsrvc_chkbx" value="Late Check-out.">Late Check-out.</label>
                    <label class="checkbox-inline"><input type="checkbox" name="edtspcl_srvc[]" class="edtspclsrvc_chkbx" value="Twin Beds.">Twin Beds.</label>
                </div>
                <div class="checkbox">
                    <label class="checkbox-inline"><input type="checkbox" name="edtspcl_srvc[]" class="edtspclsrvc_chkbx" value="Non-Smoking Room.">Honeymoon Freebies.</label>
                    <label class="checkbox-inline"><input type="checkbox" name="edtspcl_srvc[]" class="edtspclsrvc_chkbx" value="Late Check-out.">Smoking Room.</label>
                    <label class="checkbox-inline"><input type="checkbox" name="edtspcl_srvc[]" class="edtspclsrvc_chkbx" value="Twin Beds.">Balcony Room.</label>
                </div>
                <textarea class="form-control" name="edtothrspcl_srvc" id="edthtlspecial_inclusions" placeholder="Enter Extra Inclusions"></textarea>
            </td>
        </tr>
            </tbody>
        </table>
      
      </div>

      <!-- Modal footer -->
      <div class="modal-footer" style="border-top:none;">
      <button type="button" class="btn-primary btn" id="editvouch">Update</button>
      </form>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
     
<!-- Transport voucher Modal -->

<div class="modal" id="maketransoprtvoucher" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header" id="modalHead">
        <h4 class="modal-title text-center">Transport Voucher</h4>
        
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <form>
      <div class="modal-body" id="tdetail">

        <table class="table table-bordered">
           <tbody>
  
            <tr>
                <!--<td id="getvendorname">-->
                <!--</td>-->
            </tr>
            <tr>
                <input type="hidden" name="vendor_name" id="vendor_name" value="">
                <input type="hidden" name="vendor_Id" id="vendor_Id" value="">
                <input type="hidden" name="com_address_line_1" id="com_address_line_1" value="">
                <input type="hidden" name="com_address_line_2" id="com_address_line_2" value="">
                <input type="hidden" name="com_state_id" id="com_state_id" value="">
                <input type="hidden" name="com_city_id" id="com_city_id" value="">
                <input type="hidden" name="com_country_id" id="com_country_id" value="">
                <input type="hidden" name="com_contact_no" id="com_contact_no" value="">
                <input type="hidden" name="Tcid" id="Tcid" value="">
                <input type="hidden" name="tourdaysid" id="com_tourdaysid" value="">
                <input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(PARTNER); ?>">
                <input type="hidden" name="arrival_date" id="arrival_date" value="">
                <input type="hidden" name="departure_date" id="departure_date" value="">
                <input type="hidden" name="credit_amount" id="credit_amount" value="">
            </tr>
            <tr>
                <td>ARRIVAL</td>
                <td id="gettourcheckindate">
                                      
                </td>
            </tr>
            <tr>
                <td>DEPARTURE</td>
                <td id="gettourcheckoutdate">
                                      
                </td>
            </tr>
            <tr>
                <td>VEHICLE</td>
                <td><input type="text" class="form-control" placeholder="Enter Vehicle" name="vehicletype" id="vehicletype"></td>
            </tr>
            <tr>
                <td>LEAD PAX NAME</td>
                <td><?php echo $tourdetails->pax_name; ?>
                <input type="hidden" name="pax_name" id="pax_name" value="<?php echo $tourdetails->pax_name; ?>">
                </td>
            </tr>
            <tr>
                <td>CONFIRMATION REFRENCE</td>
                <td><input type="text" name="confirmation_ref_no" id="confirmation_ref_no" class="form-control" placeholder="Enter Refrence Number"></td>
            </tr>
            <tr>
                <td>NO. OF PAX</td>
                <td><input type="text" name="total_pax_no" id="total_pax_no" class="form-control" placeholder="Total Pax." value="<?php if(!empty($tourdetails->children)){ echo $tourdetails->adult." Adults + ".$tourdetails->children." Kids";}else{ echo $tourdetails->adult." Adults";} ?>" readonly></td>
            </tr>
            <tr>
                <td>PAYMENT REMARK</td>
                <td id="pmtrmrkSel">
                    
                    <!--<input type="text" name="payment_remarks" id="payment_remarks" class="form-control" placeholder="Enter Payment Remark">-->
                    <!--<select class="form-control trnspymtremark" multiple="multiple" name="payment_remarks[]" id="payment_remarks" data-placeholder="Select or Enter Payment Remark">-->
                    <!--    <option value="xyz">xyz</option>-->
                    <!--    <option value="abc">Abc</option>-->
                    <!--</select>-->
                    <textarea class="form-control" name="payment_remarks" id="payment_remarks" placeholder="Enter Inclusions"></textarea>
                </td>
            </tr>
            <tr>
                <td>OTHER REMARK</td>
                <td><input type="text" name="other_remarks" id="other_remarks" class="form-control" placeholder="Enter Other Remark"></td>
            </tr>
            <tr>
                <td>INCLUSIONS</td>
                <td>
                    <textarea class="form-control" name="other_inclusions" id="other_inclusions" placeholder="Enter Inclusions"></textarea>
                </td>
            </tr>
           
            </tbody>
        </table>
      
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
      <button type="button" class="btn-primary btn" id="transportvouch">Submit</button>
      <!--</form>-->
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
<!-- The Modal -->

<div class="modal" id="editTransportvoucher" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header" id="">
        <h4 class="modal-title text-center">Transport Voucher</h4>
        
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <form>
      <div class="modal-body" id="">

      <table class="table table-bordered"><tbody>
  
                                    <tr>
                                      <!--<td id="getvendorname2">-->
                                      <!--</td>-->
                                    </tr>

                                    <tr>
                                    <input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(PARTNER); ?>">
                                    <input type="hidden" name="tpvoucherid" id="tpvoucherid" value="">
                                    </tr>

                                    <tr>
                                      <td>ARRIVAL</td>
                                      <td id="gettourcheckindate2">
                                      </td>
                                    </tr>

                                    <tr>
                                      <td>DEPARTURE</td>
                                      <td id="gettourcheckoutdate2">
                                      </td>
                                    </tr>

                                    <tr>
                                      <td>VEHICLE</td>
                                      <td><input type="text" class="form-control" placeholder="Enter Vehicle Type" name="vehicletype" id="vehicletype2"></td>
                                    </tr>

                                    <tr>
                                      <td>LEAD PAX NAME</td>
                                      <td id="getleadpaxname2">
                                      <input type="hidden" name="pax_name" id="pax_name2" value="">
                                      </td>
                                    </tr>

                                    <tr>
                                      <td>CONFIRMATION REFRENCE</td>
                                      <td><input type="text" name="confirmation_ref_no" id="confirmation_ref_no2" class="form-control" placeholder="Enter Refrence Number"></td>
                                    </tr>

                                    <tr>
                                      <td>NO. OF PAX</td>
                                      <td><input type="text" name="total_pax_no" id="total_pax_no2" class="form-control" placeholder="Total Pax."></td>
                                    </tr>

                                    <tr>
                                      <td>PAYMENT REMARK</td>
                                      <td><input type="text" name="payment_remarks" id="payment_remarks2" class="form-control" placeholder="Enter Payment Remark"></td>
                                    </tr>

                                    <tr>
                                      <td>OTHER REMARK</td>
                                      <td><input type="text" name="other_remarks" id="other_remarks2" class="form-control" placeholder="Enter Other Remark"></td>
                                    </tr>
                                    
                                    <tr>
                                      <td>INCLUSIONS</td>
                                      <td><textarea class="form-control" name="other_inclusions" id="other_inclusions2" placeholder="Enter Inclusions"></textarea></td>
                                    </tr>
                                  </tbody>
                                </table>
      
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
      <button type="button" class="btn-primary btn" id="edittransportvouch">Update</button>
      </form>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>


<script type="text/javascript" src="<?php echo base_url(); ?>assets/demo/pagejs/partner/viewtourcard.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/jquery-flexdatalist-2.3.0/jquery.flexdatalist.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>asset/plugins/select2/select2.full.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/form-ckeditor/ckeditor.js"></script>
<style>
    .grid-form input[type="text"]{
      border: 0.5px solid lightgray;
      background: #fafafa;
    }
    .ifotherrow{
      margin-top:10px;
    }
    
    .fromcity_1-flexdatalist{
      min-width:140px;
    }
   .flexdatalist-results{
      min-width: 300px;
    }
   .getcity1-flexdatalist{
      min-width:140px;
    }
   .to_city_1-flexdatalist{
      min-width:140px;
    }
    
</style>
<script>
$(document).ready(function(){
	//var chkprty = $('#srchParty').flexdatalist('value');
	var chkprtyAddr = $("#clntAddr").val();
	var prtnrAddr = $("#prtnrAddr").val();

    if(prtnrAddr === chkprtyAddr){
	        
	  $("#cgstdiv").css("display","block");
	  $("#sgstdiv").css("display","block");
	  $("#igstdiv").css("display","none");
	}else{
	        
	  $("#cgstdiv").css("display","none");
	  $("#sgstdiv").css("display","none");
	  $("#igstdiv").css("display","block");
	}
	
});

	$('#srchParty.flexdatalist').on('change:flexdatalist', function(event, set, options){
	    
	    $("#clntAddr").val('');
	    var selclntId = set.value;
	    if(selclntId == ''){
	       //$("#clntAddr").val('');
	       $("#cgstdiv").css("display","none");
	       $("#sgstdiv").css("display","none");
           $("#igstdiv").css("display","none");
           $("#gstprcntselection").css("display","none");
           $("#gstselDiv").css("display","none");
	    }else{
	       $("#gstprcntselection").css("display","block");
           //$("#gstexclcheked").css("display","none");
           $("#gstselDiv").css("display","block");
	    }
	    var clntArr = '<?php echo json_encode($clientDetails) ?>';
	    var clntdata = JSON.parse(clntArr);
	    $.each($(clntdata), function(key, val){
	        
	        if(selclntId === val.id){
	            $("#clntAddr").val(val.state_id);
	        }
	    });
	    
	    var clntstate = $("#clntAddr").val();
	    var prtnrstate = $("#prtnrAddr").val();
	    
	    if(clntstate !== ''){
	    
	      if(prtnrstate === clntstate){
	        
	        $("#cgstdiv").css("display","block");
	        $("#sgstdiv").css("display","block");
	        $("#igstdiv").css("display","none");
	      }else{
	        
	        $("#cgstdiv").css("display","none");
	        $("#sgstdiv").css("display","none");
	        $("#igstdiv").css("display","block");
	      }
	    
	    }else{
	        
	        alert("Client Address is not complete please complete to continue");
	        $("#srchParty").flexdatalist('value', '');
	        $("#cgstdiv").css("display","none");
	        $("#sgstdiv").css("display","none");
            $("#igstdiv").css("display","none");
           //$("#gstinclcheked").css("display","none");
            $("#gstprcntselection").css("display","none");
            $("#gstselDiv").css("display","none");
	        
	    }
	});
	
    function numberToWords(number) {
        var digit = ['zero', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine'];  
        var elevenSeries = ['ten', 'eleven', 'twelve', 'thirteen', 'fourteen', 'fifteen', 'sixteen', 'seventeen', 'eighteen', 'nineteen'];  
        var countingByTens = ['twenty', 'thirty', 'forty', 'fifty', 'sixty', 'seventy', 'eighty', 'ninety'];  
        var shortScale = ['', 'thousand', 'million', 'billion', 'trillion'];  
        number = number.toString(); number = number.replace(/[\, ]/g, ''); if(number != parseFloat(number)) return 'not a number'; var x = number.indexOf('.'); if (x == -1) x = number.length; if (x > 15) return 'too big'; var n = number.split(''); var str = ''; var sk = 0; for (var i = 0; i < x; i++) { if ((x - i) % 3 == 2) { if (n[i] == '1') { str += elevenSeries[Number(n[i + 1])] + ' '; i++; sk = 1; } else if (n[i] != 0) { str += countingByTens[n[i] - 2] + ' '; sk = 1; } } else if (n[i] != 0) { str += digit[n[i]] + ' '; if ((x - i) % 3 == 0) str += 'hundred '; sk = 1; } if ((x - i) % 3 == 1) { if (sk) str += shortScale[(x - i - 1) / 3] + ' '; sk = 0; } } if (x != number.length) { var y = number.length; str += 'point '; for (var i = x + 1; i < y; i++) str += digit[n[i]] + ' '; } str = str.replace(/\number+/g, ' '); return str.trim() + ".";  
  
    }  
    
    $(document).on('click', ".addparticulars", function(){
      $("#addparticulars").modal();
    });
    
    
    var hotel_inclusions = CKEDITOR.replace( 'hotel_inclusions', {
		width:'auto',
		height:50,
		startupFocus : false,
		customConfig: 'ckeditor_customconfig/ckeditor_config2.js'
	});
	
	var htlspecial_inclusions = CKEDITOR.replace( 'htlspecial_inclusions', {
	    width:'auto',
		height:50,
		startupFocus : false,
		customConfig: 'ckeditor_customconfig/ckeditor_config2.js'
	});
	
	var htlpayment_remarks = CKEDITOR.replace( 'htlpymt_remarks', {
	    width:'auto',
		height:50,
		startupFocus : false,
		customConfig: 'ckeditor_customconfig/ckeditor_config2.js'
	});
	
	var edthtlpayment_remarks = CKEDITOR.replace( 'edthtlpymt_remarks', {
	    width:'auto',
		height:50,
		startupFocus : false,
		customConfig: 'ckeditor_customconfig/ckeditor_config2.js'
	});
	
	var edthotel_inclusions = CKEDITOR.replace( 'edthotel_inclusions', {
		width:'auto',
		height:50,
		startupFocus : false,
		customConfig: 'ckeditor_customconfig/ckeditor_config2.js'
	});
	
	var edthtlspecial_inclusions = CKEDITOR.replace( 'edthtlspecial_inclusions', {
	    width:'auto',
		height:50,
		startupFocus : false,
		customConfig: 'ckeditor_customconfig/ckeditor_config2.js'
	});

   
$(document).on('click', ".editparticulars", function(){
    $("#editparticulars").modal();
    var getid = $(this).attr('rel');
    var particularsdays = '<?php echo json_encode($particulardays);?>';
    $.each(JSON.parse(particularsdays), function(key,val){
      var appendrows ='<tr>';
          appendrows +='<td><textarea class="form-control" name="particulars[]" placeholder="Enter Enclusions">'+val.particulars+'</textarea></td>';
          appendrows +='<td><input type="date" name="arrivaldate[]" class="form-control" value="'+val.arrivaldate+'"></td>';
          appendrows +='<td><input type="date" name="departuredate[]" class="form-control" value="'+val.departuredate+'"></td>';
          appendrows +='<td><input type="text" name="amount[]" class="form-control" id="particularcost1" placeholder="Enter Amount" onkeyup="calculate_particular_price()" value="'+val.amount+'"></td>';
          appendrows +='<td></td>';
          appendrows +='</tr>';

          $("#editinvoicebody").append(appendrows);
    });
    
      //$("#modalHead2").html('Query Detail: <strong>'+getid+'</strong>');
      var base_url = $('#baseurl').val();

      $.ajax({
		    type: 'POST',
		    url: base_url +'/getPerformaInvoicebytourcardId',
		    data: {tourcard_id:getid},
		    beforeSend: function() {
		    	$("#custom-loader").css("display","block");
		    },
		    success: function(data) {
		     if(data == '[]' || data == 0) {
		    		
               alert("no data found");
		     }else{
		    		
		    $.each(JSON.parse(data), function(key,val) {
            $("#clientaddress").val(val.clientorganization);
            $("#editaddress").val(val.organizationaddress);
            $("#editaddress2").val(val.city_name + '-' + val.zip + ',' + val.state_name + ',' + val.country_name);
            $("#editorganizationgst").val(val.organizationgst);
            $("#editplace").val(val.place);
            $("#editguestname").val(val.clientname); 
            $("#editsubtotal").val(val.subtotal);
            $("#editigst").html('IGST:' + val.igstat + '%');
            $("#editigstamt").val(val.igst);
            $("#editcgst").html('CGST:' + val.cgstat + '%');
            $("#editcgstamt").val(val.cgst);
            $("#editsgst").html('SGST:' + val.sgstat + '%');
            $("#editsgstamt").val(val.sgst);
            $("#editnetpayable").val(val.netpayable); 
            $("#editinwords").val(val.inwords);   
        		});

              }
		    },
		    complete: function() {
		    	$("#custom-loader").css("display","none");
		    }
	  });
});

$(document).on('click', ".makeTransportvoucher", function(){
  $("#maketransoprtvoucher").modal();
  
      var getid = $(this).attr('rel');
      var rownum = $(this).attr('rowno');
      //$("#modalHead").html('Query Detail: <strong>'+getid+'</strong>');
      var base_url = $('#baseurl').val();
      var vendorId = $("#vendorlist"+rownum).find("option:selected").val();

      $.ajax({
		    type: 'POST',
		    url: base_url +'/getVendorBytourcardday',
		    data: {id:getid},
		    beforeSend: function() {
		    	$("#custom-loader").css("display","block");
		    },
		    success: function(data) {
		    	if(data == '[]' || data == 0) {
		    	
            alert("no data found");
		    	}else{
		    		
		    	$.each(JSON.parse(data), function(key,val) {
            	  //$("#getvendorname").html('<strong>'+val.company_name+'<br>'+val.address_line_1+','+val.address_line_2+'<br>'+val.contact_no+'</strong>');
                  //$("#vendor_name").val(val.company_name);
                  //$("#com_address_line_1").val(val.address_line_1);
                  //$("#com_address_line_2").val(val.address_line_2);
                  //$("#com_state_id").val(val.state_id);
                  //$("#com_city_id").val(val.city_id);
                  //$("#com_country_id").val(val.country_id);
                  //$("#com_contact_no").val(val.contact_no);
                  $("#vendor_Id").val(vendorId);
                  $("#Tcid").val(val.Tcid);
                  $("#com_tourdaysid").val(val.id);
                    // var checkIndate = val.check_in.split("-");
                    // var month = ["January","February","March","April","May","June","July","August","September","October","November","December"];
                    // var getMonthname = new Date(val.check_in); 
                    // var newcheckIndate = checkIndate[2]+" "+month[getMonthname.getMonth()]+", "+checkIndate[0];
                    $("#gettourcheckindate").html('<strong>'+val.check_in+'</strong>');
                    // var checkOutdate = val.check_out.split("-");
                    // var getMonthforcheckout = new Date(val.check_out);
                    // var newCheckOutdate = checkOutdate[2]+" "+month[getMonthforcheckout.getMonth()]+", "+checkOutdate[0];
                    $("#gettourcheckoutdate").html('<strong>'+val.check_out+'</strong>');
                  $("#arrival_date").val(val.check_in);
                  $("#departure_date").val(val.check_out);
                  $("#credit_amount").val(val.cost);
        		});

		    	}
		    },
		    complete: function() {
		    	$("#custom-loader").css("display","none");
		    }
		   });
});

  $("#transportvouch").click(function(){ 
    //var data = {
      var amount = $("#credit_amount").val();
      var vendor_name = $("#vendor_name").val();
      var vendor_ID = $("#vendor_Id").val();
      var com_address_line_1 = $("#com_address_line_1").val();
      var com_address_line_2 = $("#com_address_line_2").val();
      var com_state_id = $("#com_state_id").val();
      var com_city_id = $("#com_city_id").val();
      var com_country_id = $("#com_country_id").val();
      var com_contact_no = $("#com_contact_no").val();
      var Tcid = $("#Tcid").val();
      var tourdaysid = $("#com_tourdaysid").val();
      var arrival_date = $("#arrival_date").val();
      var departure_date = $("#departure_date").val();
      var vehicletype = $("#vehicletype").val();
      var pax_name = $("#pax_name").val();
      var confirmation_ref_no = $("#confirmation_ref_no").val();
      var total_pax_no = $("#total_pax_no").val();
      var payment_remarks = $("#payment_remarks").val();
      var other_remarks = $("#other_remarks").val();
      var other_inclusions = $("#other_inclusions").val();  
    //};				

      var datastring = {

        vendor_name :vendor_name,
        vendor_ID: vendor_ID,
        com_address_line_1 :com_address_line_1,
        com_address_line_2: com_address_line_2, 
        com_state_id: com_state_id, 
        com_city_id: com_city_id, 
        com_country_id: com_country_id, 
        com_contact_no: com_contact_no, 
        Tcid: Tcid, 
        tourdaysid: tourdaysid, 
        arrival_date: arrival_date, 
        departure_date: departure_date, 
        vehicletype: vehicletype, 
        pax_name: pax_name, 
        confirmation_ref_no: confirmation_ref_no, 
        total_pax_no: total_pax_no, 
        payment_remarks: payment_remarks, 
        other_remarks: other_remarks, 
        other_inclusions: other_inclusions,
        amount: amount,

      }; // multiple data sent using ajax

    $.ajax({
      type: "POST",
      url: "<?php echo base_url(PARTNER) ?>/MakeTransportvoucher",
      data : datastring,
      beforeSend:function() {
				$("#custom-loader").css("display","block");
			},
      success: function(html)
      {
        if(html > 0)
         {
           //alert("success");
          swal("Good job!", "Voucher Created Successfully","success").then( () => {
          location.reload();
          })
         }
         else
         {
            //alert("failed");
          swal("Oops!", "There is something problem!","error").then( () => {
          location.reload();
          })
         }
      },
      complete: function() {
				$("#custom-loader").css("display","none");
			}
    
    });


  });


    function calculate_particular_price(){
        var cost = [];
		var i = 0;
			$("[id='particularcost1']").each(function(){
      		  cost[i] = $(this).val();
      		  i++;
			})
			var total = 0;
		for(var i = 0; i < cost.length; i++) {
    			total += cost[i] << 0;
        }
			
        $("#subtotal").val(total);
        var a = $("#igstamt").val();
        var b = $("#cgstamt").val();
        var c = $("#sgstamt").val();
        var totalagain = total + eval(a) + eval(b) + eval(c);
        $("#netpayable").val(totalagain);
        var words = numberToWords(totalagain);
        $("#inwords").val(words);

	}
        $(document).on('click', "#removeless", function(){
            $(this).closest('tr').remove();
			calculate_particular_price();
			var count = $("#rowcount").val();
			count--;
			$("#rowcount").val(count);
        });

        $("#nextrow").click(function(){
          var count = parseInt($("rowcount").val());
          var id = count+1;
          var new_rows = '<tr>';
          new_rows += '<td><textarea class="form-control" name="particulars[]" placeholder="Enter Inclusions" id="particulars'+id+'"></textarea></td>';
          new_rows += '<td><input class="form-control" type="date" name="arrivaldate[]" id="arrivdate'+id+'"></td>';
          new_rows += '<td><input class="form-control" type="date" name="departuredate[]" id="departdate'+id+'"></td>';
          new_rows += '<td><input class="form-control" type="text" placeholder="Enter Amount" name="amount[]" onkeyup="calculate_particular_price()" id="particularcost1"></td>';
          new_rows += '<td><a style="font-size: 21px; color: red; cursor:pointer;" id="removeless" rel="'+id+'"><i class="fa fa-minus-circle" aria-hidden="true"></i></a></td></tr>';
          $("#invoicebody").append(new_rows);
		      $("#rowcount").val(id);
          //$("#serialno"+id).html(id);

        });

$(document).on('click',".editTransportvoucher", function(){
  $("#editTransportvoucher").modal();
  var getid = $(this).attr('rel');
      
      //$("#modalHead").html('Query Detail: <strong>'+getid+'</strong>');
      var base_url = $('#baseurl').val();

      $.ajax({
		    type: 'POST',
		    url: base_url +'/getpartnertransportvoucherbyid',
		    data: {tourdaysid:getid},
		    beforeSend: function() {
		    	$("#custom-loader").css("display","block");
		    },
		    success: function(data) {
		    	if (data == '[]' || data == 0) {
		    		
            alert("no data found");
		    	}else{
		    		
		    	$.each(JSON.parse(data), function(key,val) {
            	  //$("#getvendorname2").html('<strong>'+val.vendor_name+'<br>'+val.com_address_line_1+','+val.com_address_line_2+'<br>'+val.state_name+','+val.city_name+','+val.country_name+'<br>'+val.com_contact_no+'</strong>');
                  $("#tpvoucherid").val(val.id);
                  $("#gettourcheckindate2").html('<strong>'+val.arrival_date+'</strong>');
                  $("#gettourcheckoutdate2").html('<strong>'+val.departure_date+'</strong>');
                  $("#vehicletype2").val(val.vehicletype);
                  $("#getleadpaxname2").html('<strong>'+val.pax_name+'</strong>');
                  $("#confirmation_ref_no2").val(val.confirmation_ref_no);
                  $("#total_pax_no2").val(val.total_pax_no);
                  $("#payment_remarks2").val(val.payment_remarks);
                  $("#other_remarks2").val(val.other_remarks);
                  $("#other_inclusions2").val(val.other_inclusions);
        
        		});
		    	}
		    },
		    complete: function() {
		    	$("#custom-loader").css("display","none");
		    }
		   });

});
$("#edittransportvouch").click(function(){

  var id = $("#tpvoucherid").val();
  var vehicletype = $("#vehicletype2").val();
  var confirmation_ref_no = $("#confirmation_ref_no2").val();
  var total_pax_no = $("#total_pax_no2").val();
  var payment_remarks = $("#payment_remarks2").val();
  var other_remarks = $("#other_remarks2").val();
  var other_inclusions = $("#other_inclusions2").val();  

  var datastring = {
      id :id, 
      vehicletype: vehicletype, 
      confirmation_ref_no :confirmation_ref_no, 
      total_pax_no :total_pax_no, 
      payment_remarks :payment_remarks, 
      other_remarks :other_remarks, 
      other_inclusions :other_inclusions
  };

 $.ajax({
  type:"POST",
  url:"<?php echo base_url(PARTNER)?>/updateTransportVoucher",
  data: datastring,
  beforeSend:function() {
		$("#custom-loader").css("display","block");
	},
  success: function(html)
  {
  if(html == 1)
   {
     //alert("success");
    swal("Good job!", "Update successful","success").then( () => {
      location.reload();
    })
   }
   else
   {
      //alert("failed");
    swal("Oops!", "There is something problem!","error").then( () => {
      location.reload();
    })
   }
  },
  complete: function() {
		$("#custom-loader").css("display","none");
	}

  });

});
$(document).on('click',".edithotelvoucher",function(){
  $("#edithotelvoucher").modal();
      var getid = $(this).attr('rel');
      
      //$("#modalHead").html('Query Detail: <strong>'+getid+'</strong>');
      var base_url = $('#baseurl').val();

      $.ajax({
		    type: 'POST',
		    url: base_url +'/getpartnerhotelvoucherbyid',
		    data: {tourdaysid:getid},
		    beforeSend: function() {
		    	$("#custom-loader").css("display","block");
		    },
		    success: function(data) {
		    	if (data == '[]' || data == 0) {
		    		
            alert("no data found");
		    	}else{
		    		
		    		$.each(JSON.parse(data), function(key,val) {
            		 $("#gethotelname2").html('<strong>'+val.hotelname+'<br>'+val.address_line_1+','+val.address_line_2+'<br>'+val.state_name+','+val.city_name+','+val.country_name+'<br>'+val.hotel_mobile_no+'</strong>');
                     $("#voucherid").val(val.id);
                  // $("#hotel_name").val(val.hotel_name);
                  // $("#address_line_1").val(val.address_line_1);
                  // $("#address_line_2").val(val.address_line_2);
                  // $("#stateid").val(val.state_id);
                  // $("#cityid").val(val.city_id);
                  // $("#countryid").val(val.country_id);
                  // $("#hotel_mobile_no").val(val.hotel_mobile_no);
                  // $("#tcid").val(val.Tcid);
                  // $("#tourdaysid").val(val.id);
                    //   var checkIndate = val.check_in.split("-");
                    //     var month = ["January","February","March","April","May","June","July","August","September","October","November","December"];
                    //     var getMonthname = new Date(val.check_in); 
                    //     var newcheckIndate = checkIndate[2]+" "+month[getMonthname.getMonth()]+", "+checkIndate[0];
                        $("#getcheckindate2").html('<strong>'+val.check_in+'</strong>');
                        // var checkOutdate = val.check_out.split("-");
                        // var getMonthforcheckout = new Date(val.check_out);
                        // var newCheckOutdate = checkOutdate[2]+" "+month[getMonthforcheckout.getMonth()]+", "+checkOutdate[0];
                        $("#getcheckoutdate2").html('<strong>'+val.check_out+'</strong>');
                  //$("#checkindate2").val(val.check_in);
                  //$("#checkoutdate2").val(val.check_out);
                    $("#rooms2").val(val.rooms);
                    $("#getpaxname2").html('<strong>'+val.pax_name+'</strong>');
                    $("#confirmation_no2").val(val.confirmation_no);
                    $("#total_pax2").val(val.total_pax);
                 
                    var pymtchkbx = val.payment_remark;
                    pymtchkbx = pymtchkbx.substring(pymtchkbx.indexOf("=") + 1);
                    pymtchkbx = pymtchkbx.replace(/[+]/g, ' ');
                    var pymtchkbxval = $("#edtpayment_remark").val();
                    if(pymtchkbx == pymtchkbxval){
                       $("#edtpayment_remark").attr("checked", true);
                    }
                  //$("#payment_remark2").val(val.payment_remark);
                    
                    CKEDITOR.instances.edthtlpymt_remarks.setData(val.otherpayemnt_remark);
                    //$("#edthtlpymt_remarks").val(val.otherpayemnt_remark);
                  
                    var htlIncl = val.hotel_inclusion;
                    htlIncl = htlIncl.replace(/[+]/g, ' ');
                    var htlInclarr = htlIncl.split("&");
                    var hotel_incl = [];
                    for(var i=0; i<htlInclarr.length; i++){
                        hotel_incl[i] = htlInclarr[i].substring(htlInclarr[i].indexOf("=") + 1);
                        $(".edthtl_inclChk").each(function(){
                            var htlinclchkbx = $(this).val();
                            if(htlinclchkbx == hotel_incl[i]){
                                $(this).attr("checked", true);
                            }
                        })
                        
                    }
                    
                    CKEDITOR.instances.edthotel_inclusions.setData(val.other_hotelinclusion);
                    var htlspclRQ = val.special_request;
                    htlspclRQ = htlspclRQ.replace(/[+]/g, ' ');
                    var htlspcl_reqarr = htlspclRQ.split("&");
                    var hotel_spclRq = [];
                    for(var i=0; i<htlspcl_reqarr.length; i++){
                        hotel_spclRq[i] = htlspcl_reqarr[i].substring(htlspcl_reqarr[i].indexOf("=") + 1);
                        $(".edtspclsrvc_chkbx").each(function(){
                            var htlspclchkbx = $(this).val();
                            if(htlspclchkbx == hotel_spclRq[i]){
                                $(this).attr("checked", true);
                            }
                        })
                        
                    }
                    
                    CKEDITOR.instances.edthtlspecial_inclusions.setData(val.other_remark);
                
                    //$("#other_remark2").val(pymtchkbx);
                    //$("#hotel_inclusions2").val(val.hotel_inclusions);
                    
        			});

		    	}
		    },
		    complete: function() {
		    	$("#custom-loader").css("display","none");
		    }
		   });
      
      //$("#mdetail").html($("#detail_"+id).html());
  });
 
$(document).on('click',".makehotelvoucher",function(){
    $("#makehotelvoucher").modal();
      var getid = $(this).attr('rel');
      
      //$("#modalHead").html('Query Detail: <strong>'+getid+'</strong>');
      var base_url = $('#baseurl').val();

      $.ajax({
		    type: 'POST',
		    url: base_url +'/gettourcarddaybyid',
		    data: {id:getid},
		    beforeSend: function() {
		    	$("#custom-loader").css("display","block");
		    },
		    success: function(data) {
		    	if(data == '[]' || data == 0) {
		    	
                    alert("no data found");
		    	}else{
		    		
		    		$.each(JSON.parse(data), function(key,val) {
            	        //$("#gethotelname").html('<strong>'+val.hotel_name+'<br>'+val.address_line_1+','+val.address_line_2+'<br>'+val.state_id+','+val.city_id+','+val.country_id+'<br>'+val.hotel_mobile_no+'</strong>');
                        $("#gethotelname").html('<strong>'+val.hotel_name+'<br>'+val.address_line_1+','+val.address_line_2+'<br>'+val.hotel_mobile_no+'</strong>');
                        $("#hotelVendor_id").val(val.vendor_name);
                        $("#hotel_name").val(val.hotel_name);
                        $("#address_line_1").val(val.address_line_1);
                        $("#address_line_2").val(val.address_line_2);
                        $("#stateid").val(val.state_id);
                        $("#cityid").val(val.city_id);
                        $("#countryid").val(val.country_id);
                        $("#hotel_mobile_no").val(val.hotel_mobile_no);
                        $("#tcid").val(val.Tcid);
                        $("#tourdaysid").val(val.id);
                        // var checkIndate = val.check_in.split("-");
                        // var month = ["January","February","March","April","May","June","July","August","September","October","November","December"];
                        // var getMonthname = new Date(val.check_in); 
                        // var newcheckIndate = checkIndate[2]+" "+month[getMonthname.getMonth()]+", "+checkIndate[0];
                        $("#getcheckindate").html('<strong>'+val.check_in+'</strong>');
                        // var checkOutdate = val.check_out.split("-");
                        // var getMonthforcheckout = new Date(val.check_out);
                        // var newCheckOutdate = checkOutdate[2]+" "+month[getMonthforcheckout.getMonth()]+", "+checkOutdate[0];
                        $("#getcheckoutdate").html('<strong>'+val.check_out+'</strong>');
                        $("#checkindate").val(val.check_in);
                        $("#checkoutdate").val(val.check_out);
                        $("#hotelCr_amount").val(val.cost);
        			});

		    	}
		    },
		    complete: function() {
		    	$("#custom-loader").css("display","none");
		    }
		   });
      
      //$("#mdetail").html($("#detail_"+id).html());
});
  
  $("#vouchsub").click(function(){
    
			//var data = {
	    var hotel_name = $("#hotel_name").val();
	    var hotelVendor_Id = $("#hotelVendor_id").val();
		var hotel_Cost = $("#hotelCr_amount").val();
	    var address_line_1 = $("input[name='address_line_1']").val();
	    var address_line_2 = $("#address_line_2").val();
	    var state_id = $("#stateid").val();
	    var city_id = $("#cityid").val();
	    var country_id = $("#countryid").val();
	    var hotel_mobile_no = $("#hotel_mobile_no").val();
	    var tcid = $("#tcid").val();
	    var tourdaysid = $("#tourdaysid").val();
	    var check_in = $("#checkindate").val();
	    var check_out = $("#checkoutdate").val();
	    var rooms = $("input[name='rooms']").val();
	    var pax_name = $("#pax_name").val();
	    var confirmation_no = $("#confirmation_no").val();
	    var total_pax = $("#total_pax").val();
	    //var payment_remark = $("#payment_remark").val();
	    //var other_remark = $("#other_remark").val();
	    var hotel_inclusions = CKEDITOR.instances['hotel_inclusions'].getData(); 
	    var htlpymt_remarks = CKEDITOR.instances['htlpymt_remarks'].getData();
	    var htlspecial_inclusions = CKEDITOR.instances['htlspecial_inclusions'].getData();
	    var hotel_inclchkbox = $('.htl_inclChk:checked').serialize();
		var payment_remarkchkbox = $("#payment_remark:checked").serialize();
		var otherspclsrvc_chkbx = $(".spclsrvc_chkbx:checked").serialize();
			//};				
        var datastring = {
          hotelVendor_Id: hotelVendor_Id,
          hotel_Cost: hotel_Cost,
          hotel_name :hotel_name, 
          address_line_1: address_line_1, 
          address_line_2: address_line_2, 
          state_id: state_id, 
          city_id: city_id, 
          country_id: country_id, 
          hotel_mobile_no: hotel_mobile_no, 
          tcid: tcid, 
          tourdaysid: tourdaysid, 
          check_in: check_in, 
          check_out: check_out, 
          rooms: rooms, 
          pax_name: pax_name, 
          confirmation_no: confirmation_no, 
          total_pax: total_pax,
          hotel_inclchkbox : hotel_inclchkbox,
          hotel_inclusions : hotel_inclusions,
          payment_remarkchkbox : payment_remarkchkbox,
          htlpymt_remarks : htlpymt_remarks,
          htlspecial_inclusions : htlspecial_inclusions,
          otherspclsrvc_chkbx : otherspclsrvc_chkbx
          //payment_remark: payment_remark, 
          //other_remark: other_remark, 
          //hotel_inclusions: hotel_inclusions
        };  // multiple data sent using ajax
		
		var checkedNum = $('.htl_inclChk:checked').length;
		var payment_remark = $("#payment_remark:checked").length;
		var spclsrvc_chkbx = $(".spclsrvc_chkbx:checked").length;
		
		if(rooms == ''){
		    alert("Enter No of Rooms/Room Type");
		    return false;
		}else if(confirmation_no == ''){
		    alert("Enter Confirmation No");
		    return false;
		}else if((!payment_remark) && (htlpymt_remarks == '')){
		    alert("select payment remark or enter below");
		    return false;
		}else if((!checkedNum) && (hotel_inclusions == '')){
		    alert("select hotel inclusion or enter below");
		    return false;
		}else if((!spclsrvc_chkbx) && (htlspecial_inclusions == '')){
		    alert("select special services or enter below");
		    return false;
		    
		}else{
		    //alert("success");
            //console.log(datastring);
        
		$.ajax({
		    type:"POST",
            url: "<?php echo base_url(PARTNER) ?>/MakeHotelvoucher",
		    data: datastring,
			
		beforeSend:function() {
		     $("#custom-loader").css("display","block");
	    },
        success: function(html)
        {
          if(html == 1)
          {
            //alert("success");
            swal("Good job!", "Update successful","success").then( () => {
            location.reload();
            })
          }
          else
          {
            //alert("failed");
            swal("Oops!", "There is something problem!","error").then( () => {
            location.reload();
            })
          }
        },
        complete: function() {
		     $("#custom-loader").css("display","none");
	    }
			
		});
	
	  }
        
  });

$("#editvouch").click(function(){

        var id = $("#voucherid").val();
        var rooms = $("#rooms2").val();
		//var pax_name = $("#pax_name").val();
		var confirmation_no = $("#confirmation_no2").val();
		var total_pax = $("#total_pax2").val();
// 		var payment_remark = $("#payment_remark2").val();
// 		var other_remark = $("#other_remark2").val();
//         var hotel_inclusions = $("#hotel_inclusions2").val();  
        var other_hotelinclusion = CKEDITOR.instances['edthotel_inclusions'].getData(); 
	    var otherpayemnt_remark = CKEDITOR.instances['edthtlpymt_remarks'].getData();
	    var other_remark = CKEDITOR.instances['edthtlspecial_inclusions'].getData();
	    var hotel_inclusions = $('.edthtl_inclChk:checked').serialize();
		var payment_remark = $("#edtpayment_remark:checked").serialize();
		var special_request = $(".edtspclsrvc_chkbx:checked").serialize();

        var datastring = {
            id :id, 
            rooms: rooms, 
            confirmation_no :confirmation_no, 
            total_pax :total_pax, 
            payment_remark :payment_remark, 
            otherpayemnt_remark :otherpayemnt_remark,
            hotel_inclusions :hotel_inclusions,
            other_hotelinclusion :other_hotelinclusion,
            special_request :special_request,
            other_remark :other_remark
        };
        
        var checkedNum = $('.edthtl_inclChk:checked').length;
		var payment_remark = $("#edtpayment_remark:checked").length;
		var spclsrvc_chkbx = $(".edtspclsrvc_chkbx:checked").length;
		
		if(rooms == ''){
		    alert("Enter No of Rooms/Room Type");
		    return false;
		}else if(confirmation_no == ''){
		    alert("Enter Confirmation No");
		    return false;
		}else if((!payment_remark) && (otherpayemnt_remark == '')){
		    alert("select payment remark or enter below");
		    return false;
		}else if((!checkedNum) && (other_hotelinclusion == '')){
		    alert("select hotel inclusion or enter below");
		    return false;
		}else if((!spclsrvc_chkbx) && (other_remark == '')){
		    alert("select special services or enter below");
		    return false;
		    
		}else{
		
        $.ajax({
            
            type:"POST",
            url:"<?php echo base_url(PARTNER)?>/updateHotelVoucher",
            data: datastring,
            beforeSend:function() {
		         $("#custom-loader").css("display","block");
	        },
            success: function(html)
			{
				if(html == 1)
				{
                    //alert("success");
					swal("Good job!", "Update Successful","success").then( () => {
					location.reload();
					});
				}
				else
				{
                    //alert("failed");
					swal("Oops!", "There is something problem!","error").then( () => {
					location.reload();
					});
				}
            },
            complete: function() {
		       $("#custom-loader").css("display","none");
	        }
        });
	}

});
    
</script>
<script>
          
       $(document).ready(function() {
        
       $("#tourcardtable #tourcardtablebody tr:first-child").find('.deletedays').hide();
       $("#tourcardtable #tourcardtablebody tr:not(:last) a[class=addnewrow]").hide();
       }); 
        
      //  $(document).on("focus", '#tourcardtable #tourcardtablebody a[class=addnewrow]', function() {
      //   confirm("Do you want new row?");
      //    });

       $(document).on("click", "#other_remove", function(){
    	    $(this).closest('tr').remove();
			calculate_other_price();
			var count = $("#count_row").val();
			count--;
			$("#count_row").val(count);
			
			$("#profitpercentage").val('');
			$("#profitonmargin").val('');
			$("#gstamount").val('');
			$("#gst_percentage").val('');
			$("#gstperctamt").val('');
			$("#igsttxt").html('');
		});
		$(document).ready(function(){
		   
		    $(".checkInTime1").timepicker({
				showInputs: false,
				showSeconds: false,
				showMeridian: true,
				defaultTime: false
		    });
			
		    $(".checkOutTime1").timepicker({
				showInputs: false,
				showSeconds: false,
				showMeridian: true,
				defaultTime: false
		    });
		    
			var count = parseInt($("#count_row").val());
			for(var i=1; i<=count; i++){
			        
			    var start_date = $('#startdate').val();
			    var end_date = $("#enddate").val();
			    //$("#first_date_"+i).datepicker('setStartDate', start_date);
                //$("#check_in_"+i).datepicker('setStartDate', start_date);
			    //$("#check_out_"+i).datepicker('setStartDate', start_date);
			    
			    $("#first_date_"+i).datepicker({
			        format:'dd/mm/yyyy',
			    }).on('changeDate', function(ev){
			        
			        $("#first_date_"+i).datepicker('hide');
			    });
			    $("#check_in_"+i).datepicker({
			        format:'dd/mm/yyyy',
			    }).on('changeDate', function(ev){
			         //$("#check_out_"+i).datepicker('setDate', ev.date);
			        $("#check_out_"+i).datepicker('setStartDate', ev.date);
			        $("#check_in_"+i).datepicker('hide');
			    });
			    $("#check_out_"+i).datepicker({
			        format:'dd/mm/yyyy',
			    }).on('changeDate', function(ev){
			        $("#check_out_"+i).datepicker('hide');
			    });
			    
			    $("#first_date_"+i).datepicker('setStartDate', start_date);
			    $("#first_date_"+i).datepicker('setEndDate', end_date);
			    $("#check_in_"+i).datepicker('setStartDate', start_date);
			    $("#check_in_"+i).datepicker('setEndDate', end_date);
			    $("#check_out_"+i).datepicker('setStartDate', start_date);
			    $("#check_out_"+i).datepicker('setEndDate', end_date);
			    
			}
		});
		
		$(document).on("click", "#delete", function(){
		  $("#profitpercentage").val('');
			$("#profitonmargin").val('');
			$("#gstamount").val('');
			$("#gst_percentage").val('');
			$("#gstperctamt").val('');
			$("#igsttxt").html('');
			
			var occost = document.getElementById("oc_cost1").value;
			$("#oc_cost2").val(occost);
			$("#pc_cost").val(occost);
			$("#tc_cost").val(occost);
			
		});

	
	function setcity(val1)
	{
		var city_str = $("#getcity"+val1).val();
		$("#to_city_"+val1).val(city_str);
		
		
		var base_url = $('#baseurl').val();
        
        $.ajax({
		    type: 'POST',
		    url: base_url +'/getHotelByCity',
		    data: {id:city_str},
		    beforeSend: function() {
		    	$("#custom-loader").css("display","block");
		    },
		    success: function(data) {
		    	if (data == '[]' || data == 0) {
		    		$('#gethotel'+val1).find('option').remove();
		    		//swal("Oops!!", "No hotel Found for this City!", "error");
		    		$("#gethotel"+val1).append('<option value = "">Select Hotel</option>');
		    	}else{
		    		$('#gethotel'+val1).find('option').remove();
		    		$("#gethotel"+val1).append('<option value = "">Select Hotel</option>');
		    		$.each(JSON.parse(data), function(key,val) {
            			$("#gethotel"+val1).append('<option value = "'+val.hotel_id+'">'+val.hotel_name+'</option>')
        			});
		    	}
		    },
		    complete: function() {
		    	$("#custom-loader").css("display","none");
		    }
		   });
		
        //});
	}
	
	function cityhotel(val1){
	    
		var base_url = $('#baseurl').val();
        var city_id = $('#to_city_'+val1).val();
        
        $.ajax({
		    type: 'POST',
		    url: base_url +'/getHotelByCity',
		    data: {id:city_id},
		    beforeSend: function() {
		    	$("#custom-loader").css("display","block");
		    },
		    success: function(data) {
		    	if (data == '[]' || data == 0) {
		    		$('#gethotel'+val1).find('option').remove();
		    		//swal("Oops!!", "No hotel Found for this City!", "error");
		    		$("#gethotel"+val1).append('<option value = "">Select Hotel</option>');
		    	}else{
		    		$('#gethotel'+val1).find('option').remove();
		    		$("#gethotel"+val1).append('<option value = "">Select Hotel</option>');
		    		$.each(JSON.parse(data), function(key,val) {
            			$("#gethotel"+val1).append('<option value = "'+val.hotel_id+'">'+val.hotel_name+'</option>')
        			});
		    	}
		    },
		    complete: function() {
		    	$("#custom-loader").css("display","none");
		    }
		});
    
	}

        
    //   $("#firstdate").on('change', function(){
    //       var selecteddate = $(this).val();
    //       $("#checkin").val(selecteddate);
    //     });
  
        $(document).on("focus", '#tourcardtable #tourcardtablebody a[class=addnewrow]', function() {
        var count = parseInt($("#count_row").val());
        var cityarr = $("#to_city_"+count).val();
        var check_out= $("#check_out_"+count).val();
        // cities = '<?php //echo json_encode($cities);?>';
        var strtdt = $("#startdate").val();
        var enddt = $("#enddate").val();
        var hotels = '<?php echo json_encode($partnerhotel);?>';
        var vendors = '<?php echo json_encode($vendors);?>';
        var id = count+1;
        var td_id = 'other_rows_'+id;
		var new_rows ='<tr id="other_rows_'+id+'"><td><input type="text" style="width:150px;" class="form-control from_date" id="first_date_'+id+'" onchange="start_date_check('+id+')" name="start_date_more[]" placeholder="" value=""></td>';
// 		new_rows += '<td class="col-md-2"><select onchange="frm_city_2('+id+')" name="from_city_more[]" class="form-control custom-select" id="fromcity_'+id+'" ><option value="">Select City</option>';
// 		$.each(JSON.parse(cities), function(index, element) {

// 			new_rows += '<option value="'+element.id+'">'+element.city_name+'</option>';

//         });
// 		new_rows +='</select></td>';
		new_rows +='<td class="col-md-2"><input type="text" placeholder="enter city" class="form-control" name="from_city_more[]" id="fromcity_'+id+'"></td>';
// 		new_rows += '<td class="col-md-2"><select id="get_city'+id+'" class="form-control" name="to_city_more[]" style="width:100%;"><option value="">select city</option>';
// 		$.each(JSON.parse(cities), function(index, element) {
		
// 			new_rows += '<option value="'+element.id+'">'+element.city_name+'</option>';
		
//         });
// 		new_rows +='</select></td>';
        new_rows +='<td class="col-md-2"><input type="text" placeholder="enter city" class="form_control" name="to_city_more[]" id="get_city'+id+'"></td>';
		new_rows +='<td><select class="form-control" id="" name="travel_by_more[]"><option>select</option><option value="air">Air</option><option value="train">Train</option><option value="cab">Cab</option><option value="bus">Bus</option><option value="cruise">Cruise</option></select></td>';
		new_rows +='<td><input type="text" class="form-control" id="" name="write_box_more[]"></td>';
		new_rows +='<td class="col-md-3"><div class="form-group"><div class="input-group bootstrap-timepicker"><input autocomplete="off" type="text" name="start_time_more[]" class="form-control timepicker htimepicker" id="checkInTime_'+id+'" value="" style="width:80px;"/><div class="input-group-addon"><i class="fa fa-clock-o"></i></div></div></div></td>';
		new_rows +='<td class="col-md-3"><div class="form-group"><div class="input-group bootstrap-timepicker"><input autocomplete="off" type="text" name="end_time_more[]" id="checkOutTime_'+id+'" id="checkOutTime_2" class="form-control timepicker htimepicker" value=""  style="width:80px;"/><div class="input-group-addon"><i class="fa fa-clock-o"></i></div></div></div></td>';
// 		new_rows +='<td class="col-md-2"><select id="to_city_'+id+'" onchange="cityhotel()" class="form-control custom-select" name="city_more[]" style="width:100%;"><option value="">Select City</option>';
// 		$.each(JSON.parse(cities), function(index, element) {
		
// 			new_rows += '<option value="'+element.id+'">'+element.city_name+'</option>';
		
//         });
// 		new_rows +='</select></td>';
        new_rows +='<td class="col-md-2"><input type="text" placeholder="enter city" onchange="cityhotel()" class="form_control" name="city_more[]" id="to_city_'+id+'"></td>';
		new_rows +='<td class="col-md-2"><select id="get_hotel'+id+'" class="form-control" name="hotel_filter_more[]" style="width:100%;"><option value="">Select</option>';
		new_rows +='</select></td>';
		new_rows +='<td><input type="text" class="form-control" style="width:150px;" name="check_in_more[]" id="check_in_'+id+'"></td>';
		new_rows +='<td><input type="text" class="form-control" style="width:150px;" onchange="dat_arr1()" id="check_out_'+id+'" name="check_out_more[]"></td>';
		new_rows +='<td><select id="vendorlist" class="form-control" id="" name="vendor_name_more[]"><option value="">Select</option>';
		$.each(JSON.parse(vendors), function(index, element) {
		
			new_rows += '<option value="VND'+element.vendorId+'">'+element.company_name+'</option>';
		
        });
        $.each(JSON.parse(hotels), function(index, element) {
		
            new_rows += '<option value="HTL'+element.hotel_id+'">'+element.hotel_name+'</option>';
  
        });
		new_rows +='</select></td>';
		new_rows +='<td><input type="text" class="form-control" name="cost_more[]" id="oc_cost1" onkeyup="calculate_other_price()" placeholder="Enter cost"></td>';
		new_rows +='<td><a tabindex="0" style="font-size: 21px; cursor:pointer; color:green;" class="addnewrow"><i class="fa fa-plus-circle" aria-hidden="true"></i></a><a style="font-size: 21px; color: red; cursor:pointer" id="other_remove" rel="+id+"><i class="fa fa-minus-circle" aria-hidden="true"></i></a></td></tr>';
        
        var confirmtrue = swal({
          title: "Do you want new row?",
          text: "",
          buttons: {  
            cancel: {
                text: "Cancel",
                value: false,
                visible: true,
                className: "",
                closeModal: true,
              },
            confirm: {
                text: "OK",
                value: true,
                visible: true,
                className: "",
                closeModal: true
              }

          },
          
        }).then((value) => {
            if(value){
               $("#tourcardtablebody").append(new_rows);
               $("#count_row").val(id);
               swal.close();
               document.getElementById('first_date_'+id).focus();
               //$("#first_date_"+id).datepicker("show");
            }else{
             //document.getElementById('oc_cost2').focus();

            }
         
		$("#checkInTime_"+id).timepicker({
			showInputs: false,
			showSeconds: false,
			showMeridian: true,
			defaultTime : false
		});
			
		$("#checkOutTime_"+id).timepicker({
			showInputs: false,
			showSeconds: false,
			showMeridian: true,
			defaultTime : false
		});
		
        $("#first_date_"+id).datepicker({
            format:'dd/mm/yyyy'
        }).on('changeDate', function(ev){
            $("#check_in_"+id).val(ev.date);
            $("#check_in_"+id).datepicker('setDate', ev.date);
            //$("#check_in_"+id).datepicker('setStartDate', ev.date);
            $("#first_date_"+id).datepicker('hide');
        });
        
        $("#check_in_"+id).datepicker({
            format:'dd/mm/yyyy'
        }).on('changeDate', function(ev){
            $("#check_out_"+id).datepicker('setStartDate', ev.date);
            $("#check_in_"+id).datepicker('hide');
        });
        
        $("#check_out_"+id).datepicker({
            format:'dd/mm/yyyy'
        }).on('changeDate', function(ev){
            
            $("#check_out_"+id).datepicker('hide');
        });
        
        $("#first_date_"+id).val(check_out);
        //$("#first_date_"+id).datepicker('setDate', check_out);
        $("#first_date_"+id).datepicker('setStartDate', strtdt);
        $("#first_date_"+id).datepicker('setEndDate', enddt);
        //$("#check_in_"+id).val(check_out);
        //$("#check_in_"+id).datepicker('setDate', check_out);
        $("#check_in_"+id).datepicker('setStartDate', strtdt);
        $("#check_in_"+id).datepicker('setEndDate', enddt);
        $("#check_out_"+id).datepicker('setEndDate', enddt);
        $("#fromcity_"+id).val(cityarr);
     
        $("#fromcity_"+id).flexdatalist({
      
            minLength: 2,
            valueProperty: 'id',
            selectionRequired: true,
            visibleProperties: ["city_name","state_name","country_name"],
            searchIn: 'city_name',
            //data: 'JSON',
            url: $('#baseurl').val()+'/encodecity'
        });
 
      $("#get_city"+id).flexdatalist({
       
       minLength: 2,
       valueProperty: 'id',
       selectionRequired: true,
       visibleProperties: ["city_name","state_name","country_name"],
       searchIn: 'city_name',
       //data: 'JSON',
       url: $('#baseurl').val()+'/encodecity'
      });
 
      $("#to_city_"+id).flexdatalist({
       
       minLength: 2,
       valueProperty: 'id',
       selectionRequired: true,
       visibleProperties: ["city_name","state_name","country_name"],
       searchIn: 'city_name',
       //data: 'JSON',
       url: $('#baseurl').val()+'/encodecity'
      });		
	
		
		$("#get_city"+id).on('change',function(){
		var base_url = $('#baseurl').val();
        var city_id = $("#get_city"+id).val();
        $.ajax({
		    type: 'POST',
		    url: base_url +'/getHotelByCity',
		    data: {id:city_id},
		    beforeSend: function() {
		    	$("#custom-loader").css("display","block");
		    },
		    success: function(data) {
		    	if (data == '[]' || data == 0) {
		    		$("#get_hotel"+id).find('option').remove();
		    	
		    		$("#get_hotel"+id).append('<option value = "">Select Hotel</option>');
		    	}else{
		    		$("#get_hotel"+id).find('option').remove();
		    		$("#get_hotel"+id).append('<option value = "">Select Hotel</option>');
		    		$.each(JSON.parse(data), function(key,val) {
            			$("#get_hotel"+id).append('<option value = "'+val.hotel_id+'">'+val.hotel_name+'</option>')
        			});
		    	}
		    },
		    complete: function() {
		    	$("#custom-loader").css("display","none");
		    }
		});
		
		
     });
     
    $("#get_city"+id).on('change', function(){
        var selectedText = $(this).val();
        $("#to_city_"+id).val(selectedText);
       
    });
        
       $("#to_city_"+id).on('change',function(){
		var base_url = $('#baseurl').val();
        var city_id = $("#to_city_"+id).val();
        $.ajax({
		    type: 'POST',
		    url: base_url +'/getHotelByCity',
		    data: {id:city_id},
		    beforeSend: function() {
		    	$("#custom-loader").css("display","block");
		    },
		    success: function(data) {
		    	if (data == '[]' || data == 0) {
		    		$("#get_hotel"+id).find('option').remove();
		    	
		    		$("#get_hotel"+id).append('<option value = "">Select Hotel</option>');
		    	}else{
		    		$("#get_hotel"+id).find('option').remove();
		    		$("#get_hotel"+id).append('<option value = "">Select Hotel</option>');
		    		$.each(JSON.parse(data), function(key,val) {
            			$("#get_hotel"+id).append('<option value = "'+val.hotel_id+'">'+val.hotel_name+'</option>')
        			});
		    	}
		    },
		    complete: function() {
		    	$("#custom-loader").css("display","none");
		    }
		});
		
		
       });
       
      });
 
     });     
    function start_date_check(val1)
	{
		var date_str = $("#first_date_"+val1).val();
		$("#check_in_"+val1).val(date_str);
	}
      
    function dat_arr1()
	{
		var count = parseInt($("#count_row").val());
		        
		for(a=1;a<=count;a++)
		{
		    var enddt = $("#enddate").val();
		    var strtdt = $("#startdate").val();
			var id = a+1;
					
		    var check_out= $("#check_out_"+a).val();
		    $("#check_out_"+a).datepicker({
                format:'dd/mm/yyyy',
            }).on('changeDate', function(ev){
                
		        $("#check_out_"+a).datepicker('hide');
            });
            $("#first_date_"+id).datepicker({
		        format:'dd/mm/yyyy',
		        
		    }).on('changeDate', function(ev){
		        
		        $("#check_in_"+id).val(ev.date);
		        $("#check_in_"+id).datepicker('setDate', ev.date);
		        //$("#check_in_1").datepicker('setStartDate', ev.date);
		        $("#first_date_"+id).datepicker('hide');
		    });
		    $("#check_in_"+id).datepicker({
		        format:'dd/mm/yyyy',
		        //startDate: new Date()
		    }).on('changeDate', function(ev){
		        
		        $("#check_out_"+id).datepicker('setStartDate', ev.date);
		        $("#check_in_"+id).datepicker('hide');
		    });
		    
		    $("#first_date_"+id).datepicker('setStartDate', strtdt);
		    $("#first_date_"+id).datepicker('setEndDate', enddt);
		    
		    $("#check_in_"+id).datepicker('setStartDate', strtdt);
		    $("#check_in_"+id).datepicker('setEndDate', enddt);
		    $("#check_out_"+id).datepicker('setEndDate', enddt);
		}
	}
 
</script>