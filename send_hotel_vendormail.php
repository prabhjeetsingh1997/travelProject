<?php
@extract($_POST);
//$to = '';
$to = $rescipent_emails;
$from = 'admin@travwhizz.com'; 
$fromName = 'Travwhizz'; 
 
$subject = "Hotel Confirmation Email"; 
 
$htmlContent = $email_body."<br>".$hoteldata;
 
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