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

            $this->query = "INSERT INTO usuarios (id_usuario, Nombre,usuario,password,estado,fecha_alta, fecha_mod,fk_tipo_usuario) VALUES ($id_usuario,'$nombre', '$usuario', '$password',
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

            $this->query = "UPDATE usuarios SET Nombre ='$nombre', usuario ='$usuario',
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

    $usDAO = new UsuariosDAO();
    $usu = new Usuarios(2,"Lucas", "Luc", "Luk12345", null, null, null, 1);

    $usDAO->reactivar($usu->toArray());
    echo"<pre>";
    var_dump($usDAO->read());
    echo "</pre>";
?>