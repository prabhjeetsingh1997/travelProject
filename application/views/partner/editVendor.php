<div class="col-md-11" id="contentCol">
<div id="wrapper">
<div id="layout-static">
<div class="static-content-wrapper">
<div class="static-content">
<div class="page-content" style="margin-top:;">
<ol class="breadcrumb">
   <li><a href="<?php echo base_url(PARTNER) ?>/dashboard">Home</a></li>
   <li><a href="#">Edit Vendor</a></li>
</ol>
<div class="page-heading">
   <h1>Edit Vendor</h1>
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
       <h2>Vendor Forms</h2>
    </div>
  <div class="panel-body">
    <div class="row">
        <form class="" action="<?php echo base_url(PARTNER) ?>/updateVendor" method="POST">
        <input type="hidden" name="vendorId" value="<?php echo $vendor->vendorId; ?>">
        <fieldset>
            <div class="col-md-12">
                <legend>Company Details</legend>
                <label>Company Name</label>
                <input type="text" class="form-control" name="company_name" required="true" value="<?php echo $vendor->company_name; ?>" readonly>
            </div>
            <div class="col-md-12">
                <div class="col-md-6">
                    <label>Address Line 1</label>
                    <input type="text" class="form-control" name="address_line_1" required="true" value="<?php echo $vendor->address_line_1; ?>">
                </div>
                <div class="col-md-6">
                    <label>Address Line 2</label>
                    <input type="text" class="form-control" name="address_line_2" value="<?php echo $vendor->address_line_2; ?>" >
                </div>
            </div>
            <div class="col-md-12">
                <div class="col-md-6">
                    <label>Country</label>
                    <select id="country_id" class="form-control" name="country_id" required="true">
                        <!--<option value="">Select Country</option>-->
                    <?php if(!empty($countries)){
                        foreach ($countries as $country) { ?>
                        <option value="<?php echo $country->id?>" <?php if ($country->id == $vendor->country_id) { echo "selected"; }else{echo "disabled";} ?>><?php echo $country->country_name; ?></option>
                    <?php }
                    } ?>
                    </select>
                </div>
                <div class="col-md-6">
                    <label>State</label>
                    <select id="state_id" class="form-control" name="state_id"  required="true">
                        <!--<option value="">Select State</option>-->
                    <?php if(!empty($states)){
                        foreach ($states as $state) { ?>
                        <?php if($state->country_id == $vendor->country_id) {?>

                        <option value="<?php echo $state->id?>" <?php if ($state->id == $vendor->state_id) { echo "selected"; }else{echo "disabled";} ?>><?php echo $state->state_name; ?></option>
                    <?php }?>
                    <?php }
                    } ?>
                    </select>
                </div>
            </div>
            <div class="col-md-12">
                <div class="col-md-6">
                <label>city</label>
                <select id="city_id" class="form-control" name="city_id"  required="true">
                    <!--<option value="">Select City</option>-->
                <?php if(!empty($cities)){
                    foreach ($cities as $city) { ?>
                     <?php if($city->state_id == $vendor->state_id) {?> 

                    <option value="<?php echo $city->id?>" <?php if ($city->id == $vendor->city_id) { echo "selected"; }else{echo "disabled";} ?>><?php echo $city->city_name; ?></option>
                <?php }?>
                <?php }
                  } ?>
                </select>
                </div>
                <div class="col-md-6">
                    <label>Pincode</label>
                    <input type="text" class="form-control" name="zip" required="true" value="<?php echo $vendor->zip; ?>" readonly>
                </div>
            </div>
            <!--<div class="col-md-12">-->
            <!--    <div class="col-md-6">-->
            <!--        <label>Mobile No.</label>-->
            <!--        <input type="text" class="form-control" name="contact_no" required="true" value="<?php //echo $vendor->contact_no; ?>">-->
            <!--    </div>-->
            <!--    <div class="col-md-6">-->
            <!--        <label>Alternative No (if Any)</label>-->
            <!--        <input type="text" class="form-control" name="alternative_no" value="<?php //echo $vendor->alternative_no; ?>">-->
            <!--    </div>-->
            <!--</div>-->
            <div class="col-md-12">
                <legend>Concerned Person Details</legend>
                <div class="col-md-2">
                    <label>Title</label><br>
                    <label><input type="radio" name="employee-title[]" value="Mr." <?php if($vendor->title == 'Mr.'){ echo "checked";} ?>> Mr.</label> &nbsp;
                    <label><input type="radio" name="employee-title[]" value="Mrs." <?php if($vendor->title == 'Mrs.'){ echo "checked";} ?>> Mrs.</label> &nbsp;
                    <label><input type="radio" name="employee-title[]" value="Ms." <?php if($vendor->title == 'Ms.'){ echo "checked";} ?>> Ms.</label>
                </div>
                <div class="col-md-10">
                    <label>Full Name</label>
                    <input type="text" class="form-control" name="concern_person_name" required="true" value="<?php echo $vendor->concern_person_name; ?>">
                </div>
            </div>
            <div class="col-md-12">
                <div class="col-md-6">
                    <label>Mobile No.</label>
                    <input type="text" class="form-control" name="concern_contact_no" required="true" value="<?php echo $vendor->concern_contact_no; ?>">
                </div>
                <div class="col-md-6">
                    <label>Alternative No (if Any)</label>
                    <input type="text" class="form-control" name="secondry_no" value="<?php echo $vendor->secondry_no; ?>">
                </div>
            </div>
            <div class="col-md-12">
                <div class="col-md-6">
                    <label>Primary Email</label>
                    <input type="email" class="form-control" name="email" value="<?php echo $vendor->email; ?>">
                </div>
                <div class="col-md-6">
                    <label>Secondary Email (if Any)</label>
                    <input type="email" class="form-control" name="alternative_email" value="<?php echo $vendor->alternative_email; ?>">
                </div>
            </div>
            <div class="col-md-12">
                <legend>Banking Details</legend>
                <div class="col-md-6">
                    <label>Pan no.</label>
                    <input type="text" class="form-control" name="pan_no" value="<?php echo $vendor->pan_no; ?>">
                </div>
                <div class="col-md-6">
                    <label>Account No.</label>
                    <input type="text" class="form-control" name="account_no" value="<?php echo $vendor->account_no; ?>">
                </div>
            </div>
            <div class="col-md-12">
                <div class="col-md-6">
                    <label>Account holder Name</label>
                    <input type="text" class="form-control" name="account_holder_name" value="<?php echo $vendor->account_holder_name; ?>">

                </div>
                <div class="col-md-6">
                    <label>Bank Name</label>
                    <input type="text" class="form-control" name="bank_name" value="<?php echo $vendor->bank_name; ?>">
                </div>
            </div>
            <div class="col-md-12">
                <div class="col-md-6">
                    <label>Branch</label>
                    <input type="text" class="form-control" name="branch" value="<?php echo $vendor->branch; ?>">
                </div>
                <div class="col-md-6">
                    <label>IFSC</label>
                    <input type="text" class="form-control" name="ifsc" value="<?php echo $vendor->ifsc; ?>">
                </div>
            </div>
            <div class="col-md-12">
                <div class="clearfix pt20">
                    <div class="pull-right">
                        <button class="btn-primary btn">Submit Form</button>
                    </div>
                </div>
            </div>
        </fieldset>
        </form>
    </div>  
    
  </div>
</div>
</div> <!-- .container-fluid -->
<!-- #page-content -->
</div>

<!--<script>-->
    
<!--    $(document).ready(function () {-->
<!--    $('#datepicker').datepicker({-->
<!--        format: "dd/mm/yyyy",-->
<!--        autoclose: true-->
<!--    });-->
<!--    });-->
<!--</script>-->

