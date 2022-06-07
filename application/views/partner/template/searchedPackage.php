<?php
$CI =& get_instance();
$CI->load->model('admin_model');
?>
<div id="package_<?php echo $itenryId; ?>" class="hotelBox" style="border: 1px solid #DDD;padding: 10px;border-radius: 5px;float: left;width: 100%; margin-bottom:10px; background:white;">

				<div class="col-md-9">

					<h4><b style="color:#3C8DBC;"><?php echo $pakageData['title'];?></b></h4>

					<p>City: <?php 

						//echo $cityStr;

						$citiesArr = $CI->admin_model->getCitiesById($pakageData['city']);

						$cityName = '';

						foreach($citiesArr as $cityNames)

						{

							$cityName .= $cityNames['city_name'].', ';

						}

						echo rtrim($cityName,', ');

					?></p>

					<p><?php 

						//echo $cityStr

						echo $pakageData['duration_detail'];

					?></p>

					<?php  

					if(!empty($stayDuration)){

					?>

					<p>Stay Duration: <?php echo ($pakageData['duration']-1).' Nights '.$pakageData['duration'].' Days';?></p>

					<?php

					}

					?>

					<a href="<?php echo base_url(PARTNER).'/viewPackageDetails/'.$itenryId.'/'.base64_encode($dataStr); ?>" target="_blank" class="btn btn-success">View Package</a>

				</div>

			</div>