<?php
session_start();

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

$registro = array();

$form_open = '<form action="cliente-salvar.php" method="get">';

echo $form_open;

echo open_table;

echo open_tr . open_th . 'SERVIÇO'  . close_th . close_tr; 

$LINK = '<a href="cliente-pesquisa.php">Pesquisar</a>';

echo open_td . $LINK . close_td . close_tr;

$LINK = '<a href="cliente-dashboard.php">Dashboard</a>';

echo open_td . $LINK . close_td . close_tr;


$registro['servico_id'] = isset($_GET['servico_id']) ? $_GET['servico_id'] : '';
$input = '<input type="hidden" id="servico_id" name="servico_id" maxlength="50" value="' . $registro['servico_id'] .'">';

echo open_tr . open_td. $input . close_td . close_tr;


$registro['servico_data'] = isset($_GET['servico_data']) ? $_GET['servico_data'] : '';
$input = '<input type="hidden" id="servico_data" name="servico_data" maxlength="50" value="' . $registro['servico_data'] .'">';

echo open_tr . open_td. $input . close_td . close_tr;

echo open_tr . open_td. open_label . 'PLACA DO VEÍCULO' . close_lable . close_td . close_tr; 

$registro['servico_placa_veiculo'] = isset($_GET['servico_placa_veiculo']) ? $_GET['servico_placa_veiculo'] : '';
$input = '<input type="text" id="servico_placa_veiculo" name="servico_placa_veiculo" maxlength="50" value="' . $registro['servico_placa_veiculo'] .'">';

echo open_td . $input . close_td . close_tr;

echo open_tr . open_td. open_label . 'valor' . close_lable . close_td . close_tr; 

$registro['servico_valor'] = isset($_GET['servico_valor']) ? $_GET['servico_valor'] : '';
$input = '<input type="text" id="servico_valor" name="servico_valor" maxlength="15" onkeypress="mask(this, mphone);" value="' . $registro['servico_valor'] .'">';

echo open_tr . open_td. $input . close_td . close_tr;

echo open_tr . open_td. open_label . 'DESCRIÇÃO' . close_lable . close_td . close_tr; 

$registro['servico_descricao'] = isset($_GET['servico_descricao']) ? $_GET['servico_descricao'] : '';
$input = '<input type="text" id="servico_descricao" name="servico_descricao" maxlength="15" onkeypress="mask(this, mphone);" value="' . $registro['servico_descricao'] .'">';

echo open_tr . open_td. $input . close_td . close_tr;

echo open_tr . open_td. open_label . 'CPF | CNPJ DO CLIENTE' . close_lable . close_td . close_tr; 

$registro['servico_cpf_cnpj_cliente'] = isset($_GET['servico_cpf_cnpj_cliente']) ? $_GET['servico_cpf_cnpj_cliente'] : '';
$input = '<input type="text" id="servico_cpf_cnpj_cliente" name="servico_cpf_cnpj_cliente" minlength="14" maxlength="18" onkeypress="mascaraMutuario(this,cpfCnpj)" onblur="clearTimeout();" value="' . $registro['servico_cpf_cnpj_cliente'] .'">';

echo open_tr . open_td. $input . close_td . close_tr;

echo open_tr . open_td. open_label . 'NOME DO CLIENTE' . close_lable . close_td . close_tr; 

$registro['servico_nome_cliente'] = isset($_GET['servico_nome_cliente']) ? $_GET['servico_nome_cliente'] : '';
$input = '<input type="text" id="servico_nome_cliente" name="servico_nome_cliente" maxlength="15" onkeypress="mask(this, mphone);" value="' . $registro['servico_nome_cliente'] .'">';

echo open_tr . open_td. $input . close_td . close_tr;

echo open_tr . open_td. open_label . 'TELEFONE DO CLIENTE' . close_lable . close_td . close_tr; 

$registro['servico_telefone_cliente'] = isset($_GET['servico_telefone_cliente']) ? $_GET['servico_telefone_cliente'] : '';
$input = '<input type="text" id="servico_telefone_cliente" name="servico_telefone_cliente" maxlength="15" onkeypress="mask(this, mphone);" value="' . $registro['servico_telefone_cliente'] .'">';

echo open_tr . open_td. $input . close_td . close_tr;

echo open_tr . open_td. open_label . '&nbsp;' . close_lable . close_td . close_tr; 

$submit = '<input type="submit" value="Salvar" onclick=\'return validarFormulario();\'>';

echo open_tr . open_td. $submit . close_td . close_tr;

echo close_table;

echo close_form;

echo close_div;

echo close_body;
	
echo close_html;