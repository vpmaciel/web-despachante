<script>

    const paginas = ['home', 'cliente', 'pedido-de-placa', 'servico', 'veiculo', 'cadastro', 'pesquisa', 'dashboard', 'relatorio', 'lista'];

    paginas.forEach(pagina => {
        if (window.location.href.includes(pagina)) {
            let elemento = document.getElementById(pagina);
            if (elemento) {
                //elemento.style.textDecoration = 'underline';
                elemento.style.textDecorationColor = '#579EBB';         
                elemento.style.color = '#579EBB';
            }
        }
    });

    const mapeamentoPaginas = {
        'home': 'ATHOS DESPACHANTE © 2025',
        'cliente': 'Menu: Cliente',
        'pedido-de-placa': 'Menu: Pedido de Placa',
        'servico': 'Menu: Serviço',
        'veiculo': 'Menu: Veículo',
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
</script>