document.addEventListener("DOMContentLoaded", function () {
    // Obtém a URL atual
    var currentUrl = window.location.href;
    
    // Seleciona os elementos pelo ID
    var cliente_nome_completo = document.getElementById("cliente_nome_completo");
    var cliente_cpf_cnpj = document.getElementById("cliente_cpf_cnpj");

    // Garante que os elementos existem (evita erro JS)
    if (!cliente_nome_completo || !cliente_cpf_cnpj) {
        return;
    }

    // Verifica se a URL contém a palavra "cadastro"
    if (currentUrl.includes("cadastro")) {
        cliente_nome_completo.setAttribute("required", "required");
        cliente_cpf_cnpj.setAttribute("required", "required");
    } else {
        cliente_nome_completo.removeAttribute("required");
        cliente_cpf_cnpj.removeAttribute("required");
    }
});
