<!-- Footer Section -->
<footer id="contact-section" class="sectionP60 dark-bg">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="company-desc logoo">
                    <a href="#home-section"><img class="img-responsive" src="<?php echo base_url(); ?>hotelhomepage/images/logo.png"/></a>
					<span class="light2 oR" style="font-size:17px; color:#FFF;">
					    <a href="<?php echo base_url()?>hotelPartner">Home</a>&nbsp;&nbsp;&nbsp;&nbsp;
					    <!--<a href="#">Company</a>&nbsp;&nbsp;&nbsp;&nbsp;-->
					    <a href="<?php echo base_url()?>contactUs">Contact Us</a>&nbsp;&nbsp;&nbsp;&nbsp;
					    <!--<a href="#">lidtravel.com</a>&nbsp;&nbsp;&nbsp;&nbsp;-->
					    <a href="#">24x7 Customer Support</a>&nbsp;&nbsp;&nbsp;&nbsp;
					    <a href="https://www.travwhizz.com/partnerLogin">Partner Login</a>
					</span>
				</div>
			</div>
		</div>
	</div>
	<!--</div>-->
</footer>
<!-- Footer Section -->
<!-- Copyright Section -->
<section class="sectionP20" style="background: #0b101d;">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="col-md-12">
					<p class="light oR m0" style="color:#FFF;">Copyright © 2021. Travwhizz.com All rights reserved.</p>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Copyright Section -->
<!-- Scroll Back Top Button -->
<button onclick="topFunction()" id="myBtn" class="btn btn-gradient"><i class="visible-xs fa fa-arrow-up"></i>
	<tag class="hidden-xs">Back To Top</tag>
</button>
<!-- Scroll Back Top Button -->
<!-- Register Popup -->
	<div id="pop-register" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" data-aos="zoom-in-up" data-aos-duration="800">&times;</button>
					<h3 class="modal-title  blue oR m0">REGISTER</h3>
					<span class="light oR" style="font-size: 14px">Enter your informations to register.</span><br>
					<span id="respText"></span>
				</div>
				<form id="hotel_register" name="hotel_register" action="" class="form-horizontal" method="POST">
					<div class="modal-body">
					    
					    <div class="row">
					        <div class="col-md-12">
					            <div class="input-box">
							        <input placeholder="Hotel Name / Company Name" type="text" name="hotel_name" id="hotel_name" autocomplete="off" data-validation="required" data-validation-error-msg="Name cannot be blank." required>
                                    <span style="position: absolute"><i class="fa fa-user"></i></span>
						        </div>
					        </div>
					        <div class="col-md-12">
					            <span id="hotelErr" style="color:red;"></span>
					        </div>
					        <div class="col-md-12">
					            <div class="input-box">
							        <input data-required="true" id="name" name="name" type="text" placeholder="Full Name" autocomplete="off" required/>
                                    <span style="position: absolute"><i class="fa fa-user"></i></span>
						        </div>
					        </div>
					        <div class="col-md-12">
					            <span id="nameErr" style="color:red;"></span>
					        </div>
					        <div class="col-md-12">
					            <div class="input-box">
                                    <input data-required="true" name="contact_no" id="contact_no" type="text" min="10" placeholder="Contact No." autocomplete="off" required/>
                                    <span style="position: absolute"><i class="fa fa-phone-square"></i></span>
                                </div>
					        </div>
					        <div class="col-md-12">
					            <span id="cntErr" style="color:red;"></span>
					        </div>
					        <div class="col-md-12">
					            <div class="input-box">
                                    <input data-required="true" id="email" name="email" type="email" placeholder="Email ID" required/>
                                    <span style="position: absolute"><i class="fa fa-envelope"></i></span>
						        </div>
					        </div>
					        <div class="col-md-12">
					            <span id="emailErr" style="color:red;"></span>
					        </div>
					        <div class="col-md-12">
					            <div class="input-box">
                                    <input data-required="true" id="password" name="password" autocomplete="off" type="password" placeholder="Password" required/>
                                    <span style="position: absolute"><i class="fa fa-key"></i></span>
						        </div>
					        </div>
					        <div class="col-md-12">
					            <span id="passErr" style="color:red;"></span>
					        </div>
					        <div class="col-md-12">
					            <div class="input-box">
							        <input data-required="true" placeholder="Confirm your password" type="password" autocomplete="off" id="confpassword" required/>
                                    <span style="position: absolute"><i class="fa fa-key"></i></span>
						        </div>
					        </div>
					        <div class="col-md-12">
					            <span id="ConfpassErr" style="color:red;"></span>
					        </div>
					    </div>
						
					</div>
					<div class="modal-footer">
					    <!--<div class="col-md-12">-->
					      <span class="custom-loader" id="custom-loader" style="display: none;"><img src="<?php echo base_url();?>assets/images/loader.gif" width='10%' height='10%'></span> 
						  <button type="button" id="sub_btn" class="btn btn-gradient W100">Register Now</button>    
					    <!--</div>-->
					    
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Register Popup -->
<!--Forgot Password Popup-->
<div id="popUp-forgotpass" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" data-aos="zoom-in-up" data-aos-duration="800">&times;</button>
				<h3 class="modal-title  blue oR m0">Forgot Password</h3>
				<span class="light oR" style="font-size: 14px">Enter your login email to get reset link.</span>
			</div>
			<form action="#">
				<div class="modal-body">
				    <div classs="row">
                        <div class="col-md-12" id="resStatus"></div>
                    </div>
					<div class="input-box">
						<input placeholder="Email Address" type="email" name="login_email" id="login_email" required>
                        <span style="position: absolute"><i class="fa fa-envelope-o"></i></span>
					</div>
				</div>
				<div class="modal-footer">
				    <span class="custom-loader" id="custom-loader" style="display: none;"><img src="<?php echo base_url();?>assets/images/loader.gif" width='10%' height='10%'></span> 
					<button type="button" class="btn btn-gradient" id="sendMail">Send Link</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!--Forgot Password Popup-->
