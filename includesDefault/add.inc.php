<?php
include("../pageIncludes/autoloader.inc.php");

$defaultContr = new DefaultContr();

if(isset($_POST['btn_addUser'])){

    $userRole= $_POST['userType'];
    $activeStatus = 1;

    $name = strtoupper($_POST["name"]);
    $surname = strtoupper($_POST["surname"]);
    $loginID = strtoupper($_POST["loginID"]);
    $nationalID = strtoupper($_POST['nationalID']);


    if($userRole == "student"){
        $secondName = strtoupper($_POST["secondName"]);
        $sex = $_POST["sex"];
        $country = $_POST["country"];
        $phone = $_POST["phone"];
        $email = $_POST["email"];
        $address = $_POST["address"];
        $dob = $_POST["dob"];
        $accessLevel = '';
        $isStudent = $_POST['isStudent'];
    }else{
        $secondName = '';
        $sex = '';
        $country = '';
        $phone = '';
        $email = '';
        $address = '';
        $dob = '';
        $isStudent = '';
        $accessLevel = $_POST['accessLevel'];
    }


    if($userRole == ''){
        $_SESSION['type'] = 'd';
        $_SESSION['err'] = 'Error: Please contact IT';
        echo "<script type='text/javascript'>;
             window.location='../signup.php';
            </script>";
    }else {
        try {
            $defaultContr->addUser($nationalID, $name, $surname, $loginID, $userRole, $activeStatus, $secondName, $sex, $country, $phone, $email, $address, $dob, $accessLevel, $isStudent);
        } catch (TypeError $e) {
            echo "Error" . $e->getMessage();

        }
    }



}


else{
    $_SESSION['type'] = 'i';
    $_SESSION['err'] = 'No Command Provided';
    echo "<script type='text/javascript'>;
             history.back(-1);
            </script>";
}


?>