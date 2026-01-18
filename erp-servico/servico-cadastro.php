<?php

require_once '../lib/lib-sessao.php';

require_once '../lib/lib-biblioteca.php';

setcookie('servico_id', $_GET['servico_id'] ?? '', time() + 3600, '/');

echo doctype;

echo open_html;

echo open_head;

require_once '../cabecalho.php';

echo close_head;

echo open_body;

echo open_div;

require_once '../menu.php';

require_once 'servico-menu.php';

$servicoDAO = new ServicoDAO();

$conexao = new Conexao();

$numero_de_registros = $conexao->getTotalRegistros('servico');

$registro = array();

if (isset($_GET['editar'])) {
    $registro = $servicoDAO->getRegistro($registro);
}
$form_open = '<form action="servico-salvar.php" method="POST">';

echo $form_open;

require_once 'servico-formulario.php';

echo close_div;

echo close_form;

echo '<script src="servico.js"></script>';

echo '<script src="../rodape.js"></script>';

echo close_div;

echo close_body;

echo close_html;

?>