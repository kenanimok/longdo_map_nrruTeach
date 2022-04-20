<?php
require('ean13.php');

$pdf=new PDF_EAN13();
$pdf->AddPage();
$pdf->EAN13(80,40,'2354897');
$pdf->Output();
?>
