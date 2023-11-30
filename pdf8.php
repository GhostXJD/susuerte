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
    <style>

    td {
		height: 24px;
        font-weight: bold;
	}
    th {
        font-weight: bold;
    }
    </style>
    <table border="1" cellpadding="2" align="center" style="border-collapse: collapse;">';

    foreach ($boletas_8 as $boleta) {
        $chunks = array_chunk($boleta, 4);

        $boletas_8_html .= '<tr nobr="true">
                                <th colspan="4" height="30">SUSUERTE <br />+569 5401 6770</th>
                            </tr>';

        foreach ($chunks as $chunk) {
            $boletas_8_html .= '<tr nobr="true">';
            foreach ($chunk as $numero) {
                $boletas_8_html .= "<td>$numero</td>";
            }
            $boletas_8_html .= '</tr>';
        }

        $boletas_8_html .= '<tr nobr="true">
                                <td colspan="4"><div class="caducidad">Se paga al portador, Caducidad 24 horas. La boleta se anulará si se encuentra rota con tachones, borrones o enmendaduras</div></td>
                            </tr>';
    }

    $boletas_8_html .= '</table>';

    $boletas_8_html = str_replace('<th colspan="4" height="30">SUSUERTE <br />+569 5401 6770</th>', '<th colspan="4" height="30">SUSUERTE <br />+569 5401 6770<div class="valor">Valor de $1.000 pesos</div></th>', $boletas_8_html);

    // Agregar la tabla al PDF
    $pdf->writeHTML($boletas_8_html, true, false, false, false, '');
}

// -----------------------------------------------------------------------------

//Close and output PDF document
$pdf->Output('Boletas8.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+