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
          <h3 class="text-light"></h3>
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
    <!--<div class="d-flex flex-column flex-shrink-0 bg-light" style="width: 4.5rem;">
          <a href="/" class="d-block p-3 link-dark text-decoration-none" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Icon-only">
            <svg class="bi" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
            <span class="visually-hidden">Icon-only</span>
          </a>
          <ul class="nav nav-pills nav-flush flex-column mb-auto text-center">
            <li class="nav-item">
              <a href="#" class="nav-link active py-3 border-bottom" aria-current="page" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Home">
                <svg class="bi" width="24" height="24" role="img" aria-label="Home"><use xlink:href="#home"></use></svg>
              </a>
            </li>
            <li>
              <a href="#" class="nav-link py-3 border-bottom" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Dashboard">
                <svg class="bi" width="24" height="24" role="img" aria-label="Dashboard"><use xlink:href="#speedometer2"></use></svg>
              </a>
            </li>
            <li>
              <a href="#" class="nav-link py-3 border-bottom" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Orders">
                <svg class="bi" width="24" height="24" role="img" aria-label="Orders"><use xlink:href="#table"></use></svg>
              </a>
            </li>
            <li>
              <a href="#" class="nav-link py-3 border-bottom" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Products">
                <svg class="bi" width="24" height="24" role="img" aria-label="Products"><use xlink:href="#grid"></use></svg>
              </a>
            </li>
            <li>
              <a href="#" class="nav-link py-3 border-bottom" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Customers">
                <svg class="bi" width="24" height="24" role="img" aria-label="Customers"><use xlink:href="#people-circle"></use></svg>
              </a>
            </li>
          </ul>
          <div class="dropdown border-top">
            <a href="#" class="d-flex align-items-center justify-content-center p-3 link-dark text-decoration-none dropdown-toggle" id="dropdownUser3" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="https://github.com/mdo.png" alt="mdo" width="24" height="24" class="rounded-circle">
            </a>
            <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser3">
              <li><a class="dropdown-item" href="#">New project...</a></li>
              <li><a class="dropdown-item" href="#">Settings</a></li>
              <li><a class="dropdown-item" href="#">Profile</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Sign out</a></li>
            </ul>
          </div>
        </div>
      </div>-->
    <main><!--Aca es donde iremos cambiando de pagina -->

    </main>
    <?php
      include("public/assets/scripts.php");
    ?>
  </body>
</html>