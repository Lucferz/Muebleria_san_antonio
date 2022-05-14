<!DOCTYPE html>
<htmllang="es"> 
<head>
      <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" type="text/css" href="../public/assets/css/venta.css">
   <title>Ventas</title>
</head>
<body>

    </div>
          <div class="usuarios-select">
          <select id="usuarios" name="usuarios">
            <option value="no_select">Usuario Fulano</option>
             <option value="cerrar">Cerrar sesion</option>
            <!-- Ver para traer el usuario logueado  -->
          </select>
        </div>
        <br> 
   <header>  

      <div class="logo">
        <img src="../public/assets/img/santo.jpg">
        <h2>Muebleria San Antonio</h2> 
  </header>


<div class="contenido">
  <form action="/action_page.php">    
    <div class="row">
      <div class="col-25">
        <label for="clname">Cliente</label>
      </div>
      <div class="col-75"> 
              <input class="flexsearch--input" type="search" id="clname" placeholder="Cliente" >
      <!--  <input type="text" id="fname" name="firstname" placeholder="Your name.."> -->

      </div>
          <button class="nuevo-cliente"><ion-icon name="add-outline"></ion-icon></button>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="arname">Articulo</label>
      </div>
      <div class="col-75">
      <input class="flexsearch--input" type="search" id="arname" placeholder="Articulo"> 
    <!--    <input type="text" id="lname" name="lastname" placeholder="Your last name.."> -->
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
  <input type="checkbox" checked="checked">
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

