<div id="wrapper">
<div id="layout-static">
<div class="static-content-wrapper">
<div class="static-content">
<div class="page-content">
<ol class="breadcrumb">
   <li><a href="<?php echo base_url(ADMIN_URL) ?>/dashboard">Home</a></li>
   <li><a href="#">Add Employee</a></li>
</ol>
<div class="page-heading">
   <h1>Add Employee</h1>
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
    <h2>Employee Forms</h2>
  </div>
  <div class="panel-body">
    <form class="grid-form" action="<?php echo base_url(ADMIN_URL) ?>/addNewEmployee" method="POST">
      <fieldset>
        <legend>Personal Details</legend>

        <div data-row-span="4">
          <div data-field-span="1">
            <label>Title</label>
            <label><input type="radio" name="employee-title[]"" value="Mr."> Mr.</label> &nbsp;
            <label><input type="radio" name="employee-title[]" value="Mrs."> Mrs.</label> &nbsp;
            <label><input type="radio" name="employee-title[]" value="Ms."> Ms.</label>
          </div>
          <div data-field-span="3">
            <label>Full Name</label>
            <input type="text" name="name" required="true">
          </div>
        </div>
        <div data-row-span="2">
          <div data-field-span="1">
            <label>Primary Email</label>
            <input type="email" name="primary_email" required="true">
          </div>
          <div data-field-span="1">
            <label>Secondary Email (if Any)</label>
            <input type="email" name="secondary_email">
          </div>
          
        </div>
        <div data-row-span="4">
          <div data-field-span="2" data-field-error="Please enter a valid email address">
            <label>Password</label>
            <input type="text" name="password" required="true">
          </div>
          <div data-field-span="1">
            <label>Mobile No.</label>
            <input type="text" name="mobile_no" required="true">
          </div>
          <div data-field-span="1">
            <label>Alternative No (if Any)</label>
            <input type="text" name="alertnative_no">
          </div>
        </div>
        <div data-row-span="2">
          <div data-field-span="1">
            <label>Father Name</label>
            <input type="text" name="father_name">
          </div>
          <div data-field-span="1">
            <label>Mother Name</label>
            <input type="text" name="mother_name">
          </div>
        </div>
        <div data-row-span="2">
          <div data-field-span="1">
            <label>Emergency no.</label>
            <input type="text" name="emergency_no">
          </div>
          <div data-field-span="1">
            <label>Date of birth</label>
            <input type="text" name="dob" id="datepicker" required="true">
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
        <legend>Official Details</legend>
        <div data-row-span="2">
          <div data-field-span="1">
            <label>Designation</label>
            <input type="text" name="designation" required="true">
          </div>
          <div data-field-span="1">
            <label>Department</label>
            <input type="text" name="department" required="true">
          </div>
        </div>
        <div data-row-span="2">
          <div data-field-span="1">
            <label>Joining Date</label>
            <input type="text" name="joining_date" id="datepicker1">
          </div>
          <div data-field-span="1">
            <label>Termination Date</label>
            <input type="text" name="termination_date" id="datepicker2">
          </div>
        </div>
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