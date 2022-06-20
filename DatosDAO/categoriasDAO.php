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

            $this->query = "INSERT INTO categorias (categoria, estado) VALUES ('$categoria', true)";
            $this->set_query();
        }
        public function read(){
            $this->query =  "SELECT * FROM categorias";
            $this->get_query();
            //$num_rows = count($this->rows);
            $data = array();
            foreach ($this->rows as $key => $value) {
                array_push($data, $value);
            }

            return $data;
        }
        
        public function findById($id_categoria){
            $this->query = "SELECT * FROM categorias c WHERE c.id_categoria = $id_categoria";
            $this->get_query();
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
        }
        public function delete($cat = array()){
            foreach ($cat as $key => $value) {
                $$key = $value;
            }

            $this->query = "UPDATE categorias SET estado = 0 WHERE id_categoria =$id_categoria";
            $this->set_query();
        }

        public function reactivar($cat = array()){
            foreach ($cat as $key => $value) {
                $$key = $value;
            }

            $this->query = "UPDATE categorias SET estado = 1 WHERE id_categoria =$id_categoria";
            $this->set_query();
        }

        public function buscar($search_key){
            $this->query = <<<query
            SELECT * FROM categorias c
            WHERE 
                c.categoria LIKE '%$search_key%'
            query;

            $this->get_query();
            $data = array();
            foreach ($this->rows as $key => $value) {
                array_push($data, $value);
            }

            return json_encode($data);
        }
	}
?>