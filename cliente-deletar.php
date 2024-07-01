<?php


require_once 'lib/lib-sessao.php';
require_once 'lib/lib-biblioteca.php';

$registro = array ('cliente_id' => trim($_GET['cliente_id']));

$RESULTADO_EXCLUIR = excluir('cliente', $registro);

if ($RESULTADO_EXCLUIR == true) {
	header('location:sucesso.php');
	exit;
} else {
	header('location:erro.php');
	exit;
} 