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
            unset($this);
        }

        public function create($cat = new Categorias() ){
            $cat = $cat->getCategoria();
            $this->query = 'INSERT INTO categorias (categoria) VALUES ('.$cat.' )';
            $this->set_query();
        }

        public function read($id_categoria = '',){
            $this->query = ($id_categoria = '')? "SELECT * FROM categorias"
            :"SELECT * FROM categorias c WHERE c.id_categoria = $id_categoria";
            $this->get_query();
            //$num_rows = count($this->rows);
            $data = array();
            foreach ($this->rows as $key => $value) {
                array_push($data, $value);
            }

            return $data;
        }

        public function update( $cat = new Categorias() ){
            $id = $cat->getId();
            $cat = $cat->getCategoria();

            $this->query = 'UPDATE categorias SET categoria ='.$cat.' WHERE id_categoria ='.$id;
            $this->set_query();
        }

        public function delete( $cat = new Categorias() ){
            $id = $cat->getId();

            $this->query = 'DELETE FROM categorias WHERE id_categoria ='.$id;
            $this->set_query();
        }

	}
?>