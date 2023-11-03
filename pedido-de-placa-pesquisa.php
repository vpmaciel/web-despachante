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

$form_open = '<form action="cliente-lista.php" method="get">';

echo $form_open;

echo open_table;

echo open_tr . open_th . 'Cliente'  . close_th . close_tr; 

echo open_tr . open_td. open_label . 'NOME' . close_lable . close_td . close_tr; 
$registro['cliente_nome'] = isset($_GET['cliente_nome']) ? $_GET['cliente_nome'] : '';
$input = '<input type="text" id="cliente_nome" name="cliente_nome" maxlength="50" value="' . $registro['cliente_nome'] .'">';
echo open_td . $input . close_td . close_tr;

echo open_tr . open_td. open_label . 'CPF ou CNPJ' . close_lable . close_td . close_tr; 
$registro['cliente_cpf_cnpj'] = isset($_GET['cliente_cpf_cnpj']) ? $_GET['cliente_cpf_cnpj'] : '';
$input = '<input type="text" id="cliente_cpf_cnpj" name="cliente_cpf_cnpj" minlength="14" maxlength="18" onkeypress="mascaraMutuario(this,cpfCnpj)" onblur="clearTimeout();" value="' . $registro['cliente_cpf_cnpj'] .'">';
echo open_tr . open_td. $input . close_td . close_tr;


echo open_tr . open_td. open_label . 'TELEFONE' . close_lable . close_td . close_tr; 
$registro['cliente_telefone'] = isset($_GET['cliente_telefone']) ? $_GET['cliente_telefone'] : '';
$input = '<input type="text" id="cliente_telefone" name="cliente_telefone" maxlength="15" onkeypress="mask(this, mphone);" value="' . $registro['cliente_telefone'] .'">';
echo open_tr . open_td. $input . close_td . close_tr;

echo open_tr . open_td. open_label . '&nbsp;' . close_lable . close_td . close_tr; 

$submit = '<input type="submit" value="Buscar" >';
echo open_tr . open_td. $submit . close_td . close_tr;

echo close_table;

echo close_form;

echo close_div;

echo close_body;
	
echo close_html;