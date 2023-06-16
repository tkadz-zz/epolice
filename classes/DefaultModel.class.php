<?php

class DefaultModel extends Dbh
{

    protected function checkNationalIdExists($nationalID, $userID){
        $sqlNationalID = "SELECT * FROM student WHERE nationalID=? AND userID != ?";
        $stmt2 = $this->con()->prepare($sqlNationalID);
        $stmt2->execute([$nationalID, $userID]);
        return $stmt2->fetchAll();
    }

    protected function checkStudentIdExists($studentID, $userID){
        $sqlStudentID = "SELECT * FROM student WHERE studentID=? AND userID != ?";
        $stmt1 = $this->con()->prepare($sqlStudentID);
        $stmt1->execute([$studentID, $userID]);
        return $stmt1->fetchAll();
    }

    protected function updateStudentProfile($name, $surname, $secondName, $studentID, $nationalID, $sex, $country, $phone, $email, $address, $dob, $userID){
        $nationalIDRows = $this->checkNationalIdExists($nationalID, $userID);
        $studentIDRows = $this->checkStudentIdExists($studentID, $userID);
        if(count($nationalIDRows) > 0){
            $_SESSION['type'] = 'w';
            $_SESSION['err'] = 'National ID already registered';
            echo "<script type='text/javascript'>
                    window.location='../admin/updateStudentProfile.php?userID=$userID';
                  </script>";
        }elseif(count($studentIDRows) > 0){
            $_SESSION['type'] = 'w';
            $_SESSION['err'] = 'Student ID already registered';
            echo "<script type='text/javascript'>
                    window.location='../admin/updateStudentProfile.php?userID=$userID';
                  </script>";
        }

        else {
            $sql = "UPDATE student SET name=?, secondName=?, surname=?, studentID=?, nationalID=?, sex=?, nationality=?, phone=?, email=?, address=?, dob=? WHERE userID=?";
            $stmt = $this->con()->prepare($sql);
            if (!$stmt->execute([$name, $secondName, $surname, $studentID, $nationalID, $sex, $country, $phone, $email, $address, $dob, $userID])) {
                $this->opps();
            } else {
                //actionLog
                $isUser = $this->isUser($userID, 'student');
                $action = "Updated student profile account (" . $isUser[0]['name'] . " " . $isUser[0]['surname'] . ")";
                $userContr = new Usercontr();
                $userContr->addActionLog($_SESSION['id'], $action);
                //actionLog

                $_SESSION['type'] = 's';
                $_SESSION['err'] = 'Student profile updated successfully';
                echo "<script type='text/javascript'>
                        history.back(-1);
                      </script>";
            }
        }
    }


    protected function queryHandle($query){
        $stmt = $this->con()->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }


    protected function delAvatar($role, $id){
        $userRows = $this->isUser($id, $role);
        $source = $userRows[0]['avatar'];
        $blank = '';
        if($userRows[0]['avatar'] == ''){
            $_SESSION['type'] = 'i';
            $_SESSION['err'] = 'Profile picture unavailable';
            echo "<script type='text/javascript'>
                    history.back(-1);
                </script>";
        }
        else {
            if (unlink($source)) {
                $sql = "UPDATE ".$role." SET avatar=? WHERE userID=?";
                $stmt = $this->con()->prepare($sql);

                if ($stmt->execute([$blank, $id])) {
                    $_SESSION['avatar'] = $blank;
                    $_SESSION['type'] = 's';
                    $_SESSION['err'] = 'Profile Picture Removed';
                    echo "<script type='text/javascript'>
                    window.location='../".$role."/profile.php';
                </script>";
                } else {
                    $this->opps();
                }
            } else {
                $this->opps();
            }
        }
    }

