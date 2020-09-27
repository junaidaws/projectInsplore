<?php
if(!empty($_POST["email"])) {
	$name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["telNo"];
	$content = $_POST["message"];

	$toEmail = "info@acontaxconsultancy.com";
	$mailHeaders = "From: " . $name . "<". $email .">\r\n";
	//if(mail($toEmail, $subject, $content, $mailHeaders)) {
	    $message = "Your contact information is received successfully.";
	    $type = "success";
	//}
}
require_once "../contact_us.php";
?>