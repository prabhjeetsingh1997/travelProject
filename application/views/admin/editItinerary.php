<?php
error_reporting(0);
$CI =& get_instance();
$CI->load->model('admin_model');
$arrStateId=explode(',',$itinerary_details->state);
$arrCityId=explode(',',$itinerary_details->city);
$arrState=$CI->admin_model->getStateByCountryId($itinerary_details->country);
$j=0;
foreach($arrStateId as $value)
{
    $cityName=$CI->admin_model->getCityByStateId($value);
    foreach($cityName as $newCity)
    {
        $newCityArr[$j] = $newCity;
        $j++;
    }
}
?>
<div id="wrapper">
<div id="layout-static">
<div class="static-content-wrapper">
<div class="static-content">
<div class="page-content">
<ol class="breadcrumb">
   <li><a href="<?php echo base_url(ADMIN_URL) ?>/dashboard">Home</a></li>
   <li><a href="#">Edit Itinerary</a></li>
</ol>
<div class="page-heading">
   <h1>Edit Itinerary</h1>
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
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        
        <!-- Main content -->
        <section class="content">
         <div class="tabbable-panel margin-tops4 ">
            <div class="tabbable-line">
            <ul class="nav nav-tabs tabtop  tabsetting">
               <li <?php if($tab == 1){ echo 'class="active"';}else{echo 'class="disabled"';}?>> <a <?php if($tab != 1){ echo 'class="disabled"';}?> href="#tab_default_1" data-toggle="tab" title="Click next to open"> Step 1 <br>Itinerary Basic Details</a> </li>
               <li <?php if($tab == 2){ echo 'class="active"';}else{echo 'class="disabled"';}?>> <a <?php if($tab != 2){ echo 'class="disabled"';}?> href="#tab_default_2" data-toggle="tab" title="Click next to open"> Step 2 <br>Itinerary Details </a> </li>
            </ul>
             <div class="tab-content margin-tops">
             <div class="tab-pane fade <?php if($tab == 1){ echo "active in";}?>" id="tab_default_1">
            <div class="box box-default">           
                <div id="status"></div>
                <div class="tab-content">
                <div id="home" class="tab-pane fade in active">
                <form role="form" method="POST" name="itinerary_management" id="update_itinerary_management">
                <input type="hidden" name="type" value="update_itinerary_management" >
                <input type="hidden" name="itinerary_id" value="<?php echo $itinerary_details->id; ?>">
                <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Country <span style="color:red;">*</span></label>
                                        <select class="form-control select2" name="country[]" id="itcountry" multiple="multiple" data-placeholder="Select a Country" required="true"> 
                                        <option value="">--Select Country--</option>
                                         <?php if(!empty($countries)){
                                            foreach ($countries as $country) { ?>
                                             <option value="<?php echo $country->id?>" <?php if($country->id == $itinerary_details->country){ echo "selected"; } ?>><?php echo $country->country_name; ?></option>
                                        <?php }
                                          } ?>
                                        </select>
                                    </div>
                                    </div>
                                     <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">State <span style="color:red;">*</span></label>
                                            <select class="form-control select2" name="state[]" id="itstate" multiple="multiple" data-placeholder="Select a State" required="true">
                                            <option value="">--Select State--</option>
                                            <?php
                                                foreach($arrState as $state)
                                                {
                                                    foreach($arrStateId as $value)
                                                    {
                                                ?>
                                                <option value="<?php echo $state->id;?>" <?php if($state->id == $value){echo "selected";}?>><?php echo $state->state_name;?></option>
                                            <?php
                                                    }
                                                }
                                            ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="name">City <span style="color:red;">*</span></label>
                                                <select class="form-control select2" name="city[]" id="itcity" multiple="multiple" data-placeholder="Select a City" required="true">
                                                <option value="">--Select City--</option>
                                                <?php
                                            
                                                    foreach($newCityArr as $city)
                                                    {
                                                        $city_name = $city->city_name;
                                                        $cityId = $city->id;
                                                        in_array($cityId, $arrCityId)
                                                    ?>
                                                <option value="<?php echo $cityId;?>" <?php if(in_array($cityId, $arrCityId)){ echo "selected"; } ?>><?php echo $city_name;?></option>
                                                <?php 
                                                    }
                                                ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div><!-- /.form-group -->
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name">Title <span style="color:red;">*</span></label>
                                                <input type="text" class="form-control" name="title" id="title" value="<?php echo $itinerary_details->title;?>" placeholder="Title" required="true" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                             <label for="name">Details </label>
                                                <input type="text" class="form-control" name="iteDurationDetail" id="iteDurationDetail" value="<?php echo $itinerary_details->duration_detail; ?>" placeholder="Detail"/>
                                            </div>
                                        </div><!-- /.form-group -->
                                    </div><!-- /.form-group -->
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="name">Duration</label>
                                                <input type="number" class="form-control" name="duration" value="<?php echo $itinerary_details->duration; ?>" id="duration" placeholder="Duration"/>
                                            </div>
                                        </div>
                                </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="col-md-12" id="durationTable">
                                                <table class="table table-bordered" class="col-md-12">
                                                    <thead>
                                                      <tr>
                                                        <th class="col-md-1">Day</th>
                                                        <th class="col-md-2">City</th>
                                                        <!-- <th class="col-md-1">Vehicle 1</th>
                                                        <th class="col-md-1">Price</th>
                                                        <th class="col-md-1">Vendor 1</th>
                                                        <th class="col-md-1">Vehicle 2</th>
                                                        <th class="col-md-1">Price</th>
                                                        <th class="col-md-1">Vendor 2</th>
                                                        <th class="col-md-1">Vehicle 3</th>
                                                        <th class="col-md-1">Price</th>
                                                        <th class="col-md-1">Vendor 3</th> -->
                                                      </tr>
                                                    </thead>
                                                    <tbody>
                                                <?php
                                                for($i=1; $i<=$itinerary_details->duration; $i++)
                                                {
                                                ?>      
                                                  <tr>
                                                        <input type="hidden" name="cost_<?php echo $i; ?>" value="<?php echo $itinerary_vehicle[$i-1]->id; ?>">
                                                    <td><?php echo $i; ?></td>
                                                    <td>
                                                        <select id="tblCity_<?php echo $i; ?>" name="tblCity_<?php echo $i; ?>" class="form-control durationDrop">
                                                            <option value="">--Select City--</option>
                                                            <?php foreach ($newCityArr as $city) { ?>
                                                                <option value="<?php echo $city->id; ?>" <?php if($city->id == $itinerary_vehicle[$i-1]->duration_city ){ echo "selected";} ?>><?php echo $city->city_name; ?></option>     
                                                        <?php }
                                                            ?>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <!-- <select id="tblVehicle_<?php //echo $i; ?>" name="tblVehicle_1_<?php //echo $i; ?>" class="form-control durationDrop">
                                                            <option value="">--Select Vehicle--</option>
                                                            <?php //foreach ($durationsVehicle as $vehicle) { ?>
                                                                <option value="<?php //echo $vehicle['id']; ?>" <?php //if($vehicle['id'] == $itinerary_vehicle[$i-1]->vehicle_1 ){ echo "selected";} ?>><?php //echo $vehicle['vehicle_name']; ?></option>     
                                                            <?php //}
                                                            ?>
                                                        </select> -->
                                                    </td>
                                                    <td>
                                                        <!-- <input type="text" id="tblPrice_<?php //echo $i; ?>" name="tblPrice_1_<?php //echo $i; ?>" value="<?php //echo $itinerary_vehicle[$i-1]->price_1; ?>" class="form-control durationDrop"> -->
                                                    </td>
                                                    <td>
                                                        <!-- <select id="tblVendor_<?php //echo $i; ?>" name="tblVendor_1_<?php //echo $i; ?>" class="form-control durationDrop">
                                                         <option value="">--Select Vendor--</option>
                                                         <?php //foreach ($durationsVendors as $vendors) {
                                                          ?>
                                                                <option value="<?php //echo $vendors['vendorId']; ?>" <?php //if($vendors['vendorId'] == $itinerary_vehicle[$i-1]->vendor_1 ){ echo "selected";} ?>><?php //echo $vendors['company_name']; ?></option>     
                                                            <?php //}
                                                            ?> 
                                                        </select> -->
                                                    </td>
                                                    <td>
                                                        <!-- <select id="tblVehicle_<?php //echo $i; ?>" name="tblVehicle_2_<?php //echo $i; ?>" class="form-control durationDrop">
                                                        <option value="">--Select Vehicle--</option>
                                                            <?php //foreach ($durationsVehicle as $vehicle) { ?>
                                                                <option value="<?php //echo $vehicle['id']; ?>" <?php //if($vehicle['id'] == $itinerary_vehicle[$i-1]->vehicle_2 ){ echo "selected";} ?>><?php //echo $vehicle['vehicle_name']; ?></option>     
                                                            <?php //}
                                                            ?>
                                                        </select> -->
                                                    </td>
                                                    <td>
                                                        <!-- <input type="text" id="tblPrice_<?php //echo $i; ?>" name="tblPrice_2_<?php //echo $i; ?>" value="<?php// echo $itinerary_vehicle[$i-1]->price_2; ?>" class="form-control durationDrop"> -->
                                                    </td>
                                                    <td>
                                                        <!-- <select id="tblVendor_<?php //echo $i; ?>" name="tblVendor_2_<?php //echo $i; ?>" class="form-control durationDrop">
                                                        <option value="">--Select Vendors--</option>
                                                             <?php //foreach ($durationsVendors as $vendors) { ?>
                                                                <option value="<?php //echo $vendors['vendorId']; ?>" <?php //if($vendors['vendorId'] == $itinerary_vehicle[$i-1]->vendor_2 ){ echo "selected";} ?>><?php //echo $vendors['company_name']; ?></option>     
                                                            <?php //}
                                                            ?> 
                                                        </select> -->
                                                    </td>
                                                    <td>
                                                        <!-- <select id="tblVehicle_<?php //echo $i; ?>" name="tblVehicle_3_<?php //echo $i; ?>" class="form-control durationDrop">
                                                         <option value="">--Select Vehicle--</option>
                                                            <?php //foreach ($durationsVehicle as $vehicle) { ?>
                                                                <option value="<?php //echo $vehicle['id']; ?>" <?php //if($vehicle['id'] == $itinerary_vehicle[$i-1]->vehicle_3 ){ echo "selected";} ?>><?php// echo $vehicle['vehicle_name']; ?></option>     
                                                            <?php //}
                                                            ?>
                                                        </select> -->
                                                    </td>
                                                    <td>
                                                        <!-- <input type="text" id="tblPrice_<?php //echo $i; ?>" name="tblPrice_3_<?php //echo $i; ?>" value="<?php //echo $itinerary_vehicle[$i-1]->price_3; ?>" class="form-control durationDrop"> -->
                                                    </td>
                                                    <td>
                                                        <!-- <select id="tblVendor_<?php //echo $i; ?>" name="tblVendor_3_<?php //echo $i; ?>" class="form-control durationDrop">
                                                        <option value="">--Select Vehicle--</option>
                                                            <?php //foreach ($durationsVendors as $vendors) { ?>
                                                                <option value="<?php //echo $vendors['vendorId']; ?>" <?php //if($vendors['vendorId'] == $itinerary_vehicle[$i-1]->vendor_3 ){ echo "selected";} ?>><?php //echo $vendors['company_name']; ?></option>     
                                                            <?php //}
                                                            ?>
                                                        </select> -->
                                                    </td>
                                                  </tr>
                                                <?php   
                                                }
                                                ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="col-md-12" id="totalprice">
                                                <!-- <table>
                                                    <tr>
                                                        <td class='col-md-1'></td>
                                                        <td class='col-md-1'></td>
                                                        <td class='col-md-2' align='right'>Total Price 1</td>
                                                        <td class='col-md-1'><input type='text' readonly class='form-control' name='vehicle_1_total' value="<?php //echo $itinerary_details->vehicle_1_total; ?>"></td>
                                                        <td class='col-md-2' align='right'>Total Price 2</td>
                                                        <td class='col-md-1'><input type='text' readonly class='form-control' name='vehicle_2_total' value="<?php //echo $itinerary_details->vehicle_2_total; ?>"></td>
                                                        <td class='col-md-2' align='right'>Total Price 3</td>
                                                        <td class='col-md-1'><input type='text' readonly class='form-control' name='vehicle_3_total' value="<?php //echo $itinerary_details->vehicle_3_total; ?>"></td>
                                                        <td class='col-md-1'></td>
                                                    </tr>
                                                </table> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" id="addvehicledetails">
                                    
                                   <?php
                                    $k = 1; 
                                   foreach($multiple_vehicle as $allvehicle) {?>
                                    <input type="hidden" name="allvehicleid[]" value="<?php echo $allvehicle->id; ?>">
                                     
                                    <div class="col-md-12">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="name">Vehicle</label>
                                                <input type="text" class="form-control" name="vehicle_name[]" id="" placeholder="Enter Vehicle" value="<?php echo $allvehicle->vehicle_name;?>">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                            <label>From Day</label>
                                             <select class="form-control" name="from_day[]" id="from_day<?php echo $k; ?>" placeholder="From Day">
                                            <option>select</option>
                                            <?php for($i=1; $i<=$itinerary_details->duration; $i++){?>
                                                <option value="<?php echo $i;?>"<?php if($allvehicle->from_day == $i){ echo "selected";}?>><?php echo "day".' '.$i;?></option>
                                            <?php }?>
                                             </select>
                                            </div>
                                        </div><!-- /.form-group -->
                                        <div class="col-md-2">
                                            <div class="form-group">
                                            <label>To Day</label>
                                            <select class="form-control" name="to_day[]" id="to_day<?php echo $k; ?>" placeholder="To Day">
                                            <option>select</option>
                                            <?php for($i=1; $i<=$itinerary_details->duration; $i++){?>
                                                <option value="<?php echo $i;?>"<?php if($allvehicle->to_day == $i){ echo "selected";}?>><?php echo "day".' '.$i;?></option>
                                            <?php }?>
                                            </select>
                                            </div>
                                        </div><!-- /.form-group -->
                                        <div class="col-md-2">
                                            <div class="form-group">
                                             <label for="name">Vendor</label>
                                             <select class="form-control" name="vendor_name[]" placeholder="Select Vendor">
                                             <option>select</option>
                                             <?php //if(!empty($durationsVendors)){
                                             foreach ($durationsVendors as $allvendor) { ?>                             
                                             <option value="<?php echo $allvendor['vendorId']?>"<?php if($allvendor['vendorId'] == $allvehicle->vendor_name){ echo "selected";}?>><?php echo $allvendor['company_name'];?></option>
                                             <?php } 
                                            //}?>
                                            </select>
                                            </div>
                                        </div><!-- /.form-group -->
                                        <div class="col-md-2">
                                            <div class="form-group">
                                             <label for="name">Per Unit Cost </label>
                                                <input type="text" class="form-control" name="unit_cost[]" id="" placeholder="Enter Unit Cost" value="<?php echo $allvehicle->unit_cost?>"/>
                                            </div>
                                        </div><!-- /.form-group -->
                                        <div class="col-md-1">
                                            <a tabindex="0" class="clonerow"><i class="fa fa-plus" aria-hidden="true" style="font-size: 25px; margin-top: 30px;"></i></a>
                                            <input type="hidden" id="countdivrow" name="vehiclecount" value="<?php echo $itinerary_details->vehiclecount;?>">
                                        </div><!-- /.form-group -->
                                    </div><!-- /.form-group -->
                                  <?php
                                  $k++; 
                                  }?>
                                </div>
                    </div><!-- /.form-group -->
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="box-footer">
                                <!-- <button type="button" class="btn btn-primary" name="calculate_price" id="calculate_price">Calculate Price</button> -->
                                    <button type="submit" style="float: right;" class="btn btn-primary" name="itinerary_management" id="submit">Save & Next</button>
                                </div>
                            </div>
                        </div>
                    </form>         
                    </div>
                </div>
                </div>
                </div>
                <div class="tab-pane fade <?php if($tab == 2){ echo "active in";}?>" id="tab_default_2">
                <div class="box box-default">           
                <div id="status"></div>
                <div class="tab-content">
                <div id="home" class="tab-pane fade in active">
                <form role="form" method="POST" action="<?php echo base_url(ADMIN_URL) ?>/updateItinerary" name="add_itinerary" id="add_new_itinerary" enctype='multipart/form-data'>
                <input type="hidden" name="type" value="add_new_itinerary">
                <input type="hidden" name="itinerary_id" value="<?php echo $itinerary_id; ?>">
                <input type="hidden" name="type" value="update_itinerary" >
                <input type="hidden" name="duration" value="<?php echo $itinerary_details->duration; ?>">
                <div class="box-body">
                <h6 style="margin-left: 30px;">Days</h6>
                    <?php if($itinerary_details->duration != ''){ 
                        for ($i=1; $i <=$itinerary_details->duration; $i++) {  ?>
                            <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-1">
                                    <div class="form-group">
                                        <h5 style="margin-left: 20px;">Day <?php echo $i; ?></h5>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                    <input type="hidden" name="image_id_<?php echo $i; ?>" value="<?php echo @$itinerary_images_details[$i-1]->id; ?>">
                                        <label for="name">Itinerary Image <span style="color:red;">*</span></label>
                                        <input type="file" name="itinerary_image_<?php echo $i; ?>[]" id="itinerary_image_<?php echo $i; ?>" class="form-control" onchange="countfile('<?php echo $i ?>');" multiple>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="name">Itinerary Title <span style="color:red;">*</span></label>
                                        <input class="form-control" required="true" name="itinerary_title_<?php echo $i; ?>" value="<?php echo @$itinerary_images_details[$i-1]->itinerary_title ?>" id="itinerary_title" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="name">Itinerary <span style="color:red;">*</span></label>
                                        <textarea class="form-control" required="true" name="itinerary_<?php echo $i; ?>" id="itinerary" rows="4" cols="50" required><?php echo @$itinerary_images_details[$i-1]->itinerary_details ?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="name">Itinerary Images <span style="color:red;">*</span></label>
                                    <div class="form-group">
                                    <?php $itinerary_images = json_decode($itinerary_images_details[$i-1]->itinerary_images);
                                            foreach ($itinerary_images as $images) { ?>
                                        <a href="<?php echo base_url().'uploads/itinerary_images/'.$images ?>" download><img src="<?php echo base_url().'uploads/itinerary_images/'.$images ?>" widht="100px" height="90px"></a>
                                    <?php  }
                                    ?>
                                    </div>
                                </div>
                            </div><!-- /.form-group -->
                        </div>
                    <?php }
                    }?>
                    </div><!-- /.form-group -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="box-footer">
                                    <a href="<?php echo base_url(ADMIN_URL).'/editItinerary/1/'.$itinerary_id; ?>" class="btn btn-info" role="button">Previous</a>
                                    <button type="submit" style="float: right;" class="btn btn-primary" name="itinerary" id="submit">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>         
                    </div>
                </div>
                </div>
                  <div>
               </div>
                </div>
                </div>
                </div> 
        </section>
    </div>
