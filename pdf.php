<?php

require_once('./TCPDF-main/tcpdf.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// ---------------------------------------------------------

// set font
$pdf->SetFont('helvetica', 'B', 20);

// add a page
$pdf->AddPage();

$pdf->SetFont('helvetica', '', 8);

// -----------------------------------------------------------------------------

// NON-BREAKING ROWS (nobr="true")

$tbl = <<<EOD
<table border="1" cellpadding="2" align="center">
 <tr nobr="true">
  <th colspan="3">SUSUERTE <br />+569 1234 5678</th>
  <th colspan="3">SUSUERTE <br />+569 1234 5678</th>
 </tr>
 <tr nobr="true">
  <td>T1ROW 1<br />COLUMN 1</td>
  <td>T1ROW 1<br />COLUMN 2</td>
  <td>T1ROW 1<br />COLUMN 3</td>

  <td>T2ROW 1<br />COLUMN 1</td>
  <td>T2ROW 1<br />COLUMN 2</td>
  <td>T2ROW 1<br />COLUMN 3</td>
 </tr>
 <tr nobr="true">
  <td>T1ROW 2<br />COLUMN 1</td>
  <td><br /></td>
  <td>T1ROW 2<br />COLUMN 3</td>

  <td>T2ROW 2<br />COLUMN 1</td>
  <td><br /></td>
  <td>T2ROW 2<br />COLUMN 3</td>
 </tr>
 <tr nobr="true">
  <td>T1ROW 3<br />COLUMN 1</td>
  <td>T1ROW 3<br />COLUMN 2</td>
  <td>T1ROW 3<br />COLUMN 3</td>

  <td>T2ROW 3<br />COLUMN 1</td>
  <td>T2ROW 3<br />COLUMN 2</td>
  <td>T2ROW 3<br />COLUMN 3</td>
 </tr>
</table>
EOD;

$pdf->writeHTML($tbl, true, false, false, false, '');

// -----------------------------------------------------------------------------

//Close and output PDF document
$pdf->Output('example_048.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+