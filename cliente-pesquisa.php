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

require_once 'cliente-menu.php';

$numero_de_registros = retornar_total_registros('cliente');


$registro = array();

$form_open = '<form action="cliente-lista.php" method="POST">';

echo $form_open;

require_once 'cliente-formulario.php';

echo close_form;

echo close_div;

require_once 'rodape.php';

echo close_body;
	
echo close_html;