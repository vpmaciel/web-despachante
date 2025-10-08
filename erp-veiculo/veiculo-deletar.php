<?php


require_once '../lib/lib-sessao.php';
require_once '../lib/lib-biblioteca.php';

$registro['veiculo_id'] = trim($_GET['veiculo_id']);

$RESULTADO_EXCLUIR = excluir('veiculo', $registro);
	
    
if ($RESULTADO_EXCLUIR == true) {
	header('location:../erp-msg/sucesso.php');
	exit;
} else {
	header('location:../erp-msg/erro.php');
	exit;
}