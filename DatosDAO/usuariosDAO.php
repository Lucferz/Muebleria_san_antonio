<?php
    require_once("Base.php");
    require_once("../Modelo/usuarios.php");

    class UsuariosDAO extends Base
    {
        public function __construct(){
            
        }

        public function __destruct(){
        }

        public function create($usuario = array()){
            foreach ($usuario as $key => $value) {
                $$key = $value;
            }

            $this->query = "INSERT INTO usuarios (Nombre,usuario,password,estado,fecha_alta, fecha_mod,fk_tipo_usuario) VALUES (    '$Nombre', '$usuario', '$password',
                true, CURRENT_TIMESTAMP, null, $fk_tipo_usuario)";
            $this->set_query();
        }

        public function read($id_usuario = ''){
            $this->query = ($id_usuario == '')? "SELECT u.id_usuario, u.Nombre,u.usuario,u.password,u.estado,u.fecha_alta, u.fecha_mod, t.tipo FROM usuarios u join tipo_usuario t
            on u.fk_tipo_usuario  = t.id_tipo_usuario"
            :"SELECT u.id_usuario, u.Nombre,u.usuario,u.password,u.estado,u.fecha_alta, u.fecha_mod, t.tipo FROM usuarios u join tipo_usuario t
            on u.fk_tipo_usuario  = t.id_tipo_usuario WHERE u.id_usuario = $id_usuario";
            $this->get_query();
            //$num_rows = count($this->rows);
            $data = array();
            foreach ($this->rows as $key => $value) {
                array_push($data, $value);
            }

            return $data;
        }

        public function buscar($search_key){
            $this->query = <<<query
            SELECT 
                u.id_usuario, 
                u.Nombre,u.usuario,
                u.password,
                u.estado,
                u.fecha_alta, 
                u.fecha_mod, 
                t.tipo 
            FROM 
                usuarios u join tipo_usuario t on u.fk_tipo_usuario  = t.id_tipo_usuario
            WHERE
                u.id_usuario LIKE '%$search_key%' OR 
                u.Nombre LIKE '%$search_key%' OR
                u.usuario LIKE '%$search_key%' OR
                u.password LIKE '%$search_key%' OR
                u.estado LIKE '%$search_key%' OR
                u.fecha_alta LIKE '%$search_key%' OR 
                u.fecha_mod LIKE '%$search_key%' OR 
                t.tipo LIKE '%$search_key%' 
            query;

            $this->get_query();
            $data = array();
            foreach ($this->rows as $key => $value) {
                array_push($data, $value);
            }

            return json_encode($data);
        }

        public function update( $usuario = array()){
            foreach ($usuario as $key => $value) {
                $$key = $value;
            }

            $this->query = "UPDATE usuarios SET Nombre ='$Nombre', usuario ='$usuario',
            password = '$password',fecha_mod = CURRENT_TIMESTAMP,
            fk_tipo_usuario =$fk_tipo_usuario WHERE id_usuario =$id_usuario";
            $this->set_query();
        }

        public function delete( $usuario = array()){
            foreach ($usuario as $key => $value) {
                $$key = $value;
            }
            $this->query = "UPDATE usuarios SET estado = false, fecha_mod = CURRENT_TIMESTAMP WHERE id_usuario =$id_usuario";
            $this->set_query();
        }

        public function reactivar( $usuario = array()){
            foreach ($usuario as $key => $value) {
                $$key = $value;
            }
            $this->query = "UPDATE usuarios SET estado = true, fecha_mod = CURRENT_TIMESTAMP WHERE id_usuario =$id_usuario";
            $this->set_query();
        }
    }
?>