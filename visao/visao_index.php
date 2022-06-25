<?php
session_start();

setlocale(LC_ALL, 'pt_BR.utf8');

require_once '../lib/lib_biblioteca.php';

echo DOCTYPE;
echo HTML_OPEN;
echo HEAD_OPEN;
require_once 'visao_cabecalho.php';
echo HEAD_CLOSE;
echo BODY_OPEN;

echo DIV_MAIN_OPEN;

require_once 'visao_menu.php';
echo DIV_RIGHT;
echo H1_OPEN . 'Bit Curriculos' . H1_CLOSE;
echo date('Y-m-d')."<br>";
echo number_format("1000000")."<br>";
echo number_format("1000000",2)."<br>";
echo number_format("1000000",2,",",".");
$MSG = '<p align="justify">O BrCurriculos é um sistema para internet em recursos humanos, com foco em recrutamento on-line. Atualmente administramos a mais bem organizada base de currículos do país, 
	oferecendo às empresas o mais completo sistema de recrutamento on-line. Cadastre seu currículo para estar disponível para diversas empresas. Cadastre sua empresa para buscar profissionais.</p>';	
echo $MSG;

$MSG = '<p align="justify">O nosso site oferece serviços para profissionais serem localizados em todo o Brasil para divulgar, prestar serviços ou vender seus produtos,
			auxilía e prepara um currículo formatado, e você pode candidatar a várias vagas publicadas pelas empresas no site.</p>';	
echo $MSG;
#Exibimos o gráfico
//echo "<img src=view_grafico.php>";
echo DIV_CLOSE;

echo DIV_CLOSE;

echo BODY_CLOSE;
	
echo HTML_CLOSE;