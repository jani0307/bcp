<?php
include "session.php";
include "db.php";


if(isset($_GET['edit_id'])){
$did = $_GET['edit_id'];

$qry="DELETE FROM  bcp_research_report  WHERE id= '$did'";
  $exec= mysqli_query($conn,$qry);
  if ($exec) {

    ?>
        <script>  
                  alert('Client Deleted Successfully');
                  window.location = "all-research-report.php";</script>
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

$qry="SELECT * FROM bcp_research_report";
$result = mysqli_query($conn,$qry);
      ?>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">All Research Report</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">All Research Report</li>
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
                  <th>Title</th>
                    <th>Description</th>
    
                    <th>Update Action</th>
                  </tr>
                  </thead>
                  <tbody>
            <?php
                      while($row = mysqli_fetch_array($result)) {
            ?>
                  <tr>
    <td><?php echo $row["title"]; ?></td>
    <td><?php echo $row["description"]; ?></td>
              
             
                   <td><?php echo '
              <div class="row">
                   
    <div class="col-md-3">
                   <a href="update-research-report.php?edit_id='; echo $row["id"]; 
                   echo'"> <i class="fas fa-edit"></i></a>
  </div>  <div class="col-md-3">' ;?>

  <a  onClick="return confirm('Are you sure you want to delete?')" href="all-research-report.php?edit_id=<?php echo $row["id"]; ?>"> <i class="fas fa-trash"></i></a>
    </div> </div> 
   
                    </td>
                                        </tr>
                <?php } ?>
                  </tbody>
                  <tfoot>
                  <tr>
                        <th>Title</th>
                    <th>Description</th>
    
                    <th>Update Action</th>
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



