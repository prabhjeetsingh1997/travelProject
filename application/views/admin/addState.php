<div id="wrapper">
<div id="layout-static">
<div class="static-content-wrapper">
<div class="static-content">
<div class="page-content">
<ol class="breadcrumb">
   <li><a href="<?php echo base_url(ADMIN_URL) ?>/dashboard">Home</a></li>
   <li><a href="#">Add State</a></li>
</ol>
<div class="page-heading">
   <h1>Add State</h1>
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
            <h2>State Form Elements</h2>
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
            <form action="<?php echo base_url(ADMIN_URL) ?>/uploadState" class="form-horizontal row-border" method="POST">
            <input type="hidden" name="state_status" value="1">
            <div class="form-group">
                <label for="sel1" class="col-sm-2 control-label">Select Country:</label>
                <div class="col-sm-8">
                <select class="form-control" id="sel1" name="country_id"  required="true">
                <?php if(!empty($countries)){
                    foreach ($countries as $country) { ?>
                     <option value="<?php echo $country->id?>"><?php echo $country->country_name; ?></option>
                <?php }
                  } ?>
                </select>
                </div>
              </div>
               <div class="form-group">
                  <label class="col-sm-2 control-label">State Name</label>
                  <div class="col-sm-8">
                     <input type="text" name="state_name" class="form-control" required="true">
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