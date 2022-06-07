<div class="col-md-11" id="contentCol">
<div id="wrapper">
<div id="layout-static">
<div class="static-content-wrapper">
<div class="static-content">
<div class="page-content" style="margin-top:;">
   <ol class="breadcrumb">
      <li><a href="<?php echo base_url(PARTNER) ?>/dashboard">Home</a></li>
      <li><a href="#">Confirmed Query</a></li>
   </ol>
   <div class="page-heading">
      <h1>Confirmed Query</h1>
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
                  <h2>Confirmed Query</h2>
                  <div class="panel-ctrls">
                  </div>
               </div>
               <div class="panel-body panel-no-padding">
                  <table id="example" class="table table-striped table-bordered exampletable" cellspacing="0" width="100%" data-order='[[ 0, "desc" ]]'>
                     <thead>
                        <tr>
                            <th>Query No.</th>
                            <th>Person Name</th>
                            <th>Contact No</th>
                            <th>Destination</th>
                            <th>Remark</th>
                            <th>Details</th>
                            <th>Status</th>
                            <th>Query Date</th>
                            <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                     <?php if(!empty($inHandQuery)){
                           foreach ($inHandQuery as $query) { ?>
                           <tr class="odd gradeX" style="background-color: <?php echo $query->query_color; ?>">
                           <td><?php echo 'TWZQ00'.$query->id; ?></td>
                           <td><?php echo $query->person_name; ?></td>
                           <td><?php echo $query->contact_no; ?></td>
                           <td><?php echo $query->destination; ?></td>
                           <td><?php echo $query->message; ?></td>
                           <td align="center">
                               <div id="detail_<?php echo $query->id; ?>" style="display:none; text-align: justify;">
                                   <h4 align="center" style="margin-top: 0px;">Details :</h4>
                                   <div><table border="1" cellspacing="1" cellpadding="1" style="width:100%;"><tbody><tr>
                                      <td style="width:60%;">Email:</td>
                                      <td style="min-width:40%"><?php echo $query->email; ?></td>
                                    </tr>
                                    <tr>
                                      <td>Travel Dates:</td>
                                      <td><?php echo $query->travel_date; ?></td>
                                    </tr>
                                    <tr>
                                      <td>Nights:</td>
                                      <td><?php echo $query->nights; ?></td>
                                    </tr>
                                    <tr>
                                      <td>No. of Pax:</td>
                                      <td><?php echo $query->pax_no; ?></td>
                                    </tr>
                                    <tr>
                                      <td>No. of Rooms Reqd.:</td>
                                      <td><?php echo $query->no_of_rooms; ?></td>
                                    </tr>
                                    <tr>
                                      <td>Hotel Category:</td>
                                      <td><?php echo $query->hotel_category; ?></td>
                                    </tr>
                                    <tr>
                                      <td>Vehicle Reqd.:</td>
                                      <td><?php echo $query->vehicle; ?></td>
                                    </tr>
                                    <tr>
                                      <td>Meal Plan:</td>
                                      <td><?php echo $query->meal_plan; ?></td>
                                    </tr>
                                    <tr>
                                      <td>Other Req.:</td>
                                      <td><?php echo $query->other; ?></td>
                                    </tr>
                                  </tbody>
                                </table></div>
                              </div>
                           <button type="button" rel="<?php echo $query->id; ?>" class="btn btn-info btn-sm viewEmployeeDetail" data-toggle="tooltip" data-placement="top" title="View Query Details"><i class="fa fa-eye"></i></button>
                           </td>
                           <td><?php if ($query->status == 0) {
                                        echo "Reply Pending";
                                      }elseif ($query->status == 1) {
                                          echo "Replied & Ongoing";
                                      }elseif($query->status == 2){
                                          echo "Confirmed";
                                      }elseif ($query->status == 3) {
                                        echo "Cancelled";
                                      }else{
                                        echo "Open";
                                      } ?>
                                        
                            </td>
                            <td><?php echo date('Y-m-d H:i a', strtotime($query->query_date)); ?></td>
                           <td>
                           <!-- <a class="maketourcard" rel="<?php echo $query->id; ?>" data-toggle="modal" data-target="#TourCard" data-placement="top" title="Tour Card"><i class="fa fa-file-text-o" aria-hidden="true"></i></a> -->
                          <?php if($query->tourcard == 1) { ?>
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            <i class="fa fa-undo" aria-hidden="true"></i>
                            <i class="fa fa-times" aria-hidden="true"></i>
                            <i class="fa fa-file-text-o" aria-hidden="true"></i>
                            <?php } else {?>
                              
                              <a href="<?php echo base_url(PARTNER) ?>/editQuery/<?php echo $query->id; ?>" data-toggle="tooltip" data-placement="top" title="Edit Query"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                              <a class="deleteVendor" href="<?php echo base_url(PARTNER) ?>/undoConfirmed/<?php echo $query->id; ?>" data-toggle="tooltip" data-placement="top" title="Undo Query"><i class="fa fa-undo" aria-hidden="true"></i></a> 
                              <a class="viewpartnerEmployee" data-toggle="tooltip" rel="<?php echo $query->id; ?>" data-placement="top" title="Cancel Query"><i class="fa fa-times" aria-hidden="true"></i></a>  
                              <a href="<?php echo base_url(PARTNER) ?>/NewTourCard/<?php echo $query->id; ?>" data-toggle="tooltip" data-placement="top" title="Tour Card"><i class="fa fa-file-text-o" aria-hidden="true"></i></a>
                              <?php }?>
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

<div id="qDetail" class="modal fade" role="dialog">
  <div class="modal-dialog" style="width: 500px;">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" id="modalHead">Employee Details</h4>
      </div>
      <div class="modal-body" id="mdetail">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<div id="empDetail" class="modal fade" role="dialog">
  <div class="modal-dialog" style="width: 500px;">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" id="empModel">Cancel Reason</h4>
      </div>
      <div class="modal-body" id="empdetail">
        <input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(PARTNER); ?>">
        <input type="hidden" name="query_id" id="query_id">
        <label>Cancelation Reason</label>
        <textarea class="form-control" id="cancel_reason" name="cancel_reason" cols="5" rows="5"></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         <button type="button" class="btn btn-primary" id="cancelquery">Sumbit</button>
      </div>
    </div>

  </div>
</div> 



<!-- #page-content -->

<?php
    if($this->uri->segment(2) == 'confirmedQuery') { ?>
      <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/form-ckeditor/ckeditor.js"></script>
      <script type="text/javascript" src="<?php echo base_url(); ?>assets/demo/pagejs/partner/viewQuery.js"></script>
      <!-- <script type="text/javascript" src="<?php //echo base_url(); ?>assets/demo/pagejs/partner/tourcard.js"></script> -->
<?php
    }
?>

