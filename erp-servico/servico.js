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

    validator.add(() => Validator.validarPlaca(placaVeiculo, true, 'PLACA DO VEÍCULO: '));
    validator.add(() => Validator.validarNumero(placaQuantidade, true, 'QUANTIDADE DE PLACAS: '));
    validator.add(() => Validator.validarNumero(renavam, true, 'RENAVAM: '));
    validator.add(() => Validator.validarCpfCnpj(cpfCnpjProprietario, true, 'CPF | CNPJ DO PROPRIETÁRIO: '));
    validator.add(() => Validator.validarNome(corPlaca, true, 'COR DA PLACA: '));
    validator.add(() => Validator.validarNome(tipoPlaca, true, 'TIPO DE PLACA: '));

    form.addEventListener("submit", function (e) {
        if (!validator.run()) {
            e.preventDefault();
        }
    });

});


document.addEventListener('DOMContentLoaded', function () {

    let delayTimer;
    const input = document.getElementById('servico_cpf_cnpj_cliente');
    const resultado = document.getElementById('resultado_servico_cpf_cnpj_cliente');

    if (!input || !resultado) return;

    input.addEventListener('input', function () {

        clearTimeout(delayTimer);

        delayTimer = setTimeout(function () {

            const valor = input.value.trim();

            if (valor.length < 11) {
                resultado.textContent = '';
                return;
            }

            $.ajax({
                url: '../erp-cliente/cliente-consulta.php',
                type: 'POST',
                dataType: 'json',
                data: {
                    servico_cpf_cnpj_cliente: valor
                },
                success: function (data) {

                    if (data && data.cliente_nome) {
                        resultado.textContent = 'NOME DO CLIENTE: ' + data.cliente_nome;
                    } else {
                        resultado.textContent =
                            'Nenhum cliente encontrado dado o CPF/CNPJ informado.';
                    }
                },
                error: function (err) {
                    console.error('Erro na requisição Ajax:', err);
                }
            });

        }, 300);
    });

});
