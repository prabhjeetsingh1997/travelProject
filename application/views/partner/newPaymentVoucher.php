<div class="col-md-11" id="contentCol">
<div id="wrapper">
<div id="layout-static">
<div class="static-content-wrapper">
<div class="static-content">
<div class="page-content" style="margin-top:;">
    <ol class="breadcrumb">
       <li><a href="<?php echo base_url(PARTNER) ?>/dashboard">Home</a></li>
       <li><a href="#">Voucher</a></li>
    </ol>
    <div class="page-heading">
        <!--<h1>Voucher</h1>-->
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
            { ?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $error; ?>                    
                </div>
            <?php }
            $success = $this->session->flashdata('success');
            if($success)
            { ?>
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $success; ?>                    
                </div>
            <?php } ?>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <form action="<?php echo base_url(PARTNER) ?>/makeNewLedgerVoucher" method="POST" target="">
            <div class="col-md-12">
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Voucher Type:<span id="vouchType" style="color:red;"></span></label>
                        <select class="form-control" name="vouch_type" id="selVoucherType" required>
                            <option value="">Select</option>
                            <option value="BPV">Bank Payement Voucher</option>
                            <option value="CPV">Cash Payement Voucher</option>
                            <option value="BRV">Bank Reciept Voucher</option>
                            <option value="CRV">Cash Recieved Voucher</option>
                        </select>
                        <!--<input type>-->
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Date:</label>
                        <input type="date" class="form-control" name="voucher_date" max="<?php echo date("Y-m-d");?>" value="<?php echo date("Y-m-d");?>" id="selDate" required>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>General Ledger Name:<span id="LedgerType" style="color:red;"></span></label>
                        <select class="form-control" name="ledger_name" id="selectLedger" required>
                            <option value="">Select</option>
                            <?php foreach($generalLedger as $ledgers) {?>
                            <option value="<?php echo $ledgers->id?>"><?php echo $ledgers->ledger_name?></option>
                            <?php }?>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Hotel/Vendor/Party:</label>
                        <select class="form-control select2" name="ledger_vendor" data-placeholder="Select" id="selectPerson" required>
                            <option value="">Select</option>
                            <?php foreach($partners_hotel as $partnerHotel) {?>
                            <option value="<?php echo "HTL".$partnerHotel->hotel_id?>"><?php echo $partnerHotel->hotel_name; ?></option>
                            <?php }?>
                            <?php foreach($vendors as $vendor) {?>
                            <option value="<?php echo "VND".$vendor->vendorId?>"><?php echo $vendor->company_name; ?></option>
                            <?php }?>
                            <?php foreach($clientDetails as $client) {?>
                            <option value="<?php echo "CLNT".$client->id?>"><?php echo $client->client_name; ?></option>
                            <?php }?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div id="tbldata">
                </div>
            </div>
            <div class="col-md-12">
                <div id="LedgerTblData" style="">
                </div>
            </div>
            <div class="col-md-12">
                <div id="newEntryData" style="">

                </div>
            </div>
            <div class="col-md-12">
                <button type="button" class="btn pull-right" style="background-color:#4F80BD;color:white;margin-top: 21px; display:none; margin-left:10px;" id="makeNewEntry">Proceed</button>
                <button type="submit" class="btn pull-right" style="background-color:#4F80BD;color:white;margin-top: 21px;" id="submitEntry" disabled="disabled">Save</button>
            </div>
            </form>
            
        </div>
    </div>
   <!-- .container-fluid -->
</div>
<style>
    .select2-container--default .select2-selection--single{
        border-radius:0px;
        height:34px;
        border-color:#e0e0e0;
    }
    /*.select2-container *:focus {*/
    /*    outline:;*/
    /*}*/
    .getnewRow:focus{
        outline:1px solid black;
    }
