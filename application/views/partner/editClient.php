<div class="col-md-11" id="contentCol">
<div id="wrapper">
<div id="layout-static">
<div class="static-content-wrapper">
<div class="static-content">
<div class="page-content" style="margin-top:;">
<ol class="breadcrumb">
   <li><a href="<?php echo base_url(PARTNER) ?>/dashboard">Home</a></li>
   <li><a href="#">Edit Client</a></li>
</ol>
<div class="page-heading">
   <h1>Edit Client</h1>
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
    <h2>Edit Client Forms</h2>
  </div>
  <div class="panel-body">
    <div class="row">
        <form class="" action="<?php echo base_url(PARTNER) ?>/updateClient" method="POST">
        <input type="hidden" name="client_id" value="<?php echo $clientDetails->id; ?>">
        <div class="col-md-12">
            <legend>Personal Details</legend>
            <div class="col-md-2">
                <label>Title</label><br>
                <label><input type="radio" name="employee-title[]" value="Mr." <?php if($clientDetails->title == 'Mr.'){ echo "checked";} ?>> Mr.</label> &nbsp;
                <label><input type="radio" name="employee-title[]" value="Mrs." <?php if($clientDetails->title == 'Mrs.'){ echo "checked";} ?>> Mrs.</label> &nbsp;
                <label><input type="radio" name="employee-title[]" value="Ms." <?php if($clientDetails->title == 'Ms.'){ echo "checked";} ?>> Ms.</label>
            </div>
            <div class="col-md-10">
                <label>Full Name</label>
                <input type="text" class="form-control" name="name" required="true" value="<?php echo $clientDetails->client_name; ?>" readonly>
            </div>
            <!--<label>Src</label>-->
            <!--<input type="text" name="src" required="true" value="<?php //echo $clientDetails->src; ?>">-->
        </div>
        <div class="col-md-12">
            <div class="col-md-6">
               <label>Mobile No.</label>
               <input type="text" class="form-control" name="mobile_no" required="true" value="<?php echo $clientDetails->client_number; ?>" readonly>
            </div>
            <div class="col-md-6">
               <label>Alternative No (if Any)</label>
               <input type="text" class="form-control" name="alertnative_no" value="<?php echo $clientDetails->alternative_no; ?>"> 
            </div>
        </div>
        <div class="col-md-12">
            <div class="col-md-6">
                <label>Primary Email</label>
                <input type="email" class="form-control" name="primary_email" value="<?php echo $clientDetails->client_email; ?>">
            </div>
            <div class="col-md-6">
                <label>Secondary Email (if Any)</label>
                <input type="email" class="form-control" name="secondary_email" value="<?php echo $clientDetails->secondry_email; ?>">
            </div>
        </div>
        <div class="col-md-12">
            <div class="col-md-6">
                <label>Date of anniversary</label>
                <input type="date" class="form-control" name="doa" value="<?php echo $clientDetails->doa; ?>">
            </div>
            <div class="col-md-6">
                <label>Date of birth</label>
                <input type="date" class="form-control" name="dob" class="form-control" id="" value="<?php echo $clientDetails->dob; ?>">
            </div>
        </div>
        <div class="col-md-12">
            <legend>Permanent Address</legend>
            <div class="col-md-6">
                <label>Address Line 1</label>
                <input type="text" class="form-control" name="address_line_1" value="<?php echo $clientDetails->address_line_1; ?>">
            </div>
            <div class="col-md-6">
                <label>Address Line 2</label>
                <input type="text" class="form-control" name="address_line_2" value="<?php echo $clientDetails->address_line_2; ?>">
            </div>
        </div>
        <div class="col-md-12">
            <div class="col-md-6">
                <label>Country</label>
                <select id="country_id" class="form-control" name="country_id" required="true">
                 <!--<option value="">Select Country</option>-->
               <?php if(!empty($countries)){
                    foreach($countries as $country) { ?>
                     <option value="<?php echo $country->id?>" <?php if ($country->id == $clientDetails->country_id) { echo "selected"; }else{ echo "disabled";} ?>><?php echo $country->country_name; ?></option>
                <?php }
                  } ?>
                </select>
            </div>
            <div class="col-md-6">
                <label>State</label>
                <select id="state_id" class="form-control" name="state_id" required="true">
                 <!--<option value="">Select State</option>-->
                  <?php if(!empty($states)){
                    foreach($states as $state) { ?>
                    <?php if($state->country_id == $clientDetails->country_id) {?> 
                     <option value="<?php echo $state->id?>" <?php if ($state->id == $clientDetails->state_id) { echo "selected"; }else{ echo "disabled";} ?>><?php echo $state->state_name; ?></option>
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
                 foreach($cities as $city) { ?>
                 <?php if($city->state_id == $clientDetails->state_id) {?> 
                    <option value="<?php echo $city->id?>" <?php if ($city->id == $clientDetails->city_id) { echo "selected"; }else{ echo "disabled";} ?>><?php echo $city->city_name; ?></option>
                <?php }?>
                <?php }
                  } ?>
                </select>
            </div>
            <div class="col-md-6">
               <label>Pincode</label>
               <input type="text" class="form-control" name="zip" required="true" value="<?php echo $clientDetails->zip; ?>" readonly>
            </div>
        </div>
        <div class="col-md-12">
            <legend>Banking Details</legend>
            <div class="col-md-6">
                <label>Pan no.</label>
                <input type="text" class="form-control" name="pan_no" value="<?php echo $clientDetails->pan_no; ?>">

            </div>
            <div class="col-md-6">
                <label>Gstin</label>
                <input type="text" class="form-control" name="companygstin" value="<?php echo $clientDetails->companygstin; ?>">
            </div>
        </div>
        <div class="col-md-12">
            <div class="col-md-6">
                <label>Account No.</label>
                <input type="text" class="form-control" name="account_no" value="<?php echo $clientDetails->account_no; ?>">
            </div>
            <div class="col-md-6">
                <label>Account holder Name</label>
                <input type="text" class="form-control" name="holder_name" value="<?php echo $clientDetails->holder_name; ?>">
            </div>
        </div>
        <div class="col-md-12">
            <div class="col-md-6">
                <label>Bank Name</label>
                <input type="text" class="form-control" name="bank_name" value="<?php echo $clientDetails->bank_name; ?>">
            </div>
            <div class="col-md-6">
                <label>Branch</label>
                <input type="text" class="form-control" name="branch" value="<?php echo $clientDetails->branch; ?>">
            </div>
        </div>
        <div class="col-md-12">
            <label>IFSC</label>
            <input type="text" class="form-control" name="ifsc" value="<?php echo $clientDetails->ifsc; ?>" >
        </div>
        <div class="col-md-12">
            <legend>Other Details</legend>
            <div class="col-md-6">
                <label>Organization</label>
                <input type="text" class="form-control" name="organization" value="<?php echo $clientDetails->organization; ?>">
            </div>
            <div class="col-md-6">
                <label>Job Title</label>
                <input type="text" class="form-control" name="job_title" value="<?php echo $clientDetails->job_title; ?>">
            </div>
        </div>
        <div class="col-md-12">
            <div class="col-md-6">
                <label>Company Email</label>
                <input type="email" class="form-control" name="company_email" value="<?php echo $clientDetails->company_email; ?>">
  
            </div>
            <div class="col-md-6">
                <label>Address</label>
                <input type="text" class="form-control" name="companyaddress" value="<?php echo $clientDetails->companyaddress; ?>">
            </div>
        </div>
        <div class="col-md-12">
            <div class="col-md-6">
                <label>Contact No</label>
                <input type="number" class="form-control" name="contact_no" value="<?php echo $clientDetails->contact_no; ?>">
            </div>
            <div class="col-md-6">
                <label>Country</label>
                <select id="com_country_id" class="form-control" name="com_country_id">
                 <option value="">Select Country</option>
                <?php if(!empty($countries)){
                    foreach ($countries as $country) { ?>
                     <option value="<?php echo $country->id?>" <?php if($country->id == $clientDetails->com_country_id) { echo "selected"; } ?>><?php echo $country->country_name; ?></option>
                <?php }
                  } ?>
                </select>
            </div>
        </div>
        <div class="col-md-12">
            <div class="col-md-6">
                <label>State</label>
                <select id="com_state_id" class="form-control" name="com_state_id">
                 <option value="">Select State</option>
                 <?php if(!empty($states)){
                    foreach ($states as $state) { ?>
                     <option value="<?php echo $state->id?>" <?php if ($state->id == $clientDetails->com_state_id) { echo "selected"; } ?>><?php echo $state->state_name; ?></option>
                <?php }
                  } ?>
                </select>
            </div>
            <div class="col-md-6">
                <label>city</label>
                <select id="com_city_id" class="form-control" name="com_city_id">
                 <option value="">Select City</option>
                 <?php if(!empty($cities)){
                    foreach ($cities as $city) { ?>
                     <option value="<?php echo $city->id?>" <?php if ($city->id == $clientDetails->com_city_id) { echo "selected"; } ?>><?php echo $city->city_name; ?></option>
                <?php }
                  } ?>
                </select>
            </div>
        </div>
        <div class="col-md-12">
            <label>Pincode</label>
            <input type="text" class="form-control" name="com_zip" value="<?php echo $clientDetails->com_zip; ?>">
        </div>
        <div class="col-md-12">
            <div class="clearfix pt20">
               <div class="pull-right">
                   <button class="btn-primary btn">Update</button>
               </div>
            </div>
        </div>
        </form>
    </div>
    
  </div>
</div>
</div> <!-- .container-fluid -->
<!-- #page-content -->
</div>
<?php
    if ($this->uri->segment(2) == 'editClient') { ?>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/demo/pagejs/partner/addEmployee.js"></script>
<?php
    }
?>
<script>
    $(document).ready(function(){
       $('#datepicker').datepicker({
        format: "dd/mm/yyyy",
        autoclose: true
       }); 
    });
</script>