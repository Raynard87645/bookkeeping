@extends('layouts.main')

@section('content')
<?php

if(!empty($_POST['submit']))
{
$invoice_id=$_POST['invoice_id'];
$invoice_date=$_POST['invoice_date'];
$client=$_POST['client'];
$title=$_POST['title'];
$client_address=$_POST['client_address'];
$sub_total=$_POST['sub_total'];
$discount=$_POST['discount'];
$grand_total=$_POST['grand_total'];
$quantity=$_POST['quantity'];
$price=$_POST['price'];
$name=$_POST['name'];
$product_total=$_POST['product_total'];





require('fpdf/fpdf.php');
  //A4 width :219mm
  //default margin : 10mm each side
  //writable horizontal : 219*(10*2) = 189mm
   
$pdf = new FPDF('p','mm','A4');

$pdf->AddPage();

  //set font to arial, bold, 15pt
$pdf->SetFont('Arial','B',15);

  //cell(width, height, text, border, end line, align)
$pdf->Cell(120, 5, 'General ds vompany ltd.', 0, 0);
$pdf->Cell(59, 5, 'Invoices', 0, 1);

 //set font to arial, bold, 12pt
$pdf->SetFont('Arial','',12);

  //cell(width, height, text, border, end line, align)
$pdf->Cell(120, 5, '[Street Address]', 0, 0);
$pdf->Cell(59, 5, '', 0, 1);

$pdf->Cell(120, 5, '[City, Country, Zip]', 0, 0);
$pdf->Cell(28, 5, 'Date', 0, 0);
$pdf->Cell(31, 5, '', 0, 1);

$pdf->Cell(120, 5, 'Phone [+1 (876) 459-5798]', 0, 0);
$pdf->Cell(28, 5, 'Invoice#', 0, 0);
$pdf->Cell(31, 5, '[56656476]', 0, 1);

$pdf->Cell(120, 5, 'Fax [+1 (876) 459-5798]', 0, 0);
$pdf->Cell(28, 5, 'Customer ID', 0, 0);
$pdf->Cell(31, 5, '[54356476]', 0, 1);

//dumy empty cell
$pdf->Cell(189, 10, '', 0, 1);

$pdf->SetFont('Arial','B',15);
//billing address
$pdf->Cell(189, 5, 'Bill to', 0, 1);

$pdf->SetFont('Arial','',12);

$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(90, 5, 'Name', 0, 1);

$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(90, 5, 'Company Name', 0, 1);

$pdf->Cell(10, 5, '',0, 0);
$pdf->Cell(90, 5, 'Address', 0, 1);

$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(90, 5, 'Phone', 0, 1);

//dumy empty cell
$pdf->Cell(189, 10, '', 0, 1);

//invoice contents
$pdf->SetFont('Arial','B',12);

$pdf->Cell(130, 5, 'Discription', 1, 0);
$pdf->Cell(25, 5, 'Taxable', 1, 0);
$pdf->Cell(34, 5, 'Amount', 1, 1);

//Numbers are right aligned with 'R'
$pdf->SetFont('Arial','',12);

$pdf->Cell(130, 5, 'Bag juice', 1, 0);
$pdf->Cell(25, 5, '-', 1, 0);
$pdf->Cell(34, 5, '3, 250', 1, 1,'R');

$pdf->Cell(130, 5, 'Bread', 1, 0);
$pdf->Cell(25, 5, '-', 1, 0);
$pdf->Cell(34, 5, '1, 200', 1, 1,'R');

$pdf->Cell(130, 5, 'Peanut', 1, 0);
$pdf->Cell(25, 5, '-', 1, 0);
$pdf->Cell(34, 5, '1, 000', 1, 1,'R');

//summary
$pdf->Cell(130, 5, '', 1, 0);
$pdf->Cell(25, 5, 'SubTotal', 1, 0);
$pdf->Cell(4, 5, '$', 1, 0);
$pdf->Cell(30, 5, '4, 450', 1, 1,'R');

$pdf->Cell(130, 5, '', 1, 0);
$pdf->Cell(25, 5, 'Taxable', 1, 0);
$pdf->Cell(4, 5, '$', 1, 0);
$pdf->Cell(30, 5, '0', 1, 1,'R');

$pdf->Cell(130, 5, '', 1, 0);
$pdf->Cell(25, 5, 'Tax Rate', 1, 0);
$pdf->Cell(4, 5, '$', 1, 0);
$pdf->Cell(30, 5, '10%', 1, 1,'R');

$pdf->Cell(130, 5, '', 1, 0);
$pdf->Cell(25, 5, 'Total Due', 1, 0);
$pdf->Cell(4, 5, '$', 1, 0);
$pdf->Cell(30, 5, '4, 450', 1, 1,'R');

 
$pdf->Output();
?> 
 }

 @endsection