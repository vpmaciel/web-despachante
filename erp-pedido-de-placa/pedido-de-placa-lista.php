<?php


require_once '../lib/lib-sessao.php';
require_once '../lib/lib-biblioteca.php';

setlocale(LC_ALL, 'pt_BR.utf8');

echo doctype;

echo open_html;

echo open_head;

require_once '../cabecalho.php';

echo close_head;

echo open_body;

echo open_div;

require_once '../menu.php';

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

echo open_table_2;

echo open_tr . open_th_2 . 'PLACA ' . close_th . open_th_2 . 'QUANTIDADE' . close_th . open_th_2 . '' . close_th  . close_tr; 

while($linha = $stmt->fetch(PDO::FETCH_ASSOC))
{
    	
	$string= '';
	foreach ($linha as $chave=>$valor){ 
		$string.= "$chave" . "=" . $valor . "&";                        
	}
  echo open_tr . open_td_2 . $linha['pedido_de_placa_placa_veiculo'] . close_td; 
  echo open_td_2 . $linha['pedido_de_placa_quantidade'] . close_td; 
  echo open_td_3 . '<a href="pedido-de-placa-cadastro.php?editar=true&' . 'pedido_de_placa_id=' . $linha['pedido_de_placa_id'] . '">Editar</a> | '; 
  echo '<a href="pedido-de-placa-deletar.php?' . 'pedido_de_placa_id=' . $linha['pedido_de_placa_id'] . ' " onclick="return confirmarExcluir();">Excluir</a>' . close_td; 
  echo open_tr . open_td_2 .'&nbsp;' . close_td. open_td_2 . '&nbsp;' . close_td. open_td_2 . '&nbsp;' . close_td . close_tr; 
}
echo close_table;

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

require_once '../rodape.php';

echo close_body;
	
echo close_html;
