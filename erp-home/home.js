document.addEventListener("DOMContentLoaded", function () {

    const form = document.querySelector("form");
    if (!form) return;

    const currentUrl = window.location.href;
    const ehCadastro = currentUrl.includes("cadastro");

    if (!ehCadastro) return;
    
    const nome = document.getElementById("cliente_nome");
    const cpfCnpj = document.getElementById("cliente_cpf_cnpj");
    const telefone = document.getElementById("cliente_telefone");
    const email = document.getElementById("cliente_email");
    

    const validator = new Validator(form);

    validator.add(() => Validator.validarNome(nome, true, 'NOME: '));
    validator.add(() => Validator.validarCpfCnpj(cpfCnpj, true, 'CPF | CNPJ DO CLIENTE: '));
    validator.add(() => Validator.validarTelefone(telefone, false, 'TELEFONE: '));
    validator.add(() => Validator.validarEmail(email, false, 'E-MAIL: '));

    form.addEventListener("submit", function (e) {
        if (!validator.run()) {
            e.preventDefault();
        }
    });

});
