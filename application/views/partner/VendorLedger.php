<div class="col-md-11" id="contentCol">
<div id="wrapper">
<div id="layout-static">
<div class="static-content-wrapper">
<div class="static-content">
<div class="page-content" style="margin-top:;">
   <ol class="breadcrumb">
      <li><a href="<?php echo base_url(PARTNER) ?>/dashboard">Home</a></li>
      <li><a href="#">Vendor Ledgers</a></li>
   </ol>
   <div class="page-heading">
      <h1>Vendor Ledgers</h1>
      <div class="options">
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
                  <table id="example" class="table table-striped table-bordered exampletable" cellspacing="0" width="100%">
                     <thead>
                        <tr>
                            <th style="width:;">SNo.</th>
                            <th style="width:;">Vendor</th>
                            <th style="width:;">Complete Address</th>
                            <th style="width:;">Ledger Date</th>
                            <th style="width:;">Action</th>
                        </tr>
                     </thead>
                     <tbody>
                     <?php if(!empty($vendorLedgers)){
                           foreach($vendorLedgers as $vendorsLedger) { ?>
                        <tr class="odd gradeX">
                            <td><?php echo $vendorsLedger->ledger_id; ?></td>
                            <td>
                                <?php $vendorname = preg_replace('/[0-9]+/', '', $vendorsLedger->vendor_id); 
                                if(!empty($vendors)){
                                    foreach($vendors as $vendor) {
                                        if($vendorname == "VND") {
                                            if($vendor->vendorId == ltrim($vendorsLedger->vendor_id, 'VND')) {
                                                echo $vendor->company_name;
                                            }
                                        }
                                    }
                                }
                                if(!empty($partnerhotel)){
                                    foreach($partnerhotel as $partnerhotelVendor) {
                                        if($vendorname == "HTL") {
                                            if($partnerhotelVendor->hotel_id == ltrim($vendorsLedger->vendor_id, 'HTL')) {
                                                echo $partnerhotelVendor->hotel_name;
                                            }
                                        }
                                    }
                                }
                                if(!empty($clientDetails)){
                                    foreach($clientDetails as $client){
                                        if($vendorname == "CLNT") {
                                            if($client->id == ltrim($vendorsLedger->vendor_id, 'CLNT')) {
                                                echo $client->client_name;
                                            }
                                        }
                                    }
                                }
                                ?>
                            </td>
                            <td>
                                <?php $vendorname = preg_replace('/[0-9]+/', '', $vendorsLedger->vendor_id); 
                                if(!empty($vendors)){
                                    foreach($vendors as $vendor) {
                                        if($vendorname == "VND") {
                                            if($vendor->vendorId == ltrim($vendorsLedger->vendor_id, 'VND')) {
                                                echo $vendor->address_line_1.", ".$vendor->address_line_2.", ".$vendor->zip.", ".$vendor->city_name.", ".$vendor->state_name.", ".$vendor->country_name;
                                            }
                                        }
                                    }
                                }
                                if(!empty($partnerhotel)){
                                    foreach($partnerhotel as $partnerhotelVendor) {
                                        if($vendorname == "HTL") {
                                            if($partnerhotelVendor->hotel_id == ltrim($vendorsLedger->vendor_id, 'HTL')) {
                                                echo $partnerhotelVendor->address_line_1.", ".$partnerhotelVendor->address_line_2.", ".$partnerhotelVendor->zip.", ".$partnerhotelVendor->city_name.", ".$partnerhotelVendor->state_name.", ".$partnerhotelVendor->country_name;
                                            }
                                        }
                                    }
                                }
                                if(!empty($clientDetails)){
                                    foreach($clientDetails as $client){
                                        if($vendorname == "CLNT") {
                                            if($client->id == ltrim($vendorsLedger->vendor_id, 'CLNT')) {
                                                echo $client->address_line_1.", ".$client->address_line_2.", ".$client->zip;
                                            }
                                        }
                                    }
                                }
                                ?>
                            </td>
                            <td><?php echo date('d/m/Y', strtotime($vendorsLedger->ledger_date)); ?></td>
                            <td>
                               <a href="<?php echo base_url(PARTNER) ?>/getVendorLedgerById/<?php echo $vendorsLedger->vendor_id;?>" data-toggle="tooltip" data-placement="top" title="View Ledger"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                               <!--<a class="deleteVendor" href="<?php //echo base_url(PARTNER) ?>/deleteTourCard/<?php //echo $carddetails->tcid; ?>/<?php //echo $carddetails->query_no; ?>" data-toggle="tooltip" data-placement="top" title="Delete Tourcard"><i class="fa fa-trash" aria-hidden="true"></i></a>-->
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
