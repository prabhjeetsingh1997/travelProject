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

// set text shadow effect
$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));

// Set some content to print

$html = '<table border="1" cellspacing="0" cellpadding="6" nobr="true">';
if(!empty($query)){
	foreach($query as $row){
		$html .= '<tr>
		<th colspan="2" style="font-weight:bold; font-size:12px;">Performa Invoice:<span style="font-weight:normal; font-size:12px;">LID'.$row->performa_id.'</span><br>Date of Issue:</th>
        </tr>';
        
        $html .= '<tr style="background-color:grey;">
        <th style="font-weight:bold; font-size:12px; color:white;">TO</th>
        <th style="font-weight:bold; font-size:12px; color:white;">SUPPLIER</th>
        </tr>';

        $html .= '<tr>
        <td style="font-weight:normal; font-size:12px;">'.$row->clientorganization.'</td>
        <td style="font-weight:normal; font-size:12px;">Lights in Dark Travel & Events Pvt. Ltd.</td>
        </tr>';

        $html .= '<tr>
        <td style="font-weight:normal; font-size:12px;">'.$row->organizationaddress.''.$row->city_name.'-'.$row->zip.','.$row->state_name.','.$row->country_name.'</td>
        <td style="font-weight:normal; font-size:12px;">8/A, Pocket-2, Punjabi Bagh Club Road,<br>Paschim Puri, New Delhi-110063, India</td>
        </tr>';

        $html .= '<tr>
        <td style="font-weight:normal; font-size:12px;">GSTIN:'.$row->organizationgst.'</td>
        <td style="font-weight:normal; font-size:12px;">GSTIN: 07AACCL4198F1ZE</td>
        </tr>';

        $html .= '<tr>
        <td style="font-weight:normal; font-size:12px;">Place:'.$row->place.'</td>
        <td style="font-weight:normal; font-size:12px;">Place Of Supply: </td>
        </tr>';

        $html .= '<tr>
        <td style="font-weight:normal; font-size:12px;">Guest Name:'.$row->clientname.'</td>
        <td style="font-weight:normal; font-size:12px;">State:</td>
        </tr>';

        $html .= '<tr style="background-color:grey;">
        <th style="width:50px; font-weight:bold; font-size:12px; color:white;">S.No.</th>
        <th style="width:300px; font-weight:bold; font-size:12px; color:white;">Particulars</th>
        <th style="width:100px; font-weight:bold; font-size:12px; color:white;">Arrival Date</th>
        <th style="width:100px; font-weight:bold; font-size:12px; color:white;">Departure Date</th>
        <th style="width:80px; font-weight:bold; font-size:12px; color:white;">Amount</th>
        </tr>';

        $i = 1;
    if(!empty($particulars)){
     foreach($particulars as $particular){

        $html .= '<tr style="">
        <td style="font-weight:normal; font-size:12px;">'.$i.'</td>
        <td style="font-weight:normal; font-size:12px;">'.$particular->particulars.'</td>
        <td style="font-weight:normal; font-size:12px;">'.$particular->arrivaldate.'</td>
        <td style="font-weight:normal; font-size:12px;">'.$particular->departuredate.'</td>
        <td style="font-weight:normal; font-size:12px;">'.$particular->amount.'</td>
        </tr>';

        $i++;

      }
    }
        $html .= '<div>
        <p style="font-weight:normal; font-size:13px;">SUB TOTAL:'.$row->subtotal.'<br>
        IGST('.$row->igstat.'%):  '.$row->igst.'<br>
        CGST('.$row->cgstat.'%):  '.$row->cgst.'<br>
        SGST('.$row->sgstat.'%):  '.$row->sgst.'<br>
        NET PAYABLE:  Rs.'.$row->netpayable.'<br>
        IN WORDS:  '.$row->inwords.'</p>
        </div>';

        // $html .= '<div>
        // <p>IGST('.$row->igstat.'%)  '.$row->igst.'</p>
        // </div>';

        // $html .= '<div>
        // <p>CGST('.$row->cgstat.'%)  '.$row->cgst.'</p>
        // </div>';

        // $html .= '<div>
        // <p>SGST('.$row->sgstat.'%)  '.$row->sgst.'</p>
        // </div>';

        // $html .= '<div>
        // <p>NET PAYABLE  RS.'.$row->netpayable.'</p>
        // </div>';

        // $html .= '<div>
        // <p>IN WORDS  '.$row->inwords.'</p>
        // </div>';

	}
	
}

		
$html .='</table>';

// Print text using writeHTMLCell()
ob_get_clean();

$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('example_001.pdf', 'I');
exit;