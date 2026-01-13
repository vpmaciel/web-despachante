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

$veiculoDAO = new VeiculoDAO();

$registro['veiculo_id'] = $_GET['veiculo_id'];

$registro = $veiculoDAO->getRegistro($registro);

echo open_table_3;
echo open_tr . open_td_2 . 'Placa: ' . close_td . open_td . $registro['veiculo_placa'] . close_td . close_tr;
echo open_tr . open_td_2 . 'CPF | CNPJ do proprietário: ' . close_td . open_td . $registro['veiculo_cpf_cnpj_proprietario'] . close_td . close_tr;
echo open_tr . open_td_2 . 'Nome do proprietário: ' . close_td . open_td . $registro['veiculo_nome_proprietario'] . close_td . close_tr;
echo open_tr . open_td_2 . 'Marca do veículo: ' . close_td . open_td . $registro['veiculo_marca'] . close_td . close_tr;
echo open_tr . open_td_2 . 'Modelo do veículo: ' . close_td . open_td . $registro['veiculo_modelo'] . close_td . close_tr;
echo open_tr . open_td_2 . '&nbsp;' . close_td . open_td_2 . '&nbsp;' . close_td . close_tr;

echo close_table;

echo '<a href="cliente-deletar.php?veiculo_id=' . $registro['veiculo_id'] . '">Excluir</a>';

echo close_div;

?>

<script src="../rodape.js"></script>

<?php

echo close_body;

echo close_html;
