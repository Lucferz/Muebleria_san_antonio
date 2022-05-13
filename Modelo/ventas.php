<?php
	/**
	 *
	 */
	class Ventas
	{
		private $id_venta;
		private $fk_articulo;
		private $fk_tipo_venta;
		private $fk_cliente;
		private $fk_usuario;
		private $fk_tipo_comprobante;
		private $descuento;
		private $cantidad;
		private $total;
		private $fecha;
		private $estado;
		function __construct($id_venta, $fk_articulo, $fk_tipo_venta, $fk_cliente, $fk_usuario,$fk_tipo_comprobante,
		$descuento, $cantidad, $total, $fecha, $estado)
		{
			$this->id_venta = $id_venta;
			$this->fk_articulo = $fk_articulo;
			$this->fk_tipo_venta = $fk_tipo_venta;
			$this->fk_cliente = $fk_cliente;
			$this->fk_usuario = $fk_usuario;
			$this->fk_tipo_comprobante = $fk_tipo_comprobante;
			$this->descuento = $descuento;
			$this->cantidad = $cantidad;
			$this->total = $total;
			$this->fecha = $fecha;
			$this->estado = $estado;
		}

		function toArray(){
			$data = array(
				'id_venta' => $this->id_venta,
				'fk_articulo' => $this->fk_articulo,
				'fk_tipo_venta' => $this->fk_tipo_venta,
				'fk_cliente' => $this->fk_cliente,
				'fk_usuario' => $this->fk_usuario,
				'fk_tipo_comprobante' => $this->fk_tipo_comprobante,
				'descuento' => $this->descuento,
				'cantidadad' => $this->cantidadad,
				'total' => $this->total,
				'fecha' => $this->fecha,
				'estado' => $this->estado
			);
			return $data;
		}

		function __destruct(){
		}

	}
?>