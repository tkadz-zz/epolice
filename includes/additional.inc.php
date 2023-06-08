<?php
include("../pageIncludes/autoloader.inc.php");


if(isset($_GET['action'])){

    if($_GET['action'] == 'delMsg'){
        $msgID = $_GET['msgID'];

        try {
            $s = new Usercontr();
            $s->delMsg($msgID);
        } catch (TypeError $e) {
            echo "Error" . $e->getMessage();

        }
    }


    if($_GET['action'] == 'adminsendmsg'){
        $adminID = $_SESSION['id'];
        $userID = $_POST['userID'];
        $msg = $_POST['msg'];
        if($_SESSION['role'] == 'public'){
            $tofrom = 1;
        }else{
            $tofrom = 0;
        }
        try {
            $n = new Usercontr();
            $n->sendMsg($adminID, $userID, $msg, $tofrom);
        }catch (TypeError $e){
            echo 'ERROR: ' . $e->getMessage();
        }
    }

    if($_GET['action'] == 'usersendmsg'){
        $adminID = $_POST['adminID'];
        $userID = $_SESSION['id'];
        $msg = $_POST['msg'];
        if($_SESSION['role'] == 'public'){
            $tofrom = 1;
        }else{
            $tofrom = 0;
        }
        try {
            $n = new Usercontr();
            $n->sendMsg($adminID, $userID, $msg, $tofrom);
        }catch (TypeError $e){
            echo 'ERROR: ' . $e->getMessage();
        }
    }


}else{
    echo 'no command';
}


?>