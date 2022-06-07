<div id="wrapper">
<div id="layout-static">
<div class="static-content-wrapper">
<div class="static-content">
<div class="page-content">
<ol class="breadcrumb">
   <li><a href="<?php echo base_url(ADMIN_URL) ?>/dashboard">Home</a></li>
   <li><a href="#">Add Vendor</a></li>
</ol>
<div class="page-heading">
   <h1>Add Vendor</h1>
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
    <form class="grid-form" action="<?php echo base_url(ADMIN_URL) ?>/addNewVendor" method="POST">
      <fieldset>
        <legend>Travel Agent Details</legend>

        <div data-row-span="4">
          <div data-field-span="4">
            <label>Company Name</label>
            <input type="text" name="company_name" required="true">
          </div>
        </div>
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
        <div data-row-span="2">
          <div data-field-span="1">
              <label>city</label>
              <select id="city_id" class="form-control" name="city_id"  required="true">
                 <option value="">Select City</option>
              </select>
            </div>
            <div data-field-span="1">
              <label>Pincode</label>
              <input type="text" name="zip" required="true">
            </div>
        </div>
        <div data-row-span="2">
          <div data-field-span="1">
            <label>Contact no.</label>
            <input type="text" name="travel_agent_contact" required="true">
          </div>
          <div data-field-span="1">
            <label>Alternative No. (if Any)</label>
            <input type="text" name="travel_agent_alternative">
          </div>
        </div>
        <div data-row-span="4">
          <div data-field-span="4">
            <label>Description</label>
            <textarea name="description"></textarea>
          </div>
        </div>
        <br>
        <fieldset>
          <legend>Concerned Person Details</legend>
          <div data-row-span="4">
          <div data-field-span="1">
            <label>Title</label>
            <label><input type="radio" name="concerned-title[]"" value="Mr."> Mr.</label> &nbsp;
            <label><input type="radio" name="concerned-title[]" value="Mrs."> Mrs.</label> &nbsp;
            <label><input type="radio" name="concerned-title[]" value="Ms."> Ms.</label>
          </div>
          <div data-field-span="3">
            <label>Full Name</label>
            <input type="text" name="concern_name" required="true">
          </div>
        </div>
          <div data-row-span="4">
            <div data-field-span="2">
              <label>Contact No</label>
               <input type="text" name="concern_contact" required="true">
            </div>
            <div data-field-span="2">
              <label>Alternative No. (If Any)</label>
               <input type="text" name="concern_alternative">
            </div>
          </div>
          <div data-row-span="4">
            <div data-field-span="2">
              <label>Email</label>
              <input type="email" name="concern_email" required="true">
            </div>
            <div data-field-span="2">
              <label>Sencondry Email (If Any)</label>
              <input type="email" name="concern_secondry_email">
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
            <input type="text" name="pan_no">
          </div>
          <div data-field-span="1">
            <label>Account No.</label>
            <input type="text" name="account_no">
          </div>
        </div>
        <div data-row-span="2">
          <div data-field-span="1">
            <label>Account holder Name</label>
            <input type="text" name="holder_name">
          </div>
          <div data-field-span="1">
            <label>Bank Name</label>
            <input type="text" name="bank_name">
          </div>
        </div>
        <div data-row-span="2">
          <div data-field-span="1">
            <label>Branch</label>
            <input type="text" name="branch">
          </div>
          <div data-field-span="1">
            <label>IFSC</label>
            <input type="text" name="ifsc">
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