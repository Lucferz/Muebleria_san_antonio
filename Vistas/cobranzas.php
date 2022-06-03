<!DOCTYPE html>
<htmllang="es"> 
<head>
      <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" type="text/css" href="../public/assets/css/cobranza.css">
   <title>Clientes por cobrar</title>
</head>
<body>
<?php 
include("../Controlador/CobranzasControl.php");
$clientes_control = new CobranzasControl();
?>

          <div class="usuarios-select">
          <select id="usuarios" name="usuarios">
            <option value="no_select">Usuario Fulano</option>
             <option value="cerrar">Cerrar sesion</option>
            <!-- Ver para traer el usuario logueado  -->
          </select>
        </div>
        <br> 
   <header>  

      <div class="logo">
        <img src="../public/assets/img/santo.jpg">
        <h2>Muebleria San Antonio</h2> 

  </header>

  <h3>Clientes por cobrar</h3>
 <div id="table">
      <table class="content-table">
         <thead>
            <tr>
               <th>Cliente</th>
               <th>Direccion</th>
               <th>Telefono</th>
               <th>Estado</th>
            </tr>
         </thead>
         <tbody>
            <?php
               $data_cobranzas = $cobranzas_control->read();
               foreach ($data_cobranzas as $key => $value) {
                  echo "<tr>";
                  foreach ($value as $key2 => $value2) {
                     $$key2 = $value2;
                  }
                  echo "<div id='row-content'>
                  <td>$cliente</td>
                  <td>$direccion</td>
                  <td>$telefono</td>
                  
                  </div>
                  ";
                  echo "</tr>";
               }
            ?>
         </tbody>
      </table>
   </div>


</body>
</html>

