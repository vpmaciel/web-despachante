<?php

require_once '../lib/lib-sessao.php';

require_once '../lib/lib-biblioteca.php';

if ($_SERVER["REQUEST_METHOD"] != "GET") {
	header('location:index.php');
}

$registro = array('servico_id' => trim($_GET['servico_id']));

$servicoDAO = new ServicoDAO();

$resultado_excluir = $servicoDAO->deletarRegistro($registro);

if ($resultado_excluir == true) {
	header('location:../erp-msg/sucesso.php');
	exit;
} else {
	header('location:../erp-msg/erro.php');
	exit;
}
