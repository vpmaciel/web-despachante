document.addEventListener("DOMContentLoaded", function () {

    const form = document.querySelector("form");
    if (!form) return;

    const currentUrl = window.location.href;
    const ehCadastro = currentUrl.includes("cadastro");

    if (!ehCadastro) return;

    const placaVeiculo = document.getElementById("veiculo_placa");
    const cpfCnpjProprietario = document.getElementById("veiculo_cpf_cnpj_proprietario");
    const nomeProprietario = document.getElementById("veiculo_nome_proprietario");
    const marcaVeiculo = document.getElementById("veiculo_marca");
    const modeloVeiculo = document.getElementById("veiculo_modelo");

    const validator = new Validator(form);

    validator.add(() => Validator.validarPlaca(placaVeiculo, true, 'PLACA DO VEÍCUL: '));
    validator.add(() => Validator.validarNumero(cpfCnpjProprietario, false, 'CPF | CNPJ DO PROPRIETÁRIO: '));
    validator.add(() => Validator.validarNome(nomeProprietario, true, 'NOME DO PROPRIETÁRIO: '));
    validator.add(() => Validator.validarNome(marcaVeiculo, true, 'MARCA DO VEÍCULO: '));
    validator.add(() => Validator.validarNome(modeloVeiculo, true, 'MODELO DO VEÍCULO: '));
    
    form.addEventListener("submit", function (e) {
        if (!validator.run()) {
            e.preventDefault();
        }
    });

});
