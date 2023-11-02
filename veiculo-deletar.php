<?php
session_start();

require_once 'lib/lib-sessao.php';
require_once 'lib/lib-biblioteca.php';

$CLIENTE['CLIENTE_CPF_CNPJ'] = trim($_GET['CLIENTE_CPF_CNPJ']);
$CLIENTE['CLIENTE_NOME'] = trim($_GET['CLIENTE_NOME']);
$CLIENTE['CLIENTE_TELEFONE'] = trim($_GET['CLIENTE_TELEFONE']);

$CLIENTE_cpf_cnpj = array ('CLIENTE_CPF_CNPJ' =>$CLIENTE['CLIENTE_CPF_CNPJ']);

$TOTAL_REGISTRO = retornar_numero_registros('CLIENTE', $CLIENTE_cpf_cnpj);

if($TOTAL_REGISTRO > 0){
    $RESULTADO_EXCLUIR = excluir('CLIENTE', $CLIENTE);
	
    
    if ($RESULTADO_EXCLUIR == TRUE) {
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
