<?php
    /**
     *
     */
    require_once("Base.php");
    require_once("../Modelo/tipousuario.php");

    class TipoUsuarioDAO extends Base
    {
        public function __construct(){

        }

        public function __destruct(){
        }

        public function create($tipo = array()){
            foreach ($tipo as $key => $value) {
                $$key = $value;
            }

            $this->query = "INSERT INTO tipo_usuario (id_tipo_user, tipo) VALUES ($id_tipo_user, '$tipo')";
            $this->set_query();
        }
        public function read($id_tipo_user = ''){
            $this->query = ($id_tipo_user == '')? "SELECT * FROM tipo_usuario"
            :"SELECT * FROM tipo_usuario t WHERE t.id_tipo_user = $id_tipo_user";
            $this->get_query();
            //$num_rows = count($this->rows);
            $data = array();
            foreach ($this->rows as $key => $value) {
                array_push($data, $value);
            }

            return $data;
        }
        public function update( $tipo = array()){
            foreach ($tipo as $key => $value) {
                $$key = $value;
            }
            $this->query = "UPDATE tipo_usuario SET tipo = '$tipo' WHERE id_tipo_user =$id_tipo_user";
            $this->set_query();
            ;
        }
        public function delete($tipo = array()){
            foreach ($tipo as $key => $value) {
                $$key = $value;
            }

            $this->query = "DELETE FROM tipo_usuario WHERE id_tipo_user =$id_tipo_user";
            $this->set_query();
        }

        public function reactivar(){
            return "Esta clase no permite reactivacion";
        }
    }

    $tDAO= new TipoUsuarioDAO();
    $tipo = new TipoUsuario(2, "Yudith_2");
    var_dump($tipo);
    $tDAO->delete($tipo->toArray());

echo"<pre>";
    var_dump($tDAO->read());
    echo "</pre>";
?>

