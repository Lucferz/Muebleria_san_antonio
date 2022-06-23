<?php 
require '../vendor/autoload.php';
include("../Controlador/ArticulosControl.php");
include("../Controlador/categoriasControl.php") ;
include("../Controlador/taxesControl.php") ;
$articulos_control = new ArticulosControl();
$categoriasControl = new CategoriasControl();
$taxControl = new taxesControl();
ob_start(); //captura la salida
?>
<!DOCTYPE html>
 <html>
 <head>
    <meta charset="utf-8">
    <title>prueba</title>
 </head>
 <body>
  <div id="table">
      <table class="content-table">
         <thead>
            <tr>
               <th>DESCRIPCION</th>
               <th>EXISTENCIAS</th>
               <th colspan="2">ACCIONES</th>
            </tr>
         </thead>
         <tbody id="tablaDatos">
            <?php
               $data_articulos = $articulos_control->read();
               foreach ($data_articulos as $key => $value) {
                  echo "<tr>";
                  foreach ($value as $key2 => $value2) {
                     $$key2 = $value2;
                  }
                  if($estado){
                     $status = 'Activo';
                     $btnDelLabel = 'Desactivar';
                  }else{
                     $status = 'Inactivo';
                     $btnDelLabel = 'Reactivar';
                  }
                  echo "<div id='row-content'>
                  <td>$descripcion</td>
                  <td>$existencias</td>
                  </div>
                  ";
                  echo "</tr>";
               }
            ?>
         </tbody>
      </table>
   </div>
   <script type="text/javascript" src="../public/assets/js/stock.js"></script>
 </body>
 </html> 

 
<?php 

$dompdf = new Dompdf\Dompdf();
$dompdf->loadHtml(ob_get_clean());

$dompdf->render();
$dompdf->stream("informe_stock.pdf", array("Attachment"=>false));


 ?>