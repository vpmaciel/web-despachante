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

$MSG = require 'pedido-de-placa-grafico.php';
echo tr_open . td_open. $MSG  . td_close . tr_close;

echo table_close;

echo form_close;

echo div_close;

echo body_close;
	
echo htm_close;    