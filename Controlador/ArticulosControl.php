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

		public function reactivar($articulo = array()){
			return $this->artiDAO->reactivar($articulo);
		}

		public function buscar($search_key){
			return $this->artiDAO->buscar($search_key);
		}

		public function informeStock(){
			return $this->artiDAO->informeStock();
		}
	}
?>