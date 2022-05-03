<?php
    class TipoUsuario
    {
        private $id_tipo_usuario;
        private $tipo;

        public function __construct($id, $tipo){
            $this->id_tipo_usuario = $id;
            $this->tipo = $tipo;
        }

        public function toArray() {
            $data = array(
                'id_tipo_usuario'=> $this->id_tipo_usuario,
                'tipo' => $this->tipo
            );
            return $data;
        }

        public function toString(){
            return $this->id_tipo_usuario.', '.$this->tipo;
        }

        public function __destruct(){

        }
    }


?>