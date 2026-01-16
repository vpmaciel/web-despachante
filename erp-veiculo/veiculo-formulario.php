<?php

$input = '<input type="hidden" id="veiculo_id" name="veiculo_id" value="' . ($registro['veiculo_id'] ?? '') . '">';

echo $input;

echo open_table;

echo open_tr . open_td . open_label . 'Placa:' . close_lable . close_td . close_tr;

$input = '<input type="text" id="veiculo_placa" name="veiculo_placa" maxlength="10" value="' . ($registro['veiculo_placa'] ?? '') . '">';

echo open_tr . open_td . $input . close_td . close_tr;

echo open_tr . open_td . open_label . 'CPF | CNPJ do proprietário:' . close_lable . close_td . close_tr;

$input = '<input type="text" id="veiculo_cpf_cnpj_proprietario" name="veiculo_cpf_cnpj_proprietario" maxlength="14" value="' . ($registro['veiculo_cpf_cnpj_proprietario'] ?? '') . '">';

echo open_tr . open_td . $input . close_td . close_tr;

echo open_tr . open_td . open_label . 'Nome do proprietário:' . close_lable . close_td . close_tr;

$input = '<input type="text" id="veiculo_nome_proprietario" name="veiculo_nome_proprietario" maxlength="100" value="' . ($registro['veiculo_nome_proprietario'] ?? '') . '">';

echo open_tr . open_td . $input . close_td . close_tr;

echo open_tr . open_td . open_label . 'Marca do veículo:' . close_lable . close_td . close_tr;

$input = '<input type="text" id="veiculo_marca" name="veiculo_marca" maxlength="50" value="' . ($registro['veiculo_marca'] ?? '') . '">';

echo open_tr . open_td . $input . close_td . close_tr;

echo open_tr . open_td . open_label . 'Modelo do veículo:' . close_lable . close_td . close_tr;

$input = '<input type="text" id="veiculo_modelo" name="veiculo_modelo" maxlength="50" value="' . ($registro['veiculo_modelo'] ?? '') . '">';

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

<script src="veiculo.js"></script>