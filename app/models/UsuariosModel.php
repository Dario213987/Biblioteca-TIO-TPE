<?php
    require_once "app/models/Model.php";
    class UsuariosModel extends Model{

        public function find($id){
            try{
                $connection = $this->crearConexion();
                $connection->beginTransaction();
                $query = $connection->prepare("SELECT usuarios.*, roles.id AS rol_id, roles.nombre AS rol_nombre FROM usuarios JOIN roles ON usuarios.rol = roles.id WHERE usuario.id = ?");
                $query->execute([$id]);
                $connection->commit();
                return $query->fetch(PDO::FETCH_OBJ);
            }catch(Exception $e){
                $connection->rollBack();
                error_log(message: $e->getMessage());
            }
        }

        public function findByUsername($username){
            try{
                $connection = $this->crearConexion();
                $connection->beginTransaction();
                $query = $connection->prepare("SELECT usuarios.*, roles.id AS rol_id, roles.nombre AS rol_nombre FROM usuarios JOIN roles ON usuarios.rol = roles.id WHERE usuario.nombre = ?");
                $query->execute([$username]);
                $connection->commit();
                return $query->fetch(PDO::FETCH_OBJ);
            }catch(Exception $e){
                $connection->rollBack();
                error_log(message: $e->getMessage());
            }
        }

        public function create($user){
            try{
                $connection = $this->crearConexion();
                $connection->beginTransaction();
                $query = $connection->prepare("INSERT INTO usuarios(nombre, password, rol) VALUES(?, ?, ?)");
                $query->execute([
                    $user->nombre,
                    $user->password,
                    $user->rol
                ]);
                $connection->commit();
                return $query->fetch(PDO::FETCH_OBJ);
            }catch(Exception $e){
                $connection->rollBack();
                error_log(message: $e->getMessage());
            }
        }

        public function update($user){
            try{
                $connection = $this->crearConexion();
                $connection->beginTransaction();
                $query = $connection->prepare("UPDATE usuarios SET nombre = ?, password = ?, rol = ?");
                $query->execute([
                    $user->nombre,
                    $user->password,
                    $user->rol
                ]);
                $connection->commit();
                return $query->fetch(PDO::FETCH_OBJ);
            }catch(Exception $e){
                $connection->rollBack();
                error_log(message: $e->getMessage());
            }
        }
    }
    
?>