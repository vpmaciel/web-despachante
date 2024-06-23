<?php

if (!isset($registro['cliente_id'])) {
    $registro['cliente_id'] = '';
}

if (!isset($registro['cliente_nome_completo'])) {
    $registro['cliente_nome_completo'] = '';
}

if (!isset($registro['cliente_cpf_cnpj'])) {
    $registro['cliente_cpf_cnpj'] = '';
}

if (!isset($registro['cliente_telefone'])) {
    $registro['cliente_telefone'] = '';
}

if (!isset($registro['cliente_email'])) {
    $registro['cliente_email'] = '';
}


echo open_table;

echo open_tr . open_th . 'Cliente'  . close_th . close_tr; 

require_once 'cliente-menu.php';

echo open_tr . open_td . $LINK . close_td . close_tr;

echo open_tr . open_td. open_label . 'Nome' . close_lable . close_td . close_tr; 

$input = '<input type="hidden" id="cliente_id" name="cliente_id" maxlength="50" value="' . $registro['cliente_id'] .'">';

echo $input;

$input = '<input type="text" id="cliente_nome_completo" name="cliente_nome_completo" maxlength="50" value="' . $registro['cliente_nome_completo'] .'">';

echo open_td . $input . close_td . close_tr;

echo open_tr . open_td. open_label . 'CPF | CNPJ' . close_lable . close_td . close_tr; 

$input = '<input type="text" id="cliente_cpf_cnpj" name="cliente_cpf_cnpj" minlength="14" maxlength="18" onkeypress="mascaraMutuario(this,cpfCnpj)" onblur="clearTimeout();" value="' . $registro['cliente_cpf_cnpj'] .'">';

echo open_tr . open_td. $input . close_td . close_tr;

echo open_tr . open_td. open_label . 'Telefone' . close_lable . close_td . close_tr; 

$input = '<input type="text" id="cliente_telefone" name="cliente_telefone" maxlength="15" onkeypress="mask(this, mphone);" value="' . $registro['cliente_telefone'] .'">';

echo open_tr . open_td. $input . close_td . close_tr;

echo open_tr . open_td. open_label . 'E-Mail' . close_lable . close_td . close_tr; 

$input = '<input type="text" id="cliente_email" name="cliente_email" maxlength="100"  value="' . $registro['cliente_email'] .'">';

echo open_tr . open_td. $input . close_td . close_tr;

echo open_tr . open_td. open_label . $numero_de_registros . ' registros cadastrados' . close_lable . close_td . close_tr; 