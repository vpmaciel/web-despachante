<?php
echo open_tr . open_th . 'Veículo'  . close_th . close_tr; 

require_once 'veiculo-menu.php';

echo open_td . $LINK . close_td . close_tr;

$input = '<input type="hidden" id="veiculo_id" name="veiculo_id" maxlength="7" value="' . $registro['veiculo_id'] .'">';

echo open_td . $input . close_td . close_tr;

echo open_tr . open_td. open_label . 'Placa' . close_lable . close_td . close_tr; 

$input = '<input type="text" id="veiculo_placa" name="veiculo_placa" maxlength="8" value="' . $registro['veiculo_placa'] .'">';

echo open_td . $input . close_td . close_tr;

echo open_tr . open_td. open_label . 'CPF | CNPJ do proprietário' . close_lable . close_td . close_tr; 

$input = '<input type="text" id="veiculo_cpf_cnpj_proprietario" name="veiculo_cpf_cnpj_proprietario" minlength="14" maxlength="18" onkeypress="mascaraMutuario(this,cpfCnpj)" onblur="clearTimeout();" value="' . $registro['veiculo_cpf_cnpj_proprietario'] .'">';

echo open_tr . open_td. $input . close_td . close_tr;

echo open_tr . open_td. open_label . 'Nome do proprietário' . close_lable . close_td . close_tr; 

$input = '<input type="text" id="veiculo_nome_proprietario" name="veiculo_nome_proprietario" maxlength="50" value="' . $registro['veiculo_nome_proprietario'] .'">';

echo open_tr . open_td. $input . close_td . close_tr;

echo open_tr . open_td. open_label . 'Marca do veículo' . close_lable . close_td . close_tr; 

$input = '<input type="text" id="veiculo_marca" name="veiculo_marca" maxlength="50" value="' . $registro['veiculo_marca'] .'">';

echo open_tr . open_td. $input . close_td . close_tr;

echo open_tr . open_td. open_label . 'Modelo do veículo' . close_lable . close_td . close_tr; 

$input = '<input type="text" id="veiculo_modelo" name="veiculo_modelo" maxlength="50" value="' . $registro['veiculo_modelo'] .'">';

echo open_tr . open_td. $input . close_td . close_tr;

echo open_tr . open_td. open_label . $numero_de_registros . ' registros cadastrados' . close_lable . close_td . close_tr; 