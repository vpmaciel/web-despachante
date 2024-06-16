<?php


require_once 'lib/lib-sessao.php';
require_once 'lib/lib-biblioteca.php';

$registro['cliente_cpf_cnpj'] = trim($_GET['cliente_cpf_cnpj']);
$registro['cliente_nome'] = trim($_GET['cliente_nome']);
$registro['cliente_telefone'] = trim($_GET['cliente_telefone']);

$condicao = array ('cliente_cpf_cnpj' =>trim($_GET['cliente_cpf_cnpj']));

$total_registro = retornar_numero_registros('CLIENTE', $condicao);
//exit($total_registro);
if($total_registro == 0){
	$resultado_inserir = inserir('CLIENTE', $registro);
    
    if ($resultado_inserir == true) {
		header('location:sucesso.php');
		exit;
	} else {
		header('location:erro.php');
		exit;
	} 
}
else {
	//exit("atualizar");
	$editar = true;
	$condicao = array ('cliente_cpf_cnpj' =>trim($_GET['HIDDEN_cliente_cpf_cnpj']));
	if (strlen($condicao['cliente_cpf_cnpj']) == 0) {
		$condicao = array ('cliente_cpf_cnpj' =>trim($_GET['cliente_cpf_cnpj']));
		$editar = false;
	}

	$RESULTADO_PESQUISAR = selecionar('CLIENTE', $condicao);

	if ($RESULTADO_PESQUISAR != NULL && $editar) {
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