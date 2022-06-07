<!DOCTYPE html>
<html>
   <html xmlns="http://www.w3.org/1999/xhtml">
      <meta http-equiv="content-type" content="text/html;charset=utf-8" />
      <!-- /Added by HTTrack -->
      <head>
		 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		 <!--responsive meta tag-->
		 <meta http-equiv="X-UA-Compatible" content="IE=edge">
		 <meta name="viewport" content="width=device-width, initial-scale=1">
		 <meta name="description" content=" LiD Travel is a free hotel inventory management engine that allows hotel partners to register hotels, add hotels, promote room availability, change rates, and add pictures throughout Ibibo platform i.e. lidtravel, Redbus, Seatseller and TBO" />
		 <meta name="keywords" content="Hotel, Hotels, Hotel Inventory, Hotel free sign up, Add hotel, LiD Travel hotel inventory management engine, Hotels partner network, Hotel Extranet, Ibibo hotel registration, hotel network, hotel signup, hotel sign in, hotel chain inventory upload" />
		 <!--responsive meta tag--> 
		 <link rel="icon" href="<?php echo base_url(); ?>asset/images/icon.png"/>
		 <title>Free Hotel Registration, Add Your Hotel, LiD Hotel Network Signup</title>
		 <link href='https://fonts.googleapis.com/css?family=RobotoDraft:300,400,400italic,500,700' rel='stylesheet' type='text/css'>
         <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,400italic,600,700' rel='stylesheet' type='text/css'>
         <!-- Bootstrap 3.3.5 -->
         <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
		 <script src="<?php echo base_url(); ?>asset/plugins/jQuery/jQuery-2.1.4.min.js"></script>
		 <!-- Bootstrap 3.3.5 -->
		 <script src="<?php echo base_url(); ?>asset/bootstrap/js/bootstrap.min.js"></script>
		 <!-- iCheck -->
		 <script src="<?php echo base_url(); ?>asset/plugins/iCheck/icheck.min.js"></script>
		 <script src="<?php echo base_url(); ?>jquery-validation/dist/jquery.validate.js"></script>
		 <script src="<?php echo base_url(); ?>jquery-validation/dist/additional-methods.js"></script>
		 <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>asset/css/style.css" />
		 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      </head>
        <input type="hidden" id="baseUrl" name="baseUrl" value="<?php echo base_url(); ?>" />
        <div class="custom-loader" id="custom-loader" style="display: none;"><img src="<?php echo base_url();?>assets/images/loader.gif" width='50%' height='50%'></div>
    <div class="bannerHotel" style="background-image:url('<?php echo base_url(); ?>'asset/images/banner.jpg)">
        <div class="container-fluid">
            <div class="landing-header">
                <div class="row">
                    <div class="col-md-2"><a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>asset/images/travellogo1.png" alt="" border="0" /></a> </div>
                    <div class="col-md-6 col-md-push-4">
                    <div class="">
						<div id="status"></div>
							<form id="user_login" method="POST" action="<?php echo base_url() ?>loginHotel" name="user_login" style="margin-top:15px;">
							                
								<div class="form-group text-left text-error col-md-5 col-xs-12" style="padding-left:3px; padding-right:3px; margin-bottom:3px;"> 
									<input class="form-control" id="hotel_email" maxlength="75" name="hotel_email" placeholder="Email" style="border-radius:0px" type="text" required="true" />
									</div>

									<div class="form-group text-left text-error col-md-5 col-xs-12" style="padding-left:3px; padding-right:3px; margin-bottom:3px;">
									<input autocomplete="off" class="form-control" id="hotel_password" name="hotel_password" placeholder="Password" style="border-radius:0px" type="password" required="true" />
									</div>

									<div class="form-group col-md-2 col-xs-12" style="padding-left:3px; padding-right:3px; margin-bottom:3px;">
									<button type="submit" class="btn btn-md btn-warning" id="login_button" style="border-radius:0px;">Sign in</button>
									</div>
									                
									<div class="clearfix"></div>
									<div class="col-md-5 col-md-push-5" style="margin-left:13px;"> 
									   <!--<a href="<?php //echo base_url()?>forgotPasswordHotel/#forgotPass" style="color:#fff;" class="text-right">-->
									   <a style="color:#fff;" class="text-right" href="#forgotPassModal" data-toggle="modal" >
									      <p>Forgot Password</p>
								       </a> 
								    </div>
							</form>
						</div>
                    <div class="clearfix"></div>
                    </div>
                </div>
                <div class=" spacer45"></div>
                <div class="row" style="text-align:center">
                   <h1 class="text-center text-muted listFont">List your property for free <br/>and maximize online bookings</h1>
                   <p class="text-center text-Header"><b>Hotel, Villa, Resort, Lodge, Guest house, Serviced Apts, Hostel, Homestay, Cottage &amp; BnB</b></p>
                </div>
                <div class="row" style="text-align:center"><a href="<?php echo base_url() ?>hotelRegistration/#registration" class="btn btn-success btn-lg fontTwentry fontBold" style="background:#f39c12; border:none;">Get started today for free!</a> </div>
                <div class="spacer15"></div>
                <div class=" spacer45"></div>
                <div class=" spacer20"></div>
            </div>
        </div>
    </div>
    <!-- Modal -->
            <div class="modal fade" id="forgotPassModal" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                           <button type="button" class="close" data-dismiss="modal">&times;</button>
                           <!--<h4 class="modal-title">Modal Header</h4>-->
                        </div>
                        <div class="modal-body" style="">
                            <div classs="row">
                               <div class="col-md-12" id="resStatus"></div>
                            </div>
                            <div class="row">
                                <h3 class="text-center">Reset Password</h3>
                                <div class="spacer30"></div>
                                <!--<form action="<?php //echo base_url() ?>resetPasswordHotelUser" method="post">-->
                                <form>
                                    <div class="col-md-12">
                                        <div class="form-group has-feedback">
                                            <label id="emailerr"></label>
                                            <input type="email" class="form-control" placeholder="Email" name="login_email" id="email" required/>
                                            <span class="glyphicon glyphicon-envelope form-control-feedback" style=""></span>
                                        </div>
                                        <div class="form-group">
                                            <button type="button" class="btn btn-primary pull-right" id="sendMail">Submit</button>
                                           <!--<input type="submit" class="btn btn-primary pull-right" value="Submit" id="" />    -->
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-sm btn-warning" data-dismiss="modal">close</button>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                $(document).ready(function(){
                   
                   $("#sendMail").click(function(){
                       var email = $("#email").val();
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
                });
            </script>