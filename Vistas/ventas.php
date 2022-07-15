<?php include("includes/header.php");
if($_SESSION['rol'] != 'Admin' && $_SESSION['rol'] != 'Gerente'){
   require_once("../Controlador/sessionControl.php");
   $user_session = new sessionControl();
   $location = $user_session->redireccion($_SESSION['rol']);
   header("Location: ../Vistas/$location");
   die();
}
include("../Controlador/ventasControl.php");
$ventas_control = new VentasControl();
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
            <a href="NuevaVenta.php"><button id="addNew" class="btn-pretty"><ion-icon name="add-outline"></ion-icon> Nueva Venta</button></a>
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
               <th>VENDEDOR</th>
               <th>TIPO DE VENTA</th>
               <th>COMPROBANTE</th>
               <th>NUM FACTURA</th>
               <th>NUM TICKET</th>
               <th>ARTICULO</th>
               <th>CANTIDAD</th>
               <th>DESCUENTO</th>
               <th>TOTAL</th>
               <th>FECHA DE EMISION</th>
               <th>ESTADO</th>
               <th colspan="2">ACCIONES</th>
            </tr>
         </thead>
         <tbody id="tablaDatos">
            <?php
               $data_ventas = $ventas_control->read();
               foreach ($data_ventas as $key => $value) {
                  echo "<tr>";
                  foreach ($value as $key2 => $value2) {
                     $$key2 = $value2;
                  }
                  $status = $estado?'Activo':'ANULADO';
                  $numero_fac = ($num_factura != "")? $num_factura : "-";
                  $numero_ticket = ($num_ticket != "")? $num_ticket : "-";
                  $descuento_venta = ($descuento != "")? $descuento : "-";
                  echo "<div id='row-content'>
                  <td>$id_venta</td>
                  <td>$cliente</td>
                  <td>$vendedor</td>
                  <td>$tipo_venta</td>
                  <td>$comprobante</td>
                  <td>$numero_fac</td>
                  <td>$numero_ticket</td>
                  <td>$articulo</td>
                  <td>$cantidad</td>
                  <td>$descuento_venta</td>
                  <td>$total</td>
                  <td>$fecha_emision</td>
                  <td>$status</td>
                  </div>";
                  if($estado){
                     echo "<div id='row-actions'>
                              <td>  
                                 <form method='POST' action='NuevaVenta.php' id='editForm'>
                                    <input type='text' name='id_venta' value='$id_venta' hidden>
                                    <input type='submit' class='btn-table' value='Modificar' id='btn-editar'>
                                 </form>
                              </td>
                              <td>
                                 <form method='POST' action='../acciones/ventas_acciones.php' id='deleteForm$id_venta' >
                                    <input type='text' name='id_venta' value='$id_venta' hidden>
                                 </form>
                                 <button id='btn-desactivar' class='btn-table' onclick=\"anular($id_venta);\" >Anular</button>
                              </td>
                           </div>";
                  }else{
                     echo "<div id='row-actions'>
                              <td>---</td>
                              <td>---</td>
                           </div>";
                  }
                  echo "</tr>";
               }
            ?>
         </tbody>
      </table>
   </div>
   <script type="text/javascript" src="../public/assets/js/ventas.js"></script>
<?php include("includes/footer.html"); ?>