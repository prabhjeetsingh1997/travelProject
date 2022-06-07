<div class="col-md-11" id="contentCol">
<div id="wrapper">
<div id="layout-static">
<div class="static-content-wrapper">
<div class="static-content">
<div class="page-content" style="margin-top:;">
<!--<ol class="breadcrumb">-->
<!--   <li><a href="<?php //echo base_url(PARTNER) ?>/dashboard">Home</a></li>-->
<!--   <li><a href="#">View Hotel Details</a></li>-->
<!--</ol>-->

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
		 <?php
				}
				else
				{
					
				}
		 ?> 
          
		  <form id="formData" method="POST" action="<?php echo base_url(PARTNER)?>/editSearchedHoteldata" target="_blank">
			<input type="hidden" name="hotelId" id="hotelId" value='<?php echo $editHotelId; ?>'>
			<input type="hidden" name="partnerMarkup" id="partnerMarkup" value="<?php echo $markup; ?>">
			<!---------->
			<input type="hidden" name="Adultsinroom" id="Adultsinroom" value='<?php echo serialize($adults); ?>'>
			<input type="hidden" name="Childsinroom" id="Childsinroom" value='<?php echo serialize($child); ?>'>
			<input type="hidden" name="Infantsinroom" id="Infantsinroom" value='<?php echo serialize($infants); ?>'>
			<input type="hidden" name="Childsageforroom" id="Childsageforroom" value='<?php echo serialize($child_age); ?>'>
			<!---------->
			<input type="hidden" name="hotelDateId" id="hotelDateId" value='<?php echo $hotelDateIdStr; ?>'>
			<input type="hidden" name="masterRoomArr" id="masterRoomArr" value='<?php echo serialize($arrMasterRooms); ?>'>
			<input type="hidden" name="arrRoomType" id="arrRoomType" value='<?php echo serialize($arrRoomType); ?>'>
			<input type="hidden" name="roomTypesPriceArr" id="roomTypesPriceArr" value='<?php echo serialize($roomTypesPriceArr); ?>'>
			<input type="hidden" name="searchDataStr" id="searchDataStr" value='<?php echo $searchData; ?>'>
			<input type="hidden" name="userSelectRoomTypes" id="userSelectRoomTypes" value=''>
			<input type="hidden" name="userSelectMealTypes" id="userSelectMealTypes" value=''>
			<!--<input type="hidden" name="selectedRoomNames" id="selectedRoomNames" value="">-->
			<input type="hidden" name="selectedMealNames" id="selectedMealNames" value="">
		  </form>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="container">
          <div class="row">
			<div class="col-md-12">
			<div class="box box-default">

				<div class="box-body" style="">
	
					<div id="searchData" style="padding:15px 0;">
						<div style="<?php echo $border;?>padding:15px 5px 15px 5px;border-radius: 10px;float: left;width: 100%; margin-bottom:10px;background-color: white;">
						
						
							<div class="col-md-12">
							    <div class="col-md-12" style="box-shadow:3px 3px 4px grey; border-radius:10px;">
							    
								<div class="col-md-7">
								     	<?php
	                                       if($hotelData->hotel_photos != '') {
	 	                                      $photo = json_decode($hotelData->hotel_photos);
	 	                                      $showphoto = $photo[0];
	                                       } 
	                                      ?>
								    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                        <!-- Indicators -->
                                        <!--<ol class="carousel-indicators">-->
                                        <!--  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>-->
                                        <!--  <li data-target="#myCarousel" data-slide-to="1"></li>-->
                                        <!--  <li data-target="#myCarousel" data-slide-to="2"></li>-->
                                        <!--</ol>-->

                                        <!-- Wrapper for slides -->
                                        <div class="carousel-inner">
                                                <div class="item active">
                                                    <img src="<?php echo base_url().'uploads/hotel_photos/'.$showphoto; ?>" class="img-responsive" style="width:100%; padding: 2px;">
                                                </div>
                                        <?php
		                                      $hotelphotos = json_decode($hotelData->hotel_photos, true);
		                                      for($i=1; $i<count($hotelphotos); $i++ ) { ?>
                                                <div class="item">
                                                    <img src="<?php echo base_url().'uploads/hotel_photos/'.$hotelphotos[$i]; ?>" class="img-responsive" style="width:100%; padding: 2px;">
                                                </div>
                                        <?php 
		                                       } ?>
                                        </div>

                                        <!-- Left and right controls -->
                                        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                                                 <span class="glyphicon glyphicon-chevron-left"></span>
                                                 <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="right carousel-control" href="#myCarousel" data-slide="next">
                                                 <span class="glyphicon glyphicon-chevron-right"></span>
                                                 <span class="sr-only">Next</span>
                                        </a>
                                    </div>
								</div>
								<div class="col-md-5">
								    <h4>
								    <span style="font-size: 25px;"><i class='fa fa-home' aria-hidden='true'></i></span><?php echo " ".$hotelData->hotel_name;?>
								    <span><?php for($i=0; $i<$hotelData->hotel_star; $i++){ echo " <i class='fa fa-star' aria-hidden='true'></i>";}?></span><br>
								    <span style="font-size:14px;"><?php echo $hotelData->address_line_1.', '.$hotelData->address_line_2.', '.$hotelData->city_name.', '.$hotelData->state_name.', '.$hotelData->country_name;?></span><br><br>
								    <span style="font-size:14px;"><i class='fa fa-calendar' aria-hidden='true' style="font-size:18px;"></i><?php echo " From ".date('d, F Y',strtotime($startdate))." to ".date('d, F Y',strtotime($enddate));?></span><br><br>
								    <span style="font-size:14px;"><i class="fa fa-moon-o" aria-hidden="true" style="font-size:18px;"></i><?php echo " ".$stayDuration." Night(s), ".count($adults)." Room(s)";?></span><br><br>
								    <span style="font-size:14px;"><i class='fa fa-users' aria-hidden='true' style="font-size: 18px;"></i>
								                <?php
													if(is_array($adults))
													{
														echo array_sum($adults)." Adult(s)";?>
														<input type="hidden" name="totalAdults" id="totalAdults" value="<?php echo array_sum($adults);?>">
												<?php }
													else
													{
														echo $adults." Adult(s)"; ?>
														<input type="hidden" name="totalAdults" id="totalAdults" value="<?php echo $adults;?>">
												<?php	}
												?>  
												<?php
													if(is_array($child))
													{
													    if(!empty($child)){
													       echo ", ".array_sum($child)." Kid(s)";   
													    }?>
														<input type="hidden" name="totalKids" id="totalKids" value="<?php echo array_sum($child);?>">
												<?php }
													else
													{
													    if(!empty($child)) {
													        echo ", ".$child." Kid(s)";
													    } ?>
														<input type="hidden" name="totalKids" id="totalKids" value="<?php echo $child;?>">
												<?php }	
												  ?>
												<?php
												if(is_array($infants))
													{
													    if(!empty($infants)){
														echo ", ".array_sum($infants)." Infant(s)";
													    }?>
														<!--<input type="hidden" name="totalAdults" id="totalAdults" value="<?php //echo array_sum($adults);?>">-->
												<?php }
													else
													{
													    if(!empty($infants)){
														echo ", ".$infants." Infant(s)"; 
														}?>
														<!--<input type="hidden" name="totalAdults" id="totalAdults" value="<?php //echo $adults;?>">-->
												<?php	}
												?>
									    </span>
								    </h4>
								    
								    <h4 style="margin-top: 30px;">
								        <span><b>Rules & Policies</b></span><br>
									    <span style="font-size: 16px;"><?php echo "CHECK IN: ".$hotelData->check_in."&nbsp;CHECK OUT:".$hotelData->check_out;?></span><br>
									    <span style="font-size:14px;"><div style="background-color:antiquewhite; margin-top: 13px; padding: 15px 0px 15px 6px;">It is mandatory for all guests to give valid photo ID<br>at the time of check-in.</div></span>
								    </h4>
								</div>
								 <div class="col-md-12">
								    <h3><b>Description:</b></h3>
								    <div>
								        <h4 style="font-size:14px;text-align: justify;"><?php echo $hotelData->hotel_description; ?></h4>
								    </div>
								 </div>
								</div>
								<!--<h3>Details</h3>-->
								
								<!--<div class="col-md-12">-->
								<!--    <h3>Add Margin(%)</h3>-->
								<!--    <div class="hotelDetail">-->
								<!--	<table class="table table-bordered" cellspacing="0">-->
								<!--		<tr>-->
								<!--			<td>Entery your percentage</td>-->
								<!--			<td style="border: 1px solid #f4f4f4;padding: 8px;">-->
												<input type="number" id="priceMargin" value="0" onkeyup="calculate_priceWith_margin(this.value)" maxlength="2" style="display:none" />
								<!--			</td>-->
								<!--		</tr>-->
								<!--	</table>-->
								<!--    </div>-->
								<!--</div>-->
								
								<div class="col-md-12" style="padding:0;">
								
								<h3>Costing </h3>
								<div class="table-responsive">	
								<table class="table table-bordered" cellspacing="0" width="100%">
									<tr>
										<th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;padding: 8px;">Room</th>
										<th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;padding: 8px;">Adult(s)</th>
										<th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;padding: 8px;">Infant(s)</th>
										<th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;padding: 8px;">Kid(s)</th>
										<th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;padding: 8px;">Kids(s) Age</th>
										<th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;padding: 8px;">Room Type</th>
										<th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;padding: 8px;">Meal Plan</th>
										<th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;padding: 8px;">Price</th>
									</tr>
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
											<td style="border: 1px solid #f4f4f4;padding: 8px;"><span><img rel="icon" src="<?php echo base_url()?>assets/img/baby.png" type="image/png" style="width: 15px;"/></span> <?php echo $infantsp; ?></td>
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
												<?php //foreach($arrRoomType as $roomDetails) { ?>
												<a class="room_amenities" rel="<?php echo $i+1; ?>" data-target="modal" data-placement="top" title="Room Amenities">Room Amenities</a>
												<!--<div id="amenities_details_<?php //echo $i+1;?>" style="display:none;">-->
												    
												<!--</div>-->
												<?php //}?>
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
												<select class="form-control mealTypes" id="mealclass<?php echo $i+1; ?>" rel="<?php echo $i+1;?>">
													<?php echo $mealStr; ?>
												</select>
												<?php
													}
												?>
												<a class="meal_inclusions" rel="<?php echo $i+1; ?>" data-target="modal" data-placement="top" title="Meal Inclusions">Meal Inclusions</a>
												<!--<div id="meal_description<?php //echo $i+1;?>" style="display:none;">-->
												    <?php //echo $roomId;?>
												<!--</div>-->
											</td>
											<td style="border: 1px solid #f4f4f4;padding: 8px;"><span><i class="fa fa-inr" aria-hidden="true"></i></span><?php echo $rupeeSymbol; ?> <span id="roomPrice_<?php echo $i+1; ?>"><?php echo $pArr[$i]; ?></span></td>
										</tr>
										<?php	
										}
									?>
									<tr>
										<td colspan="7" style="text-align:center;border: 1px solid #f4f4f4;padding: 8px;">Total</td>
										<td style="border: 1px solid #f4f4f4;padding: 8px;"><span><i class="fa fa-inr" aria-hidden="true"></i></span><?php echo $rupeeSymbol; ?> <span id="totalHotelPrice"><?php echo $subTotal; ?></span></td>
									</tr>
									<!--<tr>-->
									<!--	<td colspan="7" style="text-align:center;border: 1px solid #f4f4f4;padding: 8px;">GST @ 5%</td>-->
									<!--	<td style="border: 1px solid #f4f4f4;padding: 8px;"><span><i class="fa fa-inr" aria-hidden="true"></i></span><?php //echo $rupeeSymbol; ?> <span id="serviceTax"><?php //echo $serviceTax; ?></span></td>-->
									<!--</tr>-->
									<!--<tr style="font-size: 18px;font-weight: 600;">-->
									<!--	<td colspan="7" style="text-align:center;border: 1px solid #f4f4f4;padding: 8px;">Grand Total</td>-->
									<!--	<td style="border: 1px solid #f4f4f4;padding: 8px;"><span><i class="fa fa-inr" aria-hidden="true"></i></span><?php //echo $rupeeSymbol; ?> <span id="grandTotal"><?php //echo number_format(floor($grandTot)); ?></span></td>-->
									<!--</tr>-->
							</table>
							</div>
							<div style="clear:both"></div>
							<h3>Inclusions:</h3>
							<ul id="deafultincl">
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
							<!--<div id="mealDesBox" style="<?php //echo $dispPckg; ?>">-->
							<!--	<div class="row">-->
							<!--	    <div class="col-md-12" id="mealdescrbox">-->
								        
							<!--	        <?php //if(!empty($roomrate_descr)) {?>-->
							<!--	        <h3 id="moreInclusion">Other Inclusions:</h3>-->
								        
							<!--	        <div class="col-md-3" id="mealDescriptionsBox">-->
								            <?php //if($roommeal_plan == 1){ echo "<h5 id='otherInclheading'>CP (Breakfast)</h5>";}
								            //if($roommeal_plan == 2){ echo "<h5 id='otherInclheading'>MAP (Breakfast+Dinner)</h5>";}
								            //if($roommeal_plan == 3){ echo "<h5 id='otherInclheading'>AP (Breakfast+Lunch+Dinner)</h5>";}
								            //if($roommeal_plan == 4){ echo "<h5 id='otherInclheading'>EP (Room Only)</h5>";}
								            //if($roommeal_plan == 5){ echo "<h5 id='otherInclheading'>CP Package</h5>";}
								            //if($roommeal_plan == 6){ echo "<h5 id='otherInclheading'>MAP Package</h5>";}
								            //if($roommeal_plan == 7){ echo "<h5 id='otherInclheading'>AP Package</h5>";}
								            //if($roommeal_plan == 8){ echo "<h5 id='otherInclheading'>EP Package</h5>";}?>
								            
							<!--	            <?php //echo $roomrate_descr; $desc; ?>-->
							<!--	        </div>-->
							<!--	          <?php //}?>  -->
							<!--	        <div class="col-md-3" id="cPmealDescriptions" style="display:none;">-->
								            
							<!--	        </div>  -->
							<!--	        <div class="col-md-3" id="MaPmealDescriptions" style="display:none;">-->
								            
							<!--	        </div>-->
							<!--	        <div class="col-md-3" id="APmealDescriptions" style="display:none;">-->
								            
							<!--	        </div>-->
							<!--	        <div class="col-md-3" id="EProomOnly" style="display:none;">-->
								            
							<!--	        </div>-->
							<!--	        <div class="col-md-3" id="CPpackageDescr" style="display:none;">-->
								            
							<!--	        </div>-->
							<!--	        <div class="col-md-3" id="MAPpackageDescr" style="display:none;">-->
								            
							<!--	        </div>-->
							<!--	        <div class="col-md-3" id="APpackageDescr" style="display:none;">-->
								            
							<!--	        </div>-->
							<!--	        <div class="col-md-3" id="EPpackageDescr" style="display:none;">-->
								            
							<!--	        </div>-->
								       
							<!--	    </div>-->
							<!--	</div>-->
							<!--</div>-->
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
								<img src="document/hotel_doc/hotel_room_pic/<?php //echo $image;?>" style="width:100%;padding: 2px;height: 158px;border: 1px solid #EEE;">
							</div>-->
						</div>
					</div>
					
					<div style="clear:both;"></div>
					
					
				</div>
				
			</div>
			<?php 
				if($type != 'pdf')
				{
			?>
			<div class="box-footer text-right">
				<!--<a href="<?php //echo $downloadPdfUrl; ?>" class="btn btn-info" id="download">Download PDF</a>-->
				<input type="hidden" id="calculated_prices" value="" />
				<input type="hidden" id="selected_rooms" value="" />
				<input type="hidden" id="selected_mealPlans" value="" />
				<input type="hidden" id="queryname" value="<?php echo $queryname; ?>" />
				<input type="hidden" id="empname" value="<?php echo $emp_name; ?>" />
				<input type="hidden" id="queryid" value="<?php echo $queryid; ?>" />
				<a class="btn btn-primary" id="confirmbtn" href="#confirmbooking" data-toggle="modal">Confirm</a>&nbsp;&nbsp;&nbsp;
				<input type="submit" form="formData" class="btn btn-success" value="Edit">&nbsp;&nbsp;&nbsp;
				<!--<button type="button" class="btn btn-info" id="download" onclick="downlaod_pdf('<?php //echo '&searchData='.$_SERVER['REQUEST_URI'].'&hotel='.base64_encode($hotelData->hotel_name); ?>', 'downlaod')">Download PDF</button>&nbsp;&nbsp;&nbsp;-->
				<!--<a class="btn btn-primary pull-right" href="#marginModal" data-toggle="modal"><i class="fa fa-envelope-o"></i> Mail to Client</a>-->
			</div>
			<?php
				}
			?>
			</div>
		</div>
    </div><!-- /.row -->
    </div>
