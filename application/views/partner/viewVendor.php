<div class="col-md-11" id="contentCol">
<div id="wrapper">
<div id="layout-static">
<div class="static-content-wrapper">
<div class="static-content">
<div class="page-content" style="margin-top:;">
   <ol class="breadcrumb">
      <li><a href="<?php echo base_url(PARTNER) ?>/dashboard">Home</a></li>
      <li><a href="#">Vendors</a></li>
   </ol>
   <div class="page-heading">
      <h1>All Vendors</h1>
      <div class="options">
      <a href="<?php echo base_url(PARTNER) ?>/addVendor" class="btn btn-primary" role="button">Add Vendor</a>
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
                  <h2>Vendor</h2>
                  <div class="panel-ctrls">
                  </div>
               </div>
               <div class="panel-body panel-no-padding">
                  <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                     <thead>
                        <tr>
                            <th>Company Name</th>
                            <th>Address</th>
                            <th>Mobile No.</th>
                            <th>Concern Person</th>
                            <th>Concern Pers. No.</th>
                            <th>View Details</th>
                            <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                     <?php if(!empty($vendors)){
                           foreach ($vendors as $vendor) { ?>
                           <tr class="odd gradeX">
                           <td><?php echo $vendor->company_name; ?></td>
                           <td><?php echo $vendor->address_line_1.", ".$vendor->city_name.", ".$vendor->country_name.", ".$vendor->zip; ?></td>
                           <td><?php echo $vendor->contact_no; ?></td>
                           <td><?php echo $vendor->concern_person_name; ?></td>
                           <td><?php echo $vendor->concern_contact_no; ?></td>
                           <td align="center">
                               <div id="detail_<?php echo $vendor->vendorId; ?>" style="display:none; text-align: justify;">
                                    <h4 align="center" style="margin-top: 0px;">Banking Details :</h4>
                                    <div><strong>PAN No. : </strong><span><?php echo $vendor->pan_no; ?> </span></div>
                                    <div><strong>Account No :</strong><span><?php echo $vendor->account_no; ?></span></div>
                                    <div><strong>Account Holder Name : </strong><span><?php echo $vendor->account_holder_name; ?></span></div>
                                    <div><strong>Bank Name : </strong><span><?php echo $vendor->bank_name; ?></span></div>
                                    <div><strong>Branch : </strong><span><?php echo $vendor->branch; ?></span></div>
                                    <div><strong>IFSC : </strong><span><?php echo $vendor->ifsc; ?></span></div>
                               </div>
    
                           <button type="button" rel="<?php echo $vendor->vendorId; ?>" class="btn btn-info btn-sm viewEmployeeDetail" data-toggle="tooltip" data-placement="top" title="View Personal Details"><i class="fa fa-eye"></i></button>
                           </td>
                           <td><a href="<?php echo base_url(PARTNER) ?>/editVendor/<?php echo $vendor->vendorId; ?>" data-toggle="tooltip" data-placement="top" title="Edit Vendor"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                           <?php if($roleId == ROLE_ADMIN) {?>
                           <a class="deleteVendor" href="<?php echo base_url(PARTNER) ?>/deleteVendor/<?php echo $vendor->vendorId; ?>" data-toggle="tooltip" data-placement="top" title="Delete Vendor"><i class="fa fa-trash" aria-hidden="true"></i></a>
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
<!-- #page-content -->
<?php
    if ($this->uri->segment(2) == 'viewVendor') { ?>
      <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/form-ckeditor/ckeditor.js"></script>
<?php
    }
?>
<script>
    $(document).on('click',".viewEmployeeDetail",function(){
      	$("#qDetail").modal();
      	var id = $(this).attr('rel');
      	$("#modalHead").html('Vendor Detail: <strong>'+id+'</strong>');
      	$("#mdetail").html($("#detail_"+id).html());
	});
</script>
