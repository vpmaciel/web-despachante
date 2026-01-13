<?php


require_once '../lib/lib-sessao.php';
require_once '../lib/lib-biblioteca.php';



echo doctype;

echo open_html;

echo open_head;

require_once '../cabecalho.php';

echo close_head;

echo open_body;

echo open_div;

require_once '../menu.php';

require_once 'veiculo-menu.php';

$registro = array();

$SQL = '';

$registro['veiculo_placa'] = (isset($_POST['veiculo_placa'])) ? trim($_POST['veiculo_placa']) : '';
$registro['veiculo_cpf_cnpj_proprietario'] = (isset($_POST['veiculo_cpf_cnpj_proprietario'])) ? trim($_POST['veiculo_cpf_cnpj_proprietario']) : '';
$registro['veiculo_nome_proprietario'] = (isset($_POST['veiculo_nome_proprietario'])) ? trim($_POST['veiculo_nome_proprietario']) : '';
$registro['veiculo_marca'] = (isset($_POST['veiculo_marca'])) ? trim($_POST['veiculo_marca']) : '';
$registro['veiculo_modelo'] = (isset($_POST['veiculo_modelo'])) ? trim($_POST['veiculo_modelo']) : '';

//var_dump($registro);

if ($registro['veiculo_placa'] == '') {
  unset($registro['veiculo_placa']);
}

if ($registro['veiculo_cpf_cnpj_proprietario'] == '') {
  unset($registro['veiculo_cpf_cnpj_proprietario']);
}

if ($registro['veiculo_nome_proprietario'] == '') {
  unset($registro['veiculo_nome_proprietario']);
}

if ($registro['veiculo_marca'] == '') {
  unset($registro['veiculo_marca']);
}

if ($registro['veiculo_modelo'] == '') {
  unset($registro['veiculo_modelo']);
}


// define how many results you want per page
$results_per_page = 10000;

// find out the number of results stored in database
$number_of_results =  paginar_total("veiculo", $registro);


// determine number of total pages available
$number_of_pages = ceil($number_of_results / $results_per_page);

// determine which page number visitor is currently on
if (!isset($_GET['page'])) {
  $PAGE = 1;
} else {
  $PAGE = $_GET['page'];
}

// determine the sql LIMIT starting number for the results on the displaying page
$this_page_first_result = ($PAGE - 1) * $results_per_page;

// retrieve selected results from database and display them on page
$SQL = 'SELECT * FROM veiculo LIMIT ' . $this_page_first_result . "," . $results_per_page;
$SQL = paginar('veiculo', $registro, $this_page_first_result, $results_per_page);
$stmt = $pdo->prepare($SQL);
$stmt->execute();

echo open_table_2;

if ($number_of_results > 0) {
  echo open_tr . open_th_2 . 'PLACA' . close_th . open_th_2 . 'NOME DO PROPRIETÁRIO' . close_th . open_th_2 . '' . close_th  . close_tr;
}


while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {

  $string = '';
  foreach ($linha as $chave => $valor) {
    $string .= "$chave" . "=" . $valor . "&";
  }

  echo open_tr . open_td_2 . $linha['veiculo_placa'] . close_td;
  echo open_td_2 . $linha['veiculo_nome_proprietario'] . close_td;
  echo open_td_3 . '<a href="veiculo-cadastro.php?editar=true&' . 'veiculo_id=' . $linha['veiculo_id'] . '">Editar</a> | ';
  echo '<a href="veiculo-confirmar-deletar.php?' . 'veiculo_id=' . $linha['veiculo_id'] . '" onclick="return confirmarExcluir();">Excluir</a>' . close_td . close_tr;
  echo open_tr . open_td . open_label . '&nbsp;' . close_lable . close_td . close_tr;
}
echo close_table;

// display the links to the pages
for ($PAGE = 1; $PAGE <= $number_of_pages; $PAGE++) {
  echo '<a href="veiculo-lista.php?page=' . $PAGE . '">|' . $PAGE . '|</a>';
}

if ($number_of_results == 0) {
  echo '<br>Nenhum registro encontrado !';
}

echo close_div;

require_once '../rodape.php';

echo close_body;

echo close_html;
