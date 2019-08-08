<?php
// load required supported files
require('fpdf.php');
require_once("dbController.php");

// load contents
$time = $_GET['date'];

// create objects from class
$pdf = new FPDF();
$db_handle = new DBController();

// create pdf
$pdf->AliasNbPages();
$pdf->AddPage();

// load data from database
// $time = '2019-07-12 00:00:00';
$output = $db_handle->runQuery("SELECT * FROM `staffkitchen` WHERE `Date`= '$time'");

$cupboard_is_clean = $output[0]['cupboard_is_clean'];
$employee_name = $output[0]['employee_name'];
$floor_is_clean = $output[0]['floor_is_clean'];
$food_stored = $output[0]['food_stored'];
$fridge_is_clean = $output[0]['fridge_is_clean'];
$kettle_is_clean = $output[0]['kettle_is_clean'];
$microwave_is_clean = $output[0]['microwave_is_clean'];
$pestcontrol_is_clean = $output[0]['pestcontrol_is_clean'];
$supervisor_name = $output[0]['supervisor_name'];
$table_is_clean = $output[0]['table_is_clean'];
$trash_is_clean = $output[0]['trash_is_clean'];
$washbasin_is_clean = $output[0]['washbasin_is_clean'];

$cupboard_no_clean = $output[0]['cupboard_no_clean'];

$floor_no_clean = $output[0]['floor_no_clean'];

$food_no_stored = $output[0]['food_no_stored'];

$fridge_no_clean = $output[0]['fridge_no_clean'];

$kettle_no_clean = $output[0]['kettle_no_clean'];

$microwave_no_clean = $output[0]['microwave_no_clean'];

$pestcontrol_no_clean = $output[0]['pestcontrol_no_clean'];

$table_no_clean = $output[0]['table_no_clean'];

$trash_no_clean = $output[0]['trash_no_clean'];

$washbasin_no_clean = $output[0]['washbasin_no_clean'];

// Table contents
$header = ['Items','Yes','No with Explanation','Photo'];
$row1 = ['Floor is clean',$floor_is_clean,$floor_no_clean];
$row2 = ['Microwave clean',$microwave_is_clean,$microwave_no_clean];
$row3 = ['Fridge clean',$fridge_is_clean,$fridge_no_clean];
$row4 = ['Kettle clean',$kettle_is_clean,$kettle_no_clean];
$row5 = ['Trash empty',$trash_is_clean,$trash_no_clean];
$row6 = ['Tables clean',$table_is_clean,$table_no_clean];
$row7 = ['Washbin area clean',$washbasin_is_clean,$washbasin_no_clean];
$row8 = ['Storage cupboard clean',$cupboard_is_clean,$cupboard_no_clean];
$row9 = ['Pest Control',$pestcontrol_is_clean,$pestcontrol_no_clean];
$row10 = ['Food Stored',$food_stored,$food_no_stored];

// header
$pdf->Image('ramco.png',85,6);
$pdf->Ln(40);
$pdf->SetFont('Times','',12);
$pdf->Ln(20);

// Title
$pdf->Cell(49,12,'Staff Kitchen daily checklist:');
$pdf->Ln();
$pdf->Cell(30,12,'Date:');
$pdf->Cell(30,12,$output[0]['Date']);
$pdf->Cell(80,12,'Employee Name:',0,0,'C');
$pdf->Cell(30,12,$output[0]['employee_name']);
$pdf->Ln();
$pdf->Cell(49,12,'Supervisor:');
$pdf->Cell(30,12,$output[0]['supervisor_name']);
$pdf->Ln(20);

// Populate table header
foreach($header as $heading) 
{
    // width height text border
    $pdf->Cell(49,30,$heading,1);
}

$pdf->Ln();

foreach($row1 as $row) 
{
	$pdf->SetFont('Arial','',12);
    $pdf->Cell(49,30,$row,1); 
}
($output[0]['floor_photo'] != "''") ? $pdf->Image($output[0]['floor_photo'].'.jpg',$pdf->GetX(),$pdf->GetY(),49,30) : $pdf->Cell(49,30,$output[0]['floor_photo'],1);
$pdf->Ln();

foreach($row2 as $row)
{
    
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(49,30,$row,1);
}
($output[0]['microwave_photo'] != "''") ? $pdf->Image($output[0]['microwave_photo'].'.jpg',$pdf->GetX(),$pdf->GetY(),49,30) : $pdf->Cell(49,30,$output[0]['microwave_photo'],1);
$pdf->Ln();

foreach($row3 as $row)
{
    
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(49,30,$row,1);
}
($output[0]['fridge_photo'] != "''") ? $pdf->Image($output[0]['fridge_photo'].'.jpg',$pdf->GetX(),$pdf->GetY(),49,30) : $pdf->Cell(49,30,$output[0]['fridge_photo'],1);
$pdf->Ln();

foreach($row4 as $row)
{
    
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(49,30,$row,1);
}
($output[0]['kettle_photo'] != "''") ? $pdf->Image($output[0]['kettle_photo'].'.jpg',$pdf->GetX(),$pdf->GetY(),49,30) : $pdf->Cell(49,30,$output[0]['kettle_photo'],1);
$pdf->Ln();

foreach($row5 as $row)
{
    
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(49,30,$row,1);
}
($output[0]['trash_photo'] != "''") ? $pdf->Image($output[0]['trash_photo'].'.jpg',$pdf->GetX(),$pdf->GetY(),49,30) : $pdf->Cell(49,30,$output[0]['trash_photo'],1);

$pdf->Ln();

foreach($row6 as $row)
{
    
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(49,30,$row,1);
}
($output[0]['table_photo'] != "''") ? $pdf->Image($output[0]['table_photo'].'.jpg',$pdf->GetX(),$pdf->GetY(),49,30) : $pdf->Cell(49,30,$output[0]['table_photo'],1);

$pdf->Ln();

foreach($row7 as $row)
{
    
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(49,30,$row,1);
}
($output[0]['washbasin_photo'] != "''") ? $pdf->Image($output[0]['washbasin_photo'].'.jpg',$pdf->GetX(),$pdf->GetY(),49,30) : $pdf->Cell(49,30,$output[0]['washbasin_photo'],1);

$pdf->Ln();

foreach($row8 as $row)
{
    
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(49,30,$row,1);
}
($output[0]['cupboard_photo'] != "''") ? $pdf->Image($output[0]['cupboard_photo'].'.jpg',$pdf->GetX(),$pdf->GetY(),49,30) : $pdf->Cell(49,30,$output[0]['cupboard_photo'],1);

$pdf->Ln();

foreach($row9 as $row)
{
    
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(49,30,$row,1);
}
($output[0]['pestcontrol_photo'] != "''") ? $pdf->Image($output[0]['pestcontrol_photo'].'.jpg',$pdf->GetX(),$pdf->GetY(),49,30) : $pdf->Cell(49,30,$output[0]['pestcontrol_photo'],1);

$pdf->Ln();

foreach($row10 as $row)
{
    
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(49,30,$row,1);
}
($output[0]['food_photo'] != "''") ? $pdf->Image($output[0]['food_photo'].'.jpg',$pdf->GetX(),$pdf->GetY(),49,30) : $pdf->Cell(49,30,$output[0]['food_photo'],1);

$pdf->Ln();
$pdf->Output();
?>