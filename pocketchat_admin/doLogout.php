<?php
session_start();
if (isset($_SESSION['easyweb_login_pc'])){
	unset($_SESSION['easyweb_login_pc']);
}
?>
<script>
    window.alert("You have been signed out successfully!!");
    window.location.href = "./login.php";
</script>