<?php

$input = '<input type="hidden" id="pedido_de_placa_id" name="pedido_de_placa_id" value="' . ($registro['pedido_de_placa_id'] ?? '') . '">';

echo open_tr . open_td . $input . close_td . close_tr;

$input = '<input type="hidden" id="pedido_de_placa_data" name="pedido_de_placa_data" value="' . ($registro['pedido_de_placa_data'] ?? '') . '">';


echo open_tr . open_td . $input . close_td . close_tr;

echo open_table;

echo open_tr . open_td_2 . open_label . 'Placa:' . close_lable . close_td;

$input = '<input type="text" id="pedido_de_placa_placa_veiculo" name="pedido_de_placa_placa_veiculo" maxlength="8" value="' . ($registro['pedido_de_placa_placa_veiculo'] ?? '') . '">';

echo open_td . $input . close_td . close_tr;

echo open_tr . open_td_2 . open_label . 'Quantidade:' . close_lable . close_td;

$input = '<input type="text" id="pedido_de_placa_quantidade" name="pedido_de_placa_quantidade" maxlength="1" value="' . ($registro['pedido_de_placa_quantidade'] ?? '') . '">';

echo open_td . $input . close_td . close_tr;

echo open_tr . open_td_2 . open_label . 'RENAVAM:' . close_lable . close_td;

$input = '<input type="text" id="pedido_de_placa_renavam" name="pedido_de_placa_renavam" maxlength="15" value="' . ($registro['pedido_de_placa_renavam'] ?? '') . '">';

echo open_td . $input . close_td . close_tr;

echo open_tr . open_td_2 . open_label . 'CPF | CNPJ do proprietário:' . close_lable . close_td;

$input = '<input type="text" id="pedido_de_placa_cpf_cnpj_proprietario" name="pedido_de_placa_cpf_cnpj_proprietario" minlength="11" maxlength="20" oninput="this.value = this.value.toUpperCase().replace(/[^A-Z0-9.\\-\\/]/g, \'\').slice(0, 20);" value="' . ($registro['pedido_de_placa_cpf_cnpj_proprietario'] ?? '') . '">';

echo open_td . $input . close_td . close_tr;

echo open_tr . open_td_2 . open_label . 'Cor da placa:' . close_lable . close_td;

$input = '<input type="text" id="pedido_de_placa_cor_placa" name="pedido_de_placa_cor_placa" maxlength="50" value="' . ($registro['pedido_de_placa_cor_placa'] ?? '') . '">';

echo open_td . $input . close_td . close_tr;

echo open_tr . open_td_2 . open_label . 'Tipo da placa:' . close_lable . close_td;

$input = '<input type="text" id="pedido_de_placa_tipo_placa" name="pedido_de_placa_tipo_placa" maxlength="50" value="' . ($registro['pedido_de_placa_tipo_placa'] ?? '') . '">';

echo open_td . $input . close_td . close_tr;

echo open_tr . open_td_2 . open_label . '' . close_lable . close_td;

echo open_td . $numero_de_registros . ' registros cadastrados'  . close_td . close_tr;

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
        var pedido_de_placa_placa_veiculo = document.getElementById("pedido_de_placa_placa_veiculo");
        var pedido_de_placa_cpf_cnpj_cliente = document.getElementById("pedido_de_placa_cpf_cnpj_cliente");

        // Verifica se a URL contém a palavra "cadastro"
        if (currentUrl.includes("cadastro")) {
            // Adiciona a propriedade required
            pedido_de_placa_placa_veiculo.setAttribute("required", "required");
            pedido_de_placa_cpf_cnpj_cliente.setAttribute("required", "required");
        } else {
            // Remove a propriedade required
            pedido_de_placa_placa_veiculo.removeAttribute("required");
            pedido_de_placa_cpf_cnpj_cliente.removeAttribute("required");
        }
    });
</script>