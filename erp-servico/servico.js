document.addEventListener("DOMContentLoaded", function () {

    const form = document.querySelector("form");
    if (!form) return;

    const currentUrl = window.location.href;
    const ehCadastro = currentUrl.includes("cadastro");

    if (!ehCadastro) return;

    const placaVeiculo = document.getElementById("servico_placa_veiculo");
    const placaQuantidade = document.getElementById("servico_valor");
    const renavam = document.getElementById("servico_descricao");
    const cpfCnpjProprietario = document.getElementById("servico_cpf_cnpj_cliente");
    const corPlaca = document.getElementById("servico_telefone_cliente");       

    const validator = new Validator(form);

    validator.add(() => Validator.validarPlaca(placaVeiculo, true, 'Placa do Veículo:'));
    validator.add(() => Validator.validarNumero(placaQuantidade, true, 'Quantidade de Placas:'));
    validator.add(() => Validator.validarNumero(renavam, true, 'RENAVAM:'));
    validator.add(() => Validator.validarCpfCnpj(cpfCnpjProprietario, true, 'CPF | CNPJ do Proprietário:'));
    validator.add(() => Validator.validarNome(corPlaca, true, 'Cor da Placa:'));
    validator.add(() => Validator.validarNome(tipoPlaca, true, 'Tipo de Placa:'));

    form.addEventListener("submit", function (e) {
        if (!validator.run()) {
            e.preventDefault();
        }
    });

});


document.addEventListener('DOMContentLoaded', function () {

    let delayTimer;
    const input = document.getElementById('servico_cpf_cnpj_cliente');

    if (!input) return;

    input.addEventListener('input', function () {

        clearTimeout(delayTimer);

        delayTimer = setTimeout(function () {

            const valor = input.value;

            $.ajax({
                url: '../erp-cliente/cliente-consulta.php',
                type: 'POST',
                dataType: 'json',
                data: {
                    servico_cpf_cnpj_cliente: valor
                },
                success: function (data) {

                    if (Array.isArray(data) && data.length > 0) {
                        $('#resultado_servico_cpf_cnpj_cliente')
                            .text('Nome do cliente: ' + data[0].cliente_nome);
                    } else {
                        $('#resultado_servico_cpf_cnpj_cliente')
                            .text('Nenhum cliente encontrado ddado o CPF/CNPJ informado.');
                    }
                },
                error: function (err) {
                    console.error('Erro na requisição Ajax:', err);
                }
            });

        }, 300);
    });

});

