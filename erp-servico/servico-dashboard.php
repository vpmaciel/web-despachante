<?php

require_once '../lib/lib-biblioteca.php';

echo doctype;

echo open_html;

echo open_head;

require_once '../cabecalho.php';

echo close_head;

echo open_body;

echo open_div;

require_once '../menu.php';

require_once 'servico-menu.php';

$input = '<canvas id="graficoServicos" width="400" height="200"></canvas>';

$conexao = new Conexao();

$totalRegistros = $conexao->getTotalRegistros('servico');

$labels = ['Qtde'];

$valores = [$totalRegistros];

$form_open = '<form action="" method="POST">';

echo $form_open;

echo open_table;

echo open_tr . open_td . open_label . '&nbsp;' . close_lable . close_td . close_tr;

echo open_tr . open_td_center . open_label . $input . close_lable . close_td . close_tr;

echo close_table;

echo close_form;

echo close_div;

?>

<script src="../rodape.js"></script>

<?php

echo close_body;

echo close_html;
?>


<script>
    const labels = <?= json_encode($labels) ?>;
    const valores = <?= json_encode($valores) ?>;

    new Chart(document.getElementById('graficoServicos'), {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Serviços',
                data: valores,
                backgroundColor: 'rgba(75, 192, 192, 0.7)'
            }]
        }
    });
</script>