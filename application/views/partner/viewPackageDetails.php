<?php
$CI =& get_instance();
$CI->load->model('admin_model');
?>
<style type="text/css">
.panel-primary {
    border-color: #f79646 !important;
}

.panel {
   	/*margin-bottom: 21px !important;*/
    background-color: #fff !important;
    border-radius: 10px !important;
    /* -webkit-box-shadow: 0 1px 1px rgba(0,0,0,0.05); */
    box-shadow: 0 1px 1px rgba(0,0,0,0.05) !important;
    border-top-right-radius: 20px !important;
    border-top-left-radius: 20px !important;
    border-bottom-left-radius: 20px !important;
    border-bottom-left-radius: 20px !important;
}

.panel-primary>.panel-heading {
    color: #fff !important;
    background-color: #f79646 !important;
    border-color: #e1e1e1 !important;
}

.panel-heading {
    padding: 10px 15px !important;
    border-top-right-radius: 20px !important;
    border-top-left-radius: 20px !important;
    box-shadow: 5px 10px 3px grey !important;
    border-style: solid !important;
    border-color: #e1e1e1 !important;
}

.panel-body {
    padding: 15px !important;
    color: #fff !important;
    background-color: #4f81bd !important;
    border-bottom-right-radius: 20px !important;
    border-bottom-left-radius: 20px !important;
    box-shadow: 5px 5px 3px grey !important;
    border-style: solid !important;
    border-color: #e1e1e1 !important;
}
.panel .panel-heading h2 {
    padding: 0 !important;
}
.select2-search__field {
    width:auto;
}
/*.select2-container--default{*/
/*    width:auto;*/
/*}*/

/*.select2-container{*/
/*	display:block;*/
	/*width: 100%!important;*/
