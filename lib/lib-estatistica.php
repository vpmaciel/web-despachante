<?php
function calcularMediana($array) {
    // Primeiro, ordenamos o array em ordem crescente
    sort($array);

    $tamanho = count($array);
    $indiceCentral = floor($tamanho / 2);

    // Verificamos se o tamanho do array é par ou ímpar
    if ($tamanho % 2 == 0) {
        // Se for par, a mediana é a média dos dois valores centrais
        $mediana = ($array[$indiceCentral - 1] + $array[$indiceCentral]) / 2;
    } else {
        // Se for ímpar, a mediana é o valor central
        $mediana = $array[$indiceCentral];
    }

    return $mediana;
}

// Exemplo de uso:
$valores = [2, 5, 7, 3, 1, 9, 4, 6, 8];
$mediana = calcularMediana($valores);
echo "A mediana é: " . $mediana;

function calcularModa($array) {
    // Conta a frequência de ocorrência de cada valor no array
    $frequencias = array_count_values($array);

    // Encontra o valor com a maior frequência
    $maiorFrequencia = max($frequencias);

    // Filtra os valores que possuem a maior frequência
    $moda = array_keys($frequencias, $maiorFrequencia);

    return $moda;
}

// Exemplo de uso:
$valores = [2, 5, 7, 3, 2, 5, 4, 7, 7];
$moda = calcularModa($valores);

echo "A moda é: ";
foreach ($moda as $valor) {
    echo $valor . " ";
}


function calcularMedia($array) {
    $soma = array_sum($array);
    $quantidade = count($array);

    if ($quantidade > 0) {
        $media = $soma / $quantidade;
        return $media;
    }

    return 0;
}

// Exemplo de uso:
$valores = [2, 5, 7, 3, 1, 9, 4, 6, 8];
$media = calcularMedia($valores);
echo "A média é: " . $media;


function calcularDesvioPadrao($array) {
    $media = calcularMedia($array);
    $somaDiferencasQuadrado = 0;
    $quantidade = count($array);

    foreach ($array as $valor) {
        $diferenca = $valor - $media;
        $somaDiferencasQuadrado += pow($diferenca, 2);
    }

    if ($quantidade > 1) {
        $variancia = $somaDiferencasQuadrado / ($quantidade - 1);
        $desvioPadrao = sqrt($variancia);
        return $desvioPadrao;
    }

    return 0;
}

// Exemplo de uso:
$valores = [2, 5, 7, 3, 1, 9, 4, 6, 8];
$desvioPadrao = calcularDesvioPadrao($valores);
echo "O desvio padrão é: " . $desvioPadrao;