<?php
    require_once("Base.php");
    require_once("../Modelo/articulos.php");

    class ArticulosDAO extends Base
    {
        public function __construct(){

        }

        public function __destruct(){
        }

        public function create($articulo = array()){
            foreach ($articulo as $key => $value) {
                $$key = $value;
            }

            $this->query = "INSERT INTO articulos (descripcion,precio_compra,precio_venta,existencias,estado,
                fecha_alta, fecha_modificacion,fk_categoria) VALUES ('$descripcion', $precio_compra, $precio_venta,
                $existencias,true, CURRENT_TIMESTAMP, null, $fk_categoria)";
            $this->set_query();
        }

        public function read($id_articulo = ''){
            $this->query = ($id_articulo == '')?
             "SELECT a.id_articulo, a.descripcion , a.precio_compra, a.precio_compra, a.precio_venta, a.existencias, a.estado, c.categoria, a.fecha_alta, a.fecha_modificacion FROM articulos a join categorias c on a.fk_categoria = c.id_categoria WHERE a.estado = true"
            :"SELECT a.id_articulo, a.descripcion , a.precio_compra, a.precio_compra, a.existencias, a.estado, c.categoria, a.fecha_alta, a.fecha_modificacion FROM articulos a join categorias c on a.fk_categoria = c.id_categoria WHERE a.id_articulo = $id_articulo";
            $this->get_query();
            //$num_rows = count($this->rows);
            $data = array();
            foreach ($this->rows as $key => $value) {
                array_push($data, $value);
            }

            return $data;
        }

        public function update( $articulo = array()){
            foreach ($articulo as $key => $value) {
                $$key = $value;
            }

            $this->query = "UPDATE articulos SET descripcion ='$descripcion', precio_compra =$precio_compra,
            precio_venta = $precio_venta,existencias =$existencias,fecha_modificacion = CURRENT_TIMESTAMP,
            fk_categoria =$fk_categoria WHERE id_articulo =$id_articulo";
            $this->set_query();
        }

        public function delete( $articulo = array()){
            foreach ($articulo as $key => $value) {
                $$key = $value;
            }
            $this->query = "UPDATE articulos SET estado = false, fecha_modificacion = CURRENT_TIMESTAMP
            WHERE id_articulo =$id_articulo";
            $this->set_query();
        }

        public function reactivar( $articulos = array()){
            foreach ($cliente as $key => $value) {
                $$key = $value;
            }
            $this->query = "UPDATE articulos a SET estado = true, fecha_modificacion = CURRENT_TIMESTAMP WHERE a.id_articulo =$id_articulo";
            $this->set_query();
        }
    }
?>