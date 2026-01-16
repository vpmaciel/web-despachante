<?php

$input = '<input type="hidden" id="cliente_id" name="cliente_id" value="' . ($registro['cliente_id'] ?? '') . '">';

echo $input;

echo open_table;

echo open_tr . open_td . open_label . 'Nome:' . close_lable . close_td . close_tr;

$input = '<input type="text" id="cliente_nome" name="cliente_nome" maxlength="100" value="' . ($registro['cliente_nome'] ?? '') . '">';

echo open_tr . open_td . $input . close_td . close_tr;

echo open_tr . open_td . open_label . 'CPF | CNPJ:' . close_lable . close_td . close_tr;

$input = '<input type="text" id="cliente_cpf_cnpj" name="cliente_cpf_cnpj" maxlength="14" value="' . ($registro['cliente_cpf_cnpj'] ?? '') . '">';

echo open_tr . open_td . $input . close_td . close_tr;

echo open_tr . open_td . open_label . 'Telefone:' . close_lable . close_td . close_tr;

$input = '<input type="text" id="cliente_telefone" name="cliente_telefone" maxlength="15" value="' . ($registro['cliente_telefone'] ?? '') . '">';

echo open_tr . open_td . $input . close_td . close_tr;

echo open_tr . open_td . open_label . 'E-Mail:' . close_lable . close_td . close_tr;

$input = '<input type="text" id="cliente_email" name="cliente_email" maxlength="100" value="' . ($registro['cliente_email'] ?? '') . '">';

echo open_tr . open_td . $input . close_td . close_tr;

echo open_tr . open_td . open_label . '' . close_lable . close_td . close_tr;

echo open_tr . open_td . $numero_de_registros . ' registros cadastrados' . close_td . close_tr;

echo open_tr . open_td . open_label . '' . close_lable . close_td . close_tr;

if (strpos($_SERVER['REQUEST_URI'], 'cadastro') !== false) {
    $submit = '<input type="submit" value="Salvar">';
} else {
    $submit = '<input type="submit" value="Buscar">';
}

echo open_tr . open_td . $submit . close_td . close_tr;

echo close_table;
?>