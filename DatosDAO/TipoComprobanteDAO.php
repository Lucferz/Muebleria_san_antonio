<?php
    /**
     *
     */
    require_once("Base.php");
    require_once("../Modelo/TipoComprobante.php");

    class TipoComprobanteDAO extends Base
    {
        public function __construct(){

        }

        public function __destruct(){
        }

        public function create($comprobante = array()){
            foreach ($comprobante as $key => $value) {
                $$key = $value;
            }

            $this->query = "INSERT INTO tipo_comprobante (id_tipo_comprobante , comprobante, num_factura, num_serie_ticket) 
            VALUES ($id_tipo_comprobante, '$comprobante',  '$num_factura', '$num_serie_ticket')";

            $this->set_query();
        }
        public function read($id_tipo_comprobante = ''){
            $this->query = ($id_tipo_comprobante == '')? "SELECT * FROM tipo_comprobante"
            :"SELECT * FROM tipo_comprobante t WHERE t.id_tipo_comprobante = $id_tipo_comprobante";
            $this->get_query();
            //$num_rows = count($this->rows);
            $data = array();
            foreach ($this->rows as $key => $value) {
                array_push($data, $value);
            }

            return $data;
        }
        public function update( $comprobante = array()){
            foreach ($comprobante as $key => $value) {
                $$key = $value;
            }
            $this->query = "UPDATE tipo_comprobante SET comprobante = '$comprobante' WHERE id_tipo_comprobante =$id_tipo_comprobante";
            $this->set_query();
            ;
        }
        public function delete($tipo = array()){
            foreach ($comprobante as $key => $value) {
                $$key = $value;
            }

            $this->query = "DELETE FROM tipo_comprobante WHERE id_tipo_comprobante =$id_tipo_comprobante";
            $this->set_query();
        }

        public function reactivar(){
            return "Esta clase no permite reactivacion";
        }
    }


    $tcDAO = new TipoComprobanteDAO();
    $comp = new TipoComprobante(2,"factura", "123", "456");

    echo"<pre>";
    var_dump($tcDAO->delete(2));
    echo "</pre>"; 

 /*   $tDAO= new TipoComprobanteDAO();
    $tipo = new TipoComprobante(2, "Yudith_2");
    var_dump($tipo);
    $tDAO->delete($tipo->toArray());

echo"<pre>";
    var_dump($tDAO->read());
    echo "</pre>"; */
?>
