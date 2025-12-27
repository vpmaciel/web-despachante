<?php

require_once '../lib/lib-sessao.php';

require_once '../lib/lib-biblioteca.php';

if ($_SERVER["REQUEST_METHOD"] != "GET") {
	header('location:index.php');
}

$registro = array('cliente_id' => trim($_GET['cliente_id']));

$clienteDAO = new ClienteDAO();

$resultado_excluir = $clienteDAO->deletarRegistro($registro);

if ($resultado_excluir == true) {
	header('location:../erp-msg/sucesso.php');
	exit;
} else {
	header('location:../erp-msg/erro.php');
	exit;
}
