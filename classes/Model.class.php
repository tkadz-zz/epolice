<?php


class Model extends Dbh{

    protected function delMsg($msgID){
        $defaultContr = new DefaultContr();
        $sql = "DELETE FROM messages WHERE id=?";
        $stmt = $this->con()->prepare($sql);
        if($stmt->execute([$msgID])){
            $_SESSION['type'] = 's';
            $_SESSION['err'] = 'Message Deleted';
            echo "<script type='text/javascript'>;
                      history.back(-1);
                    </script>";
        }else{
            $defaultContr->opps();
        }
    }

    protected function sendMsg($adminID, $userID, $msg, $tofrom){
        $defaultContr = new DefaultContr();
        $status = 1;
        $today = date('Y-m-d H:i:s');
        $sql = "INSERT INTO messages(adminID, userID, ToFrom, status, message, dateAdded) VALUES (?,?,?,?,?,?)";
        $stmt = $this->con()->prepare($sql);
        if($stmt->execute([$adminID, $userID, $tofrom, $status, $msg, $today])){
            $_SESSION['type'] = 's';
            $_SESSION['err'] = 'Sent';

            if($tofrom == 0){
                //toadmin || fromUser
                $hre = "userID=" . $userID;
            }else{
                //toUser || fromAdmin
                $hre = "adminID=" . $adminID;
            }
            $role = $_SESSION['role'];

            echo "<script type='text/javascript'>;
                      window.location= '../".$role."/messages.php?$hre';
                    </script>";
        }else{
            $defaultContr->opps();
        }
    }

    protected function GetActiveAdminMail($adminID){
        $active = 1;
        $toFrom = 1;
        $sql = "SELECT * FROM messages WHERE adminID=? AND ToFrom=? AND status=?";
        $stmt = $this->con()->prepare($sql);
        $stmt->execute([$adminID, $toFrom, $active]);
        return $stmt->fetchAll();
    }

    protected function GetActiveUserMail($userID){
        $active = 1;
        $toFrom = 0;
        $sql = "SELECT * FROM messages WHERE userID=? AND ToFrom=? AND status=?";
        $stmt = $this->con()->prepare($sql);
        $stmt->execute([$userID, $toFrom, $active]);
        return $stmt->fetchAll();
    }

    protected function updateUserReadStatus($userID, $adminID){
        $rows = $this->GetUserMessages($userID, $adminID);
        foreach ($rows as $row){
            if($row['ToFrom'] == 0){
                $tofrom=0;
                $newStatus=0;
                $sql = "UPDATE messages SET status=? WHERE userID=? AND adminID=? and ToFrom=?";
                $stmt = $this->con()->prepare($sql);
                $stmt->execute([$newStatus, $userID, $adminID,$tofrom]);
            }
        }
    }

    protected function GetActiveUserMsgsByAdminID($adminID, $userID){
        $active = 1;
        $sql = "SELECT * FROM messages WHERE adminID=? AND userID=? AND status=?";
        $stmt = $this->con()->prepare($sql);
        $stmt->execute([$adminID, $userID, $active]);
        return $stmt->fetchAll();
    }

    protected function GetActiveAdminMsgsByAdminID($adminID, $userID){
        $active = 1;
        $sql = "SELECT * FROM messages WHERE adminID=? AND userID=? AND status=?";
        $stmt = $this->con()->prepare($sql);
        $stmt->execute([$adminID, $userID, $active]);
        return $stmt->fetchAll();
    }

    protected function GetAllUserBYRole($role){
        $sql = "SELECT * FROM users WHERE role=?";
        $stmt = $this->con()->prepare($sql);
        $stmt->execute([$role]);
        return $stmt->fetchAll();
    }

    protected function updateAdminReadStatus($userID, $adminID){
        $rows = $this->GetUserMessages($userID, $adminID);
        foreach ($rows as $row){
            if($row['ToFrom'] == 1){
                $tofrom=1;
                $newStatus=0;
                $sql = "UPDATE messages SET status=? WHERE userID=? AND adminID=? and ToFrom=?";
                $stmt = $this->con()->prepare($sql);
                $stmt->execute([$newStatus, $userID, $adminID,$tofrom]);
            }
        }
    }

    protected function GetUserMessages($userID, $adminID){
        $sql = "SELECT * FROM messages WHERE userID=? AND adminID=? ORDER BY id ASC";
        $stmt = $this->con()->prepare($sql);
        $stmt->execute([$userID, $adminID]);
        return $stmt->fetchAll();
    }

    protected function delCrime($id){
        $defaultContr = new DefaultContr();
        $sql = "DELETE FROM crimeReports WHERE caseID=?";
        $stmt = $this->con()->prepare($sql);
        if(!$stmt->execute([$id])){
            $defaultContr->opps();
        }else{
            $_SESSION['type'] = 's';
            $_SESSION['err'] = 'Crime Report Deleted';
            echo "<script type='text/javascript'>
                            window.location='../admin/crimeReports.php';
                        </script>";
        }
    }

