<?php 
$path = getcwd();
?>
<style>
    /*@page { */
    /*    margin: 1cm 1cm 1cm 1cm;*/
    /*}*/
</style>
<table>
    <tr>
        <td style="width:200px;"><img src="<?php echo $path."/uploads/partner_logo/".$this->global['logo']; ?>" alt="logo" style="width:135px;"></td>
        <td style="width:400px;"><h1 align="center" style="color:white; font-family:Helvetica; background-color:#174583; font-size:24px; padding:5px;">HOTEL VOUCHER</h1></td>
    </tr>
</table>

<table cellspacing="0" cellpadding="6" style="border:1px solid lightgrey; width:100%; font-family:Helvetica;">
    <?php foreach($query as $row){ ?>
    <tr>
		<td rowspan="6" style="border-bottom:1px solid lightgrey; border-right:1px solid lightgrey; width:230px; font-weight:normal; font-size:14px;"><span style="font-weight:bold; font-size:18px; color:#174583;"><br><?php echo $row->hotelname ?></span><br><?php echo $row->address_line_1.', '.$row->address_line_2 ?><br><?php echo $row->state_name.', '.$row->city_name ?><br><?php echo $row->country_name ?><br><br><span style="color:#f26522;">Ph:</span><?php echo $row->hotel_mobile_no ?></td>
		<td style="border-bottom:1px solid lightgrey; border-right:1px solid lightgrey; width:160px; font-weight:normal; font-size:14px;">Lead Pax Name</td>
		<td style="border-bottom:1px solid lightgrey; width:240px; font-weight:bold; font-size:15px; color:#174583;"><?php echo $row->pax_name ?></td>
	</tr>
	
	<tr>
        <td style="border-bottom:1px solid lightgrey; border-right:1px solid lightgrey; font-weight:normal; font-size:14px;">Check-In Date</td>
		<td style="border-bottom:1px solid lightgrey; font-weight:normal; font-size:14px;"><?php $chkindate = str_replace('/', '-', $row->check_in); echo date("F jS, Y",strtotime($chkindate)); ?></td>
	</tr>
	
	<tr>
        <td style="border-bottom:1px solid lightgrey; border-right:1px solid lightgrey; font-weight:normal; font-size:14px;">Check-Out Date</td>
		<td style="border-bottom:1px solid lightgrey; font-weight:normal; font-size:14px;"><?php $chkoutdate = str_replace('/', '-', $row->check_out); echo date("F jS, Y",strtotime($chkoutdate)); ?></td>
	</tr>
		
    <tr>
        <td style="border-bottom:1px solid lightgrey; border-right:1px solid lightgrey; font-weight:normal; font-size:14px;">No. Of Pax</td>
		<td style="border-bottom:1px solid lightgrey; font-weight:normal; font-size:14px;"><?php echo $row->total_pax ?></td>
	</tr>
		
    <tr>
        <td style="border-bottom:1px solid lightgrey; border-right:1px solid lightgrey; font-weight:normal; font-size:14px;">Confirmation No.</td>
		<td style="border-bottom:1px solid lightgrey; font-weight:normal; font-size:14px; color:#f26522;"><?php echo $row->confirmation_no ?></td>
	</tr>
		
    <tr>
        <td style="border-bottom:1px solid lightgrey; border-right:1px solid lightgrey; font-weight:normal; font-size:13px;">Voucher No.</td>
		<td style="border-bottom:1px solid lightgrey; font-weight:normal; font-size:14px;"><?php echo "LID".$row->id ?></td>
	</tr>
	
	<?php }?>
</table>

<table cellspacing="0" cellpadding="6" style="border:1px solid lightgrey; width:100%; margin-top:20px; font-family:Helvetica;">
    <?php foreach($query as $row){ ?>
    <tr>
	    <td colspan="3" style="border-bottom:1px solid lightgrey; font-weight:normal; font-size:16px; color:white; background-color:#174583; text-align:center;">ROOM DESCRIPTION & INCLUSIONS</td>
	</tr>
    <tr>
	    <td colspan="3" style="border-bottom:1px solid lightgrey; font-weight:normal; font-size:14px;"><?php echo $row->rooms ?></td>
	</tr>
    <tr>
	    <td colspan="3" style="border-bottom:1px solid lightgrey; font-weight:normal; font-size:14px;">
	    <?php echo $nwhtlIncl ?></td>
	</tr>
    <?php }?>
</table>


<table cellspacing="0" cellpadding="6" style="border:1px solid lightgrey; width:100%; margin-top:20px; font-family:Helvetica;">
    <?php foreach($query as $row){ ?>
    <tr>
	    <td style="border-bottom:1px solid lightgrey; border-right:1px solid lightgrey; font-weight:normal; font-size:16px; color:white; background-color:#174583; text-align:center; line-height:40px;">Payment Remarks</td>
	    <td colspan="2" style="border-bottom:1px solid lightgrey; font-weight:normal; font-size:14px;">
	    <?php echo $nwhtlPymtRmrk ?>
	    </td>
	</tr>
    <tr>
	    <td style="border-bottom:1px solid lightgrey; border-right:1px solid lightgrey; font-weight:normal; font-size:16px; color:white; background-color:#174583; text-align:center; line-height:40px;">Special Service Request</td>
	    <td colspan="2" style="font-weight:normal; font-size:14px;"><p>Kindly Consider Following request as per requested by guest.</p><?php echo $htlspclrmrkArr ?></td>
	</tr>
    <?php }?>
</table>

<p style="font-size:14px; font-family:Helvetica;">If you face any inconvenience with the above service, please call at +91 9990444740 or Email to: travel@lightsindark.in</p>
<p style="font-size:16px; font-weight:bold; font-family:Helvetica;">Booking Terms & Conditions:</p>
<ul style="font-size:13px; font-weight:normal; font-family:Helvetica;">
<li>All passengers are advised to carry a valid Photo ID proof. (PAN Card is not valid)</li>
<li>Hotel may ask for credit card or cash deposit for the extra services at the time of check in. (which is refundable if not applicable)</li>
<li>Standard Check-in time is 14:00 Hrs. & Check-out time is 12:00 Hrs. and may vary hotel to hotel. For Hotel Policy, Amenities, Room Specifications, Child Policy, etc. kindly refer to hotel website directly or ask your Tour Operator.</li>
<li>All extra charges other than above Inclusions should be paid directly from the passengers to hotel such as parking, phone calls, room service, city tax, mini bar, laundry, etc.</li>
<li>We dont accept any responsibility for additional expenses due to the changes or delays in air, road, rail, sea or indeed of any other causes, all such expenses will have to be borne by passengers.</li>
<li>Any special service request for bed type, early check in, late check out, smoking rooms, etc are not guaranteed and subject to availability at the time of check in.</li>
<li>No Show or Early check out will attract full cancellation charges unless otherwise specified.</li>
<li>City Tax, Green Tax or Hotel/Resort Fee are to be paid directly at hotel if applicable.</li>
</ul>