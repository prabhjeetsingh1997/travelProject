<div class="col-md-11" id="contentCol">
<div id="wrapper">
<div id="layout-static">
<div class="static-content-wrapper">
<div class="static-content">
<div class="page-content" style="margin-top:;">
   <!--<ol class="breadcrumb">-->
   <!--   <li><a href="<?php //echo base_url(PARTNER) ?>/dashboard">Home</a></li>-->
   <!--   <li><a href="#">Client</a></li>-->
   <!--</ol>-->
   <div class="page-heading">
      <h1>Bookings in que</h1>
      <div class="options">
      <!--<a href="<?php //echo base_url(PARTNER) ?>/addClient" class="btn btn-primary" role="button">Add Client</a>-->
     
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
   
           
           <!-------->
           
              <div class="container-fluid">
      <div class="row">
         <div class="col-md-12">
            <div class="panel panel-default">
               <div class="panel-heading">
                  <h2>Packages</h2>
                  <div class="panel-ctrls">
                  </div>
               </div>
               <div class="panel-body panel-no-padding">
                  <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Package Name</th>
                          <th>Start Date</th>
                          <th>End Date</th>
                          <th>Nights</th>
                          <th>Total Pax.</th>
                          <!--<th>Adults</th>-->
                          <!--<th>Kids</th>-->
                          <!--<th>Infants</th>-->
                          <th>Created On</th>
                          <!--<th>Status</th>-->
                          <th>Action</th>        
                        </tr>
                      </thead>
                      <tbody>
                      <?php if(!empty($ConFpackageDtl)){
                           foreach($ConFpackageDtl as $packageDetail){
                      ?>
                            <tr>
                                    
                                <td><?php echo $packageDetail->title."<br>".$packageDetail->state_name." ,".$packageDetail->country_name;?></td>
                                <td><?php echo date('d, F Y', strtotime($packageDetail->start_date));?></td>
                                <td><?php echo date('d, F Y', strtotime($packageDetail->end_date));?></td>
                                <td><?php echo ($packageDetail->duration-1)." Night(s)".$packageDetail->duration." Day(s)";?></td>
                                <td><?php $adults =  explode(",", $packageDetail->total_adults);
                                          $Kids =  explode(",", $packageDetail->total_kids);
                                          //print_r($adults);
                                          echo array_sum($adults)." Adults ";
                                          if($packageDetail->total_kids != 0){
                                          echo " + ".array_sum($Kids)." Kids";
                                          } ?>
                                </td>
                                <td><?php echo date('d, F Y h:i a', strtotime($packageDetail->pakConfirmed_on)); ?></td>
                                <!--<td>-->
                               
                                <?php //if($package->hotel_confirmation == 'Waiting') { ?>
                                      <!--<span class="badge badge-info" style="width: 67px;">-->
                                          <?php //echo $package->hotel_confirmation; ?>
                                      <!--</span>-->
                                <?php //} if($package->hotel_confirmation == 'Pending') { ?>
                                      <!--<span class="badge badge-warning" style="width: 67px;">-->
                                          <?php //echo $package->hotel_confirmation; ?>
                                      <!--</span>-->
                                <?php //} ?>
                                <!--</td>-->
                                <td>
                                    <a href="<?php echo base_url(PARTNER) ?>/viewConfirmedPakDetails/<?php echo $packageDetail->confpak_id; ?>" data-toggle="tooltip" data-placement="top" title="view Details"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                    <!--<a class="cancelBooking" data-toggle="tooltip" rel="<?php //echo $package->id; ?>" data-placement="top" title="Cancel Package"><i class="fa fa-times" aria-hidden="true"></i></a>-->
                                    <!--<div id="detail_<?php// echo $package->id; ?>" style="display:none; text-align: justify;">-->
                                    <!--    <h4 align="center" style="margin-top: 0px;">Booking id: <?php //echo "LiD00".$package->id; ?></h4>-->
                                    <!--</div>-->
                                </td>
                                </tr>
                      
                          <?php } 
                          }?>
                        </tbody>
                  </table>
                  <div class="panel-footer"></div>
               </div>
            </div>
         </div>
      </div>
   </div>
           <!-------->
       
   <!-- .container-fluid -->
</div>

<div id="qDetail" class="modal fade" role="dialog">
  <div class="modal-dialog" style="width: 500px;">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" id="modalHead">Cancel Hotel Booking</h4>
      </div>
      <div class="modal-body" id="mdetail">
          <div class="col-md-12" id="booking_number">
              
          </div>
          <input type="hidden" name="hotelpackage_id" id="hotelpackage_id" value="">
          <div class="form-group">
            <label>Cancelation Reason</label>
            <textarea class="form-control" id="cancel_reason" name="cancel_reason" cols="5" rows="5" placeholder="Enter reason for cancellation" required></textarea>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success" id="cancelquery" name="cancelquery">Submit</button>
      </div>
    </div>

  </div>
</div> 