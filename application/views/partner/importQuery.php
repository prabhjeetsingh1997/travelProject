<div class="col-md-11" id="contentCol">
<div id="wrapper">
<div id="layout-static">
<div class="static-content-wrapper">
<div class="static-content">
<div class="page-content">
<ol class="breadcrumb">
   <li><a href="<?php echo base_url(PARTNER) ?>/dashboard">Home</a></li>
   <li><a href="#">Import Query</a></li>
</ol>
<div class="page-heading">
   <h1>Import Query</h1>
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
    <h2>Import Query</h2><span style="padding-left: 10px;">Download Sample</span><a href="<?php echo base_url() ?>uploads/import_query_sample.csv" style="padding-left: 10px;" download><i class="fa fa-download" aria-hidden="true"></i></a>
  </div>
  <div class="panel-body">
    <form class="grid-form" action="<?php echo base_url(PARTNER) ?>/addImportedQuery" method="POST" enctype="multipart/form-data">
      <fieldset>
        <div data-row-span="2">
          <div data-field-span="1">
            <label>CSV File</label>
            <input type="file" class="form-control" name="csv_file" accept=".csv" required="true">
          </div>
          <div data-field-span="1">
            <!-- <label>Download Sample</label> -->
            <!-- <input type="number" class="form-control" name="contact_no" required="true"> -->
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