<?php
	/**
	 *
	 */
	require_once("../DatosDAO/usuariosDAO.php");
	class UsuariosControl
	{
		private $usuaDAO;
		public function __construct()
		{
			$this->usuaDAO = new UsuariosDAO();
		}

		public function __destruct(){
			unset($this->usuaDAO);
		}

		public function create($usuario = array()){
			return $this->usuaDAO->create($usuario);
		}
		public function read($id_usuario = ''){
			return $this->usuaDAO->read($id_usuario);
		}
		public function update( $usuario = array()){
			return $this->usuaDAO->update($usuario);
		}
		public function delete($usuario = array()){
			return $this->usuaDAO->delete($usuario);
		}
		public function reactivar( $usuario = array()){
			return $this->usuaDAO->reactivar($usuario);
		}
		public function buscar($search_key){
			return $this->usuaDAO->buscar($search_key);
		}
	}
?>