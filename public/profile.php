
<?php include '../pageIncludes/emptyLayoutTop.inc.php'; ?>

<nav style="--bs-breadcrumb-divider: '';">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home / </a></li>
        <li class="breadcrumb-item"><a href="profile.php">Profile</a></li>
    </ol>
</nav>


<?php
$defaultView->viewProfileExtended($_SESSION['id']);
?>








<?php include '../pageIncludes/emptyLayoutBottom.inc.php'; ?>

