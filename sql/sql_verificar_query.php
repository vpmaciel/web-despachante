<?php
ini_set('display_errors', TRUE);
error_reporting(E_ALL);

require_once '../sql/conexao.php';

function verificarSQL(string $valor) : bool {
    if (strstr(mb_strtolower( $valor, 'UTF-8'), ' AND ') !== false || strstr(mb_strtolower( $valor, 'UTF-8'), ' OR ') !== false|| strstr(mb_strtolower( $valor, 'UTF-8'), ' OR ') !== false || strstr(mb_strtolower( $valor, 'UTF-8'), 'UPDATE') !== false || strstr(mb_strtolower( $valor, 'UTF-8'), 'DELETE') !== false || strstr(mb_strtolower( $valor, 'UTF-8'), 'FROM') !== false) {
        return TRUE;
    }
    return FALSE;
}