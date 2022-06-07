<table class="table table-bordered" class="col-md-12">
	<thead>
	  <tr>
		<th class="col-md-1">Day</th>
		<th class="col-md-2">City</th>
		<th class="col-md-1"></th>
		<th class="col-md-1"></th>
		<th class="col-md-1"></th>
		<th class="col-md-1"></th>
		<th class="col-md-1"></th>
		<th class="col-md-1"></th>
		<th class="col-md-1"></th>
		<th class="col-md-1"></th>
		<th class="col-md-1"></th>
		<!-- <th class="col-md-1">Vehicle 1</th>
		<th class="col-md-1">Price</th>
		<th class="col-md-1">Vendor 1</th>
		<th class="col-md-1">Vehicle 2</th>
		<th class="col-md-1">Price</th>
		<th class="col-md-1">Vendor 2</th>
		<th class="col-md-1">Vehicle 3</th>
		<th class="col-md-1">Price</th>
		<th class="col-md-1">Vendor 3</th> -->
		
	  </tr>
	</thead>
	<tbody>
<?php
for($i=1; $i<=$num; $i++)
{
?>		
  <tr>
	<td><?php echo $i; ?></td>
	<td>
		<select id="tblCity_<?php echo $i; ?>" name="tblCity_<?php echo $i; ?>" class="form-control durationDrop"><?php echo $cities; ?></select>
	</td>
	<!-- <td>
		<select id="tblVehicle_<?php //echo $i; ?>" name="tblVehicle_1_<?php //echo $i; ?>" class="form-control durationDrop"><?php //echo $vehicles; ?></select>
	</td>
	<td>
		<input type="text" id="tblPrice_<?php //echo $i; ?>" name="tblPrice_1_<?php //echo $i; ?>" value="0" class="form-control durationDrop">
	</td>
	<td>
		<select id="tblVendor_<?php //echo $i; ?>" name="tblVendor_1_<?php //echo $i; ?>" class="form-control durationDrop"><?php //echo $vendors; ?></select>
	</td>
	<td>
		<select id="tblVehicle_<?php //echo $i; ?>" name="tblVehicle_2_<?php //echo $i; ?>" class="form-control durationDrop"><?php //echo $vehicles; ?></select>
	</td>
	<td>
		<input type="text" id="tblPrice_<?php //echo $i; ?>" name="tblPrice_2_<?php //echo $i; ?>" value="0" class="form-control durationDrop">
	</td>
	<td>
		<select id="tblVendor_<?php //echo $i; ?>" name="tblVendor_2_<?php //echo $i; ?>" class="form-control durationDrop"><?php //echo $vendors; ?></select>
	</td>
	<td>
		<select id="tblVehicle_<?php //echo $i; ?>" name="tblVehicle_3_<?php //echo $i; ?>" class="form-control durationDrop"><?php //echo $vehicles; ?></select>
	</td>
	<td>
		<input type="text" id="tblPrice_<?php //echo $i; ?>" name="tblPrice_3_<?php //echo $i; ?>" value="0" class="form-control durationDrop">
	</td>
	<td>
		<select id="tblVendor_<?php //echo $i; ?>" name="tblVendor_3_<?php //echo $i; ?>" class="form-control durationDrop"><?php //echo $vendors; ?></select>
	</td> -->
  </tr>
<?php	
}
?>
	</tbody>
</table>