<?php
	/**
	 *
	 */
	include("../DatosDAO/categoriasDAO.php");
	class CategoriasControl
	{
		private $catDAO = null;
		public function __construct(){
			$catDAO = new CategoriasDAO();
		}

		public function listar(){
			return $this->$catDAO->listar();
		}
	}

	$prueba = new CategoriasControl();
	$prueba->listar();

?>