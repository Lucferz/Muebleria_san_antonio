<?php
	require_once("Base.php");
	//require_once("../Modelo/ventas.php");

	class VentasDAO extends Base
	{

		function __construct(){
		}

		function __destruct(){
		}

		public function create($venta = array()){
            foreach ($venta as $key => $value) {
                $$key = $value;
            }

            $this->query = "INSERT INTO ventas(fk_articulo, fk_tipo_venta, fk_cliente, fk_usuario, fk_tipo_comprobante, descuento, cantidad, entrega, total, 
            fecha_emision, fecha_mod, num_factura, num_ticket, estado) 
            VALUES ($fk_articulo, $fk_tipo_venta, $fk_cliente, $fk_usuario, $fk_tipo_comprobante, $descuento, $cantidad, $entrega, $total, 
            CONCAT('$date', ' ', CURRENT_TIME()),null, null, get_seq_value('ticket_ven_seq'), true)";
            $this->set_query();
        }

        public function read($id_venta = ''){
            $this->query = ($id_venta == '')? "SELECT 
                v.id_venta,
                c.cliente, 
                u.Nombre as vendedor,
                tv.tipo as tipo_venta, 
                tc.comprobante,
                v.num_factura,
                v.num_ticket, 
                a.descripcion as articulo, 
                v.cantidad, 
                v.descuento, 
                v.entrega,
                v.total, 
                v.fecha_emision, 
                v.fecha_mod,  
                v.estado 
            FROM ventas v join articulos a on v.fk_articulo = a.id_articulo 
                join tipo_venta tv on v.fk_tipo_venta = tv.id 
                join clientes c on v.fk_cliente = c.id_cliente 
                join usuarios u on v.fk_usuario = u.id_usuario 
                join tipo_comprobante tc on v.fk_tipo_comprobante= tc.id_tipo_comprobante
            ORDER BY
                v.id_venta"
            :"SELECT 
                v.id_venta,
                c.cliente, 
                v.fk_cliente,
                u.Nombre as vendedor,
                tv.tipo as tipo_venta, 
                tc.comprobante,
                v.num_factura,
                v.num_ticket, 
                a.descripcion as articulo, 
                v.fk_articulo,
                a.precio_venta,
                a.existencias,
                v.cantidad, 
                v.descuento, 
                v.entrega,
                v.total, 
                v.fecha_emision, 
                v.fecha_mod,  
                v.estado 
            FROM ventas v join articulos a on v.fk_articulo = a.id_articulo 
                join tipo_venta tv on v.fk_tipo_venta = tv.id 
                join clientes c on v.fk_cliente = c.id_cliente 
                join usuarios u on v.fk_usuario = u.id_usuario 
                join tipo_comprobante tc on v.fk_tipo_comprobante= tc.id_tipo_comprobante
            WHERE 
                v.id_venta = $id_venta";
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
                v.id_venta,
                c.cliente, 
                u.Nombre as vendedor,
                tv.tipo as tipo_venta, 
                tc.comprobante,
                v.num_factura,
                v.num_ticket, 
                a.descripcion as articulo, 
                v.cantidad, 
                v.descuento, 
                v.entrega
                v.total, 
                v.fecha_emision, 
                v.fecha_mod,  
                v.estado 
            FROM 
                ventas v join articulos a on v.fk_articulo = a.id_articulo 
                join tipo_venta tv on v.fk_tipo_venta = tv.id 
                join clientes c on v.fk_cliente = c.id_cliente 
                join usuarios u on v.fk_usuario = u.id_usuario 
                join tipo_comprobante tc on v.fk_tipo_comprobante= tc.id_tipo_comprobante
            WHERE
                c.cliente LIKE '%$search_key%' OR 
                u.Nombre LIKE '%$search_key%' OR
                tv.tipo LIKE '%$search_key%' OR 
                tc.comprobante LIKE '%$search_key%' OR
                v.num_factura LIKE '%$search_key%' OR
                v.num_ticket LIKE '%$search_key%' OR 
                a.descripcion LIKE '%$search_key%' OR
                v.fecha_emision LIKE '%$search_key%' OR 
                v.fecha_mod LIKE '%$search_key%' OR  
                v.estado LIKE '%$search_key%
            ORDER BY
                v.id_vent'
            query;
            $this->get_query();
            $data = array();
            foreach ($this->rows as $key => $value) {
                array_push($data, $value);
            }

            return json_encode($data);
        }

        public function update( $venta = array()){
            foreach ($venta as $key => $value) {
                $$key = $value;
            }

            $this->query = "UPDATE ventas SET fk_articulo = $fk_articulo, fk_cliente = $fk_cliente, descuento = $descuento, 
            cantidad = $cantidad, entrega = $entrega, total = $total, fecha_mod = CURRENT_TIMESTAMP 
            WHERE id_venta = $id_venta";
            $this->set_query();
        }

        public function delete($venta = array()){
        	foreach ($venta as $key => $value) {
                $$key = $value;
            }
            $this->query = "UPDATE ventas SET estado = false, fecha_mod = CURRENT_TIMESTAMP
            WHERE id_venta =$id_venta";
            $this->set_query();
        }

        public function reactivar( $venta = array()){
            foreach ($venta as $key => $value) {
                $$key = $value;
            }
            $this->query = "UPDATE ventas SET estado = true, fecha_mod = CURRENT_TIMESTAMP WHERE id_venta =$id_venta";
            $this->set_query();
        }

        public function informeVentas(){
            $this->query = "SELECT 
            c.cliente, 
            u.Nombre,
            a.descripcion, 
            v.total, 
            v.fecha_emision 
            FROM ventas v join articulos a on v.fk_articulo = a.id_articulo
            join clientes c on v.fk_cliente = c.id_cliente 
            join usuarios u on v.fk_usuario = u.id_usuario where u.fk_tipo_usuario=1 or u.fk_tipo_usuario=3
            ORDER BY fecha_emision asc";

            $this->get_query();
            $data = array();
            foreach ($this->rows as $key => $value) {
                array_push($data, $value);
            }

            return $data;
        }

        
	}



?>