</section><!-- /.content -->
</div>
</div>
<style>
a > img{outline:none;}
</style>
<!-----margin modal---->
 
<!--mail modal-->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="sendToCl" class="modal fade">
	<div class="modal-dialog mail-modal">
	   <form name="tour_mail" id="tour_mail" method="post" action="">
			<input type="hidden" name="mailFilePath" id="mailFilePath" value="0" />
			<input type="hidden" name="tourSub" id="tourSub" value="LiD<?php echo $queryid.' ';?>Travel Quotation" />
			<input type="hidden" name="empmail" id="empmail" value="<?php echo $emp_mail; ?>">
			<input type="hidden" name="emplname" id="emplname" value="<?php echo $emp_name; ?>">
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
									Dear ________<?php //if(!empty($queryname)){echo $queryname; }else { echo "______";}?><br/><br/>
									Greetings of the day<br/><br/>
									Myself <?php if(!empty($emp_name)){echo $emp_name; }else{ echo $name;}?>, I'll be handling all your arrangements regarding your tour package.</br></br>
									Thank you for considering us for your forthcoming travel plan, in response please find attached tour proposal for your kind perusal as per the details provided by you.<br/><br/>
									We Hope all the above is in order and if you need any further clarification please call / write us.<br/><br/>
									Looking forward for a response/acknowledgment/confirmation on the same at the earliest.<br/><br/>
									Thanks and Regards !!!<br/>
									<?php if(!empty($emp_name)){ echo $emp_name;}else{ echo $name;}?><br/>
									<!--Team LiD</br/>-->
									<?php if(!empty($emp_mobile)){ echo "m.+91".$emp_mobile;}else{ echo "m.+91".$mobile_no;}?><br/><br/>
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
<!--Confirm modal-->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="confirmbooking" class="modal fade">
	<div class="modal-dialog mail-modal">
	   <form name="Confirmhotel" id="Confirmhotel" method="post" action="">
	        <input type="hidden" name="emp_id" id="emp_id" value="<?php if($roleId == ROLE_ADMIN){echo ""; }else{echo $emp_id;} ?>">
	        <input type="hidden" name="handler_name" id="handler_name" value="<?php echo $name; ?>">
			<input type="hidden" name="partner_id" id="partner_id" value="<?php echo $partner_id; ?>">
			<input type="hidden" name="hotel_partner_id" id="hotel_partner_id" value="<?php echo $hotelData->hotel_partner_id; ?>">
			<input type="hidden" name="total_rooms" id="total_rooms" value="<?php echo count($adults);?>">
			
		  <div class="modal-content">
			  <div class="modal-header">
				  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				  <h4 class="modal-title"><i class="fa fa-home"></i><?php echo $hotelData->hotel_name;?></h4>
			  </div>
			 
			  <div class="modal-body">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Full Name</label>
							<input type="text" class="form-control" id="leadPaxname" name="leadPaxname" placeholder="Lead Pax. Name">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Mobile</label>
							<input type="text" class="form-control" id="PaxContact" name="PaxContact" placeholder="Enter Contact Number">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
					    <label>Check In</label>
						<div class="form-group">
						    <input class="form-control" value="<?php echo date('d, F Y',strtotime($startdate));?>" type="text" readonly>
						    <input type="hidden" id="check_in" name="check_in" value="<?php echo $startdate; ?>">
						</div>
					</div>
					<div class="col-md-6">
					    <label>Check Out</label>
						<div class="form-group">
						    <input class="form-control" value="<?php echo date('d, F Y',strtotime($enddate));?>" type="text" readonly>
						    <input type="hidden" id="check_out" name="check_out" value="<?php echo $enddate; ?>">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
					    <label>Total Pax.</label>
						<div class="form-group">
						    <input type="text" class="form-control" readonly value="<?php if(is_array($adults)){ echo array_sum($adults)." Adults +"; }	else {	echo $adults." Adults +";	} if(is_array($child)){echo array_sum($child)." Kids"; }else{	echo $child." Kids"; } ?>">
						  
						</div>
					</div>
					<div class="col-md-6">
					    <label>Nights</label>
						<div class="form-group">
						    <input class="form-control" id="total_nights" name="total_nights" value="<?php echo $stayDuration; ?>" type="text" readonly>
						</div>
					</div>
					<div class="col-md-12">
					    <label>Description</label>
						<div class="form-group">
						    <textarea class="form-control" id="hotel_description" name="hotel_description" rows="3"></textarea>
						</div>
					</div>
				</div>
				
			  </div>
			  <div class="modal-footer">
				  <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
				  <img src="<?php echo base_url(); ?>assets/images/loader.gif" id="showLoaderForConf" style=" width: 26px; display:none;">
				  <button class="btn btn-success" type="button" id="confHotelBooking" onclick="confHotelPackage()">Confirm</button>
			  </div>
		  </div>
		</form>
	</div>
