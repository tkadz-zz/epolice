<?php
include("../pageIncludes/autoloader.inc.php");


if(isset($_GET['action'])){
    $userContr = new Usercontr();
    $id = $_GET['id'];

    if($_GET['action'] == 'delCrime'){
        $userContr->delCrime($id);
    }

    if($_GET['action'] == 'delTipOff'){
        $userContr->delTipOff($id);
    }

    if($_GET['action'] == 'delMostWanted'){
        $userContr->delMostWanted($id);
    }

}

else{
    $_SESSION['type'] = 's';
    $_SESSION['err'] = 'No Command';
    echo "<script type='text/javascript'>
            history.back(-1);
        </script>";
}
?>