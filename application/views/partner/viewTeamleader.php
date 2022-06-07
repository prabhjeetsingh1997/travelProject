<div id="wrapper">
<div id="layout-static">
<div class="static-content-wrapper">
<div class="static-content">
<div class="page-content">
   <ol class="breadcrumb">
      <li><a href="<?php echo base_url(PARTNER) ?>/dashboard">Home</a></li>
      <li><a href="#">Employee</a></li>
   </ol>
   <div class="page-heading">
      <h1>All Team Leader</h1>
      <div class="options">
      <a href="<?php echo base_url(PARTNER) ?>/addTeamleader" class="btn btn-primary" role="button">Add TeamLeader</a>
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
                  <h2>Employee</h2>
                  <div class="panel-ctrls">
                  </div>
               </div>
               <div class="panel-body panel-no-padding">
                  <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                     <thead>
                        <tr>
                            <th>Employee Name</th>
                            <th>Mobile No.</th>
                            <th>Email Address</th>
                            <th>Emergency No.</th>
                            <th>Date of Birth</th>
                            <th>View Details</th>
                            <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                     <?php if(!empty($employees)){
                           foreach ($employees as $employee) { ?>
                           <tr class="odd gradeX">
                           <td><?php echo $employee->title." ". $employee->name; ?></td>
                           <td><?php echo $employee->mobile; ?></td>
                           <td><?php echo $employee->email; ?></td>
                           <td><?php echo $employee->emergency_contact; ?></td>
                           <td><?php echo $employee->dob; ?></td>
                           <td align="center">
                               <div id="detail_<?php echo $employee->id; ?>" style="display:none; text-align: justify;">
                                   <h4 align="center" style="margin-top: 0px;">Personal Detail :</h4>
                                   <div><strong>Name : </strong><span><?php echo $employee->title." ". $employee->name; ?></span></div>
                                  <div><strong>Father Name : </strong><span><?php echo $employee->father_name; ?></span></div>
                                 <div><strong>Mother Name : </strong><span><?php echo $employee->mother_name; ?></span></div>
                                  <div><strong>Mobile No. : </strong><span><?php echo $employee->mobile.", ". $employee->alternative_number; ?></span></div>
                                  <div><strong>Emergency No. : </strong><span><?php echo $employee->emergency_contact; ?></span></div>
                                   <div><strong>Date of Birth. : </strong><span><?php echo $employee->dob; ?></span></div>
                                   <h4 align="center">Address Details :</h4>
                                   <div><strong>Address : </strong><span><?php echo $employee->address_line_1.", ". $employee->address_line_2; ?> </span></div>
                                  <div><strong></strong><span><?php echo $employee->city_name.", ".$employee->state_name.", ".$employee->country_name; ?></span></div>
                                 <div><strong>ZIP : </strong><span><?php echo $employee->zip; ?></span></div>
                            </div>
                            <div id="otherdetail_<?php echo $employee->id; ?>" style="display:none; text-align: justify;">
                               <h4 align="center" style="margin-top: 0px;">Official Details :</h4>
                               <div><strong>Designation : </strong><span><?php echo $employee->designation; ?></span></div>
                              <div><strong>Department : </strong><span><?php echo $employee->department; ?></span></div>
                             <div><strong>Joining Date : </strong><span><?php echo $employee->joining_date; ?></span></div>
                              <div><strong>Termination Date : </strong><span><?php echo $employee->termination_date; ?></span></div>
                               <h4 align="center">Banking Details :</h4>
                                <div><strong>PAN No. : </strong><span><?php echo $employee->pan_no; ?> </span></div>
                                <div><strong>Account No :</strong><span><?php echo $employee->account_no; ?></span></div>
                                <div><strong>Holder Name : </strong><span><?php echo $employee->account_holder_name; ?></span></div>
                                <div><strong>Bank Name : </strong><span><?php echo $employee->bank_name; ?></span></div>
                                <div><strong>Branch : </strong><span><?php echo $employee->branch; ?></span></div>
                                <div><strong>IFSC : </strong><span><?php echo $employee->ifsc; ?></span></div>
                            </div> 
                           <button type="button" rel="<?php echo $employee->id; ?>" class="btn btn-info btn-sm viewEmployeeDetail" data-toggle="tooltip" data-placement="top" title="View Personal Details"><i class="fa fa-eye"></i></button>
                            <button type="button" rel="<?php echo $employee->id; ?>" class="btn btn-info btn-sm viewDetail" data-toggle="tooltip" data-placement="top" title="View Other Details"><i class="fa fa-eye"></i></button>
                           </td>
                           <td><a href="<?php echo base_url(PARTNER) ?>/editTeamleader/<?php echo $employee->id; ?>" data-toggle="tooltip" data-placement="top" title="Edit Employee"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                           <a class="deleteVendor" href="<?php echo base_url(PARTNER) ?>/deleteTeamleader/<?php echo $employee->id; ?>" data-toggle="tooltip" data-placement="top" title="Delete Employee"><i class="fa fa-trash" aria-hidden="true"></i></a>
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
    if ($this->uri->segment(2) == 'viewTeamleader') { ?>
      <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/form-ckeditor/ckeditor.js"></script>
      <script type="text/javascript" src="<?php echo base_url(); ?>assets/demo/pagejs/partner/viewEmployee.js"></script>
<?php
    }
?>