</div>
<!----room amenities modal---->
<div id="qDetail" class="modal fade" role="dialog">
  <div class="modal-dialog" style="">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" id="modalHead"><i class="fa fa-home"></i><b><?php echo " ".$hotelData->hotel_name;?></b></h4>
      </div>
      <div class="modal-body" id="mdetail">
         
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        
      </div>
    </div>

  </div>
</div> 
<!--------->
<!----Meal Inclusions Modal----->
<div id="MealInclDetail" class="modal fade" role="dialog">
  <div class="modal-dialog" style="">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" id="modalHead"><i class="fa fa-home"></i><b><?php echo " ".$hotelData->hotel_name;?></b></h4>
      </div>
      <div class="modal-body" id="inclDetail">
         
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        
      </div>
    </div>

  </div>
</div> 
<!---------->
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
// 	    var hotel_id = $("#hotelId").val();
// 	    var id = $(this).attr('rel');
// 	    var startdate = '<?php //echo $startdate; ?>';
// 	    var endate = '<?php //echo $enddate?>';
//         var selmealvalue = $("#mealclass"+id).find('option:selected').val();
//         var selmealText = $("#mealclass"+id).find('option:selected').text();
//         //console.log(id+" "+startdate+" "+endate);
//         $.ajax({
//           type:"POST",
//           url:"<?php //echo base_url(PARTNER)?>/getMealplanDescriptionByid",
//           data:{meal_id: selmealvalue, startdate: startdate, endate: endate, hotel_id: hotel_id},
//           dataType:"JSON",
//           beforeSend:function(){
//               $("#custom-loader").css("display","block");
//           },
//           success:function(data){
//               //$("#moreInclusion").text("");
//               //if(data.description !==""){
//                   $("#moreInclusion").text("Other Inclusions:");
//                   //$("#mealDescriptionsBox").css("display","none");
//                   var defaultSelmeal = $("#otherInclheading").text();
                   
