<div id="wrapper">
<div id="layout-static">
<div class="static-content-wrapper">
<div class="static-content">
<div class="page-content" style="">
<!--<ol class="breadcrumb">-->
<!--   <li><a href="<?php //echo base_url(HOTEL) ?>/dashboard">Home</a></li>-->
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

		 <!-- <form id="formData">-->
			<!--<input type="hidden" name="hotelId" id="hotelId" value='<?php //echo $editHotelId; ?>'>-->
			<!--<input type="hidden" name="check_in" id="check_in" value="<?php //echo $startdate; ?>">-->
			<!--<input type="hidden" name="check_out" id="check_out" value="<?php //echo $enddate; ?>">-->
			<!--<input type="hidden" name="total_rooms" id="total_rooms" value="<?php //echo count($adults);?>">-->
			<!--<input type="hidden" name="total_nights" id="total_nights" value="<?php //echo $stayDuration;?>">-->
			<!--<input type="hidden" name="Adultsinroom" id="Adultsinroom" value='<?php //echo serialize($adults); ?>'>-->
			<!--<input type="hidden" name="Childsinroom" id="Childsinroom" value='<?php //echo serialize($child); ?>'>-->
			<!--<input type="hidden" name="Infantsinroom" id="Infantsinroom" value='<?php //echo serialize($infants); ?>'>-->
			<!--<input type="hidden" name="Childsageforroom" id="Childsageforroom" value='<?php //echo serialize($child_age); ?>'>-->
			<!--<input type="hidden" name="emp_id" id="emp_id" value="<?php //echo $emp_id; ?>">-->
			<!--<input type="hidden" name="partner_id" id="partner_id" value="<?php //echo $partner_id; ?>">-->
			<!--<input type="hidden" name="hotel_partner_id" id="hotel_partner_id" value="<?php //echo $hotelData->hotel_partner_id; ?>">-->
			<!--<input type="hidden" name="hotelDateId" id="hotelDateId" value='<?php //echo $hotelDateIdStr; ?>'>-->
			<!--<input type="hidden" name="masterRoomArr" id="masterRoomArr" value='<?php //echo serialize($arrMasterRooms); ?>'>-->
			<!--<input type="hidden" name="arrRoomType" id="arrRoomType" value='<?php //echo serialize($arrRoomType); ?>'>-->
			<!--<input type="hidden" name="roomTypesPriceArr" id="roomTypesPriceArr" value='<?php //echo serialize($roomTypesPriceArr); ?>'>-->
			<!--<input type="hidden" name="searchDataStr" id="searchDataStr" value='<?php //echo $searchData; ?>'>-->
			<!--<input type="hidden" name="userSelectRoomTypes" id="userSelectRoomTypes" value=''>-->
			<!--<input type="hidden" name="userSelectMealTypes" id="userSelectMealTypes" value=''>-->
		 <!-- </form>-->
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
			<div class="col-md-12">
			<div class="box box-default">
		
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
											<td style="border: 1px solid #f4f4f4;padding: 8px;"><?php echo $bookindetails->lead_pax_name;?></td>
											<?php if(!empty($bookindetails->lead_pax_contact)) {?>
											<td style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;padding: 8px;">Contact No</td>
											<td style="border: 1px solid #f4f4f4;padding: 8px;"><?php echo $bookindetails->lead_pax_contact;?></td>
											<?php }else {?>
											<?php }?>
										</tr>
										<tr>
											<td style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;padding: 8px;">Hotel Name</td>
											<td style="border: 1px solid #f4f4f4;padding: 8px;"><?php echo $bookindetails->hotel_name;?></td>
											<td style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;padding: 8px;">Hotel Address</td>
											<td style="border: 1px solid #f4f4f4;padding: 8px;"><?php echo $bookindetails->address_line_1.', '.$bookindetails->address_line_2.', '.$bookindetails->city_name.', '.$bookindetails->state_name.', '.$bookindetails->country_name.', '.$bookindetails->zip;?></td>
										</tr>
										<tr>
											<td style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;padding: 8px;">Star Category</td>
											<td style="border: 1px solid #f4f4f4;padding: 8px;"><?php echo $bookindetails->hotel_star;?> Star</td>
											<td style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;padding: 8px;">No. of Passengers</td>
											<td style="border: 1px solid #f4f4f4;padding: 8px;">
												<?php echo $bookindetails->total_adults." Adults + ".$bookindetails->total_kids." Kids"; ?>
											</td>
										</tr>
										<tr>
											<td style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;padding: 8px;">Check-in</td>
											<td style="border: 1px solid #f4f4f4;padding: 8px;"><?php echo date('d, F Y',strtotime($bookindetails->check_in_date));?></td>
											<td style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;padding: 8px;">Check-out</td>
											<td style="border: 1px solid #f4f4f4;padding: 8px;"><?php echo date('d, F Y',strtotime($bookindetails->check_out_date));?></td>
										</tr>
										<tr>
											<td style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;padding: 8px;">Nights</td>
											<td style="border: 1px solid #f4f4f4;padding: 8px;"><?php echo $bookindetails->nights;?> Night(s)</td>
											<td style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;padding: 8px;"> Rooms Required</td>
											<td style="border: 1px solid #f4f4f4;padding: 8px;"><?php echo $bookindetails->total_rooms;?></td>
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
										for($i=0; $i<($bookindetails->total_rooms); $i++)
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
			<!--	<input type="hidden" id="queryname" value="<?php //echo $queryname; ?>" />-->
			<!--	<input type="hidden" id="empname" value="<?php //echo $emp_name; ?>" />-->
			<!--	<input type="hidden" id="queryid" value="<?php //echo $queryid; ?>" />-->
			<?php if($bookindetails->hotel_confirmation == "Pending") {?>
			<a class="btn btn-primary pull-right" href="#sendMailmodal" id="genratebooking" data-toggle="modal">Confirm Booking</a>
			<?php }?>
				
			
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
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="sendMailmodal" class="modal fade">
	<div class="modal-dialog mail-modal">
	   <form name="tour_mail" id="tour_mail" method="post" action="">
	       <input type="hidden" name="package_id" id="package_id" value="<?php echo $bookindetails->id; ?>">
		  <div class="modal-content">
			  <div class="modal-header">
				  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				  <h4 class="modal-title">Confirm Hotel Booking</h4>
			  </div>
			 
			  <div class="modal-body">
			      
			 <!--   <div class="row">-->
				<!--	<div class="col-md-12" id="">-->
				<!--	    <h4><?php //echo $bookindetails->hotel_name.'<br>'.$bookindetails->address_line_1.', '.$bookindetails->address_line_2.', '.$bookindetails->city_name.', '.$bookindetails->state_name.', '.$bookindetails->country_name;?></h4>-->
				<!--		<h4><?php //echo "Checkin:".date('d, F Y',strtotime($bookindetails->check_in_date))."Checkout:".date('d, F Y',strtotime($bookindetails->check_out_date));?></h4>-->
				<!--	</div>-->
				<!--</div>-->
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<!--<label>Departure Date </label>-->
							<input class="form-control" id="voucher_number" name="voucher_number" placeholder="Enter Booking Number" value="" type="text" required>
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

