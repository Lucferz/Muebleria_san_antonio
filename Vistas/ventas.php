<?php include("includes/header.html");
include("../Controlador/ventasControl.php");
$ventas_control = new VentasControl();
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
            <a href="NuevaVenta.php"><button id="addNew" class="btn-pretty"><ion-icon name="add-outline"></ion-icon> Nueva Venta</button></a>
            <button class="btn-informe"><ion-icon name="document-text-outline"></ion-icon> Informe de Inventario</button>
         </div>
      </div>
      <div id="tabla">
      </div>
   </div>
   <?php 
   /*
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
   */ 
  ?>
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
         <tbody>
            <?php
               $data_ventas = $ventas_control->read();
               foreach ($data_ventas as $key => $value) {
                  echo "<tr>";
                  foreach ($value as $key2 => $value2) {
                     $$key2 = $value2;
                  }
                  $status = $estado?'Activo':'Inactivo';
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
                  </div>
                  <div id='row-actions'>
                  <td>
                     <form method='POST' id='editForm'>
                        <input type='text' name='id_articulo' value='$id_venta' hidden>
                        <input type='submit' class='btn-table' value='Modificar' id='btn-editar'>
                     </form>
                  </td>
                  <td>
                     <form method='POST' action='stock_acciones.php' id='deleteForm$id_venta' >
                        <input type='text' name='id_articulo' value='$id_venta' hidden>
                     </form>
                     <button id='btn-desactivar' class='btn-table' onclick=\"desactivar($id_venta);\" >Anular</button>
                  </td>
                  </div>";
                  echo "</tr>";
               }
            ?>
         </tbody>
      </table>
   </div>
   
<?php include("includes/footer.html"); ?>