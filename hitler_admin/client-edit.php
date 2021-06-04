<?php
include "session.php";
include "db.php";

$id = $_GET['edit_id'];


if(isset($_POST['submit'])){
$pwd = $_POST['pwd'];
  $fname = $_POST['fname'];
    $lname = $_POST['lname'];
      $fathername = $_POST['fathername'];
        $bdate = $_POST['bdate'];
          $acc = $_POST['acc'];
            $accname = $_POST['accname'];
              $ifsc = $_POST['ifsc'];  
                $email = $_POST['email'];
                  $phone = $_POST['phone'];  
                    $pan = $_POST['pan'];
                      $adhar = $_POST['adhar'];
                        $bank = $_POST['bank'];
                          $address = $_POST['address'];

 $query = "UPDATE `bcp_client` SET `pwd`='$pwd',`fname`= '$fname',`lname`= '$lname',`fathername`= '$fathername',`bdate`= '$bdate',`acc`= '$acc',`accname`= '$accname',`ifsc`= '$ifsc',`email`= '$email',`phone`= '$phone',`pan`= '$pan',`adhar`= '$adhar',`bank`= '$bank',`address`= '$address' WHERE client_id= '$id'";
 $exec= mysqli_query($conn,$query);
  if ($exec) {
  
      ?> <script>alert('Details Updated Successfully');
                  window.location = "all-client.php"; </script> <?php
              
     }
else{   ?>
        <script>alert('error');</script>
   <?php
    }
  
} 

  ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>BCP - Admin</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="icon" type="image/png" sizes="56x56" href="dist/img/fav.png">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <?php

include "header.php";

include "sidebar.php";

$id = $_GET['edit_id'];
$qry="SELECT * FROM bcp_client where client_id = '$id'";
$result = mysqli_query($conn,$qry);
  while($row = mysqli_fetch_array($result)) {
 $pwd = $row['pwd'];

  $fname = $row['fname'];
    $lname = $row['lname'];
      $fathername = $row['fathername'];
        $bdate = $row['bdate'];
          $acc = $row['acc'];
            $accname = $row['accname'];
              $ifsc = $row['ifsc'];  
                $email = $row['email'];
                  $phone = $row['phone'];  
                    $pan = $row['pan'];
                      $adhar = $row['adhar'];
                        $bank = $row['bank'];
                          $address = $row['address'];
        }
      ?>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Client Register</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Client Register</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
      
 <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Enter Client Details</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form enctype='multipart/form-data' method="POST" action="">
                        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
                <div class="card-body">
                   <div class="row">
          <!-- left column -->
          <div class="col-md-6">
               <div class="form-group">
                    <label for="fname">First Name</label>
                    <input type="text" name="fname" id="fname" required class="form-control" value="<?php echo $fname; ?>" placeholder="Enter First Name">
                  </div>
          </div>
          <div class="col-md-6">  
            <div class="form-group">
                    <label for="lname">Last Name</label>
                    <input type="text" class="form-control" name="lname" id="lname" placeholder="Enter Last Name" value="<?php echo $lname; ?>" required>
                  </div>
          </div>
        </div>
                 
                  <div class="form-group">
                    <label for="fathername">Father Name</label>
                    <input type="text" class="form-control" name="fathername" id="fathername" value="<?php echo $fathername; ?>" placeholder="Enter Your Father's Full Name" required>
                  </div>

                  <div class="form-group">
                    <label for="bdate">Birth Date</label>
                     <input type="date" name="bdate" min="1920-01-01" class="form-control" id="datefield" value="<?php echo $bdate; ?>" required>
                  </div>
                  <div class="form-group">
                    <label for="acc">Bank Account Number</label>
                    <input type="number" class="form-control" name="acc" id="acc" value="<?php echo $acc; ?>" placeholder="Enter Your Bank Account Number" required>
                  </div>
                  <div class="form-group">
                    <label for="accname">Account Holder Name</label>
                    <input type="text" class="form-control" name="accname" id="accname" value="<?php echo $accname; ?>" placeholder="Enter Account Holder Name" required>
                  </div>
                  <div class="form-group">
                    <label for="ifsc">IFSC Code</label>
                    <input type="text" class="form-control" name="ifsc" id="ifsc" value="<?php echo $ifsc; ?>" placeholder="Enter Your Bank's IFSC Code" required>
                  </div>
               
                 <div class="form-group">
                    <label for="pwd">Password</label>
                    <input type="text" class="form-control" name="pwd" id="pwd" value="<?php echo $pwd; ?>" placeholder="Enter Your Password" required>
                  </div>
                </div>
          </div>
          <div class="col-md-6">
            <div class="card-body">
                  <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter email" value="<?php echo $email; ?>" required>
                  </div>
                  <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="number" class="form-control" name="phone" id="phone" placeholder="Phone Number" value="<?php echo $phone; ?>" required>
                  </div>
                   <div class="form-group">
                    <label for="pan">PAN Number</label>
                    <input type="text" class="form-control" name="pan" id="pan" placeholder="Enter Your PAN Number" value="<?php echo $pan; ?>" required>
                  </div>
                   <div class="form-group">
                    <label for="adhar">ADHAR Number</label>
                    <input type="text" class="form-control" name="adhar" id="adhar" value="<?php echo $adhar; ?>" placeholder="Enter Your ADHAR Number" required>
                  </div>
                  <div class="form-group">
                    <label for="bank">Bank Name</label>
                    <input type="text" class="form-control" name="bank" id="bank" value="<?php echo $bank; ?>" placeholder="Enter Your Bank Name" required>
                  </div>
                       <div class="form-group">
                        <label for="address">Address</label>

                  <textarea class="form-control" rows="5" name="address" id="address" placeholder="Enter Your Address" required><?php echo $address; ?></textarea>
                  </div>  
                  
                </div>
          </div>
        </div>
                <div class="card-footer">
                  <button type="submit" name="submit" id="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->




      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
      <?php

include "footer.php";

      ?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script type="text/javascript">
$(document).ready(function () {
  bsCustomFileInput.init();
});
</script>
<script type="text/javascript">
  var today = new Date();
var dd = today.getDate();
var mm = today.getMonth()+1; //January is 0!
var yyyy = today.getFullYear();
 if(dd<10){
        dd='0'+dd
    } 
    if(mm<10){
        mm='0'+mm
    } 

today = yyyy+'-'+mm+'-'+dd;
document.getElementById("datefield").setAttribute("max", today);



</script>
</body>
</html>



