<?php
    require_once("../DatosDAO/usuariosDAO.php");

    class sessionControl
    {
        private $session;
        
        public function __construct()
        {
            $this->session = new UsuariosDAO();
        }

        public function login($usuario, $pass)
        {
            return $this->session->validar_usuario($usuario, $pass);
        }

        public function logout()
        {
            session_start();
            session_destroy();
            header("Location: ../Vistas/Login.php");
        }

        public function redireccion($rol){
            $location;
            switch ($rol) {
                case 'Admin':
                    $location = "inicio.php";
                    break;

                case 'Vendedor':
                    $location = "NuevaVenta.php";
                    break;

                case 'Cobrador':
                    $location = "cobranzas.php";
                    break;
                
                case 'Stock':
                    $location = "stock.php";
                    break;
                case 'Gerente':
                    $location = "stock.php";
                    break;
                default:
                    $location = "Login.php";
            }

            return $location;
        }

        public function __destruct()
        {
            unset($this->session);
        }
    }
    
?>