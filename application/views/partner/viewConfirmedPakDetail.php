<?php
$CI =& get_instance();
$CI->load->model('admin_model');
$CI->load->model('partner_model');
?>
<div class="col-md-11" id="contentCol">
<div id="wrapper">
<div id="layout-static">
<div class="static-content-wrapper">
<div class="static-content">
<div class="page-content" style="margin-top:;">
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-default">
                        <div class="box-body">
                            <div id="searchData" style="padding:15px 0;">
                                <div style="<?php echo $border;?>padding: 10px;border-radius: 5px;float: left;width: 100%; margin-bottom:10px;">
                                    <div class="col-md-12" id="">
                                        <h3>Details</h3>
                                        <div class="hotelDetail table-responsive">
                                            <table class="table table-bordered" cellspacing="0">
                                                <tr>
											        <td style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;padding: 8px;">Lead Pax. Name</td>
											        <td style="border: 1px solid #f4f4f4;padding: 8px;"><?php echo $ConfpakDetail->pax_name;?></td>
											        <?php if(!empty($ConfpakDetail->pax_contact)) {?>
											        <td style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;padding: 8px;">Contact No</td>
											        <td style="border: 1px solid #f4f4f4;padding: 8px;"><?php echo $ConfpakDetail->pax_contact;?></td>
											        <?php }else {?>
											        <?php }?>
										        </tr>
										        <tr>
											           <td style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;padding: 8px;">Package Name</td>
											           <td style="border: 1px solid #f4f4f4;padding: 8px;"><?php echo $ConfpakDetail->title;?></td>
									            	   <td style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;padding: 8px;">Location</td>
											           <td style="border: 1px solid #f4f4f4;padding: 8px;"><?php echo $ConfpakDetail->state_name.', '.$ConfpakDetail->country_name;?></td>
										         </tr>
										         <tr>
											          <td style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;padding: 8px;">Start Date</td>
											          <td style="border: 1px solid #f4f4f4;padding: 8px;"><?php echo date('d, F Y', strtotime($ConfpakDetail->start_date))?></td>
											          <td style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;padding: 8px;">End Date</td>
											          <td style="border: 1px solid #f4f4f4;padding: 8px;">
												          <?php echo date('d, F Y', strtotime($ConfpakDetail->end_date)); ?>
											          </td>
										         </tr>
										         <tr>
											        <td style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;padding: 8px;">Duration</td>
											        <td style="border: 1px solid #f4f4f4;padding: 8px;"><?php echo ($ConfpakDetail->duration-1)." Night(s)".$ConfpakDetail->duration." Day(s)";?></td>
											        <td style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;padding: 8px;">Details</td>
											        <td style="border: 1px solid #f4f4f4;padding: 8px;"><?php echo $ConfpakDetail->duration_detail;?></td>
										         </tr>
                                            </table>
                                        </div>
                                        <div class="col-md-12" style="padding:0;">
                                            <h3>Hotel Envisaged</h3>
								            <div class="table-responsive">
								                <table class="table table-bordered" cellspacing="0" width="100%">
								                    <tr>
								                        <th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;padding: 8px;">Hotel</th>
								                        <th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;padding: 8px;">Check In</th>
								                        <th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;padding: 8px;">Check Out</th>
								                        <th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;padding: 8px;">Room Type</th>
								                        <th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;padding: 8px;">Meal Plan</th>
								                        <th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;padding: 8px;">Cost</th>
								                    </tr>
								                    <?php 
								                        $PaKid =  $ConfpakDetail->confpak_id;
								                        foreach($confHotelPak as $hotPakDetail) {     
								                    ?>
								                    <tr>
								                        <td><?php echo $hotPakDetail->hotel_name."<br>".$hotPakDetail->address_line_1.", ".$hotPakDetail->city_name.", ".$hotPakDetail->state_name.", ".$hotPakDetail->country_name;?></td>
								                        <td><?php echo date('d, F Y', strtotime($hotPakDetail->check_in_date)); ?></td>
								                        <td><?php echo date('d, F Y', strtotime($hotPakDetail->check_out_date)); ?></td>
								                        <td><?php echo $hotPakDetail->room_type; ?></td>
								                        <td>
								                            <?php
								                            
								                    $date_rates_detail = $CI->admin_model->getDateRatesByid_calculate($hotPakDetail->hotel_id, $hotPakDetail->check_in_date, $hotPakDetail->check_out_date);
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
                                                        
                                                        if($hotPakDetail->meal_type_id == $mP)
                                                        {
                                                            echo $mealTxt;   
                                                        }
                                                        
                                                        ?>
                                                        
                                                     <?php
                                                     }?>
								                        </td>
								                        <td>
								                            <?php
								                                $date_rates_detail = $CI->admin_model->getDateRatesByid_calculate($hotPakDetail->hotel_id, $hotPakDetail->check_in_date, $hotPakDetail->check_out_date);
								                                $dateMealPlanArr = array();

                                                                $dateIdStr = '';

                                                                foreach($date_rates_detail as $dataData)
                                                                {
                                                                    $dateMealPlanArr[$dataData['id']] = $dataData['meal_plan'];
                                                                    $dateIdStr .= $dataData['id'].',';
                                                                }

                                                                $dateIdStr = rtrim($dateIdStr, ',');
                                                                
                                                                $hotel_rates_detail = $this->admin_model->getHotelRoomRatesFilter1($hotPakDetail->hotel_id, $dateIdStr);
                                                                
                                                                $roomPriceArr = array();    

                                                                foreach($hotel_rates_detail as $rooms)
                                                                {
                                                                    $dateId = $rooms['date_id'];

                                                                    $rtId = $rooms['room_type_id']; // Room Type Id

                                                                    $rnId = $rooms['room_name_id']; // Room Name Id

                                                                    $mealPlan = $dateMealPlanArr[$dateId];

                                                                    $roomPriceArr[$rtId][$mealPlan][$rnId] = $rooms['price'];
                                                                }
                                                                //print_r($roomPriceArr);
                                                                
                                                                $roomPrices = array();
                
                                                                $countRooms = count(explode(',', $ConfpakDetail->total_adults));
                                                                
                                                                $roomPriceByType = array();

                                                                for($j=0; $j<$countRooms; $j++)
                                                                {
                                                                    $userSelectedTypes = $hotPakDetail->room_type_id;
                                                                    $userSelectedMealPlan = $hotPakDetail->meal_type_id;
                                                                    $roomPriceByType = $roomPriceArr[$userSelectedTypes][$userSelectedMealPlan];
                                                                }
                                                                
                                                                print_r($roomPriceByType);
								                            ?>
								                        </td>
								                    </tr>
								                    <?php }?>
								                </table>
								            </div>
                                        </div>
                                        <?php if(!empty($confVehiclePak)) {?>
                                        <div class="col-md-12" style="padding:0;">
                                            <h3>Vehicle Envisaged</h3>
                                            <div class="table-responsive">
                                                <table class="table table-bordered" cellspacing="0" width="100%">
                                                    <tr>
                                                        <th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;padding: 8px;">Vehicle</th>
                                                        <th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;padding: 8px;">From</th>
                                                        <th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;padding: 8px;">To</th>
                                                        <th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;padding: 8px;">Unit</th>
                                                    </tr>
                                                    <?php foreach($confVehiclePak as $Pakvehicle) {?>
                                                    <tr>
                                                        <td><?php echo $Pakvehicle->vehicle_name; ?></td>
                                                        <td>
                                                            <?php $day = '+'.($Pakvehicle->from_day-1).' day'; 
                                                            echo date('d, F Y', strtotime($ConfpakDetail->start_date . $day)); ?>
                                                        </td>
                                                        <td><?php $day = '+'.($Pakvehicle->to_day-1).' day'; 
                                                            echo date('d, F Y', strtotime($ConfpakDetail->start_date . $day)); ?>
                                                        </td>
                                                        <td><?php echo $Pakvehicle->selected_vehicle_unit; ?></td>
                                                    </tr>
                                                    <?php }?>
                                                </table>
                                            </div>
                                        </div>
                                        <?php }?>
                                        <div class="col-md-12" style="padding:0;">
                                            <h3>Activities Envisaged</h3>
                                            <?php if(!empty($confActivityPak)) {?>
                                            <div class="table-responsive">
                                                <table class="table table-bordered" cellspacing="0" width="100%">
                                                    <tr>
                                                        <th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;padding: 8px;">Activities(Per Person)</th>
                                                        <th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;padding: 8px;">City</th>
                                                        <th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;padding: 8px;">Date</th>
                                                    </tr>
                                                    <?php foreach($confActivityPak as $activitesDetail) {?>
                                                    <tr>
                                                        <td>
                                                        <?php
                                                         $actvId = $activitesDetail->activity_sel_Id;
                                                         $ActivityArr = $CI->partner_model->getActivitiesById($actvId);
										                 //print_r($cityArr);
										                 $activities = '';
										                 foreach($ActivityArr as $Actarr)
										                 {
											                 $activities.= $Actarr['details'].', ';
										                 }
									                 	 echo rtrim($activities,', ');
                                                        ?></td>
                                                        <td>
                                                        <?php
                                                         $actvId = $activitesDetail->activity_sel_Id;
                                                         $ActivityArr = $CI->partner_model->getActivitiesById($actvId);
										                 //print_r($cityArr);
										                 $cities = '';
										                 foreach($ActivityArr as $Actarr)
										                 {
											                 $cities.= $Actarr['city_id'].', ';
										                 }
									                 	 $city =  rtrim($cities,', ');
									                 	 $cityArr = $CI->admin_model->getCitiesById($city);
										                 //print_r($cityArr);
										                 $cities = '';
										                 foreach($cityArr as $cityData)
										                 {
											                 $cities.= $cityData['city_name'].', ';
										                 }
										                 echo rtrim($cities,', ');
                                                        ?>
                                                            
                                                        </td>
                                                        <td>
                                                            <?php echo date('d, F Y', strtotime($activitesDetail->activity_date));?>
                                                        </td>
                                                    </tr>
                                                    <?php }?>
                                                </table>
                                            </div>
                                            <?php }?>
                                            <div class="table-responsive">
                                                <table class="table table-bordered" cellspacing="0" width="100%">
                                                    <tr>
                                                        <th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;padding: 8px;">Activities(Per Unit)</th>
                                                        <th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;padding: 8px;">City</th>
                                                        <th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;padding: 8px;">Unit</th>
                                                        <th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;padding: 8px;">Date</th>
                                                    </tr>
                                                    <?php foreach($confUnitActivityPak as $unitactivitesDetail) {?>
                                                    <tr>
                                                        <td>
                                                        <?php
                                                         $unitactvId = $unitactivitesDetail->activity_unitId;
                                                         $unitActivityArr = $CI->partner_model->getperUnitActivitiesById($unitactvId);
										                 //print_r($cityArr);
										                 $unitactivities = '';
										                 foreach($unitActivityArr as $unitActarr)
										                 {
											                 $unitactivities.= $unitActarr['details'].', ';
										                 }
									                 	 echo rtrim($unitactivities,', ');
                                                        ?>
                                                        </td>
                                                        <td>
                                                        <?php
                                                         $unitactvId = $unitactivitesDetail->activity_unitId;
                                                         $unitActivityArr = $CI->partner_model->getperUnitActivitiesById($unitactvId);
										                 //print_r($cityArr);
										                 $cities = '';
										                 foreach($unitActivityArr as $unitActarr)
										                 {
											                 $cities.= $unitActarr['city_id'].', ';
										                 }
									                 	 $city =  rtrim($cities,', ');
									                 	 $cityArr = $CI->admin_model->getCitiesById($city);
										                 //print_r($cityArr);
										                 $cities = '';
										                 foreach($cityArr as $cityData)
										                 {
											                 $cities.= $cityData['city_name'].', ';
										                 }
										                 echo rtrim($cities,', ');
                                                        ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $unitactivitesDetail->activity_unit; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo date('d, F Y', strtotime($unitactivitesDetail->activity_date));?>
                                                        </td>
                                                        
                                                    </tr>
                                                    <?php }?>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="col-md-12" style="padding:0;">
                                            <h3>Tour Cost</h3>
                                            <div class="table-responsive">
                                                <table class="table table-bordered" cellspacing="0" width="100%">
                                                    <tr>
								                        <th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;">Room</th>
								                        <th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;">Adult(s)</th>
								                        <th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;">Infant(s)</th>
								                        <th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;">Kid(s)</th>
								                        <th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;">Kid(s) Age</th>
								                        <th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4; width:60px;">Price</th>
								                    </tr>
								                    <?php $rooms = explode(',', $ConfpakDetail->total_adults);
								                    for($i=0; $i<count($rooms); $i++){
								                    ?>
								                    <tr>
								                        <td><?php echo $i+1;?></td>
								                        <td>
								                            <?php echo $rooms[$i];?>
								                        </td>
								                        <td>
								                            <?php $infants = explode(',', $ConfpakDetail->total_infants); 
								                            echo $infants[$i];
								                            ?>
								                        </td>
								                        <td>
								                            <?php $kids = explode(',', $ConfpakDetail->total_kids); 
								                            echo $kids[$i];
								                            ?>
								                        </td>
								                        <td>
								                            <?php $kidsAge = explode(',', $ConfpakDetail->kids_age);
								                            echo $kidsAge[$i];
								                            ?>
								                        </td>
								                    </tr>
								                    <?php }?>
                                                </table>
                                            </div>
                                        </div>
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