<?php
    require_once("Base.php");
   // require_once("../Modelo/cobranzas.php"); 

    class CobranzasDAO extends Base
    {
        public function __construct(){

        }

        public function __destruct(){
        }

        public function create($cobranza = array()){
            foreach ($cobranza as $key => $value) {
                $$key = $value;
            }

            $this->query = "INSERT INTO cobranzas (fk_venta, fk_estado_cobranza, monto, fecha, estado,monto_cobrado) VALUES ($f_venta, $fk_estado_cobranza, $monto, CURRENT_TIMESTAMP, true, $monto_cobrado)";
            $this->set_query();
        }

        public function read($id_cobranza = ''){
            $this->query = ($id_cobranza == '')?
             "SELECT v.total, e.estado_cobranza, c.id_cobranza, c.monto, c.fecha,  c.fecha, c.estado, c.monto_cobrado FROM cobranzas c join ventas v on c.fk_venta = v.id_venta WHERE c.estado = true join estado_cobranza e on c.fk_estado_cobranza = e.id_estado_cobranza" 
            :"SELECT v.total, e.estado_cobranza, c.id_cobranza, c.monto, c.fecha,  c.fecha, c.estado, c.monto_cobrado FROM cobranzas c join ventas v on v.fk_venta = c.id_categoria WHERE c.id_cobranza = $id_cobranza join estado_cobranza e on c.fk_estado_cobranza = e.id_estado_cobranza WHERE c.id_cobranza = $id_cobranza";
            $this->get_query();
           
            $data = array();
            foreach ($this->rows as $key => $value) {
                array_push($data, $value);
            }

            return $data;
        }

        public function update( $cobranza = array()){
            foreach ($cobranza as $key => $value) {
                $$key = $value;
            }

            $this->query = "UPDATE cobranzas SET fk_venta = $fk_venta, fk_estado_cobranza = $fk_estado_cobranza, monto = $monto, fecha = CURRENT_TIMESTAMP, monto_cobrado = $monto_cobrado WHERE id_cobranza =$id_cobranza";
            $this->set_query();
        }

        public function delete( $cobranza = array()){
            foreach ($cobranza as $key => $value) {
                $$key = $value;
            }
            $this->query = "UPDATE cobranzas SET estado = false
            WHERE id_cobranza =$id_cobranza";
            $this->set_query();
        }

        public function reactivar( $cobranzas = array()){
            foreach ($cobranzas as $key => $value) {
                $$key = $value;
            }
            $this->query = "UPDATE cobranzas a SET estado = true WHERE c.id_cobranza =$id_cobranza";
            $this->set_query();
        }
    }
?>