<?php 
    require_once "app/models/LibrosModel.php";
    require_once "app/models/AutoresModel.php";
    require_once "app/views/LibrosView.php";
    require_once "helpers/AuthHelper.php";

    class LibrosController {
        private $model;
        private $view;
        private $autoresModel;

        function __construct(){
            $this->model = new LibrosModel();
            $this->autoresModel = new AutoresModel();
            $this->view = new LibrosView();
        }

        public function index(){
            $this->view->index($this->model->all());
        }
    }
?>