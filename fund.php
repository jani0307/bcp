<?php
include "session.php";
include "db.php";

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
<style type="text/css">
	@media screen and (max-width: 500px){
.char {
   overflow: auto;
}
		    .team-business .single-team-member .info-meta {
    padding-left: 40px;
    width: 600px; 
}
.cart-list-form .table th:first-child {
    font-family: 'gilroy-bold';
    letter-spacing: 1.2px;
     text-align: center; 
}

</style>
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
			<div class="checkout-section pb-50 md-pb-50">
				<div class="container">
					
					<form action="#" class="checkout-form">
						<div class="row">
							<div class="col-lg-5">
								<div class="order-confirm-sheet">
									<h2 class="main-title">Hii <?php echo $name;  ?></h2>
									<div class="order-review" style="border: none;">
										<table class="product-review">
											<tbody>
											<tr>
												<th>
														<a class="theme-btn solid-button-one button-rose radius3 mt-35" href="dashboard.php"><i class="fa fa-home" style="color: #313131;" aria-hidden="true"></i>   <span>Home</span></a>
													</th>
													</tr>
												<!-- tr>
												
													<th>
														<a href="fund.php"><i class="fa fa-inr" aria-hidden="true"></i>  <span>Fund</span></a>
													</th>
												</tr>
												<tr>
													<th>
														<a href="fund.php"><i class="fa fa-user" aria-hidden="true"></i>   <span>Profie</span></a>
													</th>
												</tr -->
											
											</tbody>
								
										</table> <!-- /.product-review -->
										<!-- /.payment-option -->
									
									</div> <!-- /.order-review -->
								</div> <!-- /.order-confirm-sheet -->
							</div>
							<div class="col-lg-7">
			         			<div class="row">
								<div class="col-lg-6 col-md-6">
								<div class="feature-block-two text-center" data-aos="fade-up">
									<img src="images/icon/icon11.svg" alt="" class="icon">
									<h5 class="pt-25 pb-35">INR. <?php echo $row['fund'];  ?>/-</h5>
									<p>Initial Investment Amount</p>
								</div> <!-- /.feature-block-two -->
							</div> <!-- /.col- -->
							<div class="col-lg-6 col-md-6">
								<div class="feature-block-two text-center" data-aos="fade-up" data-aos-delay="100">
									<img src="images/icon/icon12.svg" alt="" class="icon">
									<h5 class="pt-25 pb-35">INR. <?php echo $row['c_amount'];  ?>/-</h5>
									<p>Current Fund Value </p>
								</div> <!-- /.feature-block-two -->
							</div> <!-- /.col- -->
						</div><br>
							 <div id="chart_div"></div> 

								</div> <!-- /.user-profile-data -->
							</div> <!-- /.col- -->
							
								 
   
   <br><br>
  	<div class="char" class="col-lg-12 col-md-12" style="">
    <div id="chart_div2" style="width: 1200px; height: 500px;"></div>
    <button class="btn btn-dark" id="change-chart">Change to Classic</button>
    <br>
						</div>	

							
					</form> <!-- /.checkout-form 
							<div class="promo-code-section mt-10 mb-50 md-mt-10 md-mb-50">
				<p><span>Your Initial Amount Transaction Viewed Here</span></p>
			</div>-->

										
			<!-- 
			=============================================
				Cart Page
			============================================== 
			-->
			




				</div> <!-- /.container -->
			</div> <!-- /.checkout-section -->



			<?php

include "footer.php";

	$client_id=$_SESSION['client_id'];
$qry6="SELECT * FROM bcp_monthly_update WHERE `client_id`='$client_id'";
$result = mysqli_query($conn,$qry6);

 while ($row = mysqli_fetch_assoc($result)) {
 $fund = $row['fund_value'];
 for ($i=01; $i <= 9 ; $i++) { 
 	$$i=$row['0'.$i];
 }
 for ($i=10; $i <= 12 ; $i++) { 
 	$$i=$row[$i]; 
 }
 $j=101;
 	for ($i=01; $i <= 12 ; $i++ ,$j++) { 
 		
 		if ($$i == '0') {
 			$$j = '0';
 			}
 			elseif ($fund <= $$i) {
 				$$j= '0';
 			}
 			else{
 				$temp = $fund-$$i;
 				$$j = $temp; 
 				$$i = '0';
 			}

}
}
 			?>


	        <!-- Scroll Top Button -->
			<button class="scroll-top tran3s">
				<i class="fa fa-angle-up" aria-hidden="true"></i>
			</button>
			


		<!-- Optional JavaScript _____________________________  -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart', 'bar']});
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {

        var button = document.getElementById('change-chart');
        var chartDiv = document.getElementById('chart_div2');
<?php 
           
             
             ?>
        var data = google.visualization.arrayToDataTable([
          ['Months', 'Profit', 'Loss'],
          ['jan', <?php $a='1'; echo $$a; ?> , <?php $m='101'; echo $$m  ?>],
          ['feb', <?php $b='2'; echo $$b; ?> , <?php $o='102'; echo $$o  ?>],
          ['mar', <?php $c='3'; echo $$c; ?> , <?php $p='103'; echo $$p  ?>],
          ['apr', <?php $d='4'; echo $$d; ?> , <?php $q='104'; echo $$q  ?>],
          ['may', <?php $e='5'; echo $$e; ?> , <?php $r='105'; echo $$r  ?>],
          ['jun', <?php $f='6'; echo $$f; ?> , <?php $s='106'; echo $$s  ?>],
          ['jul', <?php $g='7'; echo $$g; ?> , <?php $t='107'; echo $$t  ?>],
          ['aug', <?php $h='8'; echo $$h; ?> , <?php $u='108'; echo $$u  ?>],
          ['sep', <?php $n='9'; echo $$n; ?> , <?php $v='109'; echo $$v  ?>],
          ['oct', <?php $j='10'; echo $$j; ?> , <?php $w='110'; echo $$w  ?>],
          ['nov', <?php $k='11'; echo $$k; ?> , <?php $x='111'; echo $$x  ?>],
          ['dec', <?php $l='12'; echo $$l; ?> , <?php $y='112'; echo $$y  ?>]
          ]);
        var materialOptions = {
          width: 1200,
          chart: {
            title: 'Monthly Fund Performence',
            subtitle: ''
          },
          series: {
            0: { axis: 'Profit' }, // Bind series 0 to an axis named 'Profit'.
            1: { axis: 'Loss' } // Bind series 1 to an axis named 'Loss'.
          },
          axes: {
            y: {
              Profit: {label: 'Monthly Profit'}, // Left y-axis.
              Loss: {side: 'right', label: 'Monthly Loss'} // Right y-axis.
            }
          }
        };

        var classicOptions = {
          width: 900,
          series: {
            0: {targetAxisIndex: 0},
            1: {targetAxisIndex: 1}
          },
          title: 'BlackCrescent Partners Profit on the left, Loss on the right',
          vAxes: {
            // Adds titles to each axis.
            0: {title: 'Monthly Profit'},
            1: {title: 'Monthly Loss'}
          }
        };

        function drawMaterialChart() {
          var materialChart = new google.charts.Bar(chartDiv);
          materialChart.draw(data, google.charts.Bar.convertOptions(materialOptions));
          button.innerText = 'Change to Classic';
          button.onclick = drawClassicChart;
        }

        function drawClassicChart() {
          var classicChart = new google.visualization.ColumnChart(chartDiv);
          classicChart.draw(data, classicOptions);
          button.innerText = 'Change to Material';
          button.onclick = drawMaterialChart;
        }

        drawMaterialChart();
    };
    </script>
     <?php   $result = mysqli_query($conn ,'SELECT * FROM bcp_update ORDER BY id DESC LIMIT 1') or die('Invalid query: ' . mysql_error()); 
       while ($row = mysqli_fetch_assoc($result)) {
              $update= $row['data'];   }  ?>
    <script type="text/javascript">google.charts.load('current', {packages: ['corechart', 'line']});
google.charts.setOnLoadCallback(drawBackgroundColor);

function drawBackgroundColor() {
      var data = new google.visualization.DataTable();
      data.addColumn('number', 'X');
      data.addColumn('number', 'Status');

      data.addRows([
        [0, 0],   [1, <?php echo "$update"; ?>],   [2, 0]
      ]);

      var options = {
        hAxis: {
          title: 'In 1 (One) Month'
        },
        vAxis: {
          title: 'Percentage (%)'
        },
        backgroundColor: '#f1f8e9'
      };

      var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
      chart.draw(data, options);
    }</script>
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
		<!-- js ui -->
		<script src="vendor/jquery-ui/jquery-ui.min.js"></script>
		<!-- Select js -->
		<script src="vendor/selectize.js/selectize.min.js"></script>
		<!-- owl.carousel -->
		<script src="vendor/owl-carousel/owl.carousel.min.js"></script>


		<!-- Theme js -->
		<script src="js/theme.js"></script>
		</div> <!-- /.main-page-wrapper -->
	</body>
</html>