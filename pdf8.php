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
$pdf->setEqualColumns(2, 105);

session_start();

// Obtener los números generados de la sesión
if (isset($_SESSION['boletas_generadas_8'])) {
    $boletas_8 = $_SESSION['boletas_generadas_8'];

    // Crear la tabla HTML con el diseño y los números generados
    $boletas_8_html = '
    <table border="1" cellpadding="2" align="center" style="border-collapse: collapse;">
        ';

    foreach ($boletas_8 as $boleta) {
        $chunks = array_chunk($boleta, 8);

        $boletas_8_html .= '<tr nobr="true">
                                <th colspan="8">SUSUERTE <br />+569 1234 5678</th>
                            </tr>
                            <tr nobr="true">';
        foreach ($chunks as $chunk) {
            foreach ($chunk as $numero) {
                $boletas_8_html .= "<td>$numero</td>";
            }
        }
        $boletas_8_html .= '</tr>';
    }

    $boletas_8_html .= '</table>';

    // Agregar la tabla al PDF
    $pdf->writeHTML($boletas_8_html, true, false, false, false, '');
}

// -----------------------------------------------------------------------------

//Close and output PDF document
$pdf->Output('Boletas8.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+