const mapeamentoPaginas = {
    'home': 'Login | Logoff',
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
