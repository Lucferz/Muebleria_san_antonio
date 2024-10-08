<?php include("includes/header.php");
include("../Controlador/ArticulosControl.php");
include("../Controlador/categoriasControl.php") ;
include("../Controlador/taxesControl.php") ;
$articulos_control = new ArticulosControl();
$categoriasControl = new CategoriasControl();
$taxControl = new taxesControl();
if($_SESSION['rol'] != 'Admin' && $_SESSION['rol'] != 'Stock' && $_SESSION['rol'] != 'Gerente'){
   require_once("../Controlador/sessionControl.php");
   $user_session = new sessionControl();
   $location = $user_session->redireccion($_SESSION['rol']);
   header("Location: ../Vistas/$location");
   die();
}
if($_GET["error"]=="true"){
   echo "<div id=\"ModalError\" class=\"modal\">
            <script type=\"text/javascript\"> document.all.ModalError.style.display = \"block\"</script>
            <div class=\"modal-content\">
               <div class='modal-form'>
                  <p style='font-size:25px; color:black;' class='titulo-modal'>ERROR</p>
                  <p style='color: red; font-size:20px;'>".$_GET['errormsg']."</p>
                  <p class='center-content'><button class=\"btn-pretty\" onclick=\"location.replace('stock.php');\">Aceptar</button></p>
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
            <button id="EntradaArt" class="btn-pretty"><ion-icon name="add-outline"></ion-icon> Entrada de Articulos</button>
            <button id="addNew" class="btn-pretty"><ion-icon name="add-outline"></ion-icon> Nuevo Articulo</button>
            <?php
               if($_SESSION['rol'] == 'Admin'){
                  echo '<a href="categorias.php" ><button class="btn-informe">Categorias</button></a>';
               }
            ?>
         </div>
      </div>
      <div id="tabla">
      </div>
   </div>
   <?php /*Modal de Entrada */ ?>
	<div id="ModalEntrada" class="modal">
      <div class="modal-content">
         <form method="POST" class="modal-form" action="../acciones/stock_acciones.php" id="dataform">
            
            <span id="close" style="color: #aaaaaa;float: right;font-size: 28px;font-weight: bold;"><ion-icon name="close-outline"></ion-icon></span>
            <h1 class="titulo-modal">Entrada De Articulos</h1>            
            <p>PRODUCTO:</p>
            <div class="autocomplete">
                <input type="text" id="autocomplete-input-articulo" class="field" placeholder="Buscar articulo..." autocomplete="off" required>
                <input type="text" id="id_articulo" name="id_articulo" hidden>
                <ul id="autocomplete-results-articulo" class="autocomplete-results">
                </ul>
            </div>
            <p>CANTIDAD:</p>
            <input type="number" name="entrada" class="field" autocomplete="off" required> <br/>
            
            <p class="center-content">
            <input type="submit" class="btn-azul" value="GUARDAR"/>
            </p>
         </form>
      </div>
   </div>
   <!-- The Modal -->
	<div id="myModal" class="modal">
      <!-- Modal content -->
      <div class="modal-content">
         <form method="POST" class="modal-form" action="../acciones/stock_acciones.php" id="dataform">
            <?php 
               $dataToMod;
               if (isset($_POST) && isset($_POST['id_articulo'])){
                  $dataToMod = $articulos_control->read($_POST['id_articulo']);
                  echo '<script type="text/javascript"> document.all.myModal.style.display = "block"</script>';
               }
            ?>
            <span class="close"><ion-icon name="close-outline"></ion-icon></span>
            <h1 class="titulo-modal">Nuevo Articulo</h1>
            
            <p>DESCRIPCION:</p>
            <input type="text" name="descripcion" value="<?php echo isset($dataToMod[0]['descripcion'])? $dataToMod[0]['descripcion']:'' ?>" 
            class="field" autocomplete="off" required> <br/>

            <p>PRECIO DE COMPRA:</p>
            <input type="number" name="precio_compra" value="<?php echo isset($dataToMod[0]['precio_compra'])? $dataToMod[0]['precio_compra']:'' ?>"
            class="field" autocomplete="off" required> <br/>

            <p>PRECIO DE VENTA:</p>
            <input type="number" name="precio_venta" value="<?php echo isset($dataToMod[0]['precio_venta'])? $dataToMod[0]['precio_venta']:'' ?>" 
            class="field" autocomplete="off" required> <br/>

            <p>EXISTENCIAS:</p>
            <input type="number" name="existencias" value="<?php echo isset($dataToMod[0]['existencias'])? $dataToMod[0]['existencias']:'' ?>" 
            class="field" autocomplete="off" required> <br/><br/><br/>
            
            <input type="text" name="id_articulo" 
            value="<?php echo isset($dataToMod[0]['id_articulo'])? $dataToMod[0]['id_articulo']:'' ?>" hidden>

            <span>CATEGORIA:</span>
            <select class="select-modal form-select" name="fk_categoria" required><!--Aca hacer el read de Categorias-->
               <option value="">Seleccione una Categoria</option>
               <?php
                  $data_categorias = $categoriasControl->listarActivos();
                  foreach ($data_categorias as $key => $value) {
                     foreach ($value as $key2 => $value2) {
                        $$key2 = $value2;
                     }
                     $selected = (isset($dataToMod[0]['categoria']) && 
                     $categoria == $dataToMod[0]['categoria'])? 'selected':'';
                     echo "<option value='$id_categoria' $selected>$categoria</option>";
                  }
               ?>
            </select>
            <br/><br/>
            <span>TIPO DE IVA:</span>
            <select class="select-modal form-select" name="fk_tax" required><!--Aca hacer el read de taxes-->
               <option value="">Seleccione un tipo de IVA</option>
               <?php
                  $data_tax = $taxControl->read();
                  foreach ($data_tax as $key => $value) {
                     foreach ($value as $key2 => $value2) {
                        $$key2 = $value2;
                     }
                     $selected = (isset($dataToMod[0]['tipo_iva']) && 
                     $name == $dataToMod[0]['tipo_iva'])? 'selected':'';
                     echo "<option value='$id' $selected>$name</option>";
                  }
               ?>
            </select>
            <br/>
            <p class="center-content">
            <input type="submit" class="btn-azul" value="GUARDAR"/>
            </p>

         </form>
      </div>
   </div>
   <div id="table">
      <table class="content-table">
         <thead>
            <tr>
               <th>ID</th>
               <th>DESCRIPCION</th>
               <th>PRECIO DE COMPRA</th>
               <th>PRECIO DE VENTA</th>
               <th>EXISTENCIAS</th>
               <th>CATEGORIA</th>
               <th>IVA</th>
               <th>ESTADO</th>
               <th colspan="2">ACCIONES</th>
            </tr>
         </thead>
         <tbody id="tablaDatos">
            <?php
               $data_articulos = $articulos_control->read();
               foreach ($data_articulos as $key => $value) {
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
                  <td>$id_articulo</td>
                  <td>$descripcion</td>
                  <td>$precio_compra</td>
                  <td>$precio_venta</td>
                  <td>$existencias</td>
                  <td>$categoria</td>
                  <td>$tipo_iva</td>
                  <td>$status</td>
                  </div>
                  <div id='row-actions'>
                     <td>
                        <form method='POST' id='editForm'>
                           <input type='text' name='id_articulo' value='$id_articulo' hidden>
                           <input type='submit' class='btn-table' value='Editar' id='btn-editar'>
                        </form>
                     </td>
                     <td>
                        <form method='POST' action='../acciones/stock_acciones.php' id='deleteForm$id_articulo' >
                           <input type='text' name='id_articulo' value='$id_articulo' hidden>
                           <input type='text' name='estado' value='$estado' hidden>
                        </form>
                        <button id='btn-desactivar' class='btn-table' onclick=\"desactivar($id_articulo, $estado);\" >$btnDelLabel</button>
                     </td>
                  </div>";
                  echo "</tr>";
               }
            ?>
         </tbody>
      </table>
   </div>
   <script type="text/javascript" src="../public/assets/js/stock.js"></script>
   
<?php include("includes/footer.html"); ?>