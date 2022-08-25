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

require_once 'titulo.php';

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

$MSG = '<p>O Web despachante é um sistema para internet desenvolvido para escritórios de despachantes. Seu escritório está automatizado, controlando todos os serviços prestados.</p>';	

echo TR_OPEN . TD_OPEN. LABEL_OPEN . $MSG . LABEL_CLOSE . TD_CLOSE . TR_CLOSE; 

$MSG = 'MTI &copy;';

echo TR_OPEN . TH_OPEN . $MSG . TH_CLOSE . TR_CLOSE; 

$MSG = '<p>Missão: Oferecer serviços e produtos de qualidade, de venda de aplicativos e desenvolvimento e administração de banco de dados  por meio de soluções criativas, inovadoras e profissionais qualificados contribuindo para o sucesso e satisfação do cliente.</p>';

echo TR_OPEN . TD_OPEN. LABEL_OPEN . $MSG . LABEL_CLOSE . TD_CLOSE . TR_CLOSE; 

$MSG = '<p>Visão: Ser referência no desenvolvimento de soluções inteligentes em tecnologia da informação, reconhecida pela qualidade e resultados dos serviços prestados.</p>';

echo TR_OPEN . TD_OPEN. LABEL_OPEN . $MSG . LABEL_CLOSE . TD_CLOSE . TR_CLOSE; 

$MSG = '<p>Valores:	Inovação - Investir continuamente em novas tecnologias e na capacitação de seus profissionais; Compromisso com o cliente - Foco na excelência do atendimento ao cliente, cumprimento integral dos prazos e dos objetivos estabelecidos; Ética - Agir profissionalmente, respeitando todas as partes envolvidas nos processos; Qualidade - Assegurar a qualidade de todos os processos, buscando sempre uma melhoria contínua para garantir os melhores serviços e produtos aos clientes.</p>';

echo TR_OPEN . TD_OPEN. LABEL_OPEN . $MSG . LABEL_CLOSE . TD_CLOSE . TR_CLOSE; 

$MSG = '<ul><li>Desenvolvedor: Vicente Paulo Maciel</li></ul>';

echo TR_OPEN . TD_OPEN. LABEL_OPEN . $MSG . LABEL_CLOSE . TD_CLOSE . TR_CLOSE; 

$MSG = '<ul><li>E-mail: vpmaciel@gmail.com</li></ul>';

echo TR_OPEN . TD_OPEN. LABEL_OPEN . $MSG . LABEL_CLOSE . TD_CLOSE . TR_CLOSE; 

$MSG = '<ul><li>Telefone: (31) 9 8285 7372</li></ul>';

echo TR_OPEN . TD_OPEN. LABEL_OPEN . $MSG . LABEL_CLOSE . TD_CLOSE . TR_CLOSE; 

echo TABLE_CLOSE;

echo FORM_CLOSE;
require 'grafico.php';

echo DIV_CLOSE;

echo DIV_CLOSE;

echo BODY_CLOSE;
	
echo HTML_CLOSE;    