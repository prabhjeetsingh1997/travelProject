<div id="wrapper">
<div id="layout-static">
<div class="static-content-wrapper">
<div class="static-content">
<div class="page-content">
<ol class="breadcrumb">
   <li><a href="<?php echo base_url(PARTNER) ?>/dashboard">Home</a></li>
   <li><a href="#">Add Query</a></li>
</ol>
<div class="page-heading">
   <h1>Add Query</h1>
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
    <h2>QUERY Forms</h2>
  </div>
  <div class="panel-body">
    <form class="grid-form" action="<?php echo base_url(PARTNER) ?>/addNewQuerybyemp" method="POST">
      <?php if (!empty($partnerEmployee)) { ?>
            <?php foreach ($partnerEmployee as $emp) { ?>
                <input type="hidden" name="$emp_id" value="<?php echo $emp->id; ?>">
                <input type="hidden" name="$emp_name" value="<?php echo $emp->name; ?>">
            <?php }
        } ?>
      <fieldset>
        <div data-row-span="2">
          <div data-field-span="1">
            <label>Person Name</label>
            <input type="text" name="person_name" required="true">
          </div>
          <div data-field-span="1">
            <label>Contact No</label>
            <input type="number" class="form-control" name="contact_no" required="true">
          </div>
          
        </div>
        <div data-row-span="4">
          <div data-field-span="2" data-field-error="Please enter a valid email address">
            <label>Email</label>
            <input type="email" name="email">
          </div>
          <div data-field-span="2">
            <label>Message</label>
            <input type="text" name="message">
          </div>
        </div>
        <div data-row-span="4">
          <div data-field-span="1">
            <label>Destination</label>
           <input type="text" name="destination">
          </div>
          <div data-field-span="1">
            <label>Travel Date</label>
           <input type="text" name="travel_date">
          </div>
          <div data-field-span="1">
            <label>Nights</label>
           <input type="text" name="nights">
          </div>
          <div data-field-span="1">
            <label>No. of Pax</label>
           <input type="text" name="pax_no">
          </div>
        </div>
        <div data-row-span="5">
          <div data-field-span="1">
            <label>No. of Rooms Reqd</label>
           <input type="text" name="no_of_rooms">
          </div>
          <div data-field-span="1">
            <label>Hotel Category</label>
           <input type="text" name="hotel_category">
          </div>
          <div data-field-span="1">
            <label>Meal Plan</label>
           <input type="text" name="meal_plan">
          </div>
          <div data-field-span="1">
            <label>Vehicle Reqd.</label>
           <input type="text" name="vehicle">
          </div>
          <div data-field-span="1">
            <label>Other Req.</label>
           <input type="text" name="other">
          </div>
        </div>
         </fieldset>
        <br></br>
      <div class="clearfix pt20">
        <div class="pull-right">
          <button class="btn-primary btn">Submit Query</button>
        </div>
      </div>
    </form>
  </div>
</div>
</div> <!-- .container-fluid -->
<!-- #page-content -->
</div>
<?php
    if ($this->uri->segment(2) == 'addQuerybyemp') { ?>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/form-ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/demo/pagejs/partner/addQuery.js"></script>
<?php
    }
?>