/*}*/
/*.select2-container--below{*/
/*    widht:auto;*/
/*}*/
/*.select2-container--default .select2-container--above{*/
/*    width:auto;*/
/*}*/
</style>
<div class="col-md-11" id="contentCol">
<div id="wrapper">
<div id="layout-static">
<div class="static-content-wrapper">
<div class="static-content">
<div class="page-content" style="margin-top:;">
<!--<ol class="breadcrumb">-->
<!--   <li><a href="<?php //echo base_url(PARTNER) ?>/dashboard">Home</a></li>-->
<!--   <li><a href="#">View Package Details</a></li>-->
<!--</ol>-->
<div class="content-wrapper">
    <div class="container">
	<section class="content">
	    <!--checking if type is pdf or not-->
	    <?php 
				$rupeeSymbol = '<img src="'.APP_URL.'images/rupee.png" alt="" style="margin-top:3px;" />';
				if($type != 'pdf')
				{
					$border = 'border: 1px solid #DDD;';
					$rupeeSymbol = '';
			?>
   <!--       <h3>-->
   <!--          View Package Detail-->
			<!--</h3>-->
		<?php
				}
				else
				{
					
				}
		 ?>
		<div class="row">
		<div class="col-md-12">
			<div class="box box-default">
			<form id="formData" method="POST" action="<?php echo base_url(PARTNER)?>/editSearchedPackageData" target="_blank">
				<input type="hidden" id="hidStartDate" name="hidStartDate" value="<?php echo $startdate;?>" />
				<input type="hidden" id="hidEndDate" name="hidEndDate" value="<?php echo $enddate;?>" />
				<input type="hidden" id="searchType" name="searchType" value="Package" />
				<div class="box-header with-border">
					<!--<div id="status1"></div>-->
					<!--<div id="searchType" style="font-size:20px;border-bottom: 1px solid #EEE;padding-bottom: 5px;"><?php //echo $itiTitle;?></div>-->
						<input type="hidden" name="hotelId" id="hotelId" value='<?php echo $editHotelId; ?>'>
						<input type="hidden" name="hotelDateId" id="hotelDateId" value='<?php echo $hotelDateId; ?>'>
						<input type="hidden" name="searchDataStr" id="searchDataStr" value='<?php echo $searchData; ?>'>
						<input type="hidden" name="userSelectRoomTypes" id="userSelectRoomTypes" value=''>
						<input type="hidden" name="userSelectHotel" id="userSelectHotel" value=''>
						<input type="hidden" name="userSelectedMealPlans" id="userSelectedMealPlans" value=''>
						<input type="hidden" name="totalBookingRooms" id="totalBookingRooms" value="<?php echo $searchrooms; ?>">
						<input type="hidden" name="itineryDuration" id="itineryDuration" value="<?php echo $itineraryData['duration']; ?>">
						<input type="hidden" name="editItiId" id="editItiId" value="<?php echo $editItiId;?>">
						<!-- ---------- -->
						<input type="hidden" name="totaladultsforroom" id="totaladultsforroom" value="<?php echo $totalAdults; ?>">
						<input type="hidden" name="totalkidsforroom" id="totalkidsforroom" value="<?php echo $totalKids; ?>">
						<?php
						for($i=0; $i<count($adults); $i++)
						{
							$adultP = $adults[$i];
							$childp = $child[$i];
							if(is_array($child_age))
							{
								$childp_age = $child_age[$i];
							}
							else
							{
								$childp_age = $child_age;	
							}
						?>
						<input type="hidden" name="" id="kidsageforroom" value="<?php echo $childp_age; ?>">

						<?php }
						?>
						
				</div>	
				<div class="box-body">
				    <!--adding this to check pdf-->
				    
					<div id="searchData" style="padding:15px 0;">
					<div style="border: 1px solid #DDD;padding: 15px 5px 15px 5px;border-radius: 10px;float: left;width: 100%; margin-bottom:10px;background-color: white;">
						
						<div class="col-md-12">
							
							<div class="col-md-12" style="box-shadow:3px 3px 4px grey; border-radius:10px;">
							<div class="col-md-7">
							    <?php for($i=0; $i<count($itineraryDetails); $i++){
							              $images = json_decode($itineraryDetails[$i]['itinerary_images']);
							              } ?>
							    <div id="myCarousel" class="carousel slide" data-ride="carousel">
							        <div class="carousel-inner">
							            <div class="item active">
                                            <img src="<?php echo base_url().'uploads/itinerary_images/'.$images[0]; ?>" class="img-responsive" style="width:100%; padding: 2px;">
                                        </div>
                                        <?php for($i=1; $i<count($itineraryDetails); $i++) {
										$images = json_decode($itineraryDetails[$i]['itinerary_images']); 
										foreach($images as $image) {?>
										<div class="item">
                                            <img src="<?php echo base_url().'uploads/itinerary_images/'.$image; ?>" class="img-responsive" style="width:100%; padding: 2px;">
                                        </div>
                                        <?php }
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
							        <span style="font-size:32px; font-family:'Comic Sans MS', cursive;"><b><?php echo $itiTitle;?></b></span><br><br>
							        <span style="font-size:16px;"><i class='fa fa-calendar' aria-hidden='true' style="font-size:20px;"></i><?php echo " From ".date('d, F Y',strtotime($startdate))." to ".date('d, F Y',strtotime($enddate));?></span><br><br>
							        <span style="font-size:16px;"><i class="fa fa-moon-o" aria-hidden="true" style="font-size:20px;"></i><?php echo " ".($Itiduration-1)." Night(s), ".$Itiduration." Day(s)";?></span><br><br>
							        <span style="font-size:16px;"><i class='fa fa-users' aria-hidden='true' style="font-size: 20px;"></i><?php echo " ".$totalAdults; ?> Adults + <?php echo $totalKids; ?> Kids</span>
							    </h4>
							    <h4 style="margin-top:30px;">
								    <span style="font-size:24px;"><b>Destinations Covered</b></span><br>
									<span style="font-size:16px;">
									    <?php 
										$cityArr = $CI->admin_model->getCitiesById($itiCity);
										//print_r($cityArr);
										$cities = '';
										foreach($cityArr as $cityData)
										{
											$cities.= $cityData['city_name'].', ';
										}
										echo rtrim($cities,', ');
										?>
									</span><br>
								</h4>
							</div>
							</div>
						</div>

						<div class="col-md-12">
							<div class="col-sm-7"><h1 style="text-decoration:underline; font-family:'Comic Sans MS', cursive">Itinerary</h1></div>
							<div class="col-sm-5" style="padding:25px;"><img class="img-responsive" src="<?php echo base_url()?>assets/images/travelicon.png"></div>
							<center>
							<?php
								if(!empty($itineraryDetails)) {
									for($i=0; $i <count($itineraryDetails); $i++) {
										$images = json_decode($itineraryDetails[$i]['itinerary_images']);
										if($i % 2 == 0) { ?>
											<!--<div class="container">-->
												<div class="row">
													<div class="container"><div class="col-sm-2 col-sm-offset-5 text-center" style="background-color:#10ade2; border-radius:100%; width:60px; height:60px; padding:10px; border-style:solid; border-color:#e1e1e1; box-shadow: 3px 3px 3px grey; color:#fff">DAY 0<?php echo $i+1;?></div></div>
													<br>
													<div class="col-md-8"><!-- Panel -->
													<article class="panel panel-primary">    
													<!-- Heading -->
													<div class="panel-heading">
													<h2 class="panel-title"><?php echo $itineraryDetails[$i]['itinerary_title']; ?></h2></div>
													<!-- /Heading -->   
													<!-- Body -->
													<div class="panel-body">
													<?php echo $itineraryDetails[$i]['itinerary_details']; ?>
													</div>
													<!-- /Body -->   
													</article>
													<!-- /Panel --> 
													</div>
													<div class="col-md-4">
													<?php
														foreach($images as $image) { ?>
														<img src="<?php echo base_url().'uploads/itinerary_images/'.$image;?>" class="img-responsive" width="" height="">
													<?php }
													?>
													</div>
													<br>
													</div>
												<!--</div>-->
									<?php }else{ ?>
											<!--<div class="container">-->
												<div class="row">
													<div class="container"><div class="col-sm-2 col-sm-offset-5 text-center" style="background-color:#10ade2; border-radius:100%; width:60px; height:60px; padding:10px; border-style:solid; border-color:#e1e1e1; box-shadow: 3px 3px 3px grey; color:#fff">DAY 0<?php echo $i+1;?></div></div>
													<br>
													<div class="col-md-4">
													    <?php foreach($images as $image) {?>
													    <img src="<?php echo base_url().'uploads/itinerary_images/'.$image;?>" class="img-responsive" width="" height="">
													    <?php } ?>
													</div>
													<div class="col-md-8"><!-- Panel -->
													<article class="panel panel-primary">    
													<!-- Heading -->
													<div class="panel-heading" style="color: #fff;background-color: #f79646;border-color: #2c3e50;">
													<h2 class="panel-title"><?php echo $itineraryDetails[$i]['itinerary_title']; ?></h2></div>
													<!-- /Heading -->   
													<!-- Body -->
													<div class="panel-body" style="padding: 15px;color: #fff;background-color: #4f81bd;">
													<?php echo $itineraryDetails[$i]['itinerary_details']; ?>
													</div>
													<!-- /Body -->   
													</article>
													<!-- /Panel --> </div>
													</div>
											<!--</div>-->
									<?php }
									}
								}
							?>
							</center>	
						</div>

						<div class="col-md-12">
							<h3>Hotel Envisaged</h3>
							<div class="table-responsive">
							<table class="table table-bordered" cellspacing="0" width="100%">
								<thead>
								  <tr>
									<?php
									$headTxt = '';
									?>
									<th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;">Day</th>
									<th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;">City</th>
									<th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;">Date</th>
									<th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;">Hotel</th>
									<th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;">Room Type</th>
									<th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;">Meal Plan</th>
									
								  </tr>
								</thead>
								<tbody>
								<?php
									$duration = $itineraryData['duration'];
									$duration_city = $itineraryData['duration_city'];
									$durationCityArr = explode(',',$duration_city);
									for($i=1; $i<=$duration; $i++)
									{
										$cityId = $durationCityArr[$i-1];
										$cityArr = $CI->admin_model->getCitiesById($cityId);
										
										$day = '+'.($i-1).' day';
										$day2 = '+'.$i.' day';
										$date = date('d, F Y',strtotime($startdate . $day));
										$dateSearch = date('Y-m-d',strtotime($startdate . $day));
										$nextDate = date('Y-m-d',strtotime($startdate . $day2));

										$hotelSearchData=$CI->admin_model->getHotelsByCityDate($cityId, $dateSearch);

										$hotelDetails = array();
										$hotelIdArr = array();
										foreach($hotelSearchData as $hotelData)
										{
											if(!in_array($hotelData['hotel_id'], $hotelIdArr))
											{
												$hotelIdArr[] = $hotelData['hotel_id'];
												$hotelDetails[] = $hotelData;
											}
										}

										$hotelStr = '<option value="">Select Hotel</option><option value="">Travelling</option><option value="">Departure</option>';
										
										$mealPlanStr = '<option value="">Select Meal Plan</option>';
										foreach($hotelDetails as $hotel)
										{
											$hotelId = $hotel['hotel_id'];
											$hotelName = $hotel['hotel_name'];
											$star_rating=$hotel['star_rating'];
											$hotelStr .= '<option value="'.$hotelId.'">'.$hotelName.' ('.$star_rating.' Star)</option>';
											
										}

										$k = $i-1;
									?>
									<tr>
										<th style="border: 1px solid #f4f4f4;"><?php echo $i; ?></th>
										<th style="border: 1px solid #f4f4f4;"><?php echo $cityArr[0]['city_name'];?></th>
										<th style="border: 1px solid #f4f4f4;"><?php echo $date;?></th>
										<th style="border: 1px solid #f4f4f4;">
											<?php
												if($calculatedprices != ''){
													echo $selHotelArr[$k];
												}
												else
												{
											?>
											<select class="form-control hoteltypes col-md-6" name="selectedHotel[]" rel="<?php echo $i; ?>" id="hotel_<?php echo $i; ?>" selectedDate="<?php echo $dateSearch; ?>" selectedcheckOutDate="<?php echo $nextDate; ?>">
												<?php
													echo $hotelStr;
												?>
											</select>
											
											<input type="hidden" class="hoteLPartnerId" id="hotelPartner<?php echo $i; ?>" name="" value="">
											<?php
											 } ?>
										</th>
										<th style="border: 1px solid #f4f4f4;">
											<?php
												if($calculatedprices != ''){
													$rooms = trim($selRoomsArr[$k]);
													if($rooms == 'Select Room Type')
													{
														$rooms = '--';
													}
													echo $rooms;
												}
												else
												{
											?>
											<select class="form-control userRoomTypes" name="selectedRoom[]" rel="<?php echo $i; ?>" id="roomType_<?php echo $i; ?>" onchange="selHotelRoom(<?php echo $i; ?>)" selDate="<?php echo $dateSearch; ?>">
												<option value="">Select Room Type</option>
											</select>
											<?php
												}
											?>
											<a class="room_amenities" rel="<?php echo $i; ?>" id="room_amenities<?php echo $i;?>" hotelId="" data-target="modal" data-placement="top" title="Room Amenities" style="display:none;">Room Amenities</a>
										</th>
										<th style="border: 1px solid #f4f4f4;">
											<?php
												if($calculatedprices != ''){
													$mealPlans = trim($selMealArr[$k]);
													if($mealPlans == 'Select Meal Plan')
													{
														$mealPlans = '--';
													}
													echo $mealPlans;
												}
												else
												{
											?>
											<select class="form-control mealTypes" name="selectedMealPlans[]" rel="<?php echo $i; ?>" id="mealType_<?php echo $i; ?>" onchange="selHotelMeal(<?php echo $i; ?>)" selDate="<?php echo $dateSearch; ?>">
												<option value="">Select Meal Plan</option>
											</select>
											<?php
												}
											?>
											<a class="meal_inclusions" rel="<?php echo $i; ?>" id="meal_inclusions<?php echo $i; ?>" hotelId="" data-target="modal" data-placement="top" title="Meal Inclusions" style="display:none;">Meal Inclusions</a>
										</th>
									</tr>
								    <?php }
								?>
								</tbody>
							</table>
							</div>
						</div>
						<div class="col-md-12" style="text-align:center;">
						    <!--<div class="vertical-center-row" style="margin-left: 480px; width: 350px;">-->
							 <button type="button" class="btn btn-primary btn-md" id="showvehcile">Add Vehicle</button>
							 <button type="button" class="btn btn-primary btn-md" id="showvactivity">Add Activities</button>
							 <button type="button" class="btn btn-primary btn-md" id="showflightdiv">Add Flight</button>
							<!--</div>-->
						</div>
						<div class="col-md-12" style="display:none;" id="vehicledata">
    						<h3>Vehicle Envisaged</h3>
							<div class="table-responsive">
		    					<table class="table table-bordered" cellspacing="0" width="">
								 <thead>
								  <tr>
								   <th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4; width: 300px;">Select Vehicle</th>
								   <th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4; width: 150px;">Vehicle Unit</th>
								  </tr>
                                 </thead>
								 <tbody id="vehiclebody">
								  <tr>
								   
								   <td>
								     <select class="form-control sel_vehicle" name="" id="sel_vehicle">
									  <option>Select Vehicle</option>
									 <?php foreach($itineraryVehicle as $itineraryvehicles) {?>
									  <option value="<?php echo $itineraryvehicles->id;?>"><?php echo $itineraryvehicles->vehicle_name.' from day '.$itineraryvehicles->from_day.' to day '.$itineraryvehicles->to_day;?></option>
									 <?php }?>
									 </select>
									 
								   </td>
									 
								   <td>
                                      <div class="input-group">
                                       <span class="input-group-btn">
                                         <button type="button" class="btn" id="subtbtn" data-type="minus" data-field="quant[1]">
	                                      <i class="fa fa-minus" aria-hidden="true"></i>
                                         </button>
                                       </span>
                                       <span class="input-container">
                                        <input type="text" name="" class="form-control unitquantity" id="unitquantity" value="1" style="" readonly>
                                       </span>
                                       <span class="input-group-btn">
                                        <button type="button" class="btn" id="addbtn" data-type="plus" data-field="quant[1]">
	                                     <i class="fa fa-plus" aria-hidden="true"></i>
                                        </button>
                                       </span>
                                      </div>
                                   </td>
								   <td><button type="button" class="btn" id="clonerow" data-tooltip="add row">
								      <i class="fa fa-plus-circle" aria-hidden="true" style="font-size: 26px;color: green;"></i>
									  </button>
									  <input type="hidden" id="countdivrow" name="vehiclecount" value="1">
									  <input type="hidden" id="originalcost" value="" style="width:90px;" readonly>
									  <input type="hidden" id="unitcost"  class="per_unitcost" value="" style="width:90px;" readonly>
								   </td>
								   <input type="hidden" id="totalvehicle_cost" name="" value="0">
								  </tr>
								 </tbody>
			    				</table>
							</div>
						</div>
						
						<div class="col-md-12" style="display:none;" id="activitiesdata">
    						<h3>Activities Envisaged</h3>
							<div class="table-responsive">
		    					<table class="table table-bordered" cellspacing="0" width="100%">
								 <thead>
								  <tr>
								   <th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4; width:50px;">Day</th>
								   <th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4; width:135px;">City</th>
								   <th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4; width:140px;">Date</th>
								   <th colspan="2" style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;">Activities</th>
								   <!--<th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;">Activities By Unit</th>-->
								   <th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4; width:130px;">Total Unit</th>
								  </tr>
                                 </thead>
								 <tbody id="">
								 <?php
									$duration = $itineraryData['duration'];
									$duration_city = $itineraryData['duration_city'];
									$durationCityArr = explode(',',$duration_city);
									for($i=1; $i<=$duration; $i++)
									{
										$cityId = $durationCityArr[$i-1];
										$cityArr = $CI->admin_model->getCitiesById($cityId);
										
										$day = '+'.($i-1).' day';
										$date = date('d, F Y',strtotime($startdate . $day));
										$dateSearch = date('Y-m-d',strtotime($startdate . $day));

										$activitiesSearchData = $CI->admin_model->getAcivitiesByCity($cityId);

										$activitiesByUnitSearchData = $CI->admin_model->getPerUnitAcivitiesByCity($cityId);

										$activityStr = '';
										foreach($activitiesSearchData as $activity) {
											$activity_id = $activity['id'];
											$activity_name = $activity['details'];
											$activityStr .= '<option value="'.$activity_id.'">'.$activity_name.'</option>';
										}

										$activityunitStr = '';
										foreach($activitiesByUnitSearchData as $activityByUnit) {
											$activityByUnit_id = $activityByUnit['id'];
											$activityByUnit_name = $activityByUnit['details'];
											$activityunitStr .= '<option value="'.$activityByUnit_id.'">'.$activityByUnit_name.'</option>';
										}

										$k = $i-1;
									?>
									
								  <tr>
								   
								    <th style="border: 1px solid #f4f4f4;"><?php echo $i; ?></th>
								    <th style="border: 1px solid #f4f4f4;"><?php echo $cityArr[0]['city_name'];?></th>
								    <th style="border: 1px solid #f4f4f4;"><?php echo $date;?></th>

								   <th style="border: 1px solid #f4f4f4;">
								        <select class="form-control activities" style="" name="activities_<?php echo $i; ?>[]" rel="<?php echo $i; ?>" id="activities_<?php echo $i; ?>" selDate="<?php echo $dateSearch; ?>" multiple="multiple">
										<!--<option value="" disabled="disabled">Select Activities</option>-->
										<optgroup label="Per Person Activities" id="">
										<?php
											echo $activityStr;
										?>
										</optgroup>
										<!--<optgroup label="Per Unit Activities" id="">-->
										<?php
											//echo $activityunitStr;
										?>
										<!--</optgroup>-->
									    </select>
									    
									  <!--<input type="hidden" name="perpersonAct_<?php //echo $i;?>[]" id="perpersonAct_<?php //echo $i;?>">-->
									  <!--<input type="hidden" name="perUnitAct_<?php //echo $i;?>[]" id="perUnitAct_<?php //echo $i;?>">-->
								   </th>
									 
								   <th style="border: 1px solid #f4f4f4;">
								        <select class="form-control activitiesperunit" name="activitiesperunit_<?php echo $i; ?>[]" rel="<?php echo $i; ?>" id="activitiesperunit_<?php echo $i; ?>" selDate="<?php echo $dateSearch; ?>" multiple="multiple">
										   <optgroup label="Per Unit Activities">
										   <?php
											   echo $activityunitStr;
										   ?>
										   </optgroup>
									    </select>
								  <!--    <select class="form-control activitiesperunit select2" name="activitiesperunit_<?php //echo $i; ?>[]" rel="<?php //echo $i; ?>" id="activitiesperunit_<?php //echo $i; ?>" selDate="<?php //echo $dateSearch; ?>" multiple="multiple">-->
										<?php
											//echo $activityunitStr;
										?>
									 <!-- </select>-->
                                   </th>
								   <th style="border: 1px solid #f4f4f4;">
								      <input type="text" class="form-control activityunit" name="totalactivityunit_<?php echo $i;?>[]" id="totalactivityunit_<?php echo $i;?>" rel="<?php echo $i; ?>">
								   </th>
								  </tr>
								  <?php }?>
								 </tbody>
			    				</table>
							</div>
						</div>
						
						<!--flight div-->
						
						<div class="col-md-12" style="display:none;" id="flightdata">
    						<h3>Flight Envisaged</h3>
							<div class="table-responsive">
		    					<table class="table table-bordered" cellspacing="0" width="">
								 <thead>
								  <tr>
								   <th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4; width: 300px;">Flight Details</th>
								   <!--<th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4; width: 150px;">Price</th>-->
								  </tr>
                                 </thead>
								 <tbody id="">
								  <tr>
								   <td>
								     <textarea class="form-control" rows="3" id="flydetails"></textarea>
								   </td>
								  </tr>
								 </tbody>
			    				</table>
							</div>
						</div>
						<div class="col-md-12">	
						   
						<!--	<div class="col-md-8">-->
						<!--		<h3>Add Margin(%)</h3>-->
						<!--		<div class="hotelDetail">-->
						<!--			<table class="table table-bordered" cellspacing="0">-->
						<!--				<tr>-->
						<!--					<td>Enter your percentage</td>-->
						<!--					<td style="border: 1px solid #f4f4f4;padding: 8px;">-->
												<input type="hidden" id="priceMargin" value="0" onkeyup="calculate_priceWith_margin(this.value)" maxlength="2" />
						<!--					</td>-->
						<!--				</tr>-->
						<!--			</table>-->
						<!--		</div>-->
						<!--	</div>-->
						<!--	<div class="col-md-4">-->
						<!--		<button type="button" class="btn btn-primary btn-lg" id="calculate_prices" style="margin-top:63px;">Calculate Price</button>-->
						<!--	</div>-->
							
						</div>
						<br/><br/>
						<div class="col-md-12">		
							<h3>Tour Cost</h3>	
							<div class="table-responsive">
							<table class="table table-bordered" cellspacing="0" width="100%">
								<tr>
								<th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;">Room</th>
								<th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;">Adult(s)</th>
								<th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;">Infant(s)</th>
								<th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;">Kid(s)</th>
								<th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;">Kid(s) Age</th>
								<th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4; width:60px;">Price</th></tr>
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
										<td style="border: 1px solid #f4f4f4;padding: 8px;"><span><i class="fa fa-male" aria-hidden="true"></i></span> <?php echo $adultP; ?><input type="hidden" id="totaladultsforpack<?php echo $i+1;?>" value="<?php echo $adultP; ?>"></td>
										<td style="border: 1px solid #f4f4f4;padding: 8px;"><span><i class="fa fa-baby" aria-hidden="true"></i></span> <?php echo $infantsp; ?><input type="hidden" id="" value="<?php echo $infantsp; ?>"></td>
										<td style="border: 1px solid #f4f4f4;padding: 8px;"><span><i class="fa fa-child" aria-hidden="true"></i></span> <?php echo $childp; ?><input type="hidden" id="totalchildforpack<?php echo $i+1;?>" value="<?php echo $childp; ?>"></td>
										<td style="border: 1px solid #f4f4f4;padding: 8px;"><?php echo $childp_age; ?><input type="hidden" id="childageforpack<?php echo $i+1;?>" value="<?php echo $childp_age; ?>"></td>
										
										<td style="border: 1px solid #f4f4f4;padding: 8px;"><span><i class="fa fa-inr" aria-hidden="true"></i></span><?php echo $rupeeSymbol; ?> <span class="roomPricesbyroom" id="roomPrice_<?php echo $i+1; ?>"><?php echo $pArr[$i]; ?></span></td>
									</tr>
									<?php	
									}
								?>
								<tr style="font-size: 18px;font-weight: 600;">
									<td colspan="5" style="text-align:center;border: 1px solid #f4f4f4;padding: 8px;">Total</td>
									<td style="border: 1px solid #f4f4f4;padding: 8px;"><span><i class="fa fa-inr" aria-hidden="true"></i></span><?php echo $rupeeSymbol; ?> <span id="totalHotelPrice"><?php echo $subTotal; ?></span></td>
								</tr>
								<tr>
									<td colspan="5" style="text-align:center;border: 1px solid #f4f4f4;padding: 8px;"></td>
									<td style="border: 1px solid #f4f4f4;padding: 8px;">
									    <!--<span><i class="fa fa-inr" aria-hidden="true"></i></span> <?php //echo $rupeeSymbol; ?> -->
									    <!--<span id="serviceTax"><?php //echo $serviceTax; ?></span>-->
									    <button type="button" class="btn btn-primary btn-lg" id="calculate_prices" style="margin-top:63px;">Calculate Price</button>
									</td>
								</tr>
								<!--<tr style="font-size: 18px;font-weight: 600;">-->
								<!--	<td colspan="5" style="text-align:center;border: 1px solid #f4f4f4;padding: 8px;">Grand Total</td>-->
								<!--	<td style="border: 1px solid #f4f4f4;padding: 8px;"><span><i class="fa fa-inr" aria-hidden="true"></i></span><?php //echo $rupeeSymbol; ?> <span id="grandTotal"><?php //echo number_format(floor($grandTot)); ?></span></td>-->
								<!--</tr>-->
						</table>
						</div>	
					</div>

					<div style="clear:both"></div>
					<div class="col-md-12">
						<h3>Tour Inclusions:</h3>
						<ul>
							<li>Welcome drinks on Arrival at hotel/resort. (Non alcoholic)</li>
							<li>Accommodation as per above details.</li>
							<li>Meals as above mentioned Meal Plan.</li>
							<li>Chauffeur Driven Vehicle as per the itinerary &amp; Vehicle Details.</li>
							<li>All kind of applicable hotel, transport, service &amp; govt. taxes.</li>
						</ul>
						<h3>Tour Exclusions:</h3>	
						<ul>
							<li>Bus/Air/Train tickets.</li>
							<li>Entry &amp; activities fees at monuments, tourist spots, etc. </li>
							<li>Tips to the guides / driver / restaurants / hotels etc.</li>
							<li>Any expenses of personal nature such as, drinks, laundry, telephone calls, insurance, camera fees, excess baggage, emergency/medical cost etc.</li>
						</ul>
						<h3>Tour Note:</h3>
						<ul>
							<li>Child Policy:
								<ul>
									<li>0 to 5 years child is complimentary sharing parent’s bed.</li>
									<li>6 to 8 years child will be charged as extra child without bed.</li>
									<li>9 to 12 years child will be charged as extra child with bed.</li>
								</ul>
							</li>
							<li>The cost is irrelevant of circumstances that are beyond our control. Situations such as road blockade due to strike or agitation, earthquake, natural calamity, sickness evacuation, delay or cancellation of train or flight etc. are beyond our control.</li>
							<li>Itinerary may vary depending upon the climate conditions and circumstances.</li>
							<li>We are not holding any booking.</li>
						</ul>
					</div>

					<div style="clear:both;"></div>
					<?php if($type !='pdf'){   
					?>
					<div class="box-footer text-right">
						<input type="hidden" name="calculated_prices" id="calculated_prices" value="" />
						<input type="hidden" name="rooms_prices" id="rooms_prices" value="" />
						<input type="hidden" name="rooms_total" id="rooms_total" value="" />
						<input type="hidden" id="rooms_tax" value="" />
						<input type="hidden" id="rooms_grandtotal" value="" />
						<input type="hidden" id="partnerMarkup" value="<?php echo $markup;?>">
						<input type="hidden" name="selected_hotels" id="selected_hotels" value="" />
						<input type="hidden" name="selected_rooms" id="selected_rooms" value="" />
						<input type="hidden" name="selected_mealPlans" id="selected_mealPlans" value="" />
						<input type="hidden" name="sel_hotel_partner" id="sel_hotel_partner" value="">
						<input type="hidden" name="selected_vehicle" id="selected_vehicle" value="" />
						<input type="hidden" name="sel_vehicle_Id" id="sel_vehicle_Id" value="">
						<input type="hidden" name="selected_activities" id="selected_activities" value="" />
						<input type="hidden" name="selectedActvities_ID" id="selectedActvities_ID" value="">
						<input type="hidden" name="perunitselected_activities" id="perunitselected_activities" value="" />
						<input type="hidden" name="totalunitofactivities" id="totalunitofactivities" value="" />
						<input type="hidden" id="totUnitOfActvArr" value="" >
						<input type="hidden" id="selected_vvendor" value="" />
						<input type="hidden" id="selectedVehicle" value="" />
						<input type="hidden" id="vehicle_price" value="" />
						<input type="hidden" name="selected_vehicle_unit" id="selected_vehicle_unit" value="" />
						<input type="hidden" id="queryname" value="<?php echo $queryname; ?>" />
				        <input type="hidden" id="empname" value="<?php echo $emp_name; ?>" />
				        <input type="hidden" id="queryid" value="<?php echo $queryid; ?>" />
				        <a class="btn btn-primary" id="confirmbtn">Confirm</a>&nbsp;&nbsp;&nbsp;
				        <input type="submit" form="formData" class="btn btn-success" value="Edit">
						<!--<button type="button" class="btn btn-info" id="download" disabled onclick="downlaod_pdf('<?php //echo '&searchData='.$_SERVER['REQUEST_URI'].'&itiTitle='.base64_encode($itiTitle); ?>', 'downlaod')">Download PDF</button>&nbsp;&nbsp;&nbsp;-->
						<!--<a class="btn btn-primary pull-right" href="#sendToCl" id="sndtomail" disabled data-toggle="modal"><i class="fa fa-envelope-o"></i> Mail to Client</a>-->
					</div>
					<?php
					}
					?>
					</div>
					</div>
				</div>
			</form>
			</div>
		</div>
	</section>
	</div>
