<?php
	
	require_once("../DatosDAO/tipoVentaDAO.php");
	class TipoVentaControl
	{
		private $tipoVentaDAO;
		public function __construct()
		{
			$this->tipoVentaDAO = new tipoVentaDAO();
		}

		public function __destruct(){
			unset($this->tipoVentaDAO);
		}

		public function create($tipo = array()){
			return $this->tipoVentaDAO->create($tipo);
		}
		public function read($id_tipo_venta = ''){
			return $this->tipoVentaDAO->read($id_tipo_venta);
		}
		public function update( $tipo = array()){
			return $this->tipoVentaDAO->update($tipo);
		}
		public function delete($tipo = array()){
			return $this->tipoVentaDAO->delete($tipo);
		}
	}
?>