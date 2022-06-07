<div id="wrapper">
<div id="layout-static">
<div class="static-content-wrapper">
<div class="static-content">
<div class="page-content">
<ol class="breadcrumb">
   <li><a href="<?php echo base_url(ADMIN_URL) ?>/dashboard">Home</a></li>
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
    <h2>Edit Vendor Forms</h2>
  </div>
  <div class="panel-body">
    <form class="grid-form" action="<?php echo base_url(ADMIN_URL) ?>/updateVendor" method="POST">
    <input type="hidden" name="vendor_id" value="<?php echo $vendor->vendorId; ?>">
      <fieldset>
        <legend>Travel Agent Details</legend>

        <div data-row-span="4">
          <div data-field-span="4">
            <label>Company Name</label>
            <input type="text" name="company_name" required="true" value="<?php echo $vendor->company_name; ?>">
          </div>
        </div>
        <div data-row-span="2">
            <div data-field-span="1">
              <label>Address Line 1</label>
              <input type="text" name="address_line_1" required="true" value="<?php echo $vendor->address_line_1; ?>">
            </div>
            <div data-field-span="1">
              <label>Address Line 2</label> 
              <input type="text" name="address_line_2" value="<?php echo $vendor->address_line_2; ?>">
            </div>
        </div>
        <div data-row-span="4">
            <div data-field-span="2">
              <label>Country</label>
              <select id="country_id" name="country_id" class="form-control" required="true">
                 <option value="">Select Country</option>
                <?php if(!empty($countries)){
                    foreach ($countries as $country) { ?>
                     <option value="<?php echo $country->id?>" <?php if ($country->id == $vendor->country_id) { echo "selected"; } ?>><?php echo $country->country_name; ?></option>
                <?php }
                  } ?>
                </select>
            </div>
            <div data-field-span="2">
              <label>State</label>
              <select id="state_id" name="state_id" class="form-control" required="true">
                 <option value="">Select State</option>
                 <?php if(!empty($states)){
                    foreach ($states as $state) { ?>
                     <option value="<?php echo $state->id?>" <?php if ($state->id == $vendor->state_id) { echo "selected"; } ?>><?php echo $state->state_name; ?></option>
                <?php }
                  } ?>
                </select>
            </div>
          </div>
          <div data-row-span="4">
            <div data-field-span="2">
              <label>city</label>
              <select id="city_id" name="city_id" class="form-control" required="true">
                 <option value="">Select City</option>
                 <?php if(!empty($cities)){
                    foreach ($cities as $city) { ?>
                     <option value="<?php echo $city->id?>" <?php if ($city->id == $vendor->city_id) { echo "selected"; } ?>><?php echo $city->city_name; ?></option>
                <?php }
                  } ?>
              </select>
            </div>
            <div data-field-span="2">
              <label>Pincode</label>
              <input type="text" name="zip" required="true" value="<?php echo $vendor->zip; ?>">
            </div>
          </div>
        <div data-row-span="2">
          <div data-field-span="1">
            <label>Contact no.</label>
            <input type="text" name="travel_agent_contact" required="true" value="<?php echo $vendor->contact_no; ?>">
          </div>
          <div data-field-span="1">
            <label>Alternative No. (if Any)</label>
            <input type="text" name="travel_agent_alternative" value="<?php echo $vendor->alternative_no; ?>">
          </div>
        </div>
        <div data-row-span="4">
          <div data-field-span="4">
            <label>Description</label>
            <textarea name="description"><?php echo $vendor->description; ?></textarea>
          </div>
        </div>
        <br>
        <fieldset>
          <legend>Concerned Person Details</legend>
          <div data-row-span="4">
          <div data-field-span="1">
            <label>Title</label>
            <label><input type="radio" name="employee-title[]"" value="Mr." <?php if($vendor->title == 'Mr.'){ echo "checked";} ?>> Mr.</label> &nbsp;
            <label><input type="radio" name="employee-title[]" value="Mrs." <?php if($vendor->title == 'Mrs.'){ echo "checked";} ?>> Mrs.</label> &nbsp;
            <label><input type="radio" name="employee-title[]" value="Ms." <?php if($vendor->title == 'Ms.'){ echo "checked";} ?>> Ms.</label>
          </div>
          <div data-field-span="3">
            <label>Full Name</label>
            <input type="text" name="concern_name" required="true" value="<?php echo $vendor->concern_person_name; ?>">
          </div>
        </div>
          <div data-row-span="4">
            <div data-field-span="2">
              <label>Contact No</label>
               <input type="text" name="concern_contact" required="true" value="<?php echo $vendor->concern_contact_no; ?>">
            </div>
            <div data-field-span="2">
              <label>Alternative No. (If Any)</label>
               <input type="text" name="concern_alternative" value="<?php echo $vendor->secondry_no; ?>">
            </div>
          </div>
          <div data-row-span="4">
            <div data-field-span="2">
              <label>Email</label>
              <input type="email" name="concern_email" required="true" value="<?php echo $vendor->email; ?>">
            </div>
            <div data-field-span="2">
              <label>Sencondry Email (If Any)</label>
              <input type="email" name="concern_secondry_email" value="<?php echo $vendor->alternative_email; ?>">
            </div>
          </div>
        </fieldset>
      </fieldset>
      <br><br>
      <fieldset>
        <legend>Banking Details</legend>
        <div data-row-span="2">
          <div data-field-span="1">
            <label>Pan no.</label>
            <input type="text" name="pan_no" value="<?php echo $vendor->pan_no; ?>">
          </div>
          <div data-field-span="1">
            <label>Account No.</label>
            <input type="text" name="account_no" value="<?php echo $vendor->account_no; ?>">
          </div>
        </div>
        <div data-row-span="2">
          <div data-field-span="1">
            <label>Account holder Name</label>
            <input type="text" name="holder_name" value="<?php echo $vendor->account_holder_name; ?>">
          </div>
          <div data-field-span="1">
            <label>Bank Name</label>
            <input type="text" name="bank_name" value="<?php echo $vendor->bank_name; ?>">
          </div>
        </div>
        <div data-row-span="2">
          <div data-field-span="1">
            <label>Branch</label>
            <input type="text" name="branch" value="<?php echo $vendor->branch; ?>">
          </div>
          <div data-field-span="1">
            <label>IFSC</label>
            <input type="text" name="ifsc" value="<?php echo $vendor->ifsc; ?>">
          </div>
        </div>
      </fieldset>
      <div class="clearfix pt20">
        <div class="pull-right">
          <button class="btn-primary btn">Submit Form</button>
        </div>
      </div>
    </form>
  </div>
</div>
</div> <!-- .container-fluid -->
<!-- #page-content -->
</div>