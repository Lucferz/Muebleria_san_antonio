<?php include("includes/header.php");
if($_SESSION['rol'] != 'Admin'){
   require_once("../Controlador/sessionControl.php");
   $user_session = new sessionControl();
   $location = $user_session->redireccion($_SESSION['rol']);
   header("Location: ../Vistas/$location");
   die();
}
include("../Controlador/usuariosControl.php");
include("../Controlador/TipoUsuarioControl.php");
$usuarios_control = new UsuariosControl();
$tipousuarioControl = new TipoUsuarioControl();
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
            <button id="addNew" class="btn-pretty"><ion-icon name="add-outline"></ion-icon> Nuevo usuario</button>
         </div>
      </div>
      <div id="tabla">
      </div>
   </div>
   <!-- The Modal -->
	<div id="myModal" class="modal">
      <!-- Modal content -->
      <div class="modal-content">
         <form method="POST" class="modal-form" action="../acciones/usuario_acciones.php" id="dataform">
            <?php 
               $dataToMod;
               if (isset($_POST) && isset($_POST['id_usuario'])){
                  $dataToMod = $usuarios_control->read($_POST['id_usuario']);
                  echo '<script type="text/javascript"> document.all.myModal.style.display = "block"</script>';
               }
            ?>
            <span class="close"><ion-icon name="close-outline"></ion-icon></span>
            <h1 class="titulo-modal">Nuevo usuario</h1>
            
            <p>NOMBRE:</p>
            <input type="text" name="Nombre" value="<?php echo isset($dataToMod[0]['Nombre'])? $dataToMod[0]['Nombre']:'' ?>" 
            class="field" autocomplete="off" required> <br/>

            <p>CEDULA:</p>
            <input type="text" name="ci" value="<?php echo isset($dataToMod[0]['ci'])? $dataToMod[0]['ci']:'' ?>" 
            class="field" autocomplete="off" required> <br/>

            <p>USUARIO:</p>
            <input type="text" name="usuario" value="<?php echo isset($dataToMod[0]['usuario'])? $dataToMod[0]['usuario']:'' ?>"
            class="field" autocomplete="off" required> <br/>

            <p>CONTRASEÑA:</p>
            <input type="text" name="password" value="<?php echo isset($dataToMod[0]['password'])? $dataToMod[0]['password']:'' ?>" 
            class="field" autocomplete="off" required> <br/><br/><br/>

            <input type="text" name="id_usuario" 
            value="<?php echo isset($dataToMod[0]['id_usuario'])? $dataToMod[0]['id_usuario']:''  ?>" hidden>

           <span>TIPO USUARIO:</span>
            <select class="select-modal form-select" name="fk_tipo_usuario" required ><!--Aca hacer el read de Categorias-->
               <option value="">Seleccione Tipo de usuario</option>
               <?php
                  $data_tipousuario = $tipousuarioControl->read();
                  foreach ($data_tipousuario as $key => $value) {
                     foreach ($value as $key2 => $value2) {
                        $$key2 = $value2;
                     }
                     $selected = (isset($dataToMod[0]['tipo']) && 
                     $tipo == $dataToMod[0]['tipo'])? 'selected':'';
                     echo "<option value='$id_tipo_usuario' $selected>$tipo</option>";
                  }
               ?>
            </select>
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
               <th>ID</th>
               <th>NOMBRE</th>
               <th>CI</th>
               <th>USUARIO</th>
               <th>TIPO USUARIO</th>
               <th>ESTADO</th>
               <th colspan="2">ACCIONES</th>
            </tr>
         </thead>
         <tbody id="tablaDatos">
            <?php
               $data_usuarios = $usuarios_control->read();
               foreach ($data_usuarios as $key => $value) {
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
                  <td>$id_usuario</td>
                  <td>$Nombre</td>
                  <td>$ci</td>
                  <td>$usuario</td>
                  <td>$tipo</td>
                  <td>$status</td>
                  </div>
                  <div id='row-actions'>
                  <td>
                     <form method='POST' id='editForm'>
                        <input type='text' name='id_usuario' value='$id_usuario' hidden>
                        <input type='submit' class='btn-table' value='Editar' id='btn-editar'>
                     </form>
                  </td>
                  <td>
                     <form method='POST' action='../acciones/usuario_acciones.php' id='deleteForm$id_usuario' >
                        <input type='text' name='id_usuario' value='$id_usuario' hidden>
                        <input type='text' name='estado' value='$estado' hidden>
                     </form>
                      <button id='btn-desactivar' class='btn-table' onclick=\"desactivar($id_usuario, $estado);\" >$btnDelLabel</button>
                  </td>
                  </div>";
                  echo "</tr>";
               }
            ?>
         </tbody>
      </table>
   </div>
   <script type="text/javascript" src="../public/assets/js/usuario.js"></script>
<?php include("includes/footer.html"); ?>