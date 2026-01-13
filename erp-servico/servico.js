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

document.addEventListener("DOMContentLoaded", function() {
    const urlParams = new URLSearchParams(window.location.search);
    const erro = urlParams.get("erro");
    let submitClicked = false; // Variável de controle

    // Captura o clique no botão de submit
    document.querySelectorAll("input[type='submit']").forEach(button => {
        button.addEventListener("click", function() {
            submitClicked = true;
        });
    });

    // Exibe o alert após 2 segundos, se o botão submit NÃO foi clicado
    setTimeout(function() {
        if (erro && !submitClicked) {
            alert(decodeURIComponent(erro));
        }
    }, 2000);
});