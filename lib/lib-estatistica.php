<?php
function calcular_mediana($ARRAY) {
    // Primeiro, ordenamos o ARRAY em ordem crescente
    sort($ARRAY);

    $TAMANHO = count($ARRAY);
    $INDICE_CENTRAL = floor($TAMANHO / 2);

    // Verificamos se o TAMANHO do ARRAY é par ou ímpar
    if ($TAMANHO % 2 == 0) {
        // Se for par, a MEDIANA é a média dos dois VALORES centrais
        $MEDIANA = ($ARRAY[$INDICE_CENTRAL - 1] + $ARRAY[$INDICE_CENTRAL]) / 2;
    } else {
        // Se for ímpar, a MEDIANA é o VALOR central
        $MEDIANA = $ARRAY[$INDICE_CENTRAL];
    }

    return $MEDIANA;
}

// Exemplo de uso:
$VALORES = [2, 5, 7, 3, 1, 9, 4, 6, 8];
$MEDIANA = calcular_mediana($VALORES);
// echo "A MEDIANA é: " . $MEDIANA;

function calcular_moda($ARRAY) {
    // Conta a frequência de ocorrência de cada VALOR no ARRAY
    $FREQUENCIAS = ARRAY_count_values($ARRAY);

    // Encontra o VALOR com a maior frequência
    $MAIOR_FREQUENCIA = max($FREQUENCIAS);

    // Filtra os VALORES que possuem a maior frequência
    $MODA = ARRAY_keys($FREQUENCIAS, $MAIOR_FREQUENCIA);

    return $MODA;
}

// Exemplo de uso:
$VALORES = [2, 5, 7, 3, 2, 5, 4, 7, 7];
$MODA = calcular_moda($VALORES);

//echo "A MODA é: ";
foreach ($MODA as $VALOR) {
    // echo $VALOR . " ";
}


function calcular_media($ARRAY) {
    $SOMA = array_sum($ARRAY);
    $QUANTIDADE = count($ARRAY);

    if ($QUANTIDADE > 0) {
        $MEDIA = $SOMA / $QUANTIDADE;
        return $MEDIA;
    }

    return 0;
}

// Exemplo de uso:
$VALORES = [2, 5, 7, 3, 1, 9, 4, 6, 8];
$MEDIA = calcular_media($VALORES);
// echo "A média é: " . $MEDIA;


function calcular_desvio_padrao($ARRAY) {
    $MEDIA = calcular_media($ARRAY);
    $SOMA_DIFERENCAS_QUADRADO = 0;
    $QUANTIDADE = count($ARRAY);

    foreach ($ARRAY as $VALOR) {
        $DIFERENCA = $VALOR - $MEDIA;
        $SOMA_DIFERENCAS_QUADRADO += pow($DIFERENCA, 2);
    }

    if ($QUANTIDADE > 1) {
        $VARIANCIA = $SOMA_DIFERENCAS_QUADRADO / ($QUANTIDADE - 1);
        $DESVIO_PADRAO = sqrt($VARIANCIA);
        return $DESVIO_PADRAO;
    }

    return 0;
}

// Exemplo de uso:
$VALORES = [2, 5, 7, 3, 1, 9, 4, 6, 8];
$DESVIO_PADRAO = calcular_desvio_padrao($VALORES);
// echo "O desvio padrão é: " . $DESVIO_PADRAO;