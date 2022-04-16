<?php
    class Articulos{
        private $id_articulo;
        private $descripcion;
        private $precio_compra;
        private $precio_venta;
        private $existencias;
        private $estado;
        private $fecha_alta;
        private $fecha_mod;
        private $fk_categoria;

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
            return $this->id_articulo;
        }

        public function setId($id){
            $this->id_articulo = $id;
        }

        public function getDescripcion(){
            return $this->descripcion;
        }

        public function setDescripcion($desc){
            $this->id_articulo = $desc;
        }
        public function getPrecioCompra(){
            return $this->precio_compra;
        }

        public function setPrecioCompra($p_compra){
            $this->precio_compra = $p_compra;
        }
        public function getPrecioVenta(){
            return $this->precio_venta;
        }

        public function setPrecioVenta($p_venta){
            $this->precio_venta = $p_venta;
        }
        public function getExistencias(){
            return $this->existencias;
        }

        public function setExistencias($stock){
            $this->existencias = $stock;
        }
        public function getEstado(){
            return $this->estado;
        }

        public function setEstado($estado){
            $this->estado = $estado;
        }
        public function getFechaAlta(){
            return $this->fecha_alta;
        }

        public function setFachaAlta($f_alta){
            $this->fecha_alta = $f_alta;
        }
        public function getFechaMod(){
            return $this->fecha_mod;
        }

        public function setFechaMod($f_mod){
            $this->fecha_mod = $f_mod;
        }
        public function getFkCategoria(){
            return $this->fk_categoria;
        }

        public function setFkCategoria($fk_cat){
            $this->fk_categoria = $fk_cat;
        }

        public function toString(){
            return $this->id_articulo.', '.$this->descripcion.', '.$this->precio_compra.', '.
                $this->precio_venta.', '.$this->existencias.', '.$this->estado.', '.$this->fecha_alta.', '.
                $this->fecha_mod.', '.$this->fk_categoria;
        }

        public function __destruct(){

        }

    }
    
?>