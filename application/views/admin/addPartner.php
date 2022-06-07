<div id="wrapper">
<div id="layout-static">
<div class="static-content-wrapper">
<div class="static-content">
<div class="page-content">
<ol class="breadcrumb">
   <li><a href="<?php echo base_url(ADMIN_URL) ?>/dashboard">Home</a></li>
   <li><a href="#">Add Partner</a></li>
</ol>
<div class="page-heading">
   <h1>Add Partner</h1>
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
    <form class="grid-form" action="<?php echo base_url(ADMIN_URL) ?>/addNewPartner" method="POST" enctype="multipart/form-data">
      <fieldset>
        <legend>Partner Details</legend>

        <div data-row-span="4">
          <div data-field-span="1">
            <label>Title</label>
            <label><input type="radio" name="partner-title[]" value="Mr."> Mr.</label> &nbsp;
            <label><input type="radio" name="partner-title[]" value="Mrs."> Mrs.</label> &nbsp;
            <label><input type="radio" name="partner-title[]" value="Ms."> Ms.</label>
          </div>
          <div data-field-span="3">
            <label>Full Name</label>
            <input type="text" name="name" required="true">
          </div>
        </div>
        <div data-row-span="2">
          <div data-field-span="1">
            <label>Primary Email</label>
            <input type="email" name="email" required="true">
          </div>
          <div data-field-span="1">
            <label>Password</label>
            <input type="password" class="form-control" name="password">
          </div>
          
        </div>
        <div data-row-span="4">
          <div data-field-span="2">
            <label>Mobile No.</label>
            <input type="number" name="mobile_no" class="form-control" min="10" required="true">
          </div>
          <div data-field-span="2">
            <label>Alternative No (if Any)</label>
            <input type="number" class="form-control" name="alternative_no">
          </div>
        </div>
          <div data-row-span="2">
          <div data-field-span="1">
            <label>Markup</label>
            <input type="number" name="markup" class="form-control" required="true">
          </div>
          <div data-field-span="1">
            <label>Logo</label>
            <input type="file" name="logo" class="form-control" required="true">
          </div>
          </div>
        <br>
        <fieldset>
          <legend>Permanent Address</legend>
          <div data-row-span="2">
            <div data-field-span="1">
              <label>Address Line 1</label>
              <input type="text" name="address_line_1" required="true">
            </div>
            <div data-field-span="1">
              <label>Address Line 2</label>
              <input type="text" name="address_line_2">
            </div>
          </div>
          <div data-row-span="4">
            <div data-field-span="2">
              <label>Country</label>
              <select id="country_id" class="form-control" name="country_id" required="true">
                 <option value="">Select Country</option>
                <?php if(!empty($countries)){
                    foreach ($countries as $country) { ?>
                     <option value="<?php echo $country->id?>"><?php echo $country->country_name; ?></option>
                <?php }
                  } ?>
                </select>
            </div>
            <div data-field-span="2">
              <label>State</label>
              <select id="state_id" class="form-control" name="state_id"  required="true">
                 <option value="">Select State</option>
                </select>
            </div>
          </div>
          <div data-row-span="4">
            <div data-field-span="2">
              <label>city</label>
              <select id="city_id" class="form-control" name="city_id"  required="true">
                 <option value="">Select City</option>
              </select>
            </div>
            <div data-field-span="2">
              <label>Pincode</label>
              <input type="text" name="zip" required="true">
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
              <input type="text" name="compnay_name" required="true">
            </div>
            <div data-field-span="1">
              <label>Company Address Line 1</label>
              <input type="text" name="com_address_line_1">
            </div>
            <div data-field-span="1">
              <label>Company Address Line 2</label>
              <input type="text" name="com_address_line_2">
            </div>
          </div>
          <div data-row-span="4">
            <div data-field-span="2">
              <label>Country</label>
              <select id="com_country_id" class="form-control" name="com_country_id" required="true">
                 <option value="">Select Country</option>
                <?php if(!empty($countries)){
                    foreach ($countries as $country) { ?>
                     <option value="<?php echo $country->id?>"><?php echo $country->country_name; ?></option>
                <?php }
                  } ?>
                </select>
            </div>
            <div data-field-span="2">
              <label>State</label>
              <select id="com_state_id" class="form-control" name="com_state_id"  required="true">
                 <option value="">Select State</option>
                </select>
            </div>
          </div>
          <div data-row-span="4">
            <div data-field-span="2">
              <label>city</label>
              <select id="com_city_id" class="form-control" name="com_city_id"  required="true">
                 <option value="">Select City</option>
              </select>
            </div>
            <div data-field-span="2">
              <label>Pincode</label>
              <input type="text" name="com_zip" required="true">
            </div>
          </div>
          <div data-row-span="4">
            <div data-field-span="2">
              <label>Company Email</label>
              <input type="email" name="com_email" required="true">
            </div>
            <div data-field-span="2">
              <label>Concern Person Name</label>
              <input type="text" name="com_concern_name" required="true">
            </div>
          </div>
          <div data-row-span="4">
            <div data-field-span="2">
              <label>Mobile No.</label>
               <input type="number" name="concern_mobile_no" class="form-control" min="10" required="true">
            </div>
            <div data-field-span="2">
              <label>Concern Person Email </label>
              <input type="email" name="con_email" required="true">
            </div>
          </div>
        </fieldset>
        <br><br>
        <fieldset>
            <legend>Purchased Subscription</legend>
            <div data-row-span="3">
                <div data-field-span="1">
                    <label><input type="checkbox" name="hotel_management"  value="1"> Hotel Management</label>
                </div>
                <!--<div data-field-span="1">-->
                <!--    <label><input type="checkbox" name="employee_management"  value="1"> Employee Management</label>-->
                <!--</div>-->
                <div data-field-span="1">
                    <label><input type="checkbox" name="query_management"  value="1"> Query Management</label>
                </div>
                <div data-field-span="1">
                    <label><input type="checkbox" name="client_management" value="1"> Client Management</label>
                </div>
            </div>
            <div data-row-span="3">
                <div data-field-span="1">
                    <label><input type="checkbox" name="vendor_management" value="1"> Vendor Management</label>
                </div>
                <div data-field-span="1">
                    <label><input type="checkbox" name="tourcard_management" value="1"> Tour Card Management</label>
                </div>
                <!--<div data-field-span="1">-->
                <!--    <label><input type="checkbox" name="workout_management" value="1"> Workout Management</label>-->
                <!--</div>-->
                <div data-field-span="1">
                    <label><input type="checkbox" name="accounts_management" value="1"> Accounts Management</label>
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
<?php
    if ($this->uri->segment(2) == 'addPartner') { ?>
    <script src="<?php echo base_url(); ?>jquery-validation/dist/jquery.validate.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/demo/pagejs/partner.js"></script>
<?php
    }