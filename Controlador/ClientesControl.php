<?php
	
	require_once("../DatosDAO/clientesDAO.php");
	class ClientesControl
	{
		private $clientDAO;
		public function __construct()
		{
			$this->clientDAO = new ClientesDAO();
		}

		public function __destruct(){
			unset($this->clientDAO);
		}

		public function create($cliente = array()){
			return $this->clientDAO->create($cliente);
		}
		public function read($id_cliente = ''){
			return $this->clientDAO->read($id_cliente);
		}
		public function update( $cliente = array()){
			return $this->clientDAO->update($cliente);
		}
		public function delete($cliente = array()){
			return $this->clientDAO->delete($cliente);
		}
		public function reactivar( $cliente = array()){
			return $this->clientDAO->reactivar($cliente);
		}
	}
?>