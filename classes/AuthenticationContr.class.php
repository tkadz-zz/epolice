<?php
class AuthenticationContr extends AuthenticationModel {


    public function register($loginID, $name, $surname, $nationalID, $passwordRaw, $userRole, $phone)
    {
        parent::register($loginID, $name, $surname, $nationalID, $passwordRaw, $userRole, $phone);
    }

    public function SigninUser2ndStep($loginID, $password){
        parent::SigninUser2ndStep($loginID, $password);
    }

    public function SigninUser($loginID, $password){
        parent::SigninUser($loginID, $password);
    }

    public function logout(){
        parent::logout();
    }

}
