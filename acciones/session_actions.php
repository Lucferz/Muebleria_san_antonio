<?php
    require_once("../Controlador/sessionControl.php");
    $user_session = new sessionControl();

    if(!isset($_SESSION)){
        session_start([
            'use_only_cookies' => 1,
            'auto_start' => 1,
            'read_and_close' => true
        ]);
    }

    if(!$_SESSION['autenticado']){
        $_SESSION['autenticado'] = false;
    }

    if (isset($_POST) && isset($_POST['usuario']) && isset($_POST['password'])){
        $session = $user_session->login($_POST['usuario'],$_POST['password']);
        if (empty($session)) {
            header("Location: ../Vistas/Login.php?auth=error");
            //manda al login con un mensaje de error de autenticacion
            die();
        } else {
            $_SESSION['autenticado'] = true;
            foreach ($session as $val) {
                $_SESSION['usuario'] = $val['usuario'];
                $_SESSION['nombre'] = $val['Nombre'];
                $_SESSION['rol'] = $val['rol'];
            }
            
            $location = $user_session->redireccion($_SESSION['rol']);
            header("Location: ../Vistas/$location");
            die();
        }
        

    }

    if($_SESSION['autenticado'] === false){
        header("Location: ../Vistas/Login.php");
        die();
    }

    if (isset($_GET) && isset($_GET['session']) && $_GET['session']=='close'){
        $user_session->logout();
    }
?>