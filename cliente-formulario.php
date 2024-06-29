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

echo open_h1 . 'Cliente'  . close_h1; 

require_once 'cliente-menu.php';

$input = '<input type="hidden" id="cliente_id" name="cliente_id" maxlength="50" value="' . $registro['cliente_id'] .'">';

echo $input;

echo open_table;

echo open_tr . open_td_2 . open_label . '' . close_lable . close_td; 

echo open_td . $link . close_td . close_tr;

echo open_tr . open_td_2 . open_label . 'Nome' . close_lable . close_td; 

$input = '<input type="text" id="cliente_nome_completo" name="cliente_nome_completo" maxlength="50" value="' . $registro['cliente_nome_completo'] .'">';

echo open_td . $input . close_td . close_tr;

echo open_tr . open_td_2 . open_label . 'CPF | CNPJ' . close_lable . close_td; 

$input = '<input type="text" id="cliente_cpf_cnpj" name="cliente_cpf_cnpj" minlength="14" maxlength="18" onkeypress="mascaraMutuario(this,cpfCnpj)" onblur="clearTimeout();" value="' . $registro['cliente_cpf_cnpj'] .'">';

echo open_td . $input . close_td . close_tr;

echo open_tr . open_td_2 . open_label . 'Telefone' . close_lable . close_td; 

$input = '<input type="text" id="cliente_telefone" name="cliente_telefone" maxlength="15" onkeypress="mask(this, mphone);" value="' . $registro['cliente_telefone'] .'">';

echo open_td . $input . close_td . close_tr;

echo open_tr . open_td_2 . open_label . 'E-Mail' . close_lable . close_td; 

$input = '<input type="text" id="cliente_email" name="cliente_email" maxlength="100"  value="' . $registro['cliente_email'] .'">';

echo open_td . $input . close_td . close_tr;

echo open_tr . open_td_2 . open_label . '' . close_lable . close_td; 

echo open_td . $numero_de_registros . ' registros cadastrados'  . close_td . close_tr;

echo open_tr . open_td_2 . open_label . '' . close_lable . close_td; 

$submit = '<input type="submit" value="Salvar">';

echo open_td . $submit . close_td . close_tr;

echo close_table;
echo '<br>';

echo '<br>';