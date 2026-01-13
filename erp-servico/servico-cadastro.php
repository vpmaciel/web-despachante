<?php

require_once '../lib/lib-sessao.php';

require_once '../lib/lib-biblioteca.php';

setcookie('servico_id', $_GET['servico_id'] ?? '', time() + 3600, '/');

echo doctype;

echo open_html;

echo open_head;

require_once '../cabecalho.php';

echo close_head;

echo open_body;

echo open_div;

require_once '../menu.php';

require_once 'servico-menu.php';

$servicoDAO = new ServicoDAO();

$conexao = new Conexao();

$numero_de_registros = $conexao->getTotalRegistros('servico');

$registro = array();

if (isset($_GET['editar'])) {
    $registro = $pedidoDePlacaDAO->getRegistro($registro);
}

if (isset($_GET['editar'])) {

    $SQL = "SELECT * FROM servico where servico_id = '" . $_GET['servico_id'] . "';";
    $stmt = $pdo->prepare($SQL);
    $stmt->execute();

    while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
        
    }
}

$form_open = '<form action="servico-salvar.php" method="POST">';

echo $form_open;

require_once 'servico-formulario.php';

echo close_div;

echo close_form;

echo close_div;

require_once '../rodape.php';

echo close_body;

echo close_html;

?>

<script>
    $(document).ready(function() {
        var delayTimer;

        $('#servico_cpf_cnpj_cliente').on('input', function() {
            // Limpa o temporizador anterior, se houver
            clearTimeout(delayTimer);

            // Define um novo temporizador com atraso de 300 milissegundos
            delayTimer = setTimeout(function() {
                // Obtém o valor do campo de entrada
                var servico_cpf_cnpj_cliente = $('#servico_cpf_cnpj_cliente').val();

                // Faz uma requisição Ajax para obter os dados do PHP
                $.ajax({
                    url: '../erp-cliente/cliente-consulta.php',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        servico_cpf_cnpj_cliente: servico_cpf_cnpj_cliente
                    },
                    success: function(data) {
                        // Exibe o resultado na label
                        if (data.length > 0) {
                            $('#resultado_servico_cpf_cnpj_cliente').text(data[0].cliente_nome_completo);
                        } else {
                            $('#resultado_servico_cpf_cnpj_cliente').text('Nenhum cliente encontrado');
                        }
                    },
                    error: function(error) {
                        console.error('Erro na requisição Ajax:', error);
                    }
                });
            }, 300); // Atraso de 300 milissegundos
        });
    });
</script>