function confirmarExcluir() {
    // Exibe um diálogo de confirmação
    var resposta = confirm("Tem certeza de que deseja excluir?");

    // Se o usuário clicou em "OK", segue o link
    if (resposta) {
        return true;
    } else {
        // Se o usuário clicou em "Cancelar" ou fechou o diálogo, cancela o link
        return false;
    }
}

function formataCpfCnpj(valor) {
    // Remove caracteres não numéricos
    const cleanValue = valor.replace(/\D/g, '');

    // Verifica se é CPF (11 dígitos) ou CNPJ (14 dígitos)
    if (cleanValue.length === 11) {
        return formataCpf(cleanValue);
    } else if (cleanValue.length === 14) {
        return formataCnpj(cleanValue);
    } else {
        // Retorna o valor original se não for um CPF ou CNPJ válido
        return valor;
    }
}

function formataCpf(cpf) {
    // Aplica a formatação para CPF (###.###.###-##)
    return cpf.replace(/^(\d{3})(\d{3})(\d{3})(\d{2})$/, '$1.$2.$3-$4');
}

function formataCnpj(cnpj) {
    // Aplica a formatação para CNPJ (##.###.###/####-##)
    return cnpj.replace(/^(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})$/, '$1.$2.$3/$4-$5');
}

// Exemplos de uso:
console.log(formataCpfCnpj("12345678909")); // Retorna "123.456.789-09"
console.log(formataCpfCnpj("12345678000101")); // Retorna "12.345.678/0001-01"
