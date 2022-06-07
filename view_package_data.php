<?php 
ob_start();
require('index.php');
ob_end_clean();
$path = getcwd();
$CI =& get_instance();
$CI->load->model('admin_model');
$CI->load->model('hotel_model');
	$type=$_GET['type'];
	
	$editHotelId='';
	$countRoom='';
	$roomPrice='';
	$extraBedPrice='';
	if($_GET['action']=='view')
	{
		$editItiId= $_GET['itiId'];
		$searchData= $_GET['searchData'];
        $flightdetails = base64_decode($_GET['flightdetails']);
		$empName = base64_decode($_GET['empName']);
		$prtnrLogo = base64_decode($_GET['prtnrLogo']);
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
	
			$selMealdata=$_GET['selMealPlans'];
			$selRoomsdata=$_GET['selRooms'];
			$selRData = explode('$#$', rtrim(base64_decode($selRoomsdata), ','));
			$selRoomsArr = explode(',', rtrim($selRData[0], ','));
			$selectedRoomIds = explode(',',$selRData[1]);
			$selMealArr = explode(',', rtrim(base64_decode($selMealdata), ','));
			
			$selHoteldata= $_GET['selHotels'];
			$selHData = explode('$#$', rtrim(base64_decode($selHoteldata), ','));
			
			$selHotelArr = explode(',', rtrim($selHData[0], ','));
			//print_r($selHData);
			$selectedHotelIdsArr = explode(',', rtrim($selHData[1], ','));
			//var_dump($selectedHotelIdsArr);
			
			$i = 0;
			$hotelMastArr = array();
			foreach($selectedHotelIdsArr as $hotelId){
				$hotelMastArr[$hotelId][] = $selectedRoomIds[$i];
				$i++;
			}
						
			$htmlHotelSupplCost = '';
			foreach($hotelMastArr as $hotelid => $roomTypeId)
			{
				//echo $hotelid;
				$date_rates_detail=$CI->admin_model->getDateRatesByid_calculate($hotelid, $startdate, $enddate);

				$hotelDateId = $date_rates_detail[0]['id'];
				
				$hotel_rates_detail=$CI->admin_model->getHotelRoomTypeRatesFilter($hotelid,$hotelDateId,$roomTypeId[0]);
				
				if(count($hotel_rates_detail))
				{
				$hN = $hotel_rates_detail[0]['hotel_name'];
				$rTN = $hotel_rates_detail[0]['room_type'];
				
				$htmlHotelSupplCost .= '<h3>SUPPLEMENT COSTS – HOTEL '.strtoupper($hN).'</h3><table class="table table-bordered" cellspacing="0" width="100%">
				<tr>
					<td style="border: 1px solid #f4f4f4;width:40%;"></td>
					<td style="border: 1px solid #f4f4f4;">'.$rTN.'</td>
				</tr>';
				
				$col = '';
				$values = '';
				foreach($hotel_rates_detail as $hotelRates)
				{
					$RoNA = $hotelRates['room_name'];
					$rPrice = $hotelRates['price'];
					
					$htmlHotelSupplCost .= '<tr>
						<td style="border: 1px solid #f4f4f4;">'.$RoNA.'</td>
						<td style="border: 1px solid #f4f4f4;">'.$rupeeSymbol.' '.$rPrice.'</td>
					</tr>';
				}
				
				$htmlHotelSupplCost .= '</table>';
				}
			}
			
			$selVehicledata= $_GET['selVehicle'];
			$selVehicleArr = explode(',', rtrim(base64_decode($selVehicledata), ','));
		
			$selVehicleunitdata = $_GET['selVehicleunit'];
			$selVehicleunitArr = explode(',', rtrim(base64_decode($selVehicleunitdata), ','));
			//print_r($selVehicleunitArr);
			$selActivitydata = $_GET['selActivity'];
			$selActivityArrdata = explode('$#$', rtrim(base64_decode($selActivitydata),','));
			$selActivityArr = explode(',', rtrim($selActivityArrdata[0], ','));
			//var_dump($selActivityArr);
			
			$selperunitActivitydata = $_GET['selUnitactivity'];
			$selperunitActivityArr = explode(',', rtrim(base64_decode($selperunitActivitydata),','));
			
			$seltotalunitofactivities = $_GET['seltotalunitact'];
			$seltotalunitofactivitiesArr = explode(',', rtrim(base64_decode($seltotalunitofactivities),','));
			$priceMargin = base64_decode($_GET['pMargin']);
			if(empty($priceMargin)){
		    $priceMargin = 0;
		    }
		    $priceMarginAmt = base64_decode($_GET['priceMarginAmt']);
		    if(empty($priceMarginAmt)){
		    $priceMarginAmt = 0;
		    }
		    //$partnerMarkup = base64_decode($_GET['partnerMarkup']);
			$calculatedprices= $_GET['prices'];
			
			if($calculatedprices != '')
			{
				$calculatedprices = base64_decode($calculatedprices);
				$totrooms = count(array($calculatedprices));
				$priceArr = explode(',', rtrim($calculatedprices,','));
				$pArr = array();
			  foreach($priceArr as $val)
			  {
			    if(empty($priceMarginAmt)){
			          
			        $pArr[] = $val + round($val*$priceMargin/100);
			    
			    }
			    else{
			        if(empty($priceMargin)){
			               
			           $pArr[] = $val + round($priceMarginAmt/$totrooms);
			        
			        }
			    }
				
			  }
			  $subTotal = array_sum($pArr);
			}
		}
		/*************************PrintPdf code End***************/
		//$startdate=$paramArr['startdate'];
		//$enddate=$paramArr['enddate'];
		
		$searchrooms=$paramArr['searchrooms'];
		
		$stayDuration=$paramArr['stayDuration'];
		$adults=$paramArr['adults'];
		$child=$paramArr['child'];
		$infants = $paramArr['infants'];
		$child_age=$paramArr['child_age'];
		
		$itineraryData = $CI->admin_model->getIteneraryById($editItiId);
		//print_r($itineraryData);
		$itineraryDetails = $CI->admin_model->getIteneraryDetailsById($editItiId);
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
        </style>
        <body>
            
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	
	<!-- Main content -->
	<section class="content">
	  <div class="row">
		<div class="col-md-12">
			<div class="box box-default">
			
			<div class="box-body">	
				
				<div class="row">
					<div class="col-md-12" style="">
					    <?php if(!empty($prtnrLogo)) {?>
					    <img src="<?php echo $path; ?>/uploads/partner_logo/<?php echo $prtnrLogo;?>" alt="" style="width:150px; padding-top:0px;" />
					    <?php }else {?>
						<img src="<?php echo $path; ?>/hotelhomepage/images/logo-1.png" alt="" style="width:150px; padding-top:0px;" />
						<?php }?>
					</div>
				</div>
				
				<div id="searchData" style="padding:0;">
					<div style="padding:5px; border-radius:5px; width:100%; margin-bottom:0px;">
					
						<div class="col-md-12">
							<div class="table-responsive">
							<table class="table table-bordered" cellspacing="0" width="100%">
							    <tr>
							        <th width="50%">
							            <?php for($i=0; $i<count($itineraryDetails); $i++){
							                      $images = json_decode($itineraryDetails[$i]['itinerary_images']);
							                } ?>
							            <img src="<?php echo $path; ?>/uploads/itinerary_images/<?php echo $images[0]; ?>" class="img-responsive" style="width:400px; padding: 0px;">
							        </th>
							        <th width="50%" style="padding:0px 0px 0px 5px;">
							            <span style="font-size:28px; font-family: 'Open Sans', 'Droid Sans', Tahoma, Arial, sans-serif; font-weight:bold; color:#455a64;"><b><?php echo $itiTitle;?></b></span><br><br>
							            <span style="font-family: 'Open Sans', 'Droid Sans', Tahoma, Arial, sans-serif; font-weight:lighter; color:#455a64; font-size:12px;"><i class='fa fa-calendar' aria-hidden='true' style="font-size:18px;"></i><?php echo " From ".date('d, F Y',strtotime($startdate))." to ".date('d, F Y',strtotime($enddate));?></span><br><br>
							            <span style="font-family: 'Open Sans', 'Droid Sans', Tahoma, Arial, sans-serif; font-weight:lighter; color:#455a64; font-size:12px;"><i class="fa fa-moon-o" aria-hidden="true" style="font-size:18px;"></i><?php echo " ".($Itiduration-1)." Night(s), ".$Itiduration." Day(s)";?></span><br><br>
							            <span style="font-family: 'Open Sans', 'Droid Sans', Tahoma, Arial, sans-serif; font-weight:lighter; color:#455a64; font-size:12px;"><i class='fa fa-users' aria-hidden='true' style="font-size: 18px;"></i><?php echo " ".$totalAdults; ?> Adults + <?php echo $totalKids; ?> Kids</span><br>
							            <span style="font-size:20px; font-family: 'Open Sans', 'Droid Sans', Tahoma, Arial, sans-serif; font-weight:bold; color:#455a64;"><b>Destinations Covered</b></span><br>
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
							        </th>
							    </tr>
							</table>	
							<table class="table" cellspacing="0" width="100%">
							        <tr>
							           <th width="60%">
							               <h3 style="font-size:28px; font-family: 'Open Sans', 'Droid Sans', Tahoma, Arial, sans-serif; font-weight:bold; color:#455a64;">Itinerary</h3>
							           </th>
							           <th width="30%">
							               <img src="<?php echo $path?>/assets/images/travelicon.png" style="width:250px;">
							           </th>
							        </tr>
							</table>
							      <?php
								if(!empty($itineraryDetails)) {
								    for($i=0; $i<count($itineraryDetails); $i++) {
								    $images = json_decode($itineraryDetails[$i]['itinerary_images']);
									if($i % 2 == 0) { ?>
								    <table class="table" cellspacing="0" width="100%">
									<tr>
									    <th colspan="2">
									         <div style="text-align:center; margin:auto; background-color:#10ade2; border-radius:100%; width:40px; height:40px; padding:5px; border-style:solid; border-color:#e1e1e1; box-shadow: 3px 3px 3px grey; color:#fff">DAY 0<?php echo $i+1;?>
											 </div>
									    </th>
									</tr>
							        <tr>
							            <th width="55%">
							                <h3 style="width:auto; height:25px; color:#fff; background-color:#f79646; border-color:#2c3e50; border-radius:5px; font-family: 'Open Sans', 'Droid Sans', Tahoma, Arial, sans-serif; font-weight:bold; font-size:12px;"><?php echo $itineraryDetails[$i]['itinerary_title']; ?></h3>
							                <p style="width:auto; height:auto; color:#fff; background-color:#4f81bd; padding:5px; border-radius:5px; margin-top:-10px; font-family: 'Open Sans', 'Droid Sans', Tahoma, Arial, sans-serif; font-weight:lighter; font-size:10px;"><?php echo $itineraryDetails[$i]['itinerary_details']; ?></p>
							            </th>
							            <th width="35%">
							                <?php
												foreach($images as $image) { ?>
												<img src="<?php echo $path.'/uploads/itinerary_images/'.$image;?>" style="width:275px;">
											<?php }
											?>
							            </th>
							        </tr>
							        
							        </table>
							    <?php }else {?>
							    <table class="table" cellspacing="0" width="100%">
							        <tr>
									    <th colspan="2">
									        <div style="text-align:center; margin:auto; background-color:#10ade2; border-radius:100%; width:40px; height:40px; padding:5px; border-style:solid; border-color:#e1e1e1; box-shadow: 3px 3px 3px grey; color:#fff">DAY 0<?php echo $i+1;?></div>
									    </th>
									</tr>
							        <tr>
							            <th width="35%">    
							                <?php
											    foreach($images as $image) { ?>
											    <img src="<?php echo $path.'/uploads/itinerary_images/'.$image;?>" style="width:275px;">
										    <?php }
										    ?>
							            </th>
							            <th width="65%">
							                <h3 style="width:auto; height:25px; color:#fff; background-color:#f79646; border-color:#2c3e50; border-radius:5px; font-family: 'Open Sans', 'Droid Sans', Tahoma, Arial, sans-serif; font-weight:bold; font-size:12px;"><?php echo $itineraryDetails[$i]['itinerary_title']; ?></h3>
							                <p style="width:auto; height:auto; color:#fff; background-color:#4f81bd; padding:5px; border-radius:5px; margin-top:-10px; font-family: 'Open Sans', 'Droid Sans', Tahoma, Arial, sans-serif; font-weight:lighter; font-size:10px;"><?php echo $itineraryDetails[$i]['itinerary_details']; ?></p>
							            </th>
							        </tr>
							        
							      </table>
							    <?php }
							       } 
							    } ?>
							
							</div>
						</div>
						
						<div class="col-md-12">
							<h3 style="font-family: 'Open Sans', 'Droid Sans', Tahoma, Arial, sans-serif; font-weight:bold; color:#455a64;">Hotel Envisaged</h3>
							<div class="table-responsive">
							<table class="table table-bordered" cellspacing="0" width="100%">
								<thead>
								  <tr style="color:#fff;font-family: 'Open Sans', 'Droid Sans', Tahoma, Arial, sans-serif; font-weight:bold; font-size:12px;">
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
									<tr style="font-family: 'Open Sans', 'Droid Sans', Tahoma, Arial, sans-serif; font-weight:lighter; font-size:10px;">
										<th style="border: 1px solid #f4f4f4;"><?php echo $i; ?></th>
										<th style="border: 1px solid #f4f4f4;"><?php echo $cityArr[0]['city_name'];?></th>
										<th style="border: 1px solid #f4f4f4;"><?php echo $date;?></th>
										<th style="border: 1px solid #f4f4f4;">
											<?php
												if($calculatedprices != ''){
												    $hotelS = trim($selHotelArr[$k]);
												    if($hotelS == 'Select Hotel')
												    {
												        $hotelS = '--';
												    }
													echo $hotelS;
												}
												else
												{ ?>
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
											<?php
												}?>
											
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
												{ ?>
											<?php
												}?>
											
										</th>
									</tr>
									<?php
									}
									?>
								</tbody>
							</table>
							</div>
						</div>
						
						<!--activities part-->
						<div class="col-md-12">
							<h3 style="font-family: 'Open Sans', 'Droid Sans', Tahoma, Arial, sans-serif; font-weight:bold; color:#455a64;">Activites Envisaged</h3>
							<div class="table-responsive">
							<table class="table table-bordered" cellspacing="0" width="100%">
								<thead>
								  <tr style="color:#fff; font-family: 'Open Sans', 'Droid Sans', Tahoma, Arial, sans-serif; font-weight:bold; font-size:12px;">
									<th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;">Day</th>
									<th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;">City</th>
									<th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;">Date</th>
									<th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;">Activities By Person</th>
									<th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;">Activities By Unit</th>
									<th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;">Total Unit</th>
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
											
											$k = $i-1;	
									?>
									<tr style="font-family: 'Open Sans', 'Droid Sans', Tahoma, Arial, sans-serif; font-weight:lighter; font-size:10px;">
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
									}
									?>
								</tbody>
							</table>
							</div>
						</div>
						<!--end-->
						<?php
						
						 if(in_array("Select Vehicle", $selVehicleArr)){
						     
						 }else{
						     
						 //}
						?>
						
						<div class="col-md-12">
							<h3 style="font-family: 'Open Sans', 'Droid Sans', Tahoma, Arial, sans-serif; font-weight:bold; color:#455a64;">Vehicle Detail</h3>
							<table class="table table-bordered" cellspacing="0" width="100%">
							    <thead>
								  <tr style="color:#fff; font-family: 'Open Sans', 'Droid Sans', Tahoma, Arial, sans-serif; font-weight:bold; font-size:12px;">
								   <th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4; width: 300px;">Selected Vehicle</th>
								   <th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4; width: 150px;">Vehicle Unit</th>
								  </tr>
                                </thead>
								<tbody>
									<?php
										
								    for($i=0; $i<count($selVehicleArr); $i++){
									?>
									<tr style="font-family: 'Open Sans', 'Droid Sans', Tahoma, Arial, sans-serif; font-weight:lighter; font-size:10px;">
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
						</div>
						<?php
						 }
						?>
						<!--flight invisaged-->
						<?php
						if(empty($flightdetails))
						{
						    
						 }else{
						?>
						<div class="col-md-12">
							<h3 style="font-family: 'Open Sans', 'Droid Sans', Tahoma, Arial, sans-serif; font-weight:bold; color:#455a64;">Flight Envisaged</h3>
							<table class="table table-bordered" cellspacing="0" width="100%">
							    <thead>
								  <tr style="color:#fff; font-family: 'Open Sans', 'Droid Sans', Tahoma, Arial, sans-serif; font-weight:bold; font-size:12px;">
								   <th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4; width: 300px;">Flight Details</th>
								  </tr>
                                </thead>
								<tbody>
									<tr style="font-family: 'Open Sans', 'Droid Sans', Tahoma, Arial, sans-serif; font-weight:lighter; font-size:10px;">
										<td style="border: 1px solid #f4f4f4;padding: 8px;">
												<?php
													echo $flightdetails;
												?>		
										</td>
										
									</tr>
								</tbody>
							</table>
						</div>
						<?php
						}
						?>
						<br/><br/>
						<div class="col-md-12">		
						
							<h3 style="font-family: 'Open Sans', 'Droid Sans', Tahoma, Arial, sans-serif; font-weight:bold; color:#455a64;">Tour Cost</h3>	
							<div class="table-responsive">
							<table class="table table-bordered" cellspacing="0" width="100%">
								<tr style="color:#fff; font-family: 'Open Sans', 'Droid Sans', Tahoma, Arial, sans-serif; font-weight:bold; font-size:12px;">
								    <th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;">Room</th>
								    <th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;">Adult</th>
								    <th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;">Infants</th>
								    <th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;">Child(ren)</th>
								    <th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;">Child(ren) Age</th>
								    <th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;">Price</th>
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
									<tr style="font-family: 'Open Sans', 'Droid Sans', Tahoma, Arial, sans-serif; font-weight:lighter; font-size:10px;">
										<td style="border: 1px solid #f4f4f4;padding: 8px;"><?php echo $i+1; ?></td>
										<td style="border: 1px solid #f4f4f4;padding: 8px;"><span><i class="fa fa-male" aria-hidden="true"></i></span> <?php echo $adultP; ?></td>
										<td style="border: 1px solid #f4f4f4;padding: 8px;"><span><i class="fa fa-baby" aria-hidden="true"></i></span> <?php echo $infantsp; ?></td>
										<td style="border: 1px solid #f4f4f4;padding: 8px;"><span><i class="fa fa-child" aria-hidden="true"></i></span> <?php echo $childp; ?></td>
										<td style="border: 1px solid #f4f4f4;padding: 8px;"><?php echo $childp_age; ?></td>
										
										<td style="border: 1px solid #f4f4f4;padding: 8px;"><span><i class="fa fa-inr" aria-hidden="true"></i></span><?php echo $pArr[$i]; //$selRoompricesArr[$i]; ?></td>
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
										<tr>
										<td style="border: 1px solid #f4f4f4;padding: 8px;"><?php echo $i+1; ?></td>
										<td style="border: 1px solid #f4f4f4;padding: 8px;"><span><i class="fa fa-male" aria-hidden="true"></i></span> <?php echo $adultP; ?></td>
										<td style="border: 1px solid #f4f4f4;padding: 8px;"><span><i class="fa fa-baby" aria-hidden="true"></i></span> <?php echo $infantsp; ?></td>
										<td style="border: 1px solid #f4f4f4;padding: 8px;"><span><i class="fa fa-child" aria-hidden="true"></i></span> <?php echo $childp; ?></td>
										<td style="border: 1px solid #f4f4f4;padding: 8px;"><?php echo $childp_age; ?></td>
										
										<td style="border: 1px solid #f4f4f4;padding: 8px;"><span><i class="fa fa-inr" aria-hidden="true"></i></span><?php echo $pArr[$i]; //$selRoompricesArr[$i];?></td>
									    </tr>
									    <?php
									   }
									     
									}
								
								?>
								<tr>
									<td colspan="5" style="text-align:center;border: 1px solid #f4f4f4;padding: 8px;">Total</td>
									<td style="border: 1px solid #f4f4f4;padding: 8px;"><span><i class="fa fa-inr" aria-hidden="true"></i></span><?php echo $subTotal; //$selRoomsTotalArr;?></td>
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
						</div>	
						<h3 style="font-family: 'Open Sans', 'Droid Sans', Tahoma, Arial, sans-serif; font-weight:bold; color:#455a64;">Tour Inclusions:</h3>
						<ul style="font-family: 'Open Sans', 'Droid Sans', Tahoma, Arial, sans-serif; font-weight:lighter; font-size:12px;">
							<li>Welcome drinks on Arrival at hotel/resort. (Non alcoholic)</li>
							<li>Accommodation as per above details.</li>
							<li>Meals as above mentioned Meal Plan.</li>
							<li>Chauffeur Driven Vehicle as per the itinerary &amp; Vehicle Details.</li>
							<li>All kind of applicable hotel, transport, service &amp; govt. taxes.</li>
						</ul>
						<h3 style="font-family: 'Open Sans', 'Droid Sans', Tahoma, Arial, sans-serif; font-weight:bold; color:#455a64;">Tour Exclusions:</h3>	
						<ul style="font-family: 'Open Sans', 'Droid Sans', Tahoma, Arial, sans-serif; font-weight:lighter; font-size:12px;">
							<li>Bus/Air/Train tickets.</li>
							<li>Entry &amp; activities fees at monuments, tourist spots, etc. </li>
							<li>Tips to the guides / driver / restaurants / hotels etc.</li>
							<li>Any expenses of personal nature such as, drinks, laundry, telephone calls, insurance, camera fees, excess baggage, emergency/medical cost etc.</li>
						</ul>
						<h3 style="font-family: 'Open Sans', 'Droid Sans', Tahoma, Arial, sans-serif; font-weight:bold; color:#455a64;">Tour Note:</h3>
						<ul style="font-family: 'Open Sans', 'Droid Sans', Tahoma, Arial, sans-serif; font-weight:lighter; font-size:12px;">
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
					<div style="clear:both"></div>
					</div>
						
				</div>
				
			</div>
			<div style="clear:both;"></div>
			<!--</form>	-->
		</div>
		</div>
	
	  </div>
	</section>
	            
				<!--<div class="row">-->
				<!--	<div class="col-md-12" style="text-align:right; position:relative;">-->
				<!--		<img src="<?php //echo $path ?>/asset/images/pdf/Footer2.png" style="width:100%;" />-->
				<!--		<div style="position: absolute;top: 80px;right: 25px;padding: 10px;">-->
				<!--			<a href="https://www.facebook.com/LiD.TE/" target="_blank">-->
				<!--			<img src="<?php //echo $path; ?>/asset/images/pdf/fb.png" style="height:40px;" /></a>-->
				<!--			<a href="https://www.instagram.com/planetlid/?hl=en" target="_blank">-->
				<!--			<img src="<?php //echo $path; ?>/asset/images/pdf/instagram.png" style="height:40px;" /></a>-->
				<!--			<a href="https://www.youtube.com/channel/UCXUSz7sEHs4_RisR-nENw9w" target="_blank">-->
				<!--			<img src="<?php //echo $path; ?>/asset/images/pdf/youtube.png" style="height:40px;" /></a>-->
				<!--			<a href="https://plus.google.com/+LightsinDarkTravelEventsPvtLtdNewDelhi" target="_blank">-->
				<!--			<img src="<?php //echo $path; ?>/asset/images/pdf/google+.png" style="height:40px;" /></a>-->
							
				<!--		</div>-->
				<!--	</div>-->
				<!--</div>-->
			
</div><!-- /.row -->
</body>
</html>