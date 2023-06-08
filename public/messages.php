<?php include '../pageIncludes/emptyLayoutTop.inc.php'; ?>


    <style>
    html{
        scroll-behavior: smooth;
    }
</style>
    <br>
    <br>
    <br>
    <a id="top" href="#bottom">Go To Last Message <span class="fa fe-arrow-down"></span> </a>
    <br>
    <br>
<?php
$adminID = $_GET['adminID'];
$userID = $_SESSION['id'];
$n = new Userview();
$n->userMessages($adminID, $userID);
?>

    <br>
    <br>
    <a id="bottom" href="#top">Go To First Message <span class="fa fe-arrow-down"></span> </a>












<?php include '../pageIncludes/emptyLayoutBottom.inc.php'; ?>

