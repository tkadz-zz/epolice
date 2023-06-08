<?php
include("../pageIncludes/autoloader.inc.php");


if(isset($_POST['btn_update_crime_status'])){
    $status = $_POST['status'];
    $caseID = $_POST['caseID'];
    try {
        $n = new Usercontr();
        $n->updateCrimeStatus($status, $caseID);
    }catch (TypeError $e){
        echo 'ERROR: ' . $e->getMessage();
    }
}







if(isset($_POST['updateWebDetails'])){
    $fullName = $_POST['fullName'];
    $shortName = strtoupper($_POST['shortName']);
    $description = $_POST['description'];

    try {
        $n = new Usercontr();
        $n->updateWebDetails($fullName, $shortName, $description);
    }catch (TypeError $e){
        echo 'ERROR: ' . $e->getMessage();
    }
}


?>