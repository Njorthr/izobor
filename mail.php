<?php

$strFrom = $_POST['email'];
$strFromName = $_POST['name'];
$strCompany = $_POST['firma'];
$strNumber = $_POST['phone'];
$strMessage = $_POST['message'];

$strBody = "Firma = "
        . $strCompany
        . "Ad Soyad = "
        . $strFromName
        . "\r\n  Email = "
        . $strFrom
        . "\r\n Mesaj ="
        . $strMessage;

$strSubject = "Mail From İzobor.com";

$strTo = "info@izobor.com";

require_once(dirname(__FILE__)
    . "/phpmailer/class.phpmailer.php");
require_once(dirname(__FILE__)
    . "/phpmailer/class.smtp.php");

$phmMail = new PHPMailer();
$phmMail->IsMail();
$phmMail->CharSet = "UTF-8";
$phmMail->Encoding = "8bit"; 
$phmMail->From = ($strFrom);

if ($strFromName != '') {
    $phmMail->FromName = ($strFromName);
} else {
    $phmMail->FromName = ($strFrom);
} // if ($strFromName != '') {

$phmMail->AddAddress($strTo);

$phmMail->IsSMTP();
$phmMail->Username = 'noreply@izobor.com';
$phmMail->Password = 'dKv6i4_8';
$phmMail->Host = 'whs2.sanpark.com';
$phmMail->SMTPAuth = true;
$phmMail->SMTPSecure = 'tls';
$phmMail->WordWrap = 0;                              // set word wrap
$phmMail->Subject = $strSubject;
$phmMail->Body = $strBody;
$phmMail->SmtpClose();
		
sleep(2);
	
if ($phmMail->Send()) {
    // Başarılı
    header("Location: tesekkur.html");
    exit;
} else {
    // Hatalı

    echo '<pre>';
    print_r($phmMail);
    echo '</pre>';

    echo 'E-posta gönderilirken bir hata oluştu. Lütfen tekrar deneyiniz.'
    exit;
} // if ($phmMail->Send()) {
?>
