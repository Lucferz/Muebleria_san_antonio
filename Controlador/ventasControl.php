<?php
	require_once ("../DatosDAO/ventasDAO.php");

	class VentasControl{
		private $ventaDAO;
		public function __construct()
		{
			$this->ventaDAO = new VentasDAO();
		}

		public function __destruct(){
			unset($this->ventaDAO);
		}

		public function create($venta){
			$this->ventaDAO->create($venta);
		}
		public function read($id_venta){
			$this->ventaDAO->read($id_venta);
		}
		public function update($venta){
			$this->ventaDAO->update($venta);
		}
		public function delete($venta){
			$this->ventaDAO->delete($venta);
		}
		public function reactivar($venta){
			$this->ventaDAO->reactivar($venta);
		}
	}
?>