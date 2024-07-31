<?php


require_once 'lib/lib-sessao.php';

require_once 'lib/lib-biblioteca.php';

setlocale(LC_ALL, 'pt_BR.utf8');

echo doctype;

echo open_html;

echo open_head;

require_once 'cabecalho.php';

echo close_head;

echo open_body;

echo open_div;

require_once 'menu.php';

echo open_h1 . 'Serviço'  . close_h1; 

require_once 'servico-menu.php';

$numero_de_registros = retornar_total_registros('servico');

$registro = array();

$registro['servico_id'] = '';
$registro['servico_valor'] = '';
$registro['servico_data'] = date('Y-m-d');
$registro['servico_placa_veiculo'] = '';
$registro['servico_descricao'] = '';
$registro['servico_cpf_cnpj_cliente'] = '';
$registro['servico_nome_cliente'] = '';
$registro['servico_telefone_cliente'] = '';


if (!isset($_GET['servico_id'])) {
    $registro['servico_id'] = '';
}

if (isset($_GET['editar'])) {

    $SQL="SELECT * FROM servico where servico_id = '" . $_GET['servico_id'] . "';" ;
    $stmt = $pdo->prepare($SQL);
    $stmt->execute();
    
    while($linha = $stmt->fetch(PDO::FETCH_ASSOC))
    {
        $registro['servico_id'] = $linha['servico_id'];
        $registro['servico_data'] = $linha['servico_data'];
        $registro['servico_valor'] = formatarNumero($linha['servico_valor']);
        $registro['servico_placa_veiculo'] = $linha['servico_placa_veiculo']; 
        $registro['servico_descricao'] = $linha['servico_descricao'];
        $registro['servico_cpf_cnpj_cliente'] = $linha['servico_cpf_cnpj_cliente'];
        $registro['servico_telefone_cliente'] = $linha['servico_telefone_cliente'];
    }  

}

$form_open = '<form action="servico-salvar.php" method="POST">';

echo $form_open;

require_once 'servico-formulario.php';

echo close_div;

echo close_form;

echo close_div;

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
                    url: 'cliente-consulta.php',
                    type: 'POST',
                    dataType: 'json',
                    data: { servico_cpf_cnpj_cliente: servico_cpf_cnpj_cliente },
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

