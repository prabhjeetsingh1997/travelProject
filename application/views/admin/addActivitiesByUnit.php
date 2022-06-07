<div id="wrapper">
<div id="layout-static">
<div class="static-content-wrapper">
<div class="static-content">
<div class="page-content">
<ol class="breadcrumb">
   <li><a href="<?php echo base_url(ADMIN_URL) ?>/dashboard">Home</a></li>
   <li><a href="#">Add Activites</a></li>
</ol>
<div class="page-heading">
   <h1>Add Activites</h1>
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
    <form class="grid-form" action="<?php echo base_url(ADMIN_URL) ?>/addNewActivitesByUnit" method="POST" enctype="multipart/form-data">
    <fieldset>
          <legend>Activites Details</legend>
          <div data-row-span="4">
            <div data-field-span="2">
              <label>Country</label>
              <select id="country_id" class="form-control" name="country_id" required="true">
                 <option value="">Select Country</option>
                <?php if(!empty($countries)){
                    foreach ($countries as $country) { ?>
                     <option value="<?php echo $country->id?>"><?php echo $country->country_name; ?></option>
                <?php }
                  } ?>
                </select>
            </div>
            <div data-field-span="2">
              <label>State</label>
              <select id="state_id" class="form-control" name="state_id"  required="true">
                 <option value="">Select State</option>
                </select>
            </div>
          </div>
          <div data-row-span="4">
            <div data-field-span="2">
              <label>city</label>
              <select id="city_id" class="form-control" name="city_id"  required="true">
                 <option value="">Select City</option>
              </select>
            </div>
            <div data-field-span="2">
              <label>Details</label>
              <input type="text" name="activities_details" required="true">
            </div>
          </div>
          <div data-row-span="4">
            <div data-field-span="2">
              <label>Activities Images</label>
              <input type="file" class="form-control" name="activities_images[]" multiple required="true">
            </div>
            <div data-field-span="2">
              <label>Meeting / Redemption Point</label>
              <input type="text" name="redemption_point" required="true">
            </div>
          </div>
            <div data-row-span="2">
            <div data-field-span="2">
              <label>Activities Description</label>
              <textarea class="form-control" name="activities_description" rows="5"></textarea>
            </div>
            </div>
            <div data-row-span="2">
            <div data-field-span="2">
              <label>Highlights</label>
              <textarea class="form-control" name="highlights" rows="5"></textarea>
            </div>
            </div>
            <div data-row-span="2">
            <div data-field-span="2">
              <label>Inclusions</label>
              <textarea class="form-control" name="inclusions" rows="5"></textarea>
            </div>
            </div>
            <div data-row-span="2">
            <div data-field-span="2">
              <label>Know Before You Book</label>
              <textarea class="form-control" name="know_before_book" rows="5"></textarea>
            </div>
            </div>
        </fieldset>
      <br><br>
      <fieldset>
      <legend>Activites Price</legend>
        <div data-row-span="2">
            <div data-field-span="2">
              <label>Per Unit Cost</label>
              <input type="number" class="form-control" name="perunit_cost" required="true">
            </div>
        </div>
         <!-- <input type="hidden" id="count_row" name="count_row" value="1"> -->
        <!-- <div data-row-span="5">
            <div data-field-span="1">
              <label>Per Child Cost(From Age)</label>
              <Select class="form-control" id="from_age_1" name="from_age_1" required="true">
                  <option value="">--Select Age --</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
                  <option value="10">10</option>
                  <option value="11">11</option>
                  <option value="12">12</option>
              </Select>
            </div>
            <div data-field-span="1">
            <label>To Age</label>
              <Select class="form-control" id="to_age_1" name="to_age_1" required="true">
               <option value="">--Select Age --</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
                  <option value="10">10</option>
                  <option value="11">11</option>
                  <option value="12">12</option>
              </Select>
            </div>
            <div data-field-span="2">
            <label>Price</label>
              <input type="number" class="form-control" id="child_price_1" name="child_price_1" required="true">
            </div>
            <div data-field-span="1">
             <label>Add / Delete Rows</label>
              <a href="javascript:void(0);" class="addmore" onclick="addMoreRows();" id="addmorerows" title="Add Rows" style="width:98px;"><img src="<?php echo base_url() ?>assets/demo/images/add-icon.png" style="width:28px;"></a> |
              <a href="javascript:void(0);" class="deleterow" onclick="deleteRows();" id="deleterow" title="Delete Rows" style="width:98px;"><img src="<?php echo base_url() ?>assets/demo/images/cross.png" style="width:28px;"></a>
            </div>
        </div> -->
        <!-- <div id="child_rows"></div> -->
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
    if ($this->uri->segment(2) == 'addActivitiesByUnit') { ?>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/demo/pagejs/activities.js"></script>
<?php
    }
?>