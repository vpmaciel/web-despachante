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

$input = '<input type="hidden" id="cliente_id" name="cliente_id" maxlength="50" value="' . $registro['cliente_id'] .'">';

echo $input;

echo open_table;

echo open_tr . open_td_2 . open_label . 'Nome:' . close_lable . close_td; 

$input = '<input type="text" id="cliente_nome_completo" name="cliente_nome_completo" maxlength="50" value="' . $registro['cliente_nome_completo'] .'">';

echo open_td . $input . close_td . close_tr;

echo open_tr . open_td_2 . open_label . 'CPF | CNPJ:' . close_lable . close_td; 

$input = '<input type="text" id="cliente_cpf_cnpj" name="cliente_cpf_cnpj" minlength="11" maxlength="20" oninput="this.value = this.value.toUpperCase().replace(/[^A-Z0-9.\\-\\/]/g, \'\').slice(0, 20);" onblur="clearTimeout();" value="' . $registro['cliente_cpf_cnpj'] .'">';

echo open_td . $input . close_td . close_tr;

echo open_tr . open_td_2 . open_label . 'Telefone:' . close_lable . close_td; 

$input = '<input type="text" id="cliente_telefone" name="cliente_telefone" maxlength="15" onkeypress="mask(this, mphone);" value="' . $registro['cliente_telefone'] .'">';

echo open_td . $input . close_td . close_tr;

echo open_tr . open_td_2 . open_label . 'E-Mail:' . close_lable . close_td; 

$input = '<input type="text" id="cliente_email" name="cliente_email" maxlength="100"  value="' . $registro['cliente_email'] .'">';

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
        var cliente_nome_completo = document.getElementById("cliente_nome_completo");
        var cliente_cpf_cnpj = document.getElementById("cliente_cpf_cnpj");
        
        // Verifica se a URL contém a palavra "cadastro"
        if (currentUrl.includes("cadastro")) {
            // Adiciona a propriedade required
            cliente_nome_completo.setAttribute("required", "required");
            cliente_cpf_cnpj.setAttribute("required", "required");
        } else {
            // Remove a propriedade required
            cliente_nome_completo.removeAttribute("required");
            cliente_cpf_cnpj.removeAttribute("required");
        }
    });
</script>