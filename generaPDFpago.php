<?php
require "fpdf/fpdf.php";
//include ('qrindex.php');


$pdf = new FPDF($orientation='P',$unit='mm', array(60,60));
$pdf->AddPage();
$pdf->SetFont('Arial','B',8);    //Letra Arial, negrita (Bold), tam. 20
$textypos = 1;
$pdf->setY(2);
$pdf->setX(6);
$pdf->Image('images/beltran.png',10,8,33);
$pdf->Cell(5,$textypos,"Instituto Tecnologico Beltran");
$pdf->SetFont('Arial','',5);    //Letra Arial, negrita (Bold), tam. 20
$textypos+=6;
$pdf->setX(2);
$pdf->Cell(1,$textypos,'-------------------------------------------------------------------------------------------');
$textypos+=6;
$pdf->setX(2);

$pdf->Cell(1,$textypos,'PPTE.  GNC   COLOR  INGRESO   EGRESO     TOTAL');

$total =0;
$off = $textypos+6;

$producto = array(
  "q"=>3,
  "name"=>"ERT896",
  "price"=>125
);
$productos = array($producto);
foreach($productos as $pro){
$pdf->setX(2);
$pdf->Cell(5,$off,$pro["q"]);
$pdf->setX(6);
$pdf->Cell(35,$off,  strtoupper(substr($pro["name"], 0,12)) );
$pdf->setX(20);
$pdf->Cell(11,$off,  "$".number_format($pro["price"],2,".",",") ,0,0,"R");
$pdf->setX(32);
$pdf->Cell(11,$off,  "$ ".number_format($pro["q"]*$pro["price"],2,".",",") ,0,0,"R");

$total += $pro["q"]*$pro["price"];
$off+=6;
}
$textypos=$off+6;

$pdf->setX(2);
$pdf->Cell(5,$textypos,"TOTAL: " );
$pdf->setX(38);
$pdf->Cell(5,$textypos,"$ ".number_format($total,2,".",","),0,0,"R");

$pdf->setX(2);
$pdf->SetFont('Arial','',3); 
$pdf->Cell(5,$textypos+6,'GRACIAS POR ELEGIRNOS ');

$pdf->output();