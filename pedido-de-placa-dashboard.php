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

$msg = require 'pedido-de-placa-grafico.php';
echo open_tr . open_td. $msg  . close_td . close_tr;

echo close_table;

echo close_form;

echo close_div;

echo close_body;
	
echo close_html;    