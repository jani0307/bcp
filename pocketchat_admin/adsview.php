<?php
session_start();

    if(isset($_SESSION['easyweb_login_pc'])) {

        include "partials/header.php";
        include "partials/navbar.php";
        include "partials/sidebar.php";

	    include "config/dbconfig.php";

        $query = "SELECT `id`, `name`, `image` FROM `users` WHERE id IN (SELECT user_id FROM `ads`)";

        $query_users = mysqli_query($mysqli, $query);

?>
<!-- START CONTENT -->
<section id="content">
    <!--breadcrumbs start-->
    <div id="breadcrumbs-wrapper">
        <div class="container">
            <div class="row">
                <div class="col s10 m6 l6">
                    <h5 class="breadcrumbs-title">Manage Ads</h5>
                </div>
                <div class="col s2 m6 l6">
                    <ol class="breadcrumbs right-align">
                        <li><a href="index.php">Dashboard</a></li>
                        <li class="active">ADS</li>
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
                    <div class="card min-height-300">
                        <div class="card-body">
                            <div id="card-reveal" class="section">
                                <h4 class="header center-align">Approve Disapprove Adds</h4>
                                <div class="row">
                                    <div class="col s12">
                                        <form action="" method="post" class="form">
                                            <div class="input-field col s12 m6 l6">
                                                <select class="icons" name="ads_user">
                                                    <option value="" disabled selected>Choose your option</option>
                                <?php

                                    while($row = mysqli_fetch_assoc($query_users)) {
                                ?>
                                                <option value="<?= $row['id'] ?>" data-icon="images/avatar/<?= $row['image']; ?>"
                                                        class="circle"><?= $row['name']; ?>
                                                </option>
                                <?php
                                    }
                                ?>
                                                    <option value="" data-icon="images/avatar/avatar-1.png"
                                                            class="circle">Diamond Co.
                                                    </option>
                                                </select>
                                                <label>Select User</label>
                                            </div>
                                            <div class="input-field col s12 m6 l6">
                                                <button class="btn cyan waves-effect waves-light right" type="submit"
                                                        name="action">Submit
                                                    <i class="material-icons right">send</i>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col s12 m12 l12">
                                        <div class="row">
                <?php

                    $user_id = isset($_POST['ads_user']) ? $_POST['ads_user'] : 1;

                    $usr_profile_query = "SELECT * FROM `users` WHERE id=$user_id";

                    $user_profile = mysqli_query($mysqli, $usr_profile_query);

                    $user = mysqli_fetch_row($user_profile);

                ?>

                                            <div class="col s12 m12 l12">
                                                <div class="card border-none border-bottom-0">

                                                    <div class="row ml-10">
                                                        <div class="col s12 m6 l6 float-right d-flex justify-content-center" style="float: right;">
                                                            <div class="row">
                                                                <div class="col s3 m4 l4"></div>
                                                                <div class="col s6 m4 l4">
                                                                    <img src="images/avatar/<?= $user[6] ?>" alt="" class="card-profile-image" style="align: center" height="100">
                                                                </div>
                                                                <div class="col s3 m4 l4"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col s12 m6 l6 mt-2">
                                                            <div class="col s6 m4 l4">
                                                                <label>Name : </label>
                                                            </div>
                                                            <div class="col s6 m8 l8"><?= $user[2] ?></div>
                                                            <br />
                                                            <div class="col s6 m4 l4">
                                                                <label>Phone : </label>
                                                            </div>
                                                            <div class="col s6 m8 l8"><?= $user[1] ?></div>
                                                            <br />
                                                            <div class="col s6 m4 l4">
                                                                <label>Company : </label>
                                                            </div>
                                                            <div class="col s6 m8 l8"><?= $user[4] ?></div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                <?php
                    $ads_query = "SELECT * FROM `ads` WHERE user_id=$user_id AND status!=0";

                    $ads = mysqli_query($mysqli, $ads_query);

                        $count = 0;
                        while ($row = mysqli_fetch_assoc($ads)) {
                            $count++;
                            $status = $row['status'];

                ?>
                                            <div class="col s12 m4 l4">
                                            <div class="card">
                                                <div class="card-image waves-effect waves-block waves-light">
                                                    <img class="activator" src="apis/uploads/files/<?= $row['image'] ?>" alt="office">
                                                </div>
                                                <div class="card-content">
                                                        <span class="card-title activator grey-text text-darken-4">Advertise <?= $count; ?>
                                                            <i class="material-icons right">more_vert</i>
                                                        </span>
                                                    <p>
                        <?php
                            if($status == 3) :
                                $msg = "This advertise needs action. If the advertise is passing all the requirements then approve it. If you founds any problem with this advertise then disapprove it.";
                        ?>
                                                <form action="adsManage.php" method="post">
                                                        <input type="hidden" name="id" value="<?= $row['id']; ?>">

                                                        <button type="submit" name="approve" class="btn green">Approve</button>
                                                        <button type="submit" name="disapprove" class="btn red">Disapprove</button>

                                                </form>

                        <?php
                            elseif ($status == 2):
                                $msg = "This advertise has been disapproved by you some time ago.";
                        ?>
                                                <a class="btn red">Disapproved</a>
                        <?php
                            elseif ($status == 1):
                                $msg = "This advertise has been approved by you some time ago.";
                        ?>
                                                <a class="btn green">Approved</a>
                        <?php
                            else:
                                                    echo NULL;
                            endif;
                        ?>
                                                    </p>
                                                </div>
                                                <div class="card-reveal">
                                                        <span class="card-title grey-text text-darken-4">Advertise <?= $row['id']; ?>
                                                            <i class="material-icons right">close</i>
                                                        </span>
                                                    <p>
                                    <?php

                                        if($status == 2 ):
                                    echo $msg . "<br /><br />Wants to Change?<br />";

                                    ?>
                                            <form action="adsManage.php" method="post">
                                                <input type="hidden" name="id" value="<?= $row['id']; ?>">
                                                <button type="submit" name="approve" class="btn green">Approve</button>
                                            </form>
                                    <?php
                                        elseif ($status == 1):
                                            echo $msg . "<br /><br />Wants to Change?<br />";
                                    ?>
                                            <form action="adsManage.php" method="post">
                                                <input type="hidden" name="id" value="<?= $row['id']; ?>">
                                                <button type="submit" name="disapprove" class="btn red">Disapprove</button>
                                            </form>
                                    <?php
                                        else :
                                            echo $msg . "<br /><br />";
                                    ?>
                                            <form action="adsManage.php" method="post">
                                                <input type="hidden" name="id" value="<?= $row['id']; ?>">
                                                <button type="submit" name="approve" class="btn green">Approve</button>
                                                <button type="submit" name="disapprove" class="btn red">Disapprove</button>
                                            </form>
                                    <?php
                                        endif;
                                    ?>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                <?php

                        }
                ?>
                                        </div>
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

