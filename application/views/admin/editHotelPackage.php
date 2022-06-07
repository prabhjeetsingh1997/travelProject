<div id="wrapper">
<div id="layout-static">
<div class="static-content-wrapper">
<div class="static-content">
<div class="page-content" style="">
<!--<ol class="breadcrumb">-->
<!--   <li><a href="<?php //echo base_url(PARTNER) ?>/dashboard">Home</a></li>-->
<!--   <li><a href="#">View Hotel Details</a></li>-->
<!--</ol>-->

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
		<?php 
				$rupeeSymbol = '<img src="'.APP_URL.'images/rupee.png" alt="" style="margin-top:3px;" />';
			
					$border = 'border: 1px solid #DDD;';
					$rupeeSymbol = '';
			?>
   <!--       <h3>-->
   <!--          Edit Hotel Detail-->
			<!--</h3>-->

		  <form id="formData">
			<input type="hidden" name="hotelId" id="hotelId" value='<?php echo $editHotelId; ?>'>
			<input type="hidden" name="check_in" id="check_in" value="<?php echo $startdate; ?>">
			<input type="hidden" name="check_out" id="check_out" value="<?php echo $enddate; ?>">
			<input type="hidden" name="total_rooms" id="total_rooms" value="<?php echo count($adults);?>">
			<input type="hidden" name="total_nights" id="total_nights" value="<?php echo $stayDuration;?>">
			<input type="hidden" name="Adultsinroom" id="Adultsinroom" value='<?php echo serialize($adults); ?>'>
			<input type="hidden" name="Childsinroom" id="Childsinroom" value='<?php echo serialize($child); ?>'>
			<input type="hidden" name="Infantsinroom" id="Infantsinroom" value='<?php echo serialize($infants); ?>'>
			<input type="hidden" name="Childsageforroom" id="Childsageforroom" value='<?php echo serialize($child_age); ?>'>
			<input type="hidden" name="emp_id" id="emp_id" value="<?php echo $emp_id; ?>">
			<input type="hidden" name="partner_id" id="partner_id" value="<?php echo $partner_id; ?>">
			<input type="hidden" name="hotel_partner_id" id="hotel_partner_id" value="<?php echo $hotelData->hotel_partner_id; ?>">
			<input type="hidden" name="hotelDateId" id="hotelDateId" value='<?php echo $hotelDateIdStr; ?>'>
			<input type="hidden" name="masterRoomArr" id="masterRoomArr" value='<?php echo serialize($arrMasterRooms); ?>'>
			<input type="hidden" name="arrRoomType" id="arrRoomType" value='<?php echo serialize($arrRoomType); ?>'>
			<input type="hidden" name="roomTypesPriceArr" id="roomTypesPriceArr" value='<?php echo serialize($roomTypesPriceArr); ?>'>
			<input type="hidden" name="searchDataStr" id="searchDataStr" value='<?php echo $searchData; ?>'>
			<input type="hidden" name="userSelectRoomTypes" id="userSelectRoomTypes" value=''>
			<input type="hidden" name="userSelectMealTypes" id="userSelectMealTypes" value=''>
		  </form>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
			<div class="col-md-12">
			<div class="box box-default">
			
				<!--<div class="box-header with-border">-->
				<!--	<div id="status1"></div>-->
				<!--	<div id="searchType" style="font-size:20px;border-bottom: 1px solid #EEE;padding-bottom: 5px;"><?php //echo $hotelName;?></div>-->
						
				<!--	<div class="col-md-12" style="margin-top:10px; padding:0">-->
				<!--		<div class="form-group form-inline">-->
				<!--			<label for="userPhone">Query Number: </label>-->
				<!--			<input type="input" name="queryNumber" id="queryNumber" class="form-control" placeholder="Query Number" value="<?php //echo $queryNumber; ?>" />-->
				<!--			<button type="submit" class="btn btn-primary" name="searchQueryBtn" id="searchQueryBtn" style="margin-left: 10px;">Search</button>	-->
				<!--		</div>-->
				<!--	</div>-->
				<!--</div>-->
		
				<div class="box-body">
				
					<div id="searchData" style="padding:15px 0;">
						<div style="<?php echo $border;?>padding: 10px;border-radius: 5px;float: left;width: 100%; margin-bottom:10px;">
						
							<div class="col-md-12" id="errormsg">
								<!--<div class="row" id="showQueryDetail">-->
									<?php //echo $quryDetail; ?>
								<!--</div>	-->
								
							</div>
						
							<div class="col-md-12" id="vendoremailbody">
								
								<h3>Details</h3>
								<div class="hotelDetail table-responsive">
									<table class="table table-bordered" cellspacing="0">
										<tr>
											<td style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;padding: 8px;">Lead Pax. Name</td>
											<td style="border: 1px solid #f4f4f4;padding: 8px;"><?php echo $hotelpackage->lead_pax_name;?></td>
											<?php if(!empty($hotelpackage->lead_pax_contact)) {?>
											<td style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;padding: 8px;">Contact No</td>
											<td style="border: 1px solid #f4f4f4;padding: 8px;"><?php echo $hotelpackage->lead_pax_contact;?></td>
											<?php }else {?>
											<?php }?>
										</tr>
										<tr>
											<td style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;padding: 8px;">Hotel Name</td>
											<td style="border: 1px solid #f4f4f4;padding: 8px;"><?php echo $hotelpackage->hotel_name;?></td>
											<td style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;padding: 8px;">Hotel Address</td>
											<td style="border: 1px solid #f4f4f4;padding: 8px;"><?php echo $hotelpackage->address_line_1.', '.$hotelpackage->address_line_2.', '.$hotelpackage->city_name.', '.$hotelpackage->state_name.', '.$hotelpackage->country_name.', '.$hotelpackage->zip;?></td>
										</tr>
										<tr>
											<td style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;padding: 8px;">Star Category</td>
											<td style="border: 1px solid #f4f4f4;padding: 8px;"><?php echo $hotelpackage->hotel_star;?> Star</td>
											<td style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;padding: 8px;">No. of Passengers</td>
											<td style="border: 1px solid #f4f4f4;padding: 8px;">
												<?php echo $hotelpackage->total_adults." Adults + ".$hotelpackage->total_kids." Kids"; ?>
											</td>
										</tr>
										<tr>
											<td style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;padding: 8px;">Check-in</td>
											<td style="border: 1px solid #f4f4f4;padding: 8px;"><?php echo date('d, F Y',strtotime($hotelpackage->check_in_date));?></td>
											<td style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;padding: 8px;">Check-out</td>
											<td style="border: 1px solid #f4f4f4;padding: 8px;"><?php echo date('d, F Y',strtotime($hotelpackage->check_out_date));?></td>
										</tr>
										<tr>
											<td style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;padding: 8px;">Nights</td>
											<td style="border: 1px solid #f4f4f4;padding: 8px;"><?php echo $hotelpackage->nights;?> Night(s)</td>
											<td style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;padding: 8px;"> Rooms Required</td>
											<td style="border: 1px solid #f4f4f4;padding: 8px;"><?php echo $hotelpackage->total_rooms;?></td>
										</tr>
									</table>
								</div>
								
								<div class="col-md-12" style="padding:0;">
								
								<h3>Costing </h3>
								<div class="table-responsive">	
								<table class="table table-bordered" cellspacing="0" width="100%">
									<tr>
										<th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;padding: 8px;">Room</th>
										<th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;padding: 8px;">Adult</th>
										<th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;padding: 8px;">Infants</th>
										<th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;padding: 8px;">Child(ren)</th>
										<th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;padding: 8px;">Child(ren) Age</th>
										<th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;padding: 8px;">Room Type</th>
										<th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;padding: 8px;">Meal Plan</th>
										<th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;padding: 8px;">Price</th></tr>
									<?php
										//print_r($paramArr);
										//echo count($adults);
										for($i=0; $i<($hotelpackage->total_rooms); $i++)
										{
							
										?>
										<tr>
											<td style="border: 1px solid #f4f4f4;padding: 8px;"><?php echo $i+1; ?></td>
											<td style="border: 1px solid #f4f4f4;padding: 8px;"><span><i class="fa fa-male" aria-hidden="true"></i></span> <?php echo $adultsinroom[$i]; ?></td>
											<td style="border: 1px solid #f4f4f4;padding: 8px;"><span><i class="fas fa-baby"></i></span> <?php echo $infantsinroom[$i]; ?></td>
											<td style="border: 1px solid #f4f4f4;padding: 8px;"><span><i class="fa fa-child" aria-hidden="true"></i></span> <?php echo $childsinroom[$i]; ?></td>
											<td style="border: 1px solid #f4f4f4;padding: 8px;"><?php echo $childsageinroom[$i]; ?></td>
											<td style="border: 1px solid #f4f4f4;padding: 8px;">
								
												
												    <?php foreach($arrRoomType as $roomTypes){
												   
													if($roomtypes[$i] == $roomTypes['room_id'])
													{ 
													    echo $roomTypes['room_type'];   
													}
													}?>
												
											
											</td>
											<td style="border: 1px solid #f4f4f4;padding: 8px;">
											
												
												<?php    
												    foreach($date_rates_detail as $meal)
                                                    {
                                                      //$hotelDateIdStr .= $meal['id'].',';
                                                        $mealTxt = 'CP (Breakfast)';
                                                        if($meal['meal_plan'] == 2)
                                                        {
                                                          $mealTxt = 'MAP (Breakfast+Dinner)';
                                                        }
                                                        if($meal['meal_plan'] == 3)
                                                        {
                                                          $mealTxt = 'AP (Breakfast+Lunch+Dinner)';
                                                        }
                                                        if($meal['meal_plan'] == 4)
                                                        {
                                                          $mealTxt = 'EP (Room Only)';
                                                        }
                                                         if($meal['meal_plan'] == 5)
                                                        {
                                                          $mealTxt = 'CP Package';
                                                        }
                                                        if($meal['meal_plan'] == 6)
                                                        {
                                                          $mealTxt = 'MAP Package';
                                                        }
                                                        if($meal['meal_plan'] == 7)
                                                        {
                                                          $mealTxt = 'AP Package';
                                                        }
                                                        if($meal['meal_plan'] == 8)
                                                        {
                                                          $mealTxt = 'EP Package';
                                                        }
                
                                                        $mP = $meal['meal_plan'];
                                                        
                                                        if($mealtypes[$i] == $mP)
                                                        { 
                                                            echo $mealTxt;   
                                                        }
                                                        
                                                        ?>
                                                        
                                                     <?php
                                                     }?>
												
											</td>
											<td style="border: 1px solid #f4f4f4;padding: 8px;"><span><i class="fa fa-inr" aria-hidden="true"></i></span><?php echo $rupeeSymbol; ?>
											 <span id="roomPrice_<?php //echo $i+1; ?>">
											     <?php
											     $pArr = array();
			                                        foreach($roomprices as $val)
			                                        {
				                                       $pArr[] = $val;
		                                         	}
		                                         	 echo $pArr[$i];
											     ?>
											    
											 </span></td>
										</tr>
										<?php	
										}
									?>
									
									<tr style="font-size: 18px;font-weight: 600;">
										<td colspan="7" style="text-align:center;border: 1px solid #f4f4f4;padding: 8px;">Grand Total</td>
										<td style="border: 1px solid #f4f4f4;padding: 8px;"><span><i class="fa fa-inr" aria-hidden="true"></i></span><?php echo $rupeeSymbol; ?> <span id="grandTotal"><?php  echo array_sum($pArr);//echo number_format(floor($grandTot)); ?></span></td>
									</tr>
							</table>
							</div>
							<div style="clear:both"></div>
							
							<!--<div id="mealDesBox" style="<?php //echo $dispPckg; ?>">-->
							<!--	<h3>Package Description:</h3>-->
							<!--	<div id="mealDescriptions">-->
							<!--		<?php //echo $desc; ?>-->
							<!--	</div>-->
							<!--</div>-->
							
							</div>
							<!--<div class="col-md-3" style="padding: 0;">
								<img src="document/hotel_doc/hotel_room_pic/<?php //echo $image;?>" style="width:100%;padding: 2px;height: 158px;border: 1px solid #EEE;">
							</div>-->
						</div>
					</div>
					
					<div style="clear:both;"></div>
					
					
				</div>
			</div>
			
			<div class="box-footer text-right">
			<!--	<input type="hidden" id="calculated_prices" value="" />-->
			<!--	<input type="hidden" id="selected_rooms" value="" />-->
			<!--	<input type="hidden" id="selected_mealPlans" value="" />-->
			<!--	<input type="hidden" id="queryname" value="<?php //echo $queryname; ?>" />-->
			<!--	<input type="hidden" id="empname" value="<?php //echo $emp_name; ?>" />-->
			<!--	<input type="hidden" id="queryid" value="<?php //echo $queryid; ?>" />-->
				<!--<a class="btn btn-primary" href="#confirmbooking" data-toggle="modal">Save</a>&nbsp;&nbsp;&nbsp;-->
			<!--	<button type="button" class="btn btn-primary" id="savehotelData" onclick="savehotelPak()">Save Package</button>&nbsp;&nbsp;&nbsp;-->
				<!--<button type="button" class="btn btn-info" id="" onclick="">Confirm Booking</button>&nbsp;&nbsp;&nbsp;-->
				<a class="btn btn-primary pull-right" href="" id="sendMailmodal" data-toggle="modal"><i class="fa fa-envelope-o"></i> Send Confirmation</a>
				
			</div>
			
			</div>
		</div>
    </div><!-- /.row -->
