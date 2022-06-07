<?php
//error_reporting(E_ALL);
//include('config/init.php');
//print_r($_POST);
@extract($_POST);

$arrFile = explode('/',$mailFilePath);
//var_dump($arrFile);

$sender_email = 'info@travwhizz.com';
$ccperson = $empmail;
//$sender_email = $empmail;
$my_file = $arrFile[2]; //'tour.pdf';
$my_path = $arrFile[0].'/'.$arrFile[1].'/'; //"tourPdf/";
$my_name = 'Travwhizz'.' '.$emplname;
if($my_name == ''){
    $my_name = 'Travwhizz';
}
$my_mail = $sender_email;
$my_replyto = $sender_email;
//$recipent_name = $recipent_name;
$recipent_email = $rescipent_emails;
$my_subject = $tourSub; //"Tour Information.";
$my_message = $email_body; //"Hallo,\r\ndo you like this script? I hope it will help.\r\n\r\ngr. Olaf";
$headersnw = 'From: '.$sender_email;

if($my_subject == '')
{
	$my_subject = 'Travel Quotation';
}

$my_message = $email_body;

$mail = mail_attachment($my_file, $my_path, $recipent_email, $my_mail, $my_name, $my_replyto, $ccperson, $my_subject, $my_message);
if($mail)
{
	echo '1';
}
else
{
	echo 'error';
}	

function mail_attachment($filename, $path, $mailto, $from_mail, $from_name, $replyto, $ccmail, $subject, $message) {
    $file = $path.$filename;
    $file_size = filesize($file);
    $handle = fopen($file, "r");
    $content = fread($handle, $file_size);
    fclose($handle);
    $content = chunk_split(base64_encode($content));
    $uid = md5(uniqid(time()));
    //$ccperson = $empmail;
    $header = "From: ".$from_name." <".$from_mail.">\r\n";
    $header .= "Reply-To: ".$replyto."\r\n";
    //$header .= "Bcc: ".$ccmail."\r\n";
    $header .= "MIME-Version: 1.0\n";
    //$header .= "Content-Type: text/html; charset=\"iso-8859-1\"\n";
    $header .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"\r\n\r\n";
	
	/* $header = "MIME-Version: 1.0\r\n";
	$header.= "Content-Type: text/html; charset=iso-8859-1\r\n";
	$header .= 'From: '.$from_name.' <'.$from_mail.'>' . "\r\n"; */
	
	/* $Bcc = 'travel@lightsindark.in';
	if(empty($Bcc)==false) {
		$header.= "Bcc: ".$Bcc."\r\n";
	} */
	
	$nmessage = "--".$uid."\r\n";
	$nmessage .= "Content-type:text/html;charset=UTF-8" . "\n";
	$nmessage .= "Content-Type: text/html; charset=\"iso-8859-1\"\n";
    //$nmessage .= "Content-type:text/plain; charset=iso-8859-1\r\n";
    $nmessage .= "Content-Transfer-Encoding: 8bit\r\n\r\n";
    $nmessage .= $message."\r\n\r\n";
    $nmessage .= "--".$uid."\r\n";
    $nmessage .= "Content-Type: application/octet-stream; name=\"".$filename."\"\r\n"; 
    $nmessage .= "Content-Transfer-Encoding: base64\r\n";
    $nmessage .= "Content-Disposition: attachment; filename=\"".$filename."\"\r\n\r\n";
    $nmessage .= $content."\r\n\r\n";
    $nmessage .= "--".$uid."--";
	
    if(mail($mailto, $subject, $nmessage, $header)) {
		
		mail($ccmail, $subject, $nmessage, $header);
		
        return true;
    } else {
		return false;
    }
}

?>