</div>
</div>
<!--Send to mail Modal-->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="sendToCl" class="modal fade">
	<div class="modal-dialog mail-modal">
	   <form name="tour_mail" id="tour_mail" method="post" action="">
			<input type="hidden" name="mailFilePath" id="mailFilePath" value="0" />
			<input type="hidden" name="tourSub" id="tourSub" value="<?php echo $itiTitle.$queryid.' ';?>Travel Quotation" />
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
									Dear <?php if(!empty($queryname)){echo $queryname; }else { echo "______";}?><br/><br/>
									Greetings from <strong><span style="font-size: 19px;background: yellow; color:#00c0ef;">LiD – Travel </span>!!!</strong><br/><br/>
									Myself <?php if(!empty($emp_name)){echo $emp_name; }else{ echo $name;}?>, I'll be handling all your arrangements regarding your tour package.</br></br>
									Thank you for considering us for your forthcoming travel plan, in response please find attached tour proposal for your kind perusal as per the details provided by you.<br/><br/>
									We Hope all the above is in order and if you need any further clarification please call / write us.<br/><br/>
									Looking forward for a response/acknowledgment/confirmation on the same at the earliest.<br/><br/>
									Thanks and Regards !!!<br/>
									<?php if(!empty($emp_name)){ echo $emp_name;}else{ echo $name; }?><br/>
									Team LiD</br/>
									<?php if(!empty($emp_mobile)){ echo "m.+91".$emp_mobile;}else{ echo "m.+91".$mobile_no;}?><br/><br/>
							</textarea>
						</div>
					</div>
				</div>
				
			  </div>
			  <div class="modal-footer">
				  <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
				  <img src="<?php echo base_url(); ?>assets/images/loader.gif" id="showLoaderEmail" style=" width: 26px; display:none;">
				  <button class="btn btn-success" type="button" id="sendEmail" onclick="downlaod_pdf('<?php echo '&searchData='.$_SERVER['REQUEST_URI'].'&itiTitle='.base64_encode($itiTitle); ?>', 'email')">Send</button>
			  </div>
		  </div>
		</form>
	</div>
