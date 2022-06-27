<?php
	require_once ("../DatosDAO/ventasDAO.php");

	class ventasControl{
		private $ventaDAO;
		public function __construct()
		{
			$this->ventaDAO = new VentasDAO();
		}

		public function __destruct(){
			unset($this->ventaDAO);
		}

		public function create($venta = array()){
			return $this->ventaDAO->create($venta);
		}
		public function read($id_venta = ''){
			return $this->ventaDAO->read($id_venta);
		}
		public function update( $venta = array()){
			return $this->ventaDAO->update($venta);
		}
		public function delete($venta = array()){
			return $this->ventaDAO->delete($venta);
		}
		public function reactivar( $venta = array()){
			return $this->ventaDAO->reactivar($venta);
		}
		public function buscar($search_key){
			return $this->ventaDAO->buscar($search_key);
		}
	}
?>