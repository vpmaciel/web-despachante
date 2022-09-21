<?php
session_start();

require_once 'lib/lib-sessao.php';
require_once 'lib/lib-biblioteca.php';

$cliente['CLIENTE_CPF_CNPJ'] = trim($_GET['CLIENTE_CPF_CNPJ']);
$cliente['CLIENTE_NOME'] = trim($_GET['CLIENTE_NOME']);
$cliente['CLIENTE_TELEFONE'] = trim($_GET['CLIENTE_TELEFONE']);

$cliente_cpf_cnpj = array ('CLIENTE_CPF_CNPJ' =>$cliente['CLIENTE_CPF_CNPJ']);

$total_registro = retornar_numero_registros('CLIENTE', $cliente_cpf_cnpj);

if($total_registro > 0){
    $resultado_excluir = excluir('CLIENTE', $cliente);
	
    
    if ($resultado_excluir == TRUE) {
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
