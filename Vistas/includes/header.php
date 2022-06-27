<?php
require_once("../Controlador/app_base.php");
if ($_SESSION['autenticado'] != true) {
   header("Location: Login.php");
   die();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Muebleria</title>
   <link rel="stylesheet" type="text/css" href="../public/assets/css/styles.css">
</head>

<body>


   <div class="sidebar">

      <center>
         <img src="../public/assets/img/santo.jpg" class="foto" alt=" ">
      </center>
      <a href="inicio.php" id="inicio" <?php echo $_SERVER['REQUEST_URI']=="/Muebleria_san_antonio/Vistas/inicio.php"?"class = 'navbaractive'":"" ?> >
         <ion-icon name="home-outline"></ion-icon><span> Inicio</span>
      </a>
      <a href="Cliente.php" <?php echo $_SERVER['REQUEST_URI']=="/Muebleria_san_antonio/Vistas/Cliente.php"?"class = 'navbaractive'":"" ?>>
         <ion-icon name="person-outline"></ion-icon><span> Clientes</span>
      </a>
      <a href="ventas.php" <?php echo $_SERVER['REQUEST_URI']=="/Muebleria_san_antonio/Vistas/ventas.php"?"class = 'navbaractive'":"" ?>>
         <ion-icon name="bag-outline"></ion-icon><span> Ventas</span>
      </a>
      <a href="stock.php" <?php echo $_SERVER['REQUEST_URI']=="/Muebleria_san_antonio/Vistas/stock.php"?"class = 'navbaractive'":"" ?>>
         <ion-icon name="storefront-outline"></ion-icon><span> Stock</span>
      </a>
      <a href="cobranzasview.php" <?php echo $_SERVER['REQUEST_URI']=="/Muebleria_san_antonio/Vistas/cobranzasview.php"?"class = 'navbaractive'":"" ?>>
         <ion-icon name="cash-outline"></ion-icon><span> Cobro</span>
      </a>
      <nav>
         <div class="informes">
            <span><button class="inforbtn">
                  <ion-icon name="document-text-outline"></ion-icon>
               </button>Informes</span>

            <div class="informes-content">
               <a href="../informes/informeStock.php">Informe de stock</a>
               <a href="../informes/informeVentas.php">Informe de ventas</a>
            </div>
         </div>
      </nav>
      <?php
         // $url = $_SERVER['REQUEST_URI'];
         // var_dump($url);
         // echo '<pre>'; print_r($url); echo '</pre>';
      ?>
      <a href="configuracion.php"  <?php echo $_SERVER['REQUEST_URI']=="/Muebleria_san_antonio/Vistas/configuracion.php"?"class = 'navbaractive'":"" ?>>
         <ion-icon name="settings" size="large"></ion-icon>
      </a>

   </div>

   <div id="barra-superior" class="barra_superior">
      <nav>
         <div class="dropdown">
            <span>USUARIO: <?php echo $_SESSION['nombre'] ?><button class="dropbtn btn">
                  <ion-icon size="large" name="menu-outline"></ion-icon>
               </button></span>
            <div class="dropdown-content">
               <a href="#">Perfil</a>
               <hr>
               <a href="../acciones/session_actions.php?session=close">Cerrar Sesion</a>
            </div>
         </div>
      </nav>
   </div>