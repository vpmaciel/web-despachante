<?php
session_start();

require_once 'lib/lib-sessao.php';
require_once 'lib/lib-biblioteca.php';

$registro['cliente_cpf_cnpj'] = trim($_GET['cliente_cpf_cnpj']);
$registro['cliente_nome'] = trim($_GET['cliente_nome']);
$registro['cliente_telefone'] = trim($_GET['cliente_telefone']);

$condicao = array ('cliente_cpf_cnpj' =>trim($_GET['cliente_cpf_cnpj']));

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
	//exit("atualizar");
	$EDITAR = true;
	$condicao = array ('cliente_cpf_cnpj' =>trim($_GET['HIDDEN_cliente_cpf_cnpj']));
	if (strlen($condicao['cliente_cpf_cnpj']) == 0) {
		$condicao = array ('cliente_cpf_cnpj' =>trim($_GET['cliente_cpf_cnpj']));
		$EDITAR = false;
	}

	$RESULTADO_PESQUISAR = selecionar('CLIENTE', $condicao);

	if ($RESULTADO_PESQUISAR != NULL && $EDITAR) {
		//header('location:erro.php?msg=Já existe outro registro com esse CPF | CNPJ');
		//exit;
	}
		
	$resultado_atualizar = atualizar('CLIENTE', $registro, $condicao);
	
	if ($resultado_atualizar == true) {
		
		header('location:sucesso.php');
		exit;
	} else {
		header('location:erro.php');
		exit;
	}   
}