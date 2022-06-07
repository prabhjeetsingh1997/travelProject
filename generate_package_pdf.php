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
$dataUrl = 'view_package_data.php';
$folder = 'package';
$title = str_replace(' ','_',base64_decode($_GET['itiTitle']));
$title = str_replace('&','and',$title);

$uniquesavename=time().uniqid(rand(10000,99999));
$selHotels = $_POST['selHotels'];  // Already it is in base64 from javascript
$selVehicle = base64_encode($_POST['selVehicle']);
$selVehicleunit = base64_encode($_POST['selVehicleunit']);
$prices = base64_encode($_POST['prices']);
$selRooms = base64_encode($_POST['selRooms']);
$selMealPlans = base64_encode($_POST['selMealPlans']);
//$qNo = base64_encode($_POST['qNo']);
$pMargin = base64_encode($_POST['pMargin']?? '');
$priceMarginAmt = base64_encode($_POST['priceMarginAmt']?? '');
//$partnerMarkup = base64_encode($_POST['partnerMarkup']?? '');
$selActivity = base64_encode($_POST['selActivity']?? '');
$selUnitactivity = base64_encode($_POST['selUnitactivity']?? '');
$seltotalunitact = base64_encode($_POST['seltotalunitact']?? '');
$flightdetails = base64_encode($_POST['flightdetails']?? '');
//$room_prices = base64_encode($_POST['room_prices']);
//$grand_total = base64_encode($_POST['grand_total']);
//$service_tax = base64_encode($_POST['service_tax']);
//$total_roomprices = base64_encode($_POST['total_roomprices']);
//$queryId = base64_encode($_POST['queryId']?? '');
$empName = base64_encode($_POST['empName']?? '');
$prtnrLogo = base64_encode($_POST['prtnrLogo']?? '');
//$queryName = base64_encode($_POST['queryName']?? '');

$url = base_url().$dataUrl.'?type=pdf&searchData='.$searchData.'&prices='.$prices.'&selRooms='.$selRooms.'&selHotels='.$selHotels.'&selVehicle='.$selVehicle.'&selVehicleunit='.$selVehicleunit.'&pMargin='.$pMargin.'&priceMarginAmt='.$priceMarginAmt.'&selMealPlans='.$selMealPlans.'&selActivity='.$selActivity.'&selUnitactivity='.$selUnitactivity.'&seltotalunitact='.$seltotalunitact.'&flightdetails='.$flightdetails.'&empName='.$empName.'&prtnrLogo='.$prtnrLogo.'&action=view'.'&itiId='.$itinary_id;

$html = file_get_contents($url);

//print_r($html);
$pdfName = $title.'_'.$uniquesavename.'.pdf';
$dompdf = new Dompdf();
$dompdf->load_html($html);
$dompdf->render();
$file_to_save = 'generated_pdf/'.$folder.'/'.$pdfName;
file_put_contents($file_to_save, $dompdf->output()); 
echo $file_to_save;