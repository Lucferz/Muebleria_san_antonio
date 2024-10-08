<?php
require_once("../Controlador/app_base.php");
if($_SESSION['autenticado'] != true){
   header("Location: Login.php");
   die();
}
if($_SESSION['rol'] != 'Admin'){
    require_once("../Controlador/sessionControl.php");
    $user_session = new sessionControl();
    $location = $user_session->redireccion($_SESSION['rol']);
    header("Location: ../Vistas/$location");
    die();
 }


require('../informes/fpdf/fpdf.php');
class PDF extends FPDF{
// Cabecera de página
function Header()
{
    
    $this->SetFont('Arial','B',18);
    // Movernos a la derecha
    $this->Cell(60);
    // Título
    $this->Cell(70,10,'Informe de Stock',0,0,'C');
    // Salto de línea
    $this->Ln(20); 
   
    $this->SetFont('Arial','B',12);  
  //  $this->Cell(8); 
    $this->Cell(150, 8, 'Descripcion', 1, 0, 'C', 0);
    $this->Cell(25, 8, 'Existencias', 1, 1 , 'C', 0);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('Página').$this->PageNo().'/{nb}',0,0,'C');
}

}



// Creación del objeto de la clase heredada
$pdf=new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();



require('../Controlador/ArticulosControl.php');
$articulos_control = new ArticulosControl();

$data_articulos = $articulos_control->informeStock();
    foreach ($data_articulos as $key => $value) {
        foreach ($value as $key2 => $value2) {
            $$key2 = $value2;
        }
    $pdf->SetFont('Arial','',11);
    $pdf->MultiCell( 150, 8, $descripcion , 1, 'C', 0);
    $x = $pdf->GetX();
    $y = $pdf->GetY();
    $pdf->SetXY($x+150, $y-8);
    $pdf->MultiCell( 25, 8, $existencias , 1, 'C', 0);

}


$pdf->Output();

?>

