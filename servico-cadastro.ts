let input;

input = document.querySelector('#cliente_cpf_cnpj');

input.addEventListener('input', function () {
    mascaraMutuario(this, cpfCnpj);
});

input.addEventListener('blur', function () {
    clearTimeout(1);
});

function mascaraMutuario(o, f) {
    const v_obj = o
    const v_fun = f
    setTimeout(function () {
        v_obj.value = v_fun(v_obj.value)
    }, 1)
}



function mask(o, f) {
    setTimeout(function () {
        var v = mphone(o.value);
        if (v != o.value) {
            o.value = v;
        }
    }, 1);
}

function mphone(v) {
    var r = v.replace(/\D/g, "");
    r = r.replace(/^0/, "");
    if (r.length > 10) {
        r = r.replace(/^(\d\d)(\d{5})(\d{4}).*/, "($1) $2-$3");
    } else if (r.length > 5) {
        r = r.replace(/^(\d\d)(\d{4})(\d{0,4}).*/, "($1) $2-$3");
    } else if (r.length > 2) {
        r = r.replace(/^(\d\d)(\d{0,5})/, "($1) $2");
    } else {
        r = r.replace(/^(\d*)/, "($1");
    }
    return r;
}


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