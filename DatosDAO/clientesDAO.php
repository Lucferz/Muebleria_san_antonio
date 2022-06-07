<?php
    require_once("Base.php");
    require_once("../Modelo/clientes.php");

    class clientesDAO extends Base
    {
        public function __construct(){

        }

        public function __destruct(){
        }

        public function create($cliente = array()){
            foreach ($cliente as $key => $value) {
                $$key = $value;
            }

            $this->query = "INSERT INTO clientes (cliente, telefono, direccion, ci, ruc, estado, fecha_alta, fecha_modificacion) 
                            VALUES ('$cliente', '$telefono', '$direccion', '$ci', '$ruc', true, CURRENT_TIMESTAMP, null)";
            $this->set_query();
        }

        public function read($id_cliente = ''){
            $this->query = ($id_cliente == '')? "SELECT * FROM clientes c "
            :"SELECT * FROM clientes c WHERE c.id_cliente = $id_cliente";
            $this->get_query();

            $data = array();
            foreach ($this->rows as $key => $value) {
                array_push($data, $value);
            }

            return $data;
        }

        public function update( $cliente = array()){
            foreach ($cliente as $key => $value) {
                $$key = $value;
            }

            $this->query = "UPDATE clientes SET cliente ='$cliente', telefono = '$telefono',
            direccion = '$direccion', ci = '$ci', ruc = '$ruc', fecha_modificacion = CURRENT_TIMESTAMP
            WHERE id_cliente =$id_cliente";
            $this->set_query();
        }

        public function delete( $cliente = array()){
            foreach ($cliente as $key => $value) {
                $$key = $value;
            }
            $this->query = "UPDATE clientes SET estado = false, fecha_modificacion = CURRENT_TIMESTAMP WHERE id_cliente =$id_cliente";
            $this->set_query();
        }

        public function reactivar( $cliente = array()){
            foreach ($cliente as $key => $value) {
                $$key = $value;
            }
            $this->query = "UPDATE clientes SET estado = true, fecha_modificacion = CURRENT_TIMESTAMP WHERE id_cliente =$id_cliente";
            $this->set_query();
        }

        public function buscar($search_key){
            $this->query = "SELECT * FROM clientes c
            WHERE id_cliente LIKE '%$search_key%' OR
            cliente LIKE '%$search_key%' OR
            telefono LIKE '%$search_key%' OR
            direccion LIKE '%$search_key%' OR
            ci LIKE '%$search_key%' OR
            ruc LIKE '%$search_key%' OR
            estado LIKE '%$search_key%' OR
            fecha_alta LIKE '%$search_key%' OR
            fecha_modificacion LIKE '%$search_key%'";

            $this->get_query();

            $data = array();
            foreach ($this->rows as $key => $value) {
                array_push($data, $value);
            }

            return json_encode($data);
        }
    }




?>