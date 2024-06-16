<?php


setlocale(LC_ALL, 'pt_BR.utf8');

require_once 'lib/lib-biblioteca.php';

echo doctype;
echo open_html;
echo open_head;

require_once 'cabecalho.php';

echo close_head;

echo open_body;

echo open_div_main;

require_once 'menu.php';

echo open_table;

$input = '<input type="hidden">';
echo open_tr . open_td. $input . close_td . close_tr;

echo close_table;

echo '<span class="sucesso">' . 'Operação realizada com sucesso !'. '</span>';

if (isset($_GET['msg'])) {
    echo '<br><br><span class="sucesso">' . $_GET['msg']. '</span>';
}

$msg = '<script> function goBack() {window.history.back();}</script>';
echo $msg;

echo '<br><br><a href="#" onclick="goBack();">Voltar à Página Anterior</a>';

echo close_div;

echo close_body;
	
echo close_html;