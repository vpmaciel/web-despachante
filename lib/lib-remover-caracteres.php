<?php
ini_set('display_errors', TRUE);
error_reporting(E_ALL);

function REMOVER_caracteres(string $VALOR) : string {
    $REMOVER = array("\\", "'", "\"", "\r\n", "\n", "\r", "^", " AND ", " OR ");
    $RETORNO = str_replace($REMOVER, "", $VALOR);
    return trim($RETORNO);
}