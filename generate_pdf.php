<?php
ob_start();
require('index.php');
ob_end_clean();
require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf; 

$CI =&get_instance();
$CI->load->model('admin_model');
$param = $_GET;

$data = explode('/', $param['searchData']);
$hotel_id = $data[3];
$searchData = $data[4];
$pdfType = $_POST['pdfType'];
$dataUrl = 'view_hotel_data.php';
$folder = 'hotels';
$title = str_replace(' ','_',base64_decode($_GET['hotel']));
$title = str_replace('&','and',$title);
$uniquesavename=time().uniqid(rand(10000,99999));
$prices = base64_encode($_POST['prices']);
$selRooms = base64_encode($_POST['selRooms']);
$selMealPlans = base64_encode($_POST['selMealPlans']);
//$qNo = base64_encode($_POST['qNo']?? '');
$pMargin = base64_encode($_POST['pMargin']?? '');
//$queryId = base64_encode($_POST['queryId']?? '');
$empname = base64_encode($_POST['empname']?? '');
//$queryName = base64_encode($_POST['queryName']?? '');
$partnerLogo = base64_encode($_POST['partnerLogo']?? '');
$partnerMarkup = base64_encode($_POST['partnerMarkup']?? '');
$marginAmt = base64_encode($_POST['marginAmt']);
$selMealPlansVal = base64_encode($_POST['selMealPlansVal']?? '');
$spcl_Remark = base64_encode($_POST['spcl_Remark']?? '');
$emp_mobile = base64_encode($_POST['emp_mobile']?? '');
$emp_email = base64_encode($_POST['emp_email']?? '');
$taxesIncl = base64_encode($_POST['taxesIncl']?? '');
$url = base_url().$dataUrl.'?type=pdf&searchData='.$searchData.'&prices='.$prices.'&emp_mobile='.$emp_mobile.'&empname='.$empname.'&partnerLogo='.$partnerLogo.'&emp_email='.$emp_email.'&selRooms='.$selRooms.'&pMargin='.$pMargin.'&marginAmt='.$marginAmt.'&selMealPlansVal='.$selMealPlansVal.'&selMealPlans='.$selMealPlans.'&partnerMarkup='.$partnerMarkup.'&spcl_Remark='.$spcl_Remark.'&taxesIncl='.$taxesIncl.'&action=view'.'&id='.$hotel_id;

$html = file_get_contents($url);

$pdfName = $title.'_'.$uniquesavename.'.pdf';
$dompdf = new Dompdf();
$dompdf->load_html($html);
$dompdf->render();

$file_to_save = 'generated_pdf/'.$folder.'/'.$pdfName;

file_put_contents($file_to_save, $dompdf->output()); 
echo $file_to_save;
exit();
?>