<?php include("includes/header.php");
if($_SESSION['rol'] != 'Admin'){
   require_once("../Controlador/sessionControl.php");
   $user_session = new sessionControl();
   $location = $user_session->redireccion($_SESSION['rol']);
   header("Location: ../Vistas/$location");
   die();
}
include("../Controlador/CobranzasControl.php");
$cobControl = new CobranzasControl();
?>
<div id="cuerpo">
      <div id="cabecera-botones">
         <div class="flexsearch">
               <div class="flexsearch--wrapper">
                  <div class="flexsearch--form" >
                     <div class="flexsearch--input-wrapper">
                        <input class="flexsearch--input" type="text" id="search-box" placeholder="Buscar" autocomplete="off">
                     </div>
                  </div>
               </div>
         </div>
         <div id="articulos-buttons-container">
         <a href="cobranzas.php"><button id="addNew" class="btn-pretty"><ion-icon name="add-outline"></ion-icon> Realizar Nueva Cobranza</button></a>
         </div>
      </div>
      <div id="tabla">
      </div>
   </div>
		
<div id="table">
      <table class="content-table">
         <thead>
            <tr>
               <th>ID</th>
               <th>CLIENTE</th>
               <th>DIRECCION</th>
               <th>MONTO</th>
               <th>FECHA A COBRAR</th>
               <th>COBRADO EL</th>
               <th>MONTO COBRADO</th>
               <th>ACCIONES</th>
            </tr>
         </thead>
         <tbody align="center"id="tablaDatos">
             <?php
               $data_cobranzas = $cobControl->listar();
               foreach ($data_cobranzas as $key => $value) {
                  foreach ($value as $key2 => $value2) {
                     $$key2 = $value2;
                  }
                  $cobrado = ($fecha_cobrado == null)? '----':$fecha_cobrado;
                  $monto_c = ($monto_cobrado == null)? '----':$monto_cobrado;
                  echo "<tr>
                  <div id='row-content'>
                  <td>$id_cobranza</td>
                  <td>$cliente</td>
                  <td>$direccion</td>
                  <td>$monto</td>
                  <td>$fecha_cobro</td>
                  <td>$cobrado</td>
                  <td>$monto_c</td>
                  </div>
                  <div id='row-actions'>
                     <td>
                        <form method='POST' id='editForm'>
                           <input type='text' name='id_categoria' value='$id_cobranza' hidden>
                           <input type='submit' class='btn-table' value='Editar' id='btn-editar'>
                        </form>
                     </td>
                  </div>
                  </tr>";
               }
            ?>
         </tbody>
      </table>
</div>		
<script type="text/javascript" src="../public/assets/js/categorias.js"></script>
<?php
	include("includes/footer.html");
?>