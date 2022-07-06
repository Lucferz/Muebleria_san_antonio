<?php include("includes/header.php");
if($_SESSION['rol'] != 'Admin'){
   require_once("../Controlador/sessionControl.php");
   $user_session = new sessionControl();
   $location = $user_session->redireccion($_SESSION['rol']);
   header("Location: ../Vistas/$location");
   die();
}
include("../Controlador/TipoVentaControl.php");
$tvControl = new TipoVentaControl();
?>
<div id="cuerpo">
      <div id="cabecera-botones">
         <div class="flexsearch">
               <div class="flexsearch--wrapper">
                  <div class="flexsearch--form" >
                     <div class="flexsearch--input-wrapper">
                        <input class="flexsearch--input" type="text" id="search-box" placeholder="Buscar" autocomplete="off" hidden>
                     </div>
                  </div>
               </div>
         </div>
         <div id="articulos-buttons-container">
            <button id="addNew" class="btn-pretty"><ion-icon name="add-outline"></ion-icon> Nuevo Tipo</button>
         </div>
      </div>
      <div id="tabla">
      </div>
   </div>
   <!-- The Modal -->
	<div id="myModal" class="modal">
      <!-- Modal content -->
      <div class="modal-content">
         <form method="POST" class="modal-form" action="../acciones/tipoVenta_acciones.php" id="dataform">
            <?php 
               if (isset($_POST) && isset($_POST['id'])){
                  $dataToMod = $tvControl->read($_POST['id']);
                  echo '<script type="text/javascript"> document.all.myModal.style.display = "block"</script>';
               }
            ?>
            <span class="close"><ion-icon name="close-outline"></ion-icon></span>
            <h1 class="titulo-modal">Nuevo usuario</h1>
            
            <p>Tipo:</p>
            <input type="text" name="tipo" value="<?php echo isset($dataToMod[0]['tipo'])? $dataToMod[0]['tipo']:'' ?>" 
            class="field" autocomplete="off" required> <br/>

            <p>Cantidad de Cuotas:</p>
            <input type="text" name="cuotas" value="<?php echo isset($dataToMod[0]['cuotas'])? $dataToMod[0]['cuotas']:'' ?>" 
            class="field" autocomplete="off" required> <br/>

            <p>Recargo en la cuota(%):</p>
            <input type="text" name="recargo" value="<?php echo isset($dataToMod[0]['recargo'])? $dataToMod[0]['recargo']:'' ?>"
            class="field" autocomplete="off" required> <br/>

            <input type="text" name="id" 
            value="<?php echo isset($dataToMod[0]['id'])? $dataToMod[0]['id']:''  ?>" hidden>

            <br/>
            <p class="center-content">
            <input type="submit" class="btn-azul" id="btnG" value="GUARDAR"/>
            </p>

         </form>
      </div>
   </div>
   <div id="table">
      <table class="content-table">
         <thead>
            <tr>
               <th>Id</th>
               <th>Tipo</th>
               <th>Cant. Cuotas</th>
               <th>Recargo de Cuota</th>
               <th>ESTADO</th>
               <th colspan="2">ACCIONES</th>
            </tr>
         </thead>
         <tbody id="tablaDatos">
            <?php
               $data_tv = $tvControl->read();
               foreach ($data_tv as $key => $value) {
                  echo "<tr>";
                  foreach ($value as $key2 => $value2) {
                     $$key2 = $value2;
                  }
                  if($estado){
                     $status = 'Activo';
                     $btnDelLabel = 'Desactivar';
                  }else{
                     $status = 'Inactivo';
                     $btnDelLabel = 'Reactivar';
                  }
                  echo "<div id='row-content'>
                  <td>$id</td>
                  <td>$tipo</td>
                  <td>$cuotas</td>
                  <td>$recargo</td>
                  <td>$status</td>
                  </div>
                  <div id='row-actions'>
                  <td>
                     <form method='POST' id='editForm'>
                        <input type='text' name='id' value='$id' hidden>
                        <input type='submit' class='btn-table' value='Editar' id='btn-editar'>
                     </form>
                  </td>
                  <td>
                     <form method='POST' action='../acciones/tipoVenta_acciones.php' id='deleteForm$id' >
                        <input type='text' name='id' value='$id' hidden>
                        <input type='text' name='estado' value='$estado' hidden>
                     </form>
                      <button id='btn-desactivar' class='btn-table' onclick=\"desactivar($id, $estado);\" >$btnDelLabel</button>
                  </td>
                  </div>";
                  echo "</tr>";
               }
            ?>
         </tbody>
      </table>
   </div>
<?php include("includes/footer.html"); ?>