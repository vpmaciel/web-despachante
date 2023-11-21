<?php
function formatarNumero($valor) {
    // Remove caracteres não numéricos
    $valorNumerico = preg_replace('/[^0-9,.]/', '', $valor);

    // Utiliza number_format para garantir a vírgula como separador decimal
    $valorFormatado = number_format((float) $valorNumerico, 2, ',', '');

    return $valorFormatado;
}