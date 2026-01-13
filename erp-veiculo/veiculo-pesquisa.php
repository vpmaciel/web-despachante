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

$conexao = new Conexao();

$numero_de_registros = $conexao->getTotalRegistros('veiculo');

$registro = array();

require_once 'veiculo-menu.php';

$form_open = '<form action="veiculo-lista.php" method="post">';

echo $form_open;

require_once 'veiculo-formulario.php';

echo close_form;

echo close_div;

require_once '../rodape.php';

echo close_body;

echo close_html;
