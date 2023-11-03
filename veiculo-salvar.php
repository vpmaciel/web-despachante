<?php
session_start();

require_once 'lib/lib-sessao.php';
require_once 'lib/lib-biblioteca.php';

$registro['veiculo_id'] = trim($_GET['veiculo_id']);
$registro['veiculo_placa'] = trim($_GET['veiculo_placa']);
$registro['veiculo_cpf_cnpj_proprietario_PROPRIETARIO'] = trim($_GET['veiculo_cpf_cnpj_proprietario_PROPRIETARIO']);
$registro['veiculo_nome_proprietario'] = trim($_GET['veiculo_nome_proprietario']);
$registro['veiculo_marca'] = trim($_GET['veiculo_marca']);
$registro['veiculo_modelo'] = trim($_GET['veiculo_modelo']);

$condicao = array ('veiculo_id' =>trim($_GET['veiculo_id']));

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