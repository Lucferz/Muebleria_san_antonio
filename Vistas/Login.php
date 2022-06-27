<?php
  require_once("../Controlador/app_base.php");
  require_once("../Controlador/sessionControl.php");
  
  $user_session = new sessionControl();

  if($_SESSION['autenticado']){
    $location = $user_session->redireccion($_SESSION['rol']);
    header("Location: ../Vistas/$location");
    die();
  }
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
      href="https://fonts.googleapis.com/css2?family=Dosis:wght@200;500;700;800&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.15.1/css/all.css"
      integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="../public/assets/css/main.css" />
    <link rel="stylesheet" href="../public/assets/css/normalize.css" />
    <title>Login</title>
  </head>
  <body>
    <main class="login-design">
      <div class="waves">
        <img id="img" src="../public/assets/img/loginPerson.png" alt="" />
      </div>
      <div class="login">
        <div class="login-data">
         <!-- <img src="assets/collab.png" alt="" /> -->
          <form method="post" action="../acciones/session_actions.php" class="login-form"> 
                     <h1>Inicio de Sesión</h1>
            <div class="input-group">
              <label class="input-fill">
                <input type="text" name="usuario" required />
                <span class="input-label">Usuario</span>
                <ion-icon name="person-outline"></ion-icon>
              </label>
            </div>
            <div class="input-group">
              <label class="input-fill">
                <input type="password" name="password" id="password" required />
                <span class="input-label">Contraseña</span>
               <ion-icon name="lock-closed-outline"></ion-icon>
              </label>
            </div>
         <!--   <a>¿Necesitas una Cuenta?</a>  -->
            <input type="submit" value="Iniciar Sesión" class="btn-login" />

          </form>
        </div>
      </div>
    </main>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  </body>
</html>
