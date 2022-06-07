<div class="col-md-11" id="contentCol">
<div id="wrapper">
<div id="layout-static">
<div class="static-content-wrapper">
<div class="static-content">
<div class="page-content" style="margin-top:;">
    <ol class="breadcrumb">
       <li><a href="<?php echo base_url(PARTNER) ?>/dashboard">Home</a></li>
       <li><a href="#">Sub Ledgers</a></li>
    </ol>
    <div class="page-heading">
        <h1>Sub Ledgers</h1>
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
                       <h2>Sub Ledgers</h2>
                       <div class="panel-ctrls">
                       </div>
                    </div>
                    <div class="panel-body panel-no-padding">
                    <table id="example" class="table table-striped table-bordered exampletable" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th style="width:;">SNo.</th>
                            <th style="width:;">Sub Ledger Name</th>
                            <th style="width:;">General Ledger</th>
                            <th>Ledger Type</th>
                            <th>Created On</th>
                            <th style="width:;">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if(!empty($subLedgers)){
                           foreach($subLedgers as $subLedger) {?>
                        <tr class="odd gradeX">
                            <td><?php echo $subLedger->id; ?></td>
                            <td><?php echo $subLedger->sub_ledger_name; ?></td>
                            <td><?php echo $ledgerName->ledger_name; ?></td>
                            <td><?php echo $subLedger->sub_ledger_type; ?></td>
                            <td><?php echo date('d/m/Y', strtotime($subLedger->created_on)); ?></td>
                            <td>
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

<script>
    

</script>