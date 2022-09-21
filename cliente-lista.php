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

echo DIV_RIGHT;

$cliente = array();

$sql = '';

$cliente['CLIENTE_CPF_CNPJ'] = (isset ($_GET['CLIENTE_CPF_CNPJ'])) ? trim($_GET['CLIENTE_CPF_CNPJ']) : '';
$cliente['CLIENTE_NOME'] = (isset ($_GET['CLIENTE_NOME'])) ? trim($_GET['CLIENTE_NOME']) : '';
$cliente['CLIENTE_TELEFONE'] = (isset ($_GET['CLIENTE_CPF_CNPJ'])) ? trim($_GET['CLIENTE_TELEFONE']) : '';

// define how many results you want per page
$results_per_page = 2;

// find out the number of results stored in database
$number_of_results =  paginar_total("CLIENTE", $cliente); 


// determine number of total pages available
$number_of_pages = ceil($number_of_results/$results_per_page);

// determine which page number visitor is currently on
if (!isset($_GET['page'])) {
  $page = 1;
} else {
  $page = $_GET['page'];
}

// determine the sql LIMIT starting number for the results on the displaying page
$this_page_first_result = ($page-1)*$results_per_page;

// retrieve selected results from database and display them on page
$sql='SELECT * FROM CLIENTE LIMIT ' . $this_page_first_result . "," .$results_per_page;
$sql = paginar('CLIENTE', $cliente, $this_page_first_result, $results_per_page);
$stmt = $pdo->prepare($sql);
$stmt->execute();

echo TABLE_OPEN;

echo TR_OPEN . TH_OPEN . 'Cliente'  . TH_CLOSE . TR_CLOSE; 




while($registro = $stmt->fetch(PDO::FETCH_ASSOC))
{
    	
	$str = '';
	foreach ($registro as $k=>$v){ 
		$str .= "$k" . "=" . $v . "&";                        
	}
    
    echo TR_OPEN . TD_OPEN . LABEL_OPEN . 'CPF | CNPJ: ' . $registro['CLIENTE_CPF_CNPJ'] . LABEL_CLOSE . TD_CLOSE . TR_CLOSE; 
    echo TR_OPEN . TD_OPEN . LABEL_OPEN . 'Nome: ' . $registro['CLIENTE_NOME'] . LABEL_CLOSE . TD_CLOSE . TR_CLOSE; 
    echo TR_OPEN . TD_OPEN . LABEL_OPEN . 'Telefone: ' . $registro['CLIENTE_TELEFONE'] . LABEL_CLOSE . TD_CLOSE . TR_CLOSE; 	
    echo TR_OPEN . TD_OPEN . '<a href="cliente-cadastro.php?' . $str . '">Editar</a>' . TD_CLOSE . TR_CLOSE; 
    echo TR_OPEN . TD_OPEN . '<a href="cliente-deletar.php?' . $str . ' " onclick="return confirmar();">Excluir</a>' . TD_CLOSE . TR_CLOSE; 
    echo TR_OPEN . TD_OPEN . LABEL_OPEN . '&nbsp;' . LABEL_CLOSE . TD_CLOSE . TR_CLOSE; 
}
echo TABLE_CLOSE;

echo TABLE_CLOSE;


// display the links to the pages
for ($page=1;$page<=$number_of_pages;$page++) {
  echo '<a href="cliente-lista.php?page=' . $page . '">|' . $page. '|</a>';
}
echo DIV_CLOSE;

echo DIV_CLOSE;

echo BODY_CLOSE;
	
echo HTML_CLOSE;
