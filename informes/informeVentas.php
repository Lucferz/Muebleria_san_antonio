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
require('fpdf/fpdf.php');
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

require'../DatosDAO/cn.php';
$consulta = "SELECT 
c.cliente, 
u.Nombre,
a.descripcion, 
v.total, 
v.fecha_emision 
FROM ventas v join articulos a on v.fk_articulo = a.id_articulo
join clientes c on v.fk_cliente = c.id_cliente 
join usuarios u on v.fk_usuario = u.id_usuario where u.fk_tipo_usuario=1 or u.fk_tipo_usuario=3
ORDER BY fecha_emision asc; ";
$resultado = $mysqli->query($consulta);

// Creación del objeto de la clase heredada
$pdf=new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

while ($row = $resultado->fetch_assoc()) {
    $pdf->Cell(-2); 
    $pdf->SetFont('Arial','',11);
    $pdf->MultiCell( 30, 6, $row['cliente'], 1, 'C', 0);
    $x = $pdf->GetX();
    $y = $pdf->GetY();
    $pdf->SetXY($x+30, $y-6);
    $pdf->Cell(-2.2); 
	$pdf->MultiCell( 30, 6, $row['Nombre'], 1, 'C', 0);
    $x = $pdf->GetX();
    $y = $pdf->GetY();
    $pdf->SetXY($x+30, $y-6);
    $pdf->Cell(28); 
    $pdf->MultiCell( 65, 6, $row['descripcion'] , 1, 'C', 0);
    $x = $pdf->GetX();
    $y = $pdf->GetY();
    $pdf->SetXY($x+65, $y-6);
    $pdf->Cell(58); 
    $pdf->MultiCell( 30, 6, $row['total'] , 1, 'C', 0);  
    $x = $pdf->GetX();
    $y = $pdf->GetY();
    $pdf->SetXY($x+30, $y-6);
    $pdf->Cell(123); 
    $pdf->MultiCell( 40, 6, $row['fecha_emision'] , 1, 'C', 0);
}


$pdf->Output();

?>