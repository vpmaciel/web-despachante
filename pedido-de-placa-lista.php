<?php


require_once 'lib/lib-sessao.php';
require_once 'lib/lib-biblioteca.php';

setlocale(LC_ALL, 'pt_BR.utf8');

echo doctype;

echo open_html;

echo open_head;

require_once 'cabecalho.php';

echo close_head;

echo open_body;

echo open_div;

require_once 'menu.php';

echo open_h1 . 'Pedido de Placa'  . close_h1; 

require_once 'pedido-de-placa-menu.php';

$SQL = '';

$registro['pedido_de_placa_placa_veiculo'] = (isset ($_POST['pedido_de_placa_placa_veiculo'])) ? trim($_POST['pedido_de_placa_placa_veiculo']) : '';
$registro['pedido_de_placa_quantidade'] = (isset ($_POST['pedido_de_placa_quantidade'])) ? trim($_POST['pedido_de_placa_quantidade']) : '';
$registro['pedido_de_placa_renavam'] = (isset ($_POST['pedido_de_placa_renavam'])) ? trim($_POST['pedido_de_placa_renavam']) : '';
$registro['pedido_de_placa_cpf_cnpj_proprietario'] = $_POST['pedido_de_placa_cpf_cnpj_proprietario'];
$registro['pedido_de_placa_cor_placa'] = (isset ($_POST['pedido_de_placa_cor_placa'])) ? trim($_POST['pedido_de_placa_cor_placa']) : '';
$registro['pedido_de_placa_tipo_placa'] = (isset ($_POST['pedido_de_placa_tipo_placa'])) ? trim($_POST['pedido_de_placa_tipo_placa']) : '';

if($registro['pedido_de_placa_placa_veiculo'] == '') {
  unset($registro['pedido_de_placa_placa_veiculo']);
}

if($registro['pedido_de_placa_quantidade'] == '') {
  unset($registro['pedido_de_placa_quantidade']);
}

if($registro['pedido_de_placa_renavam'] == '') {
  unset($registro['pedido_de_placa_renavam']);
}

if($registro['pedido_de_placa_cpf_cnpj_proprietario'] == '') {
  unset($registro['pedido_de_placa_cpf_cnpj_proprietario']);
}

if($registro['pedido_de_placa_cor_placa'] == '') {
  unset($registro['pedido_de_placa_cor_placa']);
}

if($registro['pedido_de_placa_tipo_placa'] == '') {
  unset($registro['pedido_de_placa_tipo_placa']);
}

// define how many results you want per page
$results_per_page = 10000;

// find out the number of results stored in database
$number_of_results =  paginar_total("pedido_de_placa", $registro); 


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
$SQL='SELECT * FROM pedido_de_placa LIMIT ' . $this_page_first_result . "," .$results_per_page;
$SQL = paginar('pedido_de_placa', $registro, $this_page_first_result, $results_per_page);
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
    
    echo open_tr . open_td . open_label . 'Identificador: ' . $linha['pedido_de_placa_id'] . close_lable . close_td . close_tr; 
    echo open_tr . open_td . open_label . 'Data: ' . date('d-m-Y', strtotime($linha['pedido_de_placa_data'])) . close_lable . close_td . close_tr; 
    echo open_tr . open_td . open_label . 'Placa do veículo: ' . $linha['pedido_de_placa_placa_veiculo'] . close_lable . close_td . close_tr; 
    echo open_tr . open_td . open_label . 'Quantidade: ' . $linha['pedido_de_placa_quantidade'] . close_lable . close_td . close_tr; 
    echo open_tr . open_td . open_label . 'RENAVAM: ' . $linha['pedido_de_placa_renavam'] . close_lable . close_td . close_tr; 
    echo open_tr . open_td . open_label . 'CPF | CNPJ do proprietário: ' . $linha['pedido_de_placa_cpf_cnpj_proprietario'] . close_lable . close_td . close_tr;     
    echo open_tr . open_td . open_label . 'Cor: ' . $linha['pedido_de_placa_cor_placa'] . close_lable . close_td . close_tr; 
    echo open_tr . open_td . open_label . 'Tipo de placa: ' . $linha['pedido_de_placa_tipo_placa'] . close_lable . close_td . close_tr;     
    echo open_tr . open_td . '<a href="pedido-de-placa-cadastro.php?editar=true&' . 'pedido_de_placa_id=' . $linha['pedido_de_placa_id'] . '">Editar</a> | '; 
        echo '<a href="pedido-de-placa-deletar.php?' . 'pedido_de_placa_id=' . $linha['pedido_de_placa_id'] . ' " onclick="return confirmarExcluir();">Excluir</a>' . close_td . close_tr; 
    echo open_tr . open_td . open_label . '&nbsp;' . close_lable . close_td . close_tr; 
}
echo close_table;

echo close_form;

// display the links to the pages
for ($page=1;$page<=$number_of_pages;$page++) {
  echo '<a href="pedido-de-placa-lista.php?page=' . $page . '">|' . $page . '|</a>';
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
