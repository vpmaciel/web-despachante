<?php
session_start();

setlocale(LC_ALL, 'pt_BR.utf8');

require_once 'lib/lib-biblioteca.php';

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

$details["Value"] = "1.5";
$n = number_format($details["Value"], 2, ",", ".");
$details["Value"] = "1,5";
$e = number_format(str_replace(",",".",str_replace(".","",$details["Value"])), 2, '.', '');



$var = '20/04/2012';
$date = str_replace('/', '-', $var);
//echo date('Y-m-d', strtotime($date));
//echo '<br>';
$date = '2020-04-20';
//echo date('d-m-Y', strtotime($date));

echo TR_OPEN . TH_OPEN . 'Web Despachante'  . TH_CLOSE . TR_CLOSE; 

//echo TR_OPEN . TD_OPEN. LABEL_OPEN . $n . LABEL_CLOSE . TD_CLOSE . TR_CLOSE; 
//echo TR_OPEN . TD_OPEN. LABEL_OPEN . $e . LABEL_CLOSE . TD_CLOSE . TR_CLOSE; 

$MSG = '<p>O Web despachante é um sistema para rede local e intranet desenvolvido para escritórios de despachantes. Seu negócio está automatizado, controlando todos os serviços prestados.</p>';	
//$MSG = require 'grafico.php';
echo TR_OPEN . TD_OPEN. $MSG  . TD_CLOSE . TR_CLOSE;

echo TABLE_CLOSE;

echo '<br>';

$MSG = 'MTI &copy;<br>';

echo $MSG; 

$MSG = 'Desenvolvedor<br>';

echo $MSG; 

$MSG = 'Vicente Paulo Maciel<br>';

echo $MSG; 

$MSG = 'vpmaciel@gmail.com<br>';

echo $MSG; 

$MSG = '(31) 9 8285 7372';

echo $MSG; 


echo FORM_CLOSE;

echo DIV_CLOSE;

echo DIV_CLOSE;

echo BODY_CLOSE;
	
echo HTML_CLOSE;    