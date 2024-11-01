<?php 
    require_once('app/models/AutoresModel.php');
    require_once('app/views/AutoresView.php');
    class AutoresController {
        private $model;
        private $vista;
        function __construct(){
            $this->model= new AutoresModel();
            $this->vista= new AutoresView();
        }

        function index(){
            $autores=$this->model->all();
            $this->vista->verAutores($autores);
        }
    }
?>