<!-- All Javascripts -->
<!-- Jquery -->
<script type="text/javascript" src="<?php echo base_url(); ?>hotelhomepage/js/jquery.min.js"></script>
<!-- Bootstrap -->
<script type="text/javascript" src="<?php echo base_url(); ?>hotelhomepage/js/bootstrap.js"></script>
<!-- Nice Scroll -->
<script type="text/javascript" src="<?php echo base_url(); ?>hotelhomepage/plugins/niceScroll/niceScroll.min.js"></script>
<!-- Number Counter -->
<script type="text/javascript" src="<?php echo base_url(); ?>hotelhomepage/plugins/numScroll/numscroller-1.0.js"></script>
<!-- Scroll Animations aos-master js -->
<script type="text/javascript" src="<?php echo base_url(); ?>hotelhomepage/plugins/aos-master/aos.js"></script>
<!-- Common -->
<script type="text/javascript" src="<?php echo base_url(); ?>hotelhomepage/js/common.js"></script>
<!-- All Javascripts -->
<script src="<?php echo base_url(); ?>jquery-validation/dist/jquery.validate.min.js"></script>
</body>

</html>
<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/customjs.js"></script>
<script>
$(document).ready(function(){
                   
    $("#sendMail").click(function(){
        var email = $("#login_email").val();
        if(email == ''){
            $("#emailerr").text("please enter email to proceed");
        }else{
        $.ajax({
            type:"POST",
            url: "<?php echo base_url()?>resetPasswordHotelUser",
            data: {email: email},
            beforeSend:function(){
            $("#custom-loader").css("display","block");
            },
            success:function(html){
            $("#custom-loader").css("display","none");
            $("#resStatus").html(html);
            //   console.log(html);                   
            }
        });
        }
                       
    }); 
    
    
    $("#sub_btn").click(function(){
        var email = $("#email").val();
        var hotel_name = $("#hotel_name").val();
        var name = $("#name").val();
        var contact_no = $("#contact_no").val();
        var password = $("#password").val();
        var confpassword = $("#confpassword").val();
        if(hotel_name == ""){
            //var hotelErr = "";
            $("#hotelErr").text("Please Enter Hotel or company Name.");
            $("#hotel_name").on('keypress keydown keyup change', function(){
             if($(this).val == ""){
                 $("#hotelErr").text("Please Enter Hotel or company Name.");
             }else{
               $("#hotelErr").text("");    
             }
            });
        }
        else if(name == ""){
            //alert("Enter Your Name");
            $("#nameErr").text("Please Enter Your Name.");
           $("#name").on('keypress keydown keyup change', function(){
             if($(this).val == ""){
                 $("#nameErr").text("Please Enter Your Name.");
             }else{
               $("#nameErr").text("");    
             }
            });
        }
        else if(contact_no == ""){
            //alert("Enter Contact Number");
            $("#cntErr").text("Please Enter Conatct Number.");
            $("#contact_no").on('keypress keydown keyup change', function(){
             if($(this).val == ""){
                 $("#cntErr").text("Please Enter Conatct Number.");
             }else{
               $("#cntErr").text("");    
             }
            });
        }
        else if(email == ""){
            //alert("Enter Your email");
            $("#emailErr").text("Please Enter Email.");
            $("#email").on('keypress keydown keyup change', function(){
             if($(this).val == ""){
                 $("#emailErr").text("Please Enter Email.");
             }else{
               $("#emailErr").text("");    
             }
            });
        }
        else if(password == ""){
            //alert("Enter Password");
            $('#passErr').text("Please Enter Password.");
            $("#password").on('keypress keydown keyup change', function(){
             if($(this).val == ""){
                 $('#passErr').text("Please Enter Password.");
             }else{
               $("#passErr").text("");    
             }
            });
        }
        else if(confpassword == ""){
            //alert("Confirm Your Password");
            $("#ConfpassErr").text("Please Confirm Your Password.");
            $("#confpassword").on('keypress keydown keyup change', function(){
             if($(this).val == ""){
                 $("#ConfpassErr").text("Please Confirm Your Password.");
             }else{
               $("#ConfpassErr").text("");    
             }
            });
        }
        else if(confpassword !== password){
            $("#ConfpassErr").text("Your Passsword is not Matching.");
        }else{
            $.ajax({
               type:"POST",
               url:"<?php echo base_url()?>becomeHotelPartner",
               data: {email: email, hotel_name: hotel_name, name: name, contact_no: contact_no, password: password},
               beforeSend:function(){
                   $("#custom-loader").css("display","block");
                   //$("#respText").text("");
               },
               success:function(html){
                   $("#custom-loader").css("display","none");
                   $("#respText").text(html);
                   $("#hotel_register").trigger("reset"); //reset form
                   
               }
            });
        }
        
    });
});
</script>