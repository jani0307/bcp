<?php
session_start();

if(isset($_SESSION['easyweb_login_pc'])) {

	function updateStatus($id, $val){
		include "config/dbconfig.php";

		$query = "UPDATE `ads` SET status=$val WHERE id=$id";
		$stat = mysqli_query($mysqli, $query);
		echo mysqli_affected_rows($mysqli);

	}



	if (isset($_POST['approve'])) :

		updateStatus($_POST['id'], 1);

		echo true;

		header("Location: ./adsview.php");

	elseif (isset($_POST['disapprove'])) :

		updateStatus($_POST['id'], 2);

		echo false;

		header("Location: ./adsview.php");

	else :

		echo "Access Denied";

	endif;

}else {
    header("Location: ./index.php");
}