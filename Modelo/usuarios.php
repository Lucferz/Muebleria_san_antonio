<?php
    class Usuarios{
        private $id_usuario;
        private $nombre;
        private $usuario;
        private $password;
        private $estado;
        private $fecha_alta;
        private $fecha_mod;
        private $fk_tipo_usuario;

        public function __destruct(){

        }

        public function __construct($id, $nombre, $usuario, $password, $estado, $f_alta, $f_mod, $fk_tusu){
            $this->id_usuario = $id;
            $this->nombre = $nombre;
            $this->usuario = $usuario;
            $this->password = $password;
            $this->estado = $estado;
            $this->fecha_alta = $f_alta;
            $this->fecha_mod = $f_mod;
            $this->fk_tipo_usuario = $fk_tusu;
        }

        public function getId(){
            echo $this->$id_usuario;
        }

        public function setId($id){
            $this->$id_usuario = $id;
        }

        public function getNombre(){
            echo $this->$nombre;
        }

        public function setNombre($nombre){
            $this->$id_usuario = $nombre;
        }
        public function getUsuario(){
            echo $this->$usuario;
        }

        public function setUsuario($usuario){
            $this->$usuario = $usuario;
        }
        public function getPassword(){
            echo $this->$password;
        }

        public function setPassword($password){
            $this->$password = $password;
        }

        public function getEstado(){
            echo $this->$estado;
        }

        public function setEstado($estado){
            $this->$estado = $estado;
        }
        public function getFechaAlta(){
            echo $this->$fecha_alta;
        }

        public function setFachaAlta($f_alta){
            $this->$fecha_alta = $f_alta;
        }
        public function getFechaMod(){
            echo $this->$fecha_mod;
        }

        public function setFechaMod($f_mod){
            $this->$fecha_mod = $f_mod;
        }
        public function getFkTipoUsuario(){
            echo $this->$fk_tipo_usuario;
        }

        public function setFkTipoUsuario($fk_tusu){
            $this->$fk_tipo_usuario = $fk_tusu;
        }

        public function toArray(){
            $data = array(
                'id_usuario' => $this->id_usuario ,
                'nombre' => $this->nombre,
                'usuario' => $this->usuario,
                'password' => $this->password,
                'estado' => $this->estado,
                'fecha_alta' => $this->fecha_alta,
                'fecha_mod' => $this->fecha_mod,
                'fk_tipo_usuario' => $this->fk_tipo_usuario
            );
            return $data;
        }

    }
    
?>