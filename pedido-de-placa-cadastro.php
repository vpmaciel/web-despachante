<?php
session_start();

require_once 'lib/lib-sessao.php';

require_once 'lib/lib-biblioteca.php';

setlocale(LC_ALL, 'pt_BR.utf8');

echo doctype;

echo open_html;

echo open_head;

require_once 'cabecalho.php';

echo '<script src="pedido-de-placa-cadastro.ts"></script>';

echo close_head;

echo open_body;

echo open_div_main;

require_once 'menu.php';

$registro = array();

$form_open = '<form action="pedido-de-placa-salvar.php" method="get">';

echo $form_open;

echo open_table;

echo open_tr . open_th . 'PEDIDO DE PLACA'  . close_th . close_tr; 

$LINK = '<a href="pedido-de-placa-pesquisa.php">Pesquisar</a>';

echo open_td . $LINK . close_td . close_tr;
$LINK = '<a href="pedido-de-placa-dashboard.php">Dashboard</a>';

echo open_td . $LINK . close_td . close_tr;

$registro['pedido_de_placa_id'] = isset($_GET['pedido_de_placa_id']) ? $_GET['pedido_de_placa_id'] : '';
$input = '<input type="hidden" id="pedido_de_placa_id" name="pedido_de_placa_id" minlength="14" maxlength="18"  value="' . $registro['pedido_de_placa_id'] .'">';

echo open_tr . open_td. $input . close_td . close_tr;

$registro['pedido_de_placa_data'] = isset($_GET['pedido_de_placa_data']) ? $_GET['pedido_de_placa_data'] : '';
$input = '<input type="hidden" id="pedido_de_placa_data" name="pedido_de_placa_data" minlength="14" maxlength="18" onkeypress="mascaraMutuario(this,cpfCnpj)" onblur="clearTimeout();" value="' . $registro['pedido_de_placa_data'] .'">';

echo open_tr . open_td. $input . close_td . close_tr;

echo open_tr . open_td. open_label . 'PLACA' . close_lable . close_td . close_tr; 

$registro['pedido_de_placa_placa_veiculo'] = isset($_GET['pedido_de_placa_placa_veiculo']) ? $_GET['pedido_de_placa_placa_veiculo'] : '';
$input = '<input type="text" id="pedido_de_placa_placa_veiculo" name="cliente_nome" maxlength="50" value="' . $registro['pedido_de_placa_placa_veiculo'] .'">';

echo open_td . $input . close_td . close_tr;

echo open_tr . open_td. open_label . 'QUANTIDADE' . close_lable . close_td . close_tr; 

$registro['pedido_de_placa_quantidade'] = isset($_GET['pedido_de_placa_quantidade']) ? $_GET['pedido_de_placa_quantidade'] : '';
$input = '<input type="text" id="pedido_de_placa_quantidade" name="pedido_de_placa_quantidade" minlength="14" maxlength="18" onkeypress="mascaraMutuario(this,cpfCnpj)" onblur="clearTimeout();" value="' . $registro['pedido_de_placa_quantidade'] .'">';

echo open_tr . open_td. $input . close_td . close_tr;

echo open_tr . open_td. open_label . 'RENAVAM' . close_lable . close_td . close_tr; 

$registro['pedido_de_placa_renavam'] = isset($_GET['pedido_de_placa_renavam']) ? $_GET['pedido_de_placa_renavam'] : '';
$input = '<input type="text" id="pedido_de_placa_renavam" name="cliente_telefone" maxlength="15" onkeypress="mask(this, mphone);" value="' . $registro['pedido_de_placa_renavam'] .'">';

echo open_tr . open_td. $input . close_td . close_tr;

echo open_tr . open_td. open_label . 'CPF | CNPJ DO PROPRIETÁRIO' . close_lable . close_td . close_tr; 

$registro['pedido_de_placa_cpf_cnpj_proprietario'] = isset($_GET['pedido_de_placa_cpf_cnpj_proprietario']) ? $_GET['pedido_de_placa_cpf_cnpj_proprietario'] : '';
$input = '<input type="text" id="pedido_de_placa_cpf_cnpj_proprietario" name="cliente_telefone" minlength="14" maxlength="18" onkeypress="mascaraMutuario(this,cpfCnpj)" onblur="clearTimeout();" value="' . $registro['pedido_de_placa_cpf_cnpj_proprietario'] .'">';

echo open_tr . open_td. $input . close_td . close_tr;

echo open_tr . open_td. open_label . 'COR DA PLACA' . close_lable . close_td . close_tr; 

$registro['pedido_de_placa_cor_placa'] = isset($_GET['pedido_de_placa_cor_placa']) ? $_GET['pedido_de_placa_cor_placa'] : '';
$input = '<input type="text" id="pedido_de_placa_cor_placa" name="pedido_de_placa_cor_placa" maxlength="15" onkeypress="mask(this, mphone);" value="' . $registro['pedido_de_placa_cor_placa'] .'">';

echo open_tr . open_td. $input . close_td . close_tr;

echo open_tr . open_td. open_label . 'TIPO DE PLACA' . close_lable . close_td . close_tr; 

$registro['pedido_de_placa_tipo_placa'] = isset($_GET['pedido_de_placa_tipo_placa']) ? $_GET['pedido_de_placa_tipo_placa'] : '';
$input = '<input type="text" id="pedido_de_placa_tipo_placa" name="cliente_telefone" maxlength="15" onkeypress="mask(this, mphone);" value="' . $registro['pedido_de_placa_tipo_placa'] .'">';

echo open_tr . open_td. $input . close_td . close_tr;

echo open_tr . open_td. open_label . '&nbsp;' . close_lable . close_td . close_tr; 

$submit = '<input type="submit" value="Salvar" onclick=\'return validarFormulario();\'>';

echo open_tr . open_td. $submit . close_td . close_tr;

echo close_table;

echo close_form;

echo close_div;

echo close_body;
	
echo close_html;