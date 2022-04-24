<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Formulario</title>
	<link rel="stylesheet" type="text/css" href="../public/assets/css/estiloform.css">
	<link rel="stylesheet" type="text/css" href="../public/assets/css/b_superior.css">
	<script type="text/javascript" src="../public/assets/js/main.js"></script>
	
</head>
<body>
			<!-- Trigger/Open The Modal -->
			<button id="addNew">Nuevo Cliente</button>

		<!-- The Modal -->
		<div id="myModal" class="modal">

  			<!-- Modal content -->
  			<div class="modal-content">
   				 
					<form action="" method="POST">
						<span class="close"><ion-icon name="close-outline"></ion-icon></span>
						<h1>Nuevo Cliente</h1>
						
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
						<input type="submit" class="btn btn-azul" value="GUARDAR">
						</p>

					</form>
  			</div>

		</div>

		
<?php
	include("includes/footer.html");
?>