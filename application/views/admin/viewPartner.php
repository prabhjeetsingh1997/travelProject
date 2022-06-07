<div id="wrapper">
<div id="layout-static">
<div class="static-content-wrapper">
<div class="static-content">
<div class="page-content">
   <ol class="breadcrumb">
      <li><a href="<?php echo base_url(ADMIN_URL) ?>/dashboard">Home</a></li>
      <li><a href="#">Partners</a></li>
   </ol>
   <div class="page-heading">
      <h1>All Partner List</h1>
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
                  <h2> Partners </h2>
                  <div class="panel-ctrls">
                  </div>
               </div>
               <div class="panel-body panel-no-padding">
                  <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                     <thead>
                        <tr>
                            <th>Partner Name</th>
                            <th>Email</th>
                            <th>Contact No.</th>
                            <th>Markup</th>
                            <th>Email Varified</th>
                            <th>Status</th>
                            <th>View Address</th>
                            <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                     <?php if(!empty($partners)){
                           foreach ($partners as $partner) { ?>
                           <tr class="odd gradeX">
                           <td><?php echo $partner->title.' '. $partner->name; ?></td>
                           <td><?php echo $partner->email; ?></td>
                           <td><?php echo $partner->mobile_no.', '. $partner->alternative_no; ?></td>
                           <td><?php echo $partner->markup; ?></td>
                           <td><?php if($partner->email_varified == 1){ echo "Varified"; }else{ echo "Not Varified"; } ?></td>
                            <td><?php if($partner->status == 1){ echo "Activated"; }else{ echo "Not Activated"; } ?></td>
                           <td align="center">
                               <div id="detail_<?php echo $partner->partner_id; ?>" style="display:none; text-align: justify;">
                                   <h4 align="center" style="margin-top: 0px">Address Details :</h4>
                                   <div><strong>Address : </strong><span><?php echo $partner->address_line_1.", ". $partner->address_line_2; ?> </span></div>
                                  <div><strong></strong><span><?php echo $partner->city_name.", ".$partner->state_name.", ".$partner->country_name; ?></span></div>
                                 <div><strong>ZIP : </strong><span><?php echo $partner->zip; ?></span></div>
                            </div> 
                           <button type="button" rel="<?php echo $partner->partner_id; ?>" class="btn btn-info btn-sm viewPartnerAddress" data-toggle="tooltip" data-placement="top" title="View Address Details"><i class="fa fa-eye"></i></button>
                           </td>
                           <td><a href="<?php echo base_url(ADMIN_URL) ?>/editPartner/<?php echo $partner->partner_id;?>" data-toggle="tooltip" data-placement="top" title="Edit Partner"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
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

