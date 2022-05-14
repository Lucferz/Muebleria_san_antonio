<!DOCTYPE html>
<htmllang="es"> 
<head>
      <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" type="text/css" href="../public/assets/css/venta.css">
   <title>Ventas</title>
</head>
<body>
 <img src="../public/assets/img/santo.jpg" class="logo" >
<h2>Muebleria San Antonio</h2>

<div class="contenido">
  <form action="/action_page.php">
    <div class="row">
      <div class="col-25">
        <label for="clname">Cliente</label>
      </div>
      <div class="col-75"> 
              <input class="flexsearch--input" type="search" id="clname" placeholder="Cliente" >
              <ion-icon name="add-circle-outline"></ion-icon> 
      <!--  <input type="text" id="fname" name="firstname" placeholder="Your name.."> -->
      </div>
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
      <input type="submit" value="Confirmar">
    </div>
  </form>
</div>


<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>

