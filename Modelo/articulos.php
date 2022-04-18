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

        public function toArray(){
            $data = array(
                'id_articulo' => $this->id_articulo,
                'descripcion' => $this->descripcion,
                'precio_compra' => $this->precio_compra,
                'precio_venta' => $this->precio_venta,
                'existencias' => $this->existencias,
                'estado' => $this->estado,
                'fecha_alta' => $this->fecha_alta,
                'fecha_modificacion' => $this->fecha_mod,
                'fk_categoria' => $this->fk_categoria
            );
            return $data;
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