</section><!-- /.content -->
</div>
</div>
<style>
a > img{outline:none;}
</style>

<!--mail modal-->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="sendToVendor" class="modal fade">
	<div class="modal-dialog mail-modal">
	   <form name="tour_mail" id="tour_mail" method="post" action="">
	       <input type="hidden" name="package_id" id="package_id" value="<?php echo $hotelpackage->id; ?>">
		  <div class="modal-content">
			  <div class="modal-header">
				  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				  <h4 class="modal-title"><i class="fa fa-envelope-o"></i> Send By Email</h4>
			  </div>
			 
			  <div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<!--<label>Departure Date </label>-->
							<input class="form-control" id="rescipent_emails" name="rescipent_emails" placeholder="Recipient Email Ids" value="<?php echo $hotelpackage->email; ?>" type="text">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12" id="">
						<div class="form-group">
							<textarea cols="50" rows="3" class="form-control" name="email_body" id="email_body" placeholder="Comments">
									
							</textarea>
						</div>
					</div>
				</div>
				
			  </div>
			  <div class="modal-footer">
				  <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
				  <img src="<?php echo base_url(); ?>assets/images/loader.gif" id="showLoaderEmail" style="width:26px; display:none;">
				  <button class="btn btn-success" type="button" id="sendEmail" onclick="downlaod_pdf()">Send</button>
			  </div>
		  </div>
		</form>
	</div>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/form-ckeditor/ckeditor.js"></script>
