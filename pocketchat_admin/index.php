<?php
session_start();

    if(isset($_SESSION['easyweb_login_pc'])) {

	    include "query_results.php";

        include "partials/header.php";
        include "partials/navbar.php";
        include "partials/sidebar.php";
?>
		<!-- START CONTENT -->
		<section id="content">
            <!--breadcrumbs start-->
            <div id="breadcrumbs-wrapper">
                <!-- Search for small screen -->
<!--                <div class="header-search-wrapper grey lighten-2 hide-on-large-only">-->
<!--                    <input type="text" name="Search" class="header-search-input z-depth-2" placeholder="Explore Materialize">-->
<!--                </div>-->
                <div class="container">
                    <div class="row">
                        <div class="col s10 m6 l6">
                            <h5 class="breadcrumbs-title">Dashboard</h5>

                        </div>
                        <div class="col s2 m6 l6">
                            <ol class="breadcrumbs right-align">
<!--                                <li><a href="index.html">Dashboard</a></li>-->
                                <li class="active">Dashboard</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!--breadcrumbs end-->
			<!--start container-->
			<div class="container">
				<!--card stats start-->
				<div id="card-stats">
					<div class="row">
						<div class="col s12 m6 l6">
							<div class="card gradient-45deg-light-blue-cyan gradient-shadow min-height-100 white-text">
								<div class="padding-4">
									<div class="col s7 m7">
										<i class="material-icons background-round mt-5">location_city</i>
										<p>Companies</p>
									</div>
									<div class="col s5 m5 right-align">
										<h5 class="mb-0"><?= $cmp_total_pr; ?>%</h5>
										<p class="no-margin">Overall</p>
										<p><?= $cmp_total; ?></p>
									</div>
								</div>
							</div>
						</div>
						<div class="col s12 m6 l6">
							<div class="card gradient-45deg-red-pink gradient-shadow min-height-100 white-text">
								<div class="padding-4">
									<div class="col s7 m7">
										<i class="material-icons background-round mt-5">perm_identity</i>
										<p>Employees</p>
									</div>
									<div class="col s5 m5 right-align">
										<h5 class="mb-0"><?= $emp_total_pr; ?>%</h5>
										<p class="no-margin">New</p>
										<p><?= $emp_total; ?></p>
									</div>
								</div>
							</div>
						</div>
						<div class="col s12 m6 l6">
							<div class="card gradient-45deg-amber-amber gradient-shadow min-height-100 white-text">
								<div class="padding-4">
									<div class="col s7 m7">
										<i class="material-icons background-round mt-5">account_circle</i>
										<p>Users</p>
									</div>
									<div class="col s5 m5 right-align">
										<h5 class="mb-0"><?= 100; ?>%</h5>
										<p class="no-margin">Overall</p>
										<p><?= $usr_total; ?></p>
									</div>
								</div>
							</div>
						</div>
						<div class="col s12 m6 l6">
							<div class="card gradient-45deg-green-teal gradient-shadow min-height-100 white-text">
								<div class="padding-4">
									<div class="col s7 m7">
										<i class="material-icons background-round mt-5">panorama</i>
										<p>Advertisements</p>
									</div>
									<div class="col s5 m5 right-align">
										<h5 class="mb-0"><?= $ads_total_pr; ?>%</h5>
										<p class="no-margin">Unique</p>
										<p><?= $ads_total; ?></p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- //////////////////////////////////////////////////////////////////////////// -->
			</div>
			<!--end container-->
		</section>
		<!-- END CONTENT -->
<?php
	include "partials/footer.php";

    }else{
		    header("Location: login.php");

    }
?>

