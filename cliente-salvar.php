<?php


require_once 'lib/lib-sessao.php';
require_once 'lib/lib-biblioteca.php';

$registro['cliente_id'] = trim($_POST['cliente_id']);
$registro['cliente_cpf_cnpj'] = formatarCpfCnpj(trim($_POST['cliente_cpf_cnpj']));
$registro['cliente_nome_completo'] = trim($_POST['cliente_nome_completo']);
$registro['cliente_telefone'] = trim($_POST['cliente_telefone']);
$registro['cliente_email'] = trim($_POST['cliente_email']);

$condicao = array ('cliente_id' =>trim($_POST['cliente_id']));

$total_registro = retornar_numero_registros('cliente', $condicao);
//exit($total_registro);
if($total_registro == 0){
	$resultado_inserir = inserir('cliente', $registro);
    
    if ($resultado_inserir == true) {
		header('location:sucesso.php');
		exit;
	} else {
		header('location:erro.php');
		exit;
	} 
}
else {	
	$resultado_atualizar = atualizar('cliente', $registro, $condicao);
	
	if ($resultado_atualizar == true) {
		
		header('location:sucesso.php');
		exit;
	} else {
		header('location:erro.php');
		exit;
	}   
}