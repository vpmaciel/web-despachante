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

$registro = array();

$servicoDAO = new ServicoDAO();

$registro['servico_id'] = $_GET['servico_id'];

$registro = $servicoDAO->getRegistro($registro);

echo open_table_3;

echo open_tr . open_td_2 . 'Placa do veículo: ' . close_td . open_td . $registro['servico_placa_veiculo'] . close_td . close_tr;
echo open_tr . open_td_2 . 'Valor (R$): ' . close_td . open_td . $registro['servico_valor'] . close_td . close_tr;
echo open_tr . open_td_2 . 'Descrição: ' . close_td . open_td . $registro['servico_descricao'] . close_td . close_tr;
echo open_tr . open_td_2 . 'CPF | CNPJ do cliente: ' . close_td . open_td . $registro['servico_cpf_cnpj_cliente'] . close_td . close_tr;
echo open_tr . open_td_2 . 'Telefone do cliente:: ' . close_td . open_td . $registro['servico_telefone_cliente'] . close_td . close_tr;
echo open_tr . open_td_2 . 'Data: ' . close_td . open_td . $registro['servico_data'] . close_td . close_tr;
echo open_tr . open_td_2 . '&nbsp;' . close_td . open_td_2 . '&nbsp;' . close_td . close_tr;

echo close_table;

echo '<a href="servico-deletar.php?servico_id=' . $registro['servico_id'] . '">Excluir</a>';

echo close_div;

?>

<script src="../rodape.js"></script>

<?php

echo close_body;

echo close_html;