    protected function updateAvatar($file_tmp, $file_destination, $file_name_new, $file_ext, $role, $id)
    {
        $filed = '../avatar/' . $file_name_new . '';
        $userRows = $this->isUser($id, $role);

        if ($userRows[0]['avatar'] != '') {
            $source = $userRows[0]['avatar'];
            if (!unlink($source)) {
                $this->opps();
            }
        }
        if(move_uploaded_file($file_tmp, $file_destination)) {
            $sql = "UPDATE ".$role." SET avatar=? WHERE userID=?";
            $stmt = $this->con()->prepare($sql);

            if ($stmt->execute([$filed, $id])) {
                $_SESSION['avatar'] = $filed;
                $_SESSION['type'] = 's';
                $_SESSION['err'] = 'Profile Picture Updated Successfully';
                echo "<script type='text/javascript'>
                    window.location='../".$role."/profile.php';
                </script>";
            } else {
                $this->opps();

            }
        }
        else{
            $this->opps();
        }
    }

    protected function GetUserByLoginID($loginID){
        $sql = "SELECT * FROM users WHERE loginID=?";
        $stmt = $this->con()->prepare($sql);
        $stmt->execute([$loginID]);
        return $stmt->fetchAll();
    }

    protected function createAdminAcc($userID, $name, $surname, $nationalID, $userRole, $accessLevel){
        $sql = "INSERT INTO admin(userID, name, surname, nationalID, address, phone, email, avatar, sex, accessLevel) VALUES(?,?,?,?,?,?,?,?,?,?)";
        $stmt = $this->con()->prepare($sql);
        $blank = '';
        if($stmt->execute([$userID, $name, $surname, $nationalID, $blank, $blank, $blank, $blank, $blank, $accessLevel])){

            if($accessLevel == 1){
                $access = 'Top';
            }elseif($accessLevel == 2){
                $access = 'Basic';
            }

            $action = "Created " . $userRole ." account (" . $name ." ". $surname .")";
            $userContr = new Usercontr();
            $userContr->addActionLog($_SESSION['id'], $action);

            $_SESSION['type'] = 's';
            $_SESSION['err'] = 'Created '.$access.' Level '.$userRole.' Account Successfully';
            echo "<script type='text/javascript'>
                        window.location='../admin/".$userRole."Acc.php';
                      </script>";
        }
        else{
            $this->opps();
        }
    }

    protected function createIndexAcc($userID, $name, $surname, $nationalID, $userRole, $secondName, $phone, $email, $loginID, $passwordRaw){
        if($userRole == 'admin'){
            $this->createAdminAcc($userID, $name, $surname, $nationalID, $userRole, $passwordRaw);
        }
        if($userRole == 'public'){
            $this->createSecondaryAcc($userID, $name, $surname, $nationalID, $secondName, $phone, $email, $loginID, $passwordRaw);
        }

    }

    protected function createSecondaryAcc($userID, $name, $surname, $nationalID, $secondName, $phone, $email, $loginID, $passwordRaw){

        $blank = '';
        $active = 1;

        $sql = "INSERT INTO public(userID, name, secondName, surname, nationalID, avatar, sex, address, phone, email) VALUES (?,?,?,?,?,?,?,?,?,?)";
        $stmt = $this->con()->prepare($sql);
        if(!$stmt->execute([$userID, $name, $secondName, $surname, $nationalID, $blank, $blank, $blank, $blank, $blank])){
            $this->opps();
        }else{
            $authContr = new AuthenticationContr();
            $authContr->SigninUser($loginID, $passwordRaw);
        }
    }



