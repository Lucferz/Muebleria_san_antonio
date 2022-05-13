<?php
    class tipoVenta{
        private $id_tipo_venta;
        private $tipo;
        private $cuotas;
        private $estado;

         public function __construct($id_tipo_venta, $tipo, $cuotas, $estado){
            $this->id_tipo_venta = $id_tipo_venta;
            $this->tipo = $tipo;
            $this->cuotas = $cuotas;
            $this->estado = $estado;
        }


        public function toArray(){
            $data = array(
                'id_tipo_venta' => $this->id_tipo_venta,
                'tipo' => $this->tipo,
                'cuotas' => $this->cuotas,
                'estado' => $this->estado
            );
            return $data;
        }

        public function toString(){
            return $this->id_tipo_venta.', '.$this->tipo.', '.$this->cuotas.', '.$this->estado;
        }

        public function __destruct(){

        }

    }
    
?>