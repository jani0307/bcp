<?php
session_start();

    if(isset($_SESSION['easyweb_login_pc'])) {

        include "partials/header.php";
        include "partials/navbar.php";
        include "partials/sidebar.php";
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
                    <div class="card">
                        <div class="card-body">
                            <div id="card-reveal" class="section">
                                <h4 class="header center-align">Approve Disapprove Adds</h4>
                                <div class="row">
                                    <div class="col s12">
                                        <form action="" method="post">
                                            <div class="input-field col s12 m6 l6">
                                                <select class="icons">
                                                    <option value="" disabled selected>Choose your option</option>
                                                    <option value="" data-icon="images/avatar/avatar-1.png"
                                                            class="circle">Diamond Co.
                                                    </option>
                                                    <option value="" data-icon="images/avatar/avatar-1.png"
                                                            class="circle">Diamond & Sons Co.
                                                    </option>
                                                    <option value="" data-icon="images/avatar/avatar-1.png"
                                                            class="circle">Diamong Pvt Ltd.
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
                                            <div class="col s12 m4 l4">
                                                <div class="card">
                                                    <div class="card-image waves-effect waves-block waves-light">
                                                        <img class="activator" src="images/gallary/12.png" alt="office">
                                                    </div>
                                                    <div class="card-content">
                                                        <span class="card-title activator grey-text text-darken-4">Advertise 1
<!--                                                            <i class="material-icons right">more_vert</i>-->
                                                        </span>
                                                        <p>
<!--                                                            <a href="?disapprove=1" class="btn red">Disapprove</a>-->
                                                            <a class="btn green">Approved</a>
                                                        </p>
                                                    </div>
                                                    <div class="card-reveal">
                                                        <span class="card-title grey-text text-darken-4">Advertise 1
                                                            <i class="material-icons right">close</i>
                                                        </span>
                                                        <p>This advertise has been approved by you 2 weeks ago.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col s12 m4 l4">
                                                <div class="card">
                                                    <div class="card-image waves-effect waves-block waves-light">
                                                        <img class="activator" src="images/gallary/9.png" alt="office">
                                                    </div>
                                                    <div class="card-content">
                                                        <span class="card-title activator grey-text text-darken-4">Advertise 2
                                                            <i class="material-icons right">more_vert</i>
                                                        </span>
                                                        <p>
                                                            <a class="btn red">Disapproved</a>
                                                        </p>
                                                    </div>
                                                    <div class="card-reveal">
                                                        <span class="card-title grey-text text-darken-4">Advertise 2
                                                            <i class="material-icons right">close</i>
                                                        </span>
                                                        <p>This advertise has been disapproved by you 2 days ago.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col s12 m4 l4">
                                                <div class="card">
                                                    <div class="card-image waves-effect waves-block waves-light">
                                                        <img class="activator" src="images/gallary/21.png" alt="office">
                                                    </div>
                                                    <div class="card-content">
                                                        <span class="card-title activator grey-text text-darken-4">Advertise 3
                                                            <i class="material-icons right">more_vert</i>
                                                        </span>
                                                        <p>
                                                            <a href="?disapprove=32" class="btn red">Disapprove</a>
                                                            <a href="?approve=32" class="btn green">Approve</a>
                                                        </p>
                                                    </div>
                                                    <div class="card-reveal">
                                                        <span class="card-title grey-text text-darken-4">Advertise 3
                                                            <i class="material-icons right">close</i>
                                                        </span>
                                                        <p>This advertise needs action. If the advertise is passing all the requirements then approve it. If you founds any problem with this advertise then disapprove it.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col s12 m4 l4">
                                                <div class="card">
                                                    <div class="card-image waves-effect waves-block waves-light">
                                                        <img class="activator" src="images/gallary/18.png" alt="office">
                                                    </div>
                                                    <div class="card-content">
                                                        <span class="card-title activator grey-text text-darken-4">Advertise 3
                                                            <i class="material-icons right">more_vert</i>
                                                        </span>
                                                        <p>
                                                            <a href="?disapprove=32" class="btn red">Disapprove</a>
                                                            <a href="?approve=32" class="btn green">Approve</a>
                                                        </p>
                                                    </div>
                                                    <div class="card-reveal">
                                                        <span class="card-title grey-text text-darken-4">Advertise 3
                                                            <i class="material-icons right">close</i>
                                                        </span>
                                                        <p>This advertise needs action. If the advertise is passing all the requirements then approve it. If you founds any problem with this advertise then disapprove it.</p>
                                                    </div>
                                                </div>
                                            </div>
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

