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

static validarNome(input, obrigatorio = true, campo) {    
    const valor = input.value.trim();

    // Campo obrigatório
    if (valor === '' && obrigatorio) {
        Validator.alerta(campo + ' campo obrigatório.');
        input.focus();
        return false;
    }

    // Não obrigatório e vazio → válido
    if (valor === '') {
        return true;
    }

    // Permitidos: letras, números, espaço, hífen e &
    const regexPermitido = /^[A-Za-zÀ-ú0-9\- &]+$/;

    if (!regexPermitido.test(valor)) {
        Validator.alerta(campo + ' com valor inválido.');        
        input.focus();
        return false;
    }

    // Normalização
    const limpo = valor
        .toUpperCase()
        .replace(/[^A-ZÀ-Ú0-9\- &]/g, ' ')
        .replace(/\s+/g, ' ')
        .trim();

    input.value = limpo;
    return true;
}


    static validarCpfCnpj(input, obrigatorio = true, campo) {
        
        const valor = input.value.trim();

        // Campo obrigatório
        if (valor === '' && obrigatorio) {
            Validator.alerta(campo + ' campo obrigatório.');
            input.focus();
            return false;
        }

        // Não obrigatório e vazio → válido
        if (valor === '') {
            return true;
        }
        const limpo = valor.toUpperCase().replace(/[^A-Z0-9]/g, '');

        if (limpo.length !== 11 && limpo.length !== 14) {
            Validator.alerta(campo + ' com valor inválido.');            
            input.focus();
            return false;
        }

        input.value = limpo;
        return true;
    }

    static validarNumero(input, obrigatorio = true, campo) {
        const valor = input.value.trim();

        // Campo obrigatório
        if (valor === '' && obrigatorio) {
            Validator.alerta(campo + ' campo obrigatório.');
            input.focus();
            return false;
        }

        // Não obrigatório e vazio → válido
        if (valor === '') {
            return true;
        }

        // Esta regex permite números com pontos de milhar e vírgula decimal
        if (!/^(?:\d+|\d{1,3}(?:\.\d{3})+)(?:,\d{1,2})?$/.test(valor)) {
            Validator.alerta(campo + ' com valor inválido.');            
            input.focus();
            return false;
        }

        return true;
    }

    
    static validarTelefone(input, obrigatorio = true, campo) {
        const valor = input.value.trim();

        // Campo obrigatório
        if (valor === '' && obrigatorio) {
            Validator.alerta(campo + ' campo obrigatório.');
            input.focus();
            return false;
        }

        // Não obrigatório e vazio → válido
        if (valor === '') {
            return true;
        }

        if (!/^\d+$/.test(valor)) {
            Validator.alerta(campo + ' com valor inválido.');            
            input.focus();
            return false;
        }

        return true;
    }

    static validarRenavam(input, obrigatorio = true, campo) {
        const valor = input.value.trim();

        // Campo obrigatório
        if (valor === '' && obrigatorio) {
            Validator.alerta(campo + ' campo obrigatório.');
            input.focus();
            return false;
        }

        // Não obrigatório e vazio → válido
        if (valor === '') {
            return true;
        }

        if (!/^\d+$/.test(valor)) {
            Validator.alerta(campo + ' com valor inválido.');            
            input.focus();
            return false;
        }

        return true;
    }

    static validarEmail(input, obrigatorio = true, campo) {
        const valor = input.value.trim();

        // Campo obrigatório
        if (valor === '' && obrigatorio) {
            Validator.alerta(campo + ' campo obrigatório.');
            input.focus();
            return false;
        }

        // Não obrigatório e vazio → válido
        if (valor === '') {
            return true;
        }

        const email = valor.toLowerCase();
        const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        if (!regex.test(email)) {
            Validator.alerta(campo + ' com valor inválido.');            
            input.focus();
            return false;
        }

        input.value = email;
        return true;
    }

    static validarPlaca(input, obrigatorio = true, campo = 'Placa') {
        const valor = input.value.trim();

        // Campo obrigatório
        if (valor === '' && obrigatorio) {
            Validator.alerta(campo + ' campo obrigatório.');
            input.focus();
            return false;
        }

        // Não obrigatório e vazio → válido
        if (valor === '') {
            return true;
        }

        // Converte para maiúsculo
        const normalizado = valor.toUpperCase();

        // Regex: somente letras, números e hífen
        const regexPlaca = /^[A-Z0-9-]+$/;

        if (!regexPlaca.test(normalizado)) {
            Validator.alerta(campo + ' com valor inválido.');            
            input.focus();
            return false;
        }

        // Atualiza o valor normalizado no input
        input.value = normalizado;
        return true;
    }

}
