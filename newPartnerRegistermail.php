<?php
@extract($_POST);
//$to = '';
$to = 'admin@travwhizz.com';
$from = 'info@travwhizz.com'; 
$fromName = 'Travwhizz'; 
 
$subject = "Partner Registration Email"; 
 
$htmlContent = "Full Name: $fullname \n Email: $email \n ContactNumber: $contact \n Company Name: $companyname \n  Company Contact: $companycontact \n Company Email: $companyemail \n Address: $address \n Address Line 1: $address1 \n Country: $country \n State: $state \n City: $city \n Pincode: $pincode";
 
// Set content-type header for sending HTML email 
$headers = "MIME-Version: 1.0" . "\r\n"; 
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
 
// Additional headers 
$headers .= 'From: '.$fromName.'<'.$from.'>' . "\r\n"; 
//$headers .= 'Cc: welcome@example.com' . "\r\n"; 
//$headers .= 'Bcc: welcome2@example.com' . "\r\n"; 
 
// Send email 
if(mail($to, $subject, $htmlContent, $headers)){ 
    echo 'Email has sent successfully.'; 
}else{ 
   echo 'Email sending failed.'; 
}
?>