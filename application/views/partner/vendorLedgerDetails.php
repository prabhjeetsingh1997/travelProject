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
      <!--<h1>Vendor Ledgers</h1>-->
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
                <div class="panel-heading" style="line-height: 15px;">
                    <?php $vendorId = $this->uri->segment(3); $vendorId = preg_replace('/[0-9]+/', '', $vendorId);if($vendorId == "VND") {?>
                  <h3 style="color:darkblue;"><?php echo $vendorDetails->company_name;?></h3>
                  <p><?php echo $vendorDetails->address_line_1.", ".$vendorDetails->address_line_2.", ".$vendorDetails->zip;?></p>
                  <p><?php echo $vendorDetails->city_name.", ".$vendorDetails->state_name.", ".$vendorDetails->country_name;?></p>
                  <p><?php echo "Ph: ".$vendorDetails->contact_no;?></p>
                  <?php }if($vendorId == "HTL"){ ?>
                  <h3 style="color:darkblue;"><?php echo $vendorDetails->hotel_name;?></h3>
                  <p><?php echo $vendorDetails->address_line_1.", ".$vendorDetails->address_line_2.", ".$vendorDetails->zip;?></p>
                  <p><?php echo $vendorDetails->city_name.", ".$vendorDetails->state_name.", ".$vendorDetails->country_name;?></p>
                  <p><?php echo "Ph: ".$vendorDetails->hotel_mobile_no;?></p>
                  <?php }?>
                  <!--<div class="panel-ctrls">-->
                  <!--</div>-->
                </div>
                <div class="panel-body panel-no-padding">
                    <table id="" class="table table-striped exampletable" cellspacing="0" width="100%" style="border:1px solid;">
                        <thead>
                        <tr>
                            <th>Voucher<br>Type</th>
                            <th>Voucher<br>Number</th>
                            <th>Voucher<br>Date</th>
                            <!--<th>Bill<br>Number</th>-->
                            <!--<th>Bill<br>Date</th>-->
                            <th>Number</th>
                            <th style="border-right: 1px solid;border-left: 1px solid;">Debit<br>Amount</th>
                            <th style="border-right: 1px solid;">Credit<br>Amount</th>
                            <th style="">Closing Balance</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if(!empty($ledgerDetails)){
                            $i=0;
                           foreach($ledgerDetails as $ledgerDetails) {
                            //   for($i=0; $i<count($closingBal); $i++){
                               
                            ?>
                        <tr class="odd gradeX">
                            <td><?php echo $ledgerDetails->voucher_type; ?></td>
                            <td><?php echo $ledgerDetails->id;?></td>
                            <td><?php echo date('d/m/Y', strtotime($ledgerDetails->ledger_date));?></td>
                            <!--<td></td>-->
                            <!--<td><?php //echo date('d/m/Y', strtotime($ledgerDetails->voucher_date));?></td>-->
                            <td><?php if(!empty($ledgerDetails->tourcard_no)){ echo "TC-".$ledgerDetails->tourcard_no;}else{ echo $ledgerDetails->refrence_no; }?></td>
                            <td style="border-right: 1px solid;border-left: 1px solid;"><?php echo $ledgerDetails->debit_amount; ?></td>
                            <td style="border-right: 1px solid;"><?php echo $ledgerDetails->credit_amount; ?></td>
                            <td>
                                <?php 
                                // $arr=array(1100,3150,4430,4430,5170,7450,7450,7450,8230);
                                // $out = array($arr[0]);
                                // for ($i = 1; $i < count($arr); $i++) {
                                //     $out[$i] = $out[$i-1] + $arr[$i];
                                // }
                                // $arr = array_combine($out, $arr);
                                // print_r($out);
                                 //var_dump($closingBal);
                                 echo $closingBal[$i];
                                ?>
                            </td>
                        </tr>
                        <thead>
                            <tr>
                                <th colspan="4" style="padding-left:150px;border-bottom: 0px;">
                                    <?php if($ledgerDetails->voucher_type == "BPV" ||$ledgerDetails->voucher_type == "BRV") { 
                                        echo $ledgerDetails->particulars; ?>
                                <?php }else if($ledgerDetails->voucher_type == "CPV" ||$ledgerDetails->voucher_type == "CRV") { ?>
                                         <?php echo $ledgerDetails->particulars; ?>
                                <?php }else{ ?>
                                        <?php echo $ledgerDetails->pax_name." ".$ledgerDetails->from_date." To ".$ledgerDetails->to_date;?>
                                <?php }?>
                                </th>
                                <th style="border-right:1px solid;border-left:1px solid;border-bottom: 0px;"></th>
                                <th style="border-right:1px solid;border-bottom: 0px;"></th>
                                <th style="border-bottom: 0px;"></th>
                            </tr>
                        </thead>
                        <?php $i++; }
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