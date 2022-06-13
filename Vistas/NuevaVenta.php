<?php
  require_once("../Controlador/app_base.php");
  var_dump($_SESSION);
?>
<!DOCTYPE html>
<htmllang="es"> 
<head>
      <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" type="text/css" href="../public/assets/css/venta.css">
   <title>Ventas</title>
</head>
<body>
        <div class="usuarios-select">
          <select id="usuarios" name="usuarios">
            <option value="no_select"><?php echo $_SESSION['nombre'] ?></option>
            <option value="cerrar"><a href="acciones/session_actions.php?session=close">Cerrar sesion</a></option>
          </select>
        </div>
        <br> 
   <header>  

      <div class="logo">
        <img src="../public/assets/img/santo.jpg">
        <h2>Muebleria San Antonio</h2> 
  </header>


<div class="contenido">
  <form action="../acciones/ventas_acciones.php" method="POST">    
    <div class="row">
      <div class="col-25">
        <label for="clname">Cliente</label>
      </div>
      <div class="col-75"> 
             <input type="search" class="flexsearch--input" placeholder="Cliente">
            <svg xmlns="http://www.w3.org/2000/svg" class="icono" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
        </svg>
            </div>
                 <a href="#"><button class="nuevo-cliente" ><ion-icon name="add-outline"></ion-icon> </button></a>
          </div>
          <div class="row">
            <div class="col-25">
              <label for="arname">Articulo</label>
            </div>
            <div class="col-75">
              <input class="flexsearch--input" type="search" id="arname" placeholder="Articulo" autocomplete="on"> 
              <svg xmlns="http://www.w3.org/2000/svg" class="icono" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
        </svg>
      </div>
    </div>
    
    <div class="row">
      <div class="col-25">
        <label for="fname">Entrega</label>
      </div>
      <div class="col-75">
               <!-- <input class="flexsearch--input" type="search" placeholder="Cliente"> -->
        <input type="text" id="fname" name="firstname" placeholder="Entrega"> 
      </div>
    </div>
    
    <div class="row">
      <div class="col-25">
        <label for="cuotas">Cuotas</label>
      </div>
      <div class="col-75">
        <select id="cuotas" name="Cuotas">
          <option value="no_select">Cuota</option>
          <option value="6">6</option>
          <option value="10">10</option>
          <option value="12">12</option>
        </select>
      </div>
    </div>
    
    <div class="row">
      <div class="col-25">
        <label for="aname">Descuento</label>
      </div>
      <div class="col-75">
               <!-- <input class="flexsearch--input" type="search" placeholder="Cliente"> -->
      <input type="text" id="aname" name="firstname" placeholder="Descuento"> 
      </div>
    </div>
    <br>
    <label class="container">Generar Factura
      <input type="checkbox">
      <span class="checkmark"></span>
    </label>

    <br>
    <div class="row">
      <button class="confirmar">Confirmar</button>
    </div>
  </form>
</div>


<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>