<script type="text/javascript">

$(document).on('click', '#sendMailmodal', function(){
        $("#sendToVendor").modal();
      	//var id = $(this).attr('rel');
      	//$("#cmodalHead").html('Cancelation Reason: <strong>'+id+'</strong>');
      	//$("#hoteldetails").html($("#vendoremailbody").html());
    
});
 $(function () {
 	CKEDITOR.env.isCompatible = true;

 	var titleEditor = CKEDITOR.replace( 'email_body', {
		width:'auto',
		height:200,
		startupFocus : false,
		customConfig: 'ckeditor_customconfig/ckeditor_config2.js'
	});

//  	selected_mealTypes();
// 	selected_roomTypes();
// 	calculate_price();

// 	$(".userRoomTypes").change(function(){
// 		selected_roomTypes();
// 		calculate_price();
// 	});
	
// 	$(".mealTypes").change(function(){
// 		selected_mealTypes();
// 		calculate_price();
// 	});

 });

// function selected_roomTypes()
// {
// 	var userRooms = '';
// 	var i=0;
// 	$(".userRoomTypes").each(function(){
// 		i++;
// 		var val = $(this).val();
// 		userRooms += val+',';
// 	});
// 	$("#userSelectRoomTypes").val(userRooms);
// }

// function selected_mealTypes()
// {
// 	var userMeals = '';
// 	var i=0;
// 	$(".mealTypes").each(function(){
// 		i++;
// 		var val = $(this).val();
// 		userMeals += val+',';
// 	});
// 	$("#userSelectMealTypes").val(userMeals);
// }