</div>
<!--end-->
<!--Confirm modal-->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="confirmbooking" class="modal fade">
	<div class="modal-dialog mail-modal modal-lg modal-dialog-scrollable">
	   <form name="Confirmhotel" id="Confirmhotel" method="post" action="">
	        <input type="hidden" name="emp_id" id="emp_id" value="<?php if($roleId == ROLE_ADMIN){echo ""; }else{echo $emp_id;} ?>">
	        <input type="hidden" name="handler_name" id="handler_name" value="<?php echo $name; ?>">
			<input type="hidden" name="total_rooms" id="total_rooms" value="<?php echo count($adults);?>">
			<input type="hidden" id="total_adults" value="<?php if(is_array($adults)){echo implode(",", $adults);}else{ echo $adults; }?>">
			<input type="hidden" id="total_kids" value="<?php if(is_array($child)){ echo implode(",", $child);}else{ echo $child;}?>">
			<input type="hidden" id="total_infants" value="<?php if(is_array($infants)){echo implode(",", $infants);}else{ echo $infants;}?>">
			<input type="hidden" id="kids_age" value="<?php if(is_array($child_age)){echo implode(",", $child_age);}else{ echo $child_age;}?>">
			
		  <div class="modal-content">
			  <div class="modal-header">
				  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				  <h4 class="modal-title"><i class="fa fa-home"></i><?php //echo implode(",", $adults);?></h4>
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
					<div class="col-md-6">
						<div class="form-group">
							<label>Package Start Date</label>
							<input type="text" class="form-control" id="" name="" placeholder="" value="<?php echo date('d-m-Y', strtotime($startdate))?>" readonly>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Package End Date</label>
							<input type="text" class="form-control" id="" name="" placeholder="" value="<?php echo date('d-m-Y', strtotime($enddate))?>" readonly>
						</div>
					</div>
					
				</div>
				<div class="row">
				    <h3>Hotels</h3>
					<table class="table table-bordered" cellspacing="0">
					    <thead>
					        <tr>
					            <th>Hotel</th>
					            <th>Check In</th>
					            <th>Check Out</th>
					            <th>Room Type</th>
					            <th>Meal Plan</th>
					        </tr>
					    </thead>
					    <tbody id="HoteLdeTails">
					        
					    </tbody>
					</table>
				</div>
				<div class="row">
					<h3>Vehicle</h3>
					<table class="table table-bordered" cellspacing="0">
					    <thead>
					        <tr>
					            <th>Vehicle Details</th>
					            <th>Unit</th>
					        </tr>
					    </thead>
					    <tbody id="VehiclEdeTails">
					        
					    </tbody>
					</table>
				</div>
				<div class="row">
				    <h3>Activities</h3>
				    <table class="table table-bordered" cellspacing="0">
				        <thead>
				            <tr>
				                <th>Activities(Per Person)</th>
				                <th>Date</th>
				            </tr>
				        </thead>
				        <tbody id="selActivities">
				            
				        </tbody>
				    </table>
				    <table class="table table-bordered" cellspacing="0">
				        <thead>
				            <tr>
				                <th>Activities(Per Unit)</th>
				                <th>Total Unit</th>
				                <th>Date</th>
				            </tr>
				        </thead>
				        <tbody id="selPerUnitActivities">
				            
				        </tbody>
				    </table>
				</div>
				
			  </div>
			  <div class="modal-footer">
				  <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
				  <img src="<?php echo base_url(); ?>assets/images/loader.gif" id="showLoaderForConf" style="width: 26px; display:none;">
				  <button class="btn btn-success" type="button" id="confHotelBooking" onclick="confHotelPackage()">Confirm</button>
			  </div>
		  </div>
		</form>
	</div>
