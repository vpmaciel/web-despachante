<?php

require_once '../lib/lib-sessao.php';

require_once '../lib/lib-biblioteca.php';

if ($_SERVER["REQUEST_METHOD"] != "GET") {
	header('location:index.php');
}

$registro = array('veiculo_id' => trim($_GET['veiculo_id']));

$veiculoDAO = new VeiculoDAO();

$resultado_excluir = $veiculoDAO->deletarRegistro($registro);

if ($resultado_excluir == true) {
	header('location:../erp-msg/sucesso.php');
	exit;
} else {
	header('location:../erp-msg/erro.php');
	exit;
}
