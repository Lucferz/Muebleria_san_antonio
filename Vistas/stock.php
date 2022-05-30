<?php include("includes/header.html");
include("../Controlador/ArticulosControl.php");
include("../Controlador/categoriasControl.php") ;
$articulos_control = new ArticulosControl();
$categoriasControl = new CategoriasControl();
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
            <button id="addNew" class="btn-pretty"><ion-icon name="add-outline"></ion-icon> Nuevo Articulo</button>
            <button class="btn-informe"><ion-icon name="document-text-outline"></ion-icon> Informe de Inventario</button>
         </div>
      </div>
      <div id="tabla">
      </div>
   </div>
   <!-- The Modal -->
	<div id="myModal" class="modal">
      <!-- Modal content -->
      <div class="modal-content">
         <form method="POST" class="modal-form" action="stock_acciones.php" id="dataform">
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
            class="field" required> <br/>

            <p>PRECIO DE COMPRA:</p>
            <input type="text" name="precio_compra" value="<?php echo isset($dataToMod[0]['precio_compra'])? $dataToMod[0]['precio_compra']:'' ?>"
            class="field" required> <br/>

            <p>PRECIO DE VENTA:</p>
            <input type="text" name="precio_venta" value="<?php echo isset($dataToMod[0]['precio_venta'])? $dataToMod[0]['precio_venta']:'' ?>" 
            class="field" required> <br/>

            <p>EXISTENCIAS:</p>
            <input type="text" name="existencias" value="<?php echo isset($dataToMod[0]['existencias'])? $dataToMod[0]['existencias']:'' ?>" 
            class="field" required> <br/><br/><br/>
            
            <input type="text" name="id_articulo" 
            value="<?php echo isset($dataToMod[0]['id_articulo'])? $dataToMod[0]['id_articulo']:'' ?>" hidden>
            <span>CATEGORIA:</span>
            <select id="categorias-select" name="fk_categoria" ><!--Aca hacer el read de Categorias-->
               <option value="no_select">Seleccione una Categoria</option>
               <?php
                  $data_categorias = $categoriasControl->read();
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
               <th>ESTADO</th>
               <th colspan="2">ACCIONES</th>
            </tr>
         </thead>
         <tbody>
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
                     <form method='POST' action='stock_acciones.php' id='deleteForm$id_articulo' >
                        <input type='text' name='id_articulo' value='$id_articulo' hidden>
                     </form>
                     <button id='btn-desactivar' class='btn-table' onclick=\"desactivar($id_articulo);\" >$btnDelLabel</button>
                  </td>
                  </div>";
                  echo "</tr>";
               }
            ?>
         </tbody>
      </table>
   </div>
   
<?php include("includes/footer.html"); ?>