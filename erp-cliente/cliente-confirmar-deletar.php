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

$registro = array();

$clienteDAO = new ClienteDAO();

$registro['cliente_id'] = $_GET['cliente_id'];

$registro = $clienteDAO->getRegistro($registro);

echo open_table_3;

echo open_tr . open_td_2 . 'CPF | CNPJ: ' . close_td . open_td . $registro['cliente_cpf_cnpj'] . close_td . close_tr;
echo open_tr . open_td_2 . 'TELEFONE: ' . close_td . open_td . $registro['cliente_telefone'] . close_td . close_tr;
echo open_tr . open_td_2 . 'NOME COMPLETO: ' . close_td . open_td . $registro['cliente_nome'] . close_td . close_tr;
echo open_tr . open_td_2 . 'E-MAIL: ' . close_td . open_td . $registro['cliente_email'] . close_td . close_tr;
echo open_tr . open_td_2 . '&nbsp;' . close_td . open_td_2 . '&nbsp;' . close_td . close_tr;

echo close_table;

echo '<a href="cliente-deletar.php?cliente_id=' . $registro['cliente_id'] . '">Excluir</a>';

echo close_div;

?>

<script src="../rodape.js"></script>

<?php

echo close_body;

echo close_html;
