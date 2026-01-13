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

require_once 'servico-menu.php';

$conexao = new Conexao();

$registro = array();

$registro['servico_placa_veiculo'] = (isset($_POST['servico_placa_veiculo'])) ? trim($_POST['servico_placa_veiculo']) : '';
$registro['servico_valor'] = (isset($_POST['servico_valor'])) ? str_replace(',', '.', preg_replace('/[^0-9,]/', '', trim($_POST['servico_valor']))) : '';
$registro['servico_descricao'] = (isset($_POST['servico_descricao'])) ? trim($_POST['servico_descricao']) : '';
$registro['servico_cpf_cnpj_cliente'] = $_POST['servico_cpf_cnpj_cliente'];
$registro['servico_nome_cliente'] = (isset($_POST['servico_nome_cliente'])) ? trim($_POST['servico_nome_cliente']) : '';
$registro['servico_telefone_cliente'] = (isset($_POST['servico_telefone_cliente'])) ? trim($_POST['servico_telefone_cliente']) : '';


// define how many results you want per page
$results_per_page = 10000;

// find out the number of results stored in database
$number_of_results =  $conexao->paginarTotal("servico", $registro);

// determine number of total pages available
$number_of_pages = ceil($number_of_results / $results_per_page);

// determine which page number visitor is currently on
if (!isset($_GET['page'])) {
  $page = 1;
} else {
  $page = $_GET['page'];
}

// determine the sql LIMIT starting number for the results on the displaying page
$this_page_first_result = ($page - 1) * $results_per_page;

// retrieve selected results from database and display them on page
$sql = $conexao->paginar('servico', $registro, $this_page_first_result, $results_per_page);
$pdo = $conexao->getPdo();
$stmt = $pdo->prepare($sql);
$stmt->execute();

echo open_table_2;

if ($number_of_results > 0) {
  echo open_tr . open_th_2 . 'DATA' . close_th . open_th_2 . 'PLACA' . close_th . open_th_2 . '' . close_th  . close_tr;
}

while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {

  $string = '';
  foreach ($linha as $chave => $valor) {
    $string .= "$chave" . "=" . $valor . "&";
  }
  echo open_tr . open_td_2 . date('d-m-Y', strtotime($linha['servico_data'])) . close_td;
  echo open_td_2 . $linha['servico_placa_veiculo'] . close_td;
  echo open_td_3 . '<a href="servico-cadastro.php?editar=true&' . 'servico_id=' . $linha['servico_id'] . '">Editar</a> | ';
  echo '<a href="servico-confirmar-deletar.php?' . 'servico_id=' . $linha['servico_id'] . ' " onclick="return confirmarExcluir();">Excluir</a>' . close_td . close_tr;
  echo open_tr . open_td . open_label . '&nbsp;' . close_lable . close_td . close_tr;
}

echo close_table;

// display the links to the pages
for ($page = 1; $page <= $number_of_pages; $page++) {
  echo '<a href="servico-lista.php?page=' . $page . '">|' . $page . '|</a>';
}

if ($number_of_results == 0) {
  echo '<br>Nenhum registro encontrado !';
}

echo close_div;

?>

<script src="../rodape.js"></script>

<?php

echo close_body;

echo close_html;
