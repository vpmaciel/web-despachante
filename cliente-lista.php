<?php
session_start();

require_once 'lib/lib-sessao.php';
require_once 'lib/lib-biblioteca.php';

setlocale(LC_ALL, 'pt_BR.utf8');

echo doctype;

echo html_open;

echo head_open;

require_once 'cabecalho.php';
echo '<script src="cliente-cadastro.ts"></script>';

echo head_close;

echo body_open;

echo div_main_open;

require_once 'menu.php';

$registro = array();

$SQL = '';

$registro['cliente_cpf_cnpj'] = (isset ($_GET['cliente_cpf_cnpj'])) ? trim($_GET['cliente_cpf_cnpj']) : '';
$registro['cliente_nome_completo'] = (isset ($_GET['cliente_nome_completo'])) ? trim($_GET['cliente_nome_completo']) : '';
$registro['cliente_telefone'] = (isset ($_GET['cliente_cpf_cnpj'])) ? trim($_GET['cliente_telefone']) : '';
$registro['cliente_email'] = (isset ($_GET['cliente_email'])) ? trim($_GET['cliente_email']) : '';

// define how many results you want per page
$RESULTS_PER_PAGE = 10000;

// find out the number of results stored in database
$NUMBER_OF_RESULTS =  paginar_total("CLIENTE", $registro); 


// determine number of total pages available
$NUMBER_OF_PAGES = ceil($NUMBER_OF_RESULTS/$RESULTS_PER_PAGE);

// determine which page number visitor is currently on
if (!isset($_GET['page'])) {
  $PAGE = 1;
} else {
  $PAGE = $_GET['page'];
}

// determine the sql LIMIT starting number for the results on the displaying page
$THIS_PAGE_FIRST_RESULT = ($PAGE-1)*$RESULTS_PER_PAGE;

// retrieve selected results from database and display them on page
$SQL='SELECT * FROM CLIENTE LIMIT ' . $THIS_PAGE_FIRST_RESULT . "," .$RESULTS_PER_PAGE;
$SQL = paginar('CLIENTE', $registro, $THIS_PAGE_FIRST_RESULT, $RESULTS_PER_PAGE);
$stmt = $pdo->prepare($SQL);
$stmt->execute();

echo table_open;

echo tr_open . th_open . 'Cliente'  . th_close . tr_close; 

while($registro = $stmt->fetch(PDO::FETCH_ASSOC))
{
    	
	$STRING = '';
	foreach ($registro as $chave=>$valor){ 
		$STRING .= "$chave" . "=" . $valor . "&";                        
	}
    echo tr_open . td_open . label_open . 'IDENTIFICADOR: ' . $registro['cliente_id'] . lable_close . td_close . tr_close; 
    echo tr_open . td_open . label_open . 'CPF | CNPJ: ' . $registro['cliente_cpf_cnpj'] . lable_close . td_close . tr_close; 
    echo tr_open . td_open . label_open . 'NOME: ' . $registro['cliente_nome_completo'] . lable_close . td_close . tr_close;     
    echo tr_open . td_open . label_open . 'E-MAIL: ' . $registro['cliente_email'] . lable_close . td_close . tr_close;         
    echo td_close . '<a href="cliente-cadastro.php?EDITAR=true&' . $STRING . '">Editar</a> | '; 
    echo '<a href="cliente-deletar.php?' . $STRING . ' " onclick="return confirmar();">Excluir</a>' . td_close . tr_close; 
    echo tr_open . td_open . label_open . '&nbsp;' . lable_close . td_close . tr_close; 
}
echo table_close;

echo table_close;


// display the links to the pages
for ($PAGE=1;$PAGE<=$NUMBER_OF_PAGES;$PAGE++) {
  echo '<a href="cliente-lista.php?page=' . $PAGE . '">|' . $PAGE . '|</a>';
}
echo div_close;

echo body_close;
	
echo htm_close;
