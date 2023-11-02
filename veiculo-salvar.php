<?php
session_start();

require_once 'lib/lib-sessao.php';
require_once 'lib/lib-biblioteca.php';

$CLIENTE['VEICULO_ID'] = trim($_GET['VEICULO_ID']);
$CLIENTE['VEICULO_PLACA'] = trim($_GET['VEICULO_PLACA']);
$CLIENTE['VEICULO_CPF_CNPJ_PROPRIETARIO_PROPRIETARIO'] = trim($_GET['VEICULO_CPF_CNPJ_PROPRIETARIO_PROPRIETARIO']);
$CLIENTE['VEICULO_NOME_PROPRIETARIO'] = trim($_GET['VEICULO_NOME_PROPRIETARIO']);
$CLIENTE['VEICULO_MARCA'] = trim($_GET['VEICULO_MARCA']);
$CLIENTE['VEICULO_MODELO'] = trim($_GET['VEICULO_MODELO']);

$CONDICAO = array ('VEICULO_ID' =>trim($_GET['VEICULO_ID']));

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
	$resultado_atualizar = atualizar('CLIENTE', $CLIENTE, $CONDICAO);
	
	if ($resultado_atualizar == TRUE) {
		
		header('location:sucesso.php');
		exit;
	} else {
		header('location:erro.php');
		exit;
	}   
}