<?php
    require_once("Base.php");
    require_once("../Modelo/articulos.php");

    class ArticulosDAO extends Base
    {
        public function __construct(){

        }

        public function __destruct(){
            unset($this);
        }

        public function create($articulo = new Articulos() ){
            $desc = $articulo->getDescripcion();
            $p_compra = $articulo->getPrecioCompra();
            $p_venta = $articulo->getPrecioVenta();
            $existencias = $articulo->getExistencias();
            $fk_categoria = $articulo->getFkCategoria();

            $this->query = 'INSERT INTO articulos (descripcion,precio_compra,precio_venta,existencias,estado,fecha_alta, fecha_modificacion,fk_categoria) VALUES ('.$desc.','.$p_compra.', '.$p_venta.', '.$existencias.', true, CURRENT_TIMESTAMP,null,'.$fk_categoria.' )';
            $this->set_query();
        }

        public function read($id_articulo = '',){
            $this->query = ($id_articulo = '')? "SELECT * FROM articulos a WHERE a.estado = true"
            :"SELECT * FROM articulos a WHERE a.id_articulo = $id_articulo";
            $this->get_query();
            //$num_rows = count($this->rows);
            $data = array();
            foreach ($this->rows as $key => $value) {
                array_push($data, $value);
            }

            return $data;
        }

        public function update( $articulo = new Articulos() ){
            $id = $articulo->getId();
            $desc = $articulo->getDescripcion();
            $p_compra = $articulo->getPrecioCompra();
            $p_venta = $articulo->getPrecioVenta();
            $existencias = $articulo->getExistencias();
            $fk_categoria = $articulo->getFkCategoria();

            $this->query = 'UPDATE articulos SET descripcion ='.$desc.', precio_compra ='.$p_compra.',precio_venta = '.$p_venta.',
             existencias ='.$existencias.',fecha_modificacion = CURRENT_TIMESTAMP,fk_categoria = '.$fk_categoria.
             ' WHERE id_articulo ='.$id;
            $this->set_query();
        }

        public function delete( $articulo = new Articulos() ){
            $id = $articulo->getId();
            $this->query = 'UPDATE articulos SET estado = false WHERE id_articulo ='.$id;
            $this->set_query();
        }
    }

    $articDAO = new ArticulosDAO();
    $articulo = new Articulos(null,'articulo1', 1000, 3000, 10, null, null, null, 1);
    $res = $articDAO->insertar($articulo);
    echo $res;

?>