</div>
<!--end-->
<!----room amenities modal---->
<div id="qDetail" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" id="modalHead"><i class="fa fa-home"></i></h4>
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
<?php
    if($this->uri->segment(2) == 'viewPackageDetails') { ?>
    <script src="<?php echo base_url(); ?>asset/plugins/select2/select2.full.min.js"></script>
    <script src="<?php echo base_url(); ?>jquery-validation/dist/jquery.validate.js"></script>
    
<?php
    }
?>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/form-ckeditor/ckeditor.js"></script>
<script type="text/javascript">
$(function() {
    
    CKEDITOR.env.isCompatible = true;

 	var titleEditor = CKEDITOR.replace( 'email_body', {
		width:'auto',
		height:200,
		startupFocus : false,
		customConfig: 'ckeditor_customconfig/ckeditor_config2.js'
	});
	
	$(".activities").select2({ width: '100%', placeholder: "Per Person Activity" });
	$(".activitiesperunit").select2({ width: '100%', placeholder: "Per Unit Activity" });
// 	    width: 'resolve'
// 	});

	$(document).on('change','.hoteltypes',function(){
	       
		var searchType 	= $("#searchType").val();
		var startDate 	= $("#hidStartDate").val();
		var endDate 	= $("#hidEndDate").val();
		var selDate 	= $(this).attr('selectedDate');
		var propId      = $(this).val();
		
		var data = 'hotId='+$(this).val()+'&startDate='+startDate+'&endDate='+endDate+'&selDate='+selDate+'&searchType='+searchType;
		var number = $(this).attr('rel');
		//alert(number);
		$.ajax({
			type:"POST",
			url:"<?php echo base_url(PARTNER).'/getHotelRoomsForPackage'?>",
			data:data,
			beforeSend:function(){
				
			},
			success:function(html){
				
				var dataArr = html.split('$##$');
				$("#roomType_"+number).html(dataArr[0]);
				//$("#room_amenities"+number).css("display","block");
				$("#room_amenities"+number).attr("hotelId",propId);
				$("#mealType_"+number).html(dataArr[1]);
				$("#meal_inclusions"+number).attr("hotelId",propId);
				$("#hotelPartner"+number).val(dataArr[2]);
				//alert(html);
				//$("#showQueryDetail").html(html);
				selected_roomTypes();
				//calculate_price($(this).attr('rel'));
			}
		});
	    //}
	});

	$("#calculate_prices").click(function(){
		var priceMargin = $("#priceMargin").val();
		$("#HoteLdeTails").html('');
		
		//console.log($("#itineryDuration").val());
		$.ajax({
			type:"POST",
			url:"<?php echo base_url(PARTNER).'/getpakageHotelPrice'?>",
			data:$("#formData").serialize(),
			
			beforeSend:function(){
				
			},
			success:function(html){
				var dataArr = html.split('$##$');
				//console.table(dataArr);
				$("#calculated_prices").val(dataArr[0]);
				//console.log(dataArr[0]);
				$("#vehicle_price").val(dataArr[1]);
				//console.log(dataArr[1]);
				calculate_priceWith_margin(priceMargin);
				//var grandtotalprice = document.getElementById("grandTotal").innerText;
			    //if(grandtotalprice !== '0'){
	            // $("#download").removeAttr("disabled");
	            // $("#sndtomail").removeAttr("disabled");
	            //}
			}
			
		});
	});
	
	$("#confirmbtn").click(function(){
	    
	   $("#confirmbooking").modal('show');
	   
	   var hotels = $("#selected_hotels").val();
	   var selHotels = hotels.split("$#$");
	   var selectArr = selHotels[0].split(",");
	   var checkInArr = selHotels[2].split(",");
	   var checkOutArr = selHotels[3].split(",");
       var newHotelArr = selectArr.filter(function(f) { return f !== 'Select Hotel' && f !== 'Travelling' && f !== 'Departure' && f !== ""});
       
       var hotelRooms = $("#selected_rooms").val();
       var selRooms = hotelRooms.split("$#$");
       var selRoomsArr = selRooms[0].split(",");
       var newRoomsArr = selRoomsArr.filter(function(f) { return f !== 'Select Room Type' && f !== ""});
       
       var roomMeal = $("#selected_mealPlans").val();
       var selMeals = roomMeal.split("$#$");
       var selMealsArr = selMeals[0].split(",");
       var newMealsArr = selMealsArr.filter(function(f) { return f !== 'Select Meal Plan' && f !== ""});
       //console.log(newArray);
       var tabledata = '';
	   for(var i=0; i<newHotelArr.length; i++){
		   tabledata += '<tr><td>'+newHotelArr[i]+'</td><td>'+checkInArr[i]+'</td><td>'+checkOutArr[i]+'</td><td>'+newRoomsArr[i]+'</td><td>'+newMealsArr[i]+'</td></tr>';       
	   }
	   $("#HoteLdeTails").html(tabledata);
	   
	   var vehicles = $("#selected_vehicle").val();
	   var selVehicles = vehicles.split(",");
	   var newVehicleArr = selVehicles.filter(function(f) { return f !== ""});
	   
	   var vehicleUnit = $("#selected_vehicle_unit").val();
	   var selUnit = vehicleUnit.split(",");
	   var vehicleUnitArr = selUnit.filter(function(f) { return f !== ""});
	   
	   var vehicleData = '';
	   for(var i=0; i<newVehicleArr.length; i++){
	       vehicleData += '<tr><td>'+newVehicleArr[i]+'</td><td>'+vehicleUnitArr[i]+'</td></tr>';
	   }
	   $("#VehiclEdeTails").html(vehicleData);
	   
	   var selactivities = $("#selected_activities").val();
	   var selNewActArr = selactivities.split("$#$");
	   var selActArr = selNewActArr[0].split(",");
	   var activityArr = selActArr.filter(function(f) { return f !== ""});
	   
	   var actDate = selNewActArr[1].split(",");
	   
	   //console.log(activityArr);
	   var activityData = '';
	   for(var i=0; i<activityArr.length; i++){
	       activityData += '<tr><td>'+activityArr[i]+'</td><td>'+actDate[i]+'</td></tr>';
	   }
	   
	   $("#selActivities").html(activityData);
	   
	   var selPerUnitActv = $("#perunitselected_activities").val();
	   var selNewPerUnitArr = selPerUnitActv.split("$#$");
	   var selPerUnitArr = selNewPerUnitArr[0].split(",");
	   var perUnitactivityArr = selPerUnitArr.filter(function(f) { return f !== ""});
	   var unitActDate = selNewPerUnitArr[1].split(",");
	   var totUnitOfActvArr = JSON.parse($("#totUnitOfActvArr").val());
	   var activityUnitArr = totUnitOfActvArr.filter(function(f) { return f !== ""});
	   //alert(totUnitOfActvArr);
	   //console.log(JSON.parse(totUnitOfActvArr));
	   
	   var UnitActData = '';
	   for(var i=0; i<perUnitactivityArr.length; i++){
	       
	       //for(var j=0; j<totUnitOfActvArr[i].length; j++){
	           UnitActData += '<tr><td>'+perUnitactivityArr[i]+'</td><td>'+activityUnitArr[i]+'</td><td>'+unitActDate[i]+'</td></tr>';    
	       //}
	   }
	   
	   $("#selPerUnitActivities").html(UnitActData);

	});


	$("#showvehcile").click(function(){

		//$("#vehicledata").show();
		var x = document.getElementById("vehicledata");
        if (x.style.display === "none") {
         x.style.display = "block";
        } else {
         x.style.display = "none";
        }
	});

	$("#showvactivity").click(function(){

      var x = document.getElementById("activitiesdata");
      if (x.style.display === "none") {
        x.style.display = "block";
      } else {
        x.style.display = "none";
      }
    });
    
    $("#showflightdiv").click(function(){
       var x = document.getElementById("flightdata");
      if (x.style.display === "none") {
        x.style.display = "block";
      } else {
        x.style.display = "none";
      } 
    });

	$("#sel_vehicle").on('change', function(){
		var veh_id = $(this).val();
		//alert(id);
		var base_url = $('#baseurl').val();
		var totalunit = parseInt($('#unitquantity').val());

		$.ajax({
			type: "POST",
			url: "<?php echo base_url(PARTNER)?>/getselvehicleperunitcost/"+veh_id,
			data: {id:veh_id},
			//cache: false,
			beforeSend:function() {
				$("#custom-loader").css("display","block");
			},
			success: function(data)
			{
				$.each(JSON.parse(data), function(key,val) {
            		
					//alert(parseInt(val.unit_cost * totalunit));
					$("#originalcost").val(val.unit_cost);
					$("#unitcost").val(val.unit_cost);
					$("#totalvehicle_cost").val(val.unit_cost);
				});			
				
				
			},
			complete: function() {
				$("#custom-loader").css("display","none");
			}

		});

	});
	
	$(".room_amenities").click(function(){
          
          var hotel_id = $(this).attr('hotelId');
          var id = $(this).attr('rel');
          var room_id = $("#roomType_"+id).find('option:selected').val();
          var room_name = $("#roomType_"+id).find('option:selected').text();
          if(room_id == '0'){
              alert("Please Select Room Type");
            }else{
                $("#qDetail").modal();
          
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
        }
          
    });
    
    $(".meal_inclusions").click(function(){
     
        var hotel_id = $(this).attr('hotelId');
        var id = $(this).attr('rel');
        var startdate = '<?php echo $startdate; ?>';
	    var endate = '<?php echo $enddate?>';
        var selmealvalue = $("#mealType_"+id).find('option:selected').val();
        var meal_name = $("#mealType_"+id).find('option:selected').text();
        if(selmealvalue == '0')
        {
            alert("Please Select Meal Type");
        }else{
            $("#MealInclDetail").modal();
            
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
        }
    });


	$("#addbtn").on('click', function(){
		//alert("hi");
		var subtract = $("#unitquantity").val();
		var perunitprice = $("#originalcost").val();
		//$("#unitcost").val(parseInt(perunitprice * subtract));

		if($(this).attr('data-type') == "plus"){

			var newVal = parseFloat(subtract) + 1;
			$("#unitquantity").val(newVal);
			$("#unitcost").val(parseInt(perunitprice * newVal));
			//$("#totalvehicle_cost").val(parseInt(perunitprice * newVal));
			var cost = [];
			    var i = 0;
				//var id = 2;
			    $(".per_unitcost").each(function(){
      			cost[i] = $(this).val();
      			i++;
				//id++;
			    })
			var total = 0;
			for(var i = 0; i < cost.length; i++) {
    			total += cost[i] << 0;
			}
			
			$("#totalvehicle_cost").val(parseInt(total));

		}

	});

	$("#subtbtn").click(function(){
		//alert("hi");
		var subtract = $("#unitquantity").val();
		var perunitprice = $("#originalcost").val();

		if($(this).attr('data-type') == "minus"){

		  if(subtract > 1){
			var newVal = parseFloat(subtract) - 1;
			$("#unitquantity").val(newVal);
			$("#unitcost").val(parseInt(perunitprice * newVal));
			//$("#totalvehicle_cost").val(parseInt(perunitprice * newVal));

			var cost = [];
			    var i = 0;
				//var id = 2;
			    $(".per_unitcost").each(function(){
      			cost[i] = $(this).val();
      			i++;
				//id++;
			    })
			var total = 0;
			for(var i = 0; i < cost.length; i++) {
    			total += cost[i] << 0;
			}
			
			$("#totalvehicle_cost").val(parseInt(total));
           }else{
			$("#unitquantity").val(1);
		   }
		}

	});

	$(document).on("focus", 'button[id=clonerow]', function() {
		var count = parseInt($("#countdivrow").val());
		var vehicles = '<?php echo json_encode($itineraryVehicle); ?>';
		var id = count+1;
		var newrows ='<tr id="nextrow_"'+id+'">';
		newrows +='<td><select class="form-control sel_vehicle" id="sel_vehicle'+id+'"><option>Select Vehicle</option>';
		$.each(JSON.parse(vehicles), function(index, element) {
		newrows += '<option value="'+element.id+'">'+element.vehicle_name+' form day'+element.from_day+' to day'+element.to_day+'</option>';
	    });
		newrows +='</select></td>';
		newrows +='<td><div class="input-group"><span class="input-group-btn">';
		newrows +='<button type="button" class="btn" id="subtbtn'+id+'" data-type="minus" data-field="quant[1]"><i class="fa fa-minus" aria-hidden="true"></i></button>';
        newrows +='</span><span class="input-container"><input type="text" name="" class="form-control unitquantity" value="1" id="unitquantity'+id+'" readonly></span><span class="input-group-btn">';
        newrows +='<button type="button" class="btn" id="addbtn'+id+'" data-type="plus" data-field="quant[1]"><i class="fa fa-plus" aria-hidden="true"></i></button></span></div></td>';
		newrows +='<td><button type="button" class="btn" id="clonerow"><i class="fa fa-plus-circle" aria-hidden="true" style="font-size: 26px;color: green;"></i></button>';
		newrows +='<button type="button" class="btn" id="other_remove"><i class="fa fa-minus-circle" aria-hidden="true" style="font-size: 26px;color: red;"></i></button>';
		newrows +='<input type="hidden" id="originalcost'+id+'" value="" style="width:90px;" readonly><input type="hidden" id="unitcost'+id+'" class="per_unitcost" style="width:90px;" readonly></td>';
		newrows +='</tr>';
		// var confirmtrue = confirm("Do you want new row?");
		var confirmtrue = swal({
          title: "Do you want new row?",
          text: "",
          buttons: {  
            cancel: {
                text: "Cancel",
                value: false,
                visible: true,
                className: "",
                closeModal: true,
              },
            confirm: {
                text: "OK",
                value: true,
                visible: true,
                className: "",
                closeModal: true
              }

          },
          
        }).then((value) => {
			if(value){
            $("#vehiclebody").append(newrows);
            $("#countdivrow").val(id); 
            swal.close();
            //window.onkeydown = null;
            //document.onclick = null;
            document.getElementById('sel_vehicle'+id).focus();
            }else{
            document.getElementById('priceMargin').focus();
            }

			$("#sel_vehicle"+id).on('change', function(){
		    var veh_id = $(this).val();
		    //var base_url = $('#baseurl').val();
		    var totalunit = parseInt($("#totalvehicle_cost").val());

		    $.ajax({
			type: "POST",
			url: "<?php echo base_url(PARTNER)?>/getselvehicleperunitcost/"+veh_id,
			data: {id:veh_id},
			//cache: false,
			beforeSend:function() {
				$("#custom-loader").css("display","block");
			},
			success: function(data)
			{
				$.each(JSON.parse(data), function(key,val) {
            		
					$("#originalcost"+id).val(val.unit_cost);
					$("#unitcost"+id).val(val.unit_cost);
					$("#totalvehicle_cost").val(parseInt(val.unit_cost) + totalunit);
				});			
				
			},
			complete: function() {
				$("#custom-loader").css("display","none");
			}

		  });

		});

		$('#addbtn'+id).click(function(){
		//alert("hi");
		var subtract = $("#unitquantity"+id).val();
		var perunitprice = $("#originalcost"+id).val();
		//var totalcost = $("totalvehicle_cost").val();

		if($(this).attr('data-type') == "plus"){
			var newVal = parseFloat(subtract) + 1;
			$("#unitquantity"+id).val(newVal);
			var secondtotal = $("#unitcost"+id).val(parseInt(perunitprice * newVal));
			//$("#totalvehicle_cost").val(secondtotal + parseInt(secondtotal));
			var cost = [];
			    var i = 0;
				//var id = 2;
			    $(".per_unitcost").each(function(){
      			cost[i] = $(this).val();
      			i++;
				//id++;
			    })
			var total = 0;
			for(var i = 0; i < cost.length; i++) {
    			total += cost[i] << 0;
			}
			
			$("#totalvehicle_cost").val(parseInt(total));
		}

	    });

	    $('#subtbtn'+id).click(function(){
		//alert("hi");
		var subtract = $("#unitquantity"+id).val();
		var perunitprice = $("#originalcost"+id).val();
		//var totalcost = $("totalvehicle_cost").val();

		if($(this).attr('data-type') == "minus"){

		  if(subtract > 1){
			var newVal = parseFloat(subtract) - 1;
			$("#unitquantity"+id).val(newVal);
			$("#unitcost"+id).val(parseInt(perunitprice * newVal));
			//$("#totalvehicle_cost").val(perunitprice * newVal + parseInt(totalcost));
			var cost = [];
			    var i = 0;
				//var id = 2;
			    $(".per_unitcost").each(function(){
      			cost[i] = $(this).val();
      			i++;
				//id++;
			    })
			var total = 0;
			for(var i = 0; i < cost.length; i++) {
    			total += cost[i] << 0;
			}
			
			$("#totalvehicle_cost").val(parseInt(total));
           }else{
			$("#unitquantity"+id).val(1);
		   }
		}

	    });

		
	 });

	});
        // if(confirmtrue == true){
        //  $("#vehiclebody").append(newrows);
        //  $("#countdivrow").val(id);
        // }

	$(document).on("click", "#other_remove", function(){
		   $(this).closest('tr').remove();
		   //calculate_other_price();
		   var count = $("#countdivrow").val();
		   count--;
		   $("#countdivrow").val(count);
		   //var unitcost = $()
		       var cost = [];
			    var i = 0;
				//var id = 2;
			    $(".per_unitcost").each(function(){
      			cost[i] = $(this).val();
      			i++;
				//id++;
			    })
			var total = 0;
			for(var i = 0; i < cost.length; i++) {
    			total += cost[i] << 0;
			}
			
			$("#totalvehicle_cost").val(parseInt(total));
		   
    });

	
})
        // function calculate_other_price(){
		// 	//var totalcost = parseInt($("#totalvehicle_cost").val());
        //     var cost = [];
		// 	    var i = 0;
		// 		//var id = 2;
		// 	    $(".per_unitcost").each(function(){
      	// 		cost[i] = $(this).val();
      	// 		i++;
		// 		//id++;
		// 	    })
		// 	var total = 0;
		// 	for(var i = 0; i < cost.length; i++) {
    	// 		total += cost[i] << 0;
		// 	}
			
		// 	$("#totalvehicle_cost").val(parseInt(total));
			
	    // }
	    
   function confHotelPackage()
   {
    var itineraryId = $("#editItiId").val();
    var selected_hotels = $("#selected_hotels").val();
    var selected_rooms = $("#selected_rooms").val();
    var selected_mealPlans = $("#selected_mealPlans").val();
    var startDate = $("#hidStartDate").val();
    var endDate = $("#hidEndDate").val();
    var hotel_partnerId = $("#sel_hotel_partner").val(); 
    var paxName = $("#leadPaxname").val();
    var paxContact = $("#PaxContact").val();
    var emp_ID = $("#emp_id").val();
    var rooms_req = $("#total_rooms").val(); 
    var adults = $("#total_adults").val();
    var Kids = $("#total_kids").val();
    var infants = $("#total_infants").val();
    var kidsAge = $("#kids_age").val();
    var sel_vehicle_Id = $("#sel_vehicle_Id").val();
    var selected_vehicle_unit = $("#selected_vehicle_unit").val();
    var selected_activities = $("#selected_activities").val();
    var selectedActvities_ID = $("#selectedActvities_ID").val();
    var perunitselected_activities = $("#perunitselected_activities").val();
    var totUnitOfActvArr = $("#totUnitOfActvArr").val();
    
    $.ajax({
        type:"POST",
        url:"<?php echo base_url(PARTNER)?>/confirmHotelFromPackage",
        data:{
              selected_hotels: selected_hotels,
              selected_rooms: selected_rooms,
              selected_mealPlans: selected_mealPlans,
              hotel_partnerId: hotel_partnerId,
              itineraryId: itineraryId,
              startDate: startDate,
              endDate: endDate,
              paxName: paxName,
              paxContact: paxContact,
              emp_ID: emp_ID,
              rooms_req: rooms_req,
              adults: adults,
              Kids: Kids,
              infants: infants,
              kidsAge: kidsAge,
              sel_vehicle_Id: sel_vehicle_Id,
              selected_vehicle_unit: selected_vehicle_unit,
              selected_activities: selected_activities,
              selectedActvities_ID: selectedActvities_ID,
              perunitselected_activities: perunitselected_activities,
              totUnitOfActvArr: totUnitOfActvArr,
            },
        //dataType:"JSON",
        beforeSend:function() {
			$("#custom-loader").css("display","block");
		},
		success:function(data){
		    if(data){
		        alert("success");
		    }
		},
		complete: function() {
			$("#custom-loader").css("display","none");
		}
		
    });
            
   }
    

