<?php
include "session.php";
include "db.php";

// common % update code
if(isset($_POST['submit'])){

  $update = $_POST['update'];
    $name = $_SESSION['name'];
        $query = "INSERT INTO `bcp_update`(`data`, `add_by`) VALUES ('$update', '$name')";
             $exec= mysqli_query($conn,$query);
                 if ($exec) {

                  $qry="SELECT * FROM bcp_client";
                    $result = mysqli_query($conn,$qry);
                      while($row = mysqli_fetch_array($result)) {
                             $fund = $row["fund"];
                            if ($fund  == 0) {
                                  continue;
                                }
                      $fund = $row["fund"];
                       $amount = $row["c_amount"];
                      $client_id= $row["client_id"];
                      $total = $row[0];
                      $a_amount = $fund*$update/100;
                       $f_amount = number_format($a_amount, 2,".","");
                        $d_amount = $amount + $f_amount;                        
                        $c_amount = number_format($d_amount, 2,".","");
                      $upd = "UPDATE bcp_client SET c_amount = '$c_amount', amount = '$f_amount' WHERE client_id='$client_id' AND fund != '0'";
                     
                           $exe= mysqli_query($conn,$upd);
                          if ($exe) { 
                            $month=date("m");
                     $month_update="UPDATE `bcp_monthly_update` SET `$month`= '$c_amount' WHERE client_id= '$client_id'";    
                       $exe3= mysqli_query($conn,$month_update);
                        if ($exe3) {
                          
                              }
                           }
                        }
 ?>   <script>alert('Update Successfully');
       window.location.replace(window.location.href); </script> <?php
}
else {  ?>   <script>alert('error');</script>   <?php 
     }
  }


// O Fund client
  if(isset($_POST['amount_add'])){

//$client_id = $_POST['client_id'];
  $client = $_POST['client'];
    $amount = $_POST['amount']; 
    $name = $_POST['name']; 
     $f_amnt = number_format($amount, 2,".","");
      $add_amount = "UPDATE `bcp_client` SET `fund`='$f_amnt',`amount`='0',`c_amount`='$f_amnt' WHERE client_id= '$client' ";
 $exe1= mysqli_query($conn,$add_amount);
                 if ($exe1) {
       $date = date("Y-m-d");

   $add_amount = "INSERT INTO `bcp_add_amount`(`client_id`, `name`, `amount`, `date`) VALUES ('$client' ,'Admin' ,'$amount','$date')";
 $exe1= mysqli_query($conn,$add_amount);
                 if ($exe1) {
                     
                     
             $month_amount="UPDATE `bcp_monthly_update` SET `fund_value`='$f_amnt' WHERE client_id= '$client' ";     
              $exe2= mysqli_query($conn,$month_amount);
                if ($exe2) {
 ?>   <script>alert('Amount Add Successfully');
 window.location.replace(window.location.href);         </script> <?php
}
}
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


      ?>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Update</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Update</li>
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
      
       <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary collapsed-card">
              <div class="card-header">
          <?php   $result = mysqli_query($conn ,'SELECT * FROM bcp_update ORDER BY id DESC LIMIT 1') or die('Invalid query: ' . mysql_error()); ?>

      <h3 class="card-title">Monthly Update <br><sub><b>Last Updated on : </b> <?php //print values to screen
            while ($row = mysqli_fetch_assoc($result)) {
              echo $row['time'];
            }              ?> </sub> </h3>
    
               <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" style="margin-top: 5px"><i class="fas fa-plus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
          <div class="card-body">
            <form role="form" method="POST" >
             <div class="form-group">
                    <label for="update">Enter Here</label>
                    <div class="row">
                      <div class="col-md-6">

                    <input  type="number" min="-100.00" max="100.00" step="0.01" class="form-control" id="update" name="update" placeholder="Update" required="">
                  </div>
                  <div class="col-md-2">
                     <b>%</b></div>
                   <div class="col-md-4">
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </div>
              </div>
            </div>
          </form>
            <!-- /.card-body -->
        </div>
            <!-- /.card -->

      </div>

</div>
<div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">0 Fund Clients</h3>
              </div>
              <!-- /.card-header -->
              <?php
              $qry1="SELECT * FROM bcp_client WHERE fund = '0' AND amount = '0' AND c_amount='0'";
              $result1 = mysqli_query($conn,$qry1);
              ?>
              <!-- form start -->
              <form role="form" method="POST" >
                <div class="card-body">
                  <div class="form-group">
                        <label>Select Client Name</label>
                        <select class="form-control" name="client" onchange="showUser(this.value)">
                          <option>Select Here</option>
                              <?php
                      while($row1 = mysqli_fetch_array($result1)) {
            ?>
                  <option value="<?php echo $row1["client_id"]; ?>" ><?php echo $row1["fname"] ." ". $row1["fathername"]." ". $row1["lname"]; ?></option>
                  
                        <?php } ?>
                        </select>
                      </div>
                        <div id="txtHint"></div>

                   <div class="form-group">
                     <label for="amount">Initial Investment Amount</label>
                        <input  type="number" class="form-control" id="amount" name="amount" placeholder="Enter Amount" required="">
                   </div>
                 </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" name="amount_add" id="amount_add" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

</div>
</div>
<!-- /.container-fluid -->
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
<script>
function showUser(str) {
  if (str == "") {
    document.getElementById("txtHint").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtHint").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","ajax/id.php?q="+str,true);
    xmlhttp.send();
  }
}
</script>
</body>
</html>



