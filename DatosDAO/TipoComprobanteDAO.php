<?php
    /**
     *
     */
    require_once("Base.php");
    //require_once("../Modelo/TipoComprobante.php");

    class TipoComprobanteDAO extends Base
    {
        public function __construct(){

        }

        public function __destruct(){
        }

        public function create($comprobante = array()){
            foreach ($comprobante as $key => $value) {
                $$key = $value;
            }

            $this->query = "INSERT INTO tipo_comprobante (comprobante, estado) VALUES ('$comprobante', true)";

            $this->set_query();
        }
        public function read($id_tipo_comprobante = ''){
            $this->query = ($id_tipo_comprobante == '')? "SELECT * FROM tipo_comprobante"
            :"SELECT * FROM tipo_comprobante t WHERE t.id_tipo_comprobante = $id_tipo_comprobante";
            $this->get_query();
            //$num_rows = count($this->rows);
            $data = array();
            foreach ($this->rows as $key => $value) {
                array_push($data, $value);
            }

            return $data;
        }
        public function update( $comprobante = array()){
            foreach ($comprobante as $key => $value) {
                $$key = $value;
            }
            $this->query = "UPDATE tipo_comprobante SET comprobante = '$comprobante' WHERE id_tipo_comprobante =$id_tipo_comprobante";
            $this->set_query();
        }
        public function delete($tipo = array()){
            foreach ($comprobante as $key => $value) {
                $$key = $value;
            }

            $this->query = "UPDATE tipo_comprobante SET estado = false WHERE id_tipo_comprobante =$id_tipo_comprobante";
            $this->set_query();
        }

        public function reactivar($tipo = array()){
            foreach ($comprobante as $key => $value) {
                $$key = $value;
            }

            $this->query = "UPDATE tipo_comprobante SET estado = true WHERE id_tipo_comprobante =$id_tipo_comprobante";
            $this->set_query();
        }
    }
?>
