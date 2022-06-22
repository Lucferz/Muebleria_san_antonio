<?php
  require_once("../Controlador/app_base.php");
  if (!$_SESSION['autenticado']){
    header("Location: Login.php");
    die();
  }else if($_SESSION['rol'] != 'Admin' && $_SESSION['rol'] != 'Vendedor'){
    require_once("../Controlador/sessionControl.php");
    $user_session = new sessionControl();
    $location = $user_session->redireccion($_SESSION['rol']);
    header("Location: $location");
    die();
  }
  require_once("../Controlador/TipoVentaControl.php");
  $tvc = new TipoVentaControl();
?>
<!DOCTYPE html>
<htmllang="es"> 
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" type="text/css" href="../public/assets/css/styles.css">
   <link rel="stylesheet" type="text/css" href="../public/assets/css/venta.css">
   <title>Ventas</title>
</head>
<body>
   <?php
      if($_SESSION['rol'] == 'Admin'){
         echo "<button onclick=\"location.href= 'ventas.php'\" class=\"volver\"><ion-icon name=\"arrow-undo-outline\"></ion-icon></button>";
      }
   ?>
   <!--<div class="usuarios-select">
      <select id="usuarios" name="usuarios">
         <option value="no_select"><?php echo $_SESSION['nombre'] ?></option>
         <option value="cerrar"><a href="acciones/session_actions.php?session=close">Cerrar sesion</a></option>
      </select>
   </div>-->
   <div id="usuarios" class="dropdown">
      <?php echo $_SESSION['nombre'] ?><button class="dropbtn btn"></button>
      <div class="dropdown-content">
         <a href="../acciones/session_actions.php?session=close">Cerrar Sesion</a>
      </div>
   </div>
   <br> 
   <header>
      <div class="logo">
      <img src="../public/assets/img/santo.jpg">
      <h2>Muebleria San Antonio</h2>
   </header>
   <!-- The Modal -->
   <div id="newClientModal" class="modal">
      <!-- Modal content -->
      <div class="modal-content"> 
            <form method="POST" class= "modal-form" action="../acciones/clientes_acciones.php" id="formven">
               <span id="closeBtn" class="close"><ion-icon name="close-outline"></ion-icon></span>
               <h1 class="titulo-modal">Nuevo Cliente</h1>
               
               <p>Cliente:</p>
               <input type="text" name="cliente" class="field" autocomplete="off" required> <br/>

               <p>CI:</p>
               <input type="text" name="ci" class="field" autocomplete="off" required> <br/>

               <p>RUC:</p>
               <input type="text" name="ruc" class="field" autocomplete="off"> <br/>

               <p>Telefono:</p>
               <input type="text" name="telefono" class="field" autocomplete="off" required> <br/>
   
               <p>Direccion:</p>
               <input type="text" name="direccion" class="field" autocomplete="off" required> <br/>

               <br/>
               <input type="text" name="id_cliente" hidden>
               <input type="text" name='venta' hidden>

               <p class="center-content">
               <input type="submit" class="btn-azul" value="GUARDAR">
               </p>
            </form>
      </div>
   </div>
   <div class="contenido">
      <form id="formven" action="../acciones/ventas_acciones.php" method="POST">
        <input type="text" name="fk_usuario" value="<?php echo $_SESSION['id_usuario'] ?>" hidden />
         <div class="row">
            <div class="col-25">
               <label for="clname">Cliente</label>
            </div>
            <div class="col-75">
              <div class="autocomplete">
                <input type="text" id="autocomplete-input-cliente" class="flexsearch--input" placeholder="Buscar cliente..." autocomplete="off">
                <input type="text" id="id_cliente" name="fk_cliente" hidden>
                <ul id="autocomplete-results-cliente" class="autocomplete-results">
                </ul>
              </div>
            </div>
            <button id="newClientBtn" class="nuevo-cliente" >
              <ion-icon name="add-outline"></ion-icon>
            </button>
         </div>
         <div class="row">
            <div class="col-25">
               <label for="arname">Articulo</label>
            </div>
            <div class="col-75">
            <div class="autocomplete">
                <input type="text" id="autocomplete-input-articulo" class="flexsearch--input" placeholder="Buscar articulo..." autocomplete="off">
                <input type="text" id="id_articulo" name="fk_articulo" hidden>
                <ul id="autocomplete-results-articulo" class="autocomplete-results">
                </ul>
              </div>
            </div>
         </div>
         <div class="row">
            <div class="col-25">
               <label for="fcant">Cantidad</label>
            </div>
            <div class="col-75">
               <input type="number" id="fcant" class="input-field" name="cantidad" placeholder="Entrega"> 
            </div>
         </div>
         <div class="row">
            <div class="col-25">
               <label for="fname">Entrega</label>
            </div>
            <div class="col-75">
               <input type="text" id="fname" class="input-field" name="entrega" placeholder="Entrega"> 
            </div>
         </div>
         <div class="row">
            <div class="col-25">
               <label for="cuotas">Cuotas</label>
            </div>
            <div class="col-75">
               <select id="cuotas" name="fk_tipo_venta">
                  <option value="no_select">Seleccione Tipo De Venta</option>
                  <?php
                    $data_tpv = $tvc->read();
                    foreach ($data_tpv as $key => $value) {
                      foreach ($value as $key2 => $value2) {
                         $$key2 = $value2;
                      }
                      echo "<option value='$id'>$tipo</option>";
                    }
                  ?>
               </select>
            </div>
         </div>
         <div class="row">
            <div class="col-25">
               <label for="aname">Descuento</label>
            </div>
            <div class="col-75">
               <input type="text" id="aname" class="input-field" name="descuento" placeholder="Descuento"> 
            </div>
         </div>
         <br>
         <label class="container">Generar Factura
          <input type="checkbox" name="fk_tipo_comprobante">
          <span class="checkmark"></span>
         </label>
         <br>
         <input type="text" name="id_venta" value="" hidden />
         <div class="row">
            <button type="submit" class="confirmar">Confirmar</button>
         </div>
      </form>
   </div>
   <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
   <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
   <script src="../public/assets/js/cliente.js"></script>
   <script src="../public/assets/js/stock.js"></script>
   <script src="../public/assets/js/ventas.js"></script>
</body>
</html>

