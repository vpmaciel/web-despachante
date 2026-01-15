const mapeamentoPaginas = {
    'home': 'Login ',
    'cliente': 'Cliente',
    'sucesso': 'Mensagem',
    'erro': 'Mensagem',
    'pedido-de-placa': 'Pedido de Placa',
    'servico': 'Serviço',
    'veiculo': 'Veículo',
};
// Encontra a página atual
function definirPaginaAtual() {
    const url = window.location.href;
    
    for (const [pagina, titulo] of Object.entries(mapeamentoPaginas)) {
        if (url.includes(pagina)) {
            // Define a cor do menu ativo
            let elementoMenu = document.getElementById(pagina);
            if (elementoMenu) {
                elementoMenu.style.color = '#579EBB';
            }
            
            // Define o título da página com o formato solicitado                
                let tituloElemento = document.getElementById('titulo');

                if (tituloElemento) {
                    tituloElemento.textContent = titulo;
                }
            break; // Para no primeiro match encontrado
        }
    }
}

// Executa quando o DOM estiver carregado
document.addEventListener('DOMContentLoaded', definirPaginaAtual);

// voltar automaticamente após 3 segundos em páginas de mensagem

document.addEventListener("DOMContentLoaded", function () {

    const params = new URLSearchParams(window.location.search);

    if (params.get("voltar") === "true") {

        setTimeout(function () {

            if (document.referrer) {
                window.location.href = document.referrer;
            } else {
                window.location.href = "/web-despachante/home/home.php";
            }

        }, 5000); // 5 segundos
    }

});
