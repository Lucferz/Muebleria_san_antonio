<?php
    require_once("Base.php");
    require_once("../Modelo/tipoVenta.php");

    class tipoVentaDAO extends Base
    {
        public function __construct(){

        }

        public function __destruct(){
        }

        public function create($tipo = array()){
            foreach ($tipo as $key => $value) {
                $$key = $value;
            }

            $this->query = "INSERT INTO tipo_venta (tipo, cuotas, estado) 
                            VALUES ('$tipo',$cuotas, true)";
            $this->set_query();
        }

        public function read($id_tipo_venta = ''){
            $this->query = ($id_tipo_venta == '')? "SELECT * FROM tipo_venta t"
            :"SELECT * FROM tipo_venta t WHERE t.id_tipo_venta = $id_tipo_venta";
            $this->get_query();

            $data = array();
            foreach ($this->rows as $key => $value) {
                array_push($data, $value);
            }

            return $data;
        }

        public function update( $tipo = array()){
            foreach ($tipo as $key => $value) {
                $$key = $value;
            }

            $this->query = "UPDATE tipo_venta SET tipo_venta ='$tipo', cuotas = '$cuotas'
            WHERE id_tipo_venta =$id_tipo_venta";
            $this->set_query();
        }

        public function delete( $tipo = array()){
            foreach ($tipo as $key => $value) {
                $$key = $value;
            }
            $this->query = "UPDATE tipo_venta SET estado = false WHERE id_tipo_venta =$id_tipo_venta";
            $this->set_query();
        }

        public function reactivar( $tipo = array()){
            foreach ($tipo as $key => $value) {
                $$key = $value;
            }
            $this->query = "UPDATE tipo_venta t SET estado = true WHERE t.id_tipo_venta =$id_tipo_venta";
            $this->set_query();
        }
    }



    $tvDAO = new tipoVentaDAO();
    $tipoVentaDAO = new tipoVenta(20,"contado_prueba", 5, null);


    echo"<pre>";
    var_dump($tvDAO->read(1));
    echo "</pre>"; 


    
   
     /*$clienteDAO = new clientesDAO();
    $cliente = new Clientes(5, "lucas", "un numero", "Mi casa", "un ci", "un ruc", null, null, null);
    echo "<pre>";
    var_dump($cliente->toArray(5));
    echo "</pre>";

    $clienteDAO->reactivar($cliente->toArray());

    $res = $clienteDAO->read();
    echo "LISTARs<pre>";
    var_dump($res);
    echo "</pre>";*/



/*  $usDAO = new UsuariosDAO();
    $usu = new Usuarios(2,"Lucas", "Luc", "Luk12345", null, null, null, 1);

    echo"<pre>";
    var_dump($usDAO->read(2));
    echo "</pre>"; */

?>