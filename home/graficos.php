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

$usuario = array();

$form_open = '<form action="../erp-login/login-controle.php" method="post">';

echo $form_open;

echo open_table;

echo open_tr . open_td_2 . open_label . 'Usuário' . close_lable . close_td . close_tr;

$input = '<canvas id="graficoServicos" width="400" height="200"></canvas>';

echo open_tr . open_td_2 . open_label . $input . close_lable . close_td . close_tr;
$labels = ['Jan', 'Fev', 'Mar'];
$valores = [12, 5, 9];
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