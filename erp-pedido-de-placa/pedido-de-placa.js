document.addEventListener("DOMContentLoaded", function () {

    const form = document.querySelector("form");
    if (!form) return;

    const currentUrl = window.location.href;
    const ehCadastro = currentUrl.includes("cadastro");

    if (!ehCadastro) return;

    const placaVeiculo = document.getElementById("pedido_de_placa_placa_veiculo");
    const placaQuantidade = document.getElementById("pedido_de_placa_quantidade");
    const renavam = document.getElementById("pedido_de_placa_renavam");
    const cpfCnpjProprietario = document.getElementById("pedido_de_placa_cpf_cnpj_proprietario");
    const corPlaca = document.getElementById("pedido_de_placa_cor_placa");
    const tipoPlaca = document.getElementById("pedido_de_placa_tipo_placa");    

    const validator = new Validator(form);

    validator.add(() => Validator.validarPlaca(placaVeiculo, true, 'PLACA DO VEÍCULO: '));
    validator.add(() => Validator.validarNumero(placaQuantidade, true, 'QUANTIDADE DE PLACAS: '));
    validator.add(() => Validator.validarNumero(renavam, true, 'RENAVAM:'));
    validator.add(() => Validator.validarCpfCnpj(cpfCnpjProprietario, true, 'CPF | CNPJ DO PROPRIETÁRIO: '));
    validator.add(() => Validator.validarNome(corPlaca, true, 'COR DA PLACA: '));
    validator.add(() => Validator.validarNome(tipoPlaca, true, 'TIPO DE PLACA: '));

    form.addEventListener("submit", function (e) {
        if (!validator.run()) {
            e.preventDefault();
        }
    });

});
