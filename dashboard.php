<?php
include "session.php";
include "db.php";



if(isset($_POST['change_pwd'])){
        $client_id = $_SESSION['client_id'];
        $old_pwd = $_POST['old_pwd'];  
        $new_pwd = $_POST['new_pwd'];  
        $new_c_pwd = $_POST['new_c_pwd']; 
        
            if($new_pwd == $new_c_pwd) {

 $qry="SELECT * FROM `bcp_client` WHERE `client_id` ='$client_id' AND `pwd` = '$old_pwd'";
              $result = mysqli_query($conn,$qry);  
                $user = mysqli_fetch_array($result); 
                         if($user) {
                        
                        
 $query = "UPDATE `bcp_client` SET `pwd`= '$new_pwd' WHERE `client_id` ='$client_id' AND `pwd` = '$old_pwd'";
             $exec= mysqli_query($conn,$query);
                if ($exec) {
                       ?>   <script>alert('Password Updated Successfully');
                    window.location.replace(window.location.href);</script> <?php 
                                 
                    }
                    else{
                        ?> 
  <script>alert('error');</script>   
   <?php       
                    }
                    }
                    else{
                        ?>   <script>alert('Wrong Password');
        window.location.replace(window.location.href);</script> <?php
                    }
            }
          else{
              ?>   <script>alert('Password & Confirm Password Are Not Same');
        window.location.replace(window.location.href);</script> <?php
          }          
     }


$name = $_SESSION['fname'] .' '. $_SESSION['lname'];
$client_id=$_SESSION['client_id'];
$sql="SELECT * FROM bcp_client WHERE `client_id`='$client_id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc()

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
	</head>

	<body>
		<div class="main-page-wrapper">


			<?php

include "header_admin.php";

			?><br><br><br><br>



		

			
			<!-- 
			=============================================
				CheckOut Page
			============================================== 
			-->
			<div class="checkout-section">
				<div class="container">
					
					<form action="#" class="checkout-form">
						<div class="row">
							<div class="col-lg-5">
								<div class="order-confirm-sheet">
									<h2 class="main-title">Hii <?php echo $name;;  ?></h2>
								
									<div class="order-review" style="border: none;">
										<table class="product-review">
											<tbody>
												<tr>
													<th>
														<a class="theme-btn solid-button-one button-rose radius3 mt-35" href="fund.php"><i class="fa fa-money" style="color: #313131;" aria-hidden="true"></i>
                                                          <span>Fund</span></a>
													</th>
													</tr>
												
												<tr>
													<th>
														<a href="" data-toggle="modal" data-target="#m-a-a" data-toggle-class="fade-down" data-toggle-class-target="#animate" style="cursor: default;"><i class="fa fa-key" aria-hidden="true"></i> &nbsp;Change Password</a>
													</th>
												</tr>
												<tr>
													<th>
														<a class="" href="withdraw-request.php"> &nbsp;<i class="fa fa-inr" aria-hidden="true"></i> &nbsp;Withdraw Request</a>
													</th>
												</tr>
											</tbody>
								
										</table> <!-- /.product-review -->
										<!-- /.payment-option -->
									
									</div> <!-- /.order-review -->
								</div> <!-- /.order-confirm-sheet -->
							</div>
							<div class="col-lg-7">
								<h2 class="main-title">Welcome To BlackCresent Partners</h2>
								<div class="user-profile-data">
<div class="element-section">
				<div class="team-business our-team">
					<div class="container">
						<div class="row">
								<div class="single-team-member">
									<div class="wrapper d-sm-flex">
										<div class="img-box">
											<img style="width: 100%;
            height:260px;
            overflow:hidden;" src="hitler_admin\upload\client-photo/<?php echo $_SESSION['photo'];  ?>" alt="">
            <!-- img style="width: 300px;
            height:80px;
            overflow:hidden;" src="hitler_admin\upload\client-sign/<?php echo $_SESSION['sign'];  ?>" alt="" class="signature" -->
										</div>
										<div class="info-meta">
											<h6 class="name"><?php 
											
											echo $name;  ?></h6><br>
										<p><b>Client ID :&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;  </b><?php echo $_SESSION['client_id'];  ?></p><br>
									    <p><b>Birth Date : &nbsp;&nbsp; &nbsp;&nbsp;</b><?php echo $row['bdate'];  ?></p><br>

										<p><b>Aadhar No. :  &nbsp;&nbsp;  </b><?php echo $row['adhar'];  ?></p><br>
									    <p><b>PAN No. : &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; </b><?php echo $row['pan'];  ?></p>
											
										</div>
									</div>
								</div> <!-- /.single-team-member -->
							
						
						</div> <!-- /.row -->
					</div> <!-- /.container -->
				</div> <!-- /.team-business -->
			</div>
									</div> <!-- /.row -->
								</div> <!-- /.user-profile-data -->
							</div> <!-- /.col- -->

							
					</form> <!-- /.checkout-form -->
				</div> <!-- /.container -->
			</div> <!-- /.checkout-section -->

 <!-- .modal -->
	        <div id="m-a-a" class="modal fade" data-backdrop="true">
	          <div class="modal-dialog animate" id="animate">
	            <div class="modal-content">  <form action="" method="POST" autocomplete="off">
	              <div class="modal-header">	             

	                <h5 class="modal-title">Change Password </h5>
	              </div>
	              <div class="modal-body text-center p-lg">
	                 <div class="theme-form-style-two">
                       <input type="password" name="old_pwd" id="old_pwd" placeholder="Enter Your old Password" required="">
                       
                        <input type="password" name="new_pwd" id="new_pwd"  minlength="8" placeholder="Enter New Password" required="">
                        
                        <input type="text" name="new_c_pwd" id="new_c_pwd" placeholder="re-enter New Password" required=""><span id='message'></span>
                                    <!-- center>
                                    <input  class="btn btn-dark btn-lg" type="Submit" name="contact" value="Submit"></center -->
                               
                                </div>
	              </div>
	              <div class="modal-footer">
	            <button type="submit" name="change_pwd" class="btn btn-primary" >Submit</button>
	                <button type="button" class="btn btn-white" data-dismiss="modal">Cancel</button>
	              </div> </form>
	            </div><!-- /.modal-content -->
	          </div>
	        </div>
	        <!-- / .modal -->


			<?php

include "footer.php";

			?>


	        <!-- Scroll Top Button -->
			<button class="scroll-top tran3s">
				<i class="fa fa-angle-up" aria-hidden="true"></i>
			</button>
			


		<!-- Optional JavaScript _____________________________  -->

    	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
    	<!-- jQuery -->
    	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

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
		<!-- js ui -->
		<script src="vendor/jquery-ui/jquery-ui.min.js"></script>
		<!-- Select js -->
		<script src="vendor/selectize.js/selectize.min.js"></script>
		<!-- owl.carousel -->
		<script src="vendor/owl-carousel/owl.carousel.min.js"></script>
<script>$('#new_pwd, #new_c_pwd').on('keyup', function () {
    if ($('#new_pwd').val() == $('#new_c_pwd').val()) {
        $('#message').html('').css('color', 'green');
    } else 
        $('#message').html('Not Matching').css('color', 'red');
});</script>

		<!-- Theme js -->
		<script src="js/theme.js"></script>
		</div> <!-- /.main-page-wrapper -->
	</body>
</html>