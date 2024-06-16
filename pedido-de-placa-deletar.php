<?php


require_once 'lib/lib-sessao.php';
require_once 'lib/lib-biblioteca.php';

$registro['cliente_cpf_cnpj'] = trim($_GET['cliente_cpf_cnpj']);
$registro['cliente_nome'] = trim($_GET['cliente_nome']);
$registro['cliente_telefone'] = trim($_GET['cliente_telefone']);

$registro_cpf_cnpj = array ('cliente_cpf_cnpj' =>$registro['cliente_cpf_cnpj']);

$total_registro = retornar_numero_registros('CLIENTE', $registro_cpf_cnpj);

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
