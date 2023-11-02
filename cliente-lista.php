<?php
session_start();

require_once 'lib/lib-sessao.php';
require_once 'lib/lib-biblioteca.php';

setlocale(LC_ALL, 'pt_BR.utf8');

echo DOCTYPE;

echo HTML_OPEN;

echo HEAD_OPEN;

require_once 'cabecalho.php';
echo '<script src="cliente-cadastro.ts"></script>';

echo HEAD_CLOSE;

echo BODY_OPEN;

echo DIV_MAIN_OPEN;

require_once 'menu.php';

$CLIENTE = array();

$SQL = '';

$CLIENTE['CLIENTE_CPF_CNPJ'] = (isset ($_GET['CLIENTE_CPF_CNPJ'])) ? trim($_GET['CLIENTE_CPF_CNPJ']) : '';
$CLIENTE['CLIENTE_NOME_COMPLETO'] = (isset ($_GET['CLIENTE_NOME_COMPLETO'])) ? trim($_GET['CLIENTE_NOME_COMPLETO']) : '';
$CLIENTE['CLIENTE_TELEFONE'] = (isset ($_GET['CLIENTE_CPF_CNPJ'])) ? trim($_GET['CLIENTE_TELEFONE']) : '';
$CLIENTE['CLIENTE_EMAIL'] = (isset ($_GET['CLIENTE_EMAIL'])) ? trim($_GET['CLIENTE_EMAIL']) : '';

// define how many results you want per page
$RESULTS_PER_PAGE = 10000;

// find out the number of results stored in database
$NUMBER_OF_RESULTS =  paginar_total("CLIENTE", $CLIENTE); 


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
$SQL = paginar('CLIENTE', $CLIENTE, $THIS_PAGE_FIRST_RESULT, $RESULTS_PER_PAGE);
$STMT = $PDO->prepare($SQL);
$STMT->execute();

echo TABLE_OPEN;

echo TR_OPEN . TH_OPEN . 'Cliente'  . TH_CLOSE . TR_CLOSE; 

while($REGISTRO = $STMT->fetch(PDO::FETCH_ASSOC))
{
    	
	$STRING = '';
	foreach ($REGISTRO as $CHAVE=>$VALOR){ 
		$STRING .= "$CHAVE" . "=" . $VALOR . "&";                        
	}
    echo TR_OPEN . TD_OPEN . LABEL_OPEN . 'IDENTIFICADOR: ' . $REGISTRO['CLIENTE_ID'] . LABEL_CLOSE . TD_CLOSE . TR_CLOSE; 
    echo TR_OPEN . TD_OPEN . LABEL_OPEN . 'CPF | CNPJ: ' . $REGISTRO['CLIENTE_CPF_CNPJ'] . LABEL_CLOSE . TD_CLOSE . TR_CLOSE; 
    echo TR_OPEN . TD_OPEN . LABEL_OPEN . 'NOME: ' . $REGISTRO['CLIENTE_NOME_COMPLETO'] . LABEL_CLOSE . TD_CLOSE . TR_CLOSE;     
    echo TR_OPEN . TD_OPEN . LABEL_OPEN . 'E-MAIL: ' . $REGISTRO['CLIENTE_EMAIL'] . LABEL_CLOSE . TD_CLOSE . TR_CLOSE;         
    echo TD_OPEN . '<a href="cliente-cadastro.php?EDITAR=TRUE&' . $STRING . '">Editar</a> | '; 
    echo '<a href="cliente-deletar.php?' . $STRING . ' " onclick="return confirmar();">Excluir</a>' . TD_CLOSE . TR_CLOSE; 
    echo TR_OPEN . TD_OPEN . LABEL_OPEN . '&nbsp;' . LABEL_CLOSE . TD_CLOSE . TR_CLOSE; 
}
echo TABLE_CLOSE;

echo TABLE_CLOSE;


// display the links to the pages
for ($PAGE=1;$PAGE<=$NUMBER_OF_PAGES;$PAGE++) {
  echo '<a href="cliente-lista.php?page=' . $PAGE . '">|' . $PAGE . '|</a>';
}
echo DIV_CLOSE;

echo BODY_CLOSE;
	
echo HTML_CLOSE;
