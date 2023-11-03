<?php
session_start();

setlocale(LC_ALL, 'pt_BR.utf8');

require_once 'lib/lib-biblioteca.php';

echo doctype;
echo html_open;
echo head_open;

require_once 'cabecalho.php';

echo head_close;

echo body_open;

echo div_main_open;

require_once 'menu.php';

echo table_open;

$input = '<input type="hidden">';
echo tr_open . td_open. $input . td_close . tr_close;

echo table_close;

echo '<span class="sucesso">' . 'Operação realizada com sucesso !'. '</span>';

if (isset($_GET['msg'])) {
    echo '<br><br><span class="sucesso">' . $_GET['msg']. '</span>';
}

$MSG = '<script>setTimeout(function() { window.history.back(); }, 180000);</script>';
echo $MSG;

echo div_close;

echo body_close;
	
echo htm_close;