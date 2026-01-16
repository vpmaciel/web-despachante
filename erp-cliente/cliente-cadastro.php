<?php

require_once '../lib/lib-sessao.php';

require_once '../lib/lib-biblioteca.php';

setcookie('cliente_id', $_GET['cliente_id'] ?? '', time() + 3600, '/');

echo doctype;

echo open_html;

echo open_head;

require_once '../cabecalho.php';

echo close_head;

echo open_body;

echo open_div;

require_once '../menu.php';

require_once 'cliente-menu.php';

$clienteDAO = new ClienteDAO();

$conexao = new Conexao();

$numero_de_registros = $conexao->getTotalRegistros('cliente');

$registro = array();

if (isset($_GET['editar'])) {
    $registro = $clienteDAO->getRegistro($registro);
}

$form_open = '<form action="cliente-salvar.php" method="POST">';

echo $form_open;

require_once 'cliente-formulario.php';

echo close_form;

echo close_div;
?>

<script src="../rodape.js"></script>

<script src="cliente.js"></script>

<?php

echo close_body;

echo close_html;
?>