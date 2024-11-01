<?php
    require_once('Model.php');
    class AutoresModel extends Model{
    public function all(){
                try{
                    $conexion = $this->crearConexion();
                    $conexion->beginTransaction();
                        $query = $conexion -> prepare('SELECT id, nombre, biografia, imagen FROM autores');
                        $query -> execute();
                        $autores = $query -> fetchAll(PDO::FETCH_OBJ);
                    $conexion->commit();
                    return $autores;
                }catch(PDOException $e){
                    $conexion->rollback();
                    error_log($e->getMessage());
                }
            }
    }
?>

