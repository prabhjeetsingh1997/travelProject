<div id="wrapper">
<div id="layout-static">
<div class="static-content-wrapper">
<div class="static-content">
<div class="page-content">
<ol class="breadcrumb">
   <li><a href="<?php echo base_url(ADMIN_URL) ?>/dashboard">Home</a></li>
   <li><a href="#">View Hotel Details</a></li>
</ol>

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
		<?php 
				$rupeeSymbol = '<img src="'.APP_URL.'images/rupee.png" alt="" style="margin-top:3px;" />';
				if($type != 'pdf')
				{
					$border = 'border: 1px solid #DDD;';
					$rupeeSymbol = '';
			?>
          <h3>
             View Hotel Detail
			</h3>
		 <?php
				}
				else
				{
					
				}
		 ?> 
          <!--<ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Query List</li>
          </ol>-->
		  <form id="formData">
			<input type="hidden" name="hotelId" id="hotelId" value='<?php echo $editHotelId; ?>'>
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
			<?php 
				if($type != 'pdf')
				{
			?>
				<div class="box-header with-border">
					<div id="status1"></div>
					<div id="searchType" style="font-size:20px;border-bottom: 1px solid #EEE;padding-bottom: 5px;"><?php echo $hotelName;?></div>
						
					<div class="col-md-12" style="margin-top:10px; padding:0">
						<div class="form-group form-inline">
							<label for="userPhone">Query Number: </label>
							<input type="input" name="queryNumber" id="queryNumber" class="form-control" placeholder="Query Number" value="<?php echo $queryNumber; ?>" />
							<button type="submit" class="btn btn-primary" name="searchQueryBtn" id="searchQueryBtn" style="margin-left: 10px;">Search</button>	
						</div>
					</div>
				</div>
			<?php
				}
			?>	
				<div class="box-body">
					<?php 
						if($type == 'pdf')
						{
					?>
					<div class="row">
						<div class="col-md-12" style="text-align:right;">
							<img src="images/pdf/travellogo.png" style="width:300px;" />
						</div>
					</div>
					<?php 
						}
					?>
					<div id="searchData" style="padding:15px 0;">
						<div style="<?php echo $border;?>padding: 10px;border-radius: 5px;float: left;width: 100%; margin-bottom:10px;">
						
							<div class="col-md-12">
								<div class="row" id="showQueryDetail">
									<?php echo $quryDetail; ?>
								</div>	
								<div class="row">
									<div class="col-md-12">
										<p>Greetings from <strong><span style="font-size: 19px;background: yellow; color:#00c0ef;">LiD – Travel </span>!!!</strong></p>
										<p>Thank you for considering us for your forthcoming travel plan, as per details provided by you we are pleased to quote the following:</p>
									</div>
								</div>
							</div>
						
							<div class="col-md-12">
								
								<h3>Details</h3>
								<div class="hotelDetail table-responsive">
									<table class="table table-bordered" cellspacing="0">
										<tr>
											<td style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;padding: 8px;">Hotel Name</td>
											<td style="border: 1px solid #f4f4f4;padding: 8px;"><?php echo $hotelData->hotel_name;?></td>
											<td style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;padding: 8px;">Hotel Address</td>
											<td style="border: 1px solid #f4f4f4;padding: 8px;"><?php echo $hotelData->address_line_1.', '.$hotelData->address_line_2.', '.$hotelData->city_name.', '.$hotelData->state_name.', '.$hotelData->country_name.', '.$zip;?></td>
										</tr>
										<tr>
											<td style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;padding: 8px;">Star Category</td>
											<td style="border: 1px solid #f4f4f4;padding: 8px;"><?php echo $hotelData->hotel_star;?> Star</td>
											<td style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;padding: 8px;">No. of Passengers</td>
											<td style="border: 1px solid #f4f4f4;padding: 8px;">
												<?php
													if(is_array($adults))
													{
														echo array_sum($adults);
													}
													else
													{
														echo $adults;
													}
												?> Adults + 
												<?php 
													if(is_array($child))
													{
														echo array_sum($child);
													}
													else
													{
														echo $child;
													}
													
												?> Kids 
											</td>
										</tr>
										<tr>
											<td style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;padding: 8px;">Check-in</td>
											<td style="border: 1px solid #f4f4f4;padding: 8px;"><?php echo date('d, F Y',strtotime($startdate));?></td>
											<td style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;padding: 8px;">Check-out</td>
											<td style="border: 1px solid #f4f4f4;padding: 8px;"><?php echo date('d, F Y',strtotime($enddate));?></td>
										</tr>
										<tr>
											<td style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;padding: 8px;">Nights</td>
											<td style="border: 1px solid #f4f4f4;padding: 8px;"><?php echo $stayDuration;?> Night(s)</td>
											<td style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;padding: 8px;"> Rooms Required</td>
											<td style="border: 1px solid #f4f4f4;padding: 8px;"><?php echo count($adults);?></td>
										</tr>
									</table>
								</div>
								<?php 
									if($type != 'pdf')
									{
								?>
								<div class="">
								<h3>Add Margin(%)</h3>
								<div class="hotelDetail">
									<table class="table table-bordered" cellspacing="0">
										<tr>
											<td>Entery your percentage</td>
											<td style="border: 1px solid #f4f4f4;padding: 8px;">
												<input type="number" id="priceMargin" value="0" onkeyup="calculate_priceWith_margin(this.value)" maxlength="2" />
											</td>
											
										</tr>
									</table>
								</div>
								</div>
								<?php
									}
								?>
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
										for($i=0; $i<count($adults); $i++)
										{
											$adultP = $adults[$i];
											$childp = $child[$i];
											$infantsp = $infants[$i];
											if(is_array($child_age))
											{
												$childp_age = $child_age[$i];
											}
											else
											{
												$childp_age = $child_age;	
											}
											
										?>
										<tr>
											<td style="border: 1px solid #f4f4f4;padding: 8px;"><?php echo $i+1; ?></td>
											<td style="border: 1px solid #f4f4f4;padding: 8px;"><span><i class="fa fa-male" aria-hidden="true"></i></span> <?php echo $adultP; ?></td>
											<td style="border: 1px solid #f4f4f4;padding: 8px;"><span><i class="fas fa-baby"></i></span> <?php echo $infantsp; ?></td>
											<td style="border: 1px solid #f4f4f4;padding: 8px;"><span><i class="fa fa-child" aria-hidden="true"></i></span> <?php echo $childp; ?></td>
											<td style="border: 1px solid #f4f4f4;padding: 8px;">
												<?php 
													if($childp_age != '')
													{
														echo $childp_age; 
													}
													else
													{
														echo '--';
													}
												?>
											</td>
											<td style="border: 1px solid #f4f4f4;padding: 8px;">
												<?php
													if($calculatedprices != '')
													{
														echo $selRoomsArr[$i];
													}
													else
													{
												?>
												<select class="form-control userRoomTypes" id="class<?php echo $i+1; ?>">
													<?php echo $roomTypeStr; ?>
												</select>
												<?php
													}
												?>
											</td>
											<td style="border: 1px solid #f4f4f4;padding: 8px;">
												<?php
													if($calculatedprices != '')
													{
														echo $selMealPlansArr[$i];
													}
													else
													{
												?>
												<select class="form-control mealTypes" id="class<?php echo $i+1; ?>">
													<?php echo $mealStr; ?>
													
												</select>
												<?php
													}
												?>
												
											</td>
											<td style="border: 1px solid #f4f4f4;padding: 8px;"><span><i class="fa fa-inr" aria-hidden="true"></i></span><?php echo $rupeeSymbol; ?> <span id="roomPrice_<?php echo $i+1; ?>"><?php echo $pArr[$i]; ?></span></td>
										</tr>
										<?php	
										}
									?>
									<tr>
										<td colspan="7" style="text-align:center;border: 1px solid #f4f4f4;padding: 8px;">Sub Total</td>
										<td style="border: 1px solid #f4f4f4;padding: 8px;"><span><i class="fa fa-inr" aria-hidden="true"></i></span><?php echo $rupeeSymbol; ?> <span id="totalHotelPrice"><?php echo $subTotal; ?></span></td>
									</tr>
									<tr>
										<td colspan="7" style="text-align:center;border: 1px solid #f4f4f4;padding: 8px;">GST @ 5%</td>
										<td style="border: 1px solid #f4f4f4;padding: 8px;"><span><i class="fa fa-inr" aria-hidden="true"></i></span><?php echo $rupeeSymbol; ?> <span id="serviceTax"><?php echo $serviceTax; ?></span></td>
									</tr>
									<tr style="font-size: 18px;font-weight: 600;">
										<td colspan="7" style="text-align:center;border: 1px solid #f4f4f4;padding: 8px;">Grand Total</td>
										<td style="border: 1px solid #f4f4f4;padding: 8px;"><span><i class="fa fa-inr" aria-hidden="true"></i></span><?php echo $rupeeSymbol; ?> <span id="grandTotal"><?php echo number_format(floor($grandTot)); ?></span></td>
									</tr>
							</table>
							</div>
							<div style="clear:both"></div>
							<h3>Inclusions:</h3>
							<ul>
								<li>Welcome drinks on Arrival at hotel/resort. (Non alcoholic)</li>
								<li>Accommodation as per above details.</li>
								<li>Meals as above mentioned Meal Plan.</li>
								<li>All kind of applicable hotel, transport, service &amp; govt. taxes.</li>
							</ul>
							<?php
								$dispPckg = "display:none;";
								$desc= '';
								if($type == 'pdf')
								{
									//print_r($selMealPlansArr);
									$mArr = array();
									if(is_array($selMealPlansArr))
									{
										foreach($selMealPlansArr as $mVal)
										{
											if($mVal == 'CP (Breakfast)')
											{
												$mv = 1;
											}
											if($mVal == 'MAP (Breakfast+Dinner)')
											{
												$mv = 2;
											}
											if($mVal == 'AP (Breakfast+Lunch+Dinner)')
											{
												$mv = 3;
											}
											if($mVal == 'EP (Room Only)')
											{
												$mv = 4;
											}
											if($mVal == 'CP Package')
											{
												$mv = 5;
											}
											if($mVal == 'MAP Package')
											{
												$mv = 6;
											}
											if($mVal == 'AP Package')
											{
												$mv = 7;
											}
											if($mVal == 'EP Package')
											{
												$mv = 8;
											}
											$mArr[] = $mv;
										}
									}
									$mArr = array_filter($mArr);
									//print_r($mArr);
									//echo 'asdfads::::';
									$getRateDescription = $objhotel->getDateRatesDesc($editHotelId, $startdate, $enddate, implode($mArr,','));
									//print_r($getRateDescription);
									$desc = $getRateDescription[0]['description'];
									$dispPckg = "display:block;";
								}
								
							?>
							<div id="mealDesBox" style="<?php echo $dispPckg; ?>">
								<h3>Package Description:</h3>
								<div id="mealDescriptions">
									<?php echo $desc; ?>
								</div>
							</div>
							<h3>Exclusions:</h3>	
							<ul>
								<li>Tips to the guide / driver / restaurants / airport / hotels etc.</li>
								<li>Any expenses of personal nature such as, drinks, laundry, telephone calls, insurance, camera fees, excess baggage, emergency/medical cost etc.</li>
								<li>Any expenses/services not mentioned or not covered under above inclusions header are extras and to be paid off by guest directly.</li>
							</ul>
							<h3>Note:</h3>
							<ul>
								<li>Child Policy:
									<ul>
										<li>0 to 5 years child is complimentary sharing parent’s bed.</li>
										<li>6 to 8 years child will be charged as extra child without bed.</li>
										<li>9 to 12 years child will be charged as extra child with bed.</li>
									</ul>
								</li>
								<li>The cost is irrelevant of circumstances that are beyond our control. Situations such as road blockade due to strike or agitation, earthquake, natural calamity, sickness evacuation, delay or cancellation of train or flight etc. are beyond our control.</li>
								<li>We are not holding any booking, so room(s) availability may vary at the time of booking.</li>
								
							</ul>
							
							</div>
							<!--<div class="col-md-3" style="padding: 0;">
								<img src="document/hotel_doc/hotel_room_pic/<?php echo $image;?>" style="width:100%;padding: 2px;height: 158px;border: 1px solid #EEE;">
							</div>-->
						</div>
					</div>
					
					<div style="clear:both;"></div>
					
					
				</div>
				<?php 
					if($type == 'pdf')
					{
				?>
				<div class="row">
					<div class="col-md-12" style="text-align:right; position:relative;">
						<img src="images/pdf/footer.png" style="width:100%;" />
						<div style="position: absolute;top: 0px;right: 30px;padding: 10px;">
							<a href="https://www.facebook.com/LiD.TE/" target="_blank"><img src="images/pdf/fb.png" style="height:40px;" /></a>
							<a href="https://www.instagram.com/planetlid/?hl=en" target="_blank">
							<img src="images/pdf/instagram.png" style="height:40px;" /></a><br/>
							<a href="https://www.youtube.com/channel/UCXUSz7sEHs4_RisR-nENw9w" target="_blank">
							<img src="images/pdf/youtube.png" style="height:40px;" /></a>
							<a href="https://plus.google.com/+LightsinDarkTravelEventsPvtLtdNewDelhi" target="_blank">
							<img src="images/pdf/google+.png" style="height:40px;" /></a>
							
						</div>
						<div style="position: absolute;top: 60px;right: 150px;">
							<a href="http://lidtravel.com/" target="_blank"><img src="images/pdf/website.png" style="height: 20px;"></a>
							
						</div>
					</div>
				</div>
				<?php
					}
				?>
			</div>
			<?php 
				if($type != 'pdf')
				{
			?>
			<div class="box-footer text-right">
				<!--<a href="<?php echo $downloadPdfUrl; ?>" class="btn btn-info" id="download">Download PDF</a>-->
				<input type="hidden" id="calculated_prices" value="" />
				<input type="hidden" id="selected_rooms" value="" />
				<input type="hidden" id="selected_mealPlans" value="" />
				<button type="button" class="btn btn-info" id="download" onclick="downlaod_pdf('<?php echo '&searchData='.$_SERVER['REQUEST_URI'].'&hotel='.base64_encode($hotelData->hotel_name); ?>', 'downlaod')">Download PDF</button>&nbsp;&nbsp;&nbsp;
				<a class="btn btn-primary pull-right" href="#sendToCl" data-toggle="modal"><i class="fa fa-envelope-o"></i> Mail to Client</a>
				
			</div>
			<?php
				}
			?>
			</div>
		</div>
    </div><!-- /.row -->
