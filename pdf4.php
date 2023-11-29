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
if (isset($_SESSION['boletas_generadas_4'])) {
    $boletas_4 = $_SESSION['boletas_generadas_4'];

    // Crear la tabla HTML con el diseño y los números generados
    $boletas_4_html = '<table border="1" cellpadding="2" align="center" style="border-collapse: collapse;">';

    foreach ($boletas_4 as $boleta) {
        $chunks = array_chunk($boleta, 2); // Dividir en chunks de 2 números en lugar de 4

        $boletas_4_html .= '<tr nobr="true">
                                    <th colspan="2">SUSUERTE <br />+569 1234 5678</th>
                                </tr>';

        foreach ($chunks as $chunk) {
            $boletas_4_html .= '<tr nobr="true">';
            foreach ($chunk as $numero) {
                $boletas_4_html .= "<td>$numero</td>";
            }
            $boletas_4_html .= '</tr>';
        }
    }

    $boletas_4_html .= '</table>';

    // Agregar la tabla al PDF
    $pdf->writeHTML($boletas_4_html, true, false, false, false, '');
}

// -----------------------------------------------------------------------------

//Close and output PDF document
$pdf->Output('Boletas4.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+