<?php
header('Content-Type: text/html; charset=utf-8');
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

ob_start();
include 'servico-grafico.php';
$msg = ob_get_clean();

echo $msg;

echo close_div;

echo close_body;
	
echo close_html;    