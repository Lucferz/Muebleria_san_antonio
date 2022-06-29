<?php
	
	require_once("../DatosDAO/cobranzasDAO.php");
	class CobranzasControl
	{
		private $cobranzaDAO;
		public function __construct()
		{
			$this->cobranzaDAO = new CobranzasDAO();
		}

		public function __destruct(){
			unset($this->cobranzaDAO);
		}

		public function create($cobranza = array()){
			return $this->cobranzaDAO->create($cobranza);
		}
		public function read($id_cobranza = ''){
			return $this->cobranzaDAO->read($id_cobranza);
		}
		public function listar(){
			return $this->cobranzaDAO->listar();
		}
		public function buscar($search_key){
			return $this->cobranzaDAO->buscar($search_key);
		}
		public function update( $cobranza = array()){
			return $this->cobranzaDAO->update($cobranza);
		}
		public function delete($cobranza = array()){
			return $this->cobranzaDAO->delete($cobranza);
		}
		public function listarInicio(){
			return $this->cobranzaDAO->listarInicio();
		}
		public function reactivar($cobranza = array()){
			return $this->cobranzaDAO->reactivar($cobranza);
		}
		public function aplazar_cobro($id){
			return $this->cobranzaDAO->aplazar_cobro($id);
		}
	}
?>