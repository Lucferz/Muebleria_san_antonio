<?php
class TipoComprobante
    {
        private $id_tipo_comprobante;
        private $comprobante;
        private $num_factura;
        private $num_serie_ticket;


        public function __destruct(){

        }

        public function __construct($id, $comprobante, $num_factura, $num_serie_ticket){
            $this->id_tipo_comprobante = $id;
            $this->comprobante = $comprobante;
            $this->num_factura = $num_factura;
            $this->num_serie_ticket = $num_serie_ticket;

        }

        public function getId(){
            echo $this->$id_comprobante;
        }

        public function setId($id){
            $this->$id_comprobante = $id;
        }


        public function getComprobante(){
            echo $this->$comprobante;
        }

        public function setComprobante($comprobante){
            $this->$comprobante = $comprobante;
        }       

        public function getNum_factura(){
            echo $this->$num_factura;
        }

        public function setNum_factura($num_factura){
            $this->$num_factura = $num_factura;
        }

        public function getNum_serie_ticket(){
            echo $this->$num_serie_ticket;
        }

        public function setNum_serie_ticket($num_serie_ticket){
            $this->$num_serie_ticket = $num_serie_ticket;
        }

       

        public function toArray(){
            $data = array(
                'id_comprobante' => $this->id_comprobante ,
                'comprobante' => $this->comprobante,
                'num_factura' => $this->num_factura,
                'num_serie_ticket' => $this->num_serie_ticket,

            );
            return $data;
        }

    }
    
?>