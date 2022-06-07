<div id="wrapper">
<div id="layout-static">
<div class="static-content-wrapper">
<div class="static-content">
<div class="page-content">
<ol class="breadcrumb">
   <li><a href="<?php echo base_url(ADMIN_URL) ?>/dashboard">Home</a></li>
   <li><a href="#">Edit Partner Details</a></li>
</ol>
<div class="page-heading">
   <h1>Edit Partner Details</h1>
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
    <h2>Partner Forms</h2>
  </div>
  <div class="panel-body">
    <form class="grid-form" action="<?php echo base_url(ADMIN_URL) ?>/updatePartner" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="partner_id" value="<?php echo $partner->partner_id; ?>">
      <fieldset>
        <legend>Partner Details</legend>

        <div data-row-span="4">
          <div data-field-span="1">
            <label>Title</label>
            <label><input type="radio" name="partner-title[]" value="Mr." <?php if($partner->title == 'Mr.'){ echo "checked";} ?>> Mr.</label> &nbsp;
            <label><input type="radio" name="partner-title[]" value="Mrs." <?php if($partner->title == 'Mrs.'){ echo "checked";} ?>> Mrs.</label> &nbsp;
            <label><input type="radio" name="partner-title[]" value="Ms." <?php if($partner->title == 'Ms.'){ echo "checked";} ?>> Ms.</label>
          </div>
          <div data-field-span="3">
            <label>Full Name</label>
            <input type="text" name="name" required="true" value="<?php echo $partner->name; ?>">
          </div>
        </div>
        <div data-row-span="2">
          <div data-field-span="1">
            <label>Primary Email</label>
            <input type="email" name="email" required="true" value="<?php echo $partner->email; ?>">
          </div>
          <div data-field-span="1">
            <label>Password</label>
            <input type="password" class="form-control" name="password" readonly>
          </div>
          
        </div>
        <div data-row-span="4">
          <div data-field-span="2">
            <label>Mobile No.</label>
            <input type="number" name="mobile_no" class="form-control" min="10" required="true" value="<?php echo $partner->mobile_no; ?>">
          </div>
          <div data-field-span="2">
            <label>Alternative No (if Any)</label>
            <input type="number" class="form-control" name="alternative_no" value="<?php echo $partner->alternative_no; ?>">
          </div>
        </div>
          <div data-row-span="2">
          <div data-field-span="1">
            <label>Markup</label>
            <input type="number" name="markup" class="form-control" required="true" value="<?php echo $partner->markup; ?>">
          </div>
          <div data-field-span="1">
            <label>Logo</label>
            <input type="file" name="logo" class="form-control" value="<?php echo $partner->logo; ?>">
          </div>
          </div>
        <br>
        <fieldset>
          <legend>Permanent Address</legend>
          <div data-row-span="2">
            <div data-field-span="1">
              <label>Address Line 1</label>
              <input type="text" name="address_line_1" required="true" value="<?php echo $partner->address_line_1; ?>">
            </div>
            <div data-field-span="1">
              <label>Address Line 2</label>
              <input type="text" name="address_line_2" value="<?php echo $partner->address_line_2; ?>">
            </div>
          </div>
          <div data-row-span="4">
            <div data-field-span="2">
              <label>Country</label>
              <select id="country_id" class="form-control" name="country_id" required="true">
                 <option value="">Select Country</option>
                <?php if(!empty($countries)){
                    foreach ($countries as $country) { ?>
                     <option value="<?php echo $country->id?>" <?php if ($country->id == $partner->country_id) { echo "selected"; }?> ><?php echo $country->country_name; ?></option>
                <?php }
                  } ?>
                </select>
            </div>
            <div data-field-span="2">
              <label>State</label>
              <select id="state_id" class="form-control" name="state_id"  required="true">
                 <option value="">Select State</option>
                 <?php if(!empty($states)){
                    foreach ($states as $state) { ?>
                     <option value="<?php echo $state->id?>" <?php if ($state->id == $partner->state_id) { echo "selected"; } ?> ><?php echo $state->state_name; ?></option>
                <?php }
                  } ?>
                </select>
            </div>
          </div>
          <div data-row-span="4">
            <div data-field-span="2">
              <label>city</label>
              <select id="city_id" class="form-control" name="city_id"  required="true">
                 <option value="">Select City</option>
                 <?php if(!empty($cities)){
                    foreach ($cities as $city) { ?>
                     <option value="<?php echo $city->id?>" <?php if ($city->id == $partner->city_id) { echo "selected"; } ?>><?php echo $city->city_name; ?></option>
                <?php }
                  } ?>
              </select>
            </div>
            <div data-field-span="2">
              <label>Pincode</label>
              <input type="text" name="zip" required="true" value="<?php echo $partner->zip; ?>">
            </div>
          </div>
        </fieldset>
      </fieldset>
      <br><br>
      <fieldset>
          <legend>Company Deatils</legend>
          <div data-row-span="3">
            <div data-field-span="1">
              <label>Company Name</label>
              <input type="text" name="compnay_name" required="true" value="<?php echo $partner->company_name; ?>">
            </div>
            <div data-field-span="1">
              <label>Company Address Line 1</label>
              <input type="text" name="com_address_line_1" value="<?php echo $partner->company_address_1; ?>">
            </div>
            <div data-field-span="1">
              <label>Company Address Line 2</label>
              <input type="text" name="com_address_line_2" value="<?php echo $partner->company_address_2; ?>">
            </div>
          </div>
          <div data-row-span="4">
            <div data-field-span="2">
              <label>Country</label>
              <select id="com_country_id" class="form-control" name="com_country_id" required="true">
                 <option value="">Select Country</option>
                <?php if(!empty($countries)){
                    foreach ($countries as $country) { ?>
                     <option value="<?php echo $country->id?>" <?php if ($country->id == $partner->country_id) { echo "selected"; }?> ><?php echo $country->country_name; ?></option>
                <?php }
                  } ?>
                </select>
            </div>
            <div data-field-span="2">
              <label>State</label>
              <select id="com_state_id" class="form-control" name="com_state_id"  required="true">
                 <option value="">Select State</option>
                 <?php if(!empty($states)){
                    foreach ($states as $state) { ?>
                     <option value="<?php echo $state->id?>" <?php if ($state->id == $partner->state_id) { echo "selected"; } ?> ><?php echo $state->state_name; ?></option>
                <?php }
                  } ?>
                </select>
            </div>
          </div>
          <div data-row-span="4">
            <div data-field-span="2">
              <label>city</label>
              <select id="com_city_id" class="form-control" name="com_city_id"  required="true">
                 <option value="">Select City</option>
                 <?php if(!empty($cities)){
                    foreach ($cities as $city) { ?>
                     <option value="<?php echo $city->id?>" <?php if ($city->id == $partner->city_id) { echo "selected"; } ?>><?php echo $city->city_name; ?></option>
                <?php }
                  } ?>
              </select>
            </div>
            <div data-field-span="2">
              <label>Pincode</label>
              <input type="text" name="com_zip" required="true" value="<?php echo $partner->company_zip; ?>">
            </div>
          </div>
          <div data-row-span="4">
            <div data-field-span="2">
              <label>Company Email</label>
              <input type="email" name="com_email" required="true" value="<?php echo $partner->company_email; ?>">
            </div>
            <div data-field-span="2">
              <label>Concern Person Name</label>
              <input type="text" name="com_concern_name" required="true" value="<?php echo $partner->company_concern_person; ?>">
            </div>
          </div>
          <div data-row-span="4">
            <div data-field-span="2">
              <label>Mobile No.</label>
               <input type="number" name="concern_mobile_no" class="form-control" min="10" required="true" value="<?php echo $partner->concern_mobile; ?>">
            </div>
            <div data-field-span="2">
              <label>Concern Person Email </label>
              <input type="email" name="con_email" required="true" value="<?php echo $partner->concern_email; ?>">
            </div>
          </div>
        </fieldset>
        <br><br>
        <fieldset>
            <legend>Purchased Subscription</legend>
            <div data-row-span="3">
                <div data-field-span="1">
                    <label><input type="checkbox" name="hotel_management" value="1" <?php if($partner->hotel_management == 1){ echo "checked";}?>> Hotel Management</label>
                </div>
                <!--<div data-field-span="1">-->
                <!--    <label><input type="checkbox" name="employee_management" value="1" <?php //if($partner->employee_management == 1){ echo "checked";}?>> Employee Management</label>-->
                <!--</div>-->
                <div data-field-span="1">
                    <label><input type="checkbox" name="query_management" value="1" <?php if($partner->query_management == 1){ echo "checked";}?>> Query Management</label>
                </div>
                <div data-field-span="1">
                    <label><input type="checkbox" name="client_management"  value="1" <?php if($partner->client_management == 1){ echo "checked";}?>> Client Management</label>
                </div>
            </div>
            <div data-row-span="3">
                <div data-field-span="1">
                    <label><input type="checkbox" name="vendor_management" value="1" <?php if($partner->vendor_management == 1){ echo "checked";}?>> Vendor Management</label>
                </div>
                <div data-field-span="1">
                    <label><input type="checkbox" name="tourcard_management" value="1" <?php if($partner->tourcard_management == 1){ echo "checked";}?>> Tour Card Management</label>
                </div>
                <!--<div data-field-span="1">-->
                <!--    <label><input type="checkbox" name="workout_management" value="1" <?php //if($partner->workout_management == 1){ echo "checked";}?>> Workout Management</label>-->
                <!--</div>-->
                <div data-field-span="1">
                    <label><input type="checkbox" name="accounts_management" value="1" <?php if($partner->accounts_management == 1){ echo "checked";}?>> Accounts Management</label>
                </div>
            </div>
        </fieldset>
      <div class="clearfix pt20">
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
<?php
    if ($this->uri->segment(2) == 'editPartner') { ?>
    <script src="<?php echo base_url(); ?>jquery-validation/dist/jquery.validate.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/demo/pagejs/partner.js"></script>
<?php
    }