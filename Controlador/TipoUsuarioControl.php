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
			$this->tipusuaDAO = new TipousuarioDAO();
		}

		public function __destruct(){
			unset($this->tipusuaDAO);
		}

		public function create($usuario = array()){
			return $this->tipusuaDAO->create($tipo);
		}
		public function read($id_usuario = ''){
			return $this->tipusuaDAO->read($id_usuario);
		}
		public function update( $usuario = array()){
			return $this->tipusuaDAO->update($tipo);
		}
		public function delete($usuario = array()){
			return $this->tipusuaDAO->delete($tipo);
		}
	}
?>