<?php include("includes/header.php");
if($_SESSION['rol'] != 'Admin'){
   require_once("../Controlador/sessionControl.php");
   $user_session = new sessionControl();
   $location = $user_session->redireccion($_SESSION['rol']);
   header("Location: ../Vistas/$location");
   die();
}
include("../Controlador/categoriasControl.php");
$catControl = new CategoriasControl();
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
         <a href="cobranzas.php"><button id="addNew" class="btn-pretty"><ion-icon name="add-outline"></ion-icon> Realizar Nueva Cobranza</button></a>
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
               <th>CATEGORIA</th>
               <th>ESTADO</th>
               <th colspan="2">ACCIONES</th>
            </tr>
         </thead>
         <tbody align="center"id="tablaDatos">
             <?php
               $data_categorias = $catControl->read();
               foreach ($data_categorias as $key => $value) {
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
                  <td>$id_categoria</td>
                  <td>$categoria</td>
                  <td>$status</td>
                  </div>
                  <div id='row-actions'>
                  <td>
                     <form method='POST' id='editForm'>
                        <input type='text' name='id_categoria' value='$id_categoria' hidden>
                        <input type='submit' class='btn-table' value='Editar' id='btn-editar'>
                     </form>
                  </td>
                  <td>
                     <form method='POST' action='../acciones/categorias_acciones.php' id='deleteForm$id_categoria' >
                        <input type='text' name='id_categoria' value='$id_categoria' hidden>
                        <input type='text' name='estado' value='$estado' hidden>
                     </form>
                     <button id='btn-desactivar' class='btn-table' onclick=\"desactivar($id_categoria, $estado);\" >$btnDelLabel</button>
                  </td>
                  </div>";
                  echo "</tr>";
               }
            ?>
         </tbody>
      </table>
</div>		
<script type="text/javascript" src="../public/assets/js/categorias.js"></script>
<?php
	include("includes/footer.html");
?>