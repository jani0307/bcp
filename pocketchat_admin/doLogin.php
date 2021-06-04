<?php
session_start();

include "partials/header.php";
include "config/dbconfig.php";


if(isset($_POST['submit'])) {
    $name = $_POST['uname'];
    $pass = md5($_POST['upass']);

    $query = "SELECT * FROM admin WHERE name='". $name ."' AND password='". $pass ."'";
}

?>
<!-- Start Page Loading -->
<div id="loader-wrapper">
	<div id="loader"></div>
	<div class="loader-section section-left"></div>
	<div class="loader-section section-right"></div>
</div>
<?php

    $login_query = mysqli_query($mysqli,$query);

    if(mysqli_num_rows($login_query) == 0){
//        echo "Bye bye";
        $msg = "Login attempt unsuccessfull !!";
        $add = "login.php";
    }else{
        $_SESSION['easyweb_login_pc'] = true;
        $_SESSION['easyweb_login_name'] = $name;
	    $msg = "Login successfull !!";
	    $add = "./";
    }

include "partials/footer.php";

sleep(2);

?>

<script>
    window.alert("<?=$msg?>");
    window.location.href="<?=$add?>";
</script>
