<?php
ini_set('display_errors', TRUE);
error_reporting(E_ALL);

function remover_caracteres(string $valor) : string {
    $remover = array("\\", "'", "\"", "\r\n", "\n", "\r", "^", " AND ", " OR ");
    $retorno = str_replace($remover, "", $valor);
    return trim($retorno);
}