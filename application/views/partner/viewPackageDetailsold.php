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

.select2-container{

	display:block;
}
</style>
<div id="wrapper">
<div id="layout-static">
<div class="static-content-wrapper">
<div class="static-content">
<div class="page-content">
<ol class="breadcrumb">
   <li><a href="<?php echo base_url(PARTNER) ?>/dashboard">Home</a></li>
   <li><a href="#">View Package Details</a></li>
</ol>
<div class="content-wrapper">
	<section class="content">
	    <!--checking if type is pdf or not-->
	    <?php 
				$rupeeSymbol = '<img src="'.APP_URL.'images/rupee.png" alt="" style="margin-top:3px;" />';
				if($type != 'pdf')
				{
					$border = 'border: 1px solid #DDD;';
					$rupeeSymbol = '';
			?>
          <h3>
             View Package Detail
			</h3>
		 <?php
				}
				else
				{
					
				}
		 ?>
		<div class="row">
		<div class="col-md-12">
			<div class="box box-default">
			<form id="formData">
				<input type="hidden" id="hidStartDate" name="hidStartDate" value="<?php echo $startdate;?>" />
				<input type="hidden" id="hidEndDate" name="hidEndDate" value="<?php echo $enddate;?>" />
				<input type="hidden" id="searchType" name="searchType" value="Package" />
				<div class="box-header with-border">
					<div id="status1"></div>
					<div id="searchType" style="font-size:20px;border-bottom: 1px solid #EEE;padding-bottom: 5px;"><?php echo $itiTitle;?></div>
						<input type="hidden" name="hotelId" id="hotelId" value='<?php echo $editHotelId; ?>'>
						<input type="hidden" name="hotelDateId" id="hotelDateId" value='<?php echo $hotelDateId; ?>'>
						<input type="hidden" name="searchDataStr" id="searchDataStr" value='<?php echo $searchData; ?>'>
						<input type="hidden" name="userSelectRoomTypes" id="userSelectRoomTypes" value=''>
						<input type="hidden" name="userSelectHotel" id="userSelectHotel" value=''>
						<input type="hidden" name="userSelectedMealPlans" id="userSelectedMealPlans" value=''>
						<input type="hidden" name="totalBookingRooms" id="totalBookingRooms" value="<?php echo $searchrooms; ?>">
						<input type="hidden" name="itineryDuration" id="itineryDuration" value="<?php echo $itineraryData['duration']; ?>">
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
						
					<div class="col-md-12" style="margin-top:10px; padding:0">
					    <!--adding this to check pdf-->
					    <?php
					    if($type != 'pdf'){
					        
					    ?>
						<div class="form-group form-inline">
							<label for="userPhone">Query Numebr: </label>
							<input type="input" name="queryNumber" id="queryNumber" class="form-control" placeholder="Query Number" value="<?php echo $queryNumber; ?>" />
							<button type="button" class="btn btn-primary" name="searchQueryBtn" id="searchQueryBtn" style="margin-left: 10px;">Search</button>	
						</div>
						<?php
					    }
					    ?>
					</div>	
				</div>	
				<div class="box-body">
				    <!--adding this to check pdf-->
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
					<div style="border: 1px solid #DDD;padding: 10px;border-radius: 5px;float: left;width: 100%; margin-bottom:10px;">
						<div class="col-md-12">
							<div class="row" id="showQueryDetail">
								<?php echo $quryDetail; ?>
							</div>	
							<div class="row">
								<div class="col-md-12">
								    <?php 
									    if(!empty($queryname))
									    {
									        echo "<p>Dear Mr. $queryname</p>";
									    }
									    ?>
									<p>Greetings from <strong><span style="font-size: 19px;background: yellow; color:#00c0ef;">LiD – Travel </span>!!!</strong></p>
									<p>Myself <?php if(!empty($emp_name)){echo $emp_name; }else{ echo "Ashish";}?>, I'll be handling all your arrangements regarding your tour package. Thank you for considering us for your forthcoming travel plan, as per details provided by you we are pleased to quote the following:</p>
								</div>
							</div>
						</div>

						<div class="col-md-12">
							<h3>Tour Details</h3>
							<div class="table-responsive">
							<table class="table table-bordered" cellspacing="0" width="100%">
								<tr>
									<td style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;padding: 8px;">Tour Name</td>
									<td style="border: 1px solid #f4f4f4;padding: 8px;"><?php echo $itiTitle;?></td>
									<td style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;padding: 8px;">Destinations Covered</td>
									<td style="border: 1px solid #f4f4f4;padding: 8px;">
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
									</td>
								</tr>
								<tr>
									<td style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;padding: 8px;">Starting From</td>
									<td style="border: 1px solid #f4f4f4;padding: 8px;">
										<?php echo date('d, F Y',strtotime($startdate));?>
									</td>
									<td style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;padding: 8px;">Ending On</td>
									<td style="border: 1px solid #f4f4f4;padding: 8px;"><?php echo date('d, F Y',strtotime($enddate));?></td>
								</tr>
								<tr>
									<td style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;padding: 8px;">Duration</td>
									<td style="border: 1px solid #f4f4f4;padding: 8px;">
									<?php echo $Itiduration-1;?> Nights &amp; <?php echo $Itiduration;?> Days
									</td>
									<td style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;padding: 8px;">No. Of Passengers</td>
									<td style="border: 1px solid #f4f4f4;padding: 8px;">
										<?php echo $totalAdults; ?> Adults + <?php echo $totalKids; ?> Kids
									</td>
								</tr>
							</table>	
							</div>
						</div>

						<div class="col-md-12">
							<div class="col-sm-7"><h1 style="text-decoration:underline; font-family:'Comic Sans MS', cursive">Itinerary</h1></div>
							<div class="col-sm-5" style="padding:25px;"><img class="img-responsive" src="<?php echo base_url()?>assets/images/travelicon.png"></div>
							<center>
							<?php
								if (!empty($itineraryDetails)) {
									for ($i=0; $i <count($itineraryDetails); $i++) {
										$images = json_decode($itineraryDetails[$i]['itinerary_images']);
										if ($i % 2 == 0) { ?>
											<div class="container">
												<div class="row">
													<div class="container"><div class="col-sm-2 col-sm-offset-5 text-center" style="background-color:#10ade2; border-radius:100%; width:60px; height:60px; padding:10px; border-style:solid; border-color:#e1e1e1; box-shadow: 3px 3px 3px grey; color:#fff">DAY 0<?php echo $i+1;?></div></div>
													<br>
													<div class="col-sm-9"><!-- Panel -->
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
													<div class="col-sm-3">
													<?php
														foreach ($images as $image) { ?>
														<img src="<?php echo base_url().'uploads/itinerary_images/'.$image;?>" class="img-responsive" width="330" height="50">
													<?php }
													?>
													</div>
													<br>
													</div>
												</div>
									<?php }else{ ?>
											<div class="container">
												<div class="row">
													<div class="container"><div class="col-sm-2 col-sm-offset-5 text-center" style="background-color:#10ade2; border-radius:100%; width:60px; height:60px; padding:10px; border-style:solid; border-color:#e1e1e1; box-shadow: 3px 3px 3px grey; color:#fff">DAY 0<?php echo $i+1;?></div></div>
													<br>
													<div class="col-sm-3"><img src="<?php echo base_url().'uploads/itinerary_images/'.$image;?>" class="img-responsive" width="330" height="50"></div>
													<div class="col-sm-9"><!-- Panel -->
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
											</div>
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
									<th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;"><?php echo $headTxt; ?>Hotel</th>
									<th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;"><?php echo $headTxt; ?>Room Type</th>
									<th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;"><?php echo $headTxt; ?>Meal Plan</th>
									<!-- <th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;"><?php //echo $headTxt; ?>Vehicle</th>
									<th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;"><?php// echo $headTxt; ?>Vehicle Unit</th>
									<th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;"><?php// echo $headTxt; ?>Vehicle Vendor</th> -->
									<!-- <th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;"><?php //echo $headTxt; ?>Per Person Activities</th>
									<th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;"><?php //echo $headTxt; ?>Per Unit Activities</th> -->
									<!--<th>Price</th>-->
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
										$date = date('d, F Y',strtotime($startdate . $day));
										$dateSearch = date('Y-m-d',strtotime($startdate . $day));

										$hotelSearchData=$CI->admin_model->getHotelsByCityDate($cityId, $dateSearch);

										//$activitiesSearchData = $CI->admin_model->getAcivitiesByCity($cityId);

										//$activitiesByUnitSearchData = $CI->admin_model->getPerUnitAcivitiesByCity($cityId);
										
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

								// 		$activityStr = '<option value="">Select Activity</option>';
								// 		foreach($activitiesSearchData as $activity) {
								// 			$activity_id = $activity['id'];
								// 			$activity_name = $activity['details'];
								// 			$activityStr .= '<option value="'.$activity_id.'">'.$activity_name.'</option>';
								// 		}

								// 		$activityunitStr = '<option value="">Select Activity</option>';
								// 		foreach($activitiesByUnitSearchData as $activityByUnit) {
								// 			$activityByUnit_id = $activityByUnit['id'];
								// 			$activityByUnit_name = $activityByUnit['details'];
								// 			$activityunitStr .= '<option value="'.$activityByUnit_id.'">'.$activityByUnit_name.'</option>';
								// 		}

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
											<select class="form-control hoteltypes col-md-6" name="selectedHotel[]" rel="<?php echo $i; ?>" id="hotel_<?php echo $i; ?>" selectedDate="<?php echo $dateSearch; ?>">
												<?php
													echo $hotelStr;
												?>
											</select>
											<?php
												}
											?>
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
											<select class="form-control userRoomTypes" name="selectedRoom[]" rel="<?php echo $i; ?>" id="roomType_<?php echo $i; ?>" selDate="<?php echo $dateSearch; ?>">
												<?php echo $roomTypeStr; ?>
											</select>
											<?php
												}
											?>
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
											<select class="form-control mealTypes" name="selectedMealPlans[]" rel="<?php echo $i; ?>" id="mealType_<?php echo $i; ?>" selDate="<?php echo $dateSearch; ?>">
												<option value="0">Select Meal Plan</option>
											</select>
											<?php
												}
											?>
										</th>
										<!-- <th style="border: 1px solid #f4f4f4;"> -->
											<!-- <select class="form-control selectVehicle" name="selectVehicle[]" rel="<?php //echo $i; ?>" id="selectVehicle_<?php //echo $i; ?>" selDate="<?php //echo //$dateSearch; ?>"> -->
												<!-- <option value="0">Select Vehicle</option> Itinerary_vehicle_cost_id | vehicle_id | vehicle_vendor_id -->
												<!-- <?php //if($vehcle_detail[$i-1]['vehicle_1_name'] != ''){ ?> 
														<option value="<?php //echo $vehcle_detail[$i-1]['id'].'|'.$vehcle_detail[$i-1]['vehicle_1'].'|'.$vehcle_detail[$i-1]['vendor_1'].'|'.$vehcle_detail[$i-1]['price_1']; ?>"><?php //echo $vehcle_detail[$i-1]['vehicle_1_name']; ?></option>
												<?php //} ?>
												<?php //if($vehcle_detail[$i-1]['vehicle_2_name'] != ''){ ?>
														<option value="<?php //echo $vehcle_detail[$i-1]['id'].'|'.$vehcle_detail[$i-1]['vehicle_2'].'|'.$vehcle_detail[$i-1]['vendor_2'].'|'.$vehcle_detail[$i-1]['price_2']; ?>"><?php //echo //$vehcle_detail[$i-1]['vehicle_2_name']; ?></option>
												<?php //} ?>
												<?php //if($vehcle_detail[$i-1]['vehicle_3_name'] != ''){ ?>
														<option value="<?php //echo $vehcle_detail[$i-1]['id'].'|'.$vehcle_detail[$i-1]['vehicle_3'].'|'.$vehcle_detail[$i-1]['vendor_3'].'|'.$vehcle_detail[$i-1]['price_3']; ?>"><?php //echo //$vehcle_detail[$i-1]['vehicle_3_name']; ?></option>
												<?php //} ?> -->
											<!-- </select> -->
											<!-- <select class="form-control selectVehicle select2" name="" rel="<?php// echo $i; ?>" id="" selDate="" multiple="multiple">
											 <option value="0">select vehicle</option>
											 <option>vehicle 1</option>
											 <option>vehicle 2</option>
											 <option>vehicle 3</option>
											 <option>vehicle 4</option>
											 <option>vehicle 5</option>
											</select>
										</th> -->
										 
										<!-- <th>
										<input type="text" class="form-control" name="" rel="<?php// echo $i; ?>" id="">
										</th>
										<th style="border: 1px solid #f4f4f4;">
											 <select class="form-control selectVehicleVendor" name="selectVehicleVendor[]" rel="<?php //echo $i; ?>" id="selectVehicleVendor_<?php //echo $i; ?>" selDate="<?php //echo $dateSearch; ?>">
												<option value="0">Select vendor </option>
											</select> 
											<select class="form-control select2" name="" id="" rel="<?php// echo $i; ?>" selDate="<?php //echo $dateSearch; ?>" multiple="multiple">

											</select>
										</th> -->
										<!-- <th style="border: 1px solid #f4f4f4;">
											<select class="form-control activities select2" name="activities_<?php //echo $i; ?>[]" rel="<?php //echo $i; ?>" id="activities_<?php //echo $i; ?>" selDate="<?php //echo $dateSearch; ?>" multiple="multiple">
												<?php
													//echo $activityStr;
												?>
											</select>
										</th>

										<th style="border: 1px solid #f4f4f4;">
											<select class="form-control activitiesperunit select2" name="activitiesperunit_<?php //echo $i; ?>[]" rel="<?php //echo $i; ?>" id="activitiesperunit_<?php //echo $i; ?>" selDate="<?php //echo $dateSearch; ?>" multiple="multiple">
												<?php
													//echo $activityunitStr;
												?>
											</select>
										</th> -->
									</tr>
								    <?php }
								?>
								</tbody>
							</table>
							</div>
						</div>
						<div class="col-md-12">
						    <div class="vertical-center-row" style="margin-left: 480px; width: 350px;">
							 <button type="button" class="btn btn-primary btn-md" id="showvehcile">Add Vehicle</button>
							 <button type="button" class="btn btn-primary btn-md" id="showvactivity">Add Activities</button>
							 <button type="button" class="btn btn-primary btn-md" id="showflightdiv">Add Flight</button>
							</div>
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
									  <input type="text" id="originalcost" value="" style="width:90px;" readonly>
									  <input type="text" id="unitcost"  class="per_unitcost" value="" style="width:90px;" readonly>
								   </td>
								   <input type="text" id="totalvehicle_cost" name="" value="0">
								  </tr>
								 </tbody>
			    				</table>
							</div>
						</div>
						<!------activities------>
						<!--<div class="col-md-12">-->
						<!--    <div class="vertical-center-row">-->
						<!--	 <button type="button" class="center-block btn btn-primary btn-md" id="showvactivity">Add Activities</button>-->
						<!--	</div>-->
						<!--</div>-->
						<div class="col-md-12" style="display:none;" id="activitiesdata">
    						<h3>Activities Envisaged</h3>
							<div class="table-responsive">
		    					<table class="table table-bordered" cellspacing="0" width="100%">
								 <thead>
								  <tr>
								   <th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4; width:80px;">Day</th>
								   <th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4; width:140px;">City</th>
								   <th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4; width:140px;">Date</th>
								   <th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;">Activities By Person</th>
								   <th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;">Activities By Unit</th>
								   <th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4; width:140px;">Total Unit</th>
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

										$activityunitStr = '<option value="">Select Activity</option>';
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
								      <select class="form-control activities select2" name="activities_<?php echo $i; ?>[]" rel="<?php echo $i; ?>" id="activities_<?php echo $i; ?>" selDate="<?php echo $dateSearch; ?>" multiple="multiple">
										<option value="Select">Select Activities</option>
										<?php
											echo $activityStr;
										?>
									  </select>
								   </th>
									 
								   <th style="border: 1px solid #f4f4f4;">
								      <select class="form-control activitiesperunit select2" name="activitiesperunit_<?php echo $i; ?>[]" rel="<?php echo $i; ?>" id="activitiesperunit_<?php echo $i; ?>" selDate="<?php echo $dateSearch; ?>" multiple="multiple">
										<?php
											echo $activityunitStr;
										?>
									  </select>
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
									 
								   <!--<td>-->
           <!--                          <input type="text" class="form-control">-->
           <!--                        </td>-->
								   
								  </tr>
								 </tbody>
			    				</table>
							</div>
						</div>
						<div class="col-md-12">	
						   
							<div class="col-md-8">
								<h3>Add Margin(%)</h3>
								<div class="hotelDetail">
									<table class="table table-bordered" cellspacing="0">
										<tr>
											<td>Enter your percentage</td>
											<td style="border: 1px solid #f4f4f4;padding: 8px;">
												<input type="number" id="priceMargin" value="0" onkeyup="calculate_priceWith_margin(this.value)" maxlength="2" />
											</td>
										</tr>
									</table>
								</div>
							</div>
							<div class="col-md-4">
								<button type="button" class="btn btn-primary btn-lg" id="calculate_prices" style="margin-top:63px;">Calculate Price</button>
							</div>
							
						</div>
						<br/><br/>
						<div class="col-md-12">		
							<h3>Tour Cost</h3>	
							<div class="table-responsive">
							<table class="table table-bordered" cellspacing="0" width="100%">
								<tr><th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;">Room</th>
								<th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;">Adult</th>
								<th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;">Infants</th>
								<th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;">Child(ren)</th>
								<th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;">Child(ren) Age</th>
								<th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;">Price</th></tr>
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
								<tr>
									<td colspan="5" style="text-align:center;border: 1px solid #f4f4f4;padding: 8px;">Sub Total</td>
									<td style="border: 1px solid #f4f4f4;padding: 8px;"><span><i class="fa fa-inr" aria-hidden="true"></i></span><?php echo $rupeeSymbol; ?> <span id="totalHotelPrice"><?php echo $subTotal; ?></span></td>
								</tr>
								<tr>
									<td colspan="5" style="text-align:center;border: 1px solid #f4f4f4;padding: 8px;">GST @ 5%</td>
									<td style="border: 1px solid #f4f4f4;padding: 8px;"><span><i class="fa fa-inr" aria-hidden="true"></i></span> <?php echo $rupeeSymbol; ?> <span id="serviceTax"><?php echo $serviceTax; ?></span></td>
								</tr>
								<tr style="font-size: 18px;font-weight: 600;">
									<td colspan="5" style="text-align:center;border: 1px solid #f4f4f4;padding: 8px;">Grand Total</td>
									<td style="border: 1px solid #f4f4f4;padding: 8px;"><span><i class="fa fa-inr" aria-hidden="true"></i></span><?php echo $rupeeSymbol; ?> <span id="grandTotal"><?php echo number_format(floor($grandTot)); ?></span></td>
								</tr>
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
						<!--<a href="<?php echo $downloadPdfUrl; ?>" class="btn btn-info" id="download">Download PDF</a>-->
						<input type="hidden" id="calculated_prices" value="" />
						<input type="hidden" id="rooms_prices" value="" />
						<input type="hidden" id="rooms_total" value="" />
						<input type="hidden" id="rooms_tax" value="" />
						<input type="hidden" id="rooms_grandtotal" value="" />
						<input type="hidden" id="selected_hotels" value="" />
						<input type="hidden" id="selected_rooms" value="" />
						<input type="hidden" id="selected_mealPlans" value="" />
						<input type="hidden" id="selected_vehicle" value="" />
						<input type="hidden" id="selected_activities" value="" />
						<input type="hidden" id="perunitselected_activities" value="" />
						<input type="hidden" id="totalunitofactivities" value="" />
						<input type="hidden" id="selected_vvendor" value="" />
						<input type="hidden" id="selectedVehicle" value="" />
						<input type="hidden" id="vehicle_price" value="" />
						<input type="hidden" id="selected_vehicle_unit" value="" />
						<input type="hidden" id="queryname" value="<?php echo $queryname; ?>" />
				        <input type="hidden" id="empname" value="<?php echo $emp_name; ?>" />
				        <input type="hidden" id="queryid" value="<?php echo $queryid; ?>" />
						<button type="button" class="btn btn-info" id="download" onclick="downlaod_pdf('<?php echo '&searchData='.$_SERVER['REQUEST_URI'].'&itiTitle='.base64_encode($itiTitle); ?>', 'downlaod')">Download PDF</button>&nbsp;&nbsp;&nbsp;
						<a class="btn btn-primary pull-right" href="#sendToCl" data-toggle="modal"><i class="fa fa-envelope-o"></i> Mail to Client</a>
						
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
									Myself <?php if(!empty($emp_name)){echo $emp_name; }else{ echo "Ashish";}?>, I'll be handling all your arrangements regarding your tour package.</br></br>
									Thank you for considering us for your forthcoming travel plan, in response please find attached tour proposal for your kind perusal as per the details provided by you.<br/><br/>
									We Hope all the above is in order and if you need any further clarification please call / write us.<br/><br/>
									Looking forward for a response/acknowledgment/confirmation on the same at the earliest.<br/><br/>
									Thanks and Regards !!!<br/>
									<?php if(!empty($emp_name)){ echo $emp_name;}else{ echo "Ashish";}?><br/>
									Team LiD</br/>
									<?php if(!empty($emp_mobile)){ echo "m.+91".$emp_mobile;}else{ echo "m.+91(0)9990444740";}?><br/><br/>
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

