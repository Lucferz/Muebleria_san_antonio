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
        
        
        public function read($id_cobranza = ''){
            $this->query = ($id_cobranza == '')?
            "SELECT
                cli.cliente,
                cli.direccion,
                c.monto,
                c.fecha_cobro ,
                CONCAT(MIN(c.cuota_nro),'/', tv.cuotas) AS cuota_nro,
                c.id_cobranza,
                c.fk_venta,
                CASE
                    WHEN c.fecha_cobro_mora IS NULL THEN
                        0
                    ELSE
                        DATEDIFF(NOW(), c.fecha_cobro)
                END AS 'mora'
            FROM
                cobranzas c
            JOIN ventas v ON
                (c.fk_venta = v.id_venta)
            JOIN clientes cli ON
                (v.fk_cliente = cli.id_cliente)
            JOIN tipo_venta tv ON
                (v.fk_tipo_venta = tv.id)
            WHERE
                c.estado = 1
                AND
                c.fecha_cobrado IS NULL 
                AND 
                c.monto_cobrado IS NULL 
            ORDER BY 
                c.id_cobranza asc
            LIMIT 15" 
            :"SELECT * FROM cobranzas c 
            WHERE 
                id_cobranza NOT IN (SELECT ec.fk_cobranza  from estado_cobranza ec) AND
                c.estado = 1 AND c.id_cobranza = $id_cobranza";
            $this->get_query();
           
            $data = array();
            foreach ($this->rows as $key => $value) {
                array_push($data, $value);
            }

            return $data;
        }

        public function listar(){
            $this->query = "SELECT
            c.id_cobranza,
            cli.cliente,
            cli.direccion,
            c.monto,
            c.fecha_cobro,
            c.fecha_cobrado,
            c.monto_cobrado,
            c.estado
        FROM 
            cobranzas c JOIN ventas v ON (c.fk_venta = v.id_venta)
            JOIN clientes cli ON (v.fk_cliente = cli.id_cliente)
        ORDER BY 
        	c.id_cobranza  desc" ;
            $this->get_query();
           
            $data = array();
            foreach ($this->rows as $key => $value) {
                array_push($data, $value);
            }

            return $data;
        }

        public function listarInicio(){
            $this->query = "SELECT * FROM cobranza_view cv ORDER BY estado_cobranza desc, fecha_cobro asc, mora desc limit 25";
            $this->get_query();
           
            $data = array();
            foreach ($this->rows as $key => $value) {
                array_push($data, $value);
            }

            return $data;
        }

        public function buscar($search_key){
            $this->query = <<<query
            SELECT
                cli.cliente,
                cli.direccion,
                c.monto,
                c.fecha_cobro ,
                MIN(c.cuota_nro) AS cuota_nro,
                c.id_cobranza,
                c.fk_venta,
                CASE
                    WHEN c.fecha_cobro_mora IS NULL THEN
                        0
                    ELSE
                        DATEDIFF(NOW(), c.fecha_cobro)
                END AS 'mora'
            FROM
                cobranzas c
            JOIN ventas v ON
                (c.fk_venta = v.id_venta)
            JOIN clientes cli ON
                (v.fk_cliente = cli.id_cliente)
            WHERE
                c.estado = 1
                AND
                c.fecha_cobrado IS NULL 
                AND 
                c.monto_cobrado IS NULL 
                AND
                (cli.cliente LIKE '%$search_key%' OR
                cli.direccion LIKE '%$search_key%' OR
                c.fecha_cobro LIKE '%$search_key%')
            ORDER BY 
                c.id_cobranza asc
            query;
            $this->get_query();
           
            $data = array();
            foreach ($this->rows as $key => $value) {
                array_push($data, $value);
            }

            return json_encode($data);
        }

        public function getSaldo($id_ven){
            $this->query = <<<query
            SELECT 
                SUM(c.monto) as saldo
            FROM 
                cobranzas c 
            WHERE 
                c.monto_cobrado IS NULL  
                AND 
                c.estado = 1
                AND 
                c.fk_venta = $id_ven
            query;
            $this->get_query();
           
            $data = array();
            foreach ($this->rows as $key => $value) {
                array_push($data, $value);
            }

            return json_encode($data);
        }

        public function update( $cobranza = array()){
            foreach ($cobranza as $key => $value) {
                $$key = $value;
            }

            $this->query = "CALL cobrar_cuota($monto_cobrado, $id_cobranza)";
            $this->set_query();
            $this->query = "INSERT INTO estado_cobranza(fk_cobrador, fk_cobranza, estado_cobranza) VALUES ($fk_cobrador, $id_cobranza, 'COBRADO')";
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

        public function aplazar_cobro($id){//aplaza el cobro por 7 dias, despues mejorar para que sean puestos por el usuario
            $this->query = "UPDATE cobranzas c SET c.fecha_cobro_mora = ADDDATE((SELECT c.fecha_cobro FROM cobranzas c WHERE id = $id), 7) WHERE c.id_cobranza = $id";
            $this->set_query();
        }
    }
?>