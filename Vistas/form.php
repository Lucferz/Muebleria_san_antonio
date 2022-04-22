<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Formulario</title>
	<link rel="stylesheet" type="text/css" href="../public/assets/css/estiloform.css">
	<link rel="stylesheet" type="text/css" href="../public/assets/css/b_superior.css">
	
</head>
<body>
			<!-- Trigger/Open The Modal -->
			<button id="myBtn">Nuevo Cliente</button>

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

	<script>
		// Get the modal
		var modal = document.getElementById("myModal");

		// Get the button that opens the modal
		var btn = document.getElementById("myBtn");

		// Get the <span> element that closes the modal
		var span = document.getElementsByClassName("close")[0];

		// When the user clicks the button, open the modal 
		btn.onclick = function() {
  		modal.style.display = "block";
		}

		// When the user clicks on <span> (x), close the modal
		span.onclick = function() {
  		modal.style.display = "none";
		}

		// When the user clicks anywhere outside of the modal, close it
		window.onclick = function(event) {
  			if (event.target == modal) {
    		modal.style.display = "none";
  			}
		}
	</script>
<?php
	include("includes/footer.html");
?>