</section><!-- /.content -->
</div>
</div>
<style>
a > img{outline:none;}
</style>
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="sendToCl" class="modal fade">
	<div class="modal-dialog mail-modal">
	   <form name="tour_mail" id="tour_mail" method="post" action="">
			<input type="hidden" name="mailFilePath" id="mailFilePath" value="0" />
			<input type="hidden" name="tourSub" id="tourSub" value="" />
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
							<input class="form-control" id="rescipent_emails" name="rescipent_emails" placeholder="Recipient Email Ids" value="" type="text">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<textarea cols="50" rows="3" class="form-control" name="email_body" id="email_body" placeholder="Comments">
									Dear ______<br/><br/>
									Greetings from <strong><span style="font-size: 19px;background: yellow; color:#00c0ef;">LiD – Travel </span>!!!</strong><br/><br/>
									Thank you for considering us for your forthcoming travel plan, in response please find attached tour proposal for your kind perusal as per the details provided by you.<br/><br/>
									We Hope all the above is in order and if you need any further clarification please call / write us.<br/><br/>
									Looking forward for a response/acknowledgment/confirmation on the same at the earliest.<br/><br/>
									Thanks and Regards !!!<br/>
									Ashish<br/>
									Team LiD</br/>
									m.+91(0)9990444740<br/><br/>
							</textarea>
						</div>
					</div>
				</div>
				
			  </div>
			  <div class="modal-footer">
				  <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
				  <img src="<?php echo base_url(); ?>assets/images/loader.gif" id="showLoaderEmail" style=" width: 26px; display:none;">
				  <button class="btn btn-success" type="button" id="sendEmail" onclick="downlaod_pdf('<?php echo '&searchData='.$_SERVER['REQUEST_URI'].'&hotel='.base64_encode($hotelData->hotel_name); ?>', 'email')">Send</button>
			  </div>
		  </div>
		</form>
	</div>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/form-ckeditor/ckeditor.js"></script>
