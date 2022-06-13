<?php

    if(!isset($_SESSION)){
        session_set_cookie_params(60*30); //30 minutos durara el login
        session_start();
    }
    
    if(!isset($_SESSION['autenticado'])){
        $_SESSION['autenticado'] = false;
    }
     
?>