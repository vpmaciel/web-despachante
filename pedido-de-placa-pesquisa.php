<?php


require_once 'lib/lib-sessao.php';
require_once 'lib/lib-biblioteca.php';

setlocale(LC_ALL, 'pt_BR.utf8');

echo doctype;

echo open_html;

echo open_head;

require_once 'cabecalho.php';

echo '<script src="cliente-cadastro.ts"></script>';

echo close_head;

echo open_body;

echo open_div_main;

require_once 'menu.php';

$numero_de_registros = retornar_total_registros('pedido_de_placa');

$registro = array();

$registro['pedido_de_placa_id'] = '';
$registro['pedido_de_placa_data'] = '';
$registro['pedido_de_placa_placa_veiculo'] = '';
$registro['pedido_de_placa_quantidade'] = '';
$registro['pedido_de_placa_renavam'] = '';
$registro['pedido_de_placa_cpf_cnpj_proprietario'] = '';
$registro['pedido_de_placa_cor_placa'] = '';
$registro['pedido_de_placa_tipo_placa'] = '';

$form_open = '<form action="pedido-de-placa-lista.php" method="POST">';

echo $form_open;

echo open_table;

require_once 'pedido-de-placa-formulario.php';

$submit = '<input type="submit" value="Buscar" >';
echo open_tr . open_td . $submit . close_td . close_tr;

echo close_table;

echo close_form;

echo close_div;

echo close_body;
	
echo close_html;