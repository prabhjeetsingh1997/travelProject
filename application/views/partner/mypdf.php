<?php
//============================================================+
// File name   : example_001.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 001 for TCPDF class
//               Default Header and Footer
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Default Header and Footer
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).
//require_once('tcpdf_include.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('TCPDF Example 001');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
//$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.'', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
//$pdf->setFooterData(array(0,64,0), array(0,64,128));

// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if(@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
$pdf->SetFont('dejavusans', '', 14, '', true);

// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();

// set text shadow effect
$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));

// Set some content to print

$html = '<img src="'.$logoPath.'" alt="logo" style="width:135px;"><h1 align="center" style="color:#3898bd;"><span style="background-color:yellow;">HOTEL VOUCHER</span></h1><table cellspacing="0" cellpadding="6" nobr="true" style="border:1px solid lightgrey;">';
if(!empty($query)){
	foreach($query as $row){
	    $html .= '<tr>
		<td rowspan="6" style="border-bottom:1px solid lightgrey; border-right:1px solid lightgrey; width:230px; font-weight:normal; font-size:13px;"><span style="font-weight:bold; font-size:18px; color:#8fa6dc;"><br>'.$row->hotelname.'</span><br>'.$row->address_line_1.','.$row->address_line_2.'<br>'.$row->state_name.','.$row->city_name.'<br>'.$row->country_name.'<br><br><span style="color:red;">Ph:</span>'.$row->hotel_mobile_no.'</td>
		<td style="border-bottom:1px solid lightgrey; border-right:1px solid lightgrey; width:160px; font-weight:normal; font-size:13px;">Lead Pax Name</td>
		<td style="border-bottom:1px solid lightgrey; width:240px; font-weight:normal; font-size:13px; color:#8fa6dc;">'.$row->pax_name.'</td>
		</tr>';
		
		$html .= '<tr>
        <td style="border-bottom:1px solid lightgrey; border-right:1px solid lightgrey; font-weight:normal; font-size:13px;">Check-In Date</td>
		<td style="border-bottom:1px solid lightgrey; font-weight:normal; font-size:13px;">'.$row->check_in.'</td>
		</tr>';
		
		$html .= '<tr>
        <td style="border-bottom:1px solid lightgrey; border-right:1px solid lightgrey; font-weight:normal; font-size:13px;">Check-Out Date</td>
		<td style="border-bottom:1px solid lightgrey; font-weight:normal; font-size:13px;">'.$row->check_out.'</td>
		</tr>';
		
		$html .= '<tr>
        <td style="border-bottom:1px solid lightgrey; border-right:1px solid lightgrey; font-weight:normal; font-size:13px;">No. Of Pax</td>
		<td style="border-bottom:1px solid lightgrey; font-weight:normal; font-size:13px;">'.$row->total_pax.'</td>
		</tr>';
		
		$html .= '<tr>
        <td style="border-bottom:1px solid lightgrey; border-right:1px solid lightgrey; font-weight:normal; font-size:13px;">Confirmation No.</td>
		<td style="border-bottom:1px solid lightgrey; font-weight:normal; font-size:13px; color:red;">'.$row->confirmation_no.'</td>
		</tr>';
		
		$html .= '<tr>
        <td style="border-bottom:1px solid lightgrey; border-right:1px solid lightgrey; font-weight:normal; font-size:13px;">Voucher No.</td>
		<td style="border-bottom:1px solid lightgrey; font-weight:normal; font-size:13px;">LID'.$row->id.'</td>
		</tr>';
		
	}
	
}

$html .='</table><table cellspacing="0" cellpadding="6" nobr="true" style="border:1px solid lightgrey;">';

foreach($query as $row){
    
    $html .= '<tr>
	<td colspan="3" style="border-bottom:1px solid lightgrey; font-weight:normal; font-size:13px; color:white; background-color:#8fa6dc; text-align:center;">ROOM DESCRIPTION & INCLUSIONS</td>
	</tr>';
		
    $html .= '<tr>
	<td colspan="3" style="border-bottom:1px solid lightgrey; font-weight:normal; font-size:12px;">'.$row->rooms.'</td>
	</tr>';
		
    $html .= '<tr>
	<td colspan="3" style="border-bottom:1px solid lightgrey; font-weight:normal; font-size:12px;">
	'.$nwhtlIncl.$row->other_hotelinclusion.'</td>
	</tr>';
}
$html .='</table><table cellspacing="0" cellpadding="6" nobr="true" style="border:1px solid lightgrey; margin-top:20px;">';

foreach($query as $row){

    $html .= '<tr>
	<td style="border-bottom:1px solid lightgrey; border-right:1px solid lightgrey; font-weight:normal; font-size:12px; color:white; background-color:#8fa6dc; text-align:center; line-height:100px;">Payment Remarks</td>
	<td colspan="2" style="border-bottom:1px solid lightgrey; font-weight:normal; font-size:12px;">
	'.$nwhtlPymtRmrk.'<br>'.$row->otherpayemnt_remark.'
	</td>
	</tr>';
		
	$html .= '<tr>
	<td style="border-bottom:1px solid lightgrey; border-right:1px solid lightgrey; font-weight:normal; font-size:12px; color:white; background-color:#8fa6dc; text-align:center; line-height:100px;">Special Service Request</td>
	<td colspan="2" style="font-weight:normal; font-size:12px;">'.$htlspclrmrkArr.'<br>'.$row->other_remark.'</td>
	</tr>';
}
$html .='</table>';

$html .='<p style="font-size:12px;">If you face any inconvenience with the above service, please call at +91 9990444740 or Email to: travel@lightsindark.in</p>';

$html .='<p style="font-size:13px; font-weight:bold;">Booking Terms & Conditions:</p>';

$html .='<ul style="font-size:12px; font-weight:normal;">
<li>All passengers are advised to carry a valid Photo ID proof. (PAN Card is not valid)</li>
<li>Hotel may ask for credit card or cash deposit for the extra services at the time of check in. (which is refundable if not applicable)</li>
<li>Standard Check-in time is 14:00 Hrs. & Check-out time is 12:00 Hrs. and may vary hotel to hotel. For Hotel Policy, Amenities, Room Specifications, Child Policy, etc. kindly refer to hotel website directly or ask your Tour Operator.</li>
<li>All extra charges other than above Inclusions should be paid directly from the passengers to hotel such as parking, phone calls, room service, city tax, mini bar, laundry, etc.</li>
<li>We dont accept any responsibility for additional expenses due to the changes or delays in air, road, rail, sea or indeed of any other causes, all such expenses will have to be borne by passengers.</li>
<li>Any special service request for bed type, early check in, late check out, smoking rooms, etc are not guaranteed and subject to availability at the time of check in.</li>
<li>No Show or Early check out will attract full cancellation charges unless otherwise specified.</li>
<li>City Tax, Green Tax or Hotel/Resort Fee are to be paid directly at hotel if applicable.</li>
</ul>';


// Print text using writeHTMLCell()
ob_get_clean();

//$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

$pdf->writeHTML($html, true, false, true, false, '');

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('example_001.pdf', 'I');
exit;