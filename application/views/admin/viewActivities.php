<div id="wrapper">
<div id="layout-static">
<div class="static-content-wrapper">
<div class="static-content">
<div class="page-content">
   <ol class="breadcrumb">
      <li><a href="<?php echo base_url(ADMIN_URL) ?>/dashboard">Home</a></li>
      <li><a href="#">View Activites</a></li>
   </ol>
   <div class="page-heading">
      <h1>List Of Activites</h1>
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
                  <h2>Activites List </h2>
                  <div class="panel-ctrls">
                  </div>
               </div>
               <div class="panel-body panel-no-padding">
                  <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                     <thead>
                        <tr>
                            <th>Country</th>
                            <th>State</th>
                            <th>City</th>
                            <th>Details</th>
                            <th>Meeting / Redemption</th>
                            <th>Per Adult Cost</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                     <?php if(!empty($activities)){
                           foreach ($activities as $activity) { ?>
                           <tr class="odd gradeX">
                           <td><?php echo $activity->country_name; ?></td>
                           <td><?php echo $activity->state_name; ?></td>
                           <td><?php echo $activity->city_name; ?></td>
                           <td><?php echo $activity->details; ?></td>
                            <td><?php echo $activity->redemption_point; ?></td>
                             <td><?php echo $activity->adult_cost; ?></td>
                            <td><?php if($activity->status == 1){ echo "Activated"; }else{ echo "Not Activated"; } ?></td>
                           <td><a href="<?php echo base_url(ADMIN_URL) .'/editActivities/'.$activity->id; ?>" data-toggle="tooltip" data-placement="top" title="Edit Activities"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> |
                           <a class="deleteVendor" href="<?php echo base_url(ADMIN_URL) .'/deleteActivities/'.$activity->id; ?>" data-toggle="tooltip" data-placement="top" title="Delete Activities"><i class="fa fa-trash" aria-hidden="true"></i></a>
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

