<?php
    class tipoVenta{
        private $id;
        private $tipo;
        private $cuotas;
        private $estado;

         public function __construct($id, $tipo, $cuotas, $estado){
            $this->id = $id;
            $this->tipo = $tipo;
            $this->cuotas = $cuotas;
            $this->estado = $estado;
        }


        public function toArray(){
            $data = array(
                'id' => $this->id,
                'tipo' => $this->tipo,
                'cuotas' => $this->cuotas,
                'estado' => $this->estado
            );
            return $data;
        }

        public function toString(){
            return $this->id.', '.$this->tipo.', '.$this->cuotas.', '.$this->estado;
        }

        public function __destruct(){

        }

    }
    
?>