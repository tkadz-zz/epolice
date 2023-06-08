<?php
class Usercontr extends Model{

    public function delMsg($msgID)
    {
        parent::delMsg($msgID);
    }

    public function sendMsg($adminID, $userID, $msg, $tofrom)
    {
        parent::sendMsg($adminID, $userID, $msg, $tofrom);
    }

    public function GetActiveAdminMail($adminID)
    {
        return parent::GetActiveAdminMail($adminID);
    }

    public function GetActiveUserMail($userID)
    {
        return parent::GetActiveUserMail($userID);
    }

    public function delCrime($id)
    {
        parent::delCrime($id);
    }
    public function delMostWanted($id)
    {
        parent::delMostWanted($id);
    }

    public function delTipOff($id)
    {
        parent::delTipOff($id);
    }

    public function insertImage($file_tmp, $file_destination, $file_name_new, $file_ext, $name, $surname)
    {
        parent::insertImage($file_tmp, $file_destination, $file_name_new, $file_ext, $name, $surname);
    }

    public function updateCrimeStatus($status, $caseID)
    {
        parent::updateCrimeStatus($status, $caseID);
    }

    public function addTipOff($name, $surname, $nationalID, $tip)
    {
        parent::addTipOff($name, $surname, $nationalID, $tip);
    }

    public function addCrime($reportedUserID, $iaddress, $idatetime, $idescription, $cNationalID, $cName, $cSurname, $cGender, $cdob, $caddress, $sName, $sSurname, $sGender, $sdob, $saddress, $icategory)
    {
        parent::addCrime($reportedUserID, $iaddress, $idatetime, $idescription, $cNationalID, $cName, $cSurname, $cGender, $cdob, $caddress, $sName, $sSurname, $sGender, $sdob, $saddress, $icategory);
    }

    public function addActionLog($userID, $action)
    {
        parent::addActionLog($userID, $action); 
    }

    public function GetCByUserID($userID)
    {
        return parent::GetCByUserID($userID); 
    }

    public function updateWebDetails($fullName, $shortName, $description)
    {
        parent::updateWebDetails($fullName, $shortName, $description);
    }


}
