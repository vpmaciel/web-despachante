<?php


require_once 'lib/lib-sessao.php';
require_once 'lib/lib-biblioteca.php';

$registro = array ('cliente_id' => trim($_GET['cliente_id']));

$total_registro = retornar_numero_registros('CLIENTE', $registro);

if($total_registro > 0){
    $RESULTADO_EXCLUIR = excluir('CLIENTE', $registro);
	
    
    if ($RESULTADO_EXCLUIR == true) {
		header('location:sucesso.php');
		exit;
	} else {
		header('location:erro.php');
		exit;
	} 
}
else {

	header('location:erro.php');
		exit;
}
