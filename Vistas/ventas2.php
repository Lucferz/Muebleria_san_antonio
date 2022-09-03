<?php
require_once("../Controlador/app_base.php");
if (!$_SESSION['autenticado']) {
   header("Location: Login.php");
   die();
} else if ($_SESSION['rol'] != 'Admin' && $_SESSION['rol'] != 'Vendedor' && $_SESSION['rol'] != 'Gerente') {
   require_once("../Controlador/sessionControl.php");
   $user_session = new sessionControl();
   $location = $user_session->redireccion($_SESSION['rol']);
   header("Location: $location");
   die();
}
require_once("../Controlador/TipoVentaControl.php");
require_once("../Controlador/ventasControl.php");
$tvc = new TipoVentaControl();
$venControl = new ventasControl();
if ($_GET["error"] == "true") {
   echo "<div id=\"ModalError\" class=\"modal\">
            <script type=\"text/javascript\"> document.all.ModalError.style.display = \"block\"</script>
            <div class=\"modal-content\">
               <div class='modal-form'>
                  <p style='font-size:25px; color:black;' class='titulo-modal'>ERROR</p>
                  <p style='color: red; font-size:20px;'>" . $_GET['errormsg'] . "</p>
                  <p class='center-content'><button class=\"btn-pretty\" onclick=\"location.replace('NuevaVenta.php');\"> Aceptar</button></p>
               </div>
            </div>
         </div>
         ";
}
?>
<!DOCTYPE html>
<htmllang="es">

   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Ventas</title>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
      <!-- Google Font: Source Sans Pro -->
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
      <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
      
   </head>

   <body>
      <?php
      if ($_SESSION['rol'] == 'Admin' || $_SESSION['rol'] == 'Gerente') {
         echo "<button onclick=\"location.href= 'ventas.php'\" class=\"volver\"><ion-icon name=\"arrow-undo-outline\"></ion-icon></button>";
      }
      ?>

      <?php $fecha = date("Y-m-d"); ?>

      <h1 class="text-primary text-center">Nueva Venta</h1>

      <br>



      <div class="container">

         <div class="row justify-content-center justify-content-md-start">

            <div class="col-sm-6">
               <label>
                  <dt>Cliente</dt>
               </label>
               <select name="cliente" id="cliente" class="form-control selectpicker" data-show-subtext="true" data-live-search="true" data-style="form-control" title="-- Seleccione el Cliente --" autofocus>
                  <option style="font-size: 18px" value="">Seleccionar Cliente</option>
               </select>
            </div>

            <div class="col-sm-6">
               <label>
                  <dt>Producto</dt>
               </label>
               <select name="producto" id="producto" class="form-control selectpicker" data-show-subtext="true" data-live-search="true" data-style="form-control" title="-- Seleccione el Procedimiento --" autofocus>

                  <option style="font-size: 18px" value=" ">Seleccionar producto</option>
               </select>
            </div>
         </div>
         <p> </p>
         <div class="row justify-content-start ">
            <div class="col-sm-2">
               <label>
                  <dt>Cantidad</dt>
               </label>
               <input type="number" name="cantidad" class="form-control" id="cantidad" value="1" step="any" min="1">
            </div>

            <div class="col-sm-3">
               <label>
                  <dt>Precio</dt>
               </label>
               <input type="number" name="precio_venta" class="form-control" id="precio_venta" value="" readonly>
            </div>

            <div class="col-sm-3">
               <label>
                  <dt>Descuento (Gs.)</dt>
               </label>
               <input type="number" name="descuento" class="form-control" id="descuento" value="0">

            </div>
            <div class="col-sm-3">
               <label>
                  <dt>Entrega (Gs.)</dt>
               </label>
               <input type="number" name="descuento" class="form-control" id="descuento" value="0">

            </div>
         </div>
         <p> </p>
         <div class="row justify-content-start ">
            <div class="col-sm-4">
               <label>
                  <dt>Tipo de Venta</dt>
               </label>
               <select name="producto" id="producto" class="form-control selectpicker" data-show-subtext="true" data-live-search="true" data-style="form-control" title="-- Seleccione el Procedimiento --" autofocus>
                  <option style="font-size: 18px" value=" ">Seleccionar tipo de venta</option>
               </select>
            </div>


            <div class="col-sm-3">
               <label>
                  <dt>Fecha</dt>
               </label>
               <input type="date" id="aname" class="form-control" name="date">
            </div>

            <div class="col-sm-3">
               <label>
                  <dt>Factura</dt>
               </label>
               <input style="width: 20px" type="checkbox" name="checkTareas" class="form-control tareas">
            </div>

            <button type="button" class="btn btn-primary btn-sm">Confirmar</button>


         </div>


      </div>

      <p> </p>

      <div>
         <div class="card-body">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
               <thead>
                  <tr>
                     <th>Rendering engine</th>
                     <th>Browser</th>
                     <th>Platform(s)</th>
                     <th>Engine version</th>
                     <th>CSS grade</th>
                  </tr>
               </thead>
               <tbody>
                  <tr>
                     <td>Trident</td>
                     <td>Internet
                        Explorer 4.0
                     </td>
                     <td>Win 95+</td>
                     <td> 4</td>
                     <td>X</td>
                  </tr>
                  <tr>
                     <td>Trident</td>
                     <td>Internet
                        Explorer 5.0
                     </td>
                     <td>Win 95+</td>
                     <td>5</td>
                     <td>C</td>
                  </tr>
                  <tr>
                     <td>Trident</td>
                     <td>Internet
                        Explorer 5.5
                     </td>
                     <td>Win 95+</td>
                     <td>5.5</td>
                     <td>A</td>
                  </tr>
                  <tr>
                     <td>Trident</td>
                     <td>Internet
                        Explorer 6
                     </td>
                     <td>Win 98+</td>
                     <td>6</td>
                     <td>A</td>
                  </tr>

                  </tfoot>
            </table>
         </div>
         <!-- /.card-body -->
      </div>
      <!-- /.card -->

      </div>

      <div align="center">
         <a class="btn btn-lg btn-primary " href="" class="btn btn-success">Confirmar</a>

         <a class="btn btn-lg btn-danger" onclick="javascript:return confirm('¿Seguro de eliminar este presupuesto?');" href="">Cancelar</a>

      </div>



      <script>
         $('#cliente').picker();
         $('#producto').picker();


         $(".tareas").click(function() {
            let idc = $(this).attr("idc");
            let estado = 0;

            if (this.checked) {
               estado = 1;
               // console.log ("checkeado"+idc);
            }
            //    console.log("?c=consulta_tmp&a=CambiarFinalizado&id=" +idc +"&estado="+estado );
            $.ajax({ //peticion para 
               url: "?c=consulta_tmp&a=CambiarFinalizado&id=" + idc + "&estado=" + estado,
               type: 'post',
               dataType: 'json',
               success: function(response) {
                  //acciones en peticion exitosa
               }
            });

         });

         $(document).ready(function() {
            $('#example').DataTable();
         });
      </script>


   </body>

   </html>