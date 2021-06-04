<?php
include "db.php";

$name=$_GET['name'];
$name=str_replace('-', ' ', $name);

$sql = "SELECT * FROM bcp_blog where title='$name'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
 $img= $row['img'];
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="keywords" content="Digital marketing agency, Digital marketing company, Digital marketing services">
		<meta name="author" content="creativegigs">
		<meta name="description" content="Investing is how you take charge of your financial security. It allows you to grow your wealth but also generate an additional income stream if needed ahead of retirement. Various investments such as stocks, ETFs, bonds, or real estate will provide either growth or income but in some cases both.">
		<meta name='og:image' content='images/home/logo-meta.png'>
		<!-- For IE -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<!-- For Resposive Device -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- For Window Tab Color -->
		<!-- Chrome, Firefox OS and Opera -->
		<meta name="theme-color" content="#fff">
		<!-- Windows Phone -->
		<meta name="msapplication-navbutton-color" content="#fff">
		<!-- iOS Safari -->
		<meta name="apple-mobile-web-app-status-bar-style" content="#fff">
		<title>BCP - Capital Management</title>
		<!-- Favicon -->
		<link rel="icon" type="image/png" sizes="56x56" href="images/logo/fav.png">
		<!-- Main style sheet -->
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<!-- responsive style sheet -->
		<link rel="stylesheet" type="text/css" href="css/responsive.css">

		<style>.theme-main-menu {
    background: #ffffffb0;
    }
    x`</style>

	</head>

	<body>
		<div class="main-page-wrapper">

		
			<?php

include "header.php";

			?>

			
					<!-- 
			=============================================
				Blog Details
			============================================== 
			-->
			<div class="our-blog blog-details blog-details-fg pb-200 md-pb-120">
				<div class="blog-hero-banner" style="background-image: url(hitler_admin/upload/blog-image/<?php echo $row['img']; ?>); opacity: 1.5">
					<div class="blog-custom-container">
						<!--a href="#" class="date"></ a -->
						<h2 class="blog-title" style=""><?php echo $row['title']; ?></h2>
					</div> <!-- /.blog-custom-container -->
				</div> <!-- /.blog-hero-banner -->
				<div class="blog-fg-data">
					<div class="post-data">
						<div class="blog-custom-container">
							<div class="custom-container-bg">
								<p class="pt-50"><?php echo $row['content']; ?> </p>
							
							</div> <!-- /.custom-container-bg -->
						</div> <!-- /.blog-custom-container -->
					</div> <!-- /.post-data -->

					<div class="blog-custom-container">
						<div class="custom-container-bg">
							<div class="post-tag-area d-md-flex justify-content-between align-items-center pt-50">
								<ul class="tags">
									<li>Add By :</li>
									<li><a href="#"><?php echo $row['add_by']; ?></a></li>
									
								</ul>
							<!-- 	<ul class="share-icon">
									<li>Share:</li>
									<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
								</ul>-->
							</div> 
						<!--	<div class="user-comment-area pt-150 md-pt-100">
								<h3 class="inner-block-title">2 Comments</h3>
								<div class="comment-wrapper">
							  		<div class="single-comment d-sm-flex align-items-top">
							  			<img src="images/home/2.jpg" alt="" class="user-img">
							  			<div class="user-comment-data">
							  				<h6 class="name">Rashed ka.</h6>
							  				<div class="date">13 June, 2018, 7:30pm</div>
											<p>One touch of a red-hot stove is usually all we need to avoid that kind of discomfort in future. The same true we experience the emotional sensation.</p>
											<button class="reply">Reply</button>
							  			</div>  /.user-comment-data 
							  		</div>
							  		<div class="single-comment comment-reply d-sm-flex align-items-top">
							  			<img src="images/home/3.jpg" alt="" class="user-img">
							  			<div class="user-comment-data">
							  				<h6 class="name">Rashed ka.</h6>
							  				<div class="date">13 June, 2018, 7:30pm</div>
											<p>One touch of a red-hot stove is usually all we need to avoid that kind of discomfort in future. The same true sensation.</p>
											<button class="reply">Reply</button>
							  			</div> 
							  		</div> 
							  		<div class="single-comment d-sm-flex align-items-top">
							  			<img src="images/home/4.jpg" alt="" class="user-img">
							  			<div class="user-comment-data">
							  				<h6 class="name">Zubayer hasan</h6>
							  				<div class="date">12 June, 2018, 3:30pm</div>
											<p>One touch of a red-hot stove is usually all we need to avoid that kind of discomfort in future. The same true we experience the emotional sensation.</p>
											<button class="reply">Reply</button>
							  			</div>
							  		</div>
							  	</div>
							</div> 
						</div> 
					</div> 

					<div class="comment-form-area mt-100 md-mt-70">
						<div class="blog-custom-container">
							<div class="custom-container-bg">
								<h3 class="inner-block-title">Leave A Comment</h3>
								<p>Sing in to post your comment or singup if you dont have any account.</p>
								<form action="#" class="theme-form-style-three">
									<div class="row">
										<div class="col-md-6"><input type="text" placeholder="Your Name*"></div>
										<div class="col-md-6"><input type="email" placeholder="Your Email*"></div>
										<div class="col-12"><textarea placeholder="Your Comment*"></textarea></div>
									</div>
									<button class="theme-button-three">Post Comment</button>
								</form>
							</div>  /.custom-container-bg -->
						</div> <!-- /.blog-custom-container -->		
					</div> <!-- /.comment-form-area -->
				</div> <!-- /.blog-fg-data -->
			</div> <!-- /.our-blog -->
			



		


			<!--
			=====================================================
				Footer
			=====================================================
			-->

			<?php

include "footer.php";

			?>
			
	        


		<!-- Optional JavaScript _____________________________  -->

    	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
    	<!-- jQuery -->
		<script src="vendor/jquery.2.2.3.min.js"></script>
		<!-- Popper js -->
		<script src="vendor/popper.js/popper.min.js"></script>
		<!-- Bootstrap JS -->
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	    <!-- menu  -->
		<script src="vendor/mega-menu/assets/js/custom.js"></script>
		<!-- AOS js -->
		<script src="vendor/aos-next/dist/aos.js"></script>
		<!-- WOW js -->
		<script src="vendor/WOW-master/dist/wow.min.js"></script>
		<!-- owl.carousel -->
		<script src="vendor/owl-carousel/owl.carousel.min.js"></script>
		<!-- ajaxchimp -->
		<script src="vendor/ajaxchimp/jquery.ajaxchimp.min.js"></script>
		<!-- Fancybox -->
		<script src="vendor/fancybox/dist/jquery.fancybox.min.js"></script>
		<!-- Tilt js -->
		<script src="vendor/tilt.jquery.js"></script>


		<!-- Theme js -->
		<script src="js/theme.js"></script>
		</div> <!-- /.main-page-wrapper -->
	</body>
</html>