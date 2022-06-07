<div id="wrapper">
<div id="layout-static">
<div class="static-content-wrapper">
<div class="static-content">
<div class="page-content">
   <ol class="breadcrumb">
      <li><a href="<?php echo base_url(ADMIN_URL) ?>/dashboard">Home</a></li>
      <li><a href="#">Cities</a></li>
   </ol>
   <div class="page-heading">
      <h1>All City</h1>
      <div class="options">
      <a href="<?php echo base_url(ADMIN_URL) ?>/addCity" class="btn btn-primary" role="button">Add City</a>
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
                  <h2>Cities</h2>
                  <div class="panel-ctrls">
                  </div>
               </div>
               <div class="panel-body panel-no-padding">
                  <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                     <thead>
                        <tr>
                           <th>Country Name</th>
                           <th>State Name</th>
                           <th>City Name</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                     <?php if(!empty($cities)){
                           foreach ($cities as $city) { ?>
                           <tr class="odd gradeX">
                           <td><?php echo $city->country_name; ?></td>
                           <td><?php echo $city->state_name; ?></td>
                           <td><?php echo $city->city_name; ?></td>
                           <td><a href="<?php echo base_url(ADMIN_URL) ?>/editCity/<?php echo $city->id; ?>/<?php echo $city->state_id; ?>/<?php echo $city->country_id; ?>" data-toggle="tooltip" data-placement="top" title="Edit City"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
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