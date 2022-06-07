<div id="wrapper">
<div id="layout-static">
<div class="static-content-wrapper">
<div class="static-content">
<div class="page-content">
   <ol class="breadcrumb">
      <li><a href="<?php echo base_url(ADMIN_URL) ?>/dashboard">Home</a></li>
      <li><a href="#">Counties</a></li>
   </ol>
   <div class="page-heading">
      <h1>All Counties</h1>
      <div class="options">
      <a href="<?php echo base_url(ADMIN_URL) ?>/addCountry" class="btn btn-primary" role="button">Add Country</a>
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
      </div>
   </div>
   <div class="container-fluid">
      <div class="row">
         <div class="col-md-12">
            <div class="panel panel-default">
               <div class="panel-heading">
                  <h2>Counties</h2>
                  <div class="panel-ctrls">
                  </div>
               </div>
               <div class="panel-body panel-no-padding">
                  <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                     <thead>
                        <tr>
                           <th>Country ID</th>
                           <th>Country Name</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                     <?php if(!empty($countries)){
                           foreach ($countries as $country) { ?>
                           <tr class="odd gradeX">
                           <td><?php echo $country->id; ?></td>
                           <td><?php echo $country->country_name; ?></td>
                           <td><a href="<?php echo base_url(ADMIN_URL) ?>/editCountry/<?php echo $country->id; ?>" data-toggle="tooltip" data-placement="top" title="Edit Country"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                        </tr>
                        <?php }
                        } ?>
                        
                     </tbody>
                  </table>
                  <div class="panel-footer"></div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- .container-fluid -->
</div>
<!-- #page-content -->