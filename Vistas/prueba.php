<?php include("includes/header.php");
include("../public/assets/css/cobranza.css");
?>
<?php 
require_once("../Controlador/app_base.php");
if($_SESSION['rol'] != 'Admin' && $_SESSION['rol'] != 'Cobrador'){
   require_once("../Controlador/sessionControl.php");
   $user_session = new sessionControl();
   $location = $user_session->redireccion($_SESSION['rol']);
   header("Location: ../Vistas/$location");
   die();
}
include("../Controlador/CobranzasControl.php");
$cobranzas_control = new CobranzasControl();
?>
   <div id="cuerpo">
      <div id="cabecera-botones">
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

  </header>
      </div>
   </div>
<div id="table">
          <h3>Clientes por cobrar</h3>
 <div id="table">
      <table class="content-table">
         <thead>
            <tr>
               <th>Cliente</th>
               <th>Monto</th>
               <th>Estado</th>
            </tr>
         </thead>
         <tbody>
            <?php
               $data_cobranzas = $cobranzas_control->read();
               foreach ($data_cobranzas as $key => $value) {
                  echo "<tr>";
                  foreach ($value as $key2 => $value2) {
                     $$key2 = $value2;
                  }
                  echo "<div id='row-content'>
                  <td>$cliente</td>
                  <td>$monto</td>
                  <td>$estado_cobranza</td>
                  
                  </div>
                  ";
                  echo "</tr>";
               }
            ?>
         </tbody>
      </table>
   </div>
</div>		
<?php
	include("includes/footer.html");
?>



