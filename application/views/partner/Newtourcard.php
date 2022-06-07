<div class="col-md-11" id="contentCol">
<div id="wrapper">
<div id="layout-static">
<div class="static-content-wrapper">
<div class="static-content">
<div class="page-content" style="margin-top:;">
<ol class="breadcrumb">
   <li><a href="<?php echo base_url(PARTNER) ?>/dashboard">Home</a></li>
   <li><a href="#">Tour Card</a></li>
</ol>
<div class="page-heading">
   <h1>Make Tour Card</h1>
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
    <h2>Tour Card</h2>
  </div>
  <div class="panel-body">
    <form class="grid-form" action="<?php echo base_url(PARTNER) ?>/makeTourCard" method="POST" id="turCardForm">
    <fieldset>
             
             <div class="row">
                
                 <div class="col-md-3">
                  <label>Tour Card No:</label>
                  <input type="text" class="form-control" name="" id="trc_no" value="<?php //echo $query->id;?>" readonly>
                 </div>
                 
                 <div class="col-md-3">
                  <label>Bkg Date</label>
                  <input type="text" class="form-control" name="bkg_date" id="bkgdate" required="true" placeholder="Starting Date">
                 </div>
                 
                 <div class="col-md-3">
                  <label>Bkg. By</label>
                  <input type="text" class="form-control" name="bkg_by" value="<?php echo $empDetails->name == '' ? $name : $empDetails->name; ?>" readonly>
                  <input type="hidden" class="form-control" name="employee_id" value="<?php echo $empDetails->id; ?>">
                  <input type="hidden" class="form-control" name="queryno" value="<?php if(empty($query->id)){ echo ""; }else{ echo $query->id; }?>">
                  <input type="hidden" class="form-control" name="contact_no" value="<?php if(empty($query->contact_no)){ echo ""; }else{ echo $query->contact_no; }?>">
                  <input type="hidden" name="" id="prtnrAddr" value="<?php echo $this->global['state_id']; ?>">
                 </div>
                  
                 <div class="col-md-3">
                  <label>Bkg Type:</label>
                  <select class="form-control" name="queryType" id="selpackage" required>
                    <option value="select" selected>select</option>
                    <option value="hotel">hotel</option>
                    <option value="package">package</option>
                    <option value="other">other</option>
                  </select>
                 </div>
                
             </div>
                
             <div class="row" style="margin-top:10px;">
                 <div class="col-md-3">
                  
                  <label>Prefix Name:</label><br>
                  <label><input type="radio" name="name_prefix[]" value="Mr."> Mr.</label> &nbsp;
                  <label><input type="radio" name="name_prefix[]" value="Mrs."> Mrs.</label> &nbsp;
                  <label><input type="radio" name="name_prefix[]" value="Ms."> Ms.</label>
                  
                 </div>
                 
                 <div class="col-md-3">
                  <label>Lead Pax Name:</label>
                  <input type="text" class="form-control" name="pax_name" required="true" placeholder="Enter Client Name">
                 </div>
                 
                 <div class="col-md-2">
                  <label>Arrival Date</label>
                  <input type="text" class="form-control" name="arrival_date" required="true" id="startdate" placeholder="Enter Start Date">
                 </div>
                 
                 <div class="col-md-2">
                  <label>Departure Date</label>
                  <input type="text" class="form-control" name="departure_date" required="true" id="enddate" placeholder="Enter End Date">
                 </div>
                 
                 <div class="col-md-2">
                  
                  <label>Nights</label>
                    <select class="form-control" name="nights" id="stayDuration" required>
                        <option value="">Select</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
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
                         <option value="<?php echo $country->id;?>"><?php echo $country->country_name;?></option>
                    <?php }
                      } ?>
                  </select>
                 </div>
                 
                 <div class="col-md-3" style="width:24%;">
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
                    name='party' id="srchParty" required>
                  
                  <input type="hidden" name="" id="clntAddr" value="">
                 </div>
                 <div class="col-md-1" style="margin-left: inherit; width: auto;">
                     
                     <a href="<?php echo base_url(PARTNER) ?>/addClient" target="_blank" data-toggle="tooltip" title="Add Client" style="text-decoration:none; color: darkgray;"><i class="fa fa-plus-circle" aria-hidden="true" style="margin-top: 32px; margin-left: -8px; font-size: 25px;"></i></a>
                 </div>
                 
                 <div class="col-md-3" style="margin-left: inherit;">
                  <label>File No:</label>
                  <input type="text" class="form-control" name="file_no" value="" required>
                 </div>
                 
                 <div class="col-md-2">
                  <!--<div data-field-span="1">-->
                  <label>Invoice No:</label>
                  <input type="text" class="form-control" name="invoice_no" value="" readonly>
                 </div>
             </div>
             <br>
             <br>
             
            <div id="ifother" style="display:none;">
             <div class="row" style="margin-left: -12px; margin-top: -30px">
                 <div class="col-md-2">
                  <label>No. of Adults:</label>
                  <input type="text" class="form-control" name="adult" value="" placeholder="Enter No. Of Adults" required>
                 </div>
                 
                 <div class="col-md-2">
                  <label>No. of kids</label>
                  <input type="text" class="form-control" name="children" value=""  placeholder="Enter No. Of Kids">
                 </div>
                 
                 <div class="col-md-3">
                  <label>Kids Age</label>
                  <input type="text" class="form-control" name="child_age" value="" placeholder="Enter Kids Age">
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
                              <!-- <th class="col-lg-1"><a id="addrow" style="font-size:21px; cursor:pointer"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></th>     -->
                            </tr>
                          </thead> 
                          <tbody id="tourcardtablebody">
                            <tr>
                              <td>
                               <input type="text" style="width:150px;" class="form-control" name="start_date[]" onchange="start_date_check(1)" value="" id="firstdate_1" required="true">
                              </td>
                              <td>
                                <input type="text"
                                  placeholder="enter city"
                                  class="form-control flexdatalist"
                                  data-data='<?php echo json_encode($cities);?>'
                                  data-search-in='city_name'
                                  data-visible-properties='["city_name","state_name","country_name"]'
                                  data-selection-required="true"
                                  data-value-property='id'
                                  data-min-length="2"
                                  name='from_city[]' id="fromcity_1" required>
                              </td>
                              <td>
                                <input type="text"
                                  placeholder="enter city"
                                  class="form-control flexdatalist"
                                  data-data='<?php echo json_encode($cities);?>'
                                  data-search-in='city_name'
                                  data-visible-properties='["city_name","state_name","country_name"]'
                                  data-selection-required="true"
                                  data-value-property='id'
                                  data-min-length="2"
                                  name='to_city[]' id="getcity" required>
                              </td>
                              <td>
                               <select class="form-control" style="width:100px;" name="travel_by[]">
                               <option value="">select</option>
                               <option value="air">Air</option>
                               <option value="train">Train</option>
                               <option value="cab">Cab</option>
                               <option value="bus">Bus</option>
                               <option value="cruise">Cruise</option>
                               </select> 
                              </td>
                              <td>
                               <input type="text" style="width:130px;" class="form-control" name="write_box[]" value="">
                              </td>
                              <td>
                                    <div class="form-group">
                                        <div class="input-group bootstrap-timepicker">
                                        <input type="text" name="start_time[]" id="checkInTime_1" class="form-control" style="width:80px;"/>
                                            <div class="input-group-addon">
                                                <i class="fa fa-clock-o"></i>
                                            </div>
                                        </div>
                                    </div>
                              </td>
                              <td>
                                    <div class="form-group">
                                        <div class="input-group bootstrap-timepicker">
                                        <input type="text" name="end_time[]" id="checkOutTime_1" class="form-control" style="width:80px;"/>
                                            <div class="input-group-addon">
                                                <i class="fa fa-clock-o"></i>
                                            </div>
                                        </div>
                                    </div>
                              </td>
                              <td>
                                <input type="text"
                                  placeholder="enter city"
                                  class="form-control flexdatalist"
                                  data-data='<?php echo json_encode($cities);?>'
                                  data-search-in='city_name'
                                  data-visible-properties='["city_name","state_name","country_name"]'
                                  data-selection-required="true"
                                  data-value-property='id'
                                  data-min-length='2'
                                  name='city[]' id="to_city_1" onchange="city_arr1()" required>
                              </td>
                              <td>
                                <select class="form-control" name="hotel_filter[]" style="width:130px;" value="" id="gethotel">
                                   <option value="">select</option>
                                </select>
                              </td>
                              <td>
                                   <input type="text" style="width:150px;" class="form-control" name="check_in[]" id="check_in_1" value="" required>
                              </td>
                              <td>
                                   <input type="text" style="width:150px;" class="form-control" name="check_out[]" onchange="dat_arr1()" id="check_out_1" value="" required>
                              </td>
                              <td>
                                <select class="form-control" name="vendor_name[]" id="vendor_1" style="width:150px;" value="" required>
                                 <option value="">select</option>
                                 <?php if(!empty($vendors)){
                                 foreach($vendors as $vendor) { ?>
                                 <option value="<?php echo "VND".$vendor->vendorId;?>"><?php echo $vendor->company_name;?></option>
                                 <?php }
                                  } ?>
                                 <?php if(!empty($partners_hotel)){
                                 foreach($partners_hotel as $hotels) { ?>
                                 <option value="<?php echo "HTL".$hotels->hotel_id;?>"><?php echo $hotels->hotel_name;?></option>
                                 <?php }
                                  } ?>
                                </select>
                              </td>
                              <td>
                               <input type="text" style="width:100px;" class="form-control FC_cost" name="cost[]" id="oc_cost1" onkeyup="calculate_other_price()" value="" placeholder="Enter Cost" required>
                              </td>
                              <td>
                                <a tabindex="0" style="cursor:pointer; font-size: 21px;" class="addnewrow"><i class="fa fa-plus-circle" aria-hidden="true"></i></a>
                                <input type="hidden" name="totaldays" value="1" id="count_row">
                                
                              </td>
                                    
                            </tr>
                            
                          </tbody>
                       </table>
                   </div>
               </div>
             </div>
             <!---dynamic table end--->
             <div class="row" style="margin-top:10px;" id="gstprcntselection">
                <div class="col-md-12">
                    <div class="col-md-9" id="gstinclcheked">
                     <label class="" style="font-size: 18px;"><input type="radio" name="gstINCL[]" id="18onSC" value="18onsc" checked>18% On Service Charge </label>&nbsp;
                     <label class="" style="font-size: 18px;"><input type="radio" name="gstINCL[]" id="18onPC" value="18onpc"> 18% On Package Cost </label>&nbsp;
                     <label class="" style="font-size: 18px;"><input type="radio" name="gstINCL[]" id="5onPC" value="5onpc"> 5% On Package Cost </label>
                    </div>
                    <div class="col-md-9" id="gstexclcheked" style="display:none;">
                     <label class="" style="font-size: 18px;"><input type="radio" name="gstEXCL[]" id="excl18onSC" value="18onsc" disabled> 18% On Service Charge </label>&nbsp;
                     <label class="" style="font-size: 18px;"><input type="radio" name="gstEXCL[]" id="excl18onPC" value="18onpc" disabled> 18% On Package Cost </label>&nbsp;
                     <label class="" style="font-size: 18px;"><input type="radio" name="gstEXCL[]" id="excl5onPC" value="5onpc" disabled> 5% On Package Cost </label>
                    </div>
                </div>
             </div>
             <div class="row" style="margin-top:10px;">
                <div class="col-md-12">
                 <div class="col-md-10">
                  <label style="float:right;font-size: 18px;">OC :</label>
                 </div>
                 <div class="col-md-2">
                  <input type="text" class="form-control" id="oc_cost2" name="totalcost" value="" readonly>
                 </div>
                </div>
             </div>
             <div class="row" style="margin-top:5px;">
                <div class="col-md-12">
                 <div class="col-md-10">
                  <label style="float: right;font-size: 18px;">PC :</label>
                 </div>
                 <div class="col-md-2">
                            
                  <input type="number" class="form-control" id="pc_cost" name="packagecost" value="">
                  
                 </div>
                </div>
             </div>
             <!------------------------------------------------>
             
             <div class="row" style="margin-top:5px;" id="gstselDiv">
                 <div class="col-md-12">
                     <div class="col-md-10">
                         <label style="float:right; font-size: 18px;"><input type="radio" name="gstinclorexcl[]" id="gstinclchkbx" value="gstincluded" checked> GST Included</label>
                     </div>
                     <div class="col-md-2">
                         <label style="font-size: 18px;"><input type="radio" name="gstinclorexcl[]" id="gstexclchkbx" value="gstexcluded"> GST Excluded</label>
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
                         <input type="text" class="form-control" name="cgsttot" id="nwCGST" readonly>
                     </div>
                 </div>
                 
                 <div class="col-md-12" id="sgstdiv" style="margin-top:5px;">
                     <div class="col-md-10">
                         <label style="float:right; font-size: 18px;">SGST:</label>
                     </div>
                     <div class="col-md-2">
                         <input type="text" class="form-control" name="sgsttot" id="nwSGST" readonly>
                     </div>
                 </div>
                 <div class="col-md-12" style="margin-top:5px;" id="igstdiv">
                     <div class="col-md-10">
                         <label style="float:right; font-size: 18px;">IGST:</label>
                     </div>
                     <div class="col-md-2">
                         <input type="text" class="form-control" name="igsttot" id="nwIGST" readonly>
                     </div>
                 </div>
                 <div class="col-md-12" style="margin-top:5px;">
                     <div class="col-md-10">
                         <label style="float:right; font-size: 18px;">Profit:</label>
                     </div>
                     <div class="col-md-2">
                         <input type="text" class="form-control" name="profit" id="nwProfit" readonly>
                     </div>
                 </div>
             </div>
             <div class="row" style="margin-top:5px;" id="">
                 <div class="col-md-12">
                     <div class="col-md-10">
                         <label style="float:right; font-size: 18px;">Total PC:</label>
                     </div>
                     <div class="col-md-2">
                         <input type="text" class="form-control" name="totalpakcost" id="nwtotalPcCost" readonly>
                     </div>
                 </div>
                 
             </div>
             <!------------------------------------------------>
              
             <!--<div class="row" style="display:none;">-->
             <!--   <div class="col-md-12">-->
             <!--    <div class="col-md-10">-->
             <!--     <label style="float: right;font-size: 18px;">Total PC:</label>-->
             <!--    </div>-->
             <!--    <div class="col-md-2">-->
             <!--     <input type="text" class="form-control" id="tc_cost" name="totalpakcost" value="" readonly>-->
             <!--    </div>-->
             <!--   </div>-->
             <!--</div>-->
             <!------------------------------------------------>
             
             
            </div>
             </fieldset>
        <br></br>
      <div class="clearfix pt20">
        <div class="pull-right">
            <?php if($roleId == ROLE_ADMIN) {?>
            <a href="<?php echo base_url(PARTNER) ?>/dashboard" class="btn btn-warning">Cancel</a>
            <?php } else {?>
          <a href="<?php echo base_url(PARTNER) ?>/confirmedQuery" class="btn btn-warning">Cancel</a>
          <?php }?>
          <button class="btn-primary btn">Submit</button>
        </div>
      </div>
    </form>
  </div>
