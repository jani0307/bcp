<?php

if(isset($_SESSION['easyweb_login_pc'])) :

	include "config/dbconfig.php";

	$total_query = "SELECT count(*) as total FROM `users`";
	$total_count = mysqli_query($mysqli,$total_query);
	$total_usr = mysqli_fetch_assoc($total_count);

	$cmp_query = "SELECT count(*) as total FROM `owners`";
	$ttl_cmp_count = mysqli_query($mysqli, $cmp_query);
	$total_cmp = mysqli_fetch_assoc($ttl_cmp_count);

	$emp_query = "SELECT count(*) as total FROM `employees`";
	$ttl_emp_count = mysqli_query($mysqli, $emp_query);
	$total_emp = mysqli_fetch_assoc($ttl_emp_count);

	$ads_query = "SELECT count(*) as total, count(DISTINCT user_id) as dsttl FROM `ads`";
	$ttl_ads_count = mysqli_query($mysqli, $ads_query);
	$total_ads = mysqli_fetch_assoc($ttl_ads_count);

	$cmp_total = $total_cmp['total'] <= 0 ? 1 : $total_cmp['total'];
	$emp_total = $total_emp['total'] <= 0 ? 1 : $total_emp['total'];
	$usr_total = $total_usr['total'] <= 0 ? 1 : $total_usr['total'];
	$ads_total = $total_ads['total'] <= 0 ? 1 : $total_ads['total'];
	$dst_total = $total_ads['dsttl'] <= 0 ? 1 : $total_ads['dsttl'];

	$cmp_total_pr = round($cmp_total * 100 / $cmp_total, 2);
	$emp_total_pr = round($emp_total * 100 / $emp_total, 2);
	$ads_total_pr = round($dst_total * 100 / $ads_total, 2);

else:

	echo "Access Denied";

endif;