// $(document).on('click', '#sendMailmodal', function(){
//         $("#sendToVendor").modal();
//       	//var id = $(this).attr('rel');
//       	//$("#cmodalHead").html('Cancelation Reason: <strong>'+id+'</strong>');
//       	//$("#hoteldetails").html($("#vendoremailbody").html());
    
// });
//  $(function () {
//  	CKEDITOR.env.isCompatible = true;

//  	var titleEditor = CKEDITOR.replace( 'email_body', {
// 		width:'auto',
// 		height:200,
// 		startupFocus : false,
// 		customConfig: 'ckeditor_customconfig/ckeditor_config2.js'
// 	});

//  });

function downlaod_pdf()
{

	var base_url = "<?php echo base_url(); ?>";
	var data = {
	    packageid: $("#package_id").val(),
	    voucher_number: $("#voucher_number").val(),
	};

				$.ajax({
					type: "POST",
					url: "<?php echo base_url(HOTEL) ?>/generateHotelbookingNumber",
					data: data,
					cache: false,
					beforeSend:function() {
						$("#showLoaderEmail").show();
					},
					success: function(data)
					{
						//alert(html);	
						 if(data == 1)
						 {
						     alert("Booking Generated");
						    $('#sendMailmodal').modal('hide');
							$("#showLoaderEmail").hide();
						   var succmsg = '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Booking Number Genrated</div>';
						   $("#errormsg").html(succmsg);
						   $("#genratebooking").attr("disabled", true);
						 }
						 else{
						   var errmsg = '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Confirmtaion Failed</div>';
						   $("#errormsg").html(errmsg);
						 }
					}
				});
}

</script>