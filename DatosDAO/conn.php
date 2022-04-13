<?php
    class conexion{
        private $servidor = '127.0.0.1';
        private $nombre_user = 'root';
        private $pass = 'mysql';
        private $bd = "muebleria_san_antonio";

        function get_conexion(){
            $conexion = new mysqli($servidor, $nombre_user, $pass, $bd);
            if($conexion-> connect_error){
                die("Conexion Fallida: ".$conexion-> connect_error);
            }else{
                echo "conexion exitosa";
            }
        }
    }
?>