//                     if(selmealText == defaultSelmeal){
//                       //alert("match");
//                       $("#mealDescriptionsBox").css("display","none");
//                     }else{
//                         //alert("different");
//                         if(selmealText == "CP (Breakfast)"){
                            
//                         }
//                     }           
//           },
//             complete: function() {
// 				$("#custom-loader").css("display","none");
// 			}
//         });
		selected_mealTypes();
		calculate_price();
	});

 });
 
 $(".meal_inclusions").click(function(){
     
        $("#MealInclDetail").modal();
        var hotel_id = $("#hotelId").val();
        var id = $(this).attr('rel');
        var startdate = '<?php echo $startdate; ?>';
	    var endate = '<?php echo $enddate?>';
        var selmealvalue = $("#mealclass"+id).find('option:selected').val();
        var meal_name = $("#mealclass"+id).find('option:selected').text();
        
        $.ajax({
            type:"POST",
            url:"<?php echo base_url(PARTNER)?>/getMealplanDescriptionByid",
            data:{meal_id: selmealvalue, startdate: startdate, endate: endate, hotel_id: hotel_id},
            dataType:"JSON",
            beforeSend:function(){
                $("#custom-loader").css("display","block");
            },
            success:function(data){
                $("#inclDetail").html("");
                var dscr = data.description;
                var rep = dscr.replace(/\r\n/g,"\n");
                var split = rep.split("\n");
                
                 if(data != null){
				    $("#inclDetail").append("<div><h4>Meal Inclusion:</h4>'"+split+"'</div>");
				   }
            },
            complete: function() {
				$("#custom-loader").css("display","none");
				
			}
        });
 });

