<div id="wrapper">
<div id="layout-static">
<div class="static-content-wrapper">
<div class="static-content">
<div class="page-content">
   <ol class="breadcrumb">
      <li><a href="<?php echo base_url(ADMIN_URL) ?>/dashboard">Home</a></li>
      <li><a href="#">Vehicle</a></li>
   </ol>
   <div class="page-heading">
      <h1>List of Vehicles</h1>
      <div class="options">
       <button type="button" class="btn btn-info btn-sm addVehicle" data-toggle="tooltip" data-placement="top" title="Add Vehicle">Add Vehicle</i></button>
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
                  <h2>Vehicles</h2>
                  <div class="panel-ctrls">
                  </div>
               </div>
               <div class="panel-body panel-no-padding">
                  <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                     <thead>
                        <tr>
                           <th>Vehicle ID</th>
                           <th>Vehicles Name</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                     <?php if(!empty($vehicles)){
                           foreach ($vehicles as $vehicle) { ?>
                           <tr class="odd gradeX">
                           <td><?php echo $vehicle->id; ?></td>
                           <td><?php echo $vehicle->vehicle_name; ?></td>
                           <td>
                           <div id="vdetail_<?php echo $vehicle->id; ?>" style="display: none;">
                           <input type="hidden" name="vehicle_id" value="<?php echo $vehicle->id; ?>">
                           <label>Vehicle Name :</label>
                             <input type="text" name="vehicle_name" value="<?php echo $vehicle->vehicle_name; ?>" class="form-control" required="true">
                           </div>
                           <button type="button" rel="<?php echo $vehicle->id; ?>" class="btn btn-info btn-sm updateVehicle" data-toggle="tooltip" data-placement="top" title="Update Vehicle"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button> | <a class="deleteVendor" href="<?php echo base_url(ADMIN_URL) ?>/deleteVehicle/<?php echo $vehicle->id; ?>" data-toggle="tooltip" data-placement="top" title="Delete Vehicle"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
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
<!-- #page-content -->

<div id="qDetail" class="modal fade" role="dialog">
  <div class="modal-dialog" style="width: 500px;">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" id="modalHead">Add Vehicle</h4>
      </div>
      <div class="modal-body" id="mdetail">
      <form method="Post" id="addvehicle">
      <label>Vehicle Name: </label>
        <input type="text" name="vehicle_name" class="form-control" required="true">
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" id="submitvehicle" class="btn btn-primary">Add Vehicle</button>
      </div>
    </div>

  </div>
</div>

<div id="editDetail" class="modal fade" role="dialog">
  <div class="modal-dialog" style="width: 500px;">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" id="modalHead">Update Vehicle</h4>
      </div>
       <form method="Post" id="updatevehicle">
      <div class="modal-body" id="vdetail">
      </div>
      </form>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" id="updateAddedvehicle" class="btn btn-primary">Update Vehicle</button>
      </div>
    </div>

  </div>
</div> 