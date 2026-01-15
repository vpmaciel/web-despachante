class Validator {

    constructor(form) {
        this.form = form;
        this.rules = [];
    }

    add(ruleFn) {
        this.rules.push(ruleFn);
    }

    run() {
        for (let rule of this.rules) {
            if (!rule()) {
                return false;
            }
        }
        return true;
    }

    static alerta(mensagem) {
        Swal.fire({
            icon: 'warning',
            title: 'web-despachante',
            text: mensagem,
            confirmButtonText: 'OK',
            confirmButtonColor: '#579EBB'
        });
    }

    // ===== VALIDADORES PRONTOS =====

    static validarNome(input) {
        const valor = input.value.trim();

        if (valor === '') {
            Validator.alerta('Nome. Campo obrigatório.');
            input.focus();
            return false;
        }

        const limpo = valor.toUpperCase().replace(/[^A-Z0-9]/g, ' ');

        input.value = limpo;
        return true;
    }

    static validarCpfCnpj(input) {
        const valor = input.value.trim();

        if (valor === '') {
            Validator.alerta('CPF | CNPJ. Campo obrigatório.');
            return false;
        }

        const limpo = valor.toUpperCase().replace(/[^A-Z0-9]/g, '');

        if (limpo.length !== 11 && limpo.length !== 14) {
            Validator.alerta('CPF | CNPJ inválido. Deve conter 11 ou 14 caracteres.');
            input.value = '';
            input.focus();
            return false;
        }

        input.value = limpo;
        return true;
    }

    static validarTelefone(input) {
        const valor = input.value.trim();

        if (valor === '') return true;

        if (!/^\d+$/.test(valor)) {
            Validator.alerta('Telefone deve conter apenas números');
            input.value = '';
            input.focus();
            return false;
        }

        return true;
    }

    static validarEmail(input) {
        const valor = input.value.trim();

        if (valor === '') return true;

        const email = valor.toLowerCase();
        const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        if (!regex.test(email)) {
            Validator.alerta('E-mail inválido');
            input.value = '';
            input.focus();
            return false;
        }

        input.value = email;
        return true;
    }

}
