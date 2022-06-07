<div id="wrapper">
<div id="layout-static">
<div class="static-content-wrapper">
<div class="static-content">
<div class="page-content" style="margin-top:80px;">
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
          
		  <form id="formData">
			<input type="hidden" name="hotelId" id="hotelId" value='<?php echo $editHotelId; ?>'>
			<input type="hidden" name="partnerMarkup" id="partnerMarkup" value="<?php echo $markup; ?>">
			<!---------->
			<input type="hidden" name="Adultsinroom" id="Adultsinroom" value='<?php //echo serialize($adults); ?>'>
			<input type="hidden" name="Childsinroom" id="Childsinroom" value='<?php //echo serialize($child); ?>'>
			<input type="hidden" name="Infantsinroom" id="Infantsinroom" value='<?php //echo serialize($infants); ?>'>
			<input type="hidden" name="Childsageforroom" id="Childsageforroom" value='<?php //echo serialize($child_age); ?>'>
			<!---------->
			<input type="hidden" name="hotelDateId" id="hotelDateId" value='<?php echo $hotelDateIdStr; ?>'>
			<input type="hidden" name="masterRoomArr" id="masterRoomArr" value='<?php echo serialize($arrMasterRooms); ?>'>
			<input type="hidden" name="arrRoomType" id="arrRoomType" value='<?php echo serialize($arrRoomType); ?>'>
			<input type="hidden" name="roomTypesPriceArr" id="roomTypesPriceArr" value='<?php echo serialize($roomTypesPriceArr); ?>'>
			<input type="hidden" name="searchDataStr" id="searchDataStr" value='<?php echo $searchData; ?>'>
			<input type="hidden" name="userSelectRoomTypes" id="userSelectRoomTypes" value='<?php echo $userSelectRoomTypes; ?>'>
			<input type="hidden" name="userSelectMealTypes" id="userSelectMealTypes" value='<?php echo $userSelectedMealTypes; ?>'>
		  </form>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="container">
          <div class="row">
			<div class="col-md-12">
			<div class="box box-default">

				<div class="box-body" style="">
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
						<div style="<?php echo $border;?>padding:15px 5px 15px 5px;border-radius: 10px;float: left;width: 100%; margin-bottom:10px;background-color: white;">
						
						
							<div class="col-md-12">
							    <div class="col-md-12" style="box-shadow:3px 3px 4px grey; border-radius:10px;">
							    
								<div class="col-md-7" >
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
												<?php }
												?>  
												<?php 
												    if(!empty($child))
												    {
													if(is_array($child))
													{
														echo ", ".array_sum($child)." Kid(s)"; ?>
														<input type="hidden" name="totalKids" id="totalKids" value="<?php echo array_sum($child);?>">
												<?php	}
													else
													{
														echo ", ".$child." Kid(s)"; ?>
														<input type="hidden" name="totalKids" id="totalKids" value="<?php echo $child;?>">
												<?php	}	
												 } ?>
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
								
								<div class="col-md-12" style="padding:0;">
								
								<h3>Costing </h3>
								<div class="table-responsive">
								    <input type="hidden" id="totalRooms" value="<?php echo count($adults); ?>">	
								<table class="table table-bordered" cellspacing="0" width="100%">
									<tr>
										<th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;padding: 8px;">Room</th>
										<th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;padding: 8px;">Adult(s)</th>
										<th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;padding: 8px;">Infant(s)</th>
										<th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;padding: 8px;">Kid(s)</th>
										<th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;padding: 8px;">Kids(s) Age</th>
										<th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;padding: 8px;">Room Type</th>
										<th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;padding: 8px;">Meal Plan</th>
										<th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;padding: 8px; width: 180px;">Price</th>
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
												
												<?php foreach($arrRoomType as $roomTypes){
												   
													if($selectedRooms[$i] == $roomTypes['room_id'])
													{ 
													    echo $roomTypes['room_type'];   
													}
													
												} ?>
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
                                                        
                                                        if($userSelectMealTypes[$i] == $mP)
                                                        { 
                                                            echo $mealTxt;   
                                                        }
                                                        
                                                        ?>
                                                        
                                                     <?php
                                                     }?>
												
											</td>
											<td style="border: 1px solid #f4f4f4;padding: 8px;"><span><i class="fa fa-inr" aria-hidden="true"></i></span><?php echo $rupeeSymbol; ?> <span id="roomPrice_<?php echo $i+1; ?>"><?php echo $pArr[$i]; ?></span></td>
										</tr>
										<?php	
										}
									?>
									<tr style="font-size: 18px;font-weight: 600;">
										<td colspan="7" style="text-align:center;border: 1px solid #f4f4f4;padding: 8px;">Total<div><span id="taxesIncl" style="font-size:12px; margin-left: 85%;">*GST Excluded</span></div></td>
										<td style="border: 1px solid #f4f4f4;padding: 8px;"><span><i class="fa fa-inr" aria-hidden="true"></i></span><?php echo $rupeeSymbol; ?> <span id="totalHotelPrice"><?php echo $subTotal; ?></span></td>
									</tr>
									<tr>
									    <td colspan="7" style="text-align:center; border: 1px solid #f4f4f4;padding: 8px;">Enter Your Margin&nbsp;</td>
									    <td style="border: 1px solid #f4f4f4;padding: 8px;"><input type="number" id="priceMargin" placeholder="In Percentage(%)" value="" onkeyup="calculate_priceWith_margin(this.value)" maxlength="2" /><br>or<br><input type="text" class="" style="width:auto;" placeholder="In Amount" id="marginbyAmount" onkeyup="calculate_priceWith_marginAmount()" value=""></td>
									</tr>
									<tr>
									    <td colspan="8" style="text-align:right; border: 1px solid #f4f4f4;padding: 8px;">
									        <span><input type="checkbox" class="" id="checkGST"><span id="inclornot"> (include GST or not)</span></span>
									        <input type="hidden" id="TaxIncl" value="0">
									    </td>
									</tr>
									<!--<tr>-->
									<!--	<td colspan="7" style="text-align:center;border: 1px solid #f4f4f4;padding: 8px;">GST @ 5%</td>-->
									<!--	<td style="border: 1px solid #f4f4f4;padding: 8px;"><span><i class="fa fa-inr" aria-hidden="true"></i></span><?php //echo $rupeeSymbol; ?> <span id="serviceTax"><?php //echo $serviceTax; ?></span></td>-->
									<!--</tr>-->
									<!--<tr style="font-size: 18px;font-weight: 600;">-->
									<!--	<td colspan="7" style="text-align:center;border: 1px solid #f4f4f4;padding: 8px;">Grand Total</td>-->
										<!--<td style="border: 1px solid #f4f4f4;padding: 8px;"><span><i class="fa fa-inr" aria-hidden="true"></i></span><?php //echo $rupeeSymbol; ?> <span id="grandTotal"><?php //echo number_format(floor($grandTot)); ?></span></td>-->
									<!--</tr>-->
							</table>
							</div>
							<div style="clear:both"></div>
							<!--<div class="col-md-12">-->
							    
							<!--</div>-->
							<h3>Inclusions:</h3>
							<ul id="deafultincl">
								<li>Welcome drinks on Arrival at hotel/resort. (Non alcoholic)</li>
								<li>Accommodation as per above details.</li>
								<li>Meals as above mentioned Meal Plan.</li>
								<li>All kind of applicable hotel, transport, service &amp; govt. taxes.</li>
								<?php
								foreach($selMealDescription as $descr){ 
								if($descr['meal_plan'] == 1){  
							                 $list = explode("\n", $descr['description']); ?> 
							             <li>CP (Breakfast) Plan Inclusions:
							                 <ul>
							                  <?php
                                              foreach($list as $num => $item) {
                                                echo "<li>" . htmlspecialchars($item) . "</li>";
                                              } ?>
							                 </ul>
							             </li>  
								<?php }
								if($descr['meal_plan'] == 2){  
							                 $list = explode("\n", $descr['description']); ?> 
							             <li>MAP (Breakfast+Dinner) Plan Inclusions:
							                 <ul>
							                  <?php
                                              foreach($list as $num => $item) {
                                                echo "<li>" . htmlspecialchars($item) . "</li>";
                                              } ?>
							                 </ul>
							             </li>  
								<?php }
								if($descr['meal_plan'] == 3){  
							                 $list = explode("\n", $descr['description']); ?> 
							             <li>AP (Breakfast+Lunch+Dinner) Plan Inclusions:
							                 <ul>
							                  <?php
                                              foreach($list as $num => $item) {
                                                echo "<li>" . htmlspecialchars($item) . "</li>";
                                              } ?>
							                 </ul>
							             </li>  
								<?php }
								if($descr['meal_plan'] == 4){  
							                 $list = explode("\n", $descr['description']); ?> 
							             <li>EP (Room Only) Plan Inclusions:
							                 <ul>
							                  <?php
                                              foreach($list as $num => $item) {
                                                echo "<li>" . htmlspecialchars($item) . "</li>";
                                              } ?>
							                 </ul>
							             </li>  
								<?php }
								if($descr['meal_plan'] == 5){  
							                 $list = explode("\n", $descr['description']); ?> 
							             <li>CP Package Plan Inclusions:
							                 <ul>
							                  <?php
                                              foreach($list as $num => $item) {
                                                echo "<li>" . htmlspecialchars($item) . "</li>";
                                              } ?>
							                 </ul>
							             </li>  
								<?php }
								if($descr['meal_plan'] == 6){  
							                 $list = explode("\n", $descr['description']); ?> 
							             <li>MAP Package Plan Inclusions:
							                 <ul>
							                  <?php
                                              foreach($list as $num => $item) {
                                                echo "<li>" . htmlspecialchars($item) . "</li>";
                                              } ?>
							                 </ul>
							             </li>  
								<?php }
								if($descr['meal_plan'] == 7){  
							                 $list = explode("\n", $descr['description']); ?> 
							             <li>AP Package Plan Inclusions:
							                 <ul>
							                  <?php
                                              foreach($list as $num => $item) {
                                                echo "<li>" . htmlspecialchars($item) . "</li>";
                                              } ?>
							                 </ul>
							             </li>  
								<?php }
								if($descr['meal_plan'] == 8){  
							                 $list = explode("\n", $descr['description']); ?> 
							             <li>EP Package Plan Inclusions:
							                 <ul>
							                  <?php
                                              foreach($list as $num => $item) {
                                                echo "<li>" . htmlspecialchars($item) . "</li>";
                                              } ?>
							                 </ul>
							             </li>  
								<?php }
								 } ?>
								
							</ul>
							
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
							<h3 id="OtherRemarks" style="display:none;">Special Remarks:</h3>
							<div id="extraRemarkDiv"></div>
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
				<input type="hidden" id="calculated_prices" value=""/>
				<input type="hidden" id="selected_rooms" value="<?php echo $selectedRoomNames; ?>"/>
				<input type="hidden" id="selected_mealPlans" value="<?php echo $selectedMealNames; ?>"/>
				<input type="hidden" id="queryname" value="<?php //echo $queryname; ?>" />
				<input type="hidden" id="empname" value="<?php echo $name; ?>"/>
				<input type="hidden" id="queryid" value="<?php //echo $queryid; ?>"/>
				<input type="hidden" id="emp_mobile" value="<?php echo $mobile_no; ?>">
				<button type="button" class="btn btn-warning" id="extraRemark">Add Remarks</button>
				<button type="button" class="btn btn-info" id="download" onclick="downlaod_pdf('<?php echo '&searchData='.$_SERVER['REQUEST_URI'].'/'.$editHotelId.'/'.$searchData.'&hotel='.base64_encode($hotelData->hotel_name); ?>', 'downlaod')">Download PDF</button>&nbsp;&nbsp;&nbsp;
				<a class="btn btn-primary pull-right" href="#sendToCl" data-toggle="modal"><i class="fa fa-envelope-o"></i> Mail to Client</a>
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
<!-----Remark Modal------->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="NewRemark" class="modal fade">
    <div class="modal-dialog mail-modal">
        <div class="modal-content">
            <div class="modal-header">
			   <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			   <h4 class="modal-title">Add Remarks</h4>
			</div>
			<div class="modal-body">
			    <div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<textarea cols="50" class="form-control" name="remarksArea" id="remarksArea" placeholder="Enter Remarks"></textarea>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				  <button data-dismiss="modal" class="btn btn-danger" type="button">Close</button>
				  <img src="<?php echo base_url(); ?>assets/images/loader.gif" id="showLoaderEmail" style=" width: 26px; display:none;">
				  <button class="btn btn-success" type="button" id="SaveRemarks" >Save</button>
			</div>
        </div>
    </div>
