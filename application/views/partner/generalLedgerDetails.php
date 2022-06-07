<div class="col-md-11" id="contentCol">
<div id="wrapper">
<div id="layout-static">
<div class="static-content-wrapper">
<div class="static-content">
<div class="page-content" style="margin-top:;">
    <ol class="breadcrumb">
       <li><a href="<?php echo base_url(PARTNER) ?>/dashboard">Home</a></li>
       <li><a href="#">General Ledgers</a></li>
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
                  <h3 style="color:darkblue;"><?php echo $ledgerName->ledger_name;?></h3>
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
                        <?php if(!empty($ledgerData)){
                            $i=0;
                           foreach($ledgerData as $ledgerDetails) {
                           ?>
                        <tr class="odd gradeX">
                            <td><?php echo $ledgerDetails->voucher_type; ?></td>
                            <td><?php echo $ledgerDetails->id;?></td>
                            <td><?php echo date('d/m/Y', strtotime($ledgerDetails->voucher_date));?></td>
                            <!--<td></td>-->
                            <!--<td><?php //echo date('d/m/Y', strtotime($ledgerDetails->entry_date));?></td>-->
                            <td><?php echo $ledgerDetails->refrence_no;?></td>
                            <td style="border-right: 1px solid;border-left: 1px solid;"><?php echo $ledgerDetails->debit_amount; ?></td>
                            <td style="border-right: 1px solid;"><?php echo $ledgerDetails->credit_amount; ?></td>
                            <td><?php echo $closingBal[$i];?></td>
                        </tr>
                        <thead>
                            <tr>
                                <th colspan="4" style="padding-left:150px;border-bottom: 0px;">
                                    <?php echo $ledgerDetails->particulars." ".date('d/m/Y', strtotime($ledgerDetails->entry_date))." ".$ledgerDetails->refrence_no; ?>
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