</div>
<?php
    if ($this->uri->segment(2) == 'editItinerary') { ?>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/form-ckeditor/ckeditor.js"></script>
    <script src="<?php echo base_url(); ?>asset/plugins/select2/select2.full.min.js"></script>
    <script src="<?php echo base_url(); ?>jquery-validation/dist/jquery.validate.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/demo/pagejs/itinerary.js"></script>
<?php
    }
?>

<script>
    $(document).on("focus", 'a[class=clonerow]', function() {
		//alert("okk");

		var count = parseInt($("#countdivrow").val());
		var vendors = '<?php echo json_encode($durationsVendors);?>';
        //var vehicles = '<?php //echo json_encode($durationsVehicle);?>';
		var id = count+1;
		//var td_id = 'nextrow_'+id;
		//var newrows = '<div class="row">';
		var newrows ='<div class="col-md-12" id="nextrow_"'+id+'">';
		newrows +='<div class="col-md-3"><div class="form-group"><label for="name">Vehicle</label><input type="text" class="form-control" name="vehicle_name_more[]" id="" placeholder="Enter Vehicle"></div></div>';
		newrows +='<div class="col-md-2"><div class="form-group"><label>From Day</label><select class="form-control" id="from_day'+id+'" name="from_day_more[]" placeholder="From Day"></select></div></div>';
		newrows +='<div class="col-md-2"><div class="form-group"><label>To Day</label><select class="form-control" name="to_day_more[]" id="to_day'+id+'" placeholder="To Day"></select></div></div>';
		newrows +='<div class="col-md-2"><div class="form-group"><label for="name">Vendor</label><select class="form-control" name="vendor_name_more[]" placeholder="Select Vendor"><option value="">Select</option>';
        $.each(JSON.parse(vendors), function(index, element) {
		
            newrows += '<option value="'+element.vendorId+'">'+element.company_name+'</option>';
    
        });
        newrows +='</select></div></div>';
		newrows +='<div class="col-md-2"><div class="form-group"><label for="name">Per Unit Cost </label><input type="text" class="form-control" name="unit_cost_more[]" id="" placeholder="Enter Unit Cost"/></div></div>';
		newrows +='<div class="col-md-1"><a tabindex="0" class="clonerow"><i class="fa fa-plus" aria-hidden="true" style="font-size: 25px; margin-top: 10px;"></i></a><br><a style="font-size: 21px; color: red; cursor:pointer" id="other_remove" rel=""><i class="fa fa-minus-circle" aria-hidden="true"></i></a></div>';
		newrows +='</div>';
		var confirmtrue = confirm("Do you want new row?");
        if(confirmtrue == true){
         $("#addvehicledetails").append(newrows);
         $("#countdivrow").val(id);
        }

        var durationday = $("#duration").val();
        var select = '<option>select</option>';
        for(var i=1; i<=durationday; i++){
			select += '<option value=' + i + '>day ' + i + '</option>';
		}
        $("#from_day"+id).html(select);
		$("#to_day"+id).html(select);
    
	});

    $(document).on("click", "#other_remove", function(){
		   $(this).closest('div[id=nextrow_]').remove();
		   //calculate_other_price();
		   var count = $("#countdivrow").val();
		   count--;
		   $("#countdivrow").val(count);
    });

</script>