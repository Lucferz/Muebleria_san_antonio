<?php
require('../inf/fpdf/fpdf.php');
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
    $this->Cell(30); 
    $this->Cell(100, 10, 'Descripcion', 1, 0, 'C', 0);
    $this->Cell(40, 10, 'Existencias', 1, 1 , 'C', 0);
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
$consulta = "SELECT descripcion,existencias from articulos";
$resultado = $mysqli->query($consulta);

// Creación del objeto de la clase heredada
$pdf=new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

while ($row = $resultado->fetch_assoc()) {
    $pdf->Cell(30); 
	$pdf->Cell(100, 10, $row['descripcion'], 1, 0, 'C', 0);
	$pdf->Cell(40, 10, $row['existencias'], 1, 1 , 'C', 0);
}


$pdf->Output();

?>