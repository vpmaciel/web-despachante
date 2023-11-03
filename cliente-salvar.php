<?php
session_start();

require_once 'lib/lib-sessao.php';
require_once 'lib/lib-biblioteca.php';

$registro['cliente_id'] = trim($_GET['cliente_id']);
$registro['cliente_cpf_cnpj'] = trim($_GET['cliente_cpf_cnpj']);
$registro['cliente_nome_completo'] = trim($_GET['cliente_nome_completo']);
$registro['cliente_telefone'] = trim($_GET['cliente_telefone']);
$registro['cliente_email'] = trim($_GET['cliente_email']);

$condicao = array ('cliente_id' =>trim($_GET['cliente_id']));

$TOTAL_registro = retornar_numero_registros('CLIENTE', $condicao);
//exit($TOTAL_registro);
if($TOTAL_registro == 0){
	$RESULTADO_INSERIR = inserir('CLIENTE', $registro);
    
    if ($RESULTADO_INSERIR == true) {
		header('location:sucesso.php');
		exit;
	} else {
		header('location:erro.php');
		exit;
	} 
}
else {	
	$resultado_atualizar = atualizar('CLIENTE', $registro, $condicao);
	
	if ($resultado_atualizar == true) {
		
		header('location:sucesso.php');
		exit;
	} else {
		header('location:erro.php');
		exit;
	}   
}