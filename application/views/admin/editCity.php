<div id="wrapper">
<div id="layout-static">
<div class="static-content-wrapper">
<div class="static-content">
<div class="page-content">
<ol class="breadcrumb">
   <li><a href="<?php echo base_url(ADMIN_URL) ?>/dashboard">Home</a></li>
   <li><a href="#">Edit City</a></li>
</ol>
<div class="page-heading">
   <h1>Edit City</h1>
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
   <div data-widget-group="group1">
      <div class="panel panel-default" data-widget='{"draggable": "false"}'>
         <div class="panel-heading">
            <h2>City Form Elements</h2>
            <div class="panel-ctrls"
               data-actions-container="" 
               data-action-collapse='{"target": ".panel-body"}'
               data-action-expand=''
               data-action-colorpicker=''
               >
            </div>
         </div>
         <div class="panel-editbox" data-widget-controls=""></div>
         <div class="panel-body">
            <form action="<?php echo base_url(ADMIN_URL) ?>/updateCity" class="form-horizontal row-border" method="POST">
            <input type="hidden" name="city_id" value="<?php echo $city->id; ?>">
            <div class="form-group">
                <label for="sel1" class="col-sm-2 control-label">Select State:</label>
                <div class="col-sm-8">
                <select class="form-control" id="sel1" name="state_id"  required="true">
                <?php if(!empty($states)){
                    foreach ($states as $state) { ?>
                     <option value="<?php echo $state->id?>" <?php if ($state->id == $city->state_id) { echo "selected"; } ?>><?php echo $state->state_name; ?></option>
                <?php }
                  } ?>
                </select>
                </div>
              </div>
               <div class="form-group">
                  <label class="col-sm-2 control-label">City Name</label>
                  <div class="col-sm-8">
                     <input type="text" name="city_name" class="form-control" value="<?php echo $city->city_name; ?>" required="true">
                  </div>
               </div>
                <div class="panel-footer">
               <div class="row">
                  <div class="col-sm-8 col-sm-offset-2">
                     <button type="submit" class="btn-primary btn">Submit</button>
                  </div>
               </div>
            </div>
            </form>
         </div>
      </div>
   </div>
   <!-- .container-fluid -->
</div>
<!-- #page-content -->
</div>