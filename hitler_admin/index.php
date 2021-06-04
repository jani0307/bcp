<?php
include "db.php";

session_start();
if(isset($_SESSION["email"]))
{
 header("location:dashboard.php");
}
if(isset($_POST["login"]))   
{  

  $email = $_POST["email"];
  $password = $_POST["password"];
  $sql = "Select * from bcp_admin where email = '" . $email . "' and pwd = '" . $password . "'";
  $result = mysqli_query($conn,$sql);  
 $user = mysqli_fetch_array($result); 
  if($user)   
  {  
        $_SESSION["email"] = $email;
        $_SESSION["name"] = $user['name'];
        $_SESSION["position"] = $user['position'];
   if(!empty($_POST["remember"]))   
   {  
    setcookie ("member_login",$email,time()+ (10 * 365 * 24 * 60 * 60));  
    setcookie ("password",$password,time()+ (10 * 365 * 24 * 60 * 60));
    
   }  
   else  
   {  
    if(isset($_COOKIE["member_login"]))   
    {  
     setcookie ("member_login","");  
    }  
    if(isset($_COOKIE["password"]))   
    {  
     setcookie ("password","");  
    }  
   }  
   header("location:dashboard.php"); 
  }  
  else  
  {  
   $message = "Invalid Login";  
  } 
 
}  
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>BCP - Admin - Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
        <link rel="icon" type="image/png" sizes="56x56" href="dist/img/fav.png">

  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <img src="dist/img/3.png" height="90%" width="90%">

  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in </p>
<div class="text-danger"><?php if(isset($message)) { echo $message; } ?></div>  
      <form action="" method="POST">
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" name="email" required value="<?php if(isset($_COOKIE["member_login"])) { echo $_COOKIE["member_login"]; } ?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" required name="password" value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"]; } ?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember" name="remember" <?php if(isset($_COOKIE["member_login"])) { ?> checked <?php } ?> >
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" name="login" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <!-- /.social-auth-links 

      <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="register.html" class="text-center">Register a new membership</a>
      </p>-->
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

</body>
</html>
