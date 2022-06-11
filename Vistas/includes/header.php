<?php
   require_once("../acciones/session_actions.php");


   $htmlHeaders = <<<htmlheaders
      <!DOCTYPE html>
      <html lang="en">
      <head>
         <meta charset="UTF-8">
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <meta http-equiv="X-UA-Compatible" content="ie=edge">
         <title>Navbar</title>
         <link rel="stylesheet" type="text/css" href="../public/assets/css/styles.css">
      </head>
      <body>

         
      <div class="sidebar">

         <center>
            <img src="../public/assets/img/santo.jpg" class="foto" alt=" ">
         </center>
         <a href="#" id="inicio"><ion-icon name="home-outline"></ion-icon><span> Inicio</span></a>
         <a href="Cliente.php"><ion-icon name="person-outline"></ion-icon><span> Clientes</span></a>
         <a href="ventas.php"><ion-icon name="bag-outline"></ion-icon><span> Ventas</span></a>
         <a href="stock.php"><ion-icon name="storefront-outline"></ion-icon><span> Stock</span></a>
         <a href="cobranzas.php"><ion-icon name="cash-outline"></ion-icon><span> Cobro</span></a> 
         <a href="#"><ion-icon name="document-text-outline"></ion-icon><span> Informes</span></a>
         <a href="usuario.php"><ion-icon name="settings" size="large"></ion-icon></a>  

      </div>

         <div id="barra-superior" class="barra_superior">
            <nav>
               <div class="dropdown">
                  <span>USUARIO: LUCAS <button class="dropbtn btn"><ion-icon size="large" name="menu-outline"></ion-icon></button></span>
                  <div class="dropdown-content">
                     <a href="#">Perfil</a><hr>
                     <a href="#">Algo</a><hr>
                     <a href="../session_actions.php?session=close">Cerrar Sesion</a>
                  </div>
               </div>
            </nav>
         </div>
   htmlheaders;
?>