<!DOCTYPE html>
<htmllang="es"> 
<head>
      <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" type="text/css" href="../public/assets/css/venta.css">
   <title>Cuenta Cliente</title>
</head>
<body>

<div class="contenido">
  <form action="" method="POST">    
     <div class="row">
        <div class="col-25">
           <label for="arname">Cliente:</label>
        </div>
    </div>
    <div class="row">
        <div class="col-25">
           <label for="arname">SALDO:</label>
        </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="fname">Cuota Nro</label>
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
    <br>
    <label class="container">Generar Factura
      <input type="checkbox">
      <span class="checkmark"></span>
    </label>

    <br>
    <div class="col-75">
      <button class="confirmar">Cobrar</button>
    </div>
     <br>
     <div class="col-25">
      <button class="confirmar">No pagó</button>
    </div>
  </form>
</div>

</body>
</html>
