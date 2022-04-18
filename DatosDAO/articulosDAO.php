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
            $this->query = ($id_articulo == '')? "SELECT * FROM articulos a WHERE a.estado = true"
            :"SELECT * FROM articulos a WHERE a.id_articulo = $id_articulo";
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

        public function delete( $articulos = array()){
            foreach ($cliente as $key => $value) {
                $$key = $value;
            }
            $this->query = "UPDATE articulos a SET estado = true, fecha_modificacion = CURRENT_TIMESTAMP WHERE a.id_articulo =$id_articulo";
            $this->set_query();
        }
    }
?>