<?php
    class Categorias
    {
        private $id_categoria;
        private $categoria;

        public function __construct($id, $cat){
            $this->id_categoria = $id;
            $this->categoria = $cat;
        }

        public function toArray() {
            $data = array(
                'id_categoria'=> $this->id_categoria,
                'categoria' => $this->categoria
            );
            return $data;
        }

        public function toString(){
            return $this->id_categoria.', '.$this->categoria;
        }

        public function __destruct(){

        }
    }
    
?>