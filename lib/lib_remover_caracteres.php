<?php
ini_set('display_errors', TRUE);
error_reporting(E_ALL);

require_once '../sql/conexao.php';

function remover_caracteres(string $valor) : string {
    $remover = array("\\", "'", "\"", "\r\n", "\n", "\r");
    $retorno = str_replace($remover, "", $valor);
    return trim($retorno);
}