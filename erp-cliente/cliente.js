document.addEventListener("DOMContentLoaded", function () {

    const form = document.querySelector("form");
    if (!form) return;

    const currentUrl = window.location.href;
    const ehCadastro = currentUrl.includes("cadastro");

    if (!ehCadastro) return;

    const cpfCnpj = document.getElementById("cliente_cpf_cnpj");
    const telefone = document.getElementById("cliente_telefone");
    const email = document.getElementById("cliente_email");
    const nome = document.getElementById("cliente_nome_completo");

    const validator = new Validator(form);

    validator.add(() => Validator.validarNome(nome));
    validator.add(() => Validator.validarCpfCnpj(cpfCnpj));
    validator.add(() => Validator.validarTelefone(telefone));
    validator.add(() => Validator.validarEmail(email));

    form.addEventListener("submit", function (e) {
        if (!validator.run()) {
            e.preventDefault();
        }
    });

});
