<?php
	/**
	 *
	 */
	require_once("Base.php");
	require_once("../Modelo/categorias.php");

	class CategoriasDAO extends Base
	{
        public function __construct(){

        }

        public function __destruct(){
        }

        public function create($cat = array()){
            foreach ($cat as $key => $value) {
                $$key = $value;
            }

            $this->query = "INSERT INTO categorias (id_categoria, categoria) VALUES ($id_categoria, '$categoria')";
            $this->set_query();
        }
        public function read($id_categoria = ''){
            $this->query = ($id_categoria == '')? "SELECT * FROM categorias"
            :"SELECT * FROM categorias c WHERE c.id_categoria = $id_categoria";
            $this->get_query();
            //$num_rows = count($this->rows);
            $data = array();
            foreach ($this->rows as $key => $value) {
                array_push($data, $value);
            }

            return $data;
        }
        public function update( $cat = array()){
            foreach ($cat as $key => $value) {
                $$key = $value;
            }
            $this->query = "UPDATE categorias SET categoria = '$categoria' WHERE id_categoria =$id_categoria";
            $this->set_query();
            ;
        }
        public function delete($cat = array()){
            foreach ($cat as $key => $value) {
                $$key = $value;
            }

            $this->query = "DELETE FROM categorias WHERE id_categoria =$id_categoria";
            $this->set_query();
        }
	}

?>