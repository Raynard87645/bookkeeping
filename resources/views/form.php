 <?php 

  require('fpdf/fpdf.php');
  //A4 width :219mm
  //default margin : 10mm each side
  //writable horizontal : 219*(10*2) = 189mm
   
  $pdf = new FPDF('p','mm','A4');

  $pdf->addPage();

  //set font to arial, bold, 14pt
  $pdf->SetFont('Arial','B',14);

  //cell(width, height, text, border, end line, align)

  $pdf->cell(130, 5, 'General vompany ltd.', 1, 0);
  $pdf->cell(59, 5, 'Invoices', 1, 1);

  $pdf->SetFont('Arial','' ,12);


  $pdf->Output();

  ?>