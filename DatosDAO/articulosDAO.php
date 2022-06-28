<?php
    require_once("Base.php");
   // require_once("../Modelo/articulos.php");

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
                fecha_alta, fecha_modificacion,fk_categoria, fk_tax) VALUES ('$descripcion', $precio_compra, $precio_venta,
                $existencias,true, CURRENT_TIMESTAMP, null, $fk_categoria, $fk_tax)";
            $this->set_query();
        }

        public function read($id_articulo = ''){
            $this->query = ($id_articulo == '')?
             "SELECT a.id_articulo, 
                a.descripcion , 
                a.precio_compra, 
                a.precio_venta, 
                a.existencias, 
                a.estado, 
                c.categoria, 
                (SELECT name from taxes WHERE id = a.fk_tax) as tipo_iva,
                a.fecha_alta, 
                a.fecha_modificacion 
             FROM 
                articulos a join categorias c on a.fk_categoria = c.id_categoria
            ORDER BY 
                a.id_articulo"
            :"SELECT 
                a.id_articulo, 
                a.descripcion , 
                a.precio_compra, 
                a.precio_venta, 
                a.existencias, 
                a.estado, 
                c.categoria, 
                (SELECT name from taxes WHERE id = a.fk_tax) as tipo_iva,
                a.fecha_alta, 
                a.fecha_modificacion 
            FROM 
                articulos a join categorias c on a.fk_categoria = c.id_categoria 
            WHERE 
                a.id_articulo = $id_articulo";
            $this->get_query();
            //$num_rows = count($this->rows);
            $data = array();
            foreach ($this->rows as $key => $value) {
                array_push($data, $value);
            }

            return $data;
        }

        public function buscar($search_key){
            $this->query = <<<query
            SELECT 
                a.id_articulo, 
                a.descripcion , 
                a.precio_compra, 
                a.precio_venta, 
                a.existencias, 
                a.estado, 
                c.categoria, 
                (SELECT name from taxes WHERE id = a.fk_tax) as tipo_iva,
                a.fecha_alta, 
                a.fecha_modificacion 
            FROM 
                articulos a join categorias c on (a.fk_categoria = c.id_categoria)
            WHERE 
                a.id_articulo LIKE '%$search_key%' OR
                a.descripcion LIKE '%$search_key%' OR
                a.precio_compra LIKE '%$search_key%' OR
                a.precio_venta LIKE '%$search_key%' OR
                a.existencias LIKE '%$search_key%' OR
                a.estado LIKE '%$search_key%' OR
                c.categoria LIKE '%$search_key%' OR
                a.fecha_alta LIKE '%$search_key%' OR
                a.fecha_modificacion LIKE '%$search_key%'
            ORDER BY 
                a.id_articulo
            query;
            /*
            a.id_articulo LIKE '%$search_key%' OR
                a.descripcion LIKE '%$search_key%' OR
                a.precio_compra LIKE '%$search_key%' OR
                a.precio_venta LIKE '%$search_key%' OR
                a.existencias LIKE '%$search_key%' OR
                a.estado LIKE '%$search_key%' OR
                c.categoria LIKE '%$search_key%' OR
                a.fecha_alta LIKE '%$search_key%' OR
                a.fecha_modificacion LIKE '%$search_key%'
                */

            $this->get_query();
            $data = array();
            foreach ($this->rows as $key => $value) {
                array_push($data, $value);
            }

            return json_encode($data);
        }

        public function update( $articulo = array()){
            foreach ($articulo as $key => $value) {
                $$key = $value;
            }

            $this->query = "UPDATE articulos SET descripcion ='$descripcion', precio_compra =$precio_compra,
            precio_venta = $precio_venta,existencias =$existencias,fecha_modificacion = CURRENT_TIMESTAMP,
            fk_categoria =$fk_categoria , fk_tax = $fk_tax WHERE id_articulo =$id_articulo";
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
            foreach ($articulos as $key => $value) {
                $$key = $value;
            }
            $this->query = "UPDATE articulos a SET estado = true, fecha_modificacion = CURRENT_TIMESTAMP WHERE a.id_articulo =$id_articulo";
            $this->set_query();
        }

        public function informeStock(){
            $this->query = "SELECT descripcion,existencias from articulos order by existencias desc";
            $this->get_query();
            $data = array();
            foreach ($this->rows as $key => $value) {
                array_push($data, $value);
            }

            return $data;
        }

    }
?>