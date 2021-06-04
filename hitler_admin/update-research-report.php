<?php
include "session.php";
include "db.php";



$id = $_GET['edit_id'];
$qry="SELECT * FROM bcp_research_report where id = $id";
$result = mysqli_query($conn,$qry);
  while($row = mysqli_fetch_array($result)) {
          $title = $row["title"];
          $description = $row["description"];
        }


if(isset($_POST['submit'])){

$title = $_POST['title'];
  $description = $_POST['description'];  

        $query = "UPDATE `bcp_research_report` SET `title`= '$title',`description`= '$description' WHERE id = $id";
             $exec= mysqli_query($conn,$query);
                 if ($exec) {
    
    ?>   <script>alert('Research Report Updated Successfully');
         window.location="all-research-report.php"; </script> <?php
}
else {  ?> 
  <script>alert('error');</script>   
   <?php   }
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
            <h1 class="m-0 text-dark">Research Report</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Research Report</li>
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
                <h3 class="card-title">Add Research Report</h3>
              </div>
            
              <!-- form start -->
              <form role="form" method="POST" enctype='multipart/form-data' >
                <div class="card-body">
            
                   <div class="form-group">
                     <label for="title">Title</label>
                        <input  type="text" class="form-control" id="title" name="title" value="<?php echo $title; ?>" placeholder="Enter Title" required="">
                   </div>
                   <div class="form-group">
                     <label for="description">Description</label>
                        <textarea type="text" class="form-control" id="description" name="description" placeholder="Enter Description" ><?php echo $description; ?></textarea> 
                   </div>
                   
                 </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" name="submit" id="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
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

</body>
</html>



