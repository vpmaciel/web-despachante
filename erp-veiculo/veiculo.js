alert("JS carregado");
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

