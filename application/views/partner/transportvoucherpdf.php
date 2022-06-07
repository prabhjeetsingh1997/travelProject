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
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.'', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
$pdf->setFooterData(array(0,64,0), array(0,64,128));

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
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
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
$pdf->setJPEGQuality(75);

// set text shadow effect
$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));

// Set some content to print

$html = '<h1 align="center" style="color:#3898bd;"><span style="background-color:yellow;">TRANSPORT VOUCHER</span></h1><table border="1" cellspacing="" cellpadding="5" nobr="true">';
if(!empty($query)){
	foreach($query as $row){
		$html .= '<tr>
		
		<th colspan="2" style="font-weight:bold; font-size:13px;">Voucher No:<span style="font-weight:normal; font-size:13px;">LID'.$row->id.'</span><br>Date of Issue:<span style="font-weight:normal; font-size:13px;">'.date("d-m-Y", strtotime($row->date_of_issue)).'</span></th>
		</tr>';

// 		$html .= '<tr>
// 		<td colspan="2" style="font-weight:normal; font-size:13px;"><span style="font-weight:bold; font-size:18px; color:#3898bd;">'.$row->vendor_name.'</span><br>'.$row->com_address_line_1.','.$row->com_address_line_2.'<br>'.$row->state_name.','.$row->city_name.','.$row->country_name.'<br><span style="color:red;">Ph:</span>'.$row->com_contact_no.'</td>
// 		</tr>';
        $html .= '<tr>
		<td colspan="2" style="font-weight:normal; font-size:13px;"><span style="font-weight:bold; font-size:18px; color:#3898bd;">Lights in Dark Travel & Events Pvt. Ltd.</span><br>Plot No.2, 2nd Floor, Jwalaheri Market<br>Above Richlook, Paschim Vihar, New  Delhi-110063<br><span style="color:red;">Ph:</span>9990444740 | 9990444774</td>
		</tr>';

		$html .= '<tr>
		<td style="width:180px; font-weight:normal; font-size:13px;">ARRIVAL</td>
		<td style="width:451px; font-weight:normal; font-size:13px;">'.date("jS F, Y", strtotime($row->arrival_date)).'</td>
		</tr>';

		$html .= '<tr>
		<td style="font-weight:normal; font-size:13px;">DEPARTURE</td>
		<td style="font-weight:normal; font-size:13px;">'.date("jS F, Y", strtotime($row->departure_date)).'</td>
		</tr>';

		$html .= '<tr>
		<td style="font-weight:normal; font-size:13px;">VEHICLE</td>
		<td style="font-weight:normal; font-size:13px;">'.$row->vehicletype.'</td>
		</tr>';

		$html .= '<tr>
		<td style="font-weight:normal; font-size:13px;">LEAD PAX. NAME</td>
		<td style="font-weight:normal; font-size:13px; color:#3898bd;">'.$row->pax_name.'</td>
		</tr>';

		$html .= '<tr>
		<td style="font-weight:normal; font-size:13px;">CONFIRMATION REFRENCE</td>
		<td style="font-weight:normal; font-size:13px; color:red;">'.$row->confirmation_ref_no.'</td>
		</tr>';

		$html .= '<tr>
		<td style="font-weight:normal; font-size:13px;">NO. OF PAX.</td>
		<td style="font-weight:normal; font-size:13px;">'.$row->total_pax_no.'</td>
		</tr>';

		$html .= '<tr>
		<td style="font-weight:normal; font-size:13px;">PAYMENT REMARK</td>
		<td style="font-weight:normal; font-size:13px;">'.$row->payment_remarks.'</td>
		</tr>';

		$html .= '<tr>
		<td style="font-weight:normal; font-size:13px;">OTHER REMARK</td>
		<td style="font-weight:normal; font-size:13px;">'.$row->other_remarks.'</td>
		</tr>';

		$html .= '<tr>
		<td style="font-weight:normal; font-size:13px; line-height:60px;">INCLUSION</td>
		<td style="font-weight:normal; font-size:13px;">'.nl2br($row->other_inclusions).'</td>
		</tr>';

	}
	
}


$html .= '<tr>
<td colspan="2">
<p style="font-size:12px;"><b>Note</b>: Any refund, whether partially or fully unutilized, is subject to the fees stipulated in the Buyer
terms and conditions as well as any related term during the time of booking. Application must be
submitted within 2 weeks from date of cancellation and supported by a printed acknowledgement by
the above service provider.</p>
</td>
</tr>';

$html .='<tr>
<td colspan="2">
<p style="font-size:12px;">If you face any inconvenience with the above service, please call at 9990444740, 9990444774 or
Email to: travel@lightsindark.in</p>
</td>
</tr>';

$html .='<tr>
<td colspan="2">
<img src="tcpdf/examples/images/footer.jpg" width="50" height="50">
</td>
</tr>';
$html .='</table>';

// Print text using writeHTMLCell()
ob_get_clean();

$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
//$pdf->Image('images/footer.jpeg', '', '', 40, 40, '', '', '', false, 300, '', false, false, 1, false, false, false);

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('Transportvoucher_001.pdf', 'I');
exit;