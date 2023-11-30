<?php
session_start();

function generarLista10000() {
    $numeros = range(0, 9999);
    shuffle($numeros);
    $numeros_con_ceros = array_map(function ($numero) {
        return str_pad($numero, 4, '0', STR_PAD_LEFT);
    }, $numeros);
    return $numeros_con_ceros;
}

function dividirEnGrupos($lista) {
    $grupos = array_chunk($lista, 8);
    return $grupos;
}

function eliminarRepetidos($grupos) {
    $boletas = array();
    $numeros_utilizados = array();

    foreach ($grupos as $grupo) {
        $nuevo_grupo = array();
        foreach ($grupo as $numero) {
            if (!in_array($numero, $numeros_utilizados)) {
                $nuevo_grupo[] = $numero;
                $numeros_utilizados[] = $numero;
            }
        }
        while (count($nuevo_grupo) < 4) {
            $numero_faltante = array_diff(range(0, 9999), $numeros_utilizados);
            $numero_seleccionado = array_shift($numero_faltante);
            $nuevo_grupo[] = $numero_seleccionado;
            $numeros_utilizados[] = $numero_seleccionado;
        }

        $boletas[] = $nuevo_grupo;
    }

    return $boletas;
}

$lista = generarLista10000();
$grupos = dividirEnGrupos($lista);
$boletas_sin_repetidos = eliminarRepetidos($grupos);

$boletas_finales = array_slice($boletas_sin_repetidos, 0, 2500);


if (isset($_POST['generate_8'])) {

    $_SESSION['boletas_generadas_8'] = $boletas_finales;

    header("Location: ../pdf8.php");
    exit();
}

?>
