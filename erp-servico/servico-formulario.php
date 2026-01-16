<?php

$input = '<input type="hidden" id="servico_id" name="servico_id" value="' . ($registro['servico_id'] ?? '') . '">';

echo $input;

$input = '<input type="hidden" id="servico_data" name="servico_data" value="' . ($registro['servico_data'] ?? '') . '">';

echo $input;

echo open_table;

echo open_tr . open_td . open_label . 'Placa do veículo:' . close_lable . close_td . close_tr;

$input = '<input type="text" id="servico_placa_veiculo" name="servico_placa_veiculo" maxlength="10" value="' . ($registro['servico_placa_veiculo'] ?? '') . '">';

echo open_tr . open_td . $input . close_td . close_tr;

echo open_tr . open_td . open_label . 'Valor (R$):' . close_lable . close_td . close_tr;

$input = '<input type="text" id="servico_valor" name="servico_valor" value="' . ($registro['servico_valor'] ?? '') . '">';

echo open_tr . open_td . $input . close_td . close_tr;

echo open_tr . open_td . open_label . 'Descrição:' . close_lable . close_td . close_tr;

$input = '<input type="text" id="servico_descricao" name="servico_descricao" maxlength="100" value="' . ($registro['servico_descricao'] ?? '') . '">';

echo open_tr . open_td . $input . close_td . close_tr;

echo open_tr . open_td . open_label . 'CPF | CNPJ do cliente:' . close_lable . close_td . close_tr;

$input = '<input type="text" id="servico_cpf_cnpj_cliente" name="servico_cpf_cnpj_cliente" maxlength="14" value="' . ($registro['servico_cpf_cnpj_cliente'] ?? '') . '">';

echo open_tr . open_td . $input . close_td . close_tr;

$input = '<label id="resultado_servico_cpf_cnpj_cliente" name="resultado_servico_cpf_cnpj_cliente"></label>';

echo open_tr . open_td . $input . close_td     . close_tr;

echo open_tr . open_td . open_label . 'Telefone do cliente:' . close_lable . close_td . close_tr;

$input = '<input type="text" id="servico_telefone_cliente" name="servico_telefone_cliente" maxlength="15" value="' . ($registro['servico_telefone_cliente'] ?? '') . '">';

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

<script src="servico.js"></script>