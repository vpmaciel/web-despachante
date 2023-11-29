<?php

function formatarCpfCnpj($valor) {
    // Remove caracteres não numéricos
    $cleanValue = preg_replace('/[^0-9]/', '', $valor);

    // Verifica se é CPF (11 dígitos) ou CNPJ (14 dígitos)
    if (strlen($cleanValue) === 11) {
        return formatarCpf($cleanValue);
    } elseif (strlen($cleanValue) === 14) {
        return formatarCnpj($cleanValue);
    } else {        
        if(strlen($cleanValue) <= 11) {
            return "000.000.000-00";
        }else {
            return "00.000.000/0000-00";
        }     
    }
}

function formatarCpf($cpf) {
    // Aplica a formatação para CPF (###.###.###-##)
    return substr($cpf, 0, 3) . '.' . substr($cpf, 3, 3) . '.' . substr($cpf, 6, 3) . '-' . substr($cpf, 9, 2);
}

function formatarCnpj($cnpj) {
    // Aplica a formatação para CNPJ (##.###.###/####-##)
    return substr($cnpj, 0, 2) . '.' . substr($cnpj, 2, 3) . '.' . substr($cnpj, 5, 3) . '/' . substr($cnpj, 8, 4) . '-' . substr($cnpj, 12, 2);
}