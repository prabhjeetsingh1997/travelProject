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
    text-align: justify;
}
.panel .panel-heading h2 {
    padding: 0 !important;
}
.select2-search__field {
    width:auto;
}

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
		<?php
				}
				else
				{
					
				}
		 ?>
		<div class="row">
		<div class="col-md-12">
			<div class="box box-default">
			<form id="formData" method="POST" action="" target="">
				<input type="hidden" id="hidStartDate" name="hidStartDate" value="<?php echo $startdate;?>" />
				<input type="hidden" id="hidEndDate" name="hidEndDate" value="<?php echo $enddate;?>" />
				<input type="hidden" id="searchType" name="searchType" value="Package" />
				<div class="box-header with-border">
					<!--<div id="status1"></div>-->
					<!--<div id="searchType" style="font-size:20px;border-bottom: 1px solid #EEE;padding-bottom: 5px;"><?php //echo $itiTitle;?></div>-->
						
						<!--<input type="hidden" name="searchDataStr" id="searchDataStr" value='<?php //echo $searchData; ?>'>-->
						<!--<input type="hidden" name="totalBookingRooms" id="totalBookingRooms" value="<?php //echo $searchrooms; ?>">-->
						<!--<input type="hidden" name="itineryDuration" id="itineryDuration" value="<?php //echo $itineraryData['duration']; ?>">-->
						<!--<input type="hidden" name="editItiId" id="editItiId" value="<?php //echo $editItiId;?>">-->
						<!-- ---------- -->
						<!--<input type="hidden" name="totaladultsforroom" id="totaladultsforroom" value="<?php //echo $totalAdults; ?>">-->
						<!--<input type="hidden" name="totalkidsforroom" id="totalkidsforroom" value="<?php //echo $totalKids; ?>">-->
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
						<!--<input type="hidden" name="" id="kidsageforroom" value="<?php //echo $childp_age; ?>">-->

						<?php }
						?>
						
				</div>	
				<div class="box-body">
				    <!--adding this to check pdf-->
				    
					<div id="searchData" style="padding:15px 0;">
					<div style="border: 1px solid #DDD;padding: 15px 5px 15px 5px;border-radius: 10px;float: left;width: 100%; margin-bottom:10px;background-color: white;">
						
						<div class="col-md-12">
							<div class="form-group">
				                <label>Query No:</label>
				                <?php if($queryid !== ''){ ?>
				                    <input type="text" class="form-control" id="queryId" value="<?php echo "TWZQ00".$queryid; ?>" style="width:180px;" readonly>    
				                <?php }else{ ?>
				                    <input type="text" class="form-control" id="queryId" value="" style="width:180px;">
				                <?php } ?>
				                
				            </div>
							<div class="col-md-12" style="box-shadow:3px 3px 4px grey; border-radius:10px;">
							<div class="col-md-7">
							    <?php for($i=0; $i<count($itineraryDetails); $i++){
							              $images = json_decode($itineraryDetails[$i]['itinerary_images']);
							              } ?>
							    <div id="myCarousel" class="carousel slide" data-ride="carousel">
							        <div class="carousel-inner">
							            <div class="item active">
                                            <img src="<?php echo base_url().'uploads/itinerary_images/'.$images[0]; ?>" class="img-responsive" style="width:100%; padding: 2px; height: 400px;">
                                        </div>
                                        <?php for($i=1; $i<count($itineraryDetails); $i++) {
										$images = json_decode($itineraryDetails[$i]['itinerary_images']); 
										foreach($images as $image) {?>
										<div class="item">
                                            <img src="<?php echo base_url().'uploads/itinerary_images/'.$image; ?>" class="img-responsive" style="width:100%; padding: 2px; height: 400px;">
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
													<?php echo nl2br($itineraryDetails[$i]['itinerary_details']); ?>
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
													<?php echo nl2br($itineraryDetails[$i]['itinerary_details']); ?>
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
							<div class="table-responsive" style="overflow-x:hidden;">
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

										$k = $i-1;
									?>
									<tr>
										<th style="border: 1px solid #f4f4f4;"><?php echo $i; ?></th>
										<th style="border: 1px solid #f4f4f4;"><?php echo $cityArr[0]['city_name'];?></th>
										<th style="border: 1px solid #f4f4f4;"><?php echo $date;?></th>
										<th style="border: 1px solid #f4f4f4;">
								
											<input type="text" class="form-control hoteltypes" name="selectedHotel[]" id="hotel_<?php echo $i; ?>">
										
										</th>
										<th style="border: 1px solid #f4f4f4;">
								
											<input type="text" class="form-control userRoomTypes" name="selectedRoom[]" rel="<?php echo $i; ?>" id="roomType_<?php echo $i; ?>">

										</th>
										<th style="border: 1px solid #f4f4f4;">

											<select class="form-control mealTypes" name="selectedMealPlans[]" multiple="multiple" rel="<?php echo $i; ?>" id="mealType_<?php echo $i; ?>" onchange="" selDate="<?php echo $dateSearch; ?>">
												<!--<option value="">Select Meal Plan</option>-->
												<option value="Breakfast">Breakfast</option>
												<option value="Lunch">Lunch</option>
												<option value="Dinner">Dinner</option>
												<option value="Evening Tea With Snacks">Evening Tea With Snacks</option>
											</select>
											
										</th>
									</tr>
								    <?php }
								?>
								</tbody>
							</table>
							</div>
						</div>
						<div class="col-md-12" style="text-align:center;">
						    <button type="button" class="btn btn-primary btn-md" id="showvehcile">Add Vehicle</button>
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
								  
									 <input type="text" class="form-control sel_vehicle" name="" id="sel_vehicle">
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
								   <td>
								      <button type="button" class="btn btn-sm" id="clonerow" data-tooltip="add row">
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
								<th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4; width:60px;">Price(Per. Room)</th></tr>
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
										
										<td style="border: 1px solid #f4f4f4;padding: 8px;"><input type="text" class="form-control turcost" id=""></td>
									</tr>
									<?php	
									}
								?>
								<tr style="font-size: 18px;font-weight: 600;">
									<td colspan="5" style="text-align:center;border: 1px solid #f4f4f4;padding: 8px;">Grand Total</td>
									<td style="border: 1px solid #f4f4f4;padding: 8px;"><input type="text" id="totTurCost" class="form-control" readonly></td>
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
						<h3>Tour Inclusions:<span><a id="edtTRincl" data-toggle="tooltip" data-placement="top" title="Edit Tour Inclusions"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></span></h3>
						<div id="extrturIncl">
						<ul id="allturIncl">
							<li>Accommodation as per above details.</li>
							<li>Meals as per mentioned in above hotels envisaged.</li>
							<li>Chauffeur Driven Vehicle as per the Vehicle envisaged and itinerary.(vehicle is/are not on disposal basis)</li>
							<li>24 hours on-call/whatsapp assistance during your tour.</li>
							<li>All kind of applicable hotel, transport, service &amp; govt. taxes.</li>
							<li>GST is included.</li>
						</ul>
						</div>
							
						<!--flight div-->
						<button type="button" class="btn btn-primary btn-md" id="showflightdiv">Add Flight</button>
						<div class="col-md-12" style="display:none;" id="flightdata">
    						<h3>Flight Envisaged</h3>
							<div class="table-responsive">
		    					<table class="table table-bordered" cellspacing="0" width="">
								 <thead>
								  <tr>
								   <th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4; width: 300px;">Flight Details</th>
								   <th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4; width: 300px;">From</th>
								   <th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4; width: 300px;">To</th>
								   <th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4; width: 300px;">Departure</th>
								   <th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4; width: 300px;">Arrival</th>
								   <th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4; width: 150px;">Price(Per Pax.)</th>
								   <th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4; width: 50px;"></th>
								  </tr>
                                 </thead>
								 <tbody id="fltdtlbody">
								  <tr>
								   <td style="border: 1px solid #f4f4f4;padding: 8px;">
								     <!--<textarea class="form-control" rows="3" id="flydetails"></textarea>-->
								       <input type="text" class="form-control airlinename" id="">
								   </td>
								   <td style="border: 1px solid #f4f4f4;padding: 8px;">
								       <input type="text" class="form-control flightFrom" id="">
								   </td>
								   <td style="border: 1px solid #f4f4f4;padding: 8px;">
								       <input type="text" class="form-control flightTo" id="">
								   </td>
								   <td style="border: 1px solid #f4f4f4;padding: 8px;">
								       <input type="text" class="form-control departure" id="">
								   </td>
								   <td style="border: 1px solid #f4f4f4;padding: 8px;">
								       <input type="text" class="form-control arrival" id="">
								   </td>
								   <td style="border: 1px solid #f4f4f4;padding: 8px;">
								       <input type="text" class="form-control flightprice" id="fltCost" onkeyup="calculate_other_price()">
								   </td>
								   <td style="border: 1px solid #f4f4f4;padding: 8px;">
								       <button type="button" class="btn btn-sm" id="addnxtrow" data-tooltip="add row">
								      <i class="fa fa-plus-circle" aria-hidden="true" style="font-size: 26px;color: green;"></i>
									  </button>
									  <input type="hidden" id="countfltrow" name="" value="1">
								   </td>
								  </tr>
								  
								 </tbody>
			    				</table>
							</div>
							<div class="col-md-12">
						        <div class='col-md-9' style="text-align:center; border: 1px solid #f4f4f4;padding: 8px; font-size:18px;">Total</div>
						        <div class='col-md-3' style="border: 1px solid #f4f4f4;"><input type="text" class="form-control" id="flightTotal" readonly></div>
						    </div>
						</div>
						
						<h3>Tour Exclusions:<span><a id="edtTRexcl" data-toggle="tooltip" data-placement="top" title="Edit Tour Exclusions"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></span></h3>	
						<div id="extrturExcl">
						<ul id="allturExcl">
							<li>Bus/Air/Train tickets.(if not mentioned specifically)</li>
							<li>Any entry &amp; activities fees at monuments, tourist spots, etc.(if not mentioned specifically)</li>
							<li>Tips to the guides / driver / restaurants / hotels etc.</li>
							<li>Any expenses of personal nature such as, drinks, laundry, telephone calls, insurance, camera fees, excess baggage, emergency/medical cost etc.</li>
							<li>Any other item not mentioned in the above tour inclusions section.</li>
						</ul>
						</div>
						<h3>Note:<span><a id="edtTRnote" data-toggle="tooltip" data-placement="top" title="Edit Tour Note"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></span></h3>
						<div id="extrturNote">
						<ul id="allturNote">
							<li>The cost is irrelevant of circumstances that are beyond our control. Situations such as road blockade due to strike or agitation, earthquake, natural calamity, sickness evacuation, delay or cancellation of train or flight etc. are beyond our control.</li>
							<li>Itinerary may vary depending upon the climate conditions and circumstances.</li>
							<li>We are not holding any booking and same will be confirmed only after the payment.</li>
							<li>Standard Check-in time at hotels is 14:00 hrs. & Check-out time is 11:00 hrs. Early check-in & late check-out is subject to availability</li>
						</ul>
						</div>
						<h3>Cancellation Policy:<span><a id="edtTRcancellation" data-toggle="tooltip" data-placement="top" title="Edit Canellation Policy"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></span></h3>
						<div id="extrturcancellation">
						    <ul id="allturcancellation">
						        <li>Flight Cancellation policy is as per the airlines norms. (service charges may applied)</li>
                                <li>If you cancel your tour package:
                                    <ul>
                                        <li>30 days or more before date of departure – 25% of total tour cost.</li>
                                        <li>29-16 days before date of departure – 50% of total tour cost.</li>
                                        <li>15 days or less before date of departure – 100% of total tour cost.</li>    
                                    </ul>
                                </li>
						    </ul>
						</div>
						<h3>Payment Policy:<span><a id="edtTRpymtpolicy" data-toggle="tooltip" data-placement="top" title="Edit Payment Policy"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></span></h3>
					    <div id="extrturpymtpolicy">
					        <ul id="allturpymtpolicy">
					            <li>100% advance required to book the flights.</li>
                                <li>50% of total tour cost is required to confirm the package.</li>
                                <li>Remaining payment required by 20 days prior to date  of departure.</li>
					        </ul>
					    </div>
					    <!-------->
					    <!--<button type="button" class="btn btn-info" data-toggle="collapse" data-target="#termscondition"></button>-->
					    <a data-toggle="collapse" data-target="#termscondition"><h3>Terms & Conditions:<i class="fa fa-angle-down" aria-hidden="true"></i></h3></a>
					    <div id="termscondition" class="collapse">
                        <ul>
                            <li>Standard check-in time at the hotel is normally 2:00 pm and check-out is 11:00 am. An early check-in, or a late check-out is solely based on the discretion of the hotel.</li>
                            <li>A maximum of 3 adults are allowed in one room. The third occupant shall be provided a mattress/rollaway bed.</li>
                            <li>The itinerary is fixed and cannot be modified. Transportation shall be provided as per the itinerary and will not be at disposal.For any paid activity which is non-operational due to any unforeseen reason, we will process refund & same should reach the guest within 30 days of processing the refund.</li> 
                            <li>Also, for any activity which is complimentary and not charged to MMT & guest, no refund will be processed.</li>
                            <li>AC will not be functional anywhere in cool or hilly areas.</li>
                            <li>Entrance fee, parking and guide charges are not included in the packages.</li>
                            <li>If your flights involve a combination of different airlines, you may have to collect your luggage on arrival at the connecting hub and register it again while checking in for the onward journey to your destination.</li>
                            <li>Booking rates are subject to change without prior notice.</li>
                            <li>Airline seats and hotel rooms are subject to availability at the time of booking.</li>
                            <li>Pricing of the booking is based on the age of the passengers. Please make sure you enter the correct age of passengers at the time of booking. Passengers furnishing incorrect age details may incur penalty at the time of travelling.</li>
                            <li>In case of unavailability in the listed hotels, arrangement for an alternate accommodation will be made in a hotel of similar standard.</li>
                            <li>In case your package needs to be cancelled due to any natural calamity, weather conditions etc. MakeMyTrip shall strive to give you the maximum possible refund subject to the agreement made with our trade partners/vendors.</li>
                            <li>MMT reserves the right to modify the itinerary at any point, due to reasons including but not limited to: Force Majeure events, strikes, fairs, festivals, weather conditions, traffic problems, overbooking of hotels / flights, cancellation / re-routing of flights, closure of /entry restrictions at a place of visit, etc. While we will do our best to make suitable alternate arrangements, we would not be held liable for any refunds/compensation claims arising out of this.</li>
                            <li>Certain hotels may ask for a security deposit during check-in, which is refundable at check-out subject to the hotel?s policy.</li>
                            <li>The booking price does not include: Expenses of personal nature, such as laundry, telephone calls, room service, alcoholic beverages, mini bar charges, tips, portage, camera fees etc.</li>
                            <li>Any other items not mentioned under Inclusions are not included in the cost of the booking.</li>
                            <li>The package price doesn?t include special dinner or mandatory charges at time levied by the hotels especially during New Year and Christmas or any special occasions. MakeMyTrip shall try to communicate the same while booking the package. However MakeMyTrip may not have this information readily available all the time.</li>
                            <li>Cost of deviation and cost of extension of the validity on your ticket is not included.</li>
                            <li>For queries regarding cancellations and refunds, please refer to our Cancellation Policy.</li>
                            <li>Disputes, if any, shall be subject to the exclusive jurisdiction of the courts in New Delhi.</li>
                            <li>Check-in time on a houseboat is 11:30 am and check-out time is 9:30 am.</li>
                            <li>Due to its climatic conditions, Munnar in Kerala does not have AC rooms.</li>
                            <li>If a guest is staying on a houseboat, the sightseeing will not be conducted.</li>
                        </ul>
                            
					    </div>
                                
					    <!-------->
					</div>

					<div style="clear:both;"></div>
					<?php if($type !='pdf'){   
					?>
					<div class="box-footer text-right">
						<input type="hidden" name="rooms_prices" id="rooms_prices" value="" />
						<input type="hidden" name="rooms_total" id="rooms_total" value="" />
						<input type="hidden" name="selected_hotels" id="selected_hotels" value="" />
						<input type="hidden" name="selected_rooms" id="selected_rooms" value="" />
						<input type="hidden" name="selected_mealPlans" id="selected_mealPlans" value="" />
						<input type="hidden" name="selected_vehicle" id="selected_vehicle" value="" />
						<input type="hidden" name="selected_vehicle_unit" id="selected_vehicle_unit" value="" />
						<input type="hidden" name="" id="arlnName" value="" />
						<input type="hidden" name="" id="FlightFrom" value="" />
						<input type="hidden" name="" id="flightTo" value="" />
						<input type="hidden" name="" id="fltArriv" value="" />
						<input type="hidden" name="" id="fltDepart" value="" />
						<input type="hidden" name="" id="fltPrice" value="" />
				        <input type="hidden" id="empname" value="<?php echo $emp_name; ?>" />
				        <input type="hidden" id="prtnrLogo" value="<?php echo $logo ? $logo : ''; ?>">
						<button type="button" class="btn btn-info" id="download" onclick="downlaod_pdf('<?php echo '&searchData='.$_SERVER['REQUEST_URI'].'&itiTitle='.base64_encode($itiTitle); ?>', 'downlaod')">Download PDF</button>&nbsp;&nbsp;&nbsp;
						<a class="btn btn-primary pull-right" href="#sendToCl" id="sndtomail" data-toggle="modal"><i class="fa fa-envelope-o"></i> Mail to Client</a>
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
<!--first modal-->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="turInclModal" class="modal fade">
    <div class="modal-dialog mail-modal">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Edit Tour Inclusion</label>
                    <textarea class="form-control" name="" id="NewturIncl"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success" type="button" id="saveTurInclChanges">Update</button>
                <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
            </div>
        </div>
    </div>
</div>
<!--Second modal-->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="turExclModal" class="modal fade">
    <div class="modal-dialog mail-modal">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Edit Tour Exclusion</label>
                    <textarea class="form-control" name="" id="NewturExcl"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success" type="button" id="saveTurExclChanges">Update</button>
                <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
            </div>
        </div>
    </div>
</div>
<!--Second modal-->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="turNoteModal" class="modal fade">
    <div class="modal-dialog mail-modal">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Edit Tour Note</label>
                    <textarea class="form-control" name="" id="NewturNote"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success" type="button" id="saveTurNoteChanges">Update</button>
                <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
            </div>
        </div>
    </div>
</div>
<!--Second modal-->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="turCancellationModal" class="modal fade">
    <div class="modal-dialog mail-modal">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Edit Cancellation Policy</label>
                    <textarea class="form-control" name="" id="NewturCancellation"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success" type="button" id="saveTurCancellationChanges">Update</button>
                <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
            </div>
        </div>
    </div>
</div>
<!--Second modal-->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="turPymtModal" class="modal fade">
    <div class="modal-dialog mail-modal">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Edit Payment Policy</label>
                    <textarea class="form-control" name="" id="NewturPymt"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success" type="button" id="saveTurPymt">Update</button>
                <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
            </div>
        </div>
    </div>
</div>
<!--Send to mail Modal-->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="sendToCl" class="modal fade">
	<div class="modal-dialog mail-modal">
	   <form name="tour_mail" id="tour_mail" method="post" action="">
			<input type="hidden" name="mailFilePath" id="mailFilePath" value="0" />
			<input type="hidden" name="tourSub" id="tourSub" value="<?php echo $itiTitle.' ';?>Travel Quotation" />
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

<?php
    if($this->uri->segment(2) == 'viewPackageDetails') { ?>
    
        <script src="<?php echo base_url(); ?>asset/plugins/select2/select2.full.min.js"></script>
        <script src="<?php echo base_url(); ?>jquery-validation/dist/jquery.validate.js"></script>
        
<?php
    }
?>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/form-ckeditor/ckeditor.js"></script>
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>-->
<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css">-->
<script src="<?php echo base_url(); ?>assets/plugins/jquery.sumoselect/jquery.sumoselect.min.js"></script>
<link href="<?php echo base_url(); ?>assets/plugins/jquery.sumoselect/sumoselect.min.css" rel="stylesheet" />
<script type="text/javascript">

$(document).ready(function() {
  
  $('.mealTypes').SumoSelect({
      placeholder: 'Select Meal Plan',
      //selectAll: true
  });
  
    // if($('input:text').val().length == 0) {
    //   //$(this).parents('p').addClass('warning');
    //   $("#download").attr("disabled", true);
    // }else{
    //   $("#download").attr("disabled", false);
    // }
    
    // var queryId = $("#queryId").val();
    // if(queryId == ''){
    //     var addtext = "TWZQ00";
    //     $("#queryId").on('keyup', function(){
    //         var value = $(this).val();
    //         //$("#queryId").val(addtext+value);
    //         if(value == '')
    //     });
    // }
});

$(function() {
    
    
    CKEDITOR.env.isCompatible = true;

 	var titleEditor = CKEDITOR.replace( 'email_body', {
		width:'auto',
		height:200,
		startupFocus : false,
		customConfig: 'ckeditor_customconfig/ckeditor_config2.js'
	});
	
	var turInclEditor = CKEDITOR.replace( 'NewturIncl', {
		width:'auto',
		height:200,
		startupFocus : false,
		customConfig: 'ckeditor_customconfig/ckeditor_config2.js'
	});
	
	var turExclEditor = CKEDITOR.replace( 'NewturExcl', {
		width:'auto',
		height:200,
		startupFocus : false,
		customConfig: 'ckeditor_customconfig/ckeditor_config2.js'
	});
	
	var turNoteEditor = CKEDITOR.replace( 'NewturNote', {
		width:'auto',
		height:200,
		startupFocus : false,
		customConfig: 'ckeditor_customconfig/ckeditor_config2.js'
	});
	
	var turCancellationEditor = CKEDITOR.replace( 'NewturCancellation', {
		width:'auto',
		height:200,
		startupFocus : false,
		customConfig: 'ckeditor_customconfig/ckeditor_config2.js'
	});
	
	var turPymtEditor = CKEDITOR.replace( 'NewturPymt', {
		width:'auto',
		height:200,
		startupFocus : false,
		customConfig: 'ckeditor_customconfig/ckeditor_config2.js'
	});
	
	var tourInclusions = $("#allturIncl").html();
	    CKEDITOR.instances.NewturIncl.setData(tourInclusions);
	
	var tourExclusions = $("#allturExcl").html();
	     CKEDITOR.instances.NewturExcl.setData(tourExclusions);
	     
	var tourNote = $("#allturNote").html();
	    CKEDITOR.instances.NewturNote.setData(tourNote);
	    
	var tourCanellation = $("#allturcancellation").html();
	    CKEDITOR.instances.NewturCancellation.setData(tourCanellation);
	    
	var tourPymt = $("#allturpymtpolicy").html();
	    CKEDITOR.instances.NewturPymt.setData(tourPymt);
	
	$("#edtTRincl").click(function(){
	    $("#turInclModal").modal();
	   
	});
	
	$("#edtTRexcl").click(function(){
	    $("#turExclModal").modal();
	    
	});
	
	$("#edtTRnote").click(function(){
	    $("#turNoteModal").modal();
	    
	});
	
	$("#edtTRcancellation").click(function(){
	    $("#turCancellationModal").modal();
	    
	});
	
	$("#edtTRpymtpolicy").click(function(){
	    $("#turPymtModal").modal();
	    
	});
	
	$("#saveTurInclChanges").click(function(){
	    for(instance in CKEDITOR.instances) {
			CKEDITOR.instances[instance].updateElement();
		}
        var remarksArea = $('#NewturIncl').val();
        $("#allturIncl").html(remarksArea);  
        $("#turInclModal").modal('hide');
	});
	
	$("#saveTurExclChanges").click(function(){
	    for(instance in CKEDITOR.instances) {
			CKEDITOR.instances[instance].updateElement();
		}
        var remarksArea = $('#NewturExcl').val();
        $("#allturExcl").html(remarksArea);  
        $("#turExclModal").modal('hide');
	});
	
	$("#saveTurNoteChanges").click(function(){
	    for(instance in CKEDITOR.instances) {
			CKEDITOR.instances[instance].updateElement();
		}
        var remarksArea = $('#NewturNote').val();
        $("#allturNote").html(remarksArea);  
        $("#turNoteModal").modal('hide');
	});
	
	$("#saveTurCancellationChanges").click(function(){
	    for(instance in CKEDITOR.instances) {
			CKEDITOR.instances[instance].updateElement();
		}
        var remarksArea = $('#NewturCancellation').val();
        $("#allturcancellation").html(remarksArea);  
        $("#turCancellationModal").modal('hide');
	});
	
	$("#saveTurPymt").click(function(){
	    for(instance in CKEDITOR.instances) {
			CKEDITOR.instances[instance].updateElement();
		}
        var remarksArea = $('#NewturPymt').val();
        $("#allturpymtpolicy").html(remarksArea);  
        $("#turPymtModal").modal('hide');
	});
	

	$("#calculate_prices").click(function(){
		//alert("hello");
		
		var sum = 0;
		var tourCost = '';
        $('.turcost').each(function(){
            sum += parseFloat(this.value);
            tourCost += $(this).val()+',';
        });
        
        //alert(tourCost);
        
        $("#totTurCost").val(sum); 
        $("#rooms_prices").val(tourCost);
        $("#rooms_total").val(sum);
        
    //     var enterdhotel = '';
    //     $(".hoteltypes").each(function(){
		  //  enterdhotel += $(this).val()+',';
	   // });
	   // //alert(enterdhotel);
	   // $("#selected_hotels").val(enterdhotel);
	    
	   // var enterdhotelroom = '';
    //     $(".userRoomTypes").each(function(){
		  //  enterdhotelroom += $(this).val()+',';
	   // });
	   // //alert(enterdhotelroom);
	   // $("#selected_rooms").val(enterdhotelroom);
	    
	   // var selectedMealVal = [];
    //     $(".mealTypes").each(function(){
    //         var optionValue = $(this).val();
    //         selectedMealVal.push(optionValue);
    //     });
        
    //     var mealfiltered = selectedMealVal.filter(x => x != "");
    //     //console.log(newmealVal);
    //     var arr1 = JSON.parse(JSON.stringify(mealfiltered).replace(/null/g,'[""]'));
    //     //console.log(JSON.stringify(arr1));
    //     var newmealVal = JSON.stringify(arr1);
    //     $("#selected_mealPlans").val(newmealVal);
        
    //     var selectedVehicle = '';
    //     $(".sel_vehicle").each(function(){
    //         selectedVehicle += $(this).val()+',';
    //     });
    //     //alert(selectedVehicle);
    //     $("#selected_vehicle").val(selectedVehicle);
        
    //     var selvehicleunit = '';
    //     $(".unitquantity").each(function(){
    //         selvehicleunit += $(this).val()+',';
    //     });
    //     //alert(selvehicleunit);
    //     $("#selected_vehicle_unit").val(selvehicleunit);
        

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

    $("#showflightdiv").click(function(){
       var x = document.getElementById("flightdata");
       if (x.style.display === "none") {
        x.style.display = "block";
       }else {
        x.style.display = "none";
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
	
	//$(document).on("focus", 'button[id=addnxtrow]', function(){
	$(document).on("click", "#addnxtrow", function(){
	    var count = parseInt($("#countfltrow").val());
	    var id = count+1;
		var newrows ='<tr id="nextrow_"'+id+'">';
		newrows +='<td><input type="text" class="form-control airlinename" name="" id="" required></td>';
		newrows +='<td><input type="text" class="form-control flightFrom" name="" id="" required></td>';
		newrows +='<td><input type="text" class="form-control flightTo" name="" id="" required></td>';
		newrows +='<td><input type="text" class="form-control departure" name="" id="" required></td>';
		newrows +='<td><input type="text" class="form-control arrival" name="" id="" required></td>';
		newrows +='<td><input type="text" class="form-control flightprice" name="" id="fltCost" onkeyup="calculate_other_price()" required></td>';
		newrows +='<td><button type="button" class="btn btn-sm" id="addnxtrow"><i class="fa fa-plus-circle" aria-hidden="true" style="font-size: 26px;color: green;"></i></button>';
		newrows +='<button type="button" class="btn btn-sm" id="removenxtrow"><i class="fa fa-minus-circle" aria-hidden="true" style="font-size: 26px;color: red;"></i></button></td>';
		newrows +='</tr>';
		
		
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
            $("#fltdtlbody").append(newrows);
            $("#countfltrow").val(id); 
            swal.close();
            
            //document.getElementById('sel_vehicle'+id).focus();
            }else{
            //document.getElementById('priceMargin').focus();
            }
        });
	});

	//$(document).on("focus", 'button[id=clonerow]', function() {
	$(document).on("click", "#clonerow", function() {
		var count = parseInt($("#countdivrow").val());
		//var vehicles = '<?php //echo json_encode($itineraryVehicle); ?>';
		var id = count+1;
		var newrows ='<tr id="nextrow_"'+id+'">';
		
		newrows +='<td><input type="text" class="form-control sel_vehicle" name="" id="sel_vehicle'+id+'" required></td>';
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
            //document.getElementById('priceMargin').focus();
            }



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
	
	$(document).on("click", "#removenxtrow", function(){
	    $(this).closest('tr').remove();
		   calculate_other_price();
		   var count = $("#countfltrow").val();
		   count--;
		   $("#countfltrow").val(count);
	});
        

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


function calculate_other_price(){
        var cost = [];
		var i = 0;
			$("[id='fltCost']").each(function(){
      			cost[i] = $(this).val();
      			i++;
			})
		var total = 0;
		for(var i = 0; i < cost.length; i++) {
    		total += cost[i] << 0;
		}
			
		$("#flightTotal").val(total);
	}

function downlaod_pdf(param, action)
{
    var queryId = $("#queryId").val();
    if(queryId == ''){
        alert("Enter Query Id");
        return false;
    }
    var hotelNames = $("#hotel_1").val();
    if(hotelNames == ''){
        alert("Enter Hotel Name");
        return false;
    }
    var hotelRoomTYP = $("#roomType_1").val();
    if(hotelRoomTYP == ''){
        alert("Enter Room Type");
        return false;
    }
    var emptyturCost = $(".turcost").filter(function() {
    return this.value == "";
    }).length;
    if(emptyturCost > 0){
        alert("Enter Tour Cost");
        return false;
    }
    var hoteltotcost = $("#totTurCost").val();
    if(hoteltotcost == ''){
        alert("Calculate Total Cost");
        return false;
    }
        var airlineDtl = '';
        $(".airlinename").each(function(){
            airlineDtl += $(this).val()+',';
        });
        $("#arlnName").val(airlineDtl);
        
        var flightfrom = '';
        $(".flightFrom").each(function(){
            flightfrom += $(this).val()+',';
        });
        $("#FlightFrom").val(flightfrom);
        
        var flightto = '';
        $(".flightTo").each(function(){
            flightto += $(this).val()+',';
        });
        
        $("#flightTo").val(flightto);
        
        var fltarrival = '';
        $(".arrival").each(function(){
            fltarrival += $(this).val()+',';
        });
        $("#fltArriv").val(fltarrival);
        
        var fltdeparture = '';
        $(".departure").each(function(){
            fltdeparture += $(this).val()+',';
        });
        $("#fltDepart").val(fltdeparture);
        
        var fltprice = '';
        $(".flightprice").each(function(){
            fltprice += $(this).val()+',';
        });
        $("#fltPrice").val(fltprice);
        
        var enterdhotel = '';
        $(".hoteltypes").each(function(){
		    enterdhotel += $(this).val()+',';
	    });
	    $("#selected_hotels").val(enterdhotel);
	    
	    var enterdhotelroom = '';
        $(".userRoomTypes").each(function(){
		    enterdhotelroom += $(this).val()+',';
	    });
	    $("#selected_rooms").val(enterdhotelroom);
	    
	    var selectedMealVal = [];
        $(".mealTypes").each(function(){
            var optionValue = $(this).val();
            selectedMealVal.push(optionValue);
        });
        
        var mealfiltered = selectedMealVal.filter(x => x != "");
        var arr1 = JSON.parse(JSON.stringify(mealfiltered).replace(/null/g,'[""]'));
        var newmealVal = JSON.stringify(arr1);
        $("#selected_mealPlans").val(newmealVal);
        
        var selectedVehicle = '';
        $(".sel_vehicle").each(function(){
            selectedVehicle += $(this).val()+',';
        });
        $("#selected_vehicle").val(selectedVehicle);
        
        var selvehicleunit = '';
        $(".unitquantity").each(function(){
            selvehicleunit += $(this).val()+',';
        });
        $("#selected_vehicle_unit").val(selvehicleunit);
    
    
    for(instance in CKEDITOR.instances) {
		CKEDITOR.instances[instance].updateElement();
	}
    var base_url = "<?php echo base_url(); ?>";
	//var prices = $("#calculated_prices").val();
	var room_prices = encodeURIComponent($("#rooms_prices").val());
	var total_roomprices = encodeURIComponent($("#rooms_total").val());
	var selc_hotels = encodeURIComponent($("#selected_hotels").val());
	var selc_rooms = encodeURIComponent($("#selected_rooms").val());
	var selc_mealPlans = encodeURIComponent($("#selected_mealPlans").val());
	var selc_vehicle = encodeURIComponent($("#selected_vehicle").val());
	var selc_vehicle_unit = encodeURIComponent($("#selected_vehicle_unit").val());
	var extraturIncl = encodeURIComponent($("#NewturIncl").val());
	var extraturExcl = encodeURIComponent($("#NewturExcl").val());
	var extraturNote = encodeURIComponent($("#NewturNote").val());
	var extraturCnclplcy = encodeURIComponent($("#NewturCancellation").val());
    var extraturPymt = encodeURIComponent($("#NewturPymt").val());
	var flightName = encodeURIComponent($("#arlnName").val());
    var FlightFrom = encodeURIComponent($("#FlightFrom").val());
    var flightTo = encodeURIComponent($("#flightTo").val());
    var flightArriv = encodeURIComponent($("#fltArriv").val());
    var FlightDepart = encodeURIComponent($("#fltDepart").val());
    var FlightPrice = encodeURIComponent($("#fltPrice").val());
    var flightTotal = encodeURIComponent($("#flightTotal").val());
	var queryName = encodeURIComponent($("#queryname").val());
	var empName = encodeURIComponent($("#empname").val());
	var prtnrLogo = encodeURIComponent($("#prtnrLogo").val());
	var nwqueryId = queryId;
	//selc_hotels = btoa(selc_hotels);
	var data = "pdfType=package&room_prices="+room_prices+'&total_roomprices='+total_roomprices+'&selRooms='+selc_rooms+'&selHotels='+selc_hotels+'&selVehicle='+selc_vehicle+'&selVehicleunit='+selc_vehicle_unit+'&flightName='+flightName+'&FlightFrom='+FlightFrom+'&flightTo='+flightTo+'&flightArriv='+flightArriv+'&FlightDepart='+FlightDepart+'&FlightPrice='+FlightPrice+'&flightTotal='+flightTotal+'&extraturIncl='+extraturIncl+'&extraturExcl='+extraturExcl+'&extraturNote='+extraturNote+'&extraturCnclplcy='+extraturCnclplcy+'&extraturPymt='+extraturPymt+'&selMealPlans='+selc_mealPlans+'&nwqueryId='+nwqueryId+'&employeeName='+empName+'&prtnrLogo='+prtnrLogo;	
	$.ajax({
		type:"POST",
		url:"<?php echo base_url() ?>"+'generate_partner_package.php?'+param,
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
				for(instance in CKEDITOR.instances) {
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