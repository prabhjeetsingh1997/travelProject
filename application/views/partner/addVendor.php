<div class="col-md-11" id="contentCol">
<div id="wrapper">
<div id="layout-static">
<div class="static-content-wrapper">
<div class="static-content">
<div class="page-content" style="margin-top:;">
<ol class="breadcrumb">
   <li><a href="<?php echo base_url(PARTNER) ?>/dashboard">Home</a></li>
   <li><a href="#">Add Vendor</a></li>
</ol>
<div class="page-heading">
   <h1>Add Vendor</h1>
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
    <h2>Vendor Forms</h2>
  </div>
  <div class="panel-body">
    <div class="row">
        <form class="" action="<?php echo base_url(PARTNER) ?>/addNewVendor" method="POST">
    <fieldset>
        <div class="col-md-12">
            <legend>Company Details</legend>
            <label>Company Name <span id="vendorLabel" style="color: red;">*</span></label>
            <input type="text" class="form-control" id="vendorName" name="company_name" required="true">
        </div>
        <div class="col-md-12">
            <button type="button" class="btn" id="" onclick="checkVendorexist()" style="background-color:#00bcd4; border-color:#00bcd4; color:white; margin-top:10px;">Check Availability</button>
        </div>
        <div class="col-md-12" id="vendorexistmessage" style="display:none;">
            <div class="alert alert-info alert-dismissable">
                <h5>Following are the similar Vendors existed in database.</h5>
                <div id="vendorData"></div>
                <h5>Still want to enter your data?</h5>
                <button type='button' id='proceed' onclick='proceed()' class='btn btn-sm btn-success'>Proceed</button>&nbsp;<button type='button' id='discard' onclick='discard()' class='btn btn-sm btn-warning'>Discard</button>
            </div>            
        </div>
        <div class="col-md-12" id="div1Tohide" style="display:none;">
            <div class="col-md-6">
                <label>Address Line 1</label>
                <input type="text" class="form-control" name="address_line_1">
            </div>
            <div class="col-md-6">
                <label>Address Line 2</label>
                <input type="text" class="form-control" name="address_line_2">
            </div>
        </div>
        <div class="col-md-12" id="div2Tohide" style="display:none;">
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
                <select id="state_id" class="form-control" name="state_id" required="true">
                 <option value="">Select State</option>
                </select>
            </div>
        </div>
        <div class="col-md-12" id="div3Tohide" style="display:none;">
            <div class="col-md-6">
                <label>city</label>
                <select id="city_id" class="form-control" name="city_id" required="true">
                 <option value="">Select City</option>
                </select>
            </div>
            <div class="col-md-6">
                <label>Pincode</label>
                <input type="text" class="form-control" name="zip" required="true">
            </div>
        </div>
        
        <div class="col-md-12" id="div4Tohide" style="display:none;">
            <legend>Concerned Person Details</legend>
            <div class="col-md-2">
                <label>Title</label><br>
                <label><input type="radio" name="employee-title[]" value="Mr."> Mr.</label> &nbsp;
                <label><input type="radio" name="employee-title[]" value="Mrs."> Mrs.</label> &nbsp;
                <label><input type="radio" name="employee-title[]" value="Ms."> Ms.</label>
            </div>
            <div class="col-md-10">
                <label>Full Name</label>
                <input type="text" class="form-control" name="concern_person_name" required="true">
            </div>
            
        </div>
        <div class="col-md-12" id="div5Tohide" style="display:none;">
            <div class="col-md-6">
                <label>Mobile No.</label>
                <input type="text" class="form-control" name="concern_contact_no" required="true">
            </div>
            <div class="col-md-6">
                <label>Alternative No (if Any)</label>
                <input type="text" class="form-control" name="secondry_no">
            </div>
        </div>
        <div class="col-md-12" id="div6Tohide" style="display:none;">
            <div class="col-md-6">
                <label>Primary Email</label>
                <input type="email" class="form-control" name="email" required="true">

            </div>
            <div class="col-md-6">
                <label>Secondary Email (if Any)</label>
                <input type="email" class="form-control" name="alternative_email">
            </div>
        </div>
        
        <div class="col-md-12" id="div7Tohide" style="display:none;">
            <legend>Banking Details</legend>
            <div class="col-md-6">
                <label>Pan no.</label>
               <input type="text" class="form-control" name="pan_no">

            </div>
            <div class="col-md-6">
                <label>Account No.</label>
               <input type="text" class="form-control" name="account_no">
            </div>
        </div>
        <div class="col-md-12" id="div8Tohide" style="display:none;">
            <div class="col-md-6">
                <label>Account holder Name</label>
                <input type="text" class="form-control" name="account_holder_name">
            </div>
            <div class="col-md-6">
                <label>Bank Name</label>
               <input type="text" class="form-control" name="bank_name">
            </div>
        </div>
        <div class="col-md-12" id="div9Tohide" style="display:none;">
            <div class="col-md-6">
                <label>Branch</label>
               <input type="text" class="form-control" name="branch">
            </div>
            <div class="col-md-6">
                <label>IFSC</label>
               <input type="text" class="form-control" name="ifsc">
            </div>
        </div>
        <div class="col-md-12">
           <div class="clearfix pt20">
           <div class="pull-right" id="subBttn" style="display:none;">
           <button class="btn-primary btn">Submit Form</button>
           </div>
           </div>    
        </div>
        </fieldset>
        </form>
    </div>
  </div>
