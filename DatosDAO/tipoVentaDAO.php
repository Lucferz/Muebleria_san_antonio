<?php
    require_once("Base.php");
    //require_once("../Modelo/tipoVenta.php");

    class tipoVentaDAO extends Base
    {
        public function __construct(){

        }

        public function __destruct(){
        }

        public function create($tipo = array()){
            foreach ($tipo as $key => $value) {
                $$key = $value;
            }

            $this->query = "INSERT INTO tipo_venta (tipo, cuotas, recargo, estado) 
                            VALUES ('$tipo',$cuotas, $recargo, true)";
            $this->set_query();
        }

        public function read($id = ''){
            $this->query = ($id == '')? "SELECT * FROM tipo_venta t ORDER BY t.cuotas desc"
            :"SELECT * FROM tipo_venta t WHERE t.id = $id ORDER BY t.cuotas desc";
            $this->get_query();

            $data = array();
            foreach ($this->rows as $key => $value) {
                array_push($data, $value);
            }

            return $data;
        }

        public function listarVenta(){
            $this->query = "SELECT * FROM tipo_venta t WHERE t.estado = 1";
            $this->get_query();

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

            $this->query = "UPDATE tipo_venta SET tipo ='$tipo', cuotas = $cuotas, recargo = $recargo
            WHERE id =$id";
            $this->set_query();
        }

        public function delete( $tipo = array()){
            foreach ($tipo as $key => $value) {
                $$key = $value;
            }
            $this->query = "UPDATE tipo_venta SET estado = false WHERE id =$id";
            $this->set_query();
        }

        public function reactivar( $tipo = array()){
            foreach ($tipo as $key => $value) {
                $$key = $value;
            }
            $this->query = "UPDATE tipo_venta t SET estado = true WHERE t.id =$id";
            $this->set_query();
        }
    }
?>