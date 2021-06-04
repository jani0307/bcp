<?php
session_start();

	if(isset($_SESSION['easyweb_login_pc'])) {

	    $data = 1;

	    include "config/dbconfig.php";

		include "partials/header.php";
		include "partials/navbar.php";
		include "partials/sidebar.php";

		$query = "SELECT * FROM `users` WHERE `role_id`>2";
		$users = mysqli_query($mysqli, $query);

?>
<!-- START CONTENT -->
<section id="content">
	<!--breadcrumbs start-->
	<div id="breadcrumbs-wrapper">
		<div class="container">
			<div class="row">
				<div class="col s10 m6 l6">
					<h5 class="breadcrumbs-title">Users</h5>

				</div>
				<div class="col s2 m6 l6">
					<ol class="breadcrumbs right-align">
						<li><a href="index.php">Dashboard</a></li>
						<li class="active">USERS</li>
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
			<div class="row mt-1">
				<div class="col s12 m12 l12">
					<div class="card">
						<div class="card-body">
							<div id="card-reveal" class="section">
								<h4 class="header center-align">Users Management</h4>
								<div class="row">
									<div class="col s12 m12 l12" style="margin-left: 2%; width: 95%">
                                        <table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th class="th-sm">#
                                                    </th>
                                                    <th class="th-sm">Name
                                                    </th>
                                                    <th class="th-sm">Phone
                                                    </th>
                                                    <th class="th-sm">Office
                                                    </th>
                                                    <th class="th-sm">Address
                                                    </th>
                                                    <th class="th-sm">User Type
                                                    </th>
                                                    <th class="th-sm">Profile
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                <?php
                                    while ( $row = mysqli_fetch_assoc($users) ):
                                ?>
                                            <tr>
                                                <td><?= $row['id']; ?></td>
                                                <td><?= $row['name']; ?></td>
                                                <td><?= $row['phone']; ?></td>
                                                <td><?= $row['cmp_name']; ?></td>
                                                <td><?= $row['cmp_address']; ?></td>
                                                <td>
                                    <?php
                                    $role = $row['role_id'];
                                            if($role == 3 ):
                                                echo "Company Owner";
                                            elseif ($role == 4):
                                                echo "Company Employee";
                                            elseif ($role == 5):
                                                echo "Profile Not Complete";
                                            endif;

                                    ?>
                                                </td>
                                                <td>
                                                    <img src="./apis/uploads/users/<?= $row['image']; ?>" width="75px" alt="">
                                                </td>
                                            </tr>
                                <?php
                                    endwhile;
                                ?>
                                            </tbody>
                                        </table>
									</div>
								</div>
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
<!--swal({
title: 'Success',
icon: 'success'
})-->
<?php
		include "partials/footer.php";

	}else{
		header("Location: login.php");

	}
// fX1YKp6iuVgTZWEqR0NztOl42hrAB7DQensPM3Lk9cySbvo8IC3hz2j8AUbMoyrwD4OTvgRfFE0VGcW6
?>

