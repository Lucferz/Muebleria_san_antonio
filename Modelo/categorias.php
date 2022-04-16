<?php
    class Categorias
    {
        private $id_categoria;
        private $categoria;

        public function __construct($id, $cat){
            $this->id_categoria = $id;
            $this->categoria = $cat;
        }

        public function getId(){
            return $this->id_categoria;
        }

        public function setId($id){
            $this->id_categoria = $id;
        }

        public function getCategoria(){
            return $this->categoria;
        }

        public function setCategoria($cat){
            $this->categoria = $cat;
        }

        public function toString(){
            return $this->id_categoria.', '.$this->categoria;
        }

        public function __destruct(){

        }
    }
    
?>