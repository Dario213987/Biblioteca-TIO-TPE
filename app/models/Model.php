<?php
    require_once('config/config.php');
    class Model {
        protected $db;
        protected function crearConexion () {   
            try {
                $this->db = new PDO("mysql:host=localhost;dbname=biblioteca;charset=utf8", "root", "");
            } catch (\Throwable $th) {
                die($th);
            }
            return $this->db;
        }
    }

?>
