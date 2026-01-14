<?php

require_once '../lib/lib-sessao.php';

require_once '../lib/lib-biblioteca.php';

echo doctype;

echo open_html;

echo open_head;

require_once '../cabecalho.php';

echo close_head;

echo open_body;

echo open_div;

require_once '../menu.php';

require_once 'pedido-de-placa-menu.php';

$conexao = new Conexao();

$numero_de_registros = $conexao->getTotalRegistros('pedido_de_placa');

$registro = array();

$form_open = '<form action="pedido-de-placa-lista.php" method="POST">';

echo $form_open;

require_once 'pedido-de-placa-formulario.php';

echo close_form;

echo close_div;

?>

<script src="../rodape.js"></script>

<?php

echo close_body;

echo close_html;
