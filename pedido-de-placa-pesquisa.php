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

echo open_tr . open_th . 'Pedido de Placa'  . close_th . close_tr; 

require_once 'pedido-de-placa-menu.php';

echo open_td . $LINK . close_td . close_tr;

$input = '<input type="hidden" id="pedido_de_placa_id" name="pedido_de_placa_id" value="">';

echo open_tr . open_td. $input . close_td . close_tr;

$input = '<input type="hidden" id="pedido_de_placa_data" name="pedido_de_placa_data" value="' . $registro['pedido_de_placa_data'] .'">';

echo open_tr . open_td. $input . close_td . close_tr;

echo open_tr . open_td. open_label . 'Placa' . close_lable . close_td . close_tr; 

$input = '<input type="text" id="pedido_de_placa_placa_veiculo" name="pedido_de_placa_placa_veiculo" maxlength="50" value="' . $registro['pedido_de_placa_placa_veiculo'] .'">';

echo open_td . $input . close_td . close_tr;

echo open_tr . open_td. open_label . 'Quantidade' . close_lable . close_td . close_tr; 

$input = '<input type="text" id="pedido_de_placa_quantidade" name="pedido_de_placa_quantidade" minlength="1" maxlength="1" value="' . $registro['pedido_de_placa_quantidade'] .'">';

echo open_tr . open_td. $input . close_td . close_tr;

echo open_tr . open_td. open_label . 'RENAVAM' . close_lable . close_td . close_tr; 

$input = '<input type="text" id="pedido_de_placa_renavam" name="pedido_de_placa_renavam" maxlength="15" value="' . $registro['pedido_de_placa_renavam'] .'">';

echo open_tr . open_td. $input . close_td . close_tr;

echo open_tr . open_td. open_label . 'CPF | CNPJ do proprietário' . close_lable . close_td . close_tr; 

$input = '<input type="text" id="pedido_de_placa_cpf_cnpj_proprietario" name="pedido_de_placa_cpf_cnpj_proprietario" minlength="14" maxlength="18" onkeypress="mascaraMutuario(this,cpfCnpj)" onblur="clearTimeout();" value="' . $registro['pedido_de_placa_cpf_cnpj_proprietario'] .'">';

echo open_tr . open_td. $input . close_td . close_tr;

echo open_tr . open_td. open_label . 'Cor da placa' . close_lable . close_td . close_tr; 

$input = '<input type="text" id="pedido_de_placa_cor_placa" name="pedido_de_placa_cor_placa" maxlength="50" value="' . $registro['pedido_de_placa_cor_placa'] .'">';

echo open_tr . open_td. $input . close_td . close_tr;

echo open_tr . open_td. open_label . 'Tipo da placa' . close_lable . close_td . close_tr; 

$input = '<input type="text" id="pedido_de_placa_tipo_placa" name="pedido_de_placa_tipo_placa" maxlength="50" value="' . $registro['pedido_de_placa_tipo_placa'] .'">';

echo open_tr . open_td. $input . close_td . close_tr;

echo open_tr . open_td. open_label . $numero_de_registros . ' registros cadastrados' . close_lable . close_td . close_tr; 


$submit = '<input type="submit" value="Buscar" >';
echo open_tr . open_td. $submit . close_td . close_tr;

echo close_table;

echo close_form;

echo close_div;

echo close_body;
	
echo close_html;