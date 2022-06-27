<?php include("includes/header.php");
if($_SESSION['rol'] != 'Admin'){
   require_once("../Controlador/sessionControl.php");
   $user_session = new sessionControl();
   $location = $user_session->redireccion($_SESSION['rol']);
   header("Location: ../Vistas/$location");
   die();
}
?>
   <div id="cabecera-botones-user">
            <a href="usuario.php"><button id="addNew" class="btn-pretty">Gestionar usuarios</button></a>
   </div>
<?php
	include("includes/footer.html");
?>