    protected function delTipOff($id){
        $defaultContr = new DefaultContr();
        $sql = "DELETE FROM tipsOff WHERE id=?";
        $stmt = $this->con()->prepare($sql);
        if(!$stmt->execute([$id])){
            $defaultContr->opps();
        }else{
            $role = $_SESSION['role'];
            $_SESSION['type'] = 's';
            $_SESSION['err'] = 'Tip-Off Report Deleted';
            echo "<script type='text/javascript'>
                            window.location='../$role/tipsoff.php';
                        </script>";
        }
    }

    protected function delMostWanted($id){
        $defaultContr = new DefaultContr();
        $rows = $this->GetMostWantedByID($id);
        if(count($rows) > 0){
            unlink('../'. $rows[0]['source']);
        }
        $sql = "DELETE FROM mostWanted WHERE id=?";
        $stmt = $this->con()->prepare($sql);
        if(!$stmt->execute([$id])){
            $defaultContr->opps();
        }else{
            $_SESSION['type'] = 's';
            $_SESSION['err'] = 'Tip-Off Report Deleted';
            echo "<script type='text/javascript'>
                            window.location='../admin/mostWanted.php';
                        </script>";
        }
    }

    protected function insertImage($file_tmp, $file_destination, $file_name_new, $file_ext, $name, $surname){
        $defaultContr = new DefaultContr();
        $today = date('Y-m-d H:i:s');
        $filed = 'image/' . $file_name_new . '';
        if (move_uploaded_file($file_tmp, $file_destination)) {
            $sql = "INSERT INTO mostWanted(name, surname, source, dateAdded) VALUES (?,?,?,?)";
            $stmt = $this->con()->prepare($sql);

            if ($stmt->execute([$name, $surname ,$filed, $today])) {
                $_SESSION['type'] = 's';
                $_SESSION['err'] = 'Most Wanted User Update Sucessfully';
                echo "<script type='text/javascript'>
                            window.location='../admin/mostWanted.php';
                        </script>";
            } else {
                $defaultContr->opps();

            }
        } else {
            $defaultContr->opps();
        }
    }

    protected function updateCrimeStatus($status, $caseID){
        $defaultContr = new DefaultContr();
        $sql = "UPDATE crimeReports SET solved=? WHERE caseID=?";
        $stmt = $this->con()->prepare($sql);
        if(!$stmt->execute([$status, $caseID])){
            $defaultContr->opps();
        }else{
            $_SESSION['type'] = 's';
            $_SESSION['err'] = 'Case updated';
            echo "<script type='text/javascript'>
                    history.back(-1);
                </script>";
        }
    }

    protected function addTipOff($name, $surname, $nationalID, $tip, $userID){
        $defaultContr = new DefaultContr();
        $unread = 1;
        $today = date('Y-m-d H:i:s');
        $sql = "INSERT INTO tipsOff(userID, name, surname, nationalID, tipoff, readStatus, dateAdded) VALUES (?,?,?,?,?,?,?)";
        $stmt = $this->con()->prepare($sql);
        if(!$stmt->execute([$userID, $name, $surname, $nationalID, $tip, $unread, $today])){
            $defaultContr->opps();
        }else{
            if($userID == 0) {
                $_SESSION['type'] = 's';
                $_SESSION['err'] = 'Tip-Off has been sent successfully';
                echo "<script type='text/javascript'>
                    history.back(-1);
                </script>";
            }else{
                $_SESSION['type'] = 's';
                $_SESSION['err'] = 'Tip-Off has been sent successfully';
                echo "<script type='text/javascript'>
                    window.location='../public/tipsoff.php';
                </script>";
            }
        }
    }


    protected function addCrime($reportedUserID, $iaddress, $idatetime, $idescription, $cNationalID, $cName, $cSurname, $cGender, $cdob, $caddress, $sName, $sSurname, $sGender, $sdob, $saddress, $icategory){
        $defaultContr = new DefaultContr();
        //Get AddedBY DEtails
        $adderUserIDRows = $defaultContr->GetUserByID($_SESSION['id']);
        $addedBy = $defaultContr->isUser($adderUserIDRows[0]['id'], $adderUserIDRows[0]['role']);
        $addedByNameSurname = $addedBy[0]['surname'] . ' ' . $addedBy[0]['name'];
        //--end of get addedBY DEtails


        $solvability = 0;
        $today= date('Y-m-d H:i:s');

        $caseID = $this->generateRandomString(12); //get random generated number

        $sql = "INSERT INTO crimeReports(reportedID, caseID, addedBy, compliantName, compliantSurname, complaintID, complaintDob, complaintGender, complaintAddress, suspectName, suspectSurname, suspectDob, suspectGender, suspectAddress, incidentAddress, IncidentDateTime, inceidentDescription, solved, dateAdded, incidentCategory) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = $this->con()->prepare($sql);
        if(!$stmt->execute([$reportedUserID, $caseID, $addedByNameSurname, $cName, $cSurname, $cNationalID, $cdob, $cGender, $caddress, $sName, $sSurname, $sdob, $sGender, $saddress, $iaddress, $idatetime, $idescription, $solvability, $today, $icategory])){
            $defaultContr->opps();
        }else{
            $_SESSION['type'] = 's';
            $_SESSION['err'] = 'Crime Case Recorded';
            echo "<script type='text/javascript'>
                    window.location='../admin/crimeReports.php';
                </script>";
        }
    }


