<?php

require_once '../lib/lib-sessao.php';

require_once '../lib/lib-biblioteca.php';

setcookie('veiculo_id', $_GET['veiculo_id'] ?? '', time() + 3600, '/');

echo doctype;

echo open_html;

echo open_head;

require_once '../cabecalho.php';

echo close_head;

echo open_body;

echo open_div;

require_once '../menu.php';

require_once 'veiculo-menu.php';

$veiculoDAO = new VeiculoDAO();

$conexao = new Conexao();

$numero_de_registros = $conexao->getTotalRegistros('veiculo');

$registro = array();

if (isset($_GET['editar'])) {
    $registro = $veiculoDAO->getRegistro($registro);
}

$form_open = '<form action="veiculo-salvar.php" method="POST">';

echo $form_open;

require_once 'veiculo-formulario.php';

echo close_form;

echo close_div;

?>

<script src="../rodape.js"></script>

<?php

echo close_body;

echo close_html;
