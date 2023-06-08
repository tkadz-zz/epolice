<?php include '../pageIncludes/emptyLayoutTop.inc.php'; ?>

<?php
$userRows = $defaultContr->GetUserByID($_GET['userID']);
$isUser = $defaultContr->isUser($userRows[0]['id'], $userRows[0]['role']);
?>

<nav style="--bs-breadcrumb-divider: '';">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#!">Home / </a></li>
        <li class="breadcrumb-item"><a href="#!">Students /</a></li>
        <li class="breadcrumb-item"><a href="#!"><?= $isUser[0]['surname'] ?>  <?= $isUser[0]['name'] ?> <?php if($userRows[0]['role'] == 'student'){ echo $isUser[0]['secondName']; } ?> </a></li>
    </ol>
</nav>

<?php

$n = new DefaultView();
$n->userProfile($_GET['userID']);

?>








<?php include '../pageIncludes/emptyLayoutBottom.inc.php'; ?>