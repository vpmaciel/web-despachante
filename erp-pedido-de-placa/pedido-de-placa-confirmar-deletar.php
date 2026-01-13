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

require_once 'pedido-de-placa-menu.php';

$registro = array();

$pedidoDePlacaDAO = new PedidoDePlacaDAO();

$registro['pedido_de_placa_id'] = $_GET['pedido_de_placa_id'];

$registro = $pedidoDePlacaDAO->getRegistro($registro);

echo open_table_3;         
                
echo open_tr . open_td_2 . 'Placa: ' . close_td . open_td . $registro['pedido_de_placa_placa_veiculo'] . close_td . close_tr;
echo open_tr . open_td_2 . 'Quantidade: ' . close_td . open_td . $registro['pedido_de_placa_quantidade'] . close_td . close_tr;
echo open_tr . open_td_2 . 'RENAVAM: ' . close_td . open_td . $registro['pedido_de_placa_renavam'] . close_td . close_tr;
echo open_tr . open_td_2 . 'CPF | CNPJ do proprietário: ' . close_td . open_td . $registro['pedido_de_placa_cpf_cnpj_proprietario'] . close_td . close_tr;
echo open_tr . open_td_2 . 'Cor da placa: ' . close_td . open_td . $registro['pedido_de_placa_cor_placa'] . close_td . close_tr;
echo open_tr . open_td_2 . 'Tipo da placa:: ' . close_td . open_td . $registro['pedido_de_placa_tipo_placa'] . close_td . close_tr;
echo open_tr . open_td_2 . '&nbsp;' . close_td . open_td_2 . '&nbsp;' . close_td . close_tr;

echo close_table;

echo '<a href="pedido-de-placa-deletar.php?pedido_de_placa_id=' . $registro['pedido_de_placa_id'] . '">Excluir</a>';

echo close_div;

require_once '../rodape.php';

echo close_body;

echo close_html;
