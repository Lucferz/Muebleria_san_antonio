<?php
	require_once("Base.php");
	require_once("../Modelo/ventas.php");

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

            $this->query = "INSERT INTO ventas(fk_articulo, fk_tipo_venta, fk_cliente, fk_usuario, fk_tipo_comprobante, descuento, cantidad, total, 
            fecha_emision, fecha_mod, num_factura, num_ticket, estado) 
            VALUES ($fk_articulo, $fk_tipo_venta, $fk_cliente, $fk_usuario, $fk_tipo_comprobante, $descuento, $cantidad, $total, 
            CURRENT_TIMESTAMP,null, $num_factura, $num_ticket, true)";
            $this->set_query();
        }

        public function read($id_venta = ''){
            $this->query = ($id_venta == '')?
             "SELECT 
                v.id_venta,
                c.cliente, 
                c.ci,
                c.ruc,
                u.Nombre,
                tv.tipo, 
                tc.comprobante,
                v.num_factura,
                v.num_ticket, 
                a.descripcion, 
                v.cantidad, 
                v.descuento, 
                v.total, 
                v.fecha_emision, 
                v.fecha_mod,  
                v.estado 
            FROM ventas v join articulos a on v.fk_articulo = a.id_articulo 
                join tipo_venta tv on v.fk_tipo_venta = tv.id 
                join clientes c on v.fk_cliente = c.id_cliente 
                join usuarios u on v.fk_usuario = u.id_usuario 
                join tipo_comprobante tc on v.fk_tipo_comprobante= tc.id_tipo_comprobante;"
            :"SELECT 
                v.id_venta,
                c.cliente, 
                c.ci,
                c.ruc,
                u.Nombre,
                tv.tipo, 
                tc.comprobante,
                v.num_factura,
                v.num_ticket, 
                a.descripcion, 
                v.cantidad, 
                v.descuento, 
                v.total, 
                v.fecha_emision, 
                v.fecha_mod,  
                v.estado 
            FROM ventas v join articulos a on v.fk_articulo = a.id_articulo 
                join tipo_venta tv on v.fk_tipo_venta = tv.id 
                join clientes c on v.fk_cliente = c.id_cliente 
                join usuarios u on v.fk_usuario = u.id_usuario 
                join tipo_comprobante tc on v.fk_tipo_comprobante= tc.id_tipo_comprobante; 
            WHERE 
                v.id_venta = $id_venta";
            $this->get_query();
            $data = array();
            foreach ($this->rows as $key => $value) {
                array_push($data, $value);
            }

            return $data;
        }

        public function update( $venta = array()){
            foreach ($articulo as $key => $value) {
                $$key = $value;
            }

            $this->query = "UPDATE ventas SET fk_articulo = $fk_articulo, fk_tipo_venta=$fk_tipo_venta,
            fk_cliente = $fk_cliente,fk_usuario = $fk_usuario, fk_tipo_comprobante = $fk_tipo_comprobante,
            descuento = $descuento, cantidad = $cantidad, total = $total, fecha_mod = CURRENT_TIMESTAMP,
            num_factura = $num_factura, num_ticket = $num_ticket WHERE id_venta =$id_venta";
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
	}
?>