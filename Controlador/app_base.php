<?php

    if(!isset($_SESSION)){
        session_set_cookie_params(60*30); //30 minutos durara el login
        session_start();
    }
    
    if(isset($_SESSION['autenticado']) && array_key_exists('autenticado', $_SESSION) && $_SESSION['autenticado'] != true){
        $_SESSION['autenticado'] = false;
    }
     

?>