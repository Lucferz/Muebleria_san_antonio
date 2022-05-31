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

            $this->query = "INSERT INTO cobranzas (fk_venta, monto, fecha_cobro, fecha_cobrado, estado,monto_cobrado, fecha_modificado) VALUES ($fk_venta, $monto, $fecha_cobro, null, true, null, null)";
            $this->set_query();
        }
        
        //No se usa la tabla cobranzas porque le queda mejor para ver la tabla de estado_cobranza, pero solo cambia el sql
        public function read($id_cobranza = ''){
            $this->query = ($id_cobranza == '')?
             "SELECT
                c.id_cobranza,
                c.monto ,
                c.fecha_cobro,
                c.fecha_cobrado,
                c.monto_cobrado,
                u.Nombre as Cobrador,
                ec.estado_cobranza
            FROM 
                estado_cobranza ec JOIN cobranzas c ON (ec.id_estado_cobranza = c.id_cobranza)
                JOIN usuarios u ON (ec.fk_cobrador = u.id_usuario)" 
            :"SELECT
                c.id_cobranza,
                c.monto ,
                c.fecha_cobro,
                c.fecha_cobrado,
                c.monto_cobrado,
                u.Nombre as Cobrador,
                ec.estado_cobranza
            FROM 
                estado_cobranza ec JOIN cobranzas c ON (ec.id_estado_cobranza = c.id_cobranza)
                JOIN usuarios u ON (ec.fk_cobrador = u.id_usuario) 
            WHERE c.id_cobranza = $id_cobranza";
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

            $this->query = "UPDATE cobranzas SET  fecha_cobrado = $fecha_cobrado, monto = $monto, fecha_modificado = CURRENT_TIMESTAMP, monto_cobrado = $monto_cobrado WHERE id_cobranza =$id_cobranza";
            $this->set_query();
        }

        public function delete( $cobranza = array()){
            foreach ($cobranza as $key => $value) {
                $$key = $value;
            }
            $this->query = "UPDATE cobranzas SET estado = false, fecha_modificado = CURRENT_TIMESTAMP
            WHERE id_cobranza =$id_cobranza";
            $this->set_query();
        }

        public function reactivar( $cobranzas = array()){
            foreach ($cobranzas as $key => $value) {
                $$key = $value;
            }
            $this->query = "UPDATE cobranzas a SET estado = true, fecha_modificado = CURRENT_TIMESTAMP WHERE c.id_cobranza =$id_cobranza";
            $this->set_query();
        }
    }
?>