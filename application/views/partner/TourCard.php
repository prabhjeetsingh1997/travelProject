<div class="col-md-10">
<div id="wrapper">
<div id="layout-static">
<div class="static-content-wrapper">
<div class="static-content">
<div class="page-content" style="margin-top:;">
<ol class="breadcrumb">
   <li><a href="<?php echo base_url(PARTNER) ?>/dashboard">Home</a></li>
   <li><a href="#">Tour Card</a></li>
</ol>
<div class="page-heading">
   <h1>Make Tour Card</h1>
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
    <h2>Make Tour Card</h2>
  </div>
  <div class="panel-body">
    <form class="grid-form" action="<?php echo base_url(PARTNER) ?>/makeTourcard" method="POST">
      <input type="hidden" name="query_id" value="<?php echo $query->id; ?>">
      <fieldset>
        <div data-row-span="4">
          <div data-field-span="1">
            <label>Tour Card No:</label>
            <input type="text" class="form-control" name="query_id" value="" required="true" readonly>
          </div>
          <div data-field-span="1">
            <label>Bkg Date</label>
            <input type="date" class="form-control" name="person_name" value="" required="true">
          </div>
          <div data-field-span="1">
            <label>Bkg. By</label>
            <input type="text" class="form-control" name="contact_no" value="" required="true" readonly>
          </div>
		  <div data-field-span="1">
            <label>Bkg Type:</label>
            <input type="text" class="form-control" name="contact_no" value="" required="true" >
          </div>
   
        </div>
		
      <!-----  <div data-row-span="4">
          <div data-field-span="2" data-field-error="Please enter a valid email address">
            <label>Email</label>
            <input type="email" name="email" value="<?php echo $query->email; ?>">
          </div>
          <div data-field-span="2">
            <label>Remark</label>
            <input type="text" name="message" value="<?php echo $query->message; ?>">
          </div>
        </div>
        <div data-row-span="4">
          <div data-field-span="1">
            <label>Destination</label>
           <input type="text" name="destination" value="<?php echo $query->destination; ?>">
          </div>
          <div data-field-span="1">
            <label>Travel Date</label>
           <input type="text" name="travel_date" value="<?php echo $query->travel_date; ?>">
          </div>
          <div data-field-span="1">
            <label>Nights</label>
           <input type="text" name="nights" value="<?php echo $query->nights; ?>">
          </div>
          <div data-field-span="1">
            <label>No. of Pax</label>
           <input type="text" name="pax_no" value="<?php echo $query->pax_no; ?>">
          </div>
        </div>
        <div data-row-span="5">
          <div data-field-span="1">
            <label>No. of Rooms Reqd</label>
           <input type="text" name="no_of_rooms" value="<?php echo $query->no_of_rooms; ?>">
          </div>
          <div data-field-span="1">
            <label>Hotel Category</label>
           <input type="text" name="hotel_category" value="<?php echo $query->hotel_category; ?>">
          </div>
          <div data-field-span="1">
            <label>Meal Plan</label>
           <input type="text" name="meal_plan" value="<?php echo $query->meal_plan; ?>">
          </div>
          <div data-field-span="1">
            <label>Vehicle Reqd.</label>
           <input type="text" name="vehicle" value="<?php echo $query->vehicle; ?>">
          </div>
          <div data-field-span="1">
            <label>Other Req.</label>
           <input type="text" name="other" value="<?php echo $query->other; ?>">
          </div>
        </div>------>
         </fieldset>
        <br></br>
      <div class="clearfix pt20">
        <div class="pull-right">
          <button class="btn-primary btn">Update Query</button>
        </div>
      </div>
    </form>
  </div>
</div>
</div> <!-- .container-fluid -->
<!-- #page-content -->
</div>