<?php
    if ($this->uri->segment(2) == 'viewPackageDetails') { ?>
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
	
	$(".select2").select2();

	$(document).on('change','.hoteltypes',function(){
		var searchType 	= $("#searchType").val();
		var startDate 	= $("#hidStartDate").val();
		var endDate 	= $("#hidEndDate").val();
		var selDate 	= $(this).attr('selectedDate');
		
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
				$("#mealType_"+number).html(dataArr[1]);
				//alert(html);
				//$("#showQueryDetail").html(html);
				selected_roomTypes();
				//calculate_price($(this).attr('rel'));
			}
		});
	});

	$(document).on('change','.selectVehicle',function(){
		var number = $(this).attr('rel');
		var data1 =  $("#selectVehicle_"+number).val();

		var data = 'vehicle_id='+data1;
		$.ajax({
			type:"POST",
			url:"<?php echo base_url(PARTNER).'/getVehicleVendorName'?>",
			data:data,
			beforeSend:function(){
				
			},
			success:function(html){
				$("#selectVehicleVendor_"+number).html(html);
			}
		});
	});

	$("#calculate_prices").click(function(){
		var priceMargin = $("#priceMargin").val();

		// var duration = $("itineryDuration").val();
		// for(var i=1; i<=duration; i++;){
		// 	var check = $("#totalactivityunit_"+i).val();
		// 	console.log(check);
		// }
	
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
			}
			
		});
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
// 	$(".activities option").each(function(){
// 	     if($(this).not(':selected')){
// 	         $(".activities option[value='Select']").attr('selected', 'selected');
// 	     }
  
