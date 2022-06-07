<div id="hotel_<?php echo $hotelId; ?>" class="hotelBox hotelrating_<?php echo $star_rating; ?>" style="border: 1px solid #DDD;padding: 10px;border-radius: 5px;float: left;width: 100%; margin-bottom:10px;">

	<div class="col-md-4" style="padding: 0;">

	<?php
	if ($hotel_detail['image'] != '') {
	 	$photo = json_decode($hotel_detail['image']);
	 	$showphoto = $photo[0];
	 } 
	?>

		<img src="<?php echo $base_url.'uploads/hotel_photos/'.$showphoto; ?>" class="img-responsive" style="width:100%;padding: 2px;height: 130px;">

	</div>

	<div class="col-md-8">

		<h4><b style="color:#3C8DBC;"><?php echo $hotel_detail['hotel_name'];?> <span style="color:#F7C541;margin-left: 10px;font-size: 15px;">

		<?php 

			for($i=0; $i<$star_rating; $i++)

			{	

		?>	

		<i class="fa fa-star" aria-hidden="true"></i>

		<?php } ?>

		</span></b></h4>

		<p><b><i>Hotel Address :</i></b> <?php echo ucfirst($hotel_detail['address_1']).', '.ucfirst($hotel_detail['address_2']).', '.ucfirst($hotel_detail['city']).', '.ucfirst($hotel_detail['state']).', '.ucfirst($hotel_detail['country']);?></p>

		<a href="<?php echo base_url(ADMIN_URL).'/viewHotelDetails/'.$hotel_detail['hotel_id'].'/'.base64_encode($dataStr) ?>" target="_blank" class="btn btn-success">View Details</a>

	</div>

	

</div>