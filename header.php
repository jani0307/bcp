<?php
include "db.php";

if(isset($_GET['contact'])){
 
    $name = $_GET['name'];
    $email = $_GET['email'];
    $phone = $_GET['phone'];
    $msg = $_GET['msg'];
     // Insert record
     $query = "INSERT INTO `bcp_contact_us`(`name`, `email`, `phone`, `msg` ) VALUES ('$name','$email','$phone','$msg')";
   //  echo "$query";
     $file = $_SERVER["SCRIPT_NAME"];
     $exec= mysqli_query($conn,$query);
  if ($exec) {
     

?>
        <script>alert('Thank You For Connecting With Us.');
    			 window.location="<?php echo $file; ?>" </script>

        <?php 
}
else{    

	?>
        <script>alert('Please Change Email & Try Again !');</script>
        <?php
}
  }

   

?>

<style type="text/css">
	.navbar .dropdown-menu .dropdown-item  {
	font-size: 14px;
	padding: 0 0 0 20px; }

	.navbar-expand-lg .navbar-nav .nav-link{
	    margin: 0 15px;
	}
	
	.theme-main-menu {
			padding-top: 15px;
			}
		
			.theme-form-style-two {
				padding: 5px 60px;
			}
			.theme-form-style-two input {
				margin-bottom: 25px;
			}
			.rogan-hero-section.rogan-hero-three .shape-one {
				background: linear-gradient(134deg, #bcbcbc, #bcbcbc);
			}
				@media screen and (max-width: 500px){
.ctn-preloader .animation-preloader .txt-loading .letters-loading {
    font-size: 35px;
}
}
		</style>

<!-- Preloader -->
			<section>
				<div id="preloader">
					<div id="ctn-preloader" class="ctn-preloader">
						<div class="animation-preloader">
							<div class="icon"><img src="images/1.svg" alt=""></div>
							<div class="txt-loading">
								<span data-text-preloader="B" class="letters-loading">
									B
								</span>
								<span data-text-preloader="C" class="letters-loading">
									C
								</span>
								<span data-text-preloader="P" class="letters-loading">
									P
								</span>
								<span data-text-preloader="" class="letters-loading">
									 
								</span>
								<span data-text-preloader="C" class="letters-loading">
									C
								</span>
								<span data-text-preloader="A" class="letters-loading">
									A
								</span>
								<span data-text-preloader="P" class="letters-loading">
									P
								</span>
								<span data-text-preloader="I" class="letters-loading">
									I
								</span>
								<span data-text-preloader="T" class="letters-loading">
									T
								</span>
								<span data-text-preloader="A" class="letters-loading">
									A
								</span>
								<span data-text-preloader="L" class="letters-loading">
									L
								</span>
							
							</div>
						</div>	
					</div>
				</div>
			</section>



<div class="theme-main-menu theme-menu-two main-p-color sticky-menu">
				<div class="d-flex align-items-center">
					<div class="logo"><a href="index.php"><img src="images/logo/3.png" height="60" width="200" alt=""></a></div>
					<div class="right-content ml-auto order-lg-3">
						<a href="login.php" class="btn btn-secondary">Login</a>
					</div>
					<nav id="mega-menu-holder" class="navbar navbar-expand-lg order-lg-2">
						<div  class="container nav-container">
							<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						        <i class="flaticon-setup"></i>
						    </button>
						   <div class="collapse navbar-collapse" id="navbarSupportedContent">
						   		<ul class="navbar-nav">
								  
								    <li class="nav-item dropdown">
							            <a class="nav-link dropdown-toggle" href="" data-toggle="dropdown">Education</a>
							            <ul class="dropdown-menu">
								            <!--li class="dropdown-submenu dropdown">
								              	<a class="dropdown-item" href="articles.php">Article</a>
								             
								            </li -->
								            <li class="dropdown-submenu dropdown">
								              	<a class="dropdown-item " href="research-report.php">Research Report</a>
								              
								            </li>
								            <li class="dropdown-submenu dropdown">
								              	<a class="dropdown-item" href="knowledge-center.php">Knowledge Center</a>
								              	
								            </li>
								          
							            </ul> <!-- /.dropdown-menu -->
							        </li>
							        <li class="nav-item dropdown" >
							            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Strategy</a>
							            <ul class="dropdown-menu">
								            <li class="dropdown-submenu dropdown">
								              	<a class="dropdown-item" href="macro-and-managed-futures-funds.php">
								              		
								              	Macro &	 Managed Futures Funds
								              	</a>
								              	
								            </li>
								            <li class="dropdown-submenu dropdown">
								            	<a href="event-driven-hedge-funds.php" class="dropdown-item">
								            		Event-Driven Hedge Funds
								            	</a>
								            	
								            </li>
								            <!-- li>
								            	<a href="relative-value-hedge-funds.php" class="dropdown-item">
								            	
								            		Relative Value Hedge Funds
								            	</a>
								        	</li -->
									        <li>
									        	<a href="equity-hedge-funds.php" class="dropdown-item">
									        		
									        		Equity Hedge Funds
									        	</a>
									        </li>
									        <li class="dropdown-submenu dropdown">
								              	<a class="dropdown-item" href="funds-of-hedge-funds.php">
								              
								              		Funds of Hedge Funds
								              	</a>
								              	
								            </li>
							            </ul> <!-- /.dropdown-menu -->
							        </li>
							       
							         <li class="nav-item dropdown">
							            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">About Us</a>
							            <ul class="dropdown-menu">
							            	 <li class="dropdown-submenu dropdown">
								              	<a class="dropdown-item" href="about-us.php">About Us</a>
								             
								            </li>
								            <li class="dropdown-submenu dropdown">
								              	<a class="dropdown-item" href="career.php">Career</a>
								             
								            </li>
								            <li class="dropdown-submenu dropdown">
								              	<a class="dropdown-item" href="why-to-choose-us.php">Why Choose Us</a>
								             
								            </li>
								             <li class="dropdown-submenu dropdown">
								              	<a class="dropdown-item" href="blogs.php">Blogs</a>
								             
								            </li>
								            
							            </ul> <!-- /.dropdown-menu -->
							        </li>
								    <li class="nav-item dropdown">
							            <a class="nav-link" data-toggle="modal" data-target="#m-a-a" data-toggle-class-target="#animate" style="cursor: pointer;">Contact Us</a>
							            
							        </li>
							             
							   </ul>
						   </div>
						</div> 
					</nav> 
				</div>
			</div> <!-- /.theme-main-menu -->
<!-- .modal -->
            <div id="m-a-a" class="modal fade" data-backdrop="true">
              <div class="modal-dialog animate" id="animate">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Contact Us</h5>             
                       <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        <i class="fa fa-times" aria-hidden="true"></i>
                       </button>

                  </div>
                    <div class="theme-form-style-two">
                                <form action="" method="GET" >
                        <input type="text" name="name" id="name" placeholder="Your Name" required="">
                            <input type="email" name="email" id="email" placeholder="Your Email" required="">
                            <input type="number" name="phone" minlength="10" maxlength="12" id="phone" placeholder="Phone Number" required="">
                            <textarea placeholder="Message" id="msg" name="msg"></textarea>
                                    <center>
                                    <input  class="btn btn-dark btn-lg" type="Submit" name="contact" value="Submit"></center>
                                </form>
                            </div>
               <!--    <div class="modal-footer">
                   <button type="button" class="btn btn-white" data-dismiss="modal">No</button> 
                  </div>-->
                </div><!-- /.modal-content -->
              </div>
            </div>
            <!-- / .modal -->