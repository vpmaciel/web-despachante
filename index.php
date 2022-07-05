<?php
session_start();

setlocale(LC_ALL, 'pt_BR.utf8');

require_once 'lib/lib_biblioteca.php';

echo DOCTYPE;

echo HTML_OPEN;

echo HEAD_OPEN;

require_once 'cabecalho.php';

echo HEAD_CLOSE;

echo BODY_OPEN;

echo DIV_MAIN_OPEN;

require_once 'menu.php';

echo DIV_RIGHT;

echo TABLE_OPEN;

echo TR_OPEN . TH_OPEN . 'Web Despachante'  . TH_CLOSE . TR_CLOSE; 

$MSG = '<p align="justify">O Web despachante é um sistema para internet desenvolvido para escritórios de despachantes. Seu escritório
está automatizado, controlando todos os serviços prestados.</p>';	

echo TR_OPEN . TD_OPEN. LABEL_OPEN . $MSG . LABEL_CLOSE . TD_CLOSE . TR_CLOSE; 

echo TABLE_CLOSE;

echo FORM_CLOSE;

echo DIV_CLOSE;

echo DIV_CLOSE;

echo BODY_CLOSE;
	
echo HTML_CLOSE;