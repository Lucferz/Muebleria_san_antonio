<?php
	/**
	 *
	 */
	require_once("../DatosDAO/tipousuarioDAO.php");
	class TipoUsuarioControl
	{
		private $tipusuaDAO;
		public function __construct()
		{
			$this->tipusuaDAO = new TipoUsuarioDAO();
		}

		public function __destruct(){
			unset($this->tipusuaDAO);
		}

		public function create($tipo = array()){
			return $this->tipusuaDAO->create($tipo);
		}
		public function read($id_tipo_usuario = ''){
			return $this->tipusuaDAO->read($id_tipo_usuario);
		}
		public function update( $tipo = array()){
			return $this->tipusuaDAO->update($tipo);
		}
		public function delete($tipo = array()){
			return $this->tipusuaDAO->delete($tipo);
		}
		public function reactivar($tipo = array()){
			return $this->tipousuaDAO->reactivar($tipo);
		}
	}
?>