<script type="text/javascript">
 $(function () {
 	CKEDITOR.env.isCompatible = true;

 	var titleEditor = CKEDITOR.replace( 'email_body', {
		width:'auto',
		height:200,
		startupFocus : false,
		customConfig: 'ckeditor_customconfig/ckeditor_config2.js'
	});

 	selected_mealTypes();
	selected_roomTypes();
	calculate_price();

	$(".userRoomTypes").change(function(){
		selected_roomTypes();
		calculate_price();
	});
	
	$(".mealTypes").change(function(){
		selected_mealTypes();
		calculate_price();
	});

 });

function selected_roomTypes()
{
	var userRooms = '';
	var i=0;
	$(".userRoomTypes").each(function(){
		i++;
		var val = $(this).val();
		userRooms += val+',';
	});
	$("#userSelectRoomTypes").val(userRooms);
}

function selected_mealTypes()
{
	var userMeals = '';
	var i=0;
	$(".mealTypes").each(function(){
		i++;
		var val = $(this).val();
		userMeals += val+',';
	});
	$("#userSelectMealTypes").val(userMeals);
}

function calculate_price()
{
	var priceMargin = $("#priceMargin").val()
	$.ajax({
		type:"POST",
		url:"<?php echo base_url(ADMIN_URL) ?>/calculatePrice",
		data:$("#formData").serialize(),
		beforeSend:function(){
			
		},
		success:function(html){
			var response = html;
			var priceArr = response.split(',"description"');
			var calPrice = priceArr[0]+'}';
			$("#calculated_prices").val(calPrice);
			var obj = JSON.parse(html);
			var desc = obj.description;
			calculate_priceWith_margin(priceMargin);
			
			if(desc != '')
			{
				$("#mealDescriptions").html(desc);
				$("#mealDesBox").show();
			}
			else
			{
				$("#mealDesBox").hide();
				$("#mealDescriptions").html('');
			}
		}
	});
}

