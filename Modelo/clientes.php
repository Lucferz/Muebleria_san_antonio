<?php
    class Clientes{
        private $id_cliente;
		private $cliente;
		private $tel;
		private $direccion;
		private $ci;
		private $ruc;
		private $estado;
		private $fecha_alta;
		private $fecha_mod;

        public function __construct($id_cliente, $cliente, $tel, $direccion, $ci, $ruc, $estado, $f_alta, $f_mod){
            $this->id_cliente = $id_cliente;
            $this->cliente = $cliente;
            $this->tel = $tel;
            $this->direccion = $direccion;
            $this->ci = $ci;
            $this->ruc = $ruc;
            $this->estado = $estado;
            $this->fecha_alta = $f_alta;
            $this->fecha_mod = $f_mod;
            
        }

        public function toArray(){
            $data = array(
            	'id_cliente' => $this->id_cliente,
            	'cliente' => $this->cliente,
            	'telefono' => $this->tel,
           	 	'direccion' => $this->direccion,
            	'ci' => $this->ci,
            	'ruc' => $this->ruc,
            	'estado' => $this->estado,
          		'fecha_alta' => $this->fecha_alta,
            	'fecha_modificacion' => $this->fecha_mod
            );
            return $data;
        }

       public function toString(){
            return $this->id_cliente.', '.$this->cliente.', '.$this->telefono.', '.
                $this->direccion.', '.$this->ci.', '.$this->ci.', '.$this->ruc.', '.$this->estado.', '.$this->fecha_alta.', '.$this->fecha_mod;
        }

        public function __destruct(){

        }

    }
    
?>