function selected_roomTypes()
{
	var userRooms = '';
	var i=0;
	$(".userRoomTypes").each(function(){
		//alert($(this).val());
		i++;
		var val = $(this).val();
		userRooms += val+',';
	});
	$("#userSelectRoomTypes").val(userRooms);
	
	var userSelctedMeals = '';
	$(".mealTypes").each(function(){
		//alert($(this).val());
		i++;
		var val = $(this).val();
		userSelctedMeals += val+',';
	});
	$("#userSelectedMealPlans").val(userSelctedMeals);	
}

function selHotelRoom(roomId){
	  
	    if($(this).find('option:selected').text() == 'Select Room Type'){
	        $("#room_amenities"+roomId).css("display","none");
	    }
	    else{
	        $("#room_amenities"+roomId).css("display","block");
	    }
	   //alert($(this).find('option:selected').val());
}

function selHotelMeal(mealId){
    if($(this).find('option:selected').val() !== '0'){
	        $("#meal_inclusions"+mealId).css("display","block");
	  }else{
	        $("#meal_inclusions"+mealId).css("display","none");
	  }
}

// function userActivities(rowId){
//     var label = $("#perPrsonAct"+rowId).find('option:selected').val();
//     //alert(label);
//     $("#perpersonAct_"+rowId).val(label);
//     var label2 = $("#UnitPerPrsonAct"+rowId).find('option:selected').val();
//     $("#perUnitAct_"+rowId).val(label2);
// }