    protected function generateRandomString($length){
        $include_chars = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
        /* Uncomment below to include symbols */
        /* $include_chars .= "[{(!@#$%^/&*_+;?\:)}]"; */
        $charLength = strlen($include_chars);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $include_chars [rand(0, $charLength - 1)];
        }
        return $randomString;
    }

    protected function updateTipOffStatus($id){
        $read = 0;
        $sql = "UPDATE tipsOff SET readStatus=? WHERE id=?";
        $stmt = $this->con()->prepare($sql);
        if(!$stmt->execute([$read, $id])){
            $defaultContr = new DefaultContr();
            $defaultContr->opps();
        }
    }

    protected function GetTipByID($id){
        $sql = "SELECT * FROM tipsOff WHERE id=?";
        $stmt = $this->con()->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetchAll();
    }

    protected function GetMostWantedByID($id){
        $sql = "SELECT * FROM mostWanted WHERE id=?";
        $stmt = $this->con()->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetchAll();
    }

    protected function GetCrimeByCaseID($caseID){
        $sql = "SELECT * FROM crimeReports WHERE caseID=?";
        $stmt = $this->con()->prepare($sql);
        $stmt->execute([$caseID]);
        return $stmt->fetchAll();
    }

    protected function GetAllMostWanted(){
        $sql = "SELECT * FROM mostWanted ORDER BY id DESC";
        $stmt = $this->con()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    protected function GetAllTipsOffByUserID($userID){
        $sql = "SELECT * FROM tipsOff WHERE userID=? ORDER BY readStatus, id DESC";
        $stmt = $this->con()->prepare($sql);
        $stmt->execute([$userID]);
        return $stmt->fetchAll();
    }

    protected function GetAllTipsOff(){
        $sql = "SELECT * FROM tipsOff ORDER BY readStatus, id DESC";
        $stmt = $this->con()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    protected function GetCrimeReportsByReporterID($id){
        $sql = "SELECT * FROM crimeReports WHERE reportedID=? ORDER BY id DESC";
        $stmt = $this->con()->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetchAll();
    }

    protected function GetCrimesBySolvability($solvability){
        if($solvability == 3) {
            $sql = "SELECT * FROM crimeReports WHERE solved=? ORDER BY id DESC";
        }else{
            $solvability = 3;
            $sql = "SELECT * FROM crimeReports WHERE solved !=? ORDER BY id DESC";
        }
        $stmt = $this->con()->prepare($sql);
        $stmt->execute([$solvability]);
        return $stmt->fetchAll();
    }







    protected function addActionLog($userID, $action){
        $defaultContr = new DefaultContr();
        $today = date('Y-m-d H:i:s');

        $agent = $_SERVER['HTTP_USER_AGENT'];

        $userRows = $defaultContr->GetUserByID($userID);
        $isUser = $defaultContr->isUser($userRows[0]['id'], $userRows[0]['role']);
        $nameSurname = $isUser[0]['name'] .' '. $isUser[0]['surname'];

        $sql = "INSERT INTO actionLog(nameSurname, action, dateAdded, agent) VALUES (?,?,?,?)";
        $stmt = $this->con()->prepare($sql);
        if(!$stmt->execute([$nameSurname, $action, $today, $agent])){
            $defaultContr = new DefaultContr();
            $defaultContr->opps();
        }
    }

    protected function updateWebDetails($fullName, $shortName, $description){
        $defaultContr = new DefaultContr();
        $sql = "UPDATE webDetails SET webNameFull=?, webNameShort=?, webDescription=?";
        $stmt = $this->con()->prepare($sql);
        if($stmt->execute([$fullName, $shortName, $description]) ){
            $_SESSION['type'] = 's';
            $_SESSION['err'] = 'Details updated successfully';
            echo "<script type='text/javascript'>
                    window.location='../admin/webSettings.php';
                </script>";
        }else{
            $defaultContr->opps();
        }
    }


    protected function GetAllIsUser($role){
        $sql = "SELECT * FROM ".$role."";
        $stmt = $this->con()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }



    protected function GetCByUserID($id){
        $sql = "SELECT * FROM certificate WHERE userID=?";
        $stmt = $this->con()->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetchAll();
    }

    protected function GetCBHCResultsByUserID($userID){
        $sql = "SELECT * FROM cbhcResults WHERE userID=?";
        $stmt = $this->con()->prepare($sql);
        $stmt->execute([$userID]);
        return $stmt->fetchAll();
    }

    protected function GetCertificateResultsByUserID($userID){
        $sql = "SELECT * FROM certificateResults WHERE userID=?";
        $stmt = $this->con()->prepare($sql);
        $stmt->execute([$userID]);
        return $stmt->fetchAll();
    }



}