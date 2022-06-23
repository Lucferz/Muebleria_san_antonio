<?php 

include("../Controlador/ArticulosControl.php");
$articulos_control = new ArticulosControl();

ob_start();
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

                     echo "<div id='row-content'>
                     <td>$descripcion</td>
                     <td>$existencias</td>
                     </div></tr>";
                     }
                  ?>
               </tbody>
            </table>
         </div>
   </body>
</html> 

<?php 

$html= ob_get_clean();
// echo $html;

require_once '../vendor/autoload.php';

use Dompdf\Dompdf;
$dompdf = new Dompdf();

/*
$options = $dompdf ->getOptoions();
$options->set(array('isRemoteEnabled' => true));
$dompdf->setOptions($options);
*/

$dompdf->loadHtml('Hola Yu');

$dompdf->setPaper('A4');

$dompdf->render();

$dompdf->stream("informe_Stock.pdf", array("Attachment" => false));
?>

