<?php


require_once 'lib/lib-sessao.php';
require_once 'lib/lib-biblioteca.php';

$registro['pedido_de_placa_id'] = trim($_GET['pedido_de_placa_id']);

$RESULTADO_EXCLUIR = excluir('pedido_de_placa', $registro);


if ($RESULTADO_EXCLUIR == true) {
	header('location:sucesso.php');
	exit;
} else {
	header('location:erro.php');
	exit;
} 