</div>
</div> <!-- .container-fluid -->
<!-- #page-content -->
</div>
<?php
    if($this->uri->segment(2) == 'addVendor') { ?>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/demo/pagejs/partner/addVendor.js"></script>
<?php
    }
?>
<script>
    function checkVendorexist(){
         $("#vendorData").html('');
        var baseurl = $('#baseurl').val();
        var vendorName = $("#vendorName").val();
        if(vendorName == ''){
       
        $("#vendorLabel").text("Please Enter Company Name");
        $("#vendorName").on('keypress keydown keyup change', function(){
            if($(this).val == ""){
                $("#vendorLabel").text("Please Enter Company Name");
            }else{
                $("#vendorLabel").text("*");    
            }
        });
       
       }else{
           $("#vendorLabel").text("");
           
           $.ajax({
              type:"POST",
              url: baseurl+'/checkinputVendorExist',
              data:{vendorName: vendorName},
              beforeSend:function(){
                $("#custom-loader").css("display","block");
              },
              success:function(data){
                  var vendordata = jQuery.parseJSON(data);
                  if(vendordata.vendorDetail == '[]' || vendordata.vendorDetail == 0){
                    $("#vendorexistmessage").html("<p style='color:green; font-size:14px;'>Vendor is availiable to add.</p>");
                    $("#vendorName").attr("readonly", "true");
                    
                    $("#div1Tohide").css("display","block");
                    $("#div2Tohide").css("display","block");
                    $("#div3Tohide").css("display","block");
                    $("#div4Tohide").css("display","block");
                    $("#div5Tohide").css("display","block");
                    $("#div6Tohide").css("display","block");
                    $("#div7Tohide").css("display","block");
                    $("#div8Tohide").css("display","block");
                    $("#div9Tohide").css("display","block");
                    $("#subBttn").css("display","block");
                   
                }else{
                    $("#vendorexistmessage").css("display","block");
                    var resdata = jQuery.parseJSON(data);
                    $.each(resdata.vendorDetail, function(key,val){
                        
                        $.each(resdata.cities, function(ind,indval){
                            
                            $.each(resdata.states, function(arrInd,arrVal){
                                
                                $.each(resdata.countries, function(index,value){
                                
                                    //if(val.city_id == indval.id){
                                        if(val.state_id == arrVal.id){
                                            if(val.country_id == value.id){
                                               $("#vendorData").append("<p>"+val.company_name+', '+val.address_line_1+', '+val.address_line_2+', '+indval.city_name+', '+arrVal.state_name+', '+value.country_name+', '+val.zip+"<br></p>");
                                            }
                                        }  
                                    //}
                            
                                });
                                
                            });
                            
                        });
                        
                    });
                    // $.each(JSON.parse(html), function(key,val){
                    //     //console.log(val);
                    //     $("#vendorexistmessage").append("<div class='alert alert-danger alert-dismissable'>"+val.company_name+', '+val.address_line_1+', '+val.address_line_2+"<br><br><h5>Vendor Is Already Existed! If You Still Want To Add</h5><button type='button' id='discard' onclick='discard()' class='btn btn-sm btn-warning'>Discard</button>&nbsp;<button type='button' id='proceed' onclick='proceed()' class='btn btn-sm btn-success'>Proceed</button></div>");
                    // });
                     
                    $("#div1Tohide").css("display","none");
                    $("#div2Tohide").css("display","none");
                    $("#div3Tohide").css("display","none");
                    $("#div4Tohide").css("display","none");
                    $("#div5Tohide").css("display","none");
                    $("#div6Tohide").css("display","none");
                    $("#div7Tohide").css("display","none");
                    $("#div8Tohide").css("display","none");
                    $("#div9Tohide").css("display","none");
                    $("#subBttn").css("display","none");
                    
                }
                  
              },
              complete:function() {
			    $("#custom-loader").css("display","none");
		      }
		      
           });
       }
        
    }
    
    $(document).on("click", "#discard", function(event){
      //alert('Hello World');
      location.reload();
    });
       
    $(document).on("click", "#proceed", function(event){
        $("#vendorexistmessage").html('');
        $("#div1Tohide").css("display","block");
        $("#div2Tohide").css("display","block");
        $("#div3Tohide").css("display","block");
        $("#div4Tohide").css("display","block");
        $("#div5Tohide").css("display","block");
        $("#div6Tohide").css("display","block");
        $("#div7Tohide").css("display","block");
        $("#div8Tohide").css("display","block");
        $("#div9Tohide").css("display","block");
        $("#subBttn").css("display","block");
    });
</script>