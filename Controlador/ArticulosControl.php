<?php
	/**
	 *
	 */
	require_once("../DatosDAO/articulosDAO.php");
	class ArticulosControl
	{
		private $artiDAO;
		public function __construct()
		{
			$this->artiDAO = new ArticulosDAO();
		}

		public function __destruct(){
			unset($this->artiDAO);
		}

		public function create($articulo = array()){
			return $this->artiDAO->create($articulo);
		}
		public function read($id_articulo = ''){
			return $this->artiDAO->read($id_articulo);
		}
		public function update( $articulo = array()){
			return $this->artiDAO->update($articulo);
		}
		public function delete($articulo = array()){
			return $this->artiDAO->delete($articulo);
		}
	}
?>