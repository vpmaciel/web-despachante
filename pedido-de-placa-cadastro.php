<?php
session_start();

require_once 'lib/lib-sessao.php';

require_once 'lib/lib-biblioteca.php';

setlocale(LC_ALL, 'pt_BR.utf8');

echo doctype;

echo html_open;

echo head_open;

require_once 'cabecalho.php';

echo '<script src="pedido-de-placa-cadastro.ts"></script>';

echo head_close;

echo body_open;

echo div_main_open;

require_once 'menu.php';

$registro = array();

$form_open = '<form action="pedido-de-placa-salvar.php" method="get">';

echo $form_open;

echo table_open;

echo tr_open . th_open . 'PEDIDO DE PLACA'  . th_close . tr_close; 

$LINK = '<a href="pedido-de-placa-pesquisa.php">Pesquisar</a>';

echo td_close . $LINK . td_close . tr_close;
$LINK = '<a href="pedido-de-placa-dashboard.php">Dashboard</a>';

echo td_close . $LINK . td_close . tr_close;

$registro['pedido_de_placa_id'] = isset($_GET['pedido_de_placa_id']) ? $_GET['pedido_de_placa_id'] : '';
$input = '<input type="hidden" id="pedido_de_placa_id" name="pedido_de_placa_id" minlength="14" maxlength="18"  value="' . $registro['pedido_de_placa_id'] .'">';

echo tr_open . td_open. $input . td_close . tr_close;

$registro['pedido_de_placa_data'] = isset($_GET['pedido_de_placa_data']) ? $_GET['pedido_de_placa_data'] : '';
$input = '<input type="hidden" id="pedido_de_placa_data" name="pedido_de_placa_data" minlength="14" maxlength="18" onkeypress="mascaraMutuario(this,cpfCnpj)" onblur="clearTimeout();" value="' . $registro['pedido_de_placa_data'] .'">';

echo tr_open . td_open. $input . td_close . tr_close;

echo tr_open . td_open. label_open . 'PLACA' . lable_close . td_close . tr_close; 

$registro['pedido_de_placa_placa_veiculo'] = isset($_GET['pedido_de_placa_placa_veiculo']) ? $_GET['pedido_de_placa_placa_veiculo'] : '';
$input = '<input type="text" id="pedido_de_placa_placa_veiculo" name="cliente_nome" maxlength="50" value="' . $registro['pedido_de_placa_placa_veiculo'] .'">';

echo td_close . $input . td_close . tr_close;

echo tr_open . td_open. label_open . 'QUANTIDADE' . lable_close . td_close . tr_close; 

$registro['pedido_de_placa_quantidade'] = isset($_GET['pedido_de_placa_quantidade']) ? $_GET['pedido_de_placa_quantidade'] : '';
$input = '<input type="text" id="pedido_de_placa_quantidade" name="pedido_de_placa_quantidade" minlength="14" maxlength="18" onkeypress="mascaraMutuario(this,cpfCnpj)" onblur="clearTimeout();" value="' . $registro['pedido_de_placa_quantidade'] .'">';

echo tr_open . td_open. $input . td_close . tr_close;

echo tr_open . td_open. label_open . 'RENAVAM' . lable_close . td_close . tr_close; 

$registro['pedido_de_placa_renavam'] = isset($_GET['pedido_de_placa_renavam']) ? $_GET['pedido_de_placa_renavam'] : '';
$input = '<input type="text" id="pedido_de_placa_renavam" name="cliente_telefone" maxlength="15" onkeypress="mask(this, mphone);" value="' . $registro['pedido_de_placa_renavam'] .'">';

echo tr_open . td_open. $input . td_close . tr_close;

echo tr_open . td_open. label_open . 'CPF | CNPJ DO PROPRIETÁRIO' . lable_close . td_close . tr_close; 

$registro['pedido_de_placa_cpf_cnpj_proprietario'] = isset($_GET['pedido_de_placa_cpf_cnpj_proprietario']) ? $_GET['pedido_de_placa_cpf_cnpj_proprietario'] : '';
$input = '<input type="text" id="pedido_de_placa_cpf_cnpj_proprietario" name="cliente_telefone" minlength="14" maxlength="18" onkeypress="mascaraMutuario(this,cpfCnpj)" onblur="clearTimeout();" value="' . $registro['pedido_de_placa_cpf_cnpj_proprietario'] .'">';

echo tr_open . td_open. $input . td_close . tr_close;

echo tr_open . td_open. label_open . 'COR DA PLACA' . lable_close . td_close . tr_close; 

$registro['pedido_de_placa_cor_placa'] = isset($_GET['pedido_de_placa_cor_placa']) ? $_GET['pedido_de_placa_cor_placa'] : '';
$input = '<input type="text" id="pedido_de_placa_cor_placa" name="pedido_de_placa_cor_placa" maxlength="15" onkeypress="mask(this, mphone);" value="' . $registro['pedido_de_placa_cor_placa'] .'">';

echo tr_open . td_open. $input . td_close . tr_close;

echo tr_open . td_open. label_open . 'TIPO DE PLACA' . lable_close . td_close . tr_close; 

$registro['pedido_de_placa_tipo_placa'] = isset($_GET['pedido_de_placa_tipo_placa']) ? $_GET['pedido_de_placa_tipo_placa'] : '';
$input = '<input type="text" id="pedido_de_placa_tipo_placa" name="cliente_telefone" maxlength="15" onkeypress="mask(this, mphone);" value="' . $registro['pedido_de_placa_tipo_placa'] .'">';

echo tr_open . td_open. $input . td_close . tr_close;

echo tr_open . td_open. label_open . '&nbsp;' . lable_close . td_close . tr_close; 

$submit = '<input type="submit" value="Salvar" onclick=\'return validarFormulario();\'>';

echo tr_open . td_open. $submit . td_close . tr_close;

echo table_close;

echo form_close;

echo div_close;

echo body_close;
	
echo htm_close;