<?php
include "session.php";
include "db.php";

$id = $_GET['id'];
$qry="SELECT * FROM bcp_blog where id = $id";
$result = mysqli_query($conn,$qry);
  while($row = mysqli_fetch_array($result)) {
          $old =  $row["img"];
          $title1 = $row["title"];
          $content1 = $row["content"];
        }

if(isset($_POST['blog_upload'])){
 
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $content = mysqli_real_escape_string($conn, $_POST['content']);
      $name = $_FILES['img']['name'];
if (empty($name)) {
  // Insert record   update query
  $query = "UPDATE `bcp_blog` SET `title` = '$title' , `content` = '$content' WHERE id = $id";
   }
else {

    $new_str = str_replace(' ', '-', $title);
    $ext = "-".rand(1000, 9999).".".pathinfo($name, PATHINFO_EXTENSION); 
    $new_name= "$new_str$ext";
    $tmp_name =  $_FILES['img']['tmp_name'];
    $location ='upload/blog-image/';

      // Insert record   update query 
     $query = "UPDATE `bcp_blog` SET `title` = '$title' , `img` = '$new_name', `content` = '$content' WHERE id = $id";
     if (move_uploaded_file($tmp_name, $location.$new_name) ){
     }else{   ?>
        <script>alert('error1');</script>
   <?php
    }
     
  }
 

    // echo "$query";
     $exec= mysqli_query($conn,$query);
  if ($exec) {
  
     
?>
        <script>alert('Blog Updated Successfully');
        window.location="uploaded-blogs.php";</script>
        <?php


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
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
 <?php

include "header.php";

include "sidebar.php";


      ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Blog</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Edit Blog</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
   <!-- Main content -->
    <div class="container">
    <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Blog</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form enctype='multipart/form-data' method="POST" action="">
                <div class="card-body">
                  
                  <div class="form-group">
                    <label for="title">Blog Title</label>
                     <input type="text" class="form-control" value="<?php echo $title1 ; ?>" id="title" name="title" placeholder="Enter Your Blog Title" required>
                  </div>
                       <div class="row">
          <div class="col-md-10">
               
 <div class="form-group">
                    <label for="exampleInputFile">Upload Your Blog Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="img" name="img" accept="image/*" >
                        <label class="custom-file-label" for="img"> <?php echo $old; ?></label>
                      </div>

                    </div>
                  </div>
          </div>
          <div class="col-md-2">  
          <div class="position-relative" style="min-height: 130px;">
                      <img src="upload/blog-image/<?php echo $old; ?>" alt="Photo 3" class="img-fluid">
                      <div class="ribbon-wrapper ribbon-xl">
                       
                      </div>
                    </div>

          </div>
        </div>
                 
                          <div class="card card-outline card-info">
            <div class="card-header">
              <h3 class="card-title">Enter Your  Blog Content </h3>
              <!-- tools box -->
              
            </div>
            <!-- /.card-header -->
            <div class="card-body pad">
              <div class="mb-3">
                <textarea class="textarea" id="content" name="content" required placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                          <?php echo $content1; ?></textarea>
              </div>
             
            </div>
          </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="blog_upload" id="blog_upload" class="btn btn-primary">Submit</button>
                </div>
              </form>
          </div>
            <!-- /.card -->
              </div>
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
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<script>
  $(function () {
    // Summernote
    $('.textarea').summernote()
  })
</script>
<script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script type="text/javascript">
$(document).ready(function () {
  bsCustomFileInput.init();
});
</script>
</body>
</html>
