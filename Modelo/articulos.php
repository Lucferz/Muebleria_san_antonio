<?php
    class articulos{
        private $id_articulo;
        private $descripcion;
        private $precio_compra;
        private $precio_venta;
        private $existencias;
        private $estado;
        private $fecha_alta;
        private $fecha_mod;
        private $fk_categoria;

        public function __construct(){

        }

        public function __construct($id, $desc, $p_compra, $p_venta, $stock, $estado, $f_alta, $f_mod, $fk_cat){
            $this->id_articulo = $id;
            $this->descripcion = $desc;
            $this->precio_compra = $p_compra;
            $this->precio_venta = $p_venta;
            $this->existencias = $stock;
            $this->estado = $estado;
            $this->fecha_alta = $f_alta;
            $this->fecha_mod = $f_mod;
            $this->fk_categoria = $fk_cat;
        }

        public function getId(){
            echo $this->$id_articulo;
        }

        public function setId($id){
            $this->$id_articulo = $id;
        }

        public function getDescripcion(){
            echo $this->$descripcion;
        }

        public function setDescripcion($desc){
            $this->$id_articulo = $desc;
        }
        public function getPrecioCompra(){
            echo $this->$precio_compra;
        }

        public function setPrecioCompra($p_compra){
            $this->$precio_compra = $p_compra;
        }
        public function getPrecioVenta(){
            echo $this->$precio_venta;
        }

        public function setPrecioVenta($p_venta){
            $this->$precio_venta = $p_venta;
        }
        public function getExistencias(){
            echo $this->$existencias;
        }

        public function setExistencias($stock){
            $this->$existencias = $stock;
        }
        public function getEstado(){
            echo $this->$estado;
        }

        public function setEstado($estado){
            $this->$estado = $estado;
        }
        public function getFechaAlta(){
            echo $this->$fecha_alta;
        }

        public function setFachaAlta($f_alta){
            $this->$fecha_alta = $f_alta;
        }
        public function getFechaMod(){
            echo $this->$fecha_mod;
        }

        public function setFechaMod($f_mod){
            $this->$fecha_mod = $f_mod;
        }
        public function getFkCategoria(){
            echo $this->$fk_categoria;
        }

        public function setFkCategoria($fk_cat){
            $this->$fk_categoria = $fk_cat;
        }

    }
    
?>