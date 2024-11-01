<?php
require_once "app/models/Model.php";
    class LibrosModel extends Model{
        public function all(){
            try{
                $connection = $this->crearConexion();
                $connection->beginTransaction();
                    $query = $connection->prepare("SELECT libros.*, autores.nombre AS autor_nombre, autores.biografia AS autor_biografia, autores.imagen AS autor_imagen FROM libros JOIN autores ON libros.autor = autores.id");
                    $query->execute();
                    $libros = $query->fetchAll(PDO::FETCH_OBJ);
                $connection->commit();
                return $libros;
            }catch(Exception $e){
                $connection->rollBack();
                error_log($e->getMessage());
            }
        }
    }
?>
