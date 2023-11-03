<?php
session_start();

require_once 'lib/lib-sessao.php';
require_once 'lib/lib-biblioteca.php';

setlocale(LC_ALL, 'pt_BR.utf8');

echo doctype;

echo open_html;

echo open_head;

require_once 'cabecalho.php';
echo '<script src="cliente-cadastro.ts"></script>';

echo close_head;

echo open_body;

echo open_div_main;

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

echo open_table;

echo open_tr . open_th . 'Cliente'  . close_th . close_tr; 

while($registro = $stmt->fetch(PDO::FETCH_ASSOC))
{
    	
	$STRING = '';
	foreach ($registro as $chave=>$valor){ 
		$STRING .= "$chave" . "=" . $valor . "&";                        
	}
    echo open_tr . open_td . open_label . 'IDENTIFICADOR: ' . $registro['cliente_id'] . close_lable . close_td . close_tr; 
    echo open_tr . open_td . open_label . 'CPF | CNPJ: ' . $registro['cliente_cpf_cnpj'] . close_lable . close_td . close_tr; 
    echo open_tr . open_td . open_label . 'NOME: ' . $registro['cliente_nome_completo'] . close_lable . close_td . close_tr;     
    echo open_tr . open_td . open_label . 'E-MAIL: ' . $registro['cliente_email'] . close_lable . close_td . close_tr;         
    echo open_td . '<a href="cliente-cadastro.php?EDITAR=true&' . $STRING . '">Editar</a> | '; 
    echo '<a href="cliente-deletar.php?' . $STRING . ' " onclick="return confirmar();">Excluir</a>' . close_td . close_tr; 
    echo open_tr . open_td . open_label . '&nbsp;' . close_lable . close_td . close_tr; 
}
echo close_table;

echo close_table;


// display the links to the pages
for ($PAGE=1;$PAGE<=$NUMBER_OF_PAGES;$PAGE++) {
  echo '<a href="cliente-lista.php?page=' . $PAGE . '">|' . $PAGE . '|</a>';
}
echo close_div;

echo close_body;
	
echo close_html;
