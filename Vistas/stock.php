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
            <span class="close"><ion-icon name="close-outline"></ion-icon></span>
            <h1 class="titulo-modal">Nuevo Articulo</h1>
            
            <p>DESCRIPCION:</p>
            <input type="text" name="descripcion" class="field" required> <br/>

            <p>PRECIO DE COMPRA:</p>
            <input type="text" name="precio_compra" class="field" required> <br/>

            <p>PRECIO DE VENTA:</p>
            <input type="text" name="precio_venta" class="field" required> <br/>

            <p>EXISTENCIAS:</p>
            <input type="text" name="existencias" class="field" required> <br/><br/><br/>

            <span>CATEGORIA:</span>
            <select id="categorias-select" name="categoria" ><!--Aca hacer el read de Categorias-->
               <option value="no_select">Seleccione una Categoria</option>
               <?php
                  $data_categorias = $categoriasControl->read();
                  foreach ($data_categorias as $key => $value) {
                     foreach ($value as $key2 => $value2) {
                        $$key2 = $value2;
                     }
                     echo "<option value='$id_categoria'>$categoria</option>";
                  }
               ?>
            </select>
            <br/>
            <input type="text" name="id_articulo" 
            <?php 
               if(isset($_POST)){
                  $id = $_POST['id_articulo'];
                  echo "value='$id' ";
               }
            ?>
            hidden>

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
                  $status = $estado?'Activo':'Inactivo';
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
                     <form method='POST' >
                        <input type='text' name='id_articulo' value='$id_articulo' hidden>
                        <input type='submit' class='btn-table' value='Editar'>
                     </form>
                  </td>
                  <td>
                     <form method='POST' >
                        <input type='text' name='id_articulo' value='$id_articulo' hidden>
                        <input type='submit' class='btn-table' value='Desactivar'>
                     </form>
                  </td>
                  </div>";
                  echo "</tr>";
               }
            ?>
         </tbody>
      </table>
   </div>
   
<?php include("includes/footer.html"); ?>