</div>
</div> <!-- .container-fluid -->
<!-- #page-content -->
</div>
<?php
    if($this->uri->segment(2) == 'NewTourCard') { ?>
      <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/form-ckeditor/ckeditor.js"></script>
      <script type="text/javascript" src="<?php echo base_url(); ?>assets/demo/pagejs/partner/tourcard.js"></script>
      <script type="text/javascript" src="<?php echo base_url(); ?>assets/jquery-flexdatalist-2.3.0/jquery.flexdatalist.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url(); ?>jquery-validation/dist/jquery.validate.js"></script>
<?php
    }
?>
<style>
    .grid-form input[type="text"]{
      border: 0.5px solid lightgray;
      background: #fafafa;
      height: 34px;
      border-radius: 2px;
      font-size: 13px;
    }
    
    .bootstrap-select .dropdown-menu {
     width: inherit;
    
    }
   
   .bootstrap-select > .dropdown-toggle.bs-placeholder, .bootstrap-select > .dropdown-toggle.bs-placeholder:active, .bootstrap-select > .dropdown-toggle.bs-placeholder:focus, .bootstrap-select > .dropdown-toggle.bs-placeholder:hover {
    
    height: 37px;
    }
    .dropdown-menu > .active > a, .dropdown-menu > .active > a:hover, .dropdown-menu > .active > a:focus, .tt-suggestion > p:hover, .tt-suggestion > p:focus, .tt-suggestion.tt-cursor > p {
    background-color: #777474;
    }
   
   .fromcity_1-flexdatalist{
    min-width:140px;
    }
   
   .flexdatalist-results{
    min-width: 300px;
    cursor: pointer;
    }
   /*.flexdatalist-results:hover{*/
   /* color:blue;*/
   /*}*/
   .getcity-flexdatalist{
    min-width:140px;
    }
   .to_city_1-flexdatalist{
     min-width:140px;
    }
    
    .error{
        color:red;
    }