function calculate_priceWith_margin(margin_val)
{
	var roomPrices = $("#calculated_prices").val();
	var vehicle_price = $("#vehicle_price").val();
	if(roomPrices == '')
	{
		return false;
	}
	
	var obj = JSON.parse(roomPrices);
	//console.log(obj);
	var partnermarkup = $("#partnerMarkup").val();
	var totalRooms = $("#totalBookingRooms").val();
	var totPrice = parseInt(0);
	//var totaladults = $("#totaladultsforpack").val();
	var totaladultsforpackage = $("#totaladultsforroom").val();
	var totalchildforpackage = $("#totalkidsforroom").val();
	var totalpersonsforpackage = parseInt(totaladultsforpackage) + parseInt(totalchildforpackage);
	var multiplevehicleadding = $("#totalvehicle_cost").val(); //getting total vehicle cost of multiple vehicle
	var vehiclecostwithmargin = parseInt(multiplevehicleadding) + (parseInt(multiplevehicleadding)*parseInt(margin_val)/100);
	var splitvehiclecostbyroom = parseInt(vehiclecostwithmargin)/totalpersonsforpackage;
	//alert(totalRooms);
	//var prRoomVehCost = parseInt(vehicleCost)*(parseInt(no_of_vehicle))/parseInt(totalRooms);	

	var vehicle_price_with_margin = parseInt(vehicle_price) + (parseInt(vehicle_price)*parseInt(margin_val)/100);
	var roomwise_vehicle_price = vehicle_price_with_margin/2;

	for(var i=1; i<=totalRooms; i++)
	{
		var totaladults = $("#totaladultsforpack"+i).val();
		var totalchilds = $("#totalchildforpack"+i).val();
		var totalpaxforpak = parseInt(totaladults) + parseInt(totalchilds);
		//console.log(totalpaxforpak);
		var roomPrice = parseInt(obj[i]);
		roomPrice = roomPrice + (roomPrice*parseInt(margin_val)/100) + roomwise_vehicle_price + (parseInt(splitvehiclecostbyroom)*parseInt(totalpaxforpak)) + (roomPrice*parseInt(partnermarkup)/100) + (roomPrice*parseInt(partnermarkup)/100*18/100);
		//alert($roomPrice);
		$("#roomPrice_"+i).html(Math.round(roomPrice));
		//alert(obj[i]);
		totPrice += parseInt(Math.round(roomPrice));
	}

	var final_price = parseInt(totPrice);
	//alert(totPrice);
	$("#rooms_total").val(final_price);
	$("#totalHotelPrice").html(final_price);
	var serviceTax = (final_price*5)/100;
	$("#serviceTax").html(serviceTax);
	$("#rooms_tax").val(serviceTax);
	var grandTotal = parseInt(final_price) + parseInt(serviceTax);
	$("#grandTotal").html(grandTotal);
	$("#rooms_grandtotal").val(grandTotal);
	$("#hot_supp_cost").html('');
	//get_hotel_suppl_cost(); 
	
	var optVal = '';
	var hotelIds = '';
	var checkInDate = '';
	var checkOutDate = '';
	
	$(".hoteltypes").each(function(){
		optVal += $(this).find("option:selected").text()+',';
		if($(this).val() != '')
		{
			hotelIds += $(this).val()+',';
			checkInDate += $(this).attr('selectedDate')+',';
			checkOutDate += $(this).attr('selectedcheckOutDate')+',';
		}
	});

	$("#selected_hotels").val(optVal+'$#$'+hotelIds+'$#$'+checkInDate+'$#$'+checkOutDate);
	
	var hotelPartnerId = '';
	$(".hoteLPartnerId").each(function(){
	    if($(this).val() != ''){
	        
	        hotelPartnerId += $(this).val()+',';
	    }
	});
	
	$("#sel_hotel_partner").val(hotelPartnerId);
	
	var optValRooms = '';
	var SelRoomIds = '';
	$(".userRoomTypes").each(function(){
		optValRooms += $(this).find("option:selected").text()+',';
		if($(this).val() != '' && $(this).val() != 0)
		{
			SelRoomIds += $(this).val()+',';
		}
	});
	$("#selected_rooms").val(optValRooms+'$#$'+SelRoomIds);
	
	var optValVehicle = '';
	var SelVehicleIds = '';
// 	$(".selectVehicle").each(function(){
// 		optValVehicle += $(this).find("option:selected").text()+',';
// 		if($(this).val() != '')
// 		{
// 			SelVehicleIds += $(this).val()+',';
// 		}
// 	});
	
	$(".sel_vehicle").each(function(){
	    optValVehicle += $(this).find("option:selected").text()+',';
		//if($(this).val() != '' && $(this).val() != 0)
		if($(this).find("option:selected").text() != 'Select Vehicle')
		{
			SelVehicleIds += $(this).val()+',';
 		}
	});
    //$("#selected_vehicle").val(optValVehicle+'$#$'+SelVehicleIds);
	$("#selected_vehicle").val(optValVehicle);
	$("#sel_vehicle_Id").val(SelVehicleIds);
	var veh_unit = '';
	$(".unitquantity").each(function(){
	    
	    veh_unit += $(this).val()+',';
	});
	$("#selected_vehicle_unit").val(veh_unit);
	
	var MealoptVal = '';
	var SelMealIds = '';
	$(".mealTypes").each(function(){
		MealoptVal += $(this).find("option:selected").text()+',';
		if($(this).val() != '' && $(this).val() != 0)
		{
			SelMealIds += $(this).val()+',';
		}
	});
	$("#selected_mealPlans").val(MealoptVal+'$#$'+SelMealIds);

	var optValActivity = '';
	var SelActivityIds = [];
	var selActDate = '';
	$(".activities").each(function(){
		
		optValActivity += $(this).find("option:selected").text()+',';
		if($(this).val() != '')
		{
			//SelActivityIds += "{"+$(this).select2("val")+"},";
			//selActDate += $(this).attr('seldate')+',';
			SelActivityIds.push($(this).val());
		}
		if($(this).find("option:selected").text() != ''){
		    selActDate += $(this).attr('seldate')+',';
		}
	});
	
	var newselactArr = JSON.stringify(SelActivityIds);
	//console.log(newselactArr);
	$("#selected_activities").val(optValActivity+'$#$'+selActDate);
	$("#selectedActvities_ID").val(newselactArr);
	
    var perunitactivity = '';
    var SelperUnitActId = [];
    var selPerUnitActDate = '';
	$(".activitiesperunit").each(function(){
		
		perunitactivity += $(this).find("option:selected").text()+',';
		
		if($(this).val() != '')
		{
			SelperUnitActId.push($(this).val());
		}
		if($(this).find("option:selected").text() != ''){
		    selPerUnitActDate += $(this).attr('seldate')+',';
		}
		//alert(SelActivityIds);
	});
	
    var newSelPerUnitactArr = JSON.stringify(SelperUnitActId);
	$("#perunitselected_activities").val(perunitactivity+'$#$'+selPerUnitActDate+'$#$'+newSelPerUnitactArr);
	
	var totalunitofactivity = '';
	var totalUnitOFActArr = [];
	$(".activityunit").each(function(){
	    totalunitofactivity +=$(this).val()+',';
	    totalUnitOFActArr.push($(this).val());
	});
	
	var unitofActivityArr = JSON.stringify(totalUnitOFActArr);
	$("#totalunitofactivities").val(totalunitofactivity);
	$("#totUnitOfActvArr").val(unitofActivityArr);

	var optValVechicleVendor = '';
	var SelVechicleVendorIds = '';
	$(".selectVehicleVendor").each(function(){
		optValVechicleVendor += $(this).find("option:selected").text()+',';
		if($(this).val() != '')
		{
			SelVechicleVendorIds += $(this).val()+',';
		}
	});

	$("#selected_vvendor").val(optValVechicleVendor+'$#$'+SelVechicleVendorIds);
	
	var totalroomprices = '';
	$(".roomPricesbyroom").each(function(){
	    totalroomprices += $(this).text()+',';
	    
	});
	//var roomWisePrice = totalroomprices.replace( /,$/, "").split(',');
// 	$("#rooms_prices").val(JSON.stringify(Object.assign({}, roomWisePrice)));
    $("#rooms_prices").val(totalroomprices);
	//console.log(totalroomprices);
}

