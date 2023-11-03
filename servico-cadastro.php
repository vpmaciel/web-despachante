<?php
session_start();

require_once 'lib/lib-sessao.php';

require_once 'lib/lib-biblioteca.php';

setlocale(LC_ALL, 'pt_BR.utf8');

echo doctype;

echo html_open;

echo head_open;

require_once 'cabecalho.php';

echo '<script src="cliente-cadastro.ts"></script>';

echo head_close;

echo body_open;

echo div_main_open;

require_once 'menu.php';

$registro = array();

$form_open = '<form action="cliente-salvar.php" method="get">';

echo $form_open;

echo table_open;

echo tr_open . th_open . 'SERVIÇO'  . th_close . tr_close; 

$LINK = '<a href="cliente-pesquisa.php">Pesquisar</a>';

echo td_close . $LINK . td_close . tr_close;

$LINK = '<a href="cliente-dashboard.php">Dashboard</a>';

echo td_close . $LINK . td_close . tr_close;


$registro['servico_id'] = isset($_GET['servico_id']) ? $_GET['servico_id'] : '';
$input = '<input type="hidden" id="servico_id" name="servico_id" maxlength="50" value="' . $registro['servico_id'] .'">';

echo tr_open . td_open. $input . td_close . tr_close;


$registro['servico_data'] = isset($_GET['servico_data']) ? $_GET['servico_data'] : '';
$input = '<input type="hidden" id="servico_data" name="servico_data" maxlength="50" value="' . $registro['servico_data'] .'">';

echo tr_open . td_open. $input . td_close . tr_close;

echo tr_open . td_open. label_open . 'PLACA DO VEÍCULO' . lable_close . td_close . tr_close; 

$registro['servico_placa_veiculo'] = isset($_GET['servico_placa_veiculo']) ? $_GET['servico_placa_veiculo'] : '';
$input = '<input type="text" id="servico_placa_veiculo" name="servico_placa_veiculo" maxlength="50" value="' . $registro['servico_placa_veiculo'] .'">';

echo td_close . $input . td_close . tr_close;

echo tr_open . td_open. label_open . 'valor' . lable_close . td_close . tr_close; 

$registro['servico_valor'] = isset($_GET['servico_valor']) ? $_GET['servico_valor'] : '';
$input = '<input type="text" id="servico_valor" name="servico_valor" maxlength="15" onkeypress="mask(this, mphone);" value="' . $registro['servico_valor'] .'">';

echo tr_open . td_open. $input . td_close . tr_close;

echo tr_open . td_open. label_open . 'DESCRIÇÃO' . lable_close . td_close . tr_close; 

$registro['servico_descricao'] = isset($_GET['servico_descricao']) ? $_GET['servico_descricao'] : '';
$input = '<input type="text" id="servico_descricao" name="servico_descricao" maxlength="15" onkeypress="mask(this, mphone);" value="' . $registro['servico_descricao'] .'">';

echo tr_open . td_open. $input . td_close . tr_close;

echo tr_open . td_open. label_open . 'CPF | CNPJ DO CLIENTE' . lable_close . td_close . tr_close; 

$registro['servico_cpf_cnpj_cliente'] = isset($_GET['servico_cpf_cnpj_cliente']) ? $_GET['servico_cpf_cnpj_cliente'] : '';
$input = '<input type="text" id="servico_cpf_cnpj_cliente" name="servico_cpf_cnpj_cliente" minlength="14" maxlength="18" onkeypress="mascaraMutuario(this,cpfCnpj)" onblur="clearTimeout();" value="' . $registro['servico_cpf_cnpj_cliente'] .'">';

echo tr_open . td_open. $input . td_close . tr_close;

echo tr_open . td_open. label_open . 'NOME DO CLIENTE' . lable_close . td_close . tr_close; 

$registro['servico_nome_cliente'] = isset($_GET['servico_nome_cliente']) ? $_GET['servico_nome_cliente'] : '';
$input = '<input type="text" id="servico_nome_cliente" name="servico_nome_cliente" maxlength="15" onkeypress="mask(this, mphone);" value="' . $registro['servico_nome_cliente'] .'">';

echo tr_open . td_open. $input . td_close . tr_close;

echo tr_open . td_open. label_open . 'TELEFONE DO CLIENTE' . lable_close . td_close . tr_close; 

$registro['servico_telefone_cliente'] = isset($_GET['servico_telefone_cliente']) ? $_GET['servico_telefone_cliente'] : '';
$input = '<input type="text" id="servico_telefone_cliente" name="servico_telefone_cliente" maxlength="15" onkeypress="mask(this, mphone);" value="' . $registro['servico_telefone_cliente'] .'">';

echo tr_open . td_open. $input . td_close . tr_close;

echo tr_open . td_open. label_open . '&nbsp;' . lable_close . td_close . tr_close; 

$submit = '<input type="submit" value="Salvar" onclick=\'return validarFormulario();\'>';

echo tr_open . td_open. $submit . td_close . tr_close;

echo table_close;

echo form_close;

echo div_close;

echo body_close;
	
echo htm_close;