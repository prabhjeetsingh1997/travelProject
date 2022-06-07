<?php
ob_start();
require('index.php');
ob_end_clean();
require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf; 

$CI =& get_instance();
$CI->load->model('admin_model');
$param = $_GET;

$data = explode('/', $param['searchData']);
$itinary_id = $data[3];
$searchData = $data[4];

$pdfType = $_POST['pdfType'];
$dataUrl = 'view_Partner_package.php';
$folder = 'partnerpackage';
$title = str_replace(' ','_',base64_decode($_GET['itiTitle']));
$title = str_replace('&','and',$title);

 $uniquesavename=time().uniqid(rand(10000,99999));
 //$timenow = date('h:i:s');
 $selHotels = rawurlencode($_POST['selHotels']?? '');  // Already it is in base64 from javascript
 $selVehicle = rawurlencode($_POST['selVehicle']?? '');
 $selVehicleunit = rawurlencode($_POST['selVehicleunit']?? '');
 $flightTotal = rawurlencode($_POST['flightTotal']?? '');
 $extraturIncl = rawurlencode($_POST['extraturIncl']?? '');
 $extraturExcl = rawurlencode($_POST['extraturExcl']?? '');
 $extraturNote = rawurlencode($_POST['extraturNote']?? '');
 $extraturCnclplcy = rawurlencode($_POST['extraturCnclplcy']?? '');
 $extraturPymt = rawurlencode($_POST['extraturPymt']?? '');
 $selRooms = rawurlencode($_POST['selRooms']?? '');
 $selMealPlans = rawurlencode($_POST['selMealPlans']?? '');
 $flightName = rawurlencode($_POST['flightName']?? '');
 $FlightFrom = rawurlencode($_POST['FlightFrom']?? '');
 $flightTo = rawurlencode($_POST['flightTo']?? '');
 $flightArriv = rawurlencode($_POST['flightArriv']?? '');
 $FlightDepart = rawurlencode($_POST['FlightDepart']?? '');
 $FlightPrice = rawurlencode($_POST['FlightPrice']?? '');
 $room_prices = rawurlencode($_POST['room_prices']?? '');
//$grand_total = base64_encode($_POST['grand_total']);
//$service_tax = base64_encode($_POST['service_tax']);
 $total_roomprices = rawurlencode($_POST['total_roomprices']?? '');
 $nwqueryId = $_POST['nwqueryId']?? '';
 $employeeName = rawurlencode($_POST['employeeName']?? '');
 $prtnrLogo = rawurlencode($_POST['prtnrLogo']?? '');
//$queryName = base64_encode($_POST['queryName']?? '');

$url = base_url().$dataUrl.'?type=pdf&searchData='.$searchData.'&selRooms='.$selRooms.'&room_prices='.$room_prices.'&total_roomprices='.$total_roomprices.'&selHotels='.$selHotels.'&selVehicle='.$selVehicle.'&selVehicleunit='.$selVehicleunit.'&selMealPlans='.$selMealPlans.'&flightName='.$flightName.'&FlightFrom='.$FlightFrom.'&flightTo='.$flightTo.'&flightArriv='.$flightArriv.'&FlightDepart='.$FlightDepart.'&FlightPrice='.$FlightPrice.'&flightTotal='.$flightTotal.'&extraturIncl='.$extraturIncl.'&extraturExcl='.$extraturExcl.'&extraturNote='.$extraturNote.'&extraturCnclplcy='.$extraturCnclplcy.'&extraturPymt='.$extraturPymt.'&employeeName='.$employeeName.'&prtnrLogo='.$prtnrLogo.'&action=view&itiId='.$itinary_id;

$html = file_get_contents($url);
//print_r($html);
if(isset($nwqueryId) == ''){
    $pdfName = $title.'_'.$uniquesavename.'.pdf';
}else{
    $pdfName = $title.'_'.$nwqueryId.'_'.$uniquesavename.'.pdf';    
}

$dompdf = new Dompdf();
$dompdf->load_html($html);
$dompdf->render();
$file_to_save = 'generated_pdf/'.$folder.'/'.$pdfName;
file_put_contents($file_to_save, $dompdf->output()); 
echo $file_to_save;