<?php
require_once "libs/Smarty.class.php";
    class LibrosView{
        private $smarty;
        function __construct(){
            $this->smarty = new Smarty();
            $this->smarty->assign('base', BASE_URL);
        }
        public function index($libros){
            $this->smarty->assign('titulo', "Libros");
            $this->smarty->assign("libros", $libros);
            $this->smarty->display("templates/libros.tpl");
        }
    }
?>
