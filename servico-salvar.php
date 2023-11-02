<?php
session_start();

require_once 'lib/lib-sessao.php';
require_once 'lib/lib-biblioteca.php';

$CLIENTE['CLIENTE_CPF_CNPJ'] = trim($_GET['CLIENTE_CPF_CNPJ']);
$CLIENTE['CLIENTE_NOME'] = trim($_GET['CLIENTE_NOME']);
$CLIENTE['CLIENTE_TELEFONE'] = trim($_GET['CLIENTE_TELEFONE']);

$CONDICAO = array ('CLIENTE_CPF_CNPJ' =>trim($_GET['CLIENTE_CPF_CNPJ']));

$TOTAL_REGISTRO = retornar_numero_registros('CLIENTE', $CONDICAO);
//exit($TOTAL_REGISTRO);
if($TOTAL_REGISTRO == 0){
	$RESULTADO_INSERIR = inserir('CLIENTE', $CLIENTE);
    
    if ($RESULTADO_INSERIR == TRUE) {
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
	$CONDICAO = array ('CLIENTE_CPF_CNPJ' =>trim($_GET['HIDDEN_CLIENTE_CPF_CNPJ']));
	if (strlen($CONDICAO['CLIENTE_CPF_CNPJ']) == 0) {
		$CONDICAO = array ('CLIENTE_CPF_CNPJ' =>trim($_GET['CLIENTE_CPF_CNPJ']));
		$EDITAR = false;
	}

	$RESULTADO_PESQUISAR = selecionar('CLIENTE', $CONDICAO);

	if ($RESULTADO_PESQUISAR != NULL && $EDITAR) {
		//header('location:erro.php?msg=Já existe outro registro com esse CPF | CNPJ');
		//exit;
	}
		
	$resultado_atualizar = atualizar('CLIENTE', $CLIENTE, $CONDICAO);
	
	if ($resultado_atualizar == TRUE) {
		
		header('location:sucesso.php');
		exit;
	} else {
		header('location:erro.php');
		exit;
	}   
}