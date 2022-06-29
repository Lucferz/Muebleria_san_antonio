<?php
    include('includes/header.php');
    if($_SESSION['rol'] != 'Admin'){
        require_once("../Controlador/sessionControl.php");
        $user_session = new sessionControl();
        $location = $user_session->redireccion($_SESSION['rol']);
        header("Location: ../Vistas/$location");
        die();
    }
    include("../Controlador/CobranzasControl.php");
    $cobControl = new CobranzasControl();
?>

<h1 style="text-align:center;">Bienvenido de Nuevo <?php echo $_SESSION['nombre'] ?></h1>


<div id="table">
      <table class="content-table">
         <thead>
            <tr style="height: 50px;">
                <th style="font-size: 1.5em;" colspan=9 >ESTADO DE COBRANZA DE LOS CLIENTES</th>
            </tr>
            <tr>
               <th>ID</th>
               <th>CLIENTE</th>
               <th>ESTADO</th>
               <th>MONTO A COBRAR</th>
               <th>FECHA A COBRAR</th>
               <th>FECHA DE COBRO</th>
               <th>MONTO COBRADO</th>
               <th>COBRADOR</th>
               <th>MORA</th>
            </tr>
         </thead>
         <tbody align="center"id="tablaDatos">
             <?php
               $data_cobranzas = $cobControl->listarInicio();
               foreach ($data_cobranzas as $key => $value) {
                  echo "<tr>";
                  foreach ($value as $key2 => $value2) {
                     $$key2 = $value2;
                  }
                  $cobrado = ($fecha_cobrado == null)? '----':$fecha_cobrado;
                  $monto_c = ($monto_cobrado == null)? '----':$monto_cobrado;
                  $cobraGuy = ($Cobrador == null)? '----':$Cobrador;
                  echo "<div id='row-content'>
                  <td>$id_cobranza</td>
                  <td>$cliente</td>
                  <td>$estado_cobranza</td>
                  <td>$monto</td>
                  <td>$fecha_cobro</td>
                  <td>$cobrado</td>
                  <td>$monto_c</td>
                  <td>$cobraGuy</td>
                  <td>$mora</td>
                  </div>
                  </tr>";
               }
            ?>
         </tbody>
      </table>
</div>

<?php
    include('includes/footer.html');
?>