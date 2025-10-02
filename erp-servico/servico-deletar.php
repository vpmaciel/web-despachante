<?php


require_once 'lib/lib-sessao.php';
require_once 'lib/lib-biblioteca.php';

$registro['servico_id'] = trim($_GET['servico_id']);

$RESULTADO_EXCLUIR = excluir('servico', $registro);

if ($RESULTADO_EXCLUIR == true) {
	header('location:sucesso.php');
	exit;
} else {
	header('location:erro.php');
	exit;
} 