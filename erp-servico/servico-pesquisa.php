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

require_once 'servico-menu.php';

$conexao = new Conexao();

$numero_de_registros = $conexao->getTotalRegistros('servico');

$registro = array();

$form_open = '<form action="servico-lista.php" method="post">';

echo $form_open;

require_once 'servico-formulario.php';

echo close_form;

echo close_div;

?>

<script src="../rodape.js"></script>

<?php

echo close_body;

echo close_html;
