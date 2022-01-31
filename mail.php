<?php
//get data from form
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
?>