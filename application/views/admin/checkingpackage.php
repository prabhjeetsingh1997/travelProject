<?php
$CI =& get_instance();
$CI->load->model('admin_model');
?>
<div>
    <p style="margin-top:100px;">
        <?php
// echo $itiTitle;
// echo $editItiId;
 //echo $totalAdults;
 //echo $searchDataStr;
 //echo $searchData2;
 //echo $searchData;
 echo $stayDuration;
    
			$cityArr = $CI->admin_model->getCitiesByIdforPackage($itiCity);
			$cities = '';
			foreach($cityArr as $cityData)
			{
				$cities .= $cityData['city_name'].', ';
			}
			echo rtrim($cities,', ');
			
 			// echo $stayDuration;
 			// echo $searchrooms;
 			// echo $adults;
 			// echo $child;
 			// echo $child_age;
			
									
										
?>
    </p>
</div>
