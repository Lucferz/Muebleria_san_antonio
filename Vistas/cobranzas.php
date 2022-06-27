<?php 
require_once("../Controlador/app_base.php");

if (!$_SESSION['autenticado']){
   header("Location: Login.php");
   die();
}else if($_SESSION['rol'] != 'Admin' && $_SESSION['rol'] != 'Cobrador'){
   require_once("../Controlador/sessionControl.php");
   $user_session = new sessionControl();
   $location = $user_session->redireccion($_SESSION['rol']);
   header("Location: ../Vistas/$location");
   die();
}
include("../Controlador/CobranzasControl.php");
$cobranzas_control = new CobranzasControl();
?>
<!DOCTYPE html>
<htmllang="es"> 
<head>
      <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" type="text/css" href="../public/assets/css/cobranza.css">
    <link rel="stylesheet" type="text/css" href="../public/assets/css/modal.css">
   <title>Clientes por cobrar</title>
</head>
<body>
<button onclick="location.href= '#'" class="volver"><ion-icon name="arrow-undo-outline"></ion-icon></button>

          <div class="usuarios-select">
          <select id="usuarios" name="usuarios">
            <option value="no_select"><?php echo $_SESSION['nombre'] ?></option>
             <option value="cerrar">Cerrar sesion</option>
            <!-- Ver para traer el usuario logueado  -->
          </select>
        </div>
        <br> 
   <header>  

      <div class="logo">
        <img src="../public/assets/img/santo.jpg">
        <h2>Muebleria San Antonio</h2> 
      </div>
  </header>

  <h3>Clientes por cobrar</h3>
 <div id="table">
      <table class="content-table">
         <thead>
            <tr>
               <th>Cliente</th>
               <th>Monto</th>
               <th>Estado</th>
               <th>Acciones</th>
            </tr>
         </thead>
         <tbody>
            <?php
               if ($data_cobranzas != null) {
                  $data_cobranzas = $cobranzas_control->read();
                  foreach ($data_cobranzas as $key => $value) {
                     foreach ($value as $key2 => $value2) {
                        $$key2 = $value2;
                     }
                     echo "<tr>
                              <div id='row-content'>
                                 <td>$cliente</td>
                                 <td>$monto</td>
                                 <td>$estado_cobranza</td>
                                 <td><button id=\"addNew\">Cobrar</button></td>
                              </div>
                           </tr>
                     ";
                  }
               }else{
                  echo "<tr><td colspan=\"4\"> No hay cobranzas por realizar</td></tr>";
               }
            ?>
         </tbody>
      </table>
   </div>
    <!-- The Modal -->
    <div id="myModal" class="modal">
         <!-- Modal content -->
         <div class="modal-content"> 
               <form method="POST" >
                  <span class="close"><ion-icon name="close-outline"></ion-icon></span>
                  <h1 class="titulo-modal">Traer nombre del cliente</h1>
                  
                  <p>Saldo:</p>
                  <input type="text" readonly="readonly" 
                  class="field"> <br/>

                  <p>Cuota Nro:</p>
                  <input type="text" class="field"name="cuotaNro" readonly="readonly" 
                  > <br/>

                  <p>Entrega:</p>
                  <input type="text" name="entrega"  
                  class="field"> <br/>

                  <br>
                  <div class="btns">
                  <p>
                  <input type="submit" class="btn-azul" value="COBRAR">
                  </p>
                  <p>
                  <input type="submit" class="btn-azul2" value="NO PAGÓ">
                  </p>
                  </div>
                  
               </form>
         </div>
      </div>
<?php
   include("includes/footer.html");
?>