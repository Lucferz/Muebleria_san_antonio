<?php include("includes/header.html");
include("../Controlador/categoriasControl.php");
$catControl = new CategoriasControl();
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
         	<button id="addNew" class="btn-pretty"><ion-icon name="add-outline"></ion-icon> Nueva Categoria</button>
         </div>
      </div>
      <div id="tabla">
      </div>
   </div>
		<!-- The Modal -->
		<div id="myModal" class="modal">
  			<!-- Modal content -->
  			<div class="modal-content"> 
					<form method="POST" class= "modal-form" action="categorias_acciones.php" id="dataform">
            <?php 
               $dataToMod;
               if (isset($_POST) && isset($_POST['id_categoria'])){
                  $dataToMod = $catControl->findById($_POST['id_categoria']);
                  echo '<script type="text/javascript"> document.all.myModal.style.display = "block"</script>';
               }
            ?>
						<span class="close"><ion-icon name="close-outline"></ion-icon></span>
						<h1 class="titulo-modal">Nueva Categoria</h1>
						
						<p>Categoria:</p>
						<input type="text" name="categoria" value="<?php echo isset($dataToMod[0]['categoria'])? $dataToMod[0]['categoria']:'' ?>" 
                  class="field" required> <br/>

                  <br/>
                    <input type="text" name="id_categoria" 
                     value="<?php echo isset($dataToMod[0]['id_categoria'])? $dataToMod[0]['id_categoria']:'' ?>" hidden>

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
               <th>CATEGORIA</th>
               <th colspan="2">ACCIONES</th>
            </tr>
         </thead>
         <tbody align="center">
             <?php
               $data_categorias = $catControl->read();
               foreach ($data_categorias as $key => $value) {
                  echo "<tr>";
                  foreach ($value as $key2 => $value2) {
                     $$key2 = $value2;
                  }
                  echo "<div id='row-content'>
                  <td>$id_categoria</td>
                  <td>$categoria</td>
                  </div>
                  <div id='row-actions'>
                  <td>
                     <form method='POST' id='editForm'>
                        <input type='text' name='id_categoria' value='$id_categoria' hidden>
                        <input type='submit' class='btn-table' value='Editar' id='btn-editar'>
                     </form>
                  </td>
                  <td>
                     <form method='POST' action='categorias_acciones.php' id='deleteForm$id_categoria' >
                        <input type='text' name='id_categoria' value='$id_categoria' hidden>
                     </form>
                     <button id='btn-desactivar' class='btn-table' onclick=\"eliminar($id_categoria);\" >Eliminar</button>
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