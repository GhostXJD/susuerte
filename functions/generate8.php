<?php
session_start();
function generarLista10000() {
    $numeros = array();
    for ($i = 0; $i < 10000; $i++) {
        $numeros[] = rand(1000, 9999);
    }
    return $numeros;
}

function ochoNumero($lista) {
    $boletas = array();
    for ($i = 0; $i < count($lista); $i += 4) {
        $boleta = array_slice($lista, $i, 8);
        $boleta_sin_repetidos = array_unique($boleta);
        while (count($boleta) !== count($boleta_sin_repetidos)) {
            $boleta = array();
            for ($j = 0; $j < 4; $j++) {
                $boleta[] = rand(1000, 9999);
            }
            $boleta_sin_repetidos = array_unique($boleta);
        }
        $boletas[] = $boleta;
    }
    return array_slice($boletas, 0, 1250);
}

if (isset($_POST['generate_8'])) {
    $numeros_aleatorios = generarLista10000();
    $boletas_ocho_numeros = ochoNumero($numeros_aleatorios);

    $_SESSION['boletas_generadas_8'] = $boletas_ocho_numeros;

    header("Location: ../pages/index.php");
    exit();
}
?>
