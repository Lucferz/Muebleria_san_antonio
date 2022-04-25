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
         	<!-- aca deben ir los botones-->
         	<!-- Trigger/Open The Modal -->
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
   				 
					<form action="" class= "modal-form" method="POST">
						<span class="close"><ion-icon name="close-outline"></ion-icon></span>
						<h1 class="titulo-modal">Nuevo Cliente</h1>
						
						<p>Cliente:</p>
						<input type="text" class="field"> <br/>

						<p>CI:</p>
						<input type="text" class="field"> <br/>

						<p>RUC:</p>
						<input type="text" class="field"> <br/>

						<p>Telefono:</p>
						<input type="text" class="field"> <br/>
		
						<p>Direccion:</p>
						<input type="text" class="field"> <br/>

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
               <th>Id Cliente</th>
               <th>Cedula</th>
               <th>Cliente</th>
               <th>Direccion</th>
               <th>Telefono</th>
               <th>RUC</th>
               <th>Estado</th>
               <th colspan="2">ACCIONES</th>
            </tr>
         </thead>
         <tbody>
            <?php
               $data_clientes = $clientes_control->read();
               foreach ($data_clientes as $key => $value) {
                  echo "<tr>";
                  foreach ($value as $key2 => $value2) {
                     $$key2 = $value2;
                  }
                  $status = $estado?'Activo':'Inactivo';
                  echo "<td>$id_cliente</td>
                  <td>$cliente</td>
                  <td>$direccion</td>
                  <td>$tel</td>
                  <td>$ruc</td>
                  <td>$estado</td>
                 

                  <td><a href='"./*$articulos_control->update()*/"'>Modificar</a></td>
                  <td><a href='"./*$articulos_control->delete()*/"'></a>Desactivar</td>";
                  echo "</tr>";
               }
            ?>
         </tbody>
      </table>
   </div>

		
<?php
	include("includes/footer.html");
?>



