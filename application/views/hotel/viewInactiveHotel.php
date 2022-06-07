<div id="wrapper">
<div id="layout-static">
<div class="static-content-wrapper">
<div class="static-content">
<div class="page-content">
   <ol class="breadcrumb">
      <li><a href="<?php echo base_url(HOTEL) ?>/dashboard">Home</a></li>
      <li><a href="#">View Hotel</a></li>
   </ol>
   <div class="page-heading">
      <h1>Inactive Hotel</h1>
      <div class="options">
      <a href="<?php echo base_url(HOTEL) ?>/addHotel" class="btn btn-primary" role="button">Add Hotel</a>
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
                  <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                     <thead>
                        <tr>
                            <th>Hotel Name</th>
                            <th>Hotel Address</th>
                            <th>City</th>
                            <th>State</th>
                            <th>Country</th>
                            <th>Concern Person</th>
                            <th>Concern Phone</th>
                            <th>Hotel Status</th>
                            <th>View Details</th>
                            <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                     <?php if(!empty($partners_hotel)){
                           foreach ($partners_hotel as $hotel) { ?>
                           <tr class="odd gradeX">
                           <td><?php echo $hotel->hotel_name; ?></td>
                           <td><?php echo $hotel->address_line_1; ?></td>
                           <td><?php echo $hotel->city_name; ?></td>
                           <td><?php echo $hotel->state_name; ?></td>
                           <td><?php echo $hotel->country_name; ?></td>
                           <td><?php echo $hotel->person_name; ?></td>
                           <td><?php echo $hotel->person_mobile_no; ?></td>
                            <td><?php if ($hotel->status == 1) { echo "Active"; } else{echo "In active"; }?></td>
                           <td align="center">
                               <div id="detail_<?php echo $hotel->hotel_id; ?>" style="display:none; text-align: justify;">
                                   <h4 align="center" style="margin-top: 0px;">Hotel Detail :</h4>
                                   <div><strong>Contact Number : </strong><span><?php if(!empty($hotel->hotel_mobile_no)){echo $hotel->hotel_mobile_no.", ";}if(!empty($hotel->hotel_alternative_no)){echo $hotel->hotel_alternative_no.", ";}if(!empty($hotel->hotel_landline)){echo $hotel->hotel_landline;} ?></span></div>
                                  <div><strong>Hotel Type : </strong><span><?php echo $hotel->hotel_type; ?></span></div>
                                 <div><strong>Hotel Currency : </strong><span><?php echo $hotel->hotel_currency; ?></span></div>
                                  <div><strong>Hotel Star : </strong><span><?php for ($i=1; $i <= $hotel->hotel_star ; $i++) { ?> 
                                     <span class="fa fa-star checked" style="color: orange;"></span>
                                  <?php } ?></span></div>
                                  <div><strong>Check In. : </strong><span><?php echo $hotel->check_in; ?></span></div>
                                   <div><strong>Check Out. : </strong><span><?php echo $hotel->check_out; ?></span></div>
                                   <div><strong>Hotel Amenity : </strong><span><?php echo $hotel->hotel_amenity; ?> </span></div>
                                  <div><strong>Hotel Descrption :</strong><span><?php echo $hotel->hotel_description; ?></span></div>
                            </div>
                            <div id="otherdetail_<?php echo $hotel->hotel_id; ?>" style="display:none; text-align: justify;">
                               <h4 align="center" style="margin-top: 0px;">Concerned Person Details :</h4>
                               <div><strong>Person Name : </strong><span><?php echo $hotel->person_name; ?></span></div>
                              <div><strong>Person Email : </strong><span><?php echo $hotel->person_email; ?></span></div>
                             <div><strong>Contact Number : </strong><span><?php if(!empty($hotel->person_mobile_no)){echo $hotel->person_mobile_no.', ';}if(!empty($hotel->person_alternative_no)){echo $hotel->person_alternative_no;} ?></span></div>
                            </div> 
                           <button type="button" rel="<?php echo $hotel->hotel_id; ?>" class="btn btn-info btn-sm viewHotelDetail" data-toggle="tooltip" data-placement="top" title="View Personal Details"><i class="fa fa-eye"></i></button>
                            <button type="button" rel="<?php echo $hotel->hotel_id; ?>" class="btn btn-info btn-sm viewPersonDetail" data-toggle="tooltip" data-placement="top" title="View Other Details"><i class="fa fa-eye"></i></button>
                           </td>
                           <td><a href="<?php echo base_url(HOTEL) .'/editHotel/'.base64_encode(1).'/'.base64_encode($hotel->hotel_id); ?>" data-toggle="tooltip" data-placement="top" title="Hotel Employee"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                           <!--<a class="deleteVendor" href="<?php //echo base_url(HOTEL) .'/deleteHotel/'.base64_encode($hotel->hotel_id); ?>" data-toggle="tooltip" data-placement="top" title="Delete Hotel"><i class="fa fa-trash" aria-hidden="true"></i></a>-->
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
  <div class="modal-dialog" style="width:;">

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

