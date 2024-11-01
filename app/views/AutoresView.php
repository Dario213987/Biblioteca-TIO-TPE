<?php 
    require_once("libs/Smarty.class.php");
    class AutoresView{
        private $smarty;

        function __construct(){
            $this->smarty= new Smarty();
            $this->smarty->assign('base', BASE_URL);
        }

        function verAutores($autores){
            $titulo="Autores";
            $this->smarty->assign('titulo', $titulo);
            $this->smarty->assign('autores', $autores);
            $this->smarty->display('templates/autores.tpl');
        }
    }
?>
