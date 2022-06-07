<div id="wrapper">
<div id="layout-static">
<div class="static-content-wrapper">
<div class="static-content">
<div class="page-content">
<ol class="breadcrumb">
   <li><a href="<?php echo base_url(ADMIN_URL) ?>/dashboard">Home</a></li>
   <li><a href="#">Edit Activites</a></li>
</ol>
<div class="page-heading">
   <h1>Edit Activites</h1>
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
   <div class="options">
   </div>
</div>
<div class="container-fluid">
<div class="panel panel-default">
  <div class="panel-heading">
    <h2>Activites Forms</h2>
  </div>
  <div class="panel-body">
    <form class="grid-form" action="<?php echo base_url(ADMIN_URL) ?>/updateActivites" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="activities_id" value="<?php echo $activities->id; ?>">
    <fieldset>
          <legend>Activites Details</legend>
          <div data-row-span="4">
            <div data-field-span="2">
              <label>Country</label>
              <select id="country_id" class="form-control" name="country_id" required="true">
                 <option value="">Select Country</option>
                <?php if(!empty($countries)){
                    foreach ($countries as $country) { ?>
                     <option value="<?php echo $country->id?>" <?php if($country->id == $activities->country_id) {echo "selected";}?>><?php echo $country->country_name; ?></option>
                <?php }
                  } ?>
                </select>
            </div>
            <div data-field-span="2">
              <label>State</label>
              <select id="state_id" class="form-control" name="state_id"  required="true">
                 <option value="">Select State</option>
                 <?php if(!empty($states)){
                    foreach ($states as $state) { ?>
                     <option value="<?php echo $state->id?>" <?php if($state->id == $activities->state_id) {echo "selected";}?>><?php echo $state->state_name; ?></option>
                <?php }
                  } ?>
                </select>
            </div>
          </div>
          <div data-row-span="4">
            <div data-field-span="2">
              <label>city</label>
              <select id="city_id" class="form-control" name="city_id"  required="true">
                 <option value="">Select City</option>
                 <?php if(!empty($cities)){
                    foreach ($cities as $city) { ?>
                     <option value="<?php echo $city->id?>" <?php if($city->id == $activities->city_id) {echo "selected";}?>><?php echo $city->city_name; ?></option>
                <?php }
                  } ?>
              </select>
            </div>
            <div data-field-span="2">
              <label>Details</label>
              <input type="text" name="activities_details" required="true" value="<?php echo $activities->details; ?>">
            </div>
          </div>
          <div data-row-span="4">
            <div data-field-span="2">
              <label>Activities Images</label>
              <input type="file" class="form-control" name="activities_images[]" multiple>
            </div>
            <div data-field-span="2">
              <label>Meeting / Redemption Point</label>
              <input type="text" name="redemption_point" required="true" value="<?php echo $activities->redemption_point; ?>">
            </div>
          </div>
          <div data-row-span="1">
          <?php if (!empty($activities->activities_images != '')) { 
                $activities_images = json_decode($activities->activities_images);
                $i = 0;
                foreach ($activities_images as $image) { ?>
                    <a href="<?php echo base_url() .'uploads/activities_images/'.$image; ?>" download><img src="<?php echo base_url() .'uploads/activities_images/'.$image; ?>" width="100px" height="100px"></a>
            <?php $i++;
                }
            } ?>
             
          </div>
            <div data-row-span="2">
            <div data-field-span="2">
              <label>Activities Description</label>
              <textarea class="form-control" name="activities_description" rows="5"><?php echo $activities->description; ?></textarea>
            </div>
            </div>
            <div data-row-span="2">
            <div data-field-span="2">
              <label>Highlights</label>
              <textarea class="form-control" name="highlights" rows="5"><?php echo $activities->highlights; ?></textarea>
            </div>
            </div>
            <div data-row-span="2">
            <div data-field-span="2">
              <label>Inclusions</label>
              <textarea class="form-control" name="inclusions" rows="5"><?php echo $activities->inclusion; ?></textarea>
            </div>
            </div>
            <div data-row-span="2">
            <div data-field-span="2">
              <label>Know Before You Book</label>
              <textarea class="form-control" name="know_before_book" rows="5"><?php echo $activities->know_before_book; ?></textarea>
            </div>
            </div>
        </fieldset>
      <br><br>
      <fieldset>
      <legend>Activites Price</legend>
        <div data-row-span="2">
            <div data-field-span="2">
              <label>Per Adult Cost (12+ Years)</label>
              <input type="number" class="form-control" name="adult_price" required="true" value="<?php echo $activities->adult_cost; ?>">
            </div>
        </div>
         <input type="hidden" id="count_row" name="count_row" value="<?php echo $activities->count_row; ?>">
         <?php for ($i=1; $i <= $activities->count_row; $i++) { ?>
           <input type="hidden" name="child_price_id_<?php echo $i; ?>" value="<?php echo $activities_child_price[$i-1]->id; ?>">
        <div data-row-span="5">
            <div data-field-span="1">
              <label>Per Child Cost(From Age)</label>
              <Select class="form-control" id="from_age_<?php echo $i; ?>" name="from_age_<?php echo $i; ?>" required="true">
                  <option value="">--Select Age --</option>
                  <option value="1"<?php if(1 == $activities_child_price[$i-1]->child_from_age){echo "selected";} ?>>1</option>
                  <option value="2"<?php if(2 == $activities_child_price[$i-1]->child_from_age){echo "selected";} ?>>2</option>
                  <option value="3"<?php if(3 == $activities_child_price[$i-1]->child_from_age){echo "selected";} ?>>3</option>
                  <option value="4"<?php if(4 == $activities_child_price[$i-1]->child_from_age){echo "selected";} ?>>4</option>
                  <option value="5"<?php if(5 == $activities_child_price[$i-1]->child_from_age){echo "selected";} ?>>5</option>
                  <option value="6"<?php if(6 == $activities_child_price[$i-1]->child_from_age){echo "selected";} ?>>6</option>
                  <option value="7"<?php if(7 == $activities_child_price[$i-1]->child_from_age){echo "selected";} ?>>7</option>
                  <option value="8"<?php if(8 == $activities_child_price[$i-1]->child_from_age){echo "selected";} ?>>8</option>
                  <option value="9"<?php if(9 == $activities_child_price[$i-1]->child_from_age){echo "selected";} ?>>9</option>
                  <option value="10"<?php if(10 == $activities_child_price[$i-1]->child_from_age){echo "selected";} ?>>10</option>
                  <option value="11"<?php if(11 == $activities_child_price[$i-1]->child_from_age){echo "selected";} ?>>11</option>
                  <option value="12"<?php if(12 == $activities_child_price[$i-1]->child_from_age){echo "selected";} ?>>12</option>
              </Select>
            </div>
            <div data-field-span="1">
            <label>To Age</label>
              <Select class="form-control" id="to_age_<?php echo $i; ?>" name="to_age_<?php echo $i; ?>" required="true">
               <option value="">--Select Age --</option>
                  <option value="1"<?php if(1 == $activities_child_price[$i-1]->child_to_age){echo "selected";} ?>>1</option>
                  <option value="2"<?php if(2 == $activities_child_price[$i-1]->child_to_age){echo "selected";} ?>>2</option>
                  <option value="3"<?php if(3 == $activities_child_price[$i-1]->child_to_age){echo "selected";} ?>>3</option>
                  <option value="4"<?php if(4 == $activities_child_price[$i-1]->child_to_age){echo "selected";} ?>>4</option>
                  <option value="5"<?php if(5 == $activities_child_price[$i-1]->child_to_age){echo "selected";} ?>>5</option>
                  <option value="6"<?php if(6 == $activities_child_price[$i-1]->child_to_age){echo "selected";} ?>>6</option>
                  <option value="7"<?php if(7 == $activities_child_price[$i-1]->child_to_age){echo "selected";} ?>>7</option>
                  <option value="8"<?php if(8 == $activities_child_price[$i-1]->child_to_age){echo "selected";} ?>>8</option>
                  <option value="9"<?php if(9 == $activities_child_price[$i-1]->child_to_age){echo "selected";} ?>>9</option>
                  <option value="10"<?php if(10 == $activities_child_price[$i-1]->child_to_age){echo "selected";} ?>>10</option>
                  <option value="11"<?php if(11 == $activities_child_price[$i-1]->child_to_age){echo "selected";} ?>>11</option>
                  <option value="12"<?php if(12 == $activities_child_price[$i-1]->child_to_age){echo "selected";} ?>>12</option>
              </Select>
            </div>
            <div data-field-span="2">
            <label>Price</label>
              <input type="number" class="form-control" id="child_price_<?php echo $i; ?>" name="child_price_<?php echo $i; ?>" value="<?php echo $activities_child_price[$i-1]->price; ?>" required="true">
            </div>
                <div data-field-span="1">
             <label>Add / Delete Rows</label>
             <?php if($i == 1) { ?>
              <a href="javascript:void(0);" class="addmore" onclick="addMoreRows();" id="addmorerows" title="Add Rows" style="width:98px;"><img src="<?php echo base_url() ?>assets/demo/images/add-icon.png" style="width:28px;"></a>
              <a href="javascript:void(0);" class="deleterow" onclick="deleteRows();" id="deleterow" title="Delete Rows" style="width:98px;"><img src="<?php echo base_url() ?>assets/demo/images/cross.png" style="width:28px;"></a>
              <?php }else{ ?>
                <a href="<?php echo base_url(ADMIN_URL).'/deleteActivityRow/'.$activities_child_price[$i-1]->id.'/'.$activities->count_row.'/'.$activities->id; ?>" class="deleterow deleteVendor" id="deleterow" title="Delete Rows" style="width:98px;"><img src="<?php echo base_url() ?>assets/demo/images/cross.png" style="width:28px;"></a>
              <?php }?>
            </div>
        </div>
        <?php } ?>
        <div id="child_rows"></div>
      </fieldset>
      <div class="clearfix pt20">
        <div class="pull-right">
          <button class="btn-primary btn">Submit Activities</button>
        </div>
      </div>
    </form>
  </div>
</div>
</div> <!-- .container-fluid -->
<!-- #page-content -->
</div>
<?php
    if ($this->uri->segment(2) == 'editActivities') { ?>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/demo/pagejs/activities.js"></script>
<?php
    }
?>