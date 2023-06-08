<?php include '../pageIncludes/emptyLayoutTop.inc.php'; ?>



    <br>
    <br>
    <a id="top" href="#bottom">Go To Last Message <span class="fa fe-arrow-down"></span> </a>
    <br>
    <br>

<?php
$userID = $_GET['userID'];
$adminID = $_SESSION['id'];
$n = new Userview();
$n->adminMessage($adminID, $userID);
?>





    <br>
    <br>
    <a id="bottom" href="#top">Go To First Message <span class="fa fe-arrow-down"></span> </a>





<?php include '../pageIncludes/emptyLayoutBottom.inc.php'; ?>

