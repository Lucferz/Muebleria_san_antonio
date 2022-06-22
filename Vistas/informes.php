<?php 
ob_start();
?>

<?php 

include("../Controlador/ArticulosControl.php");
include("../Controlador/categoriasControl.php") ;
include("../Controlador/taxesControl.php") ;
$articulos_control = new ArticulosControl();
$categoriasControl = new CategoriasControl();
$taxControl = new taxesControl();
?>
<!DOCTYPE html>
 <html>
 <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
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

$html= ob_get_clean();
require_once'../vendor/dompdf/dompdf/autoload.php';
use Dompdf\Dompdf;
$dompdf = new Dompdf();
$options = $dompdf->getOptions();
$options->set(array('isRemoteEnabled' => true));
$dompdf->setOptions($options);

$dompdf->loadHtml($html);
$dompdf->setPaper('A4');


$dompdf->render();


$dompdf->stream("informe_stock.pdf", array("Attachment"=>false));

 ?>