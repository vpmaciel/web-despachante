document.addEventListener("DOMContentLoaded", function () {


    var form = document.querySelector("form");

    var currentUrl = window.location.href;

    var cliente_nome_completo = document.getElementById("cliente_nome_completo");
    var cliente_cpf_cnpj = document.getElementById("cliente_cpf_cnpj");
    var cliente_telefone = document.getElementById("cliente_telefone");
    var cliente_email = document.getElementById("cliente_email");

    if (!form) return;

    // Garante que os elementos existem
    if (!cliente_nome_completo || !cliente_cpf_cnpj|| !cliente_telefone|| !cliente_email) {
        alert("objetos não encontrados no cliente.js");
        return;
    }

    // Verifica se a URL contém "cadastro"
    if (!currentUrl.includes("cadastro")) {
        return true;
    } 

    // ===== FUNÇÕES DE VALIDAÇÃO =====

    function validarTelefone() {
        if (!cliente_telefone) return true;

        var telefone = cliente_telefone.value.replace(/\D/g, '');

        if (telefone.length !== 10 && telefone.length !== 11) {
            alert("Telefone inválido");
            cliente_telefone.value = '';
            cliente_telefone.focus();
            return false;
        }

        cliente_telefone.value = telefone;
        return true;
    }

    function validarCpfCnpj() {
        if (!cliente_cpf_cnpj) return true;

        var valor = cliente_cpf_cnpj.value
            .toUpperCase()
            .replace(/[^A-Z0-9]/g, '');

        if (valor.length !== 11 && valor.length !== 14) {
            alert("CPF ou CNPJ inválido");
            cliente_cpf_cnpj.value = '';
            cliente_cpf_cnpj.focus();
            return false;
        }

        cliente_cpf_cnpj.value = valor;
        return true;
    }

    function validarEmail() {
        if (!cliente_email) return true;

        var email = cliente_email.value
            .toLowerCase()
            .replace(/[^a-z0-9@._-]/g, '');

        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        if (!emailRegex.test(email)) {
            alert("E-mail inválido");
            cliente_email.value = '';
            cliente_email.focus();
            return false;
        }

        cliente_email.value = email;
        return true;
    }

    // ===== INTERCEPTA O SUBMIT =====

    form.addEventListener("submit", function (e) {

        if (!validarTelefone()) {
            e.preventDefault();
            return;
        }

        if (!validarCpfCnpj()) {
            e.preventDefault();
            return;
        }

        if (!validarEmail()) {
            e.preventDefault();
            return;
        }

        // Se chegou aqui, o submit é liberado
    });

});
