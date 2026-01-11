<?php


require_once '../lib/lib-sessao.php';
require_once '../lib/lib-biblioteca.php';

$registro['pedido_de_placa_id'] = trim($_GET['pedido_de_placa_id']);

$pedidoDePlacaDAO = new PedidoDePlacaDAO();

$resultado_excluir = $pedidoDePlacaDAO->deletarRegistro($registro);

if ($resultado_excluir == true) {
	header('location:../erp-msg/sucesso.php');
	exit;
} else {
	header('location:../erp-msg/erro.php');
	exit;
}
