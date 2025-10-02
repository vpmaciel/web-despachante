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

require_once 'servico-menu.php';

$numero_de_registros = retornar_total_registros('servico');

$registro = array();

$registro['servico_id'] = '';
$registro['servico_data'] = '';
$registro['servico_placa_veiculo'] = '';
$registro['servico_valor'] = '';
$registro['servico_descricao'] = '';
$registro['servico_cpf_cnpj_cliente'] = '';
$registro['servico_nome_cliente'] = '';
$registro['servico_telefone_cliente'] = '';

$form_open = '<form action="servico-lista.php" method="post">';

echo $form_open;

require_once 'servico-formulario.php';

echo close_form;

echo close_div;

require_once '../rodape.php';

echo close_body;
	
echo close_html;