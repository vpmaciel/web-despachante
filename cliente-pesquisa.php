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

$numero_de_registros = retornar_total_registros('cliente');


$registro = array();

$form_open = '<form action="cliente-lista.php" method="POST">';

echo $form_open;

echo open_table;

echo open_tr . open_th . 'Cliente'  . close_th . close_tr; 

echo open_tr . open_td. open_label . 'NOME' . close_lable . close_td . close_tr; 

$input = '<input type="text" id="cliente_nome_completo" name="cliente_nome_completo" maxlength="50">';
echo open_td . $input . close_td . close_tr;

echo open_tr . open_td. open_label . 'CPF | CNPJ' . close_lable . close_td . close_tr; 
$input = '<input type="text" id="cliente_cpf_cnpj" name="cliente_cpf_cnpj" minlength="14" maxlength="18" onkeypress="mascaraMutuario(this,cpfCnpj)" onblur="clearTimeout();">';
echo open_tr . open_td. $input . close_td . close_tr;


echo open_tr . open_td. open_label . 'TELEFONE' . close_lable . close_td . close_tr; 
$input = '<input type="text" id="cliente_telefone" name="cliente_telefone" maxlength="15" onkeypress="mask(this, mphone);">';
echo open_tr . open_td. $input . close_td . close_tr;

echo open_tr . open_td. open_label . 'E-MAIL' . close_lable . close_td . close_tr; 
$input = '<input type="text" id="cliente_email" name="cliente_email" maxlength="100">';
echo open_tr . open_td. $input . close_td . close_tr;

echo open_tr . open_td. open_label . $numero_de_registros . ' registros cadastrados' . close_lable . close_td . close_tr; 

$submit = '<input type="submit" value="Buscar" >';
echo open_tr . open_td. $submit . close_td . close_tr;

echo close_table;

echo close_form;

echo close_div;

echo close_body;
	
echo close_html;