<?php

// Definir o tempo de expiração do cookie (1 hora a partir de agora)
$expiration = time() + 3600;

// Criar o cookie
setcookie('veiculo_id', $registro['veiculo_id'], $expiration, '/');

$input = '<input type="hidden" id="veiculo_id" name="veiculo_id" maxlength="7" value="' . ($registro['veiculo_id'] ?? '') . '">';

echo $input;

echo open_table;

echo open_tr . open_td_2 . open_label . 'Placa:' . close_lable . close_td; 

$input = '<input type="text" id="veiculo_placa" name="veiculo_placa" maxlength="8" value="' . ($registro['veiculo_placa'] ?? '') . '">';

echo open_td . $input . close_td . close_tr;

echo open_tr . open_td_2 . open_label . 'CPF | CNPJ do proprietário:' . close_lable . close_td; 

$input = '<input type="text" id="veiculo_cpf_cnpj_proprietario" name="veiculo_cpf_cnpj_proprietario" minlength="11" maxlength="20" oninput="this.value = this.value.toUpperCase().replace(/[^A-Z0-9.\\-\\/]/g, \'\').slice(0, 20);" onblur="clearTimeout();" value="' . ($registro['veiculo_cpf_cnpj_proprietario'] ?? '') . '">';

echo open_td . $input . close_td . close_tr;

echo open_tr . open_td_2 . open_label . 'Nome do proprietário:' . close_lable . close_td; 

$input = '<input type="text" id="veiculo_nome_proprietario" name="veiculo_nome_proprietario" maxlength="50" value="' . ($registro['veiculo_nome_proprietario'] ?? '') . '">';

echo open_td . $input . close_td . close_tr;

echo open_tr . open_td_2 . open_label . 'Marca do veículo:' . close_lable . close_td; 

$input = '<input type="text" id="veiculo_marca" name="veiculo_marca" maxlength="50" value="' . ($registro['veiculo_marca'] ?? '') . '">';

echo open_td . $input . close_td . close_tr;

echo open_tr . open_td_2 . open_label . 'Modelo do veículo:' . close_lable . close_td; 

$input = '<input type="text" id="veiculo_modelo" name="veiculo_modelo" maxlength="50" value="' . ($registro['veiculo_modelo'] ?? '') . '">';

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
        var veiculo_cpf_cnpj_proprietario = document.getElementById("veiculo_cpf_cnpj_proprietario");
        var veiculo_placa = document.getElementById("veiculo_placa");
        
        // Verifica se a URL contém a palavra "cadastro"
        if (currentUrl.includes("cadastro")) {
            // Adiciona a propriedade required
            veiculo_cpf_cnpj_proprietario.setAttribute("required", "required");
            veiculo_placa.setAttribute("required", "required");
        } else {
            // Remove a propriedade required
            veiculo_cpf_cnpj_proprietario.removeAttribute("required");
            veiculo_placa.removeAttribute("required");
        }
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const urlParams = new URLSearchParams(window.location.search);
        const erro = urlParams.get("erro");
        let submitClicked = false; // Variável de controle

        // Captura o clique no botão de submit
        document.querySelectorAll("input[type='submit']").forEach(button => {
            button.addEventListener("click", function () {
                submitClicked = true;
            });
        });

        // Exibe o alert após 2 segundos, se o botão submit NÃO foi clicado
        setTimeout(function () {
            if (erro && !submitClicked) {
                alert(decodeURIComponent(erro));
            }
        }, 2000);
    });
</script>
