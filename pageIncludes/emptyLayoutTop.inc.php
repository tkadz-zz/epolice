<?php include 'autoloader.inc.php' ?>
<?php /*include 'sessionFilter.inc.php' */?>
<?php include 'header.inc.php' ?>
<?php include 'sidebar.inc.php' ?>
<?php include 'navbar.inc.php' ?>
<?php include 'error_report.inc.php'; ?>
<?php



//LOGOUT METHOD
if (isset($_GET['logout']) && ($_GET['logout'] == 'true')) {
    $newlogout = new AuthenticationContr();
    $newlogout->logout();
}
?>

<?php
$userView = new Userview();
$defaultView = new DefaultView();
$defaultContr = new DefaultContr();
$pegingView = new PignationView();
?>


<?php
//BACK BUTTON METHOD
$myurl = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
if (strpos($myurl, $_SESSION['role'].'/dashboard.php') !== false) {
}
else{
    ?>
    <!--<br>
    <div class="btn btn-outline-secondary btn-sm rounded text-decoration-none" data-size="large"><a href="javascript:history.back()" class="fb-xfbml-parse-ignore"><span class="fa fa-chevron-circle-left"></span> Back</a></div>
    <br>
    <br>-->
    <div class="pb-2">
        <a class="btn btn-sm shadow-sm" href="javascript:history.back()"><span class="ri-arrow-left-line"></span></a>
    </div>
    <?php
}
?>


