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
      <h1>Confirmed Hotel Bookings</h1>
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
                  <h2>Hotels</h2>
                  <div class="panel-ctrls">
                  </div>
               </div>
               <div class="panel-body panel-no-padding">
                  <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                             <thead>
                        <tr>
                         
                          <th>Hotel Name</th>
                          <th>Check In</th>
                          <th>Check Out</th>
                          <th>Nights</th>
                          <th>Total Pax.</th>
                          <th>Rooms</th>
                          <th>Purchase Cost</th>
                          <!--<th>Handler</th>-->
                          <th>Created On</th>
                          <th>Status</th>
                          <th>Action</th>        
                        </tr>
                      </thead>
                      <tbody>
                      <?php if(!empty($hotelpackage)){
                           foreach($hotelpackage as $package){
                      ?>
                      
                                <tr>
                                    
                                <td><?php echo $package->hotel_name."<br>".$package->city_name.", ".$package->state_name." ,".$package->country_name;?></td>
                                <td><?php echo date('d, F Y', strtotime($package->check_in_date));?></td>
                                <td><?php echo date('d, F Y', strtotime($package->check_out_date));?></td>
                                <td><?php echo $package->nights;?></td>
                                <td><?php echo $package->total_adults." Adults ";if($package->total_kids != 0){echo " + ".$package->total_kids." Kids";} ?></td>
                                <td><?php echo $package->total_rooms; ?></td>
                                <td>
                                <?php
                                    $prices = json_decode($package->room_prices, TRUE);
                                    $saleprice = array_sum($prices);
                                    $gstonmarkup = $saleprice*$markup/100*18/100;
                                    //$gstonmarkup = $package->markup*18/100;
                                    $finalprice = $saleprice*$markup/100 + $saleprice;
                                    $finalpricewithgst = $finalprice + $gstonmarkup;
                                    echo "₹".$finalpricewithgst;
                                ?>
                                </td>
                                <!--<td><?php //echo $package->handler_name; ?></td>-->
                                <td><?php echo date('d, F Y h:i a', strtotime($package->created_on)); ?></td>
                                <td><?php if($package->hotel_confirmation == 'Confirmed') {?>
                                      <span class="badge badge-success" style="width: 67px;">
                                          <?php echo $package->hotel_confirmation; ?>
                                      </span>
                                <?php 
                                } ?>
                                </td>
                                <td>
                                    <a href="<?php echo base_url(PARTNER) ?>/EditSavedHotelPackages/<?php echo $package->id; ?>" data-toggle="tooltip" data-placement="top" title="Edit Package"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                    <?php
                                    if($package->hotel_confirmation == "Confirmed") {?>
                                    <button type="button" rel="<?php echo $package->id; ?>" class="btn btn-info btn-xs viewHotelConf" data-toggle="tooltip" data-placement="top" title="View Cofirmation Details"><i class="fa fa-eye"></i></button>
                                    <div id="detail_<?php echo $package->id; ?>" style="display:none; text-align: justify;">
                                       <h4 align="center" style="margin-top: 0px">Confirmation Details</h4>
                                       <div><strong>Booking Number : </strong><span>LiD00<?php echo $package->id; ?> </span></div>
                                       <div><strong>Hotel Confirmation : </strong><span><?php echo $package->voucher_number; ?> </span></div>
                                       <div><strong>Confirmed On : </strong><span><?php echo date('d, F Y h:i a', strtotime($package->confirmed_on)); ?></span></div>
                                    </div>
                                    <?php }
                                    ?>
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
        <h4 class="modal-title" id="modalHead">Hotel Confirmation</h4>
      </div>
      <div class="modal-body" id="mdetail">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div> 

<!-- #page-content -->
<?php
    //if ($this->uri->segment(2) == 'viewClient') { ?>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/form-ckeditor/ckeditor.js"></script>
<?php
    //}
?>
<script>
    $(document).on('click',".viewHotelConf",function(){
          $("#qDetail").modal();
          
          var id = $(this).attr('rel');
          //$("#modalHead").html($("#nameAddrdetails_"+id).html());
          $("#mdetail").html($("#detail_"+id).html());
      
    });
</script>