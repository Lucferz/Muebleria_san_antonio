<?php include("includes/header.html");
include("../Controlador/ClientesControl.php");
$clientes_control = new ClientesControl();
?>
   <div id="cuerpo">
      <div id="cabecera-botones">
         <div class="flexsearch">
               <div class="flexsearch--wrapper">
                  <form class="flexsearch--form" action="" method="post">
                     <div class="flexsearch--input-wrapper">
                        <input class="flexsearch--input" type="search" placeholder="search">
                     </div>
                     <input class="flexsearch--submit" type="submit" value="&#10140;"/>
                  </form>
               </div>
         </div>
         <div id="articulos-buttons-container">
         	<button id="addNew" class="btn-pretty"><ion-icon name="add-outline"></ion-icon> Nueva Venta</button>
         </div>
      </div>
      <div id="tabla">
      </div>
   </div>
		<!-- The Modal -->
		<div id="myModal" class="modal">
  			<!-- Modal content -->
  			<div class="modal-content"> 
					<form method="POST" class= "modal-form" action="clientes_acciones.php" id="dataform">
            <?php 
               $dataToMod;
               if (isset($_POST) && isset($_POST['id_cliente'])){
                  $dataToMod = $clientes_control->read($_POST['id_cliente']);
                  echo '<script type="text/javascript"> document.all.myModal.style.display = "block"</script>';
               }
            ?>
						<span class="close"><ion-icon name="close-outline"></ion-icon></span>
						<h1 class="titulo-modal">Nuevo Cliente</h1>
						
						<p>Cliente:</p>
						<input type="text" name="cliente" value="<?php echo isset($dataToMod[0]['cliente'])? $dataToMod[0]['cliente']:'' ?>" 
                  class="field" required> <br/>

						<p>CI:</p>
						<input type="text" name="ci" value="<?php echo isset($dataToMod[0]['ci'])? $dataToMod[0]['ci']:'' ?>" 
                  class="field" required> <br/>

						<p>RUC:</p>
						<input type="text" name="ruc" value="<?php echo isset($dataToMod[0]['ruc'])? $dataToMod[0]['ruc']:'' ?>" 
                  class="field"> <br/>

						<p>Telefono:</p>
						<input type="text" name="telefono" value="<?php echo isset($dataToMod[0]['telefono'])? $dataToMod[0]['telefono']:'' ?>" 
                  class="field" required> <br/>
		
						<p>Direccion:</p>
						<input type="text" name="direccion" value="<?php echo isset($dataToMod[0]['direccion'])? $dataToMod[0]['direccion']:'' ?>" 
                  class="field" required> <br/>

                  <br/>
                    <input type="text" name="id_cliente" 
                     value="<?php echo isset($dataToMod[0]['id_cliente'])? $dataToMod[0]['id_cliente']:'' ?>" hidden>

						<p class="center-content">
						<input type="submit" class="btn-azul" value="GUARDAR">
						</p>
					</form>
  			</div>
		</div>
<div id="table">
      <table class="content-table">
         <thead>
            <tr>
               <th>ID</th>
               <th>CLIENTE</th>
               <th>ARTICULO</th>
               <th>VENDEDOR</th>
               <th>FECHA VENTA</th>
               <th>TIPO VENTA</th>
               <th>PRECIO VENTA</th>
               <th>ENTREGA</th>
               <th>FACTURA</th>
               <th colspan="2">ACCIONES</th>
            </tr>
         </thead>
         <tbody align="center">
             <?php
               $data_clientes = $clientes_control->read();
               foreach ($data_clientes as $key => $value) {
                  echo "<tr>";
                  foreach ($value as $key2 => $value2) {
                     $$key2 = $value2;
                  }
                  $status = $estado?'Activo':'Inactivo';
                  echo "<div id='row-content'>
                  <td>$id_cliente</td>
                  <td>$ci</td>
                  <td>$cliente</td>
                  <td>$direccion</td>
                  <td>$telefono</td>
                  <td>$ruc</td>
                  <td>$estado</td>
                  </div>
                  <div id='row-actions'>
                  <td>
                     <form method='POST' id='editForm'>
                        <input type='text' name='id_cliente' value='$id_cliente' hidden>
                        <input type='submit' class='btn-table' value='Editar' id='btn-editar'>
                     </form>
                  </td>
                  <td>
                     <form method='POST' action='clientes_acciones.php' id='deleteForm$id_cliente' >
                        <input type='text' name='id_cliente' value='$id_cliente' hidden>
                     </form>
                     <button id='btn-desactivar' class='btn-table' onclick=\"desactivar($id_cliente);\" >Desactivar</button>
                  </td>
                  </div>";
                  echo "</tr>";
               }
            ?>
         </tbody>
      </table>
</div>		
<?php
	include("includes/footer.html");
?>