+<?php
    class tipousuario()
    {
        private $id_tipo_user;
        private $tipo;

        public function __construct($id, $tipo){
            $this->id_tipo_user = $id;
            $this->tipo = $tipo;
        }

        public function toArray() {
            $data = array(
                'id_tipo_user'=> $this->id_tipo_user,
                'tipo' => $this->tipo
            );
            return $data;
        }

        public function toString(){
            return $this->id_tipo_user.', '.$this->tipo;
        }

        public function __destruct(){

        }
    }


?>