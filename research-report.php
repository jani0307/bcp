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

		<!-- Fix Internet Explorer ______________________________________-->
		<!--[if lt IE 9]>
			<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
			<script src="vendor/html5shiv.js"></script>
			<script src="vendor/respond.js"></script>
		<![endif]-->	
		<style type="text/css">
			.text-inner-banner-one {
    padding: 150px 0 100px;
}
.testimonial-section-standard.bg-color {
    background: #f4f8ff;
    padding: 50px 0 50px;
}
		</style>
	</head>

	<body>
		<div class="main-page-wrapper">

			<!-- ===================================================
				Loading Transition
			==================================================== -->
			<?php

include "header.php";

			?>




			<!-- 
			=============================================
				Text Inner Banner One
			============================================== 
			-->
			<div class="text-inner-banner-one pos-r">
				<div class="shape-wrapper">
					<svg class="img-shape shape-one">
					<path fill-rule="evenodd"  fill="rgb(255, 223, 204)"
					 d="M6.000,12.000 C9.314,12.000 12.000,9.314 12.000,6.000 C12.000,2.686 9.314,-0.000 6.000,-0.000 C2.686,-0.000 -0.000,2.686 -0.000,6.000 C-0.000,9.314 2.686,12.000 6.000,12.000 Z"/>
					</svg>
					<svg class="img-shape shape-two">
					<path fill-rule="evenodd"  fill="rgb(182, 255, 234)"
					 d="M6.000,12.000 C9.314,12.000 12.000,9.314 12.000,6.000 C12.000,2.686 9.314,-0.000 6.000,-0.000 C2.686,-0.000 -0.000,2.686 -0.000,6.000 C-0.000,9.314 2.686,12.000 6.000,12.000 Z"/>
					</svg>
					<svg class="img-shape shape-three">
					<path fill-rule="evenodd"  fill="rgb(181, 198, 255)"
					 d="M12.000,24.000 C18.627,24.000 24.000,18.627 24.000,12.000 C24.000,5.372 18.627,-0.000 12.000,-0.000 C5.372,-0.000 -0.000,5.372 -0.000,12.000 C-0.000,18.627 5.372,24.000 12.000,24.000 Z"/>
					</svg>
					<svg class="img-shape shape-four">
					<path fill-rule="evenodd"  fill="rgb(255, 156, 161)"
					 d="M7.500,15.000 C11.642,15.000 15.000,11.642 15.000,7.500 C15.000,3.358 11.642,-0.000 7.500,-0.000 C3.358,-0.000 -0.000,3.358 -0.000,7.500 C-0.000,11.642 3.358,15.000 7.500,15.000 Z"/>
					</svg>
					<svg class="img-shape shape-five">
					<path fill-rule="evenodd"  fill="rgb(178, 236, 255)"
					 d="M12.500,25.000 C19.403,25.000 25.000,19.403 25.000,12.500 C25.000,5.596 19.403,-0.000 12.500,-0.000 C5.596,-0.000 -0.000,5.596 -0.000,12.500 C-0.000,19.403 5.596,25.000 12.500,25.000 Z"/>
					</svg>
				</div> <!-- /.shape-wrapper -->
				<div class="container">
					<p>Education</p>
					<h3 class="pt-15">Research Report</h3>
				</div>
			</div> <!-- /.text-inner-banner-one -->

<!-- 
			=============================================
				Intro Text
			============================================== 
			-->
			<?php
include "db.php";

			mysqli_select_db($conn, 'u931565432_bcp_capital');

$results_per_page = 10;

$sql='SELECT * FROM bcp_research_report';
$result = mysqli_query($conn, $sql);
$number_of_results = mysqli_num_rows($result);

$number_pages = ceil($number_of_results/$results_per_page);

if (!isset($_GET['page'])) {
  $page = 1;
} else {
  $page = $_GET['page'];
}


$this_page_first = ($page-1)*$results_per_page;


$sql='SELECT * FROM bcp_research_report LIMIT ' . $this_page_first . ',' .  $results_per_page;
$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_array($result)) {
	?> 

<div class="our-service">
				<div class="service-modern-block img-style pb-110">
					<div class="container">
						<div class="wrapper">
							<div class="row align-items-center">
							    	<div class="col-md-6 order-md-first">
									<div class="icon sm-mt-50">
										<img src="hitler_admin/upload/research-report-photo/<?php echo $row['image']; ?>" alt="">
									</div>
								</div>
								<div class="col-md-6 order-md-last">
									<!-- div class="num"></div-->
									<h2 class="title"><a style="font-size: 35px;"><?php  echo $row['title']; ?></a></h2>
									<p class="pb-15"><?php  echo $row['description']; ?></p>
									<a href="hitler_admin/upload/research-report-pdf/<?php echo $row['pdf']; ?>" class="more"  target="_blank"><i class="flaticon-next"></i></a>
								</div>
							
							</div>
						</div> <!-- /.wrapper -->
					</div> <!-- /.container -->
				</div> <!-- /.service-modern-block -->
			</div>
		<?php  }  ?>
<div class="theme-pagination-one text-center pt-15">
						<ul>
							
							
<?php // display page numbers
for ($page=1;$page<=$number_pages;$page++) {
	?>
  <li <?php 
  if (!isset($_GET['page'])) {
  $c_page = 1;
} else {
  $c_page = $_GET['page'];
}
  				if ($page  == $c_page OR $c_page == '0') {
  	echo 'class="active"'; }  ?> ><a href="research-report.php?page=<?php echo $page; ?>"><?php echo $page; ?></a></li> 
<?php }

?>
							
						</ul>
					</div>
			</div> <!-- /.testimonial-section-standard -->
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
		<!-- Tabs -->
		<script src="vendor/tabs/tabs.js"></script>

		<!-- Theme js -->
		<script src="js/theme.js"></script>
		</div> <!-- /.main-page-wrapper -->
	</body>
</html>