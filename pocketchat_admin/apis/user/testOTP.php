<?php
	include_once '../objects/SMS.php';
	$phone = $_POST['phone'];
	$otp = rand(1000, 9999);
	$sendSMS = new SMS();
	$sendSMS->sendOtp($phone,$otp);
	echo "SMS Success";
?>