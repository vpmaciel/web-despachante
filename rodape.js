const paginas = ['home', 'sucesso','erro','cliente', 'pedido-de-placa', 'servico', 'veiculo', 'cadastro', 'pesquisa', 'dashboard', 'relatorio', 'lista', 'imprimir'];

// Marca o link ativo de acordo com a URL
paginas.forEach(pagina => {
    if (window.location.href.includes(pagina)) {
        let elemento = document.getElementById(pagina);
        if (elemento) {
            elemento.style.color = '#579EBB';
        }
    }
});

// Adiciona evento para detectar clique em links que contenham "imprimir" no href
document.querySelectorAll('a').forEach(a => {
if (a.textContent.trim().toLowerCase().includes('imprimir')) {
    a.addEventListener('pointerdown', () => {
    a.style.color = '#579EBB';
    });
}
});

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