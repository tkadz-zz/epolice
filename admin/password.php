<?php include '../pageIncludes/emptyLayoutTop.inc.php'; ?>

<nav style="--bs-breadcrumb-divider: '';">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home / </a></li>
        <li class="breadcrumb-item"><a href="password.php">Password</a></li>
    </ol>
</nav>






<?php

$n = new DefaultView();
$n->viewChangePassword();

?>







<?php include '../pageIncludes/emptyLayoutBottom.inc.php'; ?>
