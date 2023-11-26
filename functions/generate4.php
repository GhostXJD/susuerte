<?php

function generarLista10000() {
    $numeros = array();
    for ($i = 0; $i < 10000; $i++) {
        $numeros[] = rand(1000, 9999);
    }
    return $numeros;
}

function cuatroNumero($lista) {
    $boletas = array();
    for ($i = 0; $i < count($lista); $i += 4) {
        $boleta = array_slice($lista, $i, 4);
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
    return array_slice($boletas, 0, 2500);
}

$numeros_aleatorios = generarLista10000();

$boletas_cuatro_numeros = cuatroNumero($numeros_aleatorios);
echo "Boletas con 4 números de 4 cifras:\n";
for ($i = 0; $i < 5; $i++) {
    echo implode(", ", $boletas_cuatro_numeros[$i]) . "\n";
}
echo "El largo de 4 números es " . count($boletas_cuatro_numeros);

?>