$(".room_amenities").click(function(){
          $("#qDetail").modal();
          
          var hotel_id = $("#hotelId").val();
          var id = $(this).attr('rel');
          var room_id = $("#class"+id).find('option:selected').val();
          var room_name = $("#class"+id).find('option:selected').text();
          
          $.ajax({
            type:"POST",
            url:"<?php echo base_url(PARTNER)?>/getRoomAmenitiesByid",
            data:{hotel_id: hotel_id, room_id: room_id},
            dataType:"JSON",
            beforeSend:function(){
                $("#custom-loader").css("display","block");
            },
            success:function(data){
                //console.log(JSON.parse(data));
                $("#mdetail").html("");
                if(data !== null){
                    
                    var amenities = data.room_amenities;
                    var amenityarr = amenities.split(",");
                    var dataamenity = '';
                    for(var i=0; i<amenityarr.length; i++)
                    { 
                      dataamenity += "<div class='col-md-12'><div class='col-md-12' style='font-size: 18px;'><i class='fa fa-check-square' aria-hidden='true'><span style='font-family: Open Sans, Droid Sans, Tahoma, Arial, sans-serif;'>"+" "+amenityarr[i]+"</span></i></div></div>";
                    }
                    
                    $("#mdetail").append('<div class="row"><div class="col-md-12"><h4><b>'+room_name+'</b></h4></div><div class="col-md-12"><img src="<?php echo base_url()?>uploads/hotel_room_photos/'+data.room_pics+'" class="img-responsive" style="width:100%; height:350px;"><div><div class="col-md-12"><h4 style="text-align: justify;"><b>Description:</b><br><div style="background-color:bisque;padding: 10px;"><span style="font-size:16px;"> '+data.room_description+'</span><div></h4></div><div class="col-md-12"><h4><b>Room Amenities:</b><br>'+dataamenity+'</h4></div></div>');
                    
                    
                }else{
                    $("#mdetail").html("no data found");
                }
            },
            complete: function() {
				$("#custom-loader").css("display","none");
				//$("#mdetail").clear();
				
			}
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
		//console.log(val);
	});
	$("#userSelectMealTypes").val(userMeals);
}

function calculate_price()
{
	var priceMargin = $("#priceMargin").val()
	$.ajax({
		type:"POST",
		url:"<?php echo base_url(PARTNER) ?>/calculatePrice",
		data:$("#formData").serialize(),
		beforeSend:function(){
			
		},
		success:function(html){
		    //console.log(html);
			var response = html;
			var priceArr = response.split(',"description"');
			var calPrice = priceArr[0]+'}';
			$("#calculated_prices").val(calPrice);
			var obj = JSON.parse(html);
			var desc = obj.description;
			calculate_priceWith_margin(priceMargin);
			//calculate_priceWith_marginAmount(priceMargin);
			
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

$("#priceMargin").on("keyup", function(){
    $("#marginbyAmount").attr("disabled", true);
    if($(this).val() == ""){
        $("#marginbyAmount").attr("disabled", false);
    }
   
});
$("#marginbyAmount").on("keyup", function(){
    $("#priceMargin").attr("disabled", true);
    
    if($(this).val() == ""){
        $("#priceMargin").attr("disabled", false);    
    }
    
});

function calculate_priceWith_marginAmount()
{
    var margin_amount = $('#marginbyAmount').val();
        if(margin_amount == ""){
           margin_amount = 0;
           var roomPrices = $("#calculated_prices").val();
	       var obj = JSON.parse(roomPrices);
	       var partnermarkup = $("#partnerMarkup").val();
	       var totalRooms = $(".userRoomTypes").length;
	       var totPrice = 0;
	       var roomprice = 0;

	       for(var i=1; i<=totalRooms; i++)
	       {
		       roomprice = obj[i];
		       roompriceWithmargin = roomprice + (roomprice*parseInt(partnermarkup)/100) + (roomprice*parseInt(partnermarkup)/100*18/100);
		       addMarginOnroomprice = roompriceWithmargin + (parseInt(margin_amount)/totalRooms);  
		       $("#roomPrice_"+i).html(Math.round(addMarginOnroomprice));
		       totPrice += parseInt(Math.round(addMarginOnroomprice));
	       }
	       $("#totalHotelPrice").html(totPrice);
	       $("#totalPriceWOmargin").html(totPrice);
	       var serviceTax = Math.round((totPrice*5)/100);
	       $("#serviceTax").html(serviceTax);
	       var grandTotal = parseInt(totPrice) + parseInt(serviceTax);
	       $("#grandTotal").html(grandTotal);
	       
           }else{
               var roomPrices = $("#calculated_prices").val();
	           var obj = JSON.parse(roomPrices);
	           var partnermarkup = $("#partnerMarkup").val();
	           var totalRooms = $(".userRoomTypes").length;
	           var totPrice = 0;
	           var roomprice = 0;

	           for(var i=1; i<=totalRooms; i++)
	           {
		           roomprice = obj[i];
		           roompriceWithmargin = roomprice + (roomprice*parseInt(partnermarkup)/100) + (roomprice*parseInt(partnermarkup)/100*18/100);
		           addMarginOnroomprice = roompriceWithmargin + (parseInt(margin_amount)/totalRooms);  
		           $("#roomPrice_"+i).html(Math.round(addMarginOnroomprice));
		           totPrice += parseInt(Math.round(addMarginOnroomprice));
	           }
	           $("#totalHotelPrice").html(totPrice);
	           $("#totalPriceWOmargin").html(totPrice);
	           var serviceTax = Math.round((totPrice*5)/100);
	           $("#serviceTax").html(serviceTax);
	           var grandTotal = parseInt(totPrice) + parseInt(serviceTax);
	           $("#grandTotal").html(grandTotal);
           }
    
	
}
function calculate_priceWith_margin(margin_val)
{
    if(margin_val == ""){
        margin_val = 0;
        var roomPrices = $("#calculated_prices").val();
	    var obj = JSON.parse(roomPrices);
	    var partnermarkup = $("#partnerMarkup").val();
	    var totalRooms = $(".userRoomTypes").length;
	    var totPrice = 0;
	    var roomprice = 0;

	    for(var i=1; i<=totalRooms; i++)
	    {
		    roomprice = obj[i];
		    roompriceWithmargin = roomprice + (roomprice*parseInt(partnermarkup)/100) + (roomprice*parseInt(partnermarkup)/100*18/100);
		    addMarginOnroomprice = roompriceWithmargin + (roompriceWithmargin*parseInt(margin_val)/100); 
		    $("#roomPrice_"+i).html(Math.round(addMarginOnroomprice));
		    totPrice += parseInt(Math.round(addMarginOnroomprice));
	    }
	    $("#totalHotelPrice").html(totPrice);
	    $("#totalPriceWOmargin").html(totPrice);
	    var serviceTax = Math.round((totPrice*5)/100);
	    $("#serviceTax").html(serviceTax);
	    var grandTotal = parseInt(totPrice) + parseInt(serviceTax);
	    $("#grandTotal").html(grandTotal);
    }else{
        var roomPrices = $("#calculated_prices").val();
	    var obj = JSON.parse(roomPrices);
	    var partnermarkup = $("#partnerMarkup").val();
	    var totalRooms = $(".userRoomTypes").length;
	    var totPrice = 0;
	    var roomprice = 0;

	    for(var i=1; i<=totalRooms; i++)
	    {
		    roomprice = obj[i];
		    roompriceWithmargin = roomprice + (roomprice*parseInt(partnermarkup)/100) + (roomprice*parseInt(partnermarkup)/100*18/100);
		    addMarginOnroomprice = roompriceWithmargin + (roompriceWithmargin*parseInt(margin_val)/100); 
		    $("#roomPrice_"+i).html(Math.round(addMarginOnroomprice));
		    totPrice += parseInt(Math.round(addMarginOnroomprice));
	    }
	    $("#totalHotelPrice").html(totPrice);
	    $("#totalPriceWOmargin").html(totPrice);
	    var serviceTax = Math.round((totPrice*5)/100);
	    $("#serviceTax").html(serviceTax);
	    var grandTotal = parseInt(totPrice) + parseInt(serviceTax);
	    $("#grandTotal").html(grandTotal);
        
    }
	
	
	var optVal = '';
	$(".userRoomTypes").each(function(){
		optVal += $(this).find("option:selected").text()+',';
	});

	$("#selected_rooms").val(optVal);
	//$("#selectedRoomNames").val(optVal);
	
	var MealoptVal = '';
	$(".mealTypes").each(function(){
		MealoptVal += $(this).find("option:selected").text()+',';
	});
	
	$("#selected_mealPlans").val(MealoptVal);
	$("#selectedMealNames").val(MealoptVal);
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
	var queryName = $("#queryname").val();
	var empName = $("#empname").val();
	var queryId = $("#queryid").val();
	var partnerMarkup = $("#partnerMarkup").val();
	var base_url = "<?php echo base_url(); ?>";
	var data = "pdfType=hotel&prices="+prices+'&selRooms='+selc_prices+'&qNo='+queryNumber+'&pMargin='+priceMargin+'&selMealPlans='+selc_meal_plans+'&queryName='+queryName+'&empName='+empName+'&queryId='+queryId+'&partnerMarkup='+partnerMarkup;
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
				for(instance in CKEDITOR.instances) {
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
function confHotelPackage(){
    
    var data = {
        leadPaxname : $("#leadPaxname").val(),
        PaxContact : $("#PaxContact").val(),
        hotelId: $("#hotelId").val(),
        totalAdults: $("#totalAdults").val(),
        totalKids: $("#totalKids").val(),
        check_in: $("#check_in").val(),
        check_out: $("#check_out").val(),
        total_rooms:$("#total_rooms").val(),
        total_nights:$("#total_nights").val(),
        priceMargin:$("#priceMargin").val(),
        Adultsinroom: $("#Adultsinroom").val(),
        Childsinroom:$("#Childsinroom").val(),
        Infantsinroom: $("#Infantsinroom").val(),
        Childsageforroom: $("#Childsageforroom").val(),
        userSelectRoomTypes: $("#userSelectRoomTypes").val(),
        userSelectMealTypes: $("#userSelectMealTypes").val(),
        emp_id: $("#emp_id").val(),
        handler_name: $("#handler_name").val(),
        hotel_partner_id: $("#hotel_partner_id").val(),
        hotel_confirmation : "Waiting",
        prices : $("#calculated_prices").val(),
        hotel_description : $("#hotel_description").val(),
        //totalHotelPrice : $("totalHotelPrice").html(),
        //masterRoomArr : $("#masterRoomArr").val(),
    };
    
    
    $.ajax({
        type: "POST",
        url: "<?php echo base_url(PARTNER) ?>/saveHotelpackage",
        data: data,
        //datatype:"json",
        beforSend:function(){
            $("#showLoaderForConf").show();
        },
        success:function(html){
            
            if(html == 1){
                alert("success");
                $("#confirmbooking").modal('hide');
                $("#showLoaderForConf").hide();
                $("#confirmbtn").attr("disabled", true);
                $("#confirmbtn").text("Saved");
                
            }else{
                alert("failed");
            }
        },
        
    });
}
</script>