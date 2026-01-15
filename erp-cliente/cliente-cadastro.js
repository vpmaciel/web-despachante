document.addEventListener("DOMContentLoaded", function () {

    let timer;
    let cpfCnpjJaCadastrado = false;

    const form = document.querySelector("form");
    const inputCpfCnpj = document.getElementById("cliente_cpf_cnpj");

    if (!inputCpfCnpj || !form) return;

    // ===============================
    // VERIFICA CPF/CNPJ VIA AJAX
    // ===============================
    inputCpfCnpj.addEventListener("input", function () {

        clearTimeout(timer);
        cpfCnpjJaCadastrado = false; // reseta a flag

        timer = setTimeout(() => {

            const valor = inputCpfCnpj.value.trim();

            if (valor.length < 11) return;

            fetch("../erp-cliente/cliente-consulta.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded"
                },
                body: "cliente_cpf_cnpj=" + encodeURIComponent(valor)
            })
            .then(r => r.json())
            .then(data => {

                if (data && data.cliente_nome_completo) {

                    cpfCnpjJaCadastrado = true;

                    Swal.fire({
                        icon: 'warning',
                        title: 'web-despachante',
                        html: `
                            <b>CPF | CNPJ já cadastrado</b><br><br>
                            <b>CPF | CNPJ:</b> ${valor}<br>
                            <b>Nome:</b> ${data.cliente_nome_completo}
                        `,
                        confirmButtonText: 'OK',
                        confirmButtonColor: '#579EBB'
                    });

                    inputCpfCnpj.value = "";
                    inputCpfCnpj.focus();
                }

            })
            .catch(() => {
                console.error("Erro na consulta AJAX");
            });

        }, 400);

    });

    // ===============================
    // BLOQUEIA SUBMIT SE JÁ CADASTRADO
    // ===============================
    form.addEventListener("submit", function (e) {

        if (cpfCnpjJaCadastrado) {
            e.preventDefault();

            Swal.fire({
                icon: 'error',
                title: 'web-despachante',
                text: 'CPF | CNPJ já cadastrado. Corrija antes de salvar.',
                confirmButtonText: 'OK',
                confirmButtonColor: '#579EBB'
            });

            inputCpfCnpj.focus();
            return false;
        }

    });

});
