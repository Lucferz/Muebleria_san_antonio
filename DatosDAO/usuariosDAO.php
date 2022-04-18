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

            $this->query = "INSERT INTO articulos (nombre,usuario,password,estado,fecha_alta, fecha_modificacion,fk_tipo_usuario) VALUES ('$nombre', $usuario, $password,
                true, CURRENT_TIMESTAMP, null, $fk_tipo_usuario)";
            $this->set_query();
        }

        public function read($id_usuario = ''){
            $this->query = ($id_usuario == '')? "SELECT * FROM usuarios u WHERE u.estado = true"
            :"SELECT * FROM usuarios a WHERE u.id_usuario = $id_usuario";
            $this->get_query();
            //$num_rows = count($this->rows);
            $data = array();
            foreach ($this->rows as $key => $value) {
                array_push($data, $value);
            }

            return $data;
        }

        public function update( $usuario = array()){
            foreach ($usuario as $key => $value) {
                $$key = $value;
            }

            $this->query = "UPDATE usuarios SET nombre ='$nombre', usuario =$usuario,
            password = $password,fecha_modificacion = CURRENT_TIMESTAMP,
            fk_tipo_usuario =$fk_tipo_usuario WHERE id_usuario =$id_usuario";
            $this->set_query();
        }

        public function delete( $usuario = array()){
            foreach ($usuario as $key => $value) {
                $$key = $value;
            }
            $this->query = "UPDATE usuarios SET estado = false, fecha_modificacion = CURRENT_TIMESTAMP WHERE id_usuario =$id_usuario";
            $this->set_query();
        }
    }
?>