</style>
<script type="text/javascript">

    $(document).on("click", "#other_remove", function(){
    	$(this).closest('tr').remove();
		calculate_other_price();
		var count = $("#count_row").val();
		count--;
		$("#count_row").val(count);
		
	});
	
	$(document).on('keypress', '.FC_cost', function(e){
	    
        //if the letter is not digit then display error and don't type anything
        if(e.which != 8 && e.which !== 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        //$("#errmsg").html("Digits Only").show().fadeOut("slow");
         return false;
        }
        
	});
	
	$(document).ready(function(){
	    
	    var turCardForm = $("#turCardForm");
	    var validator = turCardForm.validate({
		
		rules:{
		    queryType :{ required :true },
			pax_name :{ required : true },
			arrival_date :{ required : true },
			departure_date :{ required : true },
			nights :{ required : true },
			country :{ required : true },
			party :{ required : true },
			file_no :{ required : true },
			adult :{ required : true},
			'start_date[]' :{ required : true },
			'from_city[]' :{ required : true },
			'to_city[]' :{ required : true },
			'city[]' :{ required : true },
			'check_in[]' :{ required : true },
			'check_out[]' :{ required : true },
			'vendor_name[]' :{ required : true },
			'cost[]' :{required : true }
        },
		messages:{
		    queryType :{ required : "Select Query Type" },
			pax_name :{ required : "Enter Pax Name" },
			arrival_date :{ required : "Enter Arrival Date" },
			departure_date :{ required : "Enter Departure Date" },
			nights :{ required : "Select Stay Duration" },
			country :{ required : "Select Nationality" },
			party :{ required : "Select Party" },
			file_no :{ required : "Enter File No" },
			adult :{ required : "Enter No of Adults" },
			'start_date[]' :{ required : "Date is required" },
			'from_city[]' :{ required : "From City is required" },
			'to_city[]' :{ required : "To City is required" },
			'city[]' :{ required : "City is required" },
			'check_in[]' :{required : "Check in date is required" },
			'check_out[]' :{ required : "Check out date is required" },
			'vendor_name[]' :{ required : "Select Vendor" },
			'cost[]' :{required : "Enter Cost" }
        }
        
        });
        
	   var chkprty = $('#srchParty').flexdatalist('value');
	   var chkprtyAddr = $("#clntAddr").val();
	   if(chkprty == ''){
	       $("#cgstdiv").css("display","none");
	       $("#sgstdiv").css("display","none");
           $("#igstdiv").css("display","none");
           //$("#gstinclcheked").css("display","none");
           $("#gstprcntselection").css("display","none");
           $("#gstselDiv").css("display","none");
	   }
	   if(chkprtyAddr == ''){
	       $("#cgstdiv").css("display","none");
	       $("#sgstdiv").css("display","none");
           $("#igstdiv").css("display","none");
           //$("#gstinclcheked").css("display","none");
           $("#gstprcntselection").css("display","none");
           $("#gstselDiv").css("display","none");
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
	
	
</script>
<script>
  $(function(){
    
    $('#getcity').on('change',function(){
		var base_url = $('#baseurl').val();
        var city_id = $('#getcity').val();
        //$("#tocity").val(city_id);
        $.ajax({
		    type: 'POST',
		    url: base_url +'/getHotelByCity',
		    data: {id:city_id},
		    beforeSend: function() {
		    	$("#custom-loader").css("display","block");
		    },
		    success: function(data) {
		    	if (data == '[]' || data == 0) {
		    		$('#gethotel').find('option').remove();
		    		//swal("Oops!!", "No hotel Found for this City!", "error");
		    		$("#gethotel").append('<option value = "">Select Hotel</option>');
		    	}else{
		    		$('#gethotel').find('option').remove();
		    		$("#gethotel").append('<option value = "">Select Hotel</option>');
		    		$.each(JSON.parse(data), function(key,val) {
            			$("#gethotel").append('<option value = "'+val.hotel_id+'">'+val.hotel_name+'</option>')
        			});
		    	}
		    },
		    complete: function() {
		    	$("#custom-loader").css("display","none");
		    }
		  });
    });
    
    $('#to_city_1').on('change',function(){
		    var base_url = $('#baseurl').val();
        var city_id = $('#to_city_1').val();
        //$("#tocity").val(city_id);
        $.ajax({
		    type: 'POST',
		    url: base_url +'/getHotelByCity',
		    data: {id:city_id},
		    beforeSend: function() {
		    	$("#custom-loader").css("display","block");
		    },
		    success: function(data) {
		    	if (data == '[]' || data == 0) {
		    		$('#gethotel').find('option').remove();
		    		//swal("Oops!!", "No hotel Found for this City!", "error");
		    		$("#gethotel").append('<option value = "">Select Hotel</option>');
		    	}else{
		    		$('#gethotel').find('option').remove();
		    		$("#gethotel").append('<option value = "">Select Hotel</option>');
		    		$.each(JSON.parse(data), function(key,val) {
            			$("#gethotel").append('<option value = "'+val.hotel_id+'">'+val.hotel_name+'</option>')
        			});
		    	}
		    },
		    complete: function() {
		    	$("#custom-loader").css("display","none");
		    }
		  });
    });

    
    $("#getcity").on('change', function(){
          //var selectedText = $("#getcity option:selected").val();
          var selectedText = $(this).val();
          $("#to_city_1").val(selectedText);
       
        });
        
});

</script>
<script type="text/javascript">

$(document).on("focus", '#tourcardtable #tourcardtablebody a[class=addnewrow]', function() {

    var count = parseInt($("#count_row").val());
    
    var hotels    = '<?php echo json_encode($partners_hotel);?>';
    var vendors   = '<?php echo json_encode($vendors);?>';
    var check_out = $("#check_out_"+count).val();
    var strtdt    = $("#startdate").val();
    var enddt     = $("#enddate").val();
    var cityarr   = $("#to_city_"+count).val();
    var id        = count+1;
    var td_id     = 'other_rows_'+id;
		var new_rows ='<tr id="other_rows_"'+id+'"><td><input type="text" style="width:150px;" class="form-control from_date" id="start_date_'+id+'" onchange="start_date_check('+id+')" name="start_date[]" required></td>';
//         new_rows += '<td class="col-md-2"><select class="form-control" id="fromcity_'+id+'" name="from_city[]" style="width:100%;"><option value="">select city</option>';
// 		$.each(JSON.parse(cities), function(index, element) {
		
// 			new_rows += '<option value="'+element.id+'">'+element.city_name+'</option>';
		
//         });
// 		new_rows +='</select></td>';
        new_rows +='<td class="col-md-2"><input type="text" placeholder="enter city" class="form-control" name="from_city[]" id="fromcity_'+id+'" required></td>';
// 		new_rows +='<td class="col-md-2"><select id="get_city'+id+'" class="form-control" name="to_city[]" style="width:100%;"><option value="">select city</option>';
// 		$.each(JSON.parse(cities), function(index, element) {
		
// 			new_rows += '<option value="'+element.id+'">'+element.city_name+'</option>';
		
//         });
// 		new_rows +='</select></td>';
        new_rows +='<td class="col-md-2"><input type="text" placeholder="enter city" class="form_control" name="to_city[]" id="get_city'+id+'" required></td>';
		new_rows +='<td><select class="form-control" id="" name="travel_by[]"><option>select</option><option value="air">Air</option><option value="train">Train</option><option value="cab">Cab</option><option value="bus">Bus</option><option value="sea">Sea</option></select></td>';
		new_rows +='<td><input type="text" class="form-control" id="" name="write_box[]"></td>';
		new_rows +='<td class="col-md-3"><div class="form-group"><div class="input-group bootstrap-timepicker"><input autocomplete="off" type="text" name="start_time[]" class="form-control" id="checkInTime_'+id+'" style="width:80px;"/><div class="input-group-addon"><i class="fa fa-clock-o"></i></div></div></div></td>';
		new_rows +='<td class="col-md-3"><div class="form-group"><div class="input-group bootstrap-timepicker"><input autocomplete="off" type="text" name="end_time[]" id="checkOutTime_'+id+'" class="form-control"  style="width:80px;"/><div class="input-group-addon"><i class="fa fa-clock-o"></i></div></div></div></td>';
// 		new_rows +='<td class="col-md-2"><select id="to_city_'+id+'" onchange="city_arr1()" class="form-control custom-select" name="city[]" style="width:100%;"><option value="">Select City</option>';
// 		$.each(JSON.parse(cities), function(index, element) {

//         new_rows += '<option value="'+element.id+'">'+element.city_name+'</option>';
      
//         });
// 		new_rows +='</select></td>';
        new_rows +='<td class="col-md-2"><input type="text" placeholder="enter city" onchange="city_arr1()" class="form_control" name="city[]" id="to_city_'+id+'" required></td>';
		new_rows +='<td class="col-md-2"><select id="get_hotel'+id+'" class="form-control" name="hotel_filter[]" style="width:100%;"><option value="">Select</option>';

		new_rows +='</select></td>';
		new_rows +='<td><input type="text" class="form-control chkinDate" style="width:150px;" name="check_in[]" id="check_in_'+id+'" required></td>';
		new_rows +='<td><input type="text" class="form-control chkoutDate" style="width:150px;" onchange="dat_arr1()" id="check_out_'+id+'" name="check_out[]" required></td>';
		new_rows +='<td><select class="form-control" id="vendor_'+id+'" name="vendor_name[]" required><option value="">Select</option>';
		$.each(JSON.parse(vendors), function(index, element) {
		
			new_rows += '<option value="VND'+element.vendorId+'">'+element.company_name+'</option>';
		
        });
  	    $.each(JSON.parse(hotels), function(index, element) {
		
			new_rows += '<option value="HTL'+element.hotel_id+'">'+element.hotel_name+'</option>';
		
        });
		new_rows +='</select></td>';
		new_rows +='<td><input type="text" class="form-control FC_cost" name="cost[]" id="oc_cost1" onkeyup="calculate_other_price()" placeholder="Enter cost" required></td>';
        new_rows +='<td><a tabindex="0" style="font-size: 21px; cursor:pointer;" class="addnewrow"><i class="fa fa-plus-circle" aria-hidden="true"></i></a><br><a style="font-size: 21px; color: red; cursor:pointer" id="other_remove" rel="+id+"><i class="fa fa-minus-circle" aria-hidden="true"></i></a>';
    
        new_rows +='</td></tr>';
        
    // var confirmtrue = confirm("Do you want new row?");
    // if(confirmtrue == true){

    //  $("#tourcardtablebody").append(new_rows);
    //  $("#count_row").val(id);
    // }
    
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
         //window.onkeydown = null;
         //document.onclick = null;
        document.getElementById('fromcity_'+id).focus();
        
        //   $("#start_date_"+id).datepicker("show"); 
        
       }
       else{
        document.getElementById('oc_cost2').focus();

       }

       //$("#get_city2-flexdatalist").css('height', '34px');

       $("#checkInTime_"+id).timepicker({
				showInputs: false,
				showSeconds: false,
				showMeridian: true,
				defaultTime: false
		});
			
		$("#checkOutTime_"+id).timepicker({
				showInputs: false,
				showSeconds: false,
				showMeridian: true,
				defaultTime: false
		});

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
        //alert(city_id);
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

     //$("#to_city_"+id).select2();
     
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

           
        $("#get_city"+id).on('change', function(){
          var selectedText = $(this).val();
          $("#to_city_"+id).val(selectedText);
          //$("#igsttxt").text(value);
        });
        
        //$("#start_date_"+id).datepicker("show");
        
        $("#start_date_"+id).datepicker({
            format:'dd/mm/yyyy',
        }).on('changeDate', function(ev){
            $("#check_in_"+id).val(ev.date);
            $("#check_in_"+id).datepicker('setDate', ev.date);
            $("#start_date_"+id).datepicker('hide');
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
        
        $("#start_date_"+id).val(check_out);
        
        $("#start_date_"+id).datepicker('setStartDate', strtdt);
        $("#start_date_"+id).datepicker('setEndDate', enddt);
        $("#check_in_"+id).val(check_out);

        $("#check_in_"+id).datepicker('setStartDate', strtdt);
        $("#check_in_"+id).datepicker('setEndDate', enddt);
        $("#check_out_"+id).datepicker('setEndDate', enddt);
        // $("#check_out_"+id).datepicker('setDate', ev.date);
        
        
        $("#fromcity_"+id).val(cityarr);
        
        // $(".from_date").datepicker({
        //   format: 'dd/mm/yyyy'
        // }).on('changeDate', function(ev){
        //     $(".from_date").datepicker('hide');
        // });
        // $(".chkinDate").datepicker({
        //     format:'dd/mm/yyyy'
        // }).on('changeDate', function(ev){
        //     $(".chkinDate").datepicker('hide');
        // });
        
        // $(".chkoutDate").datepicker({
        //     format:'dd/mm/yyyy'
        // }).on('changeDate', function(ev){
        //     $(".chkoutDate").datepicker('hide');
        // });
    });
    
        
});

    function start_date_check(val1)
	{
		var date_str = $("#start_date_"+val1).val();
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
// 		    var check_out= $("#check_out_"+a).val();
// 		    $("#start_date_"+id).val(check_out);
// 			$("#check_in_"+id).val(check_out);
            var check_out= $("#check_out_"+a).val();
            $("#check_out_"+a).datepicker({
                format:'dd/mm/yyyy',
            }).on('changeDate', function(ev){
                //$("#start_date_"+id).val(ev.date);
		        //$("#start_date_"+id).datepicker('setDate', ev.date);
		        
		        $("#check_out_"+a).datepicker('hide');
            });
            $("#start_date_"+id).datepicker({
		        format:'dd/mm/yyyy',
		        //startDate: new Date()
		    }).on('changeDate', function(ev){
		        
		        //var frstdatval = ('#firstdate_1').val();
		        $("#check_in_"+id).val(ev.date);
		        $("#check_in_"+id).datepicker('setDate', ev.date);
		        //$("#check_in_1").datepicker('setStartDate', ev.date);
		        $("#start_date_"+id).datepicker('hide');
		    });
		    
		    $("#check_in_"+id).datepicker({
		        format:'dd/mm/yyyy',
		        //startDate: new Date()
		    }).on('changeDate', function(ev){
		        
		        //var frstdatval = ('#firstdate_1').val();
		        //$("#start_date_"+id).val(ev.date);
		        //$("#start_date_"+id).datepicker('setDate', ev.date);
		        $("#check_out_"+id).datepicker('setStartDate', ev.date);
		        $("#check_in_"+id).datepicker('hide');
		    });
		    
		    $("#start_date_"+id).datepicker('setStartDate', strtdt);
		    $("#start_date_"+id).datepicker('setEndDate', enddt);
			//$("#check_in_"+id).val(check_out);
			
		    $("#check_in_"+id).datepicker('setStartDate', strtdt);
		    $("#check_in_"+id).datepicker('setEndDate', enddt);
		    $("#check_out_"+id).datepicker('setEndDate', enddt);
		    
		    
		}
	}

    function city_arr1()
    {
      var count = parseInt($("#count_row").val());

      for(a=1;a<=count;a++)
      {
        var id= a+1;
        var cityarr = $("#to_city_"+a).val();
        $("#fromcity_"+id).val(cityarr);
      }
    }

</script>