// function calculate_price()
// {
// 	var priceMargin = $("#priceMargin").val()
// 	$.ajax({
// 		type:"POST",
// 		url:"<?php //echo base_url(PARTNER) ?>/calculatePrice",
// 		data:$("#formData").serialize(),
// 		beforeSend:function(){
			
// 		},
// 		success:function(html){
// 			var response = html;
// 			var priceArr = response.split(',"description"');
// 			var calPrice = priceArr[0]+'}';
// 			$("#calculated_prices").val(calPrice);
// 			var obj = JSON.parse(html);
// 			var desc = obj.description;
// 			calculate_priceWith_margin(priceMargin);
			
// 			if(desc != '')
// 			{
// 				$("#mealDescriptions").html(desc);
// 				$("#mealDesBox").show();
// 			}
// 			else
// 			{
// 				$("#mealDesBox").hide();
// 				$("#mealDescriptions").html('');
// 			}
// 		}
// 	});
// }

// function calculate_priceWith_margin(margin_val)
// {
// 	var roomPrices = $("#calculated_prices").val();
// 	var obj = JSON.parse(roomPrices);
// 	var totalRooms = $(".userRoomTypes").length;
// 	var totPrice = 0;
// 	var roomprice = 0;

// 	for(var i=1; i<=totalRooms; i++)
// 	{
// 		roomprice = obj[i];
// 		roompriceWithmargin = roomprice + (roomprice*parseInt(margin_val)/100);
// 		$("#roomPrice_"+i).html(roompriceWithmargin);
// 		totPrice += parseInt(roompriceWithmargin);
// 	}
// 	$("#totalHotelPrice").html(totPrice);
// 	var serviceTax = (totPrice*5)/100;
// 	$("#serviceTax").html(serviceTax);
// 	var grandTotal = parseInt(totPrice) + parseInt(serviceTax);
// 	$("#grandTotal").html(grandTotal);
	
