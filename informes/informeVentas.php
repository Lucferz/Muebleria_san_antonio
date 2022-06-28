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
    $this->Cell(70,10,'Informe de Ventas',0,0,'C');
    // Salto de línea
    $this->Ln(20); 
   
    $this->SetFont('Arial','B',12);  
    $this->Cell(-2); 
    $this->Cell(30, 6, 'Cliente', 1, 0, 'C', 0);
    $this->Cell(30, 6, 'Vendedor', 1, 0, 'C', 0);
    $this->Cell(65, 6, 'Articulo', 1, 0, 'C', 0);
    $this->Cell(30, 6, 'Total', 1, 0, 'C', 0);
    $this->Cell(40, 6, 'Fecha de Venta', 1, 1 , 'C', 0);

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


require('../Controlador/ventasControl.php');
$ventas_control = new VentasControl();

$data_ventas = $ventas_control->informeVentas();
    foreach ($data_ventas as $key => $value) {
        foreach ($value as $key2 => $value2) {
            $$key2 = $value2;
        }

    $pdf->Cell(-2);
    $pdf->SetFont('Arial','',11);
    $pdf->MultiCell( 30, 6, $cliente, 1, 'C', 0);
    $x = $pdf->GetX();
    $y = $pdf->GetY();
    $pdf->SetXY($x+30, $y-6);
    $pdf->Cell(-2.2); 
    $pdf->MultiCell( 30, 6, $Nombre, 1, 'C', 0);
    $x = $pdf->GetX();
    $y = $pdf->GetY();
    $pdf->SetXY($x+30, $y-6);
    $pdf->Cell(28); 
    $pdf->MultiCell( 65, 6, $descripcion, 1, 'C', 0);
    $x = $pdf->GetX();
    $y = $pdf->GetY();
    $pdf->SetXY($x+65, $y-6);
    $pdf->Cell(58); 
    $pdf->MultiCell( 30, 6, $total, 1, 'C', 0);  
    $x = $pdf->GetX();
    $y = $pdf->GetY();
    $pdf->SetXY($x+30, $y-6);
    $pdf->Cell(123); 
    $pdf->MultiCell( 40, 6, $fecha_emision, 1, 'C', 0);
}


$pdf->Output();

?>