<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
      include("public/assets/links.php");
    ?>
    <title>Muebleria San Antonio</title>
  </head>
  <body>
    <div class="d-flex">
      <div id="sidebar-container" class="bg-primary">
        <div  class="logo">
          <br/>
          <h3 class="text-light">Muebleria San Antonio</h3>
          <br/><br/>
        </div>
        <div class="menu">
            <a href='#' class="d-block text-light p-3"><ion-icon name="clipboard-outline" class="mr-2 lead"></ion-icon> Stock</a>
            <a href='#' class="d-block text-light p-3"><ion-icon name="logo-usd" class="mr-2 lead"></ion-icon> Caja</a>
            <a href='#' class="d-block text-light p-3"><ion-icon name="person-outline" class="mr-2 lead"></ion-icon> Clientes</a>
            <a href='#' class="d-block text-light p-3"><ion-icon name="bag-outline" class="mr-2 lead"></ion-icon> Ventas</a>
            <a href='#' class="d-block text-light p-3"><ion-icon name="person-circle-outline" class="mr-2 lead"></ion-icon> Usuarios</a>
            <a href='#' class="d-block text-light p-3"><ion-icon name="document-text-outline" class="mr-2 lead"></ion-icon> Informes</a>
            <a href='#' class="d-block text-light p-3"><ion-icon name="cog-outline" class="mr-2 lead"></ion-icon> Configuraciones</a>
        </div>
      </div>
      <div class="w-100">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <ul class="navbar-nav ml-auto">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle rigth-menu-navbar" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <img src="public/img/Perfil.png" class="img-fluid rounded-circle avatar">
                  Lucas Frutos
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Cerrar sesion</a>
                </div>
              </li>
            </ul>
          </div>
        </nav>
        <div>

        </div>
      </div>
    </div>
    <main><!--Aca es donde iremos cambiando de pagina -->

    </main>
    <?php
      include("public/assets/scripts.php");
    ?>
  </body>
</html>