<?php include("includes/header.html"); 
    $conn = conectar();
    $sql = "SELECT * from clientes";
    $query = mysqli_query($conn, $sql); 
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
                   while($row=mysqli_fetch_array($query)){
                  ?>
                     <tr>
                           <th><?php  echo $row['id_cliente']?></th>
                           <th><?php  echo $row['ci']?></th>
                           <th><?php  echo $row['cliente']?></th>
                           <th><?php  echo $row['direccion']?></th>
                           <th><?php  echo $row['telefono']?></th>
                           <th><?php  echo $row['ruc']?></th>
                           <th><?php  echo $row['estado']?></th>
                           <th><a href="actualizar.php?id=<?php echo $row['id_cliente'] ?>">Editar</a></th>
                           <th><a href="eliminar.php?id=<?php echo $row['id_cliente'] ?>" >Eliminar</a></th>                       
                      </tr>
                  <?php 
                      }
                   ?>             
         </tbody>
      </table>
   </div>

		
<?php
	include("includes/footer.html");
?>



