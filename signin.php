<?php include 'pageIncludes/autoloaderIndex.inc.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title><?php
        $n = new DefaultView();
        $n->viewWebShortName();
        ?></title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <!--<link href="assets/img/favicon.png" rel="icon">-->
    <link href="<?= $n->viewWebLogo() ?>" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">


    <!-- =======================================================
    * Template Name: NiceAdmin
    * Updated: Mar 09 2023 with Bootstrap v5.2.3
    * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
</head>

<body>

<main>
    <div class="container">

        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-12 d-flex flex-column align-items-center justify-content-center">

                        <div class="d-flex justify-content-center py-4">
                            <a href="index.php" class="logo d-flex align-items-center w-auto">
                                <!--<img src="assets/img/logo.png" alt="">-->
                                <img src="<?= $n->viewWebLogo(); ?>" alt="">
                                <span class="d-none d-lg-block">
                                    <?php
                                    if(isset($_SESSION['role'])){
                                        $role = $_SESSION['role'];
                                        echo "<script>
                                                    window.location='$role/';
                                                </script>";
                                    }
                                    $n = new DefaultView();
                                    $n->viewWebFullName();
                                    ?></span>
                            </a>
                        </div><!-- End Logo -->


                        <section class="section profile">
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body pt-3">
                                            <ul class="nav nav-tabs nav-tabs-bordered">

                                                <li class="nav-item">
                                                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#login">Login</button>
                                                </li>

                                                <li class="nav-item">
                                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#register">Register</button>
                                                </li>

                                                <li class="nav-item">
                                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#tipoff">Tip-off</button>
                                                </li>

                                                <li class="nav-item">
                                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#mostwanted">Most Wanted</button>
                                                </li>

                                            </ul>

                                            <br>
                                            <br>
                                            <div class="text-center">
                                                <?php include 'pageIncludes/error_report.inc.php'; ?>
                                            </div>


                                            <div class="tab-content pb-2">
                                                <div class="tab-pane fade show active " id="login">

                                                    <div>
                                                        <div class="pt-4 pb-2">
                                                            <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                                                            <p class="text-center small">Enter your Email & password to login</p>
                                                        </div>

                                                        <form class="row g-3 needs-validation" novalidate method="POST" action="includesDefault/authentication.inc.php">

                                                            <div class="col-6">
                                                                <label for="yourLoginID" class="form-label">LoginID</label>
                                                                <div class="input-group has-validation">
                                                                    <input type="text" name="loginID" class="form-control" id="yourLoginID" value="<?php
                                                                    if(isset($_GET['loginID'])){
                                                                        echo $_GET['loginID'];
                                                                    }
                                                                    else{
                                                                        '';
                                                                    }
                                                                    ?>" required>
                                                                    <div class="invalid-feedback">Please enter your LoginID.</div>
                                                                </div>
                                                            </div>

                                                            <div class="col-6">
                                                                <label for="yourPassword" class="form-label">Password</label>
                                                                <input type="password" name="password" class="form-control" id="yourPassword" required>
                                                                <div class="invalid-feedback">Please enter your password!</div>
                                                            </div>


                                                            <div class="col-12">
                                                                <button name="btn_signin" class="btn btn-primary w-100" type="submit">Login</button>
                                                            </div>
                                                        </form>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="tab-content pt-2">
                                                <div class="tab-pane fade show profile-overview" id="register">

                                                    <div>
                                                        <div class="pt-4 pb-2">
                                                            <h5 class="card-title text-center pb-0 fs-4">Register Your Account</h5>
                                                            <p class="text-center small">Enter required details below</p>
                                                        </div>

                                                        <form class="row g-3 needs-validation" novalidate method="POST" action="includesDefault/authentication.inc.php">

                                                            <div class="col-6">
                                                                <label for="yourLoginID" class="form-label">Login -ID</label>
                                                                <div class="input-group has-validation">
                                                                    <input type="text" name="loginID" class="form-control" id="yourLoginID" minlength="5" placeholder="Login-ID" required>
                                                                    <div class="invalid-feedback">Please enter your Login-ID.</div>
                                                                </div>
                                                            </div>

                                                            <div class="col-6">
                                                                <label for="yourLoginID" class="form-label">Phone</label>
                                                                <div class="input-group has-validation">
                                                                    <input type="number" name="phone" class="form-control" id="yourLoginID" placeholder="Phone number..." required>
                                                                    <div class="invalid-feedback">Please enter your Phone Number.</div>
                                                                </div>
                                                            </div>

                                                            <div class="col-6">
                                                                <label for="yourLoginID" class="form-label">Name</label>
                                                                <div class="input-group has-validation">
                                                                    <input type="text" name="name" class="form-control" id="yourLoginID" required placeholder="Name...">
                                                                    <div class="invalid-feedback">Please enter your Name.</div>
                                                                </div>
                                                            </div>

                                                            <div class="col-6">
                                                                <label for="yourLoginID" class="form-label">Surname</label>
                                                                <div class="input-group has-validation">
                                                                    <input type="text" name="surname" class="form-control" id="yourLoginID" required placeholder="Surname...">
                                                                    <div class="invalid-feedback">Please enter your Surname.</div>
                                                                </div>
                                                            </div>

                                                            <div class="col-12 pb-2">
                                                                <label for="yourLoginID" class="form-label">National ID</label>
                                                                <div class="input-group has-validation">
                                                                    <input type="text" name="nationalID" class="form-control" id="yourLoginID" minlength="10" required placeholder="National-ID...">
                                                                    <div class="invalid-feedback">Please enter your National-ID.</div>
                                                                </div>
                                                            </div>


                                                            <div class="col-md-6">
                                                                <label class="labels">New Password</label>
                                                                <div class="input-group -has-validation">
                                                                    <input type="password" name="np" class="form-control" id="password" onkeyup='check();' minlength="8" required placeholder="Password...">
                                                                    <div class="invalid-feedback">Please enter your Password (8 characters minimum).</div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label class="labels">Confirm New Password</label>
                                                                <div class="input-group -has-validation">
                                                                    <input id="confirmPassword" name="cp" type="password" class="form-control" onkeyup='check();' minlength="8" placeholder="Confirm New Password" required>
                                                                    <div class="invalid-feedback">Please enter your Confirm Password (8 characters minimum).</div>
                                                                </div>
                                                            </div>

                                                            <script>
                                                                var check = function() {
                                                                    if (document.getElementById('password').value ==
                                                                        document.getElementById('confirmPassword').value) {
                                                                        document.getElementById('message').style.color = 'green';
                                                                        document.getElementById("btn_register").disabled = false;
                                                                        document.getElementById('message').innerHTML = '<div id="divDis" class="animated--grow-in fadeout my-3 p-3 bg-white rounded shadow-sm alert alert-success"><span class="fa fa-check-circle"></span>Password matched</div>';
                                                                    }
                                                                    else {
                                                                        document.getElementById('message').style.color = 'red';
                                                                        document.getElementById("btn_register").disabled = true;
                                                                        document.getElementById('message').innerHTML = '<div class="animated--grow-in fadeout my-3 p-3 bg-white rounded shadow-sm alert alert-danger"><span class="fa fa-exclamation-circle"></span>New Password not matching Confirm Password</div>';
                                                                    }
                                                                }
                                                            </script>

                                                            <div>

                                                                <span id='message'></span>

                                                            </div>


                                                            <!--
                                                            <div class="col-12">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                                                                    <label class="form-check-label" for="rememberMe">Remember me</label>
                                                                </div>
                                                            </div>
                                                            -->
                                                            <div class="col-12">
                                                                <button name="btn_register" id="btn_register" class="btn btn-primary w-100" type="submit">Register</button>
                                                            </div>
                                                        </form>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="tab-content pt-2">
                                                <div class="tab-pane fade show" id="tipoff">

                                                    <?php $n = new Userview(); $n->viewTipOffPublic() ?>

                                                </div>
                                            </div>

                                            <div class="tab-content pt-2">
                                                <div class="tab-pane fade show profile-edit" id="mostwanted">

                                                    <div>
                                                        <div class="pt-4 pb-2">
                                                            <h5 class="card-title text-center pb-0 fs-4">Most Wanted List</h5>
                                                            <p class="text-center small">List of most wanted & dangerous people</p>
                                                        </div>

                                                        <?php
                                                        $n = new Userview();
                                                        $n->viewMostWantedToPublic();
                                                        ?>

                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>





                    </div>
                    <div class="credits">
                        <!-- All the links in the footer should remain intact. -->
                        <!-- You can delete the links only if you purchased the pro version. -->
                        <!-- Licensing information: https://bootstrapmade.com/license/ -->
                        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                        <!--Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>-->
                    </div>
                </div>
            </div>

        </section>

    </div>
</main><!-- End #main -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/chart.js/chart.umd.js"></script>
<script src="assets/vendor/echarts/echarts.min.js"></script>
<script src="assets/vendor/quill/quill.min.js"></script>
<script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
<script src="assets/vendor/tinymce/tinymce.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>



</body>

</html>
