<?php
include "session.php";
include "db.php";

if(isset($_POST['client_update'])){

  $client_id = $_POST['client_id'];
    $update = $_POST['update'];
       $fund = $_POST['fund'];
         $amount = $_POST['amount'];
            $c_amount = $_POST['c_amount'];
            
$i_amount = $fund*$update/100;
$f_amount = number_format($i_amount, 2,".","");
$v_amount = $c_amount - $amount;
$m_amount = $v_amount + $i_amount;
$n_amount = number_format($m_amount, 2,".","");

 $query = "UPDATE `bcp_client` SET `c_amount`='$n_amount', `amount`='$f_amount' WHERE client_id='$client_id'";
     $exec= mysqli_query($conn,$query);
  if ($exec) {
    $month=date("m");
  $query2 = "UPDATE `bcp_monthly_update` SET `$month`='$n_amount' WHERE `client_id`='$client_id'";
     $exec2= mysqli_query($conn,$query2);
  if ($exec2) {
?>
        <script>alert('Updated Successfully');
       window.location="all-client.php";</script>
        <?php
}
}
else{   ?>
        <script>alert('error');</script>
   <?php
    }
  }


if(isset($_GET['edit_id'])){
$did = $_GET['edit_id'];

$qry="DELETE FROM  bcp_client  WHERE client_id= '$did'";
  $exec= mysqli_query($conn,$qry);
  if ($exec) {

    ?>
        <script>  
                  alert('Client Deleted Successfully');
                  window.location = "all-client.php";</script>
   <?php
unset($did);
      }
      else {
       ?>
        <script>alert('Please Try Again');
       window.location = "all-client.php";</script>

   <?php

      }
}



  ?>
<!DOCTYPE php>
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
    <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
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

$qry="SELECT * FROM bcp_client";
$result = mysqli_query($conn,$qry);
      ?>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">All Clients</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">All Clients</li>
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
       <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body" style="overflow: auto;">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  <th>Client ID</th>
                    <th>Name</th>
                    <th>Number</th>
                     <th>Investment (&#8377;)</th>
                    <th>Fund Value (&#8377;)</th>
                    <th>Update Action</th>
                     <th>Edit/Delete</th>
                  </tr>
                  </thead>
                  <tbody>
            <?php
                      while($row = mysqli_fetch_array($result)) {
            ?>
                  <tr>
    <td><?php echo $row["client_id"]; ?></td>
    <td><?php echo $row["fname"]; ?> <?php echo $row["lname"]; ?></td>
              
              <td><?php echo $row["phone"]; ?></td> 
                   <td><?php echo $row["fund"]; ?></td> 
                   <td><?php echo $row["c_amount"]; ?>
                   
                    
                    
                    </td>
                   <td>
                            <form method="POST">
                      
              <div class="row">
                <?php 
                      $fund = $row["fund"];
                    if ($fund != '0')
                 { ?>        
                    <div class="col-md-6">
                          <div class="form-group">
<input type="hidden" name="client_id" Value="<?php echo $row["client_id"];?>">
  <input type="hidden" name="fund" Value="<?php echo $row["fund"]; ?>">
    <input type="hidden" name="amount" Value="<?php echo $row["amount"]; ?>">
  <input type="hidden" name="c_amount" Value="<?php echo $row["c_amount"]; ?>">

    <input  type="number" min="-100.00" max="100.00" step="0.01" class="form-control" name="update" placeholder="%" required="">
                          </div>
                    </div>  
              <div class="col-md-6">
<button type="submit" name="client_update" class="btn btn-block btn-primary">Submit</button>
              </div>
            <?php   }   ?>
 </td>  <td> 
              <table class="table table-bordered">
                  <tr>
                
                      <div class="btn-group">
                          
                <a class="btn btn-default" href="client-edit.php?edit_id=<?php echo $row["client_id"]; ?>"> 
        <i class="fas fa-edit"></i></a>
    <a class="btn btn-default"  onClick="return confirm('Are you sure you want to delete?')" href="all-client.php?edit_id=<?php echo $row["client_id"]; ?>"> <i class="fas fa-trash"></i></a>
                        
                      </div>
                    </tr>
                    </table>     

    
           </div> 
     </form>
        </td> 
  
                      </tr>

                <?php } ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Client ID</th>
                    <th>Name</th>
                    <th>Number</th>
                    <th>Investment (&#8377;)</th>
                    <th>Fund Value (&#8377;)</th>
                    <th>Update Action (%)</th>
                    <th>Edit/Delete</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
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
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>



