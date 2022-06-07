<?php
$userId = $userInfo->hotel_partner_id;
$name = $userInfo->name;
$email = $userInfo->email;
$mobile = $userInfo->contact_no;
// $roleId = $userInfo->roleId;
//$role = $userInfo->role;
?>

<div id="wrapper">
<div id="layout-static">
<div class="static-content-wrapper">
<div class="static-content">
   <div class="page-content">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-user-circle"></i> My Profile
        <small>View or modify information</small>
      </h1>
    </section>
    
    <div class="container">
    <section class="content">
    
        <div class="row">
            <!-- left column -->
            <div class="col-md-3">
              <!-- general form elements -->


                <div class="box box-warning">
                    <div class="box-body box-profile">
                        <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url(); ?>assets/dist/img/avatar.png" alt="User profile picture">
                        <h3 class="profile-username text-center"><?= $name ?></h3>

                        <!--<p class="text-muted text-center"><? //$role; ?></p>-->

                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Email</b> <a class="pull-right"><?= $email ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Mobile</b> <a class="pull-right"><?= $mobile ?></a>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>

            <div class="col-md-5">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="<?= ($active == "details")? "active" : "" ?>"><a href="#details" data-toggle="tab">Details</a></li>
                        <li class="<?= ($active == "changepass")? "active" : "" ?>"><a href="#changepass" data-toggle="tab">Change Password</a></li>                        
                    </ul>
                    <div class="tab-content">
                        <div class="<?= ($active == "details")? "active" : "" ?> tab-pane" id="details">
                            <form action="<?php echo base_url(HOTEL); ?>/HotelUserProfileUpdate" method="post" id="editProfile" role="form">
                                <?php $this->load->helper('form'); ?>
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-12">                                
                                            <div class="form-group">
                                                <label for="fname">Full Name</label>
                                                <input type="text" class="form-control" id="fname" name="fname" placeholder="<?php echo $name; ?>" value="<?php echo set_value('fname', $name); ?>" maxlength="128" />
                                                <input type="hidden" value="<?php echo $userId; ?>" name="userId" id="userId" />    
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="mobile">Mobile Number</label>
                                                <input type="text" class="form-control" id="mobile" name="mobile" placeholder="<?php echo $mobile; ?>" value="<?php echo set_value('mobile', $mobile); ?>" maxlength="10">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="email" class="form-control" id="email" name="email" placeholder="<?php echo $email; ?>" value="<?php //echo set_value('email', $email); ?>">
                                                <input type="hidden" id="oldEmail" name="oldEmail" value="<?php echo $email; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- /.box-body -->
                                <div class="box-footer">
                                    <input type="submit" class="btn btn-primary" value="Submit" />
                                    <input type="reset" class="btn btn-default" value="Reset" />
                                </div>
                            </form>
                        </div>
                        <div class="<?= ($active == "changepass")? "active" : "" ?> tab-pane" id="changepass">
                            <form role="form" action="<?php echo base_url(HOTEL) ?>/changeHotelUserPassword" method="post" id="changePasswordform">
                                <input type="hidden" value="<?php echo $userId; ?>" name="userId" id="" />
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputPassword1">Old Password</label>
                                                <input type="password" class="form-control" id="inputOldPassword" placeholder="Old password" name="oldPassword" maxlength="20" required>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputPassword1">New Password</label>
                                                <input type="password" class="form-control" id="inputPassword1" placeholder="New password" name="newPassword" maxlength="20" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputPassword2">Confirm New Password</label>
                                                <input type="password" class="form-control" id="inputPassword2" placeholder="Confirm new password" name="cNewPassword" maxlength="20" required>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- /.box-body -->
            
                                <div class="box-footer">
                                    <input type="submit" class="btn btn-primary" value="Submit" />
                                    <input type="reset" class="btn btn-default" value="Reset" />
                                </div>
                            </form>
                        </div>                        
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <?php
                    $this->load->helper('form');
                    $error = $this->session->flashdata('error');
                    if($error)
                    {
                ?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('error'); ?>                    
                </div>
                <?php } ?>
                <?php  
                    $success = $this->session->flashdata('success');
                    if($success)
                    {
                ?>
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
                <?php } ?>

                <?php  
                    $noMatch = $this->session->flashdata('nomatch');
                    if($noMatch)
                    {
                ?>
                <div class="alert alert-warning alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('nomatch'); ?>
                </div>
                <?php } ?>
                
                <div class="row">
                    <div class="col-md-12">
                        <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
                    </div>
                </div>
            </div>
        </div>    
    </section>
     </div>
  </div>
</div>


<!--<script src="<?php //echo base_url(); ?>assets/js/editUser.js" type="text/javascript"></script>-->
<script src="<?php echo base_url(); ?>asset/plugins/jQuery/jQuery-2.1.4.min.js"></script>
<script>
// $(window).scroll(function() {
//   var $el = $('#mybtn');
  
//   if($(this).scrollTop() >= 300) $el.addClass('shown');
//   else $el.removeClass('shown');
// });
    $(document).ready(function(){
	
	var editUserForm = $("#editProfile");
 	var base_URL = "<?php echo base_url(HOTEL)?>";
 	var Email = $('#email').val();
 	var oldEmail = $("#oldEmail").val();
	
	var validator = editUserForm.validate({
		
		rules:{
			fname :{ required : true },
			email : { email : true, remote : { url : base_URL + "/checkEmailExists", type :"post", data : { userId : function(){ return $("#userId").val(); } } } },
			
			mobile : { required : true, digits : true },
		},
		messages:{
			fname :{ required : "This field is required" },
 			email : { email : "Please enter valid email address", remote : "Email already taken" },
			
			mobile : { required : "This field is required", digits : "Please enter numbers only" },
		}
	});
	
// 	if(Email == ''){
// 	    $('#email').val(oldEmail);
// 	}

// 	$("#email").on("keyup", function(){
	   
// 	   var base_URL = "<?php //echo base_url(HOTEL)?>";
// 	   var Email = $('#email').val();
// 	   var hotelUser_id = $("#userId").val();
	   
// 	   $.ajax({
// 	       type:"POST",
// 	       url: base_URL + "/checkEmailExists",
// 	       data:{userId: hotelUser_id, email: Email},
// 	       success:function(html){
// 	           console.log(html);
// 	       }
// 	   });
	   
	   //if(Email == ''){
	   //    //alert("email is required");
	   //}else{
	   //    var validation = Email.validate({
	   //      rules:{
	   //          email : { required : true, email : true, remote : { url : base_URL + "/checkEmailExists", type :"post", data : { userId : function(){ return $("#userId").val(); } } } },
	   //      },
	   //      messages:{
	   //          email : { required : "This field is required", email : "Please enter valid email address", remote : "Email already taken" },
	   //      }
	   //   });    
	   //}
	   
	//});

	var editProfilePassForm = $("#changePasswordform");
	
	var validator = editProfilePassForm.validate({
		
		rules:{
				cpassword : {equalTo: "#password"},
		},
		messages:{
			    cpassword : {equalTo: "Please enter same password" },
		}
	});

});
</script>