function downlaod_pdf(param, action)
{
    // console.log(param);
    // console.log(action);
    var base_url = "<?php echo base_url(); ?>";
	var prices = $("#calculated_prices").val();
	var room_prices = $("#rooms_prices").val();
	var total_roomprices = $("#rooms_total").val();
	var service_tax = $("#rooms_tax").val();
	var grand_total = $("#rooms_grandtotal").val();
	var selc_hotels = $("#selected_hotels").val();
	var selc_rooms = $("#selected_rooms").val();
	var selc_mealPlans = $("#selected_mealPlans").val();
	var queryNumber = $("#queryNumber").val();
	var priceMargin = $("#priceMargin").val();
	var selc_vehicle = $("#selected_vehicle").val();
	var selc_vehicle_unit = $("#selected_vehicle_unit").val();
	var selc_Vvendor = $("#selected_vvendor").val();
	var selc_activity = $("#selected_activities").val();
	var selc_perUnitactivity = $("#perunitselected_activities").val();
	var total_unitofact = $("#totalunitofactivities").val();
	var flight_details = $("#flydetails").val();
	var queryName = $("#queryname").val();
	var empName = $("#empname").val();
	var queryId = $("#queryid").val();
	
	selc_hotels = btoa(selc_hotels);
	var data = "pdfType=package&prices="+prices+'&room_prices='+room_prices+'&total_roomprices='+total_roomprices+'&service_tax='+service_tax+'&grand_total='+grand_total+'&selRooms='+selc_rooms+'&selHotels='+selc_hotels+'&selVehicle='+selc_vehicle+'&selVehicleunit='+selc_vehicle_unit+'&qNo='+queryNumber+'&pMargin='+priceMargin+'&selMealPlans='+selc_mealPlans+'&selVehicleVendor='+selc_Vvendor+'&selActivity='+selc_activity+'&selUnitactivity='+selc_perUnitactivity+'&seltotalunitact='+total_unitofact+'&queryName='+queryName+'&employeeName='+empName+'&queryId='+queryId+'&flightdetails='+flight_details;	
	$.ajax({
		type:"POST",
		url:"<?php echo base_url() ?>"+'generate_package_pdf.php?'+param,
		data:data,
		beforeSend:function(){
			
		},
		success:function(html){
		    
			//return false;
			
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
					url: "<?php echo base_url() ?>"+"send_email.php",
					data: $("#tour_mail").serialize(),
					cache: false,
					beforeSend:function() {
						$("#showLoaderEmail").show();
					},
					success: function(html)
					{
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