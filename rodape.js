const mapeamentoPaginas = {
    'home': 'Login | Logout',
    'cliente': 'Cliente',
    'sucesso': 'Mensagem',
    'erro': 'Mensagem',
    'pedido-de-placa': 'Pedido de Placa',
    'servico': 'Serviço',
    'veiculo': 'Veículo',
};

function definirPaginaAtual() {

    const url = window.location.href;

    for (const [pagina, titulo] of Object.entries(mapeamentoPaginas)) {

        if (url.includes(pagina)) {

            let elementoMenu = document.getElementById(pagina);

            if (elementoMenu) {
                elementoMenu.style.color = '#579EBB';
            }

            let tituloElemento = document.getElementById('titulo');
            let statusElemento = document.getElementById('statusUsuario');

            if (tituloElemento) {

                if (usuarioNome) {

                    tituloElemento.textContent = titulo.replace('Login | Logout', 'Logout');

                    if (statusElemento) {
                        statusElemento.textContent = "Usuário logado: " + usuarioNome;
                    }

                } else {

                    tituloElemento.textContent = titulo.replace('Login | Logout', 'Login');

                    if (statusElemento) {
                        statusElemento.textContent = "Usuário não logado";
                    }

                }

            }

            break;
        }

    }

}

document.addEventListener('DOMContentLoaded', definirPaginaAtual);