</style>
<script type="text/javascript" src="<?php echo base_url(); ?>asset/plugins/select2/select2.full.min.js"></script>
<script>
    
    $(".select2").select2({
        allowClear: true,
    });
    
    $(document).on("click", "#other_remove", function(){
    	$(this).closest('tr').remove();
		//calculate_other_price();
		var count = $("#count_row").val();
		count--;
		$("#count_row").val(count);
		
	});
    
    $('#selectPerson').on('select2:open', function(e){
        
        var selVoucType = $("#selVoucherType").find("option:selected").val();
        var selLedgerval = $("#selectLedger").find("option:selected").val();
        var selLedgerName = $("#selectLedger").find("option:selected").text();
        var selDate = $("#selDate").val();
        
        if(selVoucType == ""){
            $("#vouchType").text("Select Voucher Type");
            $("#selVoucherType").focus();
            $("#selectPerson").select2('close');
            
        }
        if(selLedgerval == ""){
            //alert("Select Ledger Type");
            $("#LedgerType").text("Select Ledger Type");
            $("#selectLedger").focus();
            $("#selectPerson").select2('close');
            
        }else{
            
        $('#selectPerson').change(function(){
            
            //alert(selVoucType);
            $("#tbldata").html('');
            $("#LedgerTblData").html('');
            $("#newEntryData").html('');
            $("#vouchType").text("");
            $("#LedgerType").text("");
            var selValue = $(this).find("option:selected").val();
            var selVendorName = $(this).find("option:selected").text();
            
            if(selVoucType == 'CRV' || selVoucType == 'CPV'){
                $("#makeNewEntry").css("display","block");
                   
                    $("#makeNewEntry").click(function(){
                        //$("#selVoucherType").prop('disabled', true);
                        $("#selVoucherType option").each(function() {
                            if($(this).val() !== selVoucType) {
                               $(this).attr("disabled", true);
                            }
                        });     
                        
                        // $("#selectLedger option").each(function() {
                        //     if($(this).val() !== selLedgerval) {
                        //       $(this).attr("disabled", true);
                        //     }
                        // });     
                        
                
		              var newentryTable ="<div class='table-responsive' style='width:max-content;'><table class='table table-bordered' cellspacing='0' style='background-color:white;'>";
                        
                        newentryTable +="<thead><tr>";
                        newentryTable +="<th style='background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4; width:250px;'>Name</th>";
                        newentryTable +="<th style='background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4; width:110px;'>Voucher<br>No</th>";
                        newentryTable +="<th style='background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4; width:110px;'>Voucher<br>Date</th>";
                        newentryTable +="<th style='background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4; width:110px;'>TourCard<br>Number</th>";
                        newentryTable +="<th style='background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4; width:110px;'>Refrence<br>Number</th>";
                        newentryTable +="<th style='background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4; width:110px;'>Cheque<br>Date</th>";
                        newentryTable +="<th style='background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4; width:60px; '>D/C</th>";
                        newentryTable +="<th style='background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4; width:150px;'>Amount</th>";
                        newentryTable +="<th style='background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4; width:250px;'>Particulars</th>";
                        newentryTable +="<th style='background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4; width:60px; '></th></tr></thead>";
                        newentryTable +="<tbody id='pymtvchrtbl'><tr>";
                        newentryTable +="<td>"+selVendorName+"<input type='hidden' name='vnd_id[]' id='vnd_id' value='"+selValue+"'></td>";
                        newentryTable +="<td><input type='text' class='form-control' name='' id='' readonly></td>";
                        newentryTable +="<td><input type='date' class='form-control' name='vouch_date[]' id='vouch_date' value='"+selDate+"'></td>";
                        newentryTable +="<td><input type='text' class='form-control' name='tc_no[]' id='tc_no'></td>";
                        newentryTable +="<td><input type='text' class='form-control' name='ref_no[]' id='ref_no'></td>";
                        newentryTable +="<td><input type='date' class='form-control' name='chq_no[]' id='chq_no'></td>";
                        if(selVoucType == 'CRV'){
                        newentryTable +="<td><input type='text' class='form-control' name='drandcr[]' id='drandcr' value='C' readonly></td>";
                        }else if(selVoucType == 'CPV'){
                        newentryTable +="<td><input type='text' class='form-control' name='drandcr[]' id='drandcr' value='D' readonly></td>";
                        }
                        newentryTable +="<td><input type='text' class='form-control nwvchrAmt' name='vouch_amt[]' id='vouch_amt' onkeyup=''></td>";
                        newentryTable +="<td><input type='text' class='form-control' name='vouch_prt[]' id='vouch_prt'></td>";
                        newentryTable +="<td></td>";
                        newentryTable +="</tr>";
                        newentryTable +="<tr><input type='hidden' name='selVendor_id' id='' value='"+selValue+"'>";
                        newentryTable +="<td>"+selLedgerName+"<input type='hidden' class='form-control' name='selLedger_name' id='' value='"+selLedgerName+"'></td>";
                        newentryTable +="<td><input type='text' class='form-control' name='' id='' value='' readonly></td>";
                        newentryTable +="<td><input type='date' class='form-control' name='selLedger_date' id='selLdg_date' value='"+selDate+"'></td>";
                        newentryTable +="<td><input type='text' class='form-control' name='selLedger_tcno' id='selLedger_tcno' value=''></td>";
                        newentryTable +="<td><input type='text' class='form-control' name='selLedger_refno' id='selLedger_refno' value=''></td>";
                        newentryTable +="<td><input type='date' class='form-control' name='selLedgerchq_date' id='selLdgchk_date' value=''></td>";
                        if(selVoucType == 'CRV'){
                        newentryTable +="<td><input type='text' class='form-control' name='selLedger_drandcr' id='' value='D' readonly></td>";
                        }else if(selVoucType == 'CPV'){
                        newentryTable +="<td><input type='text' class='form-control' name='selLedger_drandcr' id='' value='C' readonly></td>";
                        }                
                        newentryTable +="<td><input type='text' class='form-control' name='selLedger_amt' id='ldg_amt' value=''></td>";
                        newentryTable +="<td><input type='text' class='form-control' name='selLedger_prt' id='selLedger_prt' value='"+selVendorName+"'></td>";
                        newentryTable +="<td><button type='button' class='btn btn-sm getnewRow'><i class='fa fa-plus' aria-hidden='true'></i></button><input type='hidden' name='count_row' value='2' id='count_row'></td>";
                        newentryTable +="</tr></tbody>";           
                        newentryTable +="</table></div>";
	               
		               $("#LedgerTblData").html('');
		               $("#newEntryData").css("overflow-x","scroll");
		               $("#newEntryData").html(newentryTable);
		               $("#tbldata").html('');
		               $("#makeNewEntry").css("display","none");
		               //$("#submitEntry").removeAttr("disabled");
		               //$("#tbldata").css("display","none");
		               $("#vouch_amt").on('input', function(){
		                  var amt1Val = $(this).val();
		                  //var amt2val = $("#ldg_amt").val();
		                  //var fnlAmt = parseInt(amt1Val - amt2val);
		                  $("#ldg_amt").val(amt1Val);
		                  
		                  $("#submitEntry").removeAttr("disabled");
		               });
		               $("#ldg_amt").on('input', function(){
		                  var amt1Val = $(this).val();
		                  var amt2val = $("#vouch_amt").val();
		                  var fnlAmt = parseInt(amt1Val - amt2val);
		                  
		                  if(amt1Val !== amt2val){
		                      $("#submitEntry").attr("disabled", true);
		                  }else{
		                      $("#submitEntry").removeAttr("disabled");
		                  }
		               });
		               $("#tc_no").on('input', function(){
		                  var ledgTc = $(this).val();
		                  $("#selLedger_tcno").val(ledgTc);
		               });
		               $("#ref_no").on('input', function(){
		                  var ledgrefNo = $(this).val();
		                  $("#selLedger_refno").val(ledgrefNo);
		               });
		               $("#vouch_prt").on('input', function(){
		                  var ledgprtcular = $(this).val();
		                  $("#selLedger_prt").val(ledgprtcular);
		               });
		               
		                $(document).on("click", '.getnewRow', function(){
		                    
		                    var ldgamt = $("#ldg_amt").val();
		                    
		                    var count    = parseInt($("#count_row").val());
		                    var gnldgers = '<?php echo json_encode($generalLedger)?>';
		                    var vendors  = '<?php echo json_encode($vendors)?>';
		                    var hotels   = '<?php echo json_encode($partners_hotel)?>';
		                    var parties  = '<?php echo json_encode($clientDetails)?>';
		                    var id       = count+1;
		                    
		                    var totarr = [];
                            $.each($(".nwvchrAmt"), function(){
                                totarr.push($(this).val());
                            });
		                    var total = 0;
		                    for(var i = 0; i < totarr.length; i++) {
    		                    total += totarr[i] << 0;
		                    }
		                    var nxtamt = parseInt(ldgamt - total);
		                  //  if(ldgamt == total){
		                  //      $("#submitEntry").attr("disabled", true);
		                  //  }else{
		                  //      $("#submitEntry").removeAttr("disabled");
		                  //  }
		                    var new_rows = "<tr>";
		                        new_rows +="<td><select class='form-control select2' name='ldgrAccount[]' id='selLdgrAcc' data-placeholder='Select' required>";
		                        new_rows +="<option value=''>Select</option>";
		                        $.each(JSON.parse(gnldgers), function(index, value) {
			                        new_rows += '<option value="GNL'+value.id+'">'+value.ledger_name+'</option>';
                                });
                                $.each(JSON.parse(vendors), function(index, value) {
			                        new_rows += '<option value="VND'+value.vendorId+'">'+value.company_name+'</option>';
                                });
                                $.each(JSON.parse(hotels), function(index, value) {
			                        new_rows += '<option value="HTL'+value.hotel_id+'">'+value.hotel_name+'</option>';
                                });
                                $.each(JSON.parse(parties), function(index, value) {
			                        new_rows += '<option value="CLNT'+value.id+'">'+value.client_name+'</option>';
                                });
		                        new_rows +="</select></td>";
		                        new_rows +="<td><input type='text' class='form-control' name='vchr_no[]' id='' readonly></td>";
		                        new_rows +="<td><input type='date' class='form-control' name='vchr_date[]' id='vouch_date' value='"+selDate+"'></td>";
		                        new_rows +="<td><input type='text' class='form-control' name='vchrTC[]' id=''></td>";
		                        new_rows +="<td><input type='text' class='form-control' name='vchrRF[]' id=''></td>";
		                        new_rows +="<td><input type='date' class='form-control' name='vchrCHQ[]' id=''></td>";
		                        new_rows +="<td><input type='text' class='form-control' name='vchrDbCr[]' id='' value='D'></td>";
		                        new_rows +="<td><input type='text' class='form-control nwvchrAmt' name='vchrAmt[]' id='vchramt"+id+"' value='"+nxtamt+"' required></td>";
		                        new_rows +="<td><input type='text' class='form-control' name='vchrPart[]' id=''></td>";
		                        new_rows +="<td><button type='button' class='btn btn-sm getnewRow'><i class='fa fa-plus' aria-hidden='true'></i></button><br><button type='button' class='btn btn-sm' style='color: red; cursor:pointer' id='other_remove'><i class='fa fa-minus-circle' aria-hidden='true'></i></button></td>";
		                        new_rows +="</tr>";
                                //alert("Add new Row?");
                           		var confirmtrue = swal({
                                    title: "Do you want new row?",
                                    text: "",
                                    buttons: {  
                                        cancel: {
                                          text: "Cancel",
                                          value: false,
                                          visible: true,
                                          className: "",
                                          closeModal: true,
                                        },
                                        confirm: {
                                          text: "OK",
                                          value: true,
                                          visible: true,
                                          className: "",
                                          closeModal: true
                                        }

                                    },
          
                                }).then((value) => {

                                    if(value){
                                        $("#pymtvchrtbl").append(new_rows);
                                        $("#count_row").val(id); 
                                        $(".select2").select2({
                                           allowClear: true,
                                        });
                                       
                                        swal.close();
                                        
                                  
                                    }else{
                                  
                                    }
                                    
                                    //var nId = id+1;
                                    //$("#vchramt"+nId).val(nxtamt);
                  
                                });
                                
                        });
                        
                    });
                   
            }else {
                
            //}
            $.ajax({
            type:"POST",
            url:"<?php echo base_url(PARTNER)?>/getDetailForNewPaymentVoucher",
            data:{id: selValue},
            beforeSend:function(){
                $("#custom-loader").css("display","block");
            },
            success:function(data){
                
                if(data == [] || data == 0){
                    $("#tbldata").html('No Related Data Found');
                    $("#makeNewEntry").css("display","block");
                   
                    $("#makeNewEntry").click(function(){
                        $("#selVoucherType option").each(function() {
                            if($(this).val() !== selVoucType) {
                               $(this).attr("disabled", true);
                            }
                        });
                        
                        // $("#selectLedger option").each(function() {
                        //     if($(this).val() !== selLedgerval) {
                        //       $(this).attr("disabled", true);
                        //     }
                        // });    
                        var newentryTable ="<div class='table-responsive' style='width:max-content;'><table class='table table-bordered' cellspacing='0' style='background-color:white;'>";
                        newentryTable +="<thead><tr>";
                        newentryTable +="<th style='background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;width:250px;'>Name</th>";
                        newentryTable +="<th style='background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;width:110px;'>Voucher<br>No</th>";
                        newentryTable +="<th style='background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;width:110px;'>Voucher<br>Date</th>";
		                newentryTable +="<th style='background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;width:110px;'>TourCard<br>Number</th>";
		                newentryTable +="<th style='background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;width:110px;'>Refrence<br>Number</th>";
		                newentryTable +="<th style='background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;width:110px;'>Cheque<br>Date</th>";
		                newentryTable +="<th style='background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;width:60px;'>D/C</th>";
		                newentryTable +="<th style='background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;width:150px;'>Amount</th>";
		                newentryTable +="<th style='background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;width:250px;'>Particulars</th>";
		                newentryTable +="<th style='background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;width:60px;'></th>";
		                newentryTable +="</tr></thead>";
		                               
		                newentryTable +="<tbody id='pymtvchrtbl'><tr>";
		                newentryTable +="<td>"+selVendorName+"<input type='hidden' name='vnd_id[]' id='vnd_id' value='"+selValue+"'></td>";
		                newentryTable +="<td><input type='text' class='form-control' name='' id='' readonly></td>";
		                newentryTable +="<td><input type='date' class='form-control' name='vouch_date[]' id='vouch_date' value='"+selDate+"'></td>";
		                newentryTable +="<td><input type='text' class='form-control' name='tc_no[]' id='tc_no'></td>";
		                newentryTable +="<td><input type='text' class='form-control' name='ref_no[]' id='ref_no'></td>";
		                newentryTable +="<td><input type='date' class='form-control' name='chq_no[]' id='chq_no'></td>";
		                if(selVoucType == 'BPV'){
		                   newentryTable +="<td><input type='text' class='form-control' name='drandcr[]' id='drandcr' value='D' readonly></td>";    
		                }else if(selVoucType == 'BRV'){
		                    newentryTable +="<td><input type='text' class='form-control' name='drandcr[]' id='drandcr' value='C' readonly></td>";
		                }
		                
		                newentryTable +="<td><input type='text' class='form-control nwvchrAmt' name='vouch_amt[]' id='vouch_amt'></td>";
		                newentryTable +="<td><input type='text' class='form-control' name='vouch_prt[]' id='vouch_prt'></td>";
		                newentryTable +="</tr>";
		                               
		                newentryTable +="<tr><input type='hidden' name='selVendor_id' id='' value='"+selValue+"'>";
		                newentryTable +="<td>"+selLedgerName+"<input type='hidden' class='form-control' name='selLedger_name' id='' value='"+selLedgerName+"'></td>";
		                newentryTable +="<td><input type='text' class='form-control' name='' id='' value='' readonly></td>";
		                newentryTable +="<td><input type='date' class='form-control' name='selLedger_date' id='selLdg_date' value='"+selDate+"'></td>";
		                newentryTable +="<td><input type='text' class='form-control' name='selLedger_tcno' id='selLedger_tcno' value=''></td>";
		                newentryTable +="<td><input type='text' class='form-control' name='selLedger_refno' id='selLedger_refno' value=''></td>";
		                newentryTable +="<td><input type='date' class='form-control' name='selLedgerchq_date' id='selLdgchk_date' value=''></td>";
		                if(selVoucType == 'BPV'){
		                    newentryTable +="<td><input type='text' class='form-control' name='selLedger_drandcr' id='' value='C' readonly></td>";
                        }else if(selVoucType == 'BRV'){
                            newentryTable +="<td><input type='text' class='form-control' name='selLedger_drandcr' id='' value='D' readonly></td>";
                        }
		                
		                newentryTable +="<td><input type='text' class='form-control' name='selLedger_amt' id='ldg_amt' value=''></td>";
		                newentryTable +="<td><input type='text' class='form-control' name='selLedger_prt' id='selLedger_prt' value='"+selVendorName+"'></td>";
		                newentryTable +="<td><button type='button' class='btn btn-sm getnewRow'><i class='fa fa-plus' aria-hidden='true'></i></button><input type='hidden' name='count_row' value='2' id='count_row'></td>";
		                newentryTable +="</tr></tbody>";
		                newentryTable +="</table></div>";
		               
		               $("#LedgerTblData").html('');
		               $("#newEntryData").css("overflow-x","scroll");
		               $("#newEntryData").html(newentryTable);
		               $("#tbldata").html('');
		               $("#makeNewEntry").css("display","none");
		               //$("#submitEntry").removeAttr("disabled");
		               //$("#tbldata").css("display","none");
		               $("#vouch_amt").on('input', function(){
		                  var amt1Val = $(this).val();
		                  $("#ldg_amt").val(amt1Val);
		                  $("#submitEntry").removeAttr("disabled");

		               });
		               $("#ldg_amt").on('input', function(){
		                  var amt1Val = $(this).val();
		                  var amt2val = $("#vouch_amt").val();
		                  if(amt1Val !== amt2val){
		                      $("#submitEntry").attr("disabled", true);
		                  }else{
		                      $("#submitEntry").removeAttr("disabled");
		                  }
		               });
		               
		               $("#tc_no").on('input', function(){
		                  var ledgTc = $(this).val();
		                  $("#selLedger_tcno").val(ledgTc);
		               });
		               $("#ref_no").on('input', function(){
		                  var ledgrefNo = $(this).val();
		                  $("#selLedger_refno").val(ledgrefNo);
		               });
		               $("#vouch_prt").on('input', function(){
		                  var ledgprtcular = $(this).val();
		                  $("#selLedger_prt").val(ledgprtcular);
		               });
		               
		               $(document).on("click", '.getnewRow', function(){
		                    
		                    var ldgamt = $("#ldg_amt").val();
		                  //  var vndamt = $("#vouch_amt").val();
		                  //  var nxtamt = parseInt(ldgamt - vndamt);
		                    
		                    var count    = parseInt($("#count_row").val());
		                    var gnldgers = '<?php echo json_encode($generalLedger)?>';
		                    var vendors  = '<?php echo json_encode($vendors)?>';
		                    var hotels   = '<?php echo json_encode($partners_hotel)?>';
		                    var parties  = '<?php echo json_encode($clientDetails)?>';
		                    var id       = count+1;
		                    
		                    var totarr = [];
                            $.each($(".nwvchrAmt"), function(){
                                totarr.push($(this).val());
                            });
		                    var total = 0;
		                    for(var i = 0; i < totarr.length; i++) {
    		                    total += totarr[i] << 0;
		                    }
		                    var nxtamt = parseInt(ldgamt - total);
		                    var new_rows = "<tr>";
		                        new_rows +="<td><select class='form-control select2' name='ldgrAccount[]' id='selLdgrAcc' data-placeholder='Select' required>";
		                        new_rows +="<option value=''>Select</option>";
		                        $.each(JSON.parse(gnldgers), function(index, value) {
			                        new_rows += '<option value="GNL'+value.id+'">'+value.ledger_name+'</option>';
                                });
                                $.each(JSON.parse(vendors), function(index, value) {
			                        new_rows += '<option value="VND'+value.vendorId+'">'+value.company_name+'</option>';
                                });
                                $.each(JSON.parse(hotels), function(index, value) {
			                        new_rows += '<option value="HTL'+value.hotel_id+'">'+value.hotel_name+'</option>';
                                });
                                $.each(JSON.parse(parties), function(index, value) {
			                        new_rows += '<option value="CLNT'+value.id+'">'+value.client_name+'</option>';
                                });
		                        new_rows +="</select></td>";
		                        new_rows +="<td><input type='text' class='form-control' name='vchr_no[]' id='' readonly></td>";
		                        new_rows +="<td><input type='date' class='form-control' name='vchr_date[]' id='vouch_date' value='"+selDate+"'></td>";
		                        new_rows +="<td><input type='text' class='form-control' name='vchrTC[]' id=''></td>";
		                        new_rows +="<td><input type='text' class='form-control' name='vchrRF[]' id=''></td>";
		                        new_rows +="<td><input type='date' class='form-control' name='vchrCHQ[]' id=''></td>";
		                        new_rows +="<td><input type='text' class='form-control' name='vchrDbCr[]' id='' value='D'></td>";
		                        new_rows +="<td><input type='text' class='form-control nwvchrAmt' name='vchrAmt[]' id='' onkeyup='' value='"+nxtamt+"' required></td>";
		                        new_rows +="<td><input type='text' class='form-control' name='vchrPart[]' id=''></td>";
		                        new_rows +="<td><button type='button' class='btn btn-sm getnewRow'><i class='fa fa-plus' aria-hidden='true'></i></button><br><button type='button' class='btn btn-sm' style='color: red; cursor:pointer' id='other_remove'><i class='fa fa-minus-circle' aria-hidden='true'></i></button></td>";
		                        new_rows += "</tr>";
                                //alert("Add new Row?");
                           		var confirmtrue = swal({
                                    title: "Do you want new row?",
                                    text: "",
                                    buttons: {  
                                        cancel: {
                                          text: "Cancel",
                                          value: false,
                                          visible: true,
                                          className: "",
                                          closeModal: true,
                                        },
                                        confirm: {
                                          text: "OK",
                                          value: true,
                                          visible: true,
                                          className: "",
                                          closeModal: true
                                        }

                                    },
          
                                }).then((value) => {

                                    if(value){
                                        $("#pymtvchrtbl").append(new_rows);
                                        $("#count_row").val(id); 
                                        $(".select2").select2({
                                           allowClear: true,
                                        });
                                        swal.close();
                                  
                                    }else{
                                  
                                    }
       
                                });
                        });
		              
                   });
                }else{
                    $("#makeNewEntry").css("display","none");
                    $("#newEntryData").html('');
                    $("#selVoucherType option").each(function() {
                        if($(this).val() !== selVoucType) {
                            $(this).attr("disabled", true);
                        }
                    });
                    
                    // $("#selectLedger option").each(function() {
                    //     if($(this).val() !== selLedgerval) {
                    //         $(this).attr("disabled", true);
                    //     }
                    // });    
                    var newTable = "<div class='table-responsive'><table class='table table-bordered' cellspacing='0' width='' style='background-color:white;'>";
                        newTable +="<tr>";
                        newTable +="<th style='background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4; width:60px;'>Select</th>";
                        newTable +="<th style='background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;'>Voucher<br>No</th>";
                        newTable +="<th style='background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;'>Voucher<br>Date</th>";
		                newTable +="<th style='background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;'>TourCard<br>Number</th>";
		                newTable +="<th style='background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;'>Amount</th>";
		                newTable +="<th style='background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;'>Particulars</th></tr>";
		              
		                var i = 0;
		                $.each(JSON.parse(data), function(key, val){
		                     i++;
		                             
		                     newTable +="<tr>";
		                     newTable +="<td><input type='checkbox' class='selectedChk' name='selectedChk[]' id='selChk"+i+"' value='"+val.id+"'></td>";
		                     if(val.voucher_type == "AVR"){
		                        newTable +="<td>AVR"+val.id+"<input type='hidden' class='form-control' name='' id='' value='"+val.id+"'></td>";    
		                     }
		                     if(val.voucher_type == "HVR"){
		                        newTable +="<td>HVR"+val.id+"<input type='hidden' class='form-control' name='' id='' value='"+val.id+"'></td>";
		                     }
		                     var vouchDate = val.voucher_date.split("-");
		                     var newVouchdate = vouchDate[2]+"-"+vouchDate[1]+"-"+vouchDate[0];
		                     newTable +="<td>"+newVouchdate+"<input type='hidden' class='form-control' name='' id=''></td>";
		                     newTable +="<td>TC"+val.tourcard_no+"<input type='hidden' class='form-control' name='' id=''></td>";
		                     if(val.debit_amount !== ""){
		                         newTable +="<td>₹ "+val.debit_amount+"<input type='hidden' class='form-control' name='' id='' value=''></td>";   
		                     }else if(val.credit_amount !== ""){
		                         newTable +="<td>₹ "+val.credit_amount+"<input type='hidden' class='form-control' name='' id='' value=''></td>";
		                     }else{
		                         newTable +="<td><input type='text' class='form-control' name='' id='' value=''></td>";
		                     }
		                     var fromDate = val.from_date.split("-");
		                     var newFromdate = vouchDate[2]+"-"+vouchDate[1]+"-"+vouchDate[0];
		                     var toDate = val.from_date.split("-");
		                     var newTodate = toDate[2]+"-"+toDate[1]+"-"+toDate[0];
		                     newTable +="<td>"+val.pax_name+' '+newFromdate+' To '+newTodate+"<input type='hidden' class='form-control' name='' id=''></td>";
		                     newTable +="</tr>";    
		                     
		                });
		                newTable +="<input type='hidden' id='countRow' name='' value='"+i+"'></table></div><div class='col-md-12'><button type='button' class='btn pull-right' style='background-color:#4F80BD;color:white;margin-top: 21px;' id='proceedTo'>Proceed</button></div>";
		               
		            $("#tbldata").html(newTable);
		             
		          //  var counVal = $("#countRow").val();
            //         for(var i=0; i<=counVal; i++){
		          //      $('#selChk'+i).click(function() {
            //                 if($(this).is(":checked")) {
            //                     $("#proceedTo").removeAttr("disabled");
            //                 }else{
            //                     $("#proceedTo").attr("disabled","true");
            //                 }
            //             });    
            //         }
                    
                    $("#proceedTo").click(function(){
                        var arr = [];
                        $.each($(".selectedChk:checked"), function(){
                            arr.push($(this).val());
                        });
                        //console.log(arr);
                        if(arr.length === 0){
                            var newentryTable ="<div class='table-responsive' style='width:max-content;'><table class='table table-bordered' cellspacing='0' style='background-color:white;'>";
                            newentryTable +="<thead><tr>";
                            newentryTable +="<th style='background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;width:250px;'>Name</th>";
                            newentryTable +="<th style='background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;width:110px;'>Voucher<br>No</th>";
                            newentryTable +="<th style='background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;width:110px;'>Voucher<br>Date</th>";
		                    newentryTable +="<th style='background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;width:110px;'>TourCard<br>Number</th>";
		                    newentryTable +="<th style='background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;width:110px;'>Refrence<br>Number</th>";
		                    newentryTable +="<th style='background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;width:110px;'>Cheque<br>Date</th>";
		                    newentryTable +="<th style='background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;width:60px;'>D/C</th>";
		                    newentryTable +="<th style='background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;width:150px;'>Amount</th>";
		                    newentryTable +="<th style='background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;width:250px;'>Particulars</th>";
		                    newentryTable +="<th style='background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;width:60px;'></th>";
		                    newentryTable +="</tr></thead>";
		                               
		                    newentryTable +="<tbody id='pymtvchrtbl'><tr>";
		                    newentryTable +="<td>"+selVendorName+"<input type='hidden' name='vnd_id[]' id='vnd_id' value='"+selValue+"'></td>";
		                    newentryTable +="<td><input type='text' class='form-control' name='' id='' readonly></td>";
		                    newentryTable +="<td><input type='date' class='form-control' name='vouch_date[]' id='' value='"+selDate+"'></td>";
		                    newentryTable +="<td><input type='text' class='form-control' name='tc_no[]' id='tc_no'></td>";
		                    newentryTable +="<td><input type='text' class='form-control' name='ref_no[]' id='ref_no'></td>";
		                    newentryTable +="<td><input type='date' class='form-control' name='chq_no[]' id=''></td>";
		                    newentryTable +="<td><input type='text' class='form-control' name='drandcr[]' id='' value='D' readonly></td>";
		                    newentryTable +="<td><input type='text' class='form-control nwvchrAmt' name='vouch_amt[]' id='vouch_amt1'></td>";
		                    newentryTable +="<td><input type='text' class='form-control' name='vouch_prt[]' id='vouch_prt'></td>";
		                    newentryTable +="</tr>";
		                             
		                    newentryTable +="<tr><input type='hidden' name='selVendor_id' id='' value='"+selValue+"'>";
		                    newentryTable +="<td>"+selLedgerName+"<input type='hidden' class='form-control' name='selLedger_name' id='' value='"+selLedgerName+"'></td>";
		                    newentryTable +="<td><input type='text' class='form-control' name='' id='' value='' readonly></td>";
		                    newentryTable +="<td><input type='date' class='form-control' name='selLedger_date' id='' value='"+selDate+"'></td>";
		                    newentryTable +="<td><input type='text' class='form-control' name='selLedger_tcno' id='selLedger_tcno' value=''></td>";
		                    newentryTable +="<td><input type='text' class='form-control' name='selLedger_refno' id='selLedger_refno' value=''></td>";
		                    newentryTable +="<td><input type='date' class='form-control' name='selLedgerchq_date' id='' value=''></td>";
		                    newentryTable +="<td><input type='text' class='form-control' name='selLedger_drandcr' id='' value='C' readonly></td>";
		                    newentryTable +="<td><input type='text' class='form-control' name='selLedger_amt' id='ldg_amt' value=''></td>";
		                    newentryTable +="<td><input type='text' class='form-control' name='selLedger_prt' id='selLedger_prt' value=''></td>";
		                    newentryTable +="<td><button type='button' class='btn btn-sm getnewRow'><i class='fa fa-plus' aria-hidden='true'></i></button><input type='hidden' name='count_row' value='2' id='count_row'></td>";
		                    newentryTable +="</tr></tbody>";
		                    newentryTable +="</table></div>";
		               
		                    $("#LedgerTblData").html('');
		                    $("#newEntryData").css("overflow-x","scroll");
		                    $("#newEntryData").html(newentryTable);
                            $("#tbldata").html('');
		                    //$("#submitEntry").removeAttr("disabled");
		                    $("#proceedTo").attr("disabled","true");
		                    $("#vouch_amt1").on('input', function(){
		                        var amt1Val = $(this).val();
		                        $("#ldg_amt").val(amt1Val);
		                        $("#submitEntry").removeAttr("disabled");
		                    });
		                    $("#ldg_amt").on('input', function(){
		                       var amt1Val = $(this).val();
		                       var amt2val = $("#vouch_amt1").val();
		                       if(amt1Val !== amt2val){
		                           $("#submitEntry").attr("disabled", true);
		                       }else{
		                           $("#submitEntry").removeAttr("disabled");
		                       }
		                    });
		                    $("#tc_no").on('input', function(){
		                       var ledgTc = $(this).val();
		                       $("#selLedger_tcno").val(ledgTc);
		                    });
		                    $("#ref_no").on('input', function(){
		                       var ledgrefNo = $(this).val();
		                       $("#selLedger_refno").val(ledgrefNo);
		                    });
		                    $("#vouch_prt").on('input', function(){
		                       var ledgprtcular = $(this).val();
		                       $("#selLedger_prt").val(ledgprtcular);
		                    });
		                    
		                    $(document).on("click", '.getnewRow', function(){
		                    
		                    var ldgamt = $("#ldg_amt").val();
		                  //  var vndamt = $("#vouch_amt1").val();
		                  //  var nxtamt = parseInt(ldgamt - vndamt);
		                    
		                    var count    = parseInt($("#count_row").val());
		                    var gnldgers = '<?php echo json_encode($generalLedger)?>';
		                    var vendors  = '<?php echo json_encode($vendors)?>';
		                    var hotels   = '<?php echo json_encode($partners_hotel)?>';
		                    var parties  = '<?php echo json_encode($clientDetails)?>';
		                    var id       = count+1;
		                    
		                    var totarr = [];
                            $.each($(".nwvchrAmt"), function(){
                                totarr.push($(this).val());
                            });
		                    var total = 0;
		                    for(var i = 0; i < totarr.length; i++) {
    		                    total += totarr[i] << 0;
		                    }
		                    var nxtamt = parseInt(ldgamt - total);
		                    
		                    var new_rows = "<tr>";
		                        new_rows +="<td><select class='form-control select2' name='ldgrAccount[]' id='selLdgrAcc' data-placeholder='Select'>";
		                        new_rows +="<option value=''>Select</option>";
		                        $.each(JSON.parse(gnldgers), function(index, value) {
			                        new_rows += '<option value="GNL'+value.id+'">'+value.ledger_name+'</option>';
                                });
                                $.each(JSON.parse(vendors), function(index, value) {
			                        new_rows += '<option value="VND'+value.vendorId+'">'+value.company_name+'</option>';
                                });
                                $.each(JSON.parse(hotels), function(index, value) {
			                        new_rows += '<option value="HTL'+value.hotel_id+'">'+value.hotel_name+'</option>';
                                });
                                $.each(JSON.parse(parties), function(index, value) {
			                        new_rows += '<option value="CLNT'+value.id+'">'+value.client_name+'</option>';
                                });
		                        new_rows +="</select></td>";
		                        new_rows +="<td><input type='text' class='form-control' name='vchr_no[]' id='' readonly></td>";
		                        new_rows +="<td><input type='date' class='form-control' name='vchr_date[]' id='vouch_date' value='"+selDate+"'></td>";
		                        new_rows +="<td><input type='text' class='form-control' name='vchrTC[]' id=''></td>";
		                        new_rows +="<td><input type='text' class='form-control' name='vchrRF[]' id=''></td>";
		                        new_rows +="<td><input type='date' class='form-control' name='vchrCHQ[]' id=''></td>";
		                        new_rows +="<td><input type='text' class='form-control' name='vchrDbCr[]' id='' value='D'></td>";
		                        new_rows +="<td><input type='text' class='form-control nwvchrAmt' name='vchrAmt[]' id='' onkeyup='' value='"+nxtamt+"' required></td>";
		                        new_rows +="<td><input type='text' class='form-control' name='vchrPart[]' id=''></td>";
		                        new_rows +="<td><button type='button' class='btn btn-sm getnewRow'><i class='fa fa-plus' aria-hidden='true'></i></button><br><button type='button' class='btn btn-sm' style='color: red; cursor:pointer' id='other_remove'><i class='fa fa-minus-circle' aria-hidden='true'></i></button></td>";
		                        new_rows += "</tr>";
                                //alert("Add new Row?");
                           		var confirmtrue = swal({
                                    title: "Do you want new row?",
                                    text: "",
                                    buttons: {  
                                        cancel: {
                                          text: "Cancel",
                                          value: false,
                                          visible: true,
                                          className: "",
                                          closeModal: true,
                                        },
                                        confirm: {
                                          text: "OK",
                                          value: true,
                                          visible: true,
                                          className: "",
                                          closeModal: true
                                        }

                                    },
          
                                }).then((value) => {

                                    if(value){
                                        $("#pymtvchrtbl").append(new_rows);
                                        $("#count_row").val(id); 
                                        $(".select2").select2({
                                           allowClear: true,
                                        });
                                        swal.close();
                                  
                                    }else{
                                  
                                    }
       
                                });
                        });
                        
                        }else{
                            
                        //}
                        $.ajax({
                            type:"POST",
                            url:"<?php echo base_url(PARTNER)?>/getVendorLedgDetailForVoucher",
                            data:{id: arr},
                            beforeSend:function(){
                                $("#custom-loader").css("display","block");
                            },
                            success:function(respData){
                              //console.log(respData);
                                var RespData = $.parseJSON(respData);
                                if(RespData.vendorLegderDetails == [] || RespData.vendorLegderDetails == 0){
                                   $("#LedgerTblData").html('Try Again');
                                }else{
                                    //console.log(respData);
                                    var newLedgerTable ="<div class='table-responsive' style='width:max-content;'><table class='table table-bordered' cellspacing='0' style='background-color:white;'>";
                                       newLedgerTable +="<thead><tr>";
                                       newLedgerTable +="<th style='background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;width:250px;'>Name</th>";
                                       newLedgerTable +="<th style='background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;width:110px;'>Voucher<br>No</th>";
                                       newLedgerTable +="<th style='background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;width:110px;'>Voucher<br>Date</th>";
		                               newLedgerTable +="<th style='background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;width:110px;'>TourCard<br>Number</th>";
		                               newLedgerTable +="<th style='background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;width:110px;'>Refrence<br>Number</th>";
		                               newLedgerTable +="<th style='background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;width:110px;'>Cheque<br>Date</th>";
		                               newLedgerTable +="<th style='background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;width:60px;'>D/C</th>";
		                               newLedgerTable +="<th style='background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;width:150px;'>Amount</th>";
		                               newLedgerTable +="<th style='background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;width:250px;'>Particulars</th>";
		                               newLedgerTable +="<th style='background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;width:60px;'></th>";
		                               newLedgerTable +="</tr></thead><tbody id='pymtvchrtbl'>";
		                               
		                               $.each(RespData.vendorLegderDetails, function(index, value){
		                               newLedgerTable +="<tr><input type='hidden' name='paxname[]' id='' value='"+value.pax_name+"'>";
		                               newLedgerTable +="<td>"+selVendorName+"<input type='hidden' name='vnd_id[]' id='vnd_id' value='"+selValue+"'></td>";
		                               if(value.voucher_type == "AVR"){
		                                   newLedgerTable +="<td>AVR"+value.id+"</td>";
                                       }
                                       if(value.voucher_type == "HVR"){
                                           newLedgerTable +="<td>HVR"+value.id+"</td>";
                                       }
		                               
		                               var vouchDate = value.voucher_date.split("-");
		                               var newVouchdate = vouchDate[2]+"-"+vouchDate[1]+"-"+vouchDate[0];
		                               newLedgerTable +="<td>"+newVouchdate+"<input type='hidden' name='vouch_date[]' id='' value='"+value.voucher_date+"'></td>";
		                               newLedgerTable +="<td>TC"+value.tourcard_no+"<input type='hidden' name='tc_no[]' id='tc_no' value='"+value.tourcard_no+"'></td>";
		                               newLedgerTable +="<td><input type='text' class='form-control' name='ref_no[]' id='ref_no'></td>";
		                               newLedgerTable +="<td><input type='date' class='form-control' name='chq_no[]' id=''></td>";
		                               newLedgerTable +="<td><input type='text' class='form-control' name='drandcr[]' id='' value='D' readonly></td>";
		                               if(value.debit_amount !== ""){
		                                   newLedgerTable +="<td><input type='text' class='form-control nwvchrAmt' name='vouch_amt[]' id='vouch_amt1' value='"+value.debit_amount+"'></td>";    
                                        }else if(value.credit_amount !== ""){
                                           newLedgerTable +="<td><input type='text' class='form-control nwvchrAmt' name='vouch_amt[]' id='vouch_amt1' value='"+value.credit_amount+"'></td>";
                                        }else{
                                       }
		                               
		                               newLedgerTable +="<td><input type='text' class='form-control' name='vouch_prt[]' id='vouch_prt' value='"+value.pax_name+"'></td>";
		                               newLedgerTable +="</tr>";
		                               });
		                               
		                               newLedgerTable +="<tr><input type='hidden' name='selVendor_id' id='' value='"+selValue+"'>";
		                               newLedgerTable +="<td>"+selLedgerName+"<input type='hidden' class='form-control' name='selLedger_name' id='' value='"+selLedgerName+"'></td>";
		                               newLedgerTable +="<td><input type='text' class='form-control' name='' id='' value='' readonly></td>";
		                               newLedgerTable +="<td><input type='date' class='form-control' name='selLedger_date' id='' value=''></td>";
		                               newLedgerTable +="<td><input type='text' class='form-control' name='selLedger_tcno' id='selLedger_tcno' value=''></td>";
		                               newLedgerTable +="<td><input type='text' class='form-control' name='selLedger_refno' id='selLedger_refno' value=''></td>";
		                               newLedgerTable +="<td><input type='date' class='form-control' name='selLedgerchq_date' id='' value=''></td>";
		                               newLedgerTable +="<td><input type='text' class='form-control' name='selLedger_drandcr' id='' value='C' readonly></td>";
		                               newLedgerTable +="<td><input type='text' class='form-control' name='selLedger_amt' id='ldg_amt' value='"+RespData.sumtotalAmt+"'></td>";
		                               newLedgerTable +="<td><input type='text' class='form-control' name='selLedger_prt' id='selLedger_prt' value=''></td>";
		                               newLedgerTable +="<td><button type='button' class='btn btn-sm getnewRow'><i class='fa fa-plus' aria-hidden='true'></i></button><input type='hidden' name='count_row' value='2' id='count_row'></td>";
		                               newLedgerTable +="</tr></tbody>";
		                               newLedgerTable +="</table></div>";
		                              $("#LedgerTblData").css("overflow-x","scroll");
		                              $("#LedgerTblData").html(newLedgerTable);
		                              $("#tbldata").html('');
		                              $("#submitEntry").removeAttr("disabled");
		                              $("#proceedTo").attr("disabled","true");
		                              $(".selectedChk").attr("disabled","true");
		                              
		                              $("#vouch_amt1").on('input', function(){
		                                  var amt1Val = $(this).val();
		                                  $("#ldg_amt").val(amt1Val);
		                                  $("#submitEntry").removeAttr("disabled");
		                              });
		                              $("#ldg_amt").on('input', function(){
		                                 var amt1Val = $(this).val();
		                                 var amt2val = $("#vouch_amt1").val();
		                                 if(amt1Val !== amt2val){
		                                     $("#submitEntry").attr("disabled", true);
		                                 }else{
		                                     $("#submitEntry").removeAttr("disabled");
		                                 }
		                              });
		                             
		                              $("#tc_no").on('input', function(){
		                                 var ledgTc = $(this).val();
		                                 $("#selLedger_tcno").val(ledgTc);
		                              });
		                              $("#ref_no").on('input', function(){
		                                 var ledgrefNo = $(this).val();
		                                 $("#selLedger_refno").val(ledgrefNo);
		                              });
		                              $("#vouch_prt").on('input', function(){
		                                 var ledgprtcular = $(this).val();
		                                 $("#selLedger_prt").val(ledgprtcular);
		                              });
		                              
		                              $(document).on("click", '.getnewRow', function(){
		                    
		                                  var ldgamt = $("#ldg_amt").val();
		                                  //var vndamt = $("#vouch_amt").val();
		                                  //var nxtamt = parseInt(ldgamt - vndamt);
		                    
		                                  var count    = parseInt($("#count_row").val());
		                                  var gnldgers = '<?php echo json_encode($generalLedger)?>';
		                                  var vendors  = '<?php echo json_encode($vendors)?>';
		                                  var hotels   = '<?php echo json_encode($partners_hotel)?>';
		                                  var parties  = '<?php echo json_encode($clientDetails)?>';
		                                  var id       = count+1;
		                                  
		                                  var totarr = [];
                                            $.each($(".nwvchrAmt"), function(){
                                                totarr.push($(this).val());
                                            });
		                                    var total = 0;
		                                    for(var i = 0; i < totarr.length; i++) {
    		                                    total += totarr[i] << 0;
		                                    }
		                                    var nxtamt = parseInt(ldgamt - total);
		                                  
		                                  var new_rows = "<tr>";
		                                  new_rows +="<td><select class='form-control select2' name='ldgrAccount[]' id='selLdgrAcc' data-placeholder='Select' required>";
		                                  new_rows +="<option value=''>Select</option>";
		                                  $.each(JSON.parse(gnldgers), function(index, value) {
			                                  new_rows += '<option value="GNL'+value.id+'">'+value.ledger_name+'</option>';
                                          });
                                          $.each(JSON.parse(vendors), function(index, value) {
			                                  new_rows += '<option value="VND'+value.vendorId+'">'+value.company_name+'</option>';
                                          });
                                          $.each(JSON.parse(hotels), function(index, value) {
			                                  new_rows += '<option value="HTL'+value.hotel_id+'">'+value.hotel_name+'</option>';
                                          });
                                          $.each(JSON.parse(parties), function(index, value) {
			                                  new_rows += '<option value="CLNT'+value.id+'">'+value.client_name+'</option>';
                                          });
		                                  new_rows +="</select></td>";
		                                  new_rows +="<td><input type='text' class='form-control' name='vchr_no[]' id='' readonly></td>";
		                                  new_rows +="<td><input type='date' class='form-control' name='vchr_date[]' id='vouch_date' value='"+selDate+"'></td>";
		                                  new_rows +="<td><input type='text' class='form-control' name='vchrTC[]' id=''></td>";
		                                  new_rows +="<td><input type='text' class='form-control' name='vchrRF[]' id=''></td>";
		                                  new_rows +="<td><input type='date' class='form-control' name='vchrCHQ[]' id=''></td>";
		                                  new_rows +="<td><input type='text' class='form-control' name='vchrDbCr[]' id='' value='D'></td>";
		                                  new_rows +="<td><input type='text' class='form-control nwvchrAmt' name='vchrAmt[]' id='' onkeyup='' value='"+nxtamt+"' required></td>";
		                                  new_rows +="<td><input type='text' class='form-control' name='vchrPart[]' id=''></td>";
		                                  new_rows +="<td><button type='button' class='btn btn-sm getnewRow'><i class='fa fa-plus' aria-hidden='true'></i></button><br><button type='button' class='btn btn-sm' style='color: red; cursor:pointer' id='other_remove'><i class='fa fa-minus-circle' aria-hidden='true'></i></button></td>";
		                                  new_rows += "</tr>";
                                            //alert("Add new Row?");
                           		            var confirmtrue = swal({
                                                title: "Do you want new row?",
                                                text: "",
                                                buttons: {  
                                                    cancel: {
                                                      text: "Cancel",
                                                      value: false,
                                                      visible: true,
                                                      className: "",
                                                      closeModal: true,
                                                    },
                                                    confirm: {
                                                      text: "OK",
                                                      value: true,
                                                      visible: true,
                                                      className: "",
                                                      closeModal: true
                                                    }

                                                },
          
                                            }).then((value) => {

                                            if(value){
                                                $("#pymtvchrtbl").append(new_rows);
                                                $("#count_row").val(id); 
                                                $(".select2").select2({
                                                allowClear: true,
                                                });
                                                swal.close();
                                  
                                            }else{
                                  
                                            }
       
                                        });
                                    });
                                }
                            },
                            complete: function() {
		    	                $("#custom-loader").css("display","none");
		                    }
                        }); 
                        
                        }
                    });
                    
                }
            },
            complete: function() {
		    	$("#custom-loader").css("display","none");
		    }
        });
        
        }
        
        });
        
        }
        
    });

    // $("#submitEntry").click(function(){
    //   var vnd_id = $("#vnd_id").val();
    //   alert(vnd_id);
    // });
    
</script>
<script>
    
    // function newAmt1(){
    //     var count = parseInt($("#count_row").val());
    //     console.log(count);
    //     var fstVchAmt = $("#vchramt"+count).val();
    //     var amt = $("#ldg_amt").val();
    //     var vchamt = $("#vouch_amt").val();
    //     var newAmt = parseInt(amt - vchamt);
    //     var prevAmt = parseInt(newAmt - fstVchAmt);
        
    //     //console.log(amt);
        
    //     for(var a=3;a<=count; a++){
            
    //         var nId = a+1;
    //         var neamt = $("#vchramt"+nId).val(prevAmt);
    //         console.log(neamt);
    //     }
    // }

       
  
</script>