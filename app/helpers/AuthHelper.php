<?php 
require_once "app/models/UsuariosModel.php";
    class AuthHelper{
        private static $userModel;

        public static function loadModel(){
            if(self::$userModel == null){
                self::$userModel = new UsuariosModel();
            }
        }
        public static function login($user){
            self::loadModel();
            $fetchedUser = self::$userModel->findByUsername($user->nombre);
            if($fetchedUser){
                if($fetchedUser->password == password_hash($user->password, PASSWORD_BCRYPT)){
                    session_start();
                    $_SESSION["user"] = $fetchedUser; 
                }
            }
        }
        public static function loggedUser(){
            if(session_status() == PHP_SESSION_ACTIVE){
                return $_SESSION["user"];
            }else{
                return false;
            }
        }
    }
?>