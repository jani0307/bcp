<?php

	$host = "185.232.14.1";
	$name = "u931565432_pcroot";
	$pass = "Admin@vam5";
	$db = "u931565432_pcadmin";

	$mysqli = mysqli_connect($host,$name,$pass,$db);

	if(!$mysqli){
		echo mysqli_connect_error($mysqli);
	}