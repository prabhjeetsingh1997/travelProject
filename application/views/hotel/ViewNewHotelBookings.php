<div id="wrapper">
<div id="layout-static">
<div class="static-content-wrapper">
<div class="static-content">
<div class="page-content">
   <ol class="breadcrumb">
      <li><a href="<?php echo base_url(HOTEL) ?>/dashboard">Home</a></li>
      <li><a href="#">Pending Bookings</a></li>
   </ol>
   <div class="page-heading">
      <h1>List of All Bookings</h1>
      <div class="options">
      <!--<a href="<?php //echo base_url(HOTEL) ?>/addHotel" class="btn btn-primary" role="button">Add Hotel</a>-->
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
                  <h2>Hotels</h2>
                  <div class="panel-ctrls">
                  </div>
               </div>
               <div class="panel-body panel-no-padding">
                   <div class="table-responsive">
                  <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%" >
                     <thead>
                        <tr>
                            <th>Hotel Name</th>
                            <th>Check In</th>
                            <th>Check Out</th>
                            <th>Total Pax.</th>
                            <th>Nights</th>
                            <th>Rooms</th>
                            <th>Total Amount</th>
                            <th>Created On</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                     <?php if(!empty($hotelbookings)){
                           foreach($hotelbookings as $hotel) { ?>
                           <tr class="odd gradeX">
                           <td><?php echo $hotel->hotel_name.'<br>'.$hotel->city_name.', '.$hotel->state_name.', '.$hotel->country_name; ?></td>
                           <td><?php echo date('d, F Y', strtotime($hotel->check_in_date)); ?></td>
                           <td><?php echo date('d, F Y', strtotime($hotel->check_out_date)); ?></td>
                           <td><?php echo $hotel->total_adults." Adults";if($hotel->total_kids != 0){echo " +".$hotel->total_kids." Kids";} ?></td>
                           <td><?php echo $hotel->nights; ?></td>
                           <td><?php echo $hotel->total_rooms; ?></td>
                           <td>
                            <?php
                                $originalprice = json_decode($hotel->room_prices, TRUE);
                                $purchasecost = array_sum($originalprice);
                                echo "₹".$purchasecost;
                            ?>
                           </td>
                           <td><?php echo date('d, F Y h:i a', strtotime($hotel->created_on));?></td>
                           <td>
                           <?php if($hotel->hotel_confirmation == "Pending") {?>
                                 <span class="badge badge-warning" style="width: 67px;">
                                     <?php echo $hotel->hotel_confirmation; ?>
                                 </span>
                           <?php
                            } ?>
                           </td>
                           <td>
                               <a href="<?php echo base_url(HOTEL); ?>/viewHotelBooking/<?php echo $hotel->id; ?>" data-toggle="tooltip" data-placement="top" title="Hotel Employee"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                           </td>
                        </tr>
                        <?php }
                        } ?>
                        
                     </tbody>
                  </table>
                  </div>
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
        <h4 class="modal-title" id="modalHead">Hotel Details</h4>
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


