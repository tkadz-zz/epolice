<?php
include("../pageIncludes/autoloader.inc.php");


if(isset($_POST['btn_add_mostWanted'])){
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $imgFile = $_FILES['avatar'];
//File properties
    $file_name  =   $imgFile['name'];
    $file_tmp   =   $imgFile['tmp_name'];
    $file_size  =   $imgFile['size'];
    $file_error =   $imgFile['error'];
    $allowed    = array('jpg','jpeg','png');
//Work out file extension
    $file_ext   =   explode('.',$file_name);
    $file_ext   = strtolower(end($file_ext));
    if(in_array($file_ext,$allowed)){
        if($file_error === 0){
            if($file_size <= 28042880){
                $file_name_new  = uniqid('',true).'.'.$file_ext;
                $file_destination   ='../image/'.$file_name_new;
                try {
                    $s = new Usercontr();
                    $s->insertImage($file_tmp, $file_destination, $file_name_new, $file_ext, $name, $surname);
                } catch (TypeError $e) {
                    echo "Error" . $e->getMessage();
                }
            }
            else{
                //Art Image too big
                $_SESSION['type'] = 'w';
                $_SESSION['err'] = 'Image should be 20MB or less in size';
                echo "<script>
                    history.back(-1);
                </script>";
            }
            // Initialise these two variables: $file_tmp, $file_destination, $file_name_new
        }
        else{
            //file not uploaded
            $_SESSION['type'] = 'w';
            $_SESSION['err'] = 'Image Format Not Supported';
            echo "<script>
                history.back(-1);
            </script>";
        }
    }
    else{
        //file extension error
        $_SESSION['type'] = 'w';
        $_SESSION['err'] = 'Image Should be either <span class="text-dark">JPG</span>, <span class="text-dark">JPEG</span> or <span class="text-dark">PNG</span> File Format. Your attempted file is in <span class="text-dark text-uppercase">.'.$file_ext.'</span> File Format';
        echo "<script>
                history.back(-1);
            </script>";
    }
}

if(isset($_POST['btn_add_tipoff'])){
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $nationalID = $_POST['nationalID'];
    $tip = $_POST['tip'];
    $userID = $_POST['userID'];
    try {
        $n = new Usercontr();
        $n->addTipOff($name, $surname, $nationalID, $tip, $userID);
    }catch (TypeError $e){
        echo 'ERROR: ' . $e->getMessage();
    }
}


if(isset($_POST['btn_add_crime'])){
    $reportedUserID = $_POST['userID'];
    $cNationalID = $_POST['cNationalID'];
    $cName = $_POST['cName'];
    $cSurname = $_POST['cSurname'];
    $cGender = $_POST['cGender'];
    $cdob = $_POST['cdob'];
    $caddress = $_POST['caddress'];

    $sName = $_POST['sName'];
    $sSurname = $_POST['sSurname'];
    $sGender = $_POST['sGender'];
    $sdob = $_POST['sdob'];
    $saddress = $_POST['saddress'];

    $iaddress = $_POST['iaddress'];
    $idatetime = $_POST['idatetime'];
    $idescription = $_POST['idescription'];
    $icategory = $_POST['icategory'];

    try {
        $n = new Usercontr();
        $n->addCrime($reportedUserID, $iaddress, $idatetime, $idescription, $cNationalID, $cName, $cSurname, $cGender, $cdob, $caddress, $sName, $sSurname, $sGender, $sdob, $saddress, $icategory);
    }catch (TypeError $e){
        echo 'ERROR: ' . $e->getMessage();
    }
}




?>