</div>
<!--mail modal-->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="sendToCl" class="modal fade">
	<div class="modal-dialog mail-modal">
	   <form name="tour_mail" id="tour_mail" method="post" action="">
			<input type="hidden" name="mailFilePath" id="mailFilePath" value="0" />
			<input type="hidden" name="tourSub" id="tourSub" value="LiD<?php echo $queryid.' ';?>Travel Quotation" />
			<input type="hidden" name="empmail" id="empmail" value="<?php echo $email; ?>">
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
				  <img src="<?php echo base_url(); ?>assets/images/loader.gif" id="showLoaderEmail" style="width:26px; display:none;">
				  <button class="btn btn-success" type="button" id="sendEmail" onclick="downlaod_pdf('<?php echo '&searchData='.$_SERVER['REQUEST_URI'].'/'.$editHotelId.'/'.$searchData.'&hotel='.base64_encode($hotelData->hotel_name); ?>', 'email')">Send</button>
			  </div>
		  </div>
		</form>
	</div>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/form-ckeditor/ckeditor.js"></script>
<script type="text/javascript">
    $(function(){
        
        CKEDITOR.env.isCompatible = true;
 	    var titleEditor = CKEDITOR.replace( 'email_body', {
		    width:'auto',
		    height:200,
		    startupFocus : false,
		    customConfig: 'ckeditor_customconfig/ckeditor_config2.js'
	    });
	    
	    var RemarkEditor = CKEDITOR.replace( 'remarksArea', {
		    width:'auto',
		    height:200,
		    startupFocus : false,
		    customConfig: 'ckeditor_customconfig/ckeditor_config2.js'
	    });

 	    //selected_mealTypes();
	    //selected_roomTypes();
	    calculate_price();
	    
    });
    
    $("#extraRemark").on("click", function(){
        $("#NewRemark").modal();
    });
    
    $('#SaveRemarks').on("click", function(){
        for(instance in CKEDITOR.instances) {
			CKEDITOR.instances[instance].updateElement();
		}
        var remarksArea = $('#remarksArea').val();
        if(remarksArea !== ''){
            $("#OtherRemarks").css("display","block");
          //alert("true");
        }else{
            $("#OtherRemarks").css("display","none");
            //alert("false");
        }
        
        $("#extraRemarkDiv").html(remarksArea); 
        
    });
    
    $("#checkGST").on("click", function(){
    
        if($(this).is(":checked")){
        
            $("#inclornot").text(" GST Included");
            $("#TaxIncl").val(1);
            // var ul = document.getElementById("deafultincl");
            // var li = document.createElement("li");
            // li.appendChild(document.createTextNode("GST Inlcuded."));
            // ul.appendChild(li);
            $("#taxesIncl").text(" *GST Included");
        }else{
            $("#TaxIncl").val(0);
            $("#inclornot").text(" GST Excluded");
            $("#taxesIncl").text(" *GST Excluded"); 
        }
    });
    
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
    
    function calculate_priceWith_margin(margin_val)
    {
            if(margin_val == ""){
               margin_val = 0;
                var roomPrices = $("#calculated_prices").val();
	            var obj = JSON.parse(roomPrices);
	            var partnermarkup = $("#partnerMarkup").val();
	            //var totalRooms = $(".userRoomTypes").length;
	            var totalRooms = $("#totalRooms").val();
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
	            //$("#totalPriceWOmargin").html(totPrice);
	           // var serviceTax = Math.round((totPrice*5)/100);
	           // $("#serviceTax").html(serviceTax);
	           // var grandTotal = parseInt(totPrice) + parseInt(serviceTax);
	            $("#grandTotal").html(totPrice);
            }else{
                var roomPrices = $("#calculated_prices").val();
	            var obj = JSON.parse(roomPrices);
	            var partnermarkup = $("#partnerMarkup").val();
	            //var totalRooms = $(".userRoomTypes").length;
	            var totalRooms = $("#totalRooms").val();
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
	           // $("#totalPriceWOmargin").html(totPrice);
	           // var serviceTax = Math.round((totPrice*5)/100);
	           // $("#serviceTax").html(serviceTax);
	           // var grandTotal = parseInt(totPrice) + parseInt(serviceTax);
	            $("#grandTotal").html(totPrice);
        
            }
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
	       //var totalRooms = $(".userRoomTypes").length;
	       var totalRooms = $("#totalRooms").val();
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
	       //$("#totalPriceWOmargin").html(totPrice);
	       //var serviceTax = Math.round((totPrice*5)/100);
	       //$("#serviceTax").html(serviceTax);
	       //var grandTotal = parseInt(totPrice) + parseInt(serviceTax);
	       $("#grandTotal").html(totPrice);
	       
           }else{
               var roomPrices = $("#calculated_prices").val();
	           var obj = JSON.parse(roomPrices);
	           var partnermarkup = $("#partnerMarkup").val();
	           //var totalRooms = $(".userRoomTypes").length;
	           var totalRooms = $("#totalRooms").val();
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
	           //$("#totalPriceWOmargin").html(totPrice);
	           //var serviceTax = Math.round((totPrice*5)/100);
	           //$("#serviceTax").html(serviceTax);
	           //var grandTotal = parseInt(totPrice) + parseInt(serviceTax);
	           $("#grandTotal").html(totPrice);
           }
    }
    
    function downlaod_pdf(param, action)
    {
	    var prices = $("#calculated_prices").val();
	    var selc_prices = $("#userSelectRoomTypes").val();
	    var selc_meal_plans = $("#selected_mealPlans").val();
	    var meal_plans_val = $("#userSelectMealTypes").val();
	    //var queryNumber = $("#queryNumber").val();
	    var priceMargin = $("#priceMargin").val();
	    var priceMarginAmt = $("#marginbyAmount").val();
	    //var queryName = $("#queryname").val();
	    var empname = $("#empname").val();
	    //var queryId = $("#queryid").val();
	    var partnerMarkup = $("#partnerMarkup").val();
	    var spcl_remarks = $("#extraRemarkDiv").text();
	    var emp_mobile = $("#emp_mobile").val();
	    var emp_email = $("#empmail").val();
	    var taxesIncl = $("#TaxIncl").val();
	    var base_url = "<?php echo base_url(); ?>";
	    var data = "pdfType=hotel&prices="+prices+'&selRooms='+selc_prices+'&emp_mobile='+emp_mobile+'&emp_email='+emp_email+'&empname='+empname+'&pMargin='+priceMargin+'&marginAmt='+priceMarginAmt+'&selMealPlans='+selc_meal_plans+'&selMealPlansVal='+meal_plans_val+'&partnerMarkup='+partnerMarkup+'&spcl_Remark='+spcl_remarks+'&taxesIncl='+taxesIncl;
	    $.ajax({
		    type: "POST",
		    url: "<?php echo base_url() ?>"+'generate_pdf.php?'+param,
		    data: data,
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
</script>