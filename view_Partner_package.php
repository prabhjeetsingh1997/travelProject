<?php 
ob_start();
require('index.php');
ob_end_clean();
$path = getcwd();
$CI =& get_instance();
$CI->load->model('admin_model');
$CI->load->model('partner_model');

	$type=$_GET['type'];
	$editHotelId='';
	$countRoom='';
	$roomPrice='';
	$extraBedPrice='';
	if($_GET['action']=='view')
	{
		$editItiId= $_GET['itiId'];
		$searchData= $_GET['searchData'];
        //$flightdetails = base64_decode($_GET['flightdetails']);
		$employeeName = rawurldecode($_GET['employeeName']);
		$prtnrLogo = rawurldecode($_GET['prtnrLogo']);
		$searchDataStr = base64_decode($searchData);

		$searchDataArr = explode('S$S',$searchDataStr);
		$paramArr = array();
		foreach($searchDataArr as $viewdata)
		{
			$dataArr = explode('=',$viewdata);
			$val = isset($dataArr[1]) ? $dataArr[1] : null;
			if (strpos($val, '#') !== false)
			{
				$val = explode('#', $val);	
			}
			$paramArr[$dataArr[0]] = $val;
		}
		
		if(is_array($paramArr['adults']))
		{
			$totalAdults = array_sum($paramArr['adults']);
		}
		else
		{
			$totalAdults = $paramArr['adults'];
		}
		if(is_array($paramArr['child']))
		{
			$totalKids = array_sum($paramArr['child']);
		}
		else
		{
			$totalKids = $paramArr['child'];
		}
		
		$sDate = explode('/',$paramArr['startdate']);
		$startdate = $sDate[2].'-'.$sDate[1].'-'.$sDate[0];
		
		$eDate = explode('/',$paramArr['enddate']);
		$enddate = $eDate[2].'-'.$eDate[1].'-'.$eDate[0];
		
		/*************************PrintPdf code***************/
		$rupeeSymbol = '';
		if($type == 'pdf')
		{
			$rupeeSymbol = "<img src='asset/images/rupee.png' style='margin-top:3px;'>";
	        
			$selMealdata = $_GET['selMealPlans'];
			$selRoomsdata = $_GET['selRooms'];
			$selRData = explode(',', rawurldecode($selRoomsdata));
			$selMealArr1 = rawurldecode($selMealdata);
			
			$nwMealArr = html_entity_decode($selMealArr1);
			
			$selMealArr = json_decode($nwMealArr, true);
//			print_r($selMealArr);
// 			foreach($selMealArr as $newmeal){
// 			    foreach($newmeal as $key => $value){
// 			        if($value == ''){
// 			            $value = '--';
// 			        }
// 			        echo $value.', ';
// 			    }
// 			}
			
			$selHoteldata= $_GET['selHotels'];
			$selHData = explode(',', rawurldecode($selHoteldata));
			
			//print_r($selHData);
			
			$room_prices = $_GET['room_prices'];
			$Hotelroom_pricesArr = explode(',', rtrim(rawurldecode($room_prices), ','));
			
			$total_roomprices = rawurldecode($_GET['total_roomprices']);
			
			$selVehicledata= $_GET['selVehicle'];
			$selVehicleArr = explode(',', rtrim(rawurldecode($selVehicledata), ','));
		
			$selVehicleunitdata = $_GET['selVehicleunit'];
			$selVehicleunitArr = explode(',', rtrim(rawurldecode($selVehicleunitdata), ','));
			
			$flightName = explode(',', rtrim(rawurldecode($_GET['flightName']), ','));
            $FlightFrom = explode(',', rtrim(rawurldecode($_GET['FlightFrom']), ','));
            $flightTo = explode(',', rtrim(rawurldecode($_GET['flightTo']), ','));
            $flightArriv = explode(',', rtrim(rawurldecode($_GET['flightArriv']), ','));
            $FlightDepart = explode(',', rtrim(rawurldecode($_GET['FlightDepart']), ','));
            $FlightPrice = explode(',', rtrim(rawurldecode($_GET['FlightPrice']), ','));
            
            //var_dump($flightName);
            //print_r($flightName);
		}
		/*************************PrintPdf code End***************/
		
		$searchrooms=$paramArr['searchrooms'];
		
		$stayDuration=$paramArr['stayDuration'];
		$adults=$paramArr['adults'];
		$child=$paramArr['child'];
		$infants = $paramArr['infants'];
		$child_age=$paramArr['child_age'];
		
		$itineraryData = $CI->partner_model->getPartnerIteneraryById($editItiId);
		//print_r($itineraryData);
		$itineraryDetails = $CI->partner_model->getPartnerIteneraryDetailsById($editItiId);
		//print_r($itineraryDetails);
		$itiTitle=$itineraryData['title'];
		$Itiduration=$itineraryData['duration'];
		$itiCity=$itineraryData['city'];
		
	} 

?>
<!-- Content Wrapper. Contains page content -->
    <html>
        <head>
            <meta http-equiv="Content-Type" content="charset=utf-8"/>
            <meta name="viewport" content="width=device-width, minimum-scale=1,0, maximum-scale=1.0">
             <!--FontAwesome 4.3.0 -->
            <link href="https://travwhizz.com/assets/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
            <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        </head>
        <style>
            @page { margin: 0.5cm 0.5cm 0.5cm 0.5cm };
            @font-face {
                font-family: 'Open Sans', 'Droid Sans', 'Tahoma', 'Arial', 'sans-serif';
                font-style: normal;
                font-weight: normal;
                src: url(https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic) format('truetype');
            }
            ul{
                font-family: 'Open Sans', 'Droid Sans', Tahoma, Arial, sans-serif; 
                font-weight:lighter; font-size:12px;
            }
            .panel-heading {
                /*padding: 5px 10px !important;*/
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
        </style>
        <body>
            

				<table>
				    <tr>
				        <td style="text-align:right;">
					    <?php if(!empty($prtnrLogo)) {?>
					    <img src="<?php echo $path; ?>/uploads/partner_logo/<?php echo $prtnrLogo;?>" alt="" style="width:150px; padding-top:0px;" />
					    <?php }else {?>
						<img src="<?php echo $path; ?>/hotelhomepage/images/logo-1.png" alt="" style="width:150px; padding-top:0px;" />
						<?php }?>
				        </td>
				    </tr>
				</table>
				<br>
				<br>
				
							<table class="table table-bordered" cellspacing="0" width="100%" style="border:1px solid lightgrey;">
							    <tr>
							        <td width="50%">
							            <?php for($i=0; $i<count($itineraryDetails); $i++){
							                      $images = json_decode($itineraryDetails[$i]['itinerary_images']);
							             } ?>
							            <img src="<?php echo $path; ?>/uploads/itinerary_images/<?php echo $images[0]; ?>" class="img-responsive" style="width:400px; height:300px; padding: 0px;">
							        </td>
							        <td width="50%" style="padding:0px 0px 0px 20px;">
							            <span style="font-family: 'Open Sans', 'Droid Sans', Tahoma, Arial, sans-serif; font-weight:bold; color:#455a64; font-size:28px;"><b><?php echo $itiTitle;?></b></span><br><br>
							            <span style="font-family: 'Open Sans', 'Droid Sans', Tahoma, Arial, sans-serif; font-weight:lighter; color:#455a64; font-size:12px;"><i class='fa fa-calendar' aria-hidden='true' style="font-size:18px;"></i><?php echo " From ".date('d, F Y',strtotime($startdate))." to ".date('d, F Y',strtotime($enddate));?></span><br><br>
							            <span style="font-family: 'Open Sans', 'Droid Sans', Tahoma, Arial, sans-serif; font-weight:lighter; color:#455a64; font-size:12px;"><i class="fa fa-moon-o" aria-hidden="true" style="font-size:18px;"></i><?php echo " ".($Itiduration-1)." Night(s), ".$Itiduration." Day(s)";?></span><br><br>
							            <span style="font-family: 'Open Sans', 'Droid Sans', Tahoma, Arial, sans-serif; font-weight:lighter; color:#455a64; font-size:12px;"><i class='fa fa-users' aria-hidden='true' style="font-size: 18px;"></i><?php echo " ".$totalAdults; ?> Adults + <?php echo $totalKids; ?> Kids</span><br><br>
							            <span style="font-family: 'Open Sans', 'Droid Sans', Tahoma, Arial, sans-serif; font-weight:bold; color:#455a64; font-size:20px;"><b>Destinations Covered</b></span><br>
							            <span style="font-family: 'Open Sans', 'Droid Sans', Tahoma, Arial, sans-serif; font-weight:lighter; color:#455a64; font-size:12px;">
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
									    </span>
							        </td>
							    </tr>
							</table>
							<br>
							<table class="table" cellspacing="0" width="100%">
							        <tr>
							           <td width="60%">
							               <h3 style="font-size:28px; font-family: 'Open Sans', 'Droid Sans', Tahoma, Arial, sans-serif; font-weight:bold; color:#455a64;">Itinerary</h3>
							           </td>
							           <td width="30%">
							               <img src="<?php echo $path?>/assets/images/travelicon.png" style="width:250px;">
							           </td>
							        </tr>
							</table>
							<br>
							      <?php
								if(!empty($itineraryDetails)) {
								    for($i=0; $i<count($itineraryDetails); $i++) {
								    $images = json_decode($itineraryDetails[$i]['itinerary_images']);
									if($i % 2 == 0) { ?>
								    <table class="table" cellspacing="0" width="100%" style="width:100%; page-break-inside:avoid;">
									<tr>
									    <td colspan="2">
									         <br>
									         <div style="text-align:center; margin:auto; background-color:#10ade2; border-radius:100%; width:30px; height:30px; padding:6px; border-style:solid; border-color:#e1e1e1; box-shadow: 3px 3px 3px grey; color:#fff; font-size:12px;">DAY 0<?php echo $i+1;?>
											 </div>
											 
									    </td>
									</tr>
							        <tr>
							            <td style="width:500px;">
							                <div class="panel-heading" style="color: #fff;background-color: #f79646;border-color: #2c3e50;">
							                    <h3 style="width:auto; height:20px; padding-left:10px; border-radius:5px; font-family: 'Open Sans', 'Droid Sans', Tahoma, Arial, sans-serif; font-weight:bold; font-size:12px;"><?php echo $itineraryDetails[$i]['itinerary_title']; ?></h3>
							                </div>
							                <div class="panel-body" style="padding: 15px;color: #fff;background-color: #4f81bd;">
							                    <p style="width:auto; height:auto; text-align:justify; border-radius:5px; margin-top:-10px; font-family: 'Open Sans', 'Droid Sans', Tahoma, Arial, sans-serif; font-weight:lighter; font-size:10px;"><?php echo nl2br($itineraryDetails[$i]['itinerary_details']); ?></p>
							                </div>
							            </td>
							            <td>
							                <?php
												foreach($images as $image) { ?>
												<img src="<?php echo $path.'/uploads/itinerary_images/'.$image;?>" style="width:275px;">
											<?php }
											?>
							            </td>
							        </tr>
							        
							        </table>
							    <?php }else {?>
							    <table class="table" cellspacing="0" width="100%" style="width:100%; page-break-inside:avoid;">
							        <tr>
									    <td colspan="2">
									        <br>
									        <div style="text-align:center; margin:auto; background-color:#10ade2; border-radius:100%; width:30px; height:30px; padding:6px; border-style:solid; border-color:#e1e1e1; box-shadow: 3px 3px 3px grey; color:#fff; font-size:12px;">DAY 0<?php echo $i+1;?>
									        </div>
									        
									    </td>
									</tr>
							        <tr>
							            <td width="35%">    
							                <?php
											    foreach($images as $image) { ?>
											    <img src="<?php echo $path.'/uploads/itinerary_images/'.$image;?>" style="width:275px;">
										    <?php }
										    ?>
							            </td>
							            <td width="65%">
							                <div class="panel-heading" style="color: #fff;background-color: #f79646;border-color: #2c3e50;">
							                    <h3 style="width:auto; height:20px; padding-left:10px; border-radius:5px; font-family: 'Open Sans', 'Droid Sans', Tahoma, Arial, sans-serif; font-weight:bold; font-size:12px;"><?php echo $itineraryDetails[$i]['itinerary_title']; ?></h3>
							                </div>
							                <div class="panel-body" style="padding: 15px;color: #fff;background-color: #4f81bd;">
							                    <p style="width:auto; height:auto; text-align:justify; border-radius:5px; margin-top:-10px; font-family: 'Open Sans', 'Droid Sans', Tahoma, Arial, sans-serif; font-weight:lighter; font-size:10px;"><?php echo nl2br($itineraryDetails[$i]['itinerary_details']); ?></p>
							                </div>
							            </td>
							        </tr>
							        
							      </table>
							    <?php }
							       } 
							    } ?>
							
							<h3 style="font-family: 'Open Sans', 'Droid Sans', Tahoma, Arial, sans-serif; font-weight:bold; color:#455a64;">Hotel Envisaged</h3>
							<!--<div class="table-responsive">-->
							<table class="table table-bordered" cellspacing="0" width="100%" style="page-break-inside:avoid;">
								<thead>
								  <tr style="color:#fff;font-family: 'Open Sans', 'Droid Sans', Tahoma, Arial, sans-serif; font-weight:bold; font-size:12px; text-align:center;">
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
											$date = date('d, F Y',strtotime($startdate . $day));
											$dateSearch = date('Y-m-d',strtotime($startdate . $day));
											
											$k = $i-1;	
									?>
									<tr style="font-family: 'Open Sans', 'Droid Sans', Tahoma, Arial, sans-serif; font-weight:lighter; font-size:10px; text-align:center;">
										<td style="border: 1px solid #f4f4f4; font-family: 'Open Sans', 'Droid Sans', Tahoma, Arial, sans-serif; font-weight:lighter; font-size:10px;"><?php echo $i; ?></td>
										<td style="border: 1px solid #f4f4f4; font-family: 'Open Sans', 'Droid Sans', Tahoma, Arial, sans-serif; font-weight:lighter; font-size:10px;"><?php echo $cityArr[0]['city_name'];?></td>
										<td style="border: 1px solid #f4f4f4; font-family: 'Open Sans', 'Droid Sans', Tahoma, Arial, sans-serif; font-weight:lighter; font-size:10px;"><?php echo $date;?></td>
										<td style="border: 1px solid #f4f4f4; font-family: 'Open Sans', 'Droid Sans', Tahoma, Arial, sans-serif; font-weight:lighter; font-size:10px;">
											<?php
												
												    $hotelS = $selHData[$k];
												    if($hotelS == '')
												    {
												        $hotelS = '--';
												    }
													echo $hotelS;
											?>
										</td>
										<td style="border: 1px solid #f4f4f4; font-family: 'Open Sans', 'Droid Sans', Tahoma, Arial, sans-serif; font-weight:lighter; font-size:10px;">
											<?php
												
													$rooms = $selRData[$k];
													if($rooms == '')
													{
														$rooms = '--';
													}
													echo $rooms;
											?>
											
										</td>
										<td style="border: 1px solid #f4f4f4; font-family: 'Open Sans', 'Droid Sans', Tahoma, Arial, sans-serif; font-weight:lighter; font-size:10px;">
											<?php
												
													$mealPlans = $selMealArr[$k];
													foreach($mealPlans as $key => $val){
													
													if($val == '')
													{
														$val = '--';
													}
													$newmealVal = $val.', ';
													echo $newmealVal;
													}
												 
											?>
											
										</td>
									</tr>
									<?php
									}
									?>
								</tbody>
							</table>
					
						
						<?php
						if(in_array("", $selVehicleArr)){
						    
						}else{  
						?>
						
							<h3 style="font-family: 'Open Sans', 'Droid Sans', Tahoma, Arial, sans-serif; font-weight:bold; color:#455a64;">Vehicle Detail</h3>
							<table class="table table-bordered" cellspacing="0" width="100%" style="break-inside: avoid;">
							    <thead>
								  <tr style="color:#fff; font-family: 'Open Sans', 'Droid Sans', Tahoma, Arial, sans-serif; font-weight:bold; font-size:12px; text-align:center;">
								   <th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4; width: 300px;">Vehicle</th>
								   <th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4; width: 150px;">Vehicle Unit</th>
								  </tr>
                                </thead>
								<tbody>
									<?php
										
								    for($i=0; $i<count($selVehicleArr); $i++){
									?>
									<tr style="font-family: 'Open Sans', 'Droid Sans', Tahoma, Arial, sans-serif; font-weight:lighter; font-size:10px; text-align:center;">
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
								    }
									?>
								</tbody>
							</table>
						
						<?php
						 }
						?>

						<br/><br/>
						
							<h3 style="font-family: 'Open Sans', 'Droid Sans', Tahoma, Arial, sans-serif; font-weight:bold; color:#455a64;">Tour Cost</h3>	
							<!--<div class="table-responsive">-->
							<table class="table table-bordered" cellspacing="0" width="100%" style="page-break-inside:avoid;">
								<tr style="color:#fff; font-family: 'Open Sans', 'Droid Sans', Tahoma, Arial, sans-serif; font-weight:bold; font-size:12px;">
								    <th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4; text-align:center;">Room</th>
								    <th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4; text-align:center;">Adult</th>
								    <th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4; text-align:center;">Infants</th>
								    <th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4; text-align:center;">Child(ren)</th>
								    <th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4; text-align:center;">Child(ren) Age</th>
								    <th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4; text-align:center;">Price(Per. Room)</th>
								</tr>
								<?php
								 	if(!is_array($adults)){
									    
									    //$totadults = count($adults);
									    
									for($i=0; $i<count(array($adults)); $i++)
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
									//}
									?>
									<tr style="font-family: 'Open Sans', 'Droid Sans', Tahoma, Arial, sans-serif; font-weight:lighter; font-size:10px; text-align:center;">
										<td style="border: 1px solid #f4f4f4;padding: 8px; text-align:center;"><?php echo $i+1; ?></td>
										<td style="border: 1px solid #f4f4f4;padding: 8px; text-align:center font-weight:lighter; font-size:10px; text-align:center;"><i class="fa fa-male" aria-hidden="true"></i><?php echo $adultP; ?></td>
										<td style="border: 1px solid #f4f4f4;padding: 8px; text-align:center font-weight:lighter; font-size:10px; text-align:center;"><i class="fa fa-baby" aria-hidden="true"></i><?php echo $infantsp; ?></td>
										<td style="border: 1px solid #f4f4f4;padding: 8px; text-align:center font-weight:lighter; font-size:10px; text-align:center;"><i class="fa fa-child" aria-hidden="true"></i><?php echo $childp; ?></td>
										<td style="border: 1px solid #f4f4f4;padding: 8px; text-align:center;"><?php echo $childp_age; ?></td>
										<td style="border: 1px solid #f4f4f4;padding: 8px; font-weight:lighter; font-size:10px; text-align:center;"><i class="fa fa-inr" aria-hidden="true" style="font-weight:lighter; font-size:10px;"></i><?php echo $Hotelroom_pricesArr[$i]; //$selRoompricesArr[$i]; ?></td>
									</tr>
									<?php	
									}
									 }else{
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
										<tr style="font-family: 'Open Sans', 'Droid Sans', Tahoma, Arial, sans-serif; font-weight:lighter; font-size:10px; text-align:center;">
										<td style="border: 1px solid #f4f4f4;padding: 8px; text-align:center;"><?php echo $i+1; ?></td>
										<td style="border: 1px solid #f4f4f4;padding: 8px; text-align:center; font-weight:lighter; font-size:10px; text-align:center;"><i class="fa fa-male" aria-hidden="true"></i> <?php echo $adultP; ?></td>
										<td style="border: 1px solid #f4f4f4;padding: 8px; text-align:center; font-weight:lighter; font-size:10px; text-align:center;"><i class="fa fa-baby" aria-hidden="true"></i> <?php echo $infantsp; ?></td>
										<td style="border: 1px solid #f4f4f4;padding: 8px; text-align:center; font-weight:lighter; font-size:10px; text-align:center;"><i class="fa fa-child" aria-hidden="true"></i> <?php echo $childp; ?></td>
										<td style="border: 1px solid #f4f4f4;padding: 8px; text-align:center;"><?php echo $childp_age; ?></td>
										
										<td style="border: 1px solid #f4f4f4;padding: 8px; text-align:center; font-weight:lighter; font-size:10px; text-align:center;"><i class="fa fa-inr" aria-hidden="true"></i><?php echo $Hotelroom_pricesArr[$i]; ?></td>
									    </tr>
									    <?php
									   }
									     
									}
								
								?>
								<tr style="font-family: 'Open Sans', 'Droid Sans', Tahoma, Arial, sans-serif; font-weight:lighter; font-size:10px;">
									<td colspan="5" style="text-align:center;border: 1px solid #f4f4f4;padding: 8px;">Grand Total</td>
									<td style="border: 1px solid #f4f4f4;padding: 8px; text-align:center; font-weight:lighter; font-size:10px;"><i class="fa fa-inr" aria-hidden="true"></i><?php echo $total_roomprices;?></td>
								</tr>
								<!--<tr>-->
								<!--	<td colspan="5" style="text-align:center;border: 1px solid #f4f4f4;padding: 8px;">GST @ 5%</td>-->
								<!--	<td style="border: 1px solid #f4f4f4;padding: 8px;"><span><i class="fa fa-inr" aria-hidden="true"></i></span> <?php //echo $rupeeSymbol; ?> <span id="serviceTax"><?php //echo $selRoomsTaxArr;$serviceTax; ?></span></td>-->
								<!--</tr>-->
								<!--<tr style="font-size: 18px;font-weight: 600;">-->
								<!--	<td colspan="5" style="text-align:center;border: 1px solid #f4f4f4;padding: 8px;">Grand Total</td>-->
								<!--	<td style="border: 1px solid #f4f4f4;padding: 8px;"><span><i class="fa fa-inr" aria-hidden="true"></i></span><?php //echo $rupeeSymbol; ?> <span id="grandTotal"><?php //echo $selRoomsgranttotalArr; number_format(floor($grandTot)); ?></span></td>-->
								<!--</tr>-->
						</table>
						<a href='https://www.lidtravel.com/payment.html' target="_blank" style="text-decoration:none;">
                            <button style="background-color: #f79646; text-decoration:none; border: 1px solid #2c3e50; color: white; padding: 5px 10px; text-align: center; font-size: 20px; margin: 10px 30px; cursor: pointer;">
                                Pay Now
                            </button>
                        </a>
						
						<div style="break-inside: avoid;">
						<h3 style="font-family: 'Open Sans', 'Droid Sans', Tahoma, Arial, sans-serif; font-weight:bold; color:#455a64;">Tour Inclusions:</h3>
						<?php 
					    $extraturIncl = rawurldecode($_GET['extraturIncl']);
                        $extraturExcl = rawurldecode($_GET['extraturExcl']);
                        $extraturNote = rawurldecode($_GET['extraturNote']);
                        $extraturCnclplcy = rawurldecode($_GET['extraturCnclplcy']);
                        $extraturPymt = rawurldecode($_GET['extraturPymt']);
                    
					     //echo $extraturIncl; 
                         //echo $extraturExcl;
                         //echo $extraturNote; 
                        ?>
						<?php if(empty($extraturIncl)) {?>
						
						<ul style="font-family: 'Open Sans', 'Droid Sans', Tahoma, Arial, sans-serif; font-weight:lighter; font-size:12px;">
							<li>Accommodation as per above details.</li>
							<li>Meals as per mentioned in above hotels envisaged.</li>
							<li>Chauffeur Driven Vehicle as per the Vehicle envisaged and itinerary.(vehicle is/are not on disposal basis)</li>
							<li>24 hours on-call/whatsapp assistance during your tour.</li>
							<li>All kind of applicable hotel, transport, service &amp; govt. taxes.</li>
							<li>GST is included.</li>
						</ul>
						<?php }else{ ?>
						     <?php echo $extraturIncl; ?>
						<?php }?>
							<!--flight invisaged-->
						<?php
						$flightTotal = rawurldecode($_GET['flightTotal']);
						if(in_array("", $flightName))
						{
						    
						}else{
						?>
						
							<h3 style="font-family: 'Open Sans', 'Droid Sans', Tahoma, Arial, sans-serif; font-weight:bold; color:#455a64;">Flight Envisaged</h3>
							<table class="table" cellspacing="0" width="100%" style="page-break-inside:avoid;">
							    <thead>
								  <tr style="color:#fff; font-family: 'Open Sans', 'Droid Sans', Tahoma, Arial, sans-serif; font-weight:bold; font-size:12px; text-align:center;">
								   <th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4; text-align:center;">Flight Details</th>
								   <th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4; text-align:center;">From</th>
								   <th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4; text-align:center;">To</th>
								   <th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4; text-align:center;">Departure</th>
								   <th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4; text-align:center;">Arrival</th>
								   <th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4; text-align:center;">Price(Per. Pax)</th>
								  </tr>
                                 </thead>
								<tbody>
								    <?php for($i=0; $i<count($flightName); $i++) {?>
									<tr style="font-family: 'Open Sans', 'Droid Sans', Tahoma, Arial, sans-serif; font-weight:lighter; font-size:10px; text-align:center;">
									<td style="border: 1px solid #f4f4f4;padding: 8px; text-align:center;"><?php echo $flightName[$i]; ?></td>
								    <td style="border: 1px solid #f4f4f4;padding: 8px; text-align:center;"><?php echo $FlightFrom[$i]; ?></td>
								    <td style="border: 1px solid #f4f4f4;padding: 8px; text-align:center;"><?php echo $flightTo[$i]; ?></td>
								    <td style="border: 1px solid #f4f4f4;padding: 8px; text-align:center;"><?php echo $FlightDepart[$i]; ?></td>
								    <td style="border: 1px solid #f4f4f4;padding: 8px; text-align:center;"><?php echo $flightArriv[$i]; ?></td>
								    <td style="border: 1px solid #f4f4f4;padding: 8px; text-align:center;"><span style="font-weight:lighter; font-size:10px; text-align:center;"><i class="fa fa-inr" aria-hidden="true"></i></span><?php echo $FlightPrice[$i]; ?></td>
									</tr>
									<?php }?>
									<tr>
									    <td colspan="5" style="text-align:center; border: 1px solid #f4f4f4;padding: 8px; font-size:12px;">Total</td>
									    <td colspan="2" style="border:1px solid #f4f4f4;padding: 8px; font-weight:lighter; font-size:10px; text-align:center;"><span style="font-weight:lighter; font-size:10px;"><i class="fa fa-inr" aria-hidden="true"></i></span><?php echo $flightTotal; ?></td>
									</tr>
								</tbody>
							</table>
						
						<a href='https://www.lidtravel.com/payment.html' target="_blank" style="text-decoration:none;">
                            <button style="background-color: #f79646; border: 1px solid #2c3e50; text-decoration:none; color: white; padding: 5px 10px; text-align: center; font-size: 20px; margin: 10px 30px; cursor: pointer;">
                                Pay Now
                            </button>
                        </a>
						<?php
						}
						?>
						<h3 style="font-family: 'Open Sans', 'Droid Sans', Tahoma, Arial, sans-serif; font-weight:bold; color:#455a64;">Tour Exclusions:</h3>	
						<?php if(empty($extraturExcl)) {?>
						<ul style="font-family: 'Open Sans', 'Droid Sans', Tahoma, Arial, sans-serif; font-weight:lighter; font-size:12px;">
							<li>Bus/Air/Train tickets.(if not mentioned specifically)</li>
							<li>Any entry &amp; activities fees at monuments, tourist spots, etc.(if not mentioned specifically)</li>
							<li>Tips to the guides / driver / restaurants / hotels etc.</li>
							<li>Any expenses of personal nature such as, drinks, laundry, telephone calls, insurance, camera fees, excess baggage, emergency/medical cost etc.</li>
							<li>Any other item not mentioned in the above tour inclusions section.</li>
						</ul>
						<?php }else {?>
						     <?php echo $extraturExcl; ?>
						<?php }?>
						<h3 style="font-family: 'Open Sans', 'Droid Sans', Tahoma, Arial, sans-serif; font-weight:bold; color:#455a64;">Note:</h3>
						<?php if(empty($extraturNote)) {?>
						<ul style="font-family: 'Open Sans', 'Droid Sans', Tahoma, Arial, sans-serif; font-weight:lighter; font-size:12px;">
							<li>The cost is irrelevant of circumstances that are beyond our control. Situations such as road blockade due to strike or agitation, earthquake, natural calamity, sickness evacuation, delay or cancellation of train or flight etc. are beyond our control.</li>
							<li>Itinerary may vary depending upon the climate conditions and circumstances.</li>
							<li>We are not holding any booking and same will be confirmed only after the payment.</li>
							<li>Standard Check-in time at hotels is 14:00 hrs. & Check-out time is 11:00 hrs. Early check-in & late check-out is subject to availability</li>
						</ul>
						<?php }else {?>
						<?php echo $extraturNote; ?>
						<?php }?>
						<h3 style="font-family: 'Open Sans', 'Droid Sans', Tahoma, Arial, sans-serif; font-weight:bold; color:#455a64;">Cancellation Policy:</h3>
						<?php if(empty($extraturCnclplcy)) {?>
						
						<ul style="font-family: 'Open Sans', 'Droid Sans', Tahoma, Arial, sans-serif; font-weight:lighter; font-size:12px;">
						    <li>Flight Cancellation policy is as per the airlines norms. (service charges may applied)</li>
                            <li>If you cancel your tour package:
                                <ul>
                                    <li>30 days or more before date of departure – 25% of total tour cost.</li>
                                    <li>29-16 days before date of departure – 50% of total tour cost.</li>
                                    <li>15 days or less before date of departure – 100% of total tour cost.</li>    
                                </ul>
                            </li>
						</ul>
						<?php }else {?>
						<?php echo $extraturCnclplcy; ?>
						<?php }?>
						<h3 style="font-family: 'Open Sans', 'Droid Sans', Tahoma, Arial, sans-serif; font-weight:bold; color:#455a64;">Payment Policy:</h3>
						<?php if(empty($extraturPymt)) {?>
						
						<ul style="font-family: 'Open Sans', 'Droid Sans', Tahoma, Arial, sans-serif; font-weight:lighter; font-size:12px;">
					        <li>100% advance required to book the flights.</li>
                            <li>50% of total tour cost is required to confirm the package.</li>
                            <li>Remaining payment required by 20 days prior to date  of departure.</li>
					    </ul>
						<?php }else {?>
						<?php echo $extraturPymt; ?>
						<?php }?>
						
						</div>
						<div style="page-break-inside:avoid;">
						    <h3 style="font-family: 'Open Sans', 'Droid Sans', Tahoma, Arial, sans-serif; font-weight:bold; color:#455a64;">Terms & Conditions:</h3>
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
					
					<div style="clear:both"></div>
					
			<div style="clear:both;"></div>
				
<!--</div><!-- /.row -->
<table cellspacing="0" width="100%">
    <tr>
        <td style="text-align:center;">
            <img src="<?php echo $path ?>/uploads/partner_logo/GalleyReviews.jpg" style="width:600px;">
        </td>
    </tr>
</table>
</body>
</html>