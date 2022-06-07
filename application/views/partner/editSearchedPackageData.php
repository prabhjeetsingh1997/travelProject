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
</style>
<div class="col-md-11" id="contentCol">
<div id="wrapper">
<div id="layout-static">
<div class="static-content-wrapper">
<div class="static-content">
<div class="page-content" style="margin-top:;">
<div class="content-wrapper">
    <div class="container">
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-default">
                        <form id="formData">
                            
                        </form>
                        <div class="box-body">
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
											         <div class="row">
													      <div class="container"><div class="col-sm-2 col-sm-offset-5 text-center" style="background-color:#10ade2; border-radius:100%; width:60px; height:60px; padding:10px; border-style:solid; border-color:#e1e1e1; box-shadow: 3px 3px 3px grey; color:#fff">DAY 0<?php echo $i+1;?></div></div>
													       <br>
													       <div class="col-md-8"><!-- Panel -->
													         <article class="panel panel-primary">    
													            <!-- Heading -->
													            <div class="panel-heading">
													                <h2 class="panel-title"><?php echo $itineraryDetails[$i]['itinerary_title']; ?></h2>
													            </div>
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
									            <?php }else{ ?>
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
													            <h2 class="panel-title"><?php echo $itineraryDetails[$i]['itinerary_title']; ?></h2>
													       </div>
													            <!-- /Heading -->   
													            <!-- Body -->
													       <div class="panel-body" style="padding: 15px;color: #fff;background-color: #4f81bd;">
													            <?php echo $itineraryDetails[$i]['itinerary_details']; ?>
													       </div>
													            <!-- /Body -->   
													       </article>
													            <!-- /Panel --> 
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
								                   $selHoteldata = $selected_hotels;
			                                       $selHData = explode('$#$', rtrim($selHoteldata, ','));
			                                       $selHotelArr = explode(',', rtrim($selHData[0], ','));
			                                       
			                                       $selRoomsdata = $selected_rooms;
			                                       $selRData = explode('$#$', rtrim($selRoomsdata, ','));
			                                       $selRoomsArr = explode(',', rtrim($selRData[0], ','));
			                                       
			                                       $selMealdata = $selected_mealPlans;
                                                   $selMealArr = explode(',', rtrim($selMealdata, ','));
			                                       
									                $duration = $itineraryData['duration'];
									                $duration_city = $itineraryData['duration_city'];
									                $durationCityArr = explode(',',$duration_city);
									                for($i=1; $i<=$duration; $i++)
									                {
										                   $cityId = $durationCityArr[$i-1];
										                   $cityArr = $CI->admin_model->getCitiesById($cityId);
										
										                   $day = '+'.($i-1).' day';
										                   $date = date('d, F Y',strtotime($startdate . $day));
										                   $k = $i-1;
										              ?>
										              <tr>
										                  <th style="border: 1px solid #f4f4f4;"><?php echo $i; ?></th>
										                  <th style="border: 1px solid #f4f4f4;"><?php echo $cityArr[0]['city_name'];?></th>
										                  <th style="border: 1px solid #f4f4f4;"><?php echo $date;?></th>
										                  <th style="border: 1px solid #f4f4f4;">
										                      <?php
												                $hotelS = trim($selHotelArr[$k]);
												                if($hotelS == 'Select Hotel')
												                {
												                    $hotelS = '--';
												                }
													            echo $hotelS;
											                 ?>
										                  </th>
										                  <th style="border: 1px solid #f4f4f4;">
										                      <?php
													             $rooms = trim($selRoomsArr[$k]);
													             if($rooms == 'Select Room Type')
													             {
														          $rooms = '--';
													             }
													             echo $rooms;
											                  ?>
										                  </th>
										                  <th style="border: 1px solid #f4f4f4;">
										                      	<?php
													             $mealPlans = trim($selMealArr[$k]);
													             if($mealPlans == 'Select Meal Plan')
													             {
														             $mealPlans = '--';
													             }
													             echo $mealPlans;
											                    ?>
										                  </th>
										              </tr>
									                <?php 
									                }?>
									                
								               </tbody>
								           </table>
						                </div>
						            </div>
						            <!--Vehicle Details-->
						            <?php
						             $selVehicledata= $selected_vehicle;
			                         $selVehicleArr = explode(',', rtrim($selVehicledata, ','));
						            if(in_array("Select Vehicle", $selVehicleArr)){
						     
						              }else{
						            ?>
						            <div class="col-md-12">
						                <h3>Vehicle Envisaged</h3>
						                <div class="table-responsive">
						                    <table class="table table-bordered" cellspacing="0" width="">
						                        <thead>
						                            <tr>
						                                <th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4; width: 300px;">Selected Vehicle</th>
								                        <th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4; width: 150px;">Vehicle Unit</th>
						                            </tr>
						                        </thead>
						                        <tbody>
						                            <?php
			                                         $selVehicleunitdata = $selected_vehicle_unit;
			                                         $selVehicleunitArr = explode(',', rtrim($selVehicleunitdata, ','));
			                                         for($i=0; $i<count($selVehicleArr); $i++){
			                                         ?>
						                            <tr>
						                                <td style="border: 1px solid #f4f4f4;padding: 8px;">
						                                 <?php
													       echo $selVehicleArr[$i];
												         ?>
						                                </td>
						                                <td style="border: 1px solid #f4f4f4;padding: 8px;">
											              <?php
												            echo $selVehicleunitArr[$i];
											              ?>
										                </td>
						                            </tr>
						                            <?php 
			                                         }?>
						                        </tbody>
						                    </table>
						                </div>
						            </div>
						            <!--End of Vehicle-->
						            <?php 
						             } ?>					             
						             <!--Activities Details-->
						             <?php
						             $selActivitydata = $selected_activities;
			                         $selActivityArr = explode(',', $selActivitydata);
			                         $selperunitActivitydata = $perunitselected_activities;
			                         $selperunitActivityArr = explode(',', rtrim($selperunitActivitydata,','));
			                         $seltotalunitofactivities = $totalunitofactivities;
			                         $seltotalunitofactivitiesArr = explode(',', rtrim($seltotalunitofactivities,','));
			                         //if(empty($selActivityArr) || empty($selperunitActivityArr)){
			                             
			                         //}else{
						             ?>
						             <div class="col-md-12">
						                 <h3>Activites Envisaged</h3>
							             <div class="table-responsive">
							                 <table class="table table-bordered" cellspacing="0" width="">
							                     <thead>
							                         <tr>
							                             <th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;">Day</th>
									                     <th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;">City</th>
									                     <th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;">Date</th>
									                     <th colspan="2" style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;">Activities</th>
									                     <th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;">Total Unit</th>
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
										                  $k = $i-1;
										              ?>
							                         <tr>
							                             <th style="border: 1px solid #f4f4f4;"><?php echo $i; ?></th>
								                         <th style="border: 1px solid #f4f4f4;"><?php echo $cityArr[0]['city_name'];?></th>
								                         <th style="border: 1px solid #f4f4f4;"><?php echo $date;?></th>
								                         <th style="border: 1px solid #f4f4f4;">
								                             <?php
												                  if(!empty($selActivityArr[$k])){
													                  echo $selActivityArr[$k];
												                  }
												                  else
												                  {
												                     echo '--';
												                  }
											                  ?>
								                         </th>
								                         <th style="border: 1px solid #f4f4f4;">
								                             <?php
												                 if(!empty($selperunitActivityArr[$k])){
												                    echo $selperunitActivityArr[$k];    
												                 }
												                 else{
												                     echo '--';
												                 }
											                 ?>
								                         </th>
								                         <th style="border: 1px solid #f4f4f4;">
										                     <?php
										                        if(!empty($seltotalunitofactivitiesArr[$k])){
										                            echo $seltotalunitofactivitiesArr[$k];
										                        }
										                        else{
										                            echo '--';
										                        }
										                     ?>
								
										                 </th>
							                         </tr>
							                         <?php 
									                 } ?>
							                     </tbody>
							                 </table>
							             </div>
						             </div>
						             <?php
			                         //} ?>
						             <!--end of activities-->
						             <div class="col-md-12">
						                 <h3>Tour Cost</h3>	
						                 <div class="table-responsive">
							                <table class="table table-bordered" cellspacing="0" width="100%">
							                    <thead>
							                    <tr>
							                        <th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;">Room</th>
							                        <th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;">Adult(s)</th>
								                    <th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;">Infant(s)</th>
								                    <th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;">Kid(s)</th>
								                    <th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;">Kid(s) Age</th>
								                    <th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4; width:50px;">Price</th>
							                    </tr>
							                    </thead>
							                    <tbody>
							                        <?php
									                     $selRoomprices = $rooms_prices;
			                                             $selRoompricesArr = explode(',', rtrim($selRoomprices,','));
			                                             //$totalroomPrice = json_encode($selRoompricesArr, true);
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
										              <td style="border: 1px solid #f4f4f4;padding: 8px;"><span><i class="fa fa-inr" aria-hidden="true"></i></span><span class="roomPricesbyroom" id="roomPrice_<?php echo $i+1; ?>"> <?php echo $selRoompricesArr[$i]; ?></span><input type="hidden" id="totalRoom<?php echo $i+1;?>" value="<?php echo $selRoompricesArr[$i]; ?>"></td>
							                        </tr>
							                        <?php }
							                        ?>
							                        <tr style="font-size: 18px;font-weight: 600;">
							                            <td colspan="5" style="text-align:center;border: 1px solid #f4f4f4;padding: 8px;">Total<div><span id="taxesIncl" style="font-size:12px; margin-left: 85%;">*GST Excluded</span></div></td>
							                            <td style="border: 1px solid #f4f4f4;padding: 8px;"><span><i class="fa fa-inr" aria-hidden="true"></i></span><span id="totalHotelPrice"><?php echo $rooms_total; ?></span></td>
							                        </tr>
							                        <tr>
									                    <td colspan="5" style="text-align:center; border: 1px solid #f4f4f4;padding: 8px;">Enter Your Margin&nbsp;</td>
									                    <td style="border: 1px solid #f4f4f4;padding: 8px;"><input type="number" id="priceMargin" placeholder="In Percentage(%)" value="" onkeyup="calculate_priceWith_margin(this.value)" maxlength="2"><br>or<br><input type="text" class="" style="width:auto;" placeholder="In Amount" id="marginbyAmount" onkeyup="calculate_priceWith_marginAmount()" value=""></td>
							                        </tr>
							                        <tr>
									                    <td colspan="6" style="text-align:right; border: 1px solid #f4f4f4;padding: 8px;">
									                        <span><input type="checkbox" id="checkGST"><span id="inclornot"> (include GST or not)</span></span>
									                        <input type="hidden" id="TaxIncl" value="0">
									                    </td>
									                </tr>
							                    </tbody>
							                </table>
							             </div>
						             </div>
						             <!--End Of Div-->
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
						             <div class="box-footer">
						                 <input type="hidden" id="calculated_prices" value="<?php echo $rooms_prices; ?>">
						                 <input type="hidden" id="partnerMarkup" value="<?php echo $markup; ?>">
						                 <input type="hidden" id="totalRooms" value="<?php echo $totalBookingRooms; ?>">
						                 <input type="hidden" id="selected_hotels" value="<?php echo $selected_hotels; ?>">
						                 <input type="hidden" id="selected_rooms" value="<?php echo $selected_rooms; ?>">
						                 <input type="hidden" id="selected_mealPlans" value="<?php echo $selected_mealPlans; ?>">
						                 <input type="hidden" id="selected_vehicle" value="<?php echo $selected_vehicle; ?>">
						                 <input type="hidden" id="selected_vehicle_unit" value="<?php echo $selected_vehicle_unit; ?>">
						                 <input type="hidden" id="selected_activities" value="<?php echo $selected_activities;?>">
						                 <input type="hidden" id="perunitselected_activities" value="<?php echo $perunitselected_activities;?>">
						                 <input type="hidden" id="totalunitofactivities" value="<?php echo $totalunitofactivities; ?>">
						                 <input type="hidden" id="empname" value="<?php echo $name; ?>">
						                 <input type="hidden" id="prtnrLogo" value="<?php echo $logo ? $logo : ''; ?>">
						                 <button type="button" class="btn btn-info" id="download" onclick="downlaod_pdf('<?php echo '&searchData='.$_SERVER['REQUEST_URI'].'/'.$editItiId.'/'.$searchData.'&itiTitle='.base64_encode($itiTitle); ?>', 'downlaod')">Download PDF</button>&nbsp;&nbsp;&nbsp;
						                 <a class="btn btn-primary pull-right" href="#sendToCl" id="sndtomail" disabled data-toggle="modal"><i class="fa fa-envelope-o"></i> Mail to Client</a>
						             </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        </div>
    </div>
</div>
<script type="text/javascript">
    
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
        
        function calculate_priceWith_margin(margin_val)
        {
            if(margin_val == ""){
               margin_val = 0;
               if(roomPrices == ""){
                   return false;
               }
               
	           var roomWisePrice = $("#calculated_prices").val();
               var roomPrices = roomWisePrice.replace(/,$/, "").split(",");
               var convString = JSON.stringify(Object.assign({},roomPrices));
	           var obj = JSON.parse(convString);
	           //console.log(obj);
	           var totalRooms = $("#totalRooms").val();
	           var totPrice = 0;
	           
	           for(var i=1; i<=totalRooms; i++)
	           {
		              var roomprice = obj[i-1];
		              roomprice = parseInt(roomprice) + (roomprice*parseInt(margin_val)/100); 
		              $("#roomPrice_"+i).html(Math.round(roomprice));
		              totPrice += parseInt(Math.round(roomprice));
	           }
	           $("#totalHotelPrice").html(totPrice);
	   
        }else{
               var roomWisePrice = $("#calculated_prices").val();
               var roomPrices = roomWisePrice.replace(/,$/, "").split(",");
               var convString = JSON.stringify(Object.assign({},roomPrices));
	           var obj = JSON.parse(convString);
	           //console.log(obj);
	           var totalRooms = $("#totalRooms").val();
	           var totPrice = 0;

	           for(var i=1; i<=totalRooms; i++)
	           {
		              var roomprice = obj[i-1];
		              roomprice = parseInt(roomprice) + (roomprice*parseInt(margin_val)/100); 
		              $("#roomPrice_"+i).html(Math.round(roomprice));
		              totPrice += parseInt(Math.round(roomprice));
	           }
	           $("#totalHotelPrice").html(totPrice);
           }
      }
      
    function calculate_priceWith_marginAmount()
      {
        var margin_amount = $('#marginbyAmount').val();
        if(margin_amount == ""){
           margin_amount = 0;
           var roomWisePrice = $("#calculated_prices").val();
           var roomPrices = roomWisePrice.replace(/,$/, "").split(",");
           var convString = JSON.stringify(Object.assign({},roomPrices));
	       var obj = JSON.parse(convString);
	       //console.log(obj);
	       var totalRooms = $("#totalRooms").val();
	       var totPrice = 0;
	       //var roomprice = 0;

	       for(var i=1; i<=totalRooms; i++)
	       {
		       var roomprice = obj[i-1];
		       roomprice = parseInt(roomprice) + parseInt(margin_amount/totalRooms); 
		       $("#roomPrice_"+i).html(Math.round(roomprice));
		       totPrice += parseInt(Math.round(roomprice));
	       }
	       $("#totalHotelPrice").html(totPrice);
	       
           }else{
               var roomWisePrice = $("#calculated_prices").val();
               var roomPrices = roomWisePrice.replace(/,$/, "").split(",");
               var convString = JSON.stringify(Object.assign({},roomPrices));
	           var obj = JSON.parse(convString);
	           //console.log(obj);
	           var totalRooms = $("#totalRooms").val();
	           var totPrice = 0;
	           //var roomprice = 0;

	           for(var i=1; i<=totalRooms; i++)
	           {
		           var roomprice = obj[i-1];
		           roomprice = parseInt(roomprice) + parseInt(margin_amount/totalRooms);
		           //console.log(Math.round(roomprice));
		           $("#roomPrice_"+i).html(Math.round(roomprice));
		           totPrice += parseInt(Math.round(roomprice));
	           }
	           //console.log(totPrice);
	           $("#totalHotelPrice").html(totPrice);
           }
       }
       
    function downlaod_pdf(param, action)
    {
    var base_url = "<?php echo base_url(); ?>";
	var prices = $("#calculated_prices").val();
	//var room_prices = $("#rooms_prices").val();
	//var total_roomprices = $("#rooms_total").val();
	//var service_tax = $("#rooms_tax").val();
	//var grand_total = $("#rooms_grandtotal").val();
	var selc_hotels = $("#selected_hotels").val();
	var selc_rooms = $("#selected_rooms").val();
	var selc_mealPlans = $("#selected_mealPlans").val();
	//var queryNumber = $("#queryNumber").val();
	var priceMargin = $("#priceMargin").val();
	var priceMarginAmt = $("#marginbyAmount").val();
	var selc_vehicle = $("#selected_vehicle").val();
	var selc_vehicle_unit = $("#selected_vehicle_unit").val();
	//var selc_Vvendor = $("#selected_vvendor").val();
	var selc_activity = $("#selected_activities").val();
	var selc_perUnitactivity = $("#perunitselected_activities").val();
	var total_unitofact = $("#totalunitofactivities").val();
	//var partnerMarkup = $("#partnerMarkup").val();
	//var flight_details = $("#flydetails").val();
	//var queryName = $("#queryname").val();
	var empName = $("#empname").val();
	var prtnrLogo = $("#prtnrLogo").val();
	//var queryId = $("#queryid").val();
	
	selc_hotels = btoa(selc_hotels);
	var data = "pdfType=package&prices="+prices+'&selRooms='+selc_rooms+'&selHotels='+selc_hotels+'&selVehicle='+selc_vehicle+'&selVehicleunit='+selc_vehicle_unit+'&pMargin='+priceMargin+'&priceMarginAmt='+priceMarginAmt+'&selMealPlans='+selc_mealPlans+'&selActivity='+selc_activity+'&selUnitactivity='+selc_perUnitactivity+'&seltotalunitact='+total_unitofact+'&employeeName='+empName+'&prtnrLogo='+prtnrLogo;	
	$.ajax({
		type:"POST",
		url:"<?php echo base_url() ?>"+'generate_package_pdf.php?'+param,
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
// 			else
// 			{
// 				for (instance in CKEDITOR.instances) {
// 					CKEDITOR.instances[instance].updateElement();
// 				}
// 				$("#mailFilePath").val(html);
				
// 				$.ajax({
// 					type: "POST",
// 					url: "<?php echo base_url() ?>"+"send_email.php",
// 					data: $("#tour_mail").serialize(),
// 					cache: false,
// 					beforeSend:function() {
// 						$("#showLoaderEmail").show();
// 					},
// 					success: function(html)
// 					{
// 						if(html == '1')
// 						{
// 							alert('Email Sent Successfully');
// 							$('#sendToCl').modal('hide');
// 							$("#showLoaderEmail").hide();
				            
// 						}
// 						else
// 						{
						    
// 							alert('There is some error in sending email');
// 						}
// 					}
					
// 				});
// 			}
		}
	    });
    }
   
</script>