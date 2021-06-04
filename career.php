<?php
include "db.php";

if(isset($_POST['submit'])){

$name = $_POST['name'];
  $phone = $_POST['phone'];  
    $experience=$_POST['experience']; 
      $cctc = $_POST['cctc'];  
  		$ectc = $_POST['ectc'];  
 		  $email = $_POST['email'];  
  			$education = $_POST['education'];  
              $cv = $_FILES['cv']['name'];
  			    $position = $_POST['position'];  


$new_cv = str_replace(' ', '-', $name);
 $extention = "-cv-".rand(1000, 9999).".".pathinfo($cv, PATHINFO_EXTENSION);
   $cv_name= "$new_cv$extention";
     $tmp_cv =  $_FILES['cv']['tmp_name'];
       $cv_path ='hitler_admin/upload/career/';
        $query = "INSERT INTO `bcp_career`(`name`, `phone`, `experience`, `cctc`, `ectc`, `email`, `education`, `cv`, `position`) VALUES  ('$name', '$phone', '$experience', '$cctc', '$ectc', '$email', '$education', '$cv_name', '$position')";
             $exec= mysqli_query($conn,$query);
                 if ($exec && (move_uploaded_file($tmp_cv, $cv_path.$cv_name))) {
     
    
    ?>   <script>alert('Thank You !');
        window.location.replace(window.location.href); </script> <?php
}
else {  ?> 
  <script>alert('error');
   window.location.replace(window.location.href);</script>   
   <?php   }
  }
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

		<!-- Fix Internet Explorer ______________________________________-->
		<!--[if lt IE 9]>
			<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
			<script src="vendor/html5shiv.js"></script>
			<script src="vendor/respond.js"></script>
		<![endif]-->
		<style type="text/css">
			.inner-banner.banner-bg.bg-style-two .opacity {
    padding: 250px 0 110px;

}
.form-group select {
	width: 100%;
    border: none;
    border-bottom: 2px solid #383838;
    background: transparent;
    margin-bottom: 35px;
    margin-top: 32px;
    font-size: 20px;
}

@media screen and (max-width: 500px) {
	.img {
 
}

}
</style>	
	</head>

	<body>
		<div class="main-page-wrapper">

			<!-- ===================================================
				Loading Transition
			==================================================== -->
	<?php   include "header.php";  ?>

		<div class="inner-banner pos-r banner-bg bg-style-two" style="background-image: url(images/home/bg.png); margin-top: 90px">
				<div class="opacity">
					<div class="container">
						<p></p>
						<h2></h2>
					</div>
				</div>
			</div> <!-- /.inner-banner

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
				</div>  --><!-- /.shape-wrapper -->
<h3 class="pt-30 pb-25 tran3s title" style="text-align: center;">CAREER</h3>
<form class="form theme-form-style-three" method="POST" enctype='multipart/form-data' >
<div class="container">

<div class="row">
<div class="col-md-6" style="margin-bottom: -150px">
			<!-- Element Style -->
			<div class="element-section mb-150">
				<div class="container">
					<div class="contact-form">
				        	<div class="messages"></div>
				        	<div class="controls">
					             <div class="form-group">
					                 <input  type="text" name="name" placeholder="Your Name*" required="required" data-error="Valid name is required.">
					                 <div class="help-block with-errors"></div>
					             </div>

					             <div class="form-group">
					                 <input  type="number" name="phone" placeholder="Your Number*" required="required" data-error="Phone Number is required.">
					                 <div class="help-block with-errors"></div>
					             </div>

					             <div class="form-group">
  <select name="experience" id="experience" required="">
  	<option value="">Select Your Experience</option>
    <option value="fresher">Fresher</option>
    <option value="0 - 1">0 - 1</option>
    <option value="1 - 2">1 - 2</option>
    <option value="2 - 3">2 - 3</option>
    <option value="3 - 4">3 - 4</option>
    <option value="4 - 5">4 - 5</option>
    <option value="> 5">> 5</option>
  </select>
					             </div>

					             <div class="row">
<div class="col-md-6"> 
	<input  type="text" name="cctc" placeholder="Current CTC*" required="required">
</div>
<div class="col-md-6">       <div class="form-group">
					             			
					 <input  type="text" name="ectc" placeholder="Expected CTC*" required="required"></div>
</div>
</div>
				        	</div> <!-- /.controls -->
				    </div> <!-- /.contact-form -->
				</div> <!-- /.container -->
			</div>
</div>
<div class="col-md-6" style="margin-bottom: -150px">
			<!-- Element Style -->
			<div class="element-section mb-150">
				<div class="container">
					<div class="contact-form">
				    
				        	<div class="messages"></div>
				        	<div class="controls">
					             <div class="form-group">
					                 <input  type="email" name="email" placeholder="Email Address*" required="required" data-error="Valid email is required.">
					                 <div class="help-block with-errors"></div>
					             </div>

					            <div class="form-group">
					             <select required="" name="education" id="education" style=""><option value="">Education Qualification</option>
    									<option value="Bachelor">Bachelor</option>
					                 <option value="Post Graduate">Post Graduate</option>
					                    <option value="Professional (CA, CS, CMA, CFA)">Professional (CA, CS, CMA, CFA)</option>

					                 </select>
					             </div>
<div class="row">
<div class="col-md-5"><h6>Upload Your Updated CV</h6>
</div>
<div class="col-md-7">       <div class="form-group">
					             			
					             	 <input  type="file" name="cv" id="cv"  placeholder=""  accept="image/png, image/jpeg, application/pdf" required="required"></div>
</div>
</div>					      
                               <div class="form-group">
								  <select name="position" id="position" required="">
								  	<option value="">Position To Apply</option>
								    <option value="Sales Manager">Sales Manager</option>
								    <option value="Sales Executive">Sales Executive</option>
                                       </select>
					             </div>
				        	 <!-- /.controls -->
				      	
				    </div> <!-- /.contact-form -->
				</div> <!-- /.container -->
			</div>
</div> 

</div> 

</div><center><button class="theme-button-three" type="submit" name="submit">Send Message</button></center>
</div>
</form>

			<!-- /.text-inner-banner-one -->

		<br>

			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3672.1088042734455!2d72.5519437142824!3d23.01977692221063!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e850f9653a979%3A0x33a72090d0e13a9d!2sBlackCrescent%20Partners!5e0!3m2!1sen!2sin!4v1602311287307!5m2!1sen!2sin" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe> 

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
		<!-- validator js -->
    	<script src="vendor/validator.js"></script>
    	<!-- Google map js -->
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjQLCCbRKFhsr8BY78g2PQ0_bTyrm_YXU"></script>
		<script src="vendor/sanzzy-map/dist/snazzy-info-window.min.js"></script>

		<!-- Theme js -->
		<script src="js/theme.js"></script>
		<script src="js/map-script.js"></script>

		</div> <!-- /.main-page-wrapper -->
	</body>
</html>