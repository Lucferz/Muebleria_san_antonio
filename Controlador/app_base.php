<?php

    if(!isset($_SESSION)){
        session_set_cookie_params(60*60*24*30); //dura 30 dias, para produccion cambiar a 15 horas
        session_start();
    }
    
    if(!isset($_SESSION['autenticado'])){
        $_SESSION['autenticado'] = false;
    }
     
?>