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

$form_open = '<form action="#">';

echo $form_open;

echo open_table;

echo open_tr . open_th . 'Você não tem permissão para acessar este recurso !' . close_th . close_tr;

echo close_table;

echo close_form;

echo close_div;

?>

<script src="../rodape.js"></script>

<?php

echo close_body;

echo close_html;
