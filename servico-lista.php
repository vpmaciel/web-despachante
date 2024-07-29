<?php


require_once 'lib/lib-sessao.php';
require_once 'lib/lib-biblioteca.php';

setlocale(LC_ALL, 'pt_BR.utf8');

echo doctype;

echo open_html;

echo open_head;

require_once 'cabecalho.php';
echo '<script src="servico-cadastro.ts"></script>';

echo close_head;

echo open_body;

echo open_div;

require_once 'menu.php';

echo open_h1 . 'Serviço'  . close_h1; 

require_once 'servico-menu.php';

$registro = array();

$SQL = '';

$registro['servico_placa_veiculo'] = (isset ($_POST['servico_placa_veiculo'])) ? trim($_POST['servico_placa_veiculo']) : '';
$registro['servico_valor'] = (isset ($_POST['servico_valor'])) ? str_replace(',', '.', preg_replace('/[^0-9,]/', '', trim($_POST['servico_valor']))) : '';
$registro['servico_descricao'] = (isset ($_POST['servico_descricao'])) ? trim($_POST['servico_descricao']) : '';
$registro['servico_cpf_cnpj_cliente'] = $_POST['servico_cpf_cnpj_cliente'];
$registro['servico_nome_cliente'] = (isset ($_POST['servico_nome_cliente'])) ? trim($_POST['servico_nome_cliente']) : '';
$registro['servico_telefone_cliente'] = (isset ($_POST['servico_telefone_cliente'])) ? trim($_POST['servico_telefone_cliente']) : '';

if($registro['servico_placa_veiculo'] == '') {
  unset($registro['servico_placa_veiculo']);
}

if($registro['servico_valor'] == '') {
  unset($registro['servico_valor']);
}

if($registro['servico_descricao'] == '') {
  unset($registro['servico_descricao']);
}

if($registro['servico_cpf_cnpj_cliente'] == '') {
  unset($registro['servico_cpf_cnpj_cliente']);
}

if($registro['servico_nome_cliente'] == '') {
  unset($registro['servico_nome_cliente']);
}

if($registro['servico_telefone_cliente'] == '') {
  unset($registro['servico_telefone_cliente']);
}

// define how many results you want per page
$results_per_page = 10000;

// find out the number of results stored in database
$number_of_results =  paginar_total("servico", $registro); 


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
$SQL = paginar('servico', $registro, $this_page_first_result, $results_per_page);
$stmt = $pdo->prepare($SQL);
$stmt->execute();

$form_open = '<form action="#" method="POST">';

echo $form_open;

echo open_table;

while($linha = $stmt->fetch(PDO::FETCH_ASSOC))
{
    	
	$string= '';
	foreach ($linha as $chave=>$valor){ 
		$string.= "$chave" . "=" . $valor . "&";                        
	}
    echo open_tr . open_td . open_label . 'Identificador: ' . $linha['servico_id'] . close_lable . close_td . close_tr; 
    echo open_tr . open_td . open_label . 'Data: ' . date('d-m-Y', strtotime($linha['servico_data'])) . close_lable . close_td . close_tr; 
    echo open_tr . open_td . open_label . 'Placa do veículo: ' . $linha['servico_placa_veiculo'] . close_lable . close_td . close_tr; 
    echo open_tr . open_td . open_label . 'Valor: ' . formatarNumero($linha['servico_valor']) . close_lable . close_td . close_tr; 
    echo open_tr . open_td . open_label . 'Descrição: ' . $linha['servico_descricao'] . close_lable . close_td . close_tr; 
    echo open_tr . open_td . open_label . 'CPF | CNPJ do cliente: ' . $linha['servico_cpf_cnpj_cliente'] . close_lable . close_td . close_tr;     
    echo open_tr . open_td . open_label . 'Telefone do cliente: ' . $linha['servico_telefone_cliente'] . close_lable . close_td . close_tr;     
    echo open_tr . open_td . '<a href="servico-cadastro.php?editar=true&' . 'servico_id='. $linha['servico_id']. '">Editar</a> | '; 
        echo '<a href="servico-deletar.php?' . 'servico_id='. $linha['servico_id']. ' " onclick="return confirmarExcluir();">Excluir</a>' . close_td . close_tr; 
    echo open_tr . open_td . open_label . '&nbsp;' . close_lable . close_td . close_tr; 
}

echo close_table;

echo close_form;

// display the links to the pages
for ($page=1;$page<=$number_of_pages;$page++) {
  echo '<a href="servico-lista.php?page=' . $page . '">|' . $page . '|</a>';
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
