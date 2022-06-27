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
    $this->Cell(70,10,'Informe de Ventas',0,0,'C');
    // Salto de línea
    $this->Ln(20); 
   
    $this->SetFont('Arial','B',12);  
    $this->Cell(5); 
    $this->Cell(35, 10, 'Cliente', 1, 0, 'C', 0);
    $this->Cell(35, 10, 'Vendedor', 1, 0, 'C', 0);
    $this->Cell(40, 10, 'Articulo', 1, 0, 'C', 0);
    $this->Cell(35, 10, 'Total', 1, 0, 'C', 0);
    $this->Cell(40, 10, 'Fecha de Venta', 1, 1 , 'C', 0);

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
join usuarios u on v.fk_usuario = u.id_usuario where u.fk_tipo_usuario=1 or u.fk_tipo_usuario=3; ";
$resultado = $mysqli->query($consulta);

// Creación del objeto de la clase heredada
$pdf=new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

while ($row = $resultado->fetch_assoc()) {
    $pdf->Cell(5); 
    $pdf->SetFont('Arial','',11);
	$pdf->Cell(35, 10, $row['cliente'], 1, 0, 'C', 0);
    $pdf->Cell(35, 10, $row['Nombre'], 1, 0, 'C', 0);
    $pdf->Cell(40, 10, $row['descripcion'], 1, 0, 'C', 0);
    $pdf->Cell(35, 10, $row['total'], 1, 0, 'C', 0);
	$pdf->Cell(40, 10, $row['fecha_emision'], 1, 1 , 'C', 0);
}


$pdf->Output();

?>