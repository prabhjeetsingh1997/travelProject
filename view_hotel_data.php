<?php
ob_start();
require('index.php');
ob_end_clean();
$path = getcwd();

$CI =&get_instance();
$CI->load->model('admin_model');
$CI->load->model('hotel_model');
	$editHotelId='';
	$countRoom='';
	$roomPrice='';
	$extraBedPrice='';
	if($_GET['action']=='view')
	{
		//print_r($_SERVER);
		//$downloadPdfUrl = 'pdf.php?'.$_SERVER['QUERY_STRING'];
		
		$priceMargin = base64_decode($_GET['pMargin']);
		if(empty($priceMargin)){
		    $priceMargin = 0;
		}
		$priceMarginAmt = base64_decode($_GET['marginAmt']);
		if(empty($priceMarginAmt)){
		    $priceMarginAmt = 0;
		}
		$partnerMarkup = base64_decode($_GET['partnerMarkup']);
		$calculatedprices = $_GET['prices'];
		//$queryName = base64_decode($_GET['queryName']);
		$empname = base64_decode($_GET['empname']);
		$partnerLogo = base64_decode($_GET['partnerLogo']);
		//$queryId = base64_decode($_GET['queryId']);
		$taxesIncl = base64_decode($_GET['taxesIncl']);
		
		if($calculatedprices != '')
		{
			$calculatedprices = base64_decode($calculatedprices);
			$totrooms = count(array($calculatedprices));
			$priceArr = json_decode($calculatedprices);
			//print_r($priceArr);
			$pArr = array();
			foreach($priceArr as $val)
			{
			    if(empty($priceMarginAmt)){
			        if(empty($partnerMarkup)){
			          
			        $pArr[] = $val + round($val*$priceMargin/100);
			        
			        }else{
			            
			        $roompricewithmarkup = $val + round($val*$partnerMarkup/100) + round($val*$partnerMarkup/100*18/100);     
			        $pArr[] = $roompricewithmarkup + round($roompricewithmarkup*$priceMargin/100);
			        
			        }
			    }
			    else{
			        if(empty($priceMargin)){
			           if(empty($partnerMarkup)){
			               
			           $pArr[] = $val + round($priceMarginAmt/$totrooms);
			        
			           }else{
			           $roompricewithmarkup = $val + round($val*$partnerMarkup/100) + round($val*$partnerMarkup/100*18/100);
			           $pArr[] = $roompricewithmarkup + round($priceMarginAmt/$totrooms);
			           }
			        }
			    }
				//echo '<br>'.$val;
			}
			//$priceArr->[0];
			$subTotal = array_sum($pArr);
// 			$serviceTax = $subTotal*5/100;
// 			$grandTot = $subTotal+$serviceTax;
			
			$selRoomsdata=$_GET['selRooms'];
			$selMPdata=$_GET['selMealPlans'];
			$selRoomsArr = explode(',', rtrim(base64_decode($selRoomsdata), ','));
			//$selectedRooms =  array_column($selRoomsArr)

			$selMealPlansArr = explode(',', rtrim(base64_decode($selMPdata), ','));
			//print_r($selMealPlansArr);
		}
		$type=$_GET['type'];
		$editHotelId=$_GET['id'];
		$searchData=$_GET['searchData'];
		//$queryNumber = base64_decode($_GET['qNo']);
		
		$searchDataStr = base64_decode($searchData);
		
		//Array ( [searchrooms] => 2 [queryType] => Hotel [destination] => New Delhi [startdate] => 07/28/2016 [enddate] => 07/29/2016 [stayDuration] => 1 [adults] => Array ( [0] => 1 [1] => 2 ) [child] => Array ( [0] => 1 [1] => 2 ) [child_age] => Array ( [0] => 5 [1] => 5,9 ) [] => )

		$searchDataArr = explode('S$S',$searchDataStr);
		$paramArr = array();
		foreach($searchDataArr as $data)
		{
			$dataArr = explode('=',$data);
			$val = isset($dataArr[1]) ? $dataArr[1] : null;
			if (strpos($val, '#') !== false)
			{
				$val = explode('#', $val);	
			}
			$paramArr[$dataArr[0]] = $val;
		}
		
		$sDate = explode('/',$paramArr['startdate']);
		$startdate = $sDate[2].'-'.$sDate[1].'-'.$sDate[0];
		
		$eDate = explode('/',$paramArr['enddate']);
		$enddate = $eDate[2].'-'.$eDate[1].'-'.$eDate[0];
		
		$searchrooms=$paramArr['searchrooms'];
		//$destination=$paramArr['destination'];
		
		$stayDuration=$paramArr['stayDuration'];
		$adults=$paramArr['adults'];
		$infants = $paramArr['infants'];
		$child=$paramArr['child'];
		$child_age=$paramArr['child_age'];
		
		$hotelData = $CI->hotel_model->getHotelDetailforSearchById($editHotelId);
		$hotelName=$hotelData->hotel_name;
		$hotelstar_rating=$hotelData->hotel_star;
		
		$hotAddress = $hotelData->address_line_1.' '.$hotelData->address_line_2.' '.$hotelData->city_name.', '.$hotelData->state_name.' '.$hotelData->country_name.', '.$hotelData->zip;
		//print_r($stateArr);
		
		$date_rates_detail=$CI->admin_model->getDateRatesByid_calculate($editHotelId, $startdate, $enddate);
		
		$selMealPlansVal = base64_decode($_GET['selMealPlansVal']);
		$mealDescription = explode(',', rtrim($selMealPlansVal, ','));
		$seLectedMealdescr = $CI->hotel_model->getSelmealDescriptionByid($startdate, $enddate, $editHotelId, implode(',', $mealDescription));

		$arrRoomType=$CI->admin_model->getHotelRoomTypeByid($editHotelId);
		//print_r($arrRoomType);
		
		$arrMasterRooms=$CI->hotel_model->getAllHotelRoom();
		$masterRooms = array();
		foreach($arrMasterRooms as $mrooms)
		{
			$masterRooms[$mrooms->id] = $mrooms->room_name;
		}
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
            @page { 
                margin: 1cm 1cm 1cm 1cm;
                /*padding:0px;*/
            }
            
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
        <section class="content-header">
		  
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
			<div class="col-md-12">
			<div class="box box-default">
			
				<div class="box-body">
					<?php 
						if($type == 'pdf')
						{
					?>
					<div class="row">
						<div class="col-md-12">
						    <?php if(!empty($partnerLogo)) {?>
						    <img src="<?php echo $path; ?>/uploads/partner_logo/<?php echo $partnerLogo; ?>" style="width:150px; padding-top:0px;" />
						    <?php }else {?>
							<img src="<?php echo $path; ?>/hotelhomepage/images/logo-1.png" style="width:150px; padding-top:0px;" />
							<?php }?>
						</div>
					</div>
					<?php 
						}
					?>
					<!--<hr style="margin-top: 10px; height:3px;border:none;color:#ddd8c2;background-color:#ddd8c2;">-->
					<div id="searchData" style="padding:0;">
						<div style="<?php //echo $border;?>padding: 5px;border-radius: 5px;float: left;width: 100%; margin-bottom:0px;">
							
							<div class="col-md-12">
							    
								<!--<h3>Details</h3>-->
								<div class="hotelDetail table-responsive">
									<table class="table table-bordered" cellspacing="0">
										<tr>
										    <td style="width:;">
										        <?php
	                                              if($hotelData->hotel_photos != '') {
	 	                                             $photo = json_decode($hotelData->hotel_photos);
	 	                                             $showphoto = $photo[0];
	                                              } 
	                                            ?>
	                                            <img src="<?php echo $path; ?>/uploads/hotel_photos/<?php echo $showphoto; ?>" class="img-responsive" style="width:400px; height:250px padding: 2px;">
										    </td>
											<td style="width:300px; padding:0px 0px 0px 10px;">
											    
											     <span style="font-family: 'Open Sans', 'Droid Sans', Tahoma, Arial, sans-serif; font-weight:bold; color:#455a64;"><i class='fa fa-home' aria-hidden='true' style="font-size:22px;"></i><?php echo " ".$hotelData->hotel_name;?>
											    <?php for($i=0; $i<$hotelData->hotel_star; $i++){ echo "<i class='fa fa-star' aria-hidden='true'></i>";}?></span><br>
											    <span style="font-family: 'Open Sans', 'Droid Sans', Tahoma, Arial, sans-serif; font-weight:lighter; color:#455a64; font-size:12px;"><?php echo $hotelData->address_line_1.', '.$hotelData->address_line_2.'<br>'.$hotelData->city_name.', '.$hotelData->state_name.', '.$hotelData->country_name;?></span><br><br>
								                <span style="font-family: 'Open Sans', 'Droid Sans', Tahoma, Arial, sans-serif; font-weight:lighter; color:#455a64; font-size:12px;"><i class='fa fa-calendar' aria-hidden='true' style="font-size:18px; color:#455a64;"></i>
								                    <?php echo " From ".date('d, F Y',strtotime($startdate))." to ".date('d, F Y',strtotime($enddate));?>
								                </span><br><br>
								                <span style="font-family: 'Open Sans', 'Droid Sans', Tahoma, Arial, sans-serif; font-weight:lighter; color:#455a64; font-size:12px;"><i class="fa fa-moon-o" aria-hidden="true" style="font-size:18px; color:#455a64;"></i><?php echo " ".$stayDuration." Night(s), ".count(array($adults))." Room(s)";?></span><br><br>
								                <span style="font-family: 'Open Sans', 'Droid Sans', Tahoma, Arial, sans-serif; font-weight:lighter; color:#455a64; font-size:12px;"><i class='fa fa-users' aria-hidden='true' style="font-size: 18px; color:#455a64;"></i>
								                    <?php
													if(is_array($adults))
													{
														echo array_sum($adults)." Adult(s)";?>
														
												<?php }
													else
													{
														echo $adults." Adult(s)"; ?>
														
												<?php }
												?>  
												<?php 
												    if(!empty($child))
												    {
													if(is_array($child))
													{
														echo array_sum($child)." Kid(s)"; ?>
														
												<?php	}
													else
													{
														echo ", ".$child." Kid(s)"; ?>
														
												<?php	}	
												 } ?>
												 <?php
												if(is_array($infants))
													{
													    if(!empty($infants)){
														echo ", ".array_sum($infants)." Infant(s)";
													    }?>
													
												<?php }
													else
													{
													    if(!empty($infants)){
														echo ", ".$infants." Infant(s)"; 
														}?>
														
												<?php	}
												?>
								                </span><br><br>
								                
								                <span style="font-family: 'Open Sans', 'Droid Sans', Tahoma, Arial, sans-serif; color:#455a64;"><b>Rules & Policies</b></span><br>
									            <span style="font-family: 'Open Sans', 'Droid Sans', Tahoma, Arial, sans-serif; font-size:12px; font-weight:lighter; color:#455a64;"><?php echo "CHECK IN: ".$hotelData->check_in."&nbsp;CHECK OUT:".$hotelData->check_out;?></span>
									            
											</td>
											
										</tr>
										
										
									</table>
								</div>
								<div style="">
								    <h3 style="font-family: 'Open Sans', 'Droid Sans', Tahoma, Arial, sans-serif; color:#455a64;"><b>Description:</b></h3>
								    <p style="font-family: 'Open Sans', 'Droid Sans', Tahoma, Arial, sans-serif; font-size:12px;text-align: justify; color:#455a64;">
								        <?php echo $hotelData->hotel_description; ?>
								    </p>
								</div>
							
								<div class="col-md-12" style="padding:0;">
								
								<h3 style="font-family: 'Open Sans', 'Droid Sans', Tahoma, Arial, sans-serif; color:#455a64;">Costing </h3>
								<div class="table-responsive">	
								<table class="table table-bordered" cellspacing="0" width="100%" style="page-break-inside: avoid;">
									<tr style="font-size:12px;">
										<th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;padding: 8px; font-family: 'Open Sans', 'Droid Sans', Tahoma, Arial, sans-serif;">Room</th>
										<th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;padding: 8px; font-family: 'Open Sans', 'Droid Sans', Tahoma, Arial, sans-serif;">Adult(s)</th>
										<th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;padding: 8px; font-family: 'Open Sans', 'Droid Sans', Tahoma, Arial, sans-serif;">Infant(s)</th>
										<th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;padding: 8px; font-family: 'Open Sans', 'Droid Sans', Tahoma, Arial, sans-serif;">Kid(s)</th>
										<th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;padding: 8px; font-family: 'Open Sans', 'Droid Sans', Tahoma, Arial, sans-serif;">Kid(s) Age</th>
										<th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;padding: 8px; font-family: 'Open Sans', 'Droid Sans', Tahoma, Arial, sans-serif;">Room Type</th>
										<th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;padding: 8px; font-family: 'Open Sans', 'Droid Sans', Tahoma, Arial, sans-serif;">Meal Plan</th>
										<th style="background:#4F80BD; color:#FFF;border: 1px solid #f4f4f4;padding: 8px; font-family: 'Open Sans', 'Droid Sans', Tahoma, Arial, sans-serif;">Price</th></tr>
									<?php
										//print_r($paramArr);
										//echo count($adults);
										if(!is_array($adults))
										{
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
											
										?>
										<tr style="font-size:12px;">
											<td style="border: 1px solid #f4f4f4;padding: 8px; font-family: 'Open Sans', 'Droid Sans', Tahoma, Arial, sans-serif; color:#455a64;"><?php echo $i+1; ?></td>
											<td style="border: 1px solid #f4f4f4;padding: 8px; font-family: 'Open Sans', 'Droid Sans', Tahoma, Arial, sans-serif; color:#455a64;"><span><i class="fa fa-male" aria-hidden="true"></i></span> <?php echo $adultP; ?></td>
											<td style="border: 1px solid #f4f4f4;padding: 8px; font-family: 'Open Sans', 'Droid Sans', Tahoma, Arial, sans-serif; color:#455a64;"><span><img src="<?php echo $path; ?>/assets/img/baby.png" style="width:12px;"></span> <?php echo $infantsp; ?></td>
											<td style="border: 1px solid #f4f4f4;padding: 8px; font-family: 'Open Sans', 'Droid Sans', Tahoma, Arial, sans-serif; color:#455a64;"><span><i class="fa fa-child" aria-hidden="true"></i></span> <?php echo $childp; ?></td>
											<td style="border: 1px solid #f4f4f4;padding: 8px; font-family: 'Open Sans', 'Droid Sans', Tahoma, Arial, sans-serif; color:#455a64;">
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
											<td style="border: 1px solid #f4f4f4;padding: 8px; font-family: 'Open Sans', 'Droid Sans', Tahoma, Arial, sans-serif; color:#455a64;">
												<?php
													if($calculatedprices != '')
													{
													  foreach($arrRoomType as $roomTypes){
												   
													   if($selRoomsArr[$i] == $roomTypes['room_id'])
													   { 
													       echo $roomTypes['room_type'];   
													   }
													  }
													
													}
													else
													{
												?>
												<!--<select class="form-control userRoomTypes" id="class<?php //echo $i+1; ?>">-->
													<?php echo $roomTypeStr; ?>
												<!--</select>-->
												<?php
													}
												?>
											</td>
											<td style="border: 1px solid #f4f4f4;padding: 8px; font-family: 'Open Sans', 'Droid Sans', Tahoma, Arial, sans-serif; color:#455a64;">
												<?php
													if($calculatedprices != '')
													{
														echo $selMealPlansArr[$i];
													}
													else
													{
												?>
												<!--<select class="form-control mealTypes" id="class<?php //echo $i+1; ?>">-->
													<?php //echo $mealStr; ?>
													
												<!--</select>-->
												<?php
													}
												?>
												
											</td>
											<td style="border: 1px solid #f4f4f4;padding: 8px; font-family: 'Open Sans', 'Droid Sans', Tahoma, Arial, sans-serif; color:#455a64;">
											    <span><i class="fa fa-inr" aria-hidden="true"></i></span>
											    <!--<img src="<?php //echo $path ?>/asset/images/rupee.png"><span id="roomPrice_<?php //echo $i+1; ?>">-->
											        <?php echo $pArr[$i]; ?>
											    <!--</span>-->
											</td>
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
											<tr style="font-size:12px;">
											<td style="border: 1px solid #f4f4f4;padding: 8px; font-family: 'Open Sans', 'Droid Sans', Tahoma, Arial, sans-serif; color:#455a64;"><?php echo $i+1; ?></td>
											<td style="border: 1px solid #f4f4f4;padding: 8px; font-family: 'Open Sans', 'Droid Sans', Tahoma, Arial, sans-serif; color:#455a64;"><span><i class="fa fa-male" aria-hidden="true"></i></span> <?php echo $adultP; ?></td>
											<td style="border: 1px solid #f4f4f4;padding: 8px; font-family: 'Open Sans', 'Droid Sans', Tahoma, Arial, sans-serif; color:#455a64;"><span><img rel="icon" src="<?php echo $path; ?>/assets/img/baby.png" style="width:12px;"></span> <?php echo $infantsp; ?></td>
											<td style="border: 1px solid #f4f4f4;padding: 8px; font-family: 'Open Sans', 'Droid Sans', Tahoma, Arial, sans-serif; color:#455a64;"><span><i class="fa fa-child" aria-hidden="true"></i></span> <?php echo $childp; ?></td>
											<td style="border: 1px solid #f4f4f4;padding: 8px; font-family: 'Open Sans', 'Droid Sans', Tahoma, Arial, sans-serif; color:#455a64;">
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
											<td style="border: 1px solid #f4f4f4;padding: 8px; font-family: 'Open Sans', 'Droid Sans', Tahoma, Arial, sans-serif; color:#455a64;">
												<?php
													if($calculatedprices != '')
													{
													  foreach($arrRoomType as $roomTypes){
												   
													   if($selRoomsArr[$i] == $roomTypes['room_id'])
													   { 
													       echo $roomTypes['room_type'];   
													   }
													  }
													}
													else
													{
												?>
												<!--<select class="form-control userRoomTypes" id="class<?php //echo $i+1; ?>">-->
													<?php //echo $roomTypeStr; ?>
												<!--</select>-->
												<?php
													}
												?>
											</td>
											<td style="border: 1px solid #f4f4f4;padding: 8px; font-family: 'Open Sans', 'Droid Sans', Tahoma, Arial, sans-serif; color:#455a64;">
												<?php
													if($calculatedprices != '')
													{
														echo $selMealPlansArr[$i];
													}
													else
													{
												?>
												<!--<select class="form-control mealTypes" id="class<?php //echo $i+1; ?>">-->
												<!--	<?php //echo $mealStr; ?>-->
													
												<!--</select>-->
												<?php
													}
												?>
												
											</td>
											<td style="border: 1px solid #f4f4f4;padding: 8px; font-family: 'Open Sans', 'Droid Sans', Tahoma, Arial, sans-serif; color:#455a64;">
											    <span><i class="fa fa-inr" aria-hidden="true"></i></span>
											    
											        <?php echo $pArr[$i]; ?>
											    
											</td>
										</tr>
											<?php
										   }
										    
										}
									?>
									<tr>
										<td colspan="7" style="text-align:center;border: 1px solid #f4f4f4;padding: 8px; font-family: 'Open Sans', 'Droid Sans', Tahoma, Arial, sans-serif; color:#455a64;">Total<div><span id="" style="font-size:12px; margin-left: 85%; font-family: 'Open Sans', 'Droid Sans', Tahoma, Arial, sans-serif; color:#455a64;"><?php if($taxesIncl == 1){echo "*GST Included";}else{echo "GST Excluded";}?></span></div></td>
										<td style="border: 1px solid #f4f4f4;padding: 8px; color:#455a64;">
										    <span><i class="fa fa-inr" aria-hidden="true"></i></span>
										    <!--<img src="<?php //echo $path ?>/asset/images/rupee.png"><span id="totalHotelPrice">-->
										        <?php echo round($subTotal); ?>
										    <!--</span>-->
										</td>
									</tr>
									
							</table>
							</div>
							<!-- <div style="clear:both"></div> -->
							<div style="">
							<h3 style="font-family: 'Open Sans', 'Droid Sans', Tahoma, Arial, sans-serif; color:#455a64;">Inclusions:</h3>
							<ul style="font-family: 'Open Sans', 'Droid Sans', Tahoma, Arial, sans-serif; color:#455a64; font-size:12px">
								<li>Welcome drinks on Arrival at hotel/resort. (Non alcoholic)</li>
								<li>Accommodation as per above details.</li>
								<li>Meals as above mentioned Meal Plan.</li>
								<li>All kind of applicable hotel, transport, service &amp; govt. taxes.</li>
								<?php
								foreach($seLectedMealdescr as $descr){ 
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
							
							
							<h3 style="font-family: 'Open Sans', 'Droid Sans', Tahoma, Arial, sans-serif; color:#455a64;">Exclusions:</h3>	
							<ul style="font-family: 'Open Sans', 'Droid Sans', Tahoma, Arial, sans-serif; color:#455a64; font-size:12px">
								<li>Tips to the guide / driver / restaurants / airport / hotels etc.</li>
								<li>Any expenses of personal nature such as, drinks, laundry, telephone calls, insurance, camera fees, excess baggage, emergency/medical cost etc.</li>
								<li>Any expenses/services not mentioned or not covered under above inclusions header are extras and to be paid off by guest directly.</li>
							</ul>
							<h3 style="font-family: 'Open Sans', 'Droid Sans', Tahoma, Arial, sans-serif; color:#455a64;">Note:</h3>
							<ul style="font-family: 'Open Sans', 'Droid Sans', Tahoma, Arial, sans-serif; color:#455a64; font-size:12px">
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
							<?php
							$spcl_Remark = base64_decode($_GET['spcl_Remark']);
							if(!empty($spcl_Remark)) { 
							    $list = explode("\n", $spcl_Remark); ?> 
							    <h3 id="OtherRemarks" style="font-family: 'Open Sans', 'Droid Sans', Tahoma, Arial, sans-serif; color:#455a64;">Special Remarks:</h3>
							    <!--<div id="">-->
							        <ul style="font-family: 'Open Sans', 'Droid Sans', Tahoma, Arial, sans-serif; color:#455a64; font-size:12px">
							            <?php
                                        foreach($list as $num => $item) {?>
                                        <li>
                                        <?php
                                        echo htmlspecialchars($item)."</li>"; ?>
                                        
                                        <?php
                                        }?>
                                        
							        </ul>
							    <!--</div>-->
							<?php }
							?>
							</div>
							
							</div>
							
						</div>
					</div>
					<div style="clear:both;"></div>
				</div>
				<?php 
					if($type == 'pdf')
					{
					    $emp_email = base64_decode($_GET['emp_email']);
		                $emp_mobile = base64_decode($_GET['emp_mobile']);
		            ?>
		                <div class="row" style="">
        
                            <div class="col-md-12">
         	    
                              <p style="font-family: 'Open Sans', 'Droid Sans', Tahoma, Arial, sans-serif; color:#455a64; font-size:12px"><b>Thanks & Regards:</b><br><?php echo $empname."<br>".$emp_email."<br>".$emp_mobile;?></p>
             
                            </div>
                        </div>
				<?php
					}
				?>
			</div>
			
			</div>
		</div>
    </div><!-- /.row -->
</section><!-- /.content -->
</div><!-- /.content-wrapper -->
</body>
</html>