<div class="col-md-11" id="contentCol">
<div id="wrapper">
<div id="layout-static">
<div class="static-content-wrapper">
<div class="static-content">
<div class="page-content" style="margin-top:;">
<ol class="breadcrumb">
   <li><a href="<?php echo base_url(PARTNER) ?>/dashboard">Home</a></li>
   <li><a href="#">Add Client</a></li>
</ol>
<div class="page-heading">
   <h1>Add Client</h1>
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
    <h2>Client Forms</h2>
  </div>
  <div class="panel-body">
    <div class="row">
        <form class="" action="<?php echo base_url(PARTNER) ?>/addNewClient" method="POST">
        <div class="col-md-12">
            <legend>Personal Details</legend>
            <div class="col-md-2">
                <label>Title</label><br>
                <label><input type="radio" name="employee-title[]" value="Mr."> Mr.</label> &nbsp;
                <label><input type="radio" name="employee-title[]" value="Mrs."> Mrs.</label> &nbsp;
                <label><input type="radio" name="employee-title[]" value="Ms."> Ms.</label>
            </div>
            <div class="col-md-10">
                <label>Full Name</label>
                <input type="text" class="form-control" name="name" required="true">
            </div>
        </div>
        <div class="col-md-12">
            <div class="col-md-6">
                <label>Mobile No. <span id="mobileNolbl" style="color:red;"></span></label>
                <input type="text" class="form-control" name="mobile_no" id="mobile_no" required="true">
            </div>
            <div class="col-md-6" id="div1tohide" style="display:none;">
                <label>Alternative No (if Any)</label>
                <input type="text" class="form-control" name="alertnative_no">
            </div>
            <div class="col-md-6" id="chkbtnDiv">
                <button type="button" class="btn btn-primary" value="Check Client" id="" onclick="checkClntexist()" style="margin-top: 20px;">Check Client</button><span id="clntresp" style="text-align:center; font-size:16px; color:red; margin-left:10px;"></span>
            </div>
        </div>
        <div class="col-md-12" id="div2tohide" style="display:none;">
            <div class="col-md-6">
                <label>Primary Email</label>
                <input type="email" class="form-control" name="primary_email">

            </div>
            <div class="col-md-6">
                <label>Secondary Email (if Any)</label>
                <input type="email" class="form-control" name="secondary_email">
            </div>
        </div>
        <div class="col-md-12" id="div3tohide" style="display:none;">
            <div class="col-md-6">
                <label>Date of anniversary</label>
                <input type="date"class="form-control" name="doa">
            </div>
            <div class="col-md-6">
                <label>Date of birth</label>
            <!--<input type="text" name="dob" id="datepicker">-->
                <input type="date" class="form-control" name="dob" id="">
            </div>
        </div>
        <div class="col-md-12" id="div4tohide" style="display:none;">
            <legend>Permanent Address</legend>
            <div class="col-md-6">
                <label>Address Line 1</label>
                <input type="text" class="form-control" name="address_line_1">
            </div>
            <div class="col-md-6">
                <label>Address Line 2</label>
                <input type="text" class="form-control" name="address_line_2">
            </div>
        </div>
        <div class="col-md-12" id="div5tohide" style="display:none;">
            <div class="col-md-6">
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
            <div class="col-md-6">
                <label>State</label>
                <select id="state_id" class="form-control" name="state_id"  required="true">
                    <option value="">Select State</option>
                </select>
            </div>
        </div>
        <div class="col-md-12" id="div6tohide" style="display:none;">
            <div class="col-md-6">
                <label>city</label>
                <select id="city_id" class="form-control" name="city_id"  required="true">
                 <option value="">Select City</option>
                </select>
            </div>
            <div class="col-md-6">
                <label>Pincode</label>
                <input type="text" class="form-control" name="zip" required="true">
            </div>
        </div>
        <div class="col-md-12" id="div7tohide" style="display:none;">
            <legend>Banking Details</legend>
            <div class="col-md-6">
                <label>Pan no.</label>
                <input type="text" class="form-control" name="pan_no">                
            </div>
            <div class="col-md-6">
                <label>Gstin.</label>
                <input type="text" class="form-control" name="companygstin">
            </div>
        </div>
        <div class="col-md-12" id="div8tohide" style="display:none;">
            <div class="col-md-6">
                <label>Account No.</label>
                <input type="text" class="form-control" name="account_no">
            </div>
            <div class="col-md-6">
                <label>Account holder Name</label>
                <input type="text" class="form-control" name="holder_name">
            </div>
        </div>
        <div class="col-md-12" id="div9tohide" style="display:none;">
            <div class="col-md-6">
                <label>Bank Name</label>
                <input type="text" class="form-control" name="bank_name">
            </div>
            <div class="col-md-6">
                <label>Branch</label>
                <input type="text" class="form-control" name="branch">
            </div>
        </div>
        <div class="col-md-12" id="div10tohide" style="display:none;">
            <label>IFSC</label>
            <input type="text" class="form-control" name="ifsc">   
        </div>
        <div class="col-md-12" id="div11tohide" style="display:none;">
            <legend>Other Details</legend>
            <div class="col-md-6">
                <label>Organization</label>
                <input type="text" class="form-control" name="organization">
            </div>
            <div class="col-md-6">
                <label>Job Title</label>
                <input type="text" class="form-control" name="job_title">
            </div>
        </div>
        <div class="col-md-12" id="div12tohide" style="display:none;">
            <div class="col-md-6">
                <label>Company Email</label>
                <input type="email" class="form-control" name="company_email">
            </div>
            <div class="col-md-6">
                <label>Address</label>
                <input type="text" class="form-control" name="companyaddress">
            </div>
        </div>
        <div class="col-md-12" id="div13tohide" style="display:none;">
            <div class="col-md-6">
                <label>Contact No</label>
                <input type="number" class="form-control" name="contact_no">
            </div>
            <div class="col-md-6">
                <label>Country</label>
                <select id="com_country_id" class="form-control" name="com_country_id">
                    <option value="">Select Country</option>
                <?php if(!empty($countries)){
                    foreach ($countries as $country) { ?>
                    <option value="<?php echo $country->id?>"><?php echo $country->country_name; ?></option>
                <?php }
                  } ?>
                </select>
            </div>
        </div>
        <div class="col-md-12" id="div14tohide" style="display:none;">
            <div class="col-md-6">
                <label>State</label>
                <select id="com_state_id" class="form-control" name="com_state_id">
                    <option value="">Select State</option>
                </select>
            </div>
            <div class="col-md-6">
                <label>city</label>
                <select id="com_city_id" class="form-control" name="com_city_id">
                   <option value="">Select City</option>
                </select>
            </div>
        </div>
        <div class="col-md-12" id="div15tohide" style="display:none;">
            <label>Pincode</label>
            <input type="text" class="form-control" name="com_zip">  
        </div>
        <div class="col-md-12" id="div16tohide" style="display:none;">
            <div class="clearfix pt20">
               <div class="pull-right">
                  <button class="btn-primary btn">Submit Form</button>
               </div>
            </div>
        </div>
        </form>
    </div>
    
    
  </div>
</div>
</div> <!-- .container-fluid -->
<!-- #page-content -->
</div>
<?php
    if ($this->uri->segment(2) == 'addClient') { ?>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/demo/pagejs/partner/addEmployee.js"></script>
<?php
    }
?>
<script>
    
    $(document).ready(function () {
    $('#datepicker').datepicker({
        format: "dd/mm/yyyy",
        autoclose: true
    });
    });
    
    $(document).on('keypress', '#mobile_no', function(e){
	    
        //if the letter is not digit then display error and don't type anything
        if(e.which != 8 && e.which !== 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        //$("#errmsg").html("Digits Only").show().fadeOut("slow");
         return false;
        }
        
	});
    
    function checkClntexist(){
        
        $("#clntresp").text('');
        var baseurl = $('#baseurl').val();
        var clntMobile = $("#mobile_no").val();
        if(clntMobile == ''){
            
            $("#mobileNolbl").text("Please Enter Mobile Number");
            $("#mobile_no").on('keypress keydown keyup change', function(e){
                
                // if(e.which != 8 && e.which !== 0 && (e.which < 48 || e.which > 57)) {
                //   return false;
                // }
                if($(this).val == ""){
                    $("#mobileNolbl").text("Please Enter Mobile Number");
                }else{
                    $("#mobileNolbl").text("*");    
                }
            });
       
        }else{
            $("#mobileNolbl").text("");
            
            $.ajax({
                type:'POST',
                url: baseurl+'/checkClientExist',
                data:{clntMobile: clntMobile},
                beforeSend:function(){
                $("#custom-loader").css("display","block");
                },
                success:function(html){
                    
                    if(html == 1){
                        $("#clntresp").text("Client Is Already Exist");
                        $("#chkbtnDiv").css("display","block");
                        $("#div1tohide").css("display","none");
                        $("#div2tohide").css("display","none");
                        $("#div3tohide").css("display","none");
                        $("#div4tohide").css("display","none");
                        $("#div5tohide").css("display","none");
                        $("#div6tohide").css("display","none");
                        $("#div7tohide").css("display","none");
                        $("#div8tohide").css("display","none");
                        $("#div9tohide").css("display","none");
                        $("#div10tohide").css("display","none");
                        $("#div11tohide").css("display","none");
                        $("#div12tohide").css("display","none");
                        $("#div13tohide").css("display","none");
                        $("#div14tohide").css("display","none");
                        $("#div15tohide").css("display","none");
                        $("#div16tohide").css("display","none");
                    }else{
                        $("#mobile_no").attr("readonly","true");
                        $("#chkbtnDiv").css("display","none");
                        $("#div1tohide").css("display","block");
                        $("#div2tohide").css("display","block");
                        $("#div3tohide").css("display","block");
                        $("#div4tohide").css("display","block");
                        $("#div5tohide").css("display","block");
                        $("#div6tohide").css("display","block");
                        $("#div7tohide").css("display","block");
                        $("#div8tohide").css("display","block");
                        $("#div9tohide").css("display","block");
                        $("#div10tohide").css("display","block");
                        $("#div11tohide").css("display","block");
                        $("#div12tohide").css("display","block");
                        $("#div13tohide").css("display","block");
                        $("#div14tohide").css("display","block");
                        $("#div15tohide").css("display","block");
                        $("#div16tohide").css("display","block");
                        
                    }
                },
                complete:function() {
			    $("#custom-loader").css("display","none");
		        }
            });
        }
    }
</script>