function calculate_priceWith_margin(margin_val)
{
	var roomPrices = $("#calculated_prices").val();
	
	var obj = JSON.parse(roomPrices);
	var totalRooms = $(".userRoomTypes").length;
	var totPrice = 0;
	var roomprice = 0;

	for(var i=1; i<=totalRooms; i++)
	{
		roomprice = obj[i];
		roompriceWithmargin = roomprice + (roomprice*parseInt(margin_val)/100);
		$("#roomPrice_"+i).html(roompriceWithmargin);
		totPrice += parseInt(roompriceWithmargin);
	}
	$("#totalHotelPrice").html(totPrice);
	var serviceTax = (totPrice*5)/100;
	$("#serviceTax").html(serviceTax);
	var grandTotal = parseInt(totPrice) + parseInt(serviceTax);
	$("#grandTotal").html(grandTotal);
	
	var optVal = '';
	$(".userRoomTypes").each(function(){
		optVal += $(this).find("option:selected").text()+',';
	});

	$("#selected_rooms").val(optVal);
	
	var MealoptVal = '';
	$(".mealTypes").each(function(){
		MealoptVal += $(this).find("option:selected").text()+',';
	});
	
	$("#selected_mealPlans").val(MealoptVal);
}

function downlaod_pdf(param, action)
{
    // console.log(param);
    // console.log(action);
	var prices = $("#calculated_prices").val();
	var selc_prices = $("#selected_rooms").val();
	var selc_meal_plans = $("#selected_mealPlans").val();
	var queryNumber = $("#queryNumber").val();
	var priceMargin = $("#priceMargin").val();
	var base_url = "<?php echo base_url(); ?>";
	var data = "pdfType=hotel&prices="+prices+'&selRooms='+selc_prices+'&qNo='+queryNumber+'&pMargin='+priceMargin+'&selMealPlans='+selc_meal_plans;
	$.ajax({
		type:"POST",
		url:"<?php echo base_url() ?>"+'generate_pdf.php?'+param,
		data:data,
		beforeSend:function(){
			
		},
		success:function(html){
			if(action == 'downlaod')
			{
				window.open(
				  base_url+'download_pdf.php?f='+html,
				  '_blank' // <- This is what makes it open in a new window.
				);
			}
			else
			{
				for (instance in CKEDITOR.instances) {
					CKEDITOR.instances[instance].updateElement();
				}
				$("#mailFilePath").val(html);
				$.ajax({
					type: "POST",
					url: "<?php echo base_url() ?>"+'send_email.php',
					data: $("#tour_mail").serialize(),
					cache: false,
					beforeSend:function() {
						$("#showLoaderEmail").show();
					},
					success: function(html)
					{
						//alert(html);	
						if(html == '1')
						{
							alert('Email Sent Successfully');
							$('#sendToCl').modal('hide');
							$("#showLoaderEmail").hide();
						}
						else
						{
							alert('There is some error in sending email');
						}
					}
				});
			}
		}
	});
}
</script>