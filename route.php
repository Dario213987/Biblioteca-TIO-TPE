<?php
    require_once 'app/controllers/UsuariosController.php';
    require_once 'app/controllers/LibrosController.php';
    require_once 'app/controllers/AutoresController.php';
    //NOTA: tuve que agregar un rtrim para eliminar la última barra de la url puesto que me aparecian con doble barra en algunos casos, uso linux
    define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . rtrim(dirname($_SERVER['PHP_SELF']), '/') . '/');
    // leo el parametro accion
    $action = 'home'; // accion por defecto
    if (!empty($_GET['action'])) {
        $action = $_GET['action'];  // action   => about/juan
    }

    // parsea la accion Ej: about/juan --> ['about', 'juan']
    $params = explode('/', $action); // genera un arreglo
    $autoresController = new AutoresController();
    $librosController = new LibrosController();
    $usuariosController = new UsuariosController();

    switch ($params[0]) {
        case 'inicio':
            $librosController->index();
            break;
        case 'libros':
            if(!empty($params[1])){
                switch($params[1]){
                    case 'crear':
                        $librosController->create();
                        break;
                    case 'enviar':
                        $librosController->store();
                        break;
                    case 'editar':
                        $librosController->edit($params[2]);
                        break;
                    case 'guardar':
                        $librosController->update();
                        break;
                    case 'eliminar':
                        $librosController->destroy($params[2]);
                        break;
                    default:
                        $librosController->show($params[1]);
                        break;
                }
                
            }else{
                $librosController->index();
            }
            break;
        case 'autores':
            if(isset($params[1]) && $params[1]!=null){
                switch($params[1]){
                    case 'crear':
                        $autoresController->create();
                        break;
                    case 'enviar':
                        $autoresController->store();
                        break;
                    case 'editar':
                        $autoresController->edit($params[2]);
                        break;
                    case 'guardar':
                        $autoresController->update();
                        break;
                    case 'eliminar':
                        $autoresController->destroy($params[2]);
                        break;
                    default:
                        $autoresController->show($params[1]);
                        break;
                }
                
            }else{
                $autoresController->index();
            }

            break;
        case 'iniciar-sesion':
            $usuariosController->loginForm();
            break;
        case 'login':
            $usuariosController->login();
            break;
        case 'logout':
            $usuariosController->logout();
            break;
        default:
            header("Location: ".BASE_URL."inicio");
            break;
    }

?>