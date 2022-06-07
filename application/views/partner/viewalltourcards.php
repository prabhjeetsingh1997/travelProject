<div class="col-md-11" id="contentCol">
<div id="wrapper">
<div id="layout-static">
<div class="static-content-wrapper">
<div class="static-content">
<div class="page-content" style="margin-top:;">
   <ol class="breadcrumb">
      <li><a href="<?php echo base_url(PARTNER) ?>/dashboard">Home</a></li>
      <li><a href="#">All Tour Card</a></li>
   </ol>
   <div class="page-heading">
      <h1>Tour Card</h1>
      <div class="options">
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
                  <h2>Tour Card</h2>
                  <div class="panel-ctrls">
                  </div>
               </div>
               <div class="panel-body panel-no-padding">
                  <table id="example" class="table table-striped table-bordered exampletable" cellspacing="0" width="100%" data-order='[[ 0, "desc" ]]'>
                     <thead>
                        <tr>
                            <th>Tour card No.</th>
                            <!--<th>Tour card No</th>-->
                            <th>Bkg Date</th>
                            <th>Bkg By</th>
                            <th>Pax Name</th>
                            <th>Party</th>
                            <th>file No</th>
                            <th>Invoice No</th>
                            <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                     <?php if(!empty($tourcard)){
                           foreach ($tourcard as $carddetails) { ?>
                           <tr class="odd gradeX">
                           <td><?php echo 'TWZTC'.$carddetails->tcid; ?></td>
                           <!--<td><?php //echo $carddetails->tc_no; ?></td>-->
                           <td><?php echo $carddetails->bkg_date; ?></td>
                           <td><?php echo $carddetails->bkg_by; ?></td>
                           <td><?php echo $carddetails->pax_name; ?></td>
                           <?php foreach($clntDtls as $clntDtails) {?>
                            <?php if($clntDtails->id == $carddetails->party) {?>
                           <td><?php echo $clntDtails->client_name; ?></td>
                           <?php }?>
                           <?php }?>
                           <td><?php echo $carddetails->file_no; ?></td>
                           <td><?php echo $carddetails->invoice_no; ?></td>
                           <td>
                               <a href="<?php echo base_url(PARTNER) ?>/editTourCard/<?php echo $carddetails->tcid; ?>" data-toggle="tooltip" data-placement="top" title="Edit TourCard"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                               <a class="deleteVendor" href="<?php echo base_url(PARTNER) ?>/deleteTourCard/<?php echo $carddetails->tcid; ?>/<?php echo $carddetails->query_no; ?>" data-toggle="tooltip" data-placement="top" title="Delete Tourcard"><i class="fa fa-trash" aria-hidden="true"></i></a>                             
                           </td>
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