// 	var optVal = '';
// 	$(".userRoomTypes").each(function(){
// 		optVal += $(this).find("option:selected").text()+',';
// 	});

// 	$("#selected_rooms").val(optVal);
	
// 	var MealoptVal = '';
// 	$(".mealTypes").each(function(){
// 		MealoptVal += $(this).find("option:selected").text()+',';
// 	});
	
// 	$("#selected_mealPlans").val(MealoptVal);
// }

function downlaod_pdf()
{

	var confirmationdata = {
	    id: $("#package_id").val(),
	    hotel_confirmation : "Pending",
	}; 
	var base_url = "<?php echo base_url(); ?>";
	var data = {
	    hoteldata: $("#vendoremailbody").html(),
	    rescipent_emails: $("#rescipent_emails").val(),  
	    email_body: $("#email_body").html(),
	};

				for(instance in CKEDITOR.instances) {
					CKEDITOR.instances[instance].updateElement();
				}
				//$("#mailFilePath").val(html);
				$.ajax({
					type: "POST",
					url: "<?php echo base_url() ?>"+'send_hotel_vendormail.php',
					data: data,
					cache: false,
					beforeSend:function() {
						$("#showLoaderEmail").show();
					},
					success: function(data)
					{
						//alert(html);	
						if(data)
						{
						    $.ajax({
						        type: "POST",
						        url: "<?php echo base_url(ADMIN_URL) ?>/UpdateHotelpackageConfirmation",
						        data: confirmationdata,
						        success: function(html){
						            
						            if(html == 1){
						              var succmsg = '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Confirmtaion Send</div>';
						              $("#errormsg").html(succmsg);    
						            }
						            else{
						                var errmsg = '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Confirmtaion Failed</div>';
						              $("#errormsg").html(errmsg);
						            }
						            
						            
						            
						           //console.log(html);
						        }
						    });
							alert('Email Sent Successfully');
							$('#sendToVendor').modal('hide');
							$("#showLoaderEmail").hide();
							
						}
						else
						{
							alert('There is some error in sending email');
						}
					}
				});
}
// function savehotelPak(){
    
//     var data = {
//         hotelId: $("#hotelId").val(),
//         totalAdults: $("#totalAdults").val(),
//         totalKids: $("#totalKids").val(),
//         check_in: $("#check_in").val(),
//         check_out: $("#check_out").val(),
//         total_rooms:$("#total_rooms").val(),
//         total_nights:$("#total_nights").val(),
//         priceMargin:$("#priceMargin").val(),
//         Adultsinroom: $("#Adultsinroom").val(),
//         Childsinroom:$("#Childsinroom").val(),
//         Infantsinroom: $("#Infantsinroom").val(),
//         Childsageforroom: $("#Childsageforroom").val(),
//         userSelectRoomTypes: $("#userSelectRoomTypes").val(),
//         userSelectMealTypes: $("#userSelectMealTypes").val(),
//         emp_id: $("#emp_id").val(),
//         hotel_partner_id: $("#hotel_partner_id").val(),
//         partner_id : $("#partner_id").val(),
//         //masterRoomArr : $("#masterRoomArr").val(),
//     };
    
//     $.ajax({
//         type:"POST",
//         url:"<?php //echo base_url(PARTNER) ?>/saveHotelpackage",
//         data:data,
//         //datatype:"json",
//         beforSend:function(){
//             $("#showLoaderEmail").show();
//         },
//         success:function(html){
            
//             if(html){
//                 alert("success");
//                 $("#savehotelData").text("Saved");
//             }else{
//                 console.log("failed");
//             }
//         },
        
//     });
// }
</script>