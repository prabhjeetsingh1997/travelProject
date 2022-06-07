<?php
$CI =& get_instance();
$CI->load->model('admin_model');
?>
<div id="wrapper">
<div id="layout-static">
<div class="static-content-wrapper">
<div class="static-content">
<div class="page-content">
   <ol class="breadcrumb">
      <li><a href="<?php echo base_url(ADMIN_URL) ?>/dashboard">Home</a></li>
      <li><a href="#">View Itinerary</a></li>
   </ol>
   <div class="page-heading">
      <h1>List of Itinerary</h1>
      <div class="options">
      <a href="<?php echo base_url(ADMIN_URL) ?>/addItinerary" class="btn btn-primary" role="button">Add Itinerary</a>
    
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
                  <h2>Itinerary</h2>
                  <div class="panel-ctrls">
                  </div>
               </div>
               <div class="panel-body panel-no-padding">
                  <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                     <thead>
                        <tr>
                            <th>Title</th>
                            <th>Country</th>
                            <th>State</th>
                            <th>City</th>
                            <th>Duration (Night & Days)</th>
                            <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                     <?php if(!empty($itinerary_details)){
                            $count=1;
                           foreach ($itinerary_details as $key=>$val) { 
                                $i=0;
                                $j=0;
                                $k=0;
                                $state='';
                                $city='';
                                $newArr = array();
                                $newArrCity=array();
                                $countryId=$val['country'];
                                $arrState=explode(',',$val['state']);
                                $arrCity=explode(',',$val['city']);
                                foreach($arrState as $value)
                                {
                                    $state=$CI->admin_model->getStateNameById($value);
                                    $newArr[$j]=$state;
                                    $j++;
                                }
                                foreach($arrCity as $valueCity)
                                {
                                    $cityName=$CI->admin_model->getCityNameById($valueCity);
                                    $newArrCity[$k]=$cityName;
                                    $k++;
                                }
                                $country=$CI->admin_model->getCountryNameById($countryId);
                        
                                $duration = $val['duration'];
                            ?>
                           <tr class="odd gradeX">
                           <td><?php echo $val['title'];?></td>
                            <td><?php echo $country[$i]['country_name'];?></td>
                            <td><?php foreach($newArr as $stateName){echo $stateName[0]['state_name'].", ";}?></td>
                            <td><?php foreach($newArrCity as $cityName){echo $cityName[0]['city_name'].", ";}?></td>
                            <td><?php echo ($duration-1). ' Nights & '.$duration.' Days';?></td> 
                           <td><a href="<?php echo base_url(ADMIN_URL) ?>/editItinerary/1/<?php echo $val['id']; ?>" data-toggle="tooltip" data-placement="top" title="Edit Itinerary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                           <a class="deleteVendor" href="<?php echo base_url(ADMIN_URL) ?>/deleteItinerary/<?php echo $val['id']; ?>" data-toggle="tooltip" data-placement="top" title="Delete Itinerary"><i class="fa fa-trash" aria-hidden="true"></i></a>
                           </td>
                        </tr>
                        <?php 
                        $i++;
                        }
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