// 	});


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
		newrows +='<input type="text" id="originalcost'+id+'" value="" style="width:90px;" readonly><input type="text" id="unitcost'+id+'" class="per_unitcost" style="width:90px;" readonly></td>';
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
		roomPrice = roomPrice + (roomPrice*parseInt(margin_val)/100) + roomwise_vehicle_price + (parseInt(splitvehiclecostbyroom)*parseInt(totalpaxforpak));
		//alert($roomPrice);
		$("#roomPrice_"+i).html(roomPrice);
		//alert(obj[i]);
		totPrice += parseInt(roomPrice);
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
	$(".hoteltypes").each(function(){
		optVal += $(this).find("option:selected").text()+',';
		if($(this).val() != '')
		{
			hotelIds += $(this).val()+',';
		}
	});
	//alert(optVal);
	$("#selected_hotels").val(optVal+'$#$'+hotelIds);
	
	var optValRooms = '';
	var SelRoomIds = '';
	$(".userRoomTypes").each(function(){
		optValRooms += $(this).find("option:selected").text()+',';
		if($(this).val() != '')
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
		if($(this).val() != '')
		{
			SelVehicleIds += $(this).val()+',';
 		}
	});
    //$("#selected_vehicle").val(optValVehicle+'$#$'+SelVehicleIds);
	$("#selected_vehicle").val(optValVehicle);
	
	var veh_unit = '';
	$(".unitquantity").each(function(){
	    
	    veh_unit += $(this).val()+',';
	});
	$("#selected_vehicle_unit").val(veh_unit);
	
	var MealoptVal = '';
	$(".mealTypes").each(function(){
		MealoptVal += $(this).find("option:selected").text()+',';
		
		//$(".userRoomTypes option:selected").text()+', ';
	});
	$("#selected_mealPlans").val(MealoptVal);

	var optValActivity = '';
	var SelActivityIds = '';
	$(".activities").each(function(){
		//alert($(this).val());
		optValActivity += $(this).find("option:selected").text()+',';
		//alert(optValActivity);
		if($(this).val() != '')
		{
			SelActivityIds += $(this).val()+',';
		}
		//alert(SelActivityIds);
	});
	
	$("#selected_activities").val(optValActivity);

    var perunitactivity = '';
	$(".activitiesperunit").each(function(){
		//alert($(this).val());
		perunitactivity += $(this).find("option:selected").text()+',';
		//alert(optValActivity);
		if($(this).val() != '')
		{
			SelActivityIds += $(this).val()+',';
		}
		//alert(SelActivityIds);
	});

	$("#perunitselected_activities").val(perunitactivity);
	
	var totalunitofactivity = '';
	$(".activityunit").each(function(){
	    totalunitofactivity +=$(this).val()+',';
	});
	
	$("#totalunitofactivities").val(totalunitofactivity);

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
	var data = "pdfType=package&prices="+prices+'&room_prices='+room_prices+'&total_roomprices='+total_roomprices+'&service_tax='+service_tax+'&grand_total='+grand_total+'&selRooms='+selc_rooms+'&selHotels='+selc_hotels+'&selVehicle='+selc_vehicle+'&selVehicleunit='+selc_vehicle_unit+'&qNo='+queryNumber+'&pMargin='+priceMargin+'&selMealPlans='+selc_mealPlans+'&selVehicleVendor='+selc_Vvendor+'&selActivity='+selc_activity+'&selUnitactivity='+selc_perUnitactivity+'&seltotalunitact='+total_unitofact+'&queryName='+queryName+'&empName='+empName+'&queryId='+queryId+'&flightdetails='+flight_details;	
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