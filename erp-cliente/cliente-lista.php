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

require_once 'cliente-menu.php';

$conexao = new Conexao();

$registro = array();

$SQL = '';

$registro['cliente_cpf_cnpj'] = (isset($_POST['cliente_cpf_cnpj'])) ? trim($_POST['cliente_cpf_cnpj']) : '';
$registro['cliente_nome_completo'] = (isset($_POST['cliente_nome_completo'])) ? trim($_POST['cliente_nome_completo']) : '';
$registro['cliente_telefone'] = (isset($_POST['cliente_cpf_cnpj'])) ? trim($_POST['cliente_telefone']) : '';
$registro['cliente_email'] = (isset($_POST['cliente_email'])) ? trim($_POST['cliente_email']) : '';

// define how many results you want per page
$results_per_page = 10000;

// find out the number of results stored in database
$number_of_results =  $conexao->paginarTotal("cliente", $registro);


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
$sql = $conexao->paginar('cliente', $registro, $this_page_first_result, $results_per_page);
$pdo = $conexao->getPdo();
$stmt = $pdo->prepare($sql);
$stmt->execute();
echo open_table_2;

if ($number_of_results > 0) {
  echo open_tr . open_th_2 . 'CPF | CNPJ ' . close_th . open_th_2 . 'NOME' . close_th . open_th_2 . '' . close_th  . close_tr;
}

while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {

  echo open_tr . open_td_2 . $linha['cliente_cpf_cnpj'] . close_td;
  echo open_td_2 . $linha['cliente_nome_completo'] . close_td;
  echo open_td_3 . '<a href="cliente-cadastro.php?editar=true&' . 'cliente_id=' . $linha['cliente_id'] . '">Editar</a> | ';
  echo '<a href="cliente-confirmar-deletar.php?' . 'cliente_id=' . $linha['cliente_id'] . ' " onclick="return confirmarExcluir();">Excluir</a>' . close_td . close_tr;
  echo open_tr . open_td_2 . '&nbsp;' . close_td . open_td_2 . '&nbsp;' . close_td . open_td_2 . '&nbsp;' . close_td . close_tr;
}
echo close_table;

// display the links to the pages
for ($page = 1; $page <= $number_of_pages; $page++) {
  echo '<a href="cliente-lista.php?page=' . $page . '">|' . $page . '|</a>';
}

if ($number_of_results == 0) {
  echo '<br>Nenhum registro encontrado !';
}


echo close_div;

require_once '../rodape.php';

echo close_body;

echo close_html;
