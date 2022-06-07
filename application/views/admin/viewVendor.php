<div id="wrapper">
<div id="layout-static">
<div class="static-content-wrapper">
<div class="static-content">
<div class="page-content">
   <ol class="breadcrumb">
      <li><a href="<?php echo base_url(ADMIN_URL) ?>/dashboard">Home</a></li>
      <li><a href="#">Vendor</a></li>
   </ol>
   <div class="page-heading">
      <h1>All Vendors</h1>
      <div class="options">
      <a href="<?php echo base_url(ADMIN_URL) ?>/addVendor" class="btn btn-primary" role="button">Add Vendor</a>
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
                  <h2>Vendors</h2>
                  <div class="panel-ctrls">
                  </div>
               </div>
               <div class="panel-body panel-no-padding">
                  <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                     <thead>
                        <tr>
                            <th>Company  Name</th>
                            <th>Conatct No</th>
                            <th>Concern Person Name</th>
                            <th>Concern Contact No</th>
                            <th>Email</th>
                            <th>View Details</th>
                            <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                     <?php if(!empty($vendors)){
                           foreach ($vendors as $vendor) { ?>
                           <tr class="odd gradeX">
                           <td><?php echo $vendor->company_name; ?></td>
                           <td><?php echo $vendor->contact_no; ?></td>
                           <td><?php echo $vendor->title." ". $vendor->concern_person_name; ?></td>
                           <td><?php echo $vendor->concern_contact_no; ?></td>
                           <td><?php echo $vendor->email; ?></td>
                           <td align="center">
                               <div id="detail_<?php echo $vendor->vendorId; ?>" style="display:none; text-align: justify;">
                                   <h4 align="center" style="margin-top: 0px;">Travel Agent Detail :</h4>
                                   <div><strong>Compnay Name : </strong><span><?php echo $vendor->company_name; ?></span></div>
                                  <div><strong>Address : </strong><span><?php echo $vendor->address_line_1.", ". $vendor->address_line_2; ?> </span></div>
                                  <div><strong>Address : </strong><span><?php echo $vendor->address_line_1.", ". $vendor->address_line_2; ?> </span></div>
                                  <div><strong></strong><span><?php echo $vendor->city_name.", ".$vendor->state_name.", ".$vendor->country_name; ?></span></div>
                                  <div><strong>ZIP : </strong><span><?php echo $vendor->zip; ?></span></div>
                                  <div><strong>Mobile No. : </strong><span><?php echo $vendor->contact_no.", ". $vendor->alternative_no; ?></span></div>
                                  <div><strong>Description. : </strong><span><?php echo $vendor->description; ?></span></div>
                                   <h4 align="center">Concern Person Details :</h4>
                                   <div><strong>Name : </strong><span><?php echo $vendor->title.", ". $vendor->concern_person_name; ?> </span></div>
                                  <div><strong>Mobile No. : </strong><span><?php echo $vendor->concern_contact_no.", ". $vendor->secondry_no; ?></span></div>
                                  <div><strong>Email. : </strong><span><?php echo $vendor->email.", ". $vendor->alternative_email; ?></span></div>
                            </div>
                            <div id="otherdetail_<?php echo $vendor->vendorId; ?>" style="display:none; text-align: justify;">
                               <h4 align="center" style="margin-top: 0px;">Banking Details :</h4>
                                <div><strong>PAN No. : </strong><span><?php echo $vendor->pan_no; ?> </span></div>
                                <div><strong>Account No :</strong><span><?php echo $vendor->account_no; ?></span></div>
                                <div><strong>Holder Name : </strong><span><?php echo $vendor->account_holder_name; ?></span></div>
                                <div><strong>Bank Name : </strong><span><?php echo $vendor->bank_name; ?></span></div>
                                <div><strong>Branch : </strong><span><?php echo $vendor->branch; ?></span></div>
                                <div><strong>IFSC : </strong><span><?php echo $vendor->ifsc; ?></span></div>
                            </div> 
                           <button type="button" rel="<?php echo $vendor->vendorId; ?>" class="btn btn-info btn-sm viewVendorDetail" data-toggle="tooltip" data-placement="top" title="View Travel Details"><i class="fa fa-eye"></i></button>
                            <button type="button" rel="<?php echo $vendor->vendorId; ?>" class="btn btn-info btn-sm viewBankingDetail" data-toggle="tooltip" data-placement="top" title="View Banking Details"><i class="fa fa-eye"></i></button>
                           </td>
                           <td><a href="<?php echo base_url(ADMIN_URL) ?>/editVendor/<?php echo $vendor->vendorId; ?>" data-toggle="tooltip" data-placement="top" title="Edit Vendor"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                           <a class= "deleteVendor" href="<?php echo base_url(ADMIN_URL) ?>/deleteVendor/<?php echo $vendor->vendorId; ?>" data-toggle="tooltip" data-placement="top" title="Delete Vendor"><i class="fa fa-trash" aria-hidden="true"></i></a>
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
<!-- #page-content -->