    protected function addUser($nationalID, $name, $surname, $loginID, $userRole, $activeStatus, $secondName, $sex, $country, $phone, $email, $address, $dob, $passwordRaw)
    {
        $today = date('Y-m-d H:i:s');
        $blank = '';
        $nationalIDRows = $this->GetUserByNationID($userRole, $nationalID);



        if (count($nationalIDRows) > 0) {
            $_SESSION['type'] = 'w';
            $_SESSION['err'] = 'National ID ' .$nationalID . ' already belongs to another account';
            echo "<script type='text/javascript'>
                    history.back(-1);
                  </script>";
        }else{

            $sql = "SELECT * FROM users WHERE loginID=?";
            $stmt = $this->con()->prepare($sql);
            $stmt->execute([$loginID]);
            $rows = $stmt->fetchAll();
            if ($stmt) {
                //Check to see if there is any loginID in database matching the provided one
                if (count($rows) > 0) {
                    //if loginID already exist in database, do not create account, redirect user to previous page
                    $_SESSION['type'] = 'w';
                    $_SESSION['err'] = 'LoginID is already taken. Please Choose another';
                    echo "<script type='text/javascript'>
                        history.back(-1);
                      </script>";
                } else {
                    //ACCOUNT NOT FOUND HENCE WITH SAME LOGIN-ID HENCE PROCEED
                    //insert data into users table
                    $setSql = "INSERT INTO users(loginID, password, role, joined, lastLogin, status)
                            VALUES (?,?,?,?,?,?)";
                    $password = password_hash($passwordRaw, PASSWORD_DEFAULT);

                    if($userRole == 'admin'){
                        $password = '';
                    }

                    $setStmt = $this->con()->prepare($setSql);
                    if ($setStmt->execute([$loginID, $password, $userRole, $today, $blank, $activeStatus])) {
                        //Get user id of created user accounts from users table
                        //this will help creating cascading table rows depending on the user role
                        $userFetchRows = $this->GetUserByLoginID($loginID);
                        $id = $userFetchRows[0]['id'];

                        $this->createIndexAcc($id, $name, $surname, $nationalID, $userRole, $secondName, $phone, $email, $loginID, $passwordRaw);

                    } else {
                        //FAILED TO CREATE USER
                        //echo 'Failed to create user';
                        $_SESSION['type'] = 'w';
                        $_SESSION['err'] = 'Failed to create user';
                        echo "<script type='text/javascript'>
                            window.location='../signup.php';
                          </script>";
                    }
                }
            } else {
                //FAILED EXECUTING THE QUERY;
                //echo 'Failed executing query';
                $this->opps();
            }
        }
    }

    protected function updatePassword($op, $cp, $id){
        $rows = $this->GetUserByID($id);
        if(password_verify($op, $rows[0]['password'])){
            //Match
            $sql2 = "UPDATE users SET password=? WHERE id=?";
            $stmt2 = $this->con()->prepare($sql2);
            $pass_safe = password_hash($cp, PASSWORD_DEFAULT);

            if($stmt2->execute([$pass_safe, $id])){
                $_SESSION['type'] = 's';
                $_SESSION['err'] = 'Password Updated Successfully';
                echo "<script type='text/javascript'>;
                      history.back(-1);
                    </script>";
            }
            else{
                $this->opps();
            }
        }
        else{
            //Not Matched
            $_SESSION['type'] = 'w';
            $_SESSION['err'] = 'Old password did not match';
            echo "<script type='text/javascript'>;
                      history.back(-1);
                    </script>";
        }
    }

    protected function updateLoginID($newID, $name, $surname, $email, $id){
        $sql = "SELECT * FROM users WHERE loginID=? AND id != ?";
        $stmt = $this->con()->prepare($sql);
        $stmt->execute([$newID, $id]);
        $rows = $stmt->fetchAll();
        //Check to see if there is any loginID in database matching the provided one
        if (count($rows) > 0) {
            //if loginID already exist in database, do not create account, redirect user to previous page
            $_SESSION['type'] = 'w';
            $_SESSION['err'] = 'LoginID <span class="text-decoration-underline text-dark"><strong>'.$newID.'</strong></span> already taken. Please Choose another';
            echo "<script type='text/javascript'>
                window.location='../".$_SESSION['role']."/profile.php';
              </script>";
        } else {
            $sql = "UPDATE users SET loginID=? WHERE id=?";
            $stmt = $this->con()->prepare($sql);
            if($stmt->execute([$newID, $id])){
                $_SESSION['loginID'] = $newID;
                $_SESSION['name'] = $name;
                $_SESSION['surname'] = $surname;
                $_SESSION['email'] = $email;

                $_SESSION['type'] = 's';
                $_SESSION['err'] = 'Profile updated successfully';
                echo "<script type='text/javascript'>;
                      window.location='../".$_SESSION['role']."/profile.php';
                    </script>";
            }
            else{
                $this->opps();
            }
        }

    }

