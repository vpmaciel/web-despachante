<?php

echo open_h1 . 'Serviço'  . close_h1; 

require_once 'servico-menu.php';

$input = '<input type="hidden" id="servico_id" name="servico_id" value="' . $registro['servico_id'] .'">';

echo $input;

$input = '<input type="hidden" id="servico_data" name="servico_data" value="' . $registro['servico_data'] .'">';

echo $input;

echo open_table;

echo open_tr . open_td_2. open_label . 'Placa do veículo' . close_lable . close_td; 

$input = '<input type="text" id="servico_placa_veiculo" name="servico_placa_veiculo" maxlength="8" value="' . $registro['servico_placa_veiculo'] .'">';

echo open_td . $input . close_td . close_tr;

echo open_tr . open_td_2. open_label . 'Valor (R$)' . close_lable . close_td; 

$input = '<input type="text" id="servico_valor" name="servico_valor" value="' . $registro['servico_valor'] .'">';

echo open_td. $input . close_td . close_tr;

echo open_tr . open_td_2. open_label . 'Descrição' . close_lable . close_td; 

$input = '<input type="text" id="servico_descricao" name="servico_descricao" maxlength="50" value="' . $registro['servico_descricao'] .'">';

echo open_td. $input . close_td . close_tr;

echo open_tr . open_td_2. open_label . 'CPF | CNPJ do cliente' . close_lable . close_td; 

$input = '<input type="text" id="servico_cpf_cnpj_cliente" name="servico_cpf_cnpj_cliente" minlength="14" maxlength="18" onkeypress="mascaraMutuario(this,cpfCnpj)" onblur="clearTimeout();"  value="' . $registro['servico_cpf_cnpj_cliente'] .'">';

echo open_td. $input . close_td . close_tr;

echo open_tr . open_td_2. open_label . 'Nome do cliente' . close_lable . close_td; 

$input = '<input type="text" id="servico_nome_cliente" name="servico_nome_cliente" maxlength="50" value="' . $registro['servico_nome_cliente'] .'">';

echo open_td. $input . close_td . close_tr;

echo open_tr . open_td_2. open_label . 'Telefone do cliente' . close_lable . close_td; 

$input = '<input type="text" id="servico_telefone_cliente" name="servico_telefone_cliente" maxlength="15" onkeypress="mask(this, mphone);" value="' . $registro['servico_telefone_cliente'] .'">';

echo open_td. $input . close_td . close_tr;

echo close_table;

echo '<br>';

echo open_label . '<label id="resultado_servico_cpf_cnpj_cliente"></label>' . close_lable; 

echo '<br>';
echo '<br>';

echo $numero_de_registros . ' registros cadastrados'; 

echo '<br>';

echo '<br>';