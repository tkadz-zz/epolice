<?php include '../pageIncludes/emptyLayoutTop.inc.php'; ?>

    <nav style="--bs-breadcrumb-divider: '';">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home / </a></li>
            <li class="breadcrumb-item"><a href="#!">Web Settings</a></li>
        </ol>
    </nav>







<?php
    $userView->viewWebSettings();

?>




<?php include '../pageIncludes/emptyLayoutBottom.inc.php'; ?>