    protected function updateProfile($name, $surname, $sex, $email, $phone, $address, $loginID, $id){
        $role = $_SESSION['role'];
        $isYou = $this->isUser($id, $_SESSION['role']);
        $sql = "UPDATE $role SET name=?, surname=?, sex=?, email=?, phone=?, address=? WHERE userID=?";
        $stmt = $this->con()->prepare($sql);
        if($stmt->execute([$name, $surname, $sex, $email, $phone, $address, $id])){
            $this->updateLoginID($loginID, $name, $surname, $email, $id);
        }
        else{
            $this->opps();
        }
    }

    protected function GetWebDetails(){
        $sql = "SELECT * FROM webDetails";
        $stmt = $this->con()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    protected function GetAllUserRoles(){
        $sql = "SELECT * FROM userRoles";
        $stmt = $this->con()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    protected function updateUserStatus($status, $userID){
        $userRows = $this->GetUserByID($userID);
        if($status != 1){
            $msg = 'De-activated';
        }else{
            $msg = 'Activated';
        }

        $sql = "UPDATE users SET status=? WHERE id=?";
        $stmt = $this->con()->prepare($sql);
        if($stmt->execute([$status, $userID])){

            $isUser = $this->isUser($userRows[0]['id'], $userRows[0]['role']);
            $action = $msg . " " . $userRows[0]['role'] ." account (" . $isUser[0]['name'] ." ". $isUser[0]['surname'] .")";
            $userContr = new Usercontr();
            $userContr->addActionLog($_SESSION['id'], $action);

            $_SESSION['type'] = 's';
            $_SESSION['err'] = 'Account has been successfully '.$msg.' .';
            echo "<script type='text/javascript'>
                history.back(-1);
              </script>";
        }
        else{
            $this->opps();
        }

    }

    protected function opps(){
        $_SESSION['type'] = 'w';
        $_SESSION['err'] = 'Something went wrong.Please try again';
        echo "<script type='text/javascript'>
                history.back(-1);
              </script>";
    }

    protected function delUser($userID){
        $userContr = new Usercontr();
        $userRows = $this->GetUserByID($userID);
        $userRole = $userRows[0]['role'];

        $isUser = $this->isUser($userRows[0]['id'], $userRows[0]['role']);

        $sql2 = "DELETE FROM users WHERE id=?";
        $stmt2 = $this->con()->prepare($sql2);

        //take certificate and cbh if available

        $sql1 = "DELETE FROM $userRole WHERE userID=?";
        $stmt1 = $this->con()->prepare($sql1);


        if($stmt2->execute([$userID]) AND $stmt1->execute([$userID])){

            $action = "Deleted " . $userRows[0]['role'] ." account (" . $isUser[0]['name'] ." ". $isUser[0]['surname'] .")";
            $userContr = new Usercontr();
            $userContr->addActionLog($_SESSION['id'], $action);

            $_SESSION['type'] = 's';
            $_SESSION['err'] = $userRole. ' account deleted successfully';

            if($userRole == 'student'){
                echo "<script type='text/javascript'>
                        window.location='../admin/allpublicAcc.php';
                      </script>";
            }elseif ($userRole == 'admin'){
                echo "<script type='text/javascript'>
                        window.location='../admin/adminAcc.php';
                      </script>";
            }else{
                echo "<script type='text/javascript'>
                        window.location='../admin/dashboard.php';
                      </script>";
            }


        }
        else{
            $this->opps();
        }

    }

    protected function resetUserPassword($id){
        $pass = '';
        $sql = "UPDATE users SET password=? WHERE id=?";
        $stmt = $this->con()->prepare($sql);
        if($stmt->execute([$pass, $id])){
            $_SESSION['type'] = 's';
            $_SESSION['err'] = 'Password Reset Successfully';
            echo "<script type='text/javascript'>;
                      history.back(-1);
                    </script>";
        }
        else{
            $_SESSION['type'] = 's';
            $_SESSION['err'] = 'Opps! Something went wrong';
            echo "<script type='text/javascript'>;
                      history.back(-1);
                    </script>";
        }
    }

    protected function timeTogo($mydate){
        $time_ago = strtotime($mydate);
        $cur_time   = time();
        $time_elapsed   = $time_ago - $cur_time;
        $seconds    = $time_elapsed ;
        $minutes    = round($time_elapsed / 60 );
        $hours      = round($time_elapsed / 3600);
        $days       = round($time_elapsed / 86400 );
        $weeks      = round($time_elapsed / 604800);
        $months     = round($time_elapsed / 2600640 );
        $years      = round($time_elapsed / 31207680 );
        // Seconds
        if($seconds <= 60){
            return "Now";
        }
        //Minutes
        else if($minutes <=60){
            return "$minutes minute/s left";

        }
        //Hours
        else if($hours <=24){
            return "$hours hr/s left";
        }
        //Days
        else if($days <= 7){
            return "$days day/s left";
        }
        //Weeks
        else if($weeks <= 4.3){
            return "$weeks Week/s OR $days days left";
        }
        //Months
        else if($months <=12){
            return "$months month/s OR $days days left";
        }
        //Years
        else{
            return "$years Year/s OR $months month/s OR $days days left";
        }
    }

    protected function timeAgo($mydate){
        $time_ago = strtotime($mydate);
        $cur_time   = time();
        $time_elapsed   = $cur_time - $time_ago;
        $seconds    = $time_elapsed ;
        $minutes    = round($time_elapsed / 60 );
        $hours      = round($time_elapsed / 3600);
        $days       = round($time_elapsed / 86400 );
        $weeks      = round($time_elapsed / 604800);
        $months     = round($time_elapsed / 2600640 );
        $years      = round($time_elapsed / 31207680 );
        // Seconds
        if($seconds <= 60){
            return "just now";
        }
        //Minutes
        else if($minutes <=60){
            if($minutes==1){
                return "One Minute Ago";
            }
            else{
                return "$minutes Minutes Ago";
            }
        }
        //Hours
        else if($hours <=24){
            if($hours==1){
                return "an Hour Ago";
            }else{
                return "$hours Hrs Ago";
            }
        }
        //Days
        else if($days <= 7){
            if($days==1){
                return "Yesterday";
            }else{
                return "$days Days Ago";
            }
        }
        //Weeks
        else if($weeks <= 4.3){
            if($weeks==1){
                return "a Week Ago";
            }else{
                return "$weeks Weeks Ago";
            }
        }
        //Months
        else if($months <=12){
            if($months==1){
                return "a Month Ago";
            }else{
                return "$months Months Ago";
            }
        }
        //Years
        else{
            if($years==1){
                return "One Year Ago";
            }else{
                return "$years Years Ago";
            }
        }
    }

    protected function dateTimeToDay($mydate){
        $var = strtotime($mydate);
        return date('l j F Y H:m:s A',$var);
    }

    protected function dateToDay($mydate){
        $var = strtotime($mydate);
        return date('l j F Y',$var);
    }

    protected function dateToMonth($mydate){
        $var = strtotime($mydate);
        return date('j F Y',$var);
    }

    protected function dateToMonthYear($mydate){
        $var = strtotime($mydate);
        return date('F Y',$var);
    }

    protected function dateToTime($mydate){
        $history_bus_date_variable = $mydate;
        $history_bus_date_tostring = strtotime($history_bus_date_variable);
        return date('H:m A',$history_bus_date_tostring);
    }

    protected function GetUserByID($id){
        $sql = "SELECT * FROM users WHERE id=?";
        $stmt = $this->con()->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetchAll();
    }


    protected function GetUserByNationID($role, $nationalID){
        $sql = "SELECT * FROM ".$role." WHERE nationalID=?";
        $stmt = $this->con()->prepare($sql);
        $stmt->execute([$nationalID]);
        return $stmt->fetchAll();
    }


    protected function isUser($id, $role){
        $sql = "SELECT * FROM ".$role." WHERE userID=?";
        $stmt = $this->con()->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetchAll();
    }

    protected function GetCountView($query){
        $stmt = $this->con()->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }



}