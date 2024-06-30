<?php


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

echo open_div;

require_once 'menu.php';

$registro = array();

$SQL = '';

$registro['cliente_cpf_cnpj'] = $_POST['cliente_cpf_cnpj'];
$registro['cliente_nome_completo'] = (isset ($_POST['cliente_nome_completo'])) ? trim($_POST['cliente_nome_completo']) : '';
$registro['cliente_telefone'] = (isset ($_POST['cliente_cpf_cnpj'])) ? trim($_POST['cliente_telefone']) : '';
$registro['cliente_email'] = (isset ($_POST['cliente_email'])) ? trim($_POST['cliente_email']) : '';


if($registro['cliente_cpf_cnpj'] == '') {
  unset($registro['cliente_cpf_cnpj']);
}

if($registro['cliente_nome_completo'] == '') {
  unset($registro['cliente_nome_completo']);
}

if($registro['cliente_telefone'] == '') {
  unset($registro['cliente_telefone']);
}

if($registro['cliente_email'] == '') {
  unset($registro['cliente_email']);
}

//var_dump($registro);

// define how many results you want per page
$results_per_page = 10000;

// find out the number of results stored in database
$number_of_results =  paginar_total("CLIENTE", $registro); 


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
$SQL = paginar('cliente', $registro, $this_page_first_result, $results_per_page);
$stmt = $pdo->prepare($SQL);
$stmt->execute();

$form_open = '<form action="#" method="POST">';

echo $form_open;

echo open_table;

echo open_tr . open_th . 'Cliente'  . close_th . close_tr; 

while($linha = $stmt->fetch(PDO::FETCH_ASSOC))
{
    	
	$string= '';
	foreach ($linha as $chave=>$valor){ 
		$string.= "$chave" . "=" . $valor . "&";                        
	}
    echo open_tr . open_td . open_label . 'Identificador: ' . $linha['cliente_id'] . close_lable . close_td . close_tr; 
    echo open_tr . open_td . open_label . 'CPF | CNPJ: ' . $linha['cliente_cpf_cnpj'] . close_lable . close_td . close_tr; 
    echo open_tr . open_td . open_label . 'Nome: ' . $linha['cliente_nome_completo'] . close_lable . close_td . close_tr;     
    echo open_tr . open_td . open_label . 'E-Mail: ' . $linha['cliente_email'] . close_lable . close_td . close_tr;         
    echo open_tr . open_td . '<a href="cliente-cadastro.php?editar=true&' .'cliente_id='. $linha['cliente_id']. '">Editar</a> | '; 
    echo '<a href="cliente-deletar.php?' . $string. ' " onclick="return confirmarExcluir();">Excluir</a>' . close_td . close_tr; 
    echo open_tr . open_td . open_label . '&nbsp;' . close_lable . close_td . close_tr; 
}
echo close_table;

echo close_form;

// display the links to the pages
for ($page=1;$page<=$number_of_pages;$page++) {
  echo '<a href="cliente-lista.php?page=' . $page . '">|' . $page . '|</a>';
}

if ($number_of_results == 0) {
  $msg = '<script> function goBack() {window.history.back();}</script>';
  echo $msg;

  echo '<br>Nenhum registro encontrado !';
  
  echo '<br><br><a href="#" onclick="goBack();">Voltar à página anterior</a>';
}


echo close_div;

echo close_body;
	
echo close_html;
