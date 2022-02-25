<?php
//get data from form
/*
$firma = $_POST['firma'];  
$name = $_POST['name'];
$number = $_POST['phone'];
$email= $_POST['email'];
$message= $_POST['message'];
$to = "info@izobor.com";
$subject = "Mail From İzobor.com";
$txt ="Firma = ". $firma . "Ad Soyad = ". $name . "\r\n  Email = " . $email . "\r\n Mesaj =" . $message;
$headers = "From: noreply@izobor.com" . "\r\n";

if($email!=NULL){
    mail($to,$subject,$txt,$headers);
}
//redirect
    header("Location:tesekkur.html");
*/

require_once(dirname(__FILE__)
    . "/phpmailer/class.phpmailer.php");
require_once(dirname(__FILE__)
    . "/phpmailer/class.smtp.php");
require_once(dirname(__FILE__)
    . "/../app/Configuration/Email.php");

    $phmMail = new PHPMailer();
    $phmMail->IsMail();
    $phmMail->CharSet = "UTF-8";
    $phmMail->Encoding = "8bit"; 
    $phmMail->From = stripslashes($strFrom);

	if ($strFromName != '') {
    	$phmMail->FromName = stripslashes($strFromName);
	} else {
    	$phmMail->FromName = stripslashes($strFrom);
	} // if ($strFromName != '') {

	$phmMail->AddAddress($strTo);
	
	if (CFMAIL_BCC != '') {
		$phmMail->AddBCC(CFMAIL_BCC);
	} // if (CFMAIL_BCC != '') {

	$phmMail->IsSMTP();
    $phmMail->Username = CFMAIL_USER_NAME;
    $phmMail->Password = CFMAIL_PASSWORD;
    $phmMail->Host = CFMAIL_HOST_NAME;
    $phmMail->SMTPAuth = true;
	$phmMail->SMTPSecure = 'tls';
    $phmMail->WordWrap = 0;                              // set word wrap
    $phmMail->Subject = iconv('ISO-8859-9', 'UTF-8', stripslashes($strSubject));
    $phmMail->Body = iconv('ISO-8859-9', 'UTF-8', $strBody);
    $phmMail->SmtpClose();
		
	sleep(2);
	
	return $phmMail->Send();
?>
