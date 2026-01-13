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