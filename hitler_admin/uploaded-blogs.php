<?php
include "session.php";
include "db.php";


if (!empty($_GET['did'])) {
 $did = $_GET['did'];

$qry="DELETE FROM  bcp_blog  WHERE id= $did";
  $exec= mysqli_query($conn,$qry);
  if ($exec) {

    ?>
        <script>  
                  alert('Blog Deleted Successfully');
                  window.location = "uploaded-blogs.php";</script>
   <?php
unset($did);
      }
      else {
       ?>
        <script>alert('Please Try Again');</script>

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
  <link rel="icon" type="image/png" sizes="56x56" href="dist/img/fav.png">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <style type="text/css">
    .btn-app>.fa, .btn-app>.fab, .btn-app>.far, .btn-app>.fas, .btn-app>.glyphicon, .btn-app>.ion {
    display: block;
    font-size: 15px;
}
  </style>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <?php

include "header.php";

include "sidebar.php";
$qry="SELECT * FROM bcp_blog";
$result = mysqli_query($conn,$qry);
   ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Uploaded Blogs</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Uploaded Blogs</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No.</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th colspan="2">Action</th>
                  </tr>
                  </thead>
                  <tbody>
            <?php
                      while($row = mysqli_fetch_array($result)) {
            ?>
                  <tr>
    <td><?php echo $row["id"]; ?></td>
    <td><img src="upload/blog-image/<?php echo $row["img"]; ?>" class="widget-user-header bg-info" width="200px" height="100px"></td>
    <td><?php echo $row["title"]; ?></td>
              
              <td><a class="btn btn-app" href="blog_edit.php?id=<?php echo $row["id"]; ?>">
                  <i class="fas fa-edit"></i> Edit
                </a></td> 
                   <td><a class="btn btn-app" onClick="return confirm('Are you sure you want to delete?')" href="uploaded-blogs.php?did=<?php echo $row["id"]; ?>">
                 <i class="fas fa-trash-alt"></i> Delete
                </a></td> 
                     </tr>
                <?php } ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>No.</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th colspan="2">Action</th>
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
        <!-- /.row -->
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
