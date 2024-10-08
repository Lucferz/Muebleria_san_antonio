<?php include("includes/header.php");
if($_SESSION['rol'] != 'Admin' && $_SESSION['rol'] != 'Gerente' ){
   require_once("../Controlador/sessionControl.php");
   $user_session = new sessionControl();
   $location = $user_session->redireccion($_SESSION['rol']);
   header("Location: ../Vistas/$location");
   die();
}
include("../Controlador/ClientesControl.php");
$clientes_control = new ClientesControl();
if($_GET["error"]=="true"){
   echo "<div id=\"ModalError\" class=\"modal\">
            <script type=\"text/javascript\"> document.all.ModalError.style.display = \"block\"</script>
            <div class=\"modal-content\">
               <div class='modal-form'>
                  <p style='font-size:25px; color:black;' class='titulo-modal'>ERROR</p>
                  <p style='color: red; font-size:20px;'>".$_GET['errormsg']."</p>
                  <p class='center-content'><button class=\"btn-pretty\" onclick=\"location.replace('Cliente.php');\">Aceptar</button></p>
               </div>
            </div>
         </div>
         ";
}
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
         	<button id="addNew" class="btn-pretty"><ion-icon name="add-outline"></ion-icon> Nuevo Cliente</button>
         </div>
      </div>
      <div id="tabla">
      </div>
   </div>
		<!-- The Modal -->
		<div id="myModal" class="modal">
  			<!-- Modal content -->
  			<div class="modal-content"> 
					<form method="POST" class= "modal-form" action="../acciones/clientes_acciones.php" id="formClient">
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
                  class="field" autocomplete="off" required> <br/>

						<p>CI:</p>
						<input type="number" name="ci" value="<?php echo isset($dataToMod[0]['ci'])? $dataToMod[0]['ci']:'' ?>" 
                  class="field" autocomplete="off" > <br/>

						<p>RUC:</p>
						<input type="text" name="ruc" value="<?php echo isset($dataToMod[0]['ruc'])? $dataToMod[0]['ruc']:'' ?>" 
                  class="field" autocomplete="off"> <br/>

						<p>Telefono:</p>
						<input type="text" name="telefono" value="<?php echo isset($dataToMod[0]['telefono'])? $dataToMod[0]['telefono']:'' ?>" 
                  class="field" autocomplete="off" > <br/>
		
						<p>Direccion:</p>
						<input type="text" name="direccion" value="<?php echo isset($dataToMod[0]['direccion'])? $dataToMod[0]['direccion']:'' ?>" 
                  class="field" autocomplete="off" required> <br/>

                  <input type="text" name="id_cliente" 
                  value="<?php echo isset($dataToMod[0]['id_cliente'])? $dataToMod[0]['id_cliente']:'' ?>" hidden>

						<p class="center-content">
						<input type="submit" class="btn-azul" id="btnG" value="GUARDAR">
						</p>
					</form>
  			</div>
		</div>
<div id="table">
      <table class="content-table">
         <thead>
            <tr>
               <th>ID</th>
               <th>CI</th>
               <th>CLIENTE</th>
               <th>DIRECCION</th>
               <th>TELEFONO</th>
               <th>RUC</th>
               <th>ESTADO</th>
               <th colspan="2">ACCIONES</th>
            </tr>
         </thead>
         <tbody align="center" id="tablaDatos">
             <?php
               $data_clientes = $clientes_control->read();
               foreach ($data_clientes as $key => $value) {
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
                  <td>$id_cliente</td>
                  <td>$ci</td>
                  <td>$cliente</td>
                  <td>$direccion</td>
                  <td>$telefono</td>
                  <td>$ruc</td>
                  <td>$status</td>
                  </div>
                  <div id='row-actions'>
                  <td>
                     <form method='POST' id='editForm'>
                        <input type='text' name='id_cliente' value='$id_cliente' hidden>
                        <input type='submit' class='btn-table' value='Editar' id='btn-editar'>
                     </form>
                  </td>
                  <td>
                     <form method='POST' action='../acciones/clientes_acciones.php' id='deleteForm$id_cliente' >
                        <input type='text' name='id_cliente' value='$id_cliente' hidden>
                        <input type='text' name='estado' value='$estado' hidden>
                     </form>
                     <button id='btn-desactivar' class='btn-table' onclick=\"desactivar($id_cliente,$estado);\" >$btnDelLabel</button>
                  </td>
                  </div>";
                  echo "</tr>";
               }
            ?>
         </tbody>
      </table>
</div>		
<script type="text/javascript" src="../public/assets/js/cliente.js"></script>
<?php
	include("includes/footer.html");
?>



