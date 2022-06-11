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
                    $location = "stock.php";
                    break;

                case 'Vendedor':
                    $location = "NuevaVenta.php";
                    break;

                case 'Cobrador':
                    $location = "cobranzas.php";
                    break;
                
                default:
                    $location = "error404.html";
                    break;
            }

            return $location;
        }

        public function __destruct()
        {
            unset($this->session);
        }
    }
    
?>