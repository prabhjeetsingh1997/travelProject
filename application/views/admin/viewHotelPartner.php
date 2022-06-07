<div id="wrapper">
<div id="layout-static">
<div class="static-content-wrapper">
<div class="static-content">
<div class="page-content">
   <ol class="breadcrumb">
      <li><a href="<?php echo base_url(ADMIN_URL) ?>/dashboard">Home</a></li>
      <li><a href="#">Hotel Partner</a></li>
   </ol>
   <div class="page-heading">
      <h1>List Of Hotel Partners</h1>
      <div class="options">
        <?php
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
                  <h2>Hotel Partner </h2>
                  <div class="panel-ctrls">
                  </div>
               </div>
               <div class="panel-body panel-no-padding">
                  <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                     <thead>
                        <tr>
                            <th>Hotel Name / Company Name</th>
                            <th>Person Name</th>
                            <th>Email Address</th>
                            <th>Contact No.</th>
                            <th>Email Varified</th>
                            <th>Status</th>
                            <th>View Address</th>
                            <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                     <?php if(!empty($hotel_partners)){
                           foreach ($hotel_partners as $hotel_partner) { ?>
                           <tr class="odd gradeX">
                           <td><?php echo $hotel_partner->hotel_name; ?></td>
                           <td><?php echo $hotel_partner->name; ?></td>
                           <td><?php echo $hotel_partner->email; ?></td>
                           <td><?php echo $hotel_partner->contact_no; ?></td>
                           <td><?php if($hotel_partner->email_varified == 1){ echo "Varified"; }else{ echo "Not Varified"; } ?></td>
                            <td><?php if($hotel_partner->status == 1){ echo "Activated"; }else{ echo "Not Activated"; } ?></td>
                           <td align="center">
                               <div id="detail_<?php echo $hotel_partner->hotel_partner_id; ?>" style="display:none; text-align: justify;">
                                   <h4 align="center" style="margin-top: 0px">Address Details :</h4>
                                   <div><strong>Address : </strong><span><?php echo $hotel_partner->address_line_1.", ". $hotel_partner->address_line_2; ?> </span></div>
                                  <div><strong></strong><span><?php echo $hotel_partner->city_name.", ".$hotel_partner->state_name.", ".$hotel_partner->country_name; ?></span></div>
                                 <div><strong>ZIP : </strong><span><?php echo $hotel_partner->zip; ?></span></div>
                              </div>
                              <!--<div id="Hotel_detail_<?php echo $hotel_partner->hotel_partner_id; ?>" style="display:none; text-align: justify;">-->
                              <!--     <h4 align="center" style="margin-top: 0px">Added Hotel By : <?php //echo $hotel_partner->name; ?> </h4>-->
                                   <?php //$hotel_array       = explode(',',$hotel_partner->hotel_names);
                                         //$country_array     = explode(',',$hotel_partner->hotel_countries);
                                         //$state_array       = explode(',',$hotel_partner->hotel_states);
                                         //$city_array        = explode(',',$hotel_partner->hotel_cities);

                                         //for ($i=0; $i <count($hotel_array); $i++) { ?>
                                           <!--<div><strong>Hotel Name : </strong><span><?php //echo $hotel_array[$i]; ?> </span></div>-->
                                           <!--<div><strong>Hotel Address : </strong><span><?php //echo $city_array[$i].', '.$state_array[$i].', '.$country_array[$i]; ?> </span></div></br>-->
                                    <?php //}
                                    ?>
                              </div>
                           <button type="button" rel="<?php echo $hotel_partner->hotel_partner_id; ?>" class="btn btn-info btn-sm viewPartnerAddress" data-toggle="tooltip" data-placement="top" title="View Address Details"><i class="fa fa-eye"></i></button>
                           <!--<button type="button" rel="<?php //echo $hotel_partner->hotel_partner_id; ?>" class="btn btn-info btn-sm viewPartnerHotels" data-toggle="tooltip" data-placement="top" title="View Address Details"><i class="fa fa-eye"></i></button>-->
                           </td>
                           <td>
                               <?php if($hotel_partner->status == 0) {?>
                               <a href="<?php echo base_url(ADMIN_URL) ?>/activateHotelPartner/<?php echo $hotel_partner->hotel_partner_id; ?>" data-toggle="tooltip" data-placement="top" title="Activate Partner"><i class="fa fa-pencil-square-o" aria-hidden="true" style="color:green;"></i></a>
                               <?php }?>
                               <?php if($hotel_partner->status == 1) {?>
                               <a href="<?php echo base_url(ADMIN_URL) ?>/deactivateHotelPartner/<?php echo $hotel_partner->hotel_partner_id; ?>" data-toggle="tooltip" data-placement="top" title="Deactivate Partner"><i class="fa fa-times" aria-hidden="true" style="color:red;"></i></a>
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
        <h4 class="modal-title" id="modalHead">HotelPartner Address Details</h4>
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

