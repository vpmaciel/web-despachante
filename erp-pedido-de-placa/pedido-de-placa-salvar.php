<?php

require_once '../lib/lib-sessao.php';

require_once '../lib/lib-biblioteca.php';

if ($_SERVER["REQUEST_METHOD"] != "POST") {
	header('location:index.php');
}

$pedidoDePlacaDAO = new PedidoDePlacaDAO();

$registro['pedido_de_placa_id'] = trim($_POST['pedido_de_placa_id']);
$registro['pedido_de_placa_data'] = trim($_POST['pedido_de_placa_data']);
$registro['pedido_de_placa_placa_veiculo'] = trim($_POST['pedido_de_placa_placa_veiculo']);
$registro['pedido_de_placa_quantidade'] = trim($_POST['pedido_de_placa_quantidade']);
$registro['pedido_de_placa_renavam'] = trim($_POST['pedido_de_placa_renavam']);
$registro['pedido_de_placa_cpf_cnpj_proprietario'] = trim($_POST['pedido_de_placa_cpf_cnpj_proprietario']);
$registro['pedido_de_placa_cor_placa'] = trim($_POST['pedido_de_placa_cor_placa']);
$registro['pedido_de_placa_tipo_placa'] = trim($_POST['pedido_de_placa_tipo_placa']);
	
if (!isset($registro['pedido_de_placa_id']) || $registro['pedido_de_placa_id'] === '') {

	$resultado_inserir = $pedidoDePlacaDAO->inserirRegistro($registro);

	if ($resultado_inserir == true) {
		header('location:../erp-msg/sucesso.php');
		exit;
	} else {
		header('location:../erp-msg/erro.php');
		exit;
	}
} else {

	$resultado_atualizar = $pedidoDePlacaDAO->atualizarRegistro($registro);

	if ($resultado_atualizar == true) {
		header('location:../erp-msg/sucesso.php');
		exit;
	} else {
		header('location:../erp-msg/erro.php');
		exit;
	}
}