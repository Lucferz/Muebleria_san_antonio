<?php
	/**
	 *
	 */
	require_once("../DatosDAO/categoriasDAO.php");
	class CategoriasControl
	{
		private $catDAO;
		public function __construct(){
			$this->catDAO = new CategoriasDAO();
		}
		public function __destruct(){
			unset($this->catDAO);
		}
		public function create($cat = array()){
			return $this->catDAO->create($cat);
		}
		public function read($id_categoria = ''){
			return $this->catDAO->read($id_categoria);
		}
		public function update( $cat = array()){
			return $this->catDAO->update($cat);
		}
		public function delete($cat = array()){
			return $this->catDAO->delete($cat);
		}

	}

	$prueba = new CategoriasControl();
	$res = $prueba->read();
	echo "<pre>";
	var_dump($res);
	echo "</pre>";

?>