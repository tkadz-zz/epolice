<?php include '../pageIncludes/emptyLayoutTop.inc.php'; ?>


<?php
$userRows = $defaultContr->GetUserByID($_GET['userID']);
if(count($userRows) > 0){
    $isUser = $defaultContr->isUser($userRows[0]['id'], $userRows[0]['role']);
    $surname = $isUser[0]['surname'];
    $name = $isUser[0]['name'];
    $secondName = '';
    if($userRows[0]['role'] == 'student') {
        $secondName = $isUser[0]['secondName'];
    }
}else{
    $surname = '';
    $name = '';
    $secondName='';
}
?>

<nav style="--bs-breadcrumb-divider: '';">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#!">Home / </a></li>
        <li class="breadcrumb-item"><a href="#!">Students /</a></li>
        <li class="breadcrumb-item"><a href="#!">Update Profile /</a></li>
        <li class="breadcrumb-item"><a href="#!"><?= $surname ?>  <?= $name ?> <?= $secondName ?> </a></li>
    </ol>
</nav>


<?php

$n = new DefaultView();
$n->viewUpdateStudentProfile($_GET['userID']);

?>


<?php include '../pageIncludes/emptyLayoutBottom.inc.php'; ?>


