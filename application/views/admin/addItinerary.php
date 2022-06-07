<div id="wrapper">
<div id="layout-static">
<div class="static-content-wrapper">
<div class="static-content">
<div class="page-content">
<ol class="breadcrumb">
   <li><a href="<?php echo base_url(ADMIN_URL) ?>/dashboard">Home</a></li>
   <li><a href="#">Add Itinerary</a></li>
</ol>
<div class="page-heading">
   <h1>Add Itinerary</h1>
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
                <form role="form" method="POST" name="itinerary_management" id="itinerary_management_form">
                <input type="hidden" name="type" value="add_itinerary_management" >
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
                                             <option value="<?php echo $country->id?>"><?php echo $country->country_name; ?></option>
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
                                                <input type="text" class="form-control" name="title" id="title" placeholder="Title" required="true" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                             <label for="name">Details </label>
                                                <input type="text" class="form-control" name="iteDurationDetail" id="iteDurationDetail" placeholder="Detail"/>
                                            </div>
                                        </div><!-- /.form-group -->
                                    </div><!-- /.form-group -->
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="name">Duration</label>
                                                <input type="number" class="form-control" name="duration" id="duration" placeholder="Duration"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="col-md-12" id="durationTable">
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" id="addvehicledetails">
                                    <div class="col-md-12">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="name">Vehicle</label>
                                                <input type="text" class="form-control" name="vehicle_name[]" id="" placeholder="Enter Vehicle">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                            <label>From Day</label>
                                             <select class="form-control" id="from_day" name="from_day[]" placeholder="From Day">
                                            <!-- <option>select</option> -->
                                             </select>
                                            </div>
                                        </div><!-- /.form-group -->
                                        <div class="col-md-2">
                                            <div class="form-group">
                                            <label>To Day</label>
                                            <select class="form-control" name="to_day[]" id="to_day" placeholder="To Day">
                                            <!-- <option>select</option> -->
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
                                             <option value="<?php echo $allvendor['vendorId']?>"><?php echo $allvendor['company_name'];?></option>
                                             <?php } 
                                            //}?>
                                            </select>
                                            </div>
                                        </div><!-- /.form-group -->
                                        <div class="col-md-2">
                                            <div class="form-group">
                                             <label for="name">Per Unit Cost </label>
                                                <input type="text" class="form-control" name="unit_cost[]" id="" placeholder="Enter Unit Cost"/>
                                            </div>
                                        </div><!-- /.form-group -->
                                        <div class="col-md-1">
                                            <a tabindex="0" class="clonerow"><i class="fa fa-plus" aria-hidden="true" style="font-size: 25px; margin-top: 30px;"></i></a>
                                            <input type="hidden" id="countdivrow" name="vehiclecount" value="1">
                                        </div><!-- /.form-group -->
                                    </div><!-- /.form-group -->
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="col-md-12" id="totalprice" style="display: none;">
                                                
                                            </div>
                                        </div>
                                    </div>
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
                <form role="form" method="POST" action="<?php echo base_url(ADMIN_URL) ?>/addNewItinerary" name="add_itinerary" id="add_new_itinerary" enctype='multipart/form-data'>
                <input type="hidden" name="type" value="add_new_itinerary">
                <input type="hidden" name="itinerary_id" value="<?php echo $itinerary_id; ?>">
                <input type="hidden" name="type" value="add_itinerary" >
                <input type="hidden" name="duration" value="<?php echo $itinerary_details->duration; ?>">
                <div class="box-body">
                <h6 style="margin-left: 30px;">Days</h6>
                    <?php if($itinerary_details->duration != ''){ 
                        for ($i=1; $i <=$itinerary_details->duration; $i++) {  ?>
                            <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <h5 style="margin-left: 20px;">Day <?php echo $i; ?></h5>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="name">Itinerary Image <span style="color:red;">*</span></label>
                                        <input type="file" name="itinerary_image_<?php echo $i; ?>[]" class="form-control" multiple required="true">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="name">Itinerary Title <span style="color:red;">*</span></label>
                                        <input class="form-control" required="true" name="itinerary_tilte_<?php echo $i; ?>" id="itinerary_title" required>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="name">Itinerary <span style="color:red;">*</span></label>
                                        <textarea class="form-control" required="true" name="itinerary_<?php echo $i; ?>" id="itinerary" rows="4" cols="50" required></textarea>
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
            </div>
        </section>
    </div>
</div>
<?php
    if ($this->uri->segment(2) == 'addItinerary') { ?>
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
		var id = count+1;
		//var td_id = 'nextrow_'+id;
		//var newrows = '<div class="row">';
		var newrows ='<div class="col-md-12" id="nextrow_"'+id+'">';
		newrows +='<div class="col-md-3"><div class="form-group"><label for="name">Vehicle</label><input type="text" class="form-control" name="vehicle_name[]" id="vehicle_input'+id+'" placeholder="Enter Vehicle"></div></div>';
		newrows +='<div class="col-md-2"><div class="form-group"><label>From Day</label><select class="form-control" id="from_day'+id+'" name="from_day[]" placeholder="From Day"></select></div></div>';
		newrows +='<div class="col-md-2"><div class="form-group"><label>To Day</label><select class="form-control" name="to_day[]" id="to_day'+id+'" placeholder="To Day"></select></div></div>';
		newrows +='<div class="col-md-2"><div class="form-group"><label for="name">Vendor</label><select class="form-control" name="vendor_name[]" placeholder="Select Vendor"><option value="">Select</option>';
        $.each(JSON.parse(vendors), function(index, element) {
		
            newrows += '<option value="'+element.vendorId+'">'+element.company_name+'</option>';
    
        });
        newrows +='</select></div></div>';
		newrows +='<div class="col-md-2"><div class="form-group"><label for="name">Per Unit Cost </label><input type="text" class="form-control" name="unit_cost[]" id="" placeholder="Enter Unit Cost"/></div></div>';
		newrows +='<div class="col-md-1"><a tabindex="0" class="clonerow"><i class="fa fa-plus" aria-hidden="true" style="font-size: 25px; margin-top: 10px;"></i></a><br><a style="font-size: 21px; color: red; cursor:pointer" id="other_remove" rel=""><i class="fa fa-minus-circle" aria-hidden="true"></i></a></div>';
		newrows +='</div>';
		//var confirmtrue = confirm("Do you want new row?");
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
          $("#addvehicledetails").append(newrows);
          $("#countdivrow").val(id);
          swal.close();
          document.getElementById('vehicle_input'+id).focus();
        }else{
            document.getElementById('submit').focus();
        }
        var durationday = $("#duration").val();
        var select = '<option>select</option>';
        for(var i=1; i<=durationday; i++){
			select += '<option value=' + i + '>day ' + i + '</option>';
		}
        $("#from_day"+id).html(select);
		$("#to_day"+id).html(select);
        });
        
	});

    $(document).on("click", "#other_remove", function(){
		$(this).closest('div[id=nextrow_]').remove();
		   //calculate_other_price();
		   var count = $("#countdivrow").val();
		   count--;
		   $("#countdivrow").val(count);
    });

</script>