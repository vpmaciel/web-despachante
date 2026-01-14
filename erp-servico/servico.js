alert("cliente.js carregado");

document.addEventListener("DOMContentLoaded", function () {
    // Controle de required conforme URL
    var currentUrl = window.location.href;

    var servico_descricao = document.getElementById("servico_descricao");
    var servico_cpf_cnpj_cliente = document.getElementById("servico_cpf_cnpj_cliente");

    if (!servico_descricao || !servico_cpf_cnpj_cliente) {
        return;
    }

    if (currentUrl.includes("cadastro")) {
        servico_descricao.setAttribute("required", "required");
        servico_cpf_cnpj_cliente.setAttribute("required", "required");
    } else {
        servico_descricao.removeAttribute("required");
        servico_cpf_cnpj_cliente.removeAttribute("required");
    }
});

document.addEventListener("DOMContentLoaded", function () {
    const cpfInput = document.getElementById("servico_cpf_cnpj_cliente");
    const resultadoLabel = document.getElementById("resultado_servico_cpf_cnpj_cliente");

    if (!cpfInput || !resultadoLabel) {
        return;
    }

   cpfInput.addEventListener("blur", function () {
    const cpfCnpj = cpfInput.value.trim();

    if (cpfCnpj === "") {
        resultadoLabel.textContent = "";
        return;
    }

    fetch("/web-despachante/erp-cliente/cliente-consulta.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded"
        },
        body: "servico_cpf_cnpj_cliente=" + encodeURIComponent(cpfCnpj)
    })
    .then(response => response.text())
    .then(text => {
        const data = JSON.parse(text);
        resultadoLabel.textContent =
            data?.cliente_nome_completo ?? "Cliente não encontrado";
    })
    .catch(err => {
        console.error(err);
        resultadoLabel.textContent = "Erro na consulta";
    });
});

});
