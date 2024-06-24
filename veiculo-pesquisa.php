<?php


require_once 'lib/lib-sessao.php';
require_once 'lib/lib-biblioteca.php';

setlocale(LC_ALL, 'pt_BR.utf8');

echo doctype;

echo open_html;

echo open_head;

require_once 'cabecalho.php';

echo close_head;

echo open_body;

echo open_div_main;

require_once 'menu.php';

$registro = array();

$numero_de_registros = retornar_total_registros('veiculo');

$registro['veiculo_id'] = '';
$registro['veiculo_placa'] = '';
$registro['veiculo_cpf_cnpj_proprietario'] = ''; 
$registro['veiculo_nome_proprietario'] = '';     
$registro['veiculo_marca'] = '';     
$registro['veiculo_modelo'] = ''; 

$form_open = '<form action="veiculo-lista.php" method="post">';

echo $form_open;

echo open_table;

require_once 'veiculo-formulario.php';

$submit = '<input type="submit" value="Buscar" onclick=\'return validarFormulario();\'>';

echo open_tr . open_td . $submit . close_td . close_tr;

echo close_table;

echo close_form;

echo close_div;

echo close_body;
	
echo close_html;