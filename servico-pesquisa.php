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

$numero_de_registros = retornar_total_registros('servico');

$registro = array();

$registro['servico_id'] = '';
$registro['servico_data'] = '';
$registro['servico_placa_veiculo'] = '';
$registro['servico_valor'] = '';
$registro['servico_descricao'] = '';
$registro['servico_cpf_cnpj_cliente'] = '';
$registro['servico_nome_cliente'] = '';
$registro['servico_telefone_cliente'] = '';

$form_open = '<form action="servico-lista.php" method="post">';

echo $form_open;

echo open_table;

echo open_tr . open_th . 'Serviço'  . close_th . close_tr; 

require_once 'servico-menu.php';

echo open_tr . open_td . $LINK . close_td . close_tr;

$input = '<input type="hidden" id="servico_id" name="servico_id" value="' . $registro['servico_id'] .'">';

echo open_tr . open_td. $input . close_td . close_tr;

$input = '<input type="hidden" id="servico_data" name="servico_data" value="' . $registro['servico_data'] .'">';

echo open_tr . open_td. $input . close_td . close_tr;

echo open_tr . open_td. open_label . 'Placa do veículo' . close_lable . close_td . close_tr; 

$input = '<input type="text" id="servico_placa_veiculo" name="servico_placa_veiculo" maxlength="8" value="' . $registro['servico_placa_veiculo'] .'">';

echo open_td . $input . close_td . close_tr;

echo open_tr . open_td. open_label . 'Valor (R$)' . close_lable . close_td . close_tr; 

$input = '<input type="text" id="servico_valor" name="servico_valor" value="' . $registro['servico_valor'] .'">';

echo open_tr . open_td. $input . close_td . close_tr;

echo open_tr . open_td. open_label . 'Descrição' . close_lable . close_td . close_tr; 

$input = '<input type="text" id="servico_descricao" name="servico_descricao" maxlength="50" value="' . $registro['servico_descricao'] .'">';

echo open_tr . open_td. $input . close_td . close_tr;

echo open_tr . open_td. open_label . 'CPF | CNPJ do cliente' . close_lable . close_td . close_tr; 

$input = '<input type="text" id="servico_cpf_cnpj_cliente" name="servico_cpf_cnpj_cliente" minlength="14" maxlength="18" onkeypress="mascaraMutuario(this,cpfCnpj)" onblur="clearTimeout();"  value="' . $registro['servico_cpf_cnpj_cliente'] .'">';

echo open_tr . open_td. $input . close_td . close_tr;

echo open_tr . open_td. open_label . '<label id="resultado_servico_cpf_cnpj_cliente"></label>' . close_lable . close_td . close_tr; 

echo open_tr . open_td. open_label . 'Nome do cliente' . close_lable . close_td . close_tr; 

$input = '<input type="text" id="servico_nome_cliente" name="servico_nome_cliente" maxlength="50" value="' . $registro['servico_nome_cliente'] .'">';

echo open_tr . open_td. $input . close_td . close_tr;

echo open_tr . open_td. open_label . 'Telefone do cliente' . close_lable . close_td . close_tr; 

$input = '<input type="text" id="servico_telefone_cliente" name="servico_telefone_cliente" maxlength="15" onkeypress="mask(this, mphone);" value="' . $registro['servico_telefone_cliente'] .'">';

echo open_tr . open_td. $input . close_td . close_tr;

echo open_tr . open_td. open_label . $numero_de_registros . ' registros cadastrados' . close_lable . close_td . close_tr; 

$submit = '<input type="submit" value="Salvar">';

echo open_tr . open_td. $submit . close_td . close_tr;

echo close_table;

echo close_form;

echo close_div;

echo close_body;
	
echo close_html;

?>
<script>
        $(document).ready(function() {
            var delayTimer;

            // Função para validar o tamanho do campo
            function validarTamanho() {
                var campo = $('#servico_cpf_cnpj_cliente').val();
                var tamanhoValido = campo.length === 14 || campo.length === 18;

                if (!tamanhoValido) {
                    alert("CPF | CNPJ do cliente inválido");                    
                    campo.focus(); // Coloca o foco de volta no campo
                }
            }

            // Adiciona o evento blur para validar o tamanho quando o campo perde o foco
            $('#servico_cpf_cnpj_cliente').on('blur', function() {
                validarTamanho();
            });
        });
    </script>