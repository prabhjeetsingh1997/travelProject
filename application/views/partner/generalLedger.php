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
        <h1>General Ledgers</h1>
        <div class="options">
            <a href="<?php echo base_url(PARTNER)?>/newPaymentVoucher" class="btn btn-info btn-md pull-right" style="margin-left: 10px;">Make Voucher</a>
            <!--<button type="button" class="btn btn-info btn-md pull-right" data-toggle="modal" data-target="#NewVoucher" style="margin-left: 10px;">Make Voucher</button>-->
            <button type="button" class="btn btn-info btn-md pull-right" id="NewLedger" style="margin-left: 10px;">New Ledger</button>
            <button type="button" class="btn btn-info btn-md pull-right" id="subLedger">Sub Ledger</button>
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
                       <h2>Ledgers</h2>
                       <div class="panel-ctrls">
                       </div>
                    </div>
                    <div class="panel-body panel-no-padding">
                    <table id="example" class="table table-striped table-bordered exampletable" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th style="width:;">SNo.</th>
                            <th style="width:;">General Ledger Name</th>
                            <th style="width:;">Ledger Type</th>
                            <th>Created On</th>
                            <th style="width:;">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if(!empty($generalLedger)){
                           foreach($generalLedger as $Ledger) { ?>
                        <tr class="odd gradeX">
                            <td><?php echo $Ledger->id; ?></td>
                            <td><?php echo $Ledger->ledger_name; ?></td>
                            <td><?php echo $Ledger->ledger_type; ?></td>
                            <td><?php echo date('d/m/Y', strtotime($Ledger->created_on)); ?></td>
                            <td>
                               <a href="<?php echo base_url(PARTNER) ?>/getGeneralLedgerById/<?php echo $Ledger->id;?>" data-toggle="tooltip" data-placement="top" title="View Genral Ledger"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                               
                               <!--<a class="" href="<?php //echo base_url(PARTNER) ?>" data-toggle="tooltip" data-placement="top" title="Delete Ledger" style="color:red;"><i class="fa fa-trash" aria-hidden="true"></i></a>-->
                               
                               <?php foreach($subLedger as $subledg) {?>
                               <?php if($Ledger->id == $subledg->gn_ledgerId) {?>
                               <a href="<?php echo base_url(PARTNER) ?>/getSubLedgerById/<?php echo $Ledger->id; ?>" data-toggle="tooltip" data-placement="top" title="View Sub Ledger" style="color:green;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                               <?php } 
                               }?>
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

<!-- Modal -->
<div id="NewGnLedger" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add General Ledger</h4>
        </div>
        <div class="modal-body">
        <form>
            <div class="form-group">
                <label>Ledger Name</label>
                <input type="text" class="form-control" name="ledger_name" id="ledger_name" placeholder="Ledger Name" required>
            </div>
            <div class="form-group">
                <label>Ledger Type</label>
                <select class="form-control" name="ledger_type" id="ledger_type" required>
                    <option value="">Select Ledger Type</option>
                    <option value="assets">Assets</option>
                    <option value="liabilities">Liabilities</option>
                    <option value="income">Income</option>
                    <option value="expenses">Expenses</option>
                    <option value="capital">Capital</option>
                    <option value="gains">Gains</option>
                    <option value="losses">Losses</option>
                </select>
            </div>
            <button type="button" class="btn btn-md btn-success" id="saveLedger">Submit</button>
        </form>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
    </div>

  </div>
</div>
<!-- Modal -->
<div id="NewSubLedger" class="modal fade" role="dialog" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Sub Ledger</h4>
        </div>
        <div class="modal-body">
        <form>
            <div class="form-group">
                <label>Sub Ledger Name</label>
                <input type="text" class="form-control" name="subledger_name" id="subledger_name" placeholder="Sub Ledger Name" required>
            </div>
            <div class="form-group">
                <label>General Ledger Name</label>
                <select class="form-control" name="SubGnLedger" id="SubGnLedger" required>
                    <option value="">select general ledger type</option>
                    <?php if(!empty($generalLedger)){
                           foreach($generalLedger as $Ledger) { ?>
                           <option value="<?php echo $Ledger->id;?>"><?php echo $Ledger->ledger_name; ?></option>
                           
                    <?php }
                    }?>
                </select>
            </div>
            <div class="form-group">
                <label>Ledger Type</label>
                <input type="text" class="form-control" name="subledger_type" id="subledger_type" required readonly>
            </div>
            <button type="button" class="btn btn-md btn-success" id="newSubLedger">Submit</button>
        </form>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
    </div>

  </div>
</div>

<script type="text/javascript" src="<?php echo base_url(); ?>asset/plugins/select2/select2.full.min.js"></script>
<script>
    
    $(document).on('click',"#subLedger",function(){
      	$("#NewSubLedger").modal();
	});
	
	$(document).on('click',"#NewLedger",function(){
      	$("#NewGnLedger").modal();
	});
        $("#saveLedger").click(function(e){
            
            e.preventDefault();     
            var ledger_name = $("#ledger_name").val();
            var ledger_type = $("#ledger_type").find("option:selected").val();
            var base_url = "<?php echo base_url(PARTNER)?>";
            if(ledger_name == ""){
                alert("please enter ledger name");
            }
            else if(ledger_type == ""){
                alert("please select ledger type");
            }else{
                
            $.ajax({
                type:"POST",
                url:base_url+"/addNewgeneralLedger",
                data:{ledger_name: ledger_name, ledger_type: ledger_type},
                
            beforeSend:function() {
			    $("#custom-loader").css("display","block");
		    },
            success: function(html)
            {
                if(html > 0)
                {
                //alert("success");
                    swal("Good job!", "Ledger Created Successfully","success").then( () => {
                    location.reload();
                    });
                }
                else
                {
                    //alert("failed");
                    swal("Oops!", "There is something problem!","error").then( () => {
                    location.reload();
                    });
                }
            },
            complete: function() {
			    $("#custom-loader").css("display","none");
		    }
		    
            });
            
            }
        });
        
        
        $("#SubGnLedger").change(function(){
            
            var gnledgervalue = $(this).val();
            var gnLedgers = '<?php echo json_encode($generalLedger) ?>';
            
            $.each(JSON.parse(gnLedgers), function(key, val){
	          if(gnledgervalue === val.id){
	              $("#subledger_type").val(val.ledger_type);
	          }
	        });
	        
        });
        $("#newSubLedger").click(function(e){
            
            e.preventDefault();
            var subledger_name = $("#subledger_name").val();
            var SubGnLedger = $("#SubGnLedger").find("option:selected").val();
            var subledger_type = $("#subledger_type").val();
            var base_url = "<?php echo base_url(PARTNER)?>";
            if(subledger_name == ""){
                alert("please enter ledger name");
                return false;
            }
            else if(SubGnLedger == ""){
                alert("please select ledger type");
                return false;
            }else{
                
            $.ajax({
            type:"POST",
            url:base_url+"/addNewsubLedger",
            data:{SubGnLedger: SubGnLedger, subledger_name: subledger_name, subledger_type: subledger_type},
                
            beforeSend:function() {
			    $("#custom-loader").css("display","block");
		    },
            success: function(html)
            {
                if(html > 0)
                {
                //alert("success");
                    swal("Good job!", "Sub Ledger Created Successfully","success").then( () => {
                    location.reload();
                    });
                }
                else
                {
                    //alert("failed");
                    swal("Oops!", "There is something problem!","error").then( () => {
                    location.reload();
                    });
                }
            },
            complete: function() {
			    $("#custom-loader").css("display","none");
		    }
		    
            });
                
            }
            
        });
</script>