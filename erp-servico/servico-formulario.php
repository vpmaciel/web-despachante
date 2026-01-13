<?php

// Definir o tempo de expiração do cookie (1 hora a partir de agora)
$expiration = time() + 3600;

// Criar o cookie
setcookie('servico_id', $registro['servico_id'], $expiration, '/');

$input = '<input type="hidden" id="servico_id" name="servico_id" value="' . ($registro['servico_id'] ?? '') . '">';

echo $input;

$input = '<input type="hidden" id="servico_data" name="servico_data" value="' . ($registro['servico_data'] ?? '') . '">';

echo $input;

echo open_table;

echo open_tr . open_td_2 . open_label . 'Placa do veículo:' . close_lable . close_td; 

$input = '<input type="text" id="servico_placa_veiculo" name="servico_placa_veiculo" maxlength="8" value="' . ($registro['servico_placa_veiculo'] ?? '') . '">';

echo open_td . $input . close_td . close_tr;

echo open_tr . open_td_2 . open_label . 'Valor (R$):' . close_lable . close_td; 

$input = '<input type="text" id="servico_valor" name="servico_valor" value="' . ($registro['servico_valor'] ?? '') . '">';

echo open_td . $input . close_td . close_tr;

echo open_tr . open_td_2 . open_label . 'Descrição:' . close_lable . close_td; 

$input = '<input type="text" id="servico_descricao" name="servico_descricao" maxlength="50" value="' . ($registro['servico_descricao'] ?? '') . '">';

echo open_td . $input . close_td . close_tr;

echo open_tr . open_td_2 . open_label . 'CPF | CNPJ do cliente:' . close_lable . close_td; 

$input = '<input type="text" id="servico_cpf_cnpj_cliente" name="servico_cpf_cnpj_cliente" minlength="11" maxlength="20" oninput="this.value = this.value.toUpperCase().replace(/[^A-Z0-9.\\-\\/]/g, \'\').slice(0, 20);" onblur="clearTimeout();" value="' . ($registro['servico_cpf_cnpj_cliente'] ?? '') . '">';

echo open_td . $input . close_td . close_tr;

echo open_tr . open_td_2 . open_label . 'Nome do cliente:' . close_lable . close_td; 

$input = '<label id="resultado_servico_cpf_cnpj_cliente" name="resultado_servico_cpf_cnpj_cliente"></label>';

echo open_td . $input . close_td     . close_tr;

echo open_tr . open_td_2 . open_label . 'Telefone do cliente:' . close_lable . close_td; 

$input = '<input type="text" id="servico_telefone_cliente" name="servico_telefone_cliente" maxlength="15" onkeypress="mask(this, mphone);" value="' . ($registro['servico_telefone_cliente'] ?? '') . '">';

echo open_td . $input . close_td . close_tr;

echo open_tr . open_td_2 . open_label . '' . close_lable . close_td; 

echo open_td . $numero_de_registros . ' registros cadastrados' . close_td . close_tr;

echo open_tr . open_td_2 . open_label . '' . close_lable . close_td;


if (strpos($_SERVER['REQUEST_URI'], 'cadastro') !== false) {
    $submit = '<input type="submit" value="Salvar">';
} else {
    $submit = '<input type="submit" value="Buscar">';
}

echo open_td . $submit . close_td . close_tr;

echo close_table;
?>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Obtém a URL atual
        var currentUrl = window.location.href;

        // Seleciona o elemento pelo ID
        var servico_descricao = document.getElementById("servico_descricao");
        var servico_cpf_cnpj_cliente = document.getElementById("servico_cpf_cnpj_cliente");
        
        // Verifica se a URL contém a palavra "cadastro"
        if (currentUrl.includes("cadastro")) {
            // Adiciona a propriedade required
            servico_descricao.setAttribute("required", "required");
            servico_cpf_cnpj_cliente.setAttribute("required", "required");
        } else {
            // Remove a propriedade required
            servico_descricao.removeAttribute("required");
            servico_cpf_cnpj_cliente.removeAttribute("required");
        }
    });
</script>