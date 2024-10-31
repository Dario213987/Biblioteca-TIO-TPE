<?php
    require_once('config/config.php');
    class Model {

        protected $db;
        //Crea la conexión a la DB
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
