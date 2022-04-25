<?php include("includes/header.html");
include("../Controlador/ArticulosControl.php");
include("../Controlador/categoriasControl.php") ;
$articulos_control = new ArticulosControl();
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
         
         <form action="" method="POST" class="modal-form">
            <span class="close"><ion-icon name="close-outline"></ion-icon></span>
            <h1 class="titulo-modal">Nuevo Articulo</h1>
            
            <p>Descripcion:</p>
            <input type="text" name="descripcion" class="field"> <br/>

            <p>CI:</p>
            <input type="text" name="" class="field"> <br/>

            <p>RUC:</p>
            <input type="text" name="" class="field"> <br/>

            <p>Telefono:</p>
            <input type="text" name="" class="field"> <br/>

            <p>Direccion:</p>
            <input type="text" name="" class="field"> <br/>

            <input type="text" name="id_articulo" hidden>

            <p class="center-content">
            <input type="submit" class="btn-pretty" value="GUARDAR"/>
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
                  echo "<td>$id_articulo</td>
                  <td>$descripcion</td>
                  <td>$precio_compra</td>
                  <td>$precio_venta</td>
                  <td>$existencias</td>
                  <td>$categoria</td>
                  <td>$status</td>

                  <td><a href='"./*$articulos_control->update()*/"'>Modificar</a></td>
                  <td><a href='"./*$articulos_control->delete()*/"'></a>Desactivar</td>";
                  echo "</tr>";
               }
            ?>
         </tbody>
      </table>
   </div>
   
<?php include("includes/footer.html"); ?>