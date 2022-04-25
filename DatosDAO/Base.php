<?php
    abstract class Base{
        private static $servidor = '127.0.0.1';
        private static $nombre_user = 'root';
        private static $pass = 'mysql';
        private static $bd = "muebleria_san_antonio";
        private static $charset ='utf8mb4';
        protected $rows = array();
        private $conn;
        protected $query;

        abstract protected function create();
        abstract protected function read();
        abstract protected function update();
        abstract protected function delete();
        abstract protected function reactivar();


        private function db_open(){
            $this->conn = new mysqli(
                self::$servidor,
                self::$nombre_user,
                self::$pass,
                self::$bd
            );

            $this->conn->set_charset(self::$charset);
        }

        private function db_close(){
            $this->conn->close();
        }

        protected function set_query(){
            $this->db_open();
            $this->conn->query($this->query);
            $this->db_close();
        }

        protected function get_query(){
            $this->db_open();
            $result = $this->conn->query($this->query);
            while($this->rows[] = $result->fetch_assoc() );
            $result->close();
            $this->db_close();
            return array_pop($this->rows);
        }
    }

?>