<?php
	/**
	 *
	 */
	require_once("../DatosDAO/TipoComprobanteDAO.php");
	class TipoComprobanteControl
	{
		private $tipcomDAO;
		public function __construct()
		{
			$this->tipcomDAO = new TipoComprobanteDAO();
		}

		public function __destruct(){
			unset($this->tipcomDAO);
		}

		public function create($comprobante = array()){
			return $this->tipcomDAO->create($comprobante);
		}
		public function read($id_tipo_comprobante = ''){
			return $this->tipcomDAO->read($id_comprobante); /*mirar otra vez */
		}
		public function update( $comprobante = array()){
			return $this->tipcomDAO->update($comprobante);
		}
		public function delete($comprobante = array()){
			return $this->tipcomDAO->delete($comprobante);
		}
		public function reactivar($tipo = array()){
			return $this->tipocomDAO